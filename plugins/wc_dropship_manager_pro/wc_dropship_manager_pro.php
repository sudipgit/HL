<?php
/*
Plugin Name: Woocommerce Dropship Manager Pro
Plugin URI: http://woocommercedropshipplugins.com
Description: Automatically creates packingslip and notifies vendors when an order is paid, handles csv inventory updates from vendors
Version: 2
Author: woocommercedropshipplugins.com
Author URI: http://woocommercedropshipplugins.com
License:  commercial license
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once( plugin_dir_path( __FILE__ ) . '/dropship_manager_core.php' );

class wc_dropship_manager_pro extends dropship_manager_core
{
	public $data_table = '';
	public $base_path = '';
	public $pdf_base_path = '';
	
	public function __construct()
	{
		$this->version = '2';
		$this->plugin_name = 'Dropship Manager Pro';
		$this->base_path = plugin_dir_path( __FILE__ );
		$this->pdf_base_path = $this->base_path.'/pdfs/';
		register_activation_hook(__FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'uninstall' ) );
		parent::__construct();
	}

	function makeDirectory($path)
	{
		$result = 1;
		if(!is_dir($path))
		{
			$result =  mkdir($path,'0777');
			chmod($path, 0777);
		}
		else
		{
			$result =  1;
		}
		if(!$result)
		{
			$this->sendAlert('Unable to create directory: '.$path.'!');
			die;
		}
		return $result;
	}

	// generate packingslip PDF
	function make_pdf($order_info,$supplier_info)
	{
		// Include TCPDF library
		if (!class_exists('TCPDF')) 
		{			
			require_once($this->base_path.'/lib/tcpdf_min/tcpdf.php');
		}
		$options = get_option( 'wc_dropship_manager' );
		// make a directory for the current year (if it doesn't already exist)
		$pdf_path = $this->pdf_base_path.date('Y'); 
		$this->makeDirectory($pdf_path);
		// make a directory for the current order (if it doesn't already exist)
		$pdf_path .= '/'.$order_info['id'];
		$this->makeDirectory($pdf_path);
		// generate a pdf for the current order and the current supplier
		$file_name = $order_info['id'].'_'.$supplier_info['supplier_code'].'.pdf';
		$file = $pdf_path.'/'.$file_name;
		$html = $this->getHTML($order_info,$supplier_info);		
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		// set default header data
		$pdf->SetHeaderData($options['packing_slip_url_to_logo'], '100', get_option( 'woocommerce_email_from_name' ).' Order #'.$order_info['id']);
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		// remove default header/footer
		//$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);  // set default monospaced font
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);  // set margins
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); // set auto page breaks
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  // set image scale factor
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->Output($file, 'F'); // save PDF 
		return $file;
	}

	// build HTML for packingslip
	function getHTML($order_info,$supplier_info)
	{
		ob_start();
		include('packingslip.html');
		$text = ob_get_clean();
		return $text;
	}

	// send the pdf to the supplier
	function send_order($order_info,$supplier_info)
	{
		$order_info['pdf_file'] = $this->make_pdf($order_info,$supplier_info);  // create a pdf packing slip file
		$options = get_option( 'wc_dropship_manager' );
		$text = '';

		$recipients = $supplier_info['order_email_addresses'];
		$hdrs = array();
		$hdrs['From'] = get_option( 'woocommerce_email_from_address' );
		$hdrs['To'] = $supplier_info['order_email_addresses'].','.get_option( 'woocommerce_email_from_address' );
		$hdrs['CC'] = get_option( 'woocommerce_email_from_address' );
		$hdrs['Subject'] = 'New Order #'.$order_info['id'].' From '.get_option( 'woocommerce_email_from_name' );
		$hdrs['Content-Type'] = 'multipart/mixed';		
		if (strlen($supplier_info['account_number']) > 0)
		{
			$text .= get_option( 'woocommerce_email_from_name' ).' account number: '.$supplier_info['account_number'].'<br/>';
		}
		$text .= $options['email_order_note']; 
		$html = '<b>'.$text.'</b>';
		if(!is_file($order_info['pdf_file']))
		{
			$this->sendAlert(' PDF File '.$order_info['pdf_file'].' Not Found');
			die;
		}
		else 
		{
			$attachments = array($order_info['pdf_file']);
		}	
		
		 // Filters for the email
		add_filter( 'wp_mail_from', array( $this, 'get_from_address' ) );
		add_filter( 'wp_mail_from_name', array( $this, 'get_from_name' ) );
		add_filter( 'wp_mail_content_type', array( $this, 'get_content_type' ) );
		wp_mail( $hdrs['To'], $hdrs['Subject'], $html, $hdrs, $attachments  );
		// Unhook filters
		remove_filter( 'wp_mail_from', array( $this, 'get_from_address' ) );
		remove_filter( 'wp_mail_from_name', array( $this, 'get_from_name' ) );
		remove_filter( 'wp_mail_content_type', array( $this, 'get_content_type' ) );
	}

	/* Inventory */

	// parses a supplier inventory csv and updates the SKUS
	function admin_save_inventory_status($info)
	{
		/* ini_set('memory_limit', '128M');
		define('WP_MEMORY_LIMIT', '128M');
		set_time_limit(120); */
		global $wpdb;
		
		$options = get_option( 'wc_dropship_manager' );
		$instock = '';
		$outofstock = '';
		$temp = array();
		
		$q_select_skus = " 	CREATE TEMPORARY TABLE %name AS (
								SELECT * 
								FROM ".$wpdb->postmeta." m
								WHERE m.meta_key = '_sku'
								AND SUBSTR(m.meta_value,1,LOCATE('-',m.meta_value,LENGTH (m.meta_value)-3)-1) IN (%s)
                            );";

		$q_update_stockstatus = " UPDATE ".$wpdb->postmeta."
									SET meta_value = %s 
									WHERE meta_key = '_stock_status'
									AND post_id IN (
									 SELECT post_id AS id
									 FROM %name );";
									 
		$q_update_visibilitystatus = " 	UPDATE ".$wpdb->postmeta."
                                        SET meta_value = %s 
                                        WHERE meta_key = '_visibility'
                                        AND post_id IN (
                                         SELECT post_id AS id
                                         FROM %name );";


		// get the supplier data
		$results = $this->getSupplier($info['id']);
		$info = array();
		$info['id'] = $results->id;
		$info['code'] = trim($results->code);
		$csv_options = get_option( 'wc_dropship_manager_supplier_'.$info['id'] );
		$info['csv_type'] = trim($csv_options['csv_type']);
		$info['csv_delimiter'] = trim($csv_options['csv_delimiter']);
		$info['column_sku'] = trim($csv_options['column_sku'])-1;
		$info['column_qty'] = trim($csv_options['column_qty'])-1;
		$info['column_indicator'] = trim($csv_options['column_indicator'])-1;
		$info['indicator_instock'] = trim($csv_options['indicator_instock']);
		
		// process uploaded cvs
		if($_FILES['csv_file']['error'] == 0)
		{
			$name = $_FILES['csv_file']['name'];
			$ext = strtolower(end(explode('.', $_FILES['csv_file']['name'])));
			$type = $_FILES['csv_file']['type'];
			$tmpName = $_FILES['csv_file']['tmp_name'];
			// check the file is a csv
			if($ext === 'csv')
			{
				if(($handle = fopen($tmpName, 'r')) !== FALSE) 
				{
					// necessary if a large csv file
					set_time_limit(0);
					// loop over CSV
					while(($data = fgetcsv($handle, 1000, $info['csv_delimiter'])) !== FALSE)
					{
						$temp = array();
						// get the values from the csv
						$temp['sku'] = $info['code'].'_'.$data[$info['column_sku']];
						if($info['csv_type'] === 'quantity')
						{
							$temp['qty_remaining'] = str_replace('.','',$data[$info['column_qty']]);
							// All we care about is if there is enough product in the warehouse to ship orders
							if (trim($temp['qty_remaining']) < $options['inventory_pad'])
							{
								// if the product has less than "inventory_pad" remaining then its out of stock
								$outofstock .= "'$temp[sku]',";
							}
							else
							{
								// product is now active
								$instock .= "'$temp[sku]',";
							}
						} elseif ($info['csv_type'] === 'indicator') {
							if (trim($data[$info['column_indicator']]) != trim($info['indicator_instock']))
							{
								// if the field does not equal the "in-stock" indicator then its out of stock
								$outofstock .= "'$temp[sku]',";
							}
							else
							{
								// product is now active
								$instock .= "'$temp[sku]',";
							}
						}
						unset($temp);
					}
			        fclose($handle);
					// add empty data on the end so SQL doesnt get mad about the extra comma
					$outofstock .= "''";
					$instock .= "''";

					define( 'DIEONDBERROR', true );
					$wpdb->show_errors(); 

					// update all out of stock skus
					// create temp table
					$sql = str_replace('%name','these_skus', $q_select_skus );
					$sql = str_replace('%s',$outofstock, $sql );
					$wpdb->query($sql);

					//use temp table to update stock status on all skus that are oos
					$sql = str_replace('%name','these_skus', $q_update_stockstatus );
					$sql = $wpdb->prepare( $sql , array('outofstock') );
					$wpdb->query($sql);
					// use temp table to update visibility on all skus that are oos
					$sql = str_replace('%name','these_skus', $q_update_visibilitystatus );
					$sql = $wpdb->prepare( $sql , array('hidden') );
					$wpdb->query($sql);

					// update all now instock skus
					$sql = str_replace('%name','other_skus', $q_select_skus );
					$sql = str_replace('%s',$instock, $sql );
					$wpdb->query($sql);

					$sql = str_replace('%name','other_skus', $q_update_stockstatus );
					$sql = $wpdb->prepare( $sql , array('instock') );
					$wpdb->query($sql);
					// use temp table to update visibility on all skus that are in stock
					$sql = str_replace('%name','other_skus', $q_update_visibilitystatus );
					$sql = $wpdb->prepare( $sql , array('visible') );
					$wpdb->query($sql);
				//	$wpdb->print_error();
					echo "OUT OF STOCK<p>";
					var_dump($outofstock);
					echo "</p>INSTOCK<p>";
					var_dump($instock);
					echo "</p>";
	        	}
			}
		}
		// Now that we've updated the Update inventory statuses we can update the product feed
		if (strlen($options['url_product_feed']) > 0)
		{
			file_get_contents($options['url_product_feed']);
		}
	}
	
	/* Admin Area */

	// edits a supplier profile
	function admin_edit_supplier($id)
	{
		$info = array();
		$info['id'] = 0;
		$info['name'] = '';
		$info['code'] = '';
		$info['order_email_addresses'] = '';
		$info['account_number'] = '';
		$woocommerce_url = plugins_url().'/woocommerce/';
		
		$csv_types = array('quantity'=>'Quantity on Hand'); //,'indicator'=>'Indicator');
		
		if ($id > 0)
		{
			$results = $this->getSupplier($id);
			$info['id'] = $results->id;
			$info['name'] = trim($results->supplier_name);
			$info['code'] = trim($results->code);
			$info['order_email_addresses'] = trim($results->order_email_addresses);
			$info['account_number'] = trim($results->account_number);
		}
		$options = get_option( 'wc_dropship_manager_supplier_'.$info['id'] );
		if (!$options['csv_delimiter']) {$options['csv_delimiter'] = ',';} // default CSV delimiter is a comma
		
		echo '<div class="wrap">
				<h2><a style="text-decoration: none;" href="admin.php?page=wc-dropship-manager" >Dropship Manager</a></h2>';
		echo '<h3>Edit Supplier</h3>
			<form action="admin.php?page=wc-dropship-manager" method="post" >
				<input type="hidden" name="id" value="'.$info['id'].'" />
				<table>
					<tr>					
						<td><label for="name"  >Name:</label></td>
						<td><img class="help_tip" data-tip="Name of the dropship company" src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>						
						<td><input type="text" size="50" name="name" value="'.$info['name'].'" /></td>
					</tr>
					<tr>
						<td><label for="code"  >Code:</label></td>
						<td><img class="help_tip" data-tip="You must give each supplier a 1-4 letter code and then prepend the product skus for this company with this code." src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
						<td><input type="text" size="4" name="code" value="'.$info['code'].'" /></td>
					</tr>
					<tr>
						<td><label for="account_number" >Account #:</label></td>
						<td><img class="help_tip" data-tip="Your store\'s account number with this dropshipper. Leave blank if you don\'t have an account number" src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
						<td><input type="text" size="50" name="account_number" value="'.$info['account_number'].'" /></td>
					</tr>
					<tr>
						<td><label for="order_email_addresses" >Email Addresses:</label></td>
						<td><img class="help_tip" data-tip="When a customer purchases product from you the dropshipper is sent an email notification. List the email addresses that should be notified when a new order is placed for this dropshipper." src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
						<td><input type="text" size="50" name="order_email_addresses" value="'.$info['order_email_addresses'].'" /></td>
					</tr>
				</table>
				<h3>Supplier Inventory CSV Import Settings</h3>
				<p>(If you do not receive inventory statuses by CSV from this supplier then just leave these settings blank)</p>
				<table>
					<tr>
						<td><label for="csv_delimiter" >CSV column delimiter:</label></td>	
						<td><img class="help_tip" data-tip="Please indicate what character is used to separate fields in the CSV. Normally this is a comma." src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>						
						<td><input type="text" size="2" name="csv_delimiter" value="'.$options['csv_delimiter'].'" /></td>
					</tr>
					<tr>
						<td><label for="column_sku" >CSV sku column #:</label></td>
						<td><img class="help_tip" data-tip="Please indicate which column in the CSV is the product SKU. This should be the manufacturers SKU. Dropship Manager Pro will append the SKU code for this suppler automatically when you upload." src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
						<td><input type="text" size="2" name="column_sku" value="'.$options['column_sku'].'" /></td>
					</tr>
					<tr>
						<td><label for="csv_type">CSV type:</label></td>
						<td><img class="help_tip" data-tip="Please indicate how the CSV data should be read. <Br />Quantity on hand - this means that the CSV contains a column showing the suppliers remaining stock. " src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
						<td>
							<select name="csv_type" id="csv_type" >';
							// <br />Indicator - this means that the CSV contains a boolean value (Y/N, true/false, 0,1) to indicate if a product in stock.
								foreach($csv_types as $csv_type=>$description)
								{
									$selected = '';
									if ($options['csv_type'] === $csv_type) {$selected = 'selected';}
									echo '<option value="'.$csv_type.'" '.$selected.'>'.$description.'</option>';
								}
			echo			'</select>
						</td>
					</tr>
					<tr class="csv_quantity csv_types">
						<td><label for="column_qty" >CSV quantity column #:</label></td> 
						<td><img class="help_tip" data-tip="If you are using a cvs to update in-stock status please indicate which column in the csv is the inventory quantity remaining" src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
						<td><input type="text" size="2" name="column_qty" value="'.$options['column_qty'].'" /></td>
					</tr>
					<tr class="csv_indicator csv_types">
						<td><label for="column_indicator" >CSV Indicator column #:</label></td> 
						<td><img class="help_tip" data-tip="If you are using a cvs to update in-stock status please indicate which column in the csv indicates the in-stock status" src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
						<td><input type="text" size="2" name="column_indicator" value="'.$options['column_indicator'].'" /></td>
					</tr>
					<tr class="csv_indicator csv_types">
						<td><label for="indicator_instock" >CSV Indicator In-stock value:</label></td> 
						<td><img class="help_tip" data-tip="If you are using a cvs to update in-stock status please indicate which column in the csv indicates the in-stock status" src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
						<td><input type="text" size="2" name="indicator_instock" value="'.$options['indicator_instock'].'" /></td>
					</tr>					
				</table>
				<p class="submit"><input class="button-primary" type="submit" name="submit" value="Save changes" /></p>
				<p class="woocommerce-actions"><a class="button-primary" href="admin.php?page=wc-dropship-manager&delete=1&id='.$info['id'].'">Delete This Record</a></p>
			</form>
		</div>';
	}

	// form to upload inventory CSV
	function admin_display_load_inventory($id)
	{
		$info = array();
		$info['id'] = 0;
		$info['file'] = '';

		if ($id > 0)
		{
			$results = $this->getSupplier($id);
			$info['id'] = $results->id;
		}
		echo '<div class="wrap">
				<h2><a style="text-decoration: none;" href="admin.php?page=wc-dropship-manager" >Dropship Manager</a></h2>';
		echo '<h3>Update Supplier Inventory</h3>
			<p>If your wholesale supplier provides a spreadsheet indicating inventory levels you can upload the CSV here to set products status to in-stock or out-of-stock. <br />
			Configure which columns to use on the spreadsheet in the <a href="admin.php?page=wc-dropship-manager&id='.$info['id'].'">supplier admin</a></p>
			<form action="admin.php?page=wc-dropship-manager&inventory=1" method="post" enctype="multipart/form-data" >
				<table>
						<tr>
								<th>CSV File</th>
						</tr>
						<tr>
								<td><input type="hidden" name="id" value="'.$info['id'].'" />
								<input type="file" name="csv_file" value="" /></td>
								<td><input class="button-primary" type="submit" name="submit" value="Update" /></td>
						</tr>
				</table>
			</form>
		</div>';
	}	
	
	// show main supplier management menu
	function admin_display_suppliers()
	{
		// tab to show suppliers
		global $wpdb;
		$results = $wpdb->get_results('SELECT * FROM '.$this->data_table);
		echo '<h3>Supplier Admin</h3>
			<p>This is the list of dropshop suppliers you use in your store</p>
			<div class="wrap">
				<style>
					tbody tr:nth-child(odd) {background-color: #EEE;}
				</style>
				<table id="suppliers_table" class="wp-list-table widefat" >
					<thead>
						<tr>
							<th>Name</th>
							<th>Code</th>
							<th>Account #</th>
							<th>Email Addresses</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>';
				foreach($results as $key => $row)
				{
					echo '	<tr>
							<td><a class="row-title" href="admin.php?page=wc-dropship-manager&id='.$row->id.'">'.$row->supplier_name.'</a></td>
							<td>'.$row->code.'</td>
							<td>'.$row->account_number.'</td>
							<td>'.$row->order_email_addresses.'</td>
							<td><a class="button" href="admin.php?page=wc-dropship-manager&id='.$row->id.'">Edit</a></td>
							<td><a class="button" href="admin.php?page=wc-dropship-manager&id='.$row->id.'&inventory=1">Inventory CSV</a></td>
						</tr>';
				}
		echo '</tbody></table>
				<p class="submit">
				<a class="button-primary" href="admin.php?page=wc-dropship-manager&id=0">Add New</a>
				</p>
			</div>';
	}
	
	function admin_display_instructions()
	{
		echo '
			<h3>How-To Use Dropship Manager</h3>
			<p>Dropship Manager plugin for Woocommerce is used to send automated email orders to your wholesale dropship suppliers when an order is set into Processing status on your store. Processing status is used because this indicates that the order is now paid by your customer.</p>
			<p>Using the sku field Dropship manager will group the ordered products together by dropshipper and then send orders to the dropship companies. The dropship companies can then ship your order to your customer.</p>
			<h3>Automatic Notifications: set up your suppliers and products with a unique code</h3>
			<p>Prerequisite: In order to use Dropship Manager your dropship supplier <u>must</u> accept orders via email</p>
			<ol>
				<li>Enter each dropship company in the Suppliers table</li>
				<li>You must give each dropship supplier a unique code</li>
				<li>You must give each dropship supplier a email address. This is the address that Dropship Manager will send order notifications to.</li>
				<li><p>When creating a product, prepended the Supplier\'s unique code to a product\'s sku with an underscore. The unique code indicates which supplier will fulfill orders for that product</p>
					<p>SKU format should look like this: <br /><b>UNIQUECODE_PRODUCTSKU-BASEQTY</b></p>
					<ul>
						<li>* UNIQUECODE is the supplier code you set in the supplier admin</li> 
						<li>* PRODUCTSKU is the manufacturer\'s sku. This is the information that you will send to a supplier to place an order for the product</li>
						<li>* BASEQTY is the amount of product. This field is optional. By default this is set to one. The BASEQTY will be multipled by the quantity ordered by your customer.  For example if you are selling products in groups you can set this to a higher number</li>
					</ul>
					<h4>Example 1:</h4>
					<p><b>AC_12345</b> This product sku will send an order for a single product "12345" to the supplier that matches code "AC"</p>
					<h4>Example 2:</h4>
					<p><b>AC_12345-1</b> This product sku will send an order for a single product "12345" to the supplier that matches code "AC"</p>
					<h4>Example 3:</h4>
					<p><b>AC_12345-5</b> This product sku indicates you are selling a group of five of product "12345" for the supplier that matches code "AC". When the customer orders "1" of product "AC_12345-5" the supplier "AC" will know to ship 1 * 5 = five of product "12345"</p>
					<p>You can of course have an order from a customer with products for multiple dropshippers. Dropship Manager will use the unique code to group the ordered products together by dropshipper and then send orders to multiple dropship companies.</p>	
				</li> 
			</ol>
			<h3>Inventory updates via CSV: </h3>
			<p>Vendor inventory spreadsheets are usually a column containing their SKU, and a column containing their inventory on hand. If your vendor keeps you updated on their available inventory via spreadsheets you can use the CSV inventory tool to instantly check all of the vendor\'s products in your store and update the products to out-of-stock or available status. </p>
			<ol>
				<li>First the spreadsheet must be in the format of CSV, which is a "comma seperated values" file. If your vendor sends an Excel spreadsheet instead of a CSV it is easy to convert; in Excel simply choose "save as" and then select "CSV (MS DOS) .csv" to convert the Excel spreadsheet to CSV format. </li>
				<li>In your Supplier Edit screen indicate which column is the SKU column and which column is the inventory. Usually this can be set to "0" and "1". Once this supplier is set up you won\'t have to touch these settings again. <br />On this screen you can also change the delimiter from a comma to another character. Semi-colon is also common. If you don\'t know what this means, don\'t worry and just leave it alone.</li>
				<li>Once the one time set-up is completed, when you receive an vendor inventory CSV, you can now simply update all of those vendors products by uploading the spreadsheet from the Supplier Admin in Dropship Manager. The UNIQUECODE will be prepended to the begining of each sku and all the vendor\'s products will be set to out-of-stock or available!</li>
			</ol>
		';
	}
	
	function admin_display_options()
	{
		// Tab to update options
		$options = get_option( 'wc_dropship_manager' );
		$woocommerce_url = plugins_url().'/woocommerce/';
		echo '<form method="post" action="admin.php?page=wc-dropship-manager&options=1&tab=options">';
			/* foreach ($options as $key => $option)
			{
				echo '<tr>
					<td  >'.str_replace('_',' ',$key).'</td>
					<td><input name="'.$key.'" value="'.$option.'" size="100" /></td>
				</tr>';
			}*/
		echo '<h3>Email Notifications</h3>
			<p>When an order swiches to processing status, emails are sent to each supplier to notify them to ship the products. These options control the supplier email notification</p>
			<table>
				<tr>
					<td><label for="email_order_note">Email order note:</label></td>
					<td><img class="help_tip" data-tip="This note will appear on the email a supplier will receive with your order notification" src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
					<td><textarea name="email_order_note" cols="45" >'.$options['email_order_note'].'</textarea></td>
				</tr>
			</table>';
		echo '<h3>Packing slip</h3>
			<p>These options control the information on the generated packing slip that is sent to your supplier. <br />Talk to your supplier to make sure they print out and include this packing slip with each order so that your customer will see it</p>
			<table>
				<tr>
					<td><label for="packing_slip_url_to_logo" >Url to logo:</label></td>
					<td><img class="help_tip" data-tip="This logo will appear on the PDF packingslip" src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
					<td><input name="packing_slip_url_to_logo" value="'.$options['packing_slip_url_to_logo'].'" size="100" /></td>
				</tr>
				<tr>
					<td><label for="packing_slip_company_name" >Company Name:</label></td>
					<td><img class="help_tip" data-tip="This address will appear on the PDF packingslip" src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
					<td><input name="packing_slip_company_name" value="'.$options['packing_slip_company_name'].'" size="100" /></td>
				</tr>
				<tr>
					<td><label for="packing_slip_address" >Address:</label></td>
					<td><img class="help_tip" data-tip="This address will appear on the PDF packingslip" src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
					<td><input name="packing_slip_address" value="'.$options['packing_slip_address'].'" size="100" /></td>
				</tr>
				<tr>
					<td><label for="packing_slip_customer_service_email" >Customer service email:</label></td>
					<td><img class="help_tip" data-tip="This email address will appear on the PDF packingslip" src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
					<td><input name="packing_slip_customer_service_email" value="'.$options['packing_slip_customer_service_email'].'" size="50" /></td>
				</tr>
				<tr>
					<td><label for="packing_slip_customer_service_phone">Customer service phone:</label></td>
					<td><img class="help_tip"  data-tip="This phone number will appear on the PDF packingslip" src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
					<td><input name="packing_slip_customer_service_phone" value="'.$options['packing_slip_customer_service_phone'].'" size="50" /></td>
				</tr><tr>
					<td ><label for="packing_slip_thankyou">Thank you mesage:</label></td>
					<td><img class="help_tip" data-tip="This message will appear on the PDF packingslip" src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
					<td><textarea name="packing_slip_thankyou" cols="45" >'.$options['packing_slip_thankyou'].'</textarea></td>
				</tr>
			</table>';
		echo '<h3>Inventory Stock Status Update</h3>
			<p>These options control how the importing of supplier inventory spreadsheets</p>
			<table>
				<tr>
					<td><label for="inventory_pad">Inventory pad:</label></td>
					<td><img class="help_tip" data-tip="If inventory stock falls below this number it will be considered out of stock. <br>Set to zero if you want to chance that your supplier will not have the item in stock by the time you submit your order." src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
					<td><input name="inventory_pad" value="'.$options['inventory_pad'].'" size="3" /></td>
				</tr>
				<tr>
					<td valign="top"><label for="url_product_feed">Url to product feed:</label></td>
					<td><img class="help_tip" data-tip="After updating the in-stock/out of stock status this url will be called to regenerate your product feed. <br />(Just leave blank if you don\'t have a product feed)" src="'.$woocommerce_url.'assets/images/help.png" height="16" width="16"></td>
					<td>
						<input name="url_product_feed" value="'.$options['url_product_feed'].'" size="100" />
					</td>
				</tr>
			</table>';			
		echo '<p class="submit">
				<input class="button-primary" type="submit" name="submit" value="Save changes" />
				</p>
			</form>';
	}
}
// finally create instance and add to globals
$GLOBALS['wc_dropship_manager'] = new wc_dropship_manager_pro();

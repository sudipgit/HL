<?php


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once( plugin_dir_path( __FILE__ ) . '/lib/am/api-manager-updater.php' );

if (!class_exists('dropship_manager_core')) 
{
	class dropship_manager_core extends api_manager_updater
	{
		public function __construct()
		{			
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'action_links' ) );
			//woocommerce_order_status_processing
			add_action('woocommerce_order_status_processing',array($this,'order_processing'));	
			// admin
			add_action( 'admin_menu', array($this,'add_admin_menu'),999 );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ) );
			//add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
			
			global $wpdb;
			$this->data_table = $wpdb->prefix.'supplier_data';
			parent::__construct();
		}
		
		function activate()
		{
			$options = get_option( 'wc_dropship_manager' );
			if ( ! is_array( $options ) ) {
				$options = array(
					'inventory_pad' => '5',
					'packing_slip_url_to_logo' => '',
					'email_order_note' => 'Please see the attached PDF. Thank you! - '.get_bloginfo('name'),
					'packing_slip_address' => '',
					'packing_slip_customer_service_email' => '',
					'packing_slip_customer_service_phone' => '',
					'packing_slip_thankyou' => 'We hope you enjoy your order. Thank you for shopping with '.get_bloginfo('name'),
					'url_product_feed' => '',
					'version' => $this->version
				);
				update_option( $this->plugin_slug, $options );
				update_option( $this->plugin_slug.'_version', $this->version );
			}
			$this->create_table();
			parent::activation();
		}
		
		function create_table() 
		{
			global $wpdb;
			$sql = "CREATE TABLE IF NOT EXISTS ".$this->data_table." (
					  id int(11) NOT NULL AUTO_INCREMENT,
					  supplier_name varchar(255) NOT NULL,
					  code varchar(2) NOT NULL,
					  account_number varchar(255) DEFAULT NULL,
					  order_email_addresses varchar(255) NOT NULL,
					  column_delimiter varchar(1) NOT NULL DEFAULT ',',
					  column_sku int(11) DEFAULT '0',
					  column_qty int(11) DEFAULT '2',
					  inventory_pad int(11) DEFAULT '0',
					  remove_chars varchar(255) NOT NULL,
					  PRIMARY KEY  (id),
					  UNIQUE KEY code (code)
					) ENGINE=InnoDB AUTO_INCREMENT=1;";
					
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
		
		public function action_links( $links ) 
		{
			return array_merge( array('<a href="' . admin_url( 'admin.php?page=wc-dropship-manager&tab=instructions' ) . '">Instructions</a>'
									,'<a href="' . admin_url( 'admin.php?page=wc-dropship-manager&tab=options' ) . '">Options</a>'), $links );
		}

		function add_admin_menu()
		{
			add_submenu_page( 'woocommerce', $this->plugin_name, $this->plugin_name, 'manage_woocommerce', 'wc-dropship-manager', array($this,'display_admin') );
		}
		
		 public function admin_styles() 
		 {
			wp_enqueue_script( 'wc_dropship_manager_scripts', plugins_url() . '/'.$this->plugin_slug.'/assets/js/wc_dropship_manager.js', array( 'jquery', 'jquery-blockui', 'jquery-ui-sortable', 'jquery-ui-widget', 'jquery-ui-core', 'jquery-tiptip' ));
			wp_enqueue_script( 'jquery-tiptip', plugins_url().'/woocommerce/assets/js/jquery-tiptip/jquery.tipTip.min.js', array( 'jquery' ), true );
			wp_enqueue_style( 'woocommerce_admin_styles', plugins_url().'/woocommerce/assets/css/admin.css', array() );		
		}

		/* Notify Suppliers */
		// perform all tasks that happen once an order is set to processing
		function order_processing($order_id)
		{
			$order = new WC_Order( $order_id ); // load the order from woocommerce
			$this->notify_warehouse($order); // notify the warehouse to ship the order
		}
		
		// parse the order, build pdfs, and send orders to the correct suppliers
		function notify_warehouse($order)
		{
			$order_info = $this->getOrderInfo($order);
			$supplier_codes = $order_info['suppliers'];
			// for each supplier code, loop and send email with product info
			foreach($supplier_codes as $code)
			{
				$supplier_info = $this->getSupplierInfo($code); // get supplier contact info from db
				$this->send_order($order_info,$supplier_info);  // send the email
			}
		}
		
		function getSupplier($id)
		{
			global $wpdb;
			$results = $wpdb->get_row('SELECT * FROM '.$this->data_table.' WHERE id = '.$id);
			return $results;
		}
		
		function deleteSupplier($id)
		{
			global $wpdb;
			$results = 0;
			if (isset($id) && ($id > 0))
			{			
				$wpdb->query( $wpdb->prepare('DELETE FROM '.$this->data_table.' WHERE id = %d', array($id)));	
				$results = 1;			
			}
			return $results;
		}
		
		function getOrderInfo($order)
		{
			// gather some of the basic order info
			$order_info = array();
			$order_info['id'] = $order->id;
			$order_info['shipping'] =  array();
			$order_info['shipping']['name'] = $order->shipping_first_name.' '.$order->shipping_last_name;
			$order_info['shipping']['addr1'] = $order->shipping_address_1;
			$order_info['shipping']['addr2'] = $order->shipping_address_2;
			$order_info['shipping']['city'] = $order->shipping_city;
			$order_info['shipping']['state'] = $order->shipping_state;
			$order_info['shipping']['zip'] = $order->shipping_postcode;
			$order_info['shipping']['cntry'] = $order->shipping_country;
			$order_info['shipping']['phone'] = $this->formatPhone($order->billing_phone);		
			$order_info['options'] = get_option( 'wc_dropship_manager' );
			// for each item parse the sku code and determine what products go to what suppliers. 
			// Build product/supplier lists so we can send send out our order emails
			$order_info['suppliers'] = array();
			$items = $order->get_items();
			if ( count( $items ) > 0 )
			{
				foreach( $items as $item_id => $item )
				{
					$product = $order->get_product_from_item( $item ); // get the product obj
					$prod_info = $this->parseSKU($product->get_sku()); 
					if (isset($prod_info['supplier_code']))
					{
						// if we have not already encountered a product from this supplier... add supplier code to the supplier array
						if(!array_key_exists($prod_info['supplier_code'],$order_info['suppliers']))
						{
							$order_info['suppliers'][$prod_info['supplier_code']] = $prod_info['supplier_code'];  // ...add code to the supplier array
							$order_info[$prod_info['supplier_code']] = array(); // ... and create an empty array to store product info in
						}
						$prod_info['qty'] = $prod_info['base_qty'] * $item['qty']; // base sku qty * ordered qty
						$prod_info['name'] = $item['name'];
						$order_info[$prod_info['supplier_code']][] = $prod_info; // add this product info to this supplier array
					}
				}
			}
			else
			{
				// how did we get here?
				//$this->sendAlert('No Products found for order #'.$order_info['id'].'!');
				//die;
			}
			return $order_info;
		}

		function formatPhone($pnum)
		{
			return preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '($1) $2-$3', $pnum);
		}
		
		function get_from_name() {
			return wp_specialchars_decode(get_option( 'woocommerce_email_from_name' ));
		}

		function get_from_address() {
			return get_option( 'woocommerce_email_from_address' );
		}
		
		function get_content_type() {
			return " text/html";		
		}
		
		// for sending failure notifications
		function sendAlert($text)
		{
			wp_mail( get_bloginfo('admin_email'), 'Alert from '.get_bloginfo('name'), $text );
		}

		// SKU format: CODE_SKU-BASEQTY
		function parseSKU($SKU)
		{
			$info = array();
			$supplier_code_temp = explode('_',$SKU);
			if (count($supplier_code_temp) > 1)
			{
				$info['supplier_code'] = trim($supplier_code_temp[0]); // get supplier code (CODE) from start of sku
				if (strlen($info['supplier_code']) == 0 )
				{
					//$this->sendAlert('Supplier Code not found #'.$SKU.'!');
					$info['supplier_code'] = 'NOTFOUND';
					$info['base_qty'] = 1; // get base qty default
					$info['sku'] = trim($supplier_code_temp[1]); // get supplier sku (SKU) from the end
				}
				else
				{
					if (strrpos($SKU,'-') > 0)
					{
						$info['base_qty'] = trim(substr($SKU,strrpos($SKU,'-')+1)); // get base qty (BASEQTY) from end of sku
						$info['sku'] = trim(substr($SKU,strlen($info['supplier_code'])+1,strrpos($SKU,'-')+1)); // get supplier sku (SKU) in the middle
					}
					else
					{
						$info['base_qty'] = 1; // get base qty default
						$info['sku'] = trim($supplier_code_temp[1]); // get supplier sku (SKU) from the end
					}
				}
			}
			return $info;
		}

		// use the code to load supplier info from the db
		function getSupplierInfo($supplier_code)
		{
			global $wpdb;
			if ($supplier_code == 'NOTFOUND')
			{
				// if the supplier isn't found, send the order to the woocommerce email address.
				$info['id'] = 0;
				$info['supplier_code'] = 'NOTFOUND';
				$info['order_email_addresses'] = get_option( 'woocommerce_email_from_address' );
				$info['account_number'] = '';
			}
			else
			{
				$results = $wpdb->get_row('SELECT * FROM '.$this->data_table.' WHERE code = "'.$supplier_code.'"');
				$info = array();
				$info['id'] = $results->id;
				$info['supplier_code'] = trim($results->code);
				$info['order_email_addresses'] = trim($results->order_email_addresses);
				$info['account_number'] = trim($results->account_number);
			}
			return $info;
		}

		/* Admin Area */
		function display_admin()
		{
			if (count($_POST) > 0)
			{
				// are we saving a form submit?
				if(isset($_POST['id']))
				{
					if(array_key_exists('inventory', $_GET))
					{
						// we are saving an inventory form submit
						$this->admin_save_inventory_status($_POST);
					}
					else
					{
						// we are saving a supplier profile
						$this->admin_save_supplier($_POST);
					}
				}
				elseif(array_key_exists('options', $_GET))
				{
					$this->admin_save_options($_POST);
				}
				// show admin 		
				$this->admin_display_layout();
			}
			// are we editing?
			elseif(array_key_exists('id', $_GET))
			{
				if(array_key_exists('inventory', $_GET))
				{
					// manage inventory status
					$this->admin_display_load_inventory($_GET['id']);
				}
				elseif(array_key_exists('delete', $_GET))
				{
					$this->deleteSupplier($_GET['id']);
					$this->admin_display_layout();
				}
				else
				{
					// edit supplier
					$this->admin_edit_supplier($_GET['id']);
				}
			}
			else
			{
				// show admin 		
				$this->admin_display_layout();
			}
		}
		
		function admin_save_options($data, $option_name = 'wc_dropship_manager')
		{
			$options = get_option( $option_name );
			foreach ($data as $key => $opt)
			{
				if ($key != 'submit') $options[$key] = $data[$key];
			}
			update_option( $option_name, $options );
		}
		
		// Saves a supplier profile
		function admin_save_supplier($info)
		{
			global $wpdb;
			if ($info['id'] == 0)
			{
				// We are creating a new record
				$wpdb->insert(	$this->data_table
						,array(
							'supplier_name' => $info['name']
							,'code' => $info['code']
							,'account_number' => $info['account_number']
							,'order_email_addresses' => $info['order_email_addresses']
							/*,'column_delimiter' => $info['column_delimiter']
							,'column_sku' => $info['column_sku']
							,'column_qty' => $info['column_qty'] */
						)
						,array('%s','%s','%s','%s','%s','%d','%d')
				);
				
				$id = $wpdb->insert_id;
			}
			else
			{
				// updating an existing record
				$wpdb->update(  $this->data_table
								,array(
										'supplier_name' => $info['name']
										,'code' => $info['code']
										,'account_number' => $info['account_number']
										,'order_email_addresses' => $info['order_email_addresses']
										/* ,'column_delimiter' => $info['column_delimiter']
										,'column_sku' => $info['column_sku']
										,'column_qty' => $info['column_qty'] */
								)
								,array('id'=>$info['id'])
								,array('%s','%s','%s','%s')
								,array('%d')
				); //,'%s','%d','%d'
				$id = $info['id'];
				unset($info['name']);
				unset($info['code']);
				unset($info['account_number']);
				unset($info['order_email_addresses']);
				$this->admin_save_options( $info, 'wc_dropship_manager_supplier_'.$info['id']);
			}
		}
		
		function admin_display_layout()
		{
			if (isset($_GET['tab']))
			{
				$current_tab = $_GET['tab'];
			}
			else
			{
				$current_tab = 'suppliers';
			}
			$tabs = array( 	array('name'=>'suppliers')
							,array('name'=>'options')
							,array('name'=>'instructions')
						);
		
			echo '<div class="wrap">
						<h2><a style="text-decoration: none;" href="admin.php?page=wc-dropship-manager" >Dropship Manager</a></h2>
						<h2 class="nav-tab-wrapper">';
						foreach ($tabs as $tab)
						{
							echo '<a style="text-transform:capitalize" class="nav-tab '.($current_tab == $tab['name'] ? 'nav-tab-active' : '' ).'" href="admin.php?page=wc-dropship-manager&tab='.$tab['name'].'">'.$tab['name'].'</a>';
						}
					echo'</h2>';
					switch($current_tab)
					{
						case 'suppliers':
							echo '<div id="suppliers">';
									$this->admin_display_suppliers();
							echo '</div>';
							break;
						case 'options':
							echo '<div id="options">';
								$this->admin_display_options();
							echo '</div>';
							break;					
						case 'instructions':
							echo '<div id="instructions">';
								$this->admin_display_instructions();
							echo '</div>';
							break;
					}
				echo '</div>';
		}

	}
}
?>
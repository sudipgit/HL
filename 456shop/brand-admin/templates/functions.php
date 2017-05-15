<?php

function generatePdf()
{
	
	set_include_path(get_include_path() . PATH_SEPARATOR . "/path/to/dompdf");
 
require_once "dompdf/dompdf_config.inc.php";
 
$dompdf = new DOMPDF();
 	
	$current_user = wp_get_current_user();

	 $order_id=$_GET['id'];
	 
	 $order = new WC_Order($order_id);
	 //Source: ../../functions/brandadmin.php.php
	$products=orderProdcuts($order_id,$current_user->ID); 
    $shipping_status=$products[0]->shipping_status;
	$order_date=$products[0]->order_time;
	 
	 
	 
//$html = file_get_contents("http://hairlibrary.com/generate_pdf.php");
$html='<div class="row-fluid stat-icons dash-page" style="padding:0 20px;max-width:850px">';
        $orderuser=get_userdata(get_post_meta($order->post->ID,'_customer_user',true));
			
				
					$html.='<p style="font-size:21px;font-weight:bold">Order #'.$order->id.' made by '.$orderuser->display_name.'<br></p>
					<div style="float:left;width:48%"> <h4>Customer Address</h4>
					<p>'.$order->get_formatted_shipping_address().'</p></div>
                 <div style="float:right;width:48%;margin-top:20px">  <p>  <strong>Email: </strong>'.$orderuser->user_email.'</p>
				    <p> <strong> Order Date: </strong>'.date('M d, Y',$order_date).'</p></div>
					<div style="clear:both;margin-bottom: 20px;"></div>
  <h4>Ordered Products</h4>
	<table id="" border="0" cellpadding="0" cellspacing="0" width="100%">
		<thead>
			<tr style=" border: 1px solid #ccc;">				
				<th colspan="2" style="background-color: #eee; color: #000;height: 40px; padding-left: 10px;text-align: left;">Product Name</th>	
                	
                 <th style="background-color: #eee; color: #000;height: 40px; padding-left: 10px;text-align: center;">Barcode </th>				
				<th style="background-color: #eee; color: #000;height: 40px; padding-left: 10px;text-align: center;">Quantity</th>										
				<th style="background-color: #eee; color: #000;height: 40px; padding-left: 10px;text-align: center;">Price</th>							
																									
			</tr>
		</thead>
		<tbody>';
		
		$subtotal=0;
		$tax=0;
		if($products)
		    foreach($products as $product){
			/**
			Source:../../functions/brandadmin.php
			returns Brand info of given brand id**/
           $brandinfo=get_brand_info($product->brand_id);
		   $subtotal=$subtotal+$product->line_subtotal;
		   $tax=$tax+$product->line_tax+.5;
		   
			
			$html.='<tr style=" border: 1px solid #ccc;">
				<td style="padding:10px; text-align:left;">
				<span style="float:left;margin-right:10px">'.get_the_post_thumbnail($product->product_id, array(60,60)).'</span>
				</td>
				<td style="padding:10px; text-align:left;">
				<span style="float:left">'.get_the_title($product->product_id).'<br>'.getFormatedDes($brandinfo->company_name).'</span>
				</td>
				<td style="padding:10px; text-align:center;"><img src="http://hairlibrary.com/wp-content/uploads/barcode/'.get_post_meta( $product->product_id,'product_barcode_thumb', true ).'" width="100"/></td>
				<td style="padding:10px; text-align:center;">
					'.$product->qty.'
				</td>
				<td>
				$'.$product->line_subtotal.'
				</td>
				
			</tr>';
		}				
		$html.='</tbody>
		
		<tfoot>
		 <tr style=" border: 1px solid #ccc;">
		   <td style="text-align:right;font-weight:bold" colspan="4">Tax:</td>
		  <td>$'.number_format($tax,2,'.','').'</td>
		  </tr>
		  <tr style=" border: 1px solid #ccc;">
		  <td style="text-align:right;font-weight:bold" colspan="4">Shipping:</td>
		  <td>$'.number_format($product->shipping_cost,2,'.','').'</td>
		  </tr>';
		 $f_total=$subtotal+$tax+$product->shipping_cost;
		  $html.='<tr style=" border: 1px solid #ccc;">
		  <td style="text-align:right;font-weight:bold" colspan="4">Subtotal:</td>
		  <td>$'.number_format($f_total,2,'.','').'</td>
		  </tr>
		</tfoot>
		
		
		
	</table></div>';


    $dompdf = new DOMPDF();
	$dompdf->load_html($html);
    $dompdf->render();


    $pdf = $dompdf->output(); 

   
  
 
$dompdf->stream("Orders.pdf");

  unset($html);
    unset($dompdf); 
	

}
/*
function generatePdf()
{
	
	set_include_path(get_include_path() . PATH_SEPARATOR . "/path/to/dompdf");
 
require_once "dompdf/dompdf_config.inc.php";
 
$dompdf = new DOMPDF();
 	
	$current_user = wp_get_current_user();
	 $orders=getAllOrders($current_user->ID); 
//$html = file_get_contents("http://hairlibrary.com/generate_pdf.php");
$html='<h3 class="heading-mosaic"><img alt="TrendingIcon" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/TrendingIcon.png" width="20"/> Orders</h3>

<div id="pdf-part" class="row-fluid stat-icons dash-page orders" style="padding:0 10px;">
	<table id="" border="0" cellpadding="0" cellspacing="0" width="100%">
		<thead>
			<tr>
				
				<th>Status</th>										
				<th>Order#</th>																												
				<th>Date</th>	
				<th>Shipping</th>	
            				
				<th>View</th>	
<th style="width:50px"></th>				
			</tr>
		</thead>
		<tbody>';
		if($orders)
		    foreach($orders as $order){
		
	
			$html.='<tr>
				<td>
					<p class="'. $order->shipping_status.'">'.ucfirst($order->shipping_status).' <br><img alt="shipping_status" src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/images/'.$order->shipping_status.'.png" width="35"/></p>
				</td>
				
				<td>';
			$orderuser=get_userdata(get_post_meta($order->post->ID,'_customer_user',true));

					$html.='Order #'. $order->id.'<br> Made by '. $orderuser->display_name.'
                  
                
				</td>
				<td>
					<p>'.date('m-d-Y',strtotime($order->order_date)).'</p>
				</td>
				<td>'.$order->get_formatted_shipping_address().'
					
				</td>
				
				
				
				<td>
					
				<a href="http://hairlibrary.com/dashboard/order-details/?id='.$order->id.'" title="View Details"><img slt="view details" src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/images/view.png" width="20" /></a>					
					
				</td>
				<td></td>
			</tr>';
		 } 			
		$html.='</tbody>
	</table>
</div>';


    $dompdf = new DOMPDF();
	$dompdf->load_html($html);
    $dompdf->render();


    $pdf = $dompdf->output(); 

   
  
 
$dompdf->stream("Orders.pdf");

  unset($html);
    unset($dompdf); 
	
	
/*
// INCLUDE THE phpToPDF.php FILE
require("phpToPDF.php"); 

// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'url',
  "source" => 'http://hairlibrary.com/pdf-generator/',
  "action" => 'view',
  "page_size" => 'A5',
  "file_name" => 'url_fifa_A52333.pdf');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);




}
*/
?>
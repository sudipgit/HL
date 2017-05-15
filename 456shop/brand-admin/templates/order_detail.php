<?php
	include_once('functions.php');
	$current_user = wp_get_current_user();
	$order_id=$_GET['id'];
	  if($_SERVER["REQUEST_METHOD"] == "POST")
       {
			//Source: ../../functions/brandadmin.php.php
			// Update brands shipping status
		  updateOrder($order_id,$current_user->ID,$_POST['shipping_status']);
		  
      }
	
	
	 $order = new WC_Order($order_id);
	 //Source: ../../functions/brandadmin.php.php
	$products=orderProdcuts($order_id,$current_user->ID); 
    $shipping_status=$products[0]->shipping_status;
	$order_date=$products[0]->order_time;
	
	
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
     {
	    if($_POST['pdf']=='1')
		{
         generatePdf();
		 }
      } 
	
	?>
 
<h3 class="heading-mosaic"><img alt="TrendingIcon" src="<?php bloginfo('template_url');?>/assets/img/TrendingIcon.png" width="20"/> Order Details

<form action="" method="post">
<input type="hidden" name="pdf" value="1"/>
<input style="position:relative;left: 200px;top:-40px;background: #D9197E;border: none;color:#fff;padding:6px 30px;border-radius:7px; font-size: 16px" type="submit" value="Generate PDF" class="button"/>
</form>
</h3>

<div class="row-fluid stat-icons dash-page" style="padding:0 20px;max-width:850px">
        <?php $orderuser=get_userdata(get_post_meta($order->post->ID,'_customer_user',true));
			
				?>
					<p style="font-size:21px;font-weight:bold">Order #<?php echo $order->id;?> made by <?php echo $orderuser->display_name;?><br></p>
					<div style="float:left;width:48%"> <h4>Customer Address</h4>
					<p><?php echo $order->get_formatted_shipping_address();?></p></div>
                 <div style="float:right;width:48%;margin-top:20px">  <p>  <strong>Email: </strong><?php echo $orderuser->user_email;?></p>
				    <p> <strong> Order Date: </strong><?php echo date('M d, Y',$order_date);?></p></div>
					<div style="clear:both;margin-bottom: 20px;"></div>
  <h4>Ordered Products</h4>
	<table id="" border="0" cellpadding="0" cellspacing="0" width="100%">
		<thead>
			<tr>				
				<th>Product Name</th>	
                		
                 <th class="center">Barcode </th>				
				<th class="center">Quantity</th>										
				<th>Price</th>							
																									
			</tr>
		</thead>
		<tbody>
		<?php 
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
		   
			?>
			<tr>
				<td>
				<span style="float:left;margin-right:10px">  <?php echo get_the_post_thumbnail($product->product_id, array(60,60)); ?></span>
				<span style="float:left"><?php echo get_the_title($product->product_id);?><br><?php echo getFormatedDes($brandinfo->company_name);?></span>
				</td>
				<td class="center"><img src="<?php bloginfo('url');?>/wp-content/uploads/barcode/<?php echo get_post_meta( $product->product_id,'product_barcode_thumb', true );?>" width="100"/></td>
				<td class="center">
					<?php echo $product->qty;?>
				</td>
				<td>
				$<?php echo $product->line_subtotal;?>
				</td>
				
			</tr>
		<?php } ?>				
		</tbody>
		<tfoot>
		 <tr>
		   <td style="text-align:right;font-weight:bold" colspan="3">Tax:</td>
		  <td>$<?php echo number_format($tax,2,'.','');?></td>
		  </tr>
		  <tr>
		  <td style="text-align:right;font-weight:bold" colspan="3">Shipping:</td>
		  <td>$<?php echo number_format($product->shipping_cost,2,'.','');?></td>
		  </tr>
		 <?php $f_total=$subtotal+$tax+$product->shipping_cost;?>
		  <tr>
		  <td style="text-align:right;font-weight:bold" colspan="3">Subtotal:</td>
		  <td>$<?php echo number_format($f_total,2,'.','');?></td>
		  </tr>
		</tfoot>
	</table>
   <h4 style="margin:20px 0;">Shipping Status: <?php echo ucfirst($shipping_status);?> <img alt="shipping_status" style="margin:0 0 0 10px;" src="<?php bloginfo('template_url');?>/brand-admin/images/<?php echo $shipping_status;?>.png" width="45"/></h4>
   <form action="" method="post">
   <span style="float:left">
   <label>Shipping Status:</label>
   <select name="shipping_status">
   <option value="open" <?php if($shipping_status=='open') echo 'selected="selected"';?>>Open</option>
  <option value="shipped" <?php if($shipping_status=='shipped') echo 'selected="selected"';?>>Shipped</option>
   </select></span>
    <span style="float:left;margin:0 15px">
   <label>Tracking Number:</label>
   <input type="text" name="tracking-number"/>
   </span>
   <span style="float:left;padding-top:33px">
   <input style="font-weight: bold !important;margin-top: -9px;padding: 5px 10px;" type="submit" value="Change Shipping Status" class="btn btn-primary btn-icon button"/>
   </span>
   <div class="clear"></div>
   </form>
   <a href="<?php bloginfo('url');?>/orders/"></a>
<style>
table th{
    background-color: #eee;
    color: #000;
    height: 40px;
    padding-left: 10px;
    text-align: left;
}
table td{
    padding: 10px;
    text-align: left;
}
table tr{
    border: 1px solid #ccc;
}
table td ul{
   margin:0;
   padding:0;
   list-style:none
}
table td ul li{
   display:inline;
}
table td ul.action li img{
  border: 1px solid #aaa;
    padding: 2px;
}
.center
{
text-align:center;
}
</style>
</div>
	
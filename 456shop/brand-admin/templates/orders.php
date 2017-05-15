
  	<?php
	

	$current_user = wp_get_current_user();
	 $c_user=get_userdata( $current_user->ID); 
	 $userid=$current_user->ID;
	// $userid=6610;
	 
	 /**
			Source:../../functions/brandadmin.php
			returns Brand info of given brand id**/
	 $brand=get_brand_info($userid);
	 
	 //Source:../../functions/brandadmin.php
	//returns the thumbnail path of brands.
	  $thumbpath=getBrandThumbPath($brand->id);
	  
	  //Source:../../functions/brandadmin.php
	 $orders=getAllOrders($userid); 

	?>
 
<h3 class="heading-mosaic"><img alt="TrendingIcon" src="<?php bloginfo('template_url');?>/assets/img/TrendingIcon.png" width="20"/> Orders
<!--<form action="" method="post">
<input type="hidden" name="pdf" value="1"/>
<input style="position:relative;left: 150px;top:-40px;background: #D9197E;border: none;color:#fff;padding:6px 30px;border-radius:7px; font-size: 16px" type="submit" value="Generate PDF" class="button"/>
</form>-->
</h3>

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
		<tbody>
		<?php if($orders)
		    foreach($orders as $order){
		
			?>
			<tr>
				<td>
					<p class="<?php echo $order->shipping_status;?>"><?php echo ucfirst($order->shipping_status);?> <br><img alt="shipping_status" src="<?php bloginfo('template_url');?>/brand-admin/images/<?php echo $order->shipping_status;?>.png" width="35"/></p>
				</td>
				
				<td><?php $orderuser=get_userdata(get_post_meta($order->post->ID,'_customer_user',true));
			
				?>
					Order #<?php echo $order->id;?><br> Made by <?php echo $orderuser->display_name;?>
                  
                
				</td>
				<td>
					<p><?php echo date('m-d-Y',strtotime($order->order_date));?></p>
				</td>
				<td>
					<?php //echo $order->order_custom_fields['_shipping_first_name'][0].' '.$order->order_custom_fields['_shipping_first_name'][0].', '.$order->get_shipping_address();
					echo $order->get_formatted_shipping_address();
					?>
					<p>Via <?php //echo $order->order_custom_fields['_shipping_method_title'][0];?></p>
				</td>
				
				
				
				<td>
					
				<a href="<?php bloginfo('url');?>/dashboard/order-details/?id=<?php echo $order->id;?>" title="View Details"><img slt="view details" src="<?php bloginfo('template_url');?>/brand-admin/images/view.png" width="20" /></a>					
					
				</td>
				<td></td>
			</tr>
		<?php } ?>				
		</tbody>
	</table>
</div>
	
<?php
	require( dirname(__FILE__) . '/wp-load.php' );
	
	$current_user = wp_get_current_user();
	 $c_user=get_userdata( $current_user->ID); 
	 

	  
	  //Source:../../functions/brandadmin.php
	 $orders=getAllOrders(6627); 
var_dump($orders);
exit;
	?>
 
<h3 class="heading-mosaic"><img alt="TrendingIcon" src="<?php bloginfo('template_url');?>/assets/img/TrendingIcon.png" width="20"/> Orders</h3>

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
	
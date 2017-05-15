<?php
				 $order  = new WC_Order($order_id);
				
		       $order_user=get_userdata( $order->user_id ); 
				?>	
		
		
		<div class="widget order-details">
		
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading glyphicons list"><i></i> Single Order</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
		          <div class="row-fluid">
				  <div class="span6">
				     <div class="row-fluid">
                       <div class="span4">
							<strong>Order Date </strong>
						</div>
						<div class="span7">
							<p><?php echo date('d-m-Y g:i a', strtotime($order->order_date));?></p>
						</div>
					</div>
						
				<div class="row-fluid">
                       <div class="span4">
							<strong>Order Status </strong>
						</div>
						<div class="span7">
							<p class="status <?php echo $order->status;?>"><?php echo $order->status;?></p>
						</div>
						</div>
					</div>
				
				     <div class="span6">
                       <div class="span4">
							<strong>Customer Details</strong>
						</div>
						<div class="span7">
							<p><strong>Name: </strong><?php echo $order_user->data->display_name;?></p>
	                  	    <p><strong>Email:</strong> <a href="mailto:<?php echo $order_user->user_email;?>"><?php echo $order_user->user_email;?></a></p>
				            <p><strong>Phone: </strong><?php echo $order->billing_phone;?></p>
						</div>
					</div>
					
				</div>
					<hr class="separator bottom" />	
			<div class="row-fluid">
					<div class="span6">
                       <div class="span4">
							 <strong>Shipping Address</strong>
						</div>
						<div class="span7">
							<p><?php echo $order->get_formatted_shipping_address( );?></p>
						</div>
					
						
					</div><!-- end row-->
					
					


					
					<div class="span6">
                       <div class="span4">
							<strong>Billing Address </strong>
						</div>
						<div class="span7">
							<p><?php echo $order->get_formatted_billing_address();?></p>
						</div>
					
						
					</div>
					</div>
					<hr class="separator bottom" />


					
					<div class="row-fluid">
					<div class="span6">
                       <div class="span4">
							<strong>Payment Info </strong>
						</div>
						<div class="span7">
							<p><strong>Total Order: </strong> <?php echo $order->get_formatted_order_total( )?></p>
							<p><strong>Payment Method: </strong><?php echo $order->payment_method_title;?></p>
							<p><strong>Shipping Method: </strong><?php echo $order->shipping_method_title;?></p>
						</div>
					
						
					</div><!-- end row-->
					<div class="span6">
                       <div class="span4">
							<strong>Customer Note </strong>
						</div>
						<div class="span7">
							<p><?php echo $order->customer_note;?></p>
						</div>
					
						
					</div><!-- end row-->
					
				</div>


					
					

		</div>
		</div>
		<div class="widget">
		
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading glyphicons list"><i></i> Order Items</h4>
		</div>
		<!-- // Widget heading END -->
		
		 <div class="widget-body single-order-detail">
		   	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable">
				<thead>
					<tr>
						<th style="width: 1%;" class="uniformjs"><input type="checkbox" /></th>
						<th class="center">Item</th>
					
						<th class="center">Qty</th>
						<th class="center">Total Price</th>
						
					</tr>
				</thead>
				<tbody>
		      <?php foreach($order->get_items() as $item) {
			
			  ?>
			  <tr>
              <td class="center uniformjs"><input type="checkbox" /></td>
			  <td class="item"><?php echo get_the_post_thumbnail($item['product_id'], array(80,80))?>
			  <p><?php echo $item['name'];?></p>
			  </td>
			  <td class="center"><?php echo $item['qty'];?></td>
			  <td class="center"><?php echo $item['line_total'];?></td>
			  </tr>
            <?php } ?>			  
				</tbody>
            </table>				
	   </div>
</div>	
				
							
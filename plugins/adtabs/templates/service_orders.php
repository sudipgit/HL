<?php include('header.php');?>
<script>
function submitSearchForm()
{
document.getElementById('search_form').submit();
}

</script>


<?php

global $current_user, $wpdb;
$role = $wpdb->prefix . 'capabilities';
$current_user->role = array_keys($current_user->$role);
$role = $current_user->role[0];

if(isset($_POST['duration']))
			{

			    $duration=$_POST['duration'];
			
			}
			else
			 $duration=0;
			


?>
	



<div class="innerLR">
<?php if($role=="customer_service" || $role=="administrator") { 

$order_id=0;
if($_GET['oid'])
	$order_id=$_GET['oid'];
	
if($order_id>0)
{
include('single_order.php');
}
else
{	

$orders=getCustomerServiceOrders($duration);
?>

	<!-- Heading -->
	<div class="heading-buttons">
		
		
		<div class="form-inline heading small">
			<h3>Sales Orders</h3>
			<span class="pull-right">
				<label class="strong">Search by:</label>
				<form name="search-form" id="search_form" action="" method="post"/>
				<select class="selectpicker" data-style="btn-default btn-small" name="duration" onchange="submitSearchForm();">
					<option value="1" <?php if($duration=="1") echo 'selected="selected"';?>>Todays Sales</option>
					<option value="7" <?php if($duration=="7") echo 'selected="selected"';?>>Weekly Sales</option>
					<option value="30" <?php if($duration=="30") echo 'selected="selected"';?>>Monthly Sales</option>
					<option value="365" <?php if($duration=="365") echo 'selected="selected"';?>>Yearly Sales</option>
					<option value="0" <?php if($duration=="0") echo 'selected="selected"';?>>All Sales</option>
				</select>
				</form>

			</span>
		</div>

		<div class="clearfix"></div>
	</div>
	<div class="separator bottom"></div>
	<!-- // Heading END -->


	<div class="widget">

			
			
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading glyphicons list"><i></i> Manage Orders</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
	
         <p>Total Orders: <?php echo count($orders);?></p>
			
			
			
			<!-- orders table -->
			<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable">
				<thead>
					<tr>
						<th style="width: 1%;" class="uniformjs"><input type="checkbox" /></th>
						<th style="width: 1%;" class="center">Status</th>
						<th>Orders</th>
						<th>Billing</th>
						
						<th class="center">Shipping</th>
						<th class="center">Order Total</th>
						<th>Customer Notes</th>
						<th class="center">Date</th>
						<th class="center" style="width: 115px;">Actions</th>
					</tr>
				</thead>
				<tbody>
				
                <?php  
			
				 
                if($_GET['pp'])
				  $current=$_GET['pp'];
				  else
				   $current=1;
          			
			
				if($orders) 
				{
				
				$total_page=floor(count($orders)/10);	
				if(count($orders)%10 !=0)
				 $total_page++;
					
			    if($current<$total_page)	
                {
                   $next=$current+1;	
                   if($current>1)
                    {
					  $prev=$current-1;
					}	
                    else
                      {
					   $prev=$current;
					  }					
				}else
                    {
					$next=$current;	
                   if($current>1)
                    {
					  $prev=$current-1;
					}	
                    else
                      {
					   $prev=$current;
					  }	

                   }				
					
				$pages=($current-1)*10;
				$i=0;
				
                    foreach($orders as $order_id)
					{
					 $i++;
					if($i >$pages && $i<= $pages+10)
					{
					
					 $order  = new WC_Order($order_id);
				     $order_user=get_userdata( $order->user_id ); 
					
					
				?>
				<tr class="selectable">
						<td class="center uniformjs"><input type="checkbox" /></td>
						<td class="center <?php echo $order->status;?>"><?php echo $order->status;?></td>
						<td class="order_title column-order_title">
						 <a href=""><strong>Order #<?php echo order_id;?></strong></a> made by 
						 <a href="#"><?php echo $order_user->data->display_name;?></a><br><small class="meta">Email: <a href="mailto:<?php echo $order_user->user_email;?>"><?php echo $order_user->user_email;?></a></small>
						 <br><small class="meta">Tel: <?php echo $order->billing_phone;?></small></td>
						
						<td><?php echo $order->get_formatted_billing_address();?></td>
						<td><?php echo $order->get_formatted_shipping_address( );?></td>
						<td class="center">&dollar;<?php echo $order->get_total( );?></td>
						<td><?php echo $order->customer_note;?></td>
						<td class="center"><?php echo date('d-m-Y', strtotime($order->order_date));?></td>
						<td class="center">
						<a title="Overview" href="<?php bloginfo('url');?>/wp-admin/admin.php?page=Orders&oid=<?php echo $order_id;?>" class="btn-action glyphicons no-js zoom_in"><i></i></a>
							
						</td>
					</tr>
					
					<?php } } }?>
					
										
									
									</tbody>
			</table>
			<!-- // orders table END -->
			
			<!-- Options -->
			<div class="separator top form-inline small">
			
				<!-- With selected actions -->
				<div class="pull-left checkboxs_actions hide">
					<label class="strong">With selected:</label>
					<select class="selectpicker dropup" data-style="btn-default btn-small">
						<option>Action</option>
						<option>Action</option>
						<option>Action</option>
					</select>
				</div>
				<!-- // With selected actions END -->
				
				<!-- Pagination -->
				<div class="pagination pagination-small pull-right" style="margin: 0;">
					<ul>
						<li class="<?php if($current==1) echo 'disabled';?>"><a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=shop_products&pp=<?php echo $prev;?>">&laquo;</a></li>
						<?php for($i=1;$i<=$total_page;$i++){?>
						<li class="<?php if($i==$current) echo 'active';?>"><a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=shop_products&pp=<?php echo $i;?>"><?php echo $i;?></a></li>
						<?php } ?>
						
						<li class="<?php if($current==$total_page) echo 'disabled';?>"><a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=shop_products&pp=<?php echo $next;?>">&raquo;</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
				<!-- // Pagination END -->
				
			</div>
			<!-- // Options END -->
			
		</div>
	</div>
	<?php } } else { ?>
	<span class="span12">
	<p>You Don't have permission to access this page </p>
	</div>	
	<?php } ?>
</div>	


	
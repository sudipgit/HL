<?php
	$current_user = wp_get_current_user();
    $year=date('Y');
	$month=date('m');
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
       {
          $year=$_POST['inv_year'];
		  $month=$_POST['inv_month'];
       }
	 
	 include_once('functions.php');
	   //Source: ../../functions/brandadmin.php.php
	   //$orders=getOrderByMonth($current_user->ID,$year,$month); 
	
	//  $userid=$current_user->ID;
	   $userid=6610;
	   //$userid=388;
	  //$userid=199;
	  // $userid=191;
	  // $userid=7051;
	   //$userid=6627;
	   //$userid=6653;
	  //$userid=6840;
	  // $userid=6925;
	  //$userid=7100;
	  //$userid=7531;
	   
	   $current_user = get_userdata($userid);
	   
	   $orders=getInvoiceOrders($userid);
	  

 ?>

<h3 style="position:relative" class="brand-dashboard-title"><span class="glyphicons credit_card"><i></i></span>Invoice
<div class="month-selection" style="position:absolute;top:5px;right:10px;">
						<form name="invoice_form" id="inv_form" action="" method="post">
						
						<select name="inv_month" onchange="submitForm();">
						<option <?php if($month==1) echo 'selected="selected"';?> value="1">January</option>
						<option <?php if($month==2) echo 'selected="selected"';?> value="2">February</option>
						<option <?php if($month==3) echo 'selected="selected"';?> value="3">March</option>
						<option <?php if($month==4) echo 'selected="selected"';?> value="4">April</option>
						<option <?php if($month==5) echo 'selected="selected"';?> value="5">May</option>
						<option <?php if($month==6) echo 'selected="selected"';?> value="6">June</option>
						<option <?php if($month==7) echo 'selected="selected"';?> value="7">July</option>
						<option <?php if($month==8) echo 'selected="selected"';?> value="8">August</option>
						<option <?php if($month==9) echo 'selected="selected"';?> value="9">September</option>
						<option <?php if($month==10) echo 'selected="selected"';?> value="10">October</option>
						<option <?php if($month==11) echo 'selected="selected"';?> value="11">November</option>
						<option <?php if($month==12) echo 'selected="selected"';?> value="12">December</option>
						</select>
						<select name="inv_year">
						<option <?php if($year==2015) echo 'selected="selected"';?>  value="2015">2015</option>
						<option <?php if($year==2014) echo 'selected="selected"';?>  value="2014">2014</option>
						</select>
						<input type="submit" value="Submit" class="button"/>
						
						</form>
						</div>
</h3>
<div class="innerLR shop-client-products cart invoice">

	<table class="table table-invoice">
		<tbody>
			<tr>
				
				<td class="right">
					<div class="innerL">
					<button style="margin-left:20px;float:right;display:none" type="button" data-toggle="print" class="btn btn-default btn-primary btn-icon glyphicons print hidden-print"><i></i> Print invoice</button>
						<h3 style="float:right;text-align:right">#12345678 / <?php echo date('d M Y');?></h3>
						
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="separator bottom"></div>
	<div class="well margin-none">
		<table class="table table-invoice">
			<tbody>
				<tr>

 
					<td style="width: 50%; border-right: 1px solid #e5e5e5;">
						<p class="lead">Company Information</p>
						<h2>Soho Analytics</h2>
						<address class="margin-none">
							359 Broadway 4th Fl<br>
                                 New York 10013<br/>
							<abbr title="Work email">e-mail:</abbr> <a href="mailto:customerservice@hairlibrary.com

">customerservice@hairlibrary.com</a><br /> 
							<abbr title="Work Phone">phone:</abbr> +1-646-717-2349<br/><br>
							<p class="margin-none"><strong>Note:</strong>All billing questions should be directed to customerservice@hairlibrary.com</p>
						</address>
						
					</td>
					
<?php $brand=get_brand_info($userid);?>
					<td class="right">
						<p class="lead">Client Information</p>
						<h2><?php echo getFormatedDes($brand->company_name);?> </h2>
						<address class="margin-none">
							<strong>Business Manager:</strong> <span style="font-size:20px"><?php echo getFormatedDes($current_user->display_name);?></span> <br>
							
							<abbr title="Work email">e-mail:</abbr> <a href="mailto:<?php echo $brand->contact_email;?>"><?php echo $brand->contact_email;?></a><br /> 
							<abbr title="Work Phone">phone:</abbr> <?php echo $brand->contact_phone;?><br/>
						
							<div class="separator line"></div>
							
						</address>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<table class="table table-bordered table-primary table-striped table-vertical-center">
		<thead>
			<tr>
				 <th>Order#</th>
				
				<th>Date</th>
				
				<th style="text-align:center">Product Name</th>
			
				<th style="text-align:center">Order Total</th>
					<th>Tax</th>
					<th>Shipping</th>
			</tr>
		</thead>
		<tbody>
		
				<?php 
				$sub_total=0;
				$tax=0;
				$total_shipped=0;
				if($orders){
		    foreach($orders as $order){
		
			$total_shipped=$total_shipped+$order->border->shipping_cost;
			$sub_total=$sub_total+$order->border->line_subtotal;
			$tax=$tax+$order->border->line_subtax;
			$order_total=$order->border->line_subtotal;
			?>
			<tr>
				<td>Order#<?php echo $order->id;?></td>  
				
				<td><?php echo date('m-d-Y',$order->border->order_time);?></td>
				<td><?php echo get_the_title($order->border->product_id);?></td>
				<td style="text-align:center">
					 $<?php echo number_format($order_total,2,'.','');?>
				</td>
				<td>$<?php echo $order->border->line_subtax;?></td>
				<td>$<?php echo $order->border->shipping_cost;?></td>
			</tr>
		<?php } } else {?>
		    <tr> <td collspan="3">No Orders this Month</td></tr>
				<?php } ?>		
		</tbody>
	</table>
	<div class="separator bottom"></div>
	
	<!-- Row -->
	<div class="row-fluid">
	
		<!-- Column -->
		<div class="span6">
			<div class="box-generic">
				<p class="margin-none"><strong>Note:</strong><br/>The Hair Library monthly fee of 20% is taken only from gross sales not inclusive of taxes or shipping costs.<br>It is our pleasure at HairLibrary.com to receive your business and support.<br/>
			</div>
		</div>
		<!-- Column END -->
		
		<!-- Column -->
		<div class="span6">
			<table class="table table-borderless table-condensed cart_total">
				<tbody>
					<tr>
						<td class="right">Total Sales:</td>
						<td class="right strong">&dollar;<?php echo number_format($sub_total,2,'.','');?></td>
					</tr>
						<tr>
						<td class="right">Total Tax Withheld:</td>
						<td class="right strong">-&dollar;<?php echo number_format($tax,2,'.','');?></td>
					</tr>
					<tr>
						<td class="right">Total Shipping:</td>
						<td class="right strong">&dollar;<?php echo number_format($total_shipped,2,'.','');?></td>
					</tr>
						<?php $stotal=($sub_total*.2);?>
					<tr>
						<td class="right">Hair Library Commission (20%):</td>
						<td class="right strong">-&dollar;<?php echo number_format($stotal,2,'.','');?></td>
					</tr>
					<tr>
					<?php $total=($sub_total*.8)-$tax+$total_shipped;?>
					<td class="right"> Invoice Total:</td>
						<td class="right strong">&dollar;<?php echo number_format($total,2,'.','');?></td>
				

					</tr>
					<tr class="hidden-print" style="display:none">
						<td colspan="2"><button type="submit" class="btn proceed-btn-block btn-primary btn-icon glyphicons right_arrow"><i></i>Proceed to Payment</span></td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- // Column END -->
		
	</div>
	<!-- // Row END -->
	
</div>	
		
<script>
function submitForm()
{

document.getElementById("inv_form").submit();
}
</script>	
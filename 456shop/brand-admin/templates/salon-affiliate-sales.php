<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$salon=array();

	$salon['paypal_email']=$_POST['paypal_email'];	
	
	if(isset($_POST['save_salon'])){
		updateSalon($salon);  
  		
	}
}


$current_user=wp_get_current_user();

$salon_id = $current_user->ID;
$salon=getSalonInfo($salon_id);
?>
<div id="main" class="wrap salon-profile">

             <div class="row-fluid salon-profile-registration" style="padding-top:0">
			   
				
				<div class="setting-form">
				  <form action="#" method="post">
					   <div id="productPhotosTab" class="tab-pane active">
				 <!-- Row -->
					<div class="row-fluid" style="margin-bottom:30px;">
						<div class="span6" style="margin:30px 0">
						<p style="margin-bottom:20px">Provide the email connected to the PayPal account where your payment is to be transferred.</p>
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">Paypal Email:</label>
									<div class="controls">
					<input type="text" name="paypal_email" class="span10" value="<?php echo $salon->paypal_email;?>" />
								   </div>
			
				      	     </div>
							 <p style="margin-bottom:20px">*Note all transfers are made on the 1st of every month with the previous month's invoice found <a href="http://hairlibrary.com/invoice/" style="color:#D9197E">HERE.</a></p>
						</div>
						<div class="span5">
						<img style="margin-left:40px" src="<?php bloginfo('template_url');?>/brand-admin/images/PayPal1.png" width="240"/>
						</div>
						
						</div>
						<hr class="separator bottom">
					
				</div>

					 <div>
						<input type="hidden" name="salon_id" value="<?php echo $salon->id;?>" />
						<input type="hidden" name="user_id"	value="<?php echo $current_user->ID;?>"/>
						<input type="submit" name="save_salon" value="Save" class="button"/>
					 </div>
				  
				  </form>
				
				
				
				
				</div>
			 
			 
			 </div>
			 </div>

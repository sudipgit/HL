<?php
/*
Template Name: Template Salon Registration
*/
?>
<?php get_header();?>
<?php

 $current_user = wp_get_current_user();
 $post = null;
 $type = @$_GET['type'];
if(!$type){
	if($_SERVER["REQUEST_METHOD"] == "POST"){			
		if(insertSalon($_POST,$_FILES)){ ?>			
			<script>
				window.location.href = '<?php bloginfo('url'); ?>/success-message/';
			</script>			
			<?php
			exit;
		}else{
			$post = $_POST;
		}
	}
}

if($type == "SALON_ONLY")
	$amount =.01;
elseif($type == "BARBER_SHOP")
	$amount = .01;
elseif($type == "STYLISH_BARBER")
	$amount = .01;
	
$membership_type = "FREE";	
if($type){
	$membership_type = $type;
}
?>
<script>
function validate(){
	if($('#checkMeOut').prop('checked')){
		return true;
	}else{
		alert('Please confirm if you are ready to pay before submit.');
		return false;
	}
}
</script>  
		<div id="main" class="wrap salon-profile">
			<div class="container">

             <div class="row-fluid salon-profile-registration" style="padding-top:0">
			    <h3 class="pagetitle">Salon Registration</h3>
				
				<div class="setting-form">
				<form action="<?php if($type){?><?php bloginfo('url');?>/paypal/paypal.php <?php }?>" method="post" enctype="multipart/form-data" <?php if($type){?>onsubmit="return validate()" <?php } ?>>
					   <div id="productPhotosTab" class="tab-pane active">
				 <!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Salon Name:</strong>
							<p class="muted">Full Salon Name</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Salon Name</label>
							<input type="text" name="salon_name" value="<?php if($post) echo $post->salon_name?>" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					<hr class="separator bottom" />
					<!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>User Name:</strong>							
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Username</label>
							<input type="text" name="user_name" value="" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->										
					<hr class="separator bottom" />
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Street Address:</strong>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Street Address</label>
							 <input type="text" name="salon_address" value="" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					<hr class="separator bottom" /><div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Salon Location(city):</strong>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">city</label>
							 <input type="text" name="city" value="" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					<hr class="separator bottom" />
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>State:</strong>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">State</label>
							 <select name="salon_state" value="">
						 <option> State1</option>
						 <option> State1</option>
						 <option> State1</option>
						 </select>
							<div class="separator"></div>
						</div>
						</div>
						<hr class="separator bottom" />
						<!-- // Column END -->
						<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Zip Code:</strong>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Zip Code</label>
							<input type="text" name="zipcode" value="" />
							<div class="separator"></div>
						</div>
						 </div>
						 <hr class="separator bottom" />
						<!-- // Column END -->
						<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Phone Number:</strong>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Phone Number</label>
							 <input type="text" name="salon_phone" value="" />
							<div class="separator"></div>
						</div>
						 </div>
						 <hr class="separator bottom" />
						 <!-- // Column END -->
						<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Email:</strong>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Email</label>
							 <input type="text" name="salon_email" value="" />
							<div class="separator"></div>
						</div>
						 </div>
						 <hr class="separator bottom" />
						<!-- // Column END -->
						<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Website:</strong>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Website</label>
							 <input type="text" name="website" value="" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					
					   				   
					    <hr class="separator bottom" />
						<div class="row-fluid">
					
							<!-- Column -->
							<div class="span3">
								<strong>Salon Licence:</strong>
							</div>
							<!-- // Column END -->
							
							<!-- Column -->
							<div class="span9">
								<label for="inputTitle">Salon Licence</label>
								<input type="file" name="salon-licence" />
								<div class="separator"></div>
								
							</div>
						</div>
						<!-- // Column END -->
						   <hr class="separator bottom" />
						
						<?php if($type){ ?>
						<div class="row-fluid">
					
							<!-- Column -->
							<div class="span3">
								<strong>Payment</strong>
							</div>
							<!-- // Column END -->
							
							<!-- Column -->
							<div class="span9" >
								<input id="checkMeOut" type="checkbox" name="payment" value="1"/><span style="margin-left: 10px;vertical-align: middle">I am agree to pay <?php echo $amount; ?>USD</span>																							
								<div class="separator"></div>
								
							</div>
						</div>
						<!-- // Column END -->
						<hr class="separator bottom" />
						<?php } ?>
					 <div>
					 
						<input type="hidden" name="action" value="process" />
						<input type="hidden" name="cmd" value="_cart" /> <?php // use _cart for cart checkout ?>
						<input type="hidden" name="currency_code" value="USD" />
						<input type="hidden" name="membership_type" value="<?php echo $membership_type; ?>" />
						<input type="hidden" name="amount" value="<?php echo $amount; ?>" />
						<input type="hidden" name="invoice" value="<?php echo date("His").rand(1234, 9632); ?>" />
						
						<input type="submit" name="save_salon" value="Create Account" class="button" style="padding:7px 22px;" />
					 </div>				
				  </div>
				  </form>
				
				
				
				
				
			 
			 
			 </div>
			 </div>
		</div>
		</div>


<?php get_footer(); ?>
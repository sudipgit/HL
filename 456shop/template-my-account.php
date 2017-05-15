<?php
/*
Template Name: My Account
*/


global $post;

$user=wp_get_current_user();
$userid=$user->ID;

$message = "";
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['change_password']==1)
{
	if(resetPassword($_POST))
	{
	 $message="<p style='color:green;margin:0;'>Password has changed successfully</p>";
	 //Source: functions/users.php
	 resetPasswordNofification($user,$_POST['new_pass']);
	 }
	 else
	  $message="<p style='color:red;margin:0;'>Error: Please enter correct old password.</p>";
	
	
	
	}
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['is_shipping']==1)
{
	//Source: functions/users.php
   if(updateShippingAddress($_POST))
	{
	 $message="<p style='color:green;margin:0;'>Shipping address have been updated</p>";
	 
	 }
}	
	
//var_dump($change_password);
 if( $userid < 1) {
 ?>
 <script>
 window.location.href = '<?php bloginfo('url'); ?>/';
 </script>
 
 <?php	
 }
 
 if(is_brand($userid))
 {?>
 <script>
 window.location.href = '<?php bloginfo('url'); ?>/';
 </script>
 
 <?php
 }
	//Returns cover photo path of current user
	//Source: functions/users.php
   $coverimage=getCoverPhotoPath($userid); 
?>

 

<?php get_header(); ?>
	
 <link href="<?php bloginfo('template_url'); ?>/brand-admin/css/custom.css" rel="stylesheet" />	
		<div id="main" class="wrap post-template my-account">
			<div class="container">
			<?php if($message){ ?>
			<div id="top-notify" class="woocommerce-message">
                      <div> <?php echo $message;?><a style="position:absolute;top:5px;right:10px;text-decoration: none;" href="javascript:void()" onclick="closeNotify();">x</a></div>
					  
                   </div>
				   <?php } ?>
				<?php
				 $answers=getUserAnswers($user->ID);
				 ?>
				<div class="row-fluid" style="padding-top:0">	
					<div class="span12 post-page customer-profile">		
		       <div class="profile-title">
			   <?php  
				//Returns thumb path of current user
				//Source: functions/users.php
			   $thumbpath=getThumbPath($userid); ?>
			   	<a class="big-circle desktop-display <?php echo getUserHairStyle($userid);?>" href="<?php bloginfo('url');?>/profile/?id=<?php echo $userid;?>"><div class="inner-round"><img class="user-thumb" alt="profile picture" src="<?php echo $thumbpath;?>" width="100"></div></a>
				<h3 class="my-account-title"> <span> My Account Settings</span></h3>
			
				</div>


			
			<div class="panel entry-content ac_setting">
				<div class="form edit-form">
				 
				  <div class="innerLR">

	<!-- Widget -->
	<div class="widget widget-tabs border-bottom-none">
		<!-- Widget heading -->
		<div class="widget-head desktop-display">
			<ul>
				<li class="<?php if(!$is_set && $is_pass) echo ''; else echo 'active';?>"><a class="glyphicons edit" href="#account-details" data-toggle="tab"><i></i>Account Details</a></li>
				<li class="<?php if(!$is_set && $is_pass) echo 'active';?>"><a class="glyphicons settings" href="#account-settings" data-toggle="tab"><i></i>Account Settings</a></li>
				<li class=""><a class="glyphicons shipping" href="#shipping-details" data-toggle="tab"><i></i>Shipping Details</a></li>
			</ul>
		</div>
		<!-- // Widget heading END -->
			<!-- Widget heading -->
		<div class="widget-head mobile-display">
			<ul>
				<li class="<?php if(!$is_set && $is_pass) echo ''; else echo 'active';?>"><a class="glyphicons edit" href="#account-details" data-toggle="tab"><i></i>Details</a></li>
				<li class="<?php if(!$is_set && $is_pass) echo 'active';?>"><a class="glyphicons settings" href="#account-settings" data-toggle="tab"><i></i>Settings</a></li>
				<li class=""><a class="glyphicons shipping" href="#shipping-details" data-toggle="tab"><i></i>Shipping Details</a></li>
			</ul>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
			<?php //if($message!=""){  echo $message; }?>
				<div class="tab-content" style="padding: 0;">
				
					<!-- Tab content -->
					<div class="tab-pane <?php if( !$is_set && $is_pass) echo ''; else echo 'active';?>" id="account-details">
					 <form class="form-horizontal" name="pro-edit" action="<?php bloginfo('url'); ?>/saveuserprofile.php" method="post" enctype="multipart/form-data">
						<!-- Row -->
						<div class="row-fluid">
						
							<!-- Column -->
							<div class="span12">
							<div class="span6">
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">First Name</label>
									<div class="controls">
										 <input type="text" name="first_name" value=" <?php echo get_user_meta($user->ID, 'first_name', true); ?> " class="span10"/>
										
									</div>
								</div>
								<!-- // Group END -->
								</div>
								<div class="span6">
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">Last Name</label>
									<div class="controls">
										  <input type="text" name="last_name" value=" <?php echo get_user_meta($user->ID, 'last_name', true); ?> " class="span10"/>
										
									</div>
								</div>
								</div>
								<!-- // Group END -->
								
								 <div class="control-group">
			                    <label class="control-label">Who are you?</label>
								<?php $whoval=get_user_meta($user->ID, 'who_are_you', true); 
								
								?>
								<div class="controls">
				                <select name="whoyou">
					                   <option value="Blogger" <?php if($whoval=='Blogger') echo 'selected="selected"';?>>Blogger</option>
					                   <option value="Hairstylist" <?php  if($whoval=='Hairstylist') echo 'selected="selected"';?>>Hairstylist</option>
					                   <option value="Hair Enthusiast" <?php if($whoval=='Hair Enthusiast') echo 'selected="selected"';?>>Hair Enthusiast</option>
						                <option value="Vlogger" <?php if($whoval=='Vlogger') echo 'selected="selected"';?>>Vlogger</option>
					              </select>
								  </div>
					           </div>
							</div>
							<!-- // Column END -->
							
			
							
						</div>
						<!-- // Row END -->
							<div class="separator line bottom"></div>
						
						<div class="row-fluid">
							<div class="span6">
						       <div class="control-group">
									<label class="control-label">Facebook Link</label>
									<div class="controls">
										  <input type="text" name="facebook" value="<?php echo get_user_meta($user->ID, 'user_facebook', true); ?>" class="span10" placeholder="http://"/>
										
									</div>
								</div>
								 <div class="control-group">
									<label class="control-label">Pinterest Link</label>
									<div class="controls">
										  <input type="text" name="pinterest" value="<?php echo get_user_meta($user->ID, 'user_pinterest', true); ?>" class="span10" placeholder="http://"/>
										
									</div>
								</div>
								 <div class="control-group">
									<label class="control-label">YouTube Link</label>
									<div class="controls">
										  <input type="text" name="youtube" value="<?php echo get_user_meta($user->ID, 'user_youtube', true); ?>" class="span10" placeholder="http://"/>
										
									</div>
								</div>
				      	    </div>
							<div class="span6">
						 <div class="control-group">
									<label class="control-label">Twitter Link</label>
									<div class="controls">
										  <input type="text" name="twitter" value="<?php echo get_user_meta($user->ID, 'user_twitter', true);?>" class="span10" placeholder="http://"/>
										
									</div>
								</div>
								 <div class="control-group">
									<label class="control-label">Tumblr Link</label>
									<div class="controls">
										  <input type="text" name="thumblr" value="<?php echo get_user_meta($user->ID, 'user_thumblr', true);?>" class="span10" placeholder="http://"/>
										
									</div>
								</div>
									 <div class="control-group">
									<label class="control-label">Instagram Link</label>
									<div class="controls">
										  <input type="text" name="instagram" value="<?php echo get_user_meta($user->ID, 'user_instagram', true);?>" class="span10" placeholder="http://"/>
										
									</div>
								</div>
				      	    </div>
					   </div>   
						
						<!-- Group -->
						<div class="control-group row-fluid">
							<label class="control-label">About Your Hair</label>
							<div class="controls">
							<textarea name="about" class="wysihtml5 span12" rows="5"><?php echo get_user_meta($user->ID, 'user_bioinfo', true); ?> </textarea>
								
							</div>
						</div>
						<!-- // Group END -->
					<div class="separator line bottom"></div>
					<div class="control-group row-fluid">
					   <label class="control-label">Profile Picture</label>
				      <div class="pro-img">
					  <img width="120" alt="profile picture" src="<?php echo $thumbpath;?>"/>
					  </div>
					  <input class="p-pic" type="file" name="file"/><br/><span class="img-size">Image Size Must be 600x400</span>
					  <div class="clear"></div>
					  </div>
					<!-- // Group END -->
					<div class="separator line bottom"></div>
					<div class="control-group row-fluid">
					   <label class="control-label">Cover Photo</label>
				      <div class="pro-img cover-img">
					  <img width="120" alt="cover photo" src="<?php echo $coverimage;?>"/>
					  </div>
					  <input class="p-pic" type="file" name="cover_photo"/><br/><span class="img-size">Image Size Must be 980x250</span>
					  <div class="clear"></div>
					  </div>
						
						<!-- Form actions -->
						<div class="form-actions" style="margin: 0;">
							<button type="submit" class="btn button btn-icon btn-primary glyphicons circle_ok"><i></i>Save changes</button>
							<input type="hidden" name="is_profile" value="1"/>
				        	 <input type="hidden" name="user_id" value="<?php echo $user->ID;?>"/>
					        <input type="hidden" name="is_hair_style" value="0"/>
						</div>
						<!-- // Form actions END -->
						</form>
					</div>
					<!-- // Tab content END -->
					
					<!-- Tab content -->
					<div class="tab-pane <?php if(!$is_set && $is_pass) echo 'active';?>" id="account-settings">
					<?php if(!$is_set && $is_pass) {?>
					<p id="success-ms">Your old password does not match</p>
					<?php } ?>
					 <form class="form-horizontal" name="reset-password" action="#" method="post" onsubmit="return validateSetting();">
						<!-- Row -->
						<div class="row-fluid">
						
							<!-- Column -->
							<div class="span3">
								<strong>Change password</strong>
							
							</div>
							<!-- // Column END -->
						
							<!-- Column -->
							<div class="span9">
								<label for="inputUsername">Username</label>
								<input type="text" id="inputUsername" class="span10" value="<?php echo $user->user_login;?>" disabled="disabled" />
								
								<div class="separator"></div>
								<label for="inputUsername">Email</label>
								<input type="text" id="inputUsername" class="span10" value="<?php echo $user->user_email;?>" disabled="disabled" />
								
								<div class="separator"></div>
										
								<label for="inputPasswordOld">Old password</label>
								<input type="password" name="old_pass" id="inputPasswordOld" class="span10" value="" placeholder="Leave empty for no change" />
								
								<div class="separator"></div>
								
								<label for="inputPasswordNew">New password</label>
								<input type="password" name="new_pass" id="inputPasswordNew" class="span12" value="" placeholder="Leave empty for no change" />
								<div class="separator"></div>
								
								<label for="inputPasswordNew2">Repeat new password</label>
								<input type="password" name="cnew_pass" id="inputPasswordNew2" class="span12" value="" placeholder="Leave empty for no change" />
								<div class="separator"></div>
							</div>
							<!-- // Column END -->
							
						</div>
						<!-- // Row END -->
						
						<div class="separator line bottom"></div>
						
				
						
					
					
						
						<!-- Form actions -->
						<div class="form-actions" style="margin: 0;">
						  <button type="submit" class="btn button btn-icon btn-primary glyphicons circle_ok"><i></i>Save changes</button>
						  <input type="hidden" name="reset_pass" value="1"/>
				   	      <input type="hidden" name="user_id" value="<?php echo $user->ID;?>"/>
				   	      <input type="hidden" name="change_password" value="1"/>
					   
						</div>
						<!-- // Form actions END -->
						  </form>
					</div>
					<!-- // Tab content END -->
					<!-- Tab content -->
					<div class="tab-pane <?php if(!$is_set && $is_pass) echo 'active';?>" id="shipping-details">
					 <form class="form-horizontal" name="shipping-details" action="" method="post" >
						<!-- Row -->
						<div class="row-fluid">
						
							<!-- Column -->
							<div class="span3">
								<strong>Shipping Details</strong>
							
							</div>
							<!-- // Column END -->
						
							<!-- Column -->
							<div class="span9">
								<label for="billing_address_1">Address</label>
								<input type="text" id="billing_address_1" class="span10" value="<?php echo get_user_meta($user->ID, 'billing_address_1', true); ?>" name="billing_address_1"  placeholder="Apartment, suite, unit etc. (optional)"/>
								
								<div class="separator"></div>
								<label for="billing_city">Town / City </label>
								<input type="text" id="billing_city" class="span10" value="<?php echo get_user_meta($user->ID, 'billing_city', true); ?>" name="billing_city" placeholder="Town/City"/>
								
								<div class="separator"></div>
										
								<label for="billing_state">State</label>
								<select name="billing_state" id="billing_state" class="span10"  placeholder="State / County">
									<option value="">Select a state&hellip;</option>
									<option value="AL" >Alabama</option>
									<option value="AK" >Alaska</option>
									<option value="AZ" >Arizona</option>
									<option value="AR" >Arkansas</option>
									<option value="CA" >California</option>
									<option value="CO" >Colorado</option>
									<option value="CT" >Connecticut</option>
									<option value="DE" >Delaware</option>
									<option value="DC" >District Of Columbia</option>
									<option value="FL" >Florida</option>
									<option value="GA" >Georgia</option>
									<option value="HI" >Hawaii</option>
									<option value="ID" >Idaho</option>
									<option value="IL" >Illinois</option>
									<option value="IN" >Indiana</option>
									<option value="IA" >Iowa</option>
									<option value="KS" >Kansas</option>
									<option value="KY" >Kentucky</option>
									<option value="LA" >Louisiana</option>
									<option value="ME" >Maine</option>
									<option value="MD" >Maryland</option>
									<option value="MA" >Massachusetts</option>
									<option value="MI" >Michigan</option>
									<option value="MN" >Minnesota</option>
									<option value="MS" >Mississippi</option>
									<option value="MO" >Missouri</option>
									<option value="MT" >Montana</option>
									<option value="NE" >Nebraska</option>
									<option value="NV" >Nevada</option>
									<option value="NH" >New Hampshire</option>
									<option value="NJ" >New Jersey</option>
									<option value="NM" >New Mexico</option>
									<option value="NY"  selected='selected'>New York</option>
									<option value="NC" >North Carolina</option>
									<option value="ND" >North Dakota</option>
									<option value="OH" >Ohio</option>
									<option value="OK" >Oklahoma</option>
									<option value="OR" >Oregon</option>
									<option value="PA" >Pennsylvania</option>
									<option value="RI" >Rhode Island</option>
									<option value="SC" >South Carolina</option>
									<option value="SD" >South Dakota</option>
									<option value="TN" >Tennessee</option>
									<option value="TX" >Texas</option>
									<option value="UT" >Utah</option>
									<option value="VT" >Vermont</option>
									<option value="VA" >Virginia</option>
									<option value="WA" >Washington</option>
									<option value="WV" >West Virginia</option>
									<option value="WI" >Wisconsin</option>
									<option value="WY" >Wyoming</option>
									<option value="AA" >Armed Forces (AA)</option>
									<option value="AE" >Armed Forces (AE)</option>
									<option value="AP" >Armed Forces (AP)</option>
									<option value="AS" >American Samoa</option>
									<option value="GU" >Guam</option>
									<option value="MP" >Northern Mariana Islands</option>
									<option value="PR" >Puerto Rico</option>
									<option value="UM" >US Minor Outlying Islands</option>
									<option value="VI" >US Virgin Islands</option>
								</select>
								<div class="separator"></div>
										
								<label for="billing_country">Country</label>
								<select name="billing_country" id="billing_country" class="span10" disabled="disabled">
									<option selected="selected" value="US">United States</option>
								</select>	
								
								<div class="separator"></div>
								
								<label for="billing_postcode">Zip</label>
								<input type="text" name="billing_postcode" id="billing_postcode" class="span10" value="<?php echo get_user_meta($user->ID, 'billing_postcode', true); ?>" />
								<div class="separator"></div>
								
								<label for="billing_phone">Phone</label>
								<input type="text" name="billing_phone" id="billing_phone" class="span10" value="<?php echo get_user_meta($user->ID, 'billing_phone', true); ?>"/>
								<div class="separator"></div>
							</div>
							<!-- // Column END -->
							
						</div>
						<!-- // Row END -->
						
						<div class="separator line bottom"></div>	
<!-- Form actions -->
						<div class="form-actions" style="margin: 0;">
							<button type="submit" class="btn button btn-icon btn-primary glyphicons circle_ok"><i></i>Save changes</button>
				        	 <input type="hidden" name="is_shipping" value="1"/>
						</div>
						<!-- // Form actions END -->						
						  </form>
					
					</div>
				</div>
		
		</div>
	</div>
	<!-- // Widget END -->
	
</div>
				 
				   
				
				
				
				
				</div>
			</div>
					
					</div>
		
                     
                    </div>
				</div>
			</div>
	<script>
	function validateSetting(){
		var old_pass=document.forms["reset-password"]["old_pass"].value;
		var new_pass=document.forms["reset-password"]["new_pass"].value;
		var cnew_pass=document.forms["reset-password"]["cnew_pass"].value;
		
		if(old_pass=="" || new_pass=="" || cnew_pass==""){
			alert('* Field should not be empty');
	        return false;	  
		}else if(new_pass!=cnew_pass){
			alert('Password Does not match');
			return false;  
		}else
			return true;
	}
	function closeNotify()
{
$('#top-notify').fadeOut(1000);
}
	 </script>
<?php get_footer(); ?>
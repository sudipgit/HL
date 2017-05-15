<?php
$current_user = wp_get_current_user();


	/**
	Source:../../functions/brandadmin.php
	returns Brand info of given brand id
	**/
	$brand=get_brand_info($current_user->ID);
	
	/**
	Source:../../functions/brandadmin.php
	returns the thumbnail path of brands.
	**/
 $thumbpath=getBrandThumbPath($brand->user_id);
 
 //Source:../../functions/brandadmin.php
 //returns brand info of drop shipping brand
 $shipping=getBrandShippingInfo($current_user->ID);
?>


<div class="innerLR">
<h3 class="brand-dashboard-title"><span class="glyphicons lock "><i></i></span>My Account</h3>


<?php if($pp==1) echo '<p class="pass-changed">All info have been saved Successfully</p>'; ?>
	<!-- Widget -->
	<div class="widget widget-tabs border-bottom-none">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<ul>
				<li class="active"><a class="glyphicons edit" href="#account-details" data-toggle="tab"><i></i>Account details</a></li>
				<li><a class="glyphicons settings" href="#account-settings" data-toggle="tab"><i></i>Account settings</a></li>
				<li><a class="glyphicons car shipping" href="#shipping-settings" data-toggle="tab"><i></i>Drop Shipping Settings</a></li>
					<li><a class="glyphicons coins  shipping" href="#payment-settings" data-toggle="tab"><i></i>Payment Settings</a></li>
			</ul>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
			<form class="form-horizontal" name="account_setting_form" style="margin: 0;" action="<?php bloginfo('url'); ?>/savebrandprofile.php" method="post" onsubmit="return validate_drop_shipping();" enctype="multipart/form-data">
				<div class="tab-content" style="padding: 0;">
				
					<!-- Tab content -->
					<div class="tab-pane active" id="account-details">
					
						<!-- Row -->
						<div class="row-fluid">
						
							<!-- Column -->
							<div class="span6">
							
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">Company Name</label>
									<div class="controls">
										<input type="text" name="company_name" value="<?php echo stripslashes($brand->company_name);?>" class="textbox span10" />
										<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="First name is mandatory"><i></i></span>
									</div>
								</div>
								<!-- // Group END -->
								
						  <div class="control-group">
									<label class="control-label">Country</label>
									<div class="controls">
										<input type="text" name="country" class="span10" value="<?php //echo $brand->city;?>" />
										
									</div>
								</div>
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">City</label>
									<div class="controls">
										<input type="text" name="city" class="span10" value="<?php echo $brand->city;?>" />
										
									</div>
								</div>
								<!-- // Group END -->
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">State</label>
									<div class="controls">
                      <select name="sstate">
					     <option value="AL" <?php if($brand){ if($brand->sstate=='AL') echo 'selected="selected"';}?>>Alabama</option>
						<option value="AK" <?php if($brand){ if($brand->sstate=='AK') echo 'selected="selected"';}?>>Alaska</option>
						<option value="AZ" <?php if($brand){ if($brand->sstate=='AZ') echo 'selected="selected"';}?>>Arizona</option>
						<option value="AR" <?php if($brand){ if($brand->sstate=='AR') echo 'selected="selected"';}?>>Arkansas</option>
						<option value="CA" <?php if($brand){ if($brand->sstate=='CA') echo 'selected="selected"';}?>>California</option>
						<option value="CO" <?php if($brand){ if($brand->sstate=='CO') echo 'selected="selected"';}?>>Colorado</option>
						<option value="CT" <?php if($brand){ if($brand->sstate=='CT') echo 'selected="selected"';}?>>Connecticut</option>
						<option value="DE" <?php if($brand){ if($brand->sstate=='DE') echo 'selected="selected"';}?>>Delaware</option>
						<option value="DC" <?php if($brand){ if($brand->sstate=='DC') echo 'selected="selected"';}?>>District Of Columbia</option>
						<option value="FL" <?php if($brand){ if($brand->sstate=='FL') echo 'selected="selected"';}?>>Florida</option>
						<option value="GA" <?php if($brand){ if($brand->sstate=='GA') echo 'selected="selected"';}?>>Georgia</option>
						<option value="HI" <?php if($brand){ if($brand->sstate=='HI') echo 'selected="selected"';}?>>Hawaii</option>
						<option value="ID" <?php if($brand){ if($brand->sstate=='ID') echo 'selected="selected"';}?>>Idaho</option>
						<option value="IL" <?php if($brand){ if($brand->sstate=='IL') echo 'selected="selected"';}?>>Illinois</option>
						<option value="IN" <?php if($brand){ if($brand->sstate=='IN') echo 'selected="selected"';}?>>Indiana</option>
						<option value="IA" <?php if($brand){ if($brand->sstate=='IA') echo 'selected="selected"';}?>>Iowa</option>
						<option value="KS" <?php if($brand){ if($brand->sstate=='KS') echo 'selected="selected"';}?>>Kansas</option>
						<option value="KY" <?php if($brand){ if($brand->sstate=='KY') echo 'selected="selected"';}?>>Kentucky</option>
						<option value="LA" <?php if($brand){ if($brand->sstate=='LA') echo 'selected="selected"';}?>>Louisiana</option>
						<option value="ME" <?php if($brand){ if($brand->sstate=='ME') echo 'selected="selected"';}?>>Maine</option>
						<option value="MD" <?php if($brand){ if($brand->sstate=='MD') echo 'selected="selected"';}?>>Maryland</option>
						<option value="MA" <?php if($brand){ if($brand->sstate=='MA') echo 'selected="selected"';}?>>Massachusetts</option>
						<option value="MI" <?php if($brand){ if($brand->sstate=='MI') echo 'selected="selected"';}?>>Michigan</option>
						<option value="MN" <?php if($brand){ if($brand->sstate=='MN') echo 'selected="selected"';}?>>Minnesota</option>
						<option value="MS" <?php if($brand){ if($brand->sstate=='MS') echo 'selected="selected"';}?>>Mississippi</option>
						<option value="MO" <?php if($brand){ if($brand->sstate=='MO') echo 'selected="selected"';}?>>Missouri</option>
						<option value="MT" <?php if($brand){ if($brand->sstate=='MT') echo 'selected="selected"';}?>>Montana</option>
						<option value="NE" <?php if($brand){ if($brand->sstate=='NE') echo 'selected="selected"';}?>>Nebraska</option>
						<option value="NV" <?php if($brand){ if($brand->sstate=='NV') echo 'selected="selected"';}?>>Nevada</option>
						<option value="NH" <?php if($brand){ if($brand->sstate=='NH') echo 'selected="selected"';}?>>New Hampshire</option>
						<option value="NJ" <?php if($brand){ if($brand->sstate=='NJ') echo 'selected="selected"';}?>>New Jersey</option>
						<option value="NM" <?php if($brand){ if($brand->sstate=='NM') echo 'selected="selected"';}?>>New Mexico</option>
						<option value="NY" <?php if($brand){ if($brand->sstate=='NY') echo 'selected="selected"';}?>>New York</option>
						<option value="NC" <?php if($brand){ if($brand->sstate=='NC') echo 'selected="selected"';}?>>North Carolina</option>
						<option value="ND" <?php if($brand){ if($brand->sstate=='ND') echo 'selected="selected"';}?>>North Dakota</option>
						<option value="OH" <?php if($brand){ if($brand->sstate=='OH') echo 'selected="selected"';}?>>Ohio</option>
						<option value="OK" <?php if($brand){ if($brand->sstate=='OK') echo 'selected="selected"';}?>>Oklahoma</option>
						<option value="OR" <?php if($brand){ if($brand->sstate=='OR') echo 'selected="selected"';}?>>Oregon</option>
						<option value="PA" <?php if($brand){ if($brand->sstate=='PA') echo 'selected="selected"';}?>>Pennsylvania</option>
						<option value="RI" <?php if($brand){ if($brand->sstate=='RI') echo 'selected="selected"';}?>>Rhode Island</option>
						<option value="SC" <?php if($brand){ if($brand->sstate=='SC') echo 'selected="selected"';}?>>South Carolina</option>
						<option value="SD" <?php if($brand){ if($brand->sstate=='SD') echo 'selected="selected"';}?>>South Dakota</option>
						<option value="TN" <?php if($brand){ if($brand->sstate=='TN') echo 'selected="selected"';}?>>Tennessee</option>
						<option value="TX" <?php if($brand){ if($brand->sstate=='TX') echo 'selected="selected"';}?>>Texas</option>
						<option value="UT" <?php if($brand){ if($brand->sstate=='UT') echo 'selected="selected"';}?>>Utah</option>
						<option value="VT" <?php if($brand){ if($brand->sstate=='VT') echo 'selected="selected"';}?>>Vermont</option>
						<option value="VA" <?php if($brand){ if($brand->sstate=='VA') echo 'selected="selected"';}?>>Virginia</option>
						<option value="WA" <?php if($brand){ if($brand->sstate=='WA') echo 'selected="selected"';}?>>Washington</option>
						<option value="WV" <?php if($brand){ if($brand->sstate=='WV') echo 'selected="selected"';}?>>West Virginia</option>
						<option value="WI" <?php if($brand){ if($brand->sstate=='WI') echo 'selected="selected"';}?>>Wisconsin</option>
						<option value="WY" <?php if($brand){ if($brand->sstate=='WY') echo 'selected="selected"';}?>>Wyoming</option>
					</select>
										
									</div>
								</div>
								<!-- // Group END -->
								<div class="control-group">
									<label class="control-label">Website</label>
									<div class="controls">
										<input type="text" name="website" class="span10" value="<?php echo $brand->company_website;?>"/>
										
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Phone</label>
									<div class="controls">
										<input type="text" name="phone" value="<?php echo $brand->contact_phone;?>" class="span10" />
										
									</div>
								</div>
								
							</div>
							<!-- // Column END -->
							
							<!-- Column -->
							<div class="span6">
					
								
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">Year Company Founded</label>
									<div class="controls">
										<input type="text" name="company_age" value="<?php echo $brand->company_age;?>" class="span5" />
									</div>
								</div>
								<!-- // Group END -->
								
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">Number Of Products In Portfolio</label>
									<div class="controls">
										<input type="text" name="no_products" value="<?php echo $brand->no_products;?>" class="span5" />
									</div>
								</div>
								<!-- // Group END -->
								
							</div>
							<!-- // Column END -->
							
						</div>
						<!-- // Row END -->
						
						<div class="separator line bottom"></div>
						
						<!-- Group -->
						<div class="control-group row-fluid">
							<label class="control-label">Company Bio</label>
							<div class="controls">
							<?php
							$overview=stripslashes($brand->overview);
		                $overview=stripslashes($overview);
						?>
								<textarea id="mustHaveId" name="overview" class="wysihtml5 span12" rows="5"> <?php echo stripslashes($overview);?></textarea>
							</div>
						</div>
						<!-- // Group END -->
						<div class="separator line bottom"></div>
							<div class="control-group row-fluid">
				         	<label class="control-label">Tags</label>
						        <div class="controls">
						
						     	<input style="width:90%" type="text" name="tags" value="<?php if($brand) echo $brand->tags;?>" placeholder="Keywords for this brand, separated by comma"/> 
						      </div>
						     <!-- // Column END -->
						
				     	</div>
				    	<!-- // Row END -->
					
						
						
					</div>
					<!-- // Tab content END -->
					
					<!-- Tab content -->
					<div class="tab-pane" id="account-settings">
					
						<!-- Row -->
						<div class="row-fluid">
						
							<!-- Column -->
							<div class="span3">
								<strong>Change password</strong>
								<p class="muted">This information will not be public.</p>
							</div>
							<!-- // Column END -->
							
							<!-- Column -->
							<div class="span9">
								<label for="inputUsername">Username</label>
								<input type="text" id="inputUsername" class="span10" value="<?php echo $brand->username;?>" disabled="disabled" />
								<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Username can't be changed"><i></i></span>
								<div class="separator"></div>
										
								<label for="inputPasswordOld">Old password</label>
								<input type="password" name="old_pass" id="inputPasswordOld" class="span10" value="" placeholder="Leave empty for no change" />
								<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Leave empty if you don't wish to change the password"><i></i></span>
								<div class="separator"></div>
								
								<label for="inputPasswordNew">New password</label>
								<input name="pass1" type="password" id="inputPasswordNew" class="span12" value="" placeholder="Leave empty for no change" />
								<div class="separator"></div>
								
								<label for="inputPasswordNew2">Repeat new password</label>
								<input name="pass2" type="password" id="inputPasswordNew2" class="span12" value="" placeholder="Leave empty for no change" />
								<div class="separator"></div>
							</div>
							<!-- // Column END -->
							
						</div>
						<!-- // Row END -->
						
						<div class="separator line bottom"></div>
						
						<!-- Row -->
						<div class="row-fluid">
						
							<!-- Column -->
							<div class="span3">
								<strong>Contact details</strong>
							</div>
							<!-- // Column END -->
							
							<!-- Column -->
							<div class="span9">
								<label for="inputEmail">E-mail</label>
								<div class="input-prepend">
									<span class="add-on glyphicons envelope"><i></i></span>
									<input type="text" name="email" id="inputEmail" class="input-large" value="<?php echo $brand->contact_email;?>" />
								</div>
								<div class="separator"></div>
							</div>
							<!-- // Column END -->
							
						</div>
						<!-- // Row END -->
						
						
						
						<div class="separator line bottom"></div>
						
						<!-- Row -->
						<div class="row-fluid">
						
							<!-- Column -->
							<div class="span3">
								<strong>Social Media</strong>
								<p class="muted">Include your social media links so users can engage with you everywhere.</p>
							</div>
							<!-- // Column END -->
						
							<!-- Column -->
							<div class="span9">
								<div class="row-fluid">
									<div class="span6">
										<label for="inputFacebook">Facebook</label>
										<div class="input-prepend">
											<span class="add-on sm-facebook facebook"></span>
											<input type="text" id="inputFacebook" name="facebook" class="input-large" value="<?php echo $brand->facebook;?>" placeholder="i.e. http://www.facebook.com/hairlibrary" />
										</div>
										<div class="separator"></div>
										<label for="inputTwitter">Google Plus</label>
										<div class="input-prepend">
											<span class="add-on sm-google google-plus"><i></i></span>
											<input type="text" id="inputGoogleplus" name="googleplus" class="input-large" value="<?php echo $brand->googleplus;?>" placeholder="i.e. http://www.google.com/hairlibrary"/>
										</div>

										<div class="separator"></div>
										<label for="inputTwitter">Youtube</label>
										<div class="input-prepend">
											<span class="add-on sm-youtube youtube"><i></i></span>
											<input type="text" id="inputYoutube" name="youtube" class="input-large" value="<?php echo $brand->youtube;?>" placeholder="i.e. http://www.youtube.com/hairlibrary"/>
										</div>

										<div class="separator"></div>
											
										
									
									</div>
									<div class="span6">
										
										
										<label for="inputTwitter">Twitter</label>
										<div class="input-prepend">
											<span class="add-on sm-twitter twitter"><i></i></span>
											<input type="text" id="inputTwitter" name="twitter" class="input-large" value="<?php echo $brand->twitter;?>" placeholder="i.e. http://www.twitter.com/hairlibrary"/>
										</div>
										<div class="separator"></div>
											
										<label for="inputThumblr">Tumblr</label>
										<div class="input-prepend">
											<span class="add-on sm-tumblr thumblr"><i></i></span>
											<input type="text" id="inputThumblr" name="thumblr" class="input-large" value="<?php echo $brand->thumblr;?>" placeholder="i.e. http://www.tumblr.com/hairlibrary"/>
										</div>
										<div class="separator"></div>
										
										<label for="inputTwitter">Instagram</label>
										<div class="input-prepend">
											<span class="add-on sm-instagram instagram"><i></i></span>
											<input type="text" id="inputInstagram" name="instagram" class="input-large" value="<?php echo $brand->instagram;?>" placeholder="i.e. http://www.instagram.com/hairlibrary"/>
										</div>

										<div class="separator"></div>
										
										
									</div>
								</div>
							</div>
							<!-- // Column END -->
							
						</div>
						<!-- // Row END -->
						
						
						
						
						<div class="separator line bottom"></div>
						
						<!-- Row -->
						<div class="row-fluid">
						
							<!-- Column -->
							<div class="span3">
								<strong>Profile Picture</strong>
								<p class="muted">Add a photo or logo that most clearly represents your brand
.</p>
							</div>
							<!-- // Column END -->
							
							<!-- Column -->
							<div class="span9">
								<div class="row-fluid">
								   <div class="span3 pro-img"><img alt="profile" src="<?php echo $thumbpath ?>"/></div>
                                    <div class="span6"><input type="file" name="filedata" /></div>								   
								</div>
							</div>
							<!-- // Column END -->
							
						</div>
						<!-- // Row END -->
							<div class="separator line bottom"></div>
						
						<!-- Row -->
						<div class="row-fluid">
						
							<!-- Column -->
							<div class="span3">
								<strong>Embed Video</strong>
								<p class="muted">Add a video that most clearly represents your brand
.</p>
							</div>
							<!-- // Column END -->
							
							<!-- Column -->
							<div class="span9">
								<div class="row-fluid">
								    <input type="checkbox" name="show_video" value="1" <?php if($brand->show_video==1) echo 'checked="checked"';?>/> Enable Video?<br/><br/>
                            <textarea style="width:80%;" name="embed_video" placeholder="Embed Code here (460x250)"><?php echo getFormatedDes($brand->embed_video);?></textarea>							   
								</div>
							</div>
							<!-- // Column END -->
							
						</div>
						<!-- // Row END -->
						
						
					</div>
					<!-- // Tab content END -->
					<div class="tab-pane" id="shipping-settings">
					<div class="row-fluid">
				    	<div class="span4" style="width:160px">
					     <label style="width:100%;text-align:left" class="control-label">Drop Shipping Setting:</label>
				   	    </div>
					    <div class="span5">
					        <div class="controls" style="margin-left:0; padding-top: 7px;">
					            <input style="margin-top:-1px" <?php if($brand->allow_dropshipping=='Yes')echo 'checked="checked"';?> type="checkbox" value="Yes" id="allow_dropshipping" name="allow_dropshipping[]"> Enable Drop Shipping?
					        </div>
					   </div>
					</div>
					
						<div class="separator line bottom"></div>
						<div class="row-fluid">
							<div class="span6">
							<p class="muted" style="color:#111;margin:10px 0 30px"><strong>Warehouse Shipping Info</strong><br>Generate
 the address of where your products will be shipping from to provide accurate shipping rates.</p>
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">Warehouse Facility Name</label>
									<div class="controls">
										<input type="text" id="warehouse_name" name="dswarehouse_name" value="<?php echo stripslashes($shipping->warehouse_name);?>" class="textbox span10" />
										<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="First name is mandatory"><i></i></span>
									</div>
								</div>
								<!-- // Group END -->
								
						
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">Street Address</label>
									<div class="controls">
					<input type="text" id="street_address" name="dsstreet_address" class="span10" value="<?php echo stripslashes($shipping->street_address);?>" />
										
									</div>
								</div>
								<!-- // Group END -->
								
								<!-- Group -->
								<!--<div class="control-group">
									<label class="control-label">Address</label>
									<div class="controls">
								<input type="text" id="address" name="dsaddress" class="span10" value="<?php echo stripslashes($shipping->address);?>" />
										
									</div>
								</div>-->
								<!-- // Group END -->
								
						
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">City</label>
									<div class="controls">
										<input type="text" id="city" name="dscity" class="span10" value="<?php echo stripslashes($shipping->city);?>" />
										
									</div>
								</div>
								<!-- // Group END -->
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">State</label>
									<div class="controls">
                      <select id="dsbstate" name="dsbstate">
					     <option value="AL" <?php if($shipping){ if($shipping->bstate=='AL') echo 'selected="selected"';}?>>Alabama</option>
						<option value="AK" <?php if($shipping){ if($shipping->bstate=='AK') echo 'selected="selected"';}?>>Alaska</option>
						<option value="AZ" <?php if($shipping){ if($shipping->bstate=='AZ') echo 'selected="selected"';}?>>Arizona</option>
						<option value="AR" <?php if($shipping){ if($shipping->bstate=='AR') echo 'selected="selected"';}?>>Arkansas</option>
						<option value="CA" <?php if($shipping){ if($shipping->bstate=='CA') echo 'selected="selected"';}?>>California</option>
						<option value="CO" <?php if($shipping){ if($shipping->bstate=='CO') echo 'selected="selected"';}?>>Colorado</option>
						<option value="CT" <?php if($shipping){ if($shipping->bstate=='CT') echo 'selected="selected"';}?>>Connecticut</option>
						<option value="DE" <?php if($shipping){ if($shipping->bstate=='DE') echo 'selected="selected"';}?>>Delaware</option>
						<option value="DC" <?php if($shipping){ if($shipping->bstate=='DC') echo 'selected="selected"';}?>>District Of Columbia</option>
						<option value="FL" <?php if($shipping){ if($shipping->bstate=='FL') echo 'selected="selected"';}?>>Florida</option>
						<option value="GA" <?php if($shipping){ if($shipping->bstate=='GA') echo 'selected="selected"';}?>>Georgia</option>
						<option value="HI" <?php if($shipping){ if($shipping->bstate=='HI') echo 'selected="selected"';}?>>Hawaii</option>
						<option value="ID" <?php if($shipping){ if($shipping->bstate=='ID') echo 'selected="selected"';}?>>Idaho</option>
						<option value="IL" <?php if($shipping){ if($shipping->bstate=='IL') echo 'selected="selected"';}?>>Illinois</option>
						<option value="IN" <?php if($shipping){ if($shipping->bstate=='IN') echo 'selected="selected"';}?>>Indiana</option>
						<option value="IA" <?php if($shipping){ if($shipping->bstate=='IA') echo 'selected="selected"';}?>>Iowa</option>
						<option value="KS" <?php if($shipping){ if($shipping->bstate=='KS') echo 'selected="selected"';}?>>Kansas</option>
						<option value="KY" <?php if($shipping){ if($shipping->bstate=='KY') echo 'selected="selected"';}?>>Kentucky</option>
						<option value="LA" <?php if($shipping){ if($shipping->bstate=='LA') echo 'selected="selected"';}?>>Louisiana</option>
						<option value="ME" <?php if($shipping){ if($shipping->bstate=='ME') echo 'selected="selected"';}?>>Maine</option>
						<option value="MD" <?php if($shipping){ if($shipping->bstate=='MD') echo 'selected="selected"';}?>>Maryland</option>
						<option value="MA" <?php if($shipping){ if($shipping->bstate=='MA') echo 'selected="selected"';}?>>Massachusetts</option>
						<option value="MI" <?php if($shipping){ if($shipping->bstate=='MI') echo 'selected="selected"';}?>>Michigan</option>
						<option value="MN" <?php if($shipping){ if($shipping->bstate=='MN') echo 'selected="selected"';}?>>Minnesota</option>
						<option value="MS" <?php if($shipping){ if($shipping->bstate=='MS') echo 'selected="selected"';}?>>Mississippi</option>
						<option value="MO" <?php if($shipping){ if($shipping->bstate=='MO') echo 'selected="selected"';}?>>Missouri</option>
						<option value="MT" <?php if($shipping){ if($shipping->bstate=='MT') echo 'selected="selected"';}?>>Montana</option>
						<option value="NE" <?php if($shipping){ if($shipping->bstate=='NE') echo 'selected="selected"';}?>>Nebraska</option>
						<option value="NV" <?php if($shipping){ if($shipping->bstate=='NV') echo 'selected="selected"';}?>>Nevada</option>
						<option value="NH" <?php if($shipping){ if($shipping->bstate=='NH') echo 'selected="selected"';}?>>New Hampshire</option>
						<option value="NJ" <?php if($shipping){ if($shipping->bstate=='NJ') echo 'selected="selected"';}?>>New Jersey</option>
						<option value="NM" <?php if($shipping){ if($shipping->bstate=='NM') echo 'selected="selected"';}?>>New Mexico</option>
						<option value="NY" <?php if($shipping){ if($shipping->bstate=='NY') echo 'selected="selected"';}?>>New York</option>
						<option value="NC" <?php if($shipping){ if($shipping->bstate=='NC') echo 'selected="selected"';}?>>North Carolina</option>
						<option value="ND" <?php if($shipping){ if($shipping->bstate=='ND') echo 'selected="selected"';}?>>North Dakota</option>
						<option value="OH" <?php if($shipping){ if($shipping->bstate=='OH') echo 'selected="selected"';}?>>Ohio</option>
						<option value="OK" <?php if($shipping){ if($shipping->bstate=='OK') echo 'selected="selected"';}?>>Oklahoma</option>
						<option value="OR" <?php if($shipping){ if($shipping->bstate=='OR') echo 'selected="selected"';}?>>Oregon</option>
						<option value="PA" <?php if($shipping){ if($shipping->bstate=='PA') echo 'selected="selected"';}?>>Pennsylvania</option>
						<option value="RI" <?php if($shipping){ if($shipping->bstate=='RI') echo 'selected="selected"';}?>>Rhode Island</option>
						<option value="SC" <?php if($shipping){ if($shipping->bstate=='SC') echo 'selected="selected"';}?>>South Carolina</option>
						<option value="SD" <?php if($shipping){ if($shipping->bstate=='SD') echo 'selected="selected"';}?>>South Dakota</option>
						<option value="TN" <?php if($shipping){ if($shipping->bstate=='TN') echo 'selected="selected"';}?>>Tennessee</option>
						<option value="TX" <?php if($shipping){ if($shipping->bstate=='TX') echo 'selected="selected"';}?>>Texas</option>
						<option value="UT" <?php if($shipping){ if($shipping->bstate=='UT') echo 'selected="selected"';}?>>Utah</option>
						<option value="VT" <?php if($shipping){ if($shipping->bstate=='VT') echo 'selected="selected"';}?>>Vermont</option>
						<option value="VA" <?php if($shipping){ if($shipping->bstate=='VA') echo 'selected="selected"';}?>>Virginia</option>
						<option value="WA" <?php if($shipping){ if($shipping->bstate=='WA') echo 'selected="selected"';}?>>Washington</option>
						<option value="WV" <?php if($shipping){ if($shipping->bstate=='WV') echo 'selected="selected"';}?>>West Virginia</option>
						<option value="WI" <?php if($shipping){ if($shipping->bstate=='WI') echo 'selected="selected"';}?>>Wisconsin</option>
						<option value="WY" <?php if($shipping){ if($shipping->bstate=='WY') echo 'selected="selected"';}?>>Wyoming</option>
					</select>
										
									</div>
								</div>
								<!-- // Group END -->
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">Zip Code</label>
									<div class="controls">
										<input type="text" id="zip" name="dszip" class="span10" value="<?php echo $shipping->zip;?>" />
										
									</div>
								</div>
								<!-- // Group END -->
								<div class="control-group">
									<label class="control-label">Country</label>
									<div class="controls">
										<input type="text" id="country" name="dscountry" class="span10" value="<?php echo $shipping->country;?>"/>
										
									</div>
								</div>
								<!-- // Group END -->
							</div><!--span6 end-->
							<div class="span6">
								<!-- // Group END -->
								<!-- Group -->
								<p class="muted" style="color:#111;margin:10px 0 30px"><strong>Order Notification</strong><br>
Provide emails of those whom need to be notified of all order related notifications</p>
								<div class="control-group">
									<div class="row-fluid">
										<div class="span4">
											<label class="control-label">Email1:</label>
										</div>
										<div class="span8">
											<div class="input-prepend">
												<span class="add-on glyphicons envelope"><i></i></span>
												<input type="text" id="email1" name="dsemail1" id="inputEmail" class="input-large" value="<?php echo $shipping->email1;?>" />
																						
											</div>
										</div>  
									</div>
								</div>
								<!-- // Group END -->
								<!-- Group -->
								<div class="control-group">
									<div class="row-fluid">
										<div class="span4">
											<label class="control-label" for="inputSkype">Email2:</label>
										</div>
										<div class="span8">
											<div class="input-prepend">
													<span class="add-on glyphicons envelope"><i></i></span>
													<input name="dsemail2" type="text" id="inputSkype" class="input-large" value="<?php echo $shipping->email2;?>" />										
											</div>
										</div>  
									</div>
								</div>
								<!-- // Group END -->
								<div class="control-group">
									<div class="row-fluid">
										<div class="span4">
									<label class="control-label" for="inputYahoo">Email3:</label>
									</div>
										<div class="span8">
									<div class="input-prepend">
										<span class="add-on glyphicons envelope"><i></i></span>
							<input name="dsemail3" type="text" id="inputYahoo" class="input-large" value="<?php echo $shipping->email3;?>" />
										
									</div>
								</div>	
	                               </div>								
							</div>
							
							<div class="control-group">
									<div class="row-fluid">
										<div class="span4">
									<label class="control-label" for="inputYahoo">Email4:</label>
									</div>
										<div class="span8">
									<div class="input-prepend">
										<span class="add-on glyphicons envelope"><i></i></span>
						<input name="dsemail4" type="text" id="inputYahoo" class="input-large" value="<?php echo $shipping->email4;?>" />
										
									</div>
								</div>	
	                               </div>								
							</div>
							
							
						</div>
						<div class="clear"></div>
						<div class="separator line bottom"></div>
						<div class="control-group return_policy row-fluid">
							<div class="span12">
								<label class="control-label">Return Policy</label>
								<div class="controls">
								<?php
							//$return_policies=stripslashes($brand->return_policies);
						?>
									<textarea name="return_policies"><?php echo stripslashes($shipping->return_policies);?></textarea>
								</div>
							</div>
						</div>
					</div>
					</div>
					
					
					
					<div class="tab-pane" id="payment-settings">
						<div class="row-fluid">
						<div class="span6" style="margin:30px 0">
						<p style="margin-bottom:20px">Provide the email connected to the PayPal account where your payment is to be transferred.</p>
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">Paypal Email:</label>
									<div class="controls">
					<input type="text" name="paypal_email" class="span10" value="<?php echo $shipping->paypal_email;?>" />
								   </div>
			
				      	     </div>
							 <p style="margin-bottom:20px">*Note all transfers are made on the 1st of every month with the previous month's invoice found <a href="http://hairlibrary.com/invoice/" style="color:#D9197E">HERE.</a></p>
						</div>
						<div class="span5">
						<img style="margin-left:40px" src="<?php bloginfo('template_url');?>/brand-admin/images/PayPal1.png" width="240"/>
						</div>
						</div>
					</div>
					
					
					<!-- Form actions -->
						<div class="form-actions" style="margin:30px 0 15px;">
							<button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save changes</button>
						
						</div>
						<!-- // Form actions END -->
				
				<input type="hidden" name="id" value="<?php echo $brand->id;?>"/>
				<input type="hidden" name="user_id" value="<?php echo $brand->user_id;?>"/>
				
				
				
			</form>
		</div>
	</div>
	<!-- // Widget END -->
	
</div>
<script>
	function validate_drop_shipping(){
		var warehouse_name = document.forms["account_setting_form"]["dswarehouse_name"].value;
		var street_address = document.forms["account_setting_form"]["dsstreet_address"].value;
		var address = document.forms["account_setting_form"]["dsaddress"].value;
		var city = document.forms["account_setting_form"]["dscity"].value;
		var zip = document.forms["account_setting_form"]["dszip"].value;
		var country = document.forms["account_setting_form"]["dscountry"].value;
		var email1 = document.forms["account_setting_form"]["dsemail1"].value;								
		var allow_dropshipping = document.forms["account_setting_form"]["allow_dropshipping"].checked;
		if(allow_dropshipping){
			if( street_address=="" || warehouse_name=="" || address=="" || zip=="" || email1=="" || city==""){
				alert("Please Fill Warehouse Shipping Info and Order Notification Email1");
				return false;
			} 
			else{
				return true;
			}
		}
		else{
			return true;
		}
	}
</script>

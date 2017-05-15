<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$salon=array();

	$salon['facebook']=$_POST['facebook'];
	$salon['googleplus']=$_POST['googleplus'];
	$salon['youtube']=$_POST['salon_youtube'];
	$salon['twitter']=$_POST['twitter'];
	$salon['tumblr']=$_POST['tumblr'];
	$salon['instagram']=$_POST['instagram'];	
	
	if(isset($_POST['save_salon'])){
		updateSalon($salon);
		//var_dump($salon);   
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
						
							<!-- Column -->
							<div class="span3">
								<strong>Social Media</strong>
								<p class="muted">Include your social media links so users can engage with you everywhere.</p>
							</div>
							<!-- // Column END -->
						
							<!-- Column -->
							<div class="span9">
								
										<label for="inputFacebook">Facebook</label>
										<div class="input-prepend">
											<span class="add-on sm-facebook facebook"></span>
											<input type="text" id="inputFacebook" name="facebook" class="input-large" value="<?php echo $salon->facebook;?>" placeholder="i.e. http://www.facebook.com/hairlibrary" />
										</div>
										<div class="separator"></div>
										<label for="inputTwitter">Google Plus</label>
										<div class="input-prepend">
											<span class="add-on sm-google google-plus"><i></i></span>
											<input type="text" id="inputGoogleplus" name="googleplus" class="input-large" value="<?php echo $salon->googleplus;?>" placeholder="i.e. http://www.google.com/hairlibrary"/>
										</div>

										<div class="separator"></div>
										<label for="inputTwitter">Youtube</label>
										<div class="input-prepend">
											<span class="add-on sm-youtube youtube"><i></i></span>
											<input type="text" id="inputYoutube" name="salon_youtube" class="input-large" value="<?php echo $salon->youtube;?>" placeholder="i.e. http://www.youtube.com/hairlibrary"/>
										</div>

										<label for="inputTwitter">Twitter</label>
										<div class="input-prepend">
											<span class="add-on sm-twitter twitter"><i></i></span>
											<input type="text" id="inputTwitter" name="twitter" class="input-large" value="<?php echo $salon->twitter;?>" placeholder="i.e. http://www.twitter.com/hairlibrary"/>
										</div>
										<div class="separator"></div>
											
										<label for="inputThumblr">Tumblr</label>
										<div class="input-prepend">
											<span class="add-on sm-tumblr thumblr"><i></i></span>
											<input type="text" id="inputThumblr" name="tumblr" class="input-large" value="<?php echo $salon->thumblr;?>" placeholder="i.e. http://www.tumblr.com/hairlibrary"/>
										</div>
										<div class="separator"></div>
										
										<label for="inputTwitter">Instagram</label>
										<div class="input-prepend">
											<span class="add-on sm-instagram instagram"><i></i></span>
											<input type="text" id="inputInstagram" name="instagram" class="input-large" value="<?php echo $salon->instagram;?>" placeholder="i.e. http://www.instagram.com/hairlibrary"/>
										</div>

										<div class="separator"></div>
										
										
									
								
							</div>
							<!-- // Column END -->
						
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

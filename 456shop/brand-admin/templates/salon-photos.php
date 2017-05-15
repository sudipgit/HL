<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$salon=array();

	$salon['is_video'] = $_POST['is_video'];
	$salon['video'] = $_POST['video'];
	
	if(isset($_POST['save_salon'])){
		updateSalon($salon);
		//var_dump($salon);   
	}
}
	$current_user=wp_get_current_user();
	$salon_id = $current_user->ID;
$salon=getSalonInfo($salon_id);
	
$msg = "";
if ( 
	isset( $_POST['my_image_upload_nonce'], $_POST['post_id'] ) 
	&& wp_verify_nonce( $_POST['my_image_upload_nonce'], 'my_image_upload' )
	&& current_user_can( 'edit_post', $_POST['post_id'] )
) {
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	require_once( ABSPATH . 'wp-admin/includes/media.php' );
	
	$attachment_id = media_handle_upload( 'my_image_upload', $_POST['post_id'] );
		
	if ( is_wp_error( $attachment_id ) ) {
		$msg = "There was an error uploading the image.";
	} else {
		$msg = "The image was uploaded successfully!";
	}

}else {
	$msg = "The security check failed!";
} 




?>
<div id="main" class="wrap salon-profile">

             <div class="row-fluid salon-profile-registration" style="padding-top:0">
			    <h3 class="pagetitle"></h3>
				
				<div class="setting-form">
				
				 <form id="featured_upload" method="post" action="#" enctype="multipart/form-data">
					   <div id="productPhotosTab" class="tab-pane active">
				 <!-- Row -->
					<div class="row-fluid" style="margin-bottom:30px;">
					
						<!-- Column -->
						<div class="span3">
							<strong>Salon Owner Image</strong>							
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						
						<div class="span9">
						<input type="file" name="upload_attachment[]">
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					<hr class="separator bottom">
					<!-- Row -->
					<div class="row-fluid" style="margin-bottom:30px;">
					
						<!-- Column -->
						<div class="span3">
							<strong> Featured Salon Image</strong>
							<p class="muted">Put Your BEST Foot Forward.<br>Image size must be 600x600</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						
						<div class="span9">
						<input type="file" name="upload_attachment[]">
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					<hr class="separator bottom">
					 <!-- Row -->
					<div class="row-fluid" style="margin-bottom:30px;">
					
						<!-- Column -->
						<div class="span3">
							<strong> Additional Salon Images</strong>
							<p class="muted">Image size must be 600x600</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<input type="file" name="image1"><br><br>
							<input type="file" name="image2"><br><br>
							<input type="file" name="image3"><br><br>
							<input type="file" name="image4">
                            
						</div>
						<!-- // Column END -->
						
					</div>
					
					<hr class="separator bottom">
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
								    <input type="checkbox" name="is_video" value="1" <?php if($salon->is_video==1) echo 'checked="checked"';?>/> Enable Video?<br/><br/>
                            <textarea style="width:80%;" name="video" placeholder="Embed Code here (460x250)"><?php echo $salon->video;?></textarea>							   
								</div>
							</div>
							<!-- // Column END -->
							
						</div>
						<!-- // Row END -->
					<hr class="separator bottom">
				</div>
 
					 <div>
						<input type="hidden" name="salon_id" value="<?php echo $salon->id;?>" />
						 <input type="hidden" name="user_id"	value="<?php echo $current_user->ID;?>"/>
						<input type="submit" name="save_salon" value="Save" class="button"/>
					 </div>
				 
				  
				  <!--<input type="file" name="my_image_upload" id="my_image_upload"  multiple="false" />
	<input type="hidden" name="post_id" id="post_id" value="55" />
	<?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
	<input id="submit_my_image_upload" name="submit_my_image_upload" type="submit" value="Upload" />
				  -->
				  </form>
				
				
				
				
				</div>
			 
			 
			 </div>
			 </div>

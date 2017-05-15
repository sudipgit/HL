<?php
/*
   Template Name: Photo Upload Template2

*/
 
$user=wp_get_current_user();
if(isset($_GET['id']) && $_GET['id']>0)
 $photoid=$_GET['id'];
 else
$photoid=null;
if($photoid){
//Source: functions/photostore.php
//returns photo details given photo id
$photo=getPhotoDetails($photoid);
}else
$photo=null;

$biz=null;
$product_id=null;
if(isset($_GET['biz']))
$biz=$_GET['biz'];

if(isset($_GET['pt']))
{
$product_id = $wpdb->get_var("SELECT ID FROM wp_posts WHERE post_name = '".$_GET['pt']."'");

}


if($photoid && $user->ID >0 && $photo->user_id!=$user->ID){
?>
 <script>
 window.location.href = 'http://hairlibrary.com/my-hairstory/?id=<?php echo $user->ID;?>';
 </script>
<?php
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$message="";
//Source: functions/photostore.php
  if($pid=saveStoryPhoto($_POST,$_FILES))
  {
    $message="Photo Uploaded Successfully";
	 ?>
 <script>
 window.location.href = '<?php echo getPhotoLink($pid);?>';
 </script>
 
 <?php	
	
	}
	else
	 $message="Photo Upload Error";


}


 if( $user->ID < 1) {
 ?>
 <script>
 window.location.href = 'http://hairlibrary.com/login/';
 

 
 
 </script>
 
 <?php	
 }

?>

<script>
 function formValidation()
 {
  var mess="";
  var title=$('[name=title]').val();

  var des=$('#description').val();

  var tags=$('[name=texttags]').val();
  
  var filename=$('#filedata').val();

var is_valid1=0;
  var cboxes = document.getElementsByName('category_tags[]');
   var len = cboxes.length;
       for (var i=0; i<len; i++) {
		if(cboxes[i].checked==true)
			{
				is_valid1=1;
			}
			
		}
	
		
 if(title=="")
    mess=mess+'<p><span>*</span>Add A Hair Story Title</p>';   
 if(des=="" || des==' ')
    mess=mess+'<p><span>*</span>Add Your Hair Story</p>'; 
	 if(tags=="")
    mess=mess+'<p><span>*</span>Add One Or More Text Tags</p>'; 

	if(filename=="")
    mess=mess+'<p><span>*</span>Add A Photo</p>'; 
	
		
  if(is_valid1==0)	
   mess=mess+'<p><span>*</span>Select Hair Category</p>';  
  
  if(mess=="")
  {
 
	 return true;
  }
  else
  {
  $('#invalid-message').html(mess);
 $('#popup-validation-outer').show();
    return false;

  }
 return false;
 }
 


</script>

<?php get_header(); ?>

 <link href="<?php bloginfo('url'); ?>/wp-content/themes/456shop/brand-admin/css/custom.css" rel="stylesheet" />	
		<div id="main" class="wrap-page photo-upload">
			<div class="container">
			<div class="innerLR">

	           <!-- Widget -->
			   
			   
			   
				<div class="widget-heading"><h3 class="heading">Add Your Hair Story</h3></div><div class="clearfix"></div>
	             <div class="widget widget-tabs border-bottom-none">
	              <div class="profile-info">
				  		<?php if($photoid){ ?>
			       <div id="delete-ptoto-popup-outer">
				     <div id="delete-ptoto-popup">
				     <p>Are you sure want to detete the photo?</p>
				     <form action="http://hairlibrary.com/delete.php" method="post" id="delete-photo">
					  <input type="hidden" name="id" value="<?php echo $photoid;?>"/>
					   <input type="hidden" name="uid" value="<?php echo $user->ID ;?>"/>
					 <div class="sub-button"><a href="javascript:void();" class="button"  id="close-alert">No</a> <input class="button"  type="submit" value="Yes" /></div>
					 </form>
					 
				     </div>
				   </div>
			       <div id="delete-photo-button"><button class="button" id="showDeletePopup">Delete Hair Story</button></div>
			<?php } else {?>
				  <?php 
				  /**
					Source: functions/ usrs.php
					Returns user's thumb path of given current user
					 **/
				  $thumbpath=getThumbPath($user->ID);?>
				  <a href="<?php bloginfo('url');?>/profile/?id=1">
				     <?php //getUserHairStyle: returns appropriate css class name for specific user.?>
					 <div class="thumb mini-circle <?php echo getUserHairStyle($user->ID);?>">
						<div class="inner-round">
						<img alt="profile" class="user-thumb" width="60" src="<?php echo $thumbpath;?>" >
						</div>
						</div>
						<span class="desktop-display"><?php echo $user->first_name;?></span>
				 </a><?php } ?>
				  </div>
	          	<!-- Widget heading -->
	        	
		        	     	<div id="popup-validation-outer">
			<div id="popup-validation">
				<div id="invalid-message">Please fill all required(*) Fields.</div>
				<a href="javascript:void()" id="popup-validation-close">OK</a>
			</div>
		</div>      
		         
		        <!-- // Widget heading END -->
		
		<div class="widget-body">
	          <p style="color:#444;text-align:center;font-size:16px;"><?php echo $message;?></p> 
			 <form action="" method="post" enctype="multipart/form-data" onsubmit="return formValidation();">
				
				<div class="row-fluid">
					<div class="span9">
					   <ul>
						   <li>
							  <label class="headlabel">title</label>
							  <input class="text" type="text" name="title" placeholder="Title Your Story" value="<?php if($photo) echo getFormatedDes($photo->title);?>">
							</li>
							  <li>
							<label class="headlabel">Hair Story</label>
							 
							<textarea id="description" name="description" placeholder="Tell It How It Is"><?php if($photo) echo getFormatedDes($photo->description);?></textarea>
							  </li>
							  <li >
							<label class="headlabel">Product Tags</label>
							<?php if($product_id){ 
							 $ppost=get_post($product_id);
							 
							  /**
								Source:functions/brandadmin.php
								returns Brand info of given brand id**/
							 $brand= get_brand_info($ppost->post_author);
							?>
							<div class="tagged-product-img">
							<?php echo get_the_post_thumbnail($product_id, array(150,150) );?>
							 <div class="details">
							 <h3><?php echo $ppost->post_title;?></h3>
							  <p>By <?php echo getFormatedDes($brand->company_name);?></p>
							 <div class="heart-button section">
                                <a class="like-button after-like" title="" href="javascript:void();" style=""></a>
                                <span>
								
								<?php 
								 //returns total likes of this product
								echo getTotalLike($product_id,'product');?> 
								
								</span>
                                 </div>
							 </div>
							 <div class="clear"></div>
							 </div>
					     	<?php } else {?>
							 <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Photo Upload') );?>
							 <?php } ?>
							</li>
							  <li>

							<label class="headlabel">Text Tags</label>
							<input class="text" type="text" name="texttags" placeholder="Separate Tags With Commas "  value="<?php if($photo) echo getFormatedDes($photo->title);?>">
							</li>
						</ul>
					</div>
					<div class="span3">
					<ul>
						<li>
							<label class="headlabel">Add Photo</label>
							<div class="row-fluid">
								<div class="span6">
									<div class="preview-thumb">
									    <?php if($photo){?>
										<img alt="photostore" width="100" src="<?php bloginfo('url');?>/wp-content/uploads/photostore/<?php echo date('Y',$photo->created);?>/<?php echo $photo->photo;?>"/>
										<?php } else {?>
										<img src="<?php bloginfo('url');?>/wp-content/themes/456shop/assets/img/placeholder.png" width="100" alt=" Thumbnail" /><?php } ?>
									</div>
								</div>
                                  <?php if(!$photo) { ?>
								<input style="width:200px;margin-top:10px" class="photo" id="filedata" type="file" name="filedata" />
								<?php } ?>
							</div>	
						</li>
						<li>
							<label class="headlabel">Add Video</label>
							<!--<textarea class="video-textarea" name="addvedio" placeholder="Paste your video embed code and adjust the video size to 380x200"><?php if($photo) echo getFormatedDes($photo->video);?></textarea>-->
							<input type="text" name="addvedio" placeholder="Youtube video url" value="<?php if($photo) echo getFormatedDes($photo->video);?>"/>
						</li>
                         <?php 
		              if($photo)
		               {
		                 $answers=array();
                          $answers=explode('-',$photo->category_tags);
	  
	                  }
		            ?>

						<li>
							<label class="headlabel">Hair Category Tag</label>
							<ul class="hair-cat">
								<li><input type="checkbox" <?php if($photo && in_array('7',$answers)) echo 'checked="checked"';?> name="category_tags[]" value="7"/>Naturally Straight </li>
								<li> <input type="checkbox" <?php if($photo && in_array('2',$answers)) echo 'checked="checked"';?> name="category_tags[]" value="2"/>Naturally Curly</li>
								<li><input type="checkbox" <?php if($photo && in_array('1',$answers)) echo 'checked="checked"';?> name="category_tags[]" value="1"/>Locks </li>
								<li><input type="checkbox" <?php if($photo && in_array('8',$answers)) echo 'checked="checked"';?> name="category_tags[]" value="8"/>Wigs </li>
								<li><input type="checkbox" <?php if($photo && in_array('3',$answers)) echo 'checked="checked"';?> name="category_tags[]" value="3"/>Braids </li>
								<li><input type="checkbox" <?php if($photo && in_array('4',$answers)) echo 'checked="checked"';?> name="category_tags[]" value="4"/>Relaxed Straight </li>
								<li><input type="checkbox" <?php if($photo && in_array('5',$answers)) echo 'checked="checked"';?> name="category_tags[]" value="5"/>Hair Extensions</li>
								<li><input type="checkbox" <?php if($photo && in_array('6',$answers)) echo 'checked="checked"';?> name="category_tags[]" value="6"/>Hair Color </li>
								<li><input type="checkbox" <?php if($photo && in_array('9',$answers)) echo 'checked="checked"';?> name="category_tags[]" value="9"/>Permed Curly</li>
							</ul>
                        </li>	
					</ul>						 
					</div>	
					<div class="clear"></div>
                <input type="hidden" name="tag_pro_id" id="tag_product_id" value="<?php echo $product_id;?>"/>
			    <input type="hidden" name="id"  value="<?php echo $photoid;?>"/>
				<input type="hidden" name="user_id" value="<?php echo $user->ID;?>"/>
				<input type="hidden" name="biz" value="<?php echo $biz;?>"/>
				<input type="submit" class="button primary-button" value="<?php if($photo) echo 'Update Story'; else echo 'Submit Your Story';?>">
				
				</div> 
				
			</form>
</div></div>
</div>
			</div>
			
		</div>
   		
		<script>
		  $('#showDeletePopup').click(function(){
		      $('#delete-ptoto-popup-outer').fadeIn();
		  });
		  
		  $('#close-alert').click(function(){
		      $('#delete-ptoto-popup-outer').fadeOut();
		  });
		 $('#popup-validation-close').click(function(){
            $('#popup-validation-outer').hide();
    
            })

		
		</script> 
		    
<?php get_footer(); ?>
	
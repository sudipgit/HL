<?php
/*
   Template Name: Photo Upload Template

*/
 

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$message="";
  if(saveStoryPhoto($_POST,$_FILES))
  {
    $message="Photo Uploaded Successfully";
	 ?>
 <script>
 window.location.href = 'http://hairlibrary.com/customer-profile/?m=story';
 </script>
 
 <?php	
	
	}
	else
	 $message="Photo Upload Error";


}

$user=wp_get_current_user();
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
  v1=document.getElementById('filedata').value;
   var is_valid1=0;
  var cboxes = document.getElementsByName('category_tags[]');
   var len = cboxes.length;
       for (var i=0; i<len; i++) {
		if(cboxes[i].checked==true)
			{
				is_valid1=1;
			}
			
		}
   
  if(v1=="" || is_valid1==0)
  {
   alert('Please fill all required(*) Fields ');
    return false;
	}
 
 return true;
 }
</script>

<?php get_header(); ?>

 <link href="<?php bloginfo('url'); ?>/wp-content/themes/456shop/brand-admin/css/custom.css" rel="stylesheet" />	
		<div id="main" class="wrap -page">
			<div class="container">
			<div class="innerLR">

	           <!-- Widget -->
	             <div class="widget widget-tabs border-bottom-none">
	
	          	<!-- Widget heading -->
	        	<div class="widget-head">
		               <ul><li style="background:#64625F;padding: 0 10px;"> Photo Upload Form</li></ul>
		         </div>
		        <!-- // Widget heading END -->
		
		<div class="widget-body">
	          <p style="color:#444;text-align:center;font-size:16px;"><?php echo $message;?></p> 
			 <form action="" method="post" enctype="multipart/form-data" onsubmit="return formValidation();">
				
					<div class="upload-form">
					  <div class="row-fluid">
					  <div class="span3"> <label>Upload Photo <span style="color:#cc3333">*</span></label><span>Upload a photo from your computer</span></div>
					   <div class="span9">   <input id="filedata" type="file" name="filedata"/></div>
					  </div>
					   <div class="row-fluid">
					   <div class="span3"><label>Description</label><span>Short description about your photo or your experience</span></div>
					   <div class="span9"><textarea name="description"> </textarea></div>
					  </div>
					 
					     <input type="hidden" name="tag_pro_id" id="tag_product_id" value=""/>
				   <input type="hidden" name="user_id" value="<?php echo $user->ID;?>"/>
					  <!--<p><input type="submit" value="Submit" class="button"/></p>-->
					   <div class="row-fluid">
					   <div class="span3"><label>Select Hair Category <span style="color:#cc3333">*</span> </label><span>Tag Your Hair Category </span></div>
					   <div class="span9">
					    <input type="checkbox" name="category_tags[]" value="7"/>Naturally Straight 
						 <input type="checkbox" name="category_tags[]" value="2"/>Naturally Curlly
					     <input type="checkbox" name="category_tags[]" value="1"/>Locks 
					   <input type="checkbox" name="category_tags[]" value="8"/>Wigs 
					     <input type="checkbox" name="category_tags[]" value="3"/>Bairds 
						   <input type="checkbox" name="category_tags[]" value="4"/>Relaxed Straight 
						     <input type="checkbox" name="category_tags[]" value="5"/>Hair Extensions
					   <input type="checkbox" name="category_tags[]" value="6"/>Hair Color 
					   <input type="checkbox" name="category_tags[]" value="9"/> Permed Curly
					   </div>
					  </div>
					    <div class="row-fluid">
					 <div class="span3"><label>Tag Product</label><span>Type product name to tag products  </span></div>
					   <div class="span9">
					  <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Photo Upload') );?>
					    </div>
                      </div>						
                            
					 <div class="row-fluid">
					   <div class="span3"><label>Photo Taken Date</label><span> Document Your Journey (dd/mm/yyyy)</span></div>
					   <div class="span9"><input type="text" name="date"/></div>
					  </div>
					    <input type="submit" value="Submit" class="button"/>
					  
					</div>
						
				
				
				
					
				
                
				
	 </form>
</div></div>
</div>
			</div>
		</div>
        
<?php get_footer(); ?>
	
<?php
/*
   Template Name: Photo Single

*/
 

?>
<?php get_header('photo'); ?>
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<?php

$slug=@$_GET['n'];
if($slug)
  {
  //Source: functions/photostore.php
  //returns photo details by slug
  $photo=getPhotoDetailsBySlug($slug);
  $id=$photo->id;
  }else{
$id=$_GET['id'];
//Source: functions/photostore.php
  //returns photo details by id
$photo=getPhotoDetails($id);
}
/**
Source:functions/photostore.php
returns tagged products**/
$tag_products=getTaggedProductIds($photo->id);
 $product=get_post($tag_products[0]->product_id);

 
  $brand= get_brand_info($product->post_author);

 $current_user = wp_get_current_user();
 ?>
 
		<div id="main" class="wrap-page hair-story single-photo">
			<div class="container">
	         
			<div id="result"></div>
				<div class="row-fluid" style="position:relative">
					
				<?php  
				
				
				
				$user_info=get_userdata( $photo->user_id );
				
				$other_photos=getAllOtherPhotos($user_info->ID,$id,4);
			
				$cats=array(1=>array('Locks','http://hairlibrary.com/locks-hair-stories/'),2=>array('Naturally Curly','http://hairlibrary.com/naturally-curly-hair-stories/'),3=>array('Braids','http://hairlibrary.com/braids-hair-stories/'),4=>array('Relaxed Straight','http://hairlibrary.com/relaxed-straight-hair-stories/'),5=>array('Hair Extensions','http://hairlibrary.com/hair-extensions-hair-stories/'),6=>array('Hair Color','http://hairlibrary.com/hair-color-hair-stories/'),7=>array('Naturally Straight','http://hairlibrary.com/naturally-straight-hair-stories/'),8=>array('Wigs','http://hairlibrary.com/wig-hair-stories/'),9=>array('Permed Curly','http://hairlibrary.com/permed-curly-hair-stories/'))
			?>
			<?php if($photo->user_id==$current_user->ID){?>
		
			       <div id="edit-photo-button"><a href="<?php bloginfo('url');?>/upload-photo/?id=<?php echo $id;?>" class="button">Edit</a></div>
			<?php } ?>
			<div class="row-fluid">
	           <div class="span7">
			        <div class="photo">
			    	  <img alt="photostore" src="<?php bloginfo('url');?>/wp-content/uploads/photostore/<?php echo date('Y',$photo->created);?>/<?php echo $photo->photo;?>"/>
					</div>
					<div class="top-section  right-section mobile-display">
			<h3 class="photo-title"><?php  echo getFormatedDes($photo->title);?></h3>
			<div class="phono-owner section" style="margin-bottom:0 !important;">
			<ul style="display:inline-block;margin: 0;">
			<li><span class="by">By</span></li>
			  <li><div class="owner-thumb circle-outer mini-circle <?php echo getUserHairStyle($user_info->ID);?>" style="width:28px;height:28px;padding:2px">
			  <?php 
			  
			  /**
			  Source:functions/users.php
			  Returns user's thumb path of current user **/
			   $thumbpath=getThumbPath($user_info->ID);?>
			   <div class="inner-round">
			<img alt="profile" src="<?php echo $thumbpath;?>" width="30"/></div>
			  </div></li>
			  <li><div class="user-info">
			    <h4><a href="http://hairlibrary.com/profile/?id=<?php echo $user_info->ID;?>"><?php echo getFormatedDes($user_info->first_name);?></a></h4>
				 
			  
			  </div></li>
			  <div class="clear"></div>
			</div>
			<?php
              $cssid='m'.$id;
			  /*
			  source: functions/likes.php
			  return html layout of like button and number of like
			  */
			echo getHeartButton($id,$current_user->ID,'photo',$cssid);?>
	
		
             </div>
					<div class="product-comments">
                     <?php getComments($id,true,'photo'); ?>
	                 </div>
				</div>
			<div class="span5">
			<div class="top-section  right-section desktop-display">
			<h3 class="photo-title"><?php  echo getFormatedDes($photo->title);?></h3>
			<div class="phono-owner section"><span class="by">By</span>
			  <div class="owner-thumb circle-outer mini-circle <?php echo getUserHairStyle($user_info->ID);?>" style="width:28px;height:28px;padding:2px">
			  <?php 
			  /**
				Source: functions/ usrs.php
				Returns user's thumb path of given current user
				 **/
			   $thumbpath=getThumbPath($user_info->ID);?>
			   <div class="inner-round">
			<img alt="profile" src="<?php echo $thumbpath;?>" width="30"/></div>
			  </div>
			  <div class="user-info" style="margin-left:64px;margin-top:5px;padding-top:5px">
			    <h4 style="margin-top:0;"><a href="http://hairlibrary.com/profile/?id=<?php echo $user_info->ID;?>"><?php echo getFormatedDes($user_info->first_name);?></a></h4>
				 
			  
			  </div>
			  <div class="clear"></div>
			</div>
			<?php 
			 /*
			  source: functions/likes.php
			  return html layout of like button and number of like
			  */
			echo getHeartButton($id,$current_user->ID,'photo',$id);?>
	
			<script>
                /*  $(function() {
                    $( "#accordion" ).accordion();
                     });*/
            </script>
</div>
	<div class="woocommerce-tabs section">
		<div id="accordion">
		
		<?php if(($photo->video!="")&&($slug!="sngdnc:-going-bald-like-nair-jordan-"))
		  {
	        $v=explode('?v=',$photo->video);
		    if(count($v)==1)
			{
			  $v2=(explode('/',$photo->video));
			
			  $videoid=$v2[count($v2)-1];
			  if($videoid=="")
			   $videoid=$v2[count($v2)-2];
			
			}else
			$videoid=$v[1];
		  ?>
	    	<h3 id="tabe">Video</h3>
			 <div id="tabe1" class="video panel tabcon">
			 <iframe width="380" height="200" src="https://www.youtube.com/embed/<?php echo $videoid;?>" frameborder="0" allowfullscreen></iframe>
			 </div>

			 
		<?php }  ?>
		    <h3>Hair Story</h3>
			<div class="photo-description panel entry-content">			
			<p><?php  
			
			 /** Return formatted string**/			
			echo getFormatedDes($photo->description);?></p>
			</div>
			 
			 
			 <?php if($photo->tags && count($photo->tags>0)) {
				
			 ?>
			  <h3>Reviewed Product</h3>
			  <div class="product-tags panel entry-content"> 
			   <div class="row-fluid">
			   <ul class="products">
			       <?php 
			           foreach($photo->tags as $tag){
					   //$product=get_post($tag->product_id);
					   //$brand= get_brand_info($product->post_author);
					   ?>
					   
			       <li class="span6 product">
				    <div class="product-item">
						  <?php 
						  /**
							 *
							 Source:/functions/products.php
							 Generate HTML layout of product content of given current user
							 *
							 **/
						  getProductContent($tag->product_id,$current_user->ID);?>
                         </div>
			     </li>
			      <?php }?>
				  </ul>
			 </div>
			 </div>
			 <?php }?>
			 
			  <h3>Hair Category Tags</h3>
			 <div class="category-tags panel entry-content">
			 
			  <?php 
			  
			   if($photo->category_tags)
			     $cat_tags=explode('-',$photo->category_tags);
				 if(count($cat_tags)>0)
				 foreach($cat_tags as $ctag)
				 {
				    ?>
				 <a href="<?php echo $cats[$ctag][1];?>"><?php echo $cats[$ctag][0];?></a>
				<?php } ?>
			   
			 </div>
			 </div>
			 </div>
			  <div class="section social-md-bar" id="single-social-bar">
			     <p class="share-text">Share</p>
				<ul id="social-media-links">
				<li class="facebook">
				
<a onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" target="_blank" href="http://www.facebook.com/sharer.php?u=http://hairlibrary.com/hairstory/?n=<?php echo $photo->slug;?>&user=<?php echo $user_info->user_login;?>&brand=<?php echo $brand->company_slug;?>&p=<?php echo $product->post_name;?>">
				</a>
				</li>
				<li class="twitter">
				<a target="_blank" href="http://twitter.com/share?url=http://hairlibrary.com/hairstory/?n=<?php echo $photo->slug;?>&user=<?php echo $user_info->user_login;?>&brand=<?php echo $brand->company_slug;?>&p=<?php echo $product->post_name;?>">
				</a>
				</li>
				<li class="pinterest">
				<a target="_blank" href="http://www.pinterest.com/hairlibrary/">
				</a>
				</li>
		
				<li class="googleplus">
				<a target="_blank" href="https://plus.google.com/share?url=http://hairlibrary.com/hairstory/?n=<?php echo $photo->slug;?>&user=<?php echo $user_info->user_login;?>&brand=<?php echo $brand->company_slug;?>&p=<?php echo $product->post_name;?>">
				</a>
				</li>
			
				</ul>
				<div class="clear"></div>
				</div>
			</div>
			 <div class="clear"></div>
		</div></div>
		   <?php if(count($other_photos)>0)
				   {	?>	
		   <div class="row-fluid" style="padding-top:0px">
		       <div class="more-ptotos photo-stories">
			     <h3 class="b-title hs-icon" style="width:180px">More Hair Stories</h3>
      		 <div class="row-fluid">
			    	<?php  foreach($other_photos as $photo){?>
			          <div class="span4">
				      <?php 
					  /**Source: functions/photostore.php
								Returns photo html layout of given photo id**/
					  echo getPhotoHtml($photo);?>	
	                   </div>
				
						 
				 
				
				<?php } ?>
				
					 
				<div class="clear"></div>	
              </div>				
			   </div>
		      
            </div>	
            <?php } ?>
			 <?php 
			 
			 /*returns one-d array of related photos of current users*/
		 $r_photos=getRelatedPhotos($user_info->ID,$cat_tags,4);
		 
		 
		 if(count($r_photos)>0)
				   {	?>		
             <div class="row-fluid">
		       <div class="more-ptotos">
			     <h3 class="b-title">Photos you may also like</h3>
        	
	    		 <div class="row-fluid">
			    	<?php  foreach($r_photos as $photo){?>
			          <div class="span3">
				      <?php 
					  /**Source: functions/photostore.php
					Returns photo html layout of given photo id**/
					  echo getPhotoHtml($photo);?>	
	                   </div>
				
						 
				 
				
				<?php } ?>
				
					 
				<div class="clear"></div>	
              </div>	
			
				<div class="clear"></div>		
			   </div>
		      
            </div>				
			<?php }  ?>
		   <div class="row-fluid">
		       <div class="recommended-products  margin-left-none">
			     <h3 class="b-title" style="width:280px">Recommended Products </h3>
         <?php 
		 //Source: functions/photostore.php
		 //returns one-d array of recommended products.
		 $re_photos=getRecommendedProducts($cat_tags,4);
		 
		 
		 if(count($re_photos)>0)
				   {	?>			
			    	<ul class="products">
				
				       <?php  
					 $i=1;
					   foreach($re_photos as $match){
					 
					$class="";
							if($i%4==0)
							  $class="last";
							else if($i%4==1)
							   $class="first";
                             
						   ?>
							
                           <li class=" span3 product <?php echo $class;?>">
						   <div class="product-item">
                            <?php 
							
							/**
							 *
							 Source:/functions/products.php
							 Generate HTML layout of product content of given current user
							 *
							 **/
							getProductContent($match,$current_user->ID);?>
                              
                            </div>
						   </li>

						
					<?php	$i++;}   ?>
						 
				 
				 </ul>
				<?php } ?>
				<div class="clear"></div>		
			   </div>
		      
            </div>
		
        </div>
	</div>
	

	
        <script>
		$( "#story-menu-item" ).addClass( "active_menu_item" );
		</script>
<?php get_footer(); ?>
	
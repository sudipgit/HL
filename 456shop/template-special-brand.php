<?php
/*
Template Name: Special Brand
*/
?>
<?php get_header();
$current_user = wp_get_current_user();
 if($current_user>0)
/**
*
Source:/functions/products.php
Returns one dimensional array of products those are matched with current user's products.
*
**/
$mymatches=getMatchingProducts($current_user->ID);
 ?>
 <?php	
			 
			   global $post;
			   $page_id=$post->ID;
                $value = get_post_meta( $post->ID, 'collection_product_items', true );
                 $args=explode(',',$value);
			   
	             ?>
				
    
		<div id="main" class="wrap" style="padding-top:44px !important;">
		     <div style="margin:0 -20px;background:#f3f4f5;">
			 <?php the_post_thumbnail('full');?>
        </div>
			<div class="container">
	          
				
				<div class="row-fluid">	
				
				<div style="float:right;margin-top: 10px">
					<ul style="margin:0; padding:0;" id="social-media-links">
					<li class="facebook">
					<a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink($post->ID);?>" target="_blank" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')">

					</a>
				 </li>
					<li class="twitter">
					<a href="http://twitter.com/share?url=<?php echo get_permalink($post->ID);?>" target="_blank">
					</a>
					</li>
					<li class="pinterest">
					<a href="http://www.pinterest.com/hairlibrary/" target="_blank">
					</a>
					</li>
			
					<li class="googleplus">
					<a href="https://plus.google.com/share?url=<?php echo get_permalink($post->ID);?>" target="_blank">
					</a>
					</li>
				<div class="clear"></div>
					</ul>
					
					</div>
					<div class="clear"></div>
					<div class="collection-text" style="padding:0 0 20px 0">
					 <h3 style="margin-top:0"><?php echo $post->post_title;?></h3>
					 <p style="margin:-10px 0 10px">By: <a href="http://hairlibrary.com/profile/?n=Sidrah">Sidrah N.</a> </p>
					<?php echo $post->post_content;?></div>
			         <div class="top-title">
					  <h3 class="hair-story-title" style="margin-top: 0;line-height: 20px;">
					     <span style="position: relative;top:-9px;font-size: 11px; padding-left: 10px;text-transform: none; background-image: none; padding-left: 10px;"> <?php echo count($args).' Items'; //echo get_the_title($page_id);?></span>
					</h3>
					</div>
					
					<div class="woocomerce margin-left-none">
						
                           <ul class="products">
						   
						   <?php 
						$i=0;
						   foreach($args as $id)
						   {

						   ?>
							
                           <li class=" span4 product <?php if($i%4==0) echo 'first';?>">
						   
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">       
                             <?php if( $mymatches && count($mymatches)>0 && in_array($id,$mymatches)) { ?>						   
						   <span class="onsale"></span>
						   <?php } ?>						   
                             <?php
							/**
							 *
							 Source:/functions/products.php
							 Generate HTML layout of product content of given current user
							 *
							 **/
							 getProductContent($id,$current_user->ID);?>
					         
                            </div>
						   </li>
						   <?php $i++;  } ?>
						   </ul>
						  
						   </div>
					</div>
			</div>		
					
		</div>
        	      <script>
		$( "#shop-menu-item" ).addClass( "active_menu_item" );
		</script>
<?php get_footer(); ?>

<?php get_header('before');
//$current_user = wp_get_current_user();
/*returns given numbers of random products*/
$featured_products=getRandomProducts(4);
$image=get_the_post_thumbnail($featured_product->ID, array(200,200) );
 ?>
<div id="main" class="new-home-before">
	<div class="desktop-display">
		<div class="top_banner">
			<?php //echo do_shortcode('[layerslider id="3"]');?>
			<img alt="banner" width="100%" src="http://hairlibrary.com/wp-content/uploads/2014/11/slide_2.png"/>
			<div class="bannar_text">
				<h2 class="bannar_text_discover">DISCOVER</h2>
				<h2 class="bannar_text_match">YOUR MATCH</h2>
				<h2 class="bannar_text_discover">Instantly</h2>
				<p>w/1,300 + Hair Products</p>
				<a href="http://hairlibrary.com/register/" class="button">Get Started</a>
			</div>
		</div>
		
	</div>	
	<div class="mobile-display">
		<div class="top_banner">
			<?php //echo do_shortcode('[layerslider id="28"]');?>
			<img alt="banner" width="100%" src="<?php bloginfo('template_url');?>/assets/img/home/mobile_top.png"/>
		</div>		
	</div>	
		<div class="welcome_area">
			<div class="welcome_text">
				<img alt="Hl logo" src="<?php bloginfo("template_url")?>/assets/img/Updated-HL-Logo.png" width="350"/>
				<p>
					Get matched with 1,300+ hair products based on your specific needs. We are filtering the market daily to discover products made just for you.
				</p>
				<a class="button btn primary" href="http://hairlibrary.com/register/">Find Your Perfect Match</a>
			</div>
		</div>
		<div class="pop-up-store-slider">
			<?php //echo do_shortcode('[showbiz new-home-page-slider]');?>
				<h4><a href="http://hairlibrary.com/products/">Featured Brands</a></h4>		
				
					<?php //echo do_shortcode('[layerslider id="29"]');?>
				
			<div class="desktop-display"><?php if( function_exists('cyclone_slider') ) cyclone_slider('home-page-popup-shop'); ?></div>
			<div class="mobile-display"><?php if( function_exists('cyclone_slider') ) cyclone_slider('shop-page-popup-shop'); ?></div>
		</div>
		<div class="product_list_row">		
				<h4><a href="http://hairlibrary.com/products/">Featured Products</a></h4>		
				<div class="woocomerce container">
				<?php 					 
					 if(count($featured_products)>0)
				   {	
				     ?><ul class="row-fluid products"><?php
					 $i = 0;
				   foreach($featured_products as $featured_product){?>
									
							<li class=" span3 product <?php if($i%4==0) echo 'first';?>">
						   <div class="product-item shadow-s3">                
                            <?php 
							/**
							 *
							 Source:/functions/products.php
							 Generate HTML layout of product content of given current user
							 *
							 **/
							//getProductContent($featured_product->ID,$current_user->ID);	
							getProductContent($featured_product->ID,null);?>	
					         
                            </div>
						   </li>						
					<?php	
					
					$i++;
					} 
					?></ul><?php 
					} ?>
			</div>
		</div>
		<div class="photo_list_row">
				<h4 class="desktop-display hs-icon"><a href="http://hairlibrary.com/hair-stories/">Featured Hair Stories</a></h4>
				<h4 class="mobile-display"><a href="http://hairlibrary.com/hair-stories/">Featured Hair Stories</a></h4>
				<div class="container">
				<div class="photo_list_row_top">
					<p>Let Your Hair Be Heard<br />
					Share Photos & Videos of hair tutorials and products reviews.</p>
					<div class="add_story_home">
						<?php  // if($current_user->ID<1) {?>
						<a style="font-weight:normal;" class="button btn primary" title="Add Hair Story"  onclick="getCommonLoginPopup('http://hairlibrary.com/upload-photo/');" href="javascript:void();">Add hair story</a>
						<?php //} else {?>
						<!--<a style="font-weight:normal;" class="button btn primary" title="Add Hair Story" href="<?php bloginfo('url');?>/upload-photo/">Add hair story</a>-->
						<?php// }?>
						
					</div>					
					
				</div>
				<div class="row-fluid">
				<?php 
					/**
					Source:functions/photostore.php
					returns all photo of specific user if user id exist, else return all photo of user_photos
					**/
					 $photos=getAllPhotos(null,4,true);
					 
					 if(count($photos)>0)
				   {	
				   foreach($photos as $photo){?>
						 	<div class="span3 story">
							<?php 
							/**Source: functions/photostore.php
								Returns photo html layout of given photo id**/
							echo getPhotoHtml($photo);
							?>	
				
						 </div>
					<?php	} 
					} ?>
		</div>
		</div>
		</div>
		<div class="join_section">
			<p>"Get Inspired And Contribute To Future Of Beauty"</p>
			<div class="join_button">
				<a href="<?php bloginfo("url")?>/register/">Join Today</a>
			</div>
		</div>
</div>
<style>

</style>	
		
<?php get_footer('before'); ?>
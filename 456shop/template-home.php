<?php
/*
Template Name: Home Template
*/
?>
 
<?php get_header(); ?>

<?php $select_type = get_post_meta($post->ID, 'select-type_value', true);?>
<?php $header_content = get_post_meta(get_the_ID(), 'header_content_value', true); ?>
<?php $nivo_slider = get_post_meta($post->ID, 'nivo-slider_value', true);?>
<?php $layer_slider = get_post_meta($post->ID, 'layer-slider_value', true);?>
<?php $dg_gallery = get_post_meta($post->ID, 'dg_gallery_value', true);?>
<?php $video = theme_parse_video(get_post_meta($post->ID, 'video_value', true));?>

		<div id="main" class="wrap post-template">
			<div class="container">
				<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Front Meta') ) ?>
				<div class="row-fluid">	
					<div class="span12 post-page">	

                <?php if( !is_user_logged_in() ) {?>					
					 <div class="top-announcement">
                     <script>
                  $(document).ready(function(){
                          $(".close").click(function(){
                         $(".top-announcement").fadeOut(1000);
                          });
                       });
                      </script>
               <p class="top-text">Hair Library is the place to get matched with hair products that are made just for you!</p>
               <p>Sign Up To Check Out FREE Products & Check In Your Review   <a href="http://hairlibrary.com/register/">Sign Up</a><a href="http://hairlibrary.com/">Login</a></p>
               <span class="close"></span>
                  </div>
                  <?php } ?>

					
					<?php if ( $select_type != 'none' ) { ?>
						<div class="front_header
						<?php if($header_content){ ?>
						span8
						<?php }else{ ?>
						span12
						<?php } ?>
						">
	                    <?php if ( $select_type == 'nivoslider' ) { ?>
	                    	
	                    	<?php echo do_shortcode($nivo_slider); ?> 
	                    	
	                    <?php } elseif ( $select_type == 'layerslider' ) { ?>
	                    	
	                    	<?php echo do_shortcode($layer_slider); ?>
	                    	
	                    <?php } elseif ( $select_type == 'dg_gallery' ) { ?>
	                    
	                    	<?php echo do_shortcode($dg_gallery); ?> 
	                    
	                    <?php } elseif ( $select_type == 'video' ) { ?>
		                    
			                    <?php if ( $video ) {?>
			                    	<iframe class="scale-with-grid-front shadow-s3" width="620" height="349" src="<?php echo $video ?>?wmode=transparent;showinfo=0" frameborder="0" allowfullscreen></iframe>
			                    <?php }else{?>
			                    	<p style="color: #ed1c24;"><?php _e('Enter a video URL to "Front Page Options"', GETTEXT_DOMAIN) ?></p>
			                    <?php }?>
		                    
		                    <?php } elseif ($select_type == 'image'){?>
			                    <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			                        <?php $post_thumbnail_id = get_post_thumbnail_id(); ?> 
	                                <?php $alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);?>
	                                <?php if($header_content){ ?>
		                                <img alt="<?php echo $alt; ?>" class="shadow-s3 wpstickies"  src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'front-image2' ); echo $image[0];?>" />
		                            <?php }else{ ?>
				                    	<img alt="<?php echo $alt; ?>" class="shadow-s3 wpstickies"  src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'front-image' ); echo $image[0];?>" />
				                    <?php }?>
			                    <?php }else{?>
			                    	<p style="color: #ed1c24;"><?php _e('Add an image to "Featured Image".', GETTEXT_DOMAIN) ?></p>
			                    <?php }?>      
				            <?php }?>
						</div>
						<?php if($header_content){ ?>
						<div class="span4 front_header"><?php echo do_shortcode(wpautop($header_content)); ?></div>
						<?php } ?>
						<div class="clearfix"></div>
					<?php } ?>
					
					<!-- start login -->
					 <?php if( !is_user_logged_in() ) { ?>	
					<div class="home-login">
					 <div class="login" id="theme-my-login">
			          <form name="loginform" id="loginform" action="/morgandemo/login/" method="post">
		             <p>
			              <label for="user_login">Username</label>
			                <input type="text" name="log" id="user_login" class="input span12" value="" size="20" />
		                </p>
		                  <p>
		                	<label for="user_pass">Password</label>
		              	<input type="password" name="pwd" id="user_pass" class="input span12" value="" size="20" />
		                </p>

		<input type="hidden" name="_wp_original_http_referer" value="" />

		
		<p class="l-button">
			<input class="submit button" type="submit" name="wp-submit" id="wp-submit" value="Log In" />
			<input type="hidden" name="redirect_to" value="http://hairlibrary.com/wp-admin/" />
			<input type="hidden" name="instance" value="" />
			<input type="hidden" name="action" value="login" />
		</p>
		<div class="clear"></div>
	</form>

                     </div></div> 
					 <?php } ?>
					 <!-- end login -->
					
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content();?>
                    <?php endwhile; else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></p>
                    <?php endif; ?>
                    </div>
				</div>
			</div>
		</div>
        
<?php get_footer(); ?>
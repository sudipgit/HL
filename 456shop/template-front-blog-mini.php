<?php
/*
Template Name: Front Template (blog mini)
*/
?>
<?php get_header(); ?>

<?php $select_type = get_post_meta($post->ID, 'select-type_value', true);?>
<?php $header_content = get_post_meta(get_the_ID(), 'header_content_value', true); ?>
<?php $nivo_slider = get_post_meta($post->ID, 'nivo-slider_value', true);?>
<?php $layer_slider = get_post_meta($post->ID, 'layer-slider_value', true);?>
<?php $dg_gallery = get_post_meta($post->ID, 'dg_gallery_value', true);?>
<?php $video = theme_parse_video(get_post_meta($post->ID, 'video_value', true));?>

		<div id="main" class="wrap">
			<div class="container">
				<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Front Meta') ) ?>
				<div class="row-fluid">	
					<div class="span12">		
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
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content();?>
                    <?php endwhile; else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></p>
                    <?php endif; ?>
                    </div>
                    
					<?php 
					//OptionTree Stuff
					if ( function_exists( 'get_option_tree') ) {
					$theme_options = get_option('option_tree');
					
					/* Blog Options
					================================================== */
					$blog_number_of_post = get_option_tree('blog_number_of_post',$theme_options);
					}
					?>
					
					<?php $post_style = get_post_meta($post->ID, 'post_style_value', true);?>
					<?php $videoURL = theme_parse_video(get_post_meta($post->ID, 'video-url_value', true));?>
					<?php $linkURL = get_post_meta($post->ID, 'link-url_value', true);?>
					<?php $share = get_post_meta($post->ID, 'share_value', true);?>
					<?php if ($blog_number_of_post){ 
						$posts = $blog_number_of_post;
					}else{
						$posts = 10;
					}?>
                    
					<div class="row-fluid">
						<div class="span12 columns-3">
	                    <?php if ( get_query_var('paged') ) {
	                        $paged = get_query_var('paged');
	                    } elseif ( get_query_var('page') ) {
	                        $paged = get_query_var('page');
	                    } else {
	                        $paged = 1;
	                    }
	                    query_posts( array( 'post_type' => 'post', 'paged' => $paged, 'posts_per_page' => $posts ) );
	                    if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part('includes/blog-post-mini' ) ?>
	                    <?php endwhile; else: ?>
	                    <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN); ?></p>
	                    <?php endif; ?>
	                    <div class="clearfix"></div>
	                    <div class="pagination">
		                    <?php next_posts_link(__('Older Entries &rarr;', GETTEXT_DOMAIN), 0); ?>
		                    <?php previous_posts_link(__('&larr; Newer Entries', GETTEXT_DOMAIN), 0) ?>
	                    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
        
<?php get_footer(); ?>
<?php
/*
Template Name: Full Width Template
*/
?>
<?php get_header(); ?>

		<div id="main" class="wrap post-template">
			<div class="container">
			<?php if($post->ID==8 || $post->ID==9){?>
				<div id="top-notify" class="woocommerce-message">
				<?php _e( 'All Products ONLY Ship Within The United States At This Time.', 'woocommerce' ) ?>
				</div>
				<?php }?>
				<?php get_template_part('includes/heading' ) ?>
				<div class="row-fluid">
					<div class="span12 post-page">
			        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			        <div class="shop-image">	
                        <?php $post_thumbnail_id = get_post_thumbnail_id(); ?> 
                        <?php $alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);?>
			            <img alt="<?php echo $alt; ?>" class="shadow-s3 wpstickies"  src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'front-image' ); echo $image[0];?>" />
			        </div>
			        <?php }?>
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
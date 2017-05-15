<?php get_header(); ?>

		<?php $videoURL = theme_parse_video(get_post_meta($post->ID, 'video-url_value', true));?>
		<?php $linkURL = get_post_meta($post->ID, 'link-url_value', true);?>
		<?php $full_width = get_post_meta($post->ID, 'full-width_value', true);?>
		<?php $details = get_post_meta($post->ID, 'details_value', true); if($details){$details = array_filter($details);};?>
        <?php $terms = get_the_terms( get_the_ID(), 'portfolio_tags' ); ?>
		<?php $share = get_post_meta($post->ID, 'share_value', true);?>
		<?php $gallery_type = get_post_meta($post->ID, 'gallery_type_value', true);?>
		<?php $left_sidebar = get_post_meta($post->ID, 'left_sidebar_value', true);?>
            
		<div id="main" class="wrap portfolio-post sidebar-template <?php if (!$full_width){?><?php if ($left_sidebar){?>left-sidebar-template<?php }?><?php }?>">
			<div class="container">
				<?php get_template_part('includes/heading' ) ?>
				<div class="row-fluid">
					<div class="<?php if ($full_width){?>span12<?php }else{?>span8<?php }?> post-page">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part('includes/single-portfolio-post' ) ?>
	                    <?php endwhile; else: ?>
	                        <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></p>
	                    <?php endif; ?>
                    </div>
                    <?php if (!$full_width){?>
                    <?php get_sidebar(); ?>
                    <?php }?>
				</div>
			</div>
		</div>
        
<?php get_footer(); ?>
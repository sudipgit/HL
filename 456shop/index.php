<?php get_header(); ?>

		<?php $post_style = get_post_meta($post->ID, 'post_style_value', true);?>
		<?php $videoURL = theme_parse_video(get_post_meta($post->ID, 'video-url_value', true));?>
		<?php $linkURL = get_post_meta($post->ID, 'link-url_value', true);?>
		<?php $share = get_post_meta($post->ID, 'share_value', true);?>

		<div id="main" class="wrap sidebar-template">
			<div class="container">
				<?php get_template_part('includes/heading' ) ?>
				<div class="row-fluid">
					<div class="span8">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
					<?php get_template_part('includes/blog-post' ) ?>
                    <?php endwhile; else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN); ?></p>
                    <?php endif; ?>
                    <div class="pagination">
	                    <?php next_posts_link(__('Older Entries &rarr;', GETTEXT_DOMAIN), 0); ?>
	                    <?php previous_posts_link(__('&larr; Newer Entries', GETTEXT_DOMAIN), 0) ?>
                    </div>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

<?php get_footer(); ?>
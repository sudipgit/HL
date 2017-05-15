<?php
/*
Template Name: Quiz Page Template
*/
$user=wp_get_current_user();
global $post;
    if($user->ID==34 && $post->ID==1973)
	{
	get_template_part('admin-template'); 
	}else{




 get_header(); ?>
<?php $left_sidebar = get_post_meta($post->ID, 'left_sidebar_value', true);?>

		<div id="main" class="wrap post-template sidebar-template <?php if ($left_sidebar){?>left-sidebar-template<?php }?>">
			<div class="container">

				<div class="row-fluid heading">
					<div class="span12">
						<h2 class="title">Welcome To Your bronner Bros Quiz</h2>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12 post-page" style="padding-left:50px">
			        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			        <div class="shop-image">	
                        <?php $post_thumbnail_id = get_post_thumbnail_id(); ?> 
                        <?php $alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);?>
			            <img alt="<?php echo $alt; ?>" class="shadow-s3 wpstickies"  src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'front-image2' ); echo $image[0];?>" />
			        </div>
			        <?php }?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content();?>
                    <?php endwhile; else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></p>
                    <?php endif; ?>
                    </div>
                    <?php get_sidebar(); ?>
				</div>
			</div>
		</div>
<?php get_footer(); 
}
?>

<style>
.mlw_qmn_message_before{display:none;}
</style>
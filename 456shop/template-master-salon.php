<?php
/*
Template Name: Master Salon Template
*/
?>
<?php 
global $post;
$user=wp_get_current_user();

   if(!is_Salon($user->ID) && !is_admin())
	{ 
	wp_redirect( home_url() ); 
	exit; 
	
	}
get_template_part('brand-admin/templates/header-salon'); 


 if($post->ID==7753)
{
get_template_part('brand-admin/templates/salon-dashboard'); 
}
else if($post->ID==7762)
{
get_template_part('brand-admin/templates/salon-password-setting'); 
}
else if($post->ID==7755)
{
get_template_part('brand-admin/templates/salon-amenities'); 
}
else if($post->ID==7747)
{ 
get_template_part('brand-admin/templates/salon-photos'); 
}
else if($post->ID==7749)
{
get_template_part('brand-admin/templates/salon-attributes'); 
}
else if($post->ID==7768)
{
get_template_part('brand-admin/templates/salon-affiliate-sales'); 
}
else if($post->ID==7764)
{
get_template_part('brand-admin/templates/salon-services'); 
}
else if($post->ID==7745)
{
get_template_part('brand-admin/templates/salon-social'); 
}else if($post->ID==7766)
{
get_template_part('brand-admin/templates/salon-team'); 
}
else
{

?>
<div class="admin-container">
				<?php get_template_part('includes/heading' ) ?>
				<div class="row-fluid">
					<div class="span8 post-page">
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
                    <?php //get_sidebar(); ?>
				</div>
			</div>


<?php

}

 

//if($post->ID!==1990)
get_template_part('brand-admin/templates/footer-salon'); ?>
<?php
/*
Template Name: Admin Template
*/
?>
<?php 
global $post;
$user=wp_get_current_user();



   if(!is_brand($user->ID) && $user->ID!=1)
	{ 
	wp_redirect( home_url() ); 
	exit; 
	}
if($user->ID==96)
{
get_template_part('brand-admin/templates/header-dataentry'); 
}
else if($post->ID==7226)
{
get_template_part('brand-admin/templates/header-pdf'); 
}
else 
{
get_template_part('brand-admin/templates/header'); 
}

?>

		
        
<?php 

 if($post->ID==1966)
{
get_template_part('brand-admin/templates/dashboard'); 
}
else if($post->ID==1976)
{
get_template_part('brand-admin/templates/add-product'); 
}
else if($post->ID==1978)
{
//get_template_part('brand-admin/templates/admin-products'); 
get_template_part('brand-admin/templates/product_library'); 
}
else if($post->ID==1980)
{
get_template_part('brand-admin/templates/calender'); 
}
else if($post->ID==1982)
{
get_template_part('brand-admin/templates/invoice'); 
}
else if($post->ID==1990)
{
get_template_part('brand-admin/templates/product_overview'); 
}
else if($post->ID==2116)
{
get_template_part('brand-admin/templates/my_account'); 
}
else if($post->ID==1984)
{
get_template_part('brand-admin/templates/shipping'); 
}
else if($post->ID==5357)
{
get_template_part('brand-admin/templates/orders'); 
}
else if($post->ID==5359)
{
get_template_part('brand-admin/templates/order_detail'); 
}
else if($post->ID==5486)
{
get_template_part('brand-admin/templates/faq'); 
}
else if($post->ID==7226)
{
get_template_part('brand-admin/templates/generate_pdf'); 
}
else if($post->ID==10403)
{
get_template_part('brand-admin/templates/all_invoice'); 
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




?>

<?php 

if($post->ID==7226)
get_template_part('brand-admin/templates/footer-pdf'); 
else
get_template_part('brand-admin/templates/footer'); ?>
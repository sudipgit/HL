<?php
/*
Template Name: Login Template
*/
?>
<?php get_header(); 

$is_reg=$_GET['r'];

?>

		<div id="main" class="wrap post-template login-page">
			<div class="container">
			<?php if($is_reg){?>
			<div class="woocommerce-message">
               <p style="text-align:left;margin:0;text-transform:uppercase;font-size: 15px;"> Thank you for completing your registration.  </p>
                </div><?php } ?>
			    <div class="p-logo"><img alt="hl logo" src="<?php bloginfo('template_url');?>/assets/img/Updated-HL-Logo.png" width="300"/></div>
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
		<!--<style>
		.woocommerce-message:before
		{
		height:75%;
		line-height:44px;
		}
		</style>-->
        <script>
		$( ".menu-sign-in" ).addClass( "active_menu_item" );
		</script>
<?php get_footer(); ?>
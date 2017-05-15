<?php
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');

    /* Shop Options
    ================================================== */
    $loop_shop_per_page = get_option_tree('loop_shop_per_page',$theme_options);
    $shop_columns = get_option_tree('shop_columns',$theme_options);
    $product_style = get_option_tree('product_style',$theme_options);
    $product_post_style = get_option_tree('product_post_style',$theme_options);
    $sale_flash_color1 = get_option_tree('sale_flash_color1',$theme_options);
    $sale_flash_color2 = get_option_tree('sale_flash_color2',$theme_options);
    $shop_search_image_raw = get_option_tree('shop_search_image',$theme_options);
    $shop_tag_image_raw = get_option_tree('shop_tag_image',$theme_options);
}
?>

<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

get_header('shop'); ?>

<?php $shop_search_image = get_attachment_id_from_src($shop_search_image_raw);?>
<?php $shop_tag_image = get_attachment_id_from_src($shop_tag_image_raw);?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action('woocommerce_before_main_content');
	?>
	<h1 class="page-title">
			  			<?php if ( is_search() ) : ?>
			  				<?php
			  					printf( __( 'Search Results: &ldquo;%s&rdquo;', GETTEXT_DOMAIN ), get_search_query() );
			  					if ( get_query_var( 'paged' ) )
			  						printf( __( '&nbsp;&ndash; Page %s', GETTEXT_DOMAIN ), get_query_var( 'paged' ) );
			  				?>
			  			<?php elseif ( is_tax() ) : ?>
			  				<?php echo single_term_title( "", false ); ?>
			  			<?php else : ?>
			  				<?php
			  					$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );

			  					echo apply_filters( 'the_title', ( $shop_page_title = get_option( 'woocommerce_shop_page_title' ) ) ? $shop_page_title : $shop_page->post_title );
			  				?>
			  			<?php endif; ?>
		</h1>
	   <div class="span12" style="margin:0">


        <div class="span8 cat">
        <?php if (is_product_category()){ ?>

	        <?php global $wp_query;
	        $cat = $wp_query->get_queried_object();
	        $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); ?>
	        <?php if ($thumbnail_id) { ?>
		        <div class="shop-image">
		            <?php $alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true); ?>
		            <?php if ( is_active_sidebar(5) ){?>
		                <img alt="<?php echo $alt; ?>" class="shadow-s3 wpstickies"  src="<?php $image = wp_get_attachment_image_src( $thumbnail_id, 'shop-image2' ); echo $image[0];?>" />
		            <?php }else{ ?>
		            	<img alt="<?php echo $alt; ?>" class="shadow-s3 wpstickies"  src="<?php $image = wp_get_attachment_image_src( $thumbnail_id, 'front-image' ); echo $image[0];?>" />
		            <?php }?>
		        </div>
	        <?php }?>
	    <?php }elseif(is_search()){?>
	        <?php if($shop_search_image_raw){?>
		        <div class="shop-image">
		            <?php if ( is_active_sidebar(5) ){?>
		                <img alt="<?php echo get_post_meta($shop_search_image, '_wp_attachment_image_alt', true); ?>" class="shadow-s3 wpstickies"  src="<?php $shop_search_image_ = wp_get_attachment_image_src( $shop_search_image, 'shop-image2' ); echo $shop_search_image_[0];?>" />
		            <?php }else{ ?>
		            	<img alt="<?php echo get_post_meta($shop_search_image, '_wp_attachment_image_alt', true); ?>" class="shadow-s3 wpstickies"  src="<?php $shop_search_image_ = wp_get_attachment_image_src( $shop_search_image, 'front-image' ); echo $shop_search_image_[0];?>" />
		            <?php }?>
		        </div>
	        <?php }?>
	    <?php }elseif(is_tax()){?>
	        <?php if($shop_tag_image_raw){?>
		        <div class="shop-image">
		            <?php if ( is_active_sidebar(5) ){?>
		                <img alt="<?php echo get_post_meta($shop_tag_image, '_wp_attachment_image_alt', true); ?>" class="shadow-s3 wpstickies"  src="<?php $shop_tag_image_ = wp_get_attachment_image_src( $shop_tag_image, 'shop-image2' ); echo $shop_tag_image_[0];?>" />
		            <?php }else{ ?>
		            	<img alt="<?php echo get_post_meta($shop_tag_image, '_wp_attachment_image_alt', true); ?>" class="shadow-s3 wpstickies"  src="<?php $shop_tag_image_ = wp_get_attachment_image_src( $shop_tag_image, 'front-image' ); echo $shop_tag_image_[0];?>" />
		            <?php }?>
		        </div>
	        <?php }?>
        <?php }else{?>
	        <?php $shop_page = get_post( woocommerce_get_page_id( 'shop' ) ); ?>
	        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail($shop_page->ID))  ) { ?>
	        <div class="shop-image">
	            <?php $post_thumbnail_id = get_post_thumbnail_id($shop_page->ID); ?>
	            <?php $alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);?>
	            <?php if ( is_active_sidebar(5) ){?>
	                <img alt="<?php echo $alt; ?>" class="shadow-s3 wpstickies"  src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $shop_page->ID ), 'shop-image2' ); echo $image[0];?>" />
	            <?php }else{ ?>
	            	<img alt="<?php echo $alt; ?>" class="shadow-s3 wpstickies"  src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $shop_page->ID ), 'front-image' ); echo $image[0];?>" />
	            <?php }?>
	        </div>
	        <?php }?>
        <?php }?>

      </div>
      <div class="span4">
      <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Best Seller Sidebar') ) ?>
      </div>
</div>
		<div class="shop-navigation clearfix">
		<?php
			do_action('woocommerce_breadcrumb');
			do_action('woocommerce_catalog_ordering');
		?>
		</div>
		<!--<h1 class="page-title">
			<?php if ( is_search() ) : ?>
				<?php
					printf( __( 'Search Results: &ldquo;%s&rdquo;', GETTEXT_DOMAIN ), get_search_query() );
					if ( get_query_var( 'paged' ) )
						printf( __( '&nbsp;&ndash; Page %s', GETTEXT_DOMAIN ), get_query_var( 'paged' ) );
				?>
			<?php elseif ( is_tax() ) : ?>
				<?php echo single_term_title( "", false ); ?>
			<?php else : ?>
				<?php
					$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );

					echo apply_filters( 'the_title', ( $shop_page_title = get_option( 'woocommerce_shop_page_title' ) ) ? $shop_page_title : $shop_page->post_title );
				?>
			<?php endif; ?>
		</h1>-->

		<?php //do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( is_tax() ) : ?>
			<?php do_action( 'woocommerce_taxonomy_archive_description' ); ?>
		<?php elseif ( ! empty( $shop_page ) && is_object( $shop_page ) ) : ?>
			<?php do_action( 'woocommerce_product_archive_description', $shop_page ); ?>
		<?php endif; ?>


		<div class="p-sub-cats">
		<h3 class="cat-title">Shop by category</h3>
		<ul>
		<?php woocommerce_product_subcategories(); ?>
		</ul>
           <div class="clear"></div>
		</div>

		<?php if ( have_posts() ) : ?>

			<?php do_action('woocommerce_before_shop_loop'); ?>
			<div class="cat-products">
             <h3 class="cat-title">New Products</h3>
			<ul class="products">


				<?php while ( have_posts() ) : the_post(); ?>

					<?php woocommerce_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			</ul>
			</div>

			<?php do_action('woocommerce_after_shop_loop'); ?>

		<?php else : ?>

			<?php if ( ! woocommerce_product_subcategories( array( 'before' => '<ul class="products">', 'after' => '</ul>' ) ) ) : ?>

				<p><?php _e( 'No products found which match your selection.', GETTEXT_DOMAIN ); ?></p>

			<?php endif; ?>

		<?php endif; ?>

		<div class="clear"></div>

		<?php
			/**
			 * woocommerce_pagination hook
			 *
			 * @hooked woocommerce_pagination - 10
			 * @hooked woocommerce_catalog_ordering - 20
			 */
			do_action( 'woocommerce_pagination' );
		?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action('woocommerce_sidebar');
	?>

<?php get_footer('shop'); ?>
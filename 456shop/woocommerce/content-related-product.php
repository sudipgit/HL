<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
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
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )

	if(!$shop_columns)
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
	else
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $shop_columns );

// Ensure visibilty
if ( ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;
?>

<div class="product-item shadow-s3">

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>



		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>

		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php
$brand=null;

$brand= get_brand_info($product->post->post_author);
?>
<p class="product-brand-name"> <a href="<?php bloginfo('url');?>/brand?n=<?php echo getBrandSlug($brand->user_id);?>"><?php echo getFormatedDes($brand->company_name);?></a></p>
		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */
			//do_action( 'woocommerce_after_shop_loop_item_title' );
			$current_user = wp_get_current_user();
			getListHeartButton($product->id,$current_user->ID,'product',$product->id,post_permalink($product->id));
		?>


		<?php
			do_action( 'woocommerce_front_rating' );
		?>


	<?php #do_action( 'woocommerce_after_shop_loop_item' ); ?>
	
</div>


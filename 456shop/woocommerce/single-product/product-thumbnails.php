<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce;

if ( has_post_thumbnail() ) {

	?>
	<div class="thumbnails clearfix"><?php
$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids ) {

		$loop = 0;
		$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );

		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( 'zoom' );

			if ( $loop == 0 || $loop % $columns == 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns == 0 )
				$classes[] = 'last';

			$image_link = wp_get_attachment_url( $attachment_id);

			if ( ! $image_link )
				continue;

			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop' ) );
			$image_class = esc_attr( implode( ' ', $classes ) );
			$image_title = esc_attr( get_the_title( $attachment_id ) );

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" class="%s" title="%s"  rel="prettyPhoto[product-gallery]">%s</a>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );

			$loop++;
		}
}

		foreach ( $product->get_children() as $child_id ) {
		
			$variation = $product->get_child( $child_id  );
			
			if ( $variation instanceof WC_Product_Variation ) {
			
				if ( has_post_thumbnail( $variation->get_variation_id() ) ) {
				
				$attachment_id = get_post_thumbnail_id( $variation->get_variation_id() );
				
				$imageTitle = get_the_title($attachment_id);
				$image1[0] = current(wp_get_attachment_image_src($attachment_id, 'shop', false));
				$imageFull[0] = current(wp_get_attachment_image_src($attachment_id, 'full', false));?>
				
					<a class="zoom" title="<?php echo $imageTitle; ?>" href="<?php echo $imageFull[0];?>" rel="prettyPhoto[product-gallery]">
						<img alt="<?php echo $imageTitle; ?>" src="<?php echo $image1[0];?>"/>
					</a>
				
				<?php }
			}
		
		}

	?></div>

<?php }
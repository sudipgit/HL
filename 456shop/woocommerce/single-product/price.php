<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $post, $product;
//var_dump($product);
?>
<div itemprop="offers" class="price-meta" itemscope itemtype="http://schema.org/Offer">

	<p itemprop="price" class="price"><?php 
	
	echo $product->get_price_html();?></p>

	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
	
	<?php do_action( 'woocommerce_front_rating' ); ?>

</div>
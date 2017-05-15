<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $post, $product;
?>
<div class="product_meta">

	<?php echo $product->get_categories( ', ', ' <span class="posted_in">'.__('Category:', GETTEXT_DOMAIN).' ', '.</span>'); ?>

	<?php echo $product->get_tags( ', ', ' <span class="tagged_as">'.__('Tags:', GETTEXT_DOMAIN).' ', '.</span>'); ?>

</div>
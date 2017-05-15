<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product, $woocommerce_loop;

$related = $product->get_related();

if ( sizeof($related) == 0 ) return;

$args = apply_filters('woocommerce_related_products_args', array(
	'post_type'				=> 'product',
	'ignore_sticky_posts'	=> 1,
	'no_found_rows' 		=> 1,
	'posts_per_page' 		=> $posts_per_page,
	'orderby' 				=> $orderby,
	'post__in' 				=> $related
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] 	= 4;
$mymatches=getMatchingProducts();
if ( $products->have_posts() ) : ?>

	<div class="related1" style="text-align:center;">

		<h4><?php _e('You Might Also Like', GETTEXT_DOMAIN); ?></h4>

		<ul class="row-fluid products" style="display:inline-block;">

			<?php
           $i=1;
			while ( $products->have_posts() ) : $products->the_post();

			?>
              <li class="product <?php if($i==4) echo 'last';?>">
			   <?php if( $mymatches && count($mymatches)>0 && in_array(get_the_ID(),$mymatches)) { ?>						   
						   <span class="onsale"></span>
						   <?php } ?>
						    
				<?php woocommerce_get_template_part( 'content-related', 'product' ); ?>
              </li>
			<?php 
			$i++;
			endwhile; // end of the loop. ?>

		</ul>

	</div>

<?php endif;

wp_reset_postdata();

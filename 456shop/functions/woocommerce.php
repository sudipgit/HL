<?php
/**
 * LAYOUT
 */
function shop_layout_pages_after() {
    ?></div></div></div><?php    
}
add_action( 'woocommerce_sidebar', 'shop_layout_pages_after', 99 );


remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_front_rating', 'woocommerce_front_rating', 10);

remove_action( 'woocommerce_pagination', 'woocommerce_catalog_ordering', 20 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
add_action( 'woocommerce_catalog_ordering', 'woocommerce_catalog_ordering', 10 );
add_action( 'woocommerce_breadcrumb', 'woocommerce_breadcrumb', 10 );

add_action( 'woocommerce_template_single_title', 'woocommerce_template_single_title', 10 );
add_action( 'woocommerce_template_single_price', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_template_single_excerpt', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_template_single_add_to_cart', 'woocommerce_template_single_add_to_cart', 10 );
add_action( 'woocommerce_template_single_meta', 'woocommerce_template_single_meta', 10 );
add_action( 'woocommerce_template_single_sharing', 'woocommerce_template_single_sharing', 10 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
add_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

add_filter( 'woocommerce_add_to_cart_message', 'custom_add_to_cart_message' );
function custom_add_to_cart_message() {
	global $woocommerce;

	// Output success messages
	if (get_option('woocommerce_cart_redirect_after_add')=='yes') :

		$return_to 	= get_permalink(woocommerce_get_page_id('shop'));

		$message 	= sprintf('<a href="%s" class="message-button">%s</a> %s', $return_to, __('Continue Shopping &rarr;', 'woocommerce'), __('Product successfully added to your cart.', 'woocommerce') );

	else :

		$message 	= sprintf('<a href="%s" class="message-button">%s</a> %s', get_permalink(woocommerce_get_page_id('cart')), __('View Cart &rarr;', 'woocommerce'), __('Product successfully added to your cart.', 'woocommerce') );

	endif;

		return $message;
}

if ( ! function_exists( 'woocommerce_subcategory_thumbnail' ) ) {

	/**
	 * Show subcategory thumbnails.
	 *
	 * @access public
	 * @param mixed $category
	 * @subpackage	Loop
	 * @return void
	 */
	function woocommerce_subcategory_thumbnail( $category  ) {
		global $woocommerce;

		$thumbnail_size  = apply_filters( 'single_product_small_thumbnail_size', 'shop' );

		$thumbnail_id  = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );

		if ( $thumbnail_id ) {
			$image = wp_get_attachment_image_src( $thumbnail_id, $thumbnail_size  );
			$image = $image[0];
		} else {
			$image = woocommerce_placeholder_img_src();
		}

		if ( $image )
			echo '<img src="' . $image . '" alt="' . $category->name . '" />';
	}
}

if ( ! function_exists( 'woocommerce_output_related_products' ) ) {

	/**
	 * Output the related products.
	 *
	 * @access public
	 * @subpackage	Product
	 * @return void
	 */
	function woocommerce_output_related_products() {
		woocommerce_related_products( 4, 4  );
	}
}

/**
 * WooCommerce Loop Product Thumbs
 **/

 if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

	function woocommerce_template_loop_product_thumbnail() {
		echo woocommerce_get_product_thumbnail();
	} 
 }
 
 if ( ! function_exists( 'woocommerce_front_rating' ) ) {

	function woocommerce_front_rating() {
		echo woocommerce_get_front_rating();
	} 
 }


/**
 * WooCommerce Product Thumbnail
 **/
 if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {
	
	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post, $woocommerce;
		global $product;
//var_dump($product);
		if ( ! $placeholder_width )
			$placeholder_width = $woocommerce->get_image_size( 'shop_catalog_image_width' );
		if ( ! $placeholder_height )
			$placeholder_height = $woocommerce->get_image_size( 'shop_catalog_image_height' );
			
			
				if ( (! $product->is_in_stock()) || ($product->product_type == 'external') || ( ! $product->is_purchasable() && ! in_array( $product->product_type, array( 'external', 'grouped' ) ) ) ){
				
					$effect = 'effect-thumb';
				
				}else{
					
					$effect = 'effect-thumb effect-thumb-2';
					
				}
			
			$output = '<div class="imagewrapper '.$effect.'">';

	
			if ( has_post_thumbnail() ) {
				
				$output .= '<a href="'.get_permalink( $post->ID ).'">'.get_the_post_thumbnail( $post->ID, 'shop' ).'</a>';
				

if ( ! $product->is_purchasable() && ! in_array( $product->product_type, array( 'external', 'grouped' ) ) ){

	$output .= '<a class="icon info ttip" rel="tooltip" data-placement="bottom" href="javascript:getProductPopup('.$product->id.');" title="'.__('Quick View', GETTEXT_DOMAIN).'"></a>';
	
}else{

	if ( ! $product->is_in_stock() ){
	
		$output .= '<a class="icon info ttip" rel="tooltip" data-placement="bottom" href="'.apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ).'" title="'.__('Read More', GETTEXT_DOMAIN).'"></a>';
	
	}else{
			switch ( $product->product_type ) {
				case "variable" :
					$icon   = 'check';
					$link 	= apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
					$label 	= apply_filters( 'variable_add_to_cart_text', __('Select options', GETTEXT_DOMAIN) );
				break;
				case "grouped" :
					$icon   = 'search';
					$link 	= apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->id ) );
					$label 	= apply_filters( 'grouped_add_to_cart_text', __('View options', GETTEXT_DOMAIN) );
				break;
				case "external" :
					$disable = 'yes';
					#$icon   = 'shopping-cart';
					#$link 	= apply_filters( 'external_add_to_cart_url', get_permalink( $product->id ) );
					#$label 	= apply_filters( 'external_add_to_cart_text', __('Read More', 'woocommerce') );
				break;
				default :
					$icon   = 'shopping-cart';
					$link 	= get_post_meta($product->id,'affiliate_link',true);
					$label 	= apply_filters( 'add_to_cart_text', __('Check It Out', GETTEXT_DOMAIN) );
				break;
			}
			
			if($disable == 'yes'){
			
				$output .= '<a class="icon info ttip" rel="tooltip" data-placement="bottom" href="javascript:getProductPopup('.$product->id.');" title="'.__('Quick View', GETTEXT_DOMAIN).'"></a>';
				
			}else{
			
				$affiliate_link = get_post_meta($product->id,'affiliate_link',true);
				$output .= '<div class="effect-wrap clearfix"><a class="icon info ttip" href="javascript:getProductPopup('.$product->id.');" data-placement="bottom" rel="tooltip" title="'.__('Quick View', GETTEXT_DOMAIN).'"></a>';
				$output .= '<a target="_blank" class="icon  shopping-cart ttip product_type_simple" data-placement="top" rel="tooltip" href="'.$affiliate_link.'" data-product_id="1801" data-original-title="Check It Out"></a>';
				$output .= '<a target="_blank" class="icon icon2 ttip" data-placement="bottom" rel="tooltip" data-original-title="Add Hair Story" href="http://hairlibrary.com/upload-photo/?pt='.$product->post->post_name.'"><img  style="margin:16px 0 0 7px; width:35px;" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/hair-story.png" /></a></div>';
				
			}
	}
   
}
    


				
			} else {
			
				$output .= '<a href="'.get_permalink( $post->ID ).'"><img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="480" height="480" /></a>';
		



if ( ! $product->is_purchasable() && ! in_array( $product->product_type, array( 'external', 'grouped' ) ) ){

	$output .= '<a class="icon info ttip" rel="tooltip" data-placement="bottom" href="javascript:getProductPopup('.$product->id.');" title="'.__('Quick View', GETTEXT_DOMAIN).'"></a>';
	
}else{

	if ( ! $product->is_in_stock() ){
	
		$output .= '<a class="icon info ttip" rel="tooltip" data-placement="bottom" href="'.apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ).'" title="'.__('Read More', GETTEXT_DOMAIN).'"></a>';
	
	}else{
			switch ( $product->product_type ) {
				case "variable" :
					$icon   = 'check';
					$link 	= apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
					$label 	= apply_filters( 'variable_add_to_cart_text', __('Select options', GETTEXT_DOMAIN) );
				break;
				case "grouped" :
					$icon   = 'search';
					$link 	= apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->id ) );
					$label 	= apply_filters( 'grouped_add_to_cart_text', __('View options', GETTEXT_DOMAIN) );
				break;
				case "external" :
					$disable = 'yes';
					#$icon   = 'shopping-cart';
					#$link 	= apply_filters( 'external_add_to_cart_url', get_permalink( $product->id ) );
					#$label 	= apply_filters( 'external_add_to_cart_text', __('Read More', 'woocommerce') );
				break;
				default :
					$icon   = 'shopping-cart';
					$link 	= get_post_meta($product->id,'affiliate_link',true);
					$label 	= apply_filters( 'add_to_cart_text', __('Check It Out', GETTEXT_DOMAIN) );
				break;
			}
			
			if($disable == 'yes'){
			
				$output .= '<a class="icon info ttip" rel="tooltip" data-placement="bottom" href="'.get_permalink().'" title="'.__('Quick View', GETTEXT_DOMAIN).'"></a>';
				
			}else{
			
				$output .= '<div class="effect-wrap clearfix"><a class="icon info ttip" rel="tooltip" data-placement="bottom" href="javascript:getProductPopup('.$product->id.');" title="'.__('Quick View', GETTEXT_DOMAIN).'"></a>';
				$output .= '<a target="_blank" class="icon icon2 shopping-cart ttip product_type_'.$product->product_type.'" data-product_id="'.$product->id.'" href="'.$link.'" rel="tooltip" data-placement="bottom" title="'.$label.'"></a></div>';
				
			}
	
	}

}
				
			}
			
			$output .= '</div><div class="clearfix"></div>';
			
			
			return $output;
	}
 }
 
 if ( ! function_exists( 'woocommerce_get_front_rating' ) ) {
	
	function woocommerce_get_front_rating() {
		global $post;
		global $wpdb;
	
	$count = $wpdb->get_var("
		SELECT COUNT(meta_value) FROM $wpdb->commentmeta
		LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
		WHERE meta_key = 'rating'
		AND comment_post_ID = $post->ID
		AND comment_approved = '1'
		AND meta_value > 0
	");

	$rating = $wpdb->get_var("
		SELECT SUM(meta_value) FROM $wpdb->commentmeta
		LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
		WHERE meta_key = 'rating'
		AND comment_post_ID = $post->ID
		AND comment_approved = '1'
	");
	
	if ( $count > 0 ){
	
			$average = number_format($rating / $count, 2);
			
			$output .= '<div class="star-rating" title="'.sprintf(__('Rated %s out of 5', GETTEXT_DOMAIN), $average).'"><span style="width:'.($average*16).'px"><span itemprop="ratingValue" class="rating">'.$average.'</span> '.__('out of 5', GETTEXT_DOMAIN).'</span></div>';

	}
			
			return $output;
	}
 }

add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');

function custom_woocommerce_placeholder_img_src( $src ) {
    $upload_dir = wp_upload_dir();
    $uploads = THEME_ASSETS;
    $src = $uploads . '/img/placeholder.png';
    return $src;
}

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
}
if (!$loop_shop_per_page){
    $loop_shop_per_page = 12;
}
$loop_shop_per_page = "return $loop_shop_per_page;";
$loop_shop_per_page = create_function('$cols', $loop_shop_per_page);

//NUMBER OF PRODICTS TO DISPLAY ON SHOP PAGE
add_filter('loop_shop_per_page', $loop_shop_per_page);
?>
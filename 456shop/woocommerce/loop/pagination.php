<?php
/**
 * Pagination
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $wp_query;
?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>

<div class="navigation">
	<?php $big = 999999999; // need an unlikely integer
    echo paginate_links(array(
    	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    	'format' => '?paged=%#%',
        'prev_text' => __('&larr; Previous', GETTEXT_DOMAIN),
        'next_text' => __('Next &rarr;', GETTEXT_DOMAIN),
    	'current' => max( 1, get_query_var('paged') ),
    	'total' => $wp_query->max_num_pages
    ));?>
</div>

<?php endif; ?>
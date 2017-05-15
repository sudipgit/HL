<?php
global $woocommerce;


add_theme_support('woocommerce');
/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( 'option-tree/ot-loader.php' );
/**
 * Theme Options
 */
include_once( 'option-tree/theme-options.php' );

/* URI shortcuts
================================================== */
define( 'THEME_ASSETS', get_template_directory_uri() . '/assets/', true );
define( 'GETTEXT_DOMAIN', '456shop' );

/* Localization
================================================== */
add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain( GETTEXT_DOMAIN, get_template_directory() . '/languages');
}

require_once dirname( __FILE__ ) . '/functions/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

function my_theme_register_required_plugins() {

	$plugins = array(

		array(
			'name'     				=> 'Contact Form v3.4', // The plugin name
			'slug'     				=> 'wp-contact-form-7', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/contact-form-7v3-4.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		array(
			'name'     				=> 'Dynamic Grid: Photo Gallery v1.1.2', // The plugin name
			'slug'     				=> 'dynamic-grid-gallery', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/dynamic-grid-gallery.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		array(
			'name'     				=> 'jNewsticker v1.1.6', // The plugin name
			'slug'     				=> 'jnewsticker-for-wordpress', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/jnewsticker-for-wordpress.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		array(
			'name'     				=> 'Layerslider v4.5', // The plugin name
			'slug'     				=> 'layerslider', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/layerslider-4-5.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		array(
			'name'     				=> 'Nivo Slider v1.9', // The plugin name
			'slug'     				=> 'nivo-slider', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/nivo-slider.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		array(
			'name'     				=> 'wpStickies v1.5', // The plugin name
			'slug'     				=> 'wpstickers', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/wpstickers.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		array(
			'name'     				=> 'Mail Chimp Signup Forms v1.1', // The plugin name
			'slug'     				=> 'mailchimp-signup', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/mailchimp-signup.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

	);

	$theme_text_domain = '456shop';

	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}

/* Feed Links
================================================== */
add_theme_support('automatic-feed-links');

/* content width
================================================== */
if ( ! isset( $content_width ) )
	$content_width = 620;

/* Register WP Menus
================================================== */
function register_menu() {
	register_nav_menu('primary-menu', __('Primary Menu'));
	register_nav_menu('footer-menu', __('Footer Menu'));
	register_nav_menu('mobile-menu', __('Mobile Menu'));
	register_nav_menu('mobile-right-menu', __('Mobile Right Menu'));
}
add_action('init', 'register_menu');


// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_theme_support' ) ) {
	set_post_thumbnail_size( 56, 56, true ); // Normal post thumbnails
	add_image_size( 'blog-style-1', 770, 371, true ); // Blog style 1 thumbnail
	add_image_size( 'blog-style-2', 1170, 372, true ); // Blog style 2 thumbnail, full-widht thumbnail
	add_image_size( 'portfolio-post', 770, 770, true ); // portfolio post main thumbnail
	add_image_size( 'widget-thumb', 45, 45, true ); // Widget post thumbnail
	add_image_size( 'client', 234, 150, true ); // Client thumbnail
	add_image_size( 'front-image', 1170, 400, true ); // Front Image thumbnail
	add_image_size( 'front-image2', 770, 400, true ); // Front Image 2 thumbnail
	add_image_size( 'shop-image2', 870, 400, true ); // Shop Image 2 thumbnail
	add_image_size( 'shop', 570, 570, true ); // Shop thumbnail
	add_image_size( 'product', 580, 580, true ); // Product thumbnail
	add_image_size( 'zoom', 1000, 1000, true ); // Shop zoom thumbnail
	add_image_size( 'shop-navi', 156, 156, true ); // Shop navigation thumbnail
	add_image_size( 'video-thumbnail',250 ,150 , true );
}

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
global $woocommerce;
ob_start();
?>
<div class="header-cart btn-group pull-right">
    <a class="dropdown-toggle Total cart-icon" data-toggle="dropdown" href="#">
    	<?php _e('Cart', GETTEXT_DOMAIN ); ?> - <span><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span>
    </a>
    <div class="dropdown-menu">
		<div class="header_cart_list">

			<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>

				<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

					$_product = $cart_item['data'];

					// Only display if allowed
					if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
						continue;

					// Get price
					$product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();

					$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );?>

					<div class="item clearfix">
						<a class="cart-thumbnail" href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php echo $_product->get_image('widget-thumb'); ?></a>
						<div class="cart-content">
							<a class="cart-title" href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?></a>
							<?php echo $woocommerce->cart->get_item_data( $cart_item ); ?>
							<div class="cart-meta">
								<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">remove</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', GETTEXT_DOMAIN) ), $cart_item_key );?>
								<span class="quantity"><?php printf( '%s &times; %s', $cart_item['quantity'], $product_price ); ?></span>
							</div>
						</div>
					</div>

				<?php endforeach; ?>

			<?php else : ?>

				<div class="empty"><?php _e('No products in the cart.', GETTEXT_DOMAIN); ?></div>

			<?php endif; ?>

		</div><!-- end product list -->

		<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>

		<div class="header_cart_footer">
			<p class="total cleanfix"><strong><?php _e('Cart Subtotal', GETTEXT_DOMAIN); ?>:</strong> <span><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span></p>

			<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

			<p class="buttons">
				<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="btn btn-primary btn-small"><?php _e('View Cart &rarr;', GETTEXT_DOMAIN); ?></a>
				<a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="btn btn-primary btn-small checkout"><?php _e('Checkout &rarr;', GETTEXT_DOMAIN); ?></a>
			</p>
		</div>

		<?php endif; ?>
    </div>
<?php
$fragments['.header-cart'] = ob_get_clean();
return $fragments;
}



/* Grayscale Thumbnails
================================================== */
require_once (TEMPLATEPATH. '/functions/grayscale.php');
grayscale_add_image_size( 'client', 234, 150, true);

/* Register and load JS, CSS
================================================== */
function theme_enqueue_scripts() {

    // register scripts;
    wp_register_style('woocommerce', THEME_ASSETS . 'css/woocommerce.css');

    wp_register_style('responsive', THEME_ASSETS . 'css/responsive.css');
    wp_register_style('1200-fixed', THEME_ASSETS . 'css/fixed_1170_layouts.css');
    wp_register_style('1200-responsive', THEME_ASSETS . 'css/responsive_1170_layouts.css');

	wp_deregister_script('jquery');
    wp_register_script('jquery', 'http://code.jquery.com/jquery-1.8.1.min.js', false, '1.8.1', false);
    wp_register_script('twitter-widgets', 'http://platform.twitter.com/widgets.js', false, false, true);
    wp_register_script('prettify', THEME_ASSETS.'js/google-code-prettify/prettify.js', false, false, true);
    wp_register_script('bootstrap-transition', THEME_ASSETS.'js/bootstrap-transition.js', false, false, true);
    wp_register_script('bootstrap-modal', THEME_ASSETS.'js/bootstrap-modal.js', false, false, true);
    wp_register_script('bootstrap-alert', THEME_ASSETS.'js/bootstrap-alert.js', false, false, true);
    wp_register_script('bootstrap-dropdown', THEME_ASSETS.'js/bootstrap-dropdown.js', false, false, true);
    wp_register_script('bootstrap-scrollspy', THEME_ASSETS.'js/bootstrap-scrollspy.js', false, false, true);
    wp_register_script('bootstrap-tab', THEME_ASSETS.'js/bootstrap-tab.js', false, false, true);
    wp_register_script('bootstrap-tooltip', THEME_ASSETS.'js/bootstrap-tooltip.js', false, false, true);
    wp_register_script('bootstrap-popover', THEME_ASSETS.'js/bootstrap-popover.js', false, false, true);
    wp_register_script('bootstrap-collapse', THEME_ASSETS.'js/bootstrap-collapse.js', false, false, true);
    wp_register_script('bootstrap-carousel', THEME_ASSETS.'js/bootstrap-carousel.js', false, false, false);
    wp_register_script('bootstrap-typeahead', THEME_ASSETS.'js/bootstrap-typeahead.js', false, false, true);
    wp_register_script('bootstrap-affix', THEME_ASSETS.'js/bootstrap-affix.js', false, false, true);
    wp_register_script('application', THEME_ASSETS.'js/application.js', false, false, true);
    wp_register_script('bootstrap-function', THEME_ASSETS.'js/bootstrap.function.js', false, false, true);
    wp_register_script('ba-resize', THEME_ASSETS.'cowboy-jquery-resize-21ae0ec/jquery.ba-resize.min.js', false, false, true);
    wp_register_script('bootstrap-mega-dd', THEME_ASSETS.'js/bootstrap-mega-dd.js', false, false, true);


    wp_register_script('seaofclouds', THEME_ASSETS.'seaofclouds-tweet-f0ca756/tweet/jquery.tweet.js', false, false, false);
    wp_register_script('isotope', THEME_ASSETS.'isotope/jquery.isotope.min.js', 'jquery');
    wp_register_script('isotope-function', THEME_ASSETS.'isotope/isotope.function.js', 'jquery');
    wp_register_script('animate-shadow', THEME_ASSETS.'js/jquery.animate-shadow-min.js', 'jquery');
    wp_register_script('animate-shadow-function', THEME_ASSETS.'js/animate-shadow.function.js', 'jquery');
    wp_register_script('pp', THEME_ASSETS.'prettyPhoto/jquery.prettyPhoto.js', 'jquery');
    wp_register_script('pp-function', THEME_ASSETS.'prettyPhoto/prettyPhoto.function.js', 'jquery');
    wp_register_script('etalage', THEME_ASSETS.'etalage/js/jquery.etalage.min.js', 'jquery');
	wp_register_script('etalage-function', THEME_ASSETS.'js/etalage.function.js', 'jquery');
	wp_register_script('etalage-function-960', THEME_ASSETS.'js/etalage.function-960.js', 'jquery');
	wp_register_script('fancybox', THEME_ASSETS.'js/jquery.fancybox-1.3.4.pack.js', 'jquery');

	wp_register_script('iframe-function', THEME_ASSETS.'js/iframe.function.js', 'jquery');
	wp_register_script('selector-function', THEME_ASSETS.'js/selector.function.js', 'jquery');
    wp_register_script('footer-function', THEME_ASSETS.'js/footer.function.js', 'jquery');
    wp_register_script('input-function', THEME_ASSETS.'js/input.function.js', 'jquery');
    wp_register_script('blog-function', THEME_ASSETS.'js/blog.function.js', 'jquery');
    wp_register_script('custom-function', THEME_ASSETS.'js/custom.function.js', 'jquery');
    wp_register_script('newsticker-fix', THEME_ASSETS.'js/newsticker-fix.js', 'jquery');

	// enqueue scripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('twitter-widgets');
	wp_enqueue_script('prettify');
	wp_enqueue_script('bootstrap-transition');
	wp_enqueue_script('bootstrap-modal');
	wp_enqueue_script('bootstrap-alert');
	wp_enqueue_script('bootstrap-dropdown');
	wp_enqueue_script('bootstrap-scrollspy');
	wp_enqueue_script('bootstrap-tab');
	wp_enqueue_script('bootstrap-tooltip');
	wp_enqueue_script('bootstrap-popover');
	wp_enqueue_script('bootstrap-collapse');
	wp_enqueue_script('bootstrap-carousel');
	wp_enqueue_script('bootstrap-typeahead');
	wp_enqueue_script('bootstrap-affix');
	wp_enqueue_script('application');
	wp_enqueue_script('bootstrap-function');
	wp_enqueue_script('ba-resize');
	wp_enqueue_script('bootstrap-mega-dd');


	wp_enqueue_script('seaofclouds');
	wp_enqueue_script('isotope');
    wp_enqueue_script('isotope-function');
    wp_enqueue_script('pp');
    wp_enqueue_script('pp-function');
    wp_enqueue_script('etalage');
    wp_enqueue_script('fancybox');
    wp_enqueue_script('iframe-function');
    wp_enqueue_script('selector-function');
    wp_enqueue_script('footer-function');
    wp_enqueue_script('input-function');
    wp_enqueue_script('blog-function');
    wp_enqueue_script('custom-function');
    wp_enqueue_script('newsticker-fix');

    wp_enqueue_script('animate-shadow');
    wp_enqueue_script('animate-shadow-function');


    if ( is_singular() ) wp_enqueue_script( "comment-reply" );

}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

function woocommerce_styles() {
    wp_enqueue_style('woocommerce');
}
function responsive() {
    wp_enqueue_style('responsive');
}
function fixed_1170_layouts() {
	wp_enqueue_style('1200-fixed');
}

function responsive_1170_layouts() {
	wp_enqueue_style('1200-responsive');
}
function etalage_function() {
	wp_enqueue_script('etalage-function');;
}
function etalage_function_960() {
	wp_enqueue_script('etalage-function-960');;
}

function add_admin_scripts( $hook ) {

    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        wp_enqueue_script('custom-js', get_template_directory_uri().'/functions/js/custom-js.js');
    }
}
add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );

/* Sidebar
================================================== */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Footer',
		'before_widget' => '<div class="span4 one-column"><div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Contact Page Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Portfolio Post Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Shop Sidebar',
        'description' => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Product Post Sidebar',
        'description' => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Footer Meta',
        'description' => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Front Meta',
        'description' => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Right Header Meta',
        'description' => 'Alternative for multilingual project, available widgets for this sidebar "Text" and "Black Studio TinyMCE"',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Shortcode Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Best seller Sidebar',
        'description' => '',
		'before_widget' => '<div id="%1$s" class="related-product %2$s">',
		'after_widget' => '</div>',

	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Photo Upload',
        'description' => '',
		'before_widget' => '<div id="%1$s" class="upload-search %2$s">',
		'after_widget' => '</div>',

	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Instagram Picture',
        'description' => '',
		'before_widget' => '<div id="%1$s" class="instagram-pic %2$s">',
		'after_widget' => '</div>',

	));
}


function html_widget_title( $title ) {
	//HTML tag opening/closing brackets
	$title = str_replace( '[', '<', $title );
	$title = str_replace( '[/', '</', $title );

	$title = str_replace( 'select]', 'span>', $title );

	return $title;
}
add_filter( 'widget_title', 'html_widget_title' );

function custom_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 13; //largest tag
	$args['smallest'] = 13; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget' );
add_filter( 'woocommerce_product_tag_cloud_widget_args', 'custom_tag_cloud_widget' );

/* fix current_page_parent for custom posts [for archive is_post_type_archive( 'post_type' )]
================================================== */
function fix_blog_menu_css_class( $classes, $item ) {
    if ( is_tax( 'portfolio_tags' ) || is_tax( 'portfolio_category' ) || is_singular( 'portfolio' ) ) {
        if ( $item->object_id == get_option('page_for_posts') ) {
            $key = array_search( 'current_page_parent', $classes );
            if ( false !== $key )
                unset( $classes[ $key ] );
        }
    }

    return $classes;
}
add_filter( 'nav_menu_css_class', 'fix_blog_menu_css_class', 10, 2 );

require_once (TEMPLATEPATH. '/functions/custom-widgets/widget-post-tabs.php');
require_once (TEMPLATEPATH. '/functions/custom-widgets/widget-posts.php');
require_once (TEMPLATEPATH. '/functions/custom-widgets/widget-twitter.php');
require_once (TEMPLATEPATH. '/functions/custom-widgets/widget-footer-meta.php');
require_once (TEMPLATEPATH. '/functions/custom-widgets/widget-front-meta.php');

/*  wpml functions
================================================== */
function language_selector_flags(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        foreach($languages as $l){
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
            echo '<img class="ttip" data-placement="bottom" rel="tooltip" title="'.$l['translated_name'].'" src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
            if(!$l['active']) echo '</a>';
        }
    }
}

/*  get attachment id
================================================== */
function get_attachment_id_from_src ($image_src) {
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	$id = $wpdb->get_var($query);
	return $id;
}

/* Excerpt&content words filter
================================================== */
function excerpt_portfolio($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).' &#91;...&#93;';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}


add_filter( 'post_gallery', 'my_post_gallery', 10, 2 );
function my_post_gallery( $output, $attr) {
    global $post, $wp_locale;

    static $instance = 0;
    $instance++;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'zoom',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $output = apply_filters('gallery_style', "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
                text-align: center;
                margin: 0;
                width: {$itemwidth}%;
            }
            .gallery-icon{
            	padding: 10% 10% 10px;
            }
            #{$selector} .gallery-caption {
                margin-left: 0;
                margin-bottom: 10%;
                font-weight: bold;
            }
        </style>
        <!-- see gallery_shortcode() in wp-includes/media.php -->
        <div id='$selector' class='gallery galleryid-{$id}'>");

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "
            <{$icontag} class='gallery-icon'>
                $link
            </{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='gallery-caption'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '<br style="clear: both" />';
    }

    $output .= "
            <br style='clear: both;' />
        </div>\n";

    return $output;
}

/* Theme Functions
================================================== */


require_once (TEMPLATEPATH. '/functions/custom-about_fields.php');
require_once (TEMPLATEPATH. '/functions/post_types_about.php');
require_once (TEMPLATEPATH. '/functions/custom-post_fields.php');
require_once (TEMPLATEPATH. '/functions/custom-sidebar_fields.php');
require_once (TEMPLATEPATH. '/functions/theme_walker.php');
require_once (TEMPLATEPATH. '/functions/theme_video.php');
require_once (TEMPLATEPATH. '/functions/theme_comments.php');
require_once (TEMPLATEPATH. '/functions/post_types-portfolio.php');
require_once (TEMPLATEPATH. '/functions/post_types_front_tabs.php');
require_once (TEMPLATEPATH. '/functions/post_types_clients.php');
require_once (TEMPLATEPATH. '/functions/custom-portfolio_fields.php');
require_once (TEMPLATEPATH. '/functions/custom-page_fields.php');
require_once (TEMPLATEPATH. '/functions/custom-page-portfolio_fields.php');
require_once (TEMPLATEPATH. '/functions/custom-front_tabs_fields.php');
require_once (TEMPLATEPATH. '/functions/custom-widgets/black-studio-tinymce-widget/black-studio-tinymce-widget.php');
require_once (TEMPLATEPATH. '/functions/dw-shortcodes-bootstrap/designwall-shortcodes.php');
require_once (TEMPLATEPATH. '/functions/shortcodes.php');
include_once (TEMPLATEPATH. '/admin/shortcode-tinymce.php');
include_once (TEMPLATEPATH. '/functions/woocommerce.php');
include_once (TEMPLATEPATH. '/functions/brandadmin.php');
include_once (TEMPLATEPATH. '/functions/photostore.php');
include_once (TEMPLATEPATH. '/functions/likes.php');
include_once (TEMPLATEPATH. '/functions/feeds.php');
include_once (TEMPLATEPATH. '/functions/comments.php');
include_once (TEMPLATEPATH. '/functions/salons.php');
include_once (TEMPLATEPATH. '/functions/products.php');
include_once (TEMPLATEPATH. '/functions/users.php');
include_once (TEMPLATEPATH. '/functions/newsletters.php');



add_action( 'init', 'create_youtube_custom_post_type' );
function create_youtube_custom_post_type() {
	register_post_type( 'youtube',
		array(
			'labels' => array(
				'name' => __( 'Youtube Videos' ),
				'singular_name' => __( 'Youtube Video' )
			),
		'supports' =>  array('title', 'editor' ,'thumbnail'  ),
		'public' => true,
		'has_archive' => true,
		)
	);
}

add_filter('show_admin_bar', '__return_false'); 




function hlcustom_add_meta_box() {

	$screens = array('page' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'hlcustom_sectionid',
			__( 'Related products', 'hlcustom_textdomain' ),
			'hlcustom_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'hlcustom_add_meta_box' );


function hlcustom_meta_box_callback( $post ) {


	$value = get_post_meta( $post->ID, 'collection_product_items', true );

	echo '<label for="hlcustom_collection_product_items">';
	_e( 'Products separated by comma', 'hlcustom_textdomain' );
	echo '</label> ';
	echo '<input style="width:98%;" type="text" id="hlcustom_collection_product_items" name="hlcustom_collection_product_items" value="' . esc_attr( $value ) . '" size="25" placeholder="1253,2654,1355...." /> ';
}


function hlcustom_save_meta_box_data( $post_id ) {

	// Make sure that it is set.
	if ( ! isset( $_POST['hlcustom_collection_product_items'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['hlcustom_collection_product_items'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'collection_product_items', $my_data );
}
add_action( 'save_post', 'hlcustom_save_meta_box_data' );




//add_action ( 'user_register', 'send_activation_link');


function send_activation_link($user_id,$username=null,$pass=null){
$hash = md5( $random_number );
add_user_meta( $user_id, 'sk_user_activation_code', $hash );
$user_info = get_userdata($user_id);

$link = home_url('/').'activate?id='.$username.'&key='.$hash;
/*
$message='<div style="position: relative; border:1px solid #ddd;width:850px; height:546px; font-family: garamond;margin:0 auto;background:url(http://hairlibrary.com/wp-content/themes/456shop/assets/img/email-back3.png)no-repeat;">
<a href="'.$link.'" style="padding: 13px 40px; color: #fff; background: url(http://hairlibrary.com/wp-content/themes/456shop/assets/img/button-arrow.png) no-repeat 99% 50% #d9197e;  border-radius: 6px; font-size: 18px; text-decoration: none; text-transform: uppercase; margin:318px 30px 0 0;float:right ">Confirm Your Account</a>


<div style="clear:both;color: #fff; float:right; text-align:center; margin:121px 20px 0 0;">

<a style="padding:3px 10px; text-decoration:none;color:#fff;font-size: 16px;" href="http://hairlibrary.com">Home</a>
<a style="padding:3px 10px;text-decoration:none;color:#fff;font-size: 16px;"  href="http://hairlibrary.com/contact-us/">Contact</a>
<a style="padding:3px 10px;text-decoration:none;color:#fff;font-size: 16px;"  href="http://hairlibrary.com/terms-conditions/">Terms</a>
<a style="padding:3px 10px;text-decoration:none;color:#fff;font-size: 16px;"  href="http://hairlibrary.com/privacy/">Privacy</a>
<a style="padding:3px 10px;"  href="https://www.facebook.com/hairlibrary?ref=hl"><img height="20px" width="12px" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/social/Pink_Facebook.png" /></a>
<a style="padding:3px 10px; "  href="https://twitter.com/Hair_Library"><img height="20px" width="18px"  src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/social/Pink_Twitter.png" /></a>

<p style="color:#fff; margin-top:5px;">&copy; Hair Library 2014 Powered by Soho Analytics </p>
</div>

</div>';
*/
$message= '<div width:500px;background:#f3f4f5>
<h3 style="text-align:center">Here We Grow!</h3>
<p style="text-align:center">Thanks for signing up at Hair Library</p><br/><br/>
<p>Click the "Confirm Your Account" link below to meet your match, fall in love and tell your hair story!</p><br>
<p><a href="'.$link.'">Confirm Your Account</a></p>

</div>';


$to = $user_info->user_email;
//$to ='morgangantt@gmail.com';
$subject = "Activation Link";
$from ='info@hairlibrary.com';
$headers = "From:" . $from. "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html\r\n";
wp_mail($to,$subject,$message,$headers);

}

function iweb_change_from_name( $name = '' ) {
return get_bloginfo( 'name' );
}
add_filter( 'wp_mail_from_name', 'iweb_change_from_name' );
 


add_filter( 'authenticate','check_user_activation_code', 11, 3 );
function check_user_activation_code( $user, $user_login, $password )
	{
	$user_info = get_user_by( 'login', $user_login );
	 //  $activation_code = get_user_meta( $user_info->ID, $this->user_meta, true );
	
	$error = new WP_Error();
	
	if( empty( $user_info ) )
		{
			// add the error message for invalid username
			$error->add( 'incorrect user', __( 'Username does not exist', 'user-activation-email' ) );
			
			// remove the ability to authenticate
			remove_action( 'authenticate', 'wp_authenticate_username_password', 20 );
			
			// return appropriate error
			return $error;
		}
		else
		{
			// get the custom user meta defined during registration
			$activation_code = get_user_meta( $user_info->ID, 'sk_user_activation_code', true );
		}
		
		if( $activation_code !== 'active' && !is_brand($user_info->ID) && $user_info->ID!==1 && $user_info->ID!==56 && $user_info->ID!==169 && $user_info->roles[0]!='customer_service')
		{
			$user = new WP_Error( 'access_denied', __( 'Sorry, that activation code does not match. Please try again. You can find the activation code in your welcome email.', 'user-activation-email' ) );
				// deny access to login and send back to login page
				remove_filter( 'authenticate', 'wp_authenticate_username_password', 20 );
				
				return $user;
		}
	
	}
	

function update_activation_code( $user_login ,$code)
	{
		// get user data by login
		$user_info = get_user_by( 'login', $user_login );
		$activation_code = get_user_meta( $user_info->ID, 'sk_user_activation_code', true );
		if($activation_code==$code)
		{
		  update_user_meta( $user_info->ID, 'sk_user_activation_code', 'active' );
		//  sendPassowrdEmail($user_info);
		  return true;
		  
		}
		   
		   return false;
	}
	
function sendPassowrdEmail($user)
{


$str="abcdefghijklmnopqrstuvwxyzABCDRFGHIJKLMNOPQRSTUVWXYZ123456789*&^%$#@!";
$password="";
for($i=0;$i<=rand(6,9);$i++)
{
if($i==0)
  $val=rand(1,60);
  else
 $val=rand(1,70);
 
  $char=substr($str,$val,1);
  $password=$password.$char;
}


wp_set_password( $password, $user->ID );

$message= '<div width:500px;background:#f3f4f5><p><b>You created A New Account at HairLibrary.com</a></b></p><br>
<p>Username: '.$user->user_login.'<br>Password: '.$password.'</p><br/>
<p>You can login <a href="http://hairlibrary.com/login/">HERE </a></p><br>
<p>Once you login you can change your password anytime by going to your profile page and clicking account settings.</p>

</div>';
$to = $user->user_email;
//$to ='morgangantt@gmail.com';
$subject = "Registration Password";
$from ='info@hairlibrary.com';
$headers = "From:" . $from. "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html\r\n";
wp_mail($to,$subject,$message,$headers);

return true;

}	

		
	
	
add_action("woocommerce_checkout_order_processed", "my_awesome_brand_notification");

function my_awesome_brand_notification($post_id) {
    global $woocommerce;

    $post = get_post($post_id);
	
    $checkout = $woocommerce->checkout();
    $order = new WC_Order( $post->ID );
    $author = get_userdata(get_post_meta($post->ID,'_customer_user',true));
    $title = get_the_title();
  $items = $order->get_items();
  $shipping_cost=$order->calculate_shipping();
 $billing_address=$order->get_billing_address();

  $brand_orders=array();
  
  
  global $wpdb;
 $botable=$wpdb->prefix."brand_orders";                    
   
  
  if($items)
   foreach($items as $item)
   {
   
  
      $product=get_post($item["product_id"]);
	  $branduser=get_userdata($product->post_author);
	  $item['brandemail']=$branduser->data->user_email;
	  $item['brand_id']=$product->post_author;
	  $brand_orders[$product->post_author][1][]=$item;
	  
      $data=array();
	  $data['order_id']=$post->ID;
	  $data['brand_id']= $product->post_author;
	   $data['customer_id']=$post->post_author;
	  $data['product_id']=$item["product_id"];
	  $data['qty']=$item["qty"];
	  $data['shipping_status']='open';
	  $data['order_time']=time();
	  $data['line_subtotal']=$item["line_subtotal"];
	  $data['line_total']=$item["line_total"];
	  $data['line_subtax']=$item["line_subtotal_tax"];
	  $data['line_tax']=$item["line_tax"];
	  $data['shipping_cost']=$shipping_cost;
	  $wpdb->insert($botable,$data);   
	  
   }

    ob_start();
    //$author_email = 'info@hairlibrary.com';
	$author_email = 'sudipcseku@gmail.com,info@hairlibrary.com';
   $email_subject = 'New order recieved';
   // include("email_header.php");
?>
<?php foreach($brand_orders as $border) {
$bemail=$border['brandemail'];
 ?>

<div style="background-color:#f5f5f5;width:100%;margin:0;padding:70px 0 70px 0">
        	<table cellspacing="0" cellpadding="0" width="100%" height="100%" border="0"><tbody><tr>
<td valign="top" align="center">
                		                    	<table cellspacing="0" cellpadding="0" width="680" border="0" style="border-radius:6px!important;background-color:#fdfdfd;border:1px solid #dcdcdc;border-radius:6px!important">
<tbody><tr>
<td valign="top" align="center">
                                    
                                	<table cellspacing="0" cellpadding="0" width="680" border="0" bgcolor="#000000" style="background-color:#fff;color:#ffffff;border-top-left-radius:6px!important;border-top-right-radius:6px!important;border-bottom:1px solid #ccc;font-family:Arial;font-weight:bold;line-height:100%;vertical-align:middle"><tbody><tr>
<td>
                                     <img width="47" alt="trending icon" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/TrendingIcon.png" style="float:left;margin:5px 15px;"><h1 style="color:#000;margin:0;padding:5px 24px;display:block;font-family:Arial;font-size:30px;font-weight:bold;text-align:left;line-height:150%"><span style="font-size:24px">HAIR LIBRARY : </span><span style="font-size:20px">YUREEKA! New Order Received</span> </h1>

                                            </td>
                                        </tr></tbody></table>

</td>
                            </tr>
<tr>
<td valign="top" align="center">
                                    
                                	<table cellspacing="0" cellpadding="0" width="680" border="0"><tbody><tr>
<td valign="top" style="background-color:#fdfdfd;border-radius:6px!important">
                                                
                                                <table cellspacing="0" cellpadding="20" width="100%" border="0"><tbody><tr>
<td valign="top">
                                                            <div style="color:#737373;font-family:Arial;font-size:14px;line-height:150%;text-align:left">
<p>You have received an order from <?php echo $author->data->display_name;?>. Their order is as follows:</p>


<h2 style="color:#505050;display:block;font-family:Arial;font-size:30px;font-weight:bold;margin-top:10px;margin-right:0;margin-bottom:10px;margin-left:0;text-align:left;line-height:150%">Order: #<?php echo $post->ID;?> (<u></u><?php echo date('M d, Y');?><u></u>)</h2>

<table cellspacing="0" cellpadding="6" border="1" style="width:100%;border:1px solid #eee">
<thead><tr>
<th style="text-align:left;border:1px solid #eee;background:#000;color:#fff;" scope="col">Product</th>
			<th style="text-align:left;border:1px solid #eee;background:#000;color:#fff;" scope="col">Qty</th>
			<th style="text-align:left;border:1px solid #eee;background:#000;color:#fff;" scope="col">Barcode</th>
			<th style="text-align:left;border:1px solid #eee;background:#000;color:#fff;" scope="col">Price</th>
		</tr></thead>
<tbody>
<?php 
$total=0;
foreach($border as $pitems){
foreach($pitems as $pitem){
$brandinfo=get_brand_info($pitem['brand_id']);
$total=$total+$pitem['line_total'];
$tax=$tax+$item["line_tax"]+.5;
$order_total=$total+$shipping_cost+$tax;
 ?>
<tr>
<td style="text-align:left;vertical-align:middle;border:1px solid #eee">
 <span style="float:left;display:block;margin-right:10px"><?php echo get_the_post_thumbnail($pitem['product_id'], array(40,40)); ?></span>
<span style="float:left;display:block;padding-top:10px"><?php echo $pitem['name'];?><br><?php echo getFormatedDes($brandinfo->company_name);?></span>
</td>
		<td style="text-align:left;vertical-align:middle;border:1px solid #eee"><?php echo $pitem['qty'];?></td>
		<td><img style="border:none" alt="barcode thumb"  src="<?php bloginfo('url');?>/wp-content/uploads/barcode/<?php echo get_post_meta($pitem['product_id'],'product_barcode_thumb', true );?>" width="100"/></td>
		<td style="text-align:left;vertical-align:middle;border:1px solid #eee"><span>$<?php echo $pitem['line_total'];?></span></td>
	</tr>
	<?php }} ?>
	</tbody>
<tfoot>
<tr>
<th style="text-align:left;border:1px solid #eee;border-top-width:4px" colspan="3" scope="row">Cart Subtotal:</th>
						<td style="text-align:left;border:1px solid #eee;border-top-width:4px"><span>$<?php echo $total;?></span></td>
					</tr>
<tr>
<th style="text-align:left;border:1px solid #eee" colspan="3" scope="row">Shipping:</th>
						<td style="text-align:left;border:1px solid #eee">$<?php echo number_format($shipping_cost,2,'.','');?></td>
					</tr>
<tr>
<th style="text-align:left;border:1px solid #eee" colspan="3" scope="row">Order Total:</th>
			<td style="text-align:left;border:1px solid #eee"><span>$<?php echo  number_format($order_total,2,'.','');?></span></td>
					</tr>
</tfoot>
</table>
<h2 style="color:#505050;display:block;font-family:Arial;font-size:30px;font-weight:bold;margin-top:10px;margin-right:0;margin-bottom:10px;margin-left:0;text-align:left;line-height:150%">Customer details</h2>

	<p><strong>Email:</strong> <a target="_blank" href="mailto:<?php echo $checkout->posted['billing_email'];?>"><?php echo $checkout->posted['billing_email'];?></a></p>
	<p><strong>Tel:</strong> <?php echo $checkout->posted['billing_phone'];?></p>

<table cellspacing="0" cellpadding="0" border="0" style="width:100%;vertical-align:top"><tbody><tr>

		
		<td width="50%" valign="top">

			<h3 style="color:#505050;display:block;font-family:Arial;font-size:26px;font-weight:bold;margin-top:10px;margin-right:0;margin-bottom:10px;margin-left:0;text-align:left;line-height:150%">Shipping address</h3>

			<?php echo $order->get_formatted_shipping_address();?>

		</td>

		
	</tr></tbody></table>
<br><div style="display:block;width:100%;border:solid 2px #eee;padding:5px;text-align:center;margin:0 auto">
<table><tbody><tr></tr></tbody></table>Our Latest Blog Post: <a target="_blank" style="color:#505050;font-weight:normal;text-decoration:underline" href="http://myhypehair.com/123456789/sample-post/">Sample post</a>
</div>															</div>
														</td>
                                                    </tr></tbody></table>

</td>
                                        </tr></tbody></table>

</td>
                            </tr>
<tr>
<td valign="top" align="center">
                                    
                                	<table cellspacing="0" cellpadding="10" width="600" border="0" style="border-top:0"><tbody><tr>
<td valign="top">
                                                <table cellspacing="0" cellpadding="10" width="100%" border="0"><tbody><tr>
<td valign="middle" style="border:0;color:#dc7373;font-family:Arial;font-size:12px;line-height:125%;text-align:center" colspan="2">
                                                        	<p>Rinse &amp; Repeat</p>
                                                        </td>
                                                    </tr></tbody></table>
</td>
                                        </tr></tbody></table>

</td>
                            </tr>
</tbody></table>
</td>
                </tr></tbody></table><div class="yj6qo"></div><div class="adL">
</div></div>

    <?php

  //  include("email_footer.php");


    $message = ob_get_contents();

    ob_end_clean();


    wp_mail($author_email, $email_subject, $message, $headers);
	wp_mail($bemail, $email_subject, $message, $headers);
}

}

add_filter('wp_mail_content_type','set_content_type');

function set_content_type($content_type){
return 'text/html';
}




function send_activation_link2($username=null,$pass=null){
$hash = "fwgt";

$link = home_url('/').'activate?id='.$username.'&key='.$hash;
$message='<div style="position: relative; border:1px solid #ddd;width:850px; height:546px; font-family: garamond;margin:0 auto;background:url(http://hairlibrary.com/wp-content/themes/456shop/assets/img/email-back3.png)no-repeat;">
<a href="'.$link.'" style="padding: 13px 40px; color: #fff; background: url(http://hairlibrary.com/wp-content/themes/456shop/assets/img/button-arrow.png) no-repeat 99% 50% #d9197e;  border-radius: 6px; font-size: 18px; text-decoration: none; text-transform: uppercase; margin:318px 30px 0 0;float:right ">Confirm Your Account</a>


<div style="clear:both;color: #fff; float:right; text-align:center; margin:121px 20px 0 0;">

<a style="padding:3px 10px; text-decoration:none;color:#fff;font-size: 16px;" href="http://hairlibrary.com">Home</a>
<a style="padding:3px 10px;text-decoration:none;color:#fff;font-size: 16px;"  href="http://hairlibrary.com/contact-us/">Contact</a>
<a style="padding:3px 10px;text-decoration:none;color:#fff;font-size: 16px;"  href="http://hairlibrary.com/terms-conditions/">Terms</a>
<a style="padding:3px 10px;text-decoration:none;color:#fff;font-size: 16px;"  href="http://hairlibrary.com/privacy/">Privacy</a>
<a style="padding:3px 10px;"  href="https://www.facebook.com/hairlibrary?ref=hl"><img height="20px" width="12px" alt="facebook" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/social/Pink_Facebook.png" /></a>
<a style="padding:3px 10px; "  href="https://twitter.com/Hair_Library"><img height="20px" width="18px" alt="twitter"  src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/social/Pink_Twitter.png" /></a>

<p style="color:#fff; margin-top:5px;">&copy; Hair Library 2014 Powered by Soho Analytics </p>
</div>

</div>';

$to ='sudipcseku@gmail.com';
//$to ='morgangantt@gmail.com';
$subject = "Activation Link";
$from ='info@hairlibrary.com';
$headers = "From:" . $from. "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html\r\n";
wp_mail($to,$subject,$message,$headers);

}

function isAllowDrop()
{
	
	return false;
}

?>
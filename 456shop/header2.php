<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
	
    /* General Settings
    ================================================== */
    $theme_layouts = get_option_tree('theme_layouts',$theme_options);
    $type_layouts = get_option_tree('type_layouts',$theme_options);
    $left_headermeta = get_option_tree('left_headermeta',$theme_options);
    $right_headermeta = get_option_tree('right_headermeta',$theme_options);
    $headermeta_font_size = get_option_tree('headermeta_font_size',$theme_options);
    $header_meta_c = get_option_tree('header_meta_c',$theme_options);
    $wpml_switcher = get_option_tree('wpml_switcher',$theme_options);
    $custom_logo = get_option_tree('custom_logo',$theme_options);
    $logo_tagline = get_option_tree('logo_tagline',$theme_options);
    $header_search = get_option_tree('header_search',$theme_options);
    $header_right_container = get_option_tree('header_right_container',$theme_options);
    $heading_navi = get_option_tree('heading_navi',$theme_options);
    $fb_like = get_option_tree('fb_like',$theme_options);
    $custom_css = get_option_tree('custom_css',$theme_options);
    $custom_js = get_option_tree('custom_js',$theme_options);
    
    /* Typography
    ================================================== */
    $body_font_size = get_option_tree('body_font_size',$theme_options);
    $body_font_family = get_option_tree('body_font_family',$theme_options);
    $heading_font_family = get_option_tree('heading_font_family',$theme_options);
    $google_character_sets = get_option_tree('google_character_sets',$theme_options);

    /* SEO Settings
    ================================================== */
    $disable_seo = get_option_tree('disable_seo',$theme_options);
    $theme_title = get_option_tree('theme_title',$theme_options);
    $keywords = get_option_tree('keywords',$theme_options);
    $description = get_option_tree('description',$theme_options);

    /* Theme Options
    ================================================== */
    $theme_color = get_option_tree('theme_color',$theme_options);
    $gradient_color = get_option_tree('gradient_color',$theme_options);
    $meta_pattern = get_option_tree('gradient_color',$theme_options);
    $bg_pattern = get_option_tree('bg_pattern',$theme_options);
    $bg_types = get_option_tree('bg_types',$theme_options);
    $gradient_bg_color_1 = get_option_tree('gradient_bg_color_1',$theme_options);
    $gradient_bg_color_2 = get_option_tree('gradient_bg_color_2',$theme_options);
    $bg_custom_pattern = get_option_tree('bg_custom_pattern',$theme_options);
    $bg_custom_img = get_option_tree('bg_custom_img',$theme_options);
    
    $favicon = get_option_tree('favicon',$theme_options);
    $iphone_icon = get_option_tree('iphone_icon',$theme_options);
    $ipad_icon = get_option_tree('ipad_icon',$theme_options);
    $iphone2_icon = get_option_tree('iphone2_icon',$theme_options);
    $ipad2_icon = get_option_tree('ipad2_icon',$theme_options);
    
    /* Menu Options
    ================================================== */
	$exclude_primarynavi = get_option_tree('exclude_primarynavi',$theme_options);
	$menu_order = get_option_tree('menu_order',$theme_options);
	$navi_type = get_option_tree('navi_type',$theme_options);
	
    /* Social Media
    ================================================== */
    $disable_social = get_option_tree('disable_social',$theme_options);
	$_500px = get_option_tree('500px',$theme_options);
	$about_me = get_option_tree('about_me',$theme_options);
	$add_this = get_option_tree('add_this',$theme_options);
	$amazon = get_option_tree('amazon',$theme_options);
	$aol = get_option_tree('aol',$theme_options);
	$app_store_alt = get_option_tree('app_store_alt',$theme_options);
	$app_store = get_option_tree('app_store',$theme_options);
	$apple = get_option_tree('apple',$theme_options);
	$bebo = get_option_tree('bebo',$theme_options);
	$behance = get_option_tree('behance',$theme_options);
	$bing = get_option_tree('bing',$theme_options);
	$blip = get_option_tree('blip',$theme_options);
	$blogger = get_option_tree('blogger',$theme_options);
	$coroflot = get_option_tree('coroflot',$theme_options);
	$daytum = get_option_tree('daytum',$theme_options);
	$delicious = get_option_tree('delicious',$theme_options);
	$design_bump = get_option_tree('design_bump',$theme_options);
	$designfloat = get_option_tree('designfloat',$theme_options);
	$deviant_art = get_option_tree('deviant_art',$theme_options);
	$digg_alt = get_option_tree('digg_alt',$theme_options);
	$digg = get_option_tree('digg',$theme_options);
	$dribbble = get_option_tree('dribbble',$theme_options);
	$drupal = get_option_tree('drupal',$theme_options);
	$ebay = get_option_tree('ebay',$theme_options);
	$email = get_option_tree('email',$theme_options);
	$ember_app = get_option_tree('ember_app',$theme_options);
	$etsy = get_option_tree('etsy',$theme_options);
	$facebook = get_option_tree('facebook',$theme_options);
	$feed_burner = get_option_tree('feed_burner',$theme_options);
	$flickr = get_option_tree('flickr',$theme_options);
	$foodspotting = get_option_tree('foodspotting',$theme_options);
	$forrst = get_option_tree('forrst',$theme_options);
	$foursquare = get_option_tree('foursquare',$theme_options);
	$friendsfeed = get_option_tree('friendsfeed',$theme_options);
	$friendstar = get_option_tree('friendstar',$theme_options);
	$gdgt = get_option_tree('gdgt',$theme_options);
	$github = get_option_tree('github',$theme_options);
	$google_buzz = get_option_tree('google_buzz',$theme_options);
	$google_talk = get_option_tree('google_talk',$theme_options);
	$gowalla_pin = get_option_tree('gowalla_pin',$theme_options);
	$gowalla = get_option_tree('gowalla',$theme_options);
	$grooveshark = get_option_tree('grooveshark',$theme_options);
	$heart = get_option_tree('heart',$theme_options);
	$hyves = get_option_tree('hyves',$theme_options);
	$icondock = get_option_tree('icondock',$theme_options);
	$icq = get_option_tree('icq',$theme_options);
	$identica = get_option_tree('identica',$theme_options);
	$imessage = get_option_tree('imessage',$theme_options);
	$itune = get_option_tree('itune',$theme_options);
	$last_fm = get_option_tree('last_fm',$theme_options);
	$linkedin = get_option_tree('linkedin',$theme_options);
	$meetup = get_option_tree('meetup',$theme_options);
	$metacafe = get_option_tree('metacafe',$theme_options);
	$mixx = get_option_tree('mixx',$theme_options);
	$mobileme = get_option_tree('mobileme',$theme_options);
	$mr_wong = get_option_tree('mr_wong',$theme_options);
	$msn = get_option_tree('msn',$theme_options);
	$myspace = get_option_tree('myspace',$theme_options);
	$newsvine = get_option_tree('newsvine',$theme_options);
	$paypal = get_option_tree('paypal',$theme_options);
	$photobucket = get_option_tree('photobucket',$theme_options);
	$picasa = get_option_tree('picasa',$theme_options);
	$pinterest = get_option_tree('pinterest',$theme_options);
	$podcast = get_option_tree('podcast',$theme_options);
	$posterous = get_option_tree('posterous',$theme_options);
	$qik = get_option_tree('qik',$theme_options);
	$quora = get_option_tree('quora',$theme_options);
	$reddit = get_option_tree('reddit',$theme_options);
	$retweet = get_option_tree('retweet',$theme_options);
	$rss = get_option_tree('rss',$theme_options);
	$scribd = get_option_tree('scribd',$theme_options);
	$share_this = get_option_tree('share_this',$theme_options);
	$skype = get_option_tree('skype',$theme_options);
	$slashdot = get_option_tree('slashdot',$theme_options);
	$slideshare = get_option_tree('slideshare',$theme_options);
	$smugmug = get_option_tree('smugmug',$theme_options);
	$sound_cloud = get_option_tree('sound_cloud',$theme_options);
	$spotify = get_option_tree('spotify',$theme_options);
	$squidoo = get_option_tree('squidoo',$theme_options);
	$stackoverflow = get_option_tree('stackoverflow',$theme_options);
	$star = get_option_tree('star',$theme_options);
	$stumbleupon = get_option_tree('stumbleupon',$theme_options);
	$technorati = get_option_tree('technorati',$theme_options);
	$tumblr = get_option_tree('tumblr',$theme_options);
	$twitter_bird = get_option_tree('twitter_bird',$theme_options);
	$twitter = get_option_tree('twitter',$theme_options);
	$viddler = get_option_tree('viddler',$theme_options);
	$vimeo = get_option_tree('vimeo',$theme_options);
	$virb = get_option_tree('virb',$theme_options);
	$w3 = get_option_tree('w3',$theme_options);
	$wikipedia = get_option_tree('wikipedia',$theme_options);
	$windows = get_option_tree('windows',$theme_options);
	$wordpress = get_option_tree('wordpress',$theme_options);
	$xing = get_option_tree('xing',$theme_options);
	$yahoo_buzz = get_option_tree('yahoo_buzz',$theme_options);
	$yahoo = get_option_tree('yahoo',$theme_options);
	$yelp = get_option_tree('yelp',$theme_options);
	$youtube = get_option_tree('youtube',$theme_options);
    
    /* Google Map Options
    ================================================== */
    $latitude = get_option_tree('latitude',$theme_options);
    $longitude = get_option_tree('longitude',$theme_options);
    $marker_icon = get_option_tree('marker_icon',$theme_options);
    $map_zoom = get_option_tree('map_zoom',$theme_options);
    
    /* Front Page Options
    ================================================== */
    $callout_title = get_option_tree('callout_title',$theme_options);
    $callout_caption = get_option_tree('callout_caption',$theme_options);
    $callout_button = get_option_tree('callout_button',$theme_options);
    $callout_button_icon = get_option_tree('callout_button_icon',$theme_options);
    $callout_button_url = get_option_tree('callout_button_url',$theme_options);
    
    /* Footer Options
    ================================================== */
    $footer_search = get_option_tree('footer_search',$theme_options);
    $ccard = get_option_tree('ccard',$theme_options);
    $footer_copyright = get_option_tree('footer_copyright',$theme_options);
   
    /* Blog Options
    ================================================== */
    $blog_number_of_post = get_option_tree('blog_number_of_post',$theme_options);
    
    /* Shop Options
    ================================================== */
    $loop_shop_per_page = get_option_tree('loop_shop_per_page',$theme_options);
    $shop_columns = get_option_tree('shop_columns',$theme_options);
    $product_style = get_option_tree('product_style',$theme_options);
    $product_post_style = get_option_tree('product_post_style',$theme_options);
    $sale_flash_color1 = get_option_tree('sale_flash_color1',$theme_options);
    $sale_flash_color2 = get_option_tree('sale_flash_color2',$theme_options);
    $shop_search_image = get_option_tree('shop_search_image',$theme_options);
    $shop_tag_image = get_option_tree('shop_tag_image',$theme_options);
}
?>
	<?php $plugins = get_option('active_plugins');?>
	<?php $required_plugin = 'woocommerce/woocommerce.php';?>
	<?php if ( in_array( $required_plugin , $plugins ) ) {?>
		<?php add_action( 'wp_enqueue_scripts', 'woocommerce_styles' );?> 
    <?php } ?>  
    <?php if($type_layouts=="responsive"){
        add_action( 'wp_enqueue_scripts', 'responsive' );
    } 
    if($theme_layouts=="1170"&&$type_layouts=="fixed"){
    	add_action( 'wp_enqueue_scripts', 'fixed_1170_layouts' );
    }
    if($theme_layouts=="1170"&&$type_layouts=="responsive"){
    	add_action( 'wp_enqueue_scripts', 'responsive_1170_layouts' );
    }
    if($theme_layouts=="1170"){
    	add_action( 'wp_enqueue_scripts', 'etalage_function' );
    }
    if($theme_layouts=="940"){
    	add_action( 'wp_enqueue_scripts', 'etalage_function_960' );
    }?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <?php
    echo '<title>' ;
    if($disable_seo != 'Disable'):
    	$out = '';
    	$out = $theme_title;
    	
    	$out = str_replace('%blog_title%', get_bloginfo('name'), $out);
    	$out = str_replace('%blog_description%', get_bloginfo('description'), $out);
    	$out = str_replace('%page_title%', wp_title('', false), $out);
    	
    	echo $out;
    else:
    	echo wp_title('', false) . ' | ' . get_bloginfo('name');
    endif;
    echo '</title>';
    
    if($disable_seo != 'Disable') {
        if($keywords):
    	?>
    		<meta name="keywords" content="<?php echo $keywords; ?>">
    	<?php
    	endif;
    
    	if($description):
    	?>
    		<meta name="description" content="<?php echo $description; ?>"> 
    	<?php
    	endif;
    }?>

    <?php if($type_layouts=="responsive"){?><meta name="viewport" content="width=device-width, initial-scale=1.0"><?php }?>
    
    <meta name="author" content="lidplussdesign" />

    <?php get_template_part('includes/google-webfonts' ) ?>
    
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
	<!--[if gte IE 9]>
	  <style type="text/css">
	    .gradient {
	       filter: none;
	    }
	  </style>
	<![endif]-->

    <!-- Le fav and touch icons -->
    <?php if($favicon){ ?><link rel="shortcut icon" href="<?php echo $favicon ?>"><?php } ?>  
    <?php if($ipad2_icon){ ?><link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $ipad2_icon ?>"><?php } ?>
    <?php if($iphone2_icon){ ?><link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $iphone2_icon ?>"><?php } ?>
    <?php if($ipad_icon){ ?><link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $ipad_icon ?>"><?php } ?>
    <?php if($iphone_icon){ ?><link rel="apple-touch-icon-precomposed" href="<?php echo $iphone_icon ?>"><?php } ?>
    
    <!-- JS -->
    <?php wp_head(); ?>
    
    <?php get_template_part('includes/fonts') ?>
    <?php get_template_part('includes/color') ?>
    <?php get_template_part('includes/meta-pattern') ?>
    <?php get_template_part('includes/background') ?>
    
	<?php $plugins = get_option('active_plugins');?>
	<?php $required_plugin = 'woocommerce/woocommerce.php';?>
	<?php if ( in_array( $required_plugin , $plugins ) ) {?>
    	<?php get_template_part('includes/styles-shop') ?>
    <?php } ?>
    
    <?php get_template_part('includes/custom_css') ?>
   <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>$(function() {$( "#accordion" ).accordion();});</script>-->
</head>
<body id="top" <?php body_class(); ?>>
<div class="main-wrap <?php if ( wp_is_mobile()) echo 'mobile';?>">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php if ($fb_like){ echo $fb_like;?><?php }else{?>en_GB<?php }?>/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

		<!--<?php if($header_meta_c==""){?>
		<div id="meta" class="gradient">
			<div class="container">
			  <div class="row-fluid">
				  <div class="span8"><?php if($left_headermeta){?> <?php echo do_shortcode($left_headermeta); ?> <?php }?></div>
				  <div class="span4">
					  <div class="meta">
						  <?php if ( is_active_sidebar(9) ){?>
						  	<div class="meta-info"><?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Right Header Meta') ) ?></div>
						  <?php }else{?>
						  	<?php if($right_headermeta){?> <div class="meta-info"><?php echo $right_headermeta; ?></div> <?php }?>
						  <?php }?>
                        <?php if($wpml_switcher){?>
                            <?php $plugins = get_option('active_plugins');?>
                            <?php $required_plugin = 'sitepress-multilingual-cms/sitepress.php';?>
                            <?php if ( in_array( $required_plugin , $plugins ) ) {?>
                            <div class="meta-data-wpml">
                                <?php language_selector_flags(); ?>
                            </div>
                            <?php }?>
                        <?php }?>
					  </div>
				  </div>
			  </div>
			</div>
		</div>
		<?php }?>-->
		<div id="header">
			<div class="container">
				<div class="row-fluid">
					<?php get_template_part('includes/header' ) ?>
				</div>
				
			</div>
                   <!-- Navbar
				================================================== -->
				<div class="navbar">
					<div class="container">
					
						<!--<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="nav-collapse collapse">-->
	                      <?php   if ( wp_is_mobile() ) {
                                   wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'menu_class' => 'nav', 'container' => '' ) ); 
                                  } else {?>

						   <?php if ( has_nav_menu( 'primary-menu' ) ) { /* if menu location 'primary-menu' exists then use custom menu */ ?>
	                        <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'nav', 'container' => '', 'walker' => new bootstrap_nav_menu_456shop_walker() ) ); ?>
	                        <?php } else { /* else use wp_list_pages */?>
	                        <ul class="nav">
	                            <?php wp_list_pages( array( 'exclude' => $exclude_primarynavi, 'title_li' => '', 'menu_class' => 'nav', 'sort_column' => $menu_order, 'walker' => new bootstrap_list_pages_walker() )); ?>
	                        </ul>
	                        <?php} } ?>
						<!--</div>-->
						
					</div>
				</div>
		</div>
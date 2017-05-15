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
    }
	
	//send_activation_link2('egtwgwert','wrerewrew');
	?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
      <meta name="google-site-verification" content="kkX2Ue3t1gEF_jaQjrdptK8gdUtV-nYJf133RUo8H7w" />
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
    
	  <?php
      global $post;
	 $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
       $img = $thumb['0'];
	   if(!$img)
	    $img='http://hairlibrary.com/wp-content/uploads/2014/05/Hairfinity-New-Bottle-post-580x580.jpg';
      $excerpt = get_the_excerpt($post->ID);
	  $excerpt=str_replace('"',"",$excerpt);
	  $excerpt.='Hair Library, The World\'s Premier Online Beauty Destination';
	?>
    <meta name="author" content="Hair Library" />
	<meta property="og:title" content="<?php echo get_the_title($post->ID);?>" />
<meta property="og:description" content="<?php echo $excerpt;?>" />
<meta property="og:image" content="<?php echo $img;?>" />
	
	
   

    <?php get_template_part('includes/google-webfonts' ) ?>
    
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/assets/css/menu.css" type="text/css" media="screen" />
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
	 <script type='text/javascript'  src="<?php bloginfo('template_url');?>/assets/js/script.js"></script>
	 <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
	
<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
	
</head>
<body id="top" <?php body_class(); ?>>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27486226-1', 'auto');
  ga('send', 'pageview');

</script> 
<div class="main-wrap">
<div id="fb-root"></div>

	<a title="Real Time Analytics" href="http://clicky.com/100749706"><img style="display:none" alt="Real Time Analytics" src="//static.getclicky.com/media/links/badge.gif" border="0" /></a>
<script src="//static.getclicky.com/js" type="text/javascript"></script>
<script type="text/javascript">try{ clicky.init(100749706); }catch(e){}</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/100749706ns.gif" /></p></noscript>

		<div id="header" class="home-header">
		<span class="beta" style="position:absolute;top:1px;left:3px;color:#fff;font-weight:bold;font-size:11px;"> BETA</span>
			<div class="container">
				<div class="row-fluid">
				<?php 
				require 'fb/facebook.php';
				
				?>
				
				
		
				
				
					<?php //get_template_part('includes/header2' ) ?>
					 <?php 

					// if ( wp_is_mobile() ) {
					// get_template_part('includes/menu_mobile' ); 
					// }else
					// {
					 get_template_part('includes/menu' ); 
					// }
					 ?>
				</div>
				
			</div>
                   <!-- Navbar
				================================================== -->
				<!--<div class="navbar">
					<div class="container">
						<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="nav-collapse collapse">
	                          <?php   if ( wp_is_mobile() ) {
                                   wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'menu_class' => 'nav', 'container' => '' ) ); 
                                  } else { ?>

						   <?php if ( has_nav_menu( 'primary-menu' ) ) { /* if menu location 'primary-menu' exists then use custom menu */ ?>
	                        <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'nav', 'container' => '', 'walker' => new bootstrap_nav_menu_456shop_walker() ) ); ?>
	                        <?php } else { /* else use wp_list_pages */?>
	                        <ul class="nav">
	                            <?php wp_list_pages( array( 'exclude' => $exclude_primarynavi, 'title_li' => '', 'menu_class' => 'nav', 'sort_column' => $menu_order, 'walker' => new bootstrap_list_pages_walker() )); ?>
	                        </ul>
	                        <?php } } ?>
						</div>
					</div>
				</div>-->
		</div>
		<div class="mobile-menu-block"><!--HL_Logo_w21.png-->
		<a href="<?php bloginfo('url');?>"><img style="margin-bottom:15px" class="attachment-full" width="55" alt="HL_Logo_w2" src="<?php bloginfo('url')?>/wp-content/themes/456shop/assets/img/new_logo_white.png"></a>
		
		<div class="h-search">
			   <div class="<?php if($header_search != "none"){ ?>form-456<?php }?>">
					<?php if($header_search != "none"){ ?>
					<form class="form-search" role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
					<?php if($header_search == "shop_search"){ ?>
						<!--<input type="hidden" name="post_type" value="product" />-->
						<input id="s" name="s" type="text" class="input-medium" value="<?php _e( 'Search By Product Name', GETTEXT_DOMAIN ); ?>">
						<button type="submit" class="plus">+</button>
				<?php }else{?>
						<input id="s" name="s" type="text" class="input-medium" value="<?php _e( 'search site', GETTEXT_DOMAIN ); ?>">
						<button type="submit" class="plus">+</button>
			<?php }?>
					</form>
				<?php }?>
				</div>
				</div>
		
		
 <?php //if(!is_user_logged_in()){ ?>
  <!--<ul style="padding-bottom:0px">
	<li><a class="menu-item" href="<?php bloginfo('url'); ?>/login/">Login</a></li>
	<li><a class="menu-item" href="<?php bloginfo('url'); ?>/register/">Sign Up</a></li>
	</ul>-->
	<?php //} ?>
	
	<?php //wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'menu_class' => 'nav', 'container' => '' ) ); 	?>
<ul class="nav" id="menu-mobile-menu">
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4420" id="menu-item-4420">
	<a class="button btn primary" title="Add Hair Story" href="http://hairlibrary.com/upload-photo/">Add hair story</a>
</li>
 <?php if(!is_user_logged_in()){ ?>
 <li><a class="menu-item" href="<?php bloginfo('url'); ?>/login/">Login</a></li>
	<li><a class="menu-item" href="<?php bloginfo('url'); ?>/register/">Sign Up</a></li>
<?php } ?>

 <?php if( is_user_logged_in() || $fbuser ) {?>
   <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4467">
   <a href="<?php bloginfo('url');?>/feeds/">Activity</a>
   </li>
<?php }?>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4421" id="menu-item-4421"><?php if(!is_user_logged_in()){ ?><a href="http://hairlibrary.com/login/?redir=my-matches/">My Matches</a><?php }else{ ?><a href="http://hairlibrary.com/my-matches/">My Matches</a><?php }?></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4425" id="menu-item-4425"><a href="javascript:void();">Hair Stories</a>
	<ul class="sub-menu sub-menu-4425">
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5000" id="menu-item-5000"><a href="http://hairlibrary.com/naturally-straight-hair-stories/">Naturally Straight</a></li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5001" id="menu-item-5001"><a href="http://hairlibrary.com/naturally-curly-hair-stories/">Naturally Curly</a></li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5002" id="menu-item-5002"><a href="http://hairlibrary.com/locks-hair-stories/">Locks</a></li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5003" id="menu-item-5003"><a href="http://hairlibrary.com/wigs-hair-stories/">Wigs</a></li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5004" id="menu-item-5004"><a href="http://hairlibrary.com/braids-hair-stories/">Braids</a></li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5005" id="menu-item-5005"><a href="http://hairlibrary.com/relaxed-straight-hair-stories/">Relaxed Straight</a></li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5006" id="menu-item-5006"><a href="http://hairlibrary.com/hair-extensions-hair-stories/">Hair Extensions</a></li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5007" id="menu-item-5007"><a href="http://hairlibrary.com/hair-color-hair-stories/">Hair Color</a></li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5008" id="menu-item-5008"><a href="http://hairlibrary.com/permed-curly-hair-stories/">Permed Curly</a></li>
	</ul>
</li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4426" id="menu-item-4426"><a href="http://hairlibrary.com/products/">Products</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4427" id="menu-item-4427"><a href="http://hairlibrary.com/brands/">Brands</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4467" id="menu-item-4467"><a href="javascript:void();">Hair Categories</a>
<ul class="sub-menu sub-menu-4467">
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3297" id="menu-item-3297"><a href="http://hairlibrary.com/shampoo/">Shampoo</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3291" id="menu-item-3291"><a href="http://hairlibrary.com/conditioner/">Conditioner</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3298" id="menu-item-3298"><a href="http://hairlibrary.com/styling-product/">Styling</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3294" id="menu-item-3294"><a href="http://hairlibrary.com/hair-removers/">Hair Remover</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4430" id="menu-item-4430"><a href="http://hairlibrary.com/treatments/">Treatments</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3299" id="menu-item-3299"><a href="http://hairlibrary.com/styling-tools/">Tools</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4431" id="menu-item-4431"><a href="http://hairlibrary.com/hair-extensions/">Hair Extensions</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4429" id="menu-item-4429"><a href="http://hairlibrary.com/wigs/">Wigs</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3296" id="menu-item-3296"><a href="http://hairlibrary.com/organic-products/">Organic</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3293" id="menu-item-3293"><a href="http://hairlibrary.com/hair-color/">Hair Color</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3295" id="menu-item-3295"><a href="http://hairlibrary.com/moisturizer/">Moisturizer</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4426" id="menu-item-4426"><a href="http://hairlibrary.com/kids/">Kids</a></li>
</ul>
</li>

</ul>
	  <div class="clear"></div>		
</div>
<div class="mobile-menu-block-right">
<?php             if(is_user_logged_in()){
				         $c_user=wp_get_current_user();
				           $thumbpath=getThumbPath($c_user->ID);
					?>
		<div class="member-thumb" style="margin-bottom:2px">
			  <div class="thumb mini-circle <?php echo getUserHairStyle($c_user->ID);?>">
	      	<div class="thumb-inner">
			  <a href="<?php bloginfo('url');?>/profile/"><img class="user-thumb" alt="profile picture" src="<?php echo $thumbpath;?>" width="70"></a>
			  </div>
			  </div></div>
			  <h3 style="margin-top:0;color:#eee;font-size:15px;text-transform:uppercase;"><?php echo getFormatedDes($c_user->display_name);?></h3>
					<?php
						 }
					
						 ?>
        	<?php wp_nav_menu( array( 'theme_location' => 'mobile-right-menu', 'menu_class' => 'nav', 'container' => '' ) ); 	?>



  <script>
 var is_mobile=0
  var is_mobile_r=0
  
  $('#mobile-menu-icon').click( function(){
 
     if(is_mobile==0)
     {
            is_mobile=1;
			$(".main-wrap").animate({left:"220px"});
			$("#header").animate({left:"220px"});
	 }else
	 {
	   is_mobile=0;
			$(".main-wrap").animate({left:"0"});
			$("#header").animate({left:"0"});
	 }
    $('.mobile-menu-block').toggle("slide");
  
  });
  
  $("#get-profile-menu" ).click(function( event ) {
event.preventDefault();
  
if(is_mobile_r==0)
     {
            is_mobile_r=1;
			$(".main-wrap").animate({left:"-200px"});
			$("#header").animate({left:"-200px"});
	 }else
	 {
	   is_mobile_r=0;
			$(".main-wrap").animate({left:"0"});
			$("#header").animate({left:"0"});
	 }

 $('.mobile-menu-block-right').toggle("slide");
});
  
  
  
   $('#explore-menu').click( function(){
  $('#explore-drop-down').slideToggle("slow");
  });
  
   $('#brand-menu').click( function(){
     $('#shampoo-products').hide();
  $('#brand-sub-menus').slideToggle("slow");

  });
  
    $('#product-cats').click( function(){
	  $('#brand-sub-menus').hide();
  $('#shampoo-products').slideToggle("slow");
  });
  
  $('#menu-item-4467').click( function(){
  $(this).children('.sub-menu-4467').slideToggle("slow");

  });
  $('#menu-item-4425').click( function(){
  $(this).children('.sub-menu-4425').slideToggle("slow");

  });
  </script>
		</div>
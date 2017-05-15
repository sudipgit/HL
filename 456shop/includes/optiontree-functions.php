<?php 
	$theme_options = get_option('option_tree');
    /* General Settings
    ================================================== */
    $body_font_size = get_option_tree('body_font_size',$theme_options);
    $body_font_family = get_option_tree('body_font_family',$theme_options);
    $heading_font_family = get_option_tree('heading_font_family',$theme_options);
    $google_character_sets = get_option_tree('google_character_sets',$theme_options);
    $right_headermeta = get_option_tree('right_headermeta',$theme_options);
    $headermeta_font_size = get_option_tree('headermeta_font_size',$theme_options);
    $wpml_switcher = get_option_tree('wpml_switcher',$theme_options);
    $custom_logo = get_option_tree('custom_logo',$theme_options);
    $logo_tagline = get_option_tree('logo_tagline',$theme_options);
    $portfolio_title = get_option_tree('portfolio_title',$theme_options);
    $footer_copyright = get_option_tree('footer_copyright',$theme_options);

    /* SEO Settings
    ================================================== */
    $disable_seo = get_option_tree('disable_seo',$theme_options);
    $theme_title = get_option_tree('theme_title',$theme_options);
    $keywords = get_option_tree('keywords',$theme_options);
    $description = get_option_tree('description',$theme_options);

    /* Theme Options
    ================================================== */
	$disable_seo = get_option_tree('disable_seo',$theme_options);
    $theme_color = get_option_tree('theme_color',$theme_options);
    $disable_search_form = get_option_tree('disable_search_form',$theme_options);
    $favicon = get_option_tree('favicon',$theme_options);
    $iphone_icon = get_option_tree('iphone_icon',$theme_options);
    $ipad_icon = get_option_tree('ipad_icon',$theme_options);
    $iphone_icon = get_option_tree('iphone2_icon',$theme_options);
    $ipad2_icon = get_option_tree('ipad2_icon',$theme_options);
    
    /* Menu Options
    ================================================== */
	$exclude_primarynavi = get_option_tree('exclude_primarynavi',$theme_options);
	$menu_order = get_option_tree('menu_order',$theme_options);
	$bold_navi = get_option_tree('bold_navi',$theme_options);
	
    /* Social Media
    ================================================== */
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
    $ccard = get_option_tree('ccard',$theme_options);  
?>
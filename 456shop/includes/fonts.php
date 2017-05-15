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
    $wpml_switcher = get_option_tree('wpml_switcher',$theme_options);
    $custom_logo = get_option_tree('custom_logo',$theme_options);
    $logo_tagline = get_option_tree('logo_tagline',$theme_options);
    $header_search = get_option_tree('header_search',$theme_options);
    $header_right_container = get_option_tree('header_right_container',$theme_options);
    $heading_navi = get_option_tree('heading_navi',$theme_options);
    $fb_like = get_option_tree('fb_like',$theme_options);
    
    /* Typography
    ================================================== */
    $body_font_size = get_option_tree('body_font_size',$theme_options);
    $body_font_family = get_option_tree('body_font_family',$theme_options);
    $heading_font_family = get_option_tree('heading_font_family',$theme_options);
    $elements_font_family = get_option_tree('elements_font_family',$theme_options);
    $navigation_font_family = get_option_tree('navigation_font_family',$theme_options);
    $navigation_font_size = get_option_tree('navigation_font_size',$theme_options);
    $navigation_font_style = get_option_tree('navigation_font_style',$theme_options);
    $dropdown_font_size = get_option_tree('dropdown_font_size',$theme_options);
    $dropdown_font_style = get_option_tree('dropdown_font_style',$theme_options);
    $google_character_sets = get_option_tree('google_character_sets',$theme_options);

}
?>


<?php if($headermeta_font_size||$dropdown_font_size||$dropdown_font_style=="normal"||$navigation_font_size||$navigation_font_size=="bold"||$heading_font_family!=''||$elements_font_family!=''||$elements_font_family!=''||$navigation_font_family!=''){?>
<style>
<?php if($headermeta_font_size){?>
.meta-info{
	font-size: <?php echo $headermeta_font_size;?>px;
}
<?php }?>

<?php if($body_font_size != ''){?>
select,
textarea,
input[type="text"],
input[type="password"],
input[type="datetime"],
input[type="datetime-local"],
input[type="date"],
input[type="month"],
input[type="time"],
input[type="week"],
input[type="number"],
input[type="email"],
input[type="url"],
input[type="search"],
input[type="tel"],
input[type="color"],
.uneditable-input,
table.my_account_orders,
.payment_methods label,
#order_review table.shop_table tfoot .shipping td p,
#order_review table.shop_table thead,
.woocommerce-page .span12 label,
.woocommerce-page .span8 label,
div.product form.cart .variations td.label,
#content div.product form.cart .variations td.label,
div.product p.stock,
#content div.product p.stock,
div.product span.price .from,
#content div.product span.price .from,
div.product p.price .from,
#content div.product p.price .from,
.woocommerce table.my_account_orders,
.woocommerce .payment_methods label,
.woocommerce #order_review table.shop_table tfoot .shipping td p,
.woocommerce #order_review table.shop_table thead,
.woocommerce div.product form.cart .variations td.label,
.woocommerce #content div.product form.cart .variations td.label,
.woocommerce div.product p.stock,
.woocommerce #content div.product p.stock,
.woocommerce div.product span.price .from,
.woocommerce #content div.product span.price .from,
.woocommerce div.product p.price .from,
.woocommerce #content div.product p.price .from,
.woocommerce-page table.my_account_orders,
.woocommerce-page .payment_methods label,
.woocommerce-page #order_review table.shop_table tfoot .shipping td p,
.woocommerce-page #order_review table.shop_table thead,
.woocommerce-page .span12 label,
.woocommerce-page .span8 label,
.woocommerce-page div.product form.cart .variations td.label,
.woocommerce-page #content div.product form.cart .variations td.label,
.woocommerce-page div.product p.stock,
.woocommerce-page #content div.product p.stock,
.woocommerce-page div.product span.price .from,
.woocommerce-page #content div.product span.price .from,
.woocommerce-page div.product p.price .from,
.woocommerce-page #content div.product p.price .from,
div.product span.price del,
#content div.product span.price del,
div.product p.price del,
#content div.product p.price del,
.woocommerce div.product span.price del, .woocommerce-page div.product span.price del, .woocommerce #content div.product span.price del, .woocommerce-page #content div.product span.price del, .woocommerce div.product p.price del, .woocommerce-page div.product p.price del, .woocommerce #content div.product p.price del, .woocommerce-page #content div.product p.price del,
body{
	font-size:
	<?php if($body_font_size){?>
		<?php echo $body_font_size;?>px;
	<?php }else{?>
		13px;
	<?php }?>
}
<?php }?>

<?php if($navigation_font_size){?>
#header .navbar{
	font-size: <?php echo $navigation_font_size;?>px;
}
<?php }?>

<?php if($navigation_font_style=="bold"){?>
#header .navbar .nav > li{
	font-weight: bold;
}
<?php }?>

<?php if($dropdown_font_size){?>
.nav-header,
.dropdown-menu li > a{
	font-size: <?php echo $dropdown_font_size;?>px;
}
<?php }?>

<?php if($dropdown_font_style=="normal"){?>
.dropdown-menu li > a{
	font-weight: normal !important;
}
<?php }?>

<?php if($body_font_family != ''){?>
.btn,
a.button,
input,
button,
select,
textarea,
li.item .price,
body {
    font-family: 
    <?php if($body_font_family == 'Open+Sans'){
        echo "'Open Sans', serif";
    }elseif($body_font_family == 'Titillium+Web'){
        echo "'Titillium Web', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($body_font_family == 'Oxygen'){
        echo "'Oxygen', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($body_font_family == 'Quicksand'){
        echo "'Quicksand', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($body_font_family == 'Lato'){
        echo "'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($body_font_family == 'Raleway'){
        echo "'Raleway', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($body_font_family == 'Source+Sans+Pro'){
        echo "'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($body_font_family == 'Dosis'){
        echo "'Dosis', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($body_font_family == 'Exo'){
        echo "'Exo', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }else{
       echo $body_font_family; 
    }?>;
}
<?php }?>

<?php if($heading_font_family != ''){?>
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: 
    <?php if($heading_font_family == 'Open+Sans'){
        echo "'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($heading_font_family == 'Titillium+Web'){
        echo "'Titillium Web', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($heading_font_family == 'Oxygen'){
        echo "'Oxygen', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($heading_font_family == 'Quicksand'){
        echo "'Quicksand', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($heading_font_family == 'Lato'){
        echo "'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($heading_font_family == 'Raleway'){
        echo "'Raleway', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($heading_font_family == 'Source+Sans+Pro'){
        echo "'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($heading_font_family == 'Dosis'){
        echo "'Dosis', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($heading_font_family == 'Exo'){
        echo "'Exo', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }else{
       echo $heading_font_family; 
    }?>;
}
<?php }?>

<?php if($elements_font_family != ''){?>
.btn,
a.button,
input,
button,
select,
textarea {
    font-family: 
    <?php if($elements_font_family == 'Open+Sans'){
        echo "'Open Sans', serif";
    }elseif($elements_font_family == 'Titillium+Web'){
        echo "'Titillium Web', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($elements_font_family == 'Oxygen'){
        echo "'Oxygen', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($elements_font_family == 'Quicksand'){
        echo "'Quicksand', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($elements_font_family == 'Lato'){
        echo "'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($elements_font_family == 'Raleway'){
        echo "'Raleway', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($elements_font_family == 'Source+Sans+Pro'){
        echo "'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($elements_font_family == 'Dosis'){
        echo "'Dosis', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($elements_font_family == 'Exo'){
        echo "'Exo', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }else{
       echo $elements_font_family; 
    }?>;
}
<?php }?>

<?php if($navigation_font_family != ''){?>
.nav-header,
#header .navbar{
    font-family: 
    <?php if($navigation_font_family == 'Open+Sans'){
        echo "'Open Sans', serif";
    }elseif($navigation_font_family == 'Titillium+Web'){
        echo "'Titillium Web', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($navigation_font_family == 'Oxygen'){
        echo "'Oxygen', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($navigation_font_family == 'Quicksand'){
        echo "'Quicksand', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($navigation_font_family == 'Lato'){
        echo "'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($navigation_font_family == 'Raleway'){
        echo "'Raleway', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($navigation_font_family == 'Source+Sans+Pro'){
        echo "'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($navigation_font_family == 'Dosis'){
        echo "'Dosis', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }elseif($navigation_font_family == 'Exo'){
        echo "'Exo', 'Helvetica Neue', Helvetica, Arial, sans-serif";
    }else{
       echo $navigation_font_family; 
    }?>;
}
<?php }?>
</style>
<?php }?>
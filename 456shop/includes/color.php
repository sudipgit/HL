<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');

    /* Theme Options
    ================================================== */
    $theme_color = get_option_tree('theme_color',$theme_options);
    $gradient_color = get_option_tree('gradient_color',$theme_options);
    
    $disable_search_form = get_option_tree('disable_search_form',$theme_options);
    $favicon = get_option_tree('favicon',$theme_options);
    $iphone_icon = get_option_tree('iphone_icon',$theme_options);
    $ipad_icon = get_option_tree('ipad_icon',$theme_options);
    $iphone_icon = get_option_tree('iphone2_icon',$theme_options);
    $ipad2_icon = get_option_tree('ipad2_icon',$theme_options);

}
?>

<?php if($theme_color&&$gradient_color){?>
<style>
#footer .style2 li a:hover,
#footer .style1 li a:hover,
#footer .advanced li a:hover,
a,
a:hover,
a.link-style:hover,
.link-style a:hover,
.menu-item div.item .price ins,
.tax-product_cat #header .navbar .menu-shop,
.tax-product_tag #header .navbar .menu-shop,
#header .navbar .nav li.dropdown.current-menu-parent > .dropdown-toggle,
#header .navbar .nav li.dropdown.open.current-menu-parent > .dropdown-toggle,
#header .navbar .nav > .current-menu-parent > a,
#header .navbar .nav > .current-menu-parent > a:hover,
#header .navbar .nav > .current-menu-parent > a:focus,
#header .navbar .nav li.dropdown.current-menu-ancestor > .dropdown-toggle,
#header .navbar .nav li.dropdown.open.current-menu-ancestor > .dropdown-toggle,
#header .navbar .nav > .current-menu-ancestor > a,
#header .navbar .nav > .current-menu-ancestor > a:hover,
#header .navbar .nav > .current-menu-ancestor > a:focus,
#header .navbar .nav li.dropdown.current_page_ancestor > .dropdown-toggle,
#header .navbar .nav li.dropdown.open.current_page_ancestor > .dropdown-toggle,
#header .navbar .nav > .current_page_ancestor > a,
#header .navbar .nav > .current_page_ancestor > a:hover,
#header .navbar .nav > .current_page_ancestor > a:focus,
#header .navbar .nav li.dropdown.current_page_parent > .dropdown-toggle,
#header .navbar .nav li.dropdown.open.current_page_parent > .dropdown-toggle,
#header .navbar .nav > .current_page_parent > a,
#header .navbar .nav > .current_page_parent > a:hover,
#header .navbar .nav > .current_page_parent > a:focus,
#header .navbar .nav li.dropdown.current_page_item > .dropdown-toggle,
#header .navbar .nav li.dropdown.open.current_page_item > .dropdown-toggle,
#header .navbar .nav > .current_page_item > a,
#header .navbar .nav > .current_page_item > a:hover,
#header .navbar .nav > .current_page_item > a:focus,
#header .navbar .nav li.dropdown.open > .dropdown-toggle,
#header .navbar .nav > li > a:focus,
#header .navbar .nav > li > a:focus,
#header .navbar .nav > li > a:hover,
#header .navbar .nav > .active > a,
#header .navbar .nav > .active > a:hover,
#header .navbar .nav > .active > a:focus,
.widget.widget_rss ul a:hover,
.widget.widget_pages ul a:hover,
.widget.widget_nav_menu ul a:hover,
.widget.widget_login ul a:hover,
.widget.widget_meta ul a:hover,
.widget.widget_categories ul a:hover,
.widget.widget_archive ul a:hover,
.widget.widget_recent_comments ul a:hover,
.widget.widget_recent_entries ul a:hover,
.widget.list .unstyled a:hover,
.accordion-heading .accordion-toggle:hover,
#main .newsticker_wrapper a,
.nav-tabs .open .dropdown-toggle,
.nav-pills .open .dropdown-toggle,
.nav > li.dropdown.open.active > a:hover,
.nav-tabs > li > a:hover,
.news-widget .Container .item:hover h5 a,
.news-widget .Container h5 a:hover,
.woocommerce .group_table label a:hover,
.woocommerce-page .group_table label a:hover,
.group_table label a:hover,
.woocommerce .group_table .price,
.woocommerce-page .group_table .price,
.group_table .price,
.woocommerce .cart-collaterals .cart_totals table tr.total .amount,
.woocommerce-page .cart-collaterals .cart_totals table tr.total .amount,
.cart-collaterals .cart_totals table tr.total .amount,
.woocommerce #order_review table.shop_table tfoot .total .amount,
.woocommerce-page #order_review table.shop_table tfoot .total .amount,
#order_review table.shop_table tfoot .total .amount,
.menu-item div.item .price,
.heading .heading-navi:hover,
#header .Cart .header-cart-navi a:hover,
.woocommerce p.product .amount,
.woocommerce-page p.product .amount,
p.product .amount,
.woocommerce ul.products li.product a:hover h3,
.woocommerce-page ul.products li.product a:hover h3,
ul.products li.product a:hover h3,
.member-social .icon:hover,
.about-post .member:hover .name,
.menu-item div.item.portfolio-item:hover h5,
.woocommerce .product-post .woocommerce-breadcrumb a:hover, .woocommerce-page .product-post .woocommerce-breadcrumb a:hover,
#breadcrumb a:hover,
.woocommerce ul.cart_list li ins, ul.product_list_widget li ins,
.woocommerce-page ul.cart_list li ins, ul.product_list_widget li ins,
ul.cart_list li ins, ul.product_list_widget li ins,
.widget_product_categories ul li a:hover{
	color: <?php echo $theme_color; ?>;
}
.dropdown-menu li > a:hover,
.dropdown-menu li > a:focus,
.dropdown-submenu:hover > a {
  background-color: <?php echo $theme_color; ?>;
  background-image: -moz-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $gradient_color; ?>), to(<?php echo $theme_color; ?>));
  background-image: -webkit-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  background-image: -o-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  background-image: linear-gradient(to bottom, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $gradient_color; ?>', endColorstr='<?php echo $theme_color; ?>', GradientType=0);
}
.dropdown-menu .active > a,
.dropdown-menu .active > a:hover {
  background-color: <?php echo $theme_color; ?>;
  background-image: -moz-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $gradient_color; ?>), to(<?php echo $theme_color; ?>));
  background-image: -webkit-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  background-image: -o-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  background-image: linear-gradient(to bottom, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $gradient_color; ?>', endColorstr='<?php echo $theme_color; ?>', GradientType=0);
}
.post_type .icon{
  background-color: <?php echo $theme_color; ?>;
}
.btn-primary {
  background-color: <?php echo $theme_color; ?>;
  *background-color: <?php echo $theme_color; ?>;
  background-image: -moz-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $gradient_color; ?>), to(<?php echo $theme_color; ?>));
  background-image: -webkit-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  background-image: -o-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  background-image: linear-gradient(to bottom, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  background-repeat: repeat-x;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $gradient_color; ?>', endColorstr='<?php echo $theme_color; ?>', GradientType=0);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
}
.btn-primary:hover,
.btn-primary:active,
.btn-primary.active,
.btn-primary.disabled,
.btn-primary[disabled] {
  background-color: <?php echo $theme_color; ?>;
  *background-color: <?php echo $theme_color; ?>;
}

.btn-primary:active,
.btn-primary.active {
  background-color: <?php echo $gradient_color; ?> \9;
}
.tagcloud a:hover,
.option-set a:hover,
.tags a:hover{
  background: <?php echo $theme_color; ?>;
  border: 1px solid <?php echo $theme_color; ?>;
}
#fancybox-close:hover{
	background: <?php echo $theme_color; ?> !important;		
}
.dropcap1,
.dg-add-content-wrap {
	background: <?php echo $theme_color; ?> !important;
}
ul.products li.product .price,
div.product span.price,
#content div.product span.price,
div.product p.price,
#content div.product p.price{
	color: <?php echo $theme_color; ?> !important;
}
.btn-link{
	color: <?php echo $gradient_color; ?>;
}
.btn-link:hover{
	color: <?php echo $theme_color; ?>;
}	
</style>
<?php }?>
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
    $custom_css = get_option_tree('custom_css',$theme_options);
    $custom_js = get_option_tree('custom_js',$theme_options);
}
?>

<?php if($custom_js){?>
<!-- Option Tree Custom Javascript -->
<script>
	<?php echo $custom_js ?>
</script>
<?php }?>
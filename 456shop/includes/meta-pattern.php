<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');

    /* Theme Options
    ================================================== */
    $theme_color = get_option_tree('theme_color',$theme_options);
    $gradient_color = get_option_tree('gradient_color',$theme_options);
    $meta_pattern = get_option_tree('meta-pattern',$theme_options);
    
    $favicon = get_option_tree('favicon',$theme_options);
    $iphone_icon = get_option_tree('iphone_icon',$theme_options);
    $ipad_icon = get_option_tree('ipad_icon',$theme_options);
    $iphone_icon = get_option_tree('iphone2_icon',$theme_options);
    $ipad2_icon = get_option_tree('ipad2_icon',$theme_options);

}
?>

<?php if($meta_pattern!=''&&$meta_pattern!='none'){?>
<style>
#meta:before{
    background-image: url(<?php echo THEME_ASSETS;?>img/meta-pattern/<?php echo $meta_pattern;?>.png);
}
</style>
<?php }?>
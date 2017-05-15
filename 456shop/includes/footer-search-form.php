<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
    /* Footer Options
    ================================================== */
    $footer_meta_1 = get_option_tree('footer_meta_1',$theme_options);
    $footer_meta_2 = get_option_tree('footer_meta_2',$theme_options);
    $footer_meta_3 = get_option_tree('footer_meta_3',$theme_options);
    $footer_meta_4 = get_option_tree('footer_meta_4',$theme_options);
    $footer_search = get_option_tree('footer_search',$theme_options);
    $ccard = get_option_tree('ccard',$theme_options);
    $footer_copyright = get_option_tree('footer_copyright',$theme_options);    
}
?>

					<div class="span6 <?php if($footer_search != "none"){ ?>form-456<?php }?>">
					<?php if($footer_search != "none"){ ?>
						<form class="form-search" role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
							<?php if($footer_search == "shop_search"){ ?>
							<input type="hidden" name="post_type" value="product" />
							<input id="s" name="s" type="text" class="input-medium" value="<?php _e( 'search entire store here', GETTEXT_DOMAIN ); ?>">
							<button type="submit" class="plus">+</button>
							<?php }else{?>
							<input id="s" name="s" type="text" class="input-medium" value="<?php _e( 'search site', GETTEXT_DOMAIN ); ?>">
							<button type="submit" class="plus">+</button>
							<?php }?>
						</form>
					<?php }?>
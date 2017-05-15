<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
    /* General Settings
    ================================================== */
    $body_font_size = get_option_tree('body_font_size',$theme_options);
    $body_font_family = get_option_tree('body_font_family',$theme_options);
    $heading_font_family = get_option_tree('heading_font_family',$theme_options);
    $google_character_sets = get_option_tree('google_character_sets',$theme_options);
    $left_headermeta = get_option_tree('left_headermeta',$theme_options);
    $right_headermeta = get_option_tree('right_headermeta',$theme_options);
    $headermeta_font_size = get_option_tree('headermeta_font_size',$theme_options);
    $wpml_switcher = get_option_tree('wpml_switcher',$theme_options);
    $custom_logo = get_option_tree('custom_logo',$theme_options);
    $logo_tagline = get_option_tree('logo_tagline',$theme_options);
    $header_search = get_option_tree('header_search',$theme_options);
    $header_right_container = get_option_tree('header_right_container',$theme_options);
    $header_right_social = get_option_tree('header_right_social',$theme_options);
    $portfolio_title = get_option_tree('portfolio_title',$theme_options);    
}
?>
                       <div class="span4 <?php if($header_search != "none"){ ?>form-456<?php }?>">
			<?php if($header_search != "none"){ ?>
			<form class="form-search" role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
			<?php if($header_search == "shop_search"){ ?>
			<input type="hidden" name="post_type" value="product" />
		    <input id="s" name="s" type="text" class="input-medium" value="<?php _e( 'search entire store here', GETTEXT_DOMAIN ); ?>">
		<button type="submit" class="plus">+</button>
		<?php }else{?>
		<input id="s" name="s" type="text" class="input-medium" value="<?php _e( 'search site', GETTEXT_DOMAIN ); ?>">
	      <button type="submit" class="plus">+</button>
	<?php }?>
		</form>
		<?php }?>
		</div>
		<div class="span3">
	                    <?php if($custom_logo){?>
	                    <div id="logo" class="img">
	                        <h1><a href="<?php echo home_url(); ?>"><img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo $custom_logo?>"/></a></h1>
	                        <?php if(!$logo_tagline){?>
	                            <?php if($blog_title = get_bloginfo('description')){?>
	                            <h5><?php echo $blog_title; ?></h5>
	                            <?php }?>
	                        <?php }?>
	                        <div class="clearfix"></div>
	                    </div>
	                    <?php }else{?>
	                    <div id="logo">
	                        <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	                        <?php if(!$logo_tagline){?>
	                            <?php if($blog_title = get_bloginfo('description')){?>
	                            <h5><?php echo $blog_title; ?></h5>
	                            <?php }?>
	                        <?php }?>
	                        <div class="clearfix"></div>
	                    </div>
	                    <?php }?>
					</div>
					
					<div class="span5 Cart woocommerce clearfix">
						<!--<?php //if($header_right_social){?>
							<div class="social-media clearfix">
								<ul>
									<?php //get_template_part('includes/header-social') ?>
								</ul>
								<p><?php //_e( 'Social Media:', GETTEXT_DOMAIN);?></p>
							</div>
						<?php //}else{?>
							<?php //if($header_right_container){?><div class="header-right-container"><?php// echo $header_right_container; ?></div><?php// }else{?>
	                            <?php //$plugins = get_option('active_plugins');?>
	                            <?php //$required_plugin = 'woocommerce/woocommerce.php';?>
	                            <?php //if ( in_array( $required_plugin , $plugins ) ) {?>
									<?php //get_template_part('includes/cart') ?>
								<?php //}?>
							<?php// }?>
						<?php //}?>-->												
						
						<div class="login-info clearfix">							
						<ul>                               
						<?php if( !is_user_logged_in() ) {?>		
						<li><a href="http://myhypehair.com/morgandemo/register/">Get Started</a></li>	
						<li class="no-border"><a href="http://myhypehair.com/morgandemo/">Login</a></li>
                        <li class="brand-link">Do you want to add your product to the library? <a href="http://myhypehair.com/morgandemo/brand-registration/">Sign Up</a></li>						
						<?php } else { ?>		
                       				
						<li><a href="http://myhypehair.com/morgandemo/customer-profile/">Profile</a></li>	
						<li><a href="<?php echo wp_logout_url(); ?>">Logout</a></li>			
						<?php } ?>							
						</ul>						
						</div>
						<?php if(is_user_logged_in() ) {?>
						<div class="fb-invite"> 
				 <?php echo do_shortcode('[fib title="Invite friends to join" message="Learn exciting new stuff at Hairlibrary!" text="Invite Facebook Friends" image="http://example.com" appid="516089321798068" width="100%" align="center"]');
				  
				   ?>
				  	</div>
					<?php } ?>
					</div>
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
<?php

    //$_SESSION = array();    //clear session array
  //  session_destroy(); 

	
$facebook = new Facebook(array(
  'appId'  => '516089321798068',
  'secret' => 'e4ca52256afd284bb1ad557245ddd819',
));


	if($_GET['loggedout']==true){
	  $_SESSION = array();   
      session_destroy(); 
      $facebook->destroySession();
	}

// See if there is a user from a cookie
$fbuser = $facebook->getUser();

if ($fbuser) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $fbuser_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $fbuser = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($fbuser) {
  $logoutUrl = $facebook->getLogoutUrl(array('next'=>'http://hairlibrary.com/login/?loggedout=true'));
} else {
  $loginUrl = $facebook->getLoginUrl();
}

?>



<div class="span4">			
		<div class="header-login <?php if( is_user_logged_in() || $fbuser ) echo 'after-login';?>">
	
											
				
				<div class="login-info clearfix">							
			                             
				<?php if( !is_user_logged_in() && !$fbuser ) {?>
                  <div id="login-popup-outer">	
                  <div id="login-popup-inner">		
                    <a href="javascript:void()" id="close-login">Close</a>				  
			       <div class="header-login-form">
				   	<form name="loginform" id="loginform" action="/login/" method="post">
		       <table>
			    <tr><td>Username <span style="color:#F00; font-weight:bold">*</span></td>
				<td><input type="text" name="log" id="user_login" class="input" value="" size="20" placeholder="Username"/></td></tr>
                   <tr><td>Password <span style="color:#F00; font-weight:bold">*</span></td>
			   <td><input type="password" name="pwd" id="user_pass" class="input" value="" size="20" placeholder="password"/></td></tr>
	<tr>
	 <td></td>
	 <td>
	     	<input type="hidden" name="_wp_original_http_referer" value="http://hairlibrary.com/" />

		      <input type="submit" name="wp-submit" id="wp-submit" value="Log In" />
			<input type="hidden" name="redirect_to" value="http://hairlibrary.com/wp-admin/" />
			<input type="hidden" name="instance" value="" />
			<input type="hidden" name="action" value="login" /></td>
	       </tr>
		   <tr><td></td>
		   <td> Do not have an account? Click <a href="http://hairlibrary.com/register/">HERE </a> to register
                  
                    <br>
                       <a href="http://hairlibrary.com/lostpassword/">FORGOT PASSWORD?</a></td>
		</tr>
      </table>		
		   
		   
		   </form>
			    
				   </div>
				   </div>
				   </div>
				   	<ul> 
				  <!-- <li class="fb-login"><a href="<?php echo $loginUrl; ?>"></a></li>-->
				  
				 <li class="join brand-link"><a href="javascript:void()" id="getLoginPopup"> Log In</a></li>
				<li class="join brand-link"><a href="<?php bloginfo('url');?>/register/"> Sign Up</a></li>
				
				
				<?php } else { 
				if(is_user_logged_in()){
				 $c_user=wp_get_current_user();
				 $thumb=get_user_meta($c_user->ID, 'user_thumb', true);	 
					  if(!$thumb)
					    $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/thumb.jpg';
						else
						 $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/'.$c_user->ID.'/'.$thumb;
						 }
						 else
						 {
						  $thumbpath='https://graph.facebook.com/'.$fbuser.'/picture';
						 
						 }
				?>		
							
				<li class="pro"><a href="<?php bloginfo('url');?>/customer-profile/"><img class="user-thumb" src="<?php echo $thumbpath;?>" width="36"/>Profile</a>
				 <?php if(is_user_logged_in()){ ?>
				<ul class="profile-sub">
				<li><a href="http://hairlibrary.com/customer-profile/?m=match">My Matches</a></li>
				<li><a href="http://hairlibrary.com/customer-profile/?m=library">My Hair Library</a></li>
				<li><a href="http://hairlibrary.com/customer-profile/?m=story">My Hair Story</a></li>
				<li><a href="http://hairlibrary.com/customer-profile/?m=account">Account</a></li>
				<li><a href="<?php echo wp_logout_url(); ?>">Logout</a></li>
				</ul>
				<?php } ?>
				</li>	
				  <?php if(is_user_logged_in()){ ?>
				    <li><a href="<?php echo wp_logout_url(); ?>">Logout</a></li>	
                  <?php } else {?>				
				
				<li>  <a href="<?php echo $logoutUrl; ?>">Logout</a></li>
				<?php } } ?>				
				</ul>	
				<div class="clear"></div>
				</div>
				<?php if(is_user_logged_in() ) {?>
				<div class="fb-invite clearfix"> 
		 <?php echo do_shortcode('[fib title="Invite friends to join" message="Learn exciting new stuff at Hairlibrary!" text="Invite Facebook Friends" image="http://example.com" appid="516089321798068" width="100%" align="center"]');
		  
		   ?>
			</div>
			<?php } ?>

    
		</div>
		</div>
			
		<div class="span3 left-item ">
		   <div class="circle-logo">
			<a href="<?php echo home_url(); ?>"><img style="margin:6px 0 0 0px" alt="<?php bloginfo( 'name' ); ?>" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/hl_logob.png" width="300"/></a>
			</div>
			<!--<script>
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '516089321798068',
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
  // for any authentication related change, such as login, logout or session refresh. This means that
  // whenever someone who was previously logged out tries to log in again, the correct case below 
  // will be handled. 
  FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs. 
    if (response.status === 'connected') {
      // The response object is returned with a status field that lets the app know the current
      // login status of the person. In this case, we're handling the situation where they 
      // have logged in to the app.
       FB.logout();
    } else if (response.status === 'not_authorized') {
      // In this case, the person is logged into Facebook, but not into the app, so we call
      // FB.login() to prompt them to do so. 
      // In real-life usage, you wouldn't want to immediately prompt someone to login 
      // like this, for two reasons:
      // (1) JavaScript created popup windows are blocked by most browsers unless they 
      // result from direct interaction from people using the app (such as a mouse click)
      // (2) it is a bad experience to be continually prompted to login upon page load.
      FB.login();
    } else {
      // In this case, the person is not logged into Facebook, so we call the login() 
      // function to prompt them to do so. Note that at this stage there is no indication
      // of whether they are logged into the app. If they aren't then they'll see the Login
      // dialog right after they log in to Facebook. 
      // The same caveats as above apply to the FB.login() call here.
      FB.login();
    }
  });
  };


</script>

<div class="top-fb-login">

<fb:login-button show-faces="true" width="200" max-rows="1"></fb:login-button>
		</div>	


			<div class="<?php if($header_search != "none"){ ?>form-456<?php }?>">
					<?php if($header_search != "none"){ ?>
					<form class="form-search" role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
					<?php if($header_search == "shop_search"){ ?>
						<input type="hidden" name="post_type" value="product" />
						<input id="s" name="s" type="text" class="input-medium" value="<?php _e( 'Enter Keyword', GETTEXT_DOMAIN ); ?>">
						<button type="submit" class="plus">+</button>
				<?php }else{?>
						<input id="s" name="s" type="text" class="input-medium" value="<?php _e( 'search site', GETTEXT_DOMAIN ); ?>">
						<button type="submit" class="plus">+</button>
			<?php }?>
					</form>
				<?php }?>
				</div>-->
		</div>
		<div class="span4">
		   <div class="tags"><span>#HAIRLIBRARY #HL</span></div>
				<div class="h-search">
			   <div class="<?php if($header_search != "none"){ ?>form-456<?php }?>">
					<?php if($header_search != "none"){ ?>
					<form class="form-search" role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
					<?php if($header_search == "shop_search"){ ?>
						<input type="hidden" name="post_type" value="product" />
						<input id="s" name="s" type="text" class="input-medium" value="<?php _e( 'Enter Keyword', GETTEXT_DOMAIN ); ?>">
						<button type="submit" class="plus">+</button>
				<?php }else{?>
						<input id="s" name="s" type="text" class="input-medium" value="<?php _e( 'search site', GETTEXT_DOMAIN ); ?>">
						<button type="submit" class="plus">+</button>
			<?php }?>
					</form>
				<?php }?>
				</div>
				</div>
		
		</div>
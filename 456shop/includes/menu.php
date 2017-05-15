
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
$current_user=wp_get_current_user();
$user=get_userdata($current_user->ID);
?>
<script>

var shampooul=1;


</script>

<div id="menu-profile-page-popup-outer">
	<div id="menu-profile-page-popup-inner">
		<a id="close-menu-profile-page-popup" href="javascript:void()">Close</a>	
		<div class="menu-profile-page-popup-content" style="display:none;">
			<p class="how-to-add-hs">How To Add A Hair Story</p>
			<?php if( function_exists('cyclone_slider') ) cyclone_slider('profile-page-hairstory-guide'); ?>
		</div>
	</div>
</div>

 <div id="login-popup-outer">	
                  <div id="login-popup-inner">		
                    <a href="javascript:void()" id="close-login">Close</a>				  
			       <div class="header-login-form">
				   	<form name="loginform" id="loginform" action="<?php bloginfo('url');?>/login/" method="post">
		       <table>
			    <tr><td>Username <span class="star_icon">*</span></td>
				<td><input type="text" name="log" id="user_login" class="input" value="" size="20" placeholder="Username"/></td></tr>
                   <tr><td>Password <span class="star_icon">*</span></td>
			   <td><input type="password" name="pwd" id="user_pass" class="input" value="" size="20" placeholder="password"/></td></tr>
	<tr>
	 <td></td>
	 <td>
	 
	     	<input type="hidden" name="_wp_original_http_referer" value="<?php bloginfo('url');?>/" />

		      <input class="login_submit" class="button" type="submit" name="wp-submit" id="wp-submit" value="Log In" />
			<input id="redir" type="hidden" name="redirect_to" value="<?php bloginfo('url');?>/wp-admin/" />
			<input type="hidden" name="instance" value="" />
			<input type="hidden" name="action" value="login" /></td>
	       </tr>
		   <tr><td></td>
		   <td> Do not have an account? Click <a href="<?php bloginfo('url');?>/register/">HERE </a> to register
                  
                    <br>
                       <a href="<?php bloginfo('url');?>/lostpassword/">FORGOT PASSWORD?</a></td>
		</tr>
      </table>		
		   
		   
		   </form>
			    
				   </div>
				   			
				   
				   
				   
				   </div>
				   </div>
 <div id="my-match-login-popup-outer">	
                  <div id="my-match-login-popup-inner">		
                    <a href="javascript:void()" id="close-my-match-login">Close</a>				  
			       <div class="my-match-login-form">
				   	<form name="loginform" id="loginform" action="<?php bloginfo('url');?>/login/" method="post">
		       <div class="row">
				<div class="span5 form_input_area">		
				<h2>Discover<br /><span>Your Match</span><br />Instantly<br /></h2>
				<h3>w/<span>1,100+ Hair Products</span></h3>
				<input type="text" name="log" id="user_login" class="input" value="" size="20" placeholder="Email"/>                 
			  <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" placeholder="password"/><br />
	 
	     	<input type="hidden" name="_wp_original_http_referer" value="<?php bloginfo('url');?>/" />

		      <input class="button pull-left" type="submit" name="wp-submit" id="wp-submit" value="Log In" />
		      <a class="signup_link button pull-right" href="<?php bloginfo('url');?>/register/">Sign Up</a>
				<div class="clear"></div>
			<input id="redir" type="hidden" name="redirect_to" value="<?php bloginfo('url');?>/my-matches/" />
			<input type="hidden" name="instance" value="" />
			<input type="hidden" name="action" value="login" />
   
       
                  <a class="forgot_pass" href="<?php bloginfo('url');?>/lostpassword/">FORGOT PASSWORD?</a>
				</div>
				<div class="span7">
						<img alt="match login popup photo" src="<?php bloginfo('url');?>/wp-content/themes/456shop/assets/img/match-login-popup-photo.png">

			   </div>
			   </div>
			  		   
		   </form>			    
				   </div>
				   </div>
				   </div>
 
<div class="header-menus">

		  <!-- <div class="circle-logo">
			<a href="<?php echo home_url(); ?>"><img style="margin:6px 0 0 0px" alt="<?php bloginfo( 'name' ); ?>" src="<?php bloginfo('url');?>/wp-content/themes/456shop/assets/img/TrendingIconNew.png" width="31"/></a>
			<h3>Hair Library</h3>
			<div class="clear"></div>
			</div>-->
			
			<div class="circle-logo">
			<h1 class="hl_logo"><a href="<?php echo home_url(); ?>"><img  alt="<?php bloginfo( 'name' ); ?>" src="<?php bloginfo('url');?>/wp-content/themes/456shop/assets/img/new_logo.png" width="264"/></a></h1>
			
			<div class="clear"></div>
			</div>

			


<div class="explore-button">			 
			    <ul class="unstyled inline custom-main-menu-items" id="explore-drop-down">
				 <li>
				 <?php if(is_user_logged_in()){
                  $is_salon=get_user_meta($current_user->ID, 'is_salon', true); 
				  if($is_salon==1){ ?>
				   <a  id="match-menu-item" class="menu-item" href="<?php bloginfo('url');?>/quick-match/">Quick Match</a>
				 <?php }else {
				 ?>
				 <a  id="match-menu-item" class="menu-item" href="<?php bloginfo('url');?>/my-matches">My Matches</a>
				 <?php }
				 } else {?>
				 
				 <a id="match-menu-item" class="menu-item" href="javascript:void()" onclick="getMyMatchLoginPopup();" id="get-my-match-login-popup">My Matches</a>
				 <!--<a class="menu-item" href="javascript:void()" id="get-my-match-login-popup" onclick="getCommonLoginPopup('<?php bloginfo('url');?>/my-matches')">My Matches</a>-->
				 <?php } ?>
				 </li>
			     <li class="trending hair-story-menu"><a id="story-menu-item" class="menu-item" href="<?php bloginfo('url');?>/hair-stories/">Hair Stories</a>
					
				   <div class="hs-dropdown drop brand-subs">
				   <div class="desktop-display add_story_home">
						<?php   if($current_user->ID<1) {?>
						<a style="font-weight:normal;" class="button btn primary" title="Add Hair Story"  onclick="getCommonLoginPopup('http://hairlibrary.com/upload-photo/');" href="javascript:void();">Add hair story</a>
						<?php } else {?>
						<a class="button btn primary" title="Add Hair Story" href="<?php bloginfo('url');?>/upload-photo/">Add hair story</a>
						<?php }?>
						<a href="javascript:void()"  title="Take a look how to add hair story" class="question-mark"><img width="20px" src="<?php bloginfo('template_url');?>/assets/img/icons/Question mark-01.png"></a>						
					</div>
					<div class="clear"></div>
				   <div class="row-fluid">
				   <div class="span3">
				   <h3 class="brand-sub-menus-title">Hair Categories</h3>
				   <ul class="unstyled">
						<li><a href="http://hairlibrary.com/naturally-straight-hair-stories/">Naturally Straight</a></li>
						<li><a href="http://hairlibrary.com/naturally-curly-hair-stories/">Naturally Curly</a></li>
						<li><a href="http://hairlibrary.com/locks-hair-stories/">Locks</a></li>
						<li><a href="http://hairlibrary.com/wigs-hair-stories/">Wigs</a></li>
						<li><a href="http://hairlibrary.com/braids-hair-stories/">Braids</a></li>
						<li><a href="http://hairlibrary.com/relaxed-straight-hair-stories/">Relaxed Straight</a></li>
						<li><a href="http://hairlibrary.com/hair-extensions-hair-stories/">Hair Extensions</a></li>
						<li><a href="http://hairlibrary.com/hair-color-hair-stories/">Hair Color</a></li>
						<li><a href="http://hairlibrary.com/permed-curly-hair-stories/">Permed Curly</a></li>
					</ul>
					</div>
					<div class="span9">
					<h3 class="brand-sub-menus-title">Featured Hair Stories</h3>
					<div class="row-fluid">
					<div class="span4 hairstory_item">
		 <a href="http://hairlibrary.com/hairstory/?n=my-dreadlock-phase&user=Cora3&brand=murrays&p=murrays-cream-beeswax"><img  width="220" alt="hairstory" src="<?php bloginfo('url');?>/wp-content/uploads/photostore/featured/Hair-Story-Picks-02-01.jpg"/></a>
					</div>
					<div class="span4 hairstory_item">
	<a href="http://hairlibrary.com/hairstory/?n=layered-and-lovely&user=Nadia98&brand=pantene&p=pantene-smooth-argan-serum"><img width="220" alt="hairstory" src="<?php bloginfo('url');?>/wp-content/uploads/photostore/featured/Hair-Story-Picks-02-02.jpg"/></a>
					</div>
					<div class="span4 hairstory_item">
			<a href="http://hairlibrary.com/hairstory/?n=super-fly&user=David_T&brand=johnny_b._haircare&p=johnny-b-haircare-molding-paste"><img width="220" alt="hairstory" src="<?php bloginfo('url');?>/wp-content/uploads/photostore/featured/Hair-Story-Picks-02-03.jpg"/></a>
					</div>
					</div>
					</div>
					</div>
					</div>
				 </li>
			    <li class="shop-menu"><a id="shop-menu-item" class="menu-item" href="<?php bloginfo('url');?>/products/">Products</a>
			
				     <div class="brand-subs shop-dropdown drop" id="brand-sub-menus">
					 <div class="row-fluid">
					 <div class="span3">
					 <h3 class="brand-sub-menus-title">Featured Brands</h3>
				      <ul class="unstyled">					  
						
						<li><a href="<?php bloginfo('url');?>/brand/?n=alikay-naturals">Alikay Naturals</a></li>
                      <li><a href="<?php bloginfo('url');?>/brand/?n=blow">Blow</a></li>						
						<li><a href="<?php bloginfo('url');?>/brand/?n=coldlabel">ColdLabel</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=drydivas">Dry Divas</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=intelligent-nutrients">Intelligent nutrients</a></li>
					
						<li><a href="<?php bloginfo('url');?>/brand/?n=kimble-beauty">Kimble Beauty</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=kiehl's">Kiehl's</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=laila-ali">Laila Ali</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=loreal-paris">Loreal</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=mixtina">Mixtina</a></li>
					     <li><a class="b_see_all" href="<?php bloginfo('url');?>/brands">View All Brands A-Z</a></li>
								 
						   </ul>
						   </div>
						   
						   
						<div class="span6">   
						 <h3 class="brand-sub-menus-title"  style="margin-left:0 !important">Product Categories</h3>
						<div class="row-fluid">   
					  <div class="span6">
					  <ul class="unstyled">
				            <li><a href="<?php bloginfo('url'); ?>/conditioner">Conditioner </a></li>
						    <li><a href="<?php bloginfo('url'); ?>/shampoo">Shampoo </a></li>
							 <li><a href="<?php bloginfo('url'); ?>/hair-spray">Hair Spray </a></li>
							   <li><a href="<?php bloginfo('url'); ?>/gel">Gel </a></li>
							   <li><a href="<?php bloginfo('url'); ?>/moisturizer">Moisturizer </a></li>
							   <li><a href="<?php bloginfo('url'); ?>/hair-color">Hair color </a></li>
							   <li><a href="<?php bloginfo('url'); ?>/oil">Oil</a></li>
							   <li><a href="<?php bloginfo('url'); ?>/hair-removers">Hair Remover</a></li>
							   <li><a href="<?php bloginfo('url'); ?>/styling-tools">Tools</a></li>

						</ul>
						 </div>
						<div class="span6">
						<ul class="unstyled">
					 	 <li><a href="<?php bloginfo('url'); ?>/hair-extensions">Hair Extensions </a></li>
						 <li><a href="<?php bloginfo('url'); ?>/wigs">Wigs </a></li>
						 <li><a href="<?php bloginfo('url'); ?>/irons-and-curlers">Irons and Curlers </a></li>
						 <li><a href="<?php bloginfo('url'); ?>/styling-product">Styling Products</a></li>
							
						  <li><a href="<?php bloginfo('url'); ?>/treatments">Relaxer/Straightening Treatment</a></li>				   
						  <li><a href="<?php bloginfo('url'); ?>/organic-products">Organic Products</a></li>	
                          <li><a href="#">Hair Art Tools</a></li>
                          <li><a href="#">Hair Loss</a></li>							
				
						</ul>
						</div>	
						</div>	
						</div>
						<div class="span3">
						<h3 class="brand-sub-menus-title" style="margin-left:0 !important">Featured Brand</h3>
						<a href="<?php bloginfo('url');?>/brand/?n=coldlabel"><img width="220px" style="margin-top:10px;" alt="drydivas" src="<?php bloginfo('url');?>/wp-content/uploads/photostore/featured/15-01-12.jpg"/></a>
					</div>
					</div>
					</div>
				   </li>
				   <?php if( is_user_logged_in() || $fbuser ) {?>
				   <li class="feed-menu">
				   <a id="feed-menu-item" class="menu-item" href="<?php bloginfo('url');?>/feeds/">Feeds</a>
				   </li>
	<?php }?>
	             <!--<li class="feed-menu">
				   <a id="about-menu-item" class="menu-item" href="<?php bloginfo('url');?>/about-us/">About Us</a>
				   </li>-->
				</ul>
			 </div>
<div class="right">

 <div class="login-section">
  <div class="header-login <?php if( is_user_logged_in() || $fbuser ) echo 'after-login';?>">
	
											
				
				<div class="login-info clearfix <?php if( is_user_logged_in() || $fbuser ) echo 'login-after';?>">							
			                             
				<?php if( !is_user_logged_in() && !$fbuser ) {?>
                 
				   	<ul> 
				  <!-- <li class="fb-login"><a href="<?php echo $loginUrl; ?>"></a></li>-->
				  
				 <li class="join brand-link"><a class="menu-sign-in" href="javascript:void()" id="getLoginPopup"> Log In</a></li>
				<li class="join brand-link"><a class="menu-sign-up" href="<?php bloginfo('url');?>/register/"> Sign Up</a></li>
				
				
				<?php } else { 
				if(is_user_logged_in()){
				 $c_user=wp_get_current_user();
				 $thumb=get_user_meta($c_user->ID, 'user_thumb', true);	 
					  if(!$thumb)
					    $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/thumb.jpg';
						else
						 $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/'.$thumb;
						 }
						 else
						 {
						  $thumbpath='https://graph.facebook.com/'.$fbuser.'/picture';
						 
						 }
				?>		
							
				<li class="pro"><a class="circle-pro mini-circle <?php echo getUserHairStyle($user->ID);?>" href="<?php bloginfo('url');?>/profile/"><div class="inner-round"><img class="user-thumb" alt="profile picture" src="<?php echo $thumbpath;?>" width="36"/></div></a>
	
				</li>	
				<li class="ls"><a class="profile_link_btn"  href="<?php bloginfo('url');?>/profile/">Profile</a></li>
				  <?php if(is_user_logged_in()){ ?>
				    <li class="ls"><a href="<?php echo wp_logout_url(); ?>">Logout</a></li>	
                  <?php } else {?>				
				
				<li class="ls">  <a href="<?php echo $logoutUrl; ?>">Logout</a></li>
				<?php } } ?>				
				</ul>	
				<div class="clear"></div>
				</div>
				<?php if(is_user_logged_in() ) {?>
				<div class="fb-invite clearfix"> 
		 <?php //echo do_shortcode('[fib title="Invite friends to join" message="Learn exciting new stuff at Hairlibrary!" text="Invite Facebook Friends" image="http://example.com" appid="516089321798068" width="100%" align="center"]');
		  
		   ?>
			</div>
			<?php } ?>

    
		</div>
	
  </div>
  <div class="social">
  <!--  <ul class="unstyled inline">
				<li class="pfacebook"><a title="Facebook" target="_blank" class="facebook" href="https://www.facebook.com/hairlibrary?ref=hl"><img src="<?php bloginfo('template_url');?>/assets/img/social/Pink_Facebook.png"/></a></li>				
				<li class="ptwitter"><a target="_blank" title="Twitter" class="twitter" href="https://twitter.com/Hair_Library"><img src="<?php bloginfo('template_url');?>/assets/img/social/Pink_Twitter.png"/></a></li>							
			
				<li class="pinstagram"><a target="_blank" title="Instagram" class="instagram" href="http://instagram.com/hairlibrary"><img src="<?php bloginfo('template_url');?>/assets/img/social/instagram.png"/></a></li>	
				
			</ul>-->
			<?php global $woocommerce;
			$qty=$woocommerce->cart->cart_contents_count;

	
			?>
	<a title="Checkout" class="cart" href="<?php bloginfo('url');?>/cart/"><img alt="cart" src="<?php bloginfo('template_url');?>/assets/img/icons/Cart.png" width="30"/></a>
	<?php if($qty>0) echo '<span class="cart-sub">'.$qty.'</span>';?>
  </div>
    <div class="search-icon right">
	<ul class="unstyled">
	<li>
		<a title="" class="search" href="javascript:void();"></a>
	
	<div class="header-search">

		  <!-- <div class="tags"><span>#HAIRLIBRARY #HL</span></div>-->
		   <div style="display:none" class="search-tag"><p>Search</p></div>
			<div class="search-h">
			   <div class="<?php if($header_search != "none"){ ?>form-456<?php }?>">
					<?php if($header_search != "none"){ ?>
					<form class="s-form form-search" role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
					<?php if($header_search == "shop_search"){ ?>
					<!--	<input type="hidden" name="post_type" value="product" />-->
						<input id="s" name="s" type="text" class="input-medium" value="<?php _e( 'Search By Product Name', GETTEXT_DOMAIN ); ?>">
						<button type="submit" class="button-icon"></button>
				<?php }else{?>
						<input id="s" name="s" type="text" class="input-medium" value="<?php _e( 'Search Site', GETTEXT_DOMAIN ); ?>">
						<button type="submit" class="button-icon"> </button>
			<?php }?>
					</form>
				<?php }?>
				</div>
				</div>
		
		
  </div>
	</li>
	
	</ul>
	</div>
  
  
  
</div>
  <div class="clear"></div>
</div>

<div class="mobile-header">
<div class="span12 ">
		   <div class="circle-logo">
		<a href="javascript:void()" id="mobile-menu-icon">Icon</a>
			<h3><a href="<?php bloginfo('url');?>"><img width = "170" alt="logo text" src="<?php bloginfo('url');?>/wp-content/themes/456shop/assets/img/new_logo_text.png"></a></h3>
			
				<?php if(is_user_logged_in()){ ?>
				
	<a id="get-profile-menu" class="mobile-profile-pic" href="<?php bloginfo('url');?>/profile/"> <div class="owner-thumb circle-outer mini-circle <?php echo getUserHairStyle($user->ID);?>" style="width:28px;height:28px;padding:2px"><div class="inner-round"><img alt="Profile" class="user-thumb" alt="profile pic" src="<?php echo $thumbpath;?>" width="36"/></div></div></a>
		<?php } ?>
			</div>
			
			   
			
			
</div>



  <div class="clear"></div>
</div>
  <div class="clear"></div>
  
  
  <script>
  $('#shampoo-prev').click( function(){
  
  if(shampooul>1)
  val=shampooul-1;
  else
    val=3;

 previd="#shampoo-list-"+shampooul;
  id="#shampoo-list-"+val;
  shampooul=val;
  
  $(previd).hide();
   $(id).show();
  
  });
  
    $('#shampoo-next').click( function(){
  
  if(shampooul<3)
  val=shampooul+1;
  else
    val=1;

 previd="#shampoo-list-"+shampooul;
  id="#shampoo-list-"+val;
  shampooul=val;
  
  $(previd).hide();
   $(id).show();
  
  });
  
  function closeSubMenus(cssid)
  {
    id="#"+cssid;
	$(id).slideUp(1000);
	$('#explore-drop-down').slideUp(500);
  
  }
  
  function getMyMatchLoginPopup()
{
$('#my-match-login-popup-outer').fadeIn(1000);
}
  $('#close-my-match-login').on('click', function() {
$('#my-match-login-popup-outer').fadeOut(1000);

}); 


  </script>
	 <script>
	
$( document ).ready(function() {
$('.question-mark').on('click', function() {
	$('#menu-profile-page-popup-outer').fadeIn(1000);	
	
	setTimeout(function(){ 

$('.menu-profile-page-popup-content').show();	 

}, 2000);
	
});


$('#close-menu-profile-page-popup').on('click', function() {
  
 $('#menu-profile-page-popup-outer').fadeOut(1000);
 
});
});

	
</script>
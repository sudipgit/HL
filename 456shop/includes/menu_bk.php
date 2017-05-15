
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
?>
<script>

var shampooul=1;


</script>


 <div id="login-popup-outer">	
                  <div id="login-popup-inner">		
                    <a href="javascript:void()" id="close-login">Close</a>				  
			       <div class="header-login-form">
				   	<form name="loginform" id="loginform" action="<?php bloginfo('url');?>/login/" method="post">
		       <table>
			    <tr><td>Username <span style="color:#F00; font-weight:bold">*</span></td>
				<td><input type="text" name="log" id="user_login" class="input" value="" size="20" placeholder="Username"/></td></tr>
                   <tr><td>Password <span style="color:#F00; font-weight:bold">*</span></td>
			   <td><input type="password" name="pwd" id="user_pass" class="input" value="" size="20" placeholder="password"/></td></tr>
	<tr>
	 <td></td>
	 <td>
	 
	     	<input type="hidden" name="_wp_original_http_referer" value="<?php bloginfo('url');?>/" />

		      <input style="padding:4px 15px;"  class="button" type="submit" name="wp-submit" id="wp-submit" value="Log In" />
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


<div class="header-menus">
<div class="span6 ">
		   <div class="circle-logo">
			<a class="logo" href="<?php echo home_url(); ?>"><img style="margin:6px 0 0 0px" alt="<?php bloginfo( 'name' ); ?>" src="<?php bloginfo('url');?>/wp-content/themes/456shop/assets/img/HL_Logo_w.png" width="31"/></a>
			<h3>Hair Library</h3>
			<div class="clear"></div>
			</div>
			<div class="explore-button">
			 <a class="explore" id="explore-menu" href="javascript:void();">Explore</a>
			 


			    <ul class="unstyled inline custom-main-menu-items" id="explore-drop-down">
				   <li class="bands"><a id="brand-menu" class="menu-item" href="javascript:void();">Brands</a>
				     <div class="brand-subs" id="brand-sub-menus">
				     <ul class="span3 first">
			            <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(164);?>">Aesop</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(114);?>">Affirm</a></li>
                        <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(99);?>">African Pride</a></li>
                        <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(125);?>">Agadir</a></li>
						<li><a href="#">Aphogee</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6329);?>">AlbertoVo5</a></li>
					
					    <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(167);?>">Alder New York</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(215);?>">Alikay Naturals</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6318);?>">American Crew</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(389);?>">Art Of Shaving</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(173);?>">Aunt Jackies</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6341);?>">Aussie</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(222);?>">Aveda</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(113);?>">Avlon</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(78);?>">Beautiful Textures</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(109);?>">Bigen</a></li>
						<li><a href="#">Bobbi Boss</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(112);?>">Bohyme</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(223);?>">Bumble and Bumble</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6506);?>">Burtsbees</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6476);?>">California Baby</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(117);?>">Cantu</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(34);?>">Carol's Daughter</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6464);?>">Chi</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6339);?>">Clairol</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6500);?>">Clear</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(105);?>">Creme Of Nature</a></li>
						</ul>
						<ul class="span3">					    
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(224);?>">Conair</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(101);?>">Dark & Lovely</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(220);?>">Davines</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(81);?>">DevaCurl</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(108);?>">Doo Grow</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6502);?>">Dove</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(160);?>">Dr Bronner</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(185);?>">Dr Miracles</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6316);?>">EcoStyler</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(115);?>">Elasta Qp</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(107);?>">Fantasia</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6323);?>">Fekkai</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6335);?>">Garnier Fructise</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6317);?>">Gillette</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6311);?>">Got2Be</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6467);?>">HairEnvy</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(106);?>">Hairfinity</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(191);?>">Hair Library</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(221);?>">Hair Rules</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6336);?>">Herbal Essences</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6447);?>">Infusium 23</a></li>
						  <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(166);?>">Intelligent Nutrients</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6507);?>">Its A 10</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(98);?>">Jane Carter Solution</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6479);?>">John Frieda</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6478);?>">Just for Men</a></li>
						</ul>
							<ul class="span3">
						
						
					
				
						
						
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6445);?>">Karen’s Body Beautiful </a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(111);?>">Kinky Curly</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6319);?>">Knotty Boy</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6333);?>">Laila Ali</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(118);?>">Lisa Raye</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6444);?>">Living Proof</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6334);?>">Loreal Paris</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6441);?>">Luster</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(183);?>">Macadamia</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(163);?>">Malin+Goetz</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(102);?>">Mane n Tail</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6313);?>">Manic Panic</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6327);?>">Matrix</a></li>
						 
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(80);?>">Miss Jessie's</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(100);?>">Mixed Chicks</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6314);?>">Mizani</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(212);?>">Moroccanoil</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6338);?>">Motions</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6320);?>">Murrays</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6337);?>">Neutrogena</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6325);?>">Nexxus</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6450);?>">Nioxin</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6332);?>">Organix</a></li>
						<li><a href="#">ORS Beauty</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(218);?>">Ouidad</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(104);?>">Palmers</a></li>
						</ul>
							<ul class="span3">
						
						
						
						
						
						
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6465);?>">Pantene</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6322);?>">Paul Mitchell</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6443);?>">Phyto</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(77);?>">Profective</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(216);?>">Pureology</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6326);?>">Redken</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6315);?>">Revlon</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6474);?>">Rogaine</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(219);?>">Sexy Hair</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(103);?>">Shea Moisture</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6312);?>">Splat</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6330);?>">suave</a></li>
						 <li><a href="#">Sulfur 8</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6449);?>">Sunny Isle</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(110);?>">4 Naturals</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(79);?>"> Taliah Waajid</a></li>
						
						
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(214);?>">The DryBar</a></li>
						<li><a href="#">ThermaSilk</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6331);?>">Tigi</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6455);?>">Toppik</a></li>
						
				        <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(165);?>">Travis Dowdy</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6340);?>">Treseeme</a></li>
							<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6328);?>">Vidal Sassoon</a></li>
							<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6468);?>">Viviscal</a></li>
							<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6446);?>">Wahl Clippers</a></li>
							<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6321);?>">Wen</a></li>
							
		            </ul>
					</div> 
				   </li>
				   <li class="pcategory">
				   <a class="menu-item" id="product-cats" href="javascript:void()">Product Categories</a>
				   <div class="menu-product-list" id="shampoo-products">
				    <a class="close-product-list" href="javascript:void()" onclick="closeSubMenus('shampoo-products');">Close</a>
				    <div class="menu-product-list-inner">
					 <a class="prev" id="shampoo-prev"  href="javascript:void();">Prev</a>
				      <?php //getMenuproducts(array(254,215,191,219,195,176,223,207,211),$current_user->ID);?>
					  <ul id="shampoo-list-1" class="products list-1">
					   	   <li class=" span3 product first">
						   <a href="<?php bloginfo('url'); ?>/shampoo">
						  <!-- <img src="<?php bloginfo('url'); ?>/wp-content/uploads/2014/02/boxbraids_sideswept-e1392058030370.jpg"/>-->
						   <img src="<?php bloginfo('template_url'); ?>/assets/img/submenus/shampoo1.png"/>
						   <h3>Shampoo</h3>
						   </a>
						   </li>
						   <li class=" span3 product ">
						   <a href="<?php bloginfo('url'); ?>/conditioner/">
						   <!--<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2014/02/hair-weave-10.jpg"/>-->
						     <img src="<?php bloginfo('template_url'); ?>/assets/img/submenus/conditioner1.png"/>
						   <h3>Conditioner</h3>
						   </a>
						   </li>
						 <li class=" span3 product ">
						   <a href="<?php bloginfo('url'); ?>/styling-product/">
						      <img src="<?php bloginfo('template_url'); ?>/assets/img/submenus/styling.png"/>
						   <h3>Styling</h3>
						   </a>
						   </li>
						   <li class=" span3 product ">
						   <a href="<?php bloginfo('url'); ?>/hair-removers/">
						     <img src="<?php bloginfo('template_url'); ?>/assets/img/submenus/remover.png"/>
						   <h3>Hair Remover</h3>
						   </a>
						   </li>						   
						</ul>
						
						<ul id="shampoo-list-2" class="products list-2">
						  <li class=" span3 product first"><a href="<?php bloginfo('url'); ?>/treatments/">
						    <img src="<?php bloginfo('template_url'); ?>/assets/img/submenus/treatment.png"/>
						   <h3>Treatments</h3>
						   </a></li>
						   <li class=" span3 product "><a href="<?php bloginfo('url'); ?>/styling-tools/">
						   <img src="<?php bloginfo('template_url'); ?>/assets/img/submenus/tools1.png"/>
						   <h3>Tools</h3>
						   </a></li>
						   <li class=" span3 product "><a href="<?php bloginfo('url'); ?>/hair-extensions/">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/submenus/extension1.png"/>
						   
						   <h3>Hair Extensions</h3>
						   </a></li>
						   <li class=" span3 product "><a href="<?php bloginfo('url'); ?>/wigs/">
					
						    <img src="<?php bloginfo('template_url'); ?>/assets/img/submenus/wigs.jpg"/>
						   <h3>Wigs</h3>
						   </a></li>
						</ul>
						<ul id="shampoo-list-3" class="products list-3">
					      <li class=" span3 product first"><a href="<?php bloginfo('url'); ?>/organic-products/">
						 <img src="<?php bloginfo('template_url'); ?>/assets/img/submenus/organic2.png"/>
						   <h3>Organic</h3>
						   </a></li>
						   <li class=" span3 product "><a href="<?php bloginfo('url'); ?>/hair-color/">
						   <img src="<?php bloginfo('template_url'); ?>/assets/img/submenus/color.png"/>
						   <h3>Hair color</h3>
						   </a></li>
						   <li class=" span3 product "><a href="<?php bloginfo('url'); ?>/moisturizer/">
						  <img src="<?php bloginfo('template_url'); ?>/assets/img/submenus/loss.png"/>
						   <h3>Moisturizer</h3>
						   </a></li>
						   <li class=" span3 product "><a href="<?php bloginfo('url'); ?>/kids/">
						    <img src="<?php bloginfo('template_url'); ?>/assets/img/submenus/kids.png"/>
						   <h3>Kids</h3>
						   </a></li>
						</ul>
	 

					  
					   <a class="next"  id="shampoo-next" href="javascript:void()">next</a>
				     </div>
				   </div>
				</li>
				<li class="trending"><a class="menu-item" href="<?php bloginfo('url'); ?>/trending-products/">Trending</a>
				
				</li>
				<li class="feeds"><a class="menu-item" href="<?php bloginfo('url'); ?>/feeds/">Social Feeds</a>
				
				</li>
				
				<li class="take-the-tour"><a class="menu-item button" href="<?php bloginfo('url'); ?>/take-your-tour/">Take The Tour</a>
				
				</li>
				</ul>
			 </div>
			
</div>
			


<div class="span6 right">

 <div class="login-section">
  <div class="header-login <?php if( is_user_logged_in() || $fbuser ) echo 'after-login';?>">
	
											
				
				<div class="login-info clearfix <?php if( is_user_logged_in() || $fbuser ) echo 'login-after';?>">							
			                             
				<?php if( !is_user_logged_in() && !$fbuser ) {?>
                 
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
							
				<li class="pro"><a class="circle-pro" href="<?php bloginfo('url');?>/profile/"><div class="inner-round"><img class="user-thumb" src="<?php echo $thumbpath;?>" width="36"/></div></a>
	
				</li>	
				<li><a  style="padding-right:5px;border-right:1px solid #fff;" href="<?php bloginfo('url');?>/profile/">Profile</a></li>
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
		 <?php //echo do_shortcode('[fib title="Invite friends to join" message="Learn exciting new stuff at Hairlibrary!" text="Invite Facebook Friends" image="http://example.com" appid="516089321798068" width="100%" align="center"]');
		  
		   ?>
			</div>
			<?php } ?>

    
		</div>
	
  </div>
  <div class="social">
    <ul class="unstyled inline">
				<li class="pfacebook"><a title="Facebook" target="_blank" class="facebook" href="https://www.facebook.com/hairlibrary?ref=hl"><img src="<?php bloginfo('template_url');?>/assets/img/social/Pink_Facebook.png"/></a></li>				
				<li class="ptwitter"><a target="_blank" title="Twitter" class="twitter" href="https://twitter.com/Hair_Library"><img src="<?php bloginfo('template_url');?>/assets/img/social/Pink_Twitter.png"/></a></li>							
				<!--<li class="pthumblr"><a target="_blank" title="Thmublr" class="thumblr" href="#"><img src="<?php bloginfo('template_url');?>/assets/img/social/Pink_Tumblr.png"/></a></li>	-->
				<li class="pinstagram"><a target="_blank" title="Instagram" class="instagram" href="http://instagram.com/hairlibrary"><img src="<?php bloginfo('template_url');?>/assets/img/social/instagram.png"/></a></li>	
				<!--<li class="pyoutube"><a target="_blank" title="YouTube" class="youtube" href="#"><img src="<?php bloginfo('template_url');?>/assets/img/social/Pink_YouTube.png"/></a></li>	-->
			</ul>
	
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
						<input id="s" name="s" type="text" class="input-medium" value="<?php _e( 'Enter Keyword', GETTEXT_DOMAIN ); ?>">
						<button type="submit" class="button-icon"></button>
				<?php }else{?>
						<input id="s" name="s" type="text" class="input-medium" value="<?php _e( 'SEARCH', GETTEXT_DOMAIN ); ?>">
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
  
  
  
  
  </script>
  
</div>
  <div class="clear"></div>
</div>

<div class="mobile-header">
<div class="span12 ">
		   <div class="circle-logo">
		<a href="javascript:void()" id="mobile-menu-icon">Icon</a>
			<h3><a href="<?php bloginfo('url');?>">Hair Library</a></h3>
			
				<?php if(is_user_logged_in()){ ?>
	<a id="get-profile-menu" class="mobile-profile-pic" href="<?php bloginfo('url');?>/profile/"><div class="inner-round"><img alt="Profile" class="user-thumb" src="<?php echo $thumbpath;?>" width="36"/></div></a>
		<?php } ?>
			</div>
			
			   
			
			
</div>



  <div class="clear"></div>
</div>
  <div class="clear"></div>
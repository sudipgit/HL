<?php
/*
Template Name: Associate Login Template
*/
?>
<?php get_header(); 

$is_reg=$_GET['r'];

?>

		<div class="wrap post-template login-page" id="main">
			<div class="container">
						    <div class="p-logo">
								<img width="300" src="http://HairLibrary.com/wp-content/themes/456shop/assets/img/Updated-HL-Logo.png" alt="hl logo">
								<h4 style="text-transform:uppercase; font-size:21px; margin:0; color:#aaa;">Associates</h4>
							</div>
				<div class="row-fluid">
					<div class="span12 post-page">
			                                                    <div id="theme-my-login" class="login">
			<form method="post" action="/login/" id="loginform" name="loginform">
		<p>
			<label for="user_login">Username</label>
			<input type="text" placeholder="USERNAME" size="20" value="" class="input" id="user_login" name="log">
		</p>
		<p>
			<label for="user_pass">Password</label>
			<input type="password" placeholder="PASSWORD" size="20" value="" class="input" id="user_pass" name="pwd">
		</p>

		<input type="hidden" value="" name="_wp_original_http_referer">

		<p class="forgetmenot">
			<input type="checkbox" value="forever" id="rememberme" name="rememberme">
			<label for="rememberme">Remember Me</label>
		</p>
		<p class="submit">
			<input type="submit" value="Log In" id="wp-submit" name="wp-submit" class="button primary-button">
			<input type="hidden" value="<?php bloginfo('url');?>/associates/" name="redirect_to">
			<input type="hidden" value="" name="instance">
			<input type="hidden" value="login" name="action">
		</p>
	</form>
		
	<ul class="tml-action-links">     
	   <li>        <a href="http://hairlibrary.com/lostpassword/" rel="nofollow">Forgot Password?</a>       </li>  
	<li>           <a href="http://hairlibrary.com/associates-registration/" rel="nofollow">Associates Sign Up</a>      </li>  
    </ul>
</div>


                                        </div>
				</div>
			</div>
		</div>
		<!--<style>
		.woocommerce-message:before
		{
		height:75%;
		line-height:44px;
		}
		</style>-->
        <script>
		$( ".menu-sign-in" ).addClass( "active_menu_item" );
		</script>
<?php get_footer(); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Signup </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/css/style.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo get_bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" media="screen"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/sliding.form.js"></script>
        <script type="text/javascript" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/jc2t.registration.js"></script>
		<script>
			var skip	=	false;
		</script>
		<style>
			.showCheckbox{
				display:block !important;
			}
			.hideCheckbox{
				display:none !important;
			}
		</style>
	<style>
		.meter { 
			height: 20px;  /* Can be anything */
			position: relative;
			margin: 60px 0 20px 0; /* Just for demo spacing */
			background: #555;
			-moz-border-radius: 25px;
			-webkit-border-radius: 25px;
			border-radius: 25px;
			padding: 10px;
			-webkit-box-shadow: inset 0 -1px 1px rgba(255,255,255,0.3);
			-moz-box-shadow   : inset 0 -1px 1px rgba(255,255,255,0.3);
			box-shadow        : inset 0 -1px 1px rgba(255,255,255,0.3);
			width: 90%;
			float: left;
		}
		.meter > span {
			display: block;
			height: 100%;
			   -webkit-border-top-right-radius: 8px;
			-webkit-border-bottom-right-radius: 8px;
			       -moz-border-radius-topright: 8px;
			    -moz-border-radius-bottomright: 8px;
			           border-top-right-radius: 8px;
			        border-bottom-right-radius: 8px;
			    -webkit-border-top-left-radius: 20px;
			 -webkit-border-bottom-left-radius: 20px;
			        -moz-border-radius-topleft: 20px;
			     -moz-border-radius-bottomleft: 20px;
			            border-top-left-radius: 20px;
			         border-bottom-left-radius: 20px;
			background-color: rgb(43,194,83);
			background-image: -webkit-gradient(
			  linear,
			  left bottom,
			  left top,
			  color-stop(0, rgb(43,194,83)),
			  color-stop(1, rgb(84,240,84))
			 );
			background-image: -moz-linear-gradient(
			  center bottom,
			  rgb(43,194,83) 37%,
			  rgb(84,240,84) 69%
			 );
			-webkit-box-shadow: 
			  inset 0 2px 9px  rgba(255,255,255,0.3),
			  inset 0 -2px 6px rgba(0,0,0,0.4);
			-moz-box-shadow: 
			  inset 0 2px 9px  rgba(255,255,255,0.3),
			  inset 0 -2px 6px rgba(0,0,0,0.4);
			box-shadow: 
			  inset 0 2px 9px  rgba(255,255,255,0.3),
			  inset 0 -2px 6px rgba(0,0,0,0.4);
			position: relative;
			overflow: hidden;
		}
		.meter > span:after, .animate > span > span {
			content: "";
			position: absolute;
			top: 0; left: 0; bottom: 0; right: 0;
			background-image: 
			   -webkit-gradient(linear, 0 0, 100% 100%, 
			      color-stop(.25, rgba(255, 255, 255, .2)), 
			      color-stop(.25, transparent), color-stop(.5, transparent), 
			      color-stop(.5, rgba(255, 255, 255, .2)), 
			      color-stop(.75, rgba(255, 255, 255, .2)), 
			      color-stop(.75, transparent), to(transparent)
			   );
			background-image: 
				-moz-linear-gradient(
				  -45deg, 
			      rgba(255, 255, 255, .2) 25%, 
			      transparent 25%, 
			      transparent 50%, 
			      rgba(255, 255, 255, .2) 50%, 
			      rgba(255, 255, 255, .2) 75%, 
			      transparent 75%, 
			      transparent
			   );
			z-index: 1;
			-webkit-background-size: 50px 50px;
			-moz-background-size: 50px 50px;
			-webkit-animation: move 2s linear infinite;
			   -webkit-border-top-right-radius: 8px;
			-webkit-border-bottom-right-radius: 8px;
			       -moz-border-radius-topright: 8px;
			    -moz-border-radius-bottomright: 8px;
			           border-top-right-radius: 8px;
			        border-bottom-right-radius: 8px;
			    -webkit-border-top-left-radius: 20px;
			 -webkit-border-bottom-left-radius: 20px;
			        -moz-border-radius-topleft: 20px;
			     -moz-border-radius-bottomleft: 20px;
			            border-top-left-radius: 20px;
			         border-bottom-left-radius: 20px;
			overflow: hidden;
		}
		
		.animate > span:after {
			display: none;
		}
		
		@-webkit-keyframes move {
		    0% {
		       background-position: 0 0;
		    }
		    100% {
		       background-position: 50px 50px;
		    }
		}
		
		.orange > span {
			background-color: #f1a165;
			background-image: -moz-linear-gradient(top, #f1a165, #f36d0a);
			background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #f1a165),color-stop(1, #f36d0a));
			background-image: -webkit-linear-gradient(#f1a165, #f36d0a); 
		}
		
		.red > span {
			background-color: #f0a3a3;
			background-image: -moz-linear-gradient(top, #f0a3a3, #f42323);
			background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #f0a3a3),color-stop(1, #f42323));
			background-image: -webkit-linear-gradient(#f0a3a3, #f42323);
		}
		
		.nostripes > span > span, .nostripes > span:after {
			-webkit-animation: none;
			background-image: none;
		}
	</style>


<?php
	$checkEmail	=	true;
	$checkUname	=	true;
?>			
		<script type="text/javascript">
			function validate_form(step) {
				//if(skip)
				//return true;
				var error 		= '';
				var id 			= '';
				var error_flag 	= 0;
				try {
					switch (step) {
						case 1:
							// if( !empty_field_check('person_name') ) { id = 'person_name'; throw 'Please enter Name'; } else { $('#person_name').removeClass('error'); }
							// if( !empty_field_check('username') ) { id = 'username'; throw 'Please enter username'; }
							// if( jQuery('#username').val().length < 4 ) { id = 'username'; throw 'Username should be atleast 4 characters'; }
							// if( !empty_field_check('re_username') ) { id = 're_username'; throw 'Please enter Confirm username'; } else { $('#re_username').removeClass('error'); }
							// if( jQuery('#username').val() != jQuery('#re_username').val() ) { id = 're_username'; throw 'Both usernames do not match'; } else { $('#re_username').removeClass('error'); }
							// if( !validate_email(jQuery('#email').val()) ) { id = 'email'; throw 'Email address is invalid'; }
							// if( !validate_email(jQuery('#re_email').val()) ) { id = 're_email'; throw 'Confirm Email address is invalid'; } else { $('#re_email').removeClass('error'); }
							// if( jQuery('#email').val() != jQuery('#re_email').val() ) { id = 're_email'; throw 'Both email addresses do not match'; } else { $('#re_email').removeClass('error'); }
							// if( jQuery('#password').val().length < 8 ) { id = 'password'; throw 'Password should be atleast 8 characters long'; } else { $('#password').removeClass('error'); }
							// if( jQuery('#re_password').val().length < 8 ) { id = 're_password'; throw 'Confirm Password should be atleast 8 characters long'; } else { $('#re_password').removeClass('error'); }
							// if( jQuery('#password').val() != jQuery('#re_password').val() ) { id='re_password'; throw 'Both passwords do not match'; } else { $('#re_password').removeClass('error'); }
						break;
						case 2:
						break;
						case 3:
						break;
						case 4:
						break;
					}

					$.each($('#step_' + step + ' .error'), function(i, n) {
						$(this).focus();
						error_flag = 1;
						return false;
					});
					if( error_flag == 1 ) { return false; }
					if(step == 1){
						_bp_ajax_register_();

						return true;
					}
					jQuery('#error_message_div').hide();
					return true;
				} catch(e) {
					if( ! skip )
					jQuery('#error_message_div').show();
					jQuery('#error_message').html(e);
					jQuery('#' + id).focus();
					jQuery('#' + id).addClass('error');
					return false;
				}
			}


		function animate_progress_bar(from,to)
		{
			$(function() {
			$(".meter > span").each(function() {
				$(this)
					.data("origWidth", $(this).width())
					.width(from)
					.animate({
						width: to
					}, 1200);
				});
			});
		}

		function get_next_question()
			{
				$('#registration_loader_div').show();
					var response = jQuery.ajax({
					type : "POST",
					data : {
						action:'get_next_question',
						user_id:registered_user_id
					},
					
					url: ajaxurl,
					success : function(response) {
							parts = response.split('######');
							$('#step_2').html(parts[0]);
							$('#registration_loader_div').hide();
							eval(parts[1]);
			
					},
					error : function(response) {
						$('#registration_loader_div').hide();
						___something_failed();
					}
				});	
			}


			function get_previous_question()
			{
					$('#registration_loader_div').show();
					var response = jQuery.ajax({
					type : "POST",
					data : {
						action:'get_previous_question',
						user_id:registered_user_id,
					},
					url: ajaxurl,
					success : function(response) {
							parts = response.split('######');
							$('#step_2').html(parts[0]);
							$('#registration_loader_div').hide();
							eval(parts[1]);
					},
					error : function(response) {
						$('#registration_loader_div').hide();
					}
				});	
	
			}

			
			function save_user_answer(question_id,name)
			{	
					$('#registration_loader_div').show();
					var response = jQuery.ajax({
					type : "POST",
					data : {
						action:'save_user_answer',
						user_id:registered_user_id,
						answer:jQuery('input[name='+name+']:checked').val(),
						question_id:question_id
					},
					url: ajaxurl,
					success : function(response) {
							parts = response.split('######');
							$('#step_2').html(parts[0]);
							$('#registration_loader_div').hide();
							eval(parts[1]);
					},
					error : function(response) {
						$('#registration_loader_div').hide();
					}
				});	
			}

			function _bp_ajax_register_() {
				jQuery('#btn_register').hide();
				var response = jQuery.ajax({
					type : "POST",
					data : {
						action:'register_user',
						signup_username: 			jQuery('#username').val().toLowerCase(),
						signup_email: 				jQuery('#email').val(),
						signup_password: 			jQuery('#password').val(),
						signup_password_confirm: 	jQuery('#re_password').val(),
						person_name: 					jQuery('#person_name').val(),
						signup_profile_field_ids:	'1',
						_wpnonce:					'<?php echo wp_create_nonce('bp_new_signup'); ?>',
						_wp_http_referer:			'/register',
						signup_submit:				'submit',
					},
					url: ajaxurl,
					sync: true,
					success : function(response) {
							get_next_question();
			
						if( trim(response) > 0 ) {
							registered_user_id = trim(response);
							// get_next_question();
							jQuery('#btn_register').show();
						} else {
							// $('#step1_nav').click();
						}
					},
					error : function(response) {
						$('#registration_loader_div').hide();
						// jQuery('#btn_register').show();
						// $('#step1_nav').click();
						___something_failed();
					}
				});
			}

			

			var registered_user_id	=	-1;
			var subscriptionHTML	=	"";
			
			
			function add_single_categories(hierarchy, ele)
			{
			}
			
			function ___something_failed() {
				$('#registration_loader_div').hide();
				alert('Sorry, something went wrong, please try again later');
			}
			function go_to_next_step(){
				$('#step4_nav').click();
			}
			

			var	ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?> ' ;


			function MBT_check_useremail_availability(val) {	
				$('#email_loading').css('display', 'inline-block');
				$('#email_valid').hide();
				$('#email_invalid').hide();
				jQuery.ajax({
					type: "GET",
					data : {
						email: 	val,
					},
					url: "<?php echo plugins_url(); ?>/TE_ajax/checkregister.php",
					async: true,
					dataType: 'json',
					success : function(response) {
						try {
							if( response.email.status == 1 ) {
								___email_update(1);
							} else {
								___email_update(0);	
							}
						} catch (e) {
							___email_update(0);
						}
					},
					error : function(response) {
						___email_update(0);
					}
				});
			}
			


			function MBT_check_username_availability(val) {

				if (val.indexOf(" ") >= 0) 
				{
					___username_update(0);
					return false;
				}	
				$('#username_loading').css('display', 'inline-block');
				$('#username_valid').hide();
				$('#username_invalid').hide();
				jQuery.ajax({
					type: "GET",
					data : {
						username: 	val,
					},
					url: "<?php echo plugins_url(); ?>/TE_ajax/checkregister.php",
					async: true,
					dataType: 'json',
					success : function(response) {
						try {
							if( response.username.status == 1 ) {
								___username_update(1);
							} else {
								___username_update(0);	
							}
						} catch (e) {
							___username_update(0);
						}
					},
					error : function(response) {
						___username_update(0);
					}
				});
			}			
	
function trim(s)
{
	var l=0; var r=s.length -1;
	while(l < s.length && s[l] == '')
	{	l++; }
	while(r > l && s[r] == ' ')
	{	r-=1;	}
	return s.substring(l, r+1);
}
	</script>
    </head>
    <body>
        <div id="content">
		<?php if( !is_user_logged_in() ) : ?>
			<div style="position:absolute;width:700px;z-index:10000;height:60px;"></div>
			<div id="navigation" style="display:none;">
				<ul>
					<li class="selected">
						<a href="javascript:void(null)" id="step1_nav">
							<div class="div1"><span class="stepTitle">Step 1</span><span class="stepInfo">Basic Information</span></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(null)" id="step2_nav">
							<div class="div1"><span class="stepTitle">Step 2</span><span class="stepInfo">Questionnaires</span></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(null)" id="step3_nav"><div class="div1"><span class="stepTitle">Step 3</span><span class="stepInfo">Confirmation</span></div></a>
					</li>
<!-- 					<li>
						<a href="javascript:void(null)" id="step4_nav">
							<div class="div1"><span class="stepTitle">Step 4</span><span class="stepInfo">Open Your Trade Network</span></div>
						</a>
					</li>
                    <li>
						<a href="javascript:void(null)" id="step5_nav"></a>
					</li>
 -->				</ul>
			</div>
            <div id="wrapper">
                <div id="steps">
                    <!--<form id="signup_form" name="signup_form" action="" method="post" enctype="multipart/form-data" target="tk_upload_frame"> -->
						<div id="error_message_div" style="display:none;position:absolute;margin-top:20px;border:0px solid red;text-align:right;right:0px;padding-right:5px;">
							<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/error.png" alt="" align="top" />
							<span id="error_message" style="color:#ea8999;padding:1px;display:inline-block;"></span>
						</div>
                        <fieldset class="step" id="step_1">
                            <legend>Basic Information</legend>
                            <p>
                                <label for="person_name">Name</label>
                                <input id="person_name" type="text" autocomplete=off value="" />
                            </p>
                            <p>
                                <label 	for="username">Username</label>
                                <input	id="username" onblur="this.value = this.value.toLowerCase();__username_blur(this.value);" placeholder="Username" value="<?php echo $_GET["uname"]?>" required pattern="^\s*([a-z0-9]+)\s*$" />
								<span 	id="username_loading" style="display:none;padding:7px;padding-bottom:0px !important;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/ajax-loader-black.gif" alt="" /></span>
								<span 	id="username_valid" style="display:none;padding:7px;padding-bottom:0px !important;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/success.png" alt="" /></span>
								<span 	id="username_invalid" title="Not Available" style="display:none;padding:7px;padding-top:4px;padding-bottom:0px !important;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/error.png" alt="" /></span>
                            </p>
							<p>
                                <label for="re_username">Confirm Username</label>
                                <input id="re_username" name="re_username" onblur="this.value = this.value.toLowerCase();jc2t_quick_validate('re_username');" placeholder="Confirm Username" value="<?php echo $_GET["uname"]?>" required pattern="^\s*([a-z0-9]+)\s*$" />
							</p>
                            <p>
                                <label for="email">Email</label>
                                <input id="email" onblur="__email_blur(this.value)" placeholder="Email" pattern='^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$' type="email" autocomplete=off value="<?php echo $_GET["email"]?>" />
								<span  id="email_loading" style="display:none;padding:7px;padding-bottom:0px !important;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/ajax-loader-black.gif" alt="" /></span>
								<span  id="email_valid" style="display:none;padding:7px;padding-bottom:0px !important;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/success.png" alt="" /></span>
								<span  id="email_invalid" title="Not Available" style="display:none;padding:7px;padding-top:4px;padding-bottom:0px !important;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/error.png" alt="" /></span>
                            </p>
							<p>
                                <label for="email">Confirm Email</label>
                                <input id="re_email" name="re_email" onblur="jc2t_quick_validate('re_email');" placeholder="Confirm Email" pattern='^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$' type="email" autocomplete=off value="<?php echo $_GET["email"]?>" />
                            </p>
							<script type="text/javascript">	
								// MBT_check_username_availability(jQuery("#re_username").val());
								// MBT_check_useremail_availability(jQuery("#re_email").val());
								//jc2t_quick_validate('re_username');
								//jc2t_quick_validate('re_email');
								//alert("after ajax");
							</script>
                            <p>
                                <label for="password">Password</label>
                                <input id="password" placeholder="Min 8 Characters" pattern="^(.*?)\S{8}$" type="password" autocomplete=off value="<?php echo $_GET["pass"]?>" />
                            </p>
							<p>
                                <label for="password">Confirm Password</label>
                                <input id="re_password" onblur="jc2t_quick_validate('re_password');" placeholder="Confirm Password" pattern="^(.*?)\S{8}$" type="password" autocomplete=off value="<?php echo $_GET["pass"]?>" />
                            </p>


							<p class="submit">
								<button type="button" onclick="jQuery('body').parent().scrollTop(0); window.scrollTo(0,0); $('#step2_nav').click();" class="btn">Next</button>
                            </p>
                        </fieldset>
                        
						
						<fieldset class="step" id="step_2">
                            <legend>Questions</legend>
                            <div id="registration_loader_div" style="display:none;text-align:center;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/big-ajax-loader-black.gif" alt="" /></div>
							<p class="submit">
                                <!-- <button type="button" onclick="jQuery('body').parent().scrollTop(0); window.scrollTo(0,0); $('#step1_nav').click();" class="btn">Previous</button> -->

								<button id="btn_register" type="button" onclick="jQuery('body').parent().scrollTop(0); window.scrollTo(0,0); $('#step3_nav').click();" class="btn">Next</button>
								<!--/*$('#step3_nav').click();*/ -->
                            </p>
                        </fieldset>

                        <fieldset class="step" id="step_3">
	                        <legend>Confirm Your Email Address</legend>
                            <p>
								Thanks for signing up on our site! We just sent you a confirmation email to you/ <b id="bold_email"></b>.
								<br/><br/>
                            	Click on the confirmation link in the email to complete your sign up.
								<br/><br/>
								<span style="color:#FA9B05; font-weight:bold;">Please check your spam folders for your activation email if it is not in your inbox and permanently unblock jc2t.com as spam. This will benefit you by having multiple buy and sell updates to your trades.</span>
                            </p>
							<br style="clear:both;" />
                            <p class="submit">
								<span id="confirm_span"></span>
                                <button type="button" onclick="parent.window.location = '<?php echo get_bloginfo('url'); ?>';" class="btn">Done</button>
								<br style="clear:both;" />
                            </p>
							<br style="clear:both;" />
                        </fieldset>
                    <!--</form> -->
                </div>
            </div>
			<iframe frameborder="0" id="tk_upload_frame" name="tk_upload_frame" style="display:none;"></iframe>
		<?php else : ?>
			<div>You are already logged in. Want to <a href="<?php echo wp_logout_url(); ?>" target="_top">logout?</a></div>
		<?php endif; ?>
        </div>
    </body>
</html>
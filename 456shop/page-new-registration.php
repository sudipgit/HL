
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Fancy Sliding Form with jQuery</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/css/style.css" type="text/css" media="screen"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/sliding.form.js"></script>
        <script type="text/javascript" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/jc2t.registration.js"></script>
		<script>
			var skip	=	false;
			jQuery(document).ready(function (){
				jQuery('.raf_done_btn').click(function (){$('#step5_nav').click();is_invitationSendToFriends();});
			});
		</script>
		<style>
			.showCheckbox{
				display:block !important;
			}
			.hideCheckbox{
				display:none !important;
			}
		</style>
		<?php
			if(isset($_SESSION['isPaymentMade']) && isset($_GET['user_id'] ) )
			{
				
				global $wpdb;
				$user_id	=	$_GET['user_id'];	
				$query		=	"SELECT value FROM wp_bp_xprofile_fields f ,wp_bp_xprofile_data d WHERE name='Founder' AND f.id=d.field_id AND user_id=$user_id";
				$founder	=	$wpdb->get_var($query);
				$query		=	"SELECT  user_email FROM wp_users WHERE ID=$user_id";
				$email		=	$wpdb->get_var($query);
		?>
		<script type="text/javascript">
			jQuery(document).ready(function (){
				var iframe_source 	= jQuery("#raf_iframe").attr("src");
				iframe_source 		= iframe_source + '&email=' + "<?php echo $email?>"+ ' &founder='+ "<?php echo $founder?>";
				//alert(iframe_source);
				jQuery("#raf_iframe").attr("src",iframe_source);
				$('#step4_nav').click();
			});
		</script>
		<?php
			}
			if($_GET["paymentfailure"])
			{
				$user_id	=	$_GET["user_id"];
				global $wpdb;
				$query		=	"SELECT value FROM wp_bp_xprofile_fields f ,wp_bp_xprofile_data d WHERE name='Founder' AND f.id=d.field_id AND user_id=$user_id";
				$founder	=	$wpdb->get_var($query);
				$query		=	"SELECT  user_email FROM wp_users WHERE ID=$user_id";
				$email		=	$wpdb->get_var($query);
		?>
				<script type="text/javascript">
					jQuery(document).ready(function (){
					
					jQuery("#email").val("<?php echo $email;?>");
					set_button_info();
					var iframe_source 	= jQuery("#raf_iframe").attr("src");
					iframe_source 		= iframe_source + '&email=' + "<?php echo $email?>"+ ' &founder='+ "<?php echo $founder?>";
					//alert(0);
					jQuery("#raf_iframe").attr("src",iframe_source);
					jQuery('.raf_done_btn').click(function (){$('#step5_nav').click();is_invitationSendToFriends();});
					get_subscription_html(<?php echo $user_id ?>);
					$('#step_subscription_nav').click();
					jQuery('#error_message_div').hide();
					/*jQuery("#payment_error").show();*/
				});
				</script>
		<?php
			}
			if($_POST["TransactionID"])
			{
				$data		=	explode(":",$_POST['MerchantData']);
				$user_id	=	$data[0];
				$sub_id		=	$data[1];
				$amount 	= 	$_POST['Amount'];
				$currency 	= 	$_POST['Currency'];
				$TransactionID 	= 	$_POST['TransactionID'];			
				list($timestamp, $user_id, $sub_id, $key) = explode(':', $_POST['custom']);
				/*
				$algoCharge	=	new AlgochargeGateway();
				$algoCharge->record_transaction($user_id, $sub_id, $amount, $currency, $timestamp, $TransactionID, $_POST['RetCode'], '');
				do_action('membership_payment_processed', $user_id, $sub_id, $amount, $currency, $TransactionID);
				*/
				$member 	= new M_Membership($user_id);
				global $wpdb;
				$query		=	"SELECT value FROM wp_bp_xprofile_fields f ,wp_bp_xprofile_data d WHERE name='Founder' AND f.id=d.field_id AND user_id=$user_id";
				$founder	=	$wpdb->get_var($query);
				$query		=	"SELECT  user_email FROM wp_users WHERE ID=$user_id";
				$email		=	$wpdb->get_var($query);
				if($member) 
				{
		?>		
				<script type="text/javascript">
				skip	=	true;
				jQuery(document).ready(function (){
				jQuery("#email").val("<?php echo $email;?>");
				set_button_info();
				var iframe_source 	= jQuery("#raf_iframe").attr("src");
				iframe_source 		= iframe_source + '&email=' + "<?php echo $email?>"+ ' &founder='+ "<?php echo $founder?>";
				//alert(0);
				jQuery("#raf_iframe").attr("src",iframe_source);
				jQuery('.raf_done_btn').click(function (){$('#step5_nav').click();is_invitationSendToFriends();});
				$('#step4_nav').click();
				jQuery('#error_message_div').hide();
			});
		</script>
		<?php
				}
			}
		if($_GET["return_from_paypal"])
			{
				global $wpdb;
				$user_id	=	$_GET["user_id"];
				$query		=	"SELECT value FROM wp_bp_xprofile_fields f ,wp_bp_xprofile_data d WHERE name='Founder' AND f.id=d.field_id AND user_id=$user_id";
				$founder	=	$wpdb->get_var($query);
				$query		=	"SELECT  user_email FROM wp_users WHERE ID=$user_id";
				$email		=	$wpdb->get_var($query);
				if( $email  )
				{
		?>		
				<script type="text/javascript">
				skip	=	true;
				jQuery(document).ready(function (){
				jQuery("#email").val("<?php echo $email;?>");
				set_button_info();
				var iframe_source 	= jQuery("#raf_iframe").attr("src");
				iframe_source 		= iframe_source + '&email=' + "<?php echo $email?>"+ ' &founder='+ "<?php echo $founder?>";
				//alert(0);
				jQuery("#raf_iframe").attr("src",iframe_source);
				jQuery('.raf_done_btn').click(function (){$('#step5_nav').click();is_invitationSendToFriends();});
				$('#step4_nav').click();
				jQuery('#error_message_div').hide();
			}); 
				</script>
		<?php
				}
			}
			$checkEmail	=	true;
			$checkUname	=	true;
			if( isset($username) && !empty($username) ) {
				if( strlen($username) > 3 ) {
					if( username_exists( $username ) ) {
						$checkUname = false;
					}
				}
				else
					$checkUname = false;
			}
			if( isset($useremail) && !empty($useremail) ) {
				if( is_email($useremail) ) {
					if( email_exists( $useremail ) ) {
						$checkEmail = false;
					}
				}
				else
					$checkEmail = false;
			}	
			if ( ( $checkUname && $checkEmail ))
			{
		?>
			<script type="text/javascript">
			jQuery(document).ready(function (){
				$('#step2_nav').click();
			});
			</script>
		<?php
			}
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
							if( !empty_field_check('username') ) { id = 'username'; throw 'Please enter username'; }
							if( jQuery('#username').val().length < 4 ) { id = 'username'; throw 'Username should be atleast 4 characters'; }
							if( !empty_field_check('re_username') ) { id = 're_username'; throw 'Please enter Confirm username'; } else { $('#re_username').removeClass('error'); }
							if( jQuery('#username').val() != jQuery('#re_username').val() ) { id = 're_username'; throw 'Both usernames do not match'; } else { $('#re_username').removeClass('error'); }
							if( !validate_email(jQuery('#email').val()) ) { id = 'email'; throw 'Email address is invalid'; }
							if( !validate_email(jQuery('#re_email').val()) ) { id = 're_email'; throw 'Confirm Email address is invalid'; } else { $('#re_email').removeClass('error'); }
							if( jQuery('#email').val() != jQuery('#re_email').val() ) { id = 're_email'; throw 'Both email addresses do not match'; } else { $('#re_email').removeClass('error'); }
							if( jQuery('#password').val().length < 8 ) { id = 'password'; throw 'Password should be atleast 8 characters long'; } else { $('#password').removeClass('error'); }
							if( jQuery('#re_password').val().length < 8 ) { id = 're_password'; throw 'Confirm Password should be atleast 8 characters long'; } else { $('#re_password').removeClass('error'); }
							if( jQuery('#password').val() != jQuery('#re_password').val() ) { id='re_password'; throw 'Both passwords do not match'; } else { $('#re_password').removeClass('error'); }
							set_email_field();
							set_button_info();
						break;
						case 3:
						break;
						case 2:
							if( !empty_field_check('company') ) { id = 'company'; throw 'Please enter company'; } else { $('#company').removeClass('error'); }
							if( !empty_field_check('founder') ) { id = 'founder'; throw 'Please enter contact person'; } else { $('#founder').removeClass('error'); }
							//if( !empty_field_check('about_us') ) { id = 'about_us'; throw 'Please enter about us'; } else { $('#about_us').removeClass('error'); }
							//if( !empty_field_check('address') ) { id = 'address'; throw 'Please enter address'; } else { $('#address').removeClass('error'); }
							//if( !empty_field_check('phone_complete') ) { id = 'phone'; throw 'Please enter phone'; } else { $('#phone').removeClass('error'); }
							if( !empty_field_check('phone') ) { id = 'phone'; throw 'Please enter phone'; } else { $('#phone').removeClass('error'); }
							//if( !check_default_products() ) { id = 'product'; throw 'You can only select 8 default products'; } else { $('#product').removeClass('error'); }
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
					if(step == 2){
						_bp_ajax_register_();
						return false;
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
			/*function setScrollBar()
			{
			}*/                                     
			
			function check_default_products()
			{
				var checkboxesTitle		=$("input[name=default_product_title]");
				var count	=	0;
				for(var i=0 ; i<checkboxesTitle.length  ;i++)
				{
					if( checkboxesTitle[i].checked  )
					{
						count++;
						if(count > 8)
						{
							return false;
						}	
					}
				}
				var checkboxesId	=	$("input[name=default_product_id]");
				for(var i=0 ; i<checkboxesId.length  ;i++)
				{
					if( checkboxesId[i].checked  )
					{
						count++;
						if(count > 8)
						{
							return false;
						}	
					}
				}
				return true;
			}
			function set_email_field(){
				var iframe_source = jQuery("#raf_iframe").attr("src");
				iframe_source = iframe_source + '&email=' + document.getElementById('email').value+ ' &founder='+ document.getElementById('founder').value;
				jQuery("#raf_iframe").attr("src",iframe_source);
			}
			
			function set_button_info(){
				document.getElementById('bold_email').innerHTML = document.getElementById('email').value;
				//jQuery("#bold_email").text(jQuery("#email").val());
				var email = document.getElementById('email').value;
				var tmp_split = email.split('@');
				tmp_split = tmp_split[1].split('.');
				var service_provider = tmp_split[0];
				if(service_provider.toLowerCase() == 'gmail'){
					document.getElementById('confirm_span').innerHTML = '<button type="button" onclick="window.open(\'http://www.gmail.com\')" class="btn">Go to Gmail now</button>';
				}
				else if(service_provider.toLowerCase() == 'yahoo'){
					document.getElementById('confirm_span').innerHTML = '<button type="button" onclick="window.open(\'http://www.yahoo.com\')" class="btn">Go to Yahoo now</button>';
				}
				else if(service_provider.toLowerCase() == 'hotmail' || service_provider.toLowerCase() == 'live'){
					document.getElementById('confirm_span').innerHTML = '<button type="button" onclick="window.open(\'http://www.hotmail.com\')" class="btn">Go to Hotmail now</button>';
				}
				else{
					document.getElementById('confirm_span').innerHTML = '';
				}
			}	
			function _bp_ajax_register_() {
				 /*  if ( ! ( jQuery("#terms_conditions").is(":checked")  ))
					{
						alert("Please accept Privacy Policy and Terms Of Use");
						return false;
					}*/
				$('#registration_loader_div').show();
				jQuery('#btn_register').hide();
				var response = jQuery.ajax({
					type : "POST",
					data : {
						signup_username: 			jQuery('#username').val().toLowerCase(),
						signup_email: 				jQuery('#email').val(),
						signup_password: 			jQuery('#password').val(),
						signup_password_confirm: 	jQuery('#re_password').val(),
						field_1: 					jQuery('#company').val(),
						field_2: 					jQuery('#founder').val(),
						field_3: 					jQuery('#about_us').val(),
						field_4: 					jQuery('#email').val(),
						field_5: 					jQuery('#phone_complete').val(),
						field_6: 					jQuery('#address').val(),
						field_7: 					jQuery('#country option:selected').text(),
						signup_profile_field_ids:	'1,2,3,4,5,6,7',
						_wpnonce:					'<?php echo wp_create_nonce('bp_new_signup'); ?>',
						_wp_http_referer:			'/register',
						signup_submit:				'submit',
					},
					url: "<?php echo get_bloginfo('url'); ?>/register/",
					async: true,
					success : function(response) {
						if( $(response).find('#USER__CREATED').val() == 1 ) {
							//alert('Registration successful');
							//add_new_product_ajax_request();
							add_selected_categories();
							//haris edit start
							set_affiliate_ajax_request();
							set_email_slide_ajax_request();
							$('#registration_loader_div').hide();
							//haris edit end
							if( !empty_field_check('file') ) {
								//$('#step4_nav').click();
							}
							else{
								document.signup_form.submit();
							}
							//parent.window.location = '<?php echo get_bloginfo('url'); ?>';
							
						} else {
							$('#registration_loader_div').hide();
							jQuery('#btn_register').show();
							___something_failed();	
						}
					},
					error : function(response) {
						$('#registration_loader_div').hide();
						jQuery('#btn_register').show();
						___something_failed();
					}
				});
			}
			function get_subscription_html(user_id)
			{
				var data = {
					action		:	'subscription_html',
					user_id		:	user_id
				};
				// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
				<?php
				if($_GET['paymentfailure'])
				{
				?>
					
				jQuery.post(ajaxurl+"?paymentfailure=true", data, function(response) {
					subscriptionHTML	=	response;//subscriptionHTML	=	response+"<div style=\"margin-top:30px; clear:both;\"><button type=\"button\" onclick=\"jQuery('body').parent().scrollTop(0); window.scrollTo(0,0); $('#step4_nav').click();\" class=\"btn\">Skip</button></div>";
					$('#subscriptionFieldset').html( subscriptionHTML );
					$('#step_subscription_nav').click();
					//$('#step3_nav').click();  //skip subscription   
				});
				<?php
				}
				else
				{
				?>
					jQuery.post(ajaxurl, data, function(response) {
					subscriptionHTML	=	response;//subscriptionHTML	=	response+"<div style=\"margin-top:30px; clear:both;\"><button type=\"button\" onclick=\"jQuery('body').parent().scrollTop(0); window.scrollTo(0,0); $('#step4_nav').click();\" class=\"btn\">Skip</button></div>";
					$('#subscriptionFieldset').html( subscriptionHTML );
					$('#step_subscription_nav').click();
					//$('#step3_nav').click();  //skip subscription   
				});
				<?php
				}
				?>
				
			}
			function set_affiliate_ajax_request(){
				var data = {
					action		:	'set_affiliate'
				};
				// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
				jQuery.post(ajaxurl, data, function(response) {
					//alert(response);
				});
			}
			
			function is_invitationSendToFriends()
			{
				var data = {
					action		:	'is_invitationSendToFriends',
					email		:	jQuery("#email").val(),
				};
				jQuery.post(ajaxurl, data, function(response) {
					if(jQuery.trim(response) == 'true'){
						//document.getElementById('raf_done_btn').setAttribute('onclick', 'parent.window.location = \'<?php echo get_bloginfo('url'); ?>\';');
						jQuery("button[class=raf_done_btn]").click(function (){
							parent.window.location = '<?php echo get_bloginfo('url'); ?>';
						});
					}
					else{
						alert("Please invite at least "+jQuery.trim(response)+" of your trading friends into your trade network for your free membership");
						$('#step4_nav').click();
					}
				});
			}
			function set_email_slide_ajax_request(){
				var data = {
					action		:	'set_email_slide'
				};
				jQuery.post(ajaxurl, data, function(response) {
					//document.getElementById('raf_done_btn').setAttribute('onclick', '');
					jQuery('button[class=raf_done_btn]').click(function (){});
					if(jQuery.trim(response) == 'false'){
						
						//document.getElementById('raf_done_btn').setAttribute('onclick', '$(\'#step5_nav\').click();is_invitationSendToFriends();');
						jQuery('button[class=raf_done_btn]').click(function (){$('#step5_nav').click();is_invitationSendToFriends();});
					}
					else{
						//document.getElementById('raf_done_btn').setAttribute('onclick', 'parent.window.location = \'<?php echo get_bloginfo('url'); ?>\';');
						jQuery('button[class=raf_done_btn]').click(function (){ parent.window.location = '<?php echo get_bloginfo('url'); ?>'; });
					}
				});
			}
			var registered_user_id	=	-1;
			var subscriptionHTML	=	"";
			function add_new_product_ajax_request()
			{
				var data = {
					action					:	'add_new_product',
					products_add_to_db		:	jQuery('#products_add_to_db').val(),
					new_products_added		:	jQuery('#new_products_added').val(),
					email					:	jQuery('#email').val(),
					defaultProductsTitles	:	getDefaultProducts('default_product_title'),
					defaultProductsIds		:	getDefaultProducts('default_product_id'),
				};
				// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
				jQuery.post(ajaxurl, data, function(response) {
					registered_user_id	=	response;
					get_subscription_html(registered_user_id);
				});
			}
			
			function add_selected_categories()
			{
				var data = {
					action					:	'add_categories',
					cats_ids				:	jQuery('#cats_ids').val(),
					email					:	jQuery('#email').val(),
				};
				// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
				jQuery.post(ajaxurl, data, function(response) {
					registered_user_id	=	response;
					get_subscription_html(registered_user_id);
				});
			}
			
			function add_single_categories(hierarchy, ele)
			{
				if(IsDuplicate(hierarchy))
				{
					jQuery("#list_products").show();
					//var btn	='<input id="remove_product" onclick="__remove_cat(\''+span_id+'::'+hierarchy+'\');" type="image" src="http://jc2t.local/wp-content/themes/parallelus-salutation/jc2t-slider-form/images/minus.png" alt="Remove" style="height:7px;width:7px;padding:7px;padding-bottom:0px !important;margin-left:5px;margin-right:5px" />';
					var btn	='<a id="remove_product" href="javascript:void(null);" onclick="__remove_cat(\''+span_id+'::'+hierarchy+'\');" alt="Remove" style="float:right; text-decoration:none; color:red; font-weight:bold;">X</a><div style="clear:both;"></div>';
					cat_name = jQuery(ele).parent().children('.category_row_text').html();
					jQuery("#list_products").append("<div class='category_row' id='span_"+span_id+"'><div class='category_row_text'>"+cat_name+"</div>"+btn+"</div>");	
					document.getElementById("cats_ids").value	=	document.getElementById("cats_ids").value + ";"+hierarchy;
					span_id++;
					/*var data = {
						action					:	'add_categories',
						cats_ids				:	jQuery('#cats_ids').val(),
						email					:	jQuery('#email').val(),
					};
					// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
					jQuery.post(ajaxurl, data, function(response) {
						var btn	='<input id="remove_product" onclick="__remove_cat(\''+span_id+'::'+hierarchy+'\');"  type="image" src="http://jc2t.local/wp-content/themes/parallelus-salutation/jc2t-slider-form/images/minus.png" alt="Remove" style="height:7px;width:7px;padding:7px;padding-bottom:0px !important;margin-left:5px;margin-right:5px" />';
							jQuery("#list_products").append("<span id='span_"+span_id+"'>"+btn+cat_name+"<br/></span>");	
							document.getElementById("cats_ids").value	=	document.getElementById("cats_ids").value + ";"+hierarchy;
							span_id++;
					});*/
				}	
			}
			
			function ___something_failed() {
				$('#registration_loader_div').hide();
				alert('Sorry, something went wrong, please try again later');
			}
			function go_to_next_step(){
				$('#step4_nav').click();
			}
			
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
		/*   Attach products to profile   #Rashid*/	
			function show_adbtn()
			{
				if( $("#product").val().length == 0 )
					$("#add_product").hide();
				else
					$("#add_product").show();
			}
			function __remove_product(id)
			{
				var mySplitResult = $("#new_products_added").val().split(",");
				var flag	=	false;
				var idsStr	=	"";
				for( var i =0 ; i<mySplitResult.length ; i++ )
				{		
					if( mySplitResult[i] != id  )
					{
						idsStr	=	idsStr	+	"," + mySplitResult[i] ;
					}	
				}
				$("#span_"+id).remove();
				document.getElementById("new_products_added").value	=	idsStr;
				checkboxCount--;
				showCheckBoxes();
			}
			function __remove_new_product(id)
			{
				idParts	=	id.split(":");
				var mySplitResult = $("#products_add_to_db").val().split(":");
				var flag	=	false;
				var idsStr	=	"";
				for( var i =0 ; i<mySplitResult.length ; i++ )
				{		
					if( mySplitResult[i] != idParts[1]  )
					{
						idsStr	=	idsStr	+	":" + mySplitResult[i] ;
					}	
				}
				//alert("#span_"+idParts[0]);
				$("#span_"+idParts[0]).remove();
				document.getElementById("products_add_to_db").value	=	idsStr;
				checkboxCount--;
				showCheckBoxes();
			}
			
			var span_id	=	0;
			var checkboxCount	=	0;	
			
			function __add_product()
			{
				if( $("#product").val().length == 0	 ) 
				return ;
				
				if( $("#temp_product_id").val().length == 0	 ) 
				{
					var mySplitResult = $("#products_add_to_db").val().split(":");
					var flag	=	false;
					
					for( var i=0 ; i<mySplitResult.length ; i++ )
					{		
						if( mySplitResult[i] == $("#product").val()  && mySplitResult[i].length!=0  && $("#product").val().length!= 0 ) 
						{
							flag	=	true;
							break;
						}	
					}
					if( flag  )
					{
						alert("Already in new product list!!!");
					}
					else 
					{
						checkboxCount++;
						document.getElementById("products_add_to_db").value	=	document.getElementById("products_add_to_db").value + ":"+$("#product").val(); 				
						var btn	='<input id="remove_product" onclick="__remove_new_product(\''+span_id+":"+$("#product").val()+'\');"  type="image" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/minus.png" alt="Send me" style="height:7px;width:7px;padding:7px;padding-bottom:0px !important;margin-left:5px;margin-right:5px" />';
						var checkbox = '<input style="width:50px;" type="checkbox" name="default_product_title" value="'+$("#product").val()+'"  />';
						$("#list_products").append("<span id='span_"+span_id+"'>"+$("#product").val()+btn+checkbox+"<br/></span>");	
						showCheckBoxes();
						span_id++;
					}	
				}
				else 
				{
					var flag	=	false;
					var mySplitResult = $("#new_products_added").val().split(",");
					for( var i=0 ; i<mySplitResult.length ; i++ )
					{		
						if( mySplitResult[i] == $("#temp_product_id").val()  && mySplitResult[i].length!=0  && $("#temp_product_id").val().length!= 0 ) 
						{
							//alert( mySplitResult[i] );
							flag	=	true;
							break;
						}	
					}
					if( flag  )
					{
						alert("Already exist!!!");
					}
					else 
					{	
						checkboxCount++;
						document.getElementById("new_products_added").value	= document.getElementById("new_products_added").value+","+$("#temp_product_id").val();
						var btn	='<input id="remove_product" onclick="__remove_product('+$("#temp_product_id").val()+');"  type="image" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/minus.png" alt="Send me" style="height:7px;width:7px;padding:7px;padding-bottom:0px !important;margin-left:5px;margin-right:5px;" />';
						var checkbox = '<input style="width:50px;" type="checkbox" name="default_product_id" value="'+$("#temp_product_id").val()+'" />';
						$("#list_products").append("<span id='span_"+$("#temp_product_id").val()+"'>"+$("#product").val()+btn+checkbox+"<br/></span>");	
						showCheckBoxes();
					}
				}
				document.getElementById("product").value	=	"";
				document.getElementById("temp_product_id").value	=	"";
			}
			var	ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?> ' ;

			function add_new_product()
			{
				var data = {
						action: 'add_new_product',
					};
					jQuery.post(ajaxurl, data, function(response) {
						//alert('Got this from the server: ' + response);
					});
			}
			function getDefaultProducts(name)
			{
				var checkboxes		=$("input[name="+name+"]");
				var count	=	0;
				var defaultproducts	=	"";
				if( checkboxCount < 9 )
				{	
					for(var i=0 ; i<checkboxes.length  ;i++)
					{
						checkboxes[i].checked	=	true;
					}
				}
				for(var i=0 ; i<checkboxes.length  ;i++)
				{
					if( checkboxes[i].checked  )
					{
						defaultproducts	=	defaultproducts +":"+checkboxes[i].value;
					}
				}
				return defaultproducts;
			}
			
			function showCheckBoxes()
			{
				if( checkboxCount > 8 )
				{
					jQuery("input[name=default_product_title]").removeClass("hideCheckbox");
					jQuery("input[name=default_product_id]").removeClass("hideCheckbox");
				}
				else
				{
					jQuery("input[name=default_product_title]").addClass("hideCheckbox");
					jQuery("input[name=default_product_id]").addClass("hideCheckbox");
				}
			}
		function categorySelectedFilter(){
			jQuery("#addCatbtn").css("display","none");
			var parent_cat_id = jQuery('#filter_post_catagory').val();
			parent_cat	=	parent_cat_id;
			jQuery('#filter_post_catagory option' ).each(function(){
				if(	jQuery('#filter_post_catagory').val()	==	jQuery(this).val())
				{
					parent_name	=	jQuery(this).text();
					//alert(parent_name);
				}
			});	
	
			if(parent_cat_id == ""){
				var cat_width = jQuery('#filter_post_catagory').width()+12;
				jQuery('#categories_box_inside').width(cat_width+'px');
				for(i=1;i<6;++i){
					jQuery('#filter_post_catagory_child_'+i).html('<option selected="selected" value="">Select Sub Category</option>');
					jQuery('#filter_post_catagory_child_'+i).hide();
				}
				return;
			}
	var data = {
		action: 'get_subcategories',
		parent_id: parent_cat_id
	};
	
	jQuery.post(
		ajaxurl,
		data,
		function(response) {
			var cat_width = jQuery('#filter_post_catagory').width()+12;
			if(response != ""){
				jQuery('#filter_post_catagory_child_1').html('<option selected="selected" value="">Select Sub Category</option>'+response);
				jQuery('#filter_post_catagory_child_1').show();
				cat_width += jQuery('#filter_post_catagory_child_1').width()+22;
				jQuery('#categories_box_inside').width(cat_width+'px');
			}
			else{
				jQuery('#filter_post_catagory_child_1').html('<option selected="selected" value="">Select Sub Category</option>');
				jQuery('#filter_post_catagory_child_1').hide();
				jQuery('#categories_box_inside').width(cat_width+'px');
			}
			for(i=2;i<6;++i){
				jQuery('#filter_post_catagory_child_'+i).html('<option selected="selected" value="">Select Sub Category</option>');
				jQuery('#filter_post_catagory_child_'+i).hide();
			}
			set_scroll_left(cat_width);
		}
	);
}
	
function subcategorySelected(no){
	var parent_cat_id = jQuery('#post_catagory_child_'+(no-1)).val();
	if(parent_cat_id == ""){
		for(i=no;i<6;++i){
			jQuery('#post_catagory_child_'+i).html('<option selected="selected" value="">Select Sub Category</option>');
			jQuery('#post_catagory_child_'+i).hide();
		}
		return;
	}
	var data = {
		action: 'get_subcategories',
		parent_id: parent_cat_id
	};
	jQuery.post(
		ajaxurl,
		data,
		function(response) {
			response	=	jQuery.trim(response);
			if(response != ""){
				jQuery('#post_catagory_child_'+no).html('<option selected="selected" value="">Select Sub Category</option>'+response);
				jQuery('#post_catagory_child_'+no).show();
			}
			else{
				jQuery('#post_catagory_child_'+no).html('<option selected="selected" value="">Select Sub Category</option>');
				jQuery('#post_catagory_child_'+no).hide();
			}
			for(i=no+1;i<6;++i){
				jQuery('#post_catagory_child_'+i).html('<option selected="selected" value="">Select Sub Category</option>');
				jQuery('#post_catagory_child_'+i).hide();
			}
		}
	);
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

function subcategorySelectedFilter(no){
	jQuery("#addCatbtn").css("display","none");
	var child	=	no-1;
	var parent_cat_id = jQuery('#filter_post_catagory_child_'+(no-1)).val();
	jQuery('#filter_post_catagory_child_'+(no-1)+' option' ).each(function(){
		if(	jQuery('#filter_post_catagory_child_'+(no-1)).val()	==	jQuery(this).val())
		{
			if(child==1)
			cat_name1	=	jQuery(this).text();
			else if(child==2)
			cat_name2	=	jQuery(this).text();
			else if(child==3)
			cat_name3	=	jQuery(this).text();
			else if(child==4)
			cat_name4	=	jQuery(this).text();
			else if(child==5)
			cat_name5	=	jQuery(this).text();
		}	
	});
	
	if(child==1)
	child_cat1		=	parent_cat_id;
	else if(child==2)
	child_cat2		=	parent_cat_id;
	else if(child==3)
	child_cat3		=	parent_cat_id;
	else if(child==4)
	child_cat4		=	parent_cat_id;
	else if(child==5)
	child_cat5		=	parent_cat_id;
	cat_name	=	parent_name+" ";
	
	if(parent_cat_id == ""){
		var cat_width = jQuery('#filter_post_catagory').width()+12;
		for(i=1;i<no;i++){
			cat_width += jQuery('#filter_post_catagory_child_'+(i)).width()+22;
		}
		jQuery('#categories_box_inside').width(cat_width+'px');
		for(i=no;i<6;++i){
			jQuery('#filter_post_catagory_child_'+i).html('<option selected="selected" value="">Select Sub Category</option>');
			jQuery('#filter_post_catagory_child_'+i).hide();
		}
		return;
	}
	var data = {
		action		: 	'get_subcategories',
		parent_id	: 	parent_cat_id
	};
	jQuery.post(
		ajaxurl,
		data,
		function(response) {
			response	=	jQuery.trim(response);
			var cat_width = jQuery('#filter_post_catagory').width()+12;
			var hierarchy	=	"";
				for(i=1;i<=no;i++){
					if(i!=no)
						cat_width += jQuery('#filter_post_catagory_child_'+(i)).width()+22;
					parent_id = jQuery('#filter_post_catagory_child_'+(i)).val();
					hierarchy	+=parent_id+":";		
				}
			
			if(response != ""){
				jQuery('#filter_post_catagory_child_'+no).html('<option selected="selected" value="">Select Sub Category</option>'+response);
				jQuery('#filter_post_catagory_child_'+no).show();
				cat_width += jQuery('#filter_post_catagory_child_'+(no)).width()+22;
				jQuery('#categories_box_inside').width(cat_width+'px');
			}
			else{
				jQuery("#addCatbtn").css("display","block");
				jQuery('#filter_post_catagory_child_'+no).html('<option selected="selected" value="">Select Sub Category</option>');
				jQuery('#filter_post_catagory_child_'+no).hide();
				jQuery('#categories_box_inside').width(cat_width+'px');
			}
			for(i=no+1;i<6;++i){
				jQuery('#filter_post_catagory_child_'+i).html('<option selected="selected" value="">Select Sub Category</option>');
				jQuery('#filter_post_catagory_child_'+i).hide();
			}
			set_scroll_left(cat_width);
		}
	);
}

function set_scroll_left(cat_width){
	categories_box_width = jQuery('#categories_box').width();
	if(cat_width > categories_box_width){
		jQuery('#categories_box').scrollLeft(cat_width-categories_box_width);
	}
	else{
		jQuery('#categories_box').scrollLeft(0);
	}
}

		var parent_cat;
		var child_cat1;
		var child_cat2;
		var child_cat3;
		var child_cat4;
		var child_cat5;
		var span_id	=	0;
		var parent_name	=	"";
		var cat_name	=	"";
		var cat_name1	=	"";
		var cat_name2	=	"";
		var cat_name3	=	"";
		var cat_name4	=	"";
		var cat_name5	=	"";
		
		function addCategory()
		{
			var catArray = new Array();	
			var catNameArray = new Array();
			var cat_name = jQuery('#filter_post_catagory option:selected').text();
			catArray[0]	=	parent_cat;
			catArray[1]	=	child_cat1;
			catArray[2]	=	child_cat2;
			catArray[3]	=	child_cat3;
			catArray[4]	=	child_cat4;
			catArray[5]	=	child_cat5;
			
			catNameArray[0]	=	parent_cat;
			catNameArray[1]	=	cat_name1;
			catNameArray[2]	=	cat_name2;
			catNameArray[3]	=	cat_name3;
			catNameArray[4]	=	cat_name4;
			catNameArray[5]	=	cat_name5;
			//resetVariables();	
			hierarchy	=	parent_cat+':';
			for(i=1 ; i<6 ; i++)
			{
				if(catArray[i])
				{
					if(catArray[i].length!=0)
					{
						hierarchy	+=','+catArray[i];
						if(catArray[i+1] == undefined || catArray[i+1].length==0)
							cat_name +=" <span class='sep'>&raquo</span> <span class='last'>"+catNameArray[i]+"</span>";
						else
							cat_name +=" <span class='sep'>&raquo</span> "+catNameArray[i];
					}
				}	
			}
			var mySplitResult = $("#cats_ids").val().split(";");
			var flag	=	false;
			
			for( var i=0 ; i<mySplitResult.length ; i++ )
			{		
				if( mySplitResult[i] == hierarchy  && mySplitResult[i].length!=0  && hierarchy.length!= 0 ) 
				{
					flag	=	true;
					break;
				}
			}
			if( flag  )
			{
				//alert("Already in new category list!!!");
			}
			else
			{
				jQuery("#list_products").show();
				document.getElementById("cats_ids").value	=	document.getElementById("cats_ids").value + ";"+hierarchy; 				
				//var btn	='<input id="remove_product" onclick="__remove_cat(\''+span_id+"::"+hierarchy+'\');"  type="image" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/minus.png" alt="Send me" style="height:7px;width:7px;padding:7px;padding-bottom:0px !important;margin-left:5px;margin-right:5px" />';
				var btn	='<a id="remove_product" href="javascript:void(null);" onclick="__remove_cat(\''+span_id+"::"+hierarchy+'\');" alt="" style="float:right; text-decoration:none; color:red; font-weight:bold;">X</a><div style="clear:both;"></div>';
				//var checkbox = '<input style="width:50px;" type="checkbox" name="default_product_title" value="'+hierarchy+'"  />';
				$("#list_products").append("<div class='category_row' id='span_"+span_id+"'><div class='category_row_text'>"+cat_name+"</div>"+btn+"</div>");	
				//showCheckBoxes();
				span_id++;
			}
		}
		function __remove_cat(id)
		{
				idParts	=	id.split("::");
				var mySplitResult = $("#cats_ids").val().split(";");
				var flag	=	false;
				var idsStr	=	"";
				for( var i =0 ; i<mySplitResult.length ; i++ )
				{		
					if( mySplitResult[i] != idParts[1]  )
					{
						idsStr	=	idsStr	+	";" + mySplitResult[i] ;
					}	
				}
				$("#span_"+idParts[0]).remove();
				document.getElementById("cats_ids").value	=	idsStr;
		}
	function SearchCats()
	{
		if(jQuery.trim(jQuery('#searchcattext').val()) == "" ){
			alert("Please enter keyword to search");
			jQuery('#searchcattext').focus();
			return;
		}
		var data = {
			action					:	'searchcat',
			searchcattext			:	jQuery('#searchcattext').val(),
		};
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
			jQuery("#cats_results_box").show();
			jQuery("#categories_box_cont").hide();
			jQuery("#cats_results_box").html(response);
		});	
	}
	function IsDuplicate(hierarchy)
	{
		var mySplitResult = $("#cats_ids").val().split(";");
		var flag	=	false;
		for( var i=0 ; i<mySplitResult.length ; i++ )
		{		
			if( mySplitResult[i] == hierarchy  && mySplitResult[i].length!=0  && hierarchy.length!= 0 ) 
			{
				flag	=	true;
				break;
			}
		}
		if( flag  )
		{
			//alert("Already in new category list!!!");
			alert("Product Category already added");
			return false;
		}
		else 
		{
			return true;
		}
	}
	function showSubscriptionForm(amount,sub_id,user_id)
	{
		var data = {
			action		: 	'get_subscriptionForm',
			amount		: 	amount,
			sub_id		: 	sub_id,
			user_id		: 	user_id,
		};
		jQuery.post(
			ajaxurl,
			data,
			function(response) {
				jQuery("#subscriptionFieldset").html(response);
				//$('#step3_nav').click();
			}
		);
	}
	function display_categories_list(){
		jQuery('#cats_results_box').hide();
		jQuery('#categories_box_cont').show();
	}
	function show_categories(){
		if(jQuery('#search_btn').css("display") == "none")
			jQuery('#categories_box_cont, #search_btn, #done_btn').css('display','');
	}
	function hide_categories(){
		jQuery('#categories_box_cont, #search_btn, #done_btn, #cats_results_box').css('display','none');
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
							<div class="div1"><span class="stepTitle">Step 2</span><span class="stepInfo">Profile Details</span></div>
						</a>
					</li>
					<li style="display:none;">
						<a href="javascript:void(null)" id="step3_nav">Confirm</a>
					</li>
					<li>
						<a href="javascript:void(null)" id="step_subscription_nav"><div class="div1"><span class="stepTitle">Step 3</span><span class="stepInfo">Subscription</span></div></a>
					</li>
					<li>
						<a href="javascript:void(null)" id="step4_nav">
							<div class="div1"><span class="stepTitle">Step 4</span><span class="stepInfo">Open Your Trade Network</span></div>
						</a>
					</li>
                    <li>
						<a href="javascript:void(null)" id="step5_nav"></a>
					</li>
				</ul>
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
								MBT_check_username_availability(jQuery("#re_username").val());
								MBT_check_useremail_availability(jQuery("#re_email").val());
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
                            <legend>Profile Details</legend>
                            <p>
                                <label for="company">Company Name</label>
                                <input id="company" type="text" autocomplete=off value="" />
                            </p>
							<p>
                                <label for="founder">Contact Person</label>
                                <input id="founder" type="text" autocomplete=off value="" />
                            </p>
							<div class="row_area">
                                <label for="company">Product Categories</label>
                                <input id="searchcattext" type="text" autocomplete=off value="" onfocus="show_categories();" style="width:150px;" placeholder="Type your category here" />
								&nbsp;&nbsp;<input class="btn1" type="button" value="Search" onclick="SearchCats();" id="search_btn" style="display:none;" />&nbsp;<input class="btn1" type="button" value="Done" onclick="hide_categories();" id="done_btn" style="display:none;" />
								<!--onblur="jQuery('#categories_box').css('display','none')" --> 
                            
								<div id="categories_box_cont" style="display:none">
									<div id="categories_box">
										<div id="categories_box_inside">
											<select size="10" id="filter_post_catagory" onchange="categorySelectedFilter()">
												<option selected="selected" value="">Select Category</option>
											<?php 
												$args=array(
													'orderby' => 'name',
													'order' => 'ASC',
													'parent' => 0,
													'hide_empty' => 0 
												);
												$categories = get_categories($args);
												foreach($categories as $category){
											?>
												<option value="<?php echo $category->cat_ID; ?>"><?php echo $category->cat_name; ?></option>
											 <?php 
												}
											 ?>
											</select>                        
											<select size="10" id="filter_post_catagory_child_1" style="display:none; margin-left:10px;" onchange="subcategorySelectedFilter(2)">
												<option value="">Select Sub Category</option>
											</select>
											<select size="10" id="filter_post_catagory_child_2" style="display:none; margin-left:10px;" onchange="subcategorySelectedFilter(3)">
												<option value="">Select Sub Category</option>
											</select>
											<select size="10" id="filter_post_catagory_child_3" style="display:none; margin-left:10px;" onchange="subcategorySelectedFilter(4)">
												<option value="">Select Sub Category</option>
											</select>
											<select size="10" id="filter_post_catagory_child_4" style="display:none; margin-left:10px;" onchange="subcategorySelectedFilter(5)">
												<option value="">Select Sub Category</option>
											</select>
											<select size="10" id="filter_post_catagory_child_5" style="display:none; margin-left:10px;">
												<option value="">Select Sub Category</option>
											</select>
											<div style="clear:both;"></div>
										</div>
									</div>
									<input id="addCatbtn" style="display:none; color:#FA9B05 !important;" type="button" value="Add" class="btn1" onClick="addCategory();" />
								</div>
								<div id="cats_results_box" style="display:none;">
								</div>
								<div id="list_products" style="display:none;">
									<input id="cats_ids" name="cats_ids"  type="hidden"  />
									<label id="list_cats" style="float:left; text-align:left; width:170px;">Your Product Categories: </label>
									<div style="color:#FA9B05; font-weight:bold; font-size:12px; padding-top:5px;">Click on &ldquo;<span style="color:red;">X</span>&rdquo; symbol to remove product category</div>
								</div>
							</div>
							
							<!--<p>
                                <label for="company">Products</label>
                                <input id="product" type="text" autocomplete=off value=""  onkeydown="show_adbtn();" onkeyup="show_adbtn();"  onblur="show_adbtn();" />
                                <input id="temp_product_id" type="hidden"  />
								<span><input id="add_product" onclick="__add_product();" type="image" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/plus.png" alt="Add" style="height:16px;width:16px;display:none;padding:7px;padding-bottom:0px !important;margin-left:5px;" /> </span>
                            </p>
							<p id="list_products">
								<input id="new_products_added" name="new_products_added"  type="hidden"  />
								<input id="products_add_to_db" name="products_add_to_db" type="hidden"  />
							-->	<!-- <label for="company" id="list_products" >Your Products
								<br/>
								</label> -->
							<!--</p>-->
							
							<p>
                                <label 		for	="about_us">About Us</label>
                                <textarea id="about_us" style="min-width:200px;max-width:200px;min-height:60px;max-height:60px;"></textarea>
                            </p>
							<p>
                                <label for="address">Address</label>
                                <textarea id="address" style="min-width:200px;max-width:200px;min-height:60px;max-height:60px;"></textarea>
                            </p>
							<p>
                                <label for="country">Country</label>
                                <select id="country" onblur="change_phone_prefix(this)" onfocus="change_phone_prefix(this)" onchange="change_phone_prefix(this)">
									<option value="AF_93">Afghanistan</option>
									<option value="AX_358">ALand Islands</option>
									<option value="AL_355">Albania</option>
									<option value="DZ_213">Algeria</option>
									<option value="AS_1">American Samoa</option>
									<option value="AD_376">Andorra</option>
									<option value="AO_244">Angola</option>
									<option value="AI_1">Anguilla</option>
									<option value="AG_1">Antigua And Barbuda</option>
									<option value="AR_54">Argentina</option>
									<option value="AM_374">Armenia</option>
									<option value="AW_297">Aruba</option>
									<option value="AU_61">Australia</option>
									<option value="AT_43">Austria</option>
									<option value="AZ_994">Azerbaijan</option>
									<option value="BS_1">Bahamas</option>
									<option value="BH_973">Bahrain</option>
									<option value="BD_880">Bangladesh</option>
									<option value="BB_1">Barbados</option>
									<option value="BY_375">Belarus</option>
									<option value="BE_32">Belgium</option>
									<option value="BZ_501">Belize</option>
									<option value="BJ_229">Benin</option>
									<option value="BM_1">Bermuda</option>
									<option value="BT_975">Bhutan</option>
									<option value="BO_591">Bolivia</option>
									<option value="BA_387">Bosnia And Herzegovina</option>
									<option value="BW_267">Botswana</option>
									<option value="BR_55">Brazil</option>
									<option value="BN_673">Brunei Darussalam</option>
									<option value="BG_359">Bulgaria</option>
									<option value="BF_226">Burkina Faso</option>
									<option value="BI_257">Burundi</option>
									<option value="KH_855">Cambodia</option>
									<option value="CM_237">Cameroon</option>
									<option value="CA_1">Canada</option>
									<option value="CV_238">Cape Verde</option>
									<option value="KY_1">Cayman Islands</option>
									<option value="CF_236">Central African Republic</option>
									<option value="TD_235">Chad</option>
									<option value="CL_56">Chile</option>
									<option value="CN_86">China</option>
									<option value="CX_618">Christmas Island</option>
									<option value="CC_61">Cocos (Keeling) Islands</option>
									<option value="CO_57">Colombia</option>
									<option value="KM_269">Comoros</option>
									<option value="CG_242">Congo</option>
									<option value="CD_243">Congo, The Democratic Republic Of The</option>
									<option value="CK_682">Cook Islands</option>
									<option value="CR_506">Costa Rica</option>
									<option value="CI_225">Cote D'Ivoire</option>
									<option value="HR_385">Croatia</option>
									<option value="CU_53">Cuba</option>
									<option value="CY_357">Cyprus</option>
									<option value="CZ_420">Czech Republic</option>
									<option value="DK_45">Denmark</option>
									<option value="DJ_253">Djibouti</option>
									<option value="DM_1">Dominica</option>
									<option value="DO_1">Dominican Republic</option>
									<option value="EC_593">Ecuador</option>
									<option value="EG_20">Egypt</option>
									<option value="SV_503">El Salvador</option>
									<option value="GQ_240">Equatorial Guinea</option>
									<option value="ER_291">Eritrea</option>
									<option value="EE_372">Estonia</option>
									<option value="ET_251">Ethiopia</option>
									<option value="FK_500">Falkland Islands (Malvinas)</option>
									<option value="FO_298">Faroe Islands</option>
									<option value="FJ_679">Fiji</option>
									<option value="FI_358">Finland</option>
									<option value="FR_33">France</option>
									<option value="GF_594">French Guiana</option>
									<option value="PF_689">French Polynesia</option>
									<option value="GA_241">Gabon</option>
									<option value="GM_220">Gambia</option>
									<option value="GE_995">Georgia</option>
									<option value="DE_49">Germany</option>
									<option value="GH_233">Ghana</option>
									<option value="GI_350">Gibraltar</option>
									<option value="GR_30">Greece</option>
									<option value="GL_299">Greenland</option>
									<option value="GD_1">Grenada</option>
									<option value="GP_590">Guadeloupe</option>
									<option value="GU_1">Guam</option>
									<option value="GT_502">Guatemala</option>
									<option value="Gg_44">Guernsey</option>
									<option value="GN_224">Guinea</option>
									<option value="GW_245">Guinea-Bissau</option>
									<option value="GY_592">Guyana</option>
									<option value="HT_509">Haiti</option>
									<option value="VA_39">Holy See (Vatican City State)</option>
									<option value="HN_504">Honduras</option>
									<option value="HK_852">Hong Kong</option>
									<option value="HU_36">Hungary</option>
									<option value="IS_354">Iceland</option>
									<option value="IN_91">India</option>
									<option value="ID_62">Indonesia</option>
									<option value="IR_98">Iran, Islamic Republic Of</option>
									<option value="IQ_964">Iraq</option>
									<option value="IE_353">Ireland</option>
									<option value="IM_44">Isle Of Man</option>
									<option value="IL_972">Israel</option>
									<option value="IT_39">Italy</option>
									<option value="JM_1">Jamaica</option>
									<option value="JP_81">Japan</option>
									<option value="JE_44">Jersey</option>
									<option value="JO_962">Jordan</option>
									<option value="KZ_7">Kazakhstan</option>
									<option value="KE_254">Kenya</option>
									<option value="KI_686">Kiribati</option>
									<option value="KP_850">Korea, Democratic People'S Republic Of</option>
									<option value="KR_82">Korea, Republic Of</option>
									<option value="KW_965">Kuwait</option>
									<option value="KG_996">Kyrgyzstan</option>
									<option value="LA_856">Lao People'S Democratic Republic</option>
									<option value="LV_371">Latvia</option>
									<option value="LB_961">Lebanon</option>
									<option value="LS_266">Lesotho</option>
									<option value="LR_231">Liberia</option>
									<option value="LY_218">Libyan Arab Jamahiriya</option>
									<option value="LI_423">Liechtenstein</option>
									<option value="LT_370">Lithuania</option>
									<option value="LU_352">Luxembourg</option>
									<option value="MO_853">Macao</option>
									<option value="MK_389">Macedonia, The Former Yugoslav Republic Of</option>
									<option value="MG_261">Madagascar</option>
									<option value="MW_265">Malawi</option>
									<option value="MY_60">Malaysia</option>
									<option value="MV_960">Maldives</option>
									<option value="ML_223">Mali</option>
									<option value="MT_356">Malta</option>
									<option value="MH_692">Marshall Islands</option>
									<option value="MQ_596">Martinique</option>
									<option value="MR_222">Mauritania</option>
									<option value="MU_230">Mauritius</option>
									<option value="YT_269">Mayotte</option>
									<option value="MX_52">Mexico</option>
									<option value="FM_691">Micronesia, Federated States Of</option>
									<option value="MD_373">Moldova, Republic Of</option>
									<option value="MC_377">Monaco</option>
									<option value="MN_976">Mongolia</option>
									<option value="MS_">Montserrat</option>
									<option value="MA_212">Morocco</option>
									<option value="MZ_258">Mozambique</option>
									<option value="MM_95">Myanmar</option>
									<option value="NA_264">Namibia</option>
									<option value="NR_674">Nauru</option>
									<option value="NP_977">Nepal</option>
									<option value="NL_31">Netherlands</option>
									<option value="NC_687">New Caledonia</option>
									<option value="NZ_64">New Zealand</option>
									<option value="NI_505">Nicaragua</option>
									<option value="NE_227">Niger</option>
									<option value="NG_234">Nigeria</option>
									<option value="NU_683">Niue</option>
									<option value="NF_672">Norfolk Island</option>
									<option value="MP_1">Northern Mariana Islands</option>
									<option value="NO_47">Norway</option>
									<option value="OM_968">Oman</option>
									<option value="PK_92">Pakistan</option>
									<option value="PW_680">Palau</option>
									<option value="PS_970">Palestinian Territory, Occupied</option>
									<option value="PA_507">Panama</option>
									<option value="PG_675">Papua New Guinea</option>
									<option value="PY_595">Paraguay</option>
									<option value="PE_51">Peru</option>
									<option value="PH_63">Philippines</option>
									<option value="PN_872">Pitcairn</option>
									<option value="PL_48">Poland</option>
									<option value="PT_351">Portugal</option>
									<option value="PR_1">Puerto Rico</option>
									<option value="QA_974">Qatar</option>
									<option value="RE_262">Reunion</option>
									<option value="RO_40">Romania</option>
									<option value="RU_7">Russian Federation</option>
									<option value="RW_250">Rwanda</option>
									<option value="SH_290">Saint Helena</option>
									<option value="KN_1">Saint Kitts And Nevis</option>
									<option value="LC_1">Saint Lucia</option>
									<option value="PM_508">Saint Pierre And Miquelon</option>
									<option value="VC_1">Saint Vincent And The Grenadines</option>
									<option value="WS_685">Samoa</option>
									<option value="SM_378">San Marino</option>
									<option value="ST_239">Sao Tome And Principe</option>
									<option value="SA_966">Saudi Arabia</option>
									<option value="SN_221">Senegal</option>
									<option value="CS_381">Serbia And Montenegro</option>
									<option value="SC_248">Seychelles</option>
									<option value="SL_232">Sierra Leone</option>
									<option value="SG_65">Singapore</option>
									<option value="SK_421">Slovakia</option>
									<option value="SI_386">Slovenia</option>
									<option value="SB_677">Solomon Islands</option>
									<option value="SO_252">Somalia</option>
									<option value="ZA_27">South Africa</option>
									<option value="GS_249">South Georgia And The South Sandwich Islands</option>
									<option value="ES_34">Spain</option>
									<option value="LK_94">Sri Lanka</option>
									<option value="SD_249">Sudan</option>
									<option value="SR_597">Suriname</option>
									<option value="SJ_47">Svalbard And Jan Mayen</option>
									<option value="SZ_268">Swaziland</option>
									<option value="SE_46">Sweden</option>
									<option value="CH_41">Switzerland</option>
									<option value="SY_963">Syrian Arab Republic</option>
									<option value="TW_886">Taiwan, Province Of China</option>
									<option value="TJ_992">Tajikistan</option>
									<option value="TZ_255">Tanzania, United Republic Of</option>
									<option value="TH_66">Thailand</option>
									<option value="TL_670">Timor-Leste</option>
									<option value="TG_228">Togo</option>
									<option value="TK_690">Tokelau</option>
									<option value="TO_676">Tonga</option>
									<option value="TT_1">Trinidad And Tobago</option>
									<option value="TN_216">Tunisia</option>
									<option value="TR_90">Turkey</option>
									<option value="TM_993">Turkmenistan</option>
									<option value="TC_1">Turks And Caicos Islands</option>
									<option value="TV_688">Tuvalu</option>
									<option value="UG_256">Uganda</option>
									<option value="UA_380">Ukraine</option>
									<option value="AE_971">United Arab Emirates</option>
									<option value="GB_44">United Kingdom</option>
									<option value="US_1">United States</option>
									<option value="UM_1">United States Minor Outlying Islands</option>
									<option value="UY_598">Uruguay</option>
									<option value="UZ_998">Uzbekistan</option>
									<option value="VU_678">Vanuatu</option>
									<option value="VE_58">Venezuela</option>
									<option value="VN_84">Viet Nam</option>
									<option value="VG_1">Virgin Islands, British</option>
									<option value="VI_1">Virgin Islands, U.S.</option>
									<option value="WF_681">Wallis And Futuna</option>
									<option value="EH_212">Western Sahara</option>
									<option value="YE_967">Yemen</option>
									<option value="ZM_260">Zambia</option>
									<option value="ZW_263">Zimbabwe</option>
								</select>
                            </p>
                            <p>
                                <label for="phone">Phone Number</label>
                                <input type="text" id="prefix_phone" style="width:35px;" onchange="compile_phone_number()" onblur="compile_phone_number()" onfocus="compile_phone_number()" value="+93" /><input type="text" onblur="compile_phone_number()" onfocus="compile_phone_number()" id="phone" style="margin-left:5px;width:148px;" value="" />
								<input type="hidden" id="phone_complete" value="" />
                            </p>
							<p style="display:none;">
                                <label for="phone">Profile Picture</label>
                                <input type="file" 		name="file" id="file" />
								<input type="hidden" 	name="action" value="tk_avatar_upload" />
								<input type="hidden" 	name="tk_signup_email" id="tk_signup_email" value="" />
								<input type="hidden" 	name="tk_signup_username" id="tk_signup_username" value="" />
								<?php wp_nonce_field( 'tk_avatar_upload' ) ?>
                            </p>
							<p class="submit">
                                <button type="button" onclick="jQuery('body').parent().scrollTop(0); window.scrollTo(0,0); $('#step1_nav').click();" class="btn">Previous</button>
								<button id="btn_register" type="button" onclick="jQuery('body').parent().scrollTop(0); window.scrollTo(0,0); $('#step3_nav').click();" class="btn">Register</button>
								<!--/*$('#step3_nav').click();*/ -->
                            </p>
							<br style="clear:both;" />
							<div id="registration_loader_div" style="display:none;text-align:center;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/big-ajax-loader-black.gif" alt="" /></div>
                        </fieldset>
						<fieldset class="step" id="SubscriptionFormContainer">
                            
                        </fieldset>
						<!--
						<fieldset class="step">
                            <legend>Confirm</legend>
							<p>
								<label for="terms_conditions" style="display:block;width:100%" >
								<?php
									$checked	=	"";
									echo $terms_conditions;
									if ($terms_conditions)
									{
										$checked	=	"checked";
									}
								?>
								<input style="width:10px;margin:7px" type="checkbox" data-error-message="Your password should consist of at least four characters." autocomplete="off" tabindex="240" value="1" maxlength="80" name="terms_conditions" id="terms_conditions" <?php echo $checked?> >
								I accept the <a href="http://jc2t.com/privacy-policy" target=_blank >Privacy Policy </a> and <a href="http://jc2t.com/terms" target=_blank>Terms Of Use</a> of JC2T.com</label>
							</p>
							<p>
								Please kindly wait after clicking the "Register" button so the registration process can work.
							</p>
							
							<br style="clear:both;" />
                            <p class="submit">
								<button type="button" onclick="jQuery('body').parent().scrollTop(0); window.scrollTo(0,0); window.scrollTo(0,0); $('#step2_nav').click();" class="btn">Previous</button>
                                <button id="registerButton" type="button" onclick="jQuery('body').parent().scrollTop(0); window.scrollTo(0,0); _bp_ajax_register_();" class="btn">Register</button>
								<br style="clear:both;" />
                            </p>
							<br style="clear:both;" />
							<div id="registration_loader_div" style="display:none;margin-top: 30px;text-align:center;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/big-ajax-loader-black.gif" alt="" /></div>
                        </fieldset>
						-->
						<fieldset class="step" id="subscriptionFieldset">
						</fieldset>
						<fieldset class="step" id="step_3">
                            <p class="submit">
                                <!--<button type="button" onclick="parent.window.location = '<?php echo get_bloginfo('url'); ?>';" class="btn">Done</button>-->
                                <button class="raf_done_btn btn" type="button" onclick="">Complete Registration</button>
								<!--<button type="button" onclick="$('#step1_nav').click();" class="btn">Previous</button>
								<button type="button" onclick="$('#step3_nav').click();" class="btn">Next</button>-->
                            </p>
							<legend style="margin-bottom:0px;">Invite Friends</legend>
							<iframe id='raf_iframe' style="border:0px;width:100%;height:360px;" src="<?php echo plugins_url(); ?>/recommend-a-friend/inc/raf_form.php?current_url=<?php echo get_bloginfo('url');?>"></iframe>
							<input type="hidden" name="dummy_for_tab" value="" />
							<p class="submit">
                                <!--<button type="button" onclick="parent.window.location = '<?php echo get_bloginfo('url'); ?>';" class="btn">Done</button>-->
                                <button class="raf_done_btn btn" type="button" onclick="">Complete Registration</button>
								<!--<button type="button" onclick="$('#step1_nav').click();" class="btn">Previous</button>
								<button type="button" onclick="$('#step3_nav').click();" class="btn">Next</button>-->
                            </p>
                        </fieldset>
                        <fieldset class="step">
	                        <legend>Confirm Your Email Address</legend>
                            <p>
								Thanks for signing up on JC2T! We just sent you a confirmation email to <b id="bold_email"></b>.
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
			<script type="text/javascript">
				/*var options = {
					script:"<?php //echo get_bloginfo('url'); ?>/wp-admin/admin-ajax.php?json=true&limit=6&action=products_autocomplete&",
					varname:"searchstring",
					json:true,
					shownoresults:false,
					maxresults:6,
					timeout: 5000,
					callback: function (obj) { 
						document.getElementById('temp_product_id').value = obj.id;
						//document.getElementById('postal_codeid').value = obj.id;
					 }
				};
				var as_json = new bsn.AutoSuggest('product', options);*/
			</script>
		<?php else : ?>
			<div>You are already logged in. Want to <a href="<?php echo wp_logout_url(); ?>" target="_top">logout?</a></div>
		<?php endif; ?>
        </div>
    </body>
</html>
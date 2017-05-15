<?php 
$showError	= false;
$post_id    = -1;

// echo "<pre>";
// 	print_r($_REQUEST);
// echo "</pre>";

if($_POST["add_product"])
{	
	// foreach( $_POST as $k => $v )
	// {
	// 	if( empty($v) )
	// 	{	
	// 		$errors["$k"]	=	"This field is required.";
	// 		$showError		=	true;
	// 	}	
	// }
	// if(!$errors)
	// {
		$product_consistency= 	$_POST["product_consistency"];
		$ingredients		= 	$_POST["ingredients"];
		$instructions		= 	$_POST["instructions"];
		$number_of_products	= 	$_POST["number_of_product"];
		$upc_code			= 	$_POST["upc_code"];
		$type_of_product	= 	$_POST["type_of_product"];
		$number_of_ounces	= 	$_POST["number_of_ounces"];
		$user_id				= 	get_current_user_id();
		$post					=	array();	
		$post["post_author"]	= 	$user_id;
		$post["post_title"]		= 	$_POST["name_of_product"];
		
		$post["post_content"]	= 	$_POST["description"];
		$post["post_status"]	= 	"publish";
		$post["post_type"]		= 	"product";
		$post_id				=	wp_insert_post( $post ); 
		//echo "<pre>";
		//print_r($_POST);
		//echo "</pre>";
		
		update_post_meta($post_id, 'product_consistency' , $product_consistency  ); 
		update_post_meta($post_id, 'ingredients' , $ingredients  ); 
		update_post_meta($post_id, 'instructions' , $instructions  ); 
		update_post_meta($post_id, 'upc_code' , $upc_code  ); 
		update_post_meta($post_id, 'type_of_product' , $type_of_product  ); 
		update_post_meta($post_id, 'number_of_ounces' , $number_of_ounces  ); 
		update_post_meta($post_id, 'number_of_products' , $number_of_products  ); 

		
		
		$count			=	0;
		
		// global $bp;
		// $group_slug = $bp->groups->current_group->slug;
		// $cat_id 	= get_category_by_slug( $group_slug );
		// wp_set_post_terms( $post_id,$cat_id->term_id,'category',false );
		update_post_meta($post_id,$group_slug,$group_slug);
		

		if ( $_FILES )
		{
			

			foreach ($_FILES as $file => $array)
			{
						
				$newupload = insert_attachment($file,$post_id,true);
				// print_r($newupload);
				set_post_thumbnail($post_id, $newupload);
			}


			// Get the upload attachment files
			// $files = $_FILES['product_image'];


			// 			print_r($_FILES);

			
			// foreach ($files['name'] as $key => $value)
			// {

			// 		print_r($_FILES);

			// 		$file = array(
			// 			'name' => $files['name'][$key],
			// 			'type' => $files['type'][$key],
			// 			'tmp_name' => $files['tmp_name'][$key],
			// 			'error' => $files['error'][$key],
			// 			'size' => $files['size'][$key]
			// 		);


			// 		$_FILES = array("product_image" => $file);
					
			// }
		}
 	}
 	else if ($_GET['object_id'])
 	{
 		$post_id = $_GET['object_id'] ; 
 	}
 	
get_header(); 

?>
        <link rel="stylesheet" href="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/css/style.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo get_bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" media="screen"/>
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
		<?php
		if($post_id!=-1)
		{

			// echo "Here";exit;
		?>
			<script type="text/javascript">
				// jQuery('body').parent().scrollTop(0); 
				// window.scrollTo(0,0); 
				// alert('Here');
				var registered_user_id	=	-1;
				var subscriptionHTML	=	"";
				skip  = true;
				jQuery(document).ready(function(){
					jQuery('#step2_nav').click();	
					registered_user_id = '<?php echo $post_id ; ?>' ;
					get_next_question();
				});

			</script>
		<?php
		}
		?>
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
			background-image: -moz-linear-gradient(top, #C82F2A, #C82F2A);
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
				
				if(skip)
				return true;
				
				$=jQuery;
				var error 		= '';
				var id 			= '';
				var error_flag 	= 0;
				try {
					switch (step) {
						case 1:
							// if( !empty_field_check('name_of_product') ) { id = 'name_of_product'; throw 'Please enter Name'; } else { $('#name_of_product').removeClass('error'); }
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
				var form = jQuery('#productform');
				console.log( form );
					var response = jQuery.ajax({
					type : "POST",
					data : {
						action:'get_next_question',
						user_id:registered_user_id,
						question_type:'producer',
						formdata : form.serialize()
						
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
						question_type:'producer',
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
					var form = jQuery('#productform');
				
					var response = jQuery.ajax({
					type : "POST",
					data : {
						action:'save_user_answer',
						user_id:registered_user_id,
						answer:jQuery('input[name='+name+']:checked').val(),
						question_id:question_id,
						question_type:'producer',
						formdata : form.serialize()
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
						name_of_product: 					jQuery('#name_of_product').val(),
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
							alert(registered_user_id);
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
<?php $left_sidebar = get_post_meta($post->ID, 'left_sidebar_value', true);?>

		<div id="main" class="wrap post-template sidebar-template <?php if ($left_sidebar){?>left-sidebar-template<?php }?>">
			<div class="container">
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
 			</ul>
			</div>
            <div id="wrapper">
                <div id="steps">
						<div id="error_message_div" style="display:none;position:absolute;margin-top:20px;border:0px solid red;text-align:right;right:0px;padding-right:5px;">
							<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/error.png" alt="error message" align="top" />
							<span id="error_message" style="color:#ea8999;padding:1px;display:inline-block;"></span>
						</div>
                        <fieldset class="step" id="step_1">
                        	<form id="signup_form" name="signup_form" action="" method="post" enctype="multipart/form-data" >
                        	<div style="width:700px;margin:auto">
                            <p>
                                <label for="name_of_product">Name Of Product</label>
                                <input id="name_of_product" name="name_of_product" type="text"  />
                            </p>
                            <p>
                                <label for="type_of_product">Type Of Product</label>
                            </p>
 							<p>
								<label><input type="radio" value="c"    id="type_of_product" name="type_of_product" >Conditioner</label>                          
								<label><input type="radio" value="s"    id="type_of_product" name="type_of_product" >Shampoo</label>                          
								<label><input type="radio" value="hs"  id="type_of_product" name="type_of_product" >Hair Spray</label>                          
								<label><input type="radio" value="g"   id="type_of_product" name="type_of_product" >Gel</label>                          
								<label><input type="radio" value="mt"  id="type_of_product" name="type_of_product" >Moisturizer</label>                     
								<label><input type="radio" value="hc"  id="type_of_product" name="type_of_product" >Hair Color</label>        
								<label><input type="radio" value="o"   id="type_of_product" name="type_of_product" >Oil</label>        
								<label><input type="radio" value="hr"  id="type_of_product" name="type_of_product" >Hair Remover</label>        
 							</p>                           
                            <p>
                                <label for="number_of_ounces">Number Of Ounces</label>
                            </p>
 							<p> 
								<label><input type="radio" value="-3"   name="number_of_ounces" >Less than 3 ounces</label>                          
								<label><input type="radio" value="-5"   name="number_of_ounces" >Less than 5 ounces</label>                          
								<label><input type="radio" value="-8"   name="number_of_ounces" >Less than 8 ounches</label>                          
								<label><input type="radio" value="-10"   name="number_of_ounces" >Less than 10 ounches</label>                          
 							</p>                           
                            <p>
                                <label for="product_consistency">Product Consistency</label>
                            </p>
 							<p> 
								<label><input type="radio" value="pw"   name="product_consistency" >Powder</label>                          
								<label><input type="radio" value="gel"   name="product_consistency" >Gel</label>                          
								<label><input type="radio" value="lq"   name="product_consistency" >Liquid</label>                          
								<label><input type="radio" value="ar"   name="product_consistency" >Aresol</label>                          
 							</p>
                            <p>
                                <label 	for="description">Product Description</label>
                                <textarea name="description" rows="3" cols="15"> </textarea>
                            </p>
							<p>
                                <label 	for="ingredients">Active Ingredients</label>
                                <textarea name="ingredients" rows="3" cols="15"> </textarea>
                            </p>
							<p>
                                <label 	for="instructions">Product Instructions</label>
                                <textarea name="instructions" rows="3" cols="15"> </textarea>
                            </p>
							<p>
                                <label 	for="image">Product Image</label>
                                <input type="file" name="product_image"  >
                            </p>
							<p>
                                <label 	for="number_of_products">Number of Products</label>
                                <input id="number_of_products" name="number_of_products" type="text"  value="" />
                            </p>
							<p>
                                <label 	for="upc_code">Product UPC CODE</label>
                                <input id="upc_code" name="upc_code" type="text"  value="" />
                            </p>
							<p class="submit">
								<input type="submit" name="add_product" value="Add Product"  class="btn">
                            </p>
                        </div>
                    	</form>
                       </fieldset>
                        
						
						<fieldset class="step" id="step_2">
							<div style="width:700px;margin:auto">
                            <div id="registration_loader_div" style="display:none;text-align:center;"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jc2t-slider-form/images/big-ajax-loader-black.gif" alt="ajax loader" /></div>
							<p class="submit">
                                <!-- <button type="button" onclick="jQuery('body').parent().scrollTop(0); window.scrollTo(0,0); $('#step1_nav').click();" class="btn">Previous</button> -->

								<button id="btn_register" type="button" onclick="jQuery('body').parent().scrollTop(0); window.scrollTo(0,0); $('#step3_nav').click();" class="btn">Next</button>
								<!--/*$('#step3_nav').click();*/ -->
                            </p>
                        </div>
                        </fieldset>
                        <fieldset class="step" id="step_3">
                        	<div style="width:700px;margin:auto">
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
							</div>
                        </fieldset>
                    <!--</form> -->
                </div>
            </div>
			<iframe frameborder="0" id="tk_upload_frame" name="tk_upload_frame" style="display:none;"></iframe>
        </div>
	</div>
</div>
        
<?php get_footer(); ?>
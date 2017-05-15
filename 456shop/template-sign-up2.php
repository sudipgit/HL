<?php
/*
   Template Name: Sign-up2 Template

*/
?>


<?php


 $f_post=null;

   if($_POST['is_submit']==1)
   {
   
   //var_dump($_POST);
   //exit;
    if(validate_username($_POST['username']))
	{
	   if(is_email($_POST['email']))
	   {
	        /*  
	           $userdata=array(
                          'user_login'=>$_POST['username'],
                          'first_name'=>$_POST['fname'],
                          'last_name'=>$_POST['lname'],
                          'user_email'=>$_POST['email'],
                          'user_pass'=>$_POST['password']
                         
                          );

                   $user_id=wp_insert_user( $userdata );
      
		
            if($user_id && is_int($user_id))
			{
			
			  add_user_meta( $user_id, 'age', $_POST['age']); 
			  add_user_meta( $user_id, 'customer_bio_info', ''); 
			  add_user_meta( $user_id, 'customer_zip_code', $_POST['zipcode']);
              add_user_meta( $user_id, 'color_hair', $_POST['haircolor']); 			  
			  add_user_meta( $user_id, 'who_are_you', $_POST['whoyou']);  
			   
			   send_activation_link($user_id,$_POST['username']);
			   
			  include_once('brand-admin/templates/functions.php');
			
			  saveUserAns($user_id,$_POST);		
			  
			  
			  
			
			}
	    
		
		*/
		 
	   
	   }
	
	
	}
       
   if($user_id && is_int($user_id))
    {  
        ?>
		<script>
		window.location.href = '<?php bloginfo('url'); ?>/login/';
		</script>
		
	
	<?php	
     }
   else
  {	 
	 $f_post=$_POST;
	 }
	 
   }

?>

<html <?php language_attributes(); ?>>

  <head>

    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />



    <?php

    echo '<title>' ;

    if($disable_seo != 'Disable'):

    	$out = '';

    	$out = $theme_title;

    	

    	$out = str_replace('%blog_title%', get_bloginfo('name'), $out);

    	$out = str_replace('%blog_description%', get_bloginfo('description'), $out);

    	$out = str_replace('%page_title%', wp_title('', false), $out);

    	

    	echo $out;

    else:

    	echo wp_title('', false) . ' | ' . get_bloginfo('name');

    endif;

    echo '</title>';

    

    if($disable_seo != 'Disable') {

        if($keywords):

    	?>

    		<meta name="keywords" content="<?php echo $keywords; ?>">

    	<?php

    	endif;

    

    	if($description):

    	?>

    		<meta name="description" content="<?php echo $description; ?>"> 

    	<?php

    	endif;

    }?>



    <?php if($type_layouts=="responsive"){?><meta name="viewport" content="width=device-width, initial-scale=1.0"><?php }?>

    

    <meta name="author" content="lidplussdesign" />



    <?php get_template_part('includes/google-webfonts' ) ?>

    

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

 <link href="<?php bloginfo('template_url'); ?>/brand-admin/css/custom.css" rel="stylesheet" />	

  

    <?php if($favicon){ ?><link rel="shortcut icon" href="<?php echo $favicon ?>"><?php } ?>  

    <?php if($ipad2_icon){ ?><link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $ipad2_icon ?>"><?php } ?>

    <?php if($iphone2_icon){ ?><link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $iphone2_icon ?>"><?php } ?>

    <?php if($ipad_icon){ ?><link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $ipad_icon ?>"><?php } ?>

    <?php if($iphone_icon){ ?><link rel="apple-touch-icon-precomposed" href="<?php echo $iphone_icon ?>"><?php } ?>

    

    <!-- JS -->

    <?php wp_head(); ?>

    

    <?php get_template_part('includes/fonts') ?>

    <?php get_template_part('includes/color') ?>

    <?php get_template_part('includes/meta-pattern') ?>

    <?php get_template_part('includes/background') ?>

    

	<?php $plugins = get_option('active_plugins');?>

	<?php $required_plugin = 'woocommerce/woocommerce.php';?>

	<?php if ( in_array( $required_plugin , $plugins ) ) {?>

    	<?php get_template_part('includes/styles-shop') ?>

    <?php } ?>

    

    <?php get_template_part('includes/custom_css') ?>
<script>
function clickNext(lval,progress,sw)
{
lval="-"+lval;
val=progress+"%";
$('#panel-content-mb').css({left:lval});
$('#panel-content-mb').css({transition:'left 0.5s linear 0s' });
$('#status-val-mb').css({width:sw });
 document.getElementById('status-val-mb').innerHTML=val;

}

 function formValidation()
  {
  
	  var v1=document.forms["user-register"]["fname"].value;
	  var v2=document.forms["user-register"]["lname"].value;
	  var v6=document.forms["user-register"]["username"].value;
	  var v3=document.forms["user-register"]["email"].value;
	  var p1=document.forms["user-register"]["password"].value;
	  var p2=document.forms["user-register"]["con_password"].value;
	  var v4=document.forms["user-register"]["age"].value;
	  var v5=document.forms["user-register"]["city"].value;
	  var v6=document.forms["user-register"]["zipcode"].value;
	  
	  if(v1=="" || v2=="" || v3=="" || v4=="" || v5=="" || v6=="" || p1=="" || p2=="" || v6=="")
	  {
		  alert('* Field should not be empty');
	         return false;

		  
		  
	  }else if(p1!=p2)
	  {
	  alert('Password Does not match');
         return false;
	  
	  }
	  
	  
	  }


</script>
    
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/sign-up.css" />
</head>

<body class="sign-up">



<div class="mask">
  <div class="user-register">
     
      <div class="box-content">
	    <div class="user-register-mobile">
		<div class="logo pull-left">
			<a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_url');?>/assets/img/HL_Logo_w.png" width="40" alt="Logo" /></a> 
		</div>
		 <div class="logo-text pull-left"><img src="<?php bloginfo('template_url');?>/assets/img/hl_logo_24.png" width="250" alt="Logo" /></div>
		 <div class="house-logo pull-right"><img src="<?php bloginfo('template_url');?>/assets/img/house_logo.png" width="40" alt="Logo" /></div>
		 <div class="clearfix"></div>
		<div class="user-register-mobile-inner">

		  
		    <div class="panel-holder">
			<div class="inner-holder" id="in-h" style="<?php if($f_post) echo 'height: 800px;'; else echo 'height: 400px;';?>">
			 <div id="panel-content-mb" style="visibility: visible; width: 8170px; <?php if($f_post) { echo 'left: -6277px;height:645px;';} else { echo 'left: 0px;height:360px;';}?>">
			 <?php if( !is_user_logged_in() ) {?>
			  <form name="user-register" action="" method="post" onsubmit="return formValidation();">
			    <!-- panel1 Hair Category --> 
                 <div class="panel panel1">
				 <p class="hair-type pink">What is your Hair Style?</p>
				   <div class="question-images">   
				   
					<ul>
					
					  <li>
					   <img alt="Relaxed Straight Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/relaxed_straight_Hairstyle.jpg"/>
					  <label class="hc_style"><input type="radio" name="cat" value="188" <?php if($f_post){ if($f_post['cat']=='188') echo 'checked="checked"';}?> onclick="clickHairType(188);">Straight </label>
					  </li>
					   <li>
					   <img alt="Naturally Curly Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/Naturally_Curly.jpg"/>
					  <label class="hc_style"><input type="radio" name="cat" value="189" <?php if($f_post){ if($f_post['cat']=='189') echo 'checked="checked"';}?> onclick="clickHairType(189);"> Curly </label>
					  </li>
					  <li>
					   <img alt="Braids" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/braids.jpg"/>
					  <label class="hc_style"><input type="radio" name="cat" value="250" <?php if($f_post){ if($f_post['cat']=='250') echo 'checked="checked"';}?> onclick="clickHairType(250);"> Braids </label>
					  </li>	
					  <li>
					   <img alt="Dreds" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/Dreadlocks.png"/>
					  <label class="hc_style"><input type="radio" name="cat" value="179" <?php if($f_post){ if($f_post['cat']=='179') echo 'checked="checked"';}?> onclick="clickHairType(179);"> Dreds </label>
					  </li>
				<div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	 
					<div class="page-number"><img src="<?php bloginfo('template_url');?>/assets/img/1_of_7.png" width="60" alt="Page" /></div>
				 </div> 
	            <!-- panel1 Hair Category End --> 
				
				
				<!-- panel2 Hair Category --> 
                 <div class="panel panel2">
				 <p class="hair-type pink">What is your hair Length?</p>
				   <div class="question-images">
				    <ul>
					  <li>
					   <img src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Very_Short.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="v_short" <?php if($f_post){ if($f_post['hairLenth']=='v_short') echo 'checked="checked"';}?>> Very Short </label>
					  </li>
					  <li>
					   <img src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Short.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="short" <?php if($f_post){ if($f_post['hairLenth']=='short') echo 'checked="checked"';}?>> Short </label>
					  </li>
					  <li>
					   <img src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Medium.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="medium" <?php if($f_post){ if($f_post['hairLenth']=='medium') echo 'checked="checked"';}?>> Medium </label>
					  </li>
					  <li>
					   <img src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Long.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="long" <?php if($f_post){ if($f_post['hairLenth']=='long') echo 'checked="checked"';}?>> Long</label>
					  </li>
					   <li>
					   <img src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Very_Long.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="v_long" <?php if($f_post){ if($f_post['hairLenth']=='v_long') echo 'checked="checked"';}?>>Very Long</label>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	 
				<a href="javascript:void();" class="prev-button" onclick="prev_button(1,455,410,1)" >Back</a>
				<div class="page-number"><img src="<?php bloginfo('template_url');?>/assets/img/2_of_7.png" width="60" alt="Page" /></div>

				 </div> 
	            <!-- panel2 Hair Category End --> 
				
				<!-- panel3 Hair Category --> 
                 <div class="panel panel3">
				 <p class="hair-type pink">What is your Hair Texture?</p>
				   <div class="question-images">
				    <ul>
					  <li id="texture-st">
					   <img alt="1a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/1a.jpg"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="1a" <?php if($f_post){ if($f_post['hairTex']=='1a') echo 'checked="checked"';}?>> 1a <span style="left:10px" class="tool-tip">Hair Type 1a is naturally straight hair and the straightest out of all Hair Types. Since there is no discernible wave, the hair lays flat.</span> </label>
					  </li>
					   <li>
					  <img alt="2a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2a.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="2a" <?php if($f_post){ if($f_post['hairTex']=='2a') echo 'checked="checked"';}?>> 2a <span style="left:-100px" class="tool-tip">Type 2a is gently, slightly "s" waved hair that stays closer to the head. It does not bounce, even when it is layered. 2a hair is  fine, thin and very easy to manage. It is also generally easily to straighten or curl. </span></label>
					  </li>
					   <li>
						<img alt="2b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2b.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="2b" <?php if($f_post){ if($f_post['hairTex']=='2b') echo 'checked="checked"';}?>> 2b <span style="left:-220px" class="tool-tip">The wave or curl forms throughout the hair in the shape of the letter "s". Type 2b hair stays close to the head and does not bounce up, even when it is layered. </span></label>
					  </li>
					  <li>
					   <img alt="2c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2c.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="2c" <?php if($f_post){ if($f_post['hairTex']=='2c') echo 'checked="checked"';}?>> 2c <span style="left:-380px" class="tool-tip">Type 2c is thicker, coarser wavy hair that is composed of a few more actual curls, as opposed to just waves. Type 2c hair tends to be more resistant to styling and will frizz easily. </span></label>
					  </li>
					  <li>
					   <img alt="3a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3a.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="3a" <?php if($f_post){ if($f_post['hairTex']=='3a') echo 'checked="checked"';}?>> 3a <span style="left:10px" class="tool-tip"> Type 3a curls show a definite large loopy "S" pattern. Curls are well-defined and springy. Curls are naturally big, loose and often very shiny.</span></label>
					  </li>
					  <li>
					   <img alt="3b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3b.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="3b" <?php if($f_post){ if($f_post['hairTex']=='3b') echo 'checked="checked"';}?>> 3b <span style="left:-100px" class="tool-tip">People with Type 3b hair have well-defined, springy, copious curls that range from bouncy ringlets to tight corkscrews. 3b curls' circumference are Sharpie size. </span></label>
					  </li>
					  <li>
					   <img alt="3c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3c.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="3c" <?php if($f_post){ if($f_post['hairTex']=='3c') echo 'checked="checked"';}?>> 3c <span style="left:-220px" class="tool-tip">3c hair has voluminous, tight curls in corkscrews, approximately the circumference of a pencil or straw. The curls can be either kinky, or very tightly curled, with lots and lots of strands densely packed together.</span></label>
					  </li>
					  <li>
					   <img alt="4a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4a.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="4a" <?php if($f_post){ if($f_post['hairTex']=='4a') echo 'checked="checked"';}?>> 4a <span style="left:-380px" class="tool-tip">4a is tightly coiled hair that has an "S" pattern. It has more moisture than 4b; it has a definite curl pattern. The circumference of the spirals is close to that of a crochet needle. The hair can be wiry or fine-textured. </span></label>
					  </li>
					  <li>
					   <img alt="4b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4b.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="4b" <?php if($f_post){ if($f_post['hairTex']=='4b') echo 'checked="checked"';}?>> 4b <span style="left:10px" class="tool-tip">Type 4b has a "Z" pattern, less of a defined curl pattern. Instead of curling or coiling, the hair bends in sharp angles like the letter "Z". Type 4 hair has a cotton-like feel.</span></label>
					  </li>
					  <li>
					   <img alt="4c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4c.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="4c" <?php if($f_post){ if($f_post['hairTex']=='4c') echo 'checked="checked"';}?>> 4c <span style="left:-100px" class="tool-tip"> Type 4c hair is composed of curl patterns that will almost never clump without doing a specific hair style. It can range from fine/thin/super soft to wiry/coarse with lots of densely packed strands. 4c hair has been described as a more "challenging" version of 4b hair.</span></label>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	 
				    <a href="javascript:void();" class="prev-button" onclick="prev_button(568,455,410,2)" >Back</a>
					<div class="page-number"><img src="<?php bloginfo('template_url');?>/assets/img/3_of_7.png" width="60" alt="Page" /></div>

				 </div> 
	            <!-- panel3 Hair Category End --> 
				
				<!-- panel4 Hair Category --> 
                 <div class="panel panel4 ">
				 <p class="hair-type pink">What is your Hair processes?</p>
				   <div class="question-images">
				    <ul>
					
					  <li class="process-stli" id="pst-li1">
					   <img alt="Relaxed Straight" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/relaxed_straight.jpg"/>
					  <label class="hc_process"><input type="radio" name="hairProc" value="r_straight" <?php if($f_post){ if($f_post['hairProc']=='r_straight') echo 'checked="checked"';}?>> Relaxed Straight </label>
					  </li>
					   <li class="process-stli" id="pst-li2">
					   <img alt="Naturally Straight" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/relaxed_straight.jpg"/>
					  <label class="hc_process"><input type="radio" name="hairProc" value="r_straight" <?php if($f_post){ if($f_post['hairProc']=='r_straight') echo 'checked="checked"';}?>> Naturally Straight </label>
					  </li>
					 <li class="process-crli" id="pcr-li1">
					   <img alt="Naturally Curly" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/Permed_Curly.jpg"/>
					  <label class="hc_process"><input type="radio" name="hairProc" value="p_curly" <?php if($f_post){ if($f_post['hairProc']=='p_curly') echo 'checked="checked"';}?>> Naturally Curly </label>
					  </li>
					  <li class="process-crli" id="pcr-li2">
					   <img alt="Permed Curly" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/Permed_Curly.jpg"/>
					  <label class="hc_process"><input type="radio" name="hairProc" value="p_curly" <?php if($f_post){ if($f_post['hairProc']=='p_curly') echo 'checked="checked"';}?>> Permed Curly </label>
					  </li>
					  <li id="pn-li" class="hide">
					   
					  <label class="hc_process"><input type="radio" name="hairProc" value="p_curly" <?php if($f_post){ if($f_post['hairProc']=='p_curly') echo 'checked="checked"';}?>> None</label>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	 
				     <a href="javascript:void();" class="prev-button" onclick="prev_button(1120,610,555,3)" >Back</a>
					 <div class="page-number"><img src="<?php bloginfo('template_url');?>/assets/img/4_of_7.png" width="60" alt="Page" /></div>

				 </div> 
	            <!-- panel4 Hair Category End --> 
				
				
				<!-- panel4 Hair Category --> 
                 <div class="panel panel9">
				 <p class="hair-type pink">Is your hair colored ?</p>
				   <div class="question-images">
				    <ul>
					
					  <li>
					   <img alt="Relaxed Straight" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/relaxed_straight.jpg"/>
					  <label class="hc_color"><input type="radio" name="haircolor" value="yes" <?php if($f_post){ if($f_post['haircolor']=='yes') echo 'checked="checked"';}?>> Yes </label>
					  </li>
					   <li>
					   <img alt="Naturally Straight" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/relaxed_straight.jpg"/>
					  <label class="hc_color"><input type="radio" name="haircolor" value="no" <?php if($f_post){ if($f_post['haircolor']=='no') echo 'checked="checked"';}?>> No </label>
					  </li>
					<div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	 
				     <a href="javascript:void();" class="prev-button" onclick="prev_button(1680,455,410,4)" >Back</a>
					 <div class="page-number"><img src="<?php bloginfo('template_url');?>/assets/img/5_of_7.png" width="60" alt="Page" /></div>

				 </div> 
	            <!-- panel4 Hair Category End --> 
				
				
				
				<!-- panel5 Hair Category --> 
                 <div class="panel panel5">
				 <p class="hair-type pink">What is your Hair Conditions?</p>
				   <div class="question-images">
				    <ul>
					  <li >
					   <img alt="Oily Scalp" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Oily_Scalp.jpg"/>
					  <label class="hc_conditions"><input type="checkbox" name="hairCond[]" value="o_scalp" <?php if($f_post){ if($f_post['hairCond']=='o_scalp') echo 'checked="checked"';}?>> Oily Scalp </label>
					  </li>
					  <li class="notall">
					   <img alt="Pattern Baldness" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/pattern_baldness.jpg"/>
					  <label class="hc_conditions"><input type="checkbox" name="hairCond[]" value="p_bald" <?php if($f_post){ if($f_post['hairCond']=='p_bald') echo 'checked="checked"';}?>> Pattern Baldness </label>
					  </li>
					 <li class="notall">
					   <img alt="Alopecia" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/alopecia.jpg"/>
					  <label class="hc_conditions"><input type="checkbox" name="hairCond[]" value="alopecia" <?php if($f_post){ if($f_post['hairCond']=='alopecia') echo 'checked="checked"';}?>> Alopecia </label>
					  </li>
					 <li class="notall">
					   <img alt="Grey Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Grey_Hair.jpg"/>
					  <label class="hc_conditions"><input type="checkbox" name="hairCond[]" value="g_hair" <?php if($f_post){ if($f_post['hairCond']=='g_hair') echo 'checked="checked"';}?>> Grey Hair </label>
					  </li>
					  <li class="notall">
					   <img alt="Split Ends" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Split_Ends.jpg"/>
					  <label class="hc_conditions"><input type="checkbox" name="hairCond[]" value="sp_ends" <?php if($f_post){ if($f_post['hairCond']=='sp_ends') echo 'checked="checked"';}?>> Split Ends/Breakage </label>
					  </li>
					  					  <li>
					   <img alt="Split Ends" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/how-to-get-rid-of-dry-itchy-scalp.jpg" width="120"/>
					  <label class="hc_conditions"><input type="checkbox" name="hairCond[]" value="sp_ends" <?php if($f_post){ if($f_post['hairCond']=='d_slap') echo 'checked="checked"';}?>> Dry Itchy Scalp </label>
					  </li>
					  <li class="notall">
					   
					  <label class="hc_conditions"><input type="checkbox" name="hairCond[]" value="normal" <?php if($f_post){ if($f_post['hairCond']=='normal') echo 'checked="checked"';}?>> Normal</label>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	 
				    <a href="javascript:void();" class="prev-button" onclick="prev_button(2242,455,410,5)" >Back</a>
					 <a style="margin-left:40px;" href="javascript:void();" class="next-button" onclick="nextCond('hairCond[]')" >Next</a>
					 <div class="page-number"><img src="<?php bloginfo('template_url');?>/assets/img/6_of_7.png" width="60" alt="Page" /></div>

				 </div> 
				 
				 
				 
				 
				<!-- panel5 Hair Category --> 
                 <div class="panel panel15 li-block">
				 <p class="hair-type pink">What is Your Hair Description?</p>
				   <div class="question-images">
				    <ul>
					  <li >
					   
					  <label class="hc_descriptions"><input type="checkbox" name="hairDes[]" value="coarse" <?php if($f_post){ if($f_post['hairDes']=='Coarse') echo 'checked="checked"';}?>> Coarse</label>
					  </li>
					   <li >
					  
					  <label class="hc_descriptions"><input type="checkbox" name="hairDes[]" value="soft" <?php if($f_post){ if($f_post['hairDes']=='soft') echo 'checked="checked"';}?>> Soft</label>
					  </li>
					   <li >
					   
					  <label class="hc_descriptions"><input type="checkbox" name="hairDes[]" value="fine" <?php if($f_post){ if($f_post['hairDes']=='fine') echo 'checked="checked"';}?>> Fine</label>
					  </li>
					   <li >
					 
					  <label class="hc_descriptions"><input type="checkbox" name="hairDes[]" value="thin" <?php if($f_post){ if($f_post['hairDes']=='thin') echo 'checked="checked"';}?>> Thin</label>
					  </li>
					 <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	 
				    <a href="javascript:void();" class="prev-button" onclick="prev_button(2800,500,460,6)" >Back</a>
					 <a style="margin-left:40px;" href="javascript:void();" class="next-button" onclick="nextDes()" >Next</a>
					 <div class="page-number"><img src="<?php bloginfo('template_url');?>/assets/img/7_of_7.png" width="60" alt="Page" /></div>

				 </div> 
	          
	          
				
					<!-- panel6 Hair Category --> 
                 <div class="panel panel8 li-block">
				 <p class="hair-type pink">What is your Demographic?</p>
				   <div class="question-images">
				    <ul>
					  <li>
					  <label class="hc_demograph"><input type="radio" name="demogrph" value="Afb" <?php if($f_post){ if($f_post['demogrph']=='Afb') echo 'checked="checked"';}?>> African/ Black </label>
					  </li>
					  <li>
					  <label class="hc_demograph"><input type="radio" name="demogrph" value="Cau" <?php if($f_post){ if($f_post['demogrph']=='Cau') echo 'checked="checked"';}?>> Caucasian </label>
					  </li>
					  <li>
					  <label class="hc_demograph"><input type="radio" name="demogrph" value="Euro" <?php if($f_post){ if($f_post['demogrph']=='Euro') echo 'checked="checked"';}?>> European </label>
					  </li>
					  <li>
					  <label class="hc_demograph"><input type="radio" name="demogrph" value="Spnsh" <?php if($f_post){ if($f_post['demogrph']=='Spnsh') echo 'checked="checked"';}?>> Spanish/Latin </label>
					  </li>
					   <li>
					  <label class="hc_demograph"><input type="radio" name="demogrph" value="Asn" <?php if($f_post){ if($f_post['demogrph']=='Asn') echo 'checked="checked"';}?>> Asian</label>
					  </li>
					    <li>
					  <label class="hc_demograph"><input type="radio" name="demogrph" value="Indn" <?php if($f_post){ if($f_post['demogrph']=='Indn') echo 'checked="checked"';}?>> Indian</label>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	 
				      <a href="javascript:void();" class="prev-button" onclick="prev_button(3360,455,410,6)" >Back</a>
				 </div> 
	            <!-- panel6 Hair Category End --> 
				
				<!-- panel7 Hair Category --> 
                 <div class="panel panel7">
				
				 <div class="reg-info">
				  <p class="hair-type pink">You are one step away from completion </p>
				  <ul>
				  <li>
				   <label>First name<span>*</span>:</label>
				    <input type="text" name="fname" value="<?php if($f_post) echo $f_post['fname'];?>"/>
				  </li>
				  <li>
				   <label>Last name<span>*</span>:</label>
				    <input type="text" name="lname" value="<?php if($f_post) echo $f_post['lname'];?>"/>
				  </li>
				   <li>
				   <label>Username<span>*</span>:</label>
				    <input type="text" name="username" value="<?php if($f_post) echo $f_post['username'];?>"/>
				  </li>
				  <li>
				   <label>Email<span>*</span>:</label>
				    <input type="text" name="email" value="<?php if($f_post) echo $f_post['email'];?>"/>
				  </li>
				  <li>
				   <label>Password<span>*</span>:</label>
				    <input type="password" name="password"/>
				  </li>
				  <li>
				   <label>Confirm Password<span>*</span>:</label>
				    <input type="password" name="con_password"/>
				  </li>
				  <li class="brand-product">
				    <div class="left">
					  <label>Age<span>*</span>:</label>
				     <input type="text" name="age" value="<?php if($f_post) echo $f_post['age'];?>"/>
				   
				    </div>
				   <div class="left last">
				    <label>Gender<span>*</span>:</label>
				    <select name="gender">
					   <option value="male" <?php if($f_post){ if($f_post['gender']=='male') echo 'selected="selected"';}?>>Male</option>
					   <option value="female" <?php if($f_post){ if($f_post['gender']=='female') echo 'selected="selected"';}?>>Female</option>
					   
					</select>
					</div>
					<div class="clear"></div>
				  </li>
				  <li class="city-state">
				    <div class="left">
				      <label>City<span>*</span>:</label>
				      <input type="text" name="city" value="<?php if($f_post) echo $f_post['city'];?>"/>
				     </div>				  
					 <div class="left last">
				        <label>Zip Code<span>*</span>:</label>
						<input type="text" name="zipcode" value="<?php if($f_post) echo $f_post['zipcode'];?>"/>
					</div>
					</li>
					<li>
				
				    <label>State<span>*</span>:</label>
				    <select name="state">
					   <option value="AL" <?php if($f_post){ if($f_post['state']=='AL') echo 'selected="selected"';}?>>Alabama</option>
						<option value="AK" <?php if($f_post){ if($f_post['state']=='AK') echo 'selected="selected"';}?>>Alaska</option>
						<option value="AZ" <?php if($f_post){ if($f_post['state']=='AZ') echo 'selected="selected"';}?>>Arizona</option>
						<option value="AR" <?php if($f_post){ if($f_post['state']=='AR') echo 'selected="selected"';}?>>Arkansas</option>
						<option value="CA" <?php if($f_post){ if($f_post['state']=='CA') echo 'selected="selected"';}?>>California</option>
						<option value="CO" <?php if($f_post){ if($f_post['state']=='CO') echo 'selected="selected"';}?>>Colorado</option>
						<option value="CT" <?php if($f_post){ if($f_post['state']=='CT') echo 'selected="selected"';}?>>Connecticut</option>
						<option value="DE" <?php if($f_post){ if($f_post['state']=='DE') echo 'selected="selected"';}?>>Delaware</option>
						<option value="DC" <?php if($f_post){ if($f_post['state']=='DC') echo 'selected="selected"';}?>>District Of Columbia</option>
						<option value="FL" <?php if($f_post){ if($f_post['state']=='FL') echo 'selected="selected"';}?>>Florida</option>
						<option value="GA" <?php if($f_post){ if($f_post['state']=='GA') echo 'selected="selected"';}?>>Georgia</option>
						<option value="HI" <?php if($f_post){ if($f_post['state']=='HI') echo 'selected="selected"';}?>>Hawaii</option>
						<option value="ID" <?php if($f_post){ if($f_post['state']=='ID') echo 'selected="selected"';}?>>Idaho</option>
						<option value="IL" <?php if($f_post){ if($f_post['state']=='IL') echo 'selected="selected"';}?>>Illinois</option>
						<option value="IN" <?php if($f_post){ if($f_post['state']=='IN') echo 'selected="selected"';}?>>Indiana</option>
						<option value="IA" <?php if($f_post){ if($f_post['state']=='IA') echo 'selected="selected"';}?>>Iowa</option>
						<option value="KS" <?php if($f_post){ if($f_post['state']=='KS') echo 'selected="selected"';}?>>Kansas</option>
						<option value="KY" <?php if($f_post){ if($f_post['state']=='KY') echo 'selected="selected"';}?>>Kentucky</option>
						<option value="LA" <?php if($f_post){ if($f_post['state']=='LA') echo 'selected="selected"';}?>>Louisiana</option>
						<option value="ME" <?php if($f_post){ if($f_post['state']=='ME') echo 'selected="selected"';}?>>Maine</option>
						<option value="MD" <?php if($f_post){ if($f_post['state']=='MD') echo 'selected="selected"';}?>>Maryland</option>
						<option value="MA" <?php if($f_post){ if($f_post['state']=='MA') echo 'selected="selected"';}?>>Massachusetts</option>
						<option value="MI" <?php if($f_post){ if($f_post['state']=='MI') echo 'selected="selected"';}?>>Michigan</option>
						<option value="MN" <?php if($f_post){ if($f_post['state']=='MN') echo 'selected="selected"';}?>>Minnesota</option>
						<option value="MS" <?php if($f_post){ if($f_post['state']=='MS') echo 'selected="selected"';}?>>Mississippi</option>
						<option value="MO" <?php if($f_post){ if($f_post['state']=='MO') echo 'selected="selected"';}?>>Missouri</option>
						<option value="MT" <?php if($f_post){ if($f_post['state']=='MT') echo 'selected="selected"';}?>>Montana</option>
						<option value="NE" <?php if($f_post){ if($f_post['state']=='NE') echo 'selected="selected"';}?>>Nebraska</option>
						<option value="NV" <?php if($f_post){ if($f_post['state']=='NV') echo 'selected="selected"';}?>>Nevada</option>
						<option value="NH" <?php if($f_post){ if($f_post['state']=='NH') echo 'selected="selected"';}?>>New Hampshire</option>
						<option value="NJ" <?php if($f_post){ if($f_post['state']=='NJ') echo 'selected="selected"';}?>>New Jersey</option>
						<option value="NM" <?php if($f_post){ if($f_post['state']=='NM') echo 'selected="selected"';}?>>New Mexico</option>
						<option value="NY" <?php if($f_post){ if($f_post['state']=='NY') echo 'selected="selected"';}?>>New York</option>
						<option value="NC" <?php if($f_post){ if($f_post['state']=='NC') echo 'selected="selected"';}?>>North Carolina</option>
						<option value="ND" <?php if($f_post){ if($f_post['state']=='ND') echo 'selected="selected"';}?>>North Dakota</option>
						<option value="OH" <?php if($f_post){ if($f_post['state']=='OH') echo 'selected="selected"';}?>>Ohio</option>
						<option value="OK" <?php if($f_post){ if($f_post['state']=='OK') echo 'selected="selected"';}?>>Oklahoma</option>
						<option value="OR" <?php if($f_post){ if($f_post['state']=='OR') echo 'selected="selected"';}?>>Oregon</option>
						<option value="PA" <?php if($f_post){ if($f_post['state']=='PA') echo 'selected="selected"';}?>>Pennsylvania</option>
						<option value="RI" <?php if($f_post){ if($f_post['state']=='RI') echo 'selected="selected"';}?>>Rhode Island</option>
						<option value="SC" <?php if($f_post){ if($f_post['state']=='SC') echo 'selected="selected"';}?>>South Carolina</option>
						<option value="SD" <?php if($f_post){ if($f_post['state']=='SD') echo 'selected="selected"';}?>>South Dakota</option>
						<option value="TN" <?php if($f_post){ if($f_post['state']=='TN') echo 'selected="selected"';}?>>Tennessee</option>
						<option value="TX" <?php if($f_post){ if($f_post['state']=='TX') echo 'selected="selected"';}?>>Texas</option>
						<option value="UT" <?php if($f_post){ if($f_post['state']=='UT') echo 'selected="selected"';}?>>Utah</option>
						<option value="VT" <?php if($f_post){ if($f_post['state']=='VT') echo 'selected="selected"';}?>>Vermont</option>
						<option value="VA" <?php if($f_post){ if($f_post['state']=='VA') echo 'selected="selected"';}?>>Virginia</option>
						<option value="WA" <?php if($f_post){ if($f_post['state']=='WA') echo 'selected="selected"';}?>>Washington</option>
						<option value="WV" <?php if($f_post){ if($f_post['state']=='WV') echo 'selected="selected"';}?>>West Virginia</option>
						<option value="WI" <?php if($f_post){ if($f_post['state']=='WI') echo 'selected="selected"';}?>>Wisconsin</option>
						<option value="WY" <?php if($f_post){ if($f_post['state']=='WY') echo 'selected="selected"';}?>>Wyoming</option>
					</select>
					</li>
					 <li>
				    <label>Who are you?<span>*</span>:</label>
				    <select name="whoyou">
					   <option value="Blogger" <?php if($f_post){ if($f_post['whoyou']=='Blogger') echo 'selected="selected"';}?>>Blogger</option>
					   <option value="Hairstylist" <?php if($f_post){ if($f_post['whoyou']=='Hairstylist') echo 'selected="selected"';}?>>Hairstylist</option>
					    <option value="Hair Enthusiast" <?php if($f_post){ if($f_post['whoyou']=='Hair Enthusiast') echo 'selected="selected"';}?>>Hair Enthusiast</option>
						 <option value="Vlogger" <?php if($f_post){ if($f_post['whoyou']=='Vlogger') echo 'selected="selected"';}?>>Vlogger</option>
					</select>
					</div>
					
				
				  </li>
				<div class="clearfix"></div>
				
				</ul>
				<input type="submit" class="button" value="Submit"/>
			
				   <a href="javascript:void();"class="prev-button" onclick="prev_button(3922,455,410,7)" >Back</a>
				 </div> 
	            <!-- panel7 Hair Category End --> 
			
				<div class="clear"></div>
         <input type="hidden" name="is_submit" value="1"/>
			 </form>
			 <?php } else {?>
			 
			 <div>You are already logged in. Want to <a href="<?php echo wp_logout_url(); ?>" target="_top">logout?</a></div>
			 <?php } ?>
			 </div>
			
			
			<!--  <div class="status-bar"><div id="status-val-mb" style="<?php if($f_post) echo 'width:609px';else echo 'width:87px';?>"><?php if($f_post) echo '70%';else echo '10%';?></div></div>-->
			</div>
</div>
<div class="clearfix"></div>

	</div>
	<div class="clearfix"></div>
	</div>
		 
  <script>
  
  function clickHairType(cat)
  {
  lval="-"+568;
$('#panel-content-mb').css({left:lval});
$('#panel-content-mb').css({transition:'left 0.5s linear 0s' });
$('#in-h').css({height:455});
$('#panel-content-mb').css({height:410});

$('#pn-li').addClass('hide');

if(cat==189)
{
$('#texture-st').addClass('hide');

}
else
{

$('#texture-st').removeClass('hide');
}
  
  if(cat==188)
{
$('.process-stli').removeClass('hide');
$('.process-crli').addClass('hide');
//$('.notall').removeClass('hide');
}

 if(cat==189)
{
$('.process-crli').removeClass('hide');
$('.process-stli').addClass('hide');
//$('.notall').removeClass('hide');
}


if(cat==250)
{
$('.process-crli').removeClass('hide');
$('.process-stli').removeClass('hide');
//$('.notall').addClass('hide');
}

if(cat==179)
{
$('.process-crli').addClass('hide');
$('.process-stli').addClass('hide');
  $('#pn-li').removeClass('hide');
 // $('.notall').addClass('hide');
  }
   $('#question-1-nav').removeClass('current');
  $('#question-1-nav').addClass('prevcurrent');
  
   $('#question-2-nav').addClass('current');
  }
  
  /*
$('.hc_style').click(function(){
lval="-"+881;
val=20+"%";
sw=174;
$('#panel-content-mb').css({left:lval});
$('#panel-content-mb').css({transition:'left 0.5s linear 0s' });
$('#status-val-mb').css({width:sw });
$('#in-h').css({height:410});
$('#panel-content-mb').css({height:260});
 document.getElementById('status-val-mb').innerHTML=val;

 var rval=$('input[name=cat]:checked').val();
alert(rval);
});
*/

$('.hc_length').click(function(){
lval="-"+1120;

$('#panel-content-mb').css({left:lval});
$('#panel-content-mb').css({transition:'left 0.5s linear 0s' });
$('#in-h').css({height:610});
$('#panel-content-mb').css({height:555});
 //document.getElementById('status-val-mb').innerHTML=val;
 $('#question-2-nav').removeClass('current');
  $('#question-2-nav').addClass('prevcurrent');

   $('#question-3-nav').addClass('current');
});

$('.hc_texture').click(function(){
lval="-"+1680;
val=40+"%";
sw=348;
$('#in-h').css({height:455});
$('#panel-content-mb').css({height:410});
$('#panel-content-mb').css({left:lval});
$('#panel-content-mb').css({transition:'left 0.5s linear 0s' });
$('#status-val-mb').css({width:sw });
 //document.getElementById('status-val-mb').innerHTML=val;

  $('#question-3-nav').removeClass('current');
  $('#question-3-nav').addClass('prevcurrent');
    $('#question-4-nav').addClass('current');
 });



$('.hc_process').click(function(){
lval="-"+2242;
val=50+"%";
sw=435;
$('#in-h').css({height:455});
$('#panel-content-mb').css({height:410});
$('#panel-content-mb').css({left:lval});
$('#panel-content-mb').css({transition:'left 0.5s linear 0s' });
$('#status-val-mb').css({width:sw });
 //document.getElementById('status-val-mb').innerHTML=val;
 
  $('#question-4-nav').removeClass('current');
  $('#question-4-nav').addClass('prevcurrent');
    $('#question-5-nav').addClass('current');
});

$('.hc_color').click(function(){
lval="-"+2800;
val=50+"%";
sw=435;
$('#in-h').css({height:500});
$('#panel-content-mb').css({height:460});
$('#panel-content-mb').css({left:lval});
$('#panel-content-mb').css({transition:'left 0.5s linear 0s' });
$('#status-val-mb').css({width:sw });
 //document.getElementById('status-val-mb').innerHTML=val;
  $('#question-5-nav').removeClass('current');
  $('#question-5-nav').addClass('prevcurrent');
    $('#question-6-nav').addClass('current');
 
});

function nextCond()
{
var is_valid=0;

 var cboxes = document.getElementsByName('hairCond[]');
   var len = cboxes.length;
       for (var i=0; i<len; i++) {
		if(cboxes[i].checked==true)
			{
				is_valid=1;
			}
		}

if(is_valid==0)
{
alert("Please select conditions");
}
else{



lval="-"+3360;
val=60+"%";
sw=522;
$('#in-h').css({height:455});
$('#panel-content-mb').css({height:410});
$('#panel-content-mb').css({left:lval});
$('#panel-content-mb').css({transition:'left 0.5s linear 0s' });
$('#status-val-mb').css({width:sw });
 //document.getElementById('status-val-mb').innerHTML=val;
 $('#question-6-nav').removeClass('current');
  $('#question-6-nav').addClass('prevcurrent');
    $('#question-7-nav').addClass('current');
	}
}


function nextDes()
{
var is_valid=0;

 var cboxes = document.getElementsByName('hairDes[]');
   var len = cboxes.length;
       for (var i=0; i<len; i++) {
		if(cboxes[i].checked==true)
			{
				is_valid=1;
			}
		}

if(is_valid==0)
{
alert("Please select description");
}
else{
lval="-"+3922;
val=70+"%";
sw=522;
$('#in-h').css({height:455});
$('#panel-content-mb').css({height:410});
$('#panel-content-mb').css({left:lval});
$('#panel-content-mb').css({transition:'left 0.5s linear 0s' });
$('#status-val-mb').css({width:sw });
 //document.getElementById('status-val-mb').innerHTML=val;
 $('#question-7-nav').removeClass('current');
  $('#question-7-nav').addClass('prevcurrent');
    $('#question-8-nav').addClass('current');
}
}


function nextButton(val,h,ch)
{
lval="-"+val;

$('#in-h').css({height:h});
$('#panel-content-mb').css({height:ch});
$('#panel-content-mb').css({left:lval});
$('#panel-content-mb').css({transition:'left 0.5s linear 0s' });
}


$('.hc_demograph').click(function(){
lval="-"+4455;

$('#in-h').css({height:800});
$('#panel-content-mb').css({height:755});
$('#panel-content-mb').css({left:lval});
$('#panel-content-mb').css({transition:'left 0.5s linear 0s' });
 $('#question-7-nav').removeClass('current');
  $('#question-7-nav').addClass('prevcurrent');
   //$('#question-8-nav').addClass('current');

});

function prev_button(val,h,ch,qno)
{
lval="-"+val;
$('#in-h').css({height:h});
$('#panel-content-mb').css({height:ch});
$('#panel-content-mb').css({left:lval});
$('#panel-content-mb').css({transition:'left 0.5s linear 0s' });

cid="#"+"question-"+qno+"-nav";
qno++;
pid="#"+"question-"+qno+"-nav";

$(pid).removeClass('prevcurrent');
$(pid).removeClass('current');

 $(cid).removeClass('prevcurrent');
  $(cid).addClass('current');
 

}



  </script>
  <style>
  #footer
  {
  display:none;
  }
  </style>
<?php get_footer();?>
	
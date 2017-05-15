<?php
/*
   Template Name: Sign-up Template 3

*/
?>
<?php
get_header();

$msg="";

   if($_POST['is_submit']==1)
   {
   /*
   if($_POST['is_captcha']==1)
   {
     $siteKey = "6LcVBv8SAAAAALaKVIKyakLl51jdjHA84cTglZNK";
     $secret = "6LcVBv8SAAAAAATsOMR5B9GrzNLA39xF8NfKGjEe";

    $recaptcha=$_POST['g-recaptcha-response'];
   if(!empty($recaptcha))
   {
    $google_url="https://www.google.com/recaptcha/api/siteverify";
    $ip=$_SERVER['REMOTE_ADDR'];
    $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
     $res=getCurlData($url);
    $res= json_decode($res, true);
    if($res['success'])
     {
          
    if(validate_username($_POST['username']))
	{
	   if(is_email($_POST['email']))
	   {
	          
			$userdata=array(
                          'user_login'=>$_POST['username'],
                          'first_name'=>$_POST['fname'],
                          'last_name'=>$_POST['lname'],
                          'user_email'=>$_POST['email'],
                          'user_pass'=>'12345'
                         
                          );

                   $user_id=wp_insert_user( $userdata );
      
		
            if($user_id && is_int($user_id))
			{
			
			  add_user_meta( $user_id, 'age', $_POST['age']); 
			  add_user_meta( $user_id, 'customer_bio_info', ''); 
			  add_user_meta( $user_id, 'customer_zip_code', $_POST['zipcode']);
              add_user_meta( $user_id, 'color_hair', $_POST['haircolor']); 			  
			  add_user_meta( $user_id, 'who_are_you', $_POST['whoyou']);  
			  add_user_meta( $user_id, 'my_hair_wear', $_POST['hairWear']);  
			   
			   send_activation_link($user_id,$_POST['username'],$_POST['password']);
			   
			  include_once('brand-admin/templates/functions.php');
			
			  saveUserAns($user_id,$_POST);		
			  
			  
			  
			
			} else
	         $msg=getInvalidMessage($_POST['username'],$_POST['email']);
	
	    
		
		
		 
	   
	   }
	   else
	   $msg='Invalid Email';
	
	
	}else
	$msg='Invalid Username';
       
     }
    else
    {
      $msg='Wrong Captcha Key';
     }
    }
    else
    {
     $msg='Confirm The Captcha';
    }
   }
    */   
	
	
          
    if(validate_username($_POST['username']))
	{
	   if(is_email($_POST['email']))
	   {
	          
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
			  add_user_meta( $user_id, 'my_hair_wear', $_POST['hairWear']);  
			   
			   send_activation_link($user_id,$_POST['username'],$_POST['password']);
			   
			  include_once('brand-admin/templates/functions.php');
			
			  saveUserAns($user_id,$_POST);		
			  
			  
			  
			
			} else
	         $msg=getInvalidMessage($_POST['username'],$_POST['email']);
	
	    
		
		
		 
	   
	   }
	   else
	   $msg='Invalid Email';
	
	
	}else
	$msg='Invalid Username';
	
	
   if($user_id && is_int($user_id))
    {  
        ?>
		<script>
		window.location.href = '<?php bloginfo('url'); ?>/login/?r=success';
		</script>
		
	
	<?php	
     }

	 
   }
?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/sign-up3.css" />
	
	<div id="main" class="sign-up wrap" <?php if($_POST['is_submit']==1) echo 'style="background-color: #fdd4ce;"';?>>  
	<?php if($msg!=""){?>
	         <div class="error-popup">
			 <p><?php echo $msg;?></p>
			 <a href="javascript:void();" class="button primary-button">close</a>
			 </div>
	<?php } ?>
	
	
<div class="container">	
 <?php get_template_part( 'page-templates/desktop-register'); ?>
  <?php get_template_part( 'page-templates/mobile-register'); ?>
</div>
</div>

<script>
$('.error-popup a').click(function(){
$('.error-popup').hide();
});
$('.back-to-style').click(function(){
$('.in-h-c').css("background-color","#FD6571");
$('#main').css("background-color","#FD6571");
});  
$('.back-to-length').click(function(){
$('.in-h-c').css("background-color","#69CCB7");
$('#main').css("background-color","#69CCB7");
});
$('.back-to-texture').click(function(){
$('.in-h-c').css("background-color","#A289C0");
$('#main').css("background-color","#A289C0");
});
$('.back-to-treatment').click(function(){
$('.in-h-c').css("background-color","#88D5EF");
$('#main').css("background-color","#88D5EF");
});
$('.back-to-condition').click(function(){
$('.in-h-c').css("background-color","#FD6671");
$('#main').css("background-color","#FD6671");
});
$('.back-to-des').click(function(){
$('.in-h-c').css("background-color","#88D5EF");
$('#main').css("background-color","#88D5EF");
});
$('.back-to-wear').click(function(){
$('.in-h-c').css("background-color","#A289C0");
$('#main').css("background-color","#A289C0");
});
$('.back-to-demograph').click(function(){
$('.in-h-c').css("background-color","#FD6671");
$('#main').css("background-color","#FD6671");
});
  </script>
   <script>
		$( ".menu-sign-up" ).addClass( "active_menu_item" );
		</script>
		<style>
		
.sign-up .error-popup{
position:fixed; 
top:200px;
left:40%;
background: #fff;
width:350px;
height:100px;  
z-index: 999;
border:4px solid #d3d4d5;
text-align: center;
}

.sign-up .error-popup p{
margin-top:20px;
}
.sign-up .error-popup a.primary-button{
padding: 3px 10px;
}

		
		</style>
		
<?php get_footer();?>
	
	
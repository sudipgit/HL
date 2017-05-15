
<?php
/*
Template Name: Activation Link
*/

 get_header(); ?>
 	<div id="main" class="wrap">
			<div class="container">
<div class="activated-page" style="padding:100px 50px;text-align:center">

<?php
$username=$_GET['id'];
$code=$_GET['key'];

$is_activate=update_activation_code($username,$code);
if($is_activate)
{
 ?>
 
 <p style="text-align:center"> Thank you for confirming you are a real person! Please check your email for your password to login. </p>
 
 
<?php } else {?>
 <p style="text-align:center">Something wrong with activation code (You can try to login now). This code is already used or this is not a valid code. </p>
<?php } ?>
</div>
  </div>
</div>  
<?php get_footer(); ?>
<?php
/*
   Template Name: Email testing

*/
?>
<?php
get_header();

$message= '
<p>Thanks for signing up at Hair Library</p><br/><br/>
<p> "Confirm Your Account" link below to meet your match, fall in love and tell your hair story!</p><br>
';


$to ='sudipcseku@gmail.com';
$subject = "confirm signup";
$from ='info@hairlibrary.com';
$headers = "From:" . $from. "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html\r\n";
wp_mail($to,$subject,$message,$headers);




 get_footer();?>
	
	
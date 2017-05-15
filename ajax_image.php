<?php
require( dirname(__FILE__) . '/wp-load.php' );
$t_width = 450;	// Maximum thumbnail width
$t_height = 250;	// Maximum thumbnail height

if(isset($_GET['t']) and $_GET['t'] == "ajax")
	{
		extract($_GET);
		$path = "wp-content/uploads/userphoto/".$userid."/";
		$new_name='resize_'.$img;
		$ratio = ($t_width/$w); 
		$nw = ceil($w * $ratio);
		$nh = ceil($h * $ratio);
		$nimg = imagecreatetruecolor($nw,$nh);
		$im_src = imagecreatefromjpeg($path.$img);
		imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w,$h);
		imagejpeg($nimg,$path.$new_name,450);
		
		update_user_meta( $userid, 'user_avatar', $new_name);
		echo $new_name;
		
		exit;
	}
	
	?>
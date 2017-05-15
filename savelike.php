<?php
require_once(dirname(__FILE__) .'/wp-load.php' );

   if($_POST['type']=="user" || $_POST['type']=="brand")
   {
      saveFollow($_POST);
   }else
   {
		saveLike($_POST);
		
		echo '<div class="hudhf"><p> dfweu fwegfy wef</p><a href="dfgrwe">bdgfwbgfbvwuhfguwhfguihui</a></div><h2>'.$_POST['uid'].' id='.$_POST['id'].'</h2>';
 }
?>
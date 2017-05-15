<?php
require_once(dirname(__FILE__) .'/wp-load.php' );
   if($_POST['page']>0)
   {
      if($_POST['is_mobile']==1)
	  {
	  
	  $output=getMoreMobileFeeds($_POST['page']);
	  echo $output;
	  }else
	  {
		$output=getMoreFeeds($_POST['page']);
		
		echo  json_encode($output);
	}
 }
?>
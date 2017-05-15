<?php
require_once(dirname(__FILE__) .'/wp-load.php' );


		$message=addProdcutToLibrary($_POST);
		
		echo '<div class="woocommerce-message">'.$message .'</div>';

?>
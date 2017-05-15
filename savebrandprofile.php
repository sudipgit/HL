<?php
/*
 *
 * Save Profile
 *
 *
 */
require( dirname(__FILE__) . '/wp-load.php' );
require( dirname(__FILE__) . '/wp-content/themes/456shop/brand-admin/templates/functions.php' );

$current_user = wp_get_current_user();
if($_POST['id'])
{

$pp=updateBrandInfo($_POST,$current_user,$_FILES);

}


 if($pp==2)
{ ?>
 <script>
 window.location.href = 'http://hairlibrary.com/login/';
 </script>
<?php } else{?>      	 	

 <script>
 window.location.href = 'http://hairlibrary.com/brand-account/';
 </script>

<?php } ?>




















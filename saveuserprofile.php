<?php
/*
 *
 * Save Profile
 *
 *
 */
require( dirname(__FILE__) . '/wp-load.php' );


    if($_SERVER["REQUEST_METHOD"] == "POST")
          {

          	  if($_POST['is_hair_style']==1)
               {
 
                   updateUserHairStyle($_POST);
				   ?>
				    <script>
                     window.location.href = 'http://hairlibrary.com/my-matches/';
                       </script>
                  <?php
                 }
  
  
            if($_POST['is_profile']==1)
            {
  
                 updateUserProfile($_POST,$_FILES);
  
  
                }
				//wp_redirect(get_site_url().'/customer-profile/');
?>

          	 	

 <script>
 window.location.href = 'http://hairlibrary.com/profile/';
 </script>
         <?php }



?>






















<?php
/*
 *
 * Delete Photo
 *
 *
 */
require( dirname(__FILE__) . '/wp-load.php' );


    if($_SERVER["REQUEST_METHOD"] == "POST")
          {

          	  
                   deletePhoto($_POST['id']);
             
           }
  
       
?>

          	 	

 <script>
 window.location.href = 'http://hairlibrary.com/my-hairstory/?id=<?php echo $_POST['uid'];?>';
 </script>























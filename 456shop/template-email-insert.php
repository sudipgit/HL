<?php
/*
Template Name:Email Insert
*/
?>
<?php 

get_header(); 
 global $wpdb;
     $table=$wpdb->prefix."mailchimp_emails";


if($_SERVER["REQUEST_METHOD"] == "POST")
 {
    // global $wpdb;
    // $table=$wpdb->prefix."emails";
 

	 $files=$_FILES;
	  
	if ($files['reviews']['size'] > 0) {

  	   $file1 = $files['reviews']['tmp_name'];
       $handle1 = fopen($file1,"r");
			
		   while (($data = fgetcsv($handle1, 1000, ",")) !== FALSE)
		   {
		
	  
		      $emails=array();	
              $emails['email']=$data[0];
			  $emails['created']=time();
			  
			  $wpdb->insert( $table, $emails);
		
		
			     
		  }
		  
	
		  
		 }
	    
}


?>
<div class="clear"></div>
<div style="padding:300px 0">
          Emails:  <?php
	 $query="select * from $table";
	 $results=$wpdb->get_results($query);
		  echo count($results);?>
		<form name="uploadcsv" action="" method="post" enctype="multipart/form-data">
			 <ul>
				 <li class="text">
					<label>Upload a csv file:</label>
					<input type="file" name="reviews"/>
				 </li>
			
				 <li>
					<input type="submit" value="Submit" class="button"/>
				 </li>
			 </ul>

		</form>


</div>
<?php get_footer(); ?>
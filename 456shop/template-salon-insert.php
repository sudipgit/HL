<?php
/*
Template Name:Salon Insert
*/
?>
<?php 
//send_mail_link();
//sendPassowrdEmail(12);
get_header(); 
/*
 global $wpdb;
     $table=$wpdb->prefix."user_photos";
	 $query="SELECT * from $table";
	 
  $results= $wpdb->get_results($query);

foreach($results as $result)
{

        $com_name=strtolower($result->title);
		if($com_name=="" || $com_name==" ")
          $com_name=strtolower(implode(' ', array_slice(explode(' ', $result->description), 0, 4)));

		
           $names=getFormatedDes($com_name);
		  
		   $names=str_replace('-',"",$names);
		   $names=str_replace('-',"",$names);
		   $names=str_replace('.',"",$names);
			$names=str_replace("'","",$names);
			$names=str_replace("&","",$names);
           $slug=str_replace(' ','-',$names);
  
  $salon=array();

 $salon['slug']=$slug;
			  $where=array('id'=>$result->id);
			 $wpdb->update( $table, $salon, $where);

}


*/




/*updateAffiliateLinks();

function  updateAffiliateLinks()
{
    global $wpdb;
 
    $pmtable=$wpdb->prefix."bk_postmeta";
	
	
 $query="select * from $pmtable where meta_key='product_video_embed'";

 $results=$wpdb->get_results($query);
 //var_dump($results);
 //exit;

 if($results)
 foreach($results as $result)
   { 
     
     update_post_meta($result->post_id, 'product_video_embed', $result->meta_value);
   
   }


}
*/
 /*global $wpdb;
     $table=$wpdb->prefix."posts";
	 $query="SELECT * from $table where post_status='publish' and post_type='product'";
	 
  $results= $wpdb->get_results($query);
$total=0;
$total_price=0;
foreach($results as $result)
{

 $price=get_post_meta( $result->ID,'_price', $single ); 
if($price>0)
{
$total++;
$total_price=$total_price+$price;
}
}
echo $total. '<br>';
echo ($total_price/$total);

*/


/*
 global $wpdb;
     $table=$wpdb->prefix."brand_info";
	 $query="SELECT * from $table";
	 
  $results= $wpdb->get_results($query);

foreach($results as $result)
{

  $slug=str_replace('_','-',$result->company_slug);
  
  $salon=array();

 $salon['company_slug']=$slug;
			  $where=array('id'=>$result->id);
			 $wpdb->update( $table, $salon, $where);

}



exit;



*/


	/* 

if($_SERVER["REQUEST_METHOD"] == "POST")
 {
     global $wpdb;
     $table=$wpdb->prefix."salons";
 
     	$cc=0;
	 $files=$_FILES;
	  
	if ($files['reviews']['size'] > 0) {

  	   $file1 = $files['reviews']['tmp_name'];
       $handle1 = fopen($file1,"r");
			
		   while (($data = fgetcsv($handle1, 1000, ",")) !== FALSE)
		   {
		   if($cc>0)
		   {
	 $firstlast=explode(' ',$data[0]);
		
		
           $company_slug=getSlug($data[0],$data[3]);
		   $phone=$data[5];
		   $phone=str_replace('(',"",$phone);
		   $phone=str_replace(' ',"",$phone);
		   $phone=str_replace(')',"",$phone);
		   $phone=str_replace('-',"",$phone);
		  
		   
		   
		   $log=explode('-',$company_slug);
		   
		   $login='salon_'.rand(1000,10000).$log[0];
		   $email=$login.'@mail.com';
		   
	           $userdata=array(
                          'user_login'=>$login,
                          'first_name'=>$firstlast[0],
                          'last_name'=>$firstlast[1],
                          'user_email'=>$email,
                          'user_pass'=>'12345'
                         
                          );

                   $user_id=wp_insert_user( $userdata );
      
		
             if($user_id && is_int($user_id))
			 {
			
			  add_user_meta( $user_id, 'is_salon','1'); 
			  add_user_meta( $user_id, 'uae_user_activation_code','active'); 
			  
			  
			  
		      $salon=array();	
              $salon['name']=$data[0];
			  $salon['user_id']=$user_id;
			  $salon['address']=$data[1];
			  $salon['city']='San Francisco';
			  $salon['state']=$data[3];
			  $salon['zip']=$data[4];
			   $salon['phone']=$phone;
			    $salon['slug']=$company_slug;
				 $salon['website']=$data[6];
				//  $salon['about']=$data[8];
			   $salon['email']=$data[7];
			  $wpdb->insert( $table, $salon);
		
		   	}
	     
		
		   
		
			  
			     
		  }
		  
		  $cc++;
		  
		 }
	    
}
}



*/



/*
  global $wpdb;
     $table=$wpdb->prefix."salons";
	 $query="SELECT * from $table";
	 
  $results= $wpdb->get_results($query);

foreach($results as $result)
{


 $com_name=strtolower($result->name);
		   
           $names=getFormatedDes($com_name);
		  
		   $names=str_replace('-',"",$names);
		   $names=str_replace('.',"",$names);
			$names=str_replace("'","",$names);
			$names=str_replace("&","",$names);
           $company_slug=str_replace(' ','-',$names);

		 $city= strtolower(str_replace(' ','-',$result->city));

$slug= $company_slug.'-'.$city;		 
		   
             $salon['slug']=$slug;
			  $where=array('id'=>$result->id);
			 $wpdb->update( $table, $salon, $where);		   

}





*/

function getSlug($com_name,$city)
{
 $com_name=strtolower($com_name);
		   
           $names=getFormatedDes($com_name);
		  
		   $names=str_replace('-',"",$names);
		   $names=str_replace('.',"",$names);
			$names=str_replace("'","",$names);
			$names=str_replace("&","",$names);
           $company_slug=str_replace(' ','-',$names);

		 $city= strtolower(str_replace(' ','-',$city));

$slug= $company_slug.'-'.$city;		 

  global $wpdb;
     $table=$wpdb->prefix."salons";
	 $query="SELECT * from $table where slug='".$slug."'";
	$results= $wpdb->get_results($query);
	if(count($results)>0)
	 $slug=$slug.'-2';
	 
	 return $slug;
	
}

?>
<div class="clear"></div>
<div style="padding:300px 0">

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
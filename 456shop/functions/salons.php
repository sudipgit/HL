<?php

 function is_Salon($userid=null)
 {
    if(!$userid)
	  return false;
 $is_salon=get_user_meta($userid, 'is_salon',true); 

    if($is_salon==1)
	  return true;
	else
      return false;	
 }

//Returns all salons of a perticular city and state
 function getCitySalons($city,$state)
 {
 
    global $wpdb;
   $table=$wpdb->prefix."salons";
 
    $query="select * from $table where city='".$city."' and state='".$state."'";
   $results=$wpdb->get_results($query);
   
   return $results;
 
 
 
 } 
 
 
 function getAllSalons()
 {
 
    global $wpdb;
   $table=$wpdb->prefix."salons";
 
    $query="select * from $table";
   $results=$wpdb->get_results($query);
   
   return $results;
 
 }
 
 
 function getSalon($slug)
 {
 
    global $wpdb;
   $table=$wpdb->prefix."salons";
 
    $query="select * from $table where slug='".$slug."'";
   $result=$wpdb->get_row($query);
   
   return $result;
 
 }
 
 
  function getSalonIdBySlug($slug)
 {
 
    global $wpdb;
   $table=$wpdb->prefix."salons";
 
    $query="select * from $table where slug='".$slug."'";
   $result=$wpdb->get_row($query);
   
   return $result->id;
 
 }
 
 
 
 
function getSalonHairStories($biz_id=null,$limit=0)
{
 global $wpdb;
 $ptable=$wpdb->prefix."user_photos";
 $query="select * from $ptable where biz_id=$biz_id AND status!=2 order by created desc";

 if($limit>0)
  $query=$query." limit $limit";
  
 $results=$wpdb->get_results($query);
 
 
return $results;


}
 
 
 
 
 
 
 
 
 
 
 
  function get_salon_info($userid)
{

global $wpdb;
  $table=$wpdb->prefix."salons";
   $query="select * from $table where user_id=$userid";
   $result=$wpdb->get_row($query);
   return $result;


}
 

 
 function insertSalon($post=null,$filedata=null)
 {
	 
    global $wpdb;
     $table=$wpdb->prefix."salons";
				
	   $company_slug=getSalonSlug($post['salon_name'],$post['city']);
	   $phone=$post['salon_phone'];
	   $phone=str_replace('(',"",$phone);
	   $phone=str_replace(' ',"",$phone);
	   $phone=str_replace(')',"",$phone);
	   $phone=str_replace('-',"",$phone);
	
	   $firstlast=explode(' ',$post['salon_name']);
	  
	

	   
	   $username=$post['user_name'];
	   $email=$post['salon_email'];
	   $password=getRandomPassword();
	    $userdata=array(
		  'user_login'=>$username, 
		  'first_name'=>$firstlast[0],
		  'last_name'=>$firstlast[1],
		  'user_email'=>$email,
		  'user_pass'=>$password
                         
        );

        $user_id=wp_insert_user( $userdata );

		
		if($filedata){

			
		   
		   
		   
			 $path=ABSPATH.'wp-content/uploads/salon-licence/';
			 $uploadfile = $path. basename($_FILES['salon-licence']['name']);			
			 if(move_uploaded_file($filedata['salon-licence']["tmp_name"], $uploadfile)){
				$imagepath=basename($_FILES['salon-licence']['name']);	
			 }
		}

	
		
		if($user_id && is_int($user_id)){			
	      add_user_meta( $user_id, 'is_salon','1'); 
		  add_user_meta( $user_id, 'sk_user_activation_code','active'); 

		$salon=array();	
        $salon['name']= $post['salon_name'];
		$salon['user_id']=$user_id;
		$salon['address']=$post['salon_address'];
		$salon['city']=$post['city'];
		$salon['state']=$post['salon_state'];
		$salon['zip']=$post['zipcode'];
		$salon['phone']=$phone;
		$salon['slug']=$company_slug;
		$salon['website']=$post['website'];
		$salon['email']=$email;
		$salon['membership_type']=$post['membership_type'];
		$salon['license']=$imagepath;
		$wpdb->insert( $table, $salon);
		sendSalonRegisterNotification($post,$password);
		sendSalonRegisterAdminNotification($post);
		 return $user_id;
	}
	return false;

 }
 
 function sendSalonRegisterAdminNotification($post){
	$to = 'info@hairlibrary.com,sudipcseku@gmail.com';
	$subject = "New Salon Registered in Hair Library";
	$message = "<h2>New Salon Registered in Hair Library</h2>
				<p>Salon Name: " .$post['salon_name'] ."</p>
				<p>Email: " .$post['salon_email'] ."</p>
				<p>Phone: " .$post['salon_phone'] ."</p>
				<p>City: " .$post['city'] ."</p>
				<p>State: " .$post['salon_state'] ."</p>				
				<p>Registered at " .date('d, M, Y') . "</p>";
	$from = 'info@hairlibrary.com';
	$headers = "From:" . $from. "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html\r\n";
	mail($to,$subject,$message,$headers);

}

 function sendSalonRegisterNotification($post,$password){
	$to = $post['salon_email'];
	$subject = "Hair Library Registration";
	$message = "<h2>Hair Library Registration</h2>
				<p>Salon Name: " .$post['salon_name'] ."</p>
				<p>User Name: " .$post['user_name'] ."</p>
				<p>Password: " .$password ."</p>
				<p>Registered at " .date('d, M, Y') . "</p>";
	$from = 'info@hairlibrary.com';
	$headers = "From:" . $from. "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html\r\n";
	mail($to,$subject,$message,$headers);

}

 
 
 function getSalonSlug($com_name,$city)
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
 
function updateSalon($salon=null){	 

	if($_SERVER["REQUEST_METHOD"] == "POST"){
 
		global $wpdb;
		$table=$wpdb->prefix."salons";			
		
		$salon_id=$post['salon_id'];
		
		$wpdb->update( $table, $salon, array('id' => $salon_id));	 
	}
}
 
 
 function saveSalonPayment($post=null,$user_id=null)
 {
     
	 if(!$post || !$user_id){
		 return false;
	 }
	 global $wpdb;
		 $table=$wpdb->prefix."payments";
		 
		 $data=array();
		 $data['userid'] = $user_id;
		 $data['transition_id'] = $post["txn_id"];
		 $data['amount'] = $post['amount'];
		 $data['created'] = time();
		 
		 $wpdb->insert( $table, $data);
		 return true;
 }
 
 
 
 
  /********salon attributes functions*********/
 function getSalonAnswers($sid)
{
   global $wpdb;
  $qatable=$wpdb->prefix."question_answers";
  $query="select * from $qatable where object_id=$sid and object_type='salon'";
  
  $results=$wpdb->get_results($query);
  
  $ans=array();
  if($results)
  {
    foreach($results as $result)
    $ans[$result->question_id]=$result->answer;
  }

  return $ans;



}
 
 /*
  function getSalonInfo($userid)
 {
 global $wpdb;
  $table=$wpdb->prefix."salons";
   $query="select * from $table where user_id=$userid";
   $result=$wpdb->get_row($query);
   return $result;

 
 }
 */
 
 
 function getSalonInfo($userid)
 {
	/*  
	global $wpdb;
$qatable=$wpdb->prefix."question_answers";
$wpdb->query(" DELETE from $qatable WHERE object_type = 'salon'");

	 */
	 
 global $wpdb;
  $table=$wpdb->prefix."salons";
   $query="select * from $table where user_id=$userid";
   $result=$wpdb->get_row($query);
   
    $result->ans=getSalonAnswers($userid);
   
   return $result;

 
 }
 
 
 
 
function updateSalonAttributes($post,$salonid=null)
{
	if(!$salonid){
		$salonid=$post['user_id'];
	}
   global $wpdb;
    $qatable=$wpdb->prefix."question_answers";
    $ages=implode(',',$post['ageRange']);
	$des=implode(',',$post['hairDes']);
	$stys=implode(',',$post['intStyl']);
	$conds=implode(',',$post['hairCond']);
	$pros=implode(',',$post['hairProc']);
	$texs=implode(',',$post['hairTex']);
	$lenth=implode(',',$post['hairLenth']);

	$answer = getSalonAnswers($salonid);
	if($answer){
		  $wpdb->query(" UPDATE $qatable SET answer ='".$ages."' WHERE object_id = $salonid  AND object_type = 'salon' AND question_id=12");
		  $wpdb->query(" UPDATE $qatable SET answer ='".$des."' WHERE object_id = $salonid  AND object_type = 'salon' AND question_id=6");
		  $wpdb->query(" UPDATE $qatable SET answer ='".$stys."' WHERE object_id = $salonid  AND object_type = 'salon' AND question_id=9");
		  $wpdb->query(" UPDATE $qatable SET answer ='".$conds."' WHERE object_id = $salonid  AND object_type = 'salon' AND question_id=7");
		  $wpdb->query(" UPDATE $qatable SET answer ='".$pros."' WHERE object_id = $salonid  AND object_type = 'salon' AND question_id=8");
		  $wpdb->query(" UPDATE $qatable SET answer ='".$texs."' WHERE object_id = $salonid  AND object_type = 'salon' AND question_id=4");
		  $wpdb->query(" UPDATE $qatable SET answer ='".$lenth."' WHERE object_id = $salonid  AND object_type = 'salon' AND question_id=5");
		  $wpdb->query(" UPDATE $qatable SET answer ='".$post['gender']."' WHERE object_id = $salonid  AND object_type = 'salon' AND question_id=1");	
	}else{
		
	 $qdata=array(
	  'question_id'=>1,
       'object_id'=>$salonid,
       'object_type'=>'salon',
	   'answer'=>$post['gender']

     );                    
    $wpdb->insert($qatable,$qdata); 

	 $value=$ages;
	   $qdata=array(
	     'question_id'=>12,
         'object_id'=>$salonid,
         'object_type'=>'salon',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 

	 $value=$lenth;
	   $qdata=array(
	     'question_id'=>5,
         'object_id'=>$salonid,
         'object_type'=>'salon',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 

	 $value=$texs;
	   $qdata=array(
	     'question_id'=>4,
         'object_id'=>$salonid,
         'object_type'=>'salon',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 

	 $value=$pros;
	   $qdata=array(
	     'question_id'=>8,
         'object_id'=>$salonid,
         'object_type'=>'salon',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 

	$value=$conds;
	   $qdata=array(
	     'question_id'=>7,
         'object_id'=>$salonid,
         'object_type'=>'salon',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 

	$value=$stys;
	   $qdata=array(
	     'question_id'=>9,
         'object_id'=>$salonid,
         'object_type'=>'salon',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 

	$value=$des;
	   $qdata=array(
	     'question_id'=>6,
         'object_id'=>$salonid,
         'object_type'=>'salon',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 

	}

	
	return true;
}
 
 ?>
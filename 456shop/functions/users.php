<?php
 function savePassword($post,$user)
 {

    if(wp_check_password( $post['old_pass'], $user->data->user_pass, $user->ID))
	{
	
	  wp_set_password($post['pass1'], $user->ID );
	  return true;
	
	}
	
	
	return false;
 
 
 }
 
 
 function resetPassword($post,$user=null)
 {
 if(!$user)
 {
 $current_user=wp_get_current_user();
  $user= get_userdata( $current_user->ID );
  }
 
    if(wp_check_password( $post['old_pass'], $user->data->user_pass, $user->ID))
	{
	
	  wp_set_password($post['new_pass'], $user->ID );
	  /* wp_cache_delete($user_ID,'users');
       wp_cache_delete($user->user_login,'userlogins');
       wp_logout();
	   wp_signon(array('user_login'=>$user->user_login,'user_password'=>$post['new_pass']),false);*/
	return true;
	
	}
	
	
	return false;
 
 
 }
 
 
 function resetPasswordNofification($user, $newpass)
 {
 
 $message= '<div width:500px;background:#f3f4f5><p><b>Your Password has been Changed </b><br>New Password: '.$newpass.'</p></div>';
$to = $user->user_email;
//$to ='morgangantt@gmail.com';
$subject = "Hair Library Reset Password";
$from ='info@hairlibrary.com';
$headers = "From:" . $from. "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html\r\n";
wp_mail($to,$subject,$message,$headers);

 
 return true;
 
 }
 
function saveAns($userid,$usestion_id,$answers)
{

  global $wpdb;
 $qatable=$wpdb->prefix."question_answers";
	if(count($answers)>0)
 foreach($answers as $ans)
	   {
	$qdata=array(
	  'question_id'=>$usestion_id,
       'object_id'=>$userid,
       'object_type'=>'user',
	   'answer'=>$ans

     );                    
    $wpdb->insert($qatable,$qdata); 
  }
  
  
}

function  saveUserAns($user_id,$post)
{

    
     // save gender 
	 
	 saveAns($user_id,1,array(0=>$post['gender']));
	
	// Save demograph
	 saveAns($user_id,2,array(0=>$post['demogrph']));
	
	 // save city
	 saveAns($user_id,10,array(0=>$post['city']));

	
	 // save state
	 saveAns($user_id,11,array(0=>$post['sstate'])); 
	
	// save age
    saveAns($user_id,12,array(0=>$post['age']));
	
	saveAns($user_id,3,array(0=>$post['cat']));

	// hair length 
   saveAns($user_id,5,array(0=>$post['hairLenth']));

	// hair texture
	saveAns($user_id,4,array(0=>$post['hairTex']));

	// hair process 
	saveAns($user_id,8,array(0=>$post['hairProc']));


	// hair condition
	$values=explode(',',$post['hairCond']);
	saveAns($user_id,7,$values);
	

	// hair style
     saveAns($user_id,9,array(0=>$post['cat']));


	// hair description

	$values=explode(',',$post['hairDes']);
	saveAns($user_id,6,$values);

	

}

/*returns all users along with their other informations*/
function getAllCustomers($limit=null)
{
$blogusers = get_users( 'orderby=nicename&role=subscriber' );

$users=array();
$i=1;
foreach ( $blogusers as $user ) {
  if(!is_brand($user->ID))
  {

    if(get_user_meta($user->ID,'is_salon', true)!=1 && get_user_meta($user->ID,'sk_user_activation_code', true)=='active') 
	{
	$user->follwers=getFollowersCount($user->ID);
	$user->follwings=getFollowingsCount($user->ID);
	$user->styleclass=getUserHairStyle($user->ID);
	$users[]=$user;
	$i++;
	}
  
  }
  
  if($limit && $i>$limit)
   break;

}

return $users;

}



function getAllRegisteredUsers()
{

$blogusers = get_users( 'orderby=nickname&role=Subscriber' );
//return $blogusers;
$users=array();
foreach ( $blogusers as $user ) {
  if(!is_brand($user->ID))
  {

    if(get_user_meta($user->ID,'is_salon', true)!=1 && get_user_meta($user->ID,'sk_user_activation_code', true)=='active') 
	{
	
	$users[]=$user;

	}
  
  }
  


}

return $users;


}

//returns appropriate css class name for specific user.
function getUserHairStyle($userid)
{
$answers=getUserAnswers($userid);
$class="";
  switch($answers[3])
  {
    case 188:
	   $class=$answers[8]; 
	case 189: 
	    $class=$answers[8]; 
		if($class=='none')
		 $class='n_curly';
	
	 break;
	 case 250:
	      $class="braids"; 
	 break;
	 case 179:
	   $class="locks"; 
	 break;
  }
return $class;
}
 /**
 *
 Returns one-d array of users who same hair type of given user id.
 *
 **/
function getSameHairTypeUsers($userid,$limit=null)
{
$answers=getUserAnswers($userid);
global $wpdb;
 $qatable=$wpdb->prefix."question_answers";
 $query="select * from $qatable where question_id=3 and object_type='user' and answer=$answers[3] group by object_id order by rand()";
 if($limit)
 $query="select * from $qatable where question_id=3 and object_type='user' and answer=$answers[3] group by object_id order by rand() limit $limit";
$results=$wpdb->get_results($query);


$users=array();
if(count($results)>0)
 foreach($results as $result)
  $users[]=get_userdata($result->object_id);
return $users;

}
/**Returns thumb path of given user id **/
function getThumbPath($userid)
{
$thumb=get_user_meta($userid, 'user_thumb', true);	 

	if(!$thumb)
      $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/thumb.jpg';
	else
	  $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/'.$thumb;
	  
	  return $thumbpath;
}
/**Returns avatar path of given user id **/
function getAvatarPath($userid)
{
$avatar=get_user_meta($userid, 'user_avatar', true); 

	if(!$avatar)
      $avatarpath='http://hairlibrary.com/wp-content/uploads/userphoto/ProfilePlaceholder.jpg';
	else
	  $avatarpath='http://hairlibrary.com/wp-content/uploads/userphoto/'.$avatar;
	  
	  return $avatarpath;
}
/**Returns cover photo path of given user id **/
function getCoverPhotoPath($userid)
{
$thumb=get_user_meta($userid, 'user_cover_photo', true);	 

	if(!$thumb)
      $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/profile_banner.png';
	else
	  $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/'.$thumb;
	  
	  return $thumbpath;
}
/**Returns cover thumb path of given user id **/
function getCoverThumbPath($userid)
{
$thumb=get_user_meta($userid, 'user_cover_thumb', true);	 

	if(!$thumb)
      $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/profile_banner.png';
	else
	  $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/'.$thumb;
	  
	  return $thumbpath;
}



function getUserTexture($userid)
{
 global $wpdb;
 $ptable=$wpdb->prefix."question_answers";
 $query="select * from $ptable where question_id=4 and object_type='user' and object_id=$userid";
 $result=$wpdb->get_row($query);
 
 return $result->answer;


}




function  updateUserHairStyle($post)
{
   updateStyle($post['user_id'],3,$post['cat']);
   updateStyle($post['user_id'],4,$post['hairTex']);
   updateStyle($post['user_id'],5,$post['hairLenth']);
   updateStyle($post['user_id'],6,$post['hairDes']);
   updateStyle($post['user_id'],7,$post['hairCond']);
   updateStyle($post['user_id'],8,$post['hairProc']);
 updateStyle($post['user_id'],9,$post['cat']);
    
 update_user_meta( $user_id, 'color_hair', $_POST['haircolor']); 	
}

function updateStyle($user_id,$q_id,$value)
{
 global $wpdb;
  $table=$wpdb->prefix."question_answers";
  $where=array('question_id'=>$q_id,'object_id'=>$user_id,'object_type'=>'user');
  $data=array('answer'=>$value);
  $wpdb->update( $table, $data, $where); 

}




function  updateUserProfile($post,$filedata=null)
{
    global $wpdb;
   $mixer=null;

   if($filedata)
   {
   
   	 $path=ABSPATH.'wp-content/uploads/userphoto/';
     $mixer=rmUploadImage($filedata,$post['user_id'],$path);
    
       $imagepath=$mixer.'_'.$filedata['file']['name'];
        $thumbpath ="thumb_". $mixer.'_'. $filedata['file']['name'];
        
   
   }


 if($mixer)
 {
  update_user_meta( $post['user_id'], 'user_avatar', $imagepath);
  update_user_meta( $post['user_id'], 'user_profile_image', $imagepath);
  update_user_meta( $post['user_id'], 'user_thumb', $thumbpath);
 }
 
  update_user_meta( $post['user_id'], 'first_name', $post['first_name']);
  update_user_meta( $post['user_id'], 'last_name', $post['last_name']);
  update_user_meta( $post['user_id'], 'user_bioinfo', $post['about']);
  update_user_meta( $post['user_id'], 'who_are_you', $post['whoyou']);  
  
  update_user_meta( $post['user_id'], 'user_facebook', $post['facebook']);
  update_user_meta( $post['user_id'], 'user_pinterest', $post['pinterest']);
  update_user_meta( $post['user_id'], 'user_youtube', $post['youtube']);
  update_user_meta( $post['user_id'], 'user_twitter', $post['twitter']);
  update_user_meta( $post['user_id'], 'user_thumblr', $post['thumblr']);
  update_user_meta( $post['user_id'], 'user_instagram', $post['instagram']);
 
 $name=$post['first_name'].' '.$post['last_name'];
  
  $table=$wpdb->prefix."users";
  $where=array('ID'=>$post['user_id']);
  $data=array('display_name'=>$name);
  $wpdb->update( $table, $data, $where); 


 return true;
 	
  


}






//Update user's cover photo
function saveUserCoverPhoto($filedata=null)
{

 $current_user=wp_get_current_user();
 $userid=$current_user->ID;
 global $wpdb;
   $mixer=null;

   if($filedata)
   {
   
   	 $path=ABSPATH.'wp-content/uploads/userphoto/';
     $mixer=rmUploadImage($filedata,$userid,$path);
    
       $imagepath=$mixer.'_'.$filedata['file']['name'];
        $thumbpath ="thumb_". $mixer.'_'. $filedata['file']['name'];
        
   
   }


 if($mixer)
 {
  update_user_meta( $userid, 'user_cover_photo', $imagepath);
  update_user_meta( $userid, 'user_cover_thumb', $thumbpath);
 }
}

//Update user's profile picture
function saveUserProfilePhoto($filedata=null)
{
 $current_user=wp_get_current_user();
 $userid=$current_user->ID;
 global $wpdb;
   $mixer=null;

   if($filedata)
   {
   
   	 $path=ABSPATH.'wp-content/uploads/userphoto/';
     $mixer=rmUploadImage($filedata,$userid,$path);
    
       $imagepath=$mixer.'_'.$filedata['file']['name'];
        $thumbpath ="thumb_". $mixer.'_'. $filedata['file']['name'];
        
   
   }


 if($mixer)
 {
  update_user_meta( $userid, 'user_avatar', $imagepath);
  update_user_meta( $userid, 'user_profile_image', $imagepath);
  update_user_meta( $userid, 'user_thumb', $thumbpath);
 }




}


function getInvalidMessage($username,$email)
{
 $message="Register Error";
 global $wpdb;
 $table=$wpdb->prefix."users";
 $query="select * from $table where user_login='".$username."'";
 $result=$wpdb->get_row($query);
 if($result)
  $message="Username unavailable. Please choose another username.";
 else
 {
 
 $query="select * from $table where user_email='".$email."'";
 $result=$wpdb->get_row($query);
 if($result)
  $message="This email has already been used.";
 
 
 }

return $message;
}


function updateShippingAddress($post)
{

 $current_user=wp_get_current_user();
 $userid=$current_user->ID;

  if(!$post || $userid<1)
   return false;
 
  update_user_meta( $userid, 'billing_address_1', $post['billing_address_1']);
  update_user_meta( $userid, 'shipping_address_1', $post['billing_address_1']);
  
  update_user_meta( $userid, 'billing_city', $post['billing_city']);
  update_user_meta( $userid, 'shipping_city', $post['billing_city']);

  update_user_meta( $userid, 'billing_state', $post['billing_state']);
  update_user_meta( $userid, 'shipping_state', $post['billing_state']);
 
  update_user_meta( $userid, 'billing_country', $post['billing_country']);
  update_user_meta( $userid, 'shipping_country', $post['billing_country']);
  
  update_user_meta( $userid, 'billing_phone', $post['billing_phone']);
  update_user_meta( $userid, 'shipping_phone', $post['billing_phone']);
  
  update_user_meta( $userid, 'billing_postcode', $post['billing_postcode']);
  update_user_meta( $userid, 'shipping_postcode', $post['billing_postcode']);
  
  return true;
}


 function getCurlData($url)
{
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 10);
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
$curlData = curl_exec($curl);
curl_close($curl);
return $curlData;
}

function getUsersWithProfilePic($limit=10){
	$members=getAllCustomers($limit);
	shuffle($members);
	$users=array();
	foreach($members as $member){
		$avatar=get_user_meta($member->ID, 'user_avatar', true); 
		if($avatar){
			$users[] = $member;
		}
		if(count($users)>=$limit)
			break;
	}
	return $users;
}
function getCommentatorWithProfilePic($limit=10){	
	$members=getAllCustomers($limit);
	shuffle($members);
	$users=array();
	foreach($members as $member){
		$avatar=get_user_meta($member->ID, 'user_avatar', true); 
		if($avatar){
			$users[] = $member;
		}
		if(count($users)>=$limit)
			break;
	}
	return $users;
}
?>
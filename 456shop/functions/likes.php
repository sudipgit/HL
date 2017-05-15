<?php

 function saveLike($post=null)
 {
     if(isLiked($post['uid'],$post['id'],$post['type']))
	  return false;
		 
    global $wpdb;
   $table=$wpdb->prefix."likes";
 $user_ip = getUserIP();

     $data=array();
		 $data['object_id']=$post['id'];
		 $data['user_id']=$post['uid'];
		 $data['object_type']=$post['type'];
		  $data['ip']=$user_ip;
		  $data['created']=time();
	  
	 $wpdb->insert( $table, $data);
    $likeid= $wpdb->insert_id;	 
	saveFeed($post['id'],$post['type'],$post['uid'],'like',$likeid);
	
		if($post['type']=='photo')
			sendLikeEmail($post['id'],$post['uid']);
		
		return true;
 }
 
 //returns true if a product or photo is liked either false.
 function isLiked($uid,$objectid,$objecttype)
 {
 
    global $wpdb;
   $table=$wpdb->prefix."likes";
 
  $query="select * from $table where user_id=$uid and object_id=$objectid and object_type='".$objecttype."' and status!=2";
 $results=$wpdb->get_results($query);
  if(count($results)>0)
   return true;
   
   return false;
 
 }
 
 //returns total likes of a product or photo
 function getTotalLike($objectid,$objecttype)
 {
     global $wpdb;
   $table=$wpdb->prefix."likes";
 
  $query="select * from $table where object_id=$objectid and object_type='".$objecttype."' and status!=2";

 $results=$wpdb->get_results($query);
  return count($results);
   
  
 
 
 }
 
  function getAllLikedUsers($objectid,$objecttype)
 {
     global $wpdb;
   $table=$wpdb->prefix."likes";
 
  $query="select * from $table where object_id=$objectid and object_type='".$objecttype."' and status!=2";

 $results=$wpdb->get_results($query);

$users=array();

 if($results && count($results)>0)
  foreach($results as $result)
  {
  $users[]=$result->user_id;
  }
 
 
 return $users;
 }
 
 
 
 //returns total number of followers of a product or photo
 function getTotalFollowers($objectid,$objecttype='user')
 {
 global $wpdb;
   $table=$wpdb->prefix."follows";
 
  $query="select * from $table where object_id=$objectid and object_type='".$objecttype."'";

 $results=$wpdb->get_results($query);
  return count($results);
 
 
 
 }
 
 
 
 
  function saveFollow($post=null)
 {
     


	 
	 
	 
	if(isFollowed($post['uid'],$post['id'],$post['type']))
	  return false;
	  
    global $wpdb;
   $table=$wpdb->prefix."follows";
 

     $data=array();
		 $data['object_id']=$post['id'];
		 $data['user_id']=$post['uid'];
		 $data['object_type']=$post['type'];
		  $data['created']=time();
	  
	    $wpdb->insert( $table, $data); 
		saveFeed($post['id'],$post['type'],$post['uid'],'follow');
		
		sendFollowEmail($post['id'],$post['uid']);
		return true;
 }
 //returns true if a product or photo is followed either false.
 function isFollowed($uid,$objectid,$objecttype)
 {
 
    global $wpdb;
   $table=$wpdb->prefix."follows";
 
  $query="select * from $table where user_id=$uid and object_id=$objectid and object_type='".$objecttype."'";
 $results=$wpdb->get_results($query);
  if(count($results)>0)
   return true;
   
   return false;
 
 }
 
 
 function getFollowers($user_id,$limit=null,$orderby='created desc')
 {
 
   global $wpdb;
   $table=$wpdb->prefix."follows";
 
  $query="select * from $table where object_id=$user_id order by $orderby";
  if($limit)
  $query.=" limit $limit";

 
 $results=$wpdb->get_results($query);
 

 if(count($results)>0)
 {
    $list=array();
	foreach($results as $result)
	{
	$result->follower_count=getFollowersCount($result->user_id);
	 $result->following_count=getFollowingsCount($result->user_id);
	 
	 $list[]=$result;
	 
	}
 
 
 }
 
 return $list;
 
 }

function getFollowings($user_id)
{

 global $wpdb;
   $table=$wpdb->prefix."follows";
 
  $query="select * from $table where user_id=$user_id";
 $results=$wpdb->get_results($query);
 

  if(count($results)>0)
 {
    $list=array();
	foreach($results as $result)
	{
	 $result->follower_count=getFollowersCount($result->object_id);
	 $result->following_count=getFollowingsCount($result->object_id);
	 
	 $list[]=$result;
	 
	}
 
 
 }
 
 return $list;
 


} 
 
 
 function getFollowersCount($user_id)
 {
  
  global $wpdb;
   $table=$wpdb->prefix."follows";
 
  $query="select count(*) as count1 from $table where object_id=$user_id";
 $result=$wpdb->get_row($query);

 return $result->count1;
 
 }
 
 
function getFollowingsCount($user_id)
{

 global $wpdb;
   $table=$wpdb->prefix."follows";
 
  $query="select count(*) as count1 from $table where user_id=$user_id";
 $result=$wpdb->get_row($query);
 
 return $result->count1;

} 

//returns all products of that specific user liked.
function getAllLikedProducts($userid)
{
     $ids=array();
    global $wpdb;
   $table=$wpdb->prefix."likes";
 
  $query="select * from $table where user_id=$userid and object_type='product' and status!=2 order by created  desc";
 $results=$wpdb->get_results($query);
  if(count($results)>0)
   {
     foreach($results as $result)
	 {
	  $ids[]=$result->object_id;
	 }
   
   }
//var_dump($query);
//exit;
   return $ids;
   
}


function sendFollowEmail($userid,$actorid)
{

$user=get_userdata($userid);
$actor=get_userdata($actorid);
$thumbpath=getThumbPath($actorid);

$message='<div style="border:1px solid #ddd;width:800px; font-family: garamond;margin:0 auto;background:url(http://hairlibrary.com/wp-content/themes/456shop/assets/img/email_follow_bg.png)no-repeat;">
<div style="margin:0 42px 0 30px;height:540px;">
<h1 style="background:#111;font-size:20px;color: #fff;font-weight: normal;margin-top: 0;padding: 5px 0 5px 23px;text-transform: uppercase;">Hair Library</h1>
<div style="float:left;width:65%;padding-left:4%">
<h1 style="margin:3px 0">'.ucfirst($actor->first_name).' '.ucfirst($actor->last_name).'is inspired by you</h1>
<h4 style="margin:10px 0 30px">Discover '.ucfirst($actor->first_name).'\'s Hair Story</h4>

<a style="font-weight: bold;border-radius:3px;padding:12px 44px;text-align:center;background:#D9197E;color:#fff;font-size:24px;text-decoration: none;" href="http://hairlibrary.com/profile/?id='.$actorid.'">Follow '.ucfirst($actor->first_name).'</a>

<div style="margin:50px 20px">

  <div style="padding:5px;width:150px;height:150px;float:left;max-height:150px">
  <div style="width:100%;height:100%;overflow:hidden;max-height:100%">  
  <img style="width:100%;height:100%;" alt="profile" src="'.$thumbpath.'">
  </div>
  </div>
  <div style="float:left;margin:43px 0 0 24px">
   <h3 style="margin:3px 0">'.ucfirst($actor->first_name).'</h3>
  <p>'.get_user_meta($actor->ID, 'who_are_you', true).'</p>
  </div>
  <div style="clear:both"></div>
</div>

</div>
<div style="float:right;width:25%;margin-right:5%"><img style="margin-top:30px" width="150" alt="logo" src="http://hairlibrary.com/wp-content/uploads/userphoto/hl_logo.png"/></div>
<div style="clear:both"></div>
</div>
<div style="text-align:center; padding: 25px 0 0;">
<a style="padding:3px 10px; text-decoration:none;color:#333" href="http://hairlibrary.com">Home</a>
<a style="padding:3px 10px;text-decoration:none;color:#333"  href="http://hairlibrary.com/contact-us/">Contact</a>
<a style="padding:3px 10px;text-decoration:none;color:#333"  href="http://hairlibrary.com/terms-conditions/">Terms</a>
<a style="padding:3px 10px;text-decoration:none;color:#333"  href="http://hairlibrary.com/privacy/">Privacy</a>
<a style="padding:3px 10px;text-decoration:none;color:#333"  href="https://www.facebook.com/hairlibrary?ref=hl">facebook</a>
<a style="padding:3px 10px;text-decoration:none;color:#333"  href="https://twitter.com/Hair_Library">Twitter</a>
</div>
<p style="text-align:center">&copy; Hair Library 2014 Powered by Soho Analytics </p>
</div>';



$to = $user->user_email;
//$to ='morgangantt@gmail.com';
$subject = "Sending You Love! Your Hair Story Has Received A Comment";
$from ='info@hairlibrary.com';
$headers = "From:" . $from. "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html\r\n";
wp_mail($to,$subject,$message,$headers);
//echo $to; 
return true;






}
 
 
function sendLikeEmail($objectid,$actorid)
{

$actor=get_userdata($actorid);
$thumbpath=getThumbPath($actorid);
$photo=getPhotoDetails($objectid);
$owner=get_userdata($photo->user_id);

$message='<div style="border:1px solid #ddd;width:800px; font-family: garamond;margin:0 auto;background:url(http://hairlibrary.com/wp-content/themes/456shop/assets/img/email_follow_bg.png)no-repeat;">

<div style="margin:0 42px 0 30px;height:540px;">
	<h1 style="background:#111;font-size:24px;color: #fff;font-weight: normal;margin-top: 0;margin: 10px 0; padding: 5px 0 5px 23px;text-transform: uppercase;letter-spacing: 5px;">Hair Library</h1>
	<div style="margin:0 0 0 30px">
		<h2 style="font-size: 30px; font-weight:normal;"><span style="text-transform:capitalize;">'.getFormatedDes($actor->display_name).'</span> has Liked your Hair Story</h2>
		<div>
			<div style="float:left; width:170px;; margin-right:20px;background: #F9F9F9; border: 1px solid #eee;border-radius:4px">
				<div style="overflow:hidden;">  
					<img width="170" alt="Screen" src="http://hairlibrary.com/wp-content/uploads/photostore/'.$photo->user_id.'/'.$photo->photo.'">
					<h3 style="font-size:12px;font-weight: normal; margin: 10px 0 0;text-align:center">'.getFormatedDes($photo->title).'</h3>
                   <div style="text-align: center;width:52px;margin:0 auto">
                    <img style="padding:0;float:left" width="30px" alt="heart" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/heart_red.png">
					<span style="float: left; margin-top: 5px;">'.getTotalLike($objectid,'photo').'</span>
                    </div>
				</div>
			</div>
			<div style="float:left; width:500px;">
				<div>
					<div style="float:left; margin-left: 20px;">
						<div style="margin-top:64px;">
						
						<a style="font-weight: bold;border-radius:3px;padding:8px 44px;text-align:center;background:#D9197E;color:#fff;font-size:21px;text-decoration: none;" href="http://hairlibrary.com/photo/?id='.$photo->id.'"> View Hair Story</a></div>
					</div>
					<div style="float:right;margin-right:50px">
						<img width="120" alt="logo" src="http://hairlibrary.com/wp-content/uploads/userphoto/hl_logo.png"/>
					</div>
					<div style="clear:both"></div>
				</div>
				<div style="margin-top:50px;">
					<div style="float:left; width:100px; margin-right:10px;">
						<a href="http://hairlibrary.com/profile/" style="display: block; height: 70px; padding: 2px;width: 70px;margin-left: 10px;"><div><img alt="profile" width="70" src="'.$thumbpath.'" /></div></a>
					</div>
					<div style="float:left; width:350px">
						<h2 style="font-size: 28px; font-weight:normal; color:#D9197E; margin: 0;"><a style="text-decoration:none;color:#D9197E;" href="http://hairlibrary.com/my-hairstory/?id='.$actor->ID.'">See '.getFormatedDes($actor->first_name).'\'s Hair Story</a></h2>
						<h3 style="font-size: 24px; margin:3px 0;text-transform:capitalize;">'.getFormatedDes($actor->display_name).'</h3>
						<p style="margin:0; font-size: 20px;">'.get_user_meta($actor->ID, 'who_are_you', true).'</p>
					</div>
					<div style="clear:both"></div>
				</div>			
			</div>
			<div style="clear:both"></div>
		</div>	
	</div>
</div>			
<div style="text-align:center; padding: 25px 0 0;">
<a style="padding:3px 10px; text-decoration:none;color:#333" href="http://hairlibrary.com">Home</a>
<a style="padding:3px 10px;text-decoration:none;color:#333"  href="http://hairlibrary.com/contact-us/">Contact</a>
<a style="padding:3px 10px;text-decoration:none;color:#333"  href="http://hairlibrary.com/terms-conditions/">Terms</a>
<a style="padding:3px 10px;text-decoration:none;color:#333"  href="http://hairlibrary.com/privacy/">Privacy</a>
<a style="padding:3px 10px;text-decoration:none;color:#333"  href="https://www.facebook.com/hairlibrary?ref=hl">Facebook</a>
<a style="padding:3px 10px;text-decoration:none;color:#333"  href="https://twitter.com/Hair_Library">Twitter</a>
</div>
<p style="text-align:center">&copy; Hair Library 2014 Powered by Soho Analytics </p>
</div>';



$to = $user->user_email;
//$to ='morgangantt@gmail.com';
//$to ='sudipcseku@gmail.com';
$subject = "Sending You Love! ".ucfirst(getFormatedDes($actor->first_name))."has liked your hair story";
$from ='info@hairlibrary.com';
$headers = "From:" . $from. "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html\r\n";
wp_mail($to,$subject,$message,$headers);
//echo $to; 
return true;






}
 
  /**return html layout of like button and number of like*/
function getHeartButton($id,$userid,$type,$cssid,$redirect=null)
{
                  
          $is_liked=isLiked($userid,$id,$type);
 
           if($userid<1)
                $msg="Please login to like this ".$type;
            if($is_liked) 
                  $msg="You already Liked this ".$type;
 
           $likes=getTotalLike($id,$type); 
?>					

		 <div class="heart-button section">
		            <?php if($userid>=1){ ?>
			           <a style="<?php if($is_liked) echo 'display:none';?>" class="new-heart like-button" id="heart-<?php echo $cssid;?>" title="Like" href="javascript:saveAjaxLike(<?php echo $id;?>,<?php echo $userid;?>,<?php echo $likes;?>,'<?php echo $type;?>','<?php echo $cssid;?>');"></a>
			           <a style="<?php if(!$is_liked>0) echo 'display:none';?>" class="new-heart like-button after-like" id="heart-after-<?php echo $cssid;?>" href="javascript:void();" title="<?php echo $msg;?>"></a>
					   <?php } else { ?>
					    <a class="like-button after-like" href="javascript:void();" title="<?php echo $msg;?>" onclick="getHeartLoginPopup('<?php echo $redirect;?>')"></a>
					   <?php } ?>
			            <span id="like-no-<?php echo $cssid;?>"><? echo $likes;?> <?php if($likes==1) echo 'Like';else echo 'Likes';?></span>
		              	<div class="clear"></div>
			       </div>
<?php
}


function getListHeartButton($id,$userid,$type,$cssid,$redirect=null)
{
                  
          $is_liked=isLiked($userid,$id,$type);
 
           if($userid<1)
                $msg="Please login to like this ".$type;
            if($is_liked) 
                  $msg="You already Liked this ".$type;
 
           $likes=getTotalLike($id,$type); 
?>					

		 <div class="heart-button section">
		          <?php if($userid>=1){ ?>
			          <a style="<?php if($is_liked) echo 'display:none';?>" class="like-button" id="heart-<?php echo $cssid;?>" title="Like" href="javascript:saveAjaxLike(<?php echo $id;?>,<?php echo $userid;?>,<?php echo $likes;?>,'<?php echo $type;?>','<?php echo $cssid;?>');"></a>
			           <a style="<?php if(!$is_liked>0) echo 'display:none';?>" class="like-button after-like" id="heart-after-<?php echo $cssid;?>" href="javascript:void();" title="<?php echo $msg;?>"></a>
					   <?php } else { ?>
					    <a class="like-button after-like" href="javascript:void();" title="<?php echo $msg;?>" onclick="getHeartLoginPopup('<?php echo $redirect;?>')"></a>
					   <?php } ?>
			            <span id="like-no-<?php echo $cssid;?>"><? echo $likes;?> <?php //if($likes==1) echo 'Like';else echo 'Likes';?></span>
		              	<div class="clear"></div>
			       </div>
<?php
}



function getListHeartButtonHtml($id,$userid,$type,$cssid,$redirect=null)
{
                  
          $is_liked=isLiked($userid,$id,$type);
 
           if($userid<1)
                $msg="Please login to like this ".$type;
            if($is_liked) 
                  $msg="You already Liked this ".$type;
 
           $likes=getTotalLike($id,$type); 
				

		$output= '<div class="heart-button section">';
		          if($userid>0)
				    {
			         $output.='<a '; 
					   if($is_liked)
					 $output.='style="display:none" ';
					  $output.=' class="like-button" id="heart-'.$cssid.'" title="like" href="javascript:saveAjaxLike('.$id.','.$userid.','.$likes.',\''.$type.'\',\''.$cssid.'\');"></a>
			           <a ';
					   if(!$is_liked)
					    $output.='style="display:none" ';
					   
					   $output.=' class="like-button after-like" id="heart-after-'.$cssid.'" href="javascript:void();" title="'.$msg.'"></a>';
					   } else {
					   $output.='<a class="like-button after-like" href="javascript:void();" title="'.$msg.'" onclick="getHeartLoginPopup(\''.$redirect.'\')"></a>';
					   }
			             $output.='<span id="like-no-'.$cssid.'">'.$likes.'</span>
		              	<div class="clear"></div>
			       </div>';
				   return $output;

}
function getPopupHeartButton($id,$userid,$type,$cssid)
{
                  
          $is_liked=isLiked($userid,$id,$type);
 
           if($userid<1)
                $msg="Please login to like this ".$type;
            if($is_liked) 
                  $msg="You already Liked this ".$type;
 
           $likes=getTotalLike($id,$type); 
		   
		   $lclass1="";
		   $lclass2="";
		   
			if($is_liked || $userid<1)
			   $lclass1='display:none';
			 if(!$is_liked && $userid>0)
               $lclass2='display:none';		
              if($likes==1) 
			  $liketext='Like';
			  else 
			  $liketext='Likes';		   
			  

		$out='<div class="heart-button section">
             <a style="'.$lclass1.'" class="like-button" id="heart-'.$cssid.'" title="like" href="javascript:saveAjaxLike('.$id.','.$userid.','.$likes.',\''.$type.'\','.$cssid.');"></a>
			           <a style="'.$lclass2.'" class="like-button after-like" id="heart-after-'.$cssid.'" href="javascript:void();" title="'.$msg.'"></a>
			            <span id="like-no-'.$cssid.'">'.$likes.' '.$liketext.' </span>
		              	<div class="clear"></div>
			       </div>';
				   return $out;

}

 
 ?>
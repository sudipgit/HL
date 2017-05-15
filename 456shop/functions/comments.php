<?php
function getComments($objectid,$isform=true,$object_type="product")
{
$user=wp_get_current_user();
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['comment']!="" && $_POST['is_comment']==1)
{
 saveComment($_POST,$objectid,$object_type,$user->ID);
 $current_url = (empty($_SERVER['HTTPS']) ? "http://" : "https://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
 unset($_POST);
$_POST = array();
 ?>
 
 <script>
 window.location.href = '<?php echo $current_url;?>';
 </script>
 <?php
 
}

$results=getMyComments($objectid,$object_type);


?>
<?php  if( $user->ID > 0 && $isform) { 

   
?>
  <div class="comment-form">
  <div class="outer-round mini-circle <?php echo getUserHairStyle($user->ID);?>">
  <div class="inner-round">
   <img class="p-image" src="<?php echo getThumbPath($user->ID);?>" width="40"/>
   </div>
  </div>
    <form action="" method="post" id="p-comment" onsubmit="return postComment();">
	 <input id="comment" type="text" name="comment"/>
	 <input type="submit" class="c-button" value="Comment"/>
	 <input type="hidden" name="is_comment" value="1"/>
	 <div class="clear"></div>
	</form>
  
  
  
  </div>
<?php } ?>
   <div id="c-list" class="comment-list">

   <ul>
   <?php if(count($results)>0){ 
   $i=0;
   foreach($results as $comment){
    $thumbpath=getThumbPath($comment->actor->ID);
    
   ?>
        <li class="p-comment <?php if($i>2) echo 'hide';?>">
           <a class="comment-thumb mini-circle <?php echo getUserHairStyle($comment->actor->ID);?>" href="http://hairlibrary.com/profile/?id=<?php echo $comment->actor->ID;?>">
		   <div class="inner-round">
		   <img class="p-image" src="<?php echo $thumbpath;?>" width="40"/></div></a>
		    <div class="c-details">
			<h4> <a href="http://hairlibrary.com/profile/?id=<?php echo $comment->actor->ID;?>"><?php echo getFormatedDes($comment->actor->first_name);?></a></h4>
			<p><?php echo getFormatedDes($comment->comment);?></p>
			</div>
			<div class="clear"></div>
         </li>
   <?php $i++;} } ?>
   
   </ul>
      <?php if(count($results)>3 && $isform){?>
<p id="view-all" style="color: #0000FF;cursor: pointer;text-align:right;padding-top:5px"> View All(<?php echo count($results);?>)</p>
  <?php } ?>
      
	  <script>
	  $('#view-all').click(function(){
	    $('.p-comment').removeClass('hide');
		$('#c-list').addClass('fixed-height');
		$('#view-all').addClass('hide');
	  });
	  </script>
   </div>


<?php
}


function saveComment($post,$pid,$object_type,$userid)
{
   if($pid<1 || $userid<1 || !$post || trim($post['comment']==""))
     return false;
	  
    global $wpdb;
    $table=$wpdb->prefix."product_comments";
 

     $data=array();
		 $data['object_id']=$pid;
		 $data['user_id']=$userid;
		 $data['object_type']=$object_type;
		 $data['created']=time();
		 $data['status']=1;
		  $data['comment']=trim($post['comment']);
		  
	  
	    $wpdb->insert( $table, $data);
		
	
    $commentid= $wpdb->insert_id;
  
  
     if(!$commentid)
   return false;
   
   saveFeed($pid,$object_type,$userid,'comment',$commentid);	
    sendCommentEmail($userid,$pid,$object_type,$post['comment']);
  return true;
}


function getMyComments($objectid,$object_type="product",$limit=null)
{


    global $wpdb;
   $table=$wpdb->prefix."product_comments";
 
  $query="select * from $table where object_id=$objectid and status!=2 order by created desc";
  if($limit)
    $query.=" limit $limit";
	
  
  $results=$wpdb->get_results($query);
  $list=array();
  if(count($results)>0)
   foreach($results as $result){
     $result->actor=get_userdata($result->user_id);
	 
	 $list[]=$result;
   }
 
 
 
 
   return $list;

}

function getPopupComments($objectid,$object_type="product")
{
$results=getMyComments($objectid,$object_type);




   $out='<div id="c-list" class="comment-list"><ul>';
    if(count($results)>0){ 
   $i=0;
   foreach($results as $comment){
    $thumbpath=getThumbPath($comment->actor->ID);

       $out.= '<li class="p-commen">
           <a href="http://hairlibrary.com/profile/?id='.$comment->actor->ID.'"><img class="p-image" src="'.$thumbpath.'" width="40"/></a>
		    <div class="c-details">
			<h4> <a href="http://hairlibrary.com/profile/?id='.$comment->actor->ID.'">'.getFormatedDes($comment->actor->first_name).'</a></h4>
			<p>'.getFormatedDes($comment->comment).'</p>
			</div>
			<div class="clear"></div>
         </li>';
		 
    $i++;
	if($i>=3)
	  break;
	} } 
   
   $out.='</ul></div>';
   
   return $out;

}






function sendCommentEmail($actorid,$objectid,$objecttype,$comment)
{
$cmt=implode(' ', array_slice(explode(' ', $comment), 0, 10));;

if($objecttype=="photo")
{
$actor=get_userdata($actorid);
$thumbpath=getThumbPath($actorid);
$photo=getPhotoDetails($objectid);
$owner=get_userdata($photo->user_id);

$message='<div style="border:1px solid #ddd;width:800px; font-family: garamond;margin:0 auto;background:url(http://hairlibrary.com/wp-content/themes/456shop/assets/img/email_follow_bg.png)no-repeat;">

<div style="margin:0 42px 0 30px;height:540px;">
	<h1 style="background:#111;font-size:24px;color: #fff;font-weight: normal;margin-top: 0;margin: 10px 0; padding: 5px 0 5px 23px;text-transform: uppercase;letter-spacing: 5px;">Hair Library</h1>
	<div style="margin:0 0 0 30px">
		<h2 style="font-size: 30px; font-weight:normal;"><span style="text-transform:capitalize;">'.getFormatedDes($actor->display_name).'</span> has commented on your Hair Story</h2>
		<div>
			<div style="float:left; width:170px;; margin-right:20px;background: #F9F9F9; border: 1px solid #eee;border-radius:4px">
				<div style="overflow:hidden;">  
					<img width="170" alt="Screen" src="http://hairlibrary.com/wp-content/uploads/photostore/'.$photo->user_id.'/'.$photo->photo.'">
					<h3 style="font-size:12px;font-weight: normal; margin: 10px 0 0;text-align:center">'.getFormatedDes($photo->title).'</h3>
                   <div style="text-align: center;width:52px;margin:0 auto">
                    <img style="padding:0;float:left" width="30px" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/heart_red.png">
					<span style="float: left; margin-top: 5px;">'.getTotalLike($objectid,'photo').'</span>
                    </div>
				</div>
			</div>
			<div style="float:left; width:500px;">
				<div>
					<div style="float:left; margin-right: 60px;">
						<div style="margin-top:28px;">
						<p style="font-family:arial;font-size: 14px;margin-bottom: 20px;width: 260px;"><i>&ldquo; '.getFormatedDes($cmt).'.... &rdquo;</i></p>
						<a style="font-weight: bold;border-radius:3px;padding:8px 44px;text-align:center;background:#D9197E;color:#fff;font-size:21px;text-decoration: none;" href="http://hairlibrary.com/photo/?id='.$photo->id.'">Reply to Comment</a></div>
					</div>
					<div style="float:left">
						<img width="120" src="http://hairlibrary.com/wp-content/uploads/userphoto/hl_logo.png"/>
					</div>
					<div style="clear:both"></div>
				</div>
				<div style="margin-top:50px;">
					<div style="float:left; width:100px; margin-right:10px;">
						<a href="http://hairlibrary.com/profile/" style="display: block; height: 70px; padding: 2px;width: 70px;margin-left: 10px;"><div><img width="70" src="'.$thumbpath.'" /></div></a>
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

}else
{

$actor=get_userdata($actorid);
$thumbpath=getThumbPath($actorid);
$product=get_post($objectid);
$owner= get_userdata($product->post_author);
$thumb=get_the_post_thumbnail($objectid, array(200,300) );

$message='<div style="border:1px solid #ddd;width:800px; font-family: garamond;margin:0 auto;background:url(http://hairlibrary.com/wp-content/themes/456shop/assets/img/email_follow_bg.png)no-repeat;">

<div style="margin:0 42px 0 30px;height:540px;">
	<h1 style="background:#111;font-size:24px;color: #fff;font-weight: normal;margin-top: 0;margin: 10px 0; padding: 5px 0 5px 23px;text-transform: uppercase;letter-spacing: 5px;">Hair Library</h1>
	<div style="margin:0 0 0 30px">
		<h2 style="font-size: 30px; font-weight:normal;"><span style="text-transform:capitalize;">'.getFormatedDes($actor->display_name).'</span> has commented on your Product</h2>
		<div>
			<div style="float:left; width:170px;; margin-right:20px;background: #F9F9F9; border: 1px solid #eee;border-radius:4px">
				<div style="overflow:hidden;">  
					'.$thumb.'
					<h3 style="font-size:12px;font-weight: normal; margin: 10px 0 0;text-align:center">'.get_the_title($product->ID).'</h3>
                   <div style="text-align: center;width:52px;margin:0 auto">
                    <img style="padding:0;float:left" width="30px" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/heart_red.png">
					<span style="float: left; margin-top: 5px;">'.getTotalLike($objectid,'product').'</span>
                    </div>
				</div>
			</div>
			<div style="float:left; width:500px;">
				<div>
					<div style="float:left; margin-right: 60px;">
						<div style="margin-top:28px;">
						<p style="font-family:arial;font-size: 14px;margin-bottom: 20px;width: 260px;"><i>&ldquo; '.getFormatedDes($cmt).'.... &rdquo;</i></p>
						<a style="font-weight: bold;border-radius:3px;padding:8px 44px;text-align:center;background:#D9197E;color:#fff;font-size:21px;text-decoration: none;" href="'.post_permalink($product->ID).'">Reply to  Comment</a></div>
					</div>
					<div style="float:left">
						<img width="120" src="http://hairlibrary.com/wp-content/uploads/userphoto/hl_logo.png"/>
					</div>
					<div style="clear:both"></div>
				</div>
				<div style="margin-top:50px;">
					<div style="float:left; width:100px; margin-right:10px;">
						<a href="http://hairlibrary.com/profile/" style="display: block; height: 70px; padding: 2px;width: 70px;margin-left: 10px;"><div><img width="70" src="'.$thumbpath.'" /></div></a>
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

}

$to = $owner->user_email;
//$to ='sudipcseku@gmail.com';
$subject = "Sending You Love! Your Hair Story Has Received A Comment";
$from ='info@hairlibrary.com';
$headers = "From:" . $from. "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html\r\n";
wp_mail($to,$subject,$message,$headers);
//echo $to; 
return true;






}
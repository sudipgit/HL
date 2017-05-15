<?php
/*
   Template Name: Photo Store Template

*/
 


?>
<?php get_header();
 $current_user = wp_get_current_user();
 ?>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
	
function saveLike(id,likes) { 
 
	
    $.ajax({
            type:"post",
            url:"<?php bloginfo('url');?>/savelike.php",
        data:"uid=<?php echo $current_user->ID;?>&id="+id+"&type=photo",
        success:function(data){
		likes++;
		btn1="#heart-"+id;
		btn2="#heart-after-"+id;
		btn3="#like-no-"+id;
		
               $(btn1).hide(1000);
			  $(btn2).show(500);
			 $(btn3).html(likes);
        }
    });
   
	
}
</script>   
		<div id="main" class="wrap-page photo-store photo-stories" style="background:#f8f9fa">
			<div class="container">
	         
			
				<div class="row-fluid">
					
				<?php   
				$uid=null;
                  if(isset($_GET['userid']))
				    $uid=$_GET['userid'];
					
					/**
					Source:functions/photostore.php
					returns all photo of specific user if user id exist, else return all photo of user_photos
					**/
				$results=getAllPhotos($uid);
			//var_dump($results);
				if(count($results)>0)
				{
				// var_dump($results);
				 foreach($results as $result)
				  {
				?>
				<div class="span4">
				
				  <?php if(count($result)>0){
				  foreach($result as $photo)
				  {
				/**Source: functions/photostore.php
					Returns photo html layout of given photo id**/
						 echo getPhotoHtml($photo);
						 
						 ?>	
					
						 
				 
				 
				<!-- $id= $photo->id;
                  
                    $is_liked=isLiked($current_user->ID,$id,'photo');
 
                   if($current_user->ID<1)
                   $msg="Please login to like this Photo";
                 if($is_liked) 
                    $msg="You already Liked this photo";
 
                    $likes=getTotalLike($id,'photo');
				 
				  ?>
				  <div class="photo on-photo feed">
                  	  <div class="owner-thumb">
				   <div class="thumb">
			        <?php
                       $photoowner=get_userdata( $photo->user_id );
					$thumb=get_user_meta($photoowner->ID, 'user_thumb', true);	 
					  if(!$thumb)
					    $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/thumb.jpg';
						else
						 $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/'.$photoowner->ID.'/'.$thumb;?>
						 <a href="<?php bloginfo('url');?>/profile/?id=<?php echo $photoowner->ID?>"><img src="<?php echo $thumbpath;?>" width="60"/></a>
						 </div>	
						 <div class="user-act"><h4><a href="<?php bloginfo('url');?>/profile/?id=<?php echo $photoowner->ID?>"><?php echo $photoowner->display_name;?></a> </h4></div>
					 <div class="clear"></div>
			       </div>
				<a href="http://hairlibrary.com/photo/?id=<?php echo $photo->id;?>"><img src="<?php bloginfo('url');?>/wp-content/uploads/photostore/<?php echo $photo->user_id;?>/<?php echo $photo->photo;?>"/></a>
				<p><?php echo substr($photo->description,0,100);?></p>
			     <div class="heart-button section">
		
			          <a style="<?php if($is_liked || $current_user->ID<1) echo 'display:none';?>" class="like-button" id="heart-<?php echo $photo->id;?>" title="like" href="javascript:saveLike(<?php echo $photo->id;?>,<?php echo $likes;?>);"></a>
			           <a style="<?php if(!$is_liked && $current_user->ID>0) echo 'display:none';?>" class="like-button after-like" id="heart-after-<?php echo $photo->id;?>" href="javascript:void();" title="<?php echo $msg;?>"></a>
			            <span id="like-no-<?php echo $photo->id;?>"><? echo $likes;?> <?php if($likes>1) echo 'Likes';else echo 'Like';?></span>
		              	<div class="clear"></div>
			       </div>
				   			
				</div>-->
				<?php } } ?>
				</div>
					
					
					
					
				<?php }
				
				}?>	
                </div>
			</div>
		</div>
          <script>
		$( "#story-menu-item" ).addClass( "active_menu_item" );
		</script>
<?php get_footer(); ?>
	
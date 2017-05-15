
<?php
/*
Template Name: Public profile
*/

global $post;
$userid=$_GET['id'];
//var_dump($user);
 if( $userid < 1) {
 ?>
 <script>
 window.location.href = '<?php bloginfo('url'); ?>/';
 </script>
 
 <?php	
 }
 
 if(is_brand($userid))
 {?>
 <script>
 window.location.href = '<?php bloginfo('url'); ?>/';
 </script>
 
 <?php
 }


$id=$_GET['id'];
 $current_user = wp_get_current_user();
 $is_liked=isFollowed($current_user->ID,$id,'user');
 
 if($current_user->ID<1)
  $msg="Please login to Follow";
 if($is_liked) 
  $msg="You already Followed";
 
 $follows=getTotalFollowers($id,'user');

?>

<script>
	
function saveFollow() { 
   
    $.ajax({
            type:"post",
            url:"<?php bloginfo('url');?>/savelike.php",
        data:"uid=<?php echo $current_user->ID;?>&id=<?php echo $id;?>&type=user",
        success:function(data){
             $("#heartf").hide(1000);
			  $("#heartf-after").show(500);
			 $("#follow-no").html('<?php echo $follows+1;?>');
        }
    });
   
	
}

</script>  

 
 

<?php get_header(); ?>
<!--<link href="<?php bloginfo('template_url'); ?>/brand-admin/common/theme/css/style-dark.css?1369414383" rel="stylesheet" />-->
<link href="<?php bloginfo('template_url'); ?>/brand-admin/common/theme/css/glyphicons.css" rel="stylesheet" />
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>$(function() {$( "#accordion" ).accordion();});</script>
	
<?php 
 include_once('brand-admin/templates/functions.php');



?>



 <link href="<?php bloginfo('template_url'); ?>/brand-admin/css/custom.css" rel="stylesheet" />	
		<div id="main" class="wrap post-template">
			<div class="container">
				
				<div class="row-fluid" style="padding-top:0">	
					<div class="span12 post-page customer-profile">		
					 <?php 
					
					   
					   $user=get_userdata($userid);
					   $answers=getUserAnswers($user->ID);
					   
					  // $matches=getMatchingProducts($user->ID);
					  // $mylibrary=getMyLibrary($user->ID);
					   // $mylibrary=getAllOrderedProducts($user->ID);
						$mylibrary=getAllLikedProducts($user->ID);
					
                       $cat=getTerm($answers[3]);					   
					   $catname=$cat->slug;
					    
						$avatarpath=getAvatarPath($user->ID);
						$thumbpath=getThumbPath($user->ID);
					
				
					 ?>
                    
					<div class="row-fluid profile-details">	
						<div class="span6 cat">
					
					   
					  	<div class="profile-image">
		               <img alt="" class="shadow-s3 wpstickies" src="<?php echo $avatarpath;?>" />
		              </div>
					
				
					 </div>
					<div class="span6 cat">
			
					   	 <h4><?php echo $user->display_name;?>&#39;s Hair Library</h4>
					     <p class="user-style">	<?php echo get_user_meta($user->ID, 'who_are_you', true); ?></p>
					   <p><?php echo get_user_meta($user->ID, 'user_bioinfo', true); ?></p>
					   <div class="follow-buttons section">
		
			        <a style="<?php if($is_liked || $current_user->ID<1) echo 'display:none';?>" class="follow-button" id="heartf" title="Follow" href="javascript:saveFollow();">Follow</a>
			       <a style="<?php if(!$is_liked && $current_user->ID>0) echo 'display:none';?>" class="follow-button after-follow" id="heartf-after" href="javascript:void();" title="<?php echo $msg;?>"><?php if($current_user->ID<1) echo 'Follow'; else echo 'Following';?></a>
			        <p class="followers"><span id="follow-no"><? echo $follows;?></span> Followers</p>
			           <div class="clear"></div>
			           </div>
					 </div>
				
					
					</div>
					
					<div class="profile-tabs">
					

		
			<div class="span12">
				<ul class="tabs">
					
					<li class="tab-item active" id="tab2">My Hair Library</li>
					
					<li class="tab-item " id="tab4">My Hair Story</li>
					<li class="tab-item" id="tab6">Followers</li>
				</ul>
				<div class="clear"></div>
				
			   <!-- Product library-->
			    <div class="panel entry-content" id="tab21">
					<div class="row-fluid match-products">	
					
                     <div class="span3 left-bar">
						<ul>
						<li <?php if($type=='') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/customer-profile/?pt=all">All</a></li>
						
						<li <?php if($type=='con') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/customer-profile/?pt=con">Conditioner</a></li>
						<li <?php if($type=='sam') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/customer-profile/?pt=sam">Shampoo</a></li>
						<li <?php if($type=='oil') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/customer-profile/?pt=oil">Oil</a></li>
						<li <?php if($type=='gel') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/customer-profile/?pt=gel">Gel</a></li>
						<li <?php if($type=='mos') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/customer-profile/?pt=mos">Moisturizer</a></li>
						<li <?php if($type=='spr') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/customer-profile/?pt=spr">Hair Spray</a></li>
						<li <?php if($type=='col') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/customer-profile/?pt=col">Hair Color</a></li>
						<li <?php if($type=='rep') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/customer-profile/?pt=rep">Hair Care/Repair</a></li>

					</ul>
					
				</div>
                  <div class="span9">

                    <div class="woocommerce">
						<?php if($mylibrary) {?>
                           <ul class="products">
						   
						   <?php 
						   $i=1;
						   foreach($mylibrary as $match) {
                            $class="";
							if($i%3==0)
							  $class="last";
							else if($i%3==1)
							   $class="first";
                             
						   ?>
							
                           <li class=" span4 product <?php echo $class;?>">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                             <!-- <span class="onsale">Sale!</span>-->
					
                         <?php getProductContent($match,$current_user->ID);?>
                            </div>
						   </li>
						   <?php $i++;} ?>
						   </ul>
						   <?php } else { ?>
						   
						   <p> No Product Matches</p>
						   <?php } ?>
						</div>

                    </div>
					
					</div>
			</div>
			
       <!--  End product library -->
			
			   
			<div class="panel entry-content photo-store hide" id="tab41">
				
				  <div class="innerLR">
		
				<!-- Photo Store-->
 <div class="row-fluid">
				     <?php 
					 $photos=getAllPhotos($user->ID,8,true);
					 
					 if(count($photos)>0)
				   {	?>			
			    
				
				       <?php  foreach($photos as $photo){?>
						 	<div class="span4 story">
							<?php echo getPhotoHtml($photo);?>	
						 </div>
					<?php	} ?>
						 
				 
				
				<?php }
					  else
						{?>
						<p>There is no more photo of <?php echo getFormatedDes($user_info->first_name);?></p>
						
						<?php } ?>
                </div><!-- end Photo Store-->
		 </div>
	
				  
		  </div>
			
			<div class="panel entry-content hide" id="tab61">
				
				<?php    
				$followers=getFollowers($user->ID);
				$followings=getFollowings($user->ID);
				?>
				<div class="followers followers-followings">
				  <h4>Followers</h4>
				   <ul>
				   <?php if(count($followers)>0){
				     foreach($followers as $follower){
					 
					 $fuser=get_userdata($follower->user_id);
					 $avatarpath=getAvatarPath($fuser->ID);
						
				   ?>
				   <li>
				      <a href="<?php bloginfo('url'); ?>/profile/?id=<?php echo $fuser->ID;?>"><img width="300" src="<?php echo $avatarpath;?>"/></a>
                      <h5><a href="<?php bloginfo('url'); ?>/profile/?id=<?php echo $fuser->ID;?>"><?php echo $fuser->display_name;?></a></h5>					  
				     <div class="follower-followings-count">
					   <span><?php echo $follower->follower_count;?> Followers </span>
					   <span class="last"><?php echo $follower->following_count;?> Followings </span>
					 </div>
				   </li>
				   
				   
				   <?php } } ?>
				   
				   </ul>
				<div class="clear"></div>
				</div>
					<div class="clear"></div>
					<div class="followings followers-followings">
					<h4>Followings</h4>
				   <ul>
				   <?php if(count($followings)>0){
				     foreach($followings as $following){
					
					 $fuser=get_userdata($following->object_id);
					  $avatarpath=getAvatarPath($fuser->ID);
						
				   ?>
				   <li>
				      <a href="<?php bloginfo('url'); ?>/profile/?id=<?php echo $fuser->ID;?>"><img width="300" src="<?php echo $avatarpath;?>"/></a>
                      <h5><a href="<?php bloginfo('url'); ?>/profile/?id=<?php echo $fuser->ID;?>"><?php echo $fuser->display_name;?></a></h5>					  
				     <div class="follower-followings-count">
					   <span><?php echo $following->follower_count;?> Followers </span>
					   <span class="last"><?php echo $following->following_count;?> Followings </span>
					 </div>
				   </li>
				   
				   
				   <?php } } ?>
				   
				   </ul>
					<div class="clear"></div>
				</div>
				
			</div>
		            
		    <div class="clear"></div>
</div>

<script>



var oid="tab2";

$(".tab-item").click(function() {
c_tid=this.id;
if(oid!=c_tid)
{
  
   oa_cid="#"+oid+'1';
   ca_cid="#"+c_tid+'1';
   ca_tid="#"+c_tid;
   oa_tid="#"+oid;
   
    $(ca_tid).addClass('active');
     $(oa_tid).removeClass('active');
    $(oa_cid).hide();
   $(ca_cid).fadeIn(1000);
	
 oid=c_tid;

}


});


$("#success-msg").fadeOut(10000);
</script>
					
					</div>
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content();?>
                    <?php endwhile; endif; ?>
                     
                    </div>
				</div>
			</div>
		</div>
     
<?php get_footer(); ?>
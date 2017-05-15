
<?php
/*
Template Name: Public profile2
*/

   if($_SERVER["REQUEST_METHOD"] == "POST")
          {
if($_POST['is_cover_photo'])
{
//Source: functions/users.php
//Update user's cover photo
saveUserCoverPhoto($_FILES); 

}

if($_POST['is_profile_photo'])
{
//Source: functions/users.php
//Update user's profile picture
saveUserProfilePhoto($_FILES); 

}
}



global $post;
$user_login=$_GET['n'];
if($user_login)
{
$ruser=get_user_by('login', $user_login);
$userid=$ruser->ID;
}
else
$userid=$_GET['id'];

 $current_user=wp_get_current_user();
if(!$userid)
{

 $userid=$current_user->ID;
 
 }

$user=get_userdata($userid);
$id=$userid;

 if( $userid < 1) {
 ?>
 <script>
 window.location.href = '<?php bloginfo('url'); ?>/';
 </script>
 
 <?php	
 }
 
 
 if(is_brand($user->ID))
 {?>
 <script>
 window.location.href = '<?php bloginfo('url');?>/dashboard/';
 </script>
 
 <?php
 }
//Source: functions/likes.php
 //returns true if a product or photo is followed either false.
 $is_liked=isFollowed($current_user->ID,$id,'user');
 
 if($current_user->ID<1)
  $msg="Please login to Follow";
 if($is_liked) 
  $msg="You already Followed";
 //Source: functions/likes.php
 //returns total number of followers of a product or photo
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
function saveFollow2() { 
   
    $.ajax({
            type:"post",
            url:"<?php bloginfo('url');?>/savelike.php",
        data:"uid=<?php echo $current_user->ID;?>&id=<?php echo $id;?>&type=user",
        success:function(data){
		
             $("#heartfm").hide(1000);
			  $("#heartf-afterm").show(500);
			
        }
    });
   
	
}
</script>

<?php get_header(); ?>
<!--<link href="<?php bloginfo('template_url'); ?>/brand-admin/common/theme/css/style-dark.css?1369414383" rel="stylesheet" />-->

	<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>$(function() {$( "#accordion" ).accordion();});</script>-->
	

<?php 
 include_once('brand-admin/templates/functions.php');



?>

			
 <link href="<?php bloginfo('template_url'); ?>/brand-admin/css/custom.css" rel="stylesheet" />	
		<div id="main" class="post-template profile">

					 <?php 
					
					   
					   /*
					    Source:/functions/brandadmin.php
					   returns one-d array of specific user's answer.*/
					   $answers=getUserAnswers($user->ID);
					    /**
						 *
						 Source:/functions/products.php
						 Returns one dimensional array of products those are matched with current user's products.
						 *
						 **/
					   $matches=getMatchingProducts($user->ID);
					  // $mylibrary=getMyLibrary($user->ID);
					   // $mylibrary=getAllOrderedProducts($user->ID);
					   
					   
					   // Source:/functions/likes.php
					   //returns all products of that current user liked.
						$mylibrary=getAllLikedProducts($user->ID);
					
                       $cat=getTerm($answers[3]);					   
					   $catname=$cat->slug;
					     // Source:/functions/users.php
						 //returns user's avatar path
						$avatarpath=getAvatarPath($user->ID);
						 // Source:/functions/users.php
						 //returns user's thumb path
						$thumbpath=getThumbPath($user->ID);
					
				
					 ?>
					   <?php  
					   // Source:/functions/users.php
						 //returns user's thumb path
					   $thumbpath=getThumbPath($userid); 
					   // Source:/functions/users.php
						 //returns user's cover photo path
					      $coverimage=getCoverPhotoPath($userid); 
						  // Source:/functions/users.php
						 //returns user's cover thumb path
					      $coverthumb=getCoverThumbPath($userid); 
					 
					   ?>
				
				<div id="edit_cover_popup_outer" class="hl_popup_outer">
					<div class="hl_popup_inner">
					 <a href="javascript:void()" id="close-edit-proimg" class="close_edit_cover_popup_outer">Close</a>		
					<form class="form-horizontal" name="cover-edit" action="" method="post" enctype="multipart/form-data">
					<div class="control-group row-fluid">
				      <div class="pro-img cover-img">
						<img src="<?php echo $coverimage;?>"/>
					  </div>
					  <input class="p-pic" type="file" name="file"/><br/><span class="img-size">Image Size Must be 980x250</span>
					  <div class="clear"></div>
					  </div>
					  
					  <div class="form-actions" style="margin: 0;">
							<button type="submit" class="btn button btn-icon btn-primary glyphicons circle_ok"><i></i>Update Cover Photo</button>
							<input type="hidden" name="is_cover_photo" value="1"/>
				        	
						</div>
					  
					  </form>
					</div>
				</div>
				<div id="edit_pro_pic_popup_outer" class="hl_popup_outer">
					<div class="hl_popup_inner">
					 <a href="javascript:void()" id="close-edit-cover" class="close_edit_pro_pic_popup_outer">Close</a>		
					<form class="form-horizontal" name="pro-edit" action="" method="post" enctype="multipart/form-data">
					<div class="control-group row-fluid">
						<div class="pro-img">
							<img width="120" src="<?php echo $thumbpath;?>"/>
						</div>
						<input class="p-pic" type="file" name="file"/><br/><span class="img-size">Image Size Must be 600x400</span>
						<div class="clear"></div>
					 </div>					  
						<div class="form-actions" style="margin: 0;">
							<button type="submit" class="btn button btn-icon btn-primary glyphicons circle_ok"><i></i>Update Profile Picture</button>
							<input type="hidden" name="is_profile_photo" value="1"/>
						</div>
					  
					  </form>
					</div>
				</div>
				<div class="row-fluid desktop-display" style="padding-top:0" >	
					<div class="span12 post-page customer-profile">		
		
                    <div class="banner_top">
						<?php if($current_user->ID == $user->ID) { ?>
						<div class="edit_cover">
							<a href="javascript:void();">Edit Cover photo</a>
						</div>
						<?php }?>
						<img src="<?php echo $coverimage;?>"/>
					</div>
					
					<div class="container">
					
					<div class="profile-details" style="margin-bottom:0;border:none">
					<div class="menu_details">
						<div class="profile-image big-circle <?php echo getUserHairStyle($user->ID);?>">
							<div class="inner-round edit_pro">
								<?php if($current_user->ID == $user->ID) { ?>
								<div class="edit_pro_pic">
									<a href="javascript:void();">Edit</a>
								</div>
								<?php }?>
								<img <?php if($userid==6898){ echo 'style="height:100%"';}?>  alt="" class="shadow-s3 wpstickies" src="<?php echo $avatarpath;?>" />
							</div>
						</div>
						<div class="profile-name">
							<h4><?php
							   $last=substr(str_replace(' ',"",$user->last_name),0,1);
							echo getFormatedDes($user->first_name).' '.ucfirst($last).'.';?></h4>
						</div>
						<div class="tab_menu">
							<ul class="hl-tabs-d 	<?php if($userid==$current_user->ID) echo 'have5';?>">
							
								<li><a class="active" href="javascript:void()" id="library-tab-d">My Library</a></li>
								<li><a href="javascript:void()" id="hair-story-tab-d">Hair Stories</a></li>
								<li><a href="javascript:void()" id="reviews-tab-d">Reviews</a></li>
								<div class="clear"></div>
							</ul>
						</div>
						<div class="clear"></div>
						<?php if($current_user->ID == $user->ID) { ?>
						 <div class="add_story_profile">
							<a style="font-weight:normal;" class="button btn primary" title="Add Hair Story" href="<?php bloginfo('url');?>/upload-photo/">Add hair story</a>
							<a href="javascript:void()"  title="How To Add A Hair Story" class="question-mark"><img width="21px" src="<?php bloginfo('template_url');?>/assets/img/icons/Question mark-01.png"></a>
						</div>
						<?php } ?>
						</div>
					<div class="row-fluid">	
						<div class="span9">
							
							<?php if($userid==$current_user->ID){?>
							<div class="menu_secondery">
								<ul>
									<!--<li><a href="<?php bloginfo('url');?>/my-hairstory/?n=<?php echo $user->user_login;?>"  title="MY HAIRSTORY">Add Hair Story</a></li>-->
									<li><a href="<?php bloginfo('url');?>/my-matches/"  title="MATCHES">Matches</a></li>
								
									<li><a href="<?php bloginfo('url');?>/my-hair-profile/" title="MY Hair Profile">Hair Profile</a></li>
									<li><a href="<?php bloginfo('url');?>/account-setting/" title="Account Setting">Settings</a></li>
									<li><a href="<?php bloginfo('url');?>/my-account/" title="Order History">Order History</a></li>
								</ul>
							</div>
                              <?php } ?>
							
					<div class="row-fluid hl-tabs-content-d" id="library-tab-d1"  style="display:block">
                    <div class="span12" >                  
					 
					  <div class="woocommerce">
						<?php if($mylibrary) {?>
                           <ul class="products">
						   
						   <?php 
						   $i=1;
						   foreach($mylibrary as $match) {
                              $class="";
							if($i%3==1)
							   $class="first";
                             //if($i>4)
							 //break;
                             
						   ?>
							
                           <li class="product <?php echo $class;?>">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                             <!-- <span class="onsale">Sale!</span>-->
					
                         <?php 
						  /**
							 *
							 Source:/functions/products.php
							 Generate HTML layout of product content of given current user
							 *
							 **/
						 getProductContent($match,$current_user->ID);?>
                            </div>
						   </li>
						   <?php $i++;} ?>
						   </ul>
						   <?php } else { ?>
						   
						   <p class="no-product"> No Products Added Yet!</p>
						   <?php } ?>
						</div>
					 </div>
					 </div>
					 
					 <div class="row-fluid hl-tabs-content-d" id="hair-story-tab-d1">
                    <div class="span12" >
                    
					 	<div class="row-fluid">
				<?php 
					 
					 /**
					 Source: functions/photostore.php
					returns all photo of current user
					**/
					 $photos=getAllPhotos($user->ID,20,true);
					 
					 if(count($photos)>0)
				   {	
				   foreach($photos as $photo){?>
						 	<div class="span6 story">
							<?php

							/**Source: functions/photostore.php
							Returns photo html layout of given photo id**/
							echo getPhotoHtml($photo);?>	
				
						 </div>
					<?php	} 
					} else { ?>
					<p class="no-product"> No Hair Stories Yet!</p>
					<?php } ?>
			 </div>	<!-- end Photo Store-->
					 </div>
					 </div>
					 
					 
					 
					 
					 <div class="row-fluid hl-tabs-content-d" id="reviews-tab-d1">
                    <div class="span12">
                    
					
					  <div class="woocommerce">
						<?php 
						
						//Source: functions/products.php
						//return one-d array of products on which specific user commented.
						 $reviews=getMyCommentedProducts($user->ID,4);
						if($reviews) {?>
                           <ul class="products">
						   
						   <?php 
						   $i=1;
						   foreach($reviews as $match) {
                            $class="";
							if($i==1)
							   $class="first";
                            
						   ?>
							
                           <li class=" span4 product <?php echo $class;?>">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                             <!-- <span class="onsale">Sale!</span>-->
					
                         <?php 
						  /**
							 *
							 Source:/functions/products.php
							 Generate HTML layout of product content of given current user
							 *
							 **/
						 getProductContent($match,$current_user->ID);?>
                            </div>
						   </li>
						   <?php $i++;} ?>
						   </ul>
						   <?php } else { ?>
						   
						   <p class="no-product">No Reviews Yet!</p>
						   <?php } ?>
						</div>
					 </div>
					 </div>
							
							
						</div>
						
					
					<div class="span3 details-right">
						<table width="100%" cellspacing="0">
							<tr>
								<td colspan="2">
									<h4 class="first-name"><?php echo getFormatedDes($user->display_name);?></h4>
									<div class="profile_bio">
										<p><?php echo getFormatedDes(get_user_meta($user->ID, 'user_bioinfo', true)); ?> </p>
									</div>
									<div class="inspired-button">
									<?php if($current_user->ID == $user->ID) { ?>
									<a class="follow-button edit-profile"  title="Edit Profile" href="http://hairlibrary.com/my-hair-profile/">Edit My Profile</a>
								  <?php } else {?>
								<a style="<?php if($is_liked || $current_user->ID<1) echo 'display:none';?>" class="follow-button heart" id="heartf" title="Follow" href="javascript:saveFollow();">Inspired</a>
							   <a style="<?php if(!$is_liked && $current_user->ID>0) echo 'display:none';?>" class="follow-button after-follow heart" id="heartf-after" href="javascript:void();" title="<?php echo $msg;?>"><?php if($current_user->ID<1) echo 'Inspired'; else echo 'Following';?></a>

								   <div class="clear"></div>
								   <?php } ?>
								   </div>
								</td>
							</tr>
							<tr>
								<td width="50%" style="border-right:2px solid #b5b6b7;">
									<h3 style= "font-size:14px;"><?php echo getFollowersCount($user->ID);?> <br>Inspired</h3>
								</td>
								<td width="50%">
										
									<h3 style= "font-size:14px;"><?php echo getFollowingsCount($user->ID);?><br> Inspiring</h3>
								</td>
							</tr>
							<!--<tr>
								<td colspan="2"><span class="location">Location</span>
								<span style="float:right;">Cape Town</span></td>
							</tr>
							<tr>
								<td colspan="2"><span class="rss">RSS</span>
								<span style="float:right;">My Hair Library</span></td>
							</tr>-->
							<tr>
								<td colspan="2">
									<div class="social-icons">
										 <?php 
											 $facebook=get_user_meta($user->ID, 'user_facebook', true);
											 $pinterest=get_user_meta($user->ID, 'user_pinterest', true);
											 $youtube=get_user_meta($user->ID, 'user_youtube', true);
											 //$googlep=get_user_meta($user->ID, 'user_google_plus', true);
											 $twitter=get_user_meta($user->ID, 'user_twitter', true);
											 $thumblr=get_user_meta($user->ID, 'user_thumblr', true);
											 $instagram=get_user_meta($user->ID, 'user_instagram', true);											 
										?>
										<?php if($youtube!=""){ ?>
										<a href="<?php echo $youtube;?>"><img src="<?php bloginfo("template_url")?>/assets/img/profile-page-icons/yti.png"></a>
										<?php } ?>
										<?php if($googlep!=""){ ?>
										<a href="<?php echo $googlep;?>"><img src="<?php bloginfo("template_url")?>/assets/img/profile-page-icons/gpi.png"></a>
										<?php } ?>
										<?php if($twitter!=""){ ?>
										<a href="<?php echo $twitter;?>"><img src="<?php bloginfo("template_url")?>/assets/img/profile-page-icons/twi.png"></a>
										<?php } ?>
										<?php if($pinterest!=""){ ?>
										<a href="<?php echo $pinterest;?>"><img src="<?php bloginfo("template_url")?>/assets/img/profile-page-icons/pni.png"></a>
										<?php } ?>
										<?php if($facebook!=""){ ?>
										<a href="<?php echo $facebook;?>"><img src="<?php bloginfo("template_url")?>/assets/img/profile-page-icons/fbi.png"></a>
										<?php } ?>
										<?php if($instagram!=""){ ?>
										<a href="<?php echo $instagram;?>"><img src="<?php bloginfo("template_url")?>/assets/img/profile-page-icons/ini.png"></a>
										<?php } ?>
									</div>
								</td>
							</tr>
							
						</table>
						<!-- <div class="social-md-bar">
						  <p class="user-style mobile-display">	<?php echo get_user_meta($user->ID, 'who_are_you', true); ?></p>
							<div class="media-bar">
							<ul>
							 <?php 
							 $facebook=get_user_meta($user->ID, 'user_facebook', true);
							 $pinterest=get_user_meta($user->ID, 'user_pinterest', true);
							 $youtube=get_user_meta($user->ID, 'user_youtube', true);
							 $twitter=get_user_meta($user->ID, 'user_twitter', true);
							 $thumblr=get_user_meta($user->ID, 'user_thumblr', true);
							 $instagram=get_user_meta($user->ID, 'user_instagram', true);
							 
							 ?>
							 <?php if($twitter!=""){ ?>
							<li><a class="twitter" href="<?php echo $twitter;?>" title="Twitter" target="_blank">Twitter</a></li>
							<?php } ?>
							 <?php if($pinterest!=""){ ?>
							<li><a class="pinterest" href="<?php echo $pinterest;?>" title="Pinterest" target="_blank">Pinterest</a></li>
							<?php } ?>
							 <?php if($instagram!=""){ ?>
							<li><a target="_blank"  title="Instagram" class="instagram" href="<?php echo $instagram;?>">Instagram</a></li>
							<?php } ?>
							 <?php if($facebook!=""){ ?>
							<li><a class="facebook" href="<?php echo $facebook;?>" target="_blank" title="Facebook">Facebook</a></li>
							<?php } ?>
							 <?php if($youtube!=""){ ?>
							<li><a target="_blank"  title="YouTube" class="youtube" href="<?php echo $youtube;?>">Youtube</a></li>
							<?php } ?>
							 <?php if($thumblr!=""){ ?>
							<li><a target="_blank"  title="Tumblr" class="thumblr" href="<?php echo $thumblr;?>">Tumblr</a></li>
							<?php } ?>
							</ul>
							<div class="clear"></div>
							
						 </div>

						 <div class="clear"></div>
						 </div>-->

						
						 
						 
						 
					 </div>
					</div>
					</div>
					</div>
					
				
				</div>
				</div>
					<div class="row-fluid mobile-profile mobile-display" style="padding-top:0;">	
					<div class="span12 post-page customer-profile">		
	                 
					<div class="profile-details" style="margin-bottom:0;border:none">	
						<div class="details-left">
							<div class="outer-round">
								<div class="profile-image big-circle <?php echo getUserHairStyle($user->ID);?>">
									<div class="inner-round">
										<img <?php if($userid==6898){ echo 'style="height:100%"';}?> alt="" class="shadow-s3 wpstickies" src="<?php echo $avatarpath;?>" />
									</div>
								</div>
							</div>
							<h4><?php echo getFormatedDes($user->first_name);?></h4>
										   
						</div>				
					<div class="details-right">
						<div class="profile-statistics">
							<ul>
							   <li>
									<h2><?php echo countPhotos($user->ID); //Source: functions/photostore.php.....returns total number of photos of current user
									?></h2>
									<h4>Stories</h4>
								</li>
								<li>
									<h2><?php echo getFollowersCount($user->ID);//Source: functions/likes.php.....returns total number of photos followed by current user
									?></h2>
									<h4>Inspired</h4>
								</li>
								<li>
									<h2><?php echo getFollowingsCount($user->ID);//Source: functions/likes.php
									?></h2>
									<h4>Inspiring</h4>
								</li>
								<div class="clear"></div>
							</ul>
						</div>
						<?php if($user->ID==$current_user->ID){?>
						<div class="edit-profile-button"><a href="http://hairlibrary.com/my-hair-profile/">Edit Your Profile</a></div>
						<?php } else {?>
							   <div class="follow-buttons section" style="margin-top:10px">
		 
			        <a style="<?php if($is_liked || $current_user->ID<1) echo 'display:none';?>" class="follow-button" id="heartfm" title="Follow" href="javascript:saveFollow2();">Inspired</a>
			       <a style="<?php if(!$is_liked && $current_user->ID>0) echo 'display:none';?>" class="follow-button after-follow" id="heartfm-after" href="javascript:void();" title="<?php echo $msg;?>"><?php if($current_user->ID<1) echo 'Inspired'; else echo 'Inspiring';?></a>

			           <div class="clear"></div>
					      </div>
					   <?php } ?>
			        
					 </div>
					 <div class="clear"></div>
				
					    <p class="bio-text"><?php echo implode(' ', array_slice(explode(' ', getFormatedDes(get_user_meta($user->ID, 'user_bioinfo', true))), 0, 30));?> </p>
					
					</div>
					<div class="clear"></div>
					<div class="mobile-profile-menu">
						<ul class="hl-tabs 	<?php if($userid==$current_user->ID) echo 'have5';?>">
						<?php if($userid==$current_user->ID){?>
						<li><a href="javascript:void()" id="matches-tab"><img src="<?php bloginfo('template_url');?>/assets/img/icons/get_matched.png" width="12%"></a></li>
						<?php } ?>
							<li><a href="javascript:void()" id="library-tab"><img src="<?php bloginfo('template_url');?>/assets/img/icons/makup-box-icon.png" width="35%"></a></li>
							<li><a href="javascript:void()" id="hair-story-tab"><img src="<?php bloginfo('template_url');?>/assets/img/icons/youtube.png"  width="55%"></a></li>
							<li><a href="javascript:void()" id="reviews-tab"><img src="<?php bloginfo('template_url');?>/assets/img/icons/comment.png"  width="42%"></a></li>
							<li class="no-border"><a href="javascript:void()" id="followers-tab"><img src="<?php bloginfo('template_url');?>/assets/img/hl_round.png"  width="32%"></a></li>
							<div class="clear"></div>
						</ul>
					</div>
				
				
				<?php if($userid==$current_user->ID){?>
					 <div class="row-fluid hl-tabs-content" id="matches-tab1" style="display:block">
                    <div class="span12 sectionf">
                     <h3 class="title title-4"> <?php echo getFormatedDes($user->first_name);?>'s Matches <a href="<?php bloginfo('url');?>/my-matches/" class="right-arrow"></a></h3>
					 
					  <div class="woocommerce">
						<?php if($matches) {?>
                           <ul class="products">
						   
						   <?php 
						   $i=1;
						   foreach($matches as $match) {
                              $class="";
							if($i==1)
							   $class="first";
                             if($i>4)
							 break;
                             
						   ?>
							
                           <li class=" span4 product <?php echo $class;?>">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                             <span class="onsale"></span>
					
                         <?php 
						  /**
							 *
							 Source:/functions/products.php
							 Generate HTML layout of product content of given current user
							 *
							 **/
						 getProductContent($match,$current_user->ID);?>
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
                     <?php } ?>
	
					 <div class="row-fluid hl-tabs-content" id="library-tab1" <?php if($userid!=$current_user->ID){echo 'style="display:block"'; }?>>
                    <div class="span12 sectionf" >
                     <h3 class="title title-2"> <?php echo getFormatedDes($user->first_name);?>'s Hair Library <a href="<?php bloginfo('url');?>/my-library/?id=<?php echo $userid;?>" class="right-arrow"></a></h3>
					 
					  <div class="woocommerce">
						<?php if($mylibrary) {?>
                           <ul class="products">
						   
						   <?php 
						   $i=1;
						   foreach($mylibrary as $match) {
                      
                             if($i>8)
							 break;
                             
						   ?>
							
                           <li class=" span4 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                             <!-- <span class="onsale">Sale!</span>-->
					
                         <?php 
						  /**
							 *
							 Source:/functions/products.php
							 Generate HTML layout of product content of given current user
							 *
							 **/
						 getProductContent($match,$current_user->ID);?>
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
					 
					 <div class="row-fluid hl-tabs-content" id="hair-story-tab1">
                    <div class="span12 sectionf " >
                     <h3 class="title title-1"> <?php echo getFormatedDes($user->first_name);?>'s Hair Stories <a href="<?php bloginfo('url');?>/my-hairstory/?id=<?php echo $userid;?>" class="right-arrow"></a></h3>
					 
				
				     <?php 
					  /**
					 Source: functions/photostore.php
					returns all photo of current user
					**/
					 $photos=getAllPhotos($user->ID,8,true);
					 
					 if(count($photos)>0)
				   {	?>			
			    
				
				       <?php  foreach($photos as $photo){?>
						 	
						<div class="story">
							<?php 
							/**Source: functions/photostore.php
							Returns photo html layout of given photo id**/
							echo getPhotoHtml($photo);?>	
				
						 </div>
						
					<?php	} ?>
						 
				 
				
				<?php }
					  else
						{?>
						<p>No Hair Stories Yet</p>
						
						<?php } ?>
             
					 </div>
					 </div>
					 
					 
					 
					 
					 <div class="row-fluid hl-tabs-content" id="reviews-tab1">
                    <div class="span12 sectionf">
                     <h3 class="title title-3"> <?php echo getFormatedDes($user->first_name);?>'s Reviews <a href="#" class="right-arrow"></a></h3>
					
					  <div class="woocommerce">
						<?php 
						
						//Source: functions/products.php
						//return one-d array of products on which specific user commented.
						 $reviews=getMyCommentedProducts($user->ID,8);
						if($reviews) {?>
                           <ul class="products">
						   
						   <?php 
						   $i=1;
						   foreach($reviews as $match) {
                            $class="";
							if($i==1)
							   $class="first";
                            
						   ?>
							
                           <li class=" span4 product <?php echo $class;?>">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                             <!-- <span class="onsale">Sale!</span>-->
					
                         <?php 
						  /**
							 *
							 Source:/functions/products.php
							 Generate HTML layout of product content of given current user
							 *
							 **/
						 getProductContent($match,$current_user->ID);?>
                            </div>
						   </li>
						   <?php $i++;} ?>
						   </ul>
						   <?php } else { ?>
						   
						   <p> No Reviews Yet </p>
						   <?php } ?>
						</div>
					 </div>
					 </div>
					<div class="row-fluid hl-tabs-content" id="followers-tab1">
					<?php $followers=getFollowers($user->ID,8);?>
							   
					<div class="hl-member-list">
						<div class="member-row span12 sectionf">
						<h3 class="title title-4 title-inspired"> Inspired<a href="#" class="right-arrow"></a></h3>
						<?php 
                     if(count($followers)>0)
						foreach($followers as $follower){ 
                        $fuser=get_userdata($follower->user_id);
						$thumb = getThumbPath($fuser->ID);
						$blogger=get_user_meta($fuser->ID, 'who_are_you', true);
						$styleclass=getUserHairStyle($fuser->ID);
						if(!$blogger || $blogger=="")
						 $blogger='N/A';
						
						?>
							<div class="user span3">
								<div class="member-thumb">
									<div class="thumb mini-circle <?php echo $styleclass;?>">
									<div class="thumb-inner">
									<a href="<?php bloginfo('url');?>/profile/?n=<?php echo $fuser->user_login;?>"><img src="<?php echo $thumb;?>"></a>
									</div>
									</div>
								</div>		
								<div class="member-info">
								<h3 class="title "><a href="<?php bloginfo('url');?>/profile/?n=<?php echo $fuser->user_login;?>"><?php echo getFormatedDes($fuser->first_name);?></a></h3>
								<p class="location <?php echo str_replace(' ',"-",$blogger);?>"><?php echo $blogger; ?></p>
								<p class="follower"><?php echo $follower->follower_count;?> Inspired, <?php echo $follower->following_count;?> Following</p>
								</div>
							</div>		
							<?php  } ?>

					</div>
						</div>
					</div>
                    </div>

				</div>
		</div>
		


	<script>
				$( document ).ready(function() {
					$(".edit_cover a").click(function(){
					
					//alert("asdfd");
						$("#edit_cover_popup_outer").show();					
					});
					$(".edit_pro_pic a").click(function(){
					
					//alert("asdfd");
						$("#edit_pro_pic_popup_outer").show();					
					});
					$(".close_edit_cover_popup_outer").click(function(){
						$("#edit_cover_popup_outer").hide();	
					});
					$(".close_edit_pro_pic_popup_outer").click(function(){
						$("#edit_pro_pic_popup_outer").hide();	
					});
				});
				</script>

		<!--<div id="guide-tour-outer" style="display:none">
		<div class="guide-tour-inner">
		<?php //if( function_exists('cyclone_slider') ) cyclone_slider('guided-ture'); ?>
		</div>
		</div>-->

           <script>
	 $(document).ready(function() {
	  $(".hl-tabs-d a").click(function() {
        var id=this.id;
		 $(".hl-tabs-d a").removeClass('active');
		
		$(this).addClass("active");
		$('.hl-tabs-content-d').hide();
		id='#'+id+'1';
		 $(id).fadeIn(1000);
		
    });
	 
    $(".hl-tabs a").click(function() {
        var id=this.id;
		 $(".hl-tabs a").removeClass('active');
		
		$(this).addClass("active");
		$('.hl-tabs-content').hide();
		id='#'+id+'1';
		 $(id).fadeIn(1000);
		
    });
	
	
    });

	 </script>

	 <style>
	 .hl-tabs-content-d
	 {
	 display:none;
	 }
	 </style>
<?php get_footer(); ?>
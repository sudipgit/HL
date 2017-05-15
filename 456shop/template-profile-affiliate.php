<?php
/*
Template Name: Profile Affiliate
*/
?>
<?php
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

$mylibrary=getAllLikedProducts($current_user->ID);
  $photos=getAllPhotos($current_user->ID,12,true);
 
 ?>
<?php get_header(); ?>

		<div id="main" class="profile-affiliate wrap">		
			<div class="top-cover">
				<img width="100%" src="<?php bloginfo('template_url');?>/assets/img/home/Birmingham2.jpg">
			</div>
			<div class="container">
				<div class="scroll-product-row">
					<div class="row-fluid">
						<div class="span12 sectionf" >
						
						  
						   <div class="woocommerce">
						  <?php if($mylibrary) {?>
											   <ul class="products">
							 
							 <?php 
							 $i=1;
							 foreach($mylibrary as $match) {
												  $class="";
						   if($i==1)
							  $class="first";
												 if($i>4)
							break;
												 
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
				
				
				
				<div class="main-cover">
					<img src="<?php bloginfo('url');?>/wp-content/uploads/photostore/<?php echo $photos[0]->user_id;?>/<?php echo $photos[0]->photo;?>"/>
				</div>

				<div class="section-photo-store">
					<div class="row-fluid">
                    <div class="span12 sectionf " >
					<div class="title-h">
						<div class="left-badge">
							<img width="100%" src="<?php bloginfo('template_url');?>/assets/img/title-left-badge.png">
						</div>
						<h3 class="title">Hair Stories</h3>
						<div class="right-badge">
							<img width="100%" src="<?php bloginfo('template_url');?>/assets/img/title-right-badge.png">
						</div>
					</div>
       <div class="photo-store">
	   <div class="row-fluid">
         <?php 
     
      
      if(count($photos)>0)
       { ?>   
       
    
           <?php  foreach($photos as $photo){?>
        <div class="span3">
      <div class="photo on-photo feed">
                     <div class="img">
    <a href="<?php bloginfo('url'); ?>/photo/?id=<?php echo $photo->id;?>"><img src="<?php bloginfo('url');?>/wp-content/uploads/photostore/<?php echo $photo->user_id;?>/<?php echo $photo->photo;?>"/></a>
     <h4> <a href="http://hairlibrary.com/photo/?id=<?php echo $photo->id;?>"><?php echo getFormatedDes($photo->title);?></a> </h4>
              <?php getHeartButton($photo->id,$current_user->ID,'photo',$photo->id);?>
     </div>
          
    </div>
       </div>
     <?php } ?>
       
     
    
    <?php }
       else
      {?>
      <p>There is no more photo of <?php echo getFormatedDes($user_info->first_name);?></p>
      
      <?php } ?>
                </div>
				</div><!-- end Photo Store-->
      </div>
      </div>
				
				</div>
			</div>
		</div>
        <style>
		
		#main.profile-affiliate {
			padding-top: 44px !important;
			overflow: visible;
		}
		.profile-affiliate.wrap{
			margin-left: 0;
			margin-right: 0;
			padding: 0 !important;
			width: 980px;
			
		}
		.profile-affiliate .container{
			margin-left: 0;
			margin-right: 0;
			padding: 0 !important;
			width: 980px;
		}
		.profile-affiliate .scroll-product-row{
		padding-left:10px;
		}
		.profile-affiliate .top-cover{
		
		}
		.profile-affiliate .main-cover{
		
		}
		.profile-affiliate .title-h{
			background: none repeat scroll 0 0 #fff;
			border-bottom: 1px solid #e0e0e0;
			border-top: 1px solid #e0e0e0;
			height: 40px;
			margin: 10px 0;
			position: relative;
			padding-left: 20px;
		}
		.profile-affiliate .title-h .left-badge{
			position: absolute;
			left: -6px;
			top: -1px;
		}
		.profile-affiliate .title-h .right-badge{
			position: absolute;
			right: -6px;
			top: -1px;
		}
		.profile-affiliate .title-h .title{
			font-size: 18px;
			margin: 0;
			text-transform: uppercase;
		}
		.profile-affiliate .section-photo-store{

		}
		.profile-affiliate .photo-store{
			width:940px;
			margin-left: auto;
			margin-right: auto;
		}
		</style>
<?php get_footer(); ?>
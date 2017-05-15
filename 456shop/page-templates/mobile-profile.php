
				<div class="row-fluid mobile-profile mobile-display" style="padding-top:0">	
					<div class="span12 post-page customer-profile">		
					 <?php 		
						/*
						Source: functions/brandadmin.php
						returns one-d array of current user's answer.
						*/					 
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
					   
					   
					   /**
						 *
						 Source:/functions/products.php(should have, but not found)
						 Returns liked products of current user.
						 *
						 **/
						$mylibrary=getAllLikedProducts($user->ID);
					
                       $cat=getTerm($answers[3]);					   
					   $catname=$cat->slug;
					    
						$avatarpath=getAvatarPath($user->ID);
						$thumbpath=getThumbPath($user->ID);									
					 ?>                   
					<div class="profile-details" style="margin-bottom:0;border:none">	
						<div class="details-left">
							<div class="outer-round">
								<div class="profile-image big-circle <?php echo getUserHairStyle($user->ID);?>">
									<div class="inner-round">
										<img alt="avatarpath" class="shadow-s3 wpstickies" src="<?php echo $avatarpath;?>" />
									</div>
								</div>
							</div>
							<h4><?php echo getFormatedDes($user->display_name);?></h4>
							<p>Blogger</p>					   
						</div>				
					<div class="details-right">
						<div class="profile-statistics">
							<ul>
								<li>
									<h2>300</h2>
									<h4>FOLLOWERS</h4>
								</li>
								<li>
									<h2>320</h2>
									<h4>FOLLOWING</h4>
								</li>
								<div class="clear"></div>
							</ul>
						</div>
						<div class="edit-profile-button"><a href="#">Edit Your Profile</a></div>
					 </div>
					 <div class="clear"></div>
					</div>
					<div class="clear"></div>
					<div class="mobile-profile-menu">
						<ul class="hl-tabs">
							<li><a href="#library-tab"><img alt="makup-box-icon" src="<?php bloginfo('template_url');?>/assets/img/icons/makup-box-icon.png" width="35%"></a></li>
							<li><a href="#hair-story-tab"><img alt="youtube" src="<?php bloginfo('template_url');?>/assets/img/icons/youtube.png"  width="55%"></a></li>
							<li><a href="#reviews-tab"><img alt="comment" src="<?php bloginfo('template_url');?>/assets/img/icons/comment.png"  width="42%"></a></li>
							<li class="no-border"><a href="#followers-tab"><img alt="heart_red" src="<?php bloginfo('template_url');?>/assets/img/heart_red.png"  width="40%"></a></li>
							<div class="clear"></div>
						</ul>
					</div>
				
	
					 <div class="row-fluid hl-tabs-content" id="library-tab" style="display:block">
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
					 
					 <div class="row-fluid hl-tabs-content" id="hair-story-tab">
                    <div class="span12 sectionf " >
                     <h3 class="title title-1"> <?php echo getFormatedDes($user->first_name);?>'s Hair Stories <a href="<?php bloginfo('url');?>/my-hairstory/?id=<?php echo $userid;?>" class="right-arrow"></a></h3>
					 
					  <div class="row-fluid">
				     <?php 
					 $photos=getAllPhotos($user->ID,8,true);
					 
					 if(count($photos)>0)
				   {	?>			
			    
				
				       <?php  foreach($photos as $photo){?>
						 	<div class="span3">
						<div class="photo on-photo feed">
                  	  <div class="img">
				<a href="<?php bloginfo('url'); ?>/photo/?id=<?php echo $photo->id;?>"><img alt="photostore" src="<?php bloginfo('url');?>/wp-content/uploads/photostore/<?php echo $photo->user_id;?>/<?php echo $photo->photo;?>"/></a>
				 <h4> <a href="http://hairlibrary.com/photo/?id=<?php echo $photo->id;?>"><?php echo getFormatedDes($photo->title);?></a> </h4>
              <?php getHeartButton($photo->id,$current_user->ID,'photo',$photo->id);?>
			  </div>
				   			
				</div>
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
					 
					 
					 
					 
					 <div class="row-fluid hl-tabs-content" id="reviews-tab">
                    <div class="span12 sectionf">
                     <h3 class="title title-3"> <?php echo getFormatedDes($user->first_name);?>'s Reviews <a href="#" class="right-arrow"></a></h3>
					
					  <div class="woocommerce">
						<?php 
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
					
                         <?php getProductContent($match,$current_user->ID);?>
                            </div>
						   </li>
						   <?php $i++;} ?>
						   </ul>
						   <?php } else { ?>
						   
						   <p> No Reviews </p>
						   <?php } ?>
						</div>
					 </div>
					 </div>
					<div class="row-fluid hl-tabs-content" id="followers-tab">
					<?php $followers=getFollowers($user->ID);?>
						<div class="followers followers-followings">
						 <h3 class="title title-3"> <?php echo getFormatedDes($user->first_name);?>'s Reviews <a href="#" class="right-arrow"></a></h3>
						   <ul>
						   <?php if(count($followers)>0){
							 foreach($followers as $follower){
							 
							 $fuser=get_userdata($follower->user_id);
							 $avatarpath=getAvatarPath($fuser->ID);
								
						   ?>
						   <li>
							  <a href="<?php bloginfo('url'); ?>/profile/?id=<?php echo $fuser->ID;?>"><img alt="avatarpath" width="300" src="<?php echo $avatarpath;?>"/></a>
							  <h5><a href="<?php bloginfo('url'); ?>/profile/?id=<?php echo $fuser->ID;?>"><?php echo $getFormatedDes($user->display_name);?></a></h5>					  
							 <div class="follower-followings-count">
							   <span><?php echo $follower->follower_count;?> Followers </span>
							   <span class="last"><?php echo $follower->following_count;?> Followings </span>
							 </div>
						   </li>
						   
						   
						   <?php } } ?>
						   
						   </ul>
						<div class="clear"></div>
						</div>
					</div>
                    </div>
				</div>
     <script>
	 $(document).ready(function() {
    $(".hl-tabs a").click(function() {
        var id=$(this).attr("href");
		 $(".hl-tabs a").removeClass('active');
		
		$(this).addClass("active");
		$('.hl-tabs-content').hide();
		 $(id).fadeIn();
		
    });
    });

	 </script>

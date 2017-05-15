<?php
/*
Template Name: Template Single Salon
*/
?>
<?php get_header(); 

$slug=$_GET['n'];
$salon=getSalon($slug);
?>
<?php


 $current_user = wp_get_current_user();
 $is_liked=isLiked($current_user->ID,$salon->user_id,'salon');
 $likes=getTotalLike($salon->user_id,'salon');



 $is_followed=isFollowed($current_user->ID,$salon->user_id,'user');
 

 
 $follows=getTotalFollowers($salon->user_id,'user');



?>

<script>
		
function saveLike() { 
   
    $.ajax({
            type:"post",
            url:"<?php bloginfo('url');?>/savelike.php",
        data:"uid=<?php echo $current_user->ID;?>&id=<?php echo $salon->user_id;?>&type=salon",
        success:function(data){
             $("#heart").hide(1000);
			  $("#heart-after").show(500);
			 $("#like-no").html('<?php echo $likes+1;?>');
        }
    });
   
	
}
function saveFollow() { 
   
    $.ajax({
            type:"post",
            url:"<?php bloginfo('url');?>/savelike.php",
        data:"uid=<?php echo $current_user->ID;?>&id=<?php echo $salon->user_id;?>&type=user",
        success:function(data){
             $("#heartf").hide(1000);
			  $("#heartf-after").show(500);
			 $("#follow-no").html('<?php echo $follows+1;?>');
        }
    });
   
	
}





</script>
		<div id="main" class="wrap customer-profile single-salon">
			<div class="salon-banner">
				<img src="http://HairLibrary.com/wp-content/uploads/2015/03/ted-gibson-salon.jpg" width="100%">
				<div class="salon-address">
				<h1 class="brand-info-title" style="margin-bottom:15px;margin-top: 13px;line-height:24px;"> <?php echo getFormatedDes($salon->name);?> </h1>	
					<p><?php echo $salon->address;?></p>
									<p><?php echo $salon->city.', '.$salon->state;?></p>
									<?php $ph=substr($salon->phone,0,3).'-'.substr($salon->phone,3);?> 
									<p>Phone: <?php echo $salon->area_code.'-'.$ph;?></p>
				</div>
			</div>
			<div class="container">			
				<div class="row-fluid brand-info">
					<div class="span8">
						<div class="block address-block">
							<div class="row-fluid">
								<div class="span6 right-content">
									<div class="brand-info-image">
										<address>
											<?php echo $salon->address;?>
											<?php echo $salon->city.', '.$salon->state;?>
										</address>
										<script>
											$(document).ready(function(){
												$("address").each(function(){                        
													var embed ="<iframe width='470' height='300' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'   src='https://maps.google.com/maps?&amp;q="+ encodeURIComponent( $(this).text() ) +"&amp;iwloc=near&amp;output=embed'></iframe>";
													$(this).html(embed);
																			
												});
											});
										</script>
									</div>	
													
								</div>
						   
						   
								<div class="span6 info-left" style="position:relative;">
									<div class="add-story-button button desktop-display">
										<?php   if($current_user->ID<1) {?>
										<a id="getLoginPopup21" href="javascript:void();">Add Your Hair Story</a>
										<?php } else {?>
										<a href="<?php bloginfo('url');?>/upload-photo/?biz=<?php echo $slug;?>">Add Your Hair Story</a>
										<?php }?>
										</div>
										<h1 class="brand-info-title" style="margin-bottom:15px;margin-top: 13px;line-height:24px;"> <?php echo getFormatedDes($salon->name);?> </h1>	
										
									<div class="heart-button" style="padding-bottom:10px">		
										<?php if($current_user->ID>0){?>
											<a style="<?php if($is_liked) echo 'display:none';?>" class="like-button" id="heart" title="Like This Salon" href="javascript:saveLike();"></a>
											<a style="<?php if(!$is_liked) echo 'display:none';?>" class="like-button after-like" id="heart-after" href="javascript:void();" title="You Already Liked This Salon"></a>
										<?php } else { ?>	
											<a class="like-button " id="getHeartLoginPopup" title="like" href="javascript:void();"></a>
										<?php } ?>
										<span id="like-no"><? echo $likes;?> <?php if($likes==1) echo 'Like'; else echo 'Likes';?></span>
										<div class="clear"></div>
									</div>
									
									
									<p><?php echo $salon->address;?></p>
									<p><?php echo $salon->city.', '.$salon->state;?></p>
									<?php $ph=substr($salon->phone,0,3).'-'.substr($salon->phone,3);?> 
									<p>Phone: <?php echo $salon->area_code.'-'.$ph;?></p>
							
								  
									<div class="follow-buttons section desktop-display" style="margin-top:30px">
										<?php if(!is_brand($current_user->ID)) {?>
											<?php if($current_user->ID>0){?>
												<a style="<?php if($is_followed) echo 'display:none';?>" class="follow-button" id="heartf" title="Follow" href="javascript:saveFollow();">Inspired</a>
												
												<a style="<?php if(!$is_followed) echo 'display:none';?>"  class="follow-button after-follow" id="heartf-after" href="javascript:void();" title="You Already Inspired By This Salon">Following</a>
											<?php } else { ?>	
												<a class="follow-button " id="getHeartLoginPopup" title="Inspired" href="javascript:void();">Inspired</a>
											<?php } ?>
							
										<?php } ?>
										<p class="followers"><span id="follow-no"><? echo $follows;?></span> Inspired</p>
										<div class="clear"></div>
									</div>	
									<div class="claim-text">
										<a target="_blank" href="mailto:BizClaim@HairLibrary.com"><i>Claim This Business</i></a>
									</div>
									<div class="add-story-button3 button mobile-display">
										<?php   if($current_user->ID<1) {?>
											<a id="getLoginPopup21" href="javascript:void();">Add Your Hair Story</a>
										<?php } else {?>
											<a href="<?php bloginfo('url');?>/upload-photo/?biz=<?php echo $slug;?>">Add Your Hair Story</a>
										<?php }?>
									</div>
								</div>					
							</div>
						</div>
						<div class="salon-video block">
							<h2 class="salon-block-title">Video</h2>
							<div class="video-embed">
								<iframe width="560" height="315" src="https://www.youtube.com/embed/RHcMKXrwDKU" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
						<div class="salon-details block">
							<h2 class="salon-block-title">Details</h2>
							<div class="details">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
								
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
								
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="salon-user-info block">
							<div class="salon-user-thumb">
								<img src="http://HairLibrary.com/wp-content/uploads/2015/03/Ted-Gibson-standing1.jpg" width="92">
							</div>
							<div class="text-center">
								<h3>John Doe</h3>
								<p>Blogger</p>
								<ul>
									<li>
										<img width="10px" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/social/Pink_Facebook.png" />
									</li>
									<li>
										<img width="20px" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/social/Pink_Twitter.png" />
									</li>
								</ul>
							</div>
							<p class="user-info-des">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
						<div class="salon-photo block">
							<h2 class="salon-block-title">Photo</h2>
							<p>No Images Found</p>
						</div>
						<div class="salon-amenities block">
							<h2 class="salon-block-title">Amenities</h2>
							<ul>
								<li>Accepts credit card</li>
								<li>Alcohol</li>
								<li>Caters</li>
								<li>Delivery</li>
								<li>Alcohol</li>
								<li>Good for groups</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="salon block">
					<div class="row-fluid">
						<div class="span12 sectionf">
							 <h3 class="title title-1 desktop-display">     <?php echo getFormatedDes($salon->name);?>    's Hair Stories <a class="right-arrow" href="http://hairlibrary.com/my-hairstory/?id=366"></a></h3>
							 <h3 class="title title-1 mobile-display" style="font-size:16px">  Tagged Hair Stories <a class="right-arrow" href="http://hairlibrary.com/my-hairstory/?id=366"></a></h3>
					 
							<div class="row-fluid">					  
								 <?php 
								 $photos=getSalonHairStories($salon->id,4,true);
								 
								 if(count($photos)>0){?>			
									<ul>							
										<?php  foreach($photos as $photo){?>
											<li class="span3">
												<?php echo getPhotoHtml($photo); ?>
											</li>
										<?php } ?>									 
									</ul>
						
								<?php }else{?>
									<p>Be The First To Share Your Hair Story</p>
										<div class="add-story-button2 button desktop-display">
									<?php   if($current_user->ID<1) {?>
									<a id="getLoginPopup211" href="javascript:void();">Add Your Hair Story</a>
									<?php } else {?>
									<a href="<?php bloginfo('url');?>/upload-photo/?biz=<?php echo $slug;?>">Add Your Hair Story</a>
									<?php }?>
									</div>
									<div class="clear"></div>
								<?php } ?>
							</div><!-- end Photo Store-->
						</div>
					 </div>
				</div>

			</div>
		</div>
<style>

.customer-profile .add-story-button
{
 padding: 5px 15px;
    position: absolute;
    right: 0;
    text-align: center;
    top: -12px;
    width: 145px;
}
.customer-profile .add-story-button2
{

margin-bottom: 20px;
    padding: 5px 15px;
    text-align: center;
    width: 148px;
 
}
.customer-profile .add-story-button3
{

margin: 16px 0 0;
    padding: 5px 15px;
    text-align: center;
    width: 148px;
 
}
.customer-profile .button a
{
color:#fff;
text-decoration:none;
}

.salon .brand-info h1.brand-info-title
{
font-size:22px;
}

.salon .brand-info .info-left 
{font-family:garamond;
font-size:14px;
}
.customer-profile .salon h3.title
{
font-size:19px;
}
.claim-text
{
margin-top:28px;
}
.claim-text a
{
 text-decoration:none;
 color:#333;
}

.salon h1,.salon h3
{
line-height:24px;
}

.brand-info-image iframe
{
max-width:100%;
}
.customer-profile .mobile-display a.right-arrow
{
margin-top: -2px;
}

.salon-banner
{
position:relative;
}
.salon-banner .salon-address
{
position:absolute;
left:50px;
bottom:100px;
 background: rgba(0, 0, 0, 0.65); 
 padding:20px;
}
.salon-banner .salon-address h1
{
 font-size:20px;
 color:#fff;
} 
.salon-banner .salon-address p
{
color:#fff;
}
</style>
<script>
$('#getLoginPopup21').on('click', function() {
  
 $('#login-popup-outer').fadeIn(1000);
 $('#redir').val('http://hairlibrary.com/upload-photo/?biz=<?php echo $slug;?>');
 
});
$('#getLoginPopup211').on('click', function() {
  
 $('#login-popup-outer').fadeIn(1000);
 $('#redir').val('http://hairlibrary.com/upload-photo/?biz=<?php echo $slug;?>');
 
});
</script>
<?php get_footer(); ?>
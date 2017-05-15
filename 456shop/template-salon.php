<?php
/*
Template Name: Template Salon
*/
?>
<?php get_header(); 

$slug=$_GET['n'];
$salon=getSalon($slug);
?>
<?php


 $current_user = wp_get_current_user();
 //Source: functions/likes.php
 //returns true if a product or photo is liked either false.
 $is_liked=isLiked($current_user->ID,$salon->user_id,'salon');
  //Source: functions/likes.ph
  //returns total likes of a product or photo
 $likes=getTotalLike($salon->user_id,'salon');

//Source: functions/likes.php
 //returns true if a product or photo is followed either false.
 $is_followed=isFollowed($current_user->ID,$salon->user_id,'user');
 
//Source: functions/likes.php
 //returns total number of followers of a product or photo
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
		<div id="main" class="wrap customer-profile salon">
			<div class="container">
				<div class="row-fluid brand-info">
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
						<h1 class="brand-info-title" style="margin-bottom:15px;margin-top: 13px;"> <?php echo getFormatedDes($salon->name);?> </h1>	
						
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
					  <?php 
                       $ph=substr($salon->phone,0,3).'-'.substr($salon->phone,3);
					  ?> 
					  <p>Phone: <?php echo $salon->area_code.'-'.$ph;?></p>
				
					  
					<div class="follow-buttons section desktop-display" style="margin-top:30px">
		              <?php if(!is_brand($current_user->ID)) {?>
					  	<?php if($current_user->ID>0){?>
						<a style="<?php if($is_followed) echo 'display:none';?>" class="follow-button" id="heartf" title="Follow" href="javascript:saveFollow();">Inspired</a>
						
						<a style="<?php if(!$is_followed) echo 'display:none';?>"  class="follow-button after-follow" id="heartf-after" href="javascript:void();" title="You Already Inspired By This Salon">Following</a>
						<?php } else { ?>	
						<a class="follow-button " id="getHeartLoginPopup" title="Inspired" href="javascript:void();"></a>
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
				<div class="row-fluid">
                    <div class="span12 sectionf">
                     <h3 class="title title-1 desktop-display">     <?php echo getFormatedDes($salon->name);?>    's Hair Stories <a class="right-arrow" href="http://hairlibrary.com/my-hairstory/?id=366"></a></h3>
					 <h3 class="title title-1 mobile-display" style="font-size:16px">  Tagged Hair Stories <a class="right-arrow" href="http://hairlibrary.com/my-hairstory/?id=366"></a></h3>
					 
					  <div class="row-fluid">
					  
				     <?php 
					 //Source: functions/salons.php
					 $photos=getSalonHairStories($salon->id,4,true);
					 
					 if(count($photos)>0)
				   {	
				   
		
				   ?>			
			    <ul>
				
				       <?php  foreach($photos as $photo){
					   
					   ?>
					    <li class="span3">
					   		<?php 
							 /**Source: functions/photostore.php
							Returns photo html layout of given photo id**/
							echo getPhotoHtml($photo); ?>
						 	</li>
					<?php	} ?>
						 
				 </ul>
				
				<?php }
					  else
						{?>
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
<style>

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
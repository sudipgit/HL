
<?php
/*
Template Name: Customer profile
*/

global $post;
$user=wp_get_current_user();
$current_user=$user;
//var_dump($user);
 if( $user->ID < 1) {
 ?>
 <script>
 window.location.href = '<?php bloginfo('url');?>/login/';
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

?>
<?php get_header(); ?>
<!--<link href="<?php bloginfo('template_url'); ?>/brand-admin/common/theme/css/style-dark.css?1369414383" rel="stylesheet" />-->
<link href="<?php bloginfo('template_url'); ?>/brand-admin/common/theme/css/glyphicons.css" rel="stylesheet" />
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>$(function() {$( "#accordion" ).accordion();});</script>-->
	<!--<script type="text/javascript" src="<?php bloginfo('template_url');?>/cropimages/scripts/jquery.min.js"></script>-->
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/cropimages/scripts/jquery.imgareaselect.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/cropimages/css/imgareaselect-default.css" />
	
<?php 
 include_once('brand-admin/templates/functions.php');


$is_set=false;
$is_pass=false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{

  if($_POST['reset_pass']==1)
  {
  
    $is_set=resetPassword($_POST,$user);
	 $is_pass=true;
  }


}


$m=$_GET['m'];

if($m || $is_pass)
  $is_setm=true;
 else $is_setm=false 
?>

<script>

pageno1=1;
pageno2=1;

function getMoreProducts(total,procssid,contcssclass,page)
{

cssclass="."+contcssclass;

 $(cssclass).show();
 setTimeout(
  function() 
  {
       $(cssclass).hide(); 
	if(page==1)   
    start_id=(pageno1*9)+1;
	else if(page==2)   
    start_id=(pageno2*9)+1;
	
  end_id=start_id+14;
 for(i=start_id;i<=end_id;i++)
 {
  id="#"+procssid+i;
  $(id).show();
  
  }
  
   if(page==1)
   pageno1++;
   else  if(page==2)
   pageno2++;

  }, 3000);
  
  
 

}





function getSizes(im,obj)
	{
		var x_axis = obj.x1;
		var x2_axis = obj.x2;
		var y_axis = obj.y1;
		var y2_axis = obj.y2;
		var thumb_width = obj.width;
		var thumb_height = obj.height;
		if(thumb_width > 0 )
			{
				
			
				if(confirm("Do you want to save image..!"))
					{
					   var img=$("#image_name").val();
					   var userid=$("#img-userid").val();
					
						$.ajax({
							type:"GET",
							url:"<?php bloginfo('url');?>/ajax_image.php?t=ajax&img="+img+"&w="+thumb_width+"&h="+thumb_height+"&x1="+x_axis+"&y1="+y_axis+"&userid="+userid,
							cache:false,
							success:function(rsponse)
								{
						
								$("#profile-thumb").html("<img src='<?php bloginfo('template_url');?>/wp-content/uploads/userphoto/"+userid+"/"+rsponse+"' />");
								 $('#crop-image-popup').hide(1000);
								}
						});
					
					
					}
			}
		else
			alert("Please select portion..!");
	}

$(document).ready(function () {
    $('img#photo212').imgAreaSelect({
        aspectRatio: '1:1',
        onSelectEnd: getSizes
    });
	//$("#accordion" ).accordion();
});

function reizePopup()
{
$('#crop-image-popup').show(1000);
}
function closePopup()
{
$('#crop-image-popup').hide(1000);
}


</script>
 <link href="<?php bloginfo('template_url'); ?>/brand-admin/css/custom.css" rel="stylesheet" />	
		<div id="main" class="wrap post-template">
			<div class="container">
				
				<div class="row-fluid" style="padding-top:0">	
					<div class="span12 post-page customer-profile">		
					 <?php 
					
					   
					   $user=wp_get_current_user();
					   $answers=getUserAnswers($user->ID);
					   
					   $matches=getMatchingProducts($user->ID);
					  // $mylibrary=getMyLibrary($user->ID);
					  //  $mylibrary=getAllOrderedProducts($user->ID);
					    $mylibrary=getAllLikedProducts($user->ID);
					
				
                       $cat=getTerm($answers[3]);					   
					   $catname=$cat->slug;
					   $avatar=get_user_meta($user->ID, 'user_avatar', true);
					   if(!$avatar)
					    $avatarpath='http://hairlibrary.com/wp-content/uploads/userphoto/ProfilePlaceholder.jpg';
						else
						 $avatarpath='http://hairlibrary.com/wp-content/uploads/userphoto/'.$user->ID.'/'.$avatar;
						 
					 $thumb=get_user_meta($user->ID, 'user_thumb', true);	 
					  if(!$thumb)
					    $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/thumb.jpg';
						else
						 $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/'.$user->ID.'/'.$thumb;
					 ?> 
                    
					<div class="row-fluid profile-details">	
					<div id="crop-image-popup" style="display:none">
					 <a href="javascript:closePopup();">Close</a>
					<h4>Please drag on the image</h4>
					<img src='<?php bloginfo('url'); ?>wp-content/uploads/userphoto/<?php echo $user->ID;?>/<?php echo get_user_meta($user->ID, 'user_profile_image', true);?>' id="photo212" style='max-width:500px'>
					<form><input type="hidden" name="image_name" id="image_name" value="<?php echo get_user_meta($user->ID, 'user_profile_image', true);?>" />
					<input type="hidden" name="userid" id="img-userid" value="<?php echo $user->ID;?>" /></form>
					</div>
					<div class="span6 cat" style="margin-left:0;">
					<?php if($is_set) {?>
					<p id="success-msg">Password has beed changed Successfully</p>
					<?php } ?>
					   	 <h4><?php echo $user->display_name;?>&#39;s Hair Library</h4>
					     <p class="user-style">	<?php echo get_user_meta($user->ID, 'who_are_you', true); ?></p>
					   <p><?php echo get_user_meta($user->ID, 'user_bioinfo', true); ?></p>
					   <div class="social-md-bar">
							<div class="line"></div>
							<div class="media-bar">
								<ul>
								    <?php if(get_user_meta($user->ID, 'user_facebook', true)!=""){ ?>
									<li><a title="Facebook" class="facebook" href="<?php echo get_user_meta($user->ID, 'user_facebook', true);?>">Facebook</a></li>
									<?php } ?>
									
									<?php if(get_user_meta($user->ID, 'user_twitter', true)!=""){ ?>
									<li><a title="Twitter" class="twitter" href="<?php echo get_user_meta($user->ID, 'user_twitter', true);?>">Twitter</a></li>
									<?php } ?>
									
							      <?php

								  if(get_user_meta($user->ID, 'user_pinterest', true)!=""){ ?>
									<li><a title="Pinterest" class="pinterest" href="<?php echo get_user_meta($user->ID, 'user_pinterest', true);?>">Pinterest</a></li>
									<?php } ?>
								   <?php if(get_user_meta($user->ID, 'user_thumblr', true)!=""){ ?>
									<li><a title="Tumblr" class="thumblr" href="<?php echo get_user_meta($user->ID, 'user_thumblr', true);?>">Tumblr</a></li>
									<?php } ?>
									<?php if(get_user_meta($user->ID, 'user_youtube', true)!=""){ ?>
									<li><a title="YouTube" class="youtube" href="<?php echo get_user_meta($user->ID, 'user_youtube', true);?>">Youtube</a></li>
									<?php } ?>
									
									
									
								</ul>
								<div class="clear"></div>
							</div>
						</div>
					   
					 </div>
					<div class="span6 cat">
					
					   
					  	<div id="profile-thumb" class="profile-image">
		               <img alt="" class="shadow-s3 wpstickies" src="<?php echo $avatarpath;?>" />
		              </div>
					
				    <a href="javascript:reizePopup();">Resize Profile Image</a>
					 </div>
					
					</div>
					
					<div class="profile-tabs">
					

		
			<div class="span12">
				<ul class="tabs">
					<li class="tab-item <?php if(!$is_setm || $m=='match') echo 'active';?>" id="tab1"> My Matches</li>
					<li class="tab-item <?php if(!$is_pass && $m=='library') echo 'active';?>" id="tab2">My Hair Library</li>
					<li class="tab-item" id="tab3">My Hair Profile</li>
					<li class="tab-item" id="tab6">Followers</li>
					<li class="tab-item <?php if(!$is_pass && $m=='story') echo 'active';?>" id="tab4">My Hair Story</li>
					<li class="tab-item <?php if($is_pass || $m=='account') echo 'active';?>" id="tab5">My Account</li>
				</ul>
				<div class="clear"></div>
				
			   <div class="panel entry-content <?php if($is_setm && $m!='match') echo 'hide';?>" id="tab11">
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
						<h3 class="title">Best Matches</h3>
						<?php if($matches) {?>
                           <ul class="products">
						   
						   <?php 
						   $i=1;
						   foreach($matches as $match) {
                            $class="";
							if($i%3==0)
							  $class="last";
							else if($i%3==1)
							   $class="first";
                             
						   ?>
							
                           <li id="pno-<?php echo $i;?>" class=" span4 product <?php echo $class;?>" <?php if($i>9) echo 'style="display:none"';?>>
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                             <!-- <span class="onsale">Sale!</span>-->
							  <span class="onsale "></span>
                           <?php getProductContent($match,$current_user->ID);?>
                    
                            </div>
						   </li>
						   <?php $i++;} ?>
						   </ul>
						   
						   <div class="loading-more">
						   <img style="margin:90px 200px" src="<?php bloginfo('template_url'); ?>/assets/img/loading_pink.gif"/>
						   </div>
						   <a class="see-more" href="javascript:void();" onclick="getMoreProducts(<?php echo count($matches);?>,'pno-','loading-more',1);">See More</a>
						   
						   <?php } else { ?>
						   
						   <p> No product matches</p>
						   <?php } ?>
						</div>
						
						
						<div class="woocommerce recommended">
						<h3 class="title"> Recommended Matches</h3>
						
						
						<?php 
						$recomends=getRecommendedMatchingProducts($current_user->ID);
						
						if($recomends) {?>
                           <ul class="products">
						   
						   <?php 
						   $i=1;
						   foreach($recomends as $match) {
                            $class="";
							if($i%3==0)
							  $class="last";
							else if($i%3==1)
							   $class="first";
                             
						   ?>
							
                           <li id="r-pno-<?php echo $i;?>" class=" span4 product <?php echo $class;?>" <?php if($i>9) echo 'style="display:none"';?>>
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                             <!-- <span class="onsale">Sale!</span>-->
							  <span class="onsale "></span>
                           <?php getProductContent($match,$current_user->ID);?>
                    
                            </div>
						   </li>
						   <?php $i++;} ?>
						   </ul>
						   
						   <div class="loading-more2">
						   <img style="margin:00px 200px" src="<?php bloginfo('template_url'); ?>/assets/img/loading_pink.gif"/>
						   </div>
						   <a class="see-more" href="javascript:void();" onclick="getMoreProducts(<?php echo count($recomends);?>,'r-pno-','loading-more2',2)">See More</a>
						   
						   <?php } else { ?>
						   
						   <p> No product matches</p>
						   <?php } ?>
						</div>
						
						
						
						
						
					</div>
					</div>
			   </div>
			   <!-- Product library-->
			    <div class="panel entry-content <?php if($is_pass || $m!='library') echo 'hide';?>" id="tab21">
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
							 <?php if($matches && count($matches)>0 && in_array($match,$matches)) { ?>
							  <span class="onsale"></span>
                          <?php }?>
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
			
			   <div class="panel entry-content hide" id="tab31">
				<div class="row-fluid match-products" id="panel-content">	
					<form name="hair_style" action="<?php bloginfo('url'); ?>/saveuserprofile.php" method="post">
					<div id="accordion">
					 <h3>What is your Hair Style?</h3>
					   <div class="question-images panel">
				    <ul>
					  <li>
					   <img alt="Weave" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/weave.jpg"/>
					  <label class="hc_style"><input type="radio" name="cat" value="249" <?php if($answers){ if($answers['3']=='249') echo 'checked="checked"';}?>> Weave </label>
					  </li>
					  <li>
					   <img alt="Relaxed Straight Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/relaxed_straight_Hairstyle.jpg"/>
					  <label class="hc_style"><input type="radio" name="cat" value="188" <?php if($answers){ if($answers['3']=='188') echo 'checked="checked"';}?>> Relaxed Straight </label>
					  </li>
					  <li>
					   <img alt="Braids" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/braids.jpg"/>
					  <label class="hc_style"><input type="radio" name="cat" value="250" <?php if($answers){ if($answers['3']=='250') echo 'checked="checked"';}?>> Braids </label>
					  </li>
					  <li>
					   <img alt="Wigs" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/wigs.jpg"/>
					  <label class="hc_style"><input type="radio" name="cat" value="187" <?php if($answers){ if($answers['3']=='187') echo 'checked="checked"';}?>> Wigs </label>
					  </li>
					  <li>
					   <img alt="Dreds" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/Dreadlocks.png"/>
					  <label class="hc_style"><input type="radio" name="cat" value="179" <?php if($answers){ if($answers['3']=='179') echo 'checked="checked"';}?>> Dreds </label>
					  </li>
					
					  <li>
					   <img alt="Naturally Curly Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/Naturally_Curly.jpg"/>
					  <label class="hc_style"><input type="radio" name="cat" value="189" <?php if($answers){ if($answers['3']=='189') echo 'checked="checked"';}?>> Naturally Curly </label>
					  </li>
					  <li>
					   <img alt="Naturally Straight Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/Naturally_Straight.JPG"/>
					  <label class="hc_style"><input type="radio" name="cat" value="180" <?php if($answers){ if($answers['3']=='180') echo 'checked="checked"';}?>> Naturally Straight </label>
					  </li>
					</ul>
					<div class="clear"></div>
				   </div>	
					
					
				 <h3 class="hair-type pink">What is your hair Length?</h3>
				   <div class="question-images panel">
				    <ul>
					  <li>
					   <img src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Very_Short.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="v_short" <?php if($answers){ if($answers['5']=='v_short') echo 'checked="checked"';}?>> Very Short </label>
					  </li>
					  <li>
					   <img src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Short.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="short" <?php if($answers){ if($answers['5']=='short') echo 'checked="checked"';}?>> Short </label>
					  </li>
					  <li>
					   <img src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Medium.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="medium" <?php if($answers){ if($answers['5']=='medium') echo 'checked="checked"';}?>> Medium </label>
					  </li>
					  <li>
					   <img src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Long.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="long" <?php if($answers){ if($answers['5']=='long') echo 'checked="checked"';}?>> Long</label>
					  </li>
					   <li>
					   <img src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Very_Long.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="v_long" <?php if($answers){ if($answers['5']=='v_long') echo 'checked="checked"';}?>>Very Long</label>
					  </li>
					</ul>
					<div class="clear"></div>
				   </div>	 
			
				 <h3 class="hair-type pink">What is your Hair Texture?</h3>
				   <div class="question-images panel">
				    <ul>
					  <li>
					   <img alt="1a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/1a.jpg"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="1a" <?php if($answers){ if($answers['4']=='1a') echo 'checked="checked"';}?>> 1a <span style="left:50px" class="tool-tip">Hair Type 1a is naturally straight hair and the straightest out of all Hair Types. Since there is no discernible wave, the hair lays flat.

</span></label>
					  </li>
					  <li>
					  <img alt="2a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2a.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="2a" <?php if($answers){ if($answers['4']=='2a') echo 'checked="checked"';}?>> 2a <span style="left:-100px" class="tool-tip">Type 2a is gently, slightly "s" waved hair that stays closer to the head. It does not bounce, even when it is layered. 2a hair is  fine, thin and very easy to manage. It is also generally easily to straighten or curl. </span></label>
					  </li>
					  <li>
						<img alt="2b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2b.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="2b" <?php if($answers){ if($answers['4']=='2b') echo 'checked="checked"';}?>> 2b <span style="left:-180px" class="tool-tip">The wave or curl forms throughout the hair in the shape of the letter "s". Type 2b hair stays close to the head and does not bounce up, even when it is layered. </span></label>
					  </li>
					  <li>
					   <img alt="2c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2c.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="2c" <?php if($answers){ if($answers['4']=='2c') echo 'checked="checked"';}?>> 2c<span style="left:-300px" class="tool-tip">Type 2c is thicker, coarser wavy hair that is composed of a few more actual curls, as opposed to just waves. Type 2c hair tends to be more resistant to styling and will frizz easily. </span></label>
					  </li>
					  <li>
					   <img alt="3a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3a.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="3a" <?php if($answers){ if($answers['4']=='3a') echo 'checked="checked"';}?>> 3a <span style="left:-410px" class="tool-tip"> Type 3a curls show a definite large loopy "S" pattern. Curls are well-defined and springy. Curls are naturally big, loose and often very shiny.

</span></label>
					  </li>
					  <li>
					   <img alt="3b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3b.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="3b" <?php if($answers){ if($answers['4']=='3b') echo 'checked="checked"';}?>> 3b <span style="left:50px" class="tool-tip">People with Type 3b hair have well-defined, springy, copious curls that range from bouncy ringlets to tight corkscrews. 3b curls' circumference are Sharpie size. 

</span></label>
					  </li>
					  <li>
					   <img alt="3c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3c.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="3c" <?php if($answers){ if($answers['4']=='3c') echo 'checked="checked"';}?>> 3c <span style="left:-100px" class="tool-tip">3c hair has voluminous, tight curls in corkscrews, approximately the circumference of a pencil or straw. The curls can be either kinky, or very tightly curled, with lots and lots of strands densely packed together.</span></label>
					  </li>
					  <li>
					   <img alt="4a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4a.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="4a" <?php if($answers){ if($answers['4']=='4a') echo 'checked="checked"';}?>> 4a <span style="left:-180px" class="tool-tip">4a is tightly coiled hair that has an "S" pattern. It has more moisture than 4b; it has a definite curl pattern. The circumference of the spirals is close to that of a crochet needle. The hair can be wiry or fine-textured. </span></label>
					  </li>
					  <li>
					   <img alt="4b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4b.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="4b" <?php if($answers){ if($answers['4']=='4b') echo 'checked="checked"';}?>> 4b <span style="left:-300px" class="tool-tip">Type 4b has a "Z" pattern, less of a defined curl pattern. Instead of curling or coiling, the hair bends in sharp angles like the letter "Z". Type 4 hair has a cotton-like feel.</span></label>
					  </li>
					  <li>
					   <img alt="4c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4c.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="4c" <?php if($answers){ if($answers['4']=='4c') echo 'checked="checked"';}?>> 4c <span style="left:-410px" class="tool-tip"> Type 4c hair is composed of curl patterns that will almost never clump without doing a specific hair style. It can range from fine/thin/super soft to wiry/coarse with lots of densely packed strands. 4c hair has been described as a more "challenging" version of 4b hair.</span></label>
					  </li>
					</ul>
					<div class="clear"></div>
				   </div>	 
				   
	
				 <h3 class="hair-type pink">What is your Hair processes?</h3>
				   <div class="question-images panel">
				    <ul>
					  <li>
					   <img alt="Colored Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/colored_hair.jpg"/>
					  <label class="hc_process"><input type="radio" name="hairProc" value="c_hair" <?php if($answers){ if($answers['8']=='c_hair') echo 'checked="checked"';}?>> Colored Hair </label>
					  </li>
					  <li>
					   <img alt="Relaxed Straight" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/relaxed_straight.jpg"/>
					  <label class="hc_process"><input type="radio" name="hairProc" value="r_straight" <?php if($answers){ if($answers['8']=='r_straight') echo 'checked="checked"';}?>> Relaxed Straight </label>
					  </li>
					  <li>
					   <img alt="Permed Curly" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/Permed_Curly.jpg"/>
					  <label class="hc_process"><input type="radio" name="hairProc" value="p_curly" <?php if($answers){ if($answers['8']=='p_curly') echo 'checked="checked"';}?>> Permed Curly </label>
					  </li>
					  <li>
					   
					  <label class="hc_process"><input type="radio" name="hairProc" value="none" <?php if($answers){ if($answers['8']=='none') echo 'checked="checked"';}?>> None</label>
					  </li>
					</ul>
					<div class="clear"></div>
				   </div>	 
	
				 <h3 class="hair-type pink">What is your Hair Conditions?</h3>
				   <div class="question-images panel">
				    <ul>
					  <li>
					   <img alt="Oily Scalp" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Oily_Scalp.jpg"/>
					  <label class="hc_conditions"><input type="radio" name="hairCond" value="o_scalp" <?php if($answers){ if($answers['7']=='o_scalp') echo 'checked="checked"';}?>> Oily Scalp </label>
					  </li>
					  <li>
					   <img alt="Pattern Baldness" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/pattern_baldness.jpg"/>
					  <label class="hc_conditions"><input type="radio" name="hairCond" value="p_bald" <?php if($answers){ if($answers['7']=='p_bald') echo 'checked="checked"';}?>> Pattern Baldness </label>
					  </li>
					  <li>
					   <img alt="Alopecia" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/alopecia.jpg"/>
					  <label class="hc_conditions"><input type="radio" name="hairCond" value="alopecia" <?php if($answers){ if($answers['7']=='alopecia') echo 'checked="checked"';}?>> Alopecia </label>
					  </li>
					  <li>
					   <img alt="Grey Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Grey_Hair.jpg"/>
					  <label class="hc_conditions"><input type="radio" name="hairCond" value="g_hair" <?php if($answers){ if($answers['7']=='g_hair') echo 'checked="checked"';}?>> Grey Hair </label>
					  </li>
					  <li>
					   <img alt="Split Ends" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Split_Ends.jpg"/>
					  <label class="hc_conditions"><input type="radio" name="hairCond" value="sp_ends" <?php if($answers){ if($answers['7']=='sp_ends') echo 'checked="checked"';}?>> Split Ends </label>
					  </li>
					   <li>
					   <img alt="Split Ends" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/how-to-get-rid-of-dry-itchy-scalp.jpg" width="120"/>
					  <label class="hc_conditions"><input type="radio" name="hairCond" value="sp_ends" <?php if($f_post){ if($f_post['hairCond']=='d_slap') echo 'checked="checked"';}?>> Dry Itchy Scalp </label>
					  </li>
					  <li>
					   
					  <label class="hc_conditions"><input type="radio" name="hairCond" value="normal" <?php if($answers){ if($answers['7']=='normal') echo 'checked="checked"';}?>> Normal</label>
					  </li>
					</ul>
					<div class="clear"></div>
				   </div>	

       
				 <h3>What is Your Hair Description?</h3>
				   <div class="question-images panel">
				    <ul>
					  <li >
					  
					  <label class="hc_descriptions"><input type="checkbox" name="hairDes[]" value="coarse" <?php if($f_post){ if($f_post['hairDes']=='Coarse') echo 'checked="checked"';}?>> Coarse</label>
					  </li>
					   <li >
					  
					  <label class="hc_descriptions"><input type="checkbox" name="hairDes[]" value="soft" <?php if($f_post){ if($f_post['hairDes']=='soft') echo 'checked="checked"';}?>> Soft</label>
					  </li>
					   <li >
					   
					  <label class="hc_descriptions"><input type="checkbox" name="hairDes[]" value="fine" <?php if($f_post){ if($f_post['hairDes']=='fine') echo 'checked="checked"';}?>> Fine</label>
					  </li>
					   <li >
					 
					  <label class="hc_descriptions"><input type="checkbox" name="hairDes[]" value="thin" <?php if($f_post){ if($f_post['hairDes']=='thin') echo 'checked="checked"';}?>> Thin</label>
					  </li>
					 
					</ul>
					<div class="clear"></div>
				   </div>	 
				   
	          


				   
			
				
					
					
					
					</div>
					
					<input type="submit" value="Save Changes" class="button"/>
					<input type="hidden" name="is_hair_style" value="1"/>
					 <input type="hidden" name="user_id" value="<?php echo $user->ID;?>"/>
					  <input type="hidden" name="is_profile" value="0"/>
					</form>
					
					</div>
			</div>
			<div class="panel entry-content photo-store <?php if($is_pass || $m!='story') echo 'hide';?>" id="tab41">
				
				  <div class="innerLR">
				   <div class="row-fluid">
				        <a class=" button" href="<?php bloginfo('url');?>/upload-photo/">Upload Photo</a>
					</div>	
						
				<!-- Photo Store-->
			 <div class="row-fluid">
				
				<?php  $results=getAllPhotos($user->ID);
			
				if(count($results)>0)
				{
				// var_dump($results);
				 foreach($results as $result)
				  {
				?>
				<div class="span3">
				
				  <?php if(count($result)>0){
				  foreach($result as $photo)
				  {
				   
                  
				  ?>
				<div class="photo on-photo feed">
                  	  
				<a href="<?php bloginfo('url'); ?>/photo/?id=<?php echo $photo->id;?>"><img src="<?php bloginfo('url');?>/wp-content/uploads/photostore/<?php echo $photo->user_id;?>/<?php echo $photo->photo;?>"/></a>
				<p><?php echo substr($photo->description,0,100);?></p>
			    
              <?php getHeartButton($photo->id,$current_user->ID,'photo',$photo->id);?>
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
				   			
				</div>
				<?php } } ?>
				</div>
					
					
					
					
				<?php }
				
				}?>	
                </div><!-- end Photo Store-->
		 </div>
	
				  
		  </div>
			<div class="panel entry-content <?php if(!$is_pass && $m!='account') echo 'hide';?>" id="tab51">
				<div class="form edit-form">
				 
				  <div class="innerLR">

	<!-- Widget -->
	<div class="widget widget-tabs border-bottom-none">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<ul>
				<li class="<?php if(!$is_set && $is_pass) echo ''; else echo 'active';?>"><a class="glyphicons edit" href="#account-details" data-toggle="tab"><i></i>Account details</a></li>
				<li class="<?php if(!$is_set && $is_pass) echo 'active';?>"><a class="glyphicons settings" href="#account-settings" data-toggle="tab"><i></i>Account settings</a></li>
			</ul>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
			
				<div class="tab-content" style="padding: 0;">
				
					<!-- Tab content -->
					<div class="tab-pane <?php if( $is_pass) echo ''; else echo 'active';?>" id="account-details">
					 <form class="form-horizontal" name="pro-edit" action="<?php bloginfo('url'); ?>/saveuserprofile.php" method="post" enctype="multipart/form-data">
						<!-- Row -->
						<div class="row-fluid">
						
							<!-- Column -->
							<div class="span12">
							<div class="span6">
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">First Name</label>
									<div class="controls">
										 <input type="text" name="first_name" value=" <?php echo get_user_meta($user->ID, 'first_name', true); ?> " class="span10"/>
										
									</div>
								</div>
								<!-- // Group END -->
								</div>
								<div class="span6">
								<!-- Group -->
								<div class="control-group">
									<label class="control-label">Last Name</label>
									<div class="controls">
										  <input type="text" name="last_name" value=" <?php echo get_user_meta($user->ID, 'last_name', true); ?> " class="span10"/>
										
									</div>
								</div>
								</div>
								<!-- // Group END -->
								
								 <div class="control-group">
			                    <label class="control-label">Who are you?</label>
								<?php $whoval=get_user_meta($user->ID, 'who_are_you', true); 
								
								?>
								<div class="controls">
				                <select name="whoyou">
					                   <option value="Blogger" <?php if($whoval=='Blogger') echo 'selected="selected"';?>>Blogger</option>
					                   <option value="Hairstylist" <?php  if($whoval=='Hairstylist') echo 'selected="selected"';?>>Hairstylist</option>
					                   <option value="Hair Enthusiast" <?php if($whoval=='Hair Enthusiast') echo 'selected="selected"';?>>Hair Enthusiast</option>
						                <option value="Vlogger" <?php if($whoval=='Vlogger') echo 'selected="selected"';?>>Vlogger</option>
					              </select>
								  </div>
					           </div>
							</div>
							<!-- // Column END -->
							
					
							
						</div>
						<!-- // Row END -->
							<div class="separator line bottom"></div>
						
						<div class="row-fluid">
							<div class="span6">
						       <div class="control-group">
									<label class="control-label">Facebook</label>
									<div class="controls">
										  <input type="text" name="facebook" value="<?php echo get_user_meta($user->ID, 'user_facebook', true); ?> " class="span10"/>
										
									</div>
								</div>
								 <div class="control-group">
									<label class="control-label">Pinterest</label>
									<div class="controls">
										  <input type="text" name="pinterest" value="<?php echo get_user_meta($user->ID, 'user_pinterest', true); ?> " class="span10"/>
										
									</div>
								</div>
								 <div class="control-group">
									<label class="control-label">YouTube</label>
									<div class="controls">
										  <input type="text" name="youtube" value="<?php echo get_user_meta($user->ID, 'user_youtube', true); ?> " class="span10"/>
										
									</div>
								</div>
				      	    </div>
							<div class="span6">
						 <div class="control-group">
									<label class="control-label">Twitter</label>
									<div class="controls">
										  <input type="text" name="twitter" value="<?php echo get_user_meta($user->ID, 'user_twitter', true); ?> " class="span10"/>
										
									</div>
								</div>
								 <div class="control-group">
									<label class="control-label">Tumblr</label>
									<div class="controls">
										  <input type="text" name="thumblr" value="<?php echo get_user_meta($user->ID, 'user_thumblr', true); ?> " class="span10"/>
										
									</div>
								</div>
				      	    </div>
					   </div>
						
						<!-- Group -->
						<div class="control-group row-fluid">
							<label class="control-label">About Your Hair</label>
							<div class="controls">
							<textarea name="about" class="wysihtml5 span12" rows="5"><?php echo get_user_meta($user->ID, 'user_bioinfo', true); ?> </textarea>
								
							</div>
						</div>
						<!-- // Group END -->
					<div class="separator line bottom"></div>
					<div class="control-group row-fluid">
					   <label class="control-label">Profile Picture</label>
				      <div class="pro-img">
					  <img width="120" src="<?php echo $thumbpath;?>"/>
					  </div>
					  <input class="p-pic" type="file" name="file"/><br/><span class="img-size">Image Size Must be 600x400</span>
					  <div class="clear"></div>
					  </div>
						
						<!-- Form actions -->
						<div class="form-actions" style="margin: 0;">
							<button type="submit" class="btn button btn-icon btn-primary glyphicons circle_ok"><i></i>Save changes</button>
							<input type="hidden" name="is_profile" value="1"/>
				        	 <input type="hidden" name="user_id" value="<?php echo $user->ID;?>"/>
					        <input type="hidden" name="is_hair_style" value="0"/>
						</div>
						<!-- // Form actions END -->
						</form>
					</div>
					<!-- // Tab content END -->
					
					<!-- Tab content -->
					<div class="tab-pane <?php if(!$is_set && $is_pass) echo 'active';?>" id="account-settings">
					<?php if(!$is_set && $is_pass) {?>
					<p id="success-ms">Your old password does not match</p>
					<?php } ?>
					 <form class="form-horizontal" name="reset-password" action="#" method="post" onsubmit="return validateSetting();">
						<!-- Row -->
						<div class="row-fluid">
						
							<!-- Column -->
							<div class="span3">
								<strong>Change password</strong>
								<p class="muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
							<!-- // Column END -->
						
							<!-- Column -->
							<div class="span9">
								<label for="inputUsername">Username</label>
								<input type="text" id="inputUsername" class="span10" value="<?php echo $user->user_login;?>" disabled="disabled" />
								
								<div class="separator"></div>
								<label for="inputUsername">Email</label>
								<input type="text" id="inputUsername" class="span10" value="<?php echo $user->user_email;?>" disabled="disabled" />
								
								<div class="separator"></div>
										
								<label for="inputPasswordOld">Old password</label>
								<input type="password" name="old_pass" id="inputPasswordOld" class="span10" value="" placeholder="Leave empty for no change" />
								
								<div class="separator"></div>
								
								<label for="inputPasswordNew">New password</label>
								<input type="password" name="new_pass" id="inputPasswordNew" class="span12" value="" placeholder="Leave empty for no change" />
								<div class="separator"></div>
								
								<label for="inputPasswordNew2">Repeat new password</label>
								<input type="password" name="cnew_pass" id="inputPasswordNew2" class="span12" value="" placeholder="Leave empty for no change" />
								<div class="separator"></div>
							</div>
							<!-- // Column END -->
							
						</div>
						<!-- // Row END -->
						
						<div class="separator line bottom"></div>
						
				
						
					
					
						
						<!-- Form actions -->
						<div class="form-actions" style="margin: 0;">
						  <button type="submit" class="btn button btn-icon btn-primary glyphicons circle_ok"><i></i>Save changes</button>
						  <input type="hidden" name="reset_pass" value="1"/>
				   	      <input type="hidden" name="user_id" value="<?php echo $user->ID;?>"/>
					   
						</div>
						<!-- // Form actions END -->
						  </form>
					</div>
					<!-- // Tab content END -->
				</div>
		
		</div>
	</div>
	<!-- // Widget END -->
	
</div>
				 
				   
				
				
				
				
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
					  $avatar=get_user_meta($fuser->ID, 'user_avatar', true);
					   if(!$avatar)
					    $avatarpath='http://hairlibrary.com/wp-content/uploads/userphoto/ProfilePlaceholder.jpg';
						else
						 $avatarpath='http://hairlibrary.com/wp-content/uploads/userphoto/'.$fuser->ID.'/'.$avatar;
				   ?>
				   <li>
				      <a href="<?php bloginfo('url'); ?>profile/?id=<?php echo $fuser->ID;?>"><img width="300" src="<?php echo $avatarpath;?>"/></a>
                      <h5><a href="<?php bloginfo('url'); ?>profile/?id=<?php echo $fuser->ID;?>"><?php echo $fuser->display_name;?></a></h5>					  
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
					  $avatar=get_user_meta($fuser->ID, 'user_avatar', true);
					   if(!$avatar)
					    $avatarpath='http://hairlibrary.com/wp-content/uploads/userphoto/ProfilePlaceholder.jpg';
						else
						 $avatarpath='http://hairlibrary.com/wp-content/uploads/userphoto/'.$fuser->ID.'/'.$avatar;
				   ?>
				   <li>
				      <a href="<?php bloginfo('url'); ?>profile/?id=<?php echo $fuser->ID;?>"><img width="300" src="<?php echo $avatarpath;?>"/></a>
                      <h5><a href="<?php bloginfo('url'); ?>profile/?id=<?php echo $fuser->ID;?>"><?php echo $fuser->display_name;?></a></h5>					  
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
function validateSetting()
{

 var v1=document.forms["reset-password"]["old_pass"].value;
 var v2=document.forms["reset-password"]["new_pass"].value;
 var v3=document.forms["reset-password"]["cnew_pass"].value;
 if(v1=="" || v2=="" || v3=="")
 {
    alert('Field should not be empty');
	return false;
 
 }
 else if(v2!=v3)
 {
   alert('Password does not match');
	return false;
 
 }
 
 
 
 
 
}


var oid="tab1";

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
    <?php
	 $is_show=false;
	 $first_login_time=get_user_meta($user->ID, 'user_first_login_time', true);
	   if($first_login_time=="")
	    {
	         add_user_meta($user->ID, 'user_first_login_time',time()); 
	    }
		else
		{
		   $duration=time()-$first_login_time;
            if($duration>604800)		
            $is_show=false; 			
		
		}
		//var_dump($first_login_time);
	?>
	
	<?php if($is_show) { ?>
	   <a href="javascript:void();" id="take-tour">Take The Tour</a>
	   <?php }?>
		<!--Step Div Start-->
		<div class="bot-part" id="steps-sec" style="display:none">
		<a class="btn-close" id="btn-close" title="Close Guide" href="javascript:void();">close</a>
		      <div class="">			
			<span class="step-no" id="num">1</span>
			<a class="step_back" id="prev-arrow" title="Previous" href="javascript:void();">Previous</a>
			<a class="step_fwd" id="next-arrow" title="Next" href="javascript:void();">Next</a>
			</div>
			<div class="step-des">
				<ul id="step-box" style="width:4500px;margin-left:0;">
					<li>
						<div>
							<h4>Step 1: Fill out your profile</h4>
							<!--<p>Here is the item description. The number will appear to the right of the element.  <a class="edit-profile" href="">Edit Profile <img src="<?php bloginfo('template_url');?>/assets/img/r_ar1.png"/></a></p>-->
						
						</div>
					</li>
					<li>
						<div>
							<h4>Step 2: Get matched with products in your profile</h4>
						<!--	<p>Here is the item description. The number will appear to the right of the element.</p>-->
						</div>
					</li>
					<li>
						<div>
							<h4>Step 3: Browse the library and discover more</h4>
							<!--<p>Here is the item description. The number will appear to the right of the element.</p>-->
						</div>
					</li>
					<li>
						<div>
							<h4>Step 4: Buy products</h4>
							<!--<p>Here is the item description. The number will appear to the right of the element.</p>-->
						</div>
					</li>
					<li>
						<div>
							<h4>Step 5: Rinse and repeat</h4>
							<!--<p>Here is the item description. The number will appear to the right of the element.</p>-->
						</div>
					</li>
				</ul>
			
			</div>
		</div><!--Step Div End-->
		
		  <script>
          var  current=1;
		  var lval=0;
            $('#next-arrow').click(function(){
			  if(lval>-3000)
			  {
			 
                lval=lval-840;
				current++;
			var mar='0 0 0 '+lval+'px';
				$('#step-box').css({margin:mar});
				$('#step-box').css({transition:'all 0.5s linear 0s' });
		
				 document.getElementById('num').innerHTML=current;
             }

				});
				
				   $('#prev-arrow').click(function(){
			  if(lval<0)
			  {
			 
                lval=lval+840;
				current--;
			var mar='0 0 0 '+lval+'px';
				$('#step-box').css({margin:mar});
				$('#step-box').css({transition:'all 0.5s linear 0s' });
		
				 document.getElementById('num').innerHTML=current;
             }

				});
				
			 $('#btn-close').click(function(){
			 $('#steps-sec').fadeOut(1000);
           });	

          $('#take-tour').click(function(){
			 $('#steps-sec').show(1000);
           });			   

</script>    
<?php get_footer(); ?>
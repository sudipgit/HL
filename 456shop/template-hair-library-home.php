<?php
/*
   Template Name: Hair Library Home

*/
?>
<?php get_header ( "newhome" )?>

 <?php 
  global $post;
  global $product;
  $id=get_the_id();
 $current_user = wp_get_current_user();
	$brand= get_brand_info($post->post_author);
 
 
  $is_liked=isLiked($current_user->ID,$id,'product');
  if($current_user->ID<1)
  $msg="Please login to like this Photo";
 if($is_liked) 
  $msg="You already Liked this photo";
 $likes=getTotalLike($id,'product');

 ?>
<script>
	
function saveLike() { 
   
    $.ajax({
            type:"post",
            url:"<?php bloginfo('url');?>/savelike.php",
        data:"uid=<?php echo $current_user->ID;?>&id=<?php echo $id;?>&type=product",
        success:function(data){
             $("#heart").hide(1000);
			  $("#heart-after").show(500);
			 $("#like-no").html('<?php echo $likes+1;?>');
        }
    });
   
	
}

function saveAddToLibrary()
{
 $('#load-add-library').show();
      $.ajax({
            type:"post",
            url:"<?php bloginfo('url');?>/addtolibrary.php",
        data:"uid=<?php echo $current_user->ID;?>&id=<?php echo $id;?>",
        success:function(data){
		  $('#load-add-library').hide();
            $('#content').prepend(data);
        }
    });
   

}

function saveLikeM() { 
  
    $.ajax({
            type:"post",
            url:"<?php bloginfo('url');?>/savelike.php",
        data:"uid=<?php echo $current_user->ID;?>&id=<?php echo $id;?>&type=product",
        success:function(data){
             $("#heartm").hide(1000);
			  $("#heart-afterm").show(500);
			 $("#like-nom").html('<?php echo $likes+1;?>');
        }
    });
   
	
}
</script>
<body data-spy="scroll" data-target="#mainMenu" data-offset="150" class="activateAppearAnimation">
	<!-- Primary Page Layout  ================================================== -->
	<!-- globalWrapper -->
	<div id="globalWrapper"> 
		<!-- slider -->
		<section id="home" class="homeFullScreen fullscreenSection">
			<div class="maskParent" >
				<div class="fullScreenContentWrapper">
					<div class="centerFullScreenContent">
						<div class="blockCenter fullScreenContent fsCaption">
							<!-- carousel -->	
							<div class="item">
								<h1>The World's Hair Texture & <br />Product Matching Resource</h1><br /><br />
								
								<form action="http://HairLibrary.com/" method="get" role="search" class="form-home-search">
									<input style="height:45px; width:500px; color:#666; padding-left:10px;" type="text" placeholder="Search Over 1500  Hair Products, Brands & Collections" class="input-medium" name="s" id="s">
								</form>
								<h2 style=" font-size: 22px;margin-top:10px;">Discover. Get Matched. Collect. Share.</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- slider -->
		<!-- header -->
		<header class="navbar" id="mainHeader" role="banner">
			<nav class="navbar navbar-default scrollMenu" role="navigation" id="mainMenu">
				<div class="navbar-header">
					<!-- responsive navigation -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Logo -->
					<a class="navbar-brand" href="<?php bloginfo('url');?>"><img width="300px" src="http://HairLibrary.com/wp-content/themes/456shop/assets/img/white-horizontal-hl-logo.png" alt="Hair Library"/></a>
				</div>
				<div class="collapse navbar-collapse">
					<!-- Main navigation -->
					<ul class="nav navbar-nav pull-right">
						<li class="my-match-menu">
						<?php if(is_user_logged_in()){
                  $is_salon=get_user_meta($current_user->ID, 'is_salon', true); 
				  if($is_salon==1){ ?>
				   <a  id="match-menu-item" class="menu-item" href="<?php bloginfo('url');?>/quick-match/">Quick Match</a>
				 <?php }else {
				 ?>
				 <a  id="match-menu-item" class="menu-item" href="<?php bloginfo('url');?>/my-matches">My Matches</a>
				 <?php }
				 } else {?>
				 
				 <a id="match-menu-item" class="menu-item" href="javascript:void()" onclick="getMyMatchLoginPopup();" id="get-my-match-login-popup">My Matches</a>
				 <!--<a class="menu-item" href="javascript:void()" id="get-my-match-login-popup" onclick="getCommonLoginPopup('<?php bloginfo('url');?>/my-matches')">My Matches</a>-->
				 <?php } ?>
						</li>
						<li><a class="text-white" href="<?php bloginfo('url'); ?>/hair-stories/">Hair Stories</a></li>
						<li><a class="text-white" href="<?php bloginfo('url'); ?>/products/">Products</a></li>
						
						<?php if(is_user_logged_in()){ ?>
						<li><a class="text-white" href="<?php bloginfo('url'); ?>/feeds/">Activities</a></li>
						  <li><a class="text-white" href="<?php bloginfo('url'); ?>/profile/">Profile</a></li>
						  <li><a class="text-white" href="<?php echo wp_logout_url(); ?>">Logout</a></li>
						  <?php }else{ ?>
						  
						 <li><a class="text-white" id="getLoginPopup" href="javascript:void()"> Log In</a></li>
						  <li id="lastMenu"> <a class="text-white exp-sign" href="<?php bloginfo('url'); ?>/register/">Sign Up</a></li>
						  <?php } ?>
						
					</ul>
				</div>
			</nav>
			 <div id="login-popup-outer">	
                  <div id="login-popup-inner">		
                    <a href="javascript:void()" id="close-login">Close</a>				  
			       <div class="header-login-form">
				   	<form name="loginform" id="loginform" action="<?php bloginfo('url');?>/login/" method="post">
		       <table>
			    <tr><td>Username <span class="star_icon">*</span></td>
				<td><input type="text" name="log" id="user_login" class="input" value="" size="20" placeholder="Username"/></td></tr>
                   <tr><td>Password <span class="star_icon">*</span></td>
			   <td><input type="password" name="pwd" id="user_pass" class="input" value="" size="20" placeholder="password"/></td></tr>
	<tr>
	 <td></td>
	 <td>
	 
	     	<input type="hidden" name="_wp_original_http_referer" value="<?php bloginfo('url');?>/" />

		      <input class="login_submit" class="button" type="submit" name="wp-submit" id="wp-submit" value="Log In" />
			<input id="redir" type="hidden" name="redirect_to" value="<?php bloginfo('url');?>/wp-admin/" />
			<input type="hidden" name="instance" value="" />
			<input type="hidden" name="action" value="login" /></td>
	       </tr>
		   <tr><td></td>
		   <td> Do not have an account? Click <a href="<?php bloginfo('url');?>/register/">HERE </a> to register
                  
                    <br>
                       <a href="<?php bloginfo('url');?>/lostpassword/">FORGOT PASSWORD?</a></td>
		</tr>
      </table>		
		   
		   
		   </form>
			    
				   </div>
				   			
				   
				   
				   
				   </div>
				   </div>
 <div id="my-match-login-popup-outer">	
                  <div id="my-match-login-popup-inner">		
                    <a href="javascript:void()" id="close-my-match-login">Close</a>				  
			       <div class="my-match-login-form">
				   	<form name="loginform" id="loginform" action="<?php bloginfo('url');?>/login/" method="post">
		       <div class="row">
				<div class="col-md-5 form_input_area">		
				<h2>Discover<br /><span>Your Match</span><br />Instantly<br /></h2>
				<h3>w/<span>1,100+ Hair Products</span></h3>
				<input type="text" name="log" id="user_login" class="input" value="" size="20" placeholder="Email"/>                 
			  <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" placeholder="password"/><br />
	 
	     	<input type="hidden" name="_wp_original_http_referer" value="<?php bloginfo('url');?>/" />

		      <input class="button pull-left" type="submit" name="wp-submit" id="wp-submit" value="Log In" />
		      <a class="signup_link button pull-right" href="<?php bloginfo('url');?>/register/">Sign Up</a>
				<div class="clear"></div>
			<input id="redir" type="hidden" name="redirect_to" value="<?php bloginfo('url');?>/my-matches/" />
			<input type="hidden" name="instance" value="" />
			<input type="hidden" name="action" value="login" />
   
       
                  <a class="forgot_pass" href="<?php bloginfo('url');?>/lostpassword/">FORGOT PASSWORD?</a>
				</div>
				<div class="col-md-7">
						<img alt="match login popup photo" src="<?php bloginfo('url');?>/wp-content/themes/456shop/assets/img/match-login-popup-photo.png" width="100%">

			   </div>
			   </div>
			  		   
		   </form>			    
				   </div>
				   </div>
				   </div>
		</header>
		<!-- header -->
		<!-- ======================================= content ======================================= -->
		<section role="main">
			<!-- about -->
			<section id="about"  class="pb60 pt60 arrowBox">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center ">
							<h1 class="arrow">About Hair Library</h1>
						</div>
					</div>
					<!-- tabs -->
					<div class="row">
						<!-- Content -->
						<div class="col-md-12 text-center">
							<p style="color:#000;">Hair Library is the world’s largest hair texture based product matching information resource and growing. We make the process of finding hair products, brand information and inspiration hair stories for you fast and simple. More than just hair products, you are able to be fully immersed into the brands you have come to love with tutorial videos to help guide you along the way. Check out reviews of brands, products, and hair stories from the community to ensure you make the best, most informed selection for your unique hair needs.​</p>
						</div>
					</div><!-- end row -->
				</div> <!-- end container -->
			</section>
			<section class="explore dark-color pt30 pb60">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h1 class="arrow">Explore The Library</h1>	
						</div>
						<div class="col-md-6 col-sm-6 ">
							<article class="boxIcon" data-nekoanim="fadeIn" data-nekodelay="300">
								<a href="#">
									<div class="row">
										<div class="col-md-10 col-sm-10 text-right">
											<h2 style="margin-top: 50px">Hair Products To Match Your Needs</h2>
										</div>
										<div class="col-md-2 col-sm-2">
											<i class="trending-icon iconBig iconRounded"></i>
										</div>
									</div>
								</a>
							</article>
							<article class="boxIcon" data-nekoanim="fadeIn" data-nekodelay="300">
								<a href="#">
									<div class="row">
										<div class="col-md-10 col-sm-10 text-right">
											<h2 style="margin-top: 50px">Share Your Hair Story </h2>
										</div>
										<div class="col-md-2 col-sm-2">
											<i class="Heart-icon iconBig iconRounded"></i>
										</div>
									</div>
								</a>
							</article>
						</div>
						<div class="col-md-6 col-sm-6 ">
							<article class="boxIcon" data-nekoanim="fadeIn" data-nekodelay="300">
								<a href="#">
									<div class="row">
										<div class="col-md-2 col-sm-2">
											<i class="product-library-icon iconBig iconRounded"></i>
										</div>
										<div class="col-md-10 col-sm-10 text-left ">
											<h2 style="margin-top: 50px;margin-left:30px;">User Hair Product Reviews</h2>
										</div>
									</div>
								</a>
							</article>
							<article class="boxIcon" data-nekoanim="fadeIn" data-nekodelay="300">
								<a href="#">
									<div class="row">
										<div class="col-md-2 col-sm-2">
											<i class="hair-story-icon  iconBig iconRounded"></i>
										</div>
										<div class="col-md-10 col-sm-10 text-left ">
											<h2  style="margin-top: 50px;margin-left:30px;">Curate Your Product Library </h2>
										</div>
									</div>
								</a>
							</article>
						</div>
					</div>
					<div class="row" style="margin-top:32px">
						<div class="col-md-12 text-center">
							<?php if(!is_user_logged_in()){ ?>
								<a href="<?php bloginfo('url');?>/register/" class="exp-sign">sign up now</a>
							<?php }?>
						</div>
					</div>
				</div>
				<!-- icon boxes -->
			</section>
				<!-- team -->
			<section id="team" class="trending-products  pt60">
				<div class="container">
					<div class="row"> 
						<div class="col-md-12 pb40 text-center">
							<a href="<?php bloginfo('url');?>/products/"><img width="70px;" src="<?php bloginfo('template_url');?>/assets/img/TrendingIcon.png" alt="Trending Products" /></a>
							<h1 class="arrow">Trending Products</h1>
							<p>
								Notable Products On Hair Library
							</p>
						</div>
					</div>
					<div class="row imgHover neko-hover-2">
						<?php /*$trending=getTrendingProducts(4);
						
                        if(count($trending)>0)
						foreach($trending as $product){
						$brand=null;
						$ppost=get_post($product->id);
						$brand= get_brand_info($ppost->post_author);

						$brandname=getFormatedDes(strtolower($brand->company_name));
						
						$brandname=getFormatedDes($brandname);*/
						$products=getMoreActiveProducts(30);
			if(count($products)>0)
			 shuffle($products);
			  $j=0;
			if(count($products)>0)
			  foreach($products as $product){
			  if($j==4)
			   break;
			   
			$details=get_post($product->object_id);
			
			
			$brand=null;
						
						$brand= get_brand_info($details->post_author);

						$brandname=getFormatedDes(strtolower($brand->company_name));
						
						$brandname=getFormatedDes($brandname);
			
			
			
              $permalink=get_permalink($product->object_id);
						?>	
					
						<div class="col-sm-6 col-md-3" data-nekoanim="fadeInUp" data-nekodelay="0">
							<article>
								<figure>
							<?php	if (has_post_thumbnail($product->object_id)) {
		
											echo get_the_post_thumbnail($product->object_id, array(300,300) );
											}else{ ?>
									<img src="<?php bloginfo('template_url');?>/assets/hl-landing/images/team/team-corporate-1.jpg" alt="" class="img-responsive">
									<?php } ?>
									<figcaption>
										<ul class="socialNetwork mt15">
											<li class="like">
												<?php if($current_user->ID>0){?>
													<a  style="<?php if($is_liked) echo 'display:none';?>" href="javascript:saveLike();" class="tips" title="Like"><img src="<?php bloginfo('template_url');?>/assets/img/new_heart.png"></a>
													<a style="<?php if(!$is_liked) echo 'display:none';?>" class="like-button after-like" id="heart-after" href="javascript:void();" title="You already Liked this Product"><img src="<?php bloginfo('template_url');?>/assets/img/new_heart.png"></a>
												<?php } else { ?>
													<a class="tips like-button " id="getHeartLoginPopup" title="Like" href="javascript:void();"><img src="<?php bloginfo('template_url');?>/assets/img/new_heart.png"></a>
												<?php } ?>
											</li>
											<li class="add-to-library">
												<?php   if($current_user->ID<1) {?>
													<a  class="tips" title="Add To Hair Library" href="javascript:void();" onclick="getCommonLoginPopup();"><img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/makup-box-icon.png" /></a>
													<?php } else { ?>
													<a  class="tips" title="Add To Hair Library" href="javascript:void();" onclick="saveAddToLibrary();"><img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/makup-box-icon.png" /></a>
												<?php } ?>											
											</li>
											<li class="add-hair-story">
												<?php   if($current_user->ID<1) {?>
													<a  class="tips" title="Add Hair Story" id="getLoginPopup2" href="javascript:void();"><img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/hair-story.png" /></a>
													<?php } else {?>
													<a  class="tips" title="Add Hair Story" href="<?php bloginfo('url');?>/upload-photo/?pt=<?php echo $post->post_name;?>"><img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/hair-story.png" /></a>
												<?php }?>
											</li>
											<li class="check-out">
												<?php 				 
													if($brand->allow_dropshipping=="Yes" || $brand->id==6610){
															do_action( 'woocommerce_template_single_add_to_cart' );
													} else {?>
														<a  class="tips" title="Check It Out" target="_blank" href="<?php echo get_post_meta($product->id,'affiliate_link',true);?>"><img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/Cart.png" /></a>			
												<?php }?>
											</li>
										</ul>  
									</figcaption>
								</figure>
								<div class="boxContent text-center">
									<h3><a href="<?php echo $permalink;?>"><?php echo $details->post_title;?></a></h3>
									<a class="brand-name" href="<?php bloginfo('url');?>/brand?n=<?php echo getBrandSlug($brand->user_id);?>"><?php echo $brandname;?></a>
								</div>
							</article>
						</div>
						<?php $j++; } ?>
					
					</div>
				</div>
			</section>
			<!-- team -->
			<!-- about -->
			<section id="work" class="pt60">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center ">
						<img width="70px;" src="<?php bloginfo('template_url');?>/assets/img/icons/makup-box-icon.png" alt="Trending Products" />
							<h1 class="arrow">DISCOVERY NEW BRANDS, INSPiRING HAIR STORIES & 1,500+ PRODUCTS</h1>
							<p>Whether you're searching for your hair product, details about a dew discovery, our hair texture matching technology has got you covered.</p>
						</div>
					</div>
				</div>
				
				
				
				     
				<!-- works -->
				<section id="homePortfolio" class="imgHover clearfix portfolioMosaic mosaic3 neko-hover-3 pt30 ajaxPortfolio">
					<!-- portfolio item -->
					
					<?php 
			          	
						$subs = new WP_Query( array( 'post_parent' => 5898, 'post_type' => 'page','posts_per_page'=>6 ));
					
						if( $subs->have_posts() ) : while( $subs->have_posts() ) : $subs->the_post();
						?>	
			
					<article>
						<figure>
							<?php 	echo get_the_post_thumbnail($post->ID, array(400,300) );?>	
							<figcaption>
								<h2><?php the_title();?></h2>
								
								<a href="<?php the_permalink();?>" title="Full width image" class="pItemLink" data-ajaxportpos="0">
									View more
								</a>
							</figcaption>			
						</figure>
					</article>						

                        <?php endwhile; endif; wp_reset_postdata(); ?>	
						
					

				
				</section>
				<!-- works -->
			</section>
			<!-- icon boxes -->
				
			<!-- team -->
			<!--<section id="team" class=" pt60">
				<div class="container">
					<div class="row"> 
						<div class="col-md-12 pb40 text-center">
							<img width="70px;" src="<?php bloginfo('template_url');?>/assets/img/new_heart.png" alt="Trending Products" />
							<h1 class="arrow">Meaningful Reviews</h1>
							<p>
								User Reviews Of Hair Products 
							</p>
						</div>
					</div>
						
						<div class="row imgHover neko-hover-2">
						<?php 
							$members = getCommentatorWithProfilePic();
							foreach($members as $member){
								$avatar=get_user_meta($member->ID, 'user_avatar', true); 
								$blogger=get_user_meta($member->ID, 'who_are_you', true);
								if(!$blogger || $blogger=="")
									$blogger='N/A';							
						?>
						
						<div class="col-sm-6 col-md-3" data-nekoanim="fadeInUp" data-nekodelay="0">
							<article>
								<figure>
									<img src="http://hairlibrary.com/wp-content/uploads/userphoto/<?php echo $avatar;?>" alt="" class="img-responsive">
									
								</figure>
								<div class="boxContent text-center">
									<h3><a href="<?php bloginfo('url');?>/profile/?n=<?php echo $member->user_login;?>"><?php echo getFormatedDes($member->first_name);?></a></h3>
									<p class="location <?php echo str_replace(' ',"-",$blogger);?>"><?php echo $blogger; ?></p>
								</div>
							</article>
						</div>
						
						<?php } ?>
					</div>
				</div>
			</section>-->
			<!-- team -->
			<!-- team -->
			<section id="team" class="featured-hair-story pt60">
				<div class="container">
					<div class="row"> 
						<div class="col-md-12 pb40 text-center">
							<a href="<?php bloginfo('url');?>/hair-stories/"><img width="70px;" src="<?php bloginfo('template_url');?>/assets/img/icons/hair-story.png" alt="Trending Products" /></a>
							<h1 class="arrow">Featured Hair Stories</h1>
							<p>
								Discover The Product Libraries Created By People Just Like You.
							</p>
						</div>
					</div>
					<div class="row imgHover neko-hover-2">
					<?php $photos=getAllPhotos(null,4,true);
					 
					 if(count($photos)>0)
				   {	
				   foreach($photos as $photo){
				   $year=date('Y',$photo->created);
				  $current_user = wp_get_current_user();
					 $thumbpath=getThumbPath($photo->user_id);
					 $puser_info=get_userdata( $photo->user_id );
					 $tag_products=getTaggedProductIds($photo->id);
					 $product=get_post($tag_products[0]->product_id);
					  $brand= get_brand_info($product->post_author);
				  //var_dump($brand);
				   ?>
				   
				   <div class="col-sm-6 col-md-3" data-nekoanim="fadeInUp" data-nekodelay="300" >
							<article>
								<figure>
									<img src="http://hairlibrary.com/wp-content/uploads/photostore/<?php echo $year;?>/<?php echo $photo->photo;?>" alt="" class="img-responsive">
									<!--
									<figcaption>
										<ul class="socialNetwork mt15">
											<li><a href="#" class="tips" title="follow me on Facebook"><i class="icon-glyph-320 iconSquared"></i></a></li>
											<li><a href="#" class="tips" title="follow me on Twitter"><i class="icon-glyph-339 iconSquared"></i></a></li>
											<li><a href="#" class="tips" title="follow me on Linkedin"><i class="icon-glyph-308 iconSquared"></i></a></li>
											<li><a href="mailto:your.email@little-neko.com" class="tips" title="Email me"><i class="icon-glyph-334 iconSquared"></i></a></li>
										</ul>  
									</figcaption>
									-->
								</figure>
								<div class="boxContent text-center">
								<h3 class="photo-title"><a href="http://hairlibrary.com/hairstory/?n=<?php echo $photo->slug?>&user=<?php echo $puser_info->user_login?>&brand=<?php echo $brand->company_slug;?>&p=<?php echo $product->post_name?>"><?php echo getFormatedDes($photo->title);?></a></h3>
								<a class="user_first_name" href="http://hairlibrary.com/profile/?n=<?php echo $puser_info->user_login?>"><?php echo getFormatedDes($puser_info->first_name); ?>  </a>
									
									
								</div>
							</article>
						</div>
				   
				   
				   <?php }

				   }  ?>
						
						
					</div>
				</div>
			</section>
			<!-- team -->
			
		
		
			
			<!-- team -->
			<section id="team" class="people-you-know pb60 pt60">
				<div class="container">
					<div class="row"> 
						<div class="col-md-12 pb40 text-center">
						
							<h1 class="arrow">People To Follow</h1>
							<p>
								Discover The Product Libraries Created By People Just Like You.
							</p>
						</div>
					</div>
					<div class="row imgHover neko-hover-2">
						<?php 
							$members = getUsersWithProfilePic();
							foreach($members as $member){
								$avatar=get_user_meta($member->ID, 'user_avatar', true); 
								$blogger=get_user_meta($member->ID, 'who_are_you', true);
								if(!$blogger || $blogger=="")
									$blogger='N/A';							
						?>
						<!-- team item -->
						<div class="col-sm-6 col-md-3" data-nekoanim="fadeInUp" data-nekodelay="0">
							<article>
								<figure>
									<img src="http://hairlibrary.com/wp-content/uploads/userphoto/<?php echo $avatar;?>" alt="" class="img-responsive">
									
								</figure>
								<div class="boxContent text-center">
									<h3 class="photo-title"><p class="location <?php echo str_replace(' ',"-",$blogger);?>"><?php echo $blogger; ?></p></h3>
									<a class="user_first_name" href="<?php bloginfo('url');?>/profile/?n=<?php echo $member->user_login;?>"><?php echo getFormatedDes($member->first_name);?></a>
									
								</div>
							</article>
						</div>
						<!-- team item -->
						<?php } ?>
						
					</div>
				</div>
			</section>
			<!-- team -->
			

			<!-- parallax quote 2 -->
			<section id="paralaxSlice2" data-stellar-background-ratio="0.5">
				<div class="maskParent">
					<div class="paralaxMask opacity5"></div>
					<div class="paralaxText container">
						<div class="row">
							<div class="col-md-12 text-center pt30 pb30">
								<div class="quote">
									<h2>
									“You know you're living right when you wake up, brush your hair - and confetti falls out!”
									-Katy Perry 
									</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- parallax quote 2 -->
			<!-- clients-->
			<section id="clients" class="pt60 pb60">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<a href="<?php bloginfo('url');?>/brands/"><img width="70px;" src="<?php bloginfo('template_url');?>/assets/img/icons/Cart.png" alt="Trending Products" /></a>
							<h1 class="arrow">Featured Brands</h1>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
									
			<div class="desktop-display"><?php if( function_exists('cyclone_slider') ) cyclone_slider('home-page-popup-shop'); ?></div>
			
						</div>
					</div>
				</div>
			</section>
			<!-- clients-->
			<!-- parallax quote 3 -->
			<section id="paralaxSlice3" data-stellar-background-ratio="0.5">
				<div class="maskParent">
					<div class="paralaxMask opacity5"></div>
					<div class="paralaxText container">
						<div class="row">
							<div class="col-md-12">
								<div class="ctaBox ctaBox2Cols ctaBoxArrow">
									<div class="ctaBoxText">
										<h1>
											Discover Your Match, Curate Your Library & Share Your Hair Story.
										</h1>
									</div>
									<div class="ctaBoxBtn">
										<a title="COTTON CANDY one page website template by Little Neko" href="<?php bloginfo('url');?>/register/" target="blank">
											Sign Up Now!
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- parallax quote 3 -->
		</section>
		<script>
			  function getMyMatchLoginPopup()
{
$('#my-match-login-popup-outer').fadeIn(1000);
}
  $('#close-my-match-login').on('click', function() {
$('#my-match-login-popup-outer').fadeOut(1000);

}); 
		</script>
<?php get_footer ( "newhome" )?>	
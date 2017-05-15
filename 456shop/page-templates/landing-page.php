<?php
/*
Template Name: Landing Page
*/
?>
<?php get_header();
$current_user = wp_get_current_user();

 ?>

		<div id="main" class="wrap landing-page">
			<div class="container">
	           
				
				<div class="row-fluid">
					<div class="span12">
						<?php echo do_shortcode('[anything_slides] ');?>	
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="span6">
						
							<a href="http://hairlibrary.com/natural-hair/">
								<img height="300px" width="450px" alt="Trend Report: - The modern lady" src="<?php bloginfo('template_url');?>/assets/img/home/39-Jessies.jpg">
							</a>
					
						
					  </div>
					<div class="span6">
							<a href="http://hairlibrary.com/relaxed-hair/">
								<img height="300px" width="450px" alt="New Designer: - Cédric Charlier" src="<?php bloginfo('template_url');?>/assets/img/home/aesop-jet-set-kit.png">
							</a>
					
					</div>
					<div class="span6" style="margin-left:0;margin-top:10px">
							<a href="#">
								<img height="300px" width="450px" alt="Investment pieces: - Jewelry with edge" src="<?php bloginfo('template_url');?>/assets/img/home/Miss-Jessies-Transitioners-Magic.jpeg">
							</a>
						</div>
					
					
					<div class="span6" style="margin-top:10px">
							<a href="http://hairlibrary.com/hair-extensions/">
							<img height="300px" width="450px" alt="The Detail: - Daytime embellishment" src="<?php bloginfo('template_url');?>/assets/img/home/Shea-Moisture-Transitioning-Kit.jpeg">
							</a>
						</div>
					
					</div>
				</div>
				
				<div class="row-fluid">
				<?php $mymatchs=getMatchingProducts($current_user->ID); ?>
					<div class="span12 sectionf">
						<h3 class="title"> Most Recommended For You</h3>
						<?php if(count($mymatchs)>0){ ?>
                           <ul class="products carousel-slider">
						   
						   <?php 
					  $i=0;
						   foreach($mymatchs as $match)
						   {
						      if($i>3)
							    break;

						   ?>
							 <li class="span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                       					   
						   <span class="onsale"></span>
						 
                             <?php getProductContent($match,$current_user->ID);?>
					         
                            </div>
						   </li>
						   <?php  $i++; } ?>
						</ul>
						<?php } ?>
						
					</div>	
				</div>
				
				<div class="row-fluid">
				 <?php $products=getHairTypeProducts($current_user->ID,4); 
				
				 ?>
					<div class="span12 sectionf">
						<h3 class="title"> Trending Products For Your Hair Style </h3>
						<?php if($products && count($products)>0){ ?>
                           <ul class="products carousel-slider">
						   
						   <?php 
					
						   foreach($products as $match)
						   {
						   

						   ?>
							 <li class="span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                       					   
						    <?php if( in_array($match->id,$mymatchs)) { ?>						   
						   <span class="onsale"></span>
						   <?php } ?>
						 
                             <?php getProductContent($match->id,$current_user->ID);?>
					         
                            </div>
						   </li>
						   <?php } ?>
						</ul>
						<?php } ?>
					
					</div>	
				</div>
				
				<div class="row-fluid">
				 <?php $products=getHairTextureProducts($current_user->ID,4); 
				
				 ?>
					<div class="span12 sectionf">
						<h3 class="title"> Trending Products For Your Hair Texture</h3>
						<?php if(count($products)>0){ ?>
                           <ul class="products carousel-slider">
						   
						   <?php 
					
						   foreach($products as $match)
						   {
					

						   ?>
							 <li class="span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                       					   
						    <?php if( in_array($match->id,$mymatchs)) { ?>						   
						   <span class="onsale"></span>
						   <?php } ?>
						 
                             <?php getProductContent($match->id,$current_user->ID);?>
					         
                            </div>
						   </li>
						   <?php } ?>
						</ul>
						<?php } ?>
					
					</div>	
				</div>
				
				<div class="row-fluid">
				 <?php $photos=getUserTradingPhotos($current_user->ID,4); 
				 
				 ?>
					<div class="span12 sectionf">
						<h3 class="title">  Inspirational Hair Styles For You </h3>
						<?php if(count($photos)>0){ ?>
                           <ul class="products carousel-slider">
						   
						   <?php 
					
						   foreach($photos as $photo)
						   {
						   //var_dump($photo);

						   ?>
							 <li class="span3 product">
						<div class="photo on-photo feed">
						 <div class="img">
			         	   <a href="http://hairlibrary.com/photo/?id=<?php echo $photo->id;?>"><img src="<?php bloginfo('url');?>/wp-content/uploads/photostore/<?php echo $photo->user_id;?>/<?php echo $photo->photo;?>"/></a>
				   
				      <p><?php echo substr($photo->description,0,100);?></p>
				
				   <?php getHeartButton($photo->id,$current_user->ID,'photo',$photo->id);?>
				   
				   </div>
				   <div class="owner-thumb">
				   <div class="thumb">
			        <?php 
					 $photoowner=get_userdata($photo->user_id );
					$thumb=get_user_meta($photo->user_id, 'user_thumb', true);	 
					  if(!$thumb)
					    $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/thumb.jpg';
						else
						 $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/'.$photo->user_id.'/'.$thumb;?>
						 <a href="<?php bloginfo('url');?>/profile/?id=<?php echo $photo->user_id;?>"><img src="<?php echo $thumbpath;?>" width="50"/></a>
						 </div>	
						 <div class="user-act"><h4><a href="<?php bloginfo('url');?>/profile/?id=<?php echo $photo->user_id;?>"><?php echo $photoowner->first_name;?></a> </h4>
						 </div>
					 <div class="clear"></div>
			       </div>
				   			
				         </div>
						   </li>
						   <?php } ?>
						</ul>
						<?php } ?>
						
					</div>	
				</div>
				
				
				
				<div class="row-fluid">
				<?php $products=get_type_products(null,null,'desc');
				
				?>
					<div class="span12">
					<h3 class="title">  Trending Product In Hair Library</h3>
					  <?php if(count($products)>0){ ?>
                           <ul class="products carousel-slider">
						   
						   <?php 
					       $i=0;
						   foreach($products as $match)
						   {
						    
						   ?>
							 <li class="span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                       					   
						   <?php if( in_array($match->id,$mymatchs)) { ?>						   
						   <span class="onsale"></span>
						   <?php } ?>
						 
                             <?php getProductContent($match->id,$current_user->ID);?>
					         
                            </div>
						   </li>
						   <?php 
						   if($i==3)
							 break;
							$i++; 
						   } ?>
						</ul>
						<?php } ?>
						
					
					</div>
				</div>
				
				
				<div class="row-fluid">
				 <?php $feeds=getFollowerActivities($current_user->ID,4); 
				 
				 ?>
					<div class="span12 sectionf">
						<h3 class="title"> Followers Activities </h3>
						<?php if(count($feeds)>0){ ?>
                           <ul class="products carousel-slider">
						   
						   <?php 
					
						   foreach($feeds as $feed)
						   {
						 

						   ?>
					<li class="span3 product">
						<div class="feed photo on-photo">
				  	
				    <?php if($feed->object_type=='photo'){ ?>
				
					
				   <div class="img">
				   <a href="http://hairlibrary.com/photo/?id=<?php echo $feed->photo->id;?>"><img src="<?php bloginfo('url');?>/wp-content/uploads/photostore/<?php echo $feed->photo->user_id;?>/<?php echo $feed->photo->photo;?>"/></a>
				   
				   <p><?php echo substr($feed->photo->description,0,100);?></p>
				
				   <?php getHeartButton($feed->photo->id,$current_user->ID,'photo',$feed->id);?>
				   
				   </div>
				   <div class="owner-thumb">
				   <div class="thumb">
			        <?php $thumb=get_user_meta($feed->actor->ID, 'user_thumb', true);	 
					  if(!$thumb)
					    $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/thumb.jpg';
						else
						 $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/'.$feed->actor->ID.'/'.$thumb;?>
						 <a href="<?php bloginfo('url');?>/profile/?id=<?php echo $feed->actor->ID?>"><img src="<?php echo $thumbpath;?>" width="50"/></a>
						 </div>	
						 <div class="user-act"><h4><a href="<?php bloginfo('url');?>/profile/?id=<?php echo $feed->actor->ID?>"><?php echo $feed->actor->first_name;?></a> </h4><p><?php if($feed->feed_type=='upload') echo 'added'; else echo 'Liked';?> this photo</p></div>
					 <div class="clear"></div>
			       </div>
				  
				   <?php } else if($feed->object_type=='product') {
                       $brand=null;
						   $ppost=get_post($feed->object_id);
						   $brand= get_brand_info($ppost->post_author);
				   ?>
				   
				   <div class="img product-thumb">
							  <a href="<?php echo post_permalink($feed->object_id); ?>">
                                <?php if (has_post_thumbnail($feed->object_id)) {
								
								echo get_the_post_thumbnail($feed->object_id, array(400,400) );
								}else{
								?>
								
								<img width="400" height="400" alt="Placeholder" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/placeholder.png">
								<?php }?>
								</a>
                        <h4> <a href="<?php echo post_permalink($feed->object_id); ?>"><?php echo get_the_title($feed->object_id); ?></a> </h4>      
                    <p class="product-brand-name"> <a href="<?php bloginfo('url');?>/brand?id=<?php echo $brand->user_id;?>"><?php echo $brand->company_name;?></a></p>
					
					
				   		  <?php getHeartButton($feed->photo->id,$current_user->ID,'product',$feed->id);?>
					</div>
					 <?php if($feed->feed_type=='upload'){
					     
                         $time=time()-$feed->created;
                       if($time<604800)  { ?>
					   <span class="new-in">New!</span>
					   <?php } ?>
					 <div class="owner-thumb" style="padding-top:5px">
				     <div class="thumb">
			   
						 <a href="<?php bloginfo('url');?>/profile/?id=<?php echo $feed->actor->ID?>"><img src="http://hairlibrary.com/wp-content/uploads/userphoto/hl_logo.png" width="50"/></a>
                       </div>						
						<div class="user-act"><p style="padding-top:15px">added this product</p></div>
						<div class="clear"></div> 
			       </div>
					 <?php } else {?>
				   <div class="owner-thumb">
				     <div class="thumb">
			        <?php
                  
					$thumb=get_user_meta($feed->actor->ID, 'user_thumb', true);	 
					  if(!$thumb)
					    $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/thumb.jpg';
						else
						 $thumbpath='http://hairlibrary.com/wp-content/uploads/userphoto/'.$feed->actor->ID.'/'.$thumb;?>
						 <a href="<?php bloginfo('url');?>/profile/?id=<?php echo $feed->actor->ID?>"><img src="<?php echo $thumbpath;?>" width="50"/></a>
                       </div>						
						<div class="user-act"><h4><a href="<?php bloginfo('url');?>/profile/?id=<?php echo $feed->actor->ID?>"><?php echo $feed->actor->first_name;?></a> </h4><p><?php if($feed->feed_type=='upload') echo 'added'; else echo 'Liked';?> this product</p></div>
						<div class="clear"></div> 
			       </div><?php } ?>
				   
				   <?php } ?>
				</div>
						   </li>
						   <?php } ?>
						</ul>
						<?php } ?>
						
					</div>	
				</div>
				

			</div>
		</div>
 
<?php get_footer(); ?>
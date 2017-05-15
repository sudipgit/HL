<?php
/*
   Template Name: Salon List Landing

*/
 


?>
<?php get_header("full");
 $current_user = wp_get_current_user();
 $cities=explode('-',$_GET['city']);
 
 $count=count($cities);
 
 $state=$cities[$count-1];
 
 $c=array();
 for($i=0;$i<$count-1;$i++)
  $c[]=$cities[$i];
  
$city=implode(' ',$c);
$salons=getCitySalons($city,$state);
 
 ?>
  
		<div id="main" class="salons">
			<div class="banner-salon">
				<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/women-in-the-street.jpg" />
				<div class="banner-text">
					<h2 class="banner-text-title">SEARCH SALONS BY HAIR TYPE</h2>
					<h2 class="banner-text-description">Find The Salons & Services Specialized In Your Hair Type.<br /> Lets Explore NYC.</h2>
					
					<form action="" method="post" >
						<ul class="location-search" style="display:none;">
							<li><input type="text" name="keyword" value="" placeholder="keyword" /></li>
							<li><input type="text" name="keyword" value="" placeholder="keyword" /></li>
							<li><input type="text" name="keyword" value="" placeholder="keyword" /></li>
							<li><input class="search-btn" type="submit" name="submit" value="Search Salons" placeholder="keyword" /></li>
						</ul>
					</form>
				</div>
			</div>
			<div class="container" style="padding-top:50px;"> 
				<div class="text-center seperator-60">
					<h2 class="block-title">Explore Your Community</h2>
					<h2 class="block-subtitle">See who's is servicing your community and find new salons to explore.</h2>
				</div>
				<div class="row-fluid">	               
					<div class="span8">
						<a class="community-section-hover" href="#">
							<div class="community-section">
							
								<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/gloss_hair_02.jpg">							
								<div class="info">
									<p>Manhattan, NY</p>
								</div>
							
							</div>
						</a>
					</div>
					<div class="span4">
						<a class="community-section-hover" href="<?php bloginfo('url');?>/directory/?city=BROOKLYN-NY">
							<div class="community-section">
						
								<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/curly hair featured.jpg">							
								<div class="info">
									<p>Brooklyn, NY</p>
								</div>
							
						</div></a>
					</div>
				</div>
				<div class="row-fluid">	               
					<div class="span4">
						<a class="community-section-hover" href="#">
						<div class="community-section">
							
								<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/orig.jpg">							
								<div class="info">
									<p>Queens, NY</p>
								</div>
							
						</div></a>
					</div>
					<div class="span8">
						<div class="row-fluid">	 
							<div class="span7">
								<a class="community-section-hover" href="#">
								<div class="community-section">
								
										<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/1731440_orig.jpg">							
										<div class="info">
											<p>Staten Island, NY</p>
										</div>
									
								</div></a>
							</div>
							<div class="span5">
								<a class="community-section-hover" href="<?php bloginfo('url');?>/directory/?city=Bronx-NY">
								<div class="community-section">
									
										<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/B4_S5_P8.jpg">							
										<div class="info">
											<p>Bronx, NY</p>
										</div>
									
								</div></a>
							</div>
						</div>
					</div>
				</div>
				<div class="text-center seperator-60" style="padding-top:44px;">
					<h2  class="block-title">Recent Listings</h2>
					<h2 class="block-subtitle">Discover some of our best listings</h2>
				</div>
				<div class="row-fluid">					
					<div class="span4 first">
						<div class="salon-info">
							<a class="hover-effect" href="<?php bloginfo('url');?>/single-salon/?n=<?php echo $salon->slug;?>"><img src="https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/Stocksy_txp782c31421CE000_Medium_85879-1024x682.jpg">
								<div class="info">
									<h4 class="salons-title">Salon Title</h4>
									<p>398 SPRINGFIELD AVE</p>
									<p>NEWARK, NJ</p>	 
									<p>Phone: (973) 967-1</p>
								</div> 
							</a>
						</div> 
					</div>
					<div class="span4 ">
						<div class="salon-info">
							<a class="hover-effect" href="<?php bloginfo('url');?>/single-salon/?n=<?php echo $salon->slug;?>"><img src="https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/Stocksy_txp782c31421CE000_Medium_85879-1024x682.jpg">
								<div class="info">
									<h4 class="salons-title">Salon Title</h4>
									<p>398 SPRINGFIELD AVE</p>
									<p>NEWARK, NJ</p>	 
									<p>Phone: (973) 967-1</p>
								</div> 
							</a>
						</div> 
					</div>
					<div class="span4 ">
						<div class="salon-info">
							<a class="hover-effect" href="<?php bloginfo('url');?>/single-salon/?n=<?php echo $salon->slug;?>"><img src="https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/Stocksy_txp782c31421CE000_Medium_85879-1024x682.jpg">
								<div class="info">
									<h4 class="salons-title">Salon Title</h4>
									<p>398 SPRINGFIELD AVE</p>
									<p>NEWARK, NJ</p>	 
									<p>Phone: (973) 967-1</p>
								</div> 
							</a>
						</div> 
					</div>
					<div class="span4 first">
						<div class="salon-info">
							<a class="hover-effect" href="<?php bloginfo('url');?>/single-salon/?n=<?php echo $salon->slug;?>"><img src="https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/Stocksy_txp782c31421CE000_Medium_85879-1024x682.jpg">
								<div class="info">
									<h4 class="salons-title">Salon Title</h4>
									<p>398 SPRINGFIELD AVE</p>
									<p>NEWARK, NJ</p>	 
									<p>Phone: (973) 967-1</p>
								</div> 
							</a>
						</div> 
					</div>
					<div class="span4 ">
						<div class="salon-info">
							<a class="hover-effect" href="<?php bloginfo('url');?>/single-salon/?n=<?php echo $salon->slug;?>"><img src="https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/Stocksy_txp782c31421CE000_Medium_85879-1024x682.jpg">
								<div class="info">
									<h4 class="salons-title">Salon Title</h4>
									<p>398 SPRINGFIELD AVE</p>
									<p>NEWARK, NJ</p>	 
									<p>Phone: (973) 967-1</p>
								</div> 
							</a>
						</div> 
					</div>
					<div class="span4 ">
						<div class="salon-info">
							<a class="hover-effect" href="<?php bloginfo('url');?>/single-salon/?n=<?php echo $salon->slug;?>"><img src="<?php bloginfo('template_url');?>/assets/img/images.jpg">
								<div class="info">
									<h4 class="salons-title">Salon Title</h4>
									<p>398 SPRINGFIELD AVE</p>
									<p>NEWARK, NJ</p>	 
									<p>Phone: (973) 967-1</p>
								</div> 
							</a>
						</div> 
					</div>					
				</div>
            </div>
			<div class="exposer-section seperator-60" style="margin-top:70px;">
				<div class="row-fluid">
					<div class="span6">
						<div class="exposer-text">
							<h2  class="block-title">Get Matched With Salons Based On Hair Type Texture & Services.</h2>
							<p>We live in a world  with everything at our fingertips. Finally you can discover salon and professionals the specialize in your specific needs and read the hair stories and reviews left my previous customers. You can also see what types of products the salon favor before you arrive. Its equally as important to make sure that you are matched with the right product and also the best professional. </p>
							<p><a class="button" href="<?php bloginfo('url');?>/how-it-works/">How It Works</a></p>
						</div>
					</div>
					<div class="span6">
						<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/jamie-nelson6.png" />
					</div>
				</div>
			</div>
			<div class="container">
				<div class="text-center mt-60  mb-30">
					<h2 class="block-title desktop-display">Featured Hair Library Products</h2>
					<h2 class="block-subtitle desktop-display">Notable Products On Hair Library</h2>
					<h2 class="block-title mobile-display">Featured Products</h2>
				</div>
				
						<?php 
						$featured_products=getRandomProducts(4);
						$image=get_the_post_thumbnail($featured_product->ID, array(200,200) );
						 if(count($featured_products)>0)
				   {	
				     ?><div class="row-fluid products mb-20"><?php
					
				   foreach($featured_products as $featured_product){?>
									
							<div class=" span3 product mb-30">
						   <div class="product-item shadow-s3">                
                            <?php getProductContent($featured_product->ID,$current_user->ID);?>	
					         
                            </div>
						   </div>						
					<?php	
					
					
					} 
					?></div><?php 
					} ?>
						
					
					
				</div>
		</div>

		
<?php get_footer("full"); ?>
	
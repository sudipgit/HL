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
  
		<div id="main" class="home-final">
			<div class="banner-salon desktop-display">
				<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/2/5-gen_collerton.jpg" />
				<div class="banner-text ">
					<h2 class="banner-text-title">The World's Hair Product Matching Resource</h2>
					<h2 class="banner-text-description">Get Matched With PRODUCTS From Around The World BASED ON<br /> YOUR HAIR TYPE & TEXTURE</h2>
					<form action="http://HairLibrary.com/" method="get" role="search" class="location-search form-home-search" style="display:none;">
						<li><input style="height:30px; width:400px; color:#666; padding-left:10px;" type="text" placeholder="Search Over 2,000 Products, Brands & Collections" class="input-medium" name="s" id="s"></li>
						<li><input class="search-btn" type="submit" name="submit" value="Search Products" placeholder="keyword" /></li>
					</form>
				</div>								
			</div>
			<div class="container"> 
				<div class="text-center mt-30 mb-30 desktop-display">
					<!--<img width="350" src="http://HairLibrary.com/wp-content/themes/456shop/assets/img/Updated-HL-Logo.png" alt="Hl logo">-->
					<p style="color:#717a8f;font-size:16px;padding-bottom:40px;line-height: 20px;">Hair Library is the world’s largest hair texture based product matching information resource and growing. We make the process of finding hair products, brand information and inspiration hair stories for you fast and simple. Check out reviews of brands, products, and hair stories from the community to ensure you make the best, most informed selection for your unique hair needs.&#8203;</p>					
					<a href="http://hairlibrary.com/register/" class="desktop-display button btn primary">Discover Your Match</a>					
				</div>
				<div class="text-center mt-30 mb-30 mobile-display">
					<img  class="mb-50" width="350" src="http://HairLibrary.com/wp-content/themes/456shop/assets/img/Updated-HL-Logo.png" alt="Hl logo">				
					<p style=" line-height: 25px;color:#717a8f;font-size:17px;padding-bottom:40px;">Hair Library is the world’s largest hair texture based product matching information resource and growing. We make the process of finding hair products, brand information and inspiration hair stories for you fast and simple.</p>					
					<a href="http://hairlibrary.com/register/" class="mobile-display button btn primary">Discover Your Match</a>
				</div>
				
				<div class="text-center mt-60 mb-30">
					<h2 class="block-title desktop-display">Explore Hair Library By Category</h2>
					<h2 class="block-subtitle desktop-display">See What New Products Have Been Added To The Library.</h2>
					<h2 class="block-title mobile-display">Explore Category</h2>
					<h2 class="block-subtitle mobile-display">Login For Your Filtered Matches</h2>
				</div>		
				<div class="row-fluid">	               
					<div class="span8">
						<a class="community-section-hover" href="#">
							<div class="community-section">
							
								<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/2/Kids.jpg">							
								<div class="info">
									<p>Kids</p>
								</div>
							
							</div>
						</a>
					</div>
					<div class="span4">
						<a class="community-section-hover" href="http://hairlibrary.com/conditioner/">
							<div class="community-section">
						
								<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/2/Conditioner.jpg">							
								<div class="info">
									<p>Conditioner</p>
								</div>
							
						</div></a>
					</div>
				</div>
				<div class="row-fluid">	               
					<div class="span4">
						<a class="community-section-hover" href="http://hairlibrary.com/styling-product/">
						<div class="community-section">
							
								<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/2/Styling-products.jpg">							
								<div class="info">
									<p>Styling Products</p>
								</div>
							
						</div></a>
					</div>
					<div class="span8">
						<div class="row-fluid">	 
							<div class="span7">
								<a class="community-section-hover" href="http://hairlibrary.com/irons-and-curlers/">
								<div class="community-section">
								
										<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/2/tools.jpg">							
										<div class="info">
											<p>Tools</p>
										</div>
									
								</div></a>
							</div>
							<div class="span5">
								<a class="community-section-hover" href="http://hairlibrary.com/shampoo/">
								<div class="community-section">
									
										<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/2/shampoo.jpg">							
										<div class="info">
											<p>Shampoo</p>
										</div>
									
								</div></a>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">	  
					<div class="span4">
						<a class="community-section-hover" href="http://hairlibrary.com/hair-color/">
							<div class="community-section">
								
									<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/2/hair-color.jpg">							
									<div class="info">
										<p>Hair Color</p>
									</div>
								
							</div>
						</a>
					</div>
					<div class="span4">
						<a class="community-section-hover" href="#">
							<div class="community-section">
								
									<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/2/Barbering-tools.jpg">							
									<div class="info">
										<p>Barbering</p>
									</div>
								
							</div>
						</a>
					</div>
					<div class="span4">
						<a class="community-section-hover" href="http://hairlibrary.com/organic-products/">
							<div class="community-section">
								
									<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/2/pale-curly-hair-dark-skinned-black-hair-Favim.com-2385707.jpg">							
									<div class="info">
										<p>Organic</p>
									</div>
								
							</div>
						</a>
					</div>
				</div>
				<div class="row-fluid">	               
					<div class="span7">
						<div class="row-fluid">	 
							<div class="span6">
								<a class="community-section-hover" href="http://hairlibrary.com/hair-removers/">
								<div class="community-section">
								
										<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/2/hair-removal.jpg">							
										<div class="info">
											<p>Hair Removal</p>
										</div>
									
								</div></a>
							</div>
							<div class="span6">
								<a class="community-section-hover" href="http://hairlibrary.com/hair-extensions/">
								<div class="community-section">
									
										<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/2/hair-extensions-wigs.jpg">							
										<div class="info">
											<p>Hair Extensions</p>
										</div>
									
								</div></a>
							</div>
						</div>
					</div>
					<div class="span5">
						<a class="community-section-hover" href="http://hairlibrary.com/styling-tools/">
						<div class="community-section">
							
								<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/2/hair-accessories.jpg">							
								<div class="info">
									<p>Hair Accessories</p>
								</div>
							
						</div></a>
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
				<!--<div class="text-center mt-80">
					<h2  class="block-title">Explore Recent NYC Salon Listings</h2>
					<h2 class="block-subtitle">Discover Some Of Our Best Listings </h2>
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
				</div>-->
			<div class="text-center mt-30 mb-30">
				<h2  class="block-title">Featured Brands</h2>
				<h2  class="block-subtitle">Buy Directly From Partnered Brands</h2>
				
			</div>
			<div class="row-fluid  mb-20">
				<div class="span12">
					<div class="desktop-display"><?php if( function_exists('cyclone_slider') ) cyclone_slider('home-page-popup-shop'); ?></div>
					<div class="mobile-display"><?php if( function_exists('cyclone_slider') ) cyclone_slider('shop-page-popup-shop'); ?></div>
				</div>
            </div>
            </div>
					<div class="container" style="text-align:center;padding-bottom:30px;"> 
				<div class="text-center mt-30  mb-30">
					<h2  class="block-title">HL Mag</h2>
					<h2  class="block-subtitle">Curated Hair Articles From Around The World</h2>					
				</div>
				<div class="row-fluid explore-community-section  mb-20">
				<a href="http://hairlibrary.com/hl-mag/"><img src="http://HairLibrary.com/wp-content/uploads/2015/04/HL-Mag-editorial.jpg"></a>
				</div>
				</div>
			
			<div class="desktop-display">
			<div class="text-center mt-30  mb-40">
				<h2  class="block-title">Get Inspired</h2>
			</div>
			<div class="row-fluid  mb-20">
				<div class="span12 inspired-section">
					
					<div class="video-embed">
						<iframe src="https://player.vimeo.com/video/11495509" height="580" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				</div>
			</div>
			</div>
			<div class="container"> 
				<div class="text-center mt-30  mb-30">
					<h2  class="block-title">Explore The Community</h2>
					<h2  class="block-subtitle">Check Out The Hair Stories & Product Reviews</h2>					
				</div>
				<div class="row-fluid explore-community-section  mb-20">
					<div class="span3">
						<div class="photo on-photo feed center-thumb">
                  	  <div class="img">
					 
						<a href="http://hairlibrary.com/hairstory/?n=my-dreadlock-phase&amp;user=Cora3&amp;brand=murrays&amp;p=murrays-cream-beeswax"><img src="http://hairlibrary.com/wp-content/uploads/photostore/2014/1415217658_tumblr_migmmujYs71qf0beco1_500.jpg" alt="My Dreadlock phase"></a><div class="feed-product-thumb">
				<div class="inner-circle"><div class="inner-round"><a href="http://HairLibrary.com/product/murrays-cream-beeswax/"><img width="55" height="55" src="http://HairLibrary.com/wp-content/uploads/2014/09/Cream-Beeswax-98x98.jpg" alt="featured image">	</a></div></div>
				</div></div> 
			 <h2 class="photo_title"> <a href="http://hairlibrary.com/hairstory/?n=my-dreadlock-phase&amp;user=Cora3&amp;brand=murrays&amp;p=murrays-cream-beeswax">My Dreadlock phase</a> </h2>
			<h3 class="user_first_name"><a href="http://hairlibrary.com/profile/?n=Cora3"> Cora </a> </h3>				   
			<p class="photo_description">I went through a dreadlock phase a few years ago, I wanted to try it out and it looked very...</p>
			 <div class="feed-heart-button"><div class="heart-button section"><a href="javascript:saveAjaxLike(121,1,0,'photo','121');" title="like" id="heart-121" class="like-button"></a>
			           <a title="" href="javascript:void();" id="heart-after-121" class="like-button after-like" style="display:none"></a><span id="like-no-121">0</span>
		              	<div class="clear"></div>
			       </div></div>
			<a class="read_more pull-right" href="http://hairlibrary.com/hairstory/?n=my-dreadlock-phase&amp;user=Cora3&amp;brand=murrays&amp;p=murrays-cream-beeswax">Read More</a>
			<div class="clear"></div>
			</div>
					</div>
					<div class="span3">
						<div class="photo on-photo feed center-thumb">
						  <div class="img">
						 
							<a href="http://hairlibrary.com/hairstory/?n=-12-years-a-shave&amp;user=JeffWoods&amp;brand=coldlabel&amp;p=coldlabel-pretty-boy-splash-after-shave"><img src="http://hairlibrary.com/wp-content/uploads/photostore/2015/1427588683_smooth.jpg" alt=" 12 years a SHAVE"></a><div class="feed-product-thumb">
							<div class="inner-circle"><div class="inner-round"><a href="http://HairLibrary.com/product/coldlabel-pretty-boy-splash-after-shave/"><img width="55" height="55" src="http://HairLibrary.com/wp-content/uploads/2014/10/Pretty-Boy-Splash-After-Shave-98x98.jpg" alt="featured image">	</a></div></div>
							</div></div> 
						 <h2 class="photo_title"> <a href="http://hairlibrary.com/hairstory/?n=-12-years-a-shave&amp;user=JeffWoods&amp;brand=coldlabel&amp;p=coldlabel-pretty-boy-splash-after-shave"> 12 years a SHAVE</a> </h2>
						<h3 class="user_first_name"><a href="http://hairlibrary.com/profile/?n=JeffWoods"> jeffrey </a> </h3>				   
						<p class="photo_description">Coldlabel has done it again,this is an awesome product, Ive had many after shaves but they only burn and over...</p>
						 <div class="feed-heart-button"><div class="heart-button section"><a href="javascript:saveAjaxLike(154,1,0,'photo','154');" title="like" id="heart-154" class="like-button"></a>
								   <a title="" href="javascript:void();" id="heart-after-154" class="like-button after-like" style="display:none"></a><span id="like-no-154">0</span>
									<div class="clear"></div>
							   </div></div>
						<a class="read_more pull-right" href="http://hairlibrary.com/hairstory/?n=-12-years-a-shave&amp;user=JeffWoods&amp;brand=coldlabel&amp;p=coldlabel-pretty-boy-splash-after-shave">Read More</a>
						<div class="clear"></div>
						</div>
					</div>
					<div class="span3">
						<div class="photo on-photo feed center-thumb">
                  	  <div class="img">
					 
						<a href="http://hairlibrary.com/hairstory/?n=rough-and-thin-hair&amp;user=kashmira_gajjar&amp;brand=alikay-naturals&amp;p=alikay-naturals-blended-therapy-hot-oil-treatment"><img src="http://hairlibrary.com/wp-content/uploads/photostore/2015/1420569166_my photo.jpg" alt="Rough and Thin hair"></a><div class="feed-product-thumb">
				<div class="inner-circle"><div class="inner-round"><a href="http://HairLibrary.com/product/alikay-naturals-blended-therapy-hot-oil-treatment/"><img width="55" height="55" src="http://HairLibrary.com/wp-content/uploads/2014/09/blended_therapy_hot_oil_treatment-98x98.jpg" alt="featured image">	</a></div></div>
				</div></div> 
			 <h2 class="photo_title"> <a href="http://hairlibrary.com/hairstory/?n=rough-and-thin-hair&amp;user=kashmira_gajjar&amp;brand=alikay-naturals&amp;p=alikay-naturals-blended-therapy-hot-oil-treatment">Rough and Thin hair</a> </h2>
			<h3 class="user_first_name"><a href="http://hairlibrary.com/profile/?n=kashmira_gajjar">  Kashmira  </a> </h3>				   
			<p class="photo_description">I have very rough and coarse hair. I am facing problem of hair fall, and also having dandruff. I want...</p>
			 <div class="feed-heart-button"><div class="heart-button section"><a href="javascript:saveAjaxLike(141,1,0,'photo','141');" title="like" id="heart-141" class="like-button"></a>
			           <a title="" href="javascript:void();" id="heart-after-141" class="like-button after-like" style="display:none"></a><span id="like-no-141">0</span>
		              	<div class="clear"></div>
			       </div></div>
			<a class="read_more pull-right" href="http://hairlibrary.com/hairstory/?n=rough-and-thin-hair&amp;user=kashmira_gajjar&amp;brand=alikay-naturals&amp;p=alikay-naturals-blended-therapy-hot-oil-treatment">Read More</a>
			<div class="clear"></div>
			</div>
					</div>
					<div class="span3">
						<div class="photo on-photo feed center-thumb">
                  	  <div class="img">
					 
						<a href="http://hairlibrary.com/hairstory/?n=super-fly&amp;user=David_T&amp;brand=johnny_b._haircare&amp;p=johnny-b-haircare-molding-paste"><img src="http://hairlibrary.com/wp-content/uploads/photostore/2014/1417717748_tumblr_murdgfHDak1rr6x8yo1_500.jpg" alt="Super Fly"></a><div class="feed-product-thumb">
				<div class="inner-circle"><div class="inner-round"><a href="http://HairLibrary.com/product/johnny-b-haircare-molding-paste/"><img width="55" height="55" src="http://HairLibrary.com/wp-content/uploads/2014/10/Molding-Paste-98x98.jpg" alt="featured image">	</a></div></div>
				</div></div> 
			 <h2 class="photo_title"> <a href="http://hairlibrary.com/hairstory/?n=super-fly&amp;user=David_T&amp;brand=johnny_b._haircare&amp;p=johnny-b-haircare-molding-paste">Super Fly</a> </h2>
			<h3 class="user_first_name"><a href="http://hairlibrary.com/profile/?n=David_T"> David </a> </h3>				   
			<p class="photo_description">Gotta give it up to this Molding Paste. I usually go for a lighter gel hold but when I need...</p>
			 <div class="feed-heart-button"><div class="heart-button section"><a href="javascript:saveAjaxLike(136,1,0,'photo','136');" title="like" id="heart-136" class="like-button"></a>
			           <a title="" href="javascript:void();" id="heart-after-136" class="like-button after-like" style="display:none"></a><span id="like-no-136">0</span>
		              	<div class="clear"></div>
			       </div></div>
			<a class="read_more pull-right" href="http://hairlibrary.com/hairstory/?n=super-fly&amp;user=David_T&amp;brand=johnny_b._haircare&amp;p=johnny-b-haircare-molding-paste">Read More</a>
			<div class="clear"></div>
			</div>
					</div>
				</div>
			</div>
			<div class="exposer-section mt-50 mb30">
				<div class="row-fluid">
					<div class="span6">
						<div class="desktop-display exposer-text">
							<h2  class="block-title">Let's Discover Something Beautiful Together</h2>
							<p>Get matched with products based on your hair type and texture and get inspired by the product reviews and hair stories shared by others. Let your hair be heard!  Create your own product library, shop and even share your hair story with video. You can also explore stylists in the New York City Area that service specific hair types, textures and conditions. Coming to a city near you!</p>
							<p><a class="button" href="http://hairlibrary.com/register/">Discover Your Match</a></p>
						</div>
						<div class="mobile-display exposer-text">
							<h2  class="block-title">Lets Discover Something Beautiful Together</h2>
							<p>Get matched with products based on your hair type and texture and get inspired by the product reviews and hair stories shared by others. Let your hair be heard!  Create your own product library, shop and even share your hair story with video. You can also explore stylists in the New York City Area that service specific hair types, textures and conditions. Coming to a city near you!</p>
							<p><a class="button" href="http://hairlibrary.com/register/">Discover Your Match</a></p>
						</div>
					</div>
					<div class="span6">
						<img src="<?php bloginfo('template_url');?>/assets/img/salon-list/2/last-section-image.jpg" />
					</div>
				</div>
			</div>
		</div>
<?php get_footer("full"); ?>
	
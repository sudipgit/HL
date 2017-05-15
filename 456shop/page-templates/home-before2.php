<?php
/*
Template Name: Landing Page
*/
?>
<?php get_header();
$current_user = wp_get_current_user();

 ?>
  
<div id="main" class="home-home4 " style="padding-top:44px !important;">
<!--<a href="https://plus.google.com/113846979574196210482" rel="publisher">Google+</a>-->
		<div class="row-fluid">	
			<div class="span12 unique-hair">	
					<div class="span8" style="margin-left:0;float:right">
					<div class="products-image"><img src="<?php bloginfo('template_url');?>/assets/img/product-home.png" /></div>
				</div>
				<div class="span4" style="margin-left:20px">
					<div class="hair-logo"><a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_url');?>/assets/img/icons/HairLibrary_Logo1White.png" width="230"/></a></div>
					<div class="unique-text">
						<h2 class="desktop-title">You are Unique <br/> & so is your hair</h2>
						<h2 class="mobile-title">Unclutter Your Life</h2>
						<p style="font-family: garamond;">Get custom matched with hair products  based on your specific needs.</p>
						<a href="<?php bloginfo('url')?>/register/" class="unique-button">Get Started</a>
					</div>
				</div>
		
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		
		
		<div class="row-fluid ">	
			<div class="perfect-match-head">
				<h1 class="desktop-show">YOUR PERFECT MATCH IS ONLY THE BEGINNING </h1>
				<h1 class="mobile-show">It Starts With A Match</h1>
				
			</div>
			<div class="perfect-match">
				
				<div class="clearfix"></div>				
				<div class="matched-hair" >	
					<div class="container">
						<div class="row-fluid ">	
							<div class="span4">
								<div class="matched-text">
									<h2>How it works</h2>
									<p style="font-family: garamond;">After you create your hair profile, you can discover your matches, fall in love with new products and organize your personal library.</p>
									<a href="<?php bloginfo('url')?>/register/" class="unique-button">GET MATCHED</a>
								</div>
							</div>
							<div class="span8">
								<div class="row-fluid ">	
									<ul class="match-list">
										<li class="span4">
											<img src="<?php bloginfo('template_url');?>/assets/img/icons/match-1.png" style="margin-bottom:19px"/>
											
										</li>
										<li class="span4">
											<img src="<?php bloginfo('template_url');?>/assets/img/icons/match-2.png" style="margin-bottom:28px"/>
											
										</li>
										<li class="span4">
											<img style="margin:-6px 0 4px" src="<?php bloginfo('template_url');?>/assets/img/icons/match-3.png" />
											
										</li>
									</ul>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>			
			</div>
		</div>
		
		<div class="row-fluid ">	
			<div class="become-influencer-head">
				<h1>BECOME AN INFLUENCER</h1>
			</div>
			<div class="become-influencer">
				<div class="container">
				<p>Kouth, Founder of AfroStruggle.com</p>
					<div class="row-fluid ">
						<div class="span7 influencer">							
							<ul class="influencer-icon">
								<li>
									<img style="margin-top:40px" src="<?php bloginfo('template_url');?>/assets/img/icons/youtube.png" width="64"/>
									<h3>Add Video</h3>
								</li>
								<li>
									<img style="margin-top:7px" src="<?php bloginfo('template_url');?>/assets/img/icons/tutorial.png" width="64"/>
									<h3>Share Tutorials</h3>
								</li>
								<li>
									<img src="<?php bloginfo('template_url');?>/assets/img/icons/selfies.png" width="33"/>
									<h3>Tag Selfies</h3>
								</li>
								<li>
									<img src="<?php bloginfo('template_url');?>/assets/img/icons/get_matched.png" width="24"/>
									<h3>Tag Products</h3>
								</li>
								<div class="clearfix"></div>  
								<div class="absolute-border"></div>
							</ul>  

							<div class="clearfix"></div>
							
						</div>
						<div class="span5">
							<img src="<?php bloginfo('template_url');?>/assets/img/influencer.png" />
						</div>
						<div class="clearfix"></div>
					</div>
					
				</div>
				
			</div>
			
		</div>
		<div class="row-fluid ">	
			<div class="discover-trending-head">
				<h1 class="trending desktop-show"><span><img style="margin:-9px 12px 0 0;" src="<?php bloginfo('template_url');?>/assets/img/icons/TrendingIcon_white.png" width="50"/></span>DISCOVER TRENDING PRODUCTS</h1>
				<h1 class="trending mobile-show"><span><img style="margin:-9px 2px 0 0;" src="<?php bloginfo('template_url');?>/assets/img/icons/TrendingIcon_white.png" width="36"/></span> TRENDING PRODUCTS</h1>
				
			</div>
			<div class="discover-trending landing-page">
			
				<div class="row-fluid">
				<?php $products=getTypeProducts(array(254,215,191,219,195,176,223,207,211),4); ?>
					<div class="span12 sectionf">
						<h3 class="title desktop-show"> Shampoos</h3>
						<h3 class="title mobile-show"> Shampoos</h3>
						<?php if(count($products)>0){ ?>
                           <ul class="products carousel-slider">
						   
						   <?php 
					 
						   foreach($products as $product)
						   {
						  
						   ?>
							 <li class="span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                       					   
						 
						 
                             <?php getProductContent($product->id);?>
					         
                            </div>
						   </li>
						   <?php  $i++; } ?>
						</ul>
						<?php } ?>
						
					</div>	
				</div>
				

				<div class="row-fluid">
				<?php $products=getTypeProducts(array(253,213,192,217,196,177,221,205,209,200),4); ?>
					<div class="span12 sectionf">
					   <h3 class="title desktop-show"> Conditioners</h3>
						<h3 class="title mobile-show">  Conditioners</h3>
						
						<?php if(count($products)>0){ ?>
                           <ul class="products carousel-slider">
						   
						   <?php 
					 
						   foreach($products as $product)
						   {
						  
						   ?>
							 <li class="span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                       					   
						
						 
                             <?php getProductContent($product->id);?>
					         
                            </div>
						   </li>
						   <?php  $i++; } ?>
						</ul>
						<?php } ?>
						
					</div>	
				</div>
				
				
				
					<div class="row-fluid">
				<?php
            // all gel and hair spray
				$products=getTypeProducts(array(256,257,243,244,277,279,225,226,237,238,231,232),4); ?>
					<div class="span12 sectionf">
						<h3 class="title desktop-show"> Styling Products  </h3>
						<h3 class="title mobile-show">  Styling Products  </h3>
						<?php if(count($products)>0){ ?>
                           <ul class="products carousel-slider">
						   
						   <?php 
					 
						   foreach($products as $product)
						   {
						  
						   ?>
							 <li class="span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                       					   
						
						 
                             <?php getProductContent($product->id);?>
					         
                            </div>
						   </li>
						   <?php  $i++; } ?>
						</ul>
						<?php } ?>
						
					</div>	
				</div>
				
				
				
					<div class="row-fluid">
				<?php $products=getTypeProducts(array(274,272,263,270,268,266),4); ?>
					<div class="span12 sectionf">
						<h3 class="title desktop-show"> Tools  </h3>
						<h3 class="title mobile-show">  Tools  </h3>
						<?php if(count($products)>0){ ?>
                           <ul class="products carousel-slider">
						   
						   <?php 
					 
						   foreach($products as $product)
						   {
						  
						   ?>
							 <li class="span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                       					   
					
						 
                             <?php getProductContent($product->id);?>
					         
                            </div>
						   </li>
						   <?php  $i++; } ?>
						</ul>
						<?php } ?>
						
					</div>	
				</div>
				
				
				
				<div class="row-fluid">
				<?php $products=getMenProducts(4); ?>
					<div class="span12 sectionf">
						<h3 class="title desktop-show"> Men's Products   </h3>
						<h3 class="title mobile-show"> Men's Products   </h3>
						<?php if(count($products)>0){ ?>
                           <ul class="products carousel-slider">
						   
						   <?php 
					 
						   foreach($products as $product)
						   {
						  
						   ?>
							 <li class="span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                       					   
						
						 
                             <?php getProductContent($product->id);?>
					         
                            </div>
						   </li>
						   <?php  $i++; } ?>
						</ul>
						<?php } ?>
						
					</div>	
				</div>
				
					<div class="row-fluid">
				<?php $products=getKidsProducts(null,null,4);
     
				?>
					<div class="span12 sectionf">
						<h3 class="title desktop-show"> Kid's Products   </h3>
						<h3 class="title mobile-show"> Kid's Products   </h3>
						<?php if(count($products)>0){ ?>
                           <ul class="products carousel-slider">
						   
						   <?php 
					 
						   foreach($products as $product)
						   {
						  
						   ?>
							 <li class="span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                       					   
						 
						 
                             <?php getProductContent($product->id);?>
					         
                            </div>
						   </li>
						   <?php  $i++; } ?>
						</ul>
						<?php } ?>
						
					</div>	
				</div>
			
			</div>
		</div>
		</div>
		
<?php get_footer(); ?>
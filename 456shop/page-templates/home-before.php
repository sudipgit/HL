<?php
/*
Template Name: Landing Page
*/
?>
<?php get_header();
$current_user = wp_get_current_user();

 ?>
    <div class="bannar">
	 <a href="#">
		
		<img height="180px" width="980px" alt="Trend Report: - The modern lady" src="<?php bloginfo('template_url');?>/assets/img/home/Birmingham2.jpg">
	 </a>
	

      </div>


		<div id="main" class="wrap landing-page">
			<div class="container">
	           
				
			
				<div class="row-fluid">
					<div class="span12">
						<div class="span6">
						
							<a href="http://hairlibrary.com/brand/?id=80">
								<img height="300px" width="450px" alt="Trend Report: - The modern lady" src="<?php bloginfo('template_url');?>/assets/img/home/39-Jessies.jpg">
							</a>
					
						
					  </div>
					<div class="span6">
							<a href="http://hairlibrary.com/brand/?id=164">
								<img height="300px" width="450px" alt="New Designer: - Cédric Charlier" src="<?php bloginfo('template_url');?>/assets/img/home/aesop-jet-set-kit.png">
							</a>
					
					</div>
					<div class="span6" style="margin-left:0;margin-top:10px">
							<a href="http://hairlibrary.com/brand/?id=80">
								<img height="300px" width="450px" alt="Investment pieces: - Jewelry with edge" src="<?php bloginfo('template_url');?>/assets/img/home/Miss-Jessies-Transitioners-Magic.jpeg">
							</a>
						</div>
					
					
					<div class="span6" style="margin-top:10px">
							<a href="http://hairlibrary.com/brand/?id=103">
							<img height="300px" width="450px" alt="The Detail: - Daytime embellishment" src="<?php bloginfo('template_url');?>/assets/img/home/Shea-Moisture-Transitioning-Kit.jpeg">
							</a>
						</div>
					
					</div>
				</div>
				
				<div class="row-fluid">
				<?php $products=getTypeProducts(array(254,215,191,219,195,176,223,207,211),4); ?>
					<div class="span12 sectionf">
						<h3 class="title"> Popular Shampoos</h3>
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
						<h3 class="title"> Popular Conditioners  </h3>
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
						<h3 class="title"> Popular Styling Products  </h3>
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
						<h3 class="title"> Popular Tools  </h3>
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
						<h3 class="title"> Popular Men's Products   </h3>
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
						<h3 class="title"> Popular Kid's Products   </h3>
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
 
<?php get_footer(); ?>
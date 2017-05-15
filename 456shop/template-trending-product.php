<?php
/*
Template Name: Trending product
*/



?>


<?php get_header(); ?>
	
 <link href="<?php bloginfo('template_url'); ?>/brand-admin/css/custom.css" rel="stylesheet" />	
		<div id="main" class="wrap post-template">
			<div class="container">
				
				<div class="row-fluid" style="padding-top:0">	
					<div class="span12 post-page trending-products">		
                		<h3 class="top-page-title trending-product-title"><span style="width: 150px;">Trending</span></h3>
						
						<?php 
					
					   
					   $current_user=wp_get_current_user();
						/**
						*
						Source:/functions/products.php
						Returns one dimensional array of products those are matched with current user's products.
						*
						**/
					   $matches=getMatchingProducts($current_user->ID);
						/**
						*
						Source:/functions/products.php
						Returns one dimensional Array of sorted Products based on Total amount of like
						*
						**/
					    $treanding=getTrendingProducts(20);
						
						?>
				<div class="woocommerce">
						<?php if($treanding) {?>
                           <ul class="products">
						   
						   <?php 
						   $i=1;
						   foreach($treanding as $match) {
                            $class="";
							if($i%4==0)
							  $class="last";
							else if($i%4==1)
							   $class="first";
                             
						   ?>
							
                           <li class=" span4 product <?php echo $class;?>">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                             <!-- <span class="onsale">Sale!</span>-->
							 <?php if($matches && count($matches)>0 && in_array($match->id,$matches)) { ?>
							  <span class="onsale"></span>
                          <?php }?>
                         <?php 
						 /**
						 *
						 Source:/functions/products.php
						 Generate HTML layout of product content of given current user
						 *
						 **/
						 getProductContent($match->id,$current_user->ID);?>
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
			</div>

      <script>
		$( "#shop-menu-item" ).addClass( "active_menu_item" );
		</script>
<?php get_footer(); ?>
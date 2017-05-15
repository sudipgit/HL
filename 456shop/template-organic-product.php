<?php
/*
Template Name: Organic Product
*/
?>
<?php get_header(); ?>
<!-- bin/jquery.slider.min.css -->
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.blue.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.plastic.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.round.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.round.plastic.css" type="text/css">
  <!-- end -->

	<script type="text/javascript" src="js/jquery-1.7.1.js"></script>
	
	<!-- bin/jquery.slider.min.js -->
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/price-slider/js/jshashtable-2.1_src.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/price-slider/js/jquery.numberformatter-1.2.3.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/price-slider/js/tmpl.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/price-slider/js/jquery.dependClass-0.1.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/price-slider/js/draggable-0.1.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/price-slider/js/jquery.slider.js"></script>

		<div id="main" class="wrap">
			<div class="container">
	           <?php	
			 
			   global $post;
			   $page_id=$post->ID;
        
			    $args=null;
				  switch($page_id)
						{

						case 2293:
								$args=array(253,213,192,217,196,177,221,205,209,200);  
								$p_type='Conditioner';
								break;
						case 2297:
								$args=array(254,215,191,219,195,176,223,207,211); 
                               // $args=array(254);  								
								$p_type='Shampoo';
								break;
						case 2299:
								$args=array(259,247,229,241,235,276);  
								$p_type='Oil';
								break;
						case 2301:
								$args=array(256,244,226,238,232,277);
                                $p_type='Gel';								
								break;
						case 2303:
								$args=array(260,245,227,239,233,278);
                                  $p_type='Moisturizer';								
								break;
						case 2305:
								$args=array(257,243,225,237,231,279);  
								 $p_type='Hair Sprey';
								break;
						case 2307:
								$args=array(261,246,228,240,234,280);  
								 $p_type='Hair Color';
								break;
						case 2309:
								$args=array(265,267,269,264,271,273);  
								 $p_type='Hair Care/Repair';
								break;
						case 2878:
								$args=array(255,216,193,220,197,182,224,208,212,201);  
								 $p_type='Styling Product';
								break;
								
					case 2880:
								$args=array(274,272,263,270,268,266);  
								 $p_type='Styling Tools';
								break;			
																		
							
								
						}	

                      if(isset($_GET['type']))
						 $args=array($_GET['type']);
				   
				 if(isset($_POST['sortby']))
				     $sort=$_POST['sortby'];
				if(isset($_POST['price']))
				     $price=$_POST['price'];
					 
					 $c_ids=get_type_products($args,null,$sort,$price);
					 
					 
					 
					include_once('brand-admin/templates/functions.php');
	              $current_user = wp_get_current_user();
				  if($current_user>0)
				$mymatches=getMatchingProducts($current_user->ID);

	             ?>
				
				
				<div class="row-fluid brand-product-tabs">	
				
				<div class="brand-product-header">
					<div class="sort-by-product">
						<form id="sort-form" action="" method="post">
							<label for="">Sort By</label>
							<select name="sortby" onchange="submitForm();">
								<option value="" >Newest</option>
								<option value="desc" <?php if($sort=="desc") echo 'selected="selected"';?>>Price High to Low</option>
								<option value="asc" <?php if($sort=="asc") echo 'selected="selected"';?>>Price Low to High</option>
							</select>
							<input type="hidden" name="price" value="<?php echo $price;?>"/>
						</form>
					</div>
					<h3> <?php echo 'All '.$p_type;?></h3>
					<p><?php echo count($c_ids);?> Results</p>
				<hr>
				</div>
				

					<div>	 
		          
					<div class="panel entry-content" id="tab11">
					
					<div class="span3 left-bar">
					
					  <div class="layout price-range">
					  <h3>Price Range</h3>
                       <form id="s-form" action="" method="post">
                          <div class="layout-slider">
						  
                         <input id="Slider2" type="slider" name="price" value="<?php if($price) echo $price;else echo '1;1000';?>" />
                       </div>
                      <script type="text/javascript" charset="utf-8">
                           jQuery("#Slider2").slider({ from: 1, to: 100, heterogeneity: ['1/5'], step: 5, dimension: '&nbsp;$' });
                        </script>
						<input type="hidden" name="sortby" value="<?php echo $sort;?>"/>
						</form>
                    </div>
					
					<?php
                   //Shampoo
					if($page_id==2297){ ?>
					<ul>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=211">Thinning Hair</a></li>
						<li <?php if($type=='219') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=219">Grey Hair</a></li>
						<li <?php if($type=='2297') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo">Dry Scalp</a></li>
						<li <?php if($type=='2299') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=">Oily Scalop</a></li>
						<li <?php if($type=='2301') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=">Alopecia</a></li>
						<li <?php if($type=='2303') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=">Hair Care/Repair</a></li>
						<li <?php if($type=='215') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=215">Color Treated Hair</a></li>
						<li <?php if($type=='207') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=207">Relaxed  Hair</a></li>
						<li <?php if($type=='223') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=223">Permed Curly Hair</a></li>
						<li <?php if($page_id=='2309') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=">Dry Shampoo</a></li>
					
					</ul>
					<?php } else if($page_id==2293) { //Conditioner ?>
					 <ul>
						<li <?php if($type=='209') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=209">Thinning Hair</a></li>
						<li <?php if($type=='217') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=217">Grey Hair</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=">Dry Scalp</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>> <a href="<?php bloginfo('url');?>/conditioner/?type=">Oily Scalop</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=">Alopecia</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=">Hair Care/Repair</a></li>
						<li <?php if($type=='213') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=213">Color Treated Hair</a></li>
						<li <?php if($type=='205') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=205">Relaxed  Hair</a></li>
						<li <?php if($type=='221') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=221">Permed Curly Hair</a></li>
						
					 </ul>
					 <?php } else if($page_id==2303) { //Moisturizer ?>
					 <ul>
					 <li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Oils</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Thinning Hair</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Grey Hair</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Dry Scalp</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Oily Scalop</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Alopecia</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Hair Care/Repair</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Color Treated Hair</a></li>
						<li <?php if($type=='233') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=233">Relaxed  Hair</a></li>
						<li <?php if($type=='239') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=239">Permed Curly Hair</a></li>
						
					 </ul>
					<?php } else if($page_id==2878) { //Styling ?>
					<!-- <ul>
					    <li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=">Hair Spray</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=">Gel</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=">Mousse</a></li>
						<li <?php if($type=='212') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=212">Thinning Hair</a></li>
						<li <?php if($type=='220') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=220">Grey Hair</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=">Dry Scalp</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=">Oily Scalop</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=">Alopecia</a></li>
						<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=">Hair Care/Repair</a></li>
						<li <?php if($type=='216') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=216">Color Treated Hair</a></li>
						<li <?php if($type=='208') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=208">Relaxed  Hair</a></li>
						<li <?php if($type=='224') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=224">Permed Curly Hair</a></li>
						
					 </ul>-->
					<?php } ?>
					
					
					
					
					
					<span class="left-bar-title">All Brands</span>
					<ul class="left-brand-names">
					    <li><a href="http://hairlibrary.com/brand/?id=114">Affirm</a></li>
                        <li><a href="http://hairlibrary.com/brand/?id=99">African Pride</a></li>
                        <li><a href="#">Agadir</a></li>
						<li><a href="#">Aphogee</a></li>
					    <li><a href="#">Affirm</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=114">Aunt Jackies</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=113">Avlon</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=78">Beautiful Textures</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=109">Bigen</a></li>
						<li><a href="">Bobbi Boss</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=112">Bohyme</a></li>
						 <li><a href="http://hairlibrary.com/brand/?id=117">Cantu</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=34">Carols Daughter</a></li>
					    <li><a href="#">Clear</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=105">Creme Of Nature</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=101">Dark & Lovely</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=81">Devachan</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=108">Doo Grow</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=115">Elasta Qp</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=107">Fantasia</a></li>
						 <li><a href="http://hairlibrary.com/brand/?id=106">Hairfinity</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=111">Kinky Curly</a></li>
					    <li><a href="http://hairlibrary.com/brand/?id=102">Mane n Tail</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=80">Miss Jessie</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=100">Mixed Chicks</a></li>
						<li><a href="#">Motions</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=104">Palmers</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=77">Profective</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=103">SheaMoisture</a></li>
						 <li><a href="#">Sulfur 8</a></li>
						<li><a href="http://hairlibrary.com/brand/?id=101">4 Naturals</a></li>
					    <li><a href="http://hairlibrary.com/brand/?id=79">Tahlija Waajid</a></li>
				
					</ul>
					
					</div>
					</div>
					<div class="span9">
					<div class="woocomerce margin-left-none">
						<?php if($c_ids) {
						?>
                           <ul class="products">
						   
						   <?php 
						
						   foreach($c_ids as $match)
						   {
						   $brand=null;
						   $ppost=get_post($match->id);
						   $brand= get_brand_info($ppost->post_author);

						   ?>
							
                           <li class=" span4 product <?php if($i%3==0) echo 'first';?>">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                         <?php if( in_array($match->id,$mymatches)) { ?>						   
						   <span class="onsale"></span>
						   <?php } ?>
                             <!-- <span class="onsale">Sale!</span>-->
                              <div class="imagewrapper effect-thumb effect-thumb-2">
                                <?php if (has_post_thumbnail($match->id)) {
								
								echo get_the_post_thumbnail($match->id, array(480,480) );
								}else{
								?>
								
								<img width="480" height="480" alt="Placeholder" src="http://hairlibrary.com/wp-content/themes/456shop/assets//img/placeholder.png">
								<?php }?>
                                <div class="effect-wrap clearfix">
                                    <a class="icon info ttip" href="<?php echo post_permalink($match->id); ?> " data-placement="bottom" rel="tooltip" data-original-title="Read More"></a>
                                    <a class="icon icon2 shopping-cart ttip add_to_cart_button product_type_simple" data-placement="bottom" rel="tooltip" href="/morgandemo/customer-profile/?add-to-cart=1801" data-product_id="1801" data-original-title="Add to cart"></a>
                                </div>
                           </div>
                        <div class="clearfix"></div>
                        <h3><?php echo get_the_title($match->id); ?> </h3>
						 <p class="product-brand-name"> <a href="<?php bloginfo('url');?>/brand?id=<?php echo $brand->user_id;?>"><?php echo $brand->company_name;?></a></p>
                       <span class="price">
                        <!--  <del>
                               <span class="amount">><?php echo get_post_meta( $match->id,'_regular_price', true );?></span>
                          </del>-->

                           <span class="amount">$<?php echo get_post_meta( $match->id, '_sale_price', true );?></span>
                         
                              </span>
                            </div>
						   </li>
						   <?php $i++; } //} ?>
						   </ul>
						   <?php } else { ?>
						   
						   <p> No products available</p>
						   <?php } ?>
						   </div>
					</div>
					
					</div> 

					
					</div> 
					
					<div class="clear"></div>
					
					
					</div>

			</div>
		</div>
        	<script>
		function submitForm()
		{
		
		$('#sort-form').submit();
		}
		
		
		</script>
<?php get_footer(); ?>
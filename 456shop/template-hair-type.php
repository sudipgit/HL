<?php
/*
Template Name: Hair Type Page
*/
?>
<?php get_header(); ?>
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.blue.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.plastic.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.round.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.round.plastic.css" type="text/css">
  <!-- end -->

	<!--<script type="text/javascript" src="js/jquery-1.7.1.js"></script>-->
	
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
				  switch($page_id)
						{

						case '2291':
						//Braids
							$cat_id=250;
                             $h_type='Braids';
							$args=array(283,284,285,286,287,288,253,254,257,256,260,261,259,262,266);
							
							break;
							
						case '2289':
						//Dreads
							$cat_id=179;
							 $h_type='Locks';
							$args=array(294,293,292,291,290,289,192,291,243,243,245,246,247,248,268);  
							break;
					
						case '2281':
						//Natural Straight
							$cat_id=180;
							 $h_type='Naturally Straight';
							$args=array(300,299,298,297,296,295,177,176,225,226,227,228,229,230,263);  
							
							break;
								
						/*case '2285':
						//Permed Curly Hair
							$cat_id=189;
							 $h_type='Permed Curly';
							$args=array(221,223,241,238,239,237,240,271);   
							break;*/
								
						case '2283':
						//Relaxed Hair
							$cat_id=188;
							 $h_type='Relaxed Straight';
							$args=array(306,305,304,303,302,301,205,207,231,232,233,234,235,236,274);   
							break;
						case '3557':	
						//Permed Curly Hair
							$cat_id=189;
							 $h_type='Naturally Curly';
							$args=array(312,311,310,309,308,307,221,223,237,238,239,340,241,242,272);   
							break;
									
																		
						}				  
					//Source: functions/products.php
					//Returns Images of sub category
					$images=getSubCetegoryImages($args);
				  
					$cid=$_GET['cid'];
				   
				//  $c_ids=get_type_products($args,null,'asc'); 
				 $sort=null;
				 if(isset($_POST['sortby']))
				     $sort=$_POST['sortby'];
				   
				   if($cid)
				    $c_ids=get_type_products(array($cid),null,$sort);
					else
					$c_ids=get_type_products($args,null,$sort);
				
				$type=$_GET['type'];
				include_once('brand-admin/templates/functions.php');
				$current_user = wp_get_current_user();
				if($current_user->ID>0)
				$mymatches=getMatchingProducts($current_user->ID);
				
				if($type=="match")
				{
				
				   $list=array();
				    foreach($c_ids as $c_id)
					{
					  if( in_array($c_id->id,$mymatches))
					   $list[]=$c_id;
					
					}
				
				$c_ids=array();
				$c_ids=$list;
				
				}
				
			if($type)	
		     $t_title=getProductCategoryTitle($type);
			 else
			 $t_title=getProductSubCategoryTitle($cid);
	
		
		
				
				
	             ?>
		<!--<div class="row-fluid brand-info">
		
		
			<div class="span12">	

				<div id="tiny-carousel-slider1">
					<a href="#" class="buttons prev disable">left</a>
					<div class="viewport">
						<ul class="overview" style="width: 1332px; left: -506.416px;">
						<?php if($images) foreach($images as $key=>$image){
						  if(!$image)
						   $image='http://hairlibrary.com/wp-content/uploads/brandphoto/demo.png';

						?>
							<li><a href="<?php echo get_permalink($page_id);?>?cid=<?php echo $key;?>"><img src="<?php echo $image;?>"><h3><?php echo getProductSubCategoryTitle($key);?></h3></a></li>
						<?php } ?>
						</ul>
					</div>
					<a href="#" class="buttons next">right</a>
				</div>
			<script type="text/javascript">
				jQuery(document).ready(function(){
					jQuery('#tiny-carousel-slider1').tinycarousel({ 
						start: 1, display: 1, controls: true, interval: true, intervaltime: 1500, duration: 1000 
						});
					});
			</script>											
			</div>
						
				</div>-->
				
				<div class="row-fluid brand-product-tabs hair-type">	
				
				<div class="brand-product-header">
				<div class="sort-by-product">
						<form id="sort-form" action="" method="post">
							<label for="">Sort By</label>
							<select name="sortby" onchange="submitForm();">
								<option value="" >Newest</option>
								<option value="desc" <?php if($sort=="desc") echo 'selected="selected"';?>>Most Popular</option>
								<option value="asc" <?php if($sort=="asc") echo 'selected="selected"';?>>Least Popular</option>
							</select>
							<input type="hidden" name="price" value="<?php echo $price;?>"/>
						</form>
					</div>
					 <h2 class="hair-type-title"> <?php echo $h_type;?></h2>
					<h3> <?php echo $t_title;?></h3>
					<p><?php echo count($c_ids);?> Items</p>
				<hr>
				</div>

					<div>	 
		          
					<div class="panel entry-content" id="tab11">
					
					<div class="span3 left-bar">
					<div class="layout price-range">
					  <h3>Heart Range</h3>
                       <form id="s-form" action="" method="post">
                          <div class="layout-slider">
						  
                         <input id="Slider2" type="slider" name="price" value="<?php if($price) echo $price;else echo '1;1000';?>" />
                       </div>
                      <script type="text/javascript" charset="utf-8">
                           jQuery("#Slider2").slider({ from: 1, to: 100, heterogeneity: ['1/5'], step: 5, dimension: '&nbsp;&hearts;' });
                        </script>
						<input type="hidden" name="sortby" value="<?php echo $sort;?>"/>
						</form>
                    </div>
					
					<ul>
						<li <?php if($type=='all') echo 'class="active"';?>><a href="<?php echo get_permalink($page_id);?>?type=all">All</a></li>
						<li <?php if($type=='match') echo 'class="active"';?>><a href="<?php echo get_permalink($page_id);?>?type=match">My Matches</a></li>
						<li <?php if($type=='con') echo 'class="active"';?>><a href="<?php echo get_permalink($page_id);?>?cid=<?php echo $args[0];?>&type=con">Conditioner</a></li>
						<li <?php if($type=='sam') echo 'class="active"';?>><a href="<?php echo get_permalink($page_id);?>?cid=<?php echo $args[1];?>&type=sam">Shampoo</a></li>
						<li <?php if($type=='oil') echo 'class="active"';?>><a href="<?php echo get_permalink($page_id);?>?cid=<?php echo $args[2];?>&type=oil">Oil</a></li>
						<li <?php if($type=='gel') echo 'class="active"';?>><a href="<?php echo get_permalink($page_id);?>?cid=<?php echo $args[3];?>&type=gel">Gel</a></li>
						<li <?php if($type=='mos') echo 'class="active"';?>><a href="<?php echo get_permalink($page_id);?>?cid=<?php echo $args[4];?>&type=mos">Moisturizer</a></li>
						<li <?php if($type=='spr') echo 'class="active"';?>><a href="<?php echo get_permalink($page_id);?>?cid=<?php echo $args[5];?>&type=spr">Hair Spray</a></li>
						<li <?php if($type=='col') echo 'class="active"';?>><a href="<?php echo get_permalink($page_id);?>?cid=<?php echo $args[6];?>&type=col">Hair Color</a></li>
						<li <?php if($type=='rep') echo 'class="active"';?>><a href="<?php echo get_permalink($page_id);?>?cid=<?php echo $args[7];?>&type=rep">Hair Care/Repair</a></li>
						
					
					</ul>					
					
					<span class="left-bar-title">All Brands</span>
					<ul class="left-brand-names">
					  <li><a href="<?php bloginfo('url');?>/brand/?id=164">Aesop</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?id=114">Affirm</a></li>
                        <li><a href="<?php bloginfo('url');?>/brand/?id=99">African Pride</a></li>
                        <li><a href="<?php bloginfo('url');?>/brand/?id=125">Agadir</a></li>
						<li><a href="#">Aphogee</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?id=167">Alder New York</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=215">Alikay Naturals</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=114">Aunt Jackies</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=222">Aveda</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=113">Avlon</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=78">Beautiful Textures</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=109">Bigen</a></li>
						<li><a href="#">Bobbi Boss</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=112">Bohyme</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=223">Bumble and Bumble</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?id=117">Cantu</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=34">Carol's Daughter</a></li>
					    <li><a href="#">Clear</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=105">Creme Of Nature</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=224">Conair</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=101">Dark & Lovely</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=220">Davines</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=81">DEVA CURL</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=108">Doo Grow</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=160">Dr Bronner</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=185">Dr Miracles</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=115">Elasta Qp</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=107">Fantasia</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?id=106">Hairfinity</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?id=191">Hairlibrary</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?id=221">Hair Rules</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?id=166">Intelligent Nutrients</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?id=98">Jane Carter Solution</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=111">Kinky Curly</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=118">Lisa Raye</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=183">Macadamia</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=163">Malin+Goetz</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?id=102">Mane n Tail</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=80">Miss Jessie's</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=100">Mixed Chicks</a></li>
							<li><a href="<?php bloginfo('url');?>/brand/?id=212">Moroccanoil</a></li>
						<li><a href="#">Motions</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=218">Ouidad</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=104">Palmers</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=77">Profective</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=216">Pureology</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=219">Sexy Hair</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=103">SheaMoisture</a></li>
						 <li><a href"#">Sulfur 8</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=110">4 Naturals</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?id=79">Tahlija Waajid</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?id=214">The Dry Bar</a></li>
				        <li><a href="<?php bloginfo('url');?>/brand/?id=165">Travis Dowdy</a></li>
					</ul>
					
					</div>
					<div class="span9">
					<div class="woocomerce margin-left-none">
						<?php if($c_ids) {
						?>
                           <ul class="products">
						   
						 <?php
						 $i=0;
						   foreach($c_ids as $match)
						   {
						   
						    $brand=null;
						   $ppost=get_post($match->id);
						   $brand= get_brand_info($ppost->post_author);
						   
						   
						   ?>
							
                           <li class=" span4 product <?php if($i%3==0) echo 'first';?>">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                         <?php if( $mymatches && in_array($match->id,$mymatches)) { ?>						   
						   <span class="onsale"></span>
						   <?php } ?>
                           <?php getProductContent($match->id,$current_user->ID);?>
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
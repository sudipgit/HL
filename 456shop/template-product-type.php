<?php
/*
Template Name: Product Type Page 
*/
?>
<?php get_header();
$current_user = wp_get_current_user();
 ?>
<!-- bin/jquery.slider.min.css -->
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
   <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>-->

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
								$p_type='Conditioners';
								break;
						case 2297:
								$args=array(254,215,191,219,195,176,223,207,211); 
                               // $args=array(254);  								
								$p_type='Shampoos';
								break;
						case 2299:
								$args=array(259,247,229,241,235,276);  
								$p_type='Oils';
								break;
						case 2301:
								$args=array(256,244,226,238,232,277);
                                $p_type='Gels';								
								break;
						case 2303:
								$args=array(260,245,227,239,233,278);
                                  $p_type='Moisturizers';								
								break;
						case 2305:
								$args=array(257,243,225,237,231,279);  
								 $p_type='Hair Sprays';
								break;
						case 2307:
								$args=array(261,246,228,240,234,280);  
								 $p_type='Hair Colors';
								break;
						case 2309:
								$args=array(265,267,269,264,271,273);  
								 $p_type='Hair Care/Repair';
								break;
						case 2878:
								$args=array(255,216,193,220,197,182,224,208,212,201,256,257,243,244,277,279,225,226,237,238,231,232);  
								 $p_type='Styling Products';
								break;
								
					    case 2880:
								$args=array(274,272,263,270,268,266,285,310,292,298,304,286,309,291,297,303);  // Irons and Curlers and hair accessories
								 $p_type='Styling Tools';
								break;			
																		
						case 3031:
								$args=array(190,194,206,222,258);  
								 $p_type='Organic Products';
								break;	
								
						case 3194:
						     $args=array(262,248,230,242,236);  
						      $p_type='Hair Removers';
						       break;	
						case 3360:
						     $args=array(287,290,296,308,302,288,307,289,295,301);  
						      $p_type='Treatments';
						      break;		   
							   
						case 2287:
						
							 $p_type='Hair Extensions';
							$args=array(283,294,300,306,312); 
							break;

                      case 2866:
					
							 $p_type='Wigs';
							$args=array(284,293,299,305,311);   
							break;
					  case 5628:
					
							 $p_type='Irons and Curlers';
							$args=array(285,310,292,298,304);   
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
								<option value="desc" <?php if($sort=="desc") echo 'selected="selected"';?>>Most Popular</option>
								<option value="asc" <?php if($sort=="asc") echo 'selected="selected"';?>>Least Popular</option>
							</select>
							<input type="hidden" name="price" value="<?php echo $price;?>"/>
						</form>
					</div>
					<h3> <?php echo 'All '.$p_type;?></h3>
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
					<?php 
					//brandadmin.php
					getProductTypeLeftMenus($page_id,$type);?>
					
					</div>
					</div>
					<div class="span9">
					<div class="woocomerce margin-left-none">
						<?php if(count($c_ids)>0) {
						
						?>
                           <ul class="products">
						   
						   <?php 
						
						   foreach($c_ids as $match)
						   {
						   

						   ?>
							
                           <li class=" span4 product <?php if($i%3==0) echo 'first';?>">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                         <?php if( $mymatches && count($mymatches)>0 && in_array($match->id,$mymatches)) { ?>							   
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
		      <script>
		$( "#shop-menu-item" ).addClass( "active_menu_item" );
		</script>
<?php get_footer(); ?>
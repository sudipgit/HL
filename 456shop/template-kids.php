<?php
/*
Template Name: Kids Products
*/
?>
<?php get_header(); ?>


	<div id="main" class="wrap">
		<div class="container">
	           <?php	
             $args=null;   
				$type=$_GET['pt'];   
				  switch($type)
						{

						case 'conditioner':
								$args=array(253,213,192,217,196,177,221,205,209,200);  
								break;
						case 'shampoo':
								$args=array(254,215,191,219,195,176,223,207,211);  
								break;
						case 'oil':
								$args=array(259,247,229,241,235,276);  
								break;
						case 'gel':
								$args=array(256,244,226,238,232,277);  
								break;
						case 'moisturizer':
								$args=array(260,245,227,239,233,278);  
								break;
						case 'spray':
								$args=array(257,243,225,237,231,279);  
								break;
						case 'color':
								$args=array(261,246,228,240,234,280);  
								break;
						case 'repair':
								$args=array(265,267,269,264,271,273);  
								break;
						case 'wigs':
								$args=array(284,293,299,305,311);  
								break;
						case 'irons':
								$args=array(285,292,298,304,310);  
								break;
						case 'accessories':
								$args=array(286,291,297,303,309);  
								break;
						case 'relaxer':
								$args=array(287,290,296,302,308);  
								break;
						case 'texturizer':
								$args=array(288,289,295,301,307);  
								break;
						case 'extensions':
								$args=array(283,294,300,306,312);  
								break;		
																		
		

						}				  
				   
				 $sort=null;
				 if(isset($_POST['sortby']))
				     $sort=$_POST['sortby'];
				   
			  $c_ids=getKidsProducts($args);
				//var_dump($c_ids);
		
				include_once('brand-admin/templates/functions.php');
				$current_user = wp_get_current_user();
				if($current_user>0)
				$mymatches=getMatchingProducts($current_user->ID);
				
	
	
		
		
				
				
	             ?>
		<div class="row-fluid brand-info">
		

						
				</div>
				
				<div class="row-fluid brand-product-tabs hair-type">	
				
				<div class="brand-product-header">
					<div class="sort-by-product">
						<form id="sort-form" action="" method="post">
							<label for="">Sort By</label>
							<select name="sortby" onchange="submitForm();">
								<option value="" >Newest</option>
								<option value="desc" <?php if($sort=="desc") echo 'selected="selected"';?>>Price High to Low</option>
								<option value="asc" <?php if($sort=="asc") echo 'selected="selected"';?>>Price Low to High</option>
							</select>
						</form>
					</div>
					 <h2 class="hair-type-title"> Kids</h2>
					<h3> <?php echo ucfirst($type);?></h3>
					<p><?php echo count($c_ids);?> Items</p>
				<hr>
				</div>

					<div>	 
		          
					<div class="panel entry-content" id="tab11">
					
					<div class="span3 left-bar">
					<ul>
						<li <?php if($type=='all') echo 'class="active"';?>><a href="<?php echo get_permalink($page_id);?>?type=all">All</a></li>
		
						<li <?php if($type=='match') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=match">My Matches</a></li>
						<li <?php if($type=='conditioner') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=conditioner">Conditioner</a></li>
						<li <?php if($type=='shampoo') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=shampoo">Shampoo</a></li>
						<li <?php if($type=='oil') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=oil">Oil</a></li>
						<li <?php if($type=='gel') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=gel">Gel</a></li>
						<li <?php if($type=='moisturizer') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=moisturizer">Moisturizer</a></li>
						<li <?php if($type=='spray') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=spray">Hair Spray</a></li>
						<li <?php if($type=='color') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=color">Hair Color</a></li>
						<li <?php if($type=='repair') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=repair">Hair Care/Repair</a></li>
						
						<li <?php if($type=='extensions') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=extensions">Hair Extensions</a></li>
						<li <?php if($type=='wigs') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=wigs">Wigs</a></li>
						<li <?php if($type=='irons') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=irons">Irons and Curlers</a></li>
						<li <?php if($type=='accessories') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=accessories">Hair accessories</a></li>
						<li <?php if($type=='relaxer') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=relaxer">Relaxer/Straightening Treatment</a></li>
                        <li <?php if($type=='texturizer') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/kids/?pt=texturizer">Texturizer</a></li>
						
					
					</ul>					
					
					<span class="left-bar-title">All Brands</span>
					<ul class="left-brand-names">
					    <li><a href="<?php bloginfo('url'); ?>/brand/?id=114">Affirm</a></li>
                        <li><a href="<?php bloginfo('url'); ?>/brand/?id=99">African Pride</a></li>
                        <li><a href="#">Agadir</a></li>
						<li><a href="#">Aphogee</a></li>
					    <li><a href="#">Affirm</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=114">Aunt Jackies</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=113">Avlon</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=78">Beautiful Textures</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=109">Bigen</a></li>
						<li><a href="">Bobbi Boss</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=112">Bohyme</a></li>
						 <li><a href="<?php bloginfo('url'); ?>/brand/?id=117">Cantu</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=34">Carols Daughter</a></li>
					    <li><a href="#">Clear</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=105">Creme Of Nature</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=101">Dark & Lovely</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=81">Devachan</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=108">Doo Grow</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=115">Elasta Qp</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=107">Fantasia</a></li>
						 <li><a href="<?php bloginfo('url'); ?>/brand/?id=106">Hairfinity</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=111">Kinky Curly</a></li>
					    <li><a href="<?php bloginfo('url'); ?>/brand/?id=102">Mane n Tail</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=80">Miss Jessie</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=100">Mixed Chicks</a></li>
						<li><a href="#">Motions</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=104">Palmers</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=77">Profective</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=103">SheaMoisture</a></li>
						 <li><a href="#">Sulfur 8</a></li>
						<li><a href="<?php bloginfo('url'); ?>/brand/?id=101">4 Naturals</a></li>
					    <li><a href="<?php bloginfo('url'); ?>/brand/?id=79">Tahlija Waajid</a></li>
				
					</ul>
					
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
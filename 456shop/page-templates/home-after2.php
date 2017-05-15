<?php
/*
Template Name: Home4 After Template
*/
?>
<?php get_header(); 
$current_user = wp_get_current_user();
if($current_user->ID < 1)
{ ?>

 <script>
 window.location.href = '<?php bloginfo('url');?>/login/';
 </script>
<?php } 

 if(is_brand($current_user->ID))
 {?>
 <script>
 window.location.href = '<?php bloginfo('url');?>/dashboard/';
 </script>
 
 <?php
 }
 /**
 *
 Source:/functions/users.php
 Returns one-d array of users who same hair type of current user.
 *
 **/
 $members=getSameHairTypeUsers($current_user->ID,4);

 
 
?>

<div id="main" class="after-home4">
<!--<a href="https://plus.google.com/113846979574196210482" rel="publisher">Google+</a>-->
		<div class="row-fluid">	
			<div class="span12">	
				<?php if( function_exists('cyclone_slider') ) cyclone_slider('home-page-after-login'); ?>
			</div>
			<div class="clearfix"></div>
		</div>
	<div class="container container-wrap">
		<div class="row-fluid">	
		<div class="span9">	
				<div class="row-fluid">
				<?php 
				 /**
				 *
				 Source:/functions/products.php
				 Returns one dimensional array of products those are matched with current user's products.
				 *
				 **/
				$mymatchs=getMatchingProducts($current_user->ID,30);
				  if(count($mymatchs)>0)
                     shuffle($mymatchs);
				?>
					<div class="span12 sectionf matches">
						<h3 class="title">Newest Matches</h3>
						<?php if(count($mymatchs)>0){ ?>
                           <ul class="products carousel-slider">
						   
						   <?php 
					  $i=1; 
						   foreach($mymatchs as $match)
						   {
						      if($i>3)
							    break;

						   ?>
							 <li class="span4 product <?php if($i%4==1) echo 'first';?>">
						   <div class="product-item shadow-s3">
                       					   
						   <span class="onsale"></span>
							 <?php 
							 /**
							 *
							 Source:/functions/products.php
							 Generate HTML layout of product content of given current user
							 *
							 **/
                             getProductContent($match,$current_user->ID);?>
					         
                            </div>
						   </li>
						   <?php  $i++; } ?>
						</ul>
						<?php } ?>
					 <a  class="view_all" href="http://hairlibrary.com/my-matches/" >View All</a>
					</div>	
				</div>
				
				
			<?php
			/**Source: functions/brandadmin.php
			Returns one-d array of featured brand ids.**/
			$brands=getFeaturedBrand();
			/**Source: functions/brandadmin.php
			Returns one-d array of brand details of first featured brand.**/
			$brand1=getBrandDetails($brands[0]);
			/**Source: functions/brandadmin.php
			Returns one-d array of brand details of second featured brand.**/
			$brand2=getBrandDetails($brands[1]);
			?>	
				
							     <?php 
					 
					 /**Source: functions/photostore.php
					Returns current user's featured photo**/
					 $photos=getFeaturedPhotos($current_user->ID,3); 
					 
					 if(count($photos)>0)
				   {	?>			
			    
		
	              <div class="row-fluid">
                    <div class="span12 sectionf " >
                     <h3 class="title title-1"> <span class="hs-icon"> Featured Hair Stories</span> <a href="#" class="right-arrow"></a></h3>
					 
					  <div class="row-fluid photo-stories">
			
				
				       <?php  foreach($photos as $photo){?>
						 	<div class="span4">
								<?php 
								/**Source: functions/photostore.php
								Returns photo html layout of given photo id**/
							echo getPhotoHtml($photo);?>	
					
						 </div>
					<?php	} ?>
						 
				 
			
                </div><!-- end Photo Store-->
				 <a class="view_all" href="http://hairlibrary.com/hair-stories/">View All</a>
					 </div>
					 </div>
					 <?php } ?>
		<div class="row-fluid">
			<div class="span12 sectionf " >
				<h3 class="title title-1"> <span class="fb-title">Featured Brands</span> <a href="#" class="right-arrow"></a></h3>
				
				 <div class="row-fluid featured-brands">
				 <?php if( function_exists('cyclone_slider') ) cyclone_slider('home-page-popup-shop'); ?>

				 </div>
				 <a class="view_all" href="http://hairlibrary.com/brands" >View All</a>
			 </div>
		</div>
		

	</div>
	<div class="span3 after-home-sidebar">  
		<div class="top-trending">
			<h3 class="title">Trending Today</h3>
			<ul>
			<?php
			 /**
			 *
			 Return more active products those are uploaded today.
			 *
			 **/
			$products=getMoreActiveProducts(30);
			if(count($products)>0)
			 shuffle($products);
			  $j=0;
			if(count($products)>0)
			  foreach($products as $product){
			  if($j==4)
			   break;
			$details=get_post($product->object_id);
              $permalink=get_permalink($product->object_id);
               if (has_post_thumbnail($product->object_id)) {
		
	          	$img=get_the_post_thumbnail($product->object_id, array(100,100) );
		         }else{
		
		
		        $img='<img width="400" height="400" alt="Placeholder" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/placeholder.png">';
		          }
			?>
				<li class="trending-item">
					<div class="product-thumb">
						<div class="thumb inner-circle">
							<div class="thumb-inner">
								<?php echo $img;?>
							</div>
						</div>   
					</div>
					<div class="product-info">
						<p class="title "><a href="<?php echo $permalink;?>"><?php echo $details->post_title;?> </a></p>
						<a class="button btn primary hair_story" title="Add Hair Story" href="<?php bloginfo('url');?>/upload-photo/?pt=<?php echo $details->post_name;?>">Add hair story</a>
						<!--<a href="javascript:void()"  title="Take a look how to add hair story" class="question-mark"><img width="20px"src="<?php bloginfo('template_url');?>/assets/img/icons/Question mark-01.png"></a>-->
					</div>
				</li>
				
				<?php $j++;} ?>
				
			
			</ul>
		
		</div>
		<div class="related-user">
		<h3 class="title">Inspiring Now</h3>
			<?php 

	foreach($members as $user){ 
	
	
	$thumb = getThumbPath($user->ID);
	$blogger=get_user_meta($user->ID, 'who_are_you', true);
	if(!$blogger || $blogger=="")
	 $blogger='N/A';
	
	?>
		<div class="user">
			<div class="member-thumb">
				<div class="thumb mini-circle <?php echo $user->styleclass;?>">
				<div class="thumb-inner">
				<a href="<?php bloginfo('url');?>/profile/?n=<?php echo $user->user_login;?>"><img alt="profile pic" src="<?php echo $thumb;?>"></a>
				</div>
				</div>
			</div>		
			<div class="member-info">
			<p class="title "><a href="<?php bloginfo('url');?>/profile/?n=<?php echo $user->user_login;?>"><?php echo getFormatedDes($user->first_name);?></a></p>			
			</div>
		</div>		
		<?php  } ?>

		</div>
	</div>	
</div>

</div>

     <?php //} ?>   
<?php get_footer(); ?>
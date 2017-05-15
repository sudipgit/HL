
<?php
/*
Template Name: Template Shop
*/
?> 
<?php
if(is_brand($current_user->ID))
 {?>
 <script>
 window.location.href = '<?php bloginfo('url');?>/dashboard/';
 </script>
 
 <?php
 }
 ?>
<?php get_header();?>

<div id="main" class="shop">
<div class="container">
	<div class="row-fluid">
		<div class="span8 left_side_content">
			<div class="editors_picks">
				<h4>Our Favorite Brands</h4>
				<!--<img src="<?php bloginfo("template_url");?>/assets/img/shop/left_female_thumb.png">-->
				<?php if( function_exists('cyclone_slider') ) cyclone_slider('shop-page-popup-shop'); ?>
			</div>
			<div class="more_stories">
				<h4 class="desktop-display">Staff Picks From The Library</h4>
				<h4 class="mobile-display">Staff Picks</h4>
				<ul style="margin:0;">
					<li style="padding-bottom:8px"><a href="http://hairlibrary.com/brand/?n=laila-ali"><img alt="TheFinalTouch" src="<?php bloginfo("template_url");?>/assets/img/shop/TheFinalTouch.png"/></a></li>
					<li style="padding-bottom:8px"><a href="http://hairlibrary.com/collections/the-list/"><img alt="TheList" src="<?php bloginfo("template_url");?>/assets/img/shop/TheList.png"/></a></li>
					<li><a href="http://hairlibrary.com/collections/style-rethink/"><img alt="StyleRethink" src="<?php bloginfo("template_url");?>/assets/img/shop/StyleRethink.png"/></a></li>
				</ul>
			</div>
			<div class="featured_stories">
				<h2 class="hs-icon">Featured Hair Stories</h2>
				<div class="row-fluid">
				<?php 
					/**
					returns all photo of specific user if user id exist, else return all photo of user_photos
					**/
					 $photos=getAllPhotos(null,2,true);
					// $photos=getFeaturedPhotos($current_user->ID,3); 
					 
					 if(count($photos)>0)
				   {	
				   foreach($photos as $photo){?>
						 	<div class="span6 story">
							<?php 
							
							/**Source: functions/photostore.php
							Returns photo html layout of given photo id**/
							echo getPhotoHtml($photo);?>	
				
						 </div>
					<?php	} 
					} ?>
			 </div>		
			</div>
		</div>
		<div class="span4 right_sidebar">
			<div class="title"><h4>Top Picks</h4></div>
			<div class="row-fluid">
				<div class="span12">
					<ul>	
		             <?php 
			          	global $post;
						$subs = new WP_Query( array( 'post_parent' => 5898, 'post_type' => 'page','posts_per_page'=>7 ));
					
						if( $subs->have_posts() ) : while( $subs->have_posts() ) : $subs->the_post();
						?>					
						<li><a href="<?php the_permalink();?>">
							<?php the_post_thumbnail($post->ID);?>		
                             </a>							
							<div class="text_path">
								<h3><?php the_title();?></h3>
								
							</div>
						</li>	
                        <?php endwhile; endif; wp_reset_postdata(); ?>									
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php 
	 $current_user=wp_get_current_user();	
		/**
		*
		Source:/functions/products.php
		Returns one dimensional Array of sorted Products based on Total amount of like
		*
		**/	 
		$treanding=getTrendingProducts(20);		
	?>
	
	<div class="tranding_live">
			<h2>Trending Live</h2>

	<script type="text/javascript" src="<?php bloginfo("url");?>/wp-content/themes/456shop/assets/js/jssor.js"></script>
    <script type="text/javascript" src="<?php bloginfo("url");?>/wp-content/themes/456shop/assets/js/jssor.slider.js"></script>
   <script>
        jssor_slider1_starter = function (containerId) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 160,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                $SlideWidth: 225,                                   //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 150,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 3, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 4,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                              //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 0,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 0,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                      //[Optional] Steps to go for each navigation request, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$(containerId, options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 940));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);


            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
            }

            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
            //    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //}
            ////responsive code end
        };
    </script>
    <!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. -->
    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; margin: 0 auto; width: 940px; max-width:100%; height: 335px;">

        <!-- Loading Screen 
		
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                        background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
               <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                        top: 0px; left: 0px;width: 100%;height:100%;"> 
            </div>
        </div>-->

        <!-- Slides Container -->
		<?php if($treanding) {?>
        <div class="products" u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 97%; height: 335px; overflow: hidden;">
           <?php 
						   $i=1;
						   foreach($treanding as $match) {							
							if($i>20)
							   break;
                             
						   ?>
							
                           <div class="product">
						   <div class="product-item">
                         <?php 
							/**
							 *
							 Source:/functions/products.php
							 Generate HTML layout of product content of given current user
							 *
							 **/
						 getProductContent($match->id,$current_user->ID);?>
                            </div>
						   </div>
						   <?php $i++;} ?>
        </div>
		<?php }  else { ?>						   
			<p> No Product Matches</p>
		<?php } ?>
        <!-- Bullet Navigator Skin Begin -->
        <style>
            /* jssor slider bullet navigator skin 03 css */
            /*
                    .jssorb03 div           (normal)
                    .jssorb03 div:hover     (normal mouseover)
                    .jssorb03 .av           (active)
                    .jssorb03 .av:hover     (active mouseover)
                    .jssorb03 .dn           (mousedown)
                    */
            .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
                background: url("http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/a03.png") no-repeat;
                overflow: hidden;
                cursor: pointer;
            }

            .jssorb03 div {
                background-position: -5px -4px;
            }

                .jssorb03 div:hover, .jssorb03 .av:hover {
                    background-position: -35px -4px;
                }

            .jssorb03 .av {
                background-position: -65px -4px;
            }

            .jssorb03 .dn, .jssorb03 .dn:hover {
                background-position: -95px -4px;
            }
        </style>
        <!-- Arrow Navigator Skin Begin -->
        <style>
            /* jssor slider arrow navigator skin 03 css */
            /*
                    .jssora03l              (normal)
                    .jssora03r              (normal)
                    .jssora03l:hover        (normal mouseover)
                    .jssora03r:hover        (normal mouseover)
                    .jssora03ldn            (mousedown)
                    .jssora03rdn            (mousedown)
                    */
            .jssora03l, .jssora03r, .jssora03ldn, .jssora03rdn {
                position: absolute;
                cursor: pointer;
                display: block;                
                overflow: hidden;
            }

            .jssora03l {
				background: url("http://hairlibrary.com/wp-content/themes/456shop/assets/img/left-black-arrow.png") no-repeat;
                background-position: 0px 0px;
                background-size: 50px 50px;
				top: 100px !important;
            }

            .jssora03r {
			background: url("http://hairlibrary.com/wp-content/themes/456shop/assets/img/right-black-arrow.png") no-repeat;
                background-position: 0px 0px;
				background-size: 50px 50px;
				top: 100px !important;
            }

            .jssora03l:hover {
                background-position: 0px 0px;
            }

            .jssora03r:hover {
                background-position: 0px 0px;
            }

            .jssora03ldn {
				background: url("http://hairlibrary.com/wp-content/themes/456shop/assets/img/left-black-arrow.png") no-repeat;
                background-position: 0px 0px;
				background-size: 50px 50px;
				top: 100px !important;
            }

            .jssora03rdn {
			background: url("http://hairlibrary.com/wp-content/themes/456shop/assets/img/right-black-arrow.png") no-repeat;
                background-position: 0px 0px;
				background-size: 50px 50px;
				top: 100px !important;
            }
        </style>
       <!-- Arrow Left -->
        <span u="arrowleft" class="jssora03l" style="width: 55px; height: 55px; top: 100px; left: -15px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora03r" style="width: 55px; height: 55px; top: 100px; right: -20px">
        </span>
        <!-- Arrow Navigator Skin End 
        <a style="display: none" href="http://www.jssor.com">slideshow</a>
       -- Trigger -->
        <script>
            jssor_slider1_starter('slider1_container');
        </script>
    </div>
    </div>
	
	
	

</div>
</div>
<style>

</style>		
	      <script>
		$( "#shop-menu-item" ).addClass( "active_menu_item" );
		</script>
<?php get_footer(); ?>  
<?php
/*
Template Name: Landing Page bk
*/
?>
<?php get_header(); ?>


		<div id="main" class="wrap landing-page">
			<div class="container">
	           
				
				<div class="row-fluid">
					<div class="span12">
						<?php echo do_shortcode('[anything_slides] ');?>	
					</div>
				</div>
				
				
				<div class="row-fluid">
					<div class="span12 sectionf">
						<h3 class="title"> Shop The Library By Hair Type </h3>
						<ul>
							<li>
								<img src="<?php bloginfo('template_url');?>/assets/img/landing/extension.jpg" alt="" />
								<p>Weave</p>
							</li>
							<li>
								<img src="<?php bloginfo('template_url');?>/assets/img/landing/relaxed.jpg" alt="" />
								<p>Relaxed</p>
							</li>
							<li>
								<img src="<?php bloginfo('template_url');?>/assets/img/landing/permed.jpg" alt="" />
								<p>Permed</p>
							</li>
							<li>
								<img src="<?php bloginfo('template_url');?>/assets/img/landing/braids.jpg" alt="" />
								<p>Braids</p>
							</li>
							<li>
								<img src="<?php bloginfo('template_url');?>/assets/img/landing/naturalcurl.jpg" alt="" />
								<p>Curly</p>
							</li>
							<li>
								<img src="<?php bloginfo('template_url');?>/assets/img/landing/color.jpg" alt="" />
								<p>Color</p>
							</li>
							<li>
								<img src="<?php bloginfo('template_url');?>/assets/img/landing/locks.jpg" alt="" />
								<p>Locks</p>
							</li>
						</ul>
					</div>	
				</div>
				
				<div class="row-fluid">
					<div class="span12 landing-products home-bottom-slider">
						<h3 class="title"> Featured Products</h3>
							<div id="left-button"></div>
							<?php echo do_shortcode('[showbiz landing-products]');?>
							<div id="right-button"></div>						
					</div>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<h3 class="title"> How It Works </h3>	
						<?php //echo do_shortcode('[cycloneslider id="works-step"]');?>
						<?php echo do_shortcode('[layerslider id="27"]');?>
					</div>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
					<h3 class="title">  Hair Library Magazine Feature </h3>
					  
						<img src="<?php bloginfo('template_url');?>/assets/img/landing/sectionE.png" alt="Section E" />	
						<?php// echo do_shortcode('[cycloneslider id="managine-slider"]');?>
						
					</div>
				</div>
				
				

			</div>
		</div>
        
<?php get_footer(); ?>
<?php
/*
   Template Name: Special Collections

*/
 


?>
<?php get_header();
 $current_user = wp_get_current_user();
 ?>
  
		<div id="main" class="wrap-page" style="padding-top: 44px !important;">
			<div class="collections-banner">
				<img src="<?php bloginfo('template_url');?>/assets/img/collections/collection_banner.png" />
			</div>
			<div class="collections-title"><h2>Find What You're Looking For</h2></div>
			<div class="collections">
				<ul class="row-fluid">
				
				<?php 
				global $post;
				$subs = new WP_Query( array( 'post_parent' => 5898, 'post_type' => 'page' ));
				$i = 0;
				if( $subs->have_posts() ) : while( $subs->have_posts() ) : $subs->the_post();
				?>
				<li class="span3 collection <?php if($i%4==0){ echo 'first';}?>">
					<a href="<?php the_permalink();?>"><?php the_post_thumbnail($post->ID);?></a>
					<div class="lc-count">
						<ul>
							<li><p>10 comments</p></li>
							<li><p>5 likes</p></li>
						</ul>
					</div>
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<div class="c-description"><?php  the_excerpt(); ?></div>
				</li>
				<?php
				$i++;
				endwhile; endif; wp_reset_postdata(); ?>									
				</ul>			
			</div>
		</div>
<?php get_footer(); ?>
	
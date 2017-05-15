<?php
/*
Template Name: Sitemap Template
*/
?>
<?php get_header(); ?>
<?php $left_sidebar = get_post_meta($post->ID, 'left_sidebar_value', true);?>

		<div id="main" class="wrap post-template sidebar-template <?php if ($left_sidebar){?>left-sidebar-template<?php }?>">
			<div class="container">
				<?php get_template_part('includes/heading' ) ?>
				<div class="row-fluid">
					<div class="span8 post-page">
				        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				        <div class="shop-image">	
	                        <?php $post_thumbnail_id = get_post_thumbnail_id(); ?> 
	                        <?php $alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);?>
				            <img alt="<?php echo $alt; ?>" class="shadow-s3 wpstickies"  src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'front-image2' ); echo $image[0];?>" />
				        </div>
				        <?php }?>
			        	<div class="row-fluid">
	                        <?php $query = new WP_Query();?>
	                        <?php $posts = $query->query('ignore_sticky_posts=1&post_status=publish');?>
	                        <?php if($posts){?>
				        	<div class="span6">
						        <h4><?php _e('Blog Posts', GETTEXT_DOMAIN) ?>:</h4>
						        <div class="advanced lists-newspaper">
				                    <ul>
				                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
				                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				                        <?php endwhile; endif; ?> 
				                        <?php wp_reset_query(); ?>
				                    </ul>
						        </div>
				        	</div>
				        	<?php }?>
				        	<?php if(!$posts){?>
				        	<div class="span12">
					        <?php }else{?>
					        <div class="span6">
					        <?php }?>
		                        <h4><?php _e('Available Pages', GETTEXT_DOMAIN) ?>:</h4>
		                        <div class="advanced lists-page">
			                        <ul>
			                            <?php wp_list_pages('title_li=&posts_per_page=15'); ?>
			                        </ul>
		                        </div>
				        	</div>
				        </div>
				        <hr />
			        	<div class="row-fluid">
			        	
	                        <?php $query = new WP_Query();?>
	                        <?php $portfolio = $query->query('post_type=portfolio&ignore_sticky_posts=1&post_status=publish');?>
	                        <?php $products = $query->query('post_type=product&ignore_sticky_posts=1&post_status=publish');?>
	                        
	                        <?php if($products){?>
				        	
				        	<?php if(!$portfolio){?>
				        	<div class="span12">
					        <?php }else{?>
					        <div class="span6">
					        <?php }?>
						        
						        <h4><?php _e('Available Products', GETTEXT_DOMAIN) ?>:</h4>
						        <div class="advanced lists-shopping-cart">
				                    <ul>
										<?php $query = new WP_Query();?>
										<?php $products = $query->query('posts_per_page=-1&post_type=product&ignore_sticky_posts=1&post_status=publish');?>
				                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
				                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				                        <?php endwhile; endif; ?> 
				                        <?php wp_reset_query(); ?>
				                    </ul>
						        </div>
				        	</div>
				        	<?php }?>
				        	<?php wp_reset_query();?>
	                        
				        	<?php $query = new WP_Query();?>
	                        <?php $products = $query->query('post_type=product&ignore_sticky_posts=1&post_status=publish');?>
	                        <?php $portfolio = $query->query('post_type=portfolio&ignore_sticky_posts=1&post_status=publish');?>
	                        
				        	<?php if($portfolio){?>
				        	
				        	<?php if(!$products){?>
				        	<div class="span12">
					        <?php }else{?>
					        <div class="span6">
					        <?php }?>
					        
		                        <h4><?php _e('Portfolio Posts', GETTEXT_DOMAIN) ?>:</h4>
		                        <div class="advanced lists-picture">
			                    <ul>
									<?php $query = new WP_Query();?>
									<?php $portfolio = $query->query('posts_per_page=-1&post_type=portfolio&ignore_sticky_posts=1&post_status=publish');?>
			                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
			                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			                        <?php endwhile; endif; ?> 
			                        <?php wp_reset_query(); ?>
			                    </ul>
		                        </div>
				        	</div>
				        	<?php }?>
				        	
				        </div>
                    </div>
                    <?php get_sidebar(); ?>
				</div>
			</div>
		</div>
        
<?php get_footer(); ?>
<?php get_header();?>

		<div id="main" class="wrap post-template sidebar-template <?php if ($left_sidebar){?>left-sidebar-template<?php }?>">
			<div class="container">
				<?php get_template_part('includes/heading' ) ?>
				<div class="row-fluid">
					<div class="<?php if (have_posts()){?>span12<?php } else{?>span8<?php }?> post-page">
						<?php if (have_posts()){?>
                        <div class="Search">
                            <form role="search" method="get" action="<?php echo site_url(); ?>">
                                <div class="input-append">
                                    <input id="s" class="search_input" type="text" name="s" value="<?php the_search_query() ?>"/>
                                    <input class="btn btn-primary" id="searchsubmit" type="submit" value="<?php _e('Search', GETTEXT_DOMAIN) ?>"/>
                                </div>
                            </form>
                        </div>
                        <?php }?>
	                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	                        <?php get_template_part('includes/search-post') ?>
	                    <?php endwhile; ?>
						<div class="pagination">
							<?php previous_posts_link(__('&larr; Newer Entries', GETTEXT_DOMAIN), 0) ?>
							<?php next_posts_link(__('Older Entries &rarr;', GETTEXT_DOMAIN), 0); ?>
						</div>
	                    <?php else: ?>
	                    <h4><?php _e('Nothing Found', GETTEXT_DOMAIN) ?></h4>
	                    <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></p>
                        <form role="search" method="get" action="<?php echo site_url(); ?>">
                            <div class="input-append">
                                <input id="s" class="search_input" type="text" name="s" value="<?php the_search_query() ?>"/>
                                <input class="btn btn-primary" id="searchsubmit" type="submit" value="<?php _e('Search', GETTEXT_DOMAIN) ?>"/>
                            </div>
                        </form>
                        <hr />
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
	                        <?php $portfolio = $query->query('posts_per_page=-1&post_type=portfolio&ignore_sticky_posts=1&post_status=publish');?>
	                        <?php $products = $query->query('posts_per_page=-1&post_type=product&ignore_sticky_posts=1&post_status=publish');?>
	                        
	                        <?php if($products){?>
				        	
				        	<?php if(!$portfolio){?>
				        	<div class="span12">
					        <?php }else{?>
					        <div class="span6">
					        <?php }?>
						        
						        <h4><?php _e('Available Products', GETTEXT_DOMAIN) ?>:</h4>
						        <div class="advanced lists-shopping-cart">
				                    <ul>
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
	                        <?php $products = $query->query('posts_per_page=-1&post_type=product&ignore_sticky_posts=1&post_status=publish');?>
	                        <?php $portfolio = $query->query('posts_per_page=-1&post_type=portfolio&ignore_sticky_posts=1&post_status=publish');?>
	                        
				        	<?php if($portfolio){?>
				        	
				        	<?php if(!$products){?>
				        	<div class="span12">
					        <?php }else{?>
					        <div class="span6">
					        <?php }?>
					        
		                        <h4><?php _e('Portfolio Posts', GETTEXT_DOMAIN) ?>:</h4>
		                        <div class="advanced lists-picture">
			                    <ul>
			                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
			                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			                        <?php endwhile; endif; ?> 
			                        <?php wp_reset_query(); ?>
			                    </ul>
		                        </div>
				        	</div>
				        	<?php }?>
				        	
				        </div>
	                    <?php endif; ?>
                    </div>
                    <?php if (!have_posts()){?><?php get_sidebar(); ?><?php }?>
				</div>
			</div>
		</div>
        
<?php get_footer(); ?>
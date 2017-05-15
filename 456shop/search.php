<?php get_header();?>

		<div id="main" class="search-result wrap post-template sidebar-template <?php if ($left_sidebar){?>left-sidebar-template<?php }?>">
			<div class="container">
				<?php get_template_part('includes/heading' ) ?>
					<?php if (have_posts()){?>
                        <div class="Search">
                            <form role="search" method="get" action="<?php echo site_url(); ?>">
                                <div class="input-append">
                                    <input id="s" class="search_input" type="text" name="s" value="<?php the_search_query() ?>"/>
                                    <input class="btn btn-primary button" style="padding:5px 10px" id="searchsubmit" type="submit" value="<?php _e('Search', GETTEXT_DOMAIN) ?>"/>
                                </div>
                            </form>
                        </div>
                        <?php }?>
				<div class="row-fluid">
					<div class="<?php if (have_posts()){?>span12<?php } else{?>span8<?php }?> post-page">
					
							 <ul class="products">
	                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
						   
	                        <?php get_template_part('includes/search-post') ?>
							
	                    <?php endwhile; ?>
						</ul>
						<div class="clear"></div>
						<div class="pagination2">
							<?php //previous_posts_link(__('&larr; Newer Entries', GETTEXT_DOMAIN), 0) ?>
							<?php //next_posts_link(__('Older Entries &rarr;', GETTEXT_DOMAIN), 0); ?>
							<?php if(function_exists('wp_paginate')) {
									wp_paginate();
								}
								else {
									twentytwelve_content_nav( 'nav-below' );
								}
								?> 
						</div>
	                    <?php else: ?>
	                    <h4><?php _e('Nothing Found', GETTEXT_DOMAIN) ?></h4>
	                    <p><?php _e('Sorry, no product matched your criteria.', GETTEXT_DOMAIN) ?></p>
						<div class="Search">
                        <form role="search" method="get" action="<?php echo site_url(); ?>">
                            <div class="input-append">
                                <input id="s" class="search_input" type="text" name="s" value="<?php the_search_query() ?>"/>
                                <input class="btn btn-primary button" style="padding:5px 10px" id="searchsubmit" type="submit" value="<?php _e('Search', GETTEXT_DOMAIN) ?>"/>
                            </div>
                        </form>
						</div>
                    
			        	
			       
	                    <?php endif; ?>
                    </div>
                    <?php if (!have_posts()){?><?php get_sidebar(); ?><?php }?>
				</div>
			</div>
		</div>
        
<?php get_footer(); ?>
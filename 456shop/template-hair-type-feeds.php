<?php
/*
Template Name: Hair Type Feeds Template
*/
?>
<?php get_header(); 
$current_user = wp_get_current_user();
?>

		<div id="main" class="wrap post-template hair-type-feed">
			<div class="container">
			<?php if($post->ID==8 || $post->ID==9){?>
				<div id="top-notify" class="woocommerce-message">
				<?php _e( 'All Products ONLY Ship Within The United States At This Time.', 'woocommerce' ) ?>
				</div>
				<?php }?>
				<?php //get_template_part('includes/heading' ) ?>
				<div class="row-fluid">
					<div class="span12">
						<h3 class="title title-2">
							<?php $posts_page_id = get_option( 'page_for_posts');
                            $posts_page = get_page( $posts_page_id);
							?><span><? the_title();?><span>							
						</h3>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12 post-page">
			        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			        <div class="shop-image">	
                        <?php $post_thumbnail_id = get_post_thumbnail_id(); ?> 
                        <?php $alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);?>
			            <img alt="<?php echo $alt; ?>" class="shadow-s3 wpstickies"  src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'front-image' ); echo $image[0];?>" />
			        </div>
			        <?php }?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content();?>
                    <?php endwhile; else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></p>
                    <?php endif; ?>
                    </div>
				</div>
				<div class="related-ht-products">
					 <?php	
			 
			   global $post;
			   $page_id=$post->ID;       
			    $args=null;
				  switch($page_id){
						case 5546:
								$args=array(253,213,192,217,196,177,221,205,209,200);  
								break;
						case 5549:
								$args=array(253,213,192,217,196,177,221,205,209,200);  
								break;
						case 5223:
								$args=array(261,246,228,240,234,280);  
								break;
						case 5248:
								$args=array(265,267,269,264,271,273);  
								break;
						case 5251:
								$args=array(255,216,193,220,197,182,224,208,212,201,256,257,243,244,277,279,225,226,237,238,231,232);
								break;
						case 5542:
						     $args=array(262,248,230,242,236);  
						       break;	   
						case 5534:
							$args=array(283,294,300,306,312); 
							break;

                      case 5536:
							$args=array(284,293,299,305,311);   
							break;
					  case 5254:
							$args=array(285,310,292,298,304);   
							break;		
																
								
						}


						 $c_ids=get_type_products($args,null,null,null);
					?>
					<div class="woocomerce margin-left-none">
						<?php if(count($c_ids)>0) {
						
						?>
							<h3 class="title title-1"><span>Shop The Library</span></h3>
                           <ul class="row-fluid products">
						   
						   <?php 
							$i = 0;
							shuffle($c_ids);
						   foreach($c_ids as $match)
						   {
						   
							if($i ==4){ break;}
						   ?>
							
                           <li class=" span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">

                             <?php getProductContent($match->id,$current_user->ID);?>
					         
                            </div>
						   </li>
						   <?php $i++; 
						   
						   
						   } //} ?>
						   </ul>
						   <?php }?>
						   </div>
				</div>
			</div>
		</div>
        
<?php get_footer(); ?>
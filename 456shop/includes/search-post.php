<!--<div class="search-post">
   <h4><?php the_title(); ?></h4>
    <small><?php echo get_the_time('j F Y'); ?></small>
    <?php if(get_the_excerpt()){?>
    <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
    <?php }else{?>
    <a href="<?php the_permalink(); ?>"><p>view more...</p></a>
    <?php }?>
    <hr />
</div>	-->
<?php  $current_user=wp_get_current_user();

 if($current_user>0)
$mymatches=getMatchingProducts($current_user->ID);
 ?>
						   
							
           <li class="span3 product ">
	       	<div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
             <?php if( $mymatches && count($mymatches)>0 && in_array(get_the_ID(),$mymatches)) { ?>						   
						   <span class="onsale"></span>
						   <?php } ?>	          
                  <?php getProductContent(get_the_ID(),$current_user->ID);?>
            </div>
			</li>

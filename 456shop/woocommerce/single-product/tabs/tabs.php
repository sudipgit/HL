<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

 global $post;
  //include_once('brand-admin/templates/functions.php');
 $brand= get_brand_info($post->post_author);
 //var_dump($brand);
  $thumbpath=getBrandThumbPath($brand->user_id,'thumb');


if ( ! empty( $tabs ) ) : ?>
 <!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />-->
<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script>
$(function() {
$( "#accordion" ).accordion();
});
</script>

	<div class="woocommerce-tabs">
		<div id="accordion">
		 <?php
          $video=get_post_meta($post->ID,'product_video_embed',true);
		  if($video!="")
		  {?>
		     <h3>Video</h3>
			 <div class="video panel">
			 <?php  echo getFormatedDes($video);?>
			 </div>
		<?php } ?>
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<h3>
					<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?>
				</h3>
                  <div class="panel entry-content" id="tab-<?php echo $key ?>">
				    <?php call_user_func( $tab['callback'], $key, $tab ) ?>
			</div>
			<?php endforeach; ?>
			
			<h3>Brand Info</h3>
			 <div class="brand-info panel">
	            
	 <ul>
	   <li>
	    
	     <div class="brand-logo">
		   <img src="<?php echo $thumbpath;?>" width="130"/>
		 </div>
		 <div class="brand-des">
		  <h4> <?php echo getFormatedDes($brand->company_name);?> </h4>
		 <p>
          <?php 
	
		  echo getFormatedDes($brand->overview);?> 
		   </p>
		   <p>Website: <a href="<?php echo $brand->company_website;?>" target="_blank"><?php echo getFormatedDes($brand->company_website);?></a> </p>
		   <p class="align-right"><a href="http://hairlibrary.com/brand/?n=<?php echo getBrandSlug($brand->user_id);?>">More From <?php echo getFormatedDes($brand->company_name);?></a></p>
		   
		  </div>
	   <div class="clear"></div>
	   </li>

	 </ul>
	
	</div>
			
		</div>
	</div>

<?php endif; ?>
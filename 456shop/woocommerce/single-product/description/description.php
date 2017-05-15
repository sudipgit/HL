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
?>
 <?php
 global $post;
  //include_once('brand-admin/templates/functions.php');
 $brand= get_brand_info($post->post_author);
 //var_dump($brand);
   if($brand->thumb=="")
     $thumbpath='http://myhypehair.com/morgandemo/wp-content/uploads/brandphoto/thumb.png';
	else
	 $thumbpath='http://myhypehair.com/morgandemo/wp-content/uploads/brandphoto/'.$brand->user_id.'/'.$brand->thumb;
//var_dump($brand); 
 ?>
<div class="single-product-des">
  <div class="des-left span6">
     <div class="special-des">
	  <p><?php  echo  get_post_meta( $post->ID, 'brand_description', true); ?></p>
	 </div>
    <div class="brand-info">
	 <h3> <?php echo $brand->company_name;?> </h3>
	 <ul>
	   <li>
	    
	     <div class="brand-logo">
		   <img src="<?php echo $thumbpath;?>" width="130"/>
		 </div>
		 <div class="brand-des">
		 <p>
          <?php echo $brand->overview;?> 
		   </p>
		   <p>Website: <a href="<?php echo $brand->company_website;?>"><?php echo $brand->company_website;?></a> </p>
		   <p class="align-right"><a href="http://myhypehair.com/morgandemo/brand?id=<?php echo $brand->user_id;?>">More From <?php echo $brand->company_name;?></a></p>
		   
		  </div>
	   <div class="clear"></div>
	   </li>
	   
	    <li class="company-info">
	    
	     <div class="company-logo">
		   <img src="<?php bloginfo('template_url');?>/assets/img/Hl_logo.png" width="80"/>
		 </div>
		 <div class="company-des">
		 <p>
            We guarantee that Hairlibrary is authorized to sell this product and that every brand we sell is authentic 
		   </p>
		  </div>
	    <div class="clear"></div>
	   </li>
	 </ul>
	
	</div>
  </div>
  
  <div class="des-right span6">
     <div class="single-product-des-tabs">
	   <?php  woocommerce_output_product_data_tabs(); ?>
	 </div>
  </div>
   <div class="clear"></div>
</div>

 

 

 
 
<?php
/*
Template Name: Brand Page2
*/
?>
<?php get_header(); ?>


		<div id="main" class="wrap">
			<div class="container">
	           <?php	
               $bid=$_GET['id'];
			   if(!$bid)
                 $bid=34;				
				$brand= get_brand_info($bid);
                if($brand->thumb=="")
                   $thumbpath='http://hairlibrary.com/wp-content/uploads/brandphoto/thumb.png';
	            else
            	   $thumbpath='http://hairlibrary.com/wp-content/uploads/brandphoto/'.$brand->user_id.'/'.$brand->thumb;
				   
				$c_ids=get_brand_products($bid,array(213,192,217,196,177,221,200,205,209));  
			    $s_ids=get_brand_products($bid,array(215,191,219,195,176,223,207,211,199));  
			    $sp_ids=get_brand_products($bid,array(216,193,220,197,182,224,208,212,201));  


	             ?>
				<div class="row-fluid brand-info">
				 <h3> <?php echo $brand->company_name;?> </h3>
               
				 <div class="span3"><img src="<?php echo $thumbpath;?>" width="130" alt="Profile" /></div>
				<div class="span8"><h4>Brand Overview</h4>	
				<p> <?php echo $brand->overview;?> </p>
				</div>
					
				</div>
				
				<div class="row-fluid brand-product-tabs">	
				
					<div>	 
		             <ul class="tabs">
				     <li class="tab-item active" id="tab1">My Conditioners</li>
					  <li class="tab-item" id="tab2">My Shampoos</li>
				     <li class="tab-item" id="tab3">My Styling Products</li>
				
			
		            </ul>
					<div class="clear"></div>
					<div class="panel entry-content" id="tab11">
					<div class="woocommerce">
						<?php if($c_ids) {?>
                           <ul class="products">
						   
						   <?php foreach($c_ids as $match) { ?>
							
                           <li class=" span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                             <!-- <span class="onsale">Sale!</span>-->
                              <div class="imagewrapper effect-thumb effect-thumb-2">
                                <?php if (has_post_thumbnail($match->id)) {
								
								echo get_the_post_thumbnail($match->id, array(480,480) );
								}else{
								?>
								
								<img width="480" height="480" alt="Placeholder" src="http://hairlibrary.com/wp-content/themes/456shop/assets//img/placeholder.png">
								<?php }?>
                                <div class="effect-wrap clearfix">
                                    <a class="icon info ttip" href="<?php echo post_permalink($match->id); ?> " data-placement="bottom" rel="tooltip" data-original-title="Read More"></a>
                                    <a class="icon icon2 shopping-cart ttip add_to_cart_button product_type_simple" data-placement="bottom" rel="tooltip" href="/morgandemo/customer-profile/?add-to-cart=1801" data-product_id="1801" data-original-title="Add to cart"></a>
                                </div>
                           </div>
                        <div class="clearfix"></div>
                        <h3><?php echo get_the_title($match->id); ?> </h3>
                       <span class="price">
                        <!--  <del>
                               <span class="amount">><?php echo get_post_meta( $match->id,'_regular_price', true );?></span>
                          </del>-->

                           <span class="amount">$<?php echo get_post_meta( $match->id, '_sale_price', true );?></span>
                         
                              </span>
                            </div>
						   </li>
						   <?php } ?>
						   </ul>
						   <?php } else { ?>
						   
						   <p> No products available</p>
						   <?php } ?>
						   </div>
					
					
					</div> 
					<div class="panel entry-content hide" id="tab21">
					
					<div class="woocommerce">
						<?php if($s_ids) {?>
                           <ul class="products">
						   
						   <?php foreach($s_ids as $match) { ?>
							
                           <li class=" span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                             <!-- <span class="onsale">Sale!</span>-->
                              <div class="imagewrapper effect-thumb effect-thumb-2">
                                <?php if (has_post_thumbnail($match->id)) {
								
								echo get_the_post_thumbnail($match->id, array(480,480) );
								}else{
								?>
								
								<img width="480" height="480" alt="Placeholder" src="http://hairlibrary.com/wp-content/themes/456shop/assets//img/placeholder.png">
								<?php }?>
                                <div class="effect-wrap clearfix">
                                    <a class="icon info ttip" href="<?php echo post_permalink($match->id); ?> " data-placement="bottom" rel="tooltip" data-original-title="Read More"></a>
                                    <a class="icon icon2 shopping-cart ttip add_to_cart_button product_type_simple" data-placement="bottom" rel="tooltip" href="/morgandemo/customer-profile/?add-to-cart=1801" data-product_id="1801" data-original-title="Add to cart"></a>
                                </div>
                           </div>
                        <div class="clearfix"></div>
                        <h3><?php echo get_the_title($match->id); ?> </h3>
                       <span class="price">
                        <!--  <del>
                               <span class="amount">><?php echo get_post_meta( $match->id,'_regular_price', true );?></span>
                          </del>-->

                           <span class="amount">$<?php echo get_post_meta( $match->id, '_sale_price', true );?></span>
                         
                              </span>
                            </div>
						   </li>
						   <?php } ?>
						   </ul>
						   <?php } else { ?>
						   
						   <p> No products available</p>
						   <?php } ?>
						   </div>

					</div> 
					<div class="panel entry-content hide" id="tab31">
					
					<div class="woocommerce">
						<?php if($sp_ids) {?>
                           <ul class="products">
						   
						   
						   <?php foreach($sp_ids as $match) { ?>
							
                           <li class=" span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                             <!-- <span class="onsale">Sale!</span>-->
                              <div class="imagewrapper effect-thumb effect-thumb-2">
                                <?php if (has_post_thumbnail($match->id)) {
								
								echo get_the_post_thumbnail($match->id, array(480,480) );
								}else{
								?>
								
								<img width="480" height="480" alt="Placeholder" src="http://hairlibrary.com/wp-content/themes/456shop/assets//img/placeholder.png">
								<?php }?>
                                <div class="effect-wrap clearfix">
                                    <a class="icon info ttip" href="<?php echo post_permalink($match->id); ?> " data-placement="bottom" rel="tooltip" data-original-title="Read More"></a>
                                    <a class="icon icon2 shopping-cart ttip add_to_cart_button product_type_simple" data-placement="bottom" rel="tooltip" href="/morgandemo/customer-profile/?add-to-cart=1801" data-product_id="1801" data-original-title="Add to cart"></a>
                                </div>
                           </div>
                        <div class="clearfix"></div>
                        <h3><?php echo get_the_title($match->id); ?> </h3>
                       <span class="price">
                        <!--  <del>
                               <span class="amount">><?php echo get_post_meta( $match->id,'_regular_price', true );?></span>
                          </del>-->

                           <span class="amount">$<?php echo get_post_meta( $match->id, '_sale_price', true );?></span>
                         
                              </span>
                            </div>
						   </li>
						   <?php } ?>
						   </ul>
						   <?php } else { ?>
						   
						   <p> No products available</p>
						   <?php } ?>
						   </div>
					
					</div> 
					
					<div class="clear"></div>
					</div>
		<script type="text/javascript"> 
		var oid="tab1";

$(".tab-item").click(function() {
c_tid=this.id;
if(oid!=c_tid)
{
  
   oa_cid="#"+oid+'1';
   ca_cid="#"+c_tid+'1';
   ca_tid="#"+c_tid;
   oa_tid="#"+oid;
   
    $(ca_tid).addClass('active');
     $(oa_tid).removeClass('active');
    $(oa_cid).hide();
   $(ca_cid).fadeIn(1000);
	
 oid=c_tid;

}


});
$( "#shop-menu-item" ).addClass( "active_menu_item" );
		</script>
			</div>
		</div>
        
<?php get_footer(); ?>
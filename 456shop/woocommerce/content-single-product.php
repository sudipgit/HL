<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
?>


<div id="single-product-page-popup-outer">
	<div id="single-product-page-popup-inner">
		<a id="close-single-product-page-popup" href="javascript:void()">Close</a>	
		<div class="single-product-page-popup-content" style="display:none;">
			<p class="how-to-add-hs">How To Add A Hair Story</p>
			<?php if( function_exists('cyclone_slider') ) cyclone_slider('single-product-page-popup'); ?>
		</div>
	</div>
</div>

<?php

 global $post;
 $current_user = wp_get_current_user();

	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	 do_action( 'woocommerce_before_single_product' );
	 ?>
	 	 <div class="mobile-display">
	 <a title="Add Hair Story" href="<?php bloginfo('url');?>/upload-photo/?pt=<?php echo $post->post_name;?>" style="text-decoration:none;">

	 <div class="woocommerce-message woocommerce-message-al">

Tag Your Hair Story.

</div>
</a>
</div>
	 <?php
	 if(isFirstStory($post->ID)) {?>

	 
	<div class="desktop-display"> 
<div class="woocommerce-message woocommerce-message-al">

Be the first to leave a hair story banner.

<div style="position:absolute; right:20px; top:10px;">
	<?php   if($current_user->ID<1) {?>
	<a style="font-weight:normal;" class="button btn primary add-hstory-button" title="Tag Hair Story"  onclick="getCommonLoginPopup('http://hairlibrary.com/upload-photo/?pt=<?php echo $post->post_name;?>');" href="javascript:void();">Tag Hair Story</a>
	<?php } else {?>
	<a style="font-weight:normal;" class="button btn primary add-hstory-button" title="Tag Hair Story" href="<?php bloginfo('url');?>/upload-photo/?pt=<?php echo $post->post_name;?>">Tag Hair Story</a>
	<?php }?>
	<a class="question-mark-product" title="Take a look how to tag hair story" href="javascript:void()"><img src="<?php bloginfo('template_url');?>/assets/img/icons/Question mark-01.png"></a>
</div>
</div>




</div>	 
	 <?php
	 }else{ ?>
	 
	 <div class="desktop-display" style="position:absolute; right:0px; top:15px;">
	<?php   if($current_user->ID<1) {?>
	<a style="font-weight:normal;" class="button btn primary add-hstory-button" title="Tag Hair Story"  onclick="getCommonLoginPopup('http://hairlibrary.com/upload-photo/?pt=<?php echo $post->post_name;?>');" href="javascript:void();">Tag Hair Story</a>
	<?php } else {?>
	<a style="font-weight:normal;" class="button btn primary add-hstory-button" title="Tag Hair Story" href="<?php bloginfo('url');?>/upload-photo/?pt=<?php echo $post->post_name;?>">Tag Hair Story</a>
	<?php }?>
	<a class="question-mark" title="How To Tag A Hair Story" href="javascript:void()"><img width="18px" src="<?php bloginfo('template_url');?>/assets/img/icons/Question mark-01.png"></a>
</div>
	<?php }
	 do_action('woocommerce_breadcrumb');
?>

<?php
$id=get_the_id();


 $is_liked=isLiked($current_user->ID,$id,'product');
  if($current_user->ID<1)
  $msg="Please login to like this Photo";
 if($is_liked) 
  $msg="You already Liked this photo";
 $likes=getTotalLike($id,'product');

?>

<script>
	

$('.question-mark-product').on('click', function() {
$('#single-product-page-popup-outer').fadeIn(1000);	 

setTimeout(function(){ 

$('.single-product-page-popup-content').show();	 

}, 2000);
	
});


$('#close-single-product-page-popup').on('click', function() {
  
 $('#single-product-page-popup-outer').fadeOut(1000);
 
});
	
	
	
function saveLike() { 
   
    $.ajax({
            type:"post",
            url:"<?php bloginfo('url');?>/savelike.php",
        data:"uid=<?php echo $current_user->ID;?>&id=<?php echo $id;?>&type=product",
        success:function(data){
             $("#heart").hide(1000);
			  $("#heart-after").show(500);
			 $("#like-no").html('<?php echo $likes+1;?>');
        }
    });
   
	
}

function saveAddToLibrary()
{
 $('#load-add-library').show();
      $.ajax({
            type:"post",
            url:"<?php bloginfo('url');?>/addtolibrary.php",
        data:"uid=<?php echo $current_user->ID;?>&id=<?php echo $id;?>",
        success:function(data){
		  $('#load-add-library').hide();
            $('#content').prepend(data);
        }
    });
   

}

function saveLikeM() { 
  
    $.ajax({
            type:"post",
            url:"<?php bloginfo('url');?>/savelike.php",
        data:"uid=<?php echo $current_user->ID;?>&id=<?php echo $id;?>&type=product",
        success:function(data){
             $("#heartm").hide(1000);
			  $("#heart-afterm").show(500);
			 $("#like-nom").html('<?php echo $likes+1;?>');
        }
    });
   
	
}
</script>


<img id="load-add-library" style="display:none;position:fixed;top:45%;left:45%;z-index:999999" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/loading_pink.gif"/>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>  style="position:relative;">
	<div class="row-fluid">

<div class="span7 product-image">
	<?php
		/**
		 * woocommerce_show_product_images hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>
	<div class="product-comments desktop-display">
    <?php getComments($id); ?>
	</div>
	</div>
	<?php

 $brand= get_brand_info($post->post_author);


?>
	<div class="span5 product-content">

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			//do_action( 'woocommerce_single_product_summary' );
		?>
 
			<?php do_action( 'woocommerce_template_single_title' );?>
             <p class="product-brand-name"> By <a href="<?php bloginfo('url');?>/brand?n=<?php echo getBrandSlug($brand->user_id);?>"><?php echo getFormatedDes($brand->company_name);?></a></p>
			<div class="main-product-meta desktop-display clearfix">
            <?php if($brand->allow_dropshipping=="Yes" && isAllowDrop()){ ?>
				<?php do_action( 'woocommerce_template_single_price' );?>
                 
				<div class="stock-meta" >

					<?php
						// Availability

						global $product;
					
						$availability = $product->get_availability();

						if ($availability['availability']) :
							echo apply_filters( 'woocommerce_stock_html', '<p class="stock '.$availability['class'].'"><span>'.__('Availability:', GETTEXT_DOMAIN).'</span> '.$availability['availability'].'</p>', $availability['availability'] );
					    endif;
					?>

					<?php if ( $product->is_type( array( 'simple', 'variable' ) ) && get_option('woocommerce_enable_sku') == 'yes' && $product->get_sku() ) : ?>
						<p itemprop="productID" class="sku"><span><?php _e('SKU:', GETTEXT_DOMAIN); ?></span> <?php echo $product->get_sku(); ?>.</p>
					<?php endif; ?>

				</div>
            <?php } ?>
			</div>
			<hr />
			<div class="inline-buttons">
			<div class="inline heart-button mobile-display" style="padding-top:0px;padding-bottom:10px">
		
			<a style="<?php if($is_liked || $current_user->ID<1) echo 'display:none';?>" class="like-button" id="heartm" title="Like" href="javascript:saveLikeM();"></a>
			<a style="<?php if(!$is_liked && $current_user->ID>0) echo 'display:none';?>" class="like-button after-like" id="heart-afterm" href="javascript:void();" title="<?php echo $msg;?>"></a>
			<span id="like-nom"><? echo $likes;?></span>
			<div class="clear"></div>
			</div>
			<div class="heart-button desktop-display" style="padding-top:25px; float:left;">
		
				<?php if($current_user->ID>0){?>
			<a style="<?php if($is_liked) echo 'display:none';?>" class="like-button" id="heart" title="Like" href="javascript:saveLike();"></a>
			<a style="<?php if(!$is_liked) echo 'display:none';?>" class="like-button after-like" id="heart-after" href="javascript:void();" title="You already Liked this photo"></a>
			<?php } else { ?>	
			<a class="like-button " id="getHeartLoginPopup" title="Like" href="javascript:void();"></a>
			<?php } ?>
			<span id="like-no"><? echo $likes;?></span>
			<div class="clear"></div>
			</div>
			<div class="inline plus_icon" style="padding-top:24px; float:left;">
			<img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/plus.png" />
			</div>
			<div class="inline add-story-button button"  style="position:static; padding-top:24px;padding-left:0; float:left;">
				<?php   if($current_user->ID<1) {?>
				<a title="Tag Hair Story" id="getLoginPopup2" href="javascript:void();"><img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/hair-story.png" /></a>
				<?php } else {?>
				<a title="Tag Hair Story" href="<?php bloginfo('url');?>/upload-photo/?pt=<?php echo $post->post_name;?>"><img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/hair-story.png" /></a>
				<?php }?>
			</div>
			<div class="inline plus_icon" style="padding-top:24px; float:left;">
			<img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/plus.png" />
			</div>
			<div class="inline add-to-library "  style="float:left; width:29px; margin:19px 0 0 0px;">
			<?php   if($current_user->ID<1) {?>
				<a title="Add To Hair Library" href="javascript:void();" onclick="getCommonLoginPopup();"><img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/makup-box-icon.png" /></a>
				<?php } else { ?>
				<a title="Add To Hair Library" href="javascript:void();" onclick="saveAddToLibrary();"><img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/makup-box-icon.png" /></a>
				<?php } ?>
			</div>
			</div>
			<div style="height:15px;" class="clear"></div>
			<div class="row-fluid mobile-display">
			<div style="width:25%; margin-right:2%;margin-left:3%;float:left;">
			<div class="main-product-meta clearfix">
            <?php if(($brand->allow_dropshipping=="Yes" || $brand->id==6610) && isAllowDrop()){ ?>
				<?php do_action( 'woocommerce_template_single_price' );?>
                 
				<div class="stock-meta" >

					<?php
						// Availability

						global $product;
					
						$availability = $product->get_availability();

						if ($availability['availability']) :
							echo apply_filters( 'woocommerce_stock_html', '<p class="stock '.$availability['class'].'"><span>'.__('Availability:', GETTEXT_DOMAIN).'</span> '.$availability['availability'].'</p>', $availability['availability'] );
					    endif;
					?>

					<?php if ( $product->is_type( array( 'simple', 'variable' ) ) && get_option('woocommerce_enable_sku') == 'yes' && $product->get_sku() ) : ?>
						<p itemprop="productID" class="sku"><span><?php _e('SKU:', GETTEXT_DOMAIN); ?></span> <?php echo $product->get_sku(); ?>.</p>
					<?php endif; ?>

				</div>
            <?php } ?>
			</div>
			</div>
			<div style="width:65%;float:left;">
			
			<?php 
				 
				 if(($brand->allow_dropshipping=="Yes" || $brand->id==6610) && isAllowDrop()){
				 do_action( 'woocommerce_template_single_add_to_cart' );
				 } else {
				 ?>
				 <div class="buy-now">
				<a target="_blank" href="<?php echo get_post_meta($post->ID,'affiliate_link',true);?>" class="buy-button">Check It Out</a>
					
					</div>
			
					<?php }?>
				</div>
				</div>
			<div class="desktop-display">
			<?php 
				 
				 if(($brand->allow_dropshipping=="Yes" || $brand->id==6610) && isAllowDrop()){
				 do_action( 'woocommerce_template_single_add_to_cart' );
				 } else {
				 ?>
				 <div class="buy-now">
			<a target="_blank" href="<?php echo get_post_meta($post->ID,'affiliate_link',true);?>" class="buy-button">Check It Out</a>
				
			</div><?php }?>
			</div>
			
			<div class="product-comments mobile-display">
              <?php getComments($id); ?>
	       </div>
			<?php //do_action( 'woocommerce_template_single_excerpt' );?>
			<?php //do_action( 'woocommerce_template_single_add_to_cart' );?>
			<?php //do_action( 'woocommerce_template_single_meta' );?>
             <?php  woocommerce_output_product_data_tabs(); ?>
			    <div id="single-social-bar">
			     <p class="share-text">Share</p>
				<ul id="social-media-links">
				<li class="facebook">
				<a onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>">

				</a>
		     </li>
				<li class="twitter">
				<a target="_blank" href="http://twitter.com/share?url=<?php the_permalink();?>">
				</a>
				</li>
				<li class="pinterest">
				<a target="_blank" href="http://www.pinterest.com/hairlibrary/">
				</a>
				</li>
		
				<li class="googleplus">
				<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>">
				</a>
				</li>
			
				</ul>
				</div>
				<?php  if($brand->allow_dropshipping=="Yes" && isAllowDrop()){ ?>				 
				 <div class="fab_bar">
			<span class="fabSeal_icon"><img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/hltm_logo.png" /></span>We guarantee this product is authentic and produced by the manufacturer.
				</div>
				<p style="font-weight:bold">
			Estimated delivery 3-5 business days.
				</p>
				
				 <?php }?>


	</div></div><!-- .summary -->
<style>
.fab_bar {
      background-color: #f5f5f5;   
    border-radius: 3px;
    box-shadow: 2px 2px 3px #999;
    color: #666;
    font-size: 13px;   
    line-height: 20px;
    margin: 60px 0 18px;
    padding: 13px 23px 14px 72px;
    position: relative;
}
.fabSeal_icon {
    display: block;
    height: 50px;
    left: 9px;
    position: absolute;
    top: 9px;
    width: 50px;
}
.add-to-library {

padding-top:0 !important;
}

.add-to-library a{
background:none;
padding:0;
}
.plus_icon{
width:14px;
}
.add-story-button{

position:static;
width:45px;
background:none !important;
}
.add-story-button a{
padding-left:0 !important;
}
.add-story-button a img{
width: 90%;
}
.single_add_to_cart_button{
background: #d9197e !important;
    border: medium none;
    border-radius: 3px;
    box-shadow: 0 2px 5px #cccccc;
    color: #ffffff;
    float: right;
    font-size: 13px;
    font-weight: bold;
    padding: 7px !important;
}

</style>
	<script>
	
	$('#getLoginPopup2').on('click', function() {
  
 $('#login-popup-outer').fadeIn(1000);
 $('#redir').val('http://hairlibrary.com/upload-photo/?pt=<?php echo $post->post_name;?>');
 
});


$('#getLoginPopup3').on('click', function() {
  
 $('#login-popup-outer').fadeIn(1000);
 $('#redir').val('http://hairlibrary.com/upload-photo/?pt=<?php echo $post->post_name;?>');
 
});
	</script>
	
<div class="product-infos">
	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		//do_action( 'woocommerce_after_single_product_summary' );
	?>
	</div>

</div><!-- #product-<?php the_ID(); ?> -->
<?php 
/*
content-product.php
*/

do_action( 'woocommerce_after_single_product' ); ?>

<?php 
$collection=getCollectionPage(get_the_id());
if($collection){
$coll = get_post($collection);
?>
<div class="collection-tag related1">
<h4 class="title" style="width:140px">Featured In</h4>
	<div class="row-fluid" style="padding-bottom:20px;">
	  <div class="span6">
	   <a href="<?php echo get_permalink($collection);?>"><?php  echo get_the_post_thumbnail( $collection, array(600,600))?></a>
	  </div>
	   <div class="span6">
	   <h3 style="margin-top:0"><?php echo $coll->post_title;?></h3>
	   <p>
	   <?php 
	   
	   echo implode(' ', array_slice(explode(' ', $coll->post_content), 0, 60));


	   ?><a style="padding-left:20px" href="<?php echo get_permalink($collection);?>">Read More</a></p>
	   
	   </div>
	</div>

</div>
<?php } ?>
<div class="single-product-related margin-left-none">
<?php woocommerce_output_related_products();?>
</div>

<?php
 $photos=getProductPhotos(get_the_id(),4);
 if(count($photos)>0){ ?>
<div class="single-product-stories photo-stories">
<h4 class="title hs-icon">Hair Story Review</h4>
   <div class="row-fluid">
		
		<?php  foreach($photos as $photo){?>
			<div class="span3">
				<?php echo getPhotoHtml($photo);?>	
	       </div>
				
						 
				 
				
				<?php } ?>
					
                </div>
</div>
<?php } ?>
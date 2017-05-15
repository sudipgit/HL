
<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce;?>



<?php if ($product->is_on_sale()) : ?>

	<?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale">'.__('Sale!', GETTEXT_DOMAIN).'</span>', $post, $product); ?>

<?php endif; ?>
					
		<?php if ( has_post_thumbnail() ) : ?>
		
		<div class="visible-desktop etalage-full"><ul id="etalage2">
			<li>
				<!-- Put the lightbox destination for this frame in the anchor tag -->
				<a href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); echo $image[0];?>">
					<img class="etalage_thumb_image" alt="" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'product' ); echo $image[0];?>" />
					<img class="etalage_source_image" alt=""  src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'zoom' ); echo $image[0];?>" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>" />
				</a>
			</li>
			<?php $attachments = $product->get_gallery_attachment_ids();
			if ($attachments) {
		
				foreach($attachments as $attachment) {
					
					$imageTitle = $attachment->post_title;
					$image = wp_get_attachment_image_src($attachment, 'product', false);
		            $imageLarge = wp_get_attachment_image_src($attachment, 'large', false);
		            $imagezoom = wp_get_attachment_image_src($attachment, 'zoom', false);
				?>
					
					
					<li>
						<!-- Put the lightbox destination for this frame in the anchor tag -->
						<a href="<?php echo $imageLarge[0];?>">
							<img class="etalage_thumb_image" alt="" src="<?php echo $image[0];?>" />
							<img class="etalage_source_image" alt=""  src="<?php echo $imagezoom[0];?>" title="<?php echo $imageTitle; ?>" />
						</a>
					</li>
					
					
				<?php }
		
			} ?>
			<?php foreach ( $product->get_children() as $child_id ) {
			
				$variation = $product->get_child( $child_id  );
				
				if ( $variation instanceof WC_Product_Variation ) {
				
					if ( has_post_thumbnail( $variation->get_variation_id() ) ) {
					
					$attachment_id = get_post_thumbnail_id( $variation->get_variation_id() );
					
					$imageTitle = get_the_title($attachment_id);
					$image[0] = current(wp_get_attachment_image_src($attachment_id, 'product', false));
					$imageLarge[0] = current(wp_get_attachment_image_src($attachment_id, 'large', false));
					$imagezoom[0] = current(wp_get_attachment_image_src($attachment_id, 'zoom', false));?>
					
					<li>
						<a href="<?php echo $imageLarge[0];?>">
							<img class="etalage_thumb_image" alt="" src="<?php echo $image[0];?>" />
							<img class="etalage_source_image" alt=""  src="<?php echo $imagezoom[0];?>" title="<?php echo $imageTitle; ?>" />
						</a>
					</li>
					
					<?php }
				
				}
			
			}?>
		</ul></div>
				
		<div class="visible-desktop etalage-portrait"><ul id="etalage">
			<li>
				<!-- Put the lightbox destination for this frame in the anchor tag -->
				<a href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); echo $image[0];?>">
					<img class="etalage_thumb_image" alt="" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'product' ); echo $image[0];?>" />
					<img class="etalage_source_image" alt=""  src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'zoom' ); echo $image[0];?>" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>" />
				</a>
			</li>
			<?php $attachments = $product->get_gallery_attachment_ids();
			if ($attachments) {
		
				foreach($attachments as $attachment) {
					
					$imageTitle = $attachment->post_title;
					$image = wp_get_attachment_image_src($attachment, 'product', false);
		            $imageLarge = wp_get_attachment_image_src($attachment, 'large', false);
		            $imagezoom = wp_get_attachment_image_src($attachment, 'zoom', false);
				?>
					
					
					<li>
						
						<a href="<?php echo $imageLarge[0];?>">
							<img class="etalage_thumb_image" alt="" src="<?php echo $image[0];?>" />
							<img class="etalage_source_image" alt=""  src="<?php echo $imagezoom[0];?>" title="<?php echo $imageTitle; ?>" />
						</a>
					</li>
					
					
				<?php }
		
			} ?>
			<?php foreach ( $product->get_children() as $child_id ) {
			
				$variation = $product->get_child( $child_id  );
				
				if ( $variation instanceof WC_Product_Variation ) {
				
					if ( has_post_thumbnail( $variation->get_variation_id() ) ) {
					
					$attachment_id = get_post_thumbnail_id( $variation->get_variation_id() );
					
					$imageTitle = get_the_title($attachment_id);
					$image[0] = current(wp_get_attachment_image_src($attachment_id, 'product', false));
					$imageLarge[0] = current(wp_get_attachment_image_src($attachment_id, 'large', false));
					$imagezoom[0] = current(wp_get_attachment_image_src($attachment_id, 'zoom', false));?>
					
					<li>
						<a href="<?php echo $imageLarge[0];?>">
							<img class="etalage_thumb_image" alt="" src="<?php echo $image[0];?>" />
							<img class="etalage_source_image" alt=""  src="<?php echo $imagezoom[0];?>" title="<?php echo $imageTitle; ?>" />
						</a>
					</li>
					
					<?php }
				
				}
			
			}?>
		</ul></div>
		
		<div class="visible-tablet"><ul id="etalage1">
			<li>
				<!-- Put the lightbox destination for this frame in the anchor tag -->
				<a href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); echo $image[0];?>">
					<img class="etalage_thumb_image" alt="" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'product' ); echo $image[0];?>" />
					<img class="etalage_source_image" alt=""  src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'zoom' ); echo $image[0];?>" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>" />
				</a>
			</li>
			<?php $attachments = $product->get_gallery_attachment_ids();
			if ($attachments) {
		
				foreach($attachments as $attachment) {
					
					$imageTitle = $attachment->post_title;
					$image = wp_get_attachment_image_src($attachment, 'product', false);
		            $imageLarge = wp_get_attachment_image_src($attachment, 'large', false);
		            $imagezoom = wp_get_attachment_image_src($attachment, 'zoom', false);
				?>
					
					
					<li>
						<!-- Put the lightbox destination for this frame in the anchor tag -->
						<a href="<?php echo $imageLarge[0];?>">
							<img class="etalage_thumb_image" alt="" src="<?php echo $image[0];?>" />
							<img class="etalage_source_image" alt=""  src="<?php echo $imagezoom[0];?>" title="<?php echo $imageTitle; ?>" />
						</a>
					</li>
					
					
				<?php }
		
			} ?>
			<?php foreach ( $product->get_children() as $child_id ) {
			
				$variation = $product->get_child( $child_id  );
				
				if ( $variation instanceof WC_Product_Variation ) {
				
					if ( has_post_thumbnail( $variation->get_variation_id() ) ) {
					
					$attachment_id = get_post_thumbnail_id( $variation->get_variation_id() );
					
					$imageTitle = get_the_title($attachment_id);
					$image[0] = current(wp_get_attachment_image_src($attachment_id, 'product', false));
					$imageLarge[0] = current(wp_get_attachment_image_src($attachment_id, 'large', false));
					$imagezoom[0] = current(wp_get_attachment_image_src($attachment_id, 'zoom', false));?>
					
					<li>
						<a href="<?php echo $imageLarge[0];?>">
							<img class="etalage_thumb_image" alt="" src="<?php echo $image[0];?>" />
							<img class="etalage_source_image" alt=""  src="<?php echo $imagezoom[0];?>" title="<?php echo $imageTitle; ?>" />
						</a>
					</li>
					
					<?php }
				
				}
			
			}?>
		</ul></div>
		<div id="hidden1"><div id="zoom"></div></div>
		
		<div class="visible-phone"><a itemprop="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'large' ); ?>" class="zoom phone-thumbnail" rel="prettyPhoto[product-gallery]" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'portfolio-post' ) ?></a></div>

	<?php else : ?>

		<img src="<?php echo woocommerce_placeholder_img_src(); ?>" alt="Placeholder" />

	<?php endif; ?>

	<div class="clear"></div>
	
	<div class="visible-phone"><?php do_action('woocommerce_product_thumbnails'); ?></div>
	
<style>
li.etalage_magnifier,
li.etalage_icon,
li.etalage_zoom_area
{
display:none !important;
}
</style>

<?php $plugins = get_option('active_plugins');?>
<?php $required_plugin = 'woocommerce/woocommerce.php';?>

<?php if ( in_array( $required_plugin , $plugins ) ) {?>
	<?php if (is_page_template('template-contact.php')) { ?>
	    <?php if ( is_active_sidebar(3) ){?>
	    <div class="span4 sidebar">
	        <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Contact Page Sidebar') ) ?>
	    </div>
	    <?php } ?>
	<?php }elseif(is_singular( 'portfolio' )){ ?>
	<?php $details = get_post_meta($post->ID, 'details_value', true); if($details){$details = array_filter($details);};?>
	<?php $terms = get_the_terms( get_the_ID(), 'portfolio_tags' ); ?>
	<?php $share = get_post_meta($post->ID, 'share_value', true);?>
	<?php $gallery_type = get_post_meta($post->ID, 'gallery_type_value', true);?>
	    <?php if ( is_active_sidebar(4) || !empty($details) || $terms || !$share ){?>
	    <div class="span4 sidebar">

	        <?php if ($gallery_type == 'sidebar') {?>
	        <?php $args = array(
	        'numberposts' => 9999, // change this to a specific number of images to grab
	        'offset' => 0,
	        'post_parent' => $post->ID,
	        'post_type' => 'attachment',
	        'nopaging' => false,
	        'post_mime_type' => 'image',
	        'order' => 'ASC', // change this to reverse the order
	        'orderby' => 'menu_order ID', // select which type of sorting
	        'post_status' => 'any'
	        );
	        $attachments =& get_children($args);?>

			<?php if ($attachments) {?>
			<div class="widget gallery-widget portfolio-2">
				<div id="contaciner">
	                <?php #$counter = 1 ?>
	                <?php foreach($attachments as $attachment) {
	                $imageTitle = $attachment->post_title;
	                $imageDescription = $attachment->post_content;
	                $imageArray = wp_get_attachment_image_src($attachment->ID, 'portfolio-post', false);
	                $imageArrayFull = wp_get_attachment_image_src($attachment->ID, 'large', false);?>
					<a rel="prettyPhoto[pp_gal-1]" title="<?php echo $imageTitle ?>" href="<?php echo $imageArrayFull[0] ?>" class="shadow-s3 element span6 effect-thumb">
						<img alt="<?php echo $imageTitle ?>" src="<?php echo $imageArray[0] ?>"/>
						<div class="icon zoom-in"></div>
					</a>
	                <?php #$counter++ ;?>
	                <?php }?>
				</div>
				<div class="clearfix"></div>
			</div>
	        <?php } unset($args);?>
	        <?php }?>

	        <?php if ( !empty($details) || $terms || !$share ){?>
	        <div class="widget portfolio-info-widget">
	            <ul class="unstyled">
	                <?php if($details){ ?>
	                <?php $separator = "%%";
	                $output = '';
	                foreach ($details as $item) {
	                    if($item){
	                        list($item_text1, $item_text2) = explode($separator, trim($item));
	                        $output .= '<li><strong>' . $item_text1 . ':</strong> ' . do_shortcode($item_text2) . '</li>';
	                    }
	                }
	                echo $output;?>
	                <?php } ?>
	                <?php if($terms){?>
	                <li class="tags">
	                    <?php if($terms) : foreach ($terms as $term) { ?>
	                        <?php echo '<a title="'.$term->name.'" href="'.get_term_link($term->slug, 'portfolio_tags').'">+&nbsp;'.$term->name.'</a>'?>
	                    <?php } endif;?>
	                    <div class="clearfix"></div>
	                </li>
	                <?php }?>
	                <?php if(!$share){?>
	                <li class="share"><strong><?php _e( 'Share', GETTEXT_DOMAIN);?>:</strong>
	                    <ul>
	                        <li><iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;send=false&amp;layout=button_count&amp;width=0&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe></li>
	                        <li>
	                            <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
	                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	                        </li>
	                        <li>
	                            <!-- Place this tag where you want the +1 button to render -->
	                            <div class="g-plusone" data-size="medium" data-annotation="none" data-href="<?php the_permalink(); ?>"></div>
	                            <!-- Place this render call where appropriate -->
	                            <script type="text/javascript">
	                              (function() {
	                                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	                                po.src = 'https://apis.google.com/js/plusone.js';
	                                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	                              })();
	                            </script>
	                        </li>
	                        <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {?>
	                        <li>
	                            <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-post' ); echo $image[0];?>&description=<?php the_title();?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
	                        </li>
	                        <?php }?>
	                    </ul>
	                </li>
	                <?php }?>
	            </ul>
	        </div>
	        <?php }?>
	        <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Portfolio Post Sidebar') ) ?>
	    </div>
	    <?php } ?>
	<?php }elseif(is_shop()||is_product_category()||is_product_tag()){ ?>

		    <?php if ( is_active_sidebar(5) ){?>
		    <div class="span3 sidebar">
		    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Shop Sidebar') ) ?>
		    </div>
		    <?php } ?>

	<?php } elseif (is_singular( 'product' )){?>

		    <?php if ( is_active_sidebar(6) ){?>
		    <div class="span2 sidebar">
		    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Product Post Sidebar') ) ?>
		    </div>

	    <?php } ?>
	<?php }else{ ?>
	    <?php if ( is_active_sidebar(1) ){?>
	    <div class="span4 sidebar">
	    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Main Sidebar') ) ?>
	    </div>
	    <?php } ?>
	<?php } ?>
<?php }else{ ?>
	<?php if (is_page_template('template-contact.php')) { ?>
	    <?php if ( is_active_sidebar(3) ){?>
	    <div class="span4 sidebar">
	        <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Contact Page Sidebar') ) ?>
	    </div>
	    <?php } ?>
	<?php }elseif(is_singular( 'portfolio' )){ ?>
		<?php $details = get_post_meta($post->ID, 'details_value', true); if($details){$details = array_filter($details);};?>
		<?php $terms = get_the_terms( get_the_ID(), 'portfolio_tags' ); ?>
		<?php $share = get_post_meta($post->ID, 'share_value', true);?>
		<?php $gallery_type = get_post_meta($post->ID, 'gallery_type_value', true);?>
	    <?php if ( is_active_sidebar(4) || !empty($details) || $terms || !$share ){?>
	    <div class="span4 sidebar">

	        <?php if ($gallery_type == 'sidebar') {?>
	        <?php $args = array(
	        'numberposts' => 9999, // change this to a specific number of images to grab
	        'offset' => 0,
	        'post_parent' => $post->ID,
	        'post_type' => 'attachment',
	        'nopaging' => false,
	        'post_mime_type' => 'image',
	        'order' => 'ASC', // change this to reverse the order
	        'orderby' => 'menu_order ID', // select which type of sorting
	        'post_status' => 'any'
	        );
	        $attachments =& get_children($args);?>

			<?php if ($attachments) {?>
			<div class="widget gallery-widget portfolio-2">
				<div id="contaciner">
	                <?php #$counter = 1 ?>
	                <?php foreach($attachments as $attachment) {
	                $imageTitle = $attachment->post_title;
	                $imageDescription = $attachment->post_content;
	                $imageArray = wp_get_attachment_image_src($attachment->ID, 'portfolio-post', false);
	                $imageArrayFull = wp_get_attachment_image_src($attachment->ID, 'large', false);?>
					<a rel="prettyPhoto[pp_gal-1]" title="<?php echo $imageTitle ?>" href="<?php echo $imageArrayFull[0] ?>" class="shadow-s3 element span6 effect-thumb">
						<img alt="<?php echo $imageTitle ?>" src="<?php echo $imageArray[0] ?>"/>
						<div class="icon zoom-in"></div>
					</a>
	                <?php #$counter++ ;?>
	                <?php }?>
				</div>
				<div class="clearfix"></div>
			</div>
	        <?php } unset($args);?>
	        <?php }?>

	        <?php if ( !empty($details) || $terms || !$share ){?>
	        <div class="widget portfolio-info-widget">
	            <ul class="unstyled">
	                <?php if($details){ ?>
	                <?php $separator = "%%";
	                $output = '';
	                foreach ($details as $item) {
	                    if($item){
	                        list($item_text1, $item_text2) = explode($separator, trim($item));
	                        $output .= '<li><strong>' . $item_text1 . ':</strong> ' . do_shortcode($item_text2) . '</li>';
	                    }
	                }
	                echo $output;?>
	                <?php } ?>
	                <?php if($terms){?>
	                <li class="tags">
	                    <?php if($terms) : foreach ($terms as $term) { ?>
	                        <?php echo '<a title="'.$term->name.'" href="'.get_term_link($term->slug, 'portfolio_tags').'">+&nbsp;'.$term->name.'</a>'?>
	                    <?php } endif;?>
	                    <div class="clearfix"></div>
	                </li>
	                <?php }?>
	                <?php if(!$share){?>
	                <li class="share"><strong><?php _e( 'Share', GETTEXT_DOMAIN);?>:</strong>
	                    <ul>
	                        <li><iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;send=false&amp;layout=button_count&amp;width=0&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe></li>
	                        <li>
	                            <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
	                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	                        </li>
	                        <li>
	                            <!-- Place this tag where you want the +1 button to render -->
	                            <div class="g-plusone" data-size="medium" data-annotation="none" data-href="<?php the_permalink(); ?>"></div>
	                            <!-- Place this render call where appropriate -->
	                            <script type="text/javascript">
	                              (function() {
	                                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	                                po.src = 'https://apis.google.com/js/plusone.js';
	                                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	                              })();
	                            </script>
	                        </li>
	                        <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {?>
	                        <li>
	                            <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-post' ); echo $image[0];?>&description=<?php the_title();?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
	                        </li>
	                        <?php }?>
	                    </ul>
	                </li>
	                <?php }?>
	            </ul>
	        </div>
	        <?php }?>
	        <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Portfolio Post Sidebar') ) ?>
	    </div>
	    <?php } ?>
	<?php }else{ ?>
	    <?php if ( is_active_sidebar(1) ){?>
	    <div class="span4 sidebar">
	    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Main Sidebar') ) ?>
	    </div>
	    <?php } ?>
	<?php } ?>
<?php } ?>
		<?php $post_style = get_post_meta($post->ID, 'post_style_value', true);?>
		<?php $left_sidebar = get_post_meta($post->ID, 'left_sidebar_value', true);?>
		<?php $videoURL = theme_parse_video(get_post_meta($post->ID, 'video-url_value', true));?>
		<?php $linkURL = get_post_meta($post->ID, 'link-url_value', true);?>
		<?php $full_width = get_post_meta($post->ID, 'full-width_value', true);?>
		<?php $share = get_post_meta($post->ID, 'share_value', true);?>

						<div id="post-<?php the_ID(); ?>" class="post <?php if ($full_width){?>post_full-width<?php }?> <?php $allClasses = get_post_class(); foreach ($allClasses as $class) { echo $class . " "; } ?>">
		                    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {?>
		                    <div  class="shadow-s3">
		                        <?php if ($full_width){?>
		                        <img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-style-2' ); echo $image[0];?>"/>
		                        <?php }else{?>
		                        <img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-style-1' ); echo $image[0];?>"/>
		                        <?php }?> 
		                    </div>
		                    <?php } elseif ( $videoURL ) {?>
		                    	<iframe class="scale-with-grid shadow-s3" width="620" height="349" src="<?php echo $videoURL ?>?wmode=transparent;showinfo=0" frameborder="0" allowfullscreen></iframe>
		                    <?php }?>
							<div class="content">
								<div class="post_type">
									<div class="icon 
									<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {?>
									picture
									<?php } elseif ( $videoURL ) {?>
									video-camera
									<?php } elseif ( $linkURL ) {?>
									link
									<?php } else{?>
									page
									<?php }?>
									"></div>
								</div>
								<div class="column">
									<h4 class="title"><?php the_title(); ?></h4>
									<div class="post_meta">
										<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>" class="date"><?php the_time('M j, Y'); ?></a>
										<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" class="author"><?php echo get_the_author(); ?></a>
										<a href="<?php comments_link(); ?>" class="comment"><?php comments_number(__('No Comments', GETTEXT_DOMAIN), __('1 Comment', GETTEXT_DOMAIN), __('% Comments', GETTEXT_DOMAIN)); ?></a>
									</div>
									<div class="post_content">
										<?php the_content(); ?>
										<?php wp_link_pages(); ?>
										<div class="clearfix"></div>
										<?php edit_post_link( __('edit', GETTEXT_DOMAIN), '<span class="edit-post">[', ']</span>' ); ?>
									</div>
								</div>
								<?php if (!$share){?>
								<ul class="social">
									<li>
										<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
									</li>
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
                                    <li>
                                        <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); echo $image[0];?>&description=<?php the_title();?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
                                    </li>
								</ul>
								<?php }?>
							</div>
						</div>
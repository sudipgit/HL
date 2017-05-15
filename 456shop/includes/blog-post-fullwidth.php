		<?php $post_style = get_post_meta($post->ID, 'post_style_value', true);?>
		<?php $videoURL = theme_parse_video(get_post_meta($post->ID, 'video-url_value', true));?>
		<?php $linkURL = get_post_meta($post->ID, 'link-url_value', true);?>
		<?php $share = get_post_meta($post->ID, 'share_value', true);?>

						
                    	<?php if ($post_style == "style_2"){?>
						<?php get_template_part('includes/blog-post2' ) ?>
						<?php }else{?>
						<div class="post <?php $allClasses = get_post_class(); foreach ($allClasses as $class) { echo $class . " "; } ?>">
							<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {?>
								<div class="shadow-s3 effect-thumb <?php if (!$share){?>effect-thumb-2<?php }?>">
									<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-style-2' ); echo $image[0];?>"/>
									<a href="<?php if ($linkURL){?><?php echo $linkURL; ?><?php }else{?><?php the_permalink(); ?><?php }?>" title="<?php the_title(); ?>" class="icon <?php if ($linkURL){?>link<?php }else{?>eye<?php }?>"></a>
									<?php if (!$share){?>
						                <?php
						                    $title=get_the_title();
						                    if ($linkURL){
						                    	$url=$linkURL;
						                    }else{
						                    	$url=get_permalink();
						                    }
						                    $summary= excerpt_portfolio(25);
						                    $fb_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'shop' );
						                ?>
						                <a class="icon icon2 share" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $fb_image[0];?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"></a>
									<?php }?>
								</div>
		                    <?php } elseif ( $videoURL ) {?>
		                    	<iframe class="scale-with-grid shadow-s3" width="620" height="349" src="<?php echo $videoURL ?>?wmode=transparent;showinfo=0" frameborder="0" allowfullscreen></iframe>
		                    <?php }?>
							<div class="content <?php if (!has_post_thumbnail()&&$videoURL==""){echo "no-thumb";}?>">
								<div class="post_type">
									<div class="icon 
									<?php if ($linkURL) {?>
									link
									<?php } elseif ($videoURL) {?>
									video-camera
									<?php } elseif ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {?>
									picture
									<?php } else{?>
									page
									<?php }?>
									"></div>
								</div>
								<div class="column">
									<h4 class="title"><a href="<?php if ($linkURL){?><?php echo $linkURL; ?><?php }else{?><?php the_permalink(); ?><?php }?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
									<div class="post_meta">
										<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>" class="date"><?php the_time('M j, Y'); ?></a>
										<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" class="author"><?php echo get_the_author(); ?></a>
										<a href="<?php comments_link(); ?>" class="comment"><?php comments_number(__('No Comments', GETTEXT_DOMAIN), __('1 Comment', GETTEXT_DOMAIN), __('% Comments', GETTEXT_DOMAIN)); ?></a>
									</div>
									<div class="post_content">
		                                <?php if ( $linkURL ) { ?>
		                                <?php global $more;?>
		                                <?php $more = 1;?>
		                                <?php the_content(); ?>
		                                <?php }else{?>
		                                <?php global $more;?>
		                                <?php $more = 0;?>
		                                <?php the_content(__('[read more]', GETTEXT_DOMAIN)); ?>
		                                <?php }?>
										<div class="clearfix"></div>
										<?php edit_post_link( __('edit', GETTEXT_DOMAIN), '<span class="edit-post">[', ']</span>' ); ?>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<?php }?>
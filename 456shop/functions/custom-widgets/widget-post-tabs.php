<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Post Tabs Widget
	Plugin URI: http://www.lpd-themes.com
	Description: A widget that allows the display of popular posts, recent posts and all tags.
	Version: 1.0
	Author: lidplussdesign
	Author URI: http://www.lpd-themes.com

-----------------------------------------------------------------------------------*/


// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'post_tabs_widget' );


// register widget.
function post_tabs_widget() {
	register_widget( 'Post_Tabs_Widget' );
}

// widget class.
class post_tabs_widget extends WP_Widget {


/* widget setup
================================================== */
	function Post_Tabs_Widget() {
	
		/* widget settings. */
		$widget_ops = array( 'classname' => 'post_tabs_widget', 'description' => __('A widget that displays your popular posts, recent posts and all tags.', GETTEXT_DOMAIN) );

		/* widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'post_tabs_widget' );

		/* create the widget. */
		$this->WP_Widget( 'post_tabs_widget', __('Post Tabs Widget', GETTEXT_DOMAIN), $widget_ops, $control_ops );
	}

/* display widget
================================================== */	
	function widget( $args, $instance ) {
		extract( $args );
		
        $rand = rand(2, 999);
		$title = apply_filters('widget_title', $instance['title'] );

		/* variables from the widget settings. */
		$num_popular = $instance['num_popular'];
        $num_recent = $instance['num_recent'];

		/* before widget. */
		echo $before_widget;

		/* display Widget */
		?> 
		
        <?php /* display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>
				
				<div class="widget list">
					<div class="tabbable tabs-top"> <!-- Only required for left/right tabs -->
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab"><?php _e('Popular', GETTEXT_DOMAIN) ?></a></li>
							<li><a href="#tab2" data-toggle="tab"><?php _e('Recent', GETTEXT_DOMAIN) ?></a></li>
							<li><a href="#tab3" data-toggle="tab"><?php _e('Tags', GETTEXT_DOMAIN) ?></a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
	                            <ul class="postWidget unstyled">
									<?php global $wpdb;
									$posts = $wpdb->get_results("SELECT comment_count, ID, post_title FROM $wpdb->posts WHERE post_type = 'post' ORDER BY comment_count DESC LIMIT 0 , $num_popular");
									foreach ($posts as $post_) {
	                                    $id = $post_->ID;
	                                    $title = $post_->post_title;
	                                    $count = $post_->comment_count;
	                                    $videoURL = theme_parse_video(get_post_meta($id, 'video-url_value', true));
	                                    $linkURL = get_post_meta($id, 'link-url_value', true);
	                                    if ($count != 0) {?>
		                                <li>
			                                <?php if((function_exists('has_post_thumbnail')) && (has_post_thumbnail($id))){?>
			                                <img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'widget-thumb' ); echo $image[0];?>" alt="<?php the_title()?>" height="45" width="45"/>
			                                <?php }elseif ( $linkURL ) { ?>
			                                <div class="post_type"><div class="icon link"></div></div>
			                                <?php }elseif($videoURL){?>
			                                <div class="post_type"><div class="icon video-camera "></div></div>
			                                <?php }else{ ?>
			                                <div class="post_type"><div class="icon page"></div></div>
			                                <?php }?>
			                                <div class="content"><a class="title" title="<?php echo $title?>" href="
	                                        <?php if ( $linkURL ) { ?>
	                                        <?php echo $linkURL; ?>
	                                        <?php }else{?>
	                                        <?php echo get_permalink($id); ?>
	                                        <?php }?>
			                                "><?php echo $title?></a><a class="date" href="<?php echo get_day_link(get_the_time('Y', $id), get_the_time('m', $id), get_the_time('d', $id)); ?>" title="<?php echo get_the_time('j M Y', $id); ?>"><?php echo get_the_time('j M Y', $id); ?></a></div>
			                                <div class="clearfix"></div>
		                                </li>
	                                	<?php }?>
	                                <?php }?>
	                            </ul>
							</div>
							<div class="tab-pane" id="tab2">
	                            <ul class="postWidget unstyled">
	                            <?php $query = new WP_Query();?>
	                            <?php $query->query('posts_per_page='.$num_recent.'&ignore_sticky_posts=1');?>
	                            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
	                            <?php $videoURL = theme_parse_video(get_post_meta(get_the_ID(), 'video-url_value', true));?>
	                            <?php $linkURL = get_post_meta(get_the_ID(), 'link-url_value', true);?>
		                                <li>
			                                <?php if((function_exists('has_post_thumbnail')) && (has_post_thumbnail())){?>
			                                <img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'widget-thumb' ); echo $image[0];?>" alt="<?php the_title()?>" height="45" width="45"/>
			                                <?php }elseif ( $linkURL ) { ?>
			                                <div class="post_type"><div class="icon link"></div></div>
			                                <?php }elseif($videoURL){?>
			                                <div class="post_type"><div class="icon video-camera "></div></div>
			                                <?php }else{ ?>
			                                <div class="post_type"><div class="icon page"></div></div>
			                                <?php }?>
			                                <div class="content"><a class="title" title="<?php the_title()?>" href="
	                                        <?php if ( $linkURL ) { ?>
	                                        <?php echo $linkURL; ?>
	                                        <?php }else{?>
	                                        <?php echo get_permalink($id); ?>
	                                        <?php }?>
			                                "><?php the_title()?></a><a class="date" href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>" title="<?php echo get_the_time('j M Y'); ?>"><?php echo get_the_time('j M Y'); ?></a></div>
			                                <div class="clearfix"></div>
		                                </li>
	                            <?php endwhile; endif; ?> 
	                            <?php wp_reset_query(); ?>
	                            </ul>
							</div>
							<div class="tab-pane" id="tab3">
	                    		<div class="tagcloud tags">
	                                <?php wp_tag_cloud('smallest=13&largest=13&unit=px&number=0'); ?>
	                            </div>
							</div>
						</div>
					</div>
				</div>	
		<?php

		/* after widget (defined by themes). */
		echo $after_widget;
	}


/* widget update
================================================== */
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		/* strip tags to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num_popular'] = strip_tags( $new_instance['num_popular'] );
        $instance['num_recent'] = strip_tags( $new_instance['num_recent'] );
        
		/* no need to strip tags for.. */

		return $instance;
	}
	

/* widget settings
================================================== */
	 
	function form( $instance ) {

		/* set up some default widget settings. */
		$defaults = array(
		'title' => '',
		'num_popular' => 3,
		'num_recent' => 3
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
        <!-- widget title: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
        </p>
        
		<!-- widget title: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'num_popular' ); ?>"><?php _e('Amount to show popular post:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'num_popular' ); ?>" name="<?php echo $this->get_field_name( 'num_popular' ); ?>" value="<?php echo $instance['num_popular']; ?>" />
		</p>
        
		<!-- widget num: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'num_recent' ); ?>"><?php _e('Amount to show recent post:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'num_recent' ); ?>" name="<?php echo $this->get_field_name( 'num_recent' ); ?>" value="<?php echo $instance['num_recent']; ?>" />
		</p>

	
	<?php
	}
}
?>
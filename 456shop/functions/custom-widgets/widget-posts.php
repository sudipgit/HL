<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Posts Widget
	Plugin URI: http://www.lpd-themes.com
	Description: A widget that allows the display of posts.
	Version: 1.0
	Author: lidplussdesign
	Author URI: http://www.lpd-themes.com

-----------------------------------------------------------------------------------*/


// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'posts_widget' );


// register widget.
function posts_widget() {
	register_widget( 'Posts_Widget' );
}

// widget class.
class posts_widget extends WP_Widget {


/* widget setup
================================================== */
	function Posts_Widget() {
	
		/* widget settings. */
		$widget_ops = array( 'classname' => 'posts_widget', 'description' => __('A widget that displays your posts.', GETTEXT_DOMAIN) );

		/* widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'posts_widget' );

		/* create the widget. */
		$this->WP_Widget( 'posts_widget', __('Posts Widget', GETTEXT_DOMAIN), $widget_ops, $control_ops );
	}

/* display widget
================================================== */	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );

		/* variables from the widget settings. */
		$num = $instance['num'];

		/* before widget. */
		echo $before_widget;

		/* display Widget */
		?> 
        <?php /* display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>
                    <div class="widget list">
	                    <ul class="postWidget unstyled">
	                    <?php $query = new WP_Query();?>
	                    <?php $query->query('posts_per_page='.$num.'&ignore_sticky_posts=1');?>
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
		<?php

		/* after widget (defined by themes). */
		echo $after_widget;
	}


/* widget update
================================================== */
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		/* strip tags to remove HTML (important for text inputs). */
		//$instance['title'] = strip_tags( $new_instance['title'] );
        $instance['title'] = $new_instance['title'];
		$instance['num'] = strip_tags( $new_instance['num'] );
        
		/* no need to strip tags for.. */

		return $instance;
	}
	

/* widget settings
================================================== */
	 
	function form( $instance ) {

		/* set up some default widget settings. */
		$defaults = array(
		'title' => '',
		'num' => 1,
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
        <!-- widget title: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
        </p>
        
		<!-- widget num: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e('Number of posts to show:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" value="<?php echo $instance['num']; ?>" />
		</p>

	
	<?php
	}
}
?>
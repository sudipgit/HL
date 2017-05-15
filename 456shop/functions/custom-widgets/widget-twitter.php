<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Twitter Widget
	Plugin URI: http://www.lpd-themes.com
	Description: A widget that allows the display twitter.
	Version: 1.0
	Author: lidplussdesign
	Author URI: http://www.lpd-themes.com

-----------------------------------------------------------------------------------*/


// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'twitter_widget' );


// register widget.
function twitter_widget() {
	register_widget( 'Twitter_Widget' );
}

// widget class.
class twitter_widget extends WP_Widget {


/* widget setup
================================================== */
	function Twitter_Widget() {
	
		/* widget settings. */
		$widget_ops = array( 'classname' => 'twitter_widget', 'description' => __('A widget that displays your twitter.', GETTEXT_DOMAIN) );

		/* widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'twitter_widget' );

		/* create the widget. */
		$this->WP_Widget( 'twitter_widget', __('Twitter Widget', GETTEXT_DOMAIN), $widget_ops, $control_ops );
	}

/* display widget
================================================== */	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );

		/* variables from the widget settings. */
		$num = $instance['num'];
        $username = $instance['username'];

		/* before widget. */
		echo $before_widget;

		/* display Widget */
		?> 
        <?php /* display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>
                
                    <?php if ($username){?>
                    <div class="twitter-widget">
                        <div class="tweet tweet-<?php echo $username ?>"></div>
                    </div>
                    <script>
                    jQuery(function($){
                        $(".tweet-<?php echo $username ?>").tweet({
                            username: "<?php echo $username ?>",
                            join_text: "auto",
                            <?php if( $instance['thumbnail'] ) { ?>avatar_size: 45,<?php } ?>
                            count: <?php echo $num ?>,
                            loading_text: "<?php _e('loading tweets...', GETTEXT_DOMAIN) ?>"
                        });
                    });
                    </script> 
                    <?php if( $instance['thumbnail'] ) { ?><style>.widget .tweet_list li{min-height: 55px;}*/</style><?php } ?>
                    <?php }else{?>
                    <p><?php _e('Enter to a username in a widget.', GETTEXT_DOMAIN) ?></p>    
                    <?php }?>

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
        
        $instance['username'] = strip_tags( $new_instance['username'] );
		$instance['num'] = strip_tags( $new_instance['num'] );
        $instance['thumbnail'] = isset($new_instance['thumbnail']);
        
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
        
		<!-- widget username: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Username:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
		</p>
        
		<!-- widget num: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e('Number of tweets to show:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" value="<?php echo $instance['num']; ?>" />
		</p>
        
        <p><input id="<?php echo $this->get_field_id('thumbnail'); ?>" name="<?php echo $this->get_field_name('thumbnail'); ?>" type="checkbox" <?php checked(isset($instance['thumbnail']) ? $instance['thumbnail'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('thumbnail'); ?>"><?php _e('Add a twitter avatar.', GETTEXT_DOMAIN); ?></label></p>

	
	<?php
	}
}
?>
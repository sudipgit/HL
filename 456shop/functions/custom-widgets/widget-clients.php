<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Client Widget
	Plugin URI: http://www.lpd-themes.com
	Description: A widget that allows to display modules.
	Version: 1.0
	Author: lidplussdesign
	Author URI: http://www.lpd-themes.com

-----------------------------------------------------------------------------------*/


// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'client_widget' );


// register widget.
function client_widget() {
	register_widget( 'Client_Widget' );
}

// widget class.
class client_widget extends WP_Widget {


/* widget setup
================================================== */
	function Client_Widget() {
	
		/* widget settings. */
		$widget_ops = array( 'classname' => 'client-widget clearfix', 'description' => __('A widget that allows to display modules (only for front page sidebar).', GETTEXT_DOMAIN) );

		/* widget control settings. */
		$control_ops = array('width' => 400, 'height' => 350, 'id_base' => 'client_widget' );

		/* create the widget. */
		$this->WP_Widget( 'client_widget', __('Clients Widget', GETTEXT_DOMAIN), $widget_ops, $control_ops );
	}

/* display widget
================================================== */	
	function widget( $args, $instance ) {
		extract($args);
        
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
            <?php $query = new WP_Query();?>
            <?php $client_posts = $query->query('post_type=client&posts_per_page=-1');?>
            <?php if($client_posts){?>
            <ul class="clearfix">
                <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();?>
                <li class="client">
                    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {?>
                    <a href="<?php echo get_the_excerpt()?>" title="<?php the_title(); ?>" class="grayscale">
                        <img alt="<?php the_title(); ?>" class="bw_thumbnail scale-with-grid" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'client-gray' ); echo $image[0];?>" />
                        <img alt="<?php the_title(); ?>" class="thumbnail scale-with-grid" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'client' ); echo $image[0];?>" />
                    </a>
                    <?php } else{?>
                    <p style="color: #ed1c24; padding: 5px;"><?php _e( 'Please add an image to "Featured Image" for client thumbnail.', GETTEXT_DOMAIN);?></p>
                    <?php }?>
                </li>
                <?php endwhile; endif; ?>
            </ul>
            <?php }else{?>
            <p style="color: #ed1c24;"><br /><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN); ?></p>
            <?php }?>
		<?php
		echo $after_widget;
	}


/* widget update
================================================== */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);       
		return $instance;
	}
	

/* widget settings
================================================== */ 
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		//$title = strip_tags($instance['title']);
        $title = $instance['title'];
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', GETTEXT_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

<?php
	}
}
?>
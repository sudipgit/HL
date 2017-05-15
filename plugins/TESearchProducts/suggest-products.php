<?php
/*
Plugin Name: Suggest Products
Plugin URI: http:techesthete.net/
Version: 1.0
Author: Rashid Ali
*/

/**
 * Adds Foo_Widget widget.
 */
function print_rr($arr){
	echo "<pre>";		
	print_r($arr);
	echo "</pre>";
}
class Suggest_Products_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'suggest_products', // Base ID
			'Suggest Products', // Name
			array( 'description' => __( 'Show Products that ', 'techesthete.net' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		global $wpdb;
		$user_id 	= 	get_current_user_id();
		$weighttoshow = 24; //every question got 3 marks so if 8 question matched then we will show the product
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		if ($user_id) {
			$query  = "SELECT * FROM wp_questions q, wp_user_answer a
						WHERE question_type='consumer'
						AND  q.id= a.question_id
						AND  q.match = '1'
						AND  a.user_id =".$user_id."
						order by q.id" ;
			//echo $query;
			$user_answers = $wpdb->get_results($query);
			
			$query = "SELECT distinct a.user_id AS product_id FROM wp_questions q, wp_user_answer a
						WHERE question_type='producer' AND  q.id= a.question_id";
			$products = $wpdb->get_results( $query );

			$i = 0;
			$productlist = array();
			foreach ($products as $product) {
				$query = "SELECT * FROM wp_questions q, wp_user_answer a
						WHERE question_type='producer'
						AND  q.id= a.question_id
						AND  a.user_id= '{$product->product_id}'
						AND  q.match = '1'
						order by a.user_id,q.id";
				//echo $query;
				$product_answers = $wpdb->get_results( $query );
				
				//let's check for matching
				$product_weight = 0;
				$post = get_post( $product->product_id );
				//echo $post->post_title.'<br/>';
				//echo $post->post_content.'<br/>';
				$match = false;
				//print_rr( $product_answers );
				//print_rr( $user_answers );
				//exit;				
				foreach ($user_answers as $user_answer) {
					foreach ($product_answers as $product_answer) {
				        $match = false;
					
						if ( strtolower( $user_answer->answer ) == strtolower( $product_answer->answer )  ) {
							 $product_weight += 3;
							 //echo '<hr/>';
							 //echo 'User Question: '.$user_answer->question.'<br/> User Answer: '.$user_answer->answer.'<br/>';
							 //echo 'Cons Question: '.$product_answer->question.'<br/> Cons Answer: '.$product_answer->answer.'<br/>';
							 //echo 'Weight '.$product_weight;
							 //echo '<br/>';
							$match = true;
							break;
						}
					}
					if( !$match ){ //answer is not match
				           //echo ' User Question: '.$user_answer->question.' not matched <br/>';
					   break;
					}
				}
				if ( $match ) {
					$productlist[$i]['id']     =  $product->product_id;
					$productlist[$i++]['weight'] =  $product_weight;
				}
				//echo 'Weight is : '.$product_weight.'<br/>';
			}
			//print_rr( $productlist );

			foreach ($productlist as $product) {
				//if ($product['weight'] >= $weighttoshow ) {
					$post = get_post( $product['id']);
					//print_rr( $post );
					?>
					<div style="width: 90%;" class="product product-cat span3 shadow-s3 ">
						<a href="<?php echo post_permalink( $post->ID );?>">
							<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-style-2' ); echo $image[0];?>"/>
							<h3>
								<?php echo $post->post_content;?>
							</h3>
						</a>
					</div>
					<?php
					//echo 'Product id is '.$product['id'];
				//}
			}
			echo '<div style="clear:both"></div>';
			echo $args['after_widget'];
		} else {
			echo 'To Get Suggestion Please Login';
		}
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 

		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Suggest_Products_Widget

// register Suggest_Products_Widget widget
function register_foo_widget() {
    register_widget( 'Suggest_Products_Widget' );
}
add_action( 'widgets_init', 'register_foo_widget' );


?>
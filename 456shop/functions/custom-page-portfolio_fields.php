<?php

$page_portfolio_meta_boxes = 
array(

"filter" => array(
"name" => "filter",
"type" => "input",
"std" => "",
"description" => "enter categories [slugs separated by commas] you would like to display",
"title" => "Categories Filter"),

);

/* meta_boxes
================================================== */
function page_portfolio_meta_boxes() {
global $post, $page_portfolio_meta_boxes;
	
	foreach($page_portfolio_meta_boxes as $meta_box) {
		
        if($meta_box['name']){
    		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
    		
    		echo'<div style="display:block;"><h4 style="display:inline-block;">'.$meta_box['title'].'</h4>';
            if($meta_box['description']){
               echo'<p style="font-size:90%;display:inline-block;">&nbsp;('.$meta_box['description'].')</p></div>'; 
            }else{
               echo'</div>'; 
            }
        }
		
		if( $meta_box['type'] == "input" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" style="width:90%"/><br />';
            
		} elseif ( $meta_box['type'] == "unoslider" ) {
			
			echo'<select name="'.$meta_box['name'].'_value">';
			
			foreach ($meta_box['options'] as $option) {
            
                global $wpdb;
                $table_name = $wpdb->prefix . "unoslider";
                $val = $wpdb->get_var("SELECT id FROM $table_name WHERE title = '".$option."'");
                
				echo'<option value="';
                echo $val;
                echo'"';
				if ( get_post_meta($post->ID, $meta_box['name'].'_value', true) == $option ) { 
					echo ' selected="selected"'; 
				} elseif ( $option == $meta_box['std'] ) { 
					echo ' selected="selected"'; 
				} 
				echo'>'. $option .'</option>';                
			
			} 
			
			echo'</select>';
                      
		} elseif ( $meta_box['type'] == "layerslider" ) {
			
			echo'<select name="'.$meta_box['name'].'_value">';
			
			foreach ($meta_box['options'] as $val => $option) {
                
				echo'<option value="';
                echo $val;
                echo'"';
				if ( get_post_meta($post->ID, $meta_box['name'].'_value', true) == $val ) { 
					echo ' selected="selected"'; 
				} elseif ( $option == $meta_box['std'] ) { 
					echo ' selected="selected"'; 
				} 
				echo'>'. $option .'</option>';
			
			} 
			
			echo'</select>';
            
		} elseif ( $meta_box['type'] == "select" ) {
			
			echo'<select name="'.$meta_box['name'].'_value">';
			
			foreach ($meta_box['options'] as $option) {
                
				echo'<option value="';
                echo $option['value'];
                echo'"';
				if ( get_post_meta($post->ID, $meta_box['name'].'_value', true) == $option['value'] ) { 
					echo ' selected="selected"'; 
				} elseif ( $option == $meta_box['std'] ) { 
					echo ' selected="selected"'; 
				} 
				echo'>'. $option['text'] .'</option>';
			
			} 
			
			echo'</select>';
        }
	}

}

/* enable meta_boxes
================================================== */
function create_page_portfolio_meta_box() {
global $theme_name, $page_portfolio_meta_boxes;
	if (function_exists('add_meta_box') ) {
	add_meta_box( 'new_portfolio-meta-boxes', __('Portfolio Options', GETTEXT_DOMAIN), 'page_portfolio_meta_boxes', 'page', 'normal', 'high' );
	}
}

/* update meta_boxes
================================================== */
function save_page_portfolio_postdata( $post_id ) {
	global $post, $page_portfolio_meta_boxes;  
		foreach($page_portfolio_meta_boxes as $meta_box) {  
 
		if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {  
		return $post_id;  
		}  
	
	if ( 'page' == $_POST['post_type'] ) {  
	if ( !current_user_can( 'edit_page', $post_id ))  
	return $post_id;  
	} else {  
	if ( !current_user_can( 'edit_post', $post_id ))  
	return $post_id;  
	}  
	
	$data = $_POST[$meta_box['name'].'_value'];  
	
	if(get_post_meta($post_id, $meta_box['name'].'_value') == "")  
	add_post_meta($post_id, $meta_box['name'].'_value', $data, true);  
	elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))  
	update_post_meta($post_id, $meta_box['name'].'_value', $data);  
	elseif($data == "")  
	delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));  
	}
	
}
add_action('admin_menu', 'create_page_portfolio_meta_box');
add_action('save_post', 'save_page_portfolio_postdata');
?>
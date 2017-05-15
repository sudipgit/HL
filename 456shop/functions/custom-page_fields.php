<?php

$select_type = array(
"name" => "select-type",
"type" => "select",
"std" => 1,
"options" => array (array( "value" => "none", "text" => "None"),
                    array( "value" => "layerslider", "text" => "LayerSlider"),
                    array( "value" => "nivoslider", "text" => "Nivo Slider"),
                    array( "value" => "dg_gallery", "text" => "Dynamic Grid Gallery"),
                    array( "value" => "image", "text" => "Image"),
                    array( "value" => "video", "text" => "Video") ),
"description" => "select a type of front template",
"title" => "Type");

$page_meta_boxes = 
array(

"select-type" => $select_type,

"layer-slider" => array(
"name" => "layer-slider",
"type" => "input",
"std" => "",
"description" => "enter a shortcode",
"title" => "LayerSlider"),

"nivo-slider" => array(
"name" => "nivo-slider",
"type" => "input",
"std" => "",
"description" => "enter a shortcode",
"title" => "Nivo Slider"),

"dg_gallery" => array(
"name" => "dg_gallery",
"type" => "input",
"std" => "",
"description" => "enter a shortcode",
"title" => "Dynamic Grid: Photo Gallery"),

"video" => array(
"name" => "video",
"type" => "input",
"std" => "",
"description" => "enter the video URL [youtube or vimeo]",
"title" => "Video URL"),

"header_content" => array(
"name" => "header_content",
"type" => "wp_editor",
"std" => "",
"description" => "header_content",
"title" => "Header Content"),

);

/* meta_boxes
================================================== */
function page_meta_boxes() {
global $post, $page_meta_boxes;
	
	foreach($page_meta_boxes as $meta_box) {
		
        if($meta_box['name']){
    		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
    		
            if($meta_box['title']){
    		echo'<div style="display:block;"><h4 style="display:inline-block;">'.$meta_box['title'].'</h4>';
            }else{
               echo'<div>'; 
            }
            
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
		
			echo"<input type='text' name='".$meta_box['name']."_value' value='".$meta_box_value."' style='width:90%'/><br />";
                      
		} elseif ( $meta_box['type'] == "nivoslider" ) {
			
			echo'<select name="'.$meta_box['name'].'_value">';
			
			foreach ($meta_box['options'] as $option) {
            
                global $wpdb;
                $val = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '".$option."'");
                
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
                      
		} elseif ( $meta_box['type'] == "layerslider" ) {
			
			echo'<select name="'.$meta_box['name'].'_value">';
			
			foreach ($meta_box['options'] as $option) {
            
                global $wpdb;
                $table_name = $wpdb->prefix . "layerslider";
                $val = $wpdb->get_var("SELECT id FROM $table_name WHERE name = '".$option."' AND flag_deleted = '0'");
                
				if(!$val == ''){
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
			
			} 
			
			echo'</select>';
			
        } elseif ( $meta_box['type'] == "wp_editor" ) {
		  
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			wp_editor( $meta_box_value, $meta_box['name'].'_value', array( 'textarea_rows' => '5' ) );
             
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
function create_page_meta_box() {
global $theme_name, $page_meta_boxes;
	if (function_exists('add_meta_box') ) {
	add_meta_box( 'new-meta-boxes', __('Front Page Options', GETTEXT_DOMAIN), 'page_meta_boxes', 'page', 'normal', 'high' );
	}
}

/* update meta_boxes
================================================== */
function save_page_postdata( $post_id ) {
	global $post, $page_meta_boxes;  
		foreach($page_meta_boxes as $meta_box) {  
 
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
add_action('admin_menu', 'create_page_meta_box');
add_action('save_post', 'save_page_postdata');
?>
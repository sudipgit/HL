<?php
$post_meta_boxes = 
array(

"post_style" => array(
"name" => "post_style",
"type" => "select",
"std" => 1,
"options" => array (array('value' => '', 'text' => 'style 1'),
                    array('value' => 'style_2', 'text' => 'style 2')),
"description" => "select one of your post style, the option is not available for 'Mini Blog Template'",
"title" => "Post Style"),

"link-url" => array(
"name" => "link-url",
"type" => "input",
"std" => "",
"description" => "enter the URL for the link",
"title" => "Link Post"),

"video-url" => array(
"name" => "video-url",
"type" => "input",
"std" => "",
"description" => "enter the video URL [youtube or vimeo]",
"title" => "Video URL"),

"full-width" => array(
"name" => "full-width",
"type" => "checkbox",
"std" => "",
"description" => "check, if you want to hide the sidebar",
"title" => "Full Width Post"),

"share" => array(
"name" => "share",
"type" => "checkbox",
"std" => "",
"description" => "check, if you want to hide share buttons",
"title" => "Share Buttons"),

);

/* meta_boxes
================================================== */
function post_meta_boxes() {
global $post, $post_meta_boxes;
	
	foreach($post_meta_boxes as $meta_box) {
		
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		
		echo'<div style="display:block;"><h4 style="display:inline-block;">'.$meta_box['title'].'</h4>';
        if($meta_box['description']){
           echo'<p style="font-size:90%;display:inline-block;">&nbsp;('.$meta_box['description'].')</p></div>'; 
        }else{
           echo'</div>'; 
        }
		
		if( $meta_box['type'] == "input" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" style="width:90%"/><br />';
			
		} elseif ( $meta_box['type'] == "checkbox" ) {
		  
            $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
          
			if($meta_box_value == '1'){ $checked = "checked=\"checked\""; }else{ $checked = "";} 
			echo 	'<input type="checkbox" name="' . $meta_box[ 'name' ] . '_value" value="1" ' . $checked . ' />';
	
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
function create_post_meta_box() {
global $theme_name, $post_meta_boxes;
	if (function_exists('add_meta_box') ) {
	add_meta_box( 'new-meta-boxes', __('Post Format', GETTEXT_DOMAIN), 'post_meta_boxes', 'post', 'normal', 'high' );
	}
}

/* update meta_boxes
================================================== */
function save_post_postdata( $post_id ) {
	global $post, $post_meta_boxes;
	  
	foreach($post_meta_boxes as $meta_box) {  

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
add_action('admin_menu', 'create_post_meta_box');
add_action('save_post', 'save_post_postdata');
?>
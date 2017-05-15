<?php
$sidebar_meta_boxes = 
array(

"left_sidebar" => array(
"name" => "left_sidebar",
"type" => "checkbox",
"std" => "",
"description" => "",
"title" => "Left Sidebar"),

);

/* meta_boxes
================================================== */
function sidebar_meta_boxes() {
global $post, $sidebar_meta_boxes;
	
	foreach($sidebar_meta_boxes as $meta_box) {
		
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
	
		}
        
	}

}

/* enable meta_boxes
================================================== */
function create_sidebar_meta_box() {
global $theme_name, $sidebar_meta_boxes;
	if (function_exists('add_meta_box') ) {
	add_meta_box( 'new-sidebar-meta-boxes', __('Sidebar Options', GETTEXT_DOMAIN), 'sidebar_meta_boxes', 'post', 'side', 'default' );
    add_meta_box( 'new-sidebar-meta-boxes', __('Sidebar Options', GETTEXT_DOMAIN), 'sidebar_meta_boxes', 'page', 'side', 'default' );
    add_meta_box( 'new-sidebar-meta-boxes', __('Sidebar Options', GETTEXT_DOMAIN), 'sidebar_meta_boxes', 'portfolio', 'side', 'default' );
	}
}

/* update meta_boxes
================================================== */
function save_sidebar_postdata( $post_id ) {
	global $post, $sidebar_meta_boxes;  
		foreach($sidebar_meta_boxes as $meta_box) {  
 
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
add_action('admin_menu', 'create_sidebar_meta_box');
add_action('save_post', 'save_sidebar_postdata');
?>
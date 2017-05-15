<?php
$about_meta_boxes = 
array(    

"about_buttons" => array(
"name" => "about_buttons",
"type" => "repeatable",
"std" => "",
"description" => "",
"title" => "Icon Buttons"),

);

/* meta_boxes
================================================== */
function about_meta_boxes() {
global $post, $about_meta_boxes;
	
	foreach($about_meta_boxes as $meta_box) {
		
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		
        if($meta_box['description']){
		
        echo'<div style="display:block;"><h4 style="display:inline-block;">'.$meta_box['title'].'</h4></div>'; 
        
        };
		
		if( $meta_box['type'] == "input" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" style="width:90%"/><br />';
			
		} elseif ( $meta_box['type'] == "image" ) {
        
            $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
        
			$image = get_template_directory_uri().'/functions/images/image.png';	
			echo '<span class="custom_default_image" style="display:none">'.$image.'</span>';
			if ($meta_box_value) { $image = wp_get_attachment_image_src($meta_box_value, 'medium');	$image = $image[0]; }				
			echo '<input name="'.$meta_box['name'].'_value" type="hidden" class="custom_upload_image" value="'.$meta_box_value.'" />
            <img src="'.$image.'" class="custom_preview_image" alt="" /><br />
			<input class="custom_upload_image_button button" type="button" value="Choose Image" />
			<small>&nbsp;<a href="#" class="custom_clear_image_button">Remove Image</a></small>';
                    
        } elseif ( $meta_box['type'] == "repeatable" ) {

		echo '<table><th><td>';

        $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

		echo '<a class="repeatable-add button" href="#">Add New</a>
				<ul id="'.$meta_box['name'].'-repeatable" class="custom_repeatable">';
		$i = 0;
        if ($meta_box_value && is_array($meta_box_value)) {
			foreach($meta_box_value as $row) {
				echo '<li><span class="sort hndle">+</span>
							<input type="text" name="'.$meta_box['name'].'_value['.$i.']" id="'.$meta_box['name'].'" value="'.$row.'" size="100" />
							<a class="repeatable-remove button" href="#">Remove</a></li>';
				$i++;
			}
		} else {
			echo '<li><span class="sort hndle">+</span>
						<input type="text" name="'.$meta_box['name'].'_value['.$i.']" id="'.$meta_box['name'].'" value="" size="100" />
						<a class="repeatable-remove button" href="#">Remove</a></li>';
		}
		echo '</ul>';
        
        echo '<script>jQuery(".custom_repeatable").sortable({ opacity: 0.6, revert: true, cursor: "move", handle: ".sort" });</script>';

		echo '</td></tr></table>';
        
        if($meta_box['description']){
           echo'<p>'.$meta_box['description'].'</p>'; 
        };
        
        echo '<p>An example of shortcode - "<strong>twitter</strong>%%<strong>https://twitter.com/lidplussdesign</strong>"</p>';
                       
        } elseif ( $meta_box['type'] == "textarea" ) {
		  
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			echo'<textarea rows="4" type="text" name="'.$meta_box['name'].'_value" style="width:90%">' . htmlspecialchars( $meta_box_value ) . '</textarea><br />';
             
        }
        
	}

}

/* enable meta_boxes
================================================== */
function create_about_meta_box() {
global $theme_name, $about_meta_boxes;
	if (function_exists('add_meta_box') ) {
	add_meta_box( 'about-meta-boxes', __('Social Buttons', GETTEXT_DOMAIN), 'about_meta_boxes', 'about', 'normal', 'high' );;
	}
}

/* update meta_boxes
================================================== */
function save_about_postdata( $post_id ) {
	global $post, $about_meta_boxes;  
		foreach($about_meta_boxes as $meta_box) {  
 
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
add_action('admin_menu', 'create_about_meta_box');
add_action('save_post', 'save_about_postdata');
?>
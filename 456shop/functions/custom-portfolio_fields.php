<?php
$portfolio_meta_boxes = 
array(

"lightbox" => array(
"name" => "lightbox",
"type" => "checkbox",
"std" => "",
"description" => "check to display content in a lightbox on the front page",
"title" => "Lightbox"),

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

"details" => array(
"name" => "details",
"type" => "repeatable",
"std" => "",
"description" => 'an example - "<strong>Client</strong>%%<strong>Themeforest</strong>", use a "Hyperlink" shortcode for displaying the link',
"title" => "Details"),

"share" => array(
"name" => "share",
"type" => "checkbox",
"std" => "",
"description" => "check to disable share buttons",
"title" => "Share Buttons"),

"gallery_type" => array(
"name" => "gallery_type",
"type" => "select",
"std" => 1,
"options" => array (array('value' => '', 'text' => 'default'),
                    array('value' => 'sidebar', 'text' => 'sidebar')),
"description" => "select one of your gallery type",
"title" => "Gallery Type"),

"full-width" => array(
"name" => "full-width",
"type" => "checkbox",
"std" => "",
"description" => "check, if you want to hide the sidebar",
"title" => "Full Width Post"),

);

/* meta_boxes
================================================== */
function portfolio_meta_boxes() {
global $post, $portfolio_meta_boxes;
	
	foreach($portfolio_meta_boxes as $meta_box) {
		
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
		
        } elseif ( $meta_box['type'] == "textarea" ) {
		  
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			echo'<textarea rows="4" type="text" name="'.$meta_box['name'].'_value" style="width:90%">' . htmlspecialchars( $meta_box_value ) . '</textarea><br />';
             
        } elseif ( $meta_box['type'] == "checkbox" ) {
		  
            $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
          
			if($meta_box_value == '1'){ $checked = "checked=\"checked\""; }else{ $checked = "";} 
			echo 	'<input type="checkbox" name="' . $meta_box[ 'name' ] . '_value" value="1" ' . $checked . ' />';
	
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

		echo '</td></tr></table>';
                       
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
function create_portfolio_meta_box() {
global $theme_name, $portfolio_meta_boxes;
	if (function_exists('add_meta_box') ) {
	add_meta_box( 'new-meta-boxes', __('Post Options', GETTEXT_DOMAIN), 'portfolio_meta_boxes', 'portfolio', 'normal', 'high' );
	}
}

/* update meta_boxes
================================================== */
function save_portfolio_postdata( $post_id ) {
	global $post, $portfolio_meta_boxes;  
		foreach($portfolio_meta_boxes as $meta_box) {  
 
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
add_action('admin_menu', 'create_portfolio_meta_box');
add_action('save_post', 'save_portfolio_postdata');
?>
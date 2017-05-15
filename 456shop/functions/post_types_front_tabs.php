<?php
/* front tabs post type
================================================== */
function front_post_type() 
{
	$labels = array(
		'name' => __( 'Front Tabs'),
		'singular_name' => __( 'Front Tabs' ),
		'add_new' => _x('Add New', 'front_tabs'),
		'add_new_item' => __('Add New Tab'),
		'edit_item' => __('Edit Tab'),
		'new_item' => __('New Tab'),
		'view_item' => __('View Tab'),
		'search_items' => __('Search Front Tabs'),
		'not_found' =>  __('No front tabs found'),
		'not_found_in_trash' => __('No tab found in trash'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
        'has_archive' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 50,
		'rewrite' => array('slug' => __( 'front_tabs' )),
		'supports' => array('title','editor','thumbnail')
	  ); 
	  
	  register_post_type(__( 'front_tabs' ),$args);
}


/* front tabs taxonomies
================================================== */
function front_taxonomies(){
    
	// Categories
	
	register_taxonomy(
		'front_tabs_category',
		'front_tabs',
		array(
			'hierarchical' => true,
			'label' => 'Tab Category',
			'query_var' => true,
			'rewrite' => true
		)
	);

}

/* front tabs edit
================================================== */
function front_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Tab' ),
            "front_tabs_category" => __( 'Tab Category' ),
        );  
  
        return $columns;  
}  

/* front tabs custom column
================================================== */
function front_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
    		case "front_tabs_category":
    			echo get_the_term_list($post->ID, 'front_tabs_category', '', ', ','');
    		break;
        }  
}  

add_action( 'init', 'front_post_type' );
add_action( 'init', 'front_taxonomies', 0 ); 
add_filter("manage_edit-front_tabs_columns", "front_edit_columns");  
add_action("manage_posts_custom_column",  "front_custom_columns");  
?>
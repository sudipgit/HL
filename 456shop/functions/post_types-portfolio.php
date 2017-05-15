<?php
/* Portfolio post type
================================================== */
function portfolio_post_type() 
{
	$labels = array(
		'name' => __( 'Portfolio'),
		'singular_name' => __( 'Portfolio' ),
		'add_new' => _x('Add New', 'portfolio'),
		'add_new_item' => __('Add New Portfolio'),
		'edit_item' => __('Edit Portfolio'),
		'new_item' => __('New Portfolio'),
		'view_item' => __('View Portfolio'),
		'search_items' => __('Search Portfolio Items'),
		'not_found' =>  __('No portfolio items found'),
		'not_found_in_trash' => __('No portfolio found in Trash'), 
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
		'menu_position' => 35,
		'rewrite' => array('slug' => __( 'portfolio' )),
		'supports' => array('title','editor','thumbnail')
	  ); 
	  
	  register_post_type(__( 'portfolio' ),$args);
}


/* Portfolio taxonomies
================================================== */
function portfolio_taxonomies(){
    
	// Categories
	
	register_taxonomy(
		'portfolio_category',
		'portfolio',
		array(
			'hierarchical' => true,
			'label' => 'Categories',
			'query_var' => true,
			'rewrite' => true
		)
	);
    
	// Tags
	
	register_taxonomy(
		'portfolio_tags',
		'portfolio',
		array(
			'hierarchical' => false,
			'label' => 'Tags',
			'query_var' => true,
			'rewrite' => true
		)
	);

}

/* Portfolio edit
================================================== */
function portfolio_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Portfolio Item Title' ),
            "portfolio_category" => __( 'Categories' ),
            "portfolio_tags" => __( 'Tags' ),
        );   
  
        return $columns;  
}  

/* Portfolio custom column
================================================== */
function portfolio_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
    		case "portfolio_category":
    			echo get_the_term_list($post->ID, 'portfolio_category', '', ', ','');
    		break;
    		case "portfolio_tags":
    			echo get_the_term_list($post->ID, 'portfolio_tags', '', ', ','');
    		break;
        }  
}  

add_action( 'init', 'portfolio_post_type' );
add_action( 'init', 'portfolio_taxonomies', 0 ); 
add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");  
add_action("manage_posts_custom_column",  "portfolio_custom_columns");  
?>
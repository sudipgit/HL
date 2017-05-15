<?php

/* walker for wp_list_categories (portfolio filter)
================================================== */
class portfolio_filter_walker extends Walker_Category {
   function start_el(&$output, $category, $depth, $args) {
      extract($args);
      $cat_name = esc_attr( $category->slug);
      $cat_name_ = esc_attr( $category->name);
      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
      $cat_name_ = apply_filters( 'list_cats', $cat_name_, $category );
	  $link = '<a href="#filter" ';
      $link .= 'title="' . sprintf( __('View all items filed under', GETTEXT_DOMAIN), $cat_name) . '" ';
      $link .= 'data-option-value=".'.$cat_name.'"';
      $link .= '>';
      // $link .= $cat_name . '</a>';
      $link .= $cat_name_;
      $link .= '</a>';
      if ( isset($current_category) && $current_category )
         $_current_category = get_category( $current_category );
      if ( 'list' == $args['style'] ) {
          $output .= "<li class='cat-item cat-item-".$category->term_id;
          $output .= "'>$link\n";
       } else {
          $output .= "\t$link<br />\n";
       }
   }
}


class bootstrap_nav_menu_456shop_walker extends Walker_Nav_Menu  {


	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$element = 'ul';
		
		$type = "";
		
		if($depth==0&&$this->isnavMenu=="column-2")
		{
			$type = "mega-dd-2";
			$element = 'div';
		}
		if($depth==0&&$this->isnavMenu=="column-3")
		{
			$type = "mega-dd-3";
			$element = 'div';
		}
		if($depth==0&&$this->isnavMenu=="column-4")
		{
			$type = "mega-dd-4";
			$element = 'div';
		}
		if($depth==0&&$this->isnavMenu=="column-1")
		{
			$type = "mega-dd-1";
			$element = 'div';
		}
		$class = "dropdown-menu";
		if($depth==1&&$this->isnavMenu=="column-2"){$class = "";}
		if($depth==1&&$this->isnavMenu=="column-3"){$class = "";}
		if($depth==1&&$this->isnavMenu=="column-4"){$class = "";}
		if($depth==1&&$this->isnavMenu=="column-1"){$class = "";}

		$output .= "\n$indent<{$element} class=\"$class $type \">\n";
	}

	/**
	 * @see Walker::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function end_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		
		$element = 'ul';
		$clear = "";
		if($depth==0&&$this->isnavMenu=="column-2")
		$element = 'div';
		$clear = "<div class='clearfix'></div>";
		if($depth==0&&$this->isnavMenu=="column-3")
		$element = 'div';
		$clear = "<div class='clearfix'></div>";
		if($depth==0&&$this->isnavMenu=="column-4")
		$element = 'div';
		$clear = "<div class='clearfix'></div>";
		if($depth==0&&$this->isnavMenu=="column-1")
		$element = 'div';
		$clear = "<div class='clearfix'></div>";

		$output .= "$indent</{$element}>$clear\n";
		
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	
			global $wp_query, $woocommerce;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
			$class_names = $value = '';
	        
			
			$value = get_post_meta( $item->ID, 'menu-item-nav-type-'.$item->ID,true);

			if($value=="column-2"){
				$value="column-2";
			}else if($value=="column-3"){
				$value="column-3";	
			}else if($value=="column-4"){
				$value="column-4";	
			}else if($value=="column-1"){
				$value="column-1";	
			}
			else{
				$value="";
			}
						
			if($depth==0){
				
				$this->isnavMenu = $value;
			    
				if($this->isnavMenu == "column-2") {  
				
					$this->menutype = "column";
				
				}
				if($this->isnavMenu == "column-3") {  
				
					$this->menutype = "column";
				
				}
				if($this->isnavMenu == "column-4") {  
				
					$this->menutype = "column";
				
				}
				if($this->isnavMenu == "column-1") {  
				
					$this->menutype = "column";
				
				}
			
			}
		
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			
			if(in_array("Thumb", $classes)&&$depth==1){
				$classes[] = 'product';
			}
			
			$classes[] = ($item->current) ? 'active' : '';
			$classes[] = 'menu-item-' . $item->ID;
			 
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		
			if ($args->has_children && $depth > 0) {
				$class_names .= ' dropdown-submenu';
			} else if($args->has_children && $depth === 0) {
				$class_names .= ' dropdown';
			}

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
         
		 
		  if($this->isnavMenu == "") {
		  
		  	$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			if(in_array("divider", $classes)){
				$output .= $indent . '<li class="divider"></li>';
			} else {	 
				$output .= $indent . '<li' . $id  . $class_names .'>';
		
				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
				
				if($depth==0){
		            $plugins = get_option('active_plugins');
                    $required_plugin = 'woocommerce/woocommerce.php';
                    if ( in_array( $required_plugin , $plugins ) ) {
                        $woo_page_id = woocommerce_get_page_id('shop');
                    }else{
                        $woo_page_id = '0';
                    }
					if($woo_page_id==$item->object_id){
						$attributes .= ($args->has_children) 	    ? ' data-toggle="dropdown" data-target="#" class="dropdown-toggle menu-shop"' : 'class="menu-shop"';
					}else{
						$attributes .= ($args->has_children) 	    ? ' data-toggle="dropdown" data-target="#" class="dropdown-toggle"' : '';
					}
				}else{
					$attributes .= ($args->has_children) 	    ? '' : '';
				}
				
		
		       if($depth != 0){
					$caret = '</a>';
		       }else{
		           $caret = ' <span class="caret"></span></a>';
		       }
		
				$item_output = $args->before;
				if(in_array("nav-header", $classes)){
					$item_output .= '';
				}else{
					$item_output .= '<a'. $attributes .'>';
				}
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				if(in_array("nav-header", $classes)){
					$item_output .= '';
				}else{
					$item_output .= ($args->has_children) ? $caret : '</a>';
				}
				$item_output .= $args->after;
			}
			
		  }else if($this->menutype=="column"){
			
			if($depth==1){
				$output .= $indent . '<section ' . $id  .' '. $class_names .'>';
			}else
			
				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				
				if(in_array("divider", $classes)){
				
					$output .= $indent. '<li class="divider"></li>';
				
				} else if(in_array("Thumb", $classes)){
				
					if ( 'product' == get_post_type($item->object_id) ){
					
						if($item->description){
					
							$output .= $indent . '<div' . $id  .' class="nav-header">'. esc_attr( $item->description ) .'</div>';
						
						}
						
						$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
						$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
						$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
						
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $item->object_id ), 'shop-navi' );
						
						$margin = "";
						
						if(!$item->description){ $margin = 'style="margin-top:20px;"'; }
						
						$item_output = "";
						
						$item_output .= '<div '.$margin.' class="item"><a'.$attributes.'>';
						
						if(!$image){
						    $uploads = THEME_ASSETS;
						    $src = $uploads . '/img/placeholder.png';
							$item_output .= '<div class="img-wrap"><img class="shadow-s3" alt="" src="'.$src.'"/>';
							
						}else{
							$item_output .= '<div class="img-wrap woocommerce"><img class="shadow-s3" alt="" src="'.$image[0].'"/>';
						}
						
						$product_id = get_product($item->object_id);
						
						if ($product_id->is_on_sale()) :
						
							$item_output .= apply_filters('woocommerce_sale_flash', '<span class="onsale">'.__('Sale!', 'woocommerce').'</span>', $item->object_id, $product_id);
						
						endif;
						
						$item_output .= '</div>';
						$item_output .= '<h5>'. apply_filters( 'the_title', $item->title, $item->ID ) .'</h5></a>';
						$item_output .= '<span class="price">';
						$item_output .= $product_id->get_price_html();
						$item_output .= '</span>';
						
						$item_output .= '</div>';
					
					} else if( 'portfolio' == get_post_type($item->object_id)){
					
						if($item->description){
					
							$output .= $indent . '<div' . $id  .' class="nav-header">'. esc_attr( $item->description ) .'</div>';
						
						}
						
						$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
						$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
						$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
						
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $item->object_id ), 'shop-navi' );
						
						$margin = "";
						
						if(!$item->description){ $margin = 'style="margin-top:20px;"'; }
						
						$item_output = "";
						
						$item_output .= '<div '.$margin.' class="item portfolio-item"><a'.$attributes.'>';
						
						if(!$image){
						    $uploads = THEME_ASSETS;
						    $src = $uploads . '/img/placeholder.png';
							$item_output .= '<div class="img-wrap"><img class="shadow-s3" alt="" src="'.$src.'"/>';
							
						}else{
							$item_output .= '<div class="img-wrap"><img class="shadow-s3" alt="" src="'.$image[0].'"/>';
						}
						
						$item_output .= '</div>';
						$item_output .= '<h5>'. apply_filters( 'the_title', $item->title, $item->ID ) .'</h5></a>';
						
						$item_output .= '</div>';;
					
					}

				
				} else {
				
					if($depth!=1)
					$output .= $indent . '<li' . $id  . $class_names .'>';
					
					$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
					$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
					$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
					$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
				
					if($depth==0){
			            $plugins = get_option('active_plugins');
	                    $required_plugin = 'woocommerce/woocommerce.php';
	                    if ( in_array( $required_plugin , $plugins ) ) {
	                        $woo_page_id = woocommerce_get_page_id('shop');
	                    }else{
	                        $woo_page_id = '0';
	                    }
						if($woo_page_id==$item->object_id){
							$attributes .= ($args->has_children) 	    ? ' data-toggle="dropdown" data-target="#" class="dropdown-toggle menu-shop"' : 'class="menu-shop"';
						}else{
							$attributes .= ($args->has_children) 	    ? ' data-toggle="dropdown" data-target="#" class="dropdown-toggle"' : '';
						}
					}else{
						$attributes .= ($args->has_children) 	    ? '' : '';
					}
				
				   if($depth != 0){
					   $caret = '</a>';
				   }else{
				       $caret = ' <span class="caret"></span></a>';
				   }
				
					$item_output = $args->before;
					if($depth==1)
						$item_output .= '<h6 class="nav-header">';
					else
					
						if(in_array("nav-header", $classes)){
							$item_output .= '';
						}else{
							$item_output .= '<a'. $attributes .'>';
						}
					
					$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
					
					if($depth==1)
						$item_output .= '</h6>';
					else
						if(in_array("nav-header", $classes)){
							$item_output .= '';
						}else{
							$item_output .= ($args->has_children) ? $caret : '</a></li>';
						}
					
				}
			
				$item_output .= $args->after;
				
			}  
			
		
		 
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			
		
	}

	/**
	 * @see Walker::end_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object. Not used.
	 * @param int $depth Depth of page. Not Used.
	 */
	function end_el(&$output, $item, $depth) {
		
		if($this->isnavMenu == ""){
			$output .= "</li>\n";
		}else{
			if($depth==1)
			$output .= "</section>\n";

		}
	}
	
	
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		
		if ( !$element ) {
			return;
		}
		
		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) ) 
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) ) 
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
				unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);
	}
	
}


class new_nav_menus_walker extends Walker_Nav_Menu {
	/**
	 * @see Walker_Nav_Menu::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 * @param int $depth Depth of page.
	 */
	function start_lvl(&$output) {}

	/**
	 * @see Walker_Nav_Menu::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 * @param int $depth Depth of page.
	 */
	function end_lvl(&$output) {
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_el(&$output, $item, $depth, $args) {
		
		
		global $_wp_nav_menu_max_depth;
		$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		ob_start();
		$item_id = esc_attr( $item->ID );
		$removed_args = array(
			'action',
			'customlink-tab',
			'edit-menu-item',
			'menu-item',
			'page-tab',
			'_wpnonce',
		);

		$original_title = '';
		if ( 'taxonomy' == $item->type ) {
			$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
			if ( is_wp_error( $original_title ) )
				$original_title = false;
		} elseif ( 'post_type' == $item->type ) {
			$original_object = get_post( $item->object_id );
			$original_title = $original_object->post_title;
		}

		$classes = array(
			'menu-item menu-item-depth-' . $depth,
			'menu-item-' . esc_attr( $item->object ),
			'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
		);

		$title = $item->title;
		
		$value = get_post_meta( $item_id, 'menu-item-nav-type-'.$item_id,true);
		if(($value=="")){
			$value = "checked='yes'";
		}else{
			$value_col2 = ($value=="column-2") ? "checked='yes'"  : "";
			$value_col3 = ($value=="column-3") ? "checked='yes'"  : "";
			$value_col4 = ($value=="column-4") ? "checked='yes'"  : "";
			$value_col5 = ($value=="column-1") ? "checked='yes'"  : "";
		}


		if ( ! empty( $item->_invalid ) ) {
			$classes[] = 'menu-item-invalid';
			/* translators: %s: title of menu item which is invalid */
			$title = sprintf( __( '%s (Invalid)' ), $item->title );
		} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
			$classes[] = 'pending';
			/* translators: %s: title of menu item in draft status */
			$title = sprintf( __('%s (Pending)'), $item->title );
		}

		$title = empty( $item->label ) ? $title : $item->label;

		?>
		<li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
			<dl class="menu-item-bar">
				<dt class="menu-item-handle">
					<span class="item-title"><?php echo esc_html( $title ); ?></span>
					<span class="item-controls">
						<span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
						<span class="item-order hide-if-js">
							<a href="<?php
								echo wp_nonce_url(
									add_query_arg(
										array(
											'action' => 'move-up-menu-item',
											'menu-item' => $item_id,
										),
										remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								);
							?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up'); ?>">&#8593;</abbr></a>
							|
							<a href="<?php
								echo wp_nonce_url(
									add_query_arg(
										array(
											'action' => 'move-down-menu-item',
											'menu-item' => $item_id,
										),
										remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								);
							?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down'); ?>">&#8595;</abbr></a>
						</span>
						<a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item'); ?>" href="<?php
							echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
						?>"><?php _e( 'Edit Menu Item' ); ?></a>
					</span>
				</dt>
			</dl>

			<div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
				<?php if( 'custom' == $item->type ) : ?>
					<p class="field-url description description-wide">
						<label for="edit-menu-item-url-<?php echo $item_id; ?>">
							<?php _e( 'URL' ); ?><br />
							<input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
						</label>
					</p>
				<?php endif; ?>
				<p class="description description-thin">
					<label for="edit-menu-item-title-<?php echo $item_id; ?>">
						<?php _e( 'Navigation Label' ); ?><br />
						<input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
					</label>
				</p>
				<p class="description description-thin">
					<label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
						<?php _e( 'Title Attribute' ); ?><br />
						<input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
					</label>
				</p>
				<p class="field-link-target description">
					<label for="edit-menu-item-target-<?php echo $item_id; ?>">
						<input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
						<?php _e( 'Open link in a new window/tab' ); ?>
					</label>
				</p>
				<p class="field-css-classes description description-thin">
					<label for="edit-menu-item-classes-<?php echo $item_id; ?>">
						<?php _e( 'CSS Classes (optional)' ); ?><br />
						<input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
					</label>
				</p>
				<p class="field-xfn description description-thin">
					<label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
						<?php _e( 'Link Relationship (XFN)' ); ?><br />
						<input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
					</label>
				</p>
				<p class="field-description description description-wide">
					<label for="edit-menu-item-description-<?php echo $item_id; ?>">
						<?php _e( 'Description' ); ?><br />
						<textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
						<span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.'); ?></span>
					</label>
				</p>

				<div class="menu-item-actions description-wide submitbox">
				
				
                   <p class="nav-type clearfix">
                   <label for="menu-item-nav-type-<?php echo $item_id; ?>">Navigation Type:</label>
                   <input type="radio" id="menu-item-nav-type-<?php echo $item_id; ?>"  name="menu-item-nav-type-<?php echo $item_id; ?>" <?php  echo $value; ?> value="" /> None &nbsp&nbsp
                   <input type="radio" id="menu-item-nav-type-<?php echo $item_id; ?>"  name="menu-item-nav-type-<?php echo $item_id; ?>" <?php  echo $value_col5; ?> value="column-1" /> 1 Columns &nbsp&nbsp
                   <input type="radio" id="menu-item-nav-type-<?php echo $item_id; ?>"  name="menu-item-nav-type-<?php echo $item_id; ?>" <?php  echo $value_col2; ?> value="column-2" /> 2 Columns &nbsp&nbsp
                   <input type="radio" id="menu-item-nav-type-<?php echo $item_id; ?>"  name="menu-item-nav-type-<?php echo $item_id; ?>" <?php  echo $value_col3; ?> value="column-3" /> 3 Columns &nbsp&nbsp
                   <input type="radio" id="menu-item-nav-type-<?php echo $item_id; ?>"  name="menu-item-nav-type-<?php echo $item_id; ?>" <?php  echo $value_col4; ?> value="column-4" /> 4 Columns</p>
				
					<?php if( 'custom' != $item->type && $original_title !== false ) : ?>
						<p class="link-to-original">
							<?php printf( __('Original: %s'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
						</p>
					<?php endif; ?>
					<a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
					echo wp_nonce_url(
						add_query_arg(
							array(
								'action' => 'delete-menu-item',
								'menu-item' => $item_id,
							),
							remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
						),
						'delete-menu_item_' . $item_id
					); ?>"><?php _e('Remove'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo $item_id; ?>" href="<?php	echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
						?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel'); ?></a>
				</div>

				<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
				<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
				<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
				<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
				<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
				<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
			</div><!-- .menu-item-settings-->
			<ul class="menu-item-transport"></ul>
		<?php
		$output .= ob_get_clean();
			
	}

	/**
	 * @see Walker::end_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object. Not used.
	 * @param int $depth Depth of page. Not Used.
	 */
	function end_el(&$output, $item, $depth) {
		$output .= "</li>\n";
	}
}
add_filter( 'wp_edit_nav_menu_walker', 'modify_backend_walker' , 100);
function modify_backend_walker($name)
		{
			return 'new_nav_menus_walker';
		}
		

function hmenu_scripts()
		{
			if(basename( $_SERVER['PHP_SELF']) == "nav-menus.php" )
			{	
			
				wp_enqueue_script( 'theme-walker' , get_template_directory_uri(). '/functions/theme-walker.js', false, true ); 

			}
		}
add_action('admin_init', 'hmenu_scripts');
				

add_action( 'wp_update_nav_menu_item', 'update_menu', 100, 3);
function update_menu($menu_id, $menu_item_db){	
		$value = $_POST['menu-item-nav-type-'.$menu_item_db];		
		update_post_meta( $menu_item_db, 'menu-item-nav-type-'.$menu_item_db , $value );
					
}


class bootstrap_list_pages_walker extends Walker_Page{
 
        
	function start_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$element = "ul";
		$class = "dropdown-menu";
		$output .= "\n$indent<{$element} class=\"$class \">\n";
	}
        
       
    function start_el(&$output,$page,$depth,$args,$current_page){
	    
	    if ( $depth )
	        $indent = str_repeat("\t", $depth);
	    else
	        $indent = '';
	
	    extract($args, EXTR_SKIP);
	    $css_class = array('page_item', 'page-item-'.$page->ID);
	    if ( !empty($current_page) ) {
	        $_current_page = get_page( $current_page );
	        get_post_ancestors($_current_page);
	        if ( isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors) )
	            $css_class[] = 'current_page_ancestor active';
	        if ( $page->ID == $current_page )
	            $css_class[] = 'current_page_item';
	        elseif ( $_current_page && $page->ID == $_current_page->post_parent )
	            $css_class[] = 'current_page_parent active';
	    } elseif ( $page->ID == get_option('page_for_posts') ) {
	        $css_class[] = 'current_page_parent active';
	    }

		
		if($args['has_children'] && (integer)$depth < 1) $css_class[] = 'dropdown';
		
		$css_class = implode(' ',apply_filters('page_css_class',$css_class, $page, $depth, $args, $current_page));
		
		$data = '';
		
		$dropdown_submenu = '';
		if($args['has_children'] && (integer)$depth > 0) {
			$dropdown_submenu = 'dropdown-submenu';
		}
		
		if($args['has_children']) {
			$data = 'data-toggle="dropdown" data-target="#" class="dropdown-toggle"';
		}
		
		$output .= $indent . '<li class="' . $dropdown_submenu . ' ' . $css_class . '"><a ' . $data . ' href="' . get_permalink($page->ID) . '">' . $link_before . apply_filters('the_title',$page->post_title,$page->ID ) . $link_after;
		
		if($args['has_children'] && (integer)$depth < 1){
			$output .= $indent . ' <span class="caret"></span></a>';
		}else{
		   $output .= $indent . '</a>';
		}
		
		if(!empty($show_date)){
		        if('modified' == $show_date) $time = $page->post_modified;
		        else $time = $page->post_date;
		        $output .= " " . mysql2date($date_format,$time);
		}
    }
}

?>

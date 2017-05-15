<?php

/* Shortcodes
================================================== */

// This will do nothing but will allow the shortcode to be stripped
add_shortcode( 'foobar', 'shortcode_foobar' );
 
// Actual processing of the shortcode happens here
function foobar_run_shortcode( $content ) {
    global $shortcode_tags;
 
    // Backup current registered shortcodes and clear them all out
    $orig_shortcode_tags = $shortcode_tags;
    remove_all_shortcodes();
 
    add_shortcode( 'foobar', 'shortcode_foobar' );
 
    // Do the shortcode (only the one above is registered)
    $content = do_shortcode( $content );
 
    // Put the original shortcodes back
    $shortcode_tags = $orig_shortcode_tags;
 
    return $content;
}
 
add_filter( 'the_content', 'foobar_run_shortcode', 7 );

/* prettyprint pre
================================================== */
function pre_clean($content){

    $content = str_ireplace('<br />', '', $content);
    return $content;
}

function prettyprint($atts, $content=null){
	return '<pre class="prettyprint linenums">'.pre_clean($content).'</pre>';
}
add_shortcode('prettyprint', 'prettyprint');

/* headings
================================================== */
function h1($atts, $content=null){
	extract(shortcode_atts( array( 'type' => '' ), $atts ));
	$Type = '';
	if($type){ $Type = 'class="'.$type.'"';};
	return '<h1 '.$Type.'>'.do_shortcode($content).'</h1>';
}
function h2($atts, $content=null){
	extract(shortcode_atts( array( 'type' => '' ), $atts ));
	$Type = '';
	if($type){ $Type = 'class="'.$type.'"';};
	return '<h2 '.$Type.'>'.do_shortcode($content).'</h2>';
}
function h3($atts, $content=null){
	extract(shortcode_atts( array( 'type' => '' ), $atts ));
	$Type = '';
	if($type){ $Type = 'class="'.$type.'"';};
	return '<h3 '.$Type.'>'.do_shortcode($content).'</h3>';
}
function h4($atts, $content=null){
	extract(shortcode_atts( array( 'type' => '' ), $atts ));
	$Type = '';
	if($type){ $Type = 'class="'.$type.'"';};
	return '<h4 '.$Type.'>'.do_shortcode($content).'</h4>';
}
function h5($atts, $content=null){
	extract(shortcode_atts( array( 'type' => '' ), $atts ));
	$Type = '';
	if($type){ $Type = 'class="'.$type.'"';};
	return '<h5 '.$Type.'>'.do_shortcode($content).'</h5>';
}
function h6($atts, $content=null){
	extract(shortcode_atts( array( 'type' => '' ), $atts ));
	$Type = '';
	if($type){ $Type = 'class="'.$type.'"';};
	return '<h6 '.$Type.'>'.do_shortcode($content).'</h6>';
}
add_shortcode('h1', 'h1');
add_shortcode('h2', 'h2');
add_shortcode('h3', 'h3');
add_shortcode('h4', 'h4');
add_shortcode('h5', 'h5');
add_shortcode('h6', 'h6');


/* paragraph
================================================== */
function p($atts, $content=null){
	return '<p>'.do_shortcode($content).'</p>';
}
add_shortcode('p', 'p');

/* media button
================================================== */
function media_button($atts, $content=null){
	extract(shortcode_atts( array( 
	'button_position' => '',
	'button_top' => '',
	'button_right' => '',
	'button_bottom' => '',
	'button_left' => '',
	'button_size' => 'medium',
	'button_type' => 'primary',
    'button_url' => '#',
    'button_border' => 'light',
    'image_url' => '',
	'image_alt' => '',
	'responsive' => '',
	), $atts ));
	
	if($button_size=='large'){
		$button_size_ = "btn-large";
	}else if($button_size=='small'){
		$button_size_ = "btn-small";
	}
	
	if($button_border=='dark'){
		$button_border_ = "dark_border";
	}
	
	if($button_type=='primary'){
		$button_type_ = "btn-primary";
	}else if($button_type=='info'){
		$button_type_ = "btn-info";
	}else if($button_type=='success'){
		$button_type_ = "btn-success";
	}else if($button_type=='warning'){
		$button_type_ = "btn-warning";
	}else if($button_type=='danger'){
		$button_type_ = "btn-danger";
	}else if($button_type=='inverse'){
		$button_type_ = "btn-inverse";
	}else if($button_type=='link'){
		$button_type_ = "btn-link";
	}
	
	if( $button_top || $button_right || $button_bottom || $button_left){
		$percent_position = "style='";
			if($button_top){
				$percent_position .= 'top:'.$button_top.'% !important;';	
			}
			if($button_right){
				$percent_position .= 'right:'.$button_right.'% !important;';	
			}
			if($button_bottom){
				$percent_position .= 'bottom:'.$button_bottom.'% !important;';	
			}
			if($button_left){
				$percent_position .= 'left:'.$button_left.'% !important;';	
			}
		$percent_position .= "'";
	}
							
	return '<div class="media_button shadow-s3 header-button '.$button_position.' '.$responsive.'"><img alt="'.$image_alt.'" src="'.$image_url.'"><span '.$percent_position.' class="btn_border '.$button_border_.'"><a class="btn '.$button_type_.' '.$button_size_.'" href="'.$button_url.'">'.do_shortcode($content).'</a></span></div>';
}
add_shortcode('media-button', 'media_button');

/* media image
================================================== */
function media_image($atts, $content=null){
	extract(shortcode_atts( array( 
    'href' => '',
    'image_url' => '',
	'image_alt' => '',
	'responsive' => '',
	), $atts ));
	
	if($href){
		$link_start = "<a href='".$href."'>";
		$link_end = "</a>";
	}
	
	if($href==""){$wpstickies = "class='wpstickies'";}
							
	return '<div class="media_image shadow-s3 '.$responsive.'">'.$link_start.'<img '.$wpstickies.' alt="'.$image_alt.'" src="'.$image_url.'">'.$link_end.'</div>';
}
add_shortcode('media-image', 'media_image');

/* media image
================================================== */
function shadow_wrap($atts, $content=null){
	extract(shortcode_atts( array(), $atts ));
							
	return '<div class="shadow-s3 shadow-wrap">'.do_shortcode($content).'</div>';
}
add_shortcode('shadow-wrap', 'shadow_wrap');

/* address
================================================== */
function address($atts, $content=null){
	return '<address>'.do_shortcode($content).'</address>';
}
add_shortcode('address', 'address');

/* margin bottom
================================================== */
function margin_bottom($atts, $content=null){
	return '<div style="margin-bottom: 20px;">'.do_shortcode($content).'</div>';
}
add_shortcode('margin-bottom', 'margin_bottom');

/* strong
================================================== */
function strong($atts, $content=null){
	return '<strong>'.do_shortcode($content).'</strong>';
}
add_shortcode('strong', 'strong');

/* selected
================================================== */
function Select($atts, $content=null){
	return '<span class="selected">'.do_shortcode($content).'</span>';
}
add_shortcode('select', 'Select');

/* abbr
================================================== */
function abbr($atts, $content=null){
	extract(shortcode_atts( array( 
							'title' => 'your title goes here',
							), $atts ));
	return '<abbr title="'.$title.'">'.do_shortcode($content).'</abbr>';
}
add_shortcode('abbr', 'abbr');


/* code, pre
================================================== */
function code($atts, $content=null){
	return '<code>'.pre_clean($content).'</code>';
}
add_shortcode('code', 'code');

function pre($atts, $content=null){
	return '<pre>'.pre_clean($content).'</pre>';
}
add_shortcode('pre', 'pre');

/* blockquote
================================================== */
function blockquote( $atts, $content = null ) {
	extract(shortcode_atts(array(
							'cite' => ''
							),$atts));
	$out = '';
    $out .= '<blockquote><p>'.do_shortcode($content).'</p>';
    if($cite){
    $out .= '<small><cite title="'. $cite .'" >'. $cite .'</cite></small></blockquote>';
    }else{
    $out .= '</blockquote>';
    }
    return $out;
}
add_shortcode('blockquote', 'blockquote');

function blockquote_right( $atts, $content = null ) {
	extract(shortcode_atts(array(
							'cite' => ''
							),$atts));
	$out = '';
    $out .= '<blockquote class="pull-right"><p>'.do_shortcode($content).'</p>';
    if($cite){
    $out .= '<small><cite title="'. $cite .'" >'. $cite .'</cite></small></blockquote>';
    }else{
    $out .= '</blockquote>';
    }
    return $out;
}
add_shortcode('blockquote-right', 'blockquote_right');

/* hr
================================================== */
function hr($atts, $content=null){
	return '<hr/>';
}
add_shortcode('hr', 'hr');

/* br
================================================== */
function br($atts, $content=null){
	return '<br/>';
}
add_shortcode('br', 'br');


/* lists
================================================== */
function p_clean($content){

    $content = str_ireplace('<p>', '', $content);
    $content = str_ireplace('<p/>', '', $content);
    return $content;
}
function lists($atts, $content=null){
	extract(shortcode_atts(array(
							'bullet' => 'square',
							'type' => 'style1'
							),$atts));
	
	$type_ = '';
	
	if($type == "style1"){
		$type_ = 'advanced';
	}elseif($type == "style2"){
		$type_ = 'style2';
	}
							
	return'<div class="'.$type_.' lists-'. $bullet .'">'.p_clean(do_shortcode($content)).'</div>';
}
add_shortcode('lists', 'lists');


/* dropcap, dropcap1, dropcap2
================================================== */
function dropcap($atts, $content=null){
	extract(shortcode_atts(array(
							'type' => ''
							),$atts));
	return '<span class="dropcap">'.do_shortcode($content).'</span>';
}
add_shortcode('dropcap', 'dropcap');

function dropcap1($atts, $content=null){
	extract(shortcode_atts(array(
							'type' => ''
							),$atts));
	return '<span class="dropcap1">'.do_shortcode($content).'</span>';
}
add_shortcode('dropcap1', 'dropcap1');

function dropcap2($atts, $content=null){
	extract(shortcode_atts(array(
							'type' => ''
							),$atts));
	return '<span class="dropcap2 ' . $type . '">'.do_shortcode($content).'</span>';
}
add_shortcode('dropcap2', 'dropcap2');

/* table
================================================== */
function pre_table($content){

    $content = str_ireplace('<br />', '', $content);
    return $content;
}

function table( $atts, $content = null ) {
    extract(shortcode_atts(array('type' => ''), $atts));
	$out = '';
    $out .= '<table class="table '.$type.'">'.do_shortcode(pre_table($content)).'</table>';
    return $out;
}
add_shortcode('table', 'table');

function table_head( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));
	$out = '';
    $out .= '<thead>'.do_shortcode(pre_table($content)).'</thead>';
    return $out;
}
add_shortcode('table-head', 'table_head');

function table_body( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));
	$out = '';
    $out .= '<tbody>'.do_shortcode(pre_table($content)).'</tbody>';
    return $out;
}
add_shortcode('table-body', 'table_body');

function tr( $atts, $content = null ) {
    extract(shortcode_atts(array('type' => ''), $atts));
	$out = '';
    $out .= '<tr class="'.$type.'">'.do_shortcode(pre_table($content)).'</tr>';
    return $out;
}
add_shortcode('tr', 'tr');

function td( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));
	$out = '';
    $out .= '<td>'.do_shortcode(pre_table($content)).'</td>';
    return $out;
}
add_shortcode('td', 'td');

function th( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));
	$out = '';
    $out .= '<th>'.do_shortcode(pre_table($content)).'</th>';
    return $out;
}
add_shortcode('th', 'th');

/* label
================================================== */
function label( $atts, $content = null ) {
    extract(shortcode_atts(array('type' => ''), $atts));
	$out = '';
	if($type){
		$type_ = "label-".$type;
	}
    $out .= '<span class="label '.$type_.'">'.do_shortcode(pre_table($content)).'</span>';
    return $out;
}
add_shortcode('label', 'label');

/* badge
================================================== */
function badge( $atts, $content = null ) {
    extract(shortcode_atts(array('type' => ''), $atts));
	$out = '';
	if($type){
		$type_ = "badge-".$type;
	}
    $out .= '<span class="badge '.$type_.'">'.do_shortcode(pre_table($content)).'</span>';
    return $out;
}
add_shortcode('badge', 'badge');

/* icon heading
================================================== */
function icon_heading($atts, $content=null){
	extract(shortcode_atts( array( 
							'icon_size' => '',
                            'align' => '',
							'icon' => '',
							), $atts ));
                            
    if(!$icon_size) {$icon_size = 'icon_64';};
    if($icon_size == '64') {$icon_size = 'icon_64';};
    if($icon_size == '48') {$icon_size = 'icon_48';};
    if($icon_size == '32') {$icon_size = 'icon_32';};
    
	$out = '';
    $out .= '<div class="header_icon '.$icon_size.' '.$align.'">';
        $out .= '<span class="'.$icon.'"></span>';
        $out .= '<h4 class="title">'.do_shortcode($content).'</h4>';
    $out .= '</div>';
    return $out;
}
add_shortcode('icon_heading', 'icon_heading');

/* clear
================================================== */
function clear( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));
	$out = '';
    $out .= '<div class="clearfix"></div>';
    return $out;
}
add_shortcode('clear', 'clear');

/* hyperlink
================================================== */
function hyperlink($atts, $content=null){
	extract(shortcode_atts( array( 
							'href' => '#',
							'target' => '_self',
							), $atts ));

	return '<a href="'.$href.'" target="'.$target.'">'.do_shortcode($content).'</a>';
}
add_shortcode('hyperlink', 'hyperlink');

/* icon
================================================== */
function icon($atts, $content=null){
	extract(shortcode_atts( array(), $atts ));

	return '<img class="icon" alt="'.do_shortcode($content).'" src="'. get_template_directory_uri() .'/assets/Rocky_Vector_Set/16px/'.do_shortcode($content).'.png" />';
}
add_shortcode('icon', 'icon');

/* iconitem
================================================== */
function iconitem($atts, $content=null){
	extract(shortcode_atts( array( 
							'icon' => '',
							'title' => 'Lorem ipsum dolor',
							), $atts ));
	
	$icon_ = '';
	
	if($icon){
		$icon_ = '<img class="icon" alt="'.$icon.'" src="'. get_template_directory_uri() .'/assets/Rocky_Vector_Set/16px/'.$icon.'.png" />';	
	}

	return '<div class="iconitem"><h5 class="title">'.$icon_.''.$title.'</h5><div class="content">'.do_shortcode($content).'</div></div>';
	
}
add_shortcode('iconitem', 'iconitem');

/* tooltip
================================================== */
function tooltip($atts, $content=null){
	extract(shortcode_atts( array( 
							'placement' => 'top',
							'title' => 'This is a tooltip',
							), $atts ));
	return '<a href="#" rel="tooltip" class="ttip" data-placement="'.$placement.'" title="'.$title.'">'.do_shortcode($content).'</a>';
}
add_shortcode('tooltip', 'tooltip');

/* carousel
================================================== */
function clear_carousel($content){

	$content = str_ireplace('<p>', '', $content);
    $content = str_ireplace('</p>', '', $content);
    $content = str_ireplace('<br />', '', $content);
    return $content;
}

function carousel($atts, $content=null){

	$rand = rand(2, 999999);
	extract(shortcode_atts( array( 
							'title' => 'Carousel',
							'control' => ''
							), $atts ));
	$title_ = '';
	$control_ = '';
	
	if($title){
		$title_ = '<h4 class="title">'.$title.'</h4>';
	}
	if($control != 'off'){
		$control_ = '	<a class="left carousel-control" href="#myCarousel'.$rand.'" data-slide="prev"></a>
		<a class="right carousel-control" href="#myCarousel'.$rand.'" data-slide="next"></a>';
	}else{
		$control_ = '';
	}
	return $title_. '<div id="myCarousel'.$rand.'" class="carousel slide"><div class="carousel-inner">'.clear_carousel(do_shortcode($content)).'</div>'.$control_.'</div>';
}

add_shortcode('carousel', 'carousel');

function carousel_item($atts, $content=null){

	extract(shortcode_atts( array( 
							'img' => '',
							'link' => ''
							), $atts ));
	
	$link_ = '';
							
	if($link){
		$link_ = '<a href="'.$link.'"><img src="'.$img.'" alt="'.do_shortcode($content).'"/></a>';
	}else{
		$link_ = '<img src="'.$img.'" alt="'.do_shortcode($content).'"/>';
	}						
	return '<div class="item">'.$link_.'</div>';
}

add_shortcode('carousel-item', 'carousel_item');

/* testimonial
================================================== */
function testimonial( $atts, $content = null ) {

	$rand = rand(2, 999999);
	extract(shortcode_atts( array( 
							'title' => 'Testimonial',
							'control' => ''
							), $atts ));
	
	$title_ = '';
	$control_ = '';
	
	if($title){
		$title_ = '<h4 class="title">'.$title.'</h4>';
	}
	if($control != 'off'){
		$control_ = '	<a class="left carousel-control" href="#myCarousel'.$rand.'" data-slide="prev"></a>
		<a class="right carousel-control" href="#myCarousel'.$rand.'" data-slide="next"></a>';
	}else{
		$control_ = '';
	}
	return $title_. '<div id="myCarousel'.$rand.'" class="testimonial slide"><div class="carousel-inner">'.do_shortcode($content).'</div>'.$control_.'</div>';

}
add_shortcode('testimonial', 'testimonial');

function testimonial_item($atts, $content=null){

	extract(shortcode_atts( array( 
							'cite' => '',
							'linktitle' => '',
							'linkurl' => ''
							), $atts ));
	
	$link_ = '';
	$cite_ = '';
							
	if($linktitle&&$linkurl){
		$link_ = '<br /><a href="'.$linkurl.'">'.$linktitle.'</a>';
	}else{
		$link_ = '';
	}
	
	if($cite){
		$cite_ = '<div class="cite">'.$cite.''.$link_.'</div>';
	}
												
	return '<div class="item">'.do_shortcode($content).''.$cite_.'</div>';
}

add_shortcode('testimonial-item', 'testimonial_item');

/* Business Hours
================================================== */
function biz_hours( $atts, $content = null ) {

	extract(shortcode_atts( array( 
							'title' => 'Business Hours'
							), $atts ));
							
	$title_ = '';
							
	if($title){
		$title_ = '<h4 class="title">'.$title.'</h4>';
	}
	
	ob_start();?>
	
    <div class="widget biz_hours-widget list">
        <?php echo $title_; ?>
        <ul class="unstyled">
        	<?php echo do_shortcode($content); ?>
        </ul>
    </div>
	
	<?php return ob_get_clean();

}
add_shortcode('biz-hours', 'biz_hours');


function biz_day($atts, $content=null){

	extract(shortcode_atts( array( 
							'day' => 'Monday :',
							), $atts ));
							
	ob_start();?>
							
    <li><span><?php echo $day; ?></span> <span class="right"><?php echo do_shortcode($content); ?></span></li>
            
    <?php return ob_get_clean();
							
}

add_shortcode('biz-day', 'biz_day');



/* callout
================================================== */
function callout($atts, $content=null){

	extract(shortcode_atts( array(
							'type' => ''
							), $atts ));
	
	$type_ = '';						
	
	if($type == 'style2'){
		$type_ = 'callout-2';
	}else{
		$type_ = 'callout';
	}
	
	$out = '';
	
	$out .= '<div class="'.$type_.'">';
		$out .= do_shortcode($content);
		$out .= '<div class="clearfix"></div>';
	$out .= '</div>';
					
	return $out;
	
}
add_shortcode('callout', 'callout');

function callout_content($atts, $content=null){

	extract(shortcode_atts( array(
							'layout' => 'span8'
							), $atts ));
							
		$out = '';
	
		$out .= '<div class="content '.$layout.'">'.do_shortcode($content).'</div>';
					
	return $out;
	
}
add_shortcode('callout-content', 'callout_content');

function callout_button($atts, $content=null){

	extract(shortcode_atts( array(
							'layout' => 'span4'
							), $atts ));
							
		$out = '';
	
		$out .= '<div class="button '.$layout.'">'.do_shortcode($content).'</div>';
					
	return $out;
	
}
add_shortcode('callout-button', 'callout_button');

function callout_newsletter($atts, $content=null){

	extract(shortcode_atts( array(
							'layout' => 'span4'
							), $atts ));
							
		$out = '';
	
		$out .= '<div class="newsletter '.$layout.'">'.do_shortcode($content).'</div>';
					
	return $out;
	
}
add_shortcode('callout-newsletter', 'callout_newsletter');

/* front tabs widget
================================================== */
function front_tabs( $atts, $content = null ) {
	extract(shortcode_atts( array( 
							'category' => '',
							), $atts ));
     
	$query = new WP_Query();
	$front_tabs_posts = $query->query("front_tabs_category=$category&post_type=front_tabs&posts_per_page=-1");
	
	$out = '';
	
	if($front_tabs_posts){
	
		$out .= '<div class="front_tabs tabbable tabs-left">';
			$out .= '<ul class="nav nav-tabs">';
				$i = 1;
				if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
				$out .= '<li class="';
			    $select_icon = get_post_meta(get_the_ID(), 'select-icon_value', true);
			    if($select_icon == ''){
			        $icon = 'none';
			    }else{
			        $icon = $select_icon;
			    }
			    $out .= $icon;
			    if($i == 1){
				  $out .= ' active';  
			    }
				$out .= '"><a href="#tab'.get_the_ID().'" data-toggle="tab">'.get_the_title().'</a></li>';
				$i++;
				endwhile; endif;
			$out .= '</ul>';
			$out .= '<div class="tab-content">';	
				$i = 1;
				if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
				$out .= '<div class="tab-pane'; 
			    if($i == 1){
				  $out .= ' active';  
			    }
				$out .= '" id="tab'.get_the_ID().'">';
				    $content1 = get_the_content();
				    $content1 = apply_filters('the_content', $content1);
				    $content1 = str_replace(']]>', ']]&gt;', $content1);
				    $out .= do_shortcode($content1);
				$out .= '</div>';
				$i++;
				endwhile; endif;	
			$out .= '</div>';
		$out .= '</div>';
			
	}else{
	    
	    $out .= '<p style="color: #ed1c24;">'.__('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN).'</p>';
	    
	}   
        
    return $out;
}
add_shortcode('front_tabs', 'front_tabs');


/* sidebar
================================================== */
function sidebar($atts, $content=null){
	extract(shortcode_atts( array( 
							'type' => 'right',
							), $atts ));
	
	$type_ = '';
	
	if($type == 'left'){
		$type_ = 'sidebar-left';
	}						
							
    ob_start();
    dynamic_sidebar('Shortcode Sidebar');
    $out .= '<div class="sidebar '.$type_.'">';
    $out .=  ob_get_contents();
    $out .= '<div class="clearfix"></div></div>';
    ob_end_clean();
    return $out;
}
add_shortcode('sidebar', 'sidebar');


/* widget
================================================== */
function widget($atts, $content=null){
	extract(shortcode_atts( array( 
							'layout' => '4-column',
							'type' => 'portfolio',
							'category' => '',
							'title' => 'This is a title',
							'style' => '',
							'orderby' => '',
							'order' => '',
							), $atts ));
							
	$layout_ = '';
	$showposts = '';
	$style_ = '';
	$title_ = '';
	$category_filter = '';
	$out = '';
						
	if($layout == '3-column'){
		$layout_ = 'span4';
		$showposts = '3';
	}elseif($layout == '2-column'){
		$layout_ = 'span6';
		$showposts = '2';
	}elseif($layout == '6-column'){
		$layout_ = 'span2';
		$showposts = '6';
	}else{
		$layout_ = 'span3';
		$showposts = '4';
	}
	
	if($style == 'dark'){
		$style_ = 'news-widget-2';
	}
	if($title){
		$title_ = '<h2 class="title">'.$title.'</h2>';
	}
	$rand = rand(2, 999999);
	
	if($type=="portfolio"){
		$category_filter = '&portfolio_category='.$category;
	}else{
		$category_filter = '&category_name='.$category;
	}	
		
	$out .= '<div class="news-widget '.$style_.'"><div class="row-fluid heading">'.$title_;
	$out .= '</div><div class="Container"><div class="row-fluid">';
				$query = new WP_Query();
				$query->query('showposts='.$showposts.'&post_type='.$type.'&posts_per_page=-1'.$category_filter.'&orderby='.$orderby.'&order='.$order.'');
				if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
				$lightbox = get_post_meta(get_the_ID(), 'lightbox_value', true);
				$videoURL_raw = get_post_meta(get_the_ID(), 'video-url_value', true);
				$videoURL = theme_parse_video(get_post_meta(get_the_ID(), 'video-url_value', true));
				$linkURL = get_post_meta(get_the_ID(), 'link-url_value', true);
				$out .= '<div class="'.$layout_.' item"><div class="shadow-s3">';
						if ( $lightbox ) {
                            $out .= '<a rel="prettyPhoto[pp_gal-'.get_the_ID().''.$rand.']" class="effect-thumb" href="';
                            if ($videoURL) { 
                            	$out .= $videoURL_raw; 
                            }else{ 
	                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); 
	                            $out .= $image[0];
                            }
                            $out .= '" title="';
                            if ($videoURL) {
                            	$out .= get_the_title();
                            }else{
                            	$attachment = get_post(get_post_thumbnail_id( get_the_ID() ));
                            	$out .= $attachment->post_title;
                            }
                            $out .= '">';
                            	$out .= '<img alt="'.get_the_title().'" src="';
                            	$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'portfolio-post' ); 
                            	$out .= $image[0].'"/>';
                            	$out .= '<div class="icon zoom-in"></div>';
                            $out .= '</a>';
                            if (!$videoURL) { $thumbnail_id = get_post_thumbnail_id( get_the_ID() ); }
                            $args = array(
                            'numberposts' => 9999, // change this to a specific number of images to grab
                            'offset' => 0,
                            'post_parent' => get_the_ID(),
                            'post_type' => 'attachment',
                            'exclude'  => $thumbnail_id,
                            'nopaging' => false,
                            'post_mime_type' => 'image',
                            'order' => 'ASC', // change this to reverse the order
                            'orderby' => 'menu_order ID', // select which type of sorting
                            'post_status' => 'any'
                            );
                            $attachments =& get_children($args);
                            foreach($attachments as $attachment) {
                                $imageTitle = $attachment->post_title;
                                $imageDescription = $attachment->post_content;
                                $imageArrayFull = wp_get_attachment_image_src($attachment->ID, 'large', false);
                                $out .= '<a class="hide" rel="prettyPhoto[pp_gal-'.get_the_ID().''.$rand.']" href="'.$imageArrayFull[0].'" title="'.$imageTitle.'"></a>';
                            }
						} elseif ( $linkURL ) {
							if(has_post_thumbnail()) {
							$out .= '<a href="'.$linkURL.'" class="effect-thumb">';
								$out .= '<img alt="'.get_the_title().'" src="';
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'portfolio-post' );
								$out .= $image[0].'"/>';
								$out .= '<div class="icon link"></div>';
							$out .= '</a>';
							}else{
							$out .= '<a href="'.get_permalink().'" class="effect-thumb hidden-phone">';
								$out .= '<img alt="'.get_the_title().'" src="'.THEME_ASSETS.'img/placeholder-link.png"/>';
								$out .= '<div class="icon link"></div>';
							$out .= '</a>';
							}
                        } elseif ( $videoURL ) {
                            if(has_post_thumbnail()) {
							$out .= '<a href="'.get_permalink().'" class="effect-thumb">';
								$out .= '<img alt="'.get_the_title().'" src="';
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'portfolio-post' );
								$out .= $image[0].'"/>';
								$out .= '<div class="icon eye"></div>';
							$out .= '</a>';
                            }else{
							$out .= '<a href="'.get_permalink().'" class="effect-thumb hidden-phone">';
								$out .= '<img alt="'.get_the_title().'" src="'.THEME_ASSETS.'img/placeholder-camera.png"/>';
								$out .= '<div class="icon eye"></div>';
							$out .= '</a>';
                            }
                        } elseif ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
						$out .= '<a href="'.get_permalink().'" class="effect-thumb">';
							$out .= '<img alt="'.get_the_title().'" src="';
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'portfolio-post' );
							$out .= $image[0].'"/>';
							$out .= '<div class="icon eye"></div>';
						$out .= '</a>';
                        }else{
						$out .= '<a href="'.get_permalink().'" class="effect-thumb hidden-phone">';
							$out .= '<img alt="'.get_the_title().'" src="'.THEME_ASSETS.'img/placeholder-page.png"/>';
							$out .= '<div class="icon eye"></div>';
						$out .= '</a>';
                        }
						if ( $linkURL ) {
						$out .= '<h5 class="title"><a href="'.$linkURL.'">'.get_the_title().'</a></h5>';
						}else{
						$out .= '<h5 class="title"><a href="'.get_permalink().'">'.get_the_title().'</a></h5>';
						}
						$out .= '<div class="content">';
							$out .= '<p>'.excerpt_portfolio(15);
							if ( $linkURL ) {
							$out .= ' <a class="more-link" href="'.$linkURL.'">'.__( '[view more]', GETTEXT_DOMAIN).'</a></p>';
							}else{
							$out .= ' <a class="more-link" href="'.get_permalink().'">'.__( '[read more]', GETTEXT_DOMAIN).'</a></p>';
							}
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
				endwhile; endif; 
			$out .= '</div>';
		$out .= '</div>';
	$out .= '</div>';
													
	return $out;
}
add_shortcode('widget', 'widget');

/* clients
================================================== */
function clients($atts, $content=null){
	extract(shortcode_atts( array(
							'title' => 'This is a title',
							), $atts ));
	$out = "";
	$title_ = "";
							
	if($title){
		$title_ = '<div class="row-fluid heading"><div class="span12"><h2 class="title">'.$title.'</h2></div></div>';
	}
			
    $query = new WP_Query();
    $client_posts = $query->query('post_type=client&posts_per_page=-1');
    if($client_posts){
			$out .= '<div class="clients-widget">'.$title_;
				$out .= '<ul class="unstyled clearfix">';
					if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
					if(get_the_excerpt() == ""){
						$url = '#';
					}else{
						$url = get_the_excerpt();
					}
					$out .= '<li>';
					if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
						$out .= '<a href="'.$url.'" title="'.get_the_title().'" class="grayscale">';
	                        $out .= '<img alt="'.get_the_title().'" class="bw_Thumbnail" src="';
	                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'client-gray' );
	                        $out .= $image[0].'" />';
	                        $out .= '<img alt="'.get_the_title().'" class="Thumbnail" src="';
	                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'client' );
	                        $out .= $image[0].'" />';
						$out .= '</a>';
					} else {
                    	$out .= '<p style="color: #ed1c24;">'.__( 'Please add an image to "Featured Image" for client thumbnail.', GETTEXT_DOMAIN).'</p>';
                    }
					$out .= '</li>';
					endwhile; endif;
				$out .= '</ul>';
			$out .= '</div>';
	}else{
    	$out .= '<p style="color: #ed1c24;">'.__('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN).'</p>';
    }
									
	return $out;
}
add_shortcode('clients', 'clients');

/* title
================================================== */
function title($atts, $content=null){
	extract(shortcode_atts( array(), $atts ));
	
	$out .= '<div class="title-widget">';
		$out .= '<div class="row-fluid heading">';
			$out .= '<div class="span12">';
				$out .= '<h2 class="title">'.do_shortcode($content).'</h2>';
			$out .= '</div>';
		$out .= '</div>';
	$out .= '</div>';
	
	return $out;
}
add_shortcode('title', 'title');


/* video youtube or vimeo
================================================== */
function video($atts, $content=null){
global $woocommerce_loop;
	extract(shortcode_atts( array( 
							'video_url' => '',
							'shadow' => '',
							), $atts ));

	if($shadow==''){
		$shadow_s3 = 'shadow-s3';
	}
	
	$video = theme_parse_video($video_url);
	
	ob_start();
	
	if($video_url==""){?>
	
		<p><?php _e('Please enter a "video_url" value for "Video" shortcode.', GETTEXT_DOMAIN); ?></p>
	
	<?php }else{?>
	
		<iframe class="scale-with-grid <?php echo $shadow_s3 ?>" width="620" height="349" src="<?php echo $video ?>?wmode=transparent;showinfo=0" frameborder="0" allowfullscreen></iframe>
	
	<?php }
	
	return ob_get_clean();

}
add_shortcode('video', 'video');

/* shop tabs
================================================== */
function shop_tabs($atts, $content=null){
global $woocommerce_loop;
	extract(shortcode_atts( array( 
							'columns' => '4',
							'orderby' => 'date',
							'order' => 'desc',
							'include_id' => '',
							), $atts ));

	
	$rand = rand(2, 999999);
	
	$args = array( 'include' => $include_id ); 

	ob_start();
	
	
    $plugins = get_option('active_plugins');
    $required_plugin = 'woocommerce/woocommerce.php';
    if ( in_array( $required_plugin , $plugins ) ) {?>
	
	<div class="shop-tabs woocommerce tabbable tabs-top">
		<ul class="nav nav-tabs">
			<?php $terms = get_terms('product_cat', $args);?>
			<?php $i = 1;?>
			<?php foreach ($terms as $term) {?>
				<li class="<?php if ($i==1){ echo "active"; } ?>"><a href="#tab-<?php echo $term->term_id;?>-<?php echo $rand;?>" data-toggle="tab"><?php echo $term->name;?></a></li>
			<?php $i++; }?>
		</ul>
		<div class="tab-content">
			<?php $terms = get_terms('product_cat', $args);?>
			<?php $i = 1;?>
			<?php foreach ($terms as $term) {?>
				<div class="tab-pane <?php if ($i==1){ echo "active"; } ?>" id="tab-<?php echo $term->term_id;?>-<?php echo $rand;?>">
				<?php $args = array(
					'post_type'	=> 'product',
					'posts_per_page' => $columns,
					'orderby' => $orderby,
					'order' => $order,
					'product_cat' => $term->slug
				);
				
				$products = new WP_Query( $args );
				
				$woocommerce_loop['columns'] = $columns;
				
				if ( $products->have_posts() ) : ?>
				
				<ul class="products">
				
					<?php while ( $products->have_posts() ) : $products->the_post(); ?>
				
						<?php woocommerce_get_template_part( 'content', 'product' ); ?>
				
					<?php endwhile; // end of the loop. ?>
				
				</ul>
				
				<?php endif;
				
				wp_reset_query(); ?>
				</div>
			<?php $i++; }?>
		</div>
	</div><?php
	}else{
		?><p><?php _e('Sorry, shortcode is not available now, please activate WooCommerce plugin.', GETTEXT_DOMAIN); ?></p><?php
	}
	
	return ob_get_clean();

}
add_shortcode('shop-tabs', 'shop_tabs');

/* google map
================================================== */
function map($atts, $content=null){
	extract(shortcode_atts( array( 
		'latitude' => '51.507335',
		'longitude' => '-0.127683',
		'icon' => '',
		'zoom' => '13',
		'height_px' => '300'
		), $atts ));
							
	$rand = rand(2, 999999);
	ob_start();
	
	$height = "";
	
	if($height_px){
		$height = 'style="height: '.$height_px.'px"';
	}
	?>
	
    <div <?php echo $height;?> id="google-map-<?php echo $rand;?>" class="google-map"></div>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script>
        
        function initialize_<?php echo $rand;?>() {
        
        var map;
        var center = new google.maps.LatLng(<?php echo $latitude;?>,<?php echo $longitude;?>);
        
          var roadAtlasStyles = []
        
          var mapOptions = {
            zoom: <?php echo $zoom;?>,
            center: center,
			center: center,
			scrollwheel: false,
			panControl: false,
			zoomControl: true,
			mapTypeControl: false,
			scaleControl: false,
			streetViewControl: false,
			overviewMapControl: false,
            mapTypeControlOptions: {
               mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map']
            }
          };
        
          map = new google.maps.Map(document.getElementById("google-map-<?php echo $rand;?>"),
              mapOptions);
              
          var styledMapOptions = {
            name: "Map"
          };
        
          var usRoadMapType = new google.maps.StyledMapType(
              roadAtlasStyles, styledMapOptions);
        
          map.mapTypes.set('map', usRoadMapType);
          map.setMapTypeId('map');
          
            <?php if($icon){?>
            var image = '<?php echo $icon;?>';
            <?php }else{?>
            var image = '<?php echo get_template_directory_uri(); ?>/assets/Rocky_Vector_Set/32px/location-pin.png';
            <?php }?>
            
            var map_ = new google.maps.LatLng(<?php echo $latitude;?>,<?php echo $longitude;?>);
            var Marker = new google.maps.Marker({
                position: map_,
                map: map,
                icon: image
            });
        
        }
        
        $(document).ready(function(){
		
		    initialize_<?php echo $rand;?>();
		
		});
	
	</script>
    
	<?php return ob_get_clean();	
	
}
add_shortcode('map', 'map');


/*  team members
================================================== */
function team_members($atts, $content=null){
	extract(shortcode_atts( array( 
		'columns' => '4',
		'posts' => '',
		'title' => '',
		'id' => '',
		), $atts ));
		
	$post_per_page = '';
							
	if($posts){
		$post_per_page = $posts;
	}else{
		$post_per_page = '-1';
	}
	ob_start();?>
	
					<?php $query = new WP_Query();?>
				    <?php $about_posts = $query->query('post_type=about&posts_per_page='.$post_per_page.'&about_category='.$title.'&p='.$id.'');?>
				    <?php if($about_posts){?>
				    
				    <div class="about-post clearfix">
				    
				    <?php $loop = 1; $column = $columns;?>      
					<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();?>
					<?php $about_buttons = get_post_meta(get_the_ID(), 'about_buttons_value', true);?>
						
					<div class="
						<?php if($column=="1"){?>
						span12
						<?php }elseif($column=="2"){?>
						span6
						<?php }elseif($column=="3"){?>
						span4
						<?php }elseif($column=="4"){?>
						span3
						<?php }elseif($column=="6"){?>
						span2
						<?php }else{?>
						span4
						<?php }?>
						 member <?php if ( ( $loop - 1 ) % $column == 0 ) echo 'first'; ?>">
							
					    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {?>
					        <img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'shop' ); echo $image[0];?>"/>
					    <?php } else{?>
					        <img alt="<?php _e('No Picture', GETTEXT_DOMAIN); ?>" src="<?php echo THEME_ASSETS; ?>img/placeholder-user.png"/>
					    <?php }?>
					    
					    <div class="member-content">
					        <h4 class="name"><?php the_title(); ?></h4>
					        <span class="info">
					                <?php $terms = get_the_terms( get_the_ID(), 'about_category' );
					                if($terms) : foreach ($terms as $term) { echo ''.$term->name.' '; } endif; ?>
					        </span>
					        <p class="excerpt"><?php echo excerpt(20)?></p>
					        <?php if($about_buttons){ ?>
					        <div class="member-social">
					            
					            <?php $separator = "%%";
					            $output = '';
					            foreach ($about_buttons as $item) {
					                if($item){
					                    list($item_text1, $item_text2) = explode($separator, trim($item));
					                    $output .= '<a class="icon ' . $item_text1 . '" href="' . $item_text2 . '" title="' . $item_text1 . '">' . $item_text1 . '</a> ';
					                }
					            }
					            echo $output;?>
					            
					        </div>
					        <?php } ?>
					    </div>
						
			        </div>
								
			        <?php $loop++; endwhile; endif; ?>
			        
			        </div>

				    <?php }else{?>
				    	<p style="color: #ed1c24;"><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN); ?></p>
				    <?php }?>
    
	<?php return ob_get_clean();	
	
}
add_shortcode('team-members', 'team_members');


/*  team members
================================================== */
function portfolio($atts, $content=null){
	extract(shortcode_atts( array( 
		'columns' => '4',
		'posts' => '',
		'category' => '',
		'id' => '',
		), $atts ));
		
	$post_per_page = '';
							
	if($posts){
		$post_per_page = $posts;
	}else{
		$post_per_page = '-1';
	}
	ob_start();?>
	
				<?php $query = new WP_Query();?>
			    <?php $Portfolio = $query->query('post_type=portfolio&posts_per_page='.$post_per_page.'&portfolio_category='.$category.'&p='.$id.'');?>
			    <?php if($Portfolio){?>
	
				<div class="portfolio clearfix">

					<?php $loop = 1; $column = $columns;?>
					<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();?>
					
					<?php $lightbox = get_post_meta(get_the_ID(), 'lightbox_value', true);?>
					<?php $videoURL_raw = get_post_meta(get_the_ID(), 'video-url_value', true);?>
					<?php $videoURL = theme_parse_video(get_post_meta(get_the_ID(), 'video-url_value', true));?>
					<?php $linkURL = get_post_meta(get_the_ID(), 'link-url_value', true);?>
					<?php $full_width = get_post_meta(get_the_ID(), 'full-width_value', true);?>
					<?php $details = get_post_meta(get_the_ID(), 'details_value', true); if($details){$details = array_filter($details);};?>
			        <?php $terms = get_the_terms( get_the_ID(), 'portfolio_category' ); ?>
					<?php $share = get_post_meta(get_the_ID(), 'share_value', true);?>
					<?php $gallery_type = get_post_meta(get_the_ID(), 'gallery_type_value', true);?>
				
					<div class="<?php if ( ( $loop - 1 ) % $column == 0 ) echo 'first'; ?> element post portfolio 
						<?php if($column=="2"){?>
						span6
						<?php }elseif($column=="3"){?>
						span4
						<?php }elseif($column=="4"){?>
						span3
						<?php }elseif($column=="6"){?>
						span2
						<?php }else{?>
						span4
						<?php }?>
					 ">
						<div class="shadow-s3">
							<?php if ( $lightbox ) { ?>
								<?php if(has_post_thumbnail()) {?>
	                                <a rel="prettyPhoto[pp_gal-<?php echo get_the_ID() ?>]" class="effect-thumb" href="<?php if ($videoURL) { echo $videoURL_raw; }else{ $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); echo $image[0]; }?>" title="<?php if ($videoURL) { the_title(); }else{ $attachment = get_post(get_post_thumbnail_id( get_the_ID() )); echo $attachment->post_title;}?>">
	                                	<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'blog-style-1' ); echo $image[0];?>"/>
	                                	<div class="icon zoom-in"></div>
	                                </a>
	                                <?php if (!$videoURL) { $thumbnail_id = get_post_thumbnail_id( get_the_ID() ); }?>
	                                <?php $args = array(
	                                'numberposts' => 9999, // change this to a specific number of images to grab
	                                'offset' => 0,
	                                'post_parent' => get_the_ID(),
	                                'post_type' => 'attachment',
	                                'exclude'  => $thumbnail_id,
	                                'nopaging' => false,
	                                'post_mime_type' => 'image',
	                                'order' => 'ASC', // change this to reverse the order
	                                'orderby' => 'menu_order ID', // select which type of sorting
	                                'post_status' => 'any'
	                                );
	                                $attachments =& get_children($args);?>
	                                <?php foreach($attachments as $attachment) {
	                                    $imageTitle = $attachment->post_title;
	                                    $imageDescription = $attachment->post_content;
	                                    $imageArrayFull = wp_get_attachment_image_src($attachment->ID, 'full', false);?>
	                                    <a class="hide" rel="prettyPhoto[pp_gal-<?php echo get_the_ID() ?>]" href="<?php echo $imageArrayFull[0] ?>" title="<?php echo $imageTitle ?>"></a>
	                                <?php }?>
	                            <?php }else{?>
	                            <p style="color: #ed1c24; padding: 10px;"><?php _e( 'Please add an image to "Featured Image" for thumbnail.', GETTEXT_DOMAIN);?></p>
	                            <?php }?>
							<?php } elseif ( $linkURL ) { ?>
	                            <?php if(has_post_thumbnail()) {?>
									<a href="<?php echo $linkURL; ?>" class="effect-thumb">
										<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'blog-style-1' ); echo $image[0];?>"/>
										<div class="icon link"></div>
									</a>
	                            <?php }else{?>
	                            	<p style="color: #ed1c24; padding: 10px;"><?php _e( 'Please add an image to "Featured Image" for thumbnail.', GETTEXT_DOMAIN);?></p>
	                            <?php }?>
	                        <?php } elseif ( $videoURL ) { ?>
	                            <?php if(has_post_thumbnail()) {?>
								<a href="<?php the_permalink(); ?>" class="effect-thumb">
									<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'blog-style-1' ); echo $image[0];?>"/>
									<div class="icon eye"></div>
								</a>
	                            <?php }else{?>
	                            <p style="color: #ed1c24; padding: 10px;"><?php _e( 'Please add an image to "Featured Image" for video thumbnail.', GETTEXT_DOMAIN);?></p>
	                            <?php }?>
	                        <?php } elseif ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
							<a href="<?php the_permalink(); ?>" class="effect-thumb">
								<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'blog-style-1' ); echo $image[0];?>"/>
								<div class="icon eye"></div>
							</a>
	                        <?php }?>
							<div class="content">
								<?php if ( $linkURL ) { ?>
								<h4 class="title"><a href="<?php echo $linkURL; ?>"><?php the_title(); ?></a></h4>
								<?php }else{?>
								<h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<?php }?>
								<div class="column">
									<div class="post_content">
										<p><?php echo excerpt_portfolio(25)?> 
										<?php if ( $linkURL ) { ?>
										<a class="more-link" href="<?php echo $linkURL; ?>">[read more]</a></p>
										<?php }else{?>
										<a class="more-link" href="<?php the_permalink(); ?>">[read more]</a></p>
										<?php }?>
									</div>
								</div>
								<div class="portfolio-categories">
									<?php $resultstr = array(); ?>
	                                <?php if($terms) : foreach ($terms as $term) { ?>
	                                    <?php $resultstr[] = '<a title="'.$term->name.'" href="'.get_term_link($term->slug, 'portfolio_category').'">'.$term->name.'</a>'?>
	                                <?php } ?>
	                                <?php echo implode(", ",$resultstr); endif;?>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					
					<?php $loop++; endwhile; endif; ?>
					
				</div>
				
			    <?php }else{?>
			    	<p style="color: #ed1c24;"><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN); ?></p>
			    <?php }?>
				
				
    
	<?php return ob_get_clean();	
	
}
add_shortcode('portfolio', 'portfolio');


?>
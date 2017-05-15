<?php 
/**
 *DesignWall shortcodes grid
 *@package DesignWall Shorcodes
 *@since 1.0
*/

/**
 * Button
 */
function dws_buttons($params, $content = null){
	extract(shortcode_atts(array(
		'size' => 'default',
		'type' => 'default',
		'value' => 'button',
		'icon' => '',
		'href' => "#"
	), $params));

	$icon_ = '';
	$icon_1 = '';

	if($icon){
		$icon_ = '<span class="icon1-'.$icon.'"></span>';
		$icon_1 = 'icon';
	}
	
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<a class="btn btn-'.$size.' btn-'.$type.' '.$icon_1.'" href="'.$href.'">'.$icon_.''.$value.'</a>';
	return force_balance_tags( $result );
}
add_shortcode('button', 'dws_buttons');

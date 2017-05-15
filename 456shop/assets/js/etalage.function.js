/*global $:false, jQuery:false */

jQuery(document).ready(function() {
	"use strict";	
    etalage();
});

function etalage(){
	"use strict";
	
	var elem = $(".product-post");
	
	if (elem.hasClass("span10")) {
	
    $('#etalage').etalage({
	autoplay: false,
    show_hint: false,
    thumb_image_width: 366,
    thumb_image_height: 366,
    zoom_area_width: 380,
    zoom_area_height: 380,
    source_image_width: 1000,
    source_image_height: 1000
    });
    
    $('#etalage2').etalage({
	autoplay: false,
    show_hint: false,
    thumb_image_width: 456,
    thumb_image_height: 456,
    zoom_area_width: 470,
    zoom_area_height: 470,
    source_image_width: 1000,
    source_image_height: 1000
    });
    
	$('#etalage1').etalage({
	autoplay: false,
    show_hint: false,
    thumb_image_width: 276,
    thumb_image_height: 276,
	zoom_element: '#zoom',
	magnifier_opacity: 1
	});
		
	}else{
	
    $('#etalage').etalage({
	autoplay: false,
    show_hint: false,
    thumb_image_width: 446,
    thumb_image_height: 446,
    zoom_area_width: 460,
    zoom_area_height: 460,
    source_image_width: 1000,
    source_image_height: 1000
    });
    
    $('#etalage2').etalage({
	autoplay: false,
    show_hint: false,
    thumb_image_width: 556,
    thumb_image_height: 556,
    zoom_area_width: 570,
    zoom_area_height: 570,
    source_image_width: 1000,
    source_image_height: 1000
    });
    
	$('#etalage1').etalage({
	autoplay: false,
    show_hint: false,
    thumb_image_width: 338,
    thumb_image_height: 338,
	zoom_element: '#zoom',
	magnifier_opacity: 1
	});
	
	}

}
			
// Invoke the Fancybox plugin when an image is clicked
function etalage_click_callback(image_anchor){
	"use strict";
	$.fancybox({
		href: image_anchor
	});
}
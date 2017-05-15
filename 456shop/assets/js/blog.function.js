/*global $:false, jQuery:false */
jQuery(document).ready(function() {
	"use strict";	
    commentButton();
    tag_cloud();
});
function commentButton() {
	"use strict";
	$("#searchform #searchsubmit").addClass("btn btn-primary");
    $('.widget_product_search').children().children('div').addClass("input-append");
    $('.widget_product_search #s').addClass("span8");
    $('.widget_search').children().children('div').addClass("input-append");
    $('.widget_search #s').addClass("span8");
    $('.widget_layered_nav #dropdown_layered_nav_black').addClass("span12");
    $('.widget_login #user_login').addClass("span12");
    $('.widget_login #user_pass').addClass("span12");
	$(".form-submit #submit").addClass("btn btn-primary");
	$(".blog .post:last").css({borderBottom: 'none'});
	$(".page-template-template-blog-fullwidth-php .post:first").css({borderTop: 'none', paddingTop: 0});
	$(".blog .post:first").css({borderTop: 'none', paddingTop: 0});
	$(".wpcf7 .wpcf7-submit").addClass("btn-primary").addClass("btn");
}
function tag_cloud(){
	"use strict";
    $('.tagcloud a').prepend('+ ');
}
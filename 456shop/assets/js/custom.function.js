/*global $:false, jQuery:false */
jQuery(document).ready(function() {
	"use strict";		
    calloutButton();
    callout2Button();
    calloutMailchimp();
    callout2Mailchimp();
    cart_list();
    inputFocus();
    shopThumbnail();
	wp_gallery();
	productCategoryWidget();
});

function calloutButton() { 
	"use strict";
    $(".callout").each(function() {
    
    var moduleHeight = $(this).find('.button').prev('.content').height();
    var bnHeight = $(this).find('.button .btn').outerHeight();
    var Height = moduleHeight-20-bnHeight;
    
    $(this).find(".button").css({height: moduleHeight-20, paddingTop: Height/2});
	
	});

}
function callout2Button() {
	"use strict";
    $(".callout-2").each(function() {
    
    var moduleHeight = $(this).find('.button').prev('.content').height();
    var bnHeight = $(this).find('.button .btn').outerHeight();
    var Height = moduleHeight-bnHeight;
    
    $(this).find(".button").css({height: moduleHeight, paddingTop: Height/2});
	
	});

}
function calloutMailchimp() { 
	"use strict";
    $(".callout").each(function() {
    
    var moduleHeight = $(this).find('.newsletter').prev('.content').height();
    var bnHeight = $(this).find('.newsletter .pmc_mailchimp').outerHeight();
    var Height = moduleHeight-20-bnHeight;
    
    $(this).find(".newsletter").css({height: moduleHeight-20, paddingTop: Height/2+5});
	
	});

}
function callout2Mailchimp() {
	"use strict";
    $(".callout-2").each(function() {
    
    var moduleHeight = $(this).find('.newsletter').prev('.content').height();
    var bnHeight = $(this).find('.newsletter .pmc_mailchimp').outerHeight();
    var Height = moduleHeight-bnHeight;
    
    if(moduleHeight < bnHeight){
	$(this).find(".newsletter").addClass('test').css({paddingTop: 10}); 
    }else{
	$(this).find(".newsletter").css({height: moduleHeight, paddingTop: Height/2+5});  
    }

	});

}
function cart_list() {
	"use strict";
	$(".cart_list li").each(function() {
		$(this).find(".variation").next().andSelf().wrapAll('<div class="meta-wrap" />');
	});
}
function inputFocus() {
	"use strict";
	// clear input on focus
	$('.wpcf7-text').focus(function(){
		if($(this).val()===this.defaultValue){
			$(this).val('');
		}
	});
	
	// if field is empty afterward, add text again
	$('.wpcf7-text').blur(function(){
		if($(this).val()===''){
			$(this).val(this.defaultValue);
		}
	});
	// clear input on focus
	$('.form-456 .form-search input').focus(function(){
		if($(this).val()===this.defaultValue){
			$(this).val('');
		}
	});
	
	// if field is empty afterward, add text again
	$('.form-456 .form-search input').blur(function(){
		if($(this).val()===''){
			$(this).val(this.defaultValue);
		}
	});
}
function shopThumbnail() {
	"use strict";
    $('<div class="clearfix"></div>').insertAfter(".thumbnails .zoom:nth-child(4n)");
}
function wp_gallery() {
	"use strict";
    $(".gallery-item .gallery-icon a").each(function() {
    
	$(this).addClass("thumbnail");
	
	});
}

function productCategoryWidget() {
	"use strict";
    $('.widget_product_categories ul ul').hide().click(function(e) {
        e.stopPropagation();
    });
 
    $('.widget_product_categories ul > li > ul.children').before('<span class="toggle">[+]</span>');
 
    var current_cat = $('.widget_product_categories ul > li.current-cat, .widget_product_categories ul > li.current-cat-parent');
    
    current_cat.children('.toggle').html("[-]");
    current_cat.children('ul').slideDown().addClass('opened');
    
    
    $('.widget_product_categories ul > li > ul.children').each(function() {
        $(this).parent().children('.toggle').toggle(function() {
			if($(this).parent().children('ul').hasClass('opened')){
			$(this).html("[+]");
			$(this).parent().children('ul').slideUp();
			$(this).parent().children('ul').removeClass('opened').addClass('closed');
			}else{
			$(this).html("[-]");
			$(this).parent().children('ul').slideDown();
			$(this).parent().children('ul').removeClass('closed').addClass('opened');
			}
        }, function() {
			if($(this).parent().children('ul').hasClass('closed')){
			$(this).html("[-]");
			$(this).parent().children('ul').slideDown();
			$(this).parent().children('ul').removeClass('closed').addClass('opened');
			}else{
			$(this).html("[+]");
			$(this).parent().children('ul').slideUp();
			$(this).parent().children('ul').removeClass('opened').addClass('closed');
		}
        });    
    });
}
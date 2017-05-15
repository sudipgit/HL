/*global $:false, jQuery:false */

jQuery(document).ready(function() {
	"use strict";	
    scaleWithGrid();
    scaleWithGridFront();
});


function scaleWithGrid() {
	"use strict";
	var $iframe = $("iframe.scale-with-grid"),
	$fluid = $("iframe.scale-with-grid").parent();

	$iframe.each(function() {
		$(this)
			.data('aspectRatio', this.height / this.width)
			.removeAttr('height')
			.removeAttr('width');
	});

	$(window).resize(function() {
		var newWidth = $fluid.width();
		$iframe.each(function() {
			var $el = $(this);
			$el.width(newWidth).height(newWidth * $el.data('aspectRatio'));
		});
	}).resize();

}
function scaleWithGridFront() {
	"use strict";
	var $iframe = $("iframe.scale-with-grid-front"),
	$fluid = $("iframe.scale-with-grid-front").parent();

	$iframe.each(function() {
		$(this)
			.data('aspectRatio', this.height / this.width)
			.removeAttr('height')
			.removeAttr('width');
	});

	$(window).resize(function() {
		var newWidth = $fluid.width();
		$iframe.each(function() {
			var $el = $(this);
			$el.width(newWidth).height(newWidth * $el.data('aspectRatio'));
		});
	}).resize();

}
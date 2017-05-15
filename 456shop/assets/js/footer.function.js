/*global $:false, jQuery:false */

jQuery(document).ready(function() {
	"use strict";
    footerClear();
});

function footerClear() {
	"use strict";
	$('<div class="clearfix"></div>').insertAfter(".columns-2 .one-column:nth-child(2n)");
    $('<div class="clearfix"></div>').insertAfter(".columns-3 .one-column:nth-child(3n)");
    $('<div class="clearfix"></div>').insertAfter(".columns-4 .one-column:nth-child(4n)");
}
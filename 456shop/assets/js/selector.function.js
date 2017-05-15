/*global $:false, jQuery:false */

jQuery(document).ready(function() {
	"use strict";	
    portfolio();
});

function portfolio() {

"use strict";
$(".portfolio-2 .element:nth-child(2n+1)").addClass('alpha').css({"margin-left":"0"});
$(".portfolio-3 .element:nth-child(3n+1)").addClass('alpha').css({"margin-left":"0"});
$(".portfolio-4 .element:nth-child(4n+1)").addClass('alpha').css({"margin-left":"0"});
$(".columns-2 .one-column:nth-child(2n+1)").addClass('alpha').css({"margin-left":"0"});
$(".columns-3 .one-column:nth-child(3n+1)").addClass('alpha').css({"margin-left":"0"});
$(".columns-4 .one-column:nth-child(4n+1)").addClass('alpha').css({"margin-left":"0"});

}
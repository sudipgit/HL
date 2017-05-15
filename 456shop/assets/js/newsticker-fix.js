/*global $:false*/

$(document).ready( function(){
	"use strict";
	$(".newsticker").css("visibility", "hidden");
    var to=setTimeout("showNewsticker()",500);        
});

function showNewsticker(){
	"use strict";
    $(".newsticker").css("visibility", "visible");
}
jQuery(document).ready(function() {	
    
    addAlpha();
    megaDDClear();
});


function addAlpha() {
	
	    $('.dropdown-menu section.menu-item:nth-child(3n+1)').addClass("alpha");

}


function megaDDClear() {

	if ( $(window).width() < 767) {
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-1 section:nth-child(2n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-2 section:nth-child(2n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-3 section:nth-child(2n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-4 section:nth-child(2n)");
	}
	else if ( $(window).width() < 960) {
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-1 section:nth-child(3n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-2 section:nth-child(3n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-3 section:nth-child(3n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-4 section:nth-child(3n)");
	}
	else {
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-1 section:nth-child(1n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-2 section:nth-child(2n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-3 section:nth-child(3n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-4 section:nth-child(4n)");
	}


$(window).resize(function(){

	if ( $(window).width() < 767) {
		$('.dropdown-menu').find('.fluid').remove();
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-1 section:nth-child(2n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-2 section:nth-child(2n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-3 section:nth-child(2n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-4 section:nth-child(2n)");
	}
	else if ( $(window).width() < 960) {
		$('.dropdown-menu').find('.fluid').remove();
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-1 section:nth-child(3n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-2 section:nth-child(3n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-3 section:nth-child(3n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-4 section:nth-child(3n)");
	}
	else {
		$('.dropdown-menu').find('.fluid').remove();
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-1 section:nth-child(1n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-2 section:nth-child(2n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-3 section:nth-child(3n)");
	    $('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-4 section:nth-child(4n)");
	}

});

	
}
	$("li.pull-right").removeClass("pull-right").find(".dropdown-menu:first").addClass("pull-right");
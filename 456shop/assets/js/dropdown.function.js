/*global $:false */	
	if ( $(window).width() > 960) {
		$('#menu-navi .dropdown-toggle').addClass('disabled');
		$('.navbar .dropdown').hover(function() {
            "use strict";
			$(this).addClass('open').find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
		}, function() {
            "use strict";
            var na = $(this);
			na.find('.dropdown-menu').first().stop(true, true).delay(100).slideUp('fast', function(){ na.removeClass('open'); });
		});
		$('.Cart .btn-group').hover(function() {
            "use strict";
			$(this).addClass('open').find('.dropdown-menu').first().stop(true, true).delay(100).slideDown();
		}, function() {
            "use strict";
            var na = $(this);
			na.find('.dropdown-menu').first().stop(true, true).delay(100).slideUp('fast', function(){ na.removeClass('open'); });
		});
	}
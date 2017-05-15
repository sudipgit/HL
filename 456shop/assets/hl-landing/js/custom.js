/*jslint browser: true*/
/*global $, jQuery, Modernizr, google, _gat*/
/*jshint strict: true */





/*************** GOOGLE ANALYTICS ***********/
/*************** REPLACE WITH YOUR OWN UA NUMBER ***********/
window.onload = function () { "use strict"; gaSSDSLoad("UA-XXXX"); }; //load after page onload
/*************** REPLACE WITH YOUR OWN UA NUMBER ***********/

var isMobile = false;
var isDesktop = false;


$(window).on("load resize",function(e){

		
		
		//mobile detection
		if(Modernizr.mq('only all and (max-width: 767px)') ) {
			isMobile = true;
		}else{
			isMobile = false;
		}


		//tablette and mobile detection
		if(Modernizr.mq('only all and (max-width: 1024px)') ) {
			isDesktop = false;
		}else{
			isDesktop = true;
		}

        toTop(isMobile);
});

//RESIZE EVENTS
$(window).resize(function () { 

	Modernizr.addTest('ipad', function () {
		return !!navigator.userAgent.match(/iPad/i);
	});
	
	if (!Modernizr.ipad) {  
	initializeMainMenu(); 
	}
});

/*
|--------------------------------------------------------------------------
| DOCUMENT READY
|--------------------------------------------------------------------------
*/  
$(document).ready(function() {


	"use strict";

	/** INIT FUNCTIONS **/
	initializeMainMenu();
	/*moreLinkMosaicPorfolio('<h2>More projects</h2>', 'portfolio-3columns.html', 'star');*/

     /*
    |--------------------------------------------------------------------------
    |  fullwidth image a video
    |--------------------------------------------------------------------------
    */

    function fullscreenWrapper() {   
      $('.fullscreenSection').css({height:$(window).height()-$('#mainHeader').height()});
      $('.fullscreenSection').css({width:$(window).width()});


    }

    $(window).on("resize",function(e){
        /*image*/
        if ($('.fullscreenSection').length)
        {
            fullscreenWrapper();
        }
    });
    
    if ($('.fullscreenSection').length)
    {
        fullscreenWrapper();
    }



 	/*
    |--------------------------------------------------------------------------
    |  Header
    |--------------------------------------------------------------------------
    */

    $("#mainHeader").sticky({ topSpacing: 0 });

    /*
    |--------------------------------------------------------------------------
    | SCROLL NAV
    |--------------------------------------------------------------------------
    */ 
   	if($('.scrollMenu').length || $('.scrollLink').length){

   		$('#globalWrapper').on( 'click', '#mainHeader .nav li a, .scrollLink',function(event) {
   			
   			var $anchor = $(this),
   			content      = $anchor.attr('href'),
		    checkURL     = content.match(/^#([^\/]+)$/i);


   			if(checkURL){
   				event.preventDefault();
   				var Hheight     = ($('.navbar-header').css('text-align') == 'center')?$('.scrollMenu').height():$('.navbar-header').height(),
   				computedOffset = $($anchor.attr('href')).offset().top - parseInt(Hheight) + parseInt($($anchor.attr('href')).css('padding-top'));

   				$('html, body').stop().animate({
   					scrollTop : computedOffset + "px"
   				}, 1200, 'easeInOutExpo');
   			}
   		});
   	}
  

	 /*
    |--------------------------------------------------------------------------
    |  form placeholder for IE
    |--------------------------------------------------------------------------
    */
    if(!Modernizr.input.placeholder){

    	$('[placeholder]').focus(function() {
    		var input = $(this);
    		if (input.val() == input.attr('placeholder')) {
    			input.val('');
    			input.removeClass('placeholder');
    		}
    	}).blur(function() {
    		var input = $(this);
    		if (input.val() == '' || input.val() == input.attr('placeholder')) {
    			input.addClass('placeholder');
    			input.val(input.attr('placeholder'));
    		}
    	}).blur();
    	$('[placeholder]').parents('form').submit(function() {
    		$(this).find('[placeholder]').each(function() {
    			var input = $(this);
    			if (input.val() == input.attr('placeholder')) {
    				input.val('');
    			}
    		})
    	});

    }	

    /*
    |--------------------------------------------------------------------------
    | MAGNIFIC POPUP
    |--------------------------------------------------------------------------
    */


    if( $("a.image-link").length){

    	$("a.image-link").click(function (e) {

    		var items = [];

    		items.push( { src: $(this).attr('href')  } );
    		
    		if($(this).data('gallery')){

    			var $arraySrc = $(this).data('gallery').split(',');

    			$.each( $arraySrc, function( i, v ){
    				items.push( {
    					src: v 
    				});
    			});     
    		}

    		

    		$.magnificPopup.open({
    			type:'image',
    			mainClass: 'mfp-fade',
    			items:items,
    			gallery: {
    				enabled: true 
    			}
    		});

    		e.preventDefault();
    	});

    }



    if( $("a.image-iframe").length){
    	$('a.image-iframe').magnificPopup({type:'iframe',mainClass: 'mfp-fade'});
    }


    if( $("a.mozgallery").length){

    	$('.portfolioMosaic').magnificPopup({
    		delegate: 'a.mozgallery',
    		type: 'image',
    		tLoading: 'Loading image #%curr%...',
    		mainClass: 'mfp-img-mobile',
    		gallery: {
    			enabled: true,
    			navigateByImgClick: true,
    			preload: [0,1] 
    		},
    		image: {
    			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
    			titleSrc: function(item) {
    				return item.el.attr('title') + '<small>by Little Neko</small>';
    			}
    		}
    	});
    }
    
    /*
    |--------------------------------------------------------------------------
    | TOOLTIP
    |--------------------------------------------------------------------------
    */

    $('.tips').tooltip({placement:'auto'});

    
    
    /*
    |--------------------------------------------------------------------------
    | COLLAPSE
    |--------------------------------------------------------------------------
    */

    // $('.accordion').on('show hide', function(e){
    // 	$('.accordion-toggle').removeClass('active');
    // 	$(e.target).siblings('.accordion-heading').find('.accordion-toggle').addClass('active');
    // 	$(e.target).siblings('.accordion-heading').find('.accordion-toggle i').toggleClass('icon-plus icon-minus', 200);

    // });

    /*
    |--------------------------------------------------------------------------
    | CONTACT
    |--------------------------------------------------------------------------
    */   
    $('.slideContact').click(function(e){

    	if ( $(window).width() >= 800){

    		$('#contact').slideToggle('normal', 'easeInQuad',function(){

    			$('#contactinfoWrapper').css('margin-left', 0);
    			$('#mapSlideWrapper').css('margin-left', 3000);
    			$('#contactinfoWrapper').fadeToggle();


    		});
    		$('#closeContact').fadeToggle(); 
    		return false;

    	}else{

    		return true;

    	}
    	e.preventDefault();
    });
    
    
    $('#closeContact').click(function(e){


    	$('#contactinfoWrapper').fadeOut('normal', 'easeInQuad',function(){
    		$('#contactinfoWrapper').css('margin-left', 0);
    		$('#mapSlideWrapper').css('margin-left', 3000);
    	});

    	$('#contact').slideUp('normal', 'easeOutQuad');

    	$(this).fadeOut();

    	e.preventDefault();

    });
    

    
    /* MAP */
    $('#mapTrigger').click(function(e){


    	$('#mapSlideWrapper').css('display', 'block');
    	initialize('mapWrapper');

    	$('#contactinfoWrapper, #contactinfoWrapperPage').animate({
    		marginLeft:'-2000px' 
    	}, 400, function() {}); 


    	$('#mapSlideWrapper').animate({
    		marginLeft:'25px' 
    	}, 400, function() {});  

    	appendBootstrap();

    	e.preventDefault();
    });



    appendBootstrap();
    
    
    
    $('#mapTriggerLoader').click(function(e){


    	$('#mapSlide').css('display', 'block');

    	$('#contactSlide').animate({
    		marginLeft:'-2000px' 
    	}, 400, function() {}); 


    	$('#mapSlide').animate({
    		marginLeft:'0' 
    	}, 400, function() {
    		$('#contactSlide').css('display', 'none');
    	});  


    	appendBootstrap();

    	e.preventDefault();
    });
    
    
    $('#mapReturn').click(function(e){
        //$('#mapWrapper').css('margin-bottom', '3em');
        
        $('#contactSlide').css('display', 'block');
        $('#mapSlide').animate({
        	marginLeft:'3000px' 
        }, 400, function() {});       
        

        $('#contactSlide').animate({
        	marginLeft:'0' 
        }, 400, function() {
        	$('#mapSlide').css('display', 'none');
        }); 

        e.preventDefault();
    }); 

    /*
    |--------------------------------------------------------------------------
    | OWL CAROUSEL
    |--------------------------------------------------------------------------
    */

    if($('.nekoDataOwl').length){

        $( '.nekoDataOwl' ).each(function( index ) {
        	generateOwlC($(this), $(this).data('neko_items'), $(this).data('neko_navigation'), $(this).data('neko_singleitem'), $(this).data('neko_autoplay'), $(this).data('neko_itemsscaleup'), $(this).data('neko_pagination'), $(this).data('neko_paginationnumbers'), $(this).data('neko_autoheight'), $(this).data('neko_mousedrag'), $(this).data('neko_transitionstyle'), true);
        });

    }



    
   
    /*
    |--------------------------------------------------------------------------
    | CAMERA SLIDER
    |--------------------------------------------------------------------------
    */ 
    if($('.camera_wrap').length){

    	jQuery('.camera_wrap').camera({
    		thumbnails: true,
    		pagination: true,
            playPause: false,
    		height:'50%',
    		fx:'simpleFade'
    	});

    }

    if($('.camera_wrap_nonav').length){

    	jQuery('.camera_wrap_nonav').camera({
    		pagination: false,
    		thumbnails: true,
    		height:'70%'
    	});

    }  
    if($('.camera_wrap_nothumb').length){

    	jQuery('.camera_wrap_nothumb').camera({
    		pagination: true,
    		thumbnails: false,
    		height:'40%'
    	});

    }  

    /*
    |--------------------------------------------------------------------------
    | ROLLOVER BTN
    |--------------------------------------------------------------------------
    */ 

    if($('.imgHover').length){

    	if(!Modernizr.csstransitions && !Modernizr.touch){

    	$('.imgHover figure').addClass('noCss3');
    	$('.imgHover figure').hover(
    			function() {

    				// $('img', this).stop(true, false).animate({
    				// 	bottom: '+=40px'
    				// }, 400, 'easeOutQuad',function() {}).end();

  					var captionHeight = $('figcaption', this).outerHeight(true);

    				$('figcaption', this).stop(true, false).animate({
  
    					bottom: captionHeight,
    					opacity:1
    					
    				}, 400, 'easeOutQuad',function() {}).end();

    			}, function() {

    				// $('img', this).stop(true, false).animate({
    				// 	bottom: '0'
    				// }, 400, 'easeOutQuad',function() {}).end();

     				$('figcaption', this).stop(true, false).animate({
    					bottom: 0,
    					opacity:0
    				}, 400, 'easeOutQuad',function() {}).end();				

    			}
    		);
    	}

    }


    /*
    |--------------------------------------------------------------------------
    | ROLLOVER BTN
    |--------------------------------------------------------------------------
    */ 

    $('.socialIcon').hover(
    	function () {
    		$(this).stop(true, true).addClass('socialHoverClass', 300);
    	},
    	function () {
    		$(this).removeClass('socialHoverClass', 300);
    });


    $('.tabs li, .accordion h2').hover(
    	function () {
    		$(this).stop(true, true).addClass('speBtnHover', 300);
    	},
    	function () {
    		$(this).stop(true, true).removeClass('speBtnHover', 100);
    });



    /*
    |--------------------------------------------------------------------------
    | ALERT
    |--------------------------------------------------------------------------
    */ 
    $('.alert').delegate('button', 'click', function() {
    	$(this).parent().fadeOut('fast');
    });
    
    
    /*
    |--------------------------------------------------------------------------
    | CLIENT
    |--------------------------------------------------------------------------
    */   
    
    if($('.colorHover').length){
    	var array =[];
    	$('.colorHover').hover(

    		function () {

    			array[0] = $(this).attr('src');
    			$(this).attr('src', $(this).attr('src').replace('-off', ''));

    		}, 

    		function () {

    			$(this).attr('src', array[0]);

    		});
    }



    /*
    |--------------------------------------------------------------------------
    | Rollover boxIcon
    |--------------------------------------------------------------------------
    */ 
    if($('.boxIcon').length){

    	$('.boxIcon').hover(function() {
    		var $this = $(this);

    		$this.css('opacity', '1');   
            //$this.find('.boxContent>p').stop(true, false).css('opacity', 0);
            $this.addClass('hover');
            $('.boxContent>p').css('bottom', '-50px');
            $this.find('.boxContent>p').stop(true, false).css('display', 'block');

            $this.find('.iconWrapper i').addClass('triggeredHover');    

            $this.find('.boxContent>p').stop(true, false).animate({
            	'margin-top': '0px'},
            	300, function() {
            // stuff to do after animation is complete
        });


        }, function() {
        	var $this = $(this);
        	$this.removeClass('hover');

        	$this.find('.boxContent>p').stop(true, false).css('display', 'none');
        	$this.find('.boxContent>p').css('margin-top', '250px');
        	$this.find('.iconWrapper i').removeClass('triggeredHover'); 


        });   
    }   


/*
|--------------------------------------------------------------------------
| SHARRRE
|--------------------------------------------------------------------------
*/

/* Theme styled sharrre btn */
if($('#shareme').length){
	activateShare($('#shareme'));
} 

/* classical sharrre btn */
if($('#shareme-classic').length){

    $('#shareme-classic').sharrre({

        share: {
            googlePlus: true,
            facebook: true,
            twitter: true,
            linkedin: true
        },

        buttons: {
            googlePlus: {size: 'tall', annotation:'bubble'},
            facebook: {layout: 'box_count'},
            twitter: {count: 'vertical'},
            linkedin: {counter: 'top'}
        },
        urlCurl:'js-plugin/jquery.sharrre-1.3.4/sharrre.php',
        enableHover: false,
        enableCounter: false,
        enableTracking: true,
      	//url:'document.location.href'
  });
} 

/* classical sharrre btn */
if($('#sharemeBtn').length){
	$('#sharemeBtn').sharrre({
		share: {
			twitter: true,
			facebook: true
		},
		template: '<div class="box"><a href="#" class="btn btn-lg btnFacebook"><i class="icon-glyph-320"></i>Share me</a><a href="#" class="btn btn-lg btnTwitter"><i class="icon-glyph-339"></i>Share me</a></div>',
		enableHover: false,
		enableTracking: true,
		urlCurl:'js-plugin/jquery.sharrre-1.3.4/sharrre.php',
		render: function(api, options){
			$(api.element).on('click', '.btnTwitter', function() {
				api.openPopup('twitter');
			});
			$(api.element).on('click', '.btnFacebook', function() {
				api.openPopup('facebook');
			});

		}
	});
} 


/*
|--------------------------------------------------------------------------
| ROLL OVER PreviewTrigger
|--------------------------------------------------------------------------
*/
if($('.previewTrigger').length){

	$('.mask').css('height', $('.previewTrigger').height());
	$('.mask').css('width', $('.previewTrigger').width());
    // $('.mask', this).css('top', $('.previewTrigger', this).width());
    // $('.mask', this).css('left', $('.previewTrigger', this).width());

    $('.previewTrigger').hover(function() {

    	var $this = $(this);

    	$this.children('.mask').fadeIn('fast');

    	if(Modernizr.csstransitions) {
    		$('.iconWrapper', $this).addClass('animated');
    		$('.iconWrapper', $this).css('display', 'block');
    		$('.iconWrapper', $this).removeClass('flipOutX'); 
    		$('.iconWrapper', $this).addClass('bounceInDown'); 
    	}else{
    		$('.iconWrapper', $this).stop(true, false).fadeIn('fast');
    	}

    }, function() {

    	var $this = $(this); 

    	$this.children('.mask').fadeOut('fast');

    	if(Modernizr.csstransitions) {
    		$('.iconWrapper', $this).removeClass('bounceInDown'); 
    		$('.iconWrapper', $this).addClass('flipOutX');
    		$('.iconWrapper', $this).css('display', 'none');
    		$('.iconWrapper', $this).removeClass('animated');
    	}else{
    		$('.iconWrapper', $this).stop(true, false).fadeOut('fast');
    	}

    });
}





/*
|--------------------------------------------------------------------------
| PORTFOLIO SHEET SYSTEM
|--------------------------------------------------------------------------
*/
// OPEN SLIDE

if($('.ajaxPortfolio')){
	var Wwidth = $(window).width();
	/* Prepende result div */
	$('.ajaxPortfolio').prepend('<div id="PresultWrapper"><div id="portfolioResult"></div></div>');

	/* Load content into prepended div */
	$('.ajaxPortfolio').on('click', 'a.pItemLink', function(e, data) {

		e.preventDefault();
		var $this = $(this),
		animationProperties = {},
		animationPropertiesR = {};

		if(Wwidth <= 1024 ){ //portfolioResult

			animationProperties['opacity']=0;
			animationPropertiesR['opacity']=1;


		}else{
			if(data != undefined){

				if(data.direction == 'left'){
					animationProperties['marginLeft']=-parseInt($(window).width()+$('#portfolioResult').width())+'px';
					animationPropertiesR['marginLeft']=0;
				}else{
					animationProperties['marginRight']=-parseInt($(window).width()+$('#portfolioResult').width())+'px';
					animationPropertiesR['marginRight']=0;
				}
			}else{

				// animationProperties['marginLeft']=-parseInt($(window).width()+$('#portfolioResult').width())+'px';
				// animationPropertiesR['marginLeft']=0;

				animationProperties['opacity']=0;
				animationPropertiesR['opacity']=1;
			}
		}

		

		/* Act on the event */
		$('#portfolioResult').unload();
		$('#portfolioResult').animate(animationProperties, 400, 'easeInOutExpo', function() { 


			$('#portfolioResult').load($this.attr('href'), function() {

				$('#PresultWrapper').slideDown(600,'easeInOutExpo');

				var Hheight = ($('.navbar-header').css('text-align') == 'center')?$('.scrollMenu').height():$('.navbar-header').height(),
				rightOffset = $('#portfolioResult').offset().top - parseInt(Hheight) + parseInt($('#portfolioResult').css('padding-top')),
				linkPrev    = $this.parents('article').prev('article').find('figure figcaption a.pItemLink').attr('href'), 
				linkNext    = $this.parents('article').next('article').find('figure figcaption a.pItemLink').attr('href'), 
				currentPos = $this.parents('article').index() - 1,
				prevPos = parseInt(currentPos-1),
				nextPos = parseInt(currentPos+1),
				totalArticle = $('.ajaxPortfolio article').length;

				(prevPos >= 0)?$('#portfolioResult').find('#prevPItem').attr('href', 'pos_'+prevPos):$('#portfolioResult').find('#prevPItem').hide();
				(nextPos < totalArticle)?$('#portfolioResult').find('#nextPItem').attr('href', 'pos_'+nextPos):$('#portfolioResult').find('#nextPItem').hide();

				$('html, body').animate({ scrollTop : rightOffset }, 400, 'easeInOutExpo', function() {});	

				$('#portfolioResult').animate(animationPropertiesR, 400, 'easeInOutExpo', function() {
					activateShare($('#shareme', '#portfolioResult'));
					generateOwlC($('#portfolio-carousel', '#portfolioResult'), $('#portfolio-carousel').data('neko_items'), $('#portfolio-carousel').data('neko_navigation'), $('#portfolio-carousel').data('neko_singleitem'), $(this).data('neko_autoplay'), $('#portfolio-carousel').data('neko_itemsscaleup'), $('#portfolio-carousel').data('neko_pagination'), $('#portfolio-carousel').data('neko_paginationnumbers'), $('#portfolio-carousel').data('neko_autoheight'), $('#portfolio-carousel').data('neko_mousedrag'), $('#portfolio-carousel').data('neko_transitionstyle'), true);
				});	

			});


		});	


	});

	/* Closes result div and cleans it's html content */
	$('.ajaxPortfolio').on('click', '#closePItem',function(e) {
		e.preventDefault();
		/* Act on the event */
		$('#PresultWrapper').slideUp(600,'easeInOutExpo');
	});

	/* Prev / Next btns */
	$('.ajaxPortfolio').on('click', 'a#prevPItem, a#nextPItem', function(e) {
		e.preventDefault();
		/* Act on the event */
		var target = $(this).attr('href').replace('pos_', ''),
		animDir = ($(this).attr('id') == 'prevPItem')?'left':'right';
		$('.ajaxPortfolio article').eq(target).find('a.pItemLink').trigger('click', [{direction:animDir}]);
	});
}

/*
|--------------------------------------------------------------------------
| Go to top on mobile nav when clicking the menu
|--------------------------------------------------------------------------
*/
$('.navbar-toggle').click(function(event) {
	/* Act on the event */
	if($(window).scrollTop()<$('#home').height() && $('.navbar-collapse.in').length == 0){
		$('html, body').scrollTop($('#home').height());
	}	
});



/*
|--------------------------------------------------------------------------
| AUTOCLOSE BOOSTRAP MENU
|--------------------------------------------------------------------------
*/

$('#mainHeader .scrollMenu .nav a').on('click', function(){
	if($('.navbar-toggle').css('display') != 'none'){
		$(".navbar-toggle").click();
	}  
});



/*
|--------------------------------------------------------------------------
| BACKGROUND VIDEO
|--------------------------------------------------------------------------
*/
if($('#videoBg').length && $(window).width() >= 767){
    $('#videoBg').mb_YTPlayer({customImg:'images/theme-pics/video.jpg'});
}


/*
|--------------------------------------------------------------------------
| APPEAR
|--------------------------------------------------------------------------
*/
if($('.activateAppearAnimation').length){

	nekoAnimAppear();
	$('.reloadAnim').click(function (e) {
		$(this).parent().parent().find('img').removeClass().addClass('img-responsive');
		nekoAnimAppear();
		e.preventDefault();
	});
}



//END DOCUMENT READY   
});


/*
|--------------------------------------------------------------------------
| EVENTS TRIGGER AFTER ALL IMAGES ARE LOADED
|--------------------------------------------------------------------------
*/
$(window).load(function() {

	"use strict";
    
    /*
    |--------------------------------------------------------------------------
    | PRELOADER
    |--------------------------------------------------------------------------
    */
    if($('#status').length){
        $('#status').fadeOut(); // will first fade out the loading animation
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(350).css({'overflow':'visible'});
    }


    /*
    |--------------------------------------------------------------------------
    | ISOTOPE USAGE FILTERING
    |--------------------------------------------------------------------------
    */ 
    if($('.isotopeWrapper').length){

    	var $container = $('.isotopeWrapper');
    	var $resize = $('.isotopeWrapper').attr('id');
        // initialize isotope

        var initialSelector = $('#filter .current').attr('data-filter');
        
        $container.isotope({
        	layoutMode: 'sloppyMasonry',
            filter: initialSelector,
        	itemSelector: '.isotopeItem'
        }); 

        //var rightHeight = $('#works').height();
        $('#filter a').click(function(e){


        	//$('#works').height(rightHeight);
        	$('#filter a').removeClass('current');


        	$(this).addClass('current');
        	var selector = $(this).attr('data-filter');
        	
        	$container.isotope({
        		filter: selector,
        		animationOptions: {
        			duration: 300,
        			easing: 'easeOutQuart'
        		}
        	});

        	if (isDesktop === true && $('section[id^="paralaxSlice"]').length){
	        	setTimeout(function(){
	        		$.stellar('refresh');
	        	}, 1000);
        	}

        	e.preventDefault();
        	return false;
        });
        
        
        $(window).smartresize(function(){
        	$container.isotope({
                // update columnWidth to a percentage of container width
                masonry: {
                	columnWidth: $container.width() / $resize
                }
            });
        }); 
    }  


    /**PROCESS ICONS**/
    $('.iconBoxV3 a').hover(function() {

    	if(Modernizr.csstransitions) {

    		$(this).stop(false, true).toggleClass( 'hover', 150);
    		$('i', this).css('-webkit-transform', 'rotateZ(360deg)');
    		$('i', this).css('-moz-transform', 'rotateZ(360deg)');
    		$('i', this).css('-o-transform', 'rotateZ(360deg)');
    		$('i', this).css('transform', 'rotateZ(360deg)'); 

    	}else{

    		$(this).stop(false, true).toggleClass( 'hover', 150);

    	}  

    }, function() {

    	if(Modernizr.csstransitions) {
    		$(this).stop(false, true).toggleClass( 'hover', 150);
    		$('i', this).css('-webkit-transform', 'rotateZ(0deg)');
    		$('i', this).css('-moz-transform', 'rotateZ(0deg)');
    		$('i', this).css('-o-transform', 'rotateZ(0deg)');
    		$('i', this).css('transform', 'rotateZ(0deg)'); 

    	}else{

    		$(this).stop(false, true).toggleClass( 'hover', 150);
    	}  

    });




    if (isDesktop === true && $('section[id^="paralaxSlice"]').length )
    {

    	$(window).stellar({
    		horizontalScrolling: false,
    		responsive:true
    	});
    }





//END WINDOW LOAD
});

/*
|--------------------------------------------------------------------------
| FUNCTIONS
|--------------------------------------------------------------------------
*/

/* SHAREME */
function activateShare(obj){

	obj.sharrre({
    	share: {
    		twitter: true,
    		facebook: true,
    		googlePlus: true
    	},
    	template: '<div class="box"><h4>Share this:</h4><a href="#" class="facebook"><i class="icon-glyph-320"></i></a><a href="#" class="twitter"><i class="icon-glyph-339"></i></a><a href="#" class="googleplus"><i class="icon-glyph-317"></i></a></div>',
    	enableHover: false,
    	enableTracking: true,
    	urlCurl:'js-plugin/jquery.sharrre-1.3.4/sharrre.php',
    	render: function(api, options){

    		$(api.element).on('click', '.twitter', function() {
    			api.openPopup('twitter');
    		});
    		$(api.element).on('click', '.facebook', function() {
    			api.openPopup('facebook');
    		});
    		$(api.element).on('click', '.googleplus', function() {
    			api.openPopup('googlePlus');
    		});

    	}
    });
}


/* OWL CAROUSEL */
function generateOwlC(obj, _item, _nav, _single_item, _auto_play, _items_scaleup, _pagination, _pagination_numbers, _auto_height, _mouse_drag, _transition_style, _responsive){

	obj.owlCarousel(
	{
		items:_item,
		navigation:_nav,
		singleItem:_single_item,
		autoPlay:_auto_play,
		itemsScaleUp:_items_scaleup,
		navigationText:['<i class="icon-glyph-205"></i>','<i class="icon-glyph-204"></i>'], 
		pagination:_pagination,
		paginationNumbers:_pagination_numbers,
		autoHeight:_auto_height,
		mouseDrag:_mouse_drag,
		transitionStyle:_transition_style,
		responsive:_responsive

	});

}



/* Appear function */
function nekoAnimAppear(){
	$("[data-nekoanim]").each(function() {

		var $this = $(this);

		$this.addClass("nekoAnim-invisible");
		
		if($(window).width() > 1024) {
			
			$this.appear(function() {

				var delay = ($this.data("nekodelay") ? $this.data("nekodelay") : 1);
				if(delay > 1) $this.css("animation-delay", delay + "ms");

				$this.addClass("nekoAnim-animated");
				$this.addClass('nekoAnim-'+$this.data("nekoanim"));

				setTimeout(function() {
					$this.addClass("nekoAnim-visible");
				}, delay);

			}, {accX: 0, accY: -150});

		} else {
			$this.addClass("nekoAnim-visible");
		}
	});
}








/* CONTACT FROM */

jQuery(function() {
	"use strict";
	if( jQuery("#contactfrm").length ){

		jQuery("#contactfrm").validate({
        // debug: true,
        errorPlacement: function(error, element) {
        	error.insertBefore( element );
        },
        submitHandler: function(form) {
        	jQuery(form).ajaxSubmit({
        		target: ".result"
        	});
        },
        onkeyup: false,
        onclick: false,
        rules: {
        	name: {
        		required: true,
        		minlength: 3
        	},
        	email: {
        		required: true,
        		email: true
        	},
        	phone: {
        		required: true,
        		minlength: 10,
        		digits:true
        	},
        	comment: {
        		required: true,
        		minlength: 10,
        		maxlength: 350
        	}
        }
    });
	}
});
/* CONTACT FROM */



/* MAIN MENU (submenu slide and setting up of a select box on small screen)*/
function initializeMainMenu() {

	"use strict";
	var $mainMenu = $('#mainMenu').children('ul');


	//var action0 = (isMobile === false)?'mouseenter':'click';
	//var action1 = (isMobile === false)?'mouseleave':'click';

	if(Modernizr.mq('only all and (max-width: 767px)') ) {


			// Responsive Menu Events
			var addActiveClass = false;

			$("a.hasSubMenu").unbind('click');
			$('li',$mainMenu).unbind('mouseenter mouseleave');

			$("a.hasSubMenu").on("click", function(e) {
				
				e.preventDefault();


				addActiveClass = $(this).parent("li").hasClass("Nactive");

				if($(this).parent("li").hasClass('primary')){
					$("li", $mainMenu).removeClass("Nactive");
				}else{
					$("li:not(.primary)", $mainMenu).removeClass("Nactive");
				}
				

				if(!addActiveClass) {
					$(this).parents("li").addClass("Nactive");
				}else{
					$(this).parent().parent('li').addClass("Nactive");
				}

				return;
				
			});


		}else if (Modernizr.mq('only all and (max-width: 1024px)') && Modernizr.touch) {   

			$("a.hasSubMenu").attr('href', '');
			$("a.hasSubMenu").on("touchend",function(e){
				
				var $li = $(this).parent(),
				$subMenu = $li.children('.subMenu');


				if ($(this).data('clicked_once')) {
				
					if($li.parent().is($(':gt(1)', $mainMenu))){

						if($subMenu.css('display') == 'block'){
							$li.removeClass('hover');
							$subMenu.css('display', 'none');


						}else{

							$('.subMenu').css('display', 'none');
							$subMenu.css('display', 'block'); 

						} 
				
					}else{

						$('.subMenu').css('display', 'none');

					}

					$(this).data('clicked_once', false);	

				} else {
			
					$li.parent().find('li').removeClass('hover');	
					$li.addClass('hover');
				
					if($li.parent().is($(':gt(1)', $mainMenu))){

						$li.parent().find('.subMenu').css('display', 'none');
						$subMenu.css('left', $subMenu.parent().outerWidth(true));
						$subMenu.css('display', 'block'); 
						
					

					}else{

						$('.subMenu').css('display', 'none');
						$subMenu.css('display', 'block');

					}

					$('a.hasSubMenu').data('clicked_once', false);

					$(this).data('clicked_once', true);
					
				}

				e.preventDefault();
				return false;
			});

			window.addEventListener("orientationchange", function() {

			    $('a.hasSubMenu').parent().removeClass('hover');
				$('.subMenu').css('display', 'none');
				$('a.hasSubMenu').data('clicked_once', false);

			}, true);


		}else{


			$("li", $mainMenu).removeClass("Nactive");
			$('a', $mainMenu).unbind('click');


			$('li',$mainMenu).hover(

				function() {

					var $this = $(this),
					$subMenu = $this.children('.subMenu');


					if( $subMenu.length ){
						$this.addClass('hover').stop();
					}else {

						if($this.parent().is($(':gt(1)', $mainMenu))){

							$this.stop(false, true).fadeIn('slow');

						}
					}


					if($this.parent().is($(':gt(1)', $mainMenu))){

						$subMenu.stop(true, true).fadeIn(200,'easeInOutQuad'); 
						$subMenu.css('left', $subMenu.parent().outerWidth(true));


					}else{

						$subMenu.stop(true, true).delay( 300 ).fadeIn(200,'easeInOutQuad'); 

					}

				}, function() {

					var $nthis = $(this),
					$subMenu = $nthis.children('ul');

					if($nthis.parent().is($(':gt(1)', $mainMenu))){


						$nthis.children('ul').hide();
						$nthis.children('ul').css('left', 0);


					}else{

						$nthis.removeClass('hover');
						$('.subMenu').stop(true, true).delay( 300 ).fadeOut();
					}

					if( $subMenu.length ){$nthis.removeClass('hover');}

		    });

		}
	}



/*
|--------------------------------------------------------------------------
| GOOGLE MAP
|--------------------------------------------------------------------------
*/

function appendBootstrap() {
	"use strict";
	if($('#mapWrapper').length){
		var script = document.createElement("script");
		script.type = "text/javascript";
		script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
		document.body.appendChild(script);
	}
}    




function initialize(id) {
	"use strict";
	var image = 'images/icon-map.png';

	var overlayTitle = 'Agencies';

	var locations = [
        //point number 1
        ['Madison Square Garden', '4 Pennsylvania Plaza, New York, NY'],

        //point number 2
        ['Best town ever', 'Santa Cruz', 36.986021, -122.02216399999998],

        //point number 3 
        ['Located in the Midwestern United States', 'Kansas'],

        //point number 4
        ['I\'ll definitly be there one day', 'Chicago', 41.8781136, -87.62979819999998] 
        ];

        /*** DON'T CHANGE ANYTHING PASSED THIS LINE ***/
        id = (id === undefined) ? 'mapWrapper' : id;

        var map = new google.maps.Map(document.getElementById(id), {
        	mapTypeId: google.maps.MapTypeId.ROADMAP,
        	scrollwheel: false,
        	zoomControl: true,
        	zoomControlOptions: {
        		style: google.maps.ZoomControlStyle.LARGE,
        		position: google.maps.ControlPosition.LEFT_CENTER
        	},
        	streetViewControl:true,
        	scaleControl:false,
        	zoom: 14,
        	styles:[
        	{
        		"featureType": "water",
        		"stylers": [
        		{
        			"color": "#999999"
        		},
        		]
        	},
        	{
        		"featureType": "road",
        		"elementType": "geometry.fill",
        		"stylers": [
        		{
        			"color": "#FCFFF5"
        		},
        		]
        	},
        	{
        		"featureType": "road",
        		"elementType": "geometry.stroke",
        		"stylers": [
        		{
        			"color": "#808080"
        		},
        		{
        			"lightness": 54
        		}
        		]
        	},
        	{
        		"featureType": "landscape.man_made",
        		"elementType": "geometry.fill",
        		"stylers": [
        		{
        			"color": "#555555"
        		}
        		]
        	},
        	{
        		"featureType": "poi.park",
        		"elementType": "geometry.fill",
        		"stylers": [
        		{
        			"color": "#555555"
        		}
        		]
        	},
        	{
        		"featureType": "road",
        		"elementType": "labels.text.fill",
        		"stylers": [
        		{
        			"color": "#767676"
        		}
        		]
        	},
        	{
        		"featureType": "road",
        		"elementType": "labels.text.stroke",
        		"stylers": [
        		{
        			"color": "#ffffff"
        		}
        		]
        	},
        	{
        		"featureType": "road.highway",
        		"elementType": "geometry.fill",
        		"stylers": [
        		{
        			"color": "#7e7341"
        		}
        		]
        	},

        	{
        		"featureType": "landscape.natural",
        		"elementType": "geometry.fill",
        		"stylers": [
        		{
        			"visibility": "on"
        		},
        		{
        			"color": "#EEEEEE"
        		}
        		]
        	},
        	{
        		"featureType": "poi.park",
        		"stylers": [
        		{
        			"visibility": "on"
        		}
        		]
        	},
        	{
        		"featureType": "poi.sports_complex",
        		"stylers": [
        		{
        			"visibility": "on"
        		}
        		]
        	},
        	{
        		"featureType": "poi.medical",
        		"stylers": [
        		{
        			"visibility": "on"
        		}
        		]
        	},
        	{
        		"featureType": "poi.business",
        		"stylers": [
        		{
        			"visibility": "simplified"
        		}
        		]
        	}
        	]

        });

var myLatlng;
var marker, i;
var bounds = new google.maps.LatLngBounds();
var infowindow = new google.maps.InfoWindow({ content: "loading..." });

for (i = 0; i < locations.length; i++) { 


	if(locations[i][2] !== undefined && locations[i][3] !== undefined){
		var content = '<div class="infoWindow">'+locations[i][0]+'<br>'+locations[i][1]+'</div>';
		(function(content) {
			myLatlng = new google.maps.LatLng(locations[i][2], locations[i][3]);

			marker = new google.maps.Marker({
				position: myLatlng,
				icon:image,  
				title: overlayTitle,
				map: map
			});

			google.maps.event.addListener(marker, 'click', (function() {
				return function() {
					infowindow.setContent(content);
					infowindow.open(map, this);
				};

			})(this, i));

			if(locations.length > 1){
				bounds.extend(myLatlng);
				map.fitBounds(bounds);
			}else{
				map.setCenter(myLatlng);
			}

		})(content);
	}else{

		var geocoder   = new google.maps.Geocoder();
		var info   = locations[i][0];
		var addr   = locations[i][1];
		var latLng = locations[i][1];

		(function(info, addr) {

			geocoder.geocode( {

				'address': latLng

			}, function(results) {

				myLatlng = results[0].geometry.location;

				marker = new google.maps.Marker({
					position: myLatlng,
					icon:image,  
					title: overlayTitle,
					map: map
				});
				var $content = '<div class="infoWindow">'+info+'<br>'+addr+'</div>';
				google.maps.event.addListener(marker, 'click', (function() {
					return function() {
						infowindow.setContent($content);
						infowindow.open(map, this);
					};
				})(this, i));

				if(locations.length > 1){
					bounds.extend(myLatlng);
					map.fitBounds(bounds);
				}else{
					map.setCenter(myLatlng);
				}
			});
		})(info, addr);

	}
}
}







/* ANALYTICS */
function gaSSDSLoad (acct) {
	"use strict";  
	var gaJsHost = (("https:" === document.location.protocol) ? "https://ssl." : "http://www."),
	pageTracker,
	s;
	s = document.createElement('script');
	s.src = gaJsHost + 'google-analytics.com/ga.js';
	s.type = 'text/javascript';
	s.onloadDone = false;
	function init () {
		pageTracker = _gat._getTracker(acct);
		pageTracker._trackPageview();
	}
	s.onload = function () {
		s.onloadDone = true;
		init();
	};
	s.onreadystatechange = function() {
		if (('loaded' === s.readyState || 'complete' === s.readyState) && !s.onloadDone) {
			s.onloadDone = true;
			init();
		}
	};
	document.getElementsByTagName('head')[0].appendChild(s);
}




jQuery(function($){
	"use strict";
	if($('#superSizedSlider').length){

		$('#superSizedSlider').height($(window).height());

		$.supersized({

                    // Functionality
                    slideshow               :   1,          // Slideshow on/off
                    autoplay                :   1,          // Slideshow starts playing automatically
                    start_slide             :   1,          // Start slide (0 is random)
                    stop_loop               :   0,          // Pauses slideshow on last slide
                    random                  :   0,          // Randomize slide order (Ignores start slide)
                    slide_interval          :   12000,      // Length between transitions
                    transition              :   1,          // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                    transition_speed        :   1000,       // Speed of transition
                    new_window              :   1,          // Image links open in new window/tab
                    pause_hover             :   0,          // Pause slideshow on hover
                    keyboard_nav            :   1,          // Keyboard navigation on/off
                    performance             :   1,          // 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
                    image_protect           :   1,          // Disables image dragging and right click with Javascript

                    // Size & Position                         
                    min_width               :   0,          // Min width allowed (in pixels)
                    min_height              :   0,          // Min height allowed (in pixels)
                    vertical_center         :   1,          // Vertically center background
                    horizontal_center       :   1,          // Horizontally center background
                    fit_always              :   0,          // Image will never exceed browser width or height (Ignores min. dimensions)
                    fit_portrait            :   1,          // Portrait images will not exceed browser height
                    fit_landscape           :   0,          // Landscape images will not exceed browser width

                    // Components                           
                    slide_links             :   'false',    // Individual links for each slide (Options: false, 'num', 'name', 'blank')
                    thumb_links             :   0,          // Individual thumb links for each slide
                    thumbnail_navigation    :   0,          // Thumbnail navigation
                    slides                  :   [           // Slideshow Images
                    {image : './images/slider/super/supersized-2.jpg', title : '<img src="images/main-logo-big.png" alt="COTTON CANDY website template" class="img-responsive" /><a href="#work" class="btn btn-lg scrollLink mt15">We create</a>', thumb : '', url : ''},

                    {image : './images/slider/super/supersized-3.jpg', title : '<a href="#works" class="btn btn-lg scrollLink">Check our portfolio</a>', thumb : '', url : ''},

                    {image : './images/slider/super/supersized-1.jpg', title : '<a href="#team" class="btn btn-lg scrollLink">Learn more about us</a>', thumb : '', url : ''}
                    ],

                    // Theme Options               
                    progress_bar            :   0,          // Timer for each slide                         
                    mouse_scrub             :   0
                    
                });
}
});

/* TO TOP BUTTON */

function toTop(mobile){
    
   if(mobile == false){

        if(!$('#nekoToTop').length)
        $('body').append('<a href="#" id="nekoToTop"><i class="icon-glyph-203"></i></a>');

        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#nekoToTop').slideDown('fast');
            } else {
                $('#nekoToTop').slideUp('fast');
            }
        });

        $('#nekoToTop').click(function (e) {
            e.preventDefault();
            $("html, body").animate({
                scrollTop: 0
            }, 800, 'easeInOutCirc');
            
        });
   }else{

        if($('#nekoToTop').length)
        $('#nekoToTop').remove();

    }

}




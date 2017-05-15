<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
    /* Menu Options
    ================================================== */
	$exclude_primarynavi = get_option_tree('exclude_primarynavi',$theme_options);
	$menu_order = get_option_tree('menu_order',$theme_options);
	$navi_type = get_option_tree('navi_type',$theme_options);
	$bold_navi = get_option_tree('bold_navi',$theme_options);

}
?>

		<div id="footer">
			<div class="container">
				<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Meta') ) ?>
			  <div class="footer-content row-fluid columns-5 <?php if ( !is_active_sidebar(3) ){?>empty<?php } ?>">
				  <div class="border">
					  <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer') ) ?>
				  </div>
			  </div>
			  <div class="footer-bottom row-fluid">
				            <p>&copy; Hair Library 2016 Powered by <a href="http://sohoanalytics.com/">Soho Analytics</a> </p>
				  </div>
			  </div>
 
		</div>
		
		
	</div>
</div>

<?php wp_footer(); ?>

<?php if(!$navi_type){ ?>
	<script>
/*global $:false */	
	if ( $(window).width() > 960) {
		$('.navbar .nav .dropdown-toggle').addClass('disabled');
		$('.navbar .dropdown').hover(function() {
            "use strict";
			$(this).addClass('open').find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
		}, function() {
            "use strict";
            var na = $(this);
			na.find('.dropdown-menu').first().stop(true, true).delay(100).slideUp('fast', function(){ na.removeClass('open'); });
		});
	}
	</script>
<?php } ?>

<?php get_template_part('includes/custom_js') ?>
<div id="mask" class="product-popup-outer">
   <div id="product-popup" class="popup">
     <div id="pop-content">
       <img style="margin:91px 200px" alt="loading" src="<?php bloginfo('template_url');?>/assets/img/loading_pink.gif"/>
	</div>
   <div class="close-popup" ><span id="close-pop"></span></div>
	</div>
</div>


<div id="guided-tour-popup-outer">
	<div id="guided-tour-popup-inner">
		<a id="close-guided-tour-popup" href="javascript:void()">Close</a>	
		<div class="guided-tour-popup-content" style="display:none;">
			<?php if( function_exists('cyclone_slider') ) cyclone_slider('user-guided-tour'); ?>
		</div>
	</div>
</div>



<script>
$(document).ready(function() {
$(window).scroll(function(){
if( $(window).scrollTop() > 160 ) {
$('#header').addClass('fixed-header');
} else {
$('#header').removeClass('fixed-header');
}
});


$('.guided-tour a').on('click', function() {
	$('#guided-tour-popup-outer').fadeIn(1000);	
	
	setTimeout(function(){ 

$('.guided-tour-popup-content').show();	 

}, 2000);
	
});


$('#close-guided-tour-popup').on('click', function() {
  
 $('#guided-tour-popup-outer').fadeOut(1000);
 
});

var cheight=screen.height;
 h=(cheight-400)+'px';
 $('#main').css( "min-height", h );

});


$('#close-pop').on('click', function() {
  
 $('#mask').fadeOut(1000);
 $('#pop-content').html('<img style="margin:91px 200px" alt="loading" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/loading_pink.gif"/>');
 
 
});

$('#getLoginPopup').on('click', function() {
  
 $('#login-popup-outer').fadeIn(1000);
 
 
});



$('#getHeartLoginPopup').on('click', function() {
  var loc=window.location.href;
 $('#login-popup-outer').fadeIn(1000);
 $('#redir').val(loc);
 
});
$('#close-login').on('click', function() {
  
 $('#login-popup-outer').fadeOut(1000);
 
 
});

function getTab(id)
{
 var id1='#'+id+'1';
 $('.tabcon').hide();
 $(id1).show();
 
}

function getHeartLoginPopup(loc){
 $('#login-popup-outer').fadeIn(1000);
 $('#redir').val(loc);
 
}


function getCommonLoginPopup(loc){
  if(loc=="" || loc==null)
  loc=window.location.href;
 
 $('#login-popup-outer').fadeIn(1000);
 $('#redir').val(loc);
 
 
}


</script>

</body>
</html>
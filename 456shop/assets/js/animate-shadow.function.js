jQuery(document).ready(function() {	
    animateShadow();
});

function animateShadow(){
    
    $('.product .item a').mouseenter(function() {
        $(this).find('.shadow-s3').stop(true,true).animate({boxShadow: '0 0 10px rgba(0, 0, 0, 0.2)'}, 200);
    
    }).mouseleave(function(){
        $(this).find('.shadow-s3').stop(true,true).animate({boxShadow: '0 0 3px rgba(0, 0, 0, 0.2)'}, 200);
    });
    $('#container .element').mouseenter(function() {
        $(this).find('.shadow-s3').stop(true,true).animate({boxShadow: '0 0 10px rgba(0, 0, 0, 0.2)'}, 200);
    
    }).mouseleave(function(){
        $(this).find('.shadow-s3').stop(true,true).animate({boxShadow: '0 0 3px rgba(0, 0, 0, 0.2)'}, 200);
    });
    $('.Container .item').mouseenter(function() {
        $(this).find('.shadow-s3').stop(true,true).animate({boxShadow: '0 0 10px rgba(0, 0, 0, 0.2)'}, 200);
    
    }).mouseleave(function(){
        $(this).find('.shadow-s3').stop(true,true).animate({boxShadow: '0 0 3px rgba(0, 0, 0, 0.2)'}, 200);
    });
    $('.products .product').mouseenter(function() {
        $(this).find('.shadow-s3').stop(true,true).animate({boxShadow: '0 0 10px rgba(0, 0, 0, 0.2)'}, 200);
    
    }).mouseleave(function(){
        $(this).find('.shadow-s3').stop(true,true).animate({boxShadow: '0 0 3px rgba(0, 0, 0, 0.2)'}, 200);
    });

}
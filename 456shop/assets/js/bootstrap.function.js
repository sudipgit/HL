$(".ttip").tooltip();

$(".carousel").carousel({interval: 10000, pause: "hover"})
$(".carousel").each(function(){
	$(this).find('.item:first').addClass('active');
});

$(".testimonial").carousel({interval: 10000, pause: "hover"})
$(".testimonial").each(function(){
	$(this).find('.item:first').addClass('active');
});
//$('.testimonial p:empty').remove();
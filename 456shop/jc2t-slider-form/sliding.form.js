$(function() {
	var fieldsetCount = $('#signup_form').children().length;
	var current 	= 1;
	var stepsWidth	= 0;
    var widths 		= new Array();
	$('#steps .step').each(function(i){
        var $step 		= $(this);
		widths[i]  		= stepsWidth;
        stepsWidth	 	+= $step.width();
    });
	$('#steps').width(stepsWidth);
	
	/*	to avoid problems in IE, focus the first input of the form	*/
	$('#signup_form').children(':first').find(':input:first').focus();	
	$('#navigation').show();
	
	/* when clicking on a navigation link the form slides to the corresponding fieldset	*/
    $('#navigation a').bind('click',function(e){
		var $this	= $(this);
		var prev	= current;
		
		
		/* we store the position of the link in the current variable */
		current = $this.parent().index() + 1;
		
		/*
		animate / slide to the next or to the corresponding
		fieldset. The order of the links in the navigation
		is the order of the fieldsets.
		Also, after sliding, we trigger the focus on the first 
		input element of the new fieldset
		If we clicked on the last link (confirmation), then we validate
		all the fieldsets, otherwise we validate the previous one
		before the form slided
		*/

		if( validate_form(current -1) ) {
			$this.closest('ul').find('li').removeClass('selected');
			$this.parent().addClass('selected');
			$('#steps').stop().animate({
				marginLeft: '-' + widths[current-1] + 'px'
			},500,function(){
				if(current == fieldsetCount) {
					//validateSteps();
				} else {
					//validateStep(prev);
				}
			});
			
		}
        e.preventDefault();
    });
	
	/* clicking on the tab (on the last input of each fieldset), makes the form slide to the next step */
	$('#signup_form > fieldset').each(function(){
		var $fieldset = $(this);
		$fieldset.children(':last').find(':input').keydown(function(e){
			if (e.which == 9){
				if( validate_form(current -1) ) {
					$('#navigation li:nth-child(' + (parseInt(current)+1) + ') a').click();
				}
				/* force the blur for validation */
				$(this).blur();
				e.preventDefault();
			}
		});
	});
	
	/*	if there are errors don't allow the user to submit	*/
	$('#registerButton').bind('click',function(){
		if($('#signup_form').data('errors')){
			alert('Please correct the errors in the Form');
			return false;
		}	
	});
});
jQuery(function(){
	$ = jQuery;

	// Tooltips
	$(".tips, .help_tip").tipTip({
			'attribute' : 'data-tip',
			'fadeIn' : 50,
			'fadeOut' : 50,
			'delay' : 200
	});
	
	function showType() {
		var csv_type = $("#csv_type").val();
		$(".csv_types").hide();
		if(csv_type === "quantity")
		{
			$(".csv_quantity").show();
		}
		else if(csv_type === "indicator")
		{
			$(".csv_indicator").show();
		}
	}
	
	$("#csv_type").change(function(){showType()});
	showType();
});
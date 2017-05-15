/*

function formValidation()
  {
      var err=0;
	  var err_msg="";
	  var v1=document.forms["add_product"]["title"].value;
	  var v2=document.forms["add_product"]["price"].value;
	  var v3=$('input[name=type_of_product]:checked').val();
	   var v4=$('input[name=type_of_hair]:checked').val();


	  if(v1=="" || v2=="" || !v3 || !v4)
	  {
		  err_msg='You have to fill all star(*) mark fields <br/> please check SelectCategory and Qty&Price tabs';
	        err=1;

	}
	
    if(err==1)
	{
	   document.getElementById('em').innerHTML=err_msg;
	   $("#error-msg").removeClass('hide');
	   return false;
	}
	 

	  return true;
}


$( "#error-close" ).click(function() {
$("#error-msg").addClass('hide');
});



$(function(){
    $('#selectall1').click(function(i, v){
        $('.selectedId1').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId1').length;
    $('.selectedId1').click(function(i, v){
        $('#selectall1').prop('checked',$('.selectedId1:checked').length  == checkCount)
    });
});


$(function(){
    $('#selectall2').click(function(i, v){
        $('.selectedId2').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId2').length;
    $('.selectedId2').click(function(i, v){
        $('#selectall12').prop('checked',$('.selectedId2:checked').length  == checkCount)
    });
});
$(function(){
    $('#selectall3').click(function(i, v){
        $('.selectedId3').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId3').length;
    $('.selectedId3').click(function(i, v){
        $('#selectall13').prop('checked',$('.selectedId3:checked').length  == checkCount)
    });
});

$(function(){
    $('#selectall4').click(function(i, v){
        $('.selectedId4').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId4').length;
    $('.selectedId4').click(function(i, v){
        $('#selectall14').prop('checked',$('.selectedId4:checked').length  == checkCount)
    });
});

$(function(){
    $('#selectall5').click(function(i, v){
        $('.selectedId5').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId5').length;
    $('.selectedId5').click(function(i, v){
        $('#selectall15').prop('checked',$('.selectedId5:checked').length  == checkCount)
    });
});

$(function(){
    $('#selectall6').click(function(i, v){
        $('.selectedId6').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId6').length;
    $('.selectedId6').click(function(i, v){
        $('#selectall16').prop('checked',$('.selectedId6:checked').length  == checkCount)
    });
});
$(function(){
    $('#selectall7').click(function(i, v){
        $('.selectedId7').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId7').length;
    $('.selectedId7').click(function(i, v){
        $('#selectall17').prop('checked',$('.selectedId7:checked').length  == checkCount)
    });
});

$(function(){
    $('#selectall8').click(function(i, v){
        $('.selectedId8').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId8').length;
    $('.selectedId8').click(function(i, v){
        $('#selectall18').prop('checked',$('.selectedId8:checked').length  == checkCount)
    });
});

$(function(){
    $('#selectall9').click(function(i, v){
        $('.selectedId9').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId9').length;
    $('.selectedId9').click(function(i, v){
        $('#selectall19').prop('checked',$('.selectedId9:checked').length  == checkCount)
    });
});

*/



 function formValidation()
  {
      var err=0;
	  var err_msg="";
	  var tv1=document.forms["add_product"]["title"].value;
	  var tv2=document.forms["add_product"]["price"].value;
	  var tv3=document.forms["add_product"]["upccode"].value;
	  var tv4=document.forms["add_product"]["number_of_ounces"].value;
	  var tv5=document.forms["add_product"]["city"].value;
	  var tv6=document.forms["add_product"]["state"].value;
	  var rv1=$('input[name=type_of_product]:checked').val();
	  var rv2=$('input[name=product_consistency]:checked').val();
	  var rv3=$('input[name=gender]:checked').val();
	  var rv4=$('input[name=is_organic]:checked').val();
 
 var is_valid1=0;
 var cboxes = document.getElementsByName('type_of_hair[]');
   var len = cboxes.length;
       for (var i=0; i<len; i++) {
		if(cboxes[i].checked==true)
			{
				is_valid1=1;
			}
			
		}
		 
 var is_valid2=0;
 var cboxes = document.getElementsByName('demogrph[]');
   var len = cboxes.length;
       for (var i=0; i<len; i++) {
		if(cboxes[i].checked==true)
			{
				is_valid2=1;
			}
		}
		 
 var is_valid3=0;
 var cboxes = document.getElementsByName('ageRange[]');
   var len = cboxes.length;
       for (var i=0; i<len; i++) {
		if(cboxes[i].checked==true)
			{
				is_valid3=1;
			}
		}
				 
 var is_valid4=0;
 var cboxes = document.getElementsByName('hairLenth[]');
   var len = cboxes.length;
       for (var i=0; i<len; i++) {
		if(cboxes[i].checked==true)
			{
				is_valid4=1;
			}
		}
				 
 var is_valid5=0;
 var cboxes = document.getElementsByName('hairTex[]');
   var len = cboxes.length;
       for (var i=0; i<len; i++) {
		if(cboxes[i].checked==true)
			{
				is_valid5=1;
			}
		}
				 
 var is_valid6=0;
 var cboxes = document.getElementsByName('hairDes[]');
   var len = cboxes.length;
       for (var i=0; i<len; i++) {
		if(cboxes[i].checked==true)
			{
				is_valid6=1;
			}
		}
					 
 var is_valid7=0;
 var cboxes = document.getElementsByName('hairProc[]');
   var len = cboxes.length;
       for (var i=0; i<len; i++) {
		if(cboxes[i].checked==true)
			{
				is_valid7=1;
			}
		}
					 
 var is_valid8=0;
 var cboxes = document.getElementsByName('hairCond[]');
   var len = cboxes.length;
       for (var i=0; i<len; i++) {
		if(cboxes[i].checked==true)
			{
				is_valid8=1;
			}
		}
						 
 var is_valid9=0;
 var cboxes = document.getElementsByName('intStyl[]');
   var len = cboxes.length;
       for (var i=0; i<len; i++) {
		if(cboxes[i].checked==true)
			{
				is_valid9=1;
			}
		}
		
		
	  if(tv1=="" || tv2=="" || tv3=="" || tv4=="" || tv5=="" || tv6=="" )
		{
		 
	        err=1;
		}	
	  if(is_valid1==0 || is_valid2==0 || is_valid3==0 || is_valid4==0 || is_valid5==0 || is_valid6==0 || is_valid7==0 || is_valid8==0 || is_valid9==0 )
		{
		  
	        err=1;
		}
	  if(!rv1 || !rv2 || !rv3 || !rv4)
		{
		  
	        err=1;
		}
	
    if(err==1)
	{
	   err_msg='You have to fill all fields. Do not forget to check all tabs';
	   document.getElementById('em').innerHTML=err_msg;
	   $("#error-msg").removeClass('hide');
	   return false;
	}
	 

	  return true;
}




$(function(){
    $('#selectall1').click(function(i, v){
        $('.selectedId1').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId1').length;
    $('.selectedId1').click(function(i, v){
        $('#selectall1').prop('checked',$('.selectedId1:checked').length  == checkCount)
    });
});


$(function(){
    $('#selectall2').click(function(m, n){
        $('.selectedId2').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId2').length;
    $('.selectedId2').click(function(i, v){
        $('#selectall2').prop('checked',$('.selectedId2:checked').length  == checkCount)
    });
});
$(function(){
    $('#selectall3').click(function(i, v){
        $('.selectedId3').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId3').length;
    $('.selectedId3').click(function(i, v){
        $('#selectall3').prop('checked',$('.selectedId3:checked').length  == checkCount)
    });
});

$(function(){
    $('#selectall4').click(function(i, v){
        $('.selectedId4').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId4').length;
    $('.selectedId4').click(function(i, v){
        $('#selectall4').prop('checked',$('.selectedId4:checked').length  == checkCount)
    });
});

$(function(){
    $('#selectall5').click(function(i, v){
        $('.selectedId5').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId5').length;
    $('.selectedId5').click(function(i, v){
        $('#selectall5').prop('checked',$('.selectedId5:checked').length  == checkCount)
    });
});

$(function(){
    $('#selectall6').click(function(i, v){
        $('.selectedId6').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId6').length;
    $('.selectedId6').click(function(i, v){
        $('#selectall6').prop('checked',$('.selectedId6:checked').length  == checkCount)
    });
});
$(function(){
    $('#selectall7').click(function(i, v){
        $('.selectedId7').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId7').length;
    $('.selectedId7').click(function(i, v){
        $('#selectall7').prop('checked',$('.selectedId7:checked').length  == checkCount)
    });
});

$(function(){
    $('#selectall8').click(function(i, v){
        $('.selectedId8').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId8').length;
    $('.selectedId8').click(function(i, v){
        $('#selectall8').prop('checked',$('.selectedId8:checked').length  == checkCount)
    });
});

$(function(){
    $('#selectall9').click(function(i, v){
        $('.selectedId9').prop('checked', this.checked);
    });

    var checkCount = $('.selectedId9').length;
    $('.selectedId9').click(function(i, v){
        $('#selectall9').prop('checked',$('.selectedId9:checked').length  == checkCount)
    });
});

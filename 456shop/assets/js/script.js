function saveAjaxLike(id,userid,likes,type,cssid) { 
 
	
    $.ajax({
            type:"post",
            url:"http://hairlibrary.com/savelike.php",
        data:"uid="+userid+"&id="+id+"&type="+type,
        success:function(data){
		likes++;
		btn1="#heart-"+cssid;
		btn2="#heart-after-"+cssid;
		btn3="#like-no-"+cssid;
		
               $(btn1).hide(1000);
			  $(btn2).show(500);
			 $(btn3).html(likes);
        }
    });
   
	
}

function getProductPopup(id){ 
  $('#mask').show();
	
    $.ajax({
            type:"post",
            url:"http://hairlibrary.com/product_popup.php",
        data:"id="+id,
        success:function(data){
		 $('#pop-content').animate({width:"800px",height:"400px"});
		  $('#pop-content').html(data);
        }
    });
   
	
}


 function postComment()
{
	 var value=$('#comment').val();
	 if(value=="")
	  return false;
}
   
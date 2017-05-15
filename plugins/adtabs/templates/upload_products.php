<div class="wrap"><?php

echo getAttachmentId('http://myhypehair.com/123456789/wp-content/uploads/2013/02/accessories-018.jpg');


  if($_SERVER["REQUEST_METHOD"] == "POST"){

	      if(saveUploadProducts2($_FILES))
		  {?>
		  
		  	  <div class="succes-msg" id="msw_suc"><div class="inner"><p>All information saved successfully. Thank you!</p>
	  <a href="javascript:void();" id="close_m">Close</a></div>
	  </div>
		<?php  }
	  

   }



?> 
       <div class="update-products">
          <h3>Upload Products</h3> 
            <div class="update-products-form">
              <form name="upload-csv" action="" method="post" enctype="multipart/form-data">
                 <ul>
                 <li class="text">
                 <label>Upload CSV:</label>
                 <input type="file" name="csv"/>
                 </li>
                 <li>
                 <input type="submit" value="Submit" class="button"/>
                 </li>
                 </ul>                
            </form>
            
            
            </div>
       
       </div>  
</div>  

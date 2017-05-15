<?php

$current_user=wp_get_current_user();
$mess = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$old_pass = $_POST['old_pass'];	
	$new_pass = $_POST['new_pass'];	
	$re_pass = $_POST['pass2'];	
	
	$user= get_userdata( $current_user->ID );
	if(wp_check_password( $old_pass, $user->data->user_pass, $user->ID)){
		if(($_POST['new_pass'] !="") && ($_POST['pass2'] !="") && ($new_pass == $re_pass)){
			wp_set_password($_POST['new_pass'], $user->ID );
			$mess = "You've changed your password successfully!";			
		}else {
			$mess = "Attempt Failed!";
		}
	}else {
		$mess = "Your given password is not correct!";
	}
}


?> 
<script>
function validate() {
  var password1 = $("#inputPasswordNew").val();
  var password2 = $("#inputPasswordNew2").val();
  var password = $("#inputPasswordOld").val();
	if(password1!="" && password1!="" && password != ""){
		if(password1 == password2) {
		   return true; 
		}
		else {
			alert("Your new password and re-type password dosen't match.");
		   return false;  
		}
	}else{
		alert("All field must be filled.");
		return false;
	}
}
</script>   
<div id="main" class="wrap salon-profile">

             <div class="row-fluid salon-profile-registration" style="padding-top:0">
			   
				
				<div class="setting-form">
					<p style="color:#D9197E;"><?php echo $mess; ?></p>
				  <form action="#" method="post"  onsubmit="return validate()">
					   <div id="productPhotosTab" class="tab-pane active">
				 		<div class="row-fluid">
						
							<!-- Column -->
							<div class="span3">
								<strong>Change password</strong>
								<p class="muted">This information will not be public.</p>
							</div>
							<!-- // Column END -->
							
							<!-- Column -->
							<div class="span9">	
								<label for="inputPasswordOld">Old password</label>
								<input type="password" name="old_pass" id="inputPasswordOld" class="span10" value="" placeholder="Leave empty for no change" />
								<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Leave empty if you don't wish to change the password"><i></i></span>
								<div class="separator"></div>
								
								<label for="inputPasswordNew">New password</label>
								<input name="new_pass" type="password" id="inputPasswordNew" class="span12" value="" placeholder="Leave empty for no change" />
								<div class="separator"></div>
								
								<label for="inputPasswordNew2">Repeat new password</label>
								<input name="pass2" type="password" id="inputPasswordNew2" class="span12" value="" placeholder="Leave empty for no change" />
								<div class="separator"></div>
							</div>
							<!-- // Column END -->
							
						</div>
						<!-- // Row END -->
						
						<div class="separator line bottom"></div>
						
					
				</div>

					 <div>
						<input type="hidden" name="salon_id" value="<?php echo $salon->id;?>" />
						<input type="submit" name="save_salon" value="Change Password" class="button"/>						
					 </div>
				  
				  </form>
				
				
				
				
				</div>
			 
			 
			 </div>
			 </div>

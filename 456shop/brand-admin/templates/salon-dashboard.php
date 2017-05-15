<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	$salon=array();

	
	$phone=$_POST['phone'];
	$phone=str_replace('(',"",$phone);
	$phone=str_replace(' ',"",$phone);
	$phone=str_replace(')',"",$phone);
	$phone=str_replace('-',"",$phone);
	
	$salon['name']= $_POST['salon_name'];
	$salon['address']=$_POST['address'];
	$salon['city']=$_POST['city'];
	$salon['state']=$_POST['salon_state'];
	$salon['zip']=$_POST['zipcode'];
	$salon['phone']=$phone;
	$salon['website']=$_POST['website'];
	
	if(isset($_POST['save_salon'])){
		updateSalon($salon);
		//var_dump($salon);   
	}
   }
	$current_user=wp_get_current_user();
	$salon_id = $current_user->ID;
$salon=getSalonInfo($salon_id);
//var_dump($salon);
	
?>
<div id="main" class="wrap salon-profile">

             <div class="row-fluid salon-profile-registration" style="padding-top:0">
			   
				
				<div class="setting-form">
				  <form action="#" method="post">
					   <div id="productPhotosTab" class="tab-pane active">
				 <!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Salon Name:</strong>
							<p class="muted">Full Salon Name</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Salon Name</label>
							<input type="text" name="salon_name" value="<?php echo $salon->name;?>" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					<hr class="separator bottom" />
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Street Address:</strong>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Street Address</label>
							 <input type="text" name="address" value="<?php echo $salon->address;?>" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					<hr class="separator bottom" /><div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Salon Location(city):</strong>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">city</label>
							 <input type="text" name="city" value="<?php echo $salon->city;?>" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					<hr class="separator bottom" /><div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>State:</strong>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">State</label>
							 <select name="salon_state" value="">
						 <option> State1</option>
						 <option> State1</option>
						 <option> State1</option>
						 </select>
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Zip Code:</strong>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Zip Code</label>
							<input type="text" name="zipcode" value="<?php echo $salon->zip;?>" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Phone Number:</strong>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Phone Number</label>
							 <input type="text" name="phone" value="<?php echo $salon->phone;?>" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Website:</strong>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Website</label>
							 <input type="text" name="website" value="<?php echo $salon->website;?>" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					<hr class="separator bottom" />

					   				   
					    
						
					 <div>
						 <input type="hidden" name="salon_id" value="<?php echo $salon->id;?>" />
						 <input type="hidden" name="user_id"	value="<?php echo $current_user->ID;?>"/>
						 <input type="submit" name="save_salon" value="Save" class="button"/>
					 </div>				
				  
				  </form>
				
				
				
				
				</div>
			 
			 
			 </div>
			 </div>

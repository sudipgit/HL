<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	$salon=array();

	$salon['ammenities']=implode(',',$_POST['ammenities']);
	
	if(isset($_POST['save_salon'])){
		updateSalon($salon);
		//var_dump($salon);   
	}
	}
$current_user=wp_get_current_user();
$salon_id = $current_user->ID;
$salon=getSalonInfo($salon_id);
?>
<div id="main" class="wrap salon-profile">

	 <div class="row-fluid salon-profile-registration" style="padding-top:0">
		
		<div class="setting-form">				
			<form action="#" method="post">												   
				<div id="productAttributesTab" class="tab-pane active">	
					<div class="row-fluid column2-field">
						<div class="span6">
							<div class="span4">
								<strong>Ammenities</strong>
								<label><input type="checkbox" value="sf" name="all8" id="selectall8"> Select All</label>
							</div>																				
							<div class="span7">
							<?php
                           $amenities=explode(',',$salon->ammenities);
							?>
							
								<label><input type="checkbox" name="ammenities[]" value="wheel_chair_access" <?php if(in_array('wheel_chair_access',$amenities)) echo 'checked="checked"';?> />Wheel Chair Access</label>
								<label><input type="checkbox" name="ammenities[]" value="kid_friendly" <?php if(in_array('kid_friendly',$amenities)) echo 'checked="checked"';?> />Kid Friendly</label>
								<label><input type="checkbox" name="ammenities[]" value="good_for_groups" <?php if(in_array('good_for_groups',$amenities)) echo 'checked="checked"';?> />Good For Groups</label>
								<label> <input type="checkbox" name="ammenities[]" value="parking" <?php if(in_array('parking',$amenities)) echo 'checked="checked"';?> />Parking</label>
								<label><input type="checkbox" name="ammenities[]" value="wifi" <?php if(in_array('wifi',$amenities)) echo 'checked="checked"';?> />Wifi</label>
								<label><input type="checkbox" name="ammenities[]" value="tv" <?php if(in_array('tv',$amenities)) echo 'checked="checked"';?> />TV</label>
								<label><input type="checkbox" name="ammenities[]" value="com_ref" <?php if(in_array('com_ref',$amenities)) echo 'checked="checked"';?> />Complimentary Refreshments</label>
								<label><input type="checkbox" name="ammenities[]" value="organic_products" <?php if(in_array('organic_products',$amenities)) echo 'checked="checked"';?> />Organic Products</label>
								<label><input type="checkbox" name="ammenities[]" value="unisex_salon" <?php if(in_array('unisex_salon',$amenities)) echo 'checked="checked"';?> />Unisex Salon</label>
								<label><input type="checkbox" name="ammenities[]" value="hair_removal" <?php if(in_array('hair_removal',$amenities)) echo 'checked="checked"';?> />Hair Removal</label>
								<label><input type="checkbox" name="ammenities[]" value="barber_shop" <?php if(in_array('barber_shop',$amenities)) echo 'checked="checked"';?> />Barber Shop</label>
							</div>
						</div>
					</div>			
				</div>	

				 <div>
					<input type="hidden" name="salon_id" value="<?php echo $salon->id;?>" />
					<input type="hidden" name="user_id"	value="<?php echo $current_user->ID;?>"/>
					<input type="submit" name="save_salon" value="Save" class="button"/>
				 </div>				  
			</form>
		</div>			 			 
	</div>
</div>

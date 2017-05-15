<?php
/*
Template Name: Template Salon Listing
*/
?>
<?php get_header();?>
<?php

 $current_user = wp_get_current_user();

if(isset($_POST['save_salon'])){
	
	//insertSalon();
}
?>

		<div id="main" class="wrap salon-listing">
			<div class="container">
				<div class="salon-listing-form">
					 
					 <form class="" action="" method="post">
						<input type="radio" name="pricing" value="salon-listing" checked>Salon Listing Special $27/month
						<br>
						<input type="radio" name="pricing" value="berber-shop">Barber Shop Listing Special $24/month
						<br>
						<input type="radio" name="pricing" value="professionals ">Professionals Only $19/month
					</form> 
				</div>
        	</div>
		</div>


<?php get_footer(); ?>
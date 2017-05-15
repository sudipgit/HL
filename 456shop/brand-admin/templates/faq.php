
  	<?php
	include_once('functions.php');
	$current_user = wp_get_current_user();
	 $c_user=get_userdata( $current_user->ID); 
	 $brand=get_brand_info($current_user->ID);
	  $thumbpath=getBrandThumbPath($brand->id);
	 $orders=getAllOrders($current_user->ID); 

	?>
 
<h3 class="heading-mosaic"><img alt="TrendingIcon" src="<?php bloginfo('template_url');?>/assets/img/TrendingIcon.png" width="20"/> FAQS</h3>

<div class="row-fluid stat-icons dash-page faqs" style="padding:0 10px;">
	<h4>1.) What is drop shipping? </h4>
	<p>Drop shipping is a method of shipping where you are electronically notified 
	that an item has been sold. You print the order and process the delivery 
	directly to the consumer.</p>
	
	<h4>2.) How do I get paid?</h4>
	<p>Once a month Hair Library pays out on the same day an automatic deposit 
	is sent into your bank account with all revenues minus commission plus 
	shipping costs.</p>
	
	<h4>3.) How do I manage my inventory?</h4>
	<p>When a product is sold, shipped and reviewed your inventory count is
	automatically updated. When your inventory drops lower than 10,  you will 
	be  notified that it is low. If it drops to 0, consumers will not be able to 
	purchase your products but will be notified by email when purchasable.</p>
	
	<h4>4.) How much time do I need to dedicate per week to the platform?</h4>
	<p>You will be automatically notified about inventory changes and sales. You 
	can spend 5 minutes a day to check your account at a glance about your 
	products statistics.</p>
	
	<h4>5.) What makes this different from Amazon? </h4>
	<p>This platform only allows one of each product and they can only be added 
	by the manufacturer. We offer a credible place for brands to be purchased 
	by consumers.</p>
	
	<h4>6.) How many products can we add? </h4>
	<p>Unlimited</p>
	
	<h4>7.) How long will it take to add products? </h4>
	<p>About 5 to 7 minutes as long as you have the information readily available.</p>
	
	<h4>8.) How does HL help to market our products? </h4>
	<p> We communicate to the affiliates about new products available to 
	promote. We communicate to the consumers about new products that are 
	matched for them.</p>
	
	<h4>9.) Who has access to my dashboard? </h4>
	<p>Only your brand's team members and Hair Library from when you need 
	assistance. Do not share your login information with everyone. We don't 
	recommend it. </p>
	
	<h4>10.) What if we want to change who our products are for? </h4>
	<p>You can simply log in and make any update on the fly. The algorithm 
	automatically updates to whom your product are intended for.</p>
	
	<h4> 11.) How do the affiliate partners get managed? </h4>
	<p>Hair Library manages all affiliate partners and commission payouts, leaving 
	you to create more great stuff!</p>
	

</div>
	
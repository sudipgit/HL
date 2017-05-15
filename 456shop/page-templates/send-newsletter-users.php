<?php
/*
Template Name:Send Newsletter to Users
*/
?>
<?php 
if(isset($_POST['send-email'])){
//source:functions/newsletters.php
sendUserNewsletterEmails();
}
get_header(); 
?>

	<div id="main" class="wrap-page hair-story single-photo">
			<div class="container">
	<div style="width:650px;margin: 0 auto;">
		<div style="margin-bottom:30px;">
			<a href="http://hairlibrary.com/register/"><img width="100%" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/newsletter-users/pic.png"/></a>
		</div>

		<div style=" margin: 0 auto 20px;border-bottom:1px dotted;padding-bottom: 20px;">
		
			<p>Hi! I'm Morgan, Founder of HairLibrary.com I wanted to share with you my vision of the future of beauty, where it is truly all about you. I understand the challenges of trying to find the right hair product that is made with your specific needs in mind. I am so proud to say that HairLibrary.com is the solution! My technology filters through over 1,300 products to help you find the perfect hair product for you... instantly!</p>
			<p>What is Hair Library?</p>
			<p>HairLibrary.com is a social commerce platform where you can :</p>
			<ul>
				<li><p>Get Matched With Products Based On Your Specific Needs</p></li>
				<li><p>Share Hair Stories</p></li>
				<li><p>Curate Your Own Product Library</p></li>
				<li><p>Discover New Products Added Daily</p></li>   
			</ul>
			<p>You can choose from the library of products to create meaningful Hair Stories and tagging products on your terms. Let Your Hair Be HEARD!! If you like it, meaningfully share your experience with the community to further help each other to discover products from around the world</p>
			<p>Getting started is super easy, we will be waiting for you on the other side.</p>
			<p>xoxo</p>
			<p>Morgan</p>
			<p>Founder of HairLibrary.com</p>
			
			
			
			
		</div>
		
		<div style="">
			<h2 style="margin: 0 0 40px;text-transform: uppercase;color: #3F3F3F;text-align: center;">
			here's a few thing you can do at hairlibary</h2>
		</div>
		
		<div style="">
			<div style=" width: 300px; float:left; text-align:center;">
				<img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/newsletter-users/pic14.png" width="160" />
			</div>
			<div style=" width: 350px; float:left;  text-align:center;">
				<h2 style="margin-top: 160px;border-bottom: 1px dotted #958E8E;text-transform: uppercase;">
					<span style="color: #333A3D;font-size: 35px;">1,300+ products </span><br />
					<span style="color: #31383C;font-size: 40px; letter-spacing:5px;">to </span>
					<span style="color: #41D6B7;font-size: 40px; letter-spacing:5px;">discover</span>
				</h2>
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<div style="">
			<div style="width: 350px;padding-bottom: 15px; margin-top: 15px; float:left; text-align:center;letter-spacing: 2px;">
				<h2 style="margin-top: 150px;border-bottom: 1px dotted #958E8E;text-transform: uppercase;">
					<span style="color: #333A3D;font-size: 25px;">view </span>
					<span style="font-size: 25px;color: #9E84BD;">products </span>
					<span style="font-size: 25px;color: #333A3D;">that <br />are a recommended </span>
					<span style="color: #9E84BD;letter-spacing:4px;">match </span><span style="color: #333A3D;letter-spacing:4px;">for </span><span style="color: #9E84BD;letter-spacing:4px;">you</span>
				</h2>
			
			</div>
			<div style=" width: 300px; float:left; text-align:center;">
				<img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/newsletter-users/pic13.png" width="160" />
			</div>
			<div style="clear:both;"></div>
		</div>
		<div style="">
			<div style=" width: 300px; float:left; text-align:center;">
				<img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/newsletter-users/pic12.png" width="160" />
			</div>
			<div style=" width: 350px; float:left; text-align:center;">
				<h2 style="margin-top: 130px;padding-bottom: 10px;border-bottom: 1px dotted #958E8E;text-transform: uppercase;letter-spacing: 2px; font-size:30px;">
				<span style="color: #333A3D;">tag your </span>
				<span style="color: #83D3F2;">favorite </span><br />
				<span style="color: #333A3D;">products & share <br />your </span>
				<span style="color: #83D3F2;">hair story</span>
				</h2>
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<div style="">
			<div style="width: 350px;padding-bottom: 15px; margin-top: 15px; float:left; text-align:center;">
				<h2 style="margin-top: 115px;border-bottom: 1px dotted #958E8E;padding-bottom: 15px;letter-spacing: 2px;text-transform: uppercase;">
					<span style="color: #333A3D;font-size: 30px;">stay in </span>
					<span style="font-size: 20px;color: #F3859F;">touch </span>
					<span style="font-size: 20px;color: #333A3D;">with </span><br />
					<span style="color: #333A3D; font-size:32px;;">those whom are </span><br />
					<span style="color: #F3859F; font-size:30px;">inspired </span>
					<span style="color: #333A3D; font-size:30px;">by </span>
					<span style="color: #F3859F; font-size:30px;">you</span>
				</h2>
			
			</div>
			<div style=" width: 300px; float:left; text-align:center;">
				<img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/newsletter-users/pic15.png" width="160" />
			</div>
			<div style="clear:both;"></div>
		</div>
	    
		<div style="margin:30px 0 20px 0;">
			<a href="http://hairlibrary.com/register/"><img width="650px;" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/newsletter-users/pic11.png"/></a>
		</div>
	</div>	
	
	
	    <div class="row-fluid" style="position:relative">
				
				 <form action="" method="post">
         <input type="submit" name="send-email" value="send email"/>
          </form>
				</div>
	
	</div>
	</div>		
<?php get_footer(); ?>
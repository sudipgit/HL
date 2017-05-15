<?php
/*
Template Name: Home After Template
*/
?>
<?php get_header(); 
$current_user = wp_get_current_user();
if($current_user->ID < 1)
{ ?>

 <script>
 window.location.href = '<?php bloginfo('url');?>/login/';
 </script>
<?php } 

 if(is_brand($current_user->ID))
 {?>
 <script>
 window.location.href = '<?php bloginfo('url');?>/dashboard/';
 </script>
 
 <?php
 }
?>
<style>
.new-after-home4 .section_1,
.new-after-home4 .section_2,
.new-after-home4 .section_3,
.new-after-home4 .section_4,
.new-after-home4 .section_5{
	margin-bottom: 30px;
}
.new-after-home4 .border{
	border:1px solid #d5d6d7;
}
.new-after-home4 .section_1 .brand_des{
	position: absolute;
	background: #E6218D;
	color: #fff;
	right:0;
	bottom:0;
	padding: 10px;
	height: 90px;
	  width: 120px;
}
.new-after-home4 .section_1 .product_des{
	position: absolute;
	background: #FD869F;
 bottom: 0;
    color: #fff;
    height: 80px;
    padding: 10px;
    left: 0;
    width: 100px
}
.new-after-home4 .sidebar_section_1,
.new-after-home4 .sidebar_section_2,
.new-after-home4 .sidebar_section_3,
.new-after-home4 .sidebar_section_4{
	margin-bottom:30px;
}
.new-after-home4 h3.title{
	font-size: 16px;
    line-height: 20px;
}
.new-after-home4 .r-title {
    color: #ff6771;
    font-size: 13px;
    line-height: 20px;
    text-transform: uppercase;
}
.new-after-home4 .pad{
	padding: 0 5px;
}
.new-after-home4 .color-title{
	font-size: 13px;
    line-height: 20px;
    text-transform: uppercase;
}
.new-after-home4 .ct{
text-align: center;
}
.new-after-home4 .recommend h2{
font-size: 13px; 
margin: 10px 0 0; 
line-height: 20px; 
text-transform: uppercase;
}
.new-after-home4  .white{
color: #fff;
}
.brand_des h5{
color: #fff;
margin: 0;
}
.brand_des h3{
color: #fff;
font-size: 16px;
    line-height: 16px;
}
.product_des h5{
color: #fff;
margin: 0;
}
.product_des h3{
color: #fff;
    font-size: 14px;
    line-height: 14px;
}
.new-after-home4 #up_signup_submit{
    background: #e6218d;
    border: none;
    border-radius: 3px;
    color: #fff;
    float: left;
    margin-left: 5px;
    padding: 3px 10px;
}
.new-after-home4 #up_signup{
 float: left;
    height: 16px;
    margin-left: 4px;
    width: 115px;
}
.new-after-home4 .up_signup_title{
font-size: 18px;
line-height: 10px;
}
.new-after-home4 .updated_box{
margin-bottom:30px;
}
</style>
<div id="main" class="new-after-home4">
	<div class="container container-wrap">
		<div class="row-fluid">	
			<div class="span9">	
				<div class="row-fluid section_1">	
					<div class="span8" style="position:relative;">	
						<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/1_wo.png" />
						<div class="brand_des pad">
							<h5 class="">Featured Brand</h5>
							<h3 class="">Long Luscious <br />Hair For Days</h3>
							<p>4 Naturals</p>
						</div>
					</div>
					<div class="span4" style="position:relative;">  
						<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/2_wo.png" />
						<div class="product_des pad">
							<h5 class="">Featured Brand</h5>
							<h3 class="">Top Products For Frizz-Free Hair</h3>							
						</div>
					</div>	
				</div>
				<div class="row-fluid section_2">	
					<div class="span3">	
						<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/3.png" />
					</div>
					<div class="span3">  
						<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/4.png" />
					</div>
					<div class="span3">	
						<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/5.png" />
					</div>
					<div class="span3">  
						<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/6.png" />
					</div>	
				</div>
				<div class="row-fluid section_3">
					<div class="span9 border" style="padding-bottom: 10px">
						<h2 class="r-title pad">Recommended By our Librarians</h2>
						<div class="row-fluid">
							<div class="span4 ct recommend">
								<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/7.png" />
								<a href="#"><h2 class="pad">curl craze lotion</h2></a>
								<p class="pad">4 Naturals</p>
							</div>
							<div class="span4 ct recommend">
								<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/7.png" />
								<a href="#"><h2 class="pad">curl craze lotion</h2></a>
								<p>4 Naturals</p>
							</div>
							<div class="span4 ct recommend">
								<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/7.png" />
								<a href="#"><h2 class="pad">curl craze lotion</h2></a>
								<p class="pad">4 Naturals</p>
							</div>
						</div>
						<a class="pull-right pad" href="#">View More</a>
					</div>
					<div class="span3 border">
						<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/8.png" />
						<h2 class="pad color-title" style="color: #E6218D;">Vedio</h2>
						<h3 class="title pad">The Best Hair Care.</h3>
						<p class="pad">Man love  thair hair as much as woman.thair hair as much as woman.hair as much as woman </p>
					</div>
				</div>
				<div class="row-fluid section_4">
					<div class="span9">
						<div class="row-fluid">
							<div class="span8 border" style="padding-bottom: 30px">
								<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/9.png" />
								<h2 class="pad color-title" style="color: #E6218D;">Vedio</h2>
								<h3 class="title pad">The Best Hair Care Products for Curly Hair.</h3>
								<p class="pad">Man love thair hair as much as woman, so why shouldn'n they gat the best products. </p>
							</div>
							<div class="span4 border">
								<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/10.png" />
								<h2 class="pad color-title" style="color: #E6218D;">Vedio</h2>
								<h3 class="title pad">The Best Hair Care Products for Curly Hair.</h3>
								<p class="pad">Man love thair hair as much as woman, so why shouldn'n they gat the best products. </p>
							</div>									
						</div>
					</div>
					<div class="span3 border">
						<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/10.png" />
						<h2 class="pad color-title" style="color: #E6218D;">Vedio</h2>
						<h3 class="title pad">The Best Hair Care Products for Curly Hair.</h3>
						<p class="pad">Man love thair hair as much as woman, so why shouldn'n they gat the best products. </p>
					</div>
				</div>
				<div class="row-fluid section_5">
					<div class="span9">
						<div class="row-fluid">
							<div class="span8 border" style="padding-bottom: 10px">
								<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/9.png" />
								<h2 class="pad color-title" style="color: #E6218D;">Vedio</h2>
								<h3 class="title pad">The Best Hair Care Products for Curly Hair.</h3>
								<p class="pad">Man love thair hair as much as woman, so why shouldn'n they gat the best products. Man love thair hair as much as woman, so why shouldn'n they gat the best products. </p>
							</div>
							<div class="span4 border">
								<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/10.png" />
								<h2 class="pad color-title" style="color: #E6218D;">Vedio</h2>
								<h3 class="title pad">The Best Hair Care Products for Curly Hair.</h3>
								<p class="pad">Man love thair hair as much as woman, so why shouldn'n they gat the best products. </p>
							</div>									
						</div>
					</div>
					<div class="span3 border">
						<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/10.png" />
						<h2 class="pad color-title" style="color: #E6218D;">Vedio</h2>
						<h3 class="title pad">The Best Hair Care Products for Curly Hair.</h3>
						<p class="pad">Man love thair hair as much as woman, so why shouldn'n they gat the best products. </p>
					</div>
				</div>				
			</div>
			<div class="span3"> 
				<div class="updated_box border">
					<h3 class="up_signup_title pad">Want to stay updated?</h3>
					<input type="text" name="up_signup" id="up_signup" />
					<input type="submit" name="up_signup_submit" id="up_signup_submit" value="SIGN UP" />
					<div class="clear"></div>
				</div>
				<div class="">
					<div class="border sidebar_section_1">
						<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/12.png" />
						<h2 class="pad color-title" style="color: #E6218D;">Vedio</h2>
						<h3 class="title pad">The Best Hair Care Products for Curly Hair.</h3>
						<p class="pad">Man love thair hair as much as woman, so why shouldn'n they gat the best products. </p>
					</div>
					<div class="border sidebar_section_2">
						<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/11.png" />
						<h2 class="pad color-title" style="color: #E6218D;">Vedio</h2>
						<h3 class="title pad">The Best Hair Care Products for Curly Hair.</h3>
						<p class="pad">Man love thair hair as much as woman, so why shouldn'n they gat the best products. </p>
					</div>
					<div class="border sidebar_section_3">
						<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/11.png" />
						<h2 class="pad color-title" style="color: #E6218D;">Vedio</h2>
						<h3 class="title pad">The Best Hair Care Products for Curly Hair.</h3>
						<p class="pad">Man love thair hair as much as woman, so why shouldn'n they gat the best products. </p>
					</div>
					<div class="border sidebar_section_4">
						<img src="<?php bloginfo("url")?>/wp-content/themes/456shop/assets/img/home/after/11.png" />
						<h2 class="pad color-title" style="color: #E6218D;">Vedio</h2>
						<h3 class="title pad">The Best Hair Care Products for Curly Hair.</h3>
						<p class="pad">Man love thair hair as much as woman, so why shouldn'n they gat the best products. </p>
					</div>						
				</div>
			</div>	
		</div>
	</div>
</div>

     <?php //} ?>   
<?php get_footer(); ?>
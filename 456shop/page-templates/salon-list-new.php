<?php
/*
   Template Name: Salon List New

*/
 


?>
<?php get_header('full');
 $current_user = wp_get_current_user();
 
 /*
 $cities=explode('-',$_GET['city']);
 
 $count=count($cities);
 
 $state=$cities[$count-1];
 
 $c=array();
 for($i=0;$i<$count-1;$i++)
  $c[]=$cities[$i];
  
$city=implode(' ',$c);


if(!isset($_GET['city'])){
	$salons=getCitySalons('New York','NY');
}*/


//$salons=getCitySalons('New York','NY');
$cities=array();
if($_SERVER["REQUEST_METHOD"] == "POST"){
$cities=explode('-',$_POST['city-search']);
 }
 else 
 {
  $cities=explode('-',$_GET['city']);
 }
 $count=count($cities);
 
 $state=$cities[$count-1];
 
 $c=array();
 for($i=0;$i<$count-1;$i++)
  $c[]=$cities[$i];
  
$city=implode(' ',$c);
$salons=getCitySalons($city,$state);
//var_dump($salons);

 
 ?>
  
		<div id="main" class="wrap-page salons">
				<div class="row-fluid">	   
					<div class="span12 search-bar">
						<div class="container">	
						<form action="" method="post">							
							<select class="city-search" name="city-search"  onchange="form.submit();">
								<option>
									Select City
								</option>
								
								<option value="New-York-NY" <?php if($_POST['city-search']=='New-York-NY') echo 'selected="selected"';?>>
									New York, NY
								</option>
								<option value="BROOKLYN-NY" <?php if($_POST['city-search']=='BROOKLYN-NY') echo 'selected="selected"';?>>
									BROOKLYN, NY
								</option>
								<option value="Bronx-NY" <?php if($_POST['city-search']=='Bronx-NY') echo 'selected="selected"';?>>
									Bronx, NY
								</option>
								
							</select>
						</form>
						
						<div class="icon-block">
							<div class="amenities-filter">
								<a class="filter" href="javascript:void()">
									
									Amenities
								</a>
								<div class="amenities">
									<h2>Amenities</h2>
									<ul>
										<li><a href="#" id="" >Wheel Chair Access</a></li>
										<li><a href="#" id="" >Kid Friendly</a></li>
										<li><a href="#" id="" >Good For Groups</a></li>
										<li><a href="#" id="" >Parking</a></li>
										<li><a href="#" id="" >Wifi</a></li>
										<li><a href="#" id="" >TV</a></li>
										<li><a href="#" id="" >Complimentary Refreshments</a></li>
										<li><a href="#" id="" >Organic Products</a></li>
										<li><a href="#" id="" >Unisex Salon</a></li>
										<li><a href="#" id="" >Hair Removal</a></li>
										<li><a href="#" id="" >Barber Shop</a></li>
									</ul>
								</div>
							</div>
							<a href="#" class="submit-listing-btn">Submit Listing</a>
						</div>
					</div>
						
						
				</div>		
				</div>
				<script>
					$('.amenities-filter a').click(function(){
						$('.amenities').toggle();
					});
				</script>
				<div class="row-fluid">	               				
					<div class="span5">
						<div class="map_area">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d117665.26691185765!2d89.54795122392578!3d22.83802470533043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1428498175160" width="100%" height="100%" frameborder="0" style="border:0"></iframe>																
						</div>
					</div>
					
					<div class="span7" style="margin:0;">
									
					<div class="row-fluid salon-list">
						<h2 class="s-result"><?php echo count($salons)?>  Results Found.</h2>
					<?php if(count($salons)>0)
					$i=1;
					 foreach($salons as $salon){?>					
					<?php //var_dump($salon);?>
					 <div class="span6 <?php if($i%2==1) echo 'first'?>">
						<div class="salon-info">
						<img src="http://www.deg-lab.com/portfolio/2/1.jpg">
						<div class="info">
						   <a class="hover-effect" href="<?php bloginfo('url');?>/single-salon/?n=<?php echo $salon->slug;?>"><h4 class="salons-title"><?php echo $salon->name;?></h4></a>
						  <p><?php echo $salon->address;?>, <?php echo $salon->city.', '.$salon->state;?></p>
						  
						  <?php 
						   $phone=$salon->area_code.$salon->phone;
						   $phone=str_replace(')',"",$phone);
						   $phone=str_replace('(',"",$phone);
						   $phone=str_replace('-',"",$phone);
						   $phone=str_replace(' ',"",$phone);
							 
						  $length=strlen($phone);
						  $pnone_no="";
						  if($length==10)
						  {
							$pnone_no='('.substr($phone,0,3).') '.substr($salon->phone,3,3).'-'.substr($salon->phone,6);
						  }
						  else if($length==11)
						  {
						 $pnone_no=substr($phone,0,1).'('.substr($phone,1,3).') '.substr($salon->phone,4,3).'-'.substr($salon->phone,7);
						  }
						  
						   
						  ?> 
						  <p>Phone: <?php echo $pnone_no;?></p>
						  <div class="feed-heart-button"><div class="heart-button section"><a onclick="getHeartLoginPopup('')" title="Please login to like this photo" href="javascript:void();" class="like-button after-like"></a><span id="like-no-146">0</span>
		              	<div class="clear"></div>
			       </div></div>
						 </div> 
						
						 </div> 
					 </div>
					
					<?php $i++; }?>
					</div>
					
					</div>
			         
				
                </div>
			
		</div>
  <style>
  .salons .search-bar form{
	 float:left; 
	margin:0;
  }
  .salons .salon-list{
	  
	padding-top:60px;
  }
  .salons .amenities ul{
	  margin:0;
	
  }
  .salons .amenities ul li{
	 display:inline-block;
	 margin:8px 0;
  }
  .salons .amenities ul li a{
	border:1px solid #ddd;
	border-radius:4px;
	   padding: 5px;
    text-decoration: none;
  }
  .salons .amenities h2{
	  margin:0;
	  font-size:20px;
  }
  .salons .amenities{
	  background:#fff;
	display:none;
	position:absolute;
	right:0;
	top:45px;
	width:400px;
	height:150px;
	border: 1px solid #ddd;
	padding:10px;
	z-index: 9999;
	text-align: left;
  }
  .salons .search-bar .icon-block{
	   
	  float:right;
    text-align: center;
	width:250px;
	margin-top: 10px;
  }
  .salons .search-bar .amenities-filter{	   
	  float:left;
		position:relative;	  
  }
  .salons .search-bar .amenities-filter a.filter{	   
	    background: url("http://nextuphair.com/images/mens-haircut-dark.svg") no-repeat scroll 50% 3px / 20px 20px rgba(0, 0, 0, 0);
 padding-top: 22px;
    text-decoration: none;
    vertical-align: middle;		
     display:block;
	 padding
	}
  .salons .search-bar .submit-listing-btn{	   
	  float:left;	
    background-color: #d9197e;
    border-radius: 5px;
    color: #ffffff;
    cursor: pointer;
    float: left;
    font-size: 14px;
    font-weight: bold;
    margin-left: 30px;
    overflow: visible;
    padding: 8px 15px;
    text-decoration: none;	  
  }
  .salons .search-bar .icon{
	  background:url('http://hairlibrary.com/wp-content/themes/456shop/assets/img/salon-list/mens-haircut-dark.svg') no-repeat;
		  display: inline-block;
    height: 20px;
    width: 30px;
	
  }
  .salons .search-bar .title{
	   background: none repeat scroll 0 0 transparent;
    border: 0 none;
    font-size: 100%;
        margin-top: 5px;
    outline: 0 none;
    padding: 0;
    text-decoration: none;
    vertical-align: baseline;
  }
  .salons .search-bar form{
	  
	margin:0;
  }
  .salons .search-bar .city-search{
	  
	-moz-appearance:none;
	 -webkit-appearance:none;
	 appearance:none;
	 margin:10px 0;
	 ridth:300px;
	 height:35px;
  }
  .salons .search-bar{
	  
	  background:#fff;
	  position:fixed;
		z-index:99999;
	}
    .salons 
	{
	font-family: garamond;
	}
	  .salons p
	  {
	  line-height:14px;
	  }

	   .salons .left-bar ul li
	   {
	   

    line-height: 24px;
	   }
	      .salons .left-bar ul li a
	   {
	   
	   font-size: 12px;
       color:#222;
	   }
	    .salons .left-bar ul li a:hover
		{
		background:none;
		}
  .salons .map_area{
	  position: fixed;
    width: 500px;
	top:100px;
	height:100%;
  }
  .salons .s-result{
	  font-size:16px;
	  color:#666;
	  
  }
  .salons .salons-title{
	font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
  }
    .salons .salons-title a{
	text-decoration:none;
	color:#000;
  }
  .salons h3.title-1 {
    border-bottom: 1px dotted #ccc;
    text-align: center;
}
.salons h3.title-1 span {
    background: none repeat scroll 0 0 #fff;
    display: block;
    margin-bottom: -20px;
    margin-left: auto;
    margin-right: auto;
    width: 110px;
}
.salons h3.title {
    font-family: Garamond;
    font-size: 20px;
    margin-bottom: 20px;
    margin-top: 0;
    text-transform: uppercase;
}
.salons .left-bar ul{
    list-style:none;
	margin:10px 0;
}
.salons .left-bar ul li a:hover{
    text-decoration:none;
}
.salons .row-fluid .first{
margin-left:0;
clear:both;
}

.salons .left-bar h3.salons-title
{
margin-top:0;
}
	 .salons .left-bar  #accordion ul
	 {
	 height:auto !important;
	 
	 }
	  .salons .left-bar  #accordion h3
	  {
	   font-size: 14px;
    line-height: 23px;
    margin-bottom: 0;
    text-transform: uppercase;
	cursor:pointer;
	  }
	   .salons .left-bar
	   {
	   margin-bottom:20px;
	   }
	 .salons .left-bar  #accordion h3.ui-accordion-header-active
	 {
	 font-weight:bold;
	 }
  </style>
<?php get_footer('full'); ?>
	
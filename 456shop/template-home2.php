<?php
/*
Template Name: New Home Template
*/
?>
 
<?php get_header(); ?>
<style type="text/css">
.special-home {
	width: 96%;
}
.special-home .NAPleftCol {
    border-right: 1px solid #000000;
    float: left;
    width: 550px;
}
.special-home .NAPmarketTitle {
    float: left;
    font-family: GillSans;
    font-size: 26px;
    height: 46px;
    margin-top: -6px;
    text-align: center;
    text-transform: uppercase;
    width: 500px;
}
.special-home .NAPmarketWidth {
    background: url("http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/keyline.gif") repeat-x scroll 0 0 rgba(0, 0, 0, 0);
    margin: 0 auto;
}
.special-home .NAPtextWhite {
    background-color: #FFFFFF;
    padding: 0 12px;
}
.special-home .NAPmarketStoryHolder {
    float: left;
    position: relative;
	margin-bottom:30px;
}
.special-home .NAPmarketStoryHolderLast {
    float: left;
    position: relative;
	margin-bottom:15px;
}
.special-home .NAPmarketStoryTextHolder {
    left: 150px;
    position: absolute;
    top: 270px;
    width: 270px;
}
.special-home .NAPmarketStoryText {
    background-color: #FFFFFF;
    display: table;
    font-family: GillSans;
    font-size: 20px;
    height: 55px;
    margin: 0 auto;
    padding: 0 12px;
    text-align: center;
}
.special-home .NAPmarketDesigner {
    font-family: GillSans;
    font-size: 20px;
    height: 20px;
    margin-top: 6px;
    text-transform: uppercase;
}
.special-home .NAPmarketDesignerSubtext {
    font-family: ModernNAP-Display;
    font-size: 18px;
}
.special-home .NAPmarketStory {
    float: left;
    height: 300px;
    margin-left: 50px;
    width: 450px;
}
.special-home .NAPmagContent a, .special-home .NAPmarketStoryHolder a , .special-home .NAPmarketStoryHolderLast .NAPmarketStoryText a {
    color: #000000;
    text-decoration: none;
}







.special-home .NAPrightCol {
    float: right;
    margin-top: 20px;
    width: 389px;
}
.special-home .fit-image{
	margin-left:20px;
}
.special-home .NAPmagTitle, .special-home .NAPmagTitle1{
	background: url("http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/keyline.gif") repeat-x scroll 0 0 rgba(0, 0, 0, 0);
    float: left;
    font-family: ModernNAP-DisplayItalic;
    font-size: 28px;
    height: 30px;
    margin: 15px 0 15px 20px;
    padding-top: 5px;
    text-align: center;
    width: 380px;
}
.special-home .NAPmagTitle1 {
	margin: 30px 0 15px 0px;
    width: 510px;
 }
.special-home .NAPmagTitle .NAPtextWhite {
    background-color: #FFFFFF;
    padding: 0 12px;
}

.special-home .NAPmagContent {
	background:url('http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/SubStoryBG.jpg');
	background-size:100% 100%;
    display: block;
    float: left;
    height: 1122px;
    margin-left: 20px;
    width: 370px;
}

.special-home .NAPmagStoryA1, .special-home .NAPmagStoryA, .special-home .NAPmagStoryB {
    height: 216px;
    margin-bottom: 10px;
    position: relative;
    width: 520px;
}

.special-home .NAPmagContent a, .special-home .NAPmarketStoryHolder a {
    color: #000000;
    text-decoration: none;
}
.special-home .NAPmagStoryA1 .NAPstoryTitle {
    font-family: ModernNAP-SuperDisplay;
    font-size: 34px;
    line-height: 32px;
    margin-left: 170px;
    margin-top: 55px;
    width: 206px;
}
.special-home .NAPmagStoryA .NAPstoryTitle {
    font-family: ModernNAP-SuperDisplay;
    font-size: 34px;
    line-height: 32px;
    margin-left: 170px;
    margin-top: 20px;
    width: 206px;
}
.special-home .NAPmagStoryA1 .NAPstorySubtext, .special-home .NAPmagStoryA .NAPstorySubtext {
    font-family: ModernNAP-DisplayItalic;
    font-size: 18px;
    line-height: 22px;
    margin-left: 170px;
    width: 206px;
}
.special-home .NAPmagStoryB .NAPstoryTitle {
    font-family: ModernNAP-SuperDisplay;
    font-size: 34px;
    line-height: 32px;
    margin-left: -30px;
    margin-top: 0px;
    text-align: right;
    width: 242px;
}
.special-home .NAPmagStoryB .NAPstorySubtext {
    font-family: ModernNAP-DisplayItalic;
    font-size: 18px;
    line-height: 22px;
    margin-left: -30px;
    text-align: right;
    width: 242px;
}
.special-home .NAPstoryLink {
    display: block;
    float: left;
    height: 216px;
    left: 0;
    margin-bottom: 10px;
    position: absolute;
    top: 0;
    width: 520px;
    z-index: 5;
}
.special-home .prev-issue{
	width:100%;
}
.special-home .prev-issue a.issue-image{
	float:left;
	width:166px;
	margin-right:7px;
}
.special-home .home-bottom-slider{
	margin-top:50px;
	display:block;
}
.clr{
	clear:both;
}
</style>

<div id="main" class="wrap special-home">
	<div class="container">
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Front Meta') ) ?>
		<div class="row-fluid">	
			<div class="span12 post-page">	
			
			
			

				<div class="NAPleftCol">
					<div class="NAPmarketTitle">
						<div class="NAPmarketWidth">
							<span class="NAPtextWhite">Shop By Hair Category</span>
						</div>
					</div>
					<div class="NAPmarketStoryHolder">
						<div class="NAPmarketStoryTextHolder">
							<div class="NAPmarketStoryText">
								<div class="NAPmarketDesigner">
									<a href="#"> Trend Report: </a>
								</div>
								<div class="NAPmarketDesignerSubtext">
									<a href="#">The modern lady</a>
								</div>
							</div>
						</div>
						<div class="NAPmarketStory">
							<a href="#">
								<img height="300px" width="450px" alt="Trend Report: - The modern lady" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/Marketing1.jpg">
							</a>
						</div>
					</div>
					<div class="NAPmarketStoryHolder">
						<div class="NAPmarketStoryTextHolder">
							<div class="NAPmarketStoryText">
								<div class="NAPmarketDesigner">
									<a href="#"> New Designer: </a>
								</div>
								<div class="NAPmarketDesignerSubtext">
									<a href="#">Cédric Charlier</a>
								</div>
							</div>
						</div>
						<div class="NAPmarketStory">
							<a href="">
								<img height="300px" width="450px" alt="New Designer: - Cédric Charlier" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/Marketing2.jpg">
							</a>
						</div>
					</div>

					
					<div class="NAPmarketStoryHolder">
						<div class="NAPmarketStoryTextHolder">
							<div class="NAPmarketStoryText">
								<div class="NAPmarketDesigner">
									<a href="#"> Style Masterclass: </a>
								</div>
								<div class="NAPmarketDesignerSubtext">
									<a href="#">How to refresh your denim</a>
								</div>
							</div>
						</div>
						<div class="NAPmarketStory">
							<a href="#">
								<img height="300px" width="450px" alt="Style Masterclass: - How to refresh your denim" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/Marketing3.jpg">
							</a>
						</div>
					</div>
					<div class="NAPmarketStoryHolder">
						<div class="NAPmarketStoryTextHolder">
							<div class="NAPmarketStoryText">
								<div class="NAPmarketDesigner">
									<a href="#"> Just Landed: </a>
								</div>
								<div class="NAPmarketDesignerSubtext">
									<a href="#">Marc Jacobs' new collection</a>
								</div>
							</div>
						</div>
						<div class="NAPmarketStory">
							<a href="#">
							<img height="300px" width="450px" alt="Just Landed: - Marc Jacobs" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/Marketing4.jpg">
							</a>
						</div>
					</div>
					<div class="NAPmarketStoryHolder">
						<div class="NAPmarketStoryTextHolder">
							<div class="NAPmarketStoryText">
								<div class="NAPmarketDesigner">
									<a href="#"> The Detail: </a>
								</div>
								<div class="NAPmarketDesignerSubtext">
									<a href="#">Daytime embellishment</a>
								</div>
							</div>
						</div>
						<div class="NAPmarketStory">
							<a href="#">
							<img height="300px" width="450px" alt="The Detail: - Daytime embellishment" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/Marketing5.jpg">
							</a>
						</div>
					</div>
					<div class="NAPmarketStoryHolder">
						<div class="NAPmarketStoryTextHolder">
							<div class="NAPmarketStoryText">
								<div class="NAPmarketDesigner">
									<a href="#"> Investment pieces: </a>
								</div>
								<div class="NAPmarketDesignerSubtext">
									<a href="#">Jewelry with edge</a>
								</div>
							</div>
						</div>
						<div class="NAPmarketStory">
							<a href="#">
								<img height="300px" width="450px" alt="Investment pieces: - Jewelry with edge" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/Marketing6.jpg">
							</a>
						</div>
					</div>
					<div class="NAPmarketStoryHolder">
						<div class="NAPmarketStoryTextHolder">
							<div class="NAPmarketStoryText">
								<div class="NAPmarketDesigner">
									<a href="#"> The Chic 50: </a>
								</div>
								<div class="NAPmarketDesignerSubtext">
									<a href="#">Sorbet-shade accessories</a>
								</div>
							</div>
						</div>
						<div class="NAPmarketStory">
							<a href="#">
								<img height="300px" width="450px" alt="The Chic 50: - Sorbet-shade accessories" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/Marketing7.jpg">
							</a>
						</div>
					</div>
					<div class="NAPmarketStoryHolderLast">
						<div class="NAPmarketStoryTextHolder">
							<div class="NAPmarketStoryText">
								<div class="NAPmarketDesigner">
									<a href="#"> LIMITED EDITION: </a>
								</div>
								<div class="NAPmarketDesignerSubtext">
									<a href="#">Charlotte Tilbury’s beauty box</a>
								</div>
							</div>
						</div>
						<div class="NAPmarketStory">
							<a href="#">
								<img height="300px" width="450px" alt="LIMITED EDITION: - Charlotte Tilbury’s beauty box" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/Marketing8.jpg">
							</a>
						</div>
					</div>

					<div class="NAPmagTitle1">
						<span class="NAPtextWhite">Read & shop previous issues</span>
					</div>
					<div class="prev-issue">
						<a class="issue-image" href="#">
							<img height="195px" width="290px" alt="Enchanted Evenings" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/cover_en_003.jpg">
						</a>
						<a class="issue-image" href="#">
							<img height="195px" width="290px" alt="The Vacation Issue" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/cover_en.jpg">
						</a>
						<a class="issue-image" href="#">
							<img height="195px" width="290px" alt="The Big Easy" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/cover_en_002.jpg">
						</a>
					</div>
					<div class="clr"></div>
				</div>
				
				
				<div class="NAPrightCol">
					<div class="fit-image">
						<a href=""><img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/home/EditCover.jpg" alt="Enchanted Evenings" /></a>
					</div>
					<div class="NAPmagTitle">
						<span class="NAPtextWhite">Also in this week's magazine...</span>
					</div>
					<div class="NAPmagContent">
						<div class="NAPmagStoryA1">
							<a class="NAPstoryLink" href="#"></a>
							<div class="NAPStoryText">
								<div class="NAPstoryTitle">
									<a href="#">Reveal and CONCEAL</a>
								</div>
								<div class="NAPstorySubtext">
									<a href="#">Embody modern elegance in sheer, seductive lace</a>
								</div>
							</div>
						</div>
						<div class="NAPmagStoryB">
							<a class="NAPstoryLink" href="#"></a>
							<div class="NAPStoryText">
								<div class="NAPstoryTitle">
									<a href="#">“I don’t believe IN RULES”</a>
								</div>
								<div class="NAPstorySubtext">
									<a href="#">Über-stylist Lori Goldstein on her red-carpet secrets</a>
								</div>
							</div>
						</div>
						<div class="NAPmagStoryA">
							<a class="NAPstoryLink" href="#"></a>
							<div class="NAPStoryText">
								<div class="NAPstoryTitle">
									<a href="#">Exquisite ERDEM</a>
								</div>
								<div class="NAPstorySubtext">
									<a href="#">A masterclass in the new cocktail style – just add flats</a>
								</div>
							</div>
						</div>
						<div class="NAPmagStoryB">
							<a class="NAPstoryLink" href="#"></a>
							<div class="NAPStoryText">
								<div class="NAPstoryTitle">
									<a href="#">Eveningwear REDEFINED</a>
								</div>
								<div class="NAPstorySubtext">
									<a href="#">Stand out in contemporary after-dark pieces</a>
								</div>
							</div>
						</div>
						<div class="NAPmagStoryA">
							<a class="NAPstoryLink" href="#"></a>
							<div class="NAPStoryText">
								<div class="NAPstoryTitle">
									<a href="#">Night-time GLAMOR</a>
								</div>
								<div class="NAPstorySubtext">
									<a href="#">Beauty looks for wherever the evening may take you</a>
								</div>
							</div>
						</div>
					</div>

				</div>
				
				<div class="clr"></div>
				
				<div class="home-bottom-slider">
					<div id="left-button"></div>
					<?php echo do_shortcode('[showbiz home-page]');?>
					<div id="right-button"></div>
				</div>
				
			
			</div>
		</div>
	</div>
</div>
        
<?php get_footer(); ?>
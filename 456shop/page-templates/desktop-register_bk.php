<?php
 $f_post=null;
   if($_POST['is_submit']==1)
   {	 
	 $f_post=$_POST;
	 }
?>
<script>
 function formValidationD()
  {

   var is_agree=document.forms["d-user-register"]["agree"].checked;
	  var v1=document.forms["d-user-register"]["fname"].value;
	  var v2=document.forms["d-user-register"]["lname"].value;
	  var v5=document.forms["d-user-register"]["username"].value;
	  var v3=document.forms["d-user-register"]["email"].value;
	  var p1=document.forms["d-user-register"]["password"].value;
	  var p2=document.forms["d-user-register"]["con_password"].value;
	  var v4=document.forms["d-user-register"]["age"].value;
	  var v6=document.forms["d-user-register"]["zipcode"].value;
  
	  if(v1=="" || v2=="" || v3=="" || v4=="" || v5=="" || v6=="" || p1=="" || p2=="")
	  {
		  alert('* Field should not be empty');
	         return false;

		  
		  
	  }else if(p1!=p2)
	  {
	  alert('Password Does not match');
         return false;
	  
	  }
	  
	  if(!is_agree)
	  {
	   alert('Please agree with HairLibrary.com user agreement');
	   return false;
	   }
	  
	  return true;
	  }


</script>

	  <div class="user-register desktop-display">	 

		   <div id="first-step-desktop" class="desktop-before-signup"  style="margin-top:-40px; <?php if($f_post) echo 'display:none;'?>">			
			   <img width = "100%" src="<?php bloginfo('template_url');?>/assets/img/register/desktop_register_cover.png" />			
				
				<div class="get-started">	
				<a class="get-started-btn" href="javascript:void();">Get Started</a>
			   </div>
			 </div>
	       <div class="desktop-user-registraion" id="desktop-panel" style="<?php if($f_post) echo 'display:block;'; else echo'display:none'?>">
          
		    <div class="panel-holder">
			<div class="inner-holder in-h-c" id="d-in-h" style="height:<?php if($f_post) echo '830px;'; else echo '500px;'?>  background:<?php if($f_post) echo '#FDD4CE;'; else echo '#FD6571;'?>">
			 <div id="d-panel-content" style="visibility: visible; width: 8170px; <?php if($f_post) { echo 'left: -5820px;';} else { echo 'left: 0px;';}?>">
			 <?php if( !is_user_logged_in() ) {?> 
			  <form name="d-user-register" action="" method="post" onsubmit="return formValidationD();">
			    <!-- panel1 Hair Category --> 
                 <div class="panel panel1">
				 <div class="questions">   
				 <p class="hair-type">What is your Hair Style?</p>
				   <div class="question-images">   
				   
					<ul class="d-hair-style">
					
					  <li>
					   <a class="hc_style" href="javascript:void();" title="188"><img alt="Relaxed Straight Hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair-straight.png" width="175px" />
					   <label>Straight</label>
					   </a>	
						
					  </li>
					   <li>
					    <a class="hc_style" href="javascript:void();" title="189"><img alt="Naturally Curly Hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair-curly.png"width="175px" />
						<label>Curly</label>
						</a>
						
					  
					  </li>
					  <li>
					    <a class="hc_style" href="javascript:void();" title="250"><img alt="Braids" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair-braids.png"width="175px" />
						<label>Braids</label>
						</a>
						
					  
					  </li>	
					  <li>
					    <a class="hc_style" href="javascript:void();" title="179"><img alt="Dreds" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair-locks.png"width="175px" />
						<label>Locks</label>
						</a>
						
					    
					  </li>
				<div class="clearfix"></div>
					</ul> 
					<div class="clear"></div>
				   </div>	
</div>				   
				   <div class="btn-section">
						<ul>
							<li>
								<a href="javascript:void();"onclick="prev_button_desktop(0)" >Back</a>
							</li>
							<li>
								<ul class="bullet">
									<li class="active"></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
								</ul>
							</li>
						</ul>
					</div>
				 </div> 
	            <!-- panel1 Hair Category End --> 
				
				
				<!-- panel2 Hair Category --> 
                 <div class="panel panel2">
				  <div class="questions"> 
				 <p class="hair-type">What is your hair Length?</p>
				   <div class="question-images">
				    <ul class="d-hair-length">
					  <li>
					    <a class="hc_length" href="javascript:void();" title="v_short"><img src="<?php bloginfo('template_url'); ?>/assets/img/register/very-short-hair.png"width="100px" /></a>
					  
					  </li>
					  <li>
					    <a class="hc_length" href="javascript:void();" title="short"><img src="<?php bloginfo('template_url'); ?>/assets/img/register/short-hair.png"width="96px" /></a>
					  
					  </li>
					  <li>
					    <a class="hc_length" href="javascript:void();" title="medium"><img src="<?php bloginfo('template_url'); ?>/assets/img/register/medium-hair.png"width="100px" /></a>
					 
					  </li>
					  <li>
					    <a class="hc_length" href="javascript:void();" title="long"><img src="<?php bloginfo('template_url'); ?>/assets/img/register/long-hair.png"width="96px" /></a>
					  
					  </li>
					   <li>
					    <a href="javascript:void();" title="v_long"><img src="<?php bloginfo('template_url'); ?>/assets/img/register/very-long-hair.png"width="105px" /></a>
					  
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	
</div>				   
					<div class="btn-section">
						<ul>
							<li>
								<a class="back-to-style" href="javascript:void();"onclick="prev_button_desktop(0)" >Back</a>
							</li>
							<li>
								<ul class="bullet">
									<li></li>
									<li class="active"></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
								</ul>
							</li>
						</ul>
					</div>
				 </div> 
	            <!-- panel2 Hair Category End --> 
				
				<!-- panel3 Hair Category --> 
                 <div class="panel panel3">
				  <div class="questions"> 
				 <p class="hair-type">What is your Hair Texture?</p>
				   <div class="question-images">
				    <ul class="d-hair-texture ">
					  <li id="texture-st">
					   <a  class="hc_texture" href="javascript:void();" title="1a"><img alt="1a" width="110px" src="<?php bloginfo('template_url'); ?>/assets/img/register/1a.png"/></a>
					  </li>
					   <li>
					  <a  class="hc_texture" href="javascript:void();" title="2a"><img alt="2a" width="110px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/2a.png"/></a>
					  </li>
					   <li>
						<a  class="hc_texture" href="javascript:void();" title="2b"><img alt="2b" width="110px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/2b.png"/></a>
					  </li>
					  <li>
					   <a class="hc_texture"  href="javascript:void();" title="2c"><img alt="2c" width="110px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/2c.png"/></a>
					  </li>
					  <li>
					   <a  class="hc_texture" href="javascript:void();" title="3a"><img alt="3a" width="110px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/3a.png"/></a>
					  </li>
					  <li>
					   <a class="hc_texture"  href="javascript:void();" title="3b"><img alt="3b"  width="110px" src="<?php bloginfo('template_url'); ?>/assets/img/register/3b.png"/></a>
					  </li>
					  <li>
					  
					   <a  class="hc_texture" href="javascript:void();" title="3c"><img alt="3c" width="110px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/3c.png"/></a> 
					  </li>
					  <li>
					   <a class="hc_texture"  href="javascript:void();" title="4a"><img alt="4a"  width="110px" src="<?php bloginfo('template_url'); ?>/assets/img/register/4a.png"/></a>
					  </li>
					  <li>
					   <a class="hc_texture" href="javascript:void();" title="4b"><img alt="4b"  width="110px" src="<?php bloginfo('template_url'); ?>/assets/img/register/4b.png"/></a>
					  </li>
					  <li>
					   <a class="hc_texture" href="javascript:void();" title="4c"><img alt="4c" width="110px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/4c.png"/></a>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					</div>
					</div>
					<div class="btn-section">
						<ul>
							<li>
								<a class="back-to-length" href="javascript:void();"onclick="prev_button_desktop(830)" >Back</a>
							</li>
							<li>
								<ul class="bullet">
									<li></li><li></li><li class="active"></li><li></li><li></li><li></li><li></li>
								</ul>
							</li>
						</ul>
					</div>
				 </div> 
	            <!-- panel3 Hair Category End --> 
				
				<!-- panel4 Hair Category --> 
                 <div class="panel panel4">
				  <div class="questions"> 
				 <p class="hair-type">What Chemical Treatments Do You Have?</p>
				   <div class="question-images">
				    <ul class="d-hair-treatment">
					<!-- Don't remove class from a -->
					<li class="process-stli hide" id="d-r-straight">
					   <a class="d-h-process" href="javascript:void();" title="r_straight"><img alt="Relaxed Straight" src="<?php bloginfo('template_url'); ?>/assets/img/register/relaxed-straight.png" width="200px" />
					  <label>Straighteners </label></a>
					  </li>
					 <li class="process-crli hide" id="d-p-curly">
					   <a  class="d-h-process" href="javascript:void();" title="p_curly"><img alt="Permed Curly" src="<?php bloginfo('template_url'); ?>/assets/img/register/purmed-curly.png" width="200px" />
					  <label>Texturizer</label></a>
					  </li>
					  <li class="process-crli">
					    <a href="javascript:void();" title="yes"><img alt="Color" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair_color.png" width="200px" />
					  <label>Hair Color</label></a>
					  </li>
					  <li id="pn-li" class="last-child">					   
					  <a class="d-h-process" href="javascript:void();" title="none">None</a>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	
               </div>				   
				   <div class="btn-section">
						<ul>
							<li>
								<a class="back-to-texture" href="javascript:void();"onclick="prev_button_desktop(1660)" >Back</a>
							</li>
							<li>
								<ul class="bullet">
									
									<li></li>
									<li></li>
									<li></li>
									<li class="active"></li>
									<li></li>
									<li></li>
									<li></li>
								</ul>
							</li>
							<li>
								<a href="javascript:void();" onclick="nextTreatmentDesktop()" >Next</a>
							</li>
						</ul>
					</div>

				 </div> 
	            <!-- panel4 Hair Category End --> 
				
				<!-- panel5 Hair Category --> 
                 <div class="panel panel5">
				  <div class="questions"> 
				 <p class="hair-type">What are your Hair Conditions?</p>
				   <div class="question-images">
				    <ul class="d-hair-conditions">
					  <li >
					   <a href="javascript:void();" title="o_scalp"><img alt="Oily Scalp" src="<?php bloginfo('template_url'); ?>/assets/img/register/oily-scalp.png"/><label>Oily</label></a>
					   
					  </li>
					  <li class="notall">
					   <a href="javascript:void();" title="p_bald"><img alt="Pattern Baldness" src="<?php bloginfo('template_url'); ?>/assets/img/register/pattern-baldness.png"/><label>Pattern Baldness</label></a>
					   
					  </li>
					 <li class="notall">
					   <a href="javascript:void();" title="alopecia"><img alt="Alopecia" src="<?php bloginfo('template_url'); ?>/assets/img/register/alpecia.png"/><label>Alopecia</label></a>
					   
					  </li>
					 <li class="notall">
					   <a  href="javascript:void();" title="g_hair"><img alt="Grey Hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/gray-hair.png"/><label>Grey Hair</label></a>
					   
					  </li>
					  <li class="notall">
					   <a href="javascript:void();" title="sp_ends"><img alt="Split Ends" src="<?php bloginfo('template_url'); ?>/assets/img/register/split-ends.png"/><label>Split Breakage</label></a>
					   
					  </li>
					  					  <li>
					   <a href="javascript:void();" title="dry_scalp"><img alt="Dry Itchy" src="<?php bloginfo('template_url'); ?>/assets/img/register/dry-scalp.png"/><label>Dry Itchy</label></a>
					   
					  </li>
					  <li class="last-child notall">
					  <a href="javascript:void();" title="normal">Normal</a>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>
				   </div>

					 <div  class="btn-section">
						<ul>
							<li>
								<a class="back-to-treatment" href="javascript:void();"onclick="prev_button_desktop(2490)" >Back</a>
							</li>
							<li>
								<ul class="bullet">
									<li ></li>
									<li></li>
									<li></li>
									<li></li>
									<li class="active"></li>
									<li></li>									
									<li></li>

								</ul>
							</li>
							<li>
								<a href="javascript:void();"onclick="nextCondDesktop()" >Next</a>
							</li>
						</ul>
					</div>

				 </div> 
				 
				 
				 
				 
				<!-- panel5 Hair Category --> 
                 <div class="panel panel15">
				  <div class="questions"> 
				 <p class="hair-type">What is Your Hair Description?</p>
				   <div class="question-images">
				    <ul class="d-hair-des">
					  <li>
					  <a href="javascript:void();" title="coarse">Coarse</a>
					  </li>
					   <li >
					  <a href="javascript:void();" title="soft">Soft</a>
					  </li>
					   <li >
					  <a href="javascript:void();" title="fine">Fine</a>
					  </li>
					   <li >
					  <a href="javascript:void();" title="thin">Thin</a>
					  </li>
					 <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>
</div>				   
					<div class="btn-section">
						<ul>
							<li>
								<a class="back-to-condition" href="javascript:void();"onclick="prev_button_desktop(3320)" >Back</a>
							</li>
							<li>
								<ul class="bullet">
									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li class="active"></li>
									<li></li>
								</ul>
							</li>
							<li>
								<a href="javascript:void();"onclick="nextDesDesktop()" >Next</a>
							</li>
						</ul>
					</div>
				 </div> 
	          
	          
				
					<!-- panel6 Hair Category --> 
                <div class="panel panel8">
				 <div class="questions"> 
				 <p class="hair-type">What is your Demographic?</p>
				   <div class="question-images">
				    <ul class="d-hair-demograph">
					  <li>
					  <a class="hc_demograph" href="javascript:void();" title="Afb">African/ Black</a>
					  </li>
					  <li>
					  <a class="hc_demograph" href="javascript:void();" title="Cau">Caucasian</a>
					  </li>
					  <li>
					  <a class="hc_demograph" href="javascript:void();" title="Euro">European</a>
					  </li>
					  <li>
					  <a class="hc_demograph" href="javascript:void();" title="Spnsh">Spanish/Latin</a>
					  </li>
					   <li>
					  <a class="hc_demograph" href="javascript:void();" title="Asn">Asian</a>
					  </li>
					    <li>
					  <a class="hc_demograph" href="javascript:void();" title="Indn">Indian</a>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>
				   </div>
					  <div class="btn-section">
						<ul>
							<li>
								<a class="back-to-des" href="javascript:void();"onclick="prev_button_desktop(4150)" >Back</a>
							</li>
							<li>
								<ul class="bullet">
									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
									
									<li></li>
									<li class="active"></li>
								</ul>
							</li>

						</ul>
					</div>
				 </div>  
	            <!-- panel6 Hair Category End --> 
				
				<!-- panel7 Hair Category --> 
                 <div class="panel panel7">
				
				 <div class="reg-info">
				  <p class="hair-type">You are one step away from completion </p>
				  <ul>
				  <li>
				   <label>First name<span>*</span>:</label>
				    <input type="text" name="fname" value="<?php if($f_post) echo $f_post['fname'];?>"/>
				  </li>
				  <li>
				   <label>Last name<span>*</span>:</label>
				    <input type="text" name="lname" value="<?php if($f_post) echo $f_post['lname'];?>"/>
				  </li>
				   <li>
				   <label>Username<span>*</span>:</label>
				    <input type="text" name="username" value="<?php if($f_post) echo $f_post['username'];?>"/>
				  </li>
				  <li>
				   <label>Email<span>*</span>:</label>
				    <input type="text" name="email" value="<?php if($f_post) echo $f_post['email'];?>"/>
				  </li>
				  <li>
				   <label>Password<span>*</span>:</label>
				    <input type="password" name="password"/>
				  </li>
				  <li>
				   <label>Confirm Password<span>*</span>:</label>
				    <input type="password" name="con_password"/>
				  </li>
				  <li class="brand-product">
				    <div class="left">
					  <label>Age<span>*</span>:</label>
				     <input type="text" name="age" value="<?php if($f_post) echo $f_post['age'];?>"/>
				   
				    </div>
				   <div class="left last">
				    <label>Gender<span>*</span>:</label>
				    <select name="gender">
					   <option value="male" <?php if($f_post){ if($f_post['gender']=='male') echo 'selected="selected"';}?>>Male</option>
					   <option value="female" <?php if($f_post){ if($f_post['gender']=='female') echo 'selected="selected"';}?>>Female</option>
					   
					</select>
					</div>
					<div class="clear"></div>
				  </li>
				  <li class="city-state">
				  	 <div class="left last">
				    <label>Who are you?<span>*</span>:</label>
				    <select name="whoyou">
					   <option value="Blogger" <?php if($f_post){ if($f_post['whoyou']=='Blogger') echo 'selected="selected"';}?>>Blogger</option>
					   <option value="Hairstylist" <?php if($f_post){ if($f_post['whoyou']=='Hairstylist') echo 'selected="selected"';}?>>Hairstylist</option>
					    <option value="Hair Enthusiast" <?php if($f_post){ if($f_post['whoyou']=='Hair Enthusiast') echo 'selected="selected"';}?>>Hair Enthusiast</option>
						 <option value="Vlogger" <?php if($f_post){ if($f_post['whoyou']=='Vlogger') echo 'selected="selected"';}?>>Vlogger</option>
					</select>
					</div>
		  
					 <div class="left last">
				        <label>Zip Code<span>*</span>:</label>
						<input type="text" name="zipcode" value="<?php if($f_post) echo $f_post['zipcode'];?>"/>
					</div>
										<div class="clear"></div>
					</li>

					
				
				  <li>
					<input type="checkbox" name="agree" id="agree" style="margin-right: 5px; margin-top: 0;"/><a style="color: #000;" href="http://hairlibrary.com/user-agreement/" target="_blank">I agree with HairLibrary.com user agreement.<span>*</span></a><br><br>
					</li>
					<div class="clear"></div>
				</ul>
				
				</div>
				<div class="reg-button-section">
				<a href="javascript:void();"class="prev-button back-to-demograph last-btn" onclick="prev_button_desktop(4980)" >Back</a>
				<input id="d-hair-style-value" type="hidden" name="cat" value=""/>
				   <input id="d-hair-length-value" type="hidden" name="hairLenth" value=""/>
				   <input id="d-hair-texture-value" type="hidden" name="hairTex" value=""/>
				   <input id="d-hair-treatment-value" type="hidden" name="hairProc" value=""/>
				   <input id="d-hair-color-value" type="hidden" name="haircolor" value=""/>
				   <input id="d-hair-condition-value" type="hidden" name="hairCond" value=""/>
				   <input id="d-hair-des-value" type="hidden" name="hairDes" value=""/>
				    <input id="d-hair-demograph-value" type="hidden" name="demogrph" value=""/>
				<input type="submit" class="prev-button reg-button" value="Submit" />
				 </div>  
				 </div> 
	            <!-- panel7 Hair Category End --> 
			
				<div class="clear"></div>
         <input type="hidden" name="is_submit" value="1"/>
			 </form>
			 <?php } else {?>
			 
			 <div>You are already logged in. Want to <a href="<?php echo wp_logout_url(); ?>" target="_top">logout?</a></div>
			 <?php } ?>
			 </div>
			
			
			<!--  <div class="status-bar"><div id="status-val" style="<?php if($f_post) echo 'width:609px';else echo 'width:87px';?>"><?php if($f_post) echo '70%';else echo '10%';?></div></div>-->
			</div>
</div>
	</div>	
	
  <script>
  
$('.d-hair-style a').click(function(){

var cat=$(this).attr("title");

if(cat==189)
{
$('#d-r-straight').addClass('hide');
$('#d-p-curly').removeClass('hide');
}

  
  if(cat==188)
{
$('#d-p-curly').addClass('hide');
$('#d-r-straight').removeClass('hide');


}

if(cat!=188 && cat!=189)
{
$('#d-r-straight').addClass('hide');
$('#d-p-curly').addClass('hide');
}

  
  
  setFieldValuesDesktop('d-hair-style-value',cat,830,'#69CCB7');
  
  $('.d-hair-style a').removeClass('active');
    $(this).addClass("active");
 
});




$('.d-hair-length a').click(function(){
var title=$(this).attr("title");
  setFieldValuesDesktop('d-hair-length-value',title,1660,'#A289C0');
    $('.d-hair-length a').removeClass('active');
  $(this).addClass("active");
});

$('.d-hair-texture a').click(function(){
var title=$(this).attr("title");
  setFieldValuesDesktop('d-hair-texture-value',title,2490,'#88D5EF');
    $('.d-hair-texture a').removeClass('active');
  $(this).addClass("active");
 });





$('.d-hair-conditions a').click(function(){
	var title=$(this).attr("title");
	var aclass=$(this).attr("class");
	if(aclass=='active')
	{
	var new_conds= new Array();
	var conditions=$('#d-hair-condition-value').val();
	var conditions_a=conditions.split(',');
	var j=0;
    for (i = 0; i < conditions_a.length; i++) {
       if (conditions_a[i] !== title) {
           new_conds[j] = conditions_a[i];
		    j++;
         }
		 
		
      }
	     new_conds.join(',');  
    $('#d-hair-condition-value').val(new_conds);
	$(this).removeClass('active');
	  

	}else
	{
	$(this).addClass('active');
	var conditions=$('#d-hair-condition-value').val();
	if(conditions=="")
	 conditions=title;
	 else
	  conditions=conditions+','+title;
	  
	$('#d-hair-condition-value').val(conditions);
	}
	
	
	
});

$('.d-hair-treatment a').click(function(){
var title=$(this).attr("title");
 if(title==='yes')
 {
  var color=$('#d-hair-color-value').val();
   if(color==='yes')
    {
     $('#d-hair-color-value').val('no');
	 $(this).removeClass("active");
     }
	 else
	 {
	 $('#d-hair-color-value').val('yes');
	  $(this).addClass("active");
	 }
  
  
  
  }
  else
  {
  $('.d-h-process').removeClass("active");
  $('#d-hair-treatment-value').val(title);
   $(this).addClass("active");
  }
  

  
});


$('.d-hair-des a').click(function(){
	var title=$(this).attr("title");
	var aclass=$(this).attr("class");
	if(aclass=='active')
	{
	var new_conds= new Array();
	var conditions=$('#d-hair-des-value').val();
	var conditions_a=conditions.split(',');
	var j=0;
    for (i = 0; i < conditions_a.length; i++) {
       if (conditions_a[i] !== title) {
           new_conds[j] = conditions_a[i];
		    j++;
         }
		 
		
      }
	     new_conds.join(',');  
    $('#d-hair-des-value').val(new_conds);
	$(this).removeClass('active');
	  

	}else
	{
	$(this).addClass('active');
	var conditions=$('#d-hair-des-value').val();
	if(conditions=="")
	 conditions=title;
	 else
	  conditions=conditions+','+title;
	  
	$('#d-hair-des-value').val(conditions);
	}
	
	
	
});




function nextCondDesktop(){


var conditions=$('#d-hair-condition-value').val();

	if(conditions=="")
	{
		alert("Please select conditions");
	}
	else{
	     $('#d-panel-content').css({left:-4150});
		 $('#d-panel-content').css({transition:'left 0.5s linear 0s' });
		 $('.in-h-c').css("background-color","#88D5EF");
	
	}
}




function nextDesDesktop()
{

var conditions=$('#d-hair-des-value').val();

	if(conditions=="")
	{
		alert("Please select conditions");
	}
	else{
		 $('#d-panel-content').css({left:-4980});
		 $('#d-panel-content').css({transition:'left 0.5s linear 0s' });
		 $('.in-h-c').css("background-color","#FD6671");
	
	}
}

function nextTreatmentDesktop()
{

var conditions=$('#d-hair-treatment-value').val();

	if(conditions=="")
	{
		alert("Please select conditions");
	}
	else{
		 $('#d-panel-content').css({left:-3320});
		 $('#d-panel-content').css({transition:'left 0.5s linear 0s' });
		 $('.in-h-c').css("background-color","#FD6671");
	
	}


}

$('.d-hair-demograph a').click(function(){
var title=$(this).attr("title");
  setFieldValuesDesktop('d-hair-color-value',title,5820,'#FDD4CE');
  $('.d-hair-demograph a').removeClass('active');
   $(this).addClass("active");
  $(".inner-holder").css("height","830px");
}); 




function prev_button_desktop(val)
{
lval="-"+val+"px";
$('#d-panel-content').css({left:lval});
$('#d-panel-content').css({transition:'left 0.5s linear 0s' });
}

$('.last-btn').click(function(){
$(".inner-holder").css("height","500px");
});


  function setFieldValuesDesktop(field_id,field_value,left_value,color_code)
  {
    var id = "#"+field_id;
    $(id).val(field_value);
    lval="-"+left_value+"px";
    $('#d-panel-content').css({left:lval});
    $('#d-panel-content').css({transition:'left 0.5s linear 0s' });
	$('.in-h-c').css("background-color",""+color_code);
  }
  
$('#first-step-desktop a').on('click', function() {
  $('#first-step-desktop').hide();
 $('#desktop-panel').fadeIn(1000);
 
 
});


  </script>
 	</div> 
	
	
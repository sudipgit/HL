<?php
 $f_post=null;
   if($_POST['is_submit']==1)
   {	 
	 $f_post=$_POST;
	 }
?>
<script>
 function formValidation()
  {
     var is_agree=document.forms["user-register"]["agree"].checked;
	  var v1=document.forms["user-register"]["fname"].value;
	  var v2=document.forms["user-register"]["lname"].value;
	  var v5=document.forms["user-register"]["username"].value;
	  var v3=document.forms["user-register"]["email"].value;
	 /* var p1=document.forms["user-register"]["password"].value;
	  var p2=document.forms["user-register"]["con_password"].value;*/
	  var v4=document.forms["user-register"]["age"].value;
	  var v6=document.forms["user-register"]["zipcode"].value;
	  
	  if(v1=="" || v2=="" || v3=="" || v4=="" || v5=="" || v6=="")
	  {
		  alert('* Field should not be empty');
	         return false;

		  
		  
	  }
	  else if(!is_agree)
	  {
	   alert('Please agree with HairLibrary.com user agreement');
	   return false;
	   }else
			return true;
	  
	  
	  }


</script>

	  <div class="user-register mobile-display">
	    <div class="user-register-mobile">
		<div class="user-register-mobile-inner">
             <div id="first-step" class="mobile-before-login" style="<?php if($f_post) echo 'display:none;'?>">			
			   <img width = "100%" alt="mobile_register_cover" src="<?php bloginfo('template_url');?>/assets/img/register/mobile_register_cover.png" />			
			   <div class="get-started">	
				<a class="get-started-btn" href="javascript:void();">Get Started</a>
			   </div>							
		   </div>
		  
		    <div class="panel-holder" id="mobile-panel"  style="<?php if($f_post) echo 'display:block;'; else echo'display:none'?>">
			<div class="inner-holder in-h-c" id="in-h" style="background:<?php if($f_post) echo '#FDD4CE;'; else echo '#FD6571;'?>">
			 <div id="panel-content" style="visibility: visible; width: 8170px; <?php if($f_post) { echo 'left: -2600px;';} else { echo 'left: 0px;';}?>">
			 <?php if( !is_user_logged_in() ) {?>
			  <form name="user-register" action="" method="post" onsubmit="return formValidation();">
			    <!-- panel1 Hair Category --> 
                 <div class="panel panel1">
				 <div class="questions">
				 <p class="hair-type">MY CURRENT HAIR STYLE IS...</p>
				   <div class="question-images">   
				   
					<ul class="hair-style">
					
					  <li>
					   <a class="hc_style" href="javascript:void();" title="188"><img alt="Relaxed Straight Hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair-straight.png" width="170px" /></a>				 
					  </li>
					   <li>
					    <a class="hc_style" href="javascript:void();" title="189"><img alt="Naturally Curly Hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair-curly.png"width="170px" /></a>
					  
					  </li>
					  <li>
					    <a class="hc_style" href="javascript:void();" title="250"><img alt="Braids" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair-braids.png"width="170px" /></a>
					  
					  </li>	
					  <li>
					    <a class="hc_style" href="javascript:void();" title="179"><img alt="Dreds" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair-locks.png"width="170px" /></a>
					  
					  </li>
				<div class="clearfix"></div>
					</ul> 
					<div class="clear"></div>
				   </div>	
					</div>
				   <div class="btn-section">
						<ul>
							<li>
								<a href="javascript:void();"onclick="prev_button(0)" >Back</a>
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
									<li></li>
								</ul>
							</li>
							<li><a href="javascript:void();" onclick="nextButton('hair-style-value',330,'69CCB7')" >Next</a></li>
						</ul>
					</div>
				 </div> 
	            <!-- panel1 Hair Category End --> 
				
				
				<!-- panel2 Hair Category --> 
                 <div class="panel panel2">
				 <div class="questions">
				 <p class="hair-type">MY CURRENT HAIR LENGTH IS...</p>
				   <div class="question-images">
				    <ul class="hair-length">
					  <li>
					    <a class="hc_length" href="javascript:void();" title="v_short"><img alt="very-short-hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/very-short-hair.png" width="76" /></a>
					  
					  </li>
					  <li>
					    <a class="hc_length" href="javascript:void();" title="short"><img alt="short-hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/short-hair.png" width="76" /></a>
					  
					  </li>
					  <li>
					    <a class="hc_length" href="javascript:void();" title="medium"><img alt="medium-hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/medium-hair.png" width="76" /></a>
					 
					  </li>
					  <li>
					    <a class="hc_length" href="javascript:void();" title="long"><img alt="long-hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/long-hair.png" width="76" /></a>
					  
					  </li>
					   <li>
					    <a href="javascript:void();" title="v_long"><img alt="very-long-hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/very-long-hair.png" width="97" /></a>
					  
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	 
				   </div>
					<div class="btn-section">
						<ul>
							<li>
								<a class="back-to-style" href="javascript:void();"onclick="prev_button(0)" >Back</a>
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
									<li></li>
								</ul>
								<li><a href="javascript:void();" onclick="nextButton('hair-style-value',660,'A289C0')" >Next</a></li>
							</li>
						</ul>
					</div>
				 </div> 
	            <!-- panel2 Hair Category End --> 
				
				<!-- panel3 Hair Category --> 
                 <div class="panel panel3">
				 <div class="questions">
				 <p class="hair-type">MY NATURAL HAIR TEXTURE IS...</p>
				   <div class="question-images">
				    <ul class="hair-texture ">
					  <li id="texture-st">
					   <a  class="hc_texture" href="javascript:void();" title="1a"><img alt="1a" width="85px" src="<?php bloginfo('template_url'); ?>/assets/img/register/1a.png"/></a>
					  </li>
					   <li>
					  <a  class="hc_texture" href="javascript:void();" title="2a"><img alt="2a" width="85px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/2a.png"/></a>
					  </li>
					   <li>
						<a  class="hc_texture" href="javascript:void();" title="2b"><img alt="2b" width="85px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/2b.png"/></a>
					  </li>
					  <li>
					   <a class="hc_texture"  href="javascript:void();" title="2c"><img alt="2c" width="85px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/2c.png"/></a>
					  </li>
					  <li>
					   <a  class="hc_texture" href="javascript:void();" title="3a"><img alt="3a" width="85px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/3a.png"/></a>
					  </li>
					  <li>
					   <a class="hc_texture"  href="javascript:void();" title="3b"><img alt="3b"  width="85px" src="<?php bloginfo('template_url'); ?>/assets/img/register/3b.png"/></a>
					  </li>
					  <li>
					  
					   <a  class="hc_texture" href="javascript:void();" title="3c"><img alt="3c" width="85px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/3c.png"/></a> 
					  </li>
					  <li>
					   <a class="hc_texture"  href="javascript:void();" title="4a"><img alt="4a"  width="85px" src="<?php bloginfo('template_url'); ?>/assets/img/register/4a.png"/></a>
					  </li>
					  <li>
					   <a class="hc_texture" href="javascript:void();" title="4b"><img alt="4b"  width="85px" src="<?php bloginfo('template_url'); ?>/assets/img/register/4b.png"/></a>
					  </li>
					  <li>
					   <a class="hc_texture" href="javascript:void();" title="4c"><img alt="4c" width="85px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/4c.png"/></a>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					</div>
					</div>
					<div class="btn-section">
						<ul>
							<li>
								<a class="back-to-length" href="javascript:void();"onclick="prev_button(330)" >Back</a>
							</li>
							<li>
								<ul class="bullet">
									<li></li>
									<li></li>
									<li class="active"></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
								</ul>
							</li>
							<li><a href="javascript:void();" onclick="nextButton('hair-texture-value',990,'88D5EF')" >Next</a></li>
						</ul>
					</div>
				 </div> 
	            <!-- panel3 Hair Category End --> 
				
				<!-- panel4 Hair Category --> 
                 <div class="panel panel4 ">
				 <div class="questions">
				 <p class="hair-type">MY CURRENT CHEMICAL TREATMENTS ARE...</p>
				   <div class="question-images">
				    <ul class="hair-treatment">
					<!-- Don't remove class from a -->
					<li class="process-stli hide" id="r-straight">
					   <a class="h-process" href="javascript:void();" title="r_straight"><img alt="Relaxed Straight" src="<?php bloginfo('template_url'); ?>/assets/img/register/relaxed-straight.png" width="200px" />
					  <label>Straighteners </label></a>
					  </li>
					 <li class="process-crli hide" id="p-curly">
					   <a  class="h-process" href="javascript:void();" title="p_curly"><img alt="Permed Curly" src="<?php bloginfo('template_url'); ?>/assets/img/register/purmed-curly.png" width="200px" />
					  <label>Texturizer</label></a>
					  </li>
					  <li class="process-crli">
					    <a class="h-process-color" href="javascript:void();" title="yes"><img alt="Color" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair_color.png" width="200px" />
					  <label>Hair Color</label></a>
					  </li>
					  <li id="pn-li" class="last-child" style="width:98%">					   
					  <a class="h-process" href="javascript:void();" title="none">NO, I DON'T I HAVE ANY CHEMICAL TREATMENTS</a>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	
</div>				   
				   <div class="btn-section">
						<ul>
							<li>
								<a class="back-to-texture" href="javascript:void();" onclick="prev_button(660)" >Back</a>
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
									<li></li>
								</ul>
							</li>
							<li><a href="javascript:void();" onclick="nextButton('hair-treatment-value',1320,'FD6671')" >Next</a></li>
						</ul>
					</div>
				 </div> 
	            <!-- panel4 Hair Category End --> 
							
				
				
				<!-- panel5 Hair Category --> 
                 <div class="panel panel5">
				 <div class="questions">
				 <p class="hair-type">MY HAIR CONDITIONS ARE...</p>
				   <div class="question-images">
				    <ul class="hair-conditions">
					  <li >
					   <a href="javascript:void();" title="o_scalp"><img alt="Oily Scalp" src="<?php bloginfo('template_url'); ?>/assets/img/register/oily-scalp.png"/><label>Oily</label></a>
					   
					  </li>
					  <li class="notall">
					   <a href="javascript:void();" title="p_bald"><img alt="Pattern Baldness" src="<?php bloginfo('template_url'); ?>/assets/img/register/pattern-baldness.png"/> <label>Pattern Baldness</label></a>
					  
					  </li>
					 <li class="notall">
					   <a href="javascript:void();" title="alopecia"><img alt="Alopecia" src="<?php bloginfo('template_url'); ?>/assets/img/register/alpecia.png"/> <label>Alopecia</label></a>
					  
					  </li>
					 <li class="notall">
					   <a  href="javascript:void();" title="g_hair"><img alt="Grey Hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/gray-hair.png"/><label>Grey Hair</label></a>
					   
					  </li>
					  <li class="notall">
					   <a href="javascript:void();" title="sp_ends"><img alt="Split Ends" src="<?php bloginfo('template_url'); ?>/assets/img/register/split-ends.png"/><label>Split Breakage</label></a>
					   
					  </li>
					  					  <li>
					   <a href="javascript:void();" title="dry_scalp"><img alt="Dry Itchy" src="<?php bloginfo('template_url'); ?>/assets/img/register/dry-scalp.png"/> <label>Dry Itchy</label></a>
					  
					  </li>
					  <li class="last-child notall" style="width:98%">
					  <a href="javascript:void();" title="normal">NO, I DON'T HAVE ANY HAIR CONDITIONS</a>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>
</div>
					 <div  class="btn-section">
						<ul>
							<li>
								<a class="back-to-treatment" href="javascript:void();"onclick="prev_button(990)" >Back</a>
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
									<li></li>
								</ul>
							</li>
							<li><a href="javascript:void();" onclick="nextButton('hair-condition-value',1650,'88D5EF')" >Next</a></li>
						</ul>
					</div>

				 </div> 
				 
				 
				 
				 
				<!-- panel5 Hair Category --> 
                 <div class="panel panel15">
				 <div class="questions">
				 <p class="hair-type">THE FOLLOWING BEST DESCRIBES MY HAIR AS...</p>
				   <div class="question-images">
				    <ul class="hair-des">
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
								<a class="back-to-condition" href="javascript:void();"onclick="prev_button(1320)" >Back</a>
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
									<li></li>
								</ul>
							</li>
							<li><a href="javascript:void();" onclick="nextButton('hair-des-value',1980,'A289C0')" >Next</a></li>
						</ul>
					</div>
				 </div> 
	          
	          
				<!-- panel5 Hair Category --> 
                 <div class="panel panel15">
				 <div class="questions">
				  <p class="hair-type">I Currently Wear...</p>
				   <div class="question-images">
				    <ul class="hair-wear">
					  <li>
					  <a class="hc_wear" href="javascript:void();" title="extensions">Hair extensions</a>
					  </li>
					   <li >
					  <a class="hc_wear" href="javascript:void();" title="wigs">Wigs</a>
					  </li>
					   <li >
					  <a class="hc_wear" href="javascript:void();" title="no">No speciality hair styles</a>
					  </li>					  
					 <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>
</div>				   
					<div class="btn-section">
						<ul>
							<li>
								<a class="back-to-des" href="javascript:void();"onclick="prev_button(1650)" >Back</a>
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
									<li></li>
								</ul>
							</li>
							<li><a href="javascript:void();" onclick="nextButton('hair-wear-value',2310,'FD6671')" >Next</a></li>
						</ul>
					</div>
				 </div> 
	          
	          
				
					<!-- panel6 Hair Category --> 
                 <div class="panel panel8">
				 <div class="questions">
				 <p class="hair-type">What is your Demographic?</p>
				   <div class="question-images">
				    <ul class="hair-demograph">
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
					<div  class="btn-section">
						<ul>
							<li>
								<a class="back-to-wear" href="javascript:void();"onclick="prev_button(1980)" >Back</a>
							</li>
							<li>
								<ul class="bullet">
									<li ></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>									
									<li></li>
									<li></li>
									<li class="active"></li>
								</ul>
							</li>
							<li><a href="javascript:void();" onclick="nextButton('hair-demograph-value',2600,'FDD4CE',0,1)" >Next</a></li>
						</ul>
					</div>
				 </div> 
	            <!-- panel6 Hair Category End --> 
				
				<!-- panel7 Hair Category --> 
                 <div class="panel panel7">
				
				 <div class="reg-info" style="display:<?php if($f_post) echo 'block;'; else echo 'none;'?>">
				  <p class="hair-type">You are one step away from completion </p>
				  <ul class="">
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
				<!--  <li>
				   <label>Password<span>*</span>:</label>
				    <input type="password" name="password"/>
				  </li>
				  <li>
				   <label>Confirm Password<span>*</span>:</label>
				    <input type="password" name="con_password"/>
					<div class="clear"></div>
				  </li>-->
				  <li>
				   
					  <label>Age<span>*</span>:</label>
				     <input type="text" name="age" value="<?php if($f_post) echo $f_post['age'];?>"/>
				 </li>
				<li>
				    <label>Gender<span>*</span>:</label>
				    <select name="gender">
					   <option value="male" <?php if($f_post){ if($f_post['gender']=='male') echo 'selected="selected"';}?>>Male</option>
					   <option value="female" <?php if($f_post){ if($f_post['gender']=='female') echo 'selected="selected"';}?>>Female</option>
					   
					</select>
				</li>
				  </li>
				  <li>
				    			  
				        <label>Zip Code<span>*</span>:</label>
						<input type="text" name="zipcode" value="<?php if($f_post) echo $f_post['zipcode'];?>"/>
				
					</li>
					 <li>
				    <label>Who are you?<span>*</span>:</label>
				    <select name="whoyou">
					   <option value="Blogger" <?php if($f_post){ if($f_post['whoyou']=='Blogger') echo 'selected="selected"';}?>>Blogger</option>
					   <option value="Hairstylist" <?php if($f_post){ if($f_post['whoyou']=='Hairstylist') echo 'selected="selected"';}?>>Hairstylist</option>
					    <option value="Hair Enthusiast" <?php if($f_post){ if($f_post['whoyou']=='Hair Enthusiast') echo 'selected="selected"';}?>>Hair Enthusiast</option>
						 <option value="Vlogger" <?php if($f_post){ if($f_post['whoyou']=='Vlogger') echo 'selected="selected"';}?>>Vlogger</option>
					</select>
					
					
				
				  </li>
				  <li>
					<input type="checkbox" name="agree" id="agree" style="margin-right: 5px; margin-top: 0;width:22px;height:22px;"/>I agree with HairLibrary.com <a style="color: #000;" href="http://hairlibrary.com/user-agreement/" target="_blank">user agreement</a>.<span>*</span><br><br>
					</li>
				<div class="clearfix"></div>
				
				</ul>
				<!--<div style="" class="g-recaptcha" data-sitekey="6LcVBv8SAAAAALaKVIKyakLl51jdjHA84cTglZNK"></div>-->
				</div>
				<div class="reg-button-section">
				
				   <a href="javascript:void();"class="back-to-demograph prev-button last-btn-m" onclick="prev_button(2310)" >Back</a>
				
				   <input id="hair-style-value" type="hidden" name="cat" value=""/>
				   <input id="hair-length-value" type="hidden" name="hairLenth" value=""/>
				   <input id="hair-texture-value" type="hidden" name="hairTex" value=""/>
				   <input id="hair-treatment-value" type="hidden" name="hairProc" value=""/>
				   <input id="hair-condition-value" type="hidden" name="hairCond" value=""/>
				   <input id="hair-des-value" type="hidden" name="hairDes" value=""/>
				   <input id="hair-color-value" type="hidden" name="color" value="no"/>
				    <input id="hair-wear-value" type="hidden" name="hairWear" value=""/>
				    <input id="hair-demograph-value" type="hidden" name="demogrph" value=""/>
				   <input type="submit"  class="prev-button reg-button" value="Submit"/>		
				   </div>
				 </div> 
	            <!-- panel7 Hair Category End --> 
			
				<div class="clear"></div>
         <input type="hidden" name="is_submit" value="1"/>
		 <input type="hidden" name="is_captcha" value="1"/>
			 </form>
			 <?php } else {?>
			 
			 <div>You are already logged in. Want to <a href="<?php echo wp_logout_url(); ?>" target="_top">logout?</a></div>
			 <?php } ?>
			 </div>
			
			
			<!--  <div class="status-bar"><div id="status-val-mb" style="<?php if($f_post) echo 'width:609px';else echo 'width:87px';?>"><?php if($f_post) echo '70%';else echo '10%';?></div></div>-->
			</div>
</div>
<div class="clearfix"></div>

	</div>
	<div class="clearfix"></div>
	</div>
 
	
  <script>
    $('.h-process-color').click(function(){
		if(jQuery('#hair-treatment-value').val()==""){
		jQuery('#hair-treatment-value').val('none');
		}
 });
  
  
  
  
$('.hair-style a').click(function(){

var cat=$(this).attr("title");

if(cat==189)
{
$('#r-straight').addClass('hide');
$('#p-curly').removeClass('hide');
}

  
  if(cat==188)
{
$('#p-curly').addClass('hide');
$('#r-straight').removeClass('hide');


}

if(cat!=188 && cat!=189)
{
$('#r-straight').removeClass('hide');
$('#p-curly').removeClass('hide');
}
  
  
  //setFieldValues('hair-style-value',cat,330,'#69CCB7');
   $("#hair-style-value").val(cat);
  $('.hair-style a').removeClass('active');
    $(this).addClass("active");
 
});




$('.hair-length a').click(function(){
var title=$(this).attr("title");
  $("#hair-length-value").val(title);
  //setFieldValues('hair-length-value',title,660,'#A289C0');
    $('.hair-length a').removeClass('active');
  $(this).addClass("active");
});

$('.hair-texture a').click(function(){
var title=$(this).attr("title");
  $("#hair-texture-value").val(title);
 // setFieldValues('hair-texture-value',title,990,'#88D5EF');
    $('.hair-texture a').removeClass('active');
  $(this).addClass("active");
 });





$('.hair-conditions a').click(function(){
	var title=$(this).attr("title");
	var aclass=$(this).attr("class");
	if(title=='normal')
	{
	$('#hair-condition-value').val(title);
	$('.hair-conditions a').removeClass('active');
	$(this).addClass('active');
	}
	if(aclass=='active')
	{
	var new_conds= new Array();
	var conditions=$('#hair-condition-value').val();
	var conditions_a=conditions.split(',');
	var j=0;
    for (i = 0; i < conditions_a.length; i++) {
       if (conditions_a[i] !== title) {
           new_conds[j] = conditions_a[i];
		    j++;
         }
		 
		
      }
	     new_conds.join(',');  
    $('#hair-condition-value').val(new_conds);
	$(this).removeClass('active');
	  

	}else
	{
	$(this).addClass('active');
	var conditions=$('#hair-condition-value').val();
	if(conditions=="" || conditions=='normal')
	 conditions=title;
	 else
	  conditions=conditions+','+title;
	  
	$('#hair-condition-value').val(conditions);
	}
	
	
	
});

$('.hair-treatment a').click(function(){
var title=$(this).attr("title");
 if(title==='yes')
 {
  var color=$('#hair-color-value').val();
   if(color==='yes')
    {
     $('#hair-color-value').val('no');
	 $(this).removeClass("active");
     }
	 else
	 {
	 $('#hair-color-value').val('yes');
	  $(this).addClass("active");
	 }
  
  
  
  }
  else
  {
  $('.h-process').removeClass("active");
  $('#hair-treatment-value').val(title);
    if(title==='none')
  {
    $('#hair-color-value').val('no');
	$('.h-process-color').removeClass("active");
}
   $(this).addClass("active");
  }
  

  
});


$('.hair-des a').click(function(){
	var title=$(this).attr("title");
	var aclass=$(this).attr("class");
	if(aclass=='active')
	{
	var new_conds= new Array();
	var conditions=$('#hair-des-value').val();
	var conditions_a=conditions.split(',');
	var j=0;
    for (i = 0; i < conditions_a.length; i++) {
       if (conditions_a[i] !== title) {
           new_conds[j] = conditions_a[i];
		    j++;
         }
		 
		
      }
	     new_conds.join(',');  
    $('#hair-des-value').val(new_conds);
	$(this).removeClass('active');
	  

	}else
	{
	$(this).addClass('active');
	var conditions=$('#hair-des-value').val();
	if(conditions=="")
	 conditions=title;
	 else
	  conditions=conditions+','+title;
	  
	$('#hair-des-value').val(conditions);
	}
	
	
	
});

$('.hair-wear a').click(function(){
var title=$(this).attr("title");
  $('#hair-wear-value').val(title);
  $('.hair-wear a').removeClass('active');
   $(this).addClass("active");
 
}); 

$('.hair-demograph a').click(function(){
var title=$(this).attr("title");
  $("#hair-demograph-value").val(title);
 // setFieldValues('hair-color-value',title,2310,'#FDD4CE');
  $('.hair-demograph a').removeClass('active');
   $(this).addClass("active");

});


function nextButton(value_id,left_value,color_code,h,reg)
{
var f_id="#"+value_id;
var field_value=$(f_id).val();
 lval="-"+left_value+"px";
	if(field_value=="")
	{
		alert("Please select atleast a option");
	}
	else{
		 $('#panel-content').css({left:lval});
		 $('#panel-content').css({transition:'left 0.5s linear 0s' });
		 $('.in-h-c').css("background-color","#"+color_code);
	
	}
	
	if(h>1)
	{
	height=h+"px";
	 $(".inner-holder").css("height",height);
	}
	
	if(reg==1)
	 $('.reg-info').show();
}

function prev_button(val)
{
lval="-"+val+"px";
$('#panel-content').css({left:lval});
$('#panel-content').css({transition:'left 0.5s linear 0s' });
}


$('#first-step a').on('click', function() {
  $('#first-step').hide();
 $('#mobile-panel').fadeIn(1000);
 
 
});

$('.last-btn-m').click(function(){
 $('.reg-info').hide();
});




  </script>
</div>

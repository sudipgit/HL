<?php
/*
Template Name: Brand Register
*/
?>
<?php get_header();
 ?>


		<div id="main" class="wrap">
			<div class="container">
	
				<div class="row-fluid">	
				
				  <?php
			
					   if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['issubmit']==1)
                        {
                         include_once('brand-admin/templates/functions.php'); 
                        
						//Source: functions/brandadmin.php
						saveBrandInfo($_POST);
					   ?>
					   <div class="welcome-msg">
					    
					     <p>Thank you for your inquiry about including your products in <a href="<?php bloginfo('url');?>">HairLibrary.com</a> . We will contact you shortly.  Have a beautiful day.</p>
					   
					   </div>
					 
					   
					   
					   
					   
					   
					   <?php
					   }
					 
					 else
					 {
				  ?>
				 <div class="brand-reg-form">	
				 <script>
  function formValidation()
  {

	  var v1=document.forms["brandregform"]["company_name"].value;
	  var v2=document.forms["brandregform"]["first_name"].value;
	  var v11=document.forms["brandregform"]["last_name"].value;
	  var v3=document.forms["brandregform"]["phone"].value;
	  var v4=document.forms["brandregform"]["email"].value;
	  var v5=document.forms["brandregform"]["company_web"].value;
	  var v6=document.forms["brandregform"]["no_brands"].value;
	  var v7=document.forms["brandregform"]["no_products"].value;
	  var v8=document.forms["brandregform"]["city"].value;
	  var v9=document.forms["brandregform"]["sstate"].value;
	  var v10=document.forms["brandregform"]["country"].value;

	  if(v1=="" || v2=="" || v3=="" || v4=="" || v5=="" || v6=="" || v7=="" || v8=="" || v9=="" || v10=="" || v11=="")
	  {
		  document.getElementById('errormsg').innerHTML="You Have to fill all (*) mark fields";
	        
			 return false;

		  }

	 

	  return true;
}

  </script>
				 
			    <form id="brandreg" method="post" action="" name="brandregform" onsubmit="return formValidation();">
			
			     <h3>Brand Registration Form</h3>
				 <div id="errormsg"></div>
			    <ul>
				  <li>
				   <label>Company name<span>*</span>:</label>
				    <input type="text" name="company_name"/>
				  </li>
				  <li>
				   <label>First name<span>*</span>:</label>
				    <input type="text" name="first_name"/>
				  </li>
				   <li>
				   <label>Last name<span>*</span>:</label>
				    <input type="text" name="last_name"/>
				  </li>
				  <li>
				   <label>Contact Phone<span>*</span>:</label>
				    <input type="text" name="phone"/>
				  </li>
				  <li>
				   <label>Contact Email<span>*</span>:</label>
				    <input type="text" name="email"/>
				  </li>
				  <li>
				   <label>Company Website<span>*</span>:</label>
				    <input type="text" name="company_web" placeholder="i.e:http://example.com"/>
				  </li>
				  <li class="brand-product">
				    <div class="left">
				      <label>Number of brands<span>*</span>:</label>
				      <input type="text" name="no_brands"/>
				     </div>
				   <div class="left last">
				   <label>Number of products<span>*</span>:</label>
				    <input type="text" name="no_products"/>
					</div>
					<div class="clear"></div>
				  </li>
				    <li class="city-state">
				    <div class="left">
				      <label>City<span>*</span>:</label>
				      <input type="text" name="city"/>
				     </div>
				   <div class="left mid">
				    <label>State<span>*</span>:</label>
				    <select name="sstate">
					    <option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO" >Colorado</option>
						<option value="CT" >Connecticut</option>
						<option value="DE" >Delaware</option>
						<option value="DC">District Of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI" >Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS" >Mississippi</option>
						<option value="MO" >Missouri</option>
						<option value="MT" >Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH" >New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA" >Virginia</option>
						<option value="WA" >Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI" >Wisconsin</option>
						<option value="WY" >Wyoming</option>
					</select>
					</div>
					 <div class="left last">
				    <label>Country<span>*</span>:</label>
				    <select name="country">
					   <option value="United States">United States</option>
					   <option value="France">France</option>
					   <option value=" ‎United Kingdom"> ‎United Kingdom</option>
					</select>
					</div>
					<div class="clear"></div>
				  </li>
				
				 <li class="overview">
				   <label>Company Overview:</label>
				    <textarea name="overview" placeholder="Tell Us About Your Brand"></textarea>
				  </li>
				
				</ul>
			
			<input type="submit" value="Submit" class="button submit"/>
			<input type="hidden" name="issubmit" value="1"/>
		      	</form>
					
					
				</div>	
					<?php } ?>
					
				</div>
			</div>
		</div>
        
<?php get_footer(); ?>
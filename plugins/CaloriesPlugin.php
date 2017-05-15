<?php
/*
Plugin Name: Calories Calculator
Plugin URI: http:techesthete.net/
Version: 1.0
Author: Rameez Karamat Bhatti
*/

/**
 * Adds Foo_Widget widget.
 */
class CaloriesWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'weightcalculator', // Base ID
			'Weight Calculator', // Name
			array( 'description' => __( 'A Calories Calculator', 'techesthete.net' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) { 


		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		// if ( ! empty( $title ) )
			// echo $args['before_title'] . $title . $args['after_title'];

?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/calories/css/calories.css';  ?>" type="text/css">
<script src="<?php echo get_template_directory_uri().'/calories/js/calories.js';  ?>" type="text/javascript"></script>
<style type="text/css">
.displayNone {display:none;}
.displayBlock {display:block;}
.hilite {background-color:#efefef;}
#zigResultsTable td {padding: 0px 4px 0px 4px;font-family:arial;border:1px solid #d9d9d9;font-size:14px}
#zigResultsTable {border-collapse:collapse; border-spacing:0;}
/*.rad {vertical-align:middle;}*/
.smalltools {    background: url("images/bg-fade.jpg") repeat-x scroll 50% 0 #FFFFFF;
    border: 5px solid #DDDDDD;
    border-radius: 15px 15px 15px 15px;
    box-shadow: 0 0 20px rgba(100, 100, 100, 0.2) inset;
    float: right;
    font-family: verdana;
    font-size: 11px;
    margin: 20px 0 0 10px;
    padding: 3px;
    width: 160px;}
.small {font-size:13px;}
table.formulas .small {font-size:12px;}
#nowwhat {width:75%;text-shadow: 0 1px 0 #FFFFFF;
font: 12px/14px "Lucida Sans Unicode","Lucida Grande",Verdana,Arial,Helvetica,sans-serif; background: #d6d6d6;
    background: rgba(0, 0, 0, 0.06);
    border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;
    padding: 6px 12px;margin-top:6px;text-align:left;}
.dropper {font-family:"Helvetica Neue",Helvetica,Arial;padding:1px 5px;text-decoration:none;border:1px solid #aaa;border-color: #ccc #888 #888 #ccc;background:#fff;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;text-shadow:0 1px 0 #fff;
background-image: linear-gradient(bottom, rgb(229,232,231) 30%, rgb(252,252,252) 100%);
background-image: -o-linear-gradient(bottom, rgb(229,232,231) 30%, rgb(252,252,252) 100%);
background-image: -moz-linear-gradient(bottom, rgb(229,232,231) 30%, rgb(252,252,252) 100%);
background-image: -webkit-linear-gradient(bottom, rgb(229,232,231) 30%, rgb(252,252,252) 100%);
background-image: -ms-linear-gradient(bottom, rgb(229,232,231) 30%, rgb(252,252,252) 100%);}
.active {
  background: #F8F7F5;
  border-color: #ABA89E #AEAB9F #AEAB9F;
  background-image: -webkit-linear-gradient(top, #E5E5E5, #F4F4F4);
  background-image: -moz-linear-gradient(top, #E5E5E5, #F4F4F4);
  background-image: -o-linear-gradient(top, #E5E5E5, #F4F4F4);
  background-image: linear-gradient(to bottom, #E5E5E5, #F4F4F4);
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2) inset, 0 1px rgba(255, 255, 255, 0.3);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2) inset, 0 1px rgba(255, 255, 255, 0.3);}
#advanced , #zigResults {  
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
    width: 90%;}
#advanced { border: 1px solid #DEDEDE;}
.cals {display:block;font-size:9px; line-height:12px;color:#666; font-weight:normal;font-family:Helvetica, Arial;}
</style>
<script language="JavaScript">
/* Javascript code copyright Freedieting 2012-2013
Do not copy or reuse */
function init() {
  Get("age").focus();
  oForm = document.calc;
  if (oForm.height[0].checked) { 
     showFeet(); }
     else 
     {
       showCM();
  }
}

window.onload = init;

function showFeet() {
  
  var divblock = document.getElementById("feetlabel");
  divblock.style.display = "block";
  var cmblock = document.getElementById("cmlabel");
  cmblock.style.display = "none";
}

function showCM() {
  
  var divblock = document.getElementById("feetlabel");
  divblock.style.display = "none";
  var cmblock = document.getElementById("cmlabel");
  cmblock.style.display = "block";
}

function showHide(block) {
  
  //var result = document.getElementById("zigResults");
  if (block.className == "displayNone") {
    block.className = "displayBlock";
    isVis = true;
  } else {
    block.className = "displayNone";
    isVis = false;
  }
  
  return true;
} 

function toggleMe(trigger, div) {
  showHide(document.getElementById(div));
  
   if (hasClass(trigger,"dropper")) {
    if (hasClass(trigger,"active")) {
      removeClass(trigger, "active")
    } else {
      addClass(trigger,"active");
    }
   }
  /*linkImages = trigger.getElementsByTagName('IMG');
  zipImg = linkImages[0];
  if (isVis) {
    zipImg.src = "../images/widget_triangle_open.gif";
  } else {
    zipImg.src = "../images/widget_triangle.gif";
  }*/
}

function hasClass(el, name) {
   return new RegExp('(\\s|^)'+name+'(\\s|$)').test(el.className);
}

function addClass(el, name)
{
   if (!hasClass(el, name)) { el.className += (el.className ? ' ' : '') +name; }
}

function removeClass(el, name)
{
   if (hasClass(el, name)) {
      el.className=el.className.replace(new RegExp('(\\s|^)'+name+'(\\s|$)'),' ').replace(/^\s+|\s+$/g, '');
   }
}

</script>

      <div id="content_calories"><!-- google_ad_section_start -->
        <noscript><div class="alert">Hey! You have JavaScript disabled on your browser. The calculator will not work. <a target="_blank" href="http://www.enable-javascript.com/">See how to enable JavaScript on your browser.</a></div></noscript>
        <div class="small" align="center"></div>      
                 
 <form name="calc" >
          <table class="tooltable" style="margin-top:5px;width:50%;" border="0" cellpadding="2" cellspacing="0" >
              <tr>
                <td colspan='2' class='tablehead' ><b> DAILY CALORIC INTAKE CALCULATOR</b></td>
              </tr>
              <tr>
                <td width="100" align="right" ><label>Age&nbsp;</label></td>
                <td align="left" ><input name="age" type="text" id="age" size="2" maxlength="2"><label> Years </label></td>
              </tr>
              <tr>
                <td  align="right" ><label>Gender&nbsp;</label></td>
                <td  align="left" > <input name="sex" type="radio" class="rad" id="sexFem" value="F" checked>
                  <label for="sexFem">Female</label>
                  <br><input name="sex" type="radio" class="rad" id="sexMale" value="M">
                  <label for="sexMale">Male</label>
                </td>
              </tr>
              <tr>
                <td align="right" ><label>Current Weight&nbsp; </label></td>
                <td ><input name="weight"  type="text" id="weight" style="width:40px;" size="3" maxlength="3">
                  <input name="weighttype" type="radio" class="rad" id="weighttype1" value="P" checked>
                  <label for="weighttype1">Pounds</label>
                  <input name="weighttype" type="radio" class="rad" id="weighttype2" value="K">
                  <label for="weighttype2">Kilos</label>
                </td>
              </tr>
              <tr>
                <td align="right" ><label>Height&nbsp; </label></td>
                <td><div style="float:left;display:inline-block;margin-right:8px;"><input name="height" type="radio" class="rad" id="heightFeet" value="F" checked onclick="showFeet();">
                  <label for="heightFeet">Feet &amp; Inches</label>
                  <br>
                  <input name="height" type="radio" class="rad" id="heightCM" value="C" onclick="showCM();">
                  <label for="heightCM">CMs</label></div>
<span id="feetlabel">  <input name="feet" type="text" id="feet" size="2" maxlength="1">
                  <label>Ft&nbsp;&nbsp;</label>
                 <input name="inches" type="text"  id="inches" size="2" maxlength="2">
                  <label>In</label></span>
                  <span id="cmlabel" style="display:none;">  <input name="cm" type="text" id="cm" size="2" maxlength="3">
                  <label>CM&nbsp;&nbsp;</label></span></td>
              </tr>
              <tr>
                <td align="right"><label>Exercise level<a href="#exercise" style="text-decoration:none;" class="tooltip">[?]<span>Exercise = 20 mins elevated heart rate. <br />
                Intense = 1 hour elevated heart rate</span></a>&nbsp;</label></td>
                <td ><select name="activity" id="activity">
                    <option value="1.0" >Basal Metabolic Rate</option>
                    <option value="1.2" class="hilite">Little/no exercise</option>
                    <option  selected="true" value="1.375">3 times/week</option>
                    <option value="1.4187" class="hilite">4 times/week</option>
              <option value="1.4625">5 times/week</option>
                    <option value="1.550" class="hilite">5 times/week (*intense)</option>
                    <option value="1.6375">Every day</option>
                    <option value="1.725" class="hilite">Every day (*intense) or twice daily</option>
                    <option value="1.9">Daily exercise + physical job</option>
                </select></td>
              </tr>
        <!-- <tr>
          <td colspan="2" align="center"><a class="dropper tooltip" style="text-decoration:none;" href="#" onClick="toggleMe(this,'advanced');return false;"> <img style="border:0; " src="../images/widget_triangle_open.gif" >Advanced Options<span>Choose different formulas, and output results in Kilojoules or Calories</span></a></td>
        </tr> -->
              <tr>
                <td colspan="2" align="center"  style="padding-top:0px;"><div id="advanced" class="displayNone">
                    <table  class="formulas" width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                      <tr >
                        <td style="padding-bottom: 6px;" align="right" bgcolor="#efefef" class="small"><label>Results in&nbsp;</label></td>
                        <td  align="left" style="padding-bottom: 6px;" class="small"><input name="optResults" type="radio" class="rad" id="optResults" value="C" checked>
                          <label for="optResults">Calories</label>
                          &nbsp;&nbsp;
                          <input name="optResults" type="radio" class="rad" id="optResults2" value="K">
                          <label for="optResults2">Kilojoules</label></td>
                      </tr>
                      <tr>
                        <td align="right" valign="top" bgcolor="#efefef" class="small"><label>Formula&nbsp;</label><a href="../calorie_needs.html" style="text-decoration:none;" target="_new" class="tooltip">[?]<span>Interested in how these formulas work? Click for a complete explanation.</span></a>
                          </td>
                        <td align="left" class="small"><input type="radio" class="rad" name="optFormula" id="optMS" value="M" checked onClick="document.getElementById('txtBF').disabled=true;">
                          <label for="optMS">Mifflin-St Jeor<br>
                          </label>
                          <input type="radio" class="rad"  name="optFormula" id="optLM" value="L"   onClick="document.getElementById('txtBF').disabled=false;document.getElementById('txtBF').focus();">
                          <label for="optLM">Katch-McCardle:&nbsp; Enter <a href="body_fat_calculator.htm" target="_new" class="tooltip">Body Fat %<span>Open our body fat calculator in a new window</a></label>
                          <input name="txtBF"   type="text" class="small rad" id="txtBF" size="2" maxlength="2" disabled="disabled">
                          <br>
                          <input type="radio" class="rad"  name="optFormula" id="optHB" value="H" onClick="document.getElementById('txtBF').disabled=true;">
                          <label for="optHB">Harris-Benedict</label></td>
                      </tr>
                    </table>
                </div></td>
              </tr>
              <tr>
                <td align="center" colspan="2">  <input type="button" value="Calculate" onClick="calcalcIt()" id="Button1" name="Button1" style="width:200px;" />                  &nbsp;</td>
              </tr>
              <tr>
                <td align="center" colspan="2"><div id="printArea" style="display:none;"><div id="printAreainset">
            <table width="80%" class="tooltable" style="border-width:1px;box-shadow:0 0 40px rgba(0,0,0,0.1) inset;" border="0" cellpadding="2" cellspacing="0" >

              <tr >
                <td colspan="2" align="center" >
        <label class="smalllabel"> Total Calories Including Exercise</label>
                <table width="100%"  border="0" cellspacing="0" cellpadding="5">
                    <tr>
                      <td align="right" width="50%"><label class="biglabel tooltip">Maintenance <span>This amount of daily calories will prevent any weight gain.</span></label></td>
                      <td   align="left" width="50%"><span class="calwrap" id="answer">?<span class="cals">CALORIES/DAY</span></span></td>
                    </tr>
                    <tr>
                      <td align="right"><label class="biglabel"><a href="../weight_loss_guide.htm" class="tooltip"> <span>This Calorie amount will cause steady weight loss. Click for a straight-forward no-nonsense guide.</span>Fat Loss</a></label></td>
                      <td align="left"><span class="calwrap" id="lose">?<span class="cals">CALORIES/DAY</span></span></td>
                    </tr>
                    <tr>
                      <td align="right" valign="middle"><label class="biglabel"><a href="../weight_loss_fast.htm" class="tooltip">Extreme Fat Loss<span>The lowest amount of Calories you should consume. Learn more about the benefits and pitfalls of fast weight loss.</span></a></label></td>
                      <td  align="left"><span class="calwrap" id="loseExt">?<span class="cals">CALORIES/DAY</span></span></td>
                    </tr>
<!--                     <tr>
                      <td colspan="2" align="center">
                        <a class="dropper tooltip" href="#" onClick="toggleMe(this,'zigResults');return false;"> <img style="border:0; " src="../images/widget_triangle_open.gif" >7 day calorie cycle (zig-zag)<span>Calorie cycling provides same amount of calories per week, but 'tricks' your body by constantly changing daily calories. This helps to prevent or break plateaus.</span></a></td>
                    </tr>
 -->                  </table>
                  <div id="zigResults" class="displayNone" style="background-color:#fff;">
                    <table id="zigResultsTable"  border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>&nbsp;</td>
                        <td align="right"><strong>Maintenance</strong></td>
                        <td align="right" bgcolor="#efefef"><strong>Fat Loss</strong></td>
                        <td align="right"><strong>Extreme Fat Loss</strong></td>
                      </tr>
                      <tr>
                        <td><strong>Monday</strong></td>
                        <td align="right">&nbsp;</td>
                        <td align="right" bgcolor="#efefef">&nbsp;</td>
                        <td align="right">&nbsp;</td>
                      </tr>
                      <tr>
                        <td><strong>Tuesday</strong></td>
                        <td align="right">&nbsp;</td>
                        <td align="right" bgcolor="#efefef">&nbsp;</td>
                        <td align="right">&nbsp;</td>
                      </tr>
                      <tr>
                        <td><strong>Wednesday</strong></td>
                        <td align="right">&nbsp;</td>
                        <td align="right" bgcolor="#efefef">&nbsp;</td>
                        <td align="right">&nbsp;</td>
                      </tr>
                      <tr>
                        <td><strong>Thursday</strong></td>
                        <td align="right">&nbsp;</td>
                        <td align="right" bgcolor="#efefef">&nbsp;</td>
                        <td align="right">&nbsp;</td>
                      </tr>
                      <tr>
                        <td><strong>Friday</strong></td>
                        <td align="right">&nbsp;</td>
                        <td align="right" bgcolor="#efefef">&nbsp;</td>
                        <td align="right">&nbsp;</td>
                      </tr>
                      <tr>
                        <td><strong>Saturday</strong></td>
                        <td align="right">&nbsp;</td>
                        <td align="right" bgcolor="#efefef">&nbsp;</td>
                        <td align="right">&nbsp;</td>
                      </tr>
                      <tr>
                        <td><strong>Sunday</strong></td>
                        <td align="right">&nbsp;</td>
                        <td align="right" bgcolor="#efefef">&nbsp;</td>
                        <td align="right">&nbsp;</td>
                      </tr>
                      
                    </table>
                  </div></td>
              </tr>
        
          </table> 
       
          </div>   
          <div  style="display:none;" id="nowwhat"><b>Now what?</b>
          <ol>
          <li>Read the rest of this page: It's really helpful.</li><li>See meal plans for <a href="/1100_calorie_diet.htm" target="_meals">1100 calories</a>, <a href="/1200_calorie_diet.htm" target="_meals">1200</a>, <a href="/1350_calorie_diet.htm" target="_meals">1350</a>, <a href="/1400_calorie_diet.htm" target="_meals">1400</a>, <a href="/1500_calorie_diet.htm" target="_meals">1500</a>. (<a target="_meals" href="/free_diet_plans.htm">More plans here</a>).</li>
          <li>See what <a target="_meals" href="/low_cal_meals.htm">low calorie meals look like</a>.</li>
          <li>Experts: Tweak carb/fat/protein with our <a href="nutrient_calculator.htm" id="linkNutrient" target="_meals">nutrient calculator</a>.</li></ol>
          </div>
          
          
          </div> </td>
              </tr>
          </table>
 </form>

      
      <div id="side2" style="display:none;"> <!-- #BeginEditable "littlebox" -->
   <div class="toolbox group">
      <div class="share" style="margin-top:10px;"><a href="http://pinterest.com/pin/create/button/?url=http%3A//www.freedieting.com/tools/calorie_calculator.htm&media=http%3A//www.freedieting.com/images/pin/how-to-calculate-calories-2.jpg&description=Calculates%20your%20daily%20calories%2C%20along%20with%20a%207-day%20zig-zag%20plan." class="pin-it-button" count-layout="vertical"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a></div>
      <div class="share"><iframe src="http://www.facebook.com/plugins/like.php?app_id=246034152098791&amp;href=http%3A%2F%2Fwww.freedieting.com%2Ftools%2Fcalorie_calculator.htm&amp;send=false&amp;layout=box_count&amp;&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=verdana&amp;" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:70px; height:65px;" allowTransparency="true"></iframe></div>
       <div class="share"><div class="g-plusone" data-size="tall"></div>


</div>
<div class="share"> 

  <a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical"></a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
      </div>
      <div id="toolbox" class="toolbox" style="background: none repeat scroll 0 0 #EDF8FE;">
        <h2>Try Our Other Calculators</h2>
<ul>
<li><a class="selected" href="calorie_calculator.htm">Daily Calorie Needs</a></li>  
<li><a href="calories_in_food.htm">Calories in Food</a></li>
<li><a href="ideal_body_weight.htm">Ideal Body Weight</a></li>
<li><a href="calories_burned.htm">Calories Burned</a></li>
<li><a href="nutrient_calculator.htm" id="linkNutrient2">Carb/Fat/Protein Ratios</a></li>
<li><a href="weight_gain_calculator.htm">Muscle Gain Calculator</a></li>
<li><a href="body_fat_calculator.htm">Body Fat Calculator</a></li>
<li><a class="" style="text-decoration:none;" href="#" onClick="toggleMe(this,'morecalc');return false;"> <img style="border:0; " src="../images/widget_triangle_open.gif" >More...</a></li>
</ul>
<div id="morecalc" class="displayNone">
  <ul><li><a href="bmi_calculator.htm">BMI</a></li>
<li><a href="pregnancy_calorie_calculator.htm">Pregnancy Calories</a></li>
<li><a href="breastfeeding_calorie_calculator.htm">Breastfeeding Calories</a></li>       
<li><a href="waist_to_hip_ratio.htm">Waist to Hip Ratio</a></li>
<li><a href="target_heart_rate.htm">Target Heart Rate</a></li>
<li><a href="converter.htm">Unit Conversion</a></li>
<li><a href="weight_loss_calculator.htm">Estimate Goal Date</a></li>
</ul>
</div>
        </div>
        
        <!-- #EndEditable --> </div>
       
      <div id="wrapclear"></div>

<?php


		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class CaloriesWidget

// register CaloriesWidget widget
function register_calories_widget() {
    register_widget( 'CaloriesWidget' );
}
add_action( 'widgets_init', 'register_calories_widget' );


?>
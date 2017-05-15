<?php
/*
   Template Name: Salon List

*/
 


?>
<?php get_header();
 $current_user = wp_get_current_user();
 $cities=explode('-',$_GET['city']);
 
 $count=count($cities);
 
 $state=$cities[$count-1];
 
 $c=array();
 for($i=0;$i<$count-1;$i++)
  $c[]=$cities[$i];
  
$city=implode(' ',$c);
//Returns all salons of given city and state
$salons=getCitySalons($city,$state);
 
 ?>
  
		<div id="main" class="wrap-page brand-list salons">
			
			<div class="container">			
				<div class="row-fluid">	               
					<h3 class="title title-1"> <span>Directory</span> <a class="right-arrow" href="#"></a></h3>
					<div class="span3 ct left-bar" style="margin-left:0;">
			
					<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

						<script>
						$(function() {
						$( "#accordion" ).accordion();
						});
						</script>

	 
		           <div id="accordion">
					<h3>Connecticut</h3>
					 <ul>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=HARTFORD-CT">HARTFORD, CT</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=NEW-HAVEN-CT">NEW HAVEN, CT</a></li>
					 </ul>
					 <h3>New Jersey</h3>
					 <ul>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=NEWARK-NJ">NEWARK, NJ</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Jersey-City-NJ">Jersey City, NJ</a></li>
					 					          <li> <a href="<?php bloginfo('url');?>/directory/?city=IRVINGTON-NJ">IRVINGTON, NJ</a></li>
				             <li> <a href="<?php bloginfo('url');?>/directory/?city=BROOKLYN-NJ">BROOKLYN, NJ</a></li>
			                <li> <a href="<?php bloginfo('url');?>/directory/?city=EAST-ORANGE-NJ">EAST ORANGE, NJ</a></li>
					 </ul>
					  <h3>New York</h3>
					 <ul>
					 	<li> <a href="<?php bloginfo('url');?>/directory/?city=New-York-NY">New York, NY</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=BROOKLYN-NY">BROOKLYN, NY</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Bronx-NY">Bronx, NY</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=jamaica-NY">JAMAICA, NY</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Valley-Stream-LI-NY">Valley Stream LI, NY</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=BUFFALO-NY">BUFFALO, NY</a></li>
					 </ul>
					 <h3>Pennsylvania</h3>
					 <ul>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=CHESTER-PA">CHESTER, PA</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Philadelphia-PA">PHILADELPHIA, PA</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=PHIL-PA">PHIL, PA</a></li>
					 </ul>
					 <h3>District Of Columbia</h3>
					 <ul>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Washington-DC">Washington , DC</a></li>
					 </ul>
					 <h3>Maryland</h3>
					 <ul>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Waldorf-MD">Waldorf, MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=BOWIE-MD">BOWIE, MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=CLINTON-MD">CLINTON, MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=CAPITOL-HEIGHTS-MD">CAPITOL HEIGHTS, MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=SEAT-PLEASANT-MD">SEAT PLEASANT, MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=FAIRMOUNT-HEIGHTS-MD">FAIRMOUNT HEIGHTS , MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=FT-WASHINGTON-MD">FT WASHINGTON, MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=OXON-HILL-MD">OXON HILL, MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=SUITLAND-MD">SUITLAND, MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=DISTRICT-HEIGHTS-MD">DISTRICT HEIGHTS, MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=TEMPLE-HILLS -MD">TEMPLE HILLS , MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=HILLCREST-HGHTS-MD">HILLCREST HGHTS, MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=UPPER-MARLBORO-MD">UPPER MARLBORO, MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=HYATTSVILLE-MD">HYATTSVILLE, MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Gaithersburg-MD">Gaithersburg, MD</a></li>					 
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=BALTIMORE-MD">BALTIMORE, MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=GWYNN-OAK-MD">GWYNN OAK, MD</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=BALT-MD">BALT, MD</a></li>
				 
					 </ul>
					 <h3>Virginia</h3>
					 <ul>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Richmond-VA">Richmond, VA</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Chesapeake-VA">Chesapeake, VA</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=NORFOLK-VA">NORFOLK, VA</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=NEWPORT-NEWS-VA">NEWPORT NEWS, VA</a></li>
					 </ul>
					 <h3>North Carolina</h3>
					 <ul>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Winston-Salem-NC">Winston Salem, NC</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Raleigh-NC">Raleigh, NC</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=ROCKY-MOUNT-NC">ROCKY MOUNT, NC</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Pineville-NC">Pineville, NC</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=CHARLOTTE-NC">CHARLOTTE, NC</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=TABOR-CITY-NC">TABOR CITY, NC</a></li>
					 </ul>
					 <h3>South Carolina</h3>
					 <ul>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=LORIS-SC">LORIS, SC</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Columbia-MD">Columbia, SC</a></li>
					 					 </ul>
					 <h3>Georgia</h3>
					 <ul>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Decatur-GA">Decatur, GA</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Lithonia-GA">Lithonia, GA</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Stone-Mountain-GA">Stone Mountain, GA</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Morrow-GA">Morrow, GA</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Atlanta-GA">Atlanta, GA</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Savannah-GA">Savannah, GA</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Albany-GA">Albany, GA</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Columbus-GA">Columbus, GA</a></li>
					  <li> <a href="<?php bloginfo('url');?>/directory/?city=BAINBRIDGE-GA">BAINBRIDGE, GA</a></li>
					 					 </ul>
					 <h3>Florida</h3>
					 <ul>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Jacksonville-FL">Jacksonville, FL</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Orlando-FL">Orlando, FL</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Opa-Locka-FL">Opa Locka, FL</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Miami-FL">Miami, FL</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Fort-Lauderdale-FL">Fort Lauderdale , FL</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Oakland-Park-FL">Oakland Park , FL</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Lauderhill-FL">Lauderhill, FL</a></li>
					 					 </ul>
					 <h3>Alabama</h3>
					 <ul>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=BESSEMER-AL">BESSEMER, AL</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=BIRMINGHAM-AL">BIRMINGHAM, AL</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Tuskegee-AL">Tuskegee, AL</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=MONTGOMERY-AL">MONTGOMERY, AL</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Mobile-AL">Mobile, AL</a></li>
					 					 </ul>
					 <h3>Tennessee</h3>
					 <ul>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=NASHVILLE-TN">NASHVILLE, TN</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Memphis-TN">Memphis, TN</a></li>
					 					 </ul>
					 <h3>Mississippi</h3>
					 <ul>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=GREENVILLE-MS">GREENVILLE, MS</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=INDIANOLA-MS">INDIANOLA, MS</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Shelby-MS">Shelby, MS</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=CANTON-MS">CANTON, MS</a></li>
					   <li> <a href="<?php bloginfo('url');?>/directory/?city=Ridgeland-MS">Ridgeland, MS</a></li>
					       <li> <a href="<?php bloginfo('url');?>/directory/?city=Jackson-MS">Jackson, MS</a></li>
					         <li> <a href="<?php bloginfo('url');?>/directory/?city=WOODVILLE-MS">WOODVILLE, MS</a></li>
							 					 </ul>
					 <h3>Kentucky</h3>
					 <ul>
					         
					     <li> <a href="<?php bloginfo('url');?>/directory/?city=Louisville-KY">Louisville, KY</a></li>
						  </ul>
					 <h3>Ohio</h3>
					 <ul>
							 <li> <a href="<?php bloginfo('url');?>/directory/?city=Columbus-OH">Columbus, OH</a></li>
					   <li> <a href="<?php bloginfo('url');?>/directory/?city=Bowling-Green-OH">Bowling Green , OH</a></li>
					       <li> <a href="<?php bloginfo('url');?>/directory/?city=Archbold-OH">Archbold, OH</a></li>
					      <li> <a href="<?php bloginfo('url');?>/directory/?city=Holland-OH">Holland, OH</a></li>
					     <li> <a href="<?php bloginfo('url');?>/directory/?city=Toledo-OH">Toledo, OH</a></li>
					    <li> <a href="<?php bloginfo('url');?>/directory/?city=oregon-OH">oregon, OH</a></li>
					   <li> <a href="<?php bloginfo('url');?>/directory/?city=Toldo-OH">Toldo, OH</a></li>
					  <li> <a href="<?php bloginfo('url');?>/directory/?city=Cleveland-OH">Cleveland, OH</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Richmond-Heights-OH">Richmond Heights, OH</a></li>
					  <li> <a href="<?php bloginfo('url');?>/directory/?city=Akron-OH">Akron, OH</a></li>
					   <li> <a href="<?php bloginfo('url');?>/directory/?city=Cincinnati-OH">Cincinnati, OH</a></li>
					   <li> <a href="<?php bloginfo('url');?>/directory/?city=Dayton-OH">Dayton, OH</a></li>
					    </ul>
					 <h3>Indiana</h3>
					 <ul>
						 <li> <a href="<?php bloginfo('url');?>/directory/?city=Indianapolis-IN">Indianapolis, IN</a></li>
						  <li> <a href="<?php bloginfo('url');?>/directory/?city=Gary-IN">Gary, IN</a></li>
						   </ul>
					 <h3>Michigan</h3>
					 <ul>
						   <li> <a href="<?php bloginfo('url');?>/directory/?city=Dearborn-MI">Dearborn, MI</a></li>
						    <li> <a href="<?php bloginfo('url');?>/directory/?city=Detroit-MI">Detroit, MI</a></li>
							 <li> <a href="<?php bloginfo('url');?>/directory/?city=Highland-Park-MI">Highland Park, MI</a></li>
							  <li> <a href="<?php bloginfo('url');?>/directory/?city=Detroit-MI">Detroit, MI</a></li>
							   <li> <a href="<?php bloginfo('url');?>/directory/?city=Flint-MI">Flint, MI</a></li>
							    </ul>
					 <h3>Illinois</h3>
					 <ul>
							    <li> <a href="<?php bloginfo('url');?>/directory/?city=Aurora-IL">Aurora, IL</a></li>
								 <li> <a href="<?php bloginfo('url');?>/directory/?city=Chicago-IL">Chicago, IL</a></li>
								  <li> <a href="<?php bloginfo('url');?>/directory/?city=E-ST-LOUIS-IL">E ST LOUIS, IL</a></li>
								  <li> <a href="<?php bloginfo('url');?>/directory/?city=Saint-Louis-IL">Saint Louis, IL</a></li>
								   </ul>
					 <h3>Missouri</h3>
					 <ul>
								   <li> <a href="<?php bloginfo('url');?>/directory/?city=ST-LOUIS-MO">ST LOUIS, MO</a></li>
								    <li> <a href="<?php bloginfo('url');?>/directory/?city=Saint-Louis-MO">Saint Louis, MO</a></li>
									<li> <a href="<?php bloginfo('url');?>/directory/?city=Kansas-City-MO">Kansas City, MO</a></li>
									 </ul>
					 <h3>Louisiana</h3>
					 <ul>
									
									 
									  <li> <a href="<?php bloginfo('url');?>/directory/?city=Baton-Rouge-LA">Baton Rouge, LA</a></li>
									   </ul>
					 <h3>Arkansas</h3>
					 <ul>
									  <li> <a href="<?php bloginfo('url');?>/directory/?city=Pine-Bluff-AR">Pine Bluff, AR</a></li>
									 <li> <a href="<?php bloginfo('url');?>/directory/?city=Little-Rock-AR">Little Rock, AR</a></li>
									  </ul>
					 <h3>Texas</h3>
					 <ul>
									<li> <a href="<?php bloginfo('url');?>/directory/?city=Cedar-Hill-TX">Cedar Hill, TX</a></li>
								   <li> <a href="<?php bloginfo('url');?>/directory/?city=Dallas-TX">Dallas, TX</a></li>
								  <li> <a href="<?php bloginfo('url');?>/directory/?city=Houston-TX">Houston, TX</a></li>
							     <li> <a href="<?php bloginfo('url');?>/directory/?city=MISSOURI-CITY-TX">MISSOURI CITY, TX</a></li>
						        <li> <a href="<?php bloginfo('url');?>/directory/?city=BEAUMONT-TX">BEAUMONT, TX</a></li>
								 </ul>
					 <h3>California</h3>
					 <ul>
						       

			              
						   <li> <a href="<?php bloginfo('url');?>/directory/?city=Culver-City-CA">Culver City, CA</a></li>
			              <li> <a href="<?php bloginfo('url');?>/directory/?city=INGLEWOOD-CA">INGLEWOOD, CA</a></li> 
						 <li> <a href="<?php bloginfo('url');?>/directory/?city=LOS-ANGELES-CA">LOS ANGELES, CA</a></li>
					 <li> <a href="<?php bloginfo('url');?>/directory/?city=Santa-Cruz-CA">Santa Cruz, CA</a></li>
						 <li> <a href="<?php bloginfo('url');?>/directory/?city=Sacramento-CA">Sacramento, CA</a></li>
						 <li> <a href="<?php bloginfo('url');?>/directory/?city=San-Francisco-CA">San Francisco, CA</a></li>
					 </ul>
					 
					<h3>Nevada</h3>
					 <ul>
						       

			              
						   <li> <a href="<?php bloginfo('url');?>/directory/?city=Las-Vegas-NV">Las Vegas, NV</a></li>
			             
					 </ul>
					</div>
					
					</div>
					
					<div class="span9">
					<div class="row-fluid">
					
					<?php if(count($salons)>0)
					$i=1;
					 foreach($salons as $salon){?>
					
					 <div class="span4 <?php if($i%3==1) echo 'first'?>">
					  <h4 class="salons-title"><a href="<?php bloginfo('url');?>/biz/?n=<?php echo $salon->slug;?>"><?php echo $salon->name;?></a></h4>
					  <p><?php echo $salon->address;?></p>
					  <p><?php echo $salon->city.', '.$salon->state;?></p>
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
					 </div>
					
					<?php $i++; }?>
					</div>
					
					</div>
			         
				
                </div>
			</div>
		</div>

<?php get_footer(); ?>
	
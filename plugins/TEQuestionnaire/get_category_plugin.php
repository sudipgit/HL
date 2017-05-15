<?php
/*
Plugin Name: Get Category plugin
*/
	

add_action('wp_ajax_register_user', 'register_user');
add_action('wp_ajax_nopriv_register_user', 'register_user');
	function register_user(){

		//echo 'here';
		//exit;
		global $wpdb;
		$user_name = $_POST['signup_username'];
		$password = $_POST['signup_password'];
		$email = $_POST['signup_email'];

		$user_id = username_exists( $user_name );

		if ( !$user_id and email_exists($user_email) == false ) {
			$user_id = wp_create_user( $user_name, $password, $email );
		} 
		else {
			$user_id = -1;
		}
		echo $user_id; 		
		exit;
}


function get_next_question_id($user_id,$question_type)
{
	global $wpdb; 
	$query 			= "SELECT * FROM   wp_answers a, wp_user_answer u, wp_questions q WHERE user_id=".$user_id . " AND  question_type='".$question_type."' AND a.question_id=u.question_id AND q.id=a.question_id order by question_no desc  limit 0,1" ;
	$row 	 		= $wpdb->get_row($query);
	// echo '<pre>';
	// 	print_r($row);
	// echo '</pre>';

	if($row)
	{
		return $row->next_question_id;
	}
	else if(empty($row))
	{
		return 0;
	}
}


 // add_action('init','get_next_question');
add_action('wp_ajax_get_next_question', 'get_next_question');
add_action('wp_ajax_nopriv_get_next_question', 'get_next_question');

add_action('wp_ajax_get_previous_question', 'get_previous_question');
add_action('wp_ajax_nopriv_get_previous_question', 'get_previous_question');

function get_previous_question()
{
	global $wpdb ;
	$query  = 'select id from wp_user_answer order by id desc limit 0,1';
	$id  	= $wpdb->get_var($query);
	$query 	= "delete from wp_user_answer where id = ".$id;
	$wpdb->query($query);
	get_next_question();
}

function get_next_question()
{
	global $wpdb; 
	$user_id =	 $_POST['user_id'];
	$action  =	 $_POST['action'];

	$question_type = 'consumer';

	if($_POST['question_type'])
		$question_type  =	 $_POST['question_type'];

	// $user_id = 1;
	$next_question_id = get_next_question_id($user_id,$question_type);

	if($next_question_id == 0)
	{
		$query = 'select * from wp_questions  q WHERE question_type="'.$question_type.'" order by question_no limit 0,1 ';
		$next_question =  $wpdb->get_row($query);
		$button_html   = '<p class="submit"><button id="btn_register" type="button" onclick="jQuery(\'body\').parent().scrollTop(0); window.scrollTo(0,0); save_user_answer('.($next_question->id).',\''.sanitize_title($next_question->question).'\') " class="btn">Next</button></p>';
	}
	else if($next_question_id == -1)
	{
		$next_question_html = '<p><label style="font-size:20px" for="password">Thanks for submitting form.</label></p><p>';

		$button_html = '<p class="submit"><button id="btn_register" type="button" onclick="jQuery(\'body\').parent().scrollTop(0); window.scrollTo(0,0);$(\'#step3_nav\').click();" class="btn">Next</button></p>';
	}
	else 
	{
		$query = 'select * from wp_questions  q  where  question_type="'.$question_type.'" AND q.id='.$next_question_id;
		//echo $query;
		$next_question =  $wpdb->get_row($query);
		$button_html   = '<p class="submit"><button id="btn_register" type="button" onclick="jQuery(\'body\').parent().scrollTop(0); window.scrollTo(0,0); get_previous_question() " class="btn">Previous</button>';
		$button_html  .='<button id="btn_register" type="button" onclick="jQuery(\'body\').parent().scrollTop(0); window.scrollTo(0,0); save_user_answer('.($next_question->id).',\''.sanitize_title($next_question->question).'\') " class="btn">Next</button>'.'</p>';
	}

	$next_question_id 	= 	$next_question->id;	
	$answer_type 		=   $next_question->answer_type;
	
	//echo  $answer_type;
	if($answer_type == 'radio' || $answer_type == 'checkbox')
	{
		$next_question_html = '<p><label style="font-size:20px" for="password">'.($next_question->question).'</label></p><p>';
		$answers 	=	 $wpdb->get_results('SELECT * FROM wp_answers WHERE  question_id='.$next_question_id );	
		 //echo "<pre>";
		 //	print_r($answers); 
		 // echo "</pre>";
		$matrix  =   array(); 
		$matrix['Stra'] = array('Fm','Mle','AAB','CSN','Asn','Latin','Idn','Stra','Cly','Drd','NatStra',
								'Relxsta','VS','Sht','Mdm','Lng','VL','Cse','Soft','SDy','ChemOverpr','Breakage','SplitEND',
								'Normal','Thk','Thn','Pattnbld','Alopca','SDy','Norml','Oily','Nrml',
								'Blk','Brwn','Blnd','Rd','naturalgrey','Othr','Clord','Nne','Relax','Texture','Sub18','19-25','26-45','46+');

		$matrix['Cly'] = array('Fm','Mle','AAB','CSN','Asn','Latin','Idn','Stra','Cly','Drd','NaturCurl','Bdywve','Verycurly','3cm curl','CoilCurl'
								,'VS','Sht','Mdm','Lng','VL','Cse','Soft','SDy','ChemOverpr','Breakage','SplitEND',
								'Normal','Thk','Thn','Pattnbld','Alopca','SDy','Norml','Oily','Nrml',
								'Blk','Brwn','Blnd','Rd','naturalgrey','Othr','PerC','Clord','Nne','Relax','Texture','Sub18','19-25','26-45','46+');
		
		$matrix['Drd'] = array('Fm','Mle','AAB','CSN','Asn','Latin','Idn','Stra','Cly','Drd','Sislck','Dredlk',
								'VS','Sht','Mdm','Lng','VL','Cse','Soft','SDy','ChemOverpr','Breakage',
								'Normal','Thk','Thn','Pattnbld','Alopca','SDy','Norml','Oily','Nrml',
								'Blk','Brwn','Blnd','Rd','naturalgrey','Othr','Clord','Nne','Relax','Texture','Sub18','19-25','26-45','46+');
		
		//echo "user id ".$user_id;

		$types 	= 	 get_hair_types($user_id,$question_type);
//		 echo "Type ". $type;
		$checkboxcounter = 1;
		foreach($answers as $answer) 
		{
			// echo $answer->value.'-';
			$next_question_html .= '<label style="width:100%">';
			if(!empty($types))
			{


				$is_approved_by_matrix = false;
				foreach ($types as $type) {
				//echo $answer->value.'<br/>';
				//echo $type->answer.'<br/>';
				$answer->value = trim($answer->value);
					if(in_arrayi( $answer->value, $matrix[$type->answer]))
					{	
						$is_approved_by_matrix = true;
					}	
				}

				if($is_approved_by_matrix) {
					if ($answer_type == 'checkbox') {
						$next_question_html .= '<input style="width: 24px;" type="checkbox" value="'.($answer->value).'" id="'.sanitize_title($answer->label).($checkboxcounter++).'" name="'.sanitize_title($next_question->question).'[]" > '.($answer->label);
					} else {
						$next_question_html .= '<input type="radio" value="'.($answer->value).'" id="'.sanitize_title($answer->label).'" name="'.sanitize_title($next_question->question).'" > '.($answer->label);
					}
					$imagepath = dirname (__FILE__).'/HL_Database_Photos/'.$answer->value.'.jpg';
					$imageurl  = plugins_url( 'HL_Database_Photos/'.$answer->value.'.jpg' , __FILE__ );
					
					if (file_exists($imagepath)) {
						$next_question_html .= '<img style="float:right;width:300px;height:300px;cursor:pointer" src="' . $imageurl . '" > ';
					}
				}
			} else	{
			
					// echo "in else ";
				if ($answer_type == 'checkbox') {
					$next_question_html .= '<input style="width: 24px;" type="checkbox" value="'.($answer->value).'" id="'.sanitize_title($answer->label).'" name="'.sanitize_title($next_question->question).'[]" > '.($answer->label);

				} else {
					$next_question_html .= '<input type="radio" value="'.($answer->value).'" id="'.sanitize_title($answer->label).'" name="'.sanitize_title($next_question->question).'" > '.($answer->label);
				}	
				$imagepath = dirname (__FILE__).'/HL_Database_Photos/'.$answer->value.'.jpg';
					$imageurl  = plugins_url( 'HL_Database_Photos/'.$answer->value.'.jpg' , __FILE__ );
					
					//echo $imagepath;
					//echo $imageurl;
					
					if (file_exists($imagepath)) {
						$next_question_html .= '<img style="float:right;width:300px;height:300px;cursor:pointer" src="' . $imageurl . '" > ';
					}
			}
			
			
			
			$next_question_html .= '</label>';
		}
	}
	
	else if($answer_type == 'textfield') 
	{
		$next_question_html = '<p><label style="font-size:20px" for="password">'.($next_question->question).'</label></p><p>';
		$answers 	=	 $wpdb->get_results('SELECT * FROM wp_answers WHERE  question_id='.$next_question_id );
		$next_question_html .= '<input type="text" id="'.sanitize_title($answer->label).'" name="'.sanitize_title($next_question->question).'" >';
	}

	$script = '';
	if($action=='get_next_question')
	{
		$script = 'animate_progress_bar(0,\''.get_progress_bar_width($user_id,$question_type).'%\')';
	}

	if($action=='save_user_answer')
	{
		$script = 'animate_progress_bar(\''.(get_progress_bar_width($user_id,$question_type)-get_sinlge_question_weightage($question_type)).'%\','.'\''.get_progress_bar_width($user_id,$question_type).'%\')';
	}
	if($action=='get_previous_question')
	{
		$script = 'animate_progress_bar(\''.(get_progress_bar_width($user_id,$question_type)+get_sinlge_question_weightage($question_type)).'%\','.'\''.get_progress_bar_width($user_id,$question_type).'%\')';
	}

	$progress_bar = '<div class="meter nostripes orange">
			<span style="width: '.(get_progress_bar_width($user_id,$question_type)).'%"></span>
		</div>';
	$loader = '<div id="registration_loader_div" style="display:none;text-align:center;"><img src="'.get_bloginfo('stylesheet_directory').'/jc2t-slider-form/images/big-ajax-loader-black.gif" alt="" /></div>';
	$html   = '<form id="productform">'; 
	$html   .= '<div style="width:700px;margin:auto">'.$loader.$next_question_html; 
	$html.='</p>'.$button_html.$progress_bar.'</div>######'.$script;
	$html.='</form>';
	echo $html;
	exit;	
}

function in_arrayi($needle, $haystack) {
	return in_array(strtolower($needle), array_map('strtolower', $haystack));
}

function get_sinlge_question_weightage($question_type)
{
	$total_question_count 		= get_total_questions_count($question_type);
	$percentage = (1 / $total_question_count) *100; 
	return $percentage;
}

function get_progress_bar_width($user_id,$question_type)
{
	$total_question_count 		= get_total_questions_count($question_type);
	$answered_question_count 	= get_answered_questions_count($user_id,$question_type);
	$percentage = ($answered_question_count / $total_question_count) *100; 
	return $percentage;
}

function get_total_questions_count($question_type)
{
	global $wpdb;
	$query  = 'select count(*) from wp_questions where question_type="'.$question_type.'"';
	$count = $wpdb->get_var($query); 
	return $count;
}

function get_answered_questions_count($user_id,$question_type)
{
	global $wpdb;
	$query 			= "SELECT q.id FROM   wp_answers a, wp_user_answer u, wp_questions q WHERE user_id=".$user_id . " AND  question_type='".$question_type."' AND a.question_id=u.question_id AND q.id=a.question_id order by question_no desc  limit 0,1" ;
	$id 	 		= $wpdb->get_var($query);
	if($id)
	{
		$query = "select count(*) from wp_questions where id<={$id} and question_type='".$question_type."'";
		return $wpdb->get_var($query);
	}
	else 
	return 0;	
}
function get_remaining_questions_count($question_type)
{
	global $wpdb;
	$query 			= "SELECT q.id FROM   wp_answers a, wp_user_answer u, wp_questions q WHERE user_id=".$user_id . " AND  question_type='".$question_type."' AND a.question_id=u.question_id AND q.id=a.question_id order by question_no desc  limit 0,1" ;
	$id 	 		= $wpdb->get_var($query);
	$query = "select count(*) from wp_questions where id>{$id} and question_type='".$question_type."'";
	return $wpdb->get_var($query);
}




// add_action('init','get_hair_type');
function get_hair_types($user_id,$question_type)
{
	global $wpdb;
	if($question_type == "producer")
	{
	$query = 'SELECT answer FROM wp_questions q,wp_user_answer a WHERE q.id=a.question_id AND q.question_type= "'.$question_type.'" AND q.question="Targeted Hair Type" AND a.user_id='.$user_id;
	}
	else
	{
		$query = 'SELECT answer FROM wp_questions q,wp_user_answer a WHERE q.id=a.question_id AND q.question_type= "'.$question_type.'" AND q.question="Hair Type" AND a.user_id='.$user_id;
	}
	//echo($query);
	return $wpdb->get_results($query);
}


add_action('wp_ajax_save_user_answer', 'save_answer');
add_action('wp_ajax_nopriv_save_user_answer', 'save_answer');

function save_answer()
{
	global $wpdb;

	$user_id  		= $_POST['user_id'];
	$answer  		= $_POST['answer'];
	$question_id 	= $_POST['question_id'];
	$table = 'wp_user_answer';
	
	$params = array();
	parse_str($_POST['formdata'], $params);
	//print_rr( $_POST['formdata'] );
	//print_rr( $params );

	// echo $user_id;
	foreach ($params as $key => $value) {
		if (is_array($value)) { //this mean this is checkbox
			foreach ($value as $value1) {
				$data =  array( );
				$data['user_id'] 	= $user_id; 
				$data['answer'] 	= $value1; 
				$data['question_id']= $question_id; 
				
				$format = array('%d','%s','%d');
				$wpdb->insert( $table, $data, $format );
				//print_rr( $wpdb );
			}
		} else {
			$data =  array( );
			$data['user_id'] 	= $user_id; 
			$data['answer'] 	= $value; 
			$data['question_id']= $question_id; 
			
			$format = array('%d','%s','%d');
			$wpdb->insert( $table, $data, $format );
		}
		
	}
	


	get_next_question();
}

function insert_attachment($file_handler,$post_id,$setthumb=false) {
	// check to make sure its a successful upload
	if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();
	require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');
	$attach_id = media_handle_upload( $file_handler, $post_id );
	if ($setthumb) update_post_meta($post_id,'_thumbnail_id',$attach_id);
	return $attach_id;
}

?>
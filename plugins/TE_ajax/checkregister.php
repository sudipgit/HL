<?php	
	require "../../../wp-load.php";
	require(ABSPATH . WPINC . '/registration.php');
	$username 	= $_GET['username'];
	$useremail 	= $_GET['email'];
	if( isset($username) && !empty($username) ) {
		if( strlen($username) > 3 ) {
			if( username_exists( $username ) ) {
				$responseArr['username'] = array('status' => -1, 'message' => 'Username exist');
			} else {
				$responseArr['username'] = array('status' => 1, 'message' => 'Username available');
			}
		} else {
			$responseArr['username'] = array('status' => -1, 'message' => 'Username too short');
		}
	} else {
		$responseArr['username'] = array('status' => 0, 'message' => 'Username empty');
	}
	
	if( isset($useremail) && !empty($useremail) ) {
		if( is_email($useremail) ) {
			if( email_exists( $useremail ) ) {
				$responseArr['email'] = array('status' => -1, 'message' => 'Email already exist');
			} else {
				$responseArr['email'] = array('status' => 1, 'message' => 'Email available');
			}
		} else {
			$responseArr['email'] = array('status' => -1, 'message' => 'Email not valid');
		}
	} else {
		$responseArr['email'] = array('status' => 0, 'message' => 'Email empty');
	}
	echo json_encode($responseArr);
?>
<?php 
	include_once '../admin/controller/common_functions.php';
	include_once '../admin/model/db.php';
	include_once 'process_message.php';
	$con = db_connect();
	$email = sanitize($_GET['email'], $con);
	$password = sanitize($_GET['password'], $con);
	$raw_data = get_raw_data($email, $password, $con);
	if($raw_data!="empty"){
		// print_r($raw_data);
		$url=$_SERVER['REQUEST_URI'];
		$parts = parse_url($url);
		parse_str($parts['query'], $query);
		// echo $query['message'];
		// echo $query['phone_number'];
		$raw = array('sender_id' => $raw_data['sender_id'] ,'mobile_numbers' => $query['phone_number'],'message' => $query['message'],'unicode' => $query['unicode'] ,'sms_count' => $raw_data['sms_count'],'user_id' => $raw_data['id'] );
		echo "<html><head><title></title></head><body><h1>OK</h1></body></html>";
		process_all_values($raw);
	}else{
		echo "Check_URL";
	}


	function get_raw_data($email, $password, $con){
		$selected_row = select('*', 'users', array("email_id"=>$email, "password"=>$password), $con);
		if ($selected_row == "empty") {
			return "empty";
		}
		else{
		return $selected_row[0];
		}
	}
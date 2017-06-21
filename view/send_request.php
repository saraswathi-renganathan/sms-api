<?php 
	include_once '../admin/model/db.php';
	include_once '../admin/controller/common_functions.php';
	include_once '../controller/header_functions.php';
	// print_r($_POST);
	// print_r($_SESSION);
	$conn = db_connect();
	$condition1 = "`addon_name` ='".$_POST['addon_name']."'";
	$addon_id = select('id','`addons`',$condition1,$conn);
	$values = array('user_id' => $_SESSION['user_details']['id'],'addon_id' => $addon_id[0]['id']);
	$check = select('`user_id`,`addon_id`','`addon_requests`',$values, $conn);
	if ($check == "empty") {
		insert('`addon_requests`',$values,$conn);
		$to = 'vefetchtechnologies@gmail.com';
		$message_content = "The Customer ".$_SESSION['user_details']['user_name']."(".$_SESSION['user_details']['email_id'].") has requested for the addon <b>'".$_POST['addon_name']."'</b> on ".date(" d-m-Y  h:i")." kindly process the request";
		$subject  = "Request for Addon - Reg";
		$headers  = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
		'MIME-Version: 1.0' . "\r\n" .
		'Content-type: text/html; charset=utf-8';
		if(mail($to, $subject, $message_content, $headers))
			echo "Request sent";
		else
			echo "Request sending failed ! Try again later";
	}else{
		echo "Request already sent";
	}
	

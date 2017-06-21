<?php 
	include_once '../admin/model/db.php';
	include_once '../admin/controller/common_functions.php';
	
	$con = db_connect();
	$updated_details = 	array(
	    "user_name" => $_POST['user_name'],
	    "mobile_number" => $_POST['mobile_number'],
	    "address" => $_POST['address'],
	    "password" => $_POST['password'],
	    "email_id" => $_POST['email_id'],
	);

	$conditions = array(
	    "id" => $_POST['id']
	);
	// print_r($updated_details);
	// print_r($conditions);

	if($val = update($updated_details, 'users', $conditions, $con)){
		$sender_id = $_SESSION['user_details']['sender_id'];
		session__update($sender_id);
	}

	function session__update($sender_id){
		$_SESSION['user_details'] =array(
			"user_name" => $_POST['user_name'],
			"mobile_number" => $_POST['mobile_number'],
			"address" => $_POST['address'],
			"password" => $_POST['password'],
			"email_id" => $_POST['email_id'],
			"id" => $_POST['id'],
			"sender_id" => $sender_id
			);
		// print_r($_SESSION['user_details']);
	}

<?php 

	include_once 'header.php';

	add_user($_POST);
	function add_user($raw_values){
		if(empty($raw_values)){
			header('location: ../view/404.php');
		}else{
			$conn = db_connect();
			$raw_values['date_of_creation'] = date("Y-m-d h:i:sa");
			$raw_values['active'] = "true";
			if(insert('users', $raw_values, $conn)){
				$message_content = "Thanks for subscribing Vefetch SMS Services, email : ".$raw_values['email_id']." password : ".$raw_values['password']." log on to vefetch.com/sms_api";
				send_message("VFETCH", $raw_values['mobile_number'], $message_content, NULL, NULL);
				// send_mail($row_values['email_id']);
				create_folder($raw_values['email_id']);
				header('location: ../view/add_user.php?status=inserted');
			}else{
				header('location: ../view/404.php?status=not_inserted');
			}
		}
	}

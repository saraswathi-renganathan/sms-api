<?php 
session_start();

	
	function is__array($value){
		return is_array($value);
	}

	function emptty($value){
		return empty($value);
	}


	function log_out(){
		session_destroy();   
	}

	function get_raw_data($email, $password, $con){
		$selected_row = select('*', 'users', array("email_id"=>$email, "password"=>$password), $con);
		return $selected_row;
	}


?>
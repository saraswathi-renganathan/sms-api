<?php
	include_once '../admin/model/db.php';
	include_once '../admin/controller/common_functions.php'; 
	// print_r($_POST);
	$conn = db_connect();
	$values = array('template_name' => $_POST['template_name'], 'template_content' => $_POST['template_content'], 'user_id' => $_SESSION['user_details']['id']);
	$result = insert('`template`',$values,$conn);

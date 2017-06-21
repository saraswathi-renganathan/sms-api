<?php 
	include_once '../admin/model/db.php';
	include_once '../admin/controller/common_functions.php'; 
	print_r($_POST);
	$conn = db_connect();
	$values = array('id' => $_POST['id']);
	$result = delete('template', $values, $conn);
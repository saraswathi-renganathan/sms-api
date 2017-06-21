<?php 
	include_once '../admin/model/db.php';
	include_once '../admin/controller/common_functions.php'; 
	print_r($_POST);
	$conn = db_connect();
	$condition = array('id' => $_POST['id']);
	$column_names = 
	$result = update($column_names, '`template`', $condition, $conn);
<?php 
	include_once '../admin/controller/common_functions.php';
	include_once '../admin/model/db.php';
	$name = $_GET['file_name'];
	$link = db_connect();
	$sql = "DELETE FROM files WHERE `user_id`='".$_SESSION['user_details']['id']."' AND `file_name` = '".$name."' ";
	execute_Query($sql, $link);
	 $f_name = "../files/".$_SESSION['user_details']['email_id']."/"."$name";
	 print_r($f_name);
	 delete_file($f_name);
	 header("Location: text_upload.php");
	?>
<?php
	include_once '../admin/model/db.php';
	include_once '../admin/controller/common_functions.php';
	
	$user_details = $_SESSION['user_details'];
	$user_id = $user_details['id'];
	$target_dir = "../files/".$user_details['email_id']."/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$file_name1 = basename( $_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	echo "$target_file";
	if (file_exists($target_file)) {
	    $uploadOk = 0;
	    echo "Sorry, file already exists.";
		header('location: ../view/bulk_sms.php?status=file_exists');
	}
	else
	{
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    	$sql = "INSERT INTO `files` (`file_name`, `user_id`) VALUES ('$file_name1', '$user_id')";
			execute_query($sql, $link);
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	        header('location: ../view/bulk_sms.php?status=uploaded');
	    } 
	    else {
	        header('location: ../view/bulk_sms.php?status=error');
	    }
	}
?>
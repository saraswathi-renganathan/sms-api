<?php
	include_once '../admin/controller/common_functions.php';
	include_once '../admin/model/db.php';
	include_once '../controller/process_message.php';
	$sql = 'INSERT INTO MessageOut (MessageTo, MessageFrom, MessageText) VALUES 
			("7695959942", "GAUTHM", "dbtest"),("7695959942", "GAUTHM", "dbtest"),("7695959942", "GAUTHM", "dbtest"),("7695959942", "GAUTHM", "dbtest"),("7695959942", "GAUTHM", "dbtest")'
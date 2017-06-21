<?php
	include_once '../admin/controller/common_functions.php';
	include_once '../admin/model/db.php';
	include_once '../controller/process_message.php';
	// echo "<pre>";
	// print_r($_SESSION['numbers']);
	// print_r($_POST);
	$message = $_POST['bulk_message'];
	$numbers = $_SESSION['numbers'];
	$count = get_user_sms_count($_SESSION['user_details']['id']);
	$message_length = iconv_strlen($_POST['bulk_message'] , "UTF-8");
	$message_count=get_message_count($message_length,$_POST['bulk_unicode']);
	$total_message_count = count_total_messages($numbers, $message_count);
	$conn = sms_db_connect($_POST['bulk_unicode']);
	$failed = 0;
	$null = "NULL";
	// echo $_POST['date_time'];
	// echo "$date_time";

	// print_r($numbers);
	if(empty($numbers)){
		echo " all are fake numbers or invalid numbers we removed it";
	}else if($count >= $total_message_count) {
		$number_count = count($numbers);

		if($number_count >= 100){
			end($numbers);
			$last_key = key($numbers);
			$qutioent = $last_key / 100;
			$total_counting_times = explode(".", $qutioent);
			echo "<pre>";
			$splited_numbers = (partition($numbers,  $total_counting_times[0]));
			foreach ($splited_numbers as $key => $set) {
				$numbers_count = count($set);
			 	$where = "";
			 	foreach ($set as $key => $number) {
					if($where == ""){
						$where = '("'.$number.'", "'.$_POST['bulk_message'].'", "'. $_POST['bulk_sender_id'].'", '.(isset($_POST['date_time']) ? '"'.$_POST['date_time'].'"' : $null).')';

					}else{
						$where = $where.', ("'.$number.'", "'.$_POST['bulk_message'].'", "'. $_POST['bulk_sender_id'].'", '.(isset($_POST['date_time']) ? '"'.$_POST['date_time'].'"' : $null).')';
					}
				}
				$sql = "INSERT INTO `MessageOut` (`MessageTo`, `MessageText`, `MessageFrom`, `Scheduled`) VALUES ".$where;
				// echo $sql;
				// echo "<br/>";
				mysqli_set_charset($conn, 'utf8mb4'); 
				if(execute_query($sql, $conn)){
					$count = get_user_sms_count($_SESSION['user_details']['id']);
					$total_sms_sent_count = $numbers_count * $message_count;
					update_user_sms_count($count, $total_sms_sent_count, $_SESSION['user_details']['id']);
				}else{
					$failed++;
				}
			}  
		}else{
			$where = "";
		 	foreach ($numbers as $key => $number) {
				if($where == ""){
					$where = '("'.$number.'", "'.$_POST['bulk_message'].'", "'. $_POST['bulk_sender_id'].'", '.(isset($_POST['date_time']) ? '"'.$_POST['date_time'].'"' : $null).')';

				}else{
					$where = $where.', ("'.$number.'", "'.$_POST['bulk_message'].'", "'. $_POST['bulk_sender_id'].'", '.(isset($_POST['date_time']) ? '"'.$_POST['date_time'].'"' : $null).')';
				}
			}
			$sql = "INSERT INTO `MessageOut` (`MessageTo`, `MessageText`, `MessageFrom`, `Scheduled`) VALUES ".$where;
			// echo $sql;
			// echo "<br/>";
			mysqli_set_charset($conn, 'utf8mb4'); 
			if(execute_query($sql, $conn)){
				update_user_sms_count($count, $total_message_count, $_SESSION['user_details']['id']);
			}else{
				$failed++;
			}
		}
		if($failed != 0){
			echo "Something went wrong! Message not sent successfully";
		}else{
			echo "Message Sent Successfully";
		}
	}
	else{
		echo "Recharge your account";
	}



	function partition( $list, $p ) {
		$listlen = count( $list );
		$partlen = floor( $listlen / $p );
		$partrem = $listlen % $p;
		$partition = array();
		$mark = 0;
		for ($px = 0; $px < $p; $px++) {
			$incr = ($px < $partrem) ? $partlen + 1 : $partlen;
			$partition[$px] = array_slice( $list, $mark, $incr );
			$mark += $incr;
		}
		return $partition;
	}



 ?>
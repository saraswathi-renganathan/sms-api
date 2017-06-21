<?php 
	include_once '../admin/controller/common_functions.php';
	include_once '../admin/model/db.php';

	// $sql = 'SELECT SendTime, MessageText, MessageTo, StatusText FROM MessageLog WHERE SendTime LIKE "%'.date("Y-m-d").'%" AND MessageFrom = "LEGEND"';
	
	function get_today_sent_or_failed_data(){
		$condition = 'SendTime LIKE "%'.date("Y-m-d").'%" ORDER by SendTime DESC';
		$conn = sms_db_connect("not_checked");
		$result = select('`SendTime`, `MessageText`, `MessageTo`, `StatusText`, `StatusCode`', 'MessageLog', $condition, $conn);
		$conn1 = sms_db_connect("checked");
		$result1 = select('`SendTime`, `MessageText`, `MessageTo`, `StatusText`, `StatusCode`', 'MessageLog', $condition, $conn1);
		if ($result == "empty" && $result1 == "empty") {
			return NULL;
		}else if($result == "empty" || $result1 == "empty"){
			if($result == "empty"){
				return $result1;
			}else{
				return $result;
			}

		}else{
			$final_result = array_merge($result, $result1);
			usort($final_result, 'date_compare');
			return $final_result;
		}
	}

	function get_qued_data(){
		$sql = 'SELECT COUNT(MessageFrom) FROM MessageOut';
		$conn = sms_db_connect("not_checked");
		$result = execute_query($sql, $conn);
		$row = get_array_from_object($result);
		return $row;
	}

	function date_compare($a, $b){
		$t1 = strtotime($a['SendTime']);
		$t2 = strtotime($b['SendTime']);
		return $t1 - $t2;
	}

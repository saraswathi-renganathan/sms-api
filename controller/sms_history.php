<?php 
	include_once '../admin/model/db.php';
	include_once '../controller/default_functions.php';
	// print_r($_POST);
	$conn = sms_db_connect("not_checked");
	$condition = " `SendTime` between '".$_POST['starting_date']." 00:00:00' and '".$_POST['ending_date']." 23:59:59'";
	$result = select('`Id`, `MessageFrom`, `SendTime`, `ReceiveTime`, `MessageTo`, `MessageText`, `StatusText`, `StatusCode`', '`MessageLog`', $condition, $conn);
	// print_r($result);
	$conn1 = sms_db_connect("checked");
	$condition1 = " `SendTime` between '".$_POST['starting_date']." 00:00:00' and '".$_POST['ending_date']." 23:59:59'";
	$result1 = select('`Id`, `MessageFrom`, `SendTime`, `ReceiveTime`, `MessageTo`, `MessageText`, `StatusText`, `StatusCode`', '`MessageLog`', $condition1, $conn1);
	if ($result == "empty" && $result1 == "empty") {
		$final_result = NULL;
	}else if($result == "empty" || $result1 == "empty"){
		if($result == "empty"){
			$final_result = $result1;
		}else{
			$final_result = $result;
		}

	}else{
		$final_result = array_merge($result, $result1);
		usort($final_result, 'date_compare');
	}
	
	function date_compare($a, $b)
	{
	    $t1 = strtotime($a['SendTime']);
	    $t2 = strtotime($b['SendTime']);
	    return $t1 - $t2;
	}  
	if(!empty($final_result)){
		$html = '<table class="table"><thead>
					<tr>
					<th>S.No</th>
					<th>ID</th>
					<th>Message From</th>
					<th>Send Time</th>
					<th>Receive Time</th>
					<th>Message To</th>
					<th>Message Text</th>
					<th>Status Text</th>
					</tr>
					</thead><tbody>';
		if(count($final_result)>1000){
			$final_result = array_slice($final_result, 0, 1000); 
		}
		$i = 1;
		foreach ($final_result as $value) {
			switch ($value['StatusCode']) {
	          case '300':
	            $html_content1 = '<tr class="danger">';
	          break;

	          case '200':
	            $html_content1 = '<tr class="warning">';
	          break;

	          case '201':
	            $html_content1 = '<tr class="success">';
	          break;
	        }
			$html = $html. $html_content1 . "<td>".$i."</td><td>".$value['Id']."</td><td>".$value['MessageFrom']."</td><td>".$value['SendTime']."</td><td>".$value['ReceiveTime']."</td><td>".$value['MessageTo']."</td><td>".$value['MessageText']."</td><td>".$value['StatusText']."</td></tr>";
			$i++;
		}
		echo($html);
	}else{
		echo "No data found :(";
	}
<script type="text/javascript">
	var test = 1;
	function countChar(val) {
		len = val.value.length;
		if (isDoubleByte(val.value)) {
			$('#unicode').attr('checked', true);
		}
		if(document.getElementById('unicode').checked) {
			if (len <= 536) {
				<?php get_check_code("unicode"); ?>
			}else{
				document.getElementById('response').innerHTML = "<div class='alert alert-danger'><strong>Oops!</strong>not able to send message due to over content</div>";				
			}
		}else{
			if (len <= 1224) {
				<?php get_check_code("normal"); ?>
			}else{
				document.getElementById('response').innerHTML = "<div class='alert alert-danger'><strong>Oops!</strong>not able to send message due to over content</div>";
			}
		}
	}
	function isDoubleByte(str) {
		for (var i = 0, n = str.length; i < n; i++) {
			if (str.charCodeAt( i ) > 255) { 
				return true; 
			}
		}
		return false;
	}

	$('body').on('click', "#unicode", function(){
		len = $("#message").val().length;
		message = $("#message").val();
		if (isDoubleByte(message)) {
			$('#unicode').prop('checked', true);
		}
		if(document.getElementById('unicode').checked) {
			if (len <= 536) {
				<?php get_check_code("unicode"); ?>
			}else{
				document.getElementById('response').innerHTML = "<div class='alert alert-danger'><strong>Oops!</strong>not able to send message due to over content</div>";
			}
		}else{
			if (len <= 1224) {
				<?php get_check_code("normal"); ?>
			}else{
				document.getElementById('response').innerHTML = "<div class='alert alert-danger'><strong>Oops!</strong>not able to send message due to over content</div>";
			}
		}
	});
	$(document).ready(function() {
		$('#schedule').hide();
		$('.box-body > div > a').on('click', function() {
			var data = this.innerHTML;
			// console.log(data);
			document.getElementById('message').value = data;
		});
	});
	$('body').on('click', "#show_schedule", function(){
		$('#schedule').toggle();
		$('#send_single_sms').toggle();
	});
	$('body').on('click', "#schedule_sms", function(e){
		var date = $("#date").val();
		var time = $("#time").val();
		date_time = date+" "+time;
		// console.log(date_time);
		$("form").submit(function(e){
			e.preventDefault();
	         var sender_id = $("#sender_id").val();
	         var mobile_numbers = $("#mobile_numbers").val();
	         var message = $("#message").val();
			if (isDoubleByte(message)) {
				$('#unicode').prop('checked', true);
			}
	         var user_id = $("#user_id").val();
	        if(document.getElementById('unicode').checked) {
				var unicode = "checked";
			} else {
				var unicode = "not_checked";
			}
			$('#schedule_sms').attr("disabled", true);
			document.getElementById('response').innerHTML = "<div class='alert alert-success'><strong>Please</strong>Wait a moment we are processing your messages</div>"; 
			window.location.href = "home.php";
			$.ajax({
				type: "POST",
				url: "../controller/send_sms.php",
				data: {sender_id : sender_id, mobile_numbers : mobile_numbers, message : message, unicode : unicode, user_id : user_id, date_time :date_time},
				success: function(data) {  
					console.log(data);   
					if (data == "Recharge your account") {
						document.getElementById('response').innerHTML = "<div class='alert alert-danger'><strong>Sorry!</strong>Recharge your account.</div>"; 
					} else if(data ==  " make sure you enter correct phone numbers "){
						document.getElementById('response').innerHTML = "<div class='alert alert-danger'><strong>Oops!</strong>"+data+"</div>"; 
					} else if(data ==  "not able to send message due to over content"){
						document.getElementById('response').innerHTML = "<div class='alert alert-danger'><strong>Oops!</strong>"+data+"</div>"; 
					} else{
						document.getElementById('response').innerHTML = "<div class='alert alert-success'><strong>Success!</strong>Message sent</div>"; 
					}
					// setTimeout( function(){ location.reload();  }  , 1000 );
				}
			});
		});
	});

	function isNumber(evt) {
		var theEvent = evt || window.event;
		var key = theEvent.keyCode || theEvent.which;
		key = String.fromCharCode(key);
		var regex = /^[0-9,]+$/;
		if (!regex.test(key)) {
			theEvent.returnValue = false;
		if (theEvent.preventDefault) theEvent.preventDefault();
		}
	}
	$('body').one('click', "#send_single_sms", function(e){
		// setTimeout( function(){ location.reload();  }  , 300 );
		$("form").submit(function(e){
			e.preventDefault();
	         var sender_id = $("#sender_id").val();
	         var mobile_numbers = $("#mobile_numbers").val();
	         var message = $("#message").val();
			if (isDoubleByte(message)) {
				$('#unicode').prop('checked', true);
			}
	         var user_id = $("#user_id").val();
	        if(document.getElementById('unicode').checked) {
				var unicode = "checked";
			} else {
				var unicode = "not_checked";
			}
			$('#send_single_sms').attr("disabled", true);
			document.getElementById('response').innerHTML = "<div class='alert alert-success'><strong>Please</strong>Wait a moment we are processing your messages</div>"; 
			window.location.href = "home.php";
			$.ajax({
				type: "POST",
				url: "../controller/send_sms.php",
				data: {sender_id : sender_id, mobile_numbers : mobile_numbers, message : message, unicode : unicode, user_id : user_id},
				success: function(data) {  
					console.log(data);   
					if (data == "Recharge your account") {
						document.getElementById('response').innerHTML = "<div class='alert alert-danger'><strong>Sorry!</strong>Recharge your account.</div>"; 
					} else if(data ==  " make sure you enter correct phone numbers "){
						document.getElementById('response').innerHTML = "<div class='alert alert-danger'><strong>Oops!</strong>"+data+"</div>"; 
					} else if(data ==  "not able to send message due to over content"){
						document.getElementById('response').innerHTML = "<div class='alert alert-danger'><strong>Oops!</strong>"+data+"</div>"; 
					} else{
						document.getElementById('response').innerHTML = "<div class='alert alert-success'><strong>Success!</strong>Message sent</div>"; 
					}
					// setTimeout( function(){ location.reload();  }  , 1000 );
				}
			});
		});
	});
</script>
<?php 
	function get_check_code($for){
		include_once '../admin/model/db.php';
		$conn = db_connect();
		if($for == "unicode"){
			$sql = "SELECT `$for` FROM `sms_count`";
		}else{
			$sql = "SELECT `$for` FROM `sms_count`";
		}
		$result = execute_query($sql, $conn);
		while($row = mysqli_fetch_array($result)) {
			$selected_rows[] = $row[$for];
		}
		
		$i = 1;
		$condition="";
		foreach ($selected_rows as $key => $value) {
			if($i == 1){
				$condition = $condition."if(len <".$value."){document.getElementById('charNum').innerHTML = 'Number of SMS will Send = ".$i." ('+ len + ')'; }";
			} else{
				$condition = $condition."else if(len <".$value."){document.getElementById('charNum').innerHTML = 'Number of SMS will Send = ".$i." ('+ len + ')'; }";
			}
			$i++;
		}
		echo $condition;
	}
?>


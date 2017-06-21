<script type="text/javascript">
		$('body').on('click', "#report", function(){
         var starting_date = $("#starting_date").val();
         var ending_date = $("#ending_date").val();
         document.getElementById('response').innerHTML = "<div class='alert alert-success'><strong>Processing!</strong>please wait</div>";
		$.ajax({
			type: "POST",
			url: "../controller/sms_history.php",
			data: {starting_date : starting_date, ending_date : ending_date},
			success: function(data) {  
				// console.log(data); 
				if (data =="Warning: mysqli_connect(): (HY000/2002): A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond. in C:\\xampp\\htdocs\\SMS_API\\admin\\model\\db.php on line 31Connection failed: A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond.") {
					document.getElementById('response').innerHTML = "<div class='alert alert-danger'><strong>Sorry for the inconvinence ! </strong>Server cannot be reached right now,please try again later</div>";
				} else{
					document.getElementById('response').innerHTML = data;
				} 
			}
		});

	})
</script>
<script type="text/javascript">
$('body').on('click', "#submit", function(){
	$("form").submit(function(e){
		e.preventDefault();
	});
	var user_name = $("#user_name").val();
	var mobile_number = $("#mobile_number").val();
	var address = $("#address").val();
	var password = $("#password").val();
	var email_id = $("#email_id").val();
	var id = $("#id").val();
	$.ajax({
		type: "POST",
		url: "../controller/update_my_details.php",
		data:{user_name : user_name, mobile_number : mobile_number, address : address, password : password, email_id : email_id,  id : id},
		success: function(data) {
			// console.log(data);    
			if (data){
				document.getElementById('response').innerHTML =  "<strong>Success!</strong> Account updated.";
			}      
		}
	});

});
</script>
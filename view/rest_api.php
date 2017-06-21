<?php include_once 'header.php'; 
 	$words =  $_SERVER['REQUEST_URI'];
	$showword = explode('/',trim($words,'/'));
	 $url='http://' . $_SERVER['HTTP_HOST'].'/'.$showword[0];  
 	
	$remaining_url = "/controller/rest_api.php?email=".$user_details['email_id']."&password=".$user_details['password']."&message=testing%20thisd%20message&phone_number=".$user_details['mobile_number']."&sender_id=".$user_details['sender_id']."&unicode=0"

?>
	<input type="textbox" class="form-control" id="url" name="url" value="<?php echo $url.$remaining_url; ?>" >
	<br>
	<button class="btn btn-info col-md-3 pull-right" id="test" name="test">Test</button>
	<div id="response"></div>
	<script type="text/javascript">
		$('body').on('click', '#test', function(){
			url = $('#url').val();
			$.ajax(url, { 
				'success': function(data) {
					// console.log(data);
					if (data == "Recharge your account") {
						document.getElementById('response').innerHTML = "<div class='alert alert-danger col-md-6'><strong>Sorry!</strong>Recharge your account.</div>"; 
					} else if(data ==  " make sure you enter correct phone numbers "){
						document.getElementById('response').innerHTML = "<div class='alert alert-danger col-md-6'><strong>Oops!</strong>"+data+"</div>"; 
					} else if(data ==  "not able to send message due to over content"){
						document.getElementById('response').innerHTML = "<div class='alert alert-danger col-md-6'><strong>Oops!</strong>"+data+"</div>"; 
					} else{
						document.getElementById('response').innerHTML = "<div class='alert alert-success col-md-6'><strong>Success!</strong>Message sent</div>"; 
					}
					setTimeout( function(){ location.reload();  }  , 1000 );
				}
			});
		})
	 </script>
<?php include_once 'footer.php'; ?>

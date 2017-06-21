<script type="text/javascript">
	$('body').on('click', "#add_template", function(e){
		$("form").submit(function(e){
			e.preventDefault();
			template_name = document.getElementById('template_name').value;
			template_content = document.getElementById('template_content').value;
				$.ajax({
				type: "POST",
				url: "../controller/template.php",
				data: {template_name : template_name, template_content : template_content},
				success: function(data) {  
					console.log(data);  
					document.getElementById('response').innerHTML = "<div class='alert alert-success'><strong>Hey!</strong>Template has been added</div>"; 
				}
			});
		});
	});
</script>
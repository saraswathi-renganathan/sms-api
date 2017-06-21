<?php 
	include_once 'header.php';
	include_once 'bulk_sms_count.php';
	if (!isset($_POST['user_data'])) {
		echo "<div class='alert alert-danger'><strong>Please select a row for message ! </strong>no data</div>";
	}
	else{	
	$_SESSION['numbers']= $_POST['user_data'];
	echo "<blockquote style='color:red'>Contacts selected : ".count($_SESSION['numbers'])."</blockquote>";
	$headers = explode('|',$_POST['hidden_format_name']);
	$_SESSION['headers'] = $headers;
	$raw_data = $_POST['user_data'];
	// print_r($raw_data);
	// print_r($headers);
	$j = 0;
	$count = count($headers)-1;
	$headers[$count] = "number";
	foreach ($raw_data as $value) {
		$final_values = explode('|', $value);
		for ($i=0; $i < count($final_values); $i++) { 
			$final_data[$j][$headers[$i]] = $final_values[$i];
		}
		$j++;
	}
	// print_r($final_data);
	$count_final_data = count($final_data)-1;
	// print_r($count_final_data);
	$_SESSION['bulk_data'] = $final_data;
?>	
	<div>
		<h1>Enter Your Message</h1>
		<hr style="border-top: 1px solid #191616">
	</div>
	<form>
	<div class="col-md-6">
		<table class="table">
			<tr>
				<td>
					<p>Sender ID :- </p>
				</td>
				<td>
					<select class="form-control" id="bulk_sender_id">
						<?php
							if(is__array($user_details['sender_id'])){
								foreach ($user_details['sender_id'] as $key => $sender_id) {
									echo "<option>".$sender_id."</option>";
								} 
							}else{
								echo "<option>".$user_details['sender_id']."</option>";
							}
						 ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
				<p>Enter Message :- </p>
				</td>
				<td>
				<textarea class="form-control" rows="5" id="bulk_message" name="message" onkeyup="countChar(this)" required></textarea>
				<div id="bulk_charNum">Number of SMS will Send = 1 (0)</div>
				<div>Use
				<?php

				foreach ($_SESSION['headers'] as $value) {
				 	echo "<b>#".$value."#</b> , ";
				 } 
				 ?> For Dynamic value representation.
				</div>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
				<label><input type="checkbox" id="bulk_unicode" name="unicode"> Unicode</label>
				</td>
			</tr>
			<tr>
				<td>
					<button type="button" class="btn btn-primary" id="show_schedule" style="width: 208px;">Schedule</button>
				</td>
				<td id="schedule">
					<input type="date" name="date" class="form-control" placeholder="Date" id="date" >
					<br/>
					<input type="time" name="time" class="form-control" placeholder="Time" id="time" >
					<br/>
					<div id="notifier"></div>
					<button type="submit" class="btn btn-success" id="schedule_sms" style="width: 208px;">Schedule Sms</button>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
				<button type="submit" class="btn btn-success" id="send_bulk_sms" style="width: 208px;">Send SMS</button>
				</td>
			</tr>
		</table>
	</form>
	</div>
	<div class="col-md-6">
	<div id="template" class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title ">Templates</h3>
		</div>
		<div class="box-body">
			<?php 
					$condition = "`user_id` =".$user_details['id']."";
					$template = select('`template_content`','`template`',$condition,$conn);
					// print_r($template);
					if ($template == "empty") {
						echo "<div class='form-group'><a href='template.php' class='input-group'>No Templates Present, Click to add</a></div><hr>";
					}else{
						foreach ($template as  $value) {
							echo "<div class='form-group'><a class='input-group'>".$value['template_content']."</a></div><hr>";
						} 
					}
				?>
		</div>
	</div>
</div>
<hr>
<div class="col-md-6" style="margin-top: 374px;margin-left: -229px;" id="response"></div>
<?php }  include_once '../view/footer.php'; ?>
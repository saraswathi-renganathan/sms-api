<?php 
	include_once 'header.php';
	include_once '../controller/view_controller.php';
	include_once 'bulk_sms_count.php';
	if(!empty($_GET['file_name'])){
		$file_path = "../files/".$user_details['email_id']."/".$_GET['file_name'];
		$final_excel_data = get_excel_data($file_path);
	}

?>
<div id="response">
	
</div>
<form id="form" action="validate_text_view.php" method="post">
	<table class="table table-hover record_table">
		<thead>
			<tr>
				<?php 
					echo "<th>Number</th>";
					unset($final_excel_data[0]);
				?>
				<th><input type="checkbox" id="checkAll" /> Check All</th>
				<input style="width: 70px;float: right;" type="button" id="next" class="form-control" id="next" value="Next">

			</tr>
		</thead>
		<tbody>

				<?php
					$td_values = "";
					$checkbox_value = "";
					foreach ($final_excel_data as $key => $excel_data_array) {
						foreach ($excel_data_array as $key => $value) {
							$td_values = $td_values."<td>".$value."</td>";
								$checkbox_value = $value;
						}
						echo '<tr>'.$td_values.'<td ><input type="checkbox" name="user_data[]" value="'.$checkbox_value.'"/></td></tr>';
						$td_values = "</form>";
						$checkbox_value = "";
					}
				?>
		</tbody>
	</table>
</form>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.record_table tr').click(function(event) {
				if (event.target.type !== 'checkbox') {
					$(':checkbox', this).trigger('click');
				}
			});
			
			$('body').on('change', '#checkAll', function(){
				$("input:checkbox").prop('checked', $(this).prop("checked"));
			});
			$('body').on('click', "#next", function(){
				$('#form').submit();
			});
		});
	</script>
	<style type="text/css">
		.highlight_row {
			background: rgba(165, 165, 165, 0.48);
		}
	</style>
<?php include_once 'footer.php'; ?>
<?php 
	include_once 'header.php'; 
	include_once 'template_process.php'; 
	include_once '../admin/model/db.php';
	include_once '../admin/controller/common_functions.php';
?>
<div>
	<h1>Add Template</h1>
	<hr style="border-top: 1px solid #191616">
</div>
<form>
	<table class="table" style="width:44%;">
		<tr>
			<td>
				<p>Template Name : </p>
			</td>
			<td>
				<input type="text" name="template_name" class="form-control" placeholder="Template Name" id="template_name"  required autofocus><br/>
			</td>
		</tr>
		<tr>
			<td>
				<p>Add Template : </p>
			</td>
			<td>
				<textarea class="form-control" rows="5" id="template_content" required></textarea>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<button type="submit" class="btn btn-success" id="add_template" style="width: 208px;">Add Template</button>
			</td>

		</tr>
		<tr>
			<div id="response"></div>
		</tr>
	</table>
</form>
<?php include_once 'footer.php'; ?>

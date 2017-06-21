<?php include_once 'header.php'; ?>
	<div>
		<h1>Mark Upload</h1>
		<hr style="border-top: 1px solid #191616">
	</div>
	<form>
		<input type="textbox" class="form-control" name="name_of_exam" placeholder="Name of the Exam" required><br/>
		<input type="textbox" class="form-control" name="class" placeholder="Class" required><br/>
		<input type="textbox" class="form-control" name="section" placeholder="Section" required><br/>
		<input type="file" class="form-control" name="markUpload" required><br/>
		<p style="text-align:center">
			<input type="submit" class="btn btn-info" style="font-size: 13px;"value="Upload File" name="submit">
		</p>
	</form>


<?php include_once 'footer.php'; ?>
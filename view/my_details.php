<?php 
	include_once 'header.php';
	include_once '../controller/my_details_controller.php';
	
 ?>
 <div>
	<h1 id="response"></h1>
</div>
<div>
	<h1 id="response"></h1>
</div>

<div>
	<h1><?php echo $user_details['user_name']; ?>, Update your details here.</h1>
	<hr style="border-top: 1px solid #191616">
</div>
	<form>
		<table class="table" style="width:44%;">
			<tr>
				<td>
					<p>Name/Organization :- </p>
				</td>
				<td>
					<input type="text" name="customer_name" id="user_name" class="form-control" placeholder="Name" value="<?php echo $user_details['user_name']; ?>" required autofocus><br/>
				</td>
			</tr>
			<tr>
				<td>
					<p>Enter Mobile Number :- </p>
				</td>
				<td>
					<input type="number" name="customer_mobile_number" id="mobile_number" class="form-control" placeholder="Mobile Number" value="<?php echo $user_details['mobile_number']; ?>" required autofocus><br/>
				</td>
			</tr>
			<tr>
				<td>
					<p>Address :- </p>
				</td>
				<td>
					<textarea class="form-control" name="address" rows="5" id="address"><?php echo $user_details['address']; ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<p>E-mail :- </p>
				</td>
				<td>
					<input type="text" name="email_id" id="email_id" class="form-control" placeholder="Name" value="<?php echo $user_details['email_id']; ?>" required autofocus><br/>
				</td>
			</tr>
			<tr>
				<td>
					<p>Password :- </p>
				</td>
				<td>
					<input type="password"  name="password" id="password" class="form-control" placeholder="password" value="<?php echo $user_details['password']; ?>" required autofocus><br/>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<button type="submit" id="submit" class="btn btn-success" style="width: 208px;">Update</button>
				</td>
			</tr>
		</table>
		<input type="hidden" name="id" id="id" value="<?php echo $user_details['id']; ?>">
	</form>
	<hr>

<?php include_once 'footer.php'; ?>

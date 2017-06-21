<?php include_once 'header.php'; ?>
	<form method="post" action="../controller/add_user.php">
		<table class="table" style="width:44%;">
			<tr>
				<td>
					<p>Name/Organization :- </p>
				</td>
				<td>
					<input type="text" name="user_name" class="form-control" placeholder="Name" required autofocus>
				</td>
			</tr>
			<tr>
				<td>
					<p>Email :- </p>
				</td>
				<td>
					<input type="email" name="email_id" class="form-control" placeholder="Email" required autofocus>
				</td>
			</tr>
			<tr>
				<td>
					<p>Enter Mobile Number :- </p>
				</td>
				<td>
					<input type="number" name="mobile_number" class="form-control" placeholder="Mobile Number" required autofocus>
				</td>
			</tr>
			<tr>
				<td>
					<p>Address :- </p>
				</td>
				<td>
					<textarea class="form-control" rows="5" name="address" id="address" placeholder="Address"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<p>Password :- </p>
				</td>
				<td>
					<input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
				</td>
			</tr>
			<tr>
				<td>
					<p>Sender Id :- </p>
				</td>
				<td>
					<input type="text" name="sender_id" class="form-control" placeholder="Sender Id" required autofocus>
				</td>
			</tr>
			<tr>
				<td>
					<p>Database(normal) :- </p>
				</td>
				<td>
					<input type="text" name="sms_db_credentials_normal" class="form-control" placeholder="Database(normal)" required >
					<strong>ip address|username|password|db name|port</strong>
				</td>
			</tr>
			<tr>
				<td>
					<p>Database(unicode) :- </p>
				</td>
				<td>
					<input type="text" name="sms_db_credentials_unicode" class="form-control" placeholder="Database(unicode)" required >
					<strong>ip address|username|password|db name|port</strong>
					<input type="hidden" name="addons" value="1,2,5,6,8,9,10">
				</td>
			</tr>
				<td>
				</td>
				<td>
					<button type="submit" class="btn btn-success" style="width: 208px;">Add User</button>
				</td>
			</tr>
		</table>
	</form>
<?php include_once 'footer.php'; ?>
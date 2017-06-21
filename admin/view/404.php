<?php include_once 'header.php'; ?>
	
<?php 
	if(isset($_GET['status'])){
		switch ($_GET['status']) {
			case 'not_inserted':
				?>
				<div>
					<br><br><br>
					<h1 style="text-align: center;font-size: 196px;">404</h1>
					<h3 style="text-align: center;font-size: 50px;">Not able to insert the data, Something went wrong! &#128527;</h3><br/>
					<h4 style="text-align: center;font-size: 25px;">Please contact <a href="https://sudhakarannadurai.wordpress.com/aboutme/">Sudhakar Annadurai</a></h4>
				</div>
				<?php
				break;
				case 'folder_not_created':
				?>
				<div>
					<br><br><br>
					<h1 style="text-align: center;font-size: 196px;">404</h1>
					<h3 style="text-align: center;font-size: 50px;">Not able to folder!, Something went wrong! &#128527;</h3><br/>
					<h4 style="text-align: center;font-size: 25px;">Please contact <a href="https://sudhakarannadurai.wordpress.com/aboutme/">Sudhakar Annadurai</a></h4>
				</div>
				<?php
				break;
		}
	}else{ ?>
		<div>
			<br><br><br>
			<h1 style="text-align: center;font-size: 196px;">404</h1>
			<h3 style="text-align: center;font-size: 50px;">Page Not found / Something went wrong! &#128527;</h3><br/>
			<h4 style="text-align: center;font-size: 25px;">Please contact <a href="sudhakrannadurai.wordpress.com/aboutme">Sudhakar Annadurai</a></h4>
		</div>
<?php } ?>
<?php include_once 'footer.php'; ?>
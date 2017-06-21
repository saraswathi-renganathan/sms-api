<?php 	
	include_once 'header.php'; 
	$condition = "`id` =".$user_details['id']."";
	$addons_paid = select('`addons`','`users`',$condition,$conn);
	$condition1 = "`id` NOT IN (".$addons_paid[0]['addons'].")";
	$addons_not_paid = select('*','`addons`',$condition1,$conn);
	// print_r($addons_not_paid);
	echo "<div id='request'></div><div>";
	$i = 0;
	foreach ($addons_not_paid as  $value) {
?>	
	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-3 show-image" >
		<img src="<?php echo $value['picture_path'];?>" style="width: 250px;height: 250px;" />
		<input class="update btn btn-primary col-sm-5 row-fluid" id="request<?php echo $i;?>" onclick="request(this.id)" type="button" 
		value="<?php echo $value['addon_name']; ?>" />
	</div>

<?php
	$i++;
	} 
	echo "</div>";
	include_once 'footer.php'; 
?>
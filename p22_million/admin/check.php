<?php
require("../config.php");
require ('admin_common.php');

if ($_REQUEST['pass']!='') {

	if ($_REQUEST['pass']==ADMIN_PASSWORD) {
		$_SESSION[ADMIN] = '1';

	}

}
if ($_SESSION[ADMIN]=='') {

	?>
Please input admin password:<br>
<form method='post'>
<input type="password" name='pass'>
<input type="submit" value="OK">
</form>
	<?php

	die();

}

// select all the blocks...

$sql = "SELECT order_id, block_id, banner_id FROM blocks WHERE status <> 'nfs'"; // nfs blocks do not have an order.
$result = mysql_query($sql);

while ($row=mysql_fetch_array($result)) {

	$sql = "SELECT order_id FROM orders WHERE banner_id='".$row['banner_id']."' AND  order_id='".$row['order_id']."'";
	$result2 = mysql_query($sql) or die (mysql_error());
	if (mysql_num_rows($result2)==0) { // there is no order matching
		// delete the blocks.
		echo "Deleting block #".$row['block_id']."<br>";
		$sql = "DELETE from blocks WHERE block_id='".$row['block_id']."' AND banner_id='".$row['banner_id']."' ";
		mysql_query($sql);
		

	}

}

echo "Check Completed.";
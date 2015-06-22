<?php

define ('NO_HOUSE_KEEP', 'YES');

require("../config.php");
require ('admin_common.php');

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past


$sql = "SELECT * FROM blocks where block_id='".$_REQUEST['block_id']."' ";
$result  = mysql_query ($sql) or die(mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);



if ($row[image_data]=='') {

	
	#$file_name = "block.png";
	$data = "iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAIAAAACUFjqAAAABGdBTUEAALGPC/xhBQAAABdJREFUKFNjvHLlCgMeAJT+jxswjFBpAOAoCvbvqFc9AAAAAElFTkSuQmCC";

	header ("Content-type: image/png");
	#$file = fopen ($file_name, 'r');
	#$data = fread ($file, filesize($file_name));
	echo base64_decode($data);
	#fclose($file);

} else {
	header ("Content-type: ".$row[mime_type]);
	echo base64_decode( $row[image_data]);

}

?>

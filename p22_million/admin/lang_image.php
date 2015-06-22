<?php

require("../config.php");
require ('admin_common.php');


$sql = "SELECT * FROM lang where lang_code='".$_REQUEST['code']."' ";
$result  = mysql_query ($sql) or die(mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);


header ("Content-type: ".$row[mime_type]);

echo base64_decode( $row[image_data]);


?>

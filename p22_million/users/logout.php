<?php
session_start();
require ("../config.php");

$now = (gmdate("Y-m-d H:i:s"));
$sql = "UPDATE `users` SET `logout_date`='$now' WHERE `Username`='".$_SESSION['MDS_Username']."'";
      //echo $sql;
 mysql_query($sql);
      

unset($_SESSION['MDS_ID']);
$_SESSION['MDS_ID']='';
$_SESSION['MDS_Domain']='';
session_destroy();
//require ('header.php'); 

?>
<html>
<head>
<link rel="stylesheet" type="text/css"
href="style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<center><img alt="" src="<?php echo SITE_LOGO_URL; ?>"/> <br/>
      <h3><?php echo $label['advertiser_logout_ok']; ?></h3> <a href="../"><?php 
	  $label["advertiser_logout_home"] = str_replace ("%SITE_NAME%", SITE_NAME , $label["advertiser_logout_home"]);
	  echo $label['advertiser_logout_home']; ?></a></center>
</body>

<?php

//require ('footer.php'); 

?>
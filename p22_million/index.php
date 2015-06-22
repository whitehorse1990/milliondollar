<html>
<head>
    <title>MillionDollar</title>
    <link rel="StyleSheet" type="text/css" href="bootstrap.css">
    <link rel="StyleSheet" type="text/css" href="custom.css">
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
<?php
define ('NO_HOUSE_KEEP', 'YES');

require ('config.php');


$BID = $_REQUEST['BID'];

if ($BID=='') {
	$BID = 1;
}
?>

<div class="container">
<?php
require ('header.php');

?>
</div>
<div id="home_map" class="home_map container">
<?php
if ($DB_ERROR) {
	echo "Database configuration error: ".$DB_ERROR;
} else {
	echo '<div class="main-map" style="position:relative; display: block">';
	show_map($BID);
	echo '</div>';
}
?>
</div>
<?php require ('footer.php'); ?>
</body>
</html>

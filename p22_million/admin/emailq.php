<?php


ini_set('max_execution_time', 100200);
require("../config.php");

$VERBOSE = "YES";

if ($_REQUEST['action']=="send") {
	$DO_SEND = "YES";
} elseif ($_SERVER['PHP_SELF']=="") {
	$DO_SEND = "YES";
} else {
	?>
<h3>This is a backend script which will process your outgoing email queue</h3><br>
Set this file up in your Cron jobs to run <i>every few minutes</i><br>
This scripts's location is: <b><?php echo $_SERVER['SCRIPT_FILENAME'];?></b><br>
Crontab command to run will look something like:<b> /usr/bin/php -f <?php echo $_SERVER['SCRIPT_FILENAME'];?></b><br>(Depending on the location of php)<p>

<br>Run Manually form Web:<input type="button" value="Process outgoing email queue" onclick="window.location='<?php echo $_SERVER['PHP_SELF'];?>?action=send' " >

	<?php
		die();

}

if ($DO_SEND=='YES') {

	process_mail_queue(EMAILS_PER_BATCH);

}
?>
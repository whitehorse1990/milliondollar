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
	<head>
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">

	</head>
Please input admin password:<br>
<form method='post'>
<input type="password" name='pass'>
<input type="submit" value="OK">
</form>
	<?php

	die();

}

?>

<h3>Instructions for manual update</h3>
<p>
1. <a href='preview.php' target='_blank'>Click this link</a> to view the entire grid on the screen.
</p>
<p>
2. Take a screenshot of the page. (You can press the 'Print Scr' button if you have a windows PC to copy the a screenshot into the clipboard. You may also use a screen capture tool such as Snag It which will help you capture the whole scrolling window in one go.)
</p>
<p>
3. Paste the screenshort into your favorite image editing program. Crop the image to your desired size. Save as 'main.gif'
</p>
<p>
4. Upload main.gif into the script's main directory.
</p>
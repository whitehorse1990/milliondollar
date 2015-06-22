<?php
session_start();
$style = "
    font-size: 16px;
    padding: 7px 15px;
    background: #0031CC;
    color: #FFF;
    border: none;
    cursor: pointer;
";
if (($_REQUEST['pass']!='') && (MAIN_PHP=='1')) {

	if ($_REQUEST['pass']==ADMIN_PASSWORD) {
		$_SESSION[ADMIN] = '1';

	}

}
if (($_SESSION[ADMIN]=='') ) {

	if (MAIN_PHP=='1') {
	?>
<div style="margin: 0 auto; width: 250px;">
<span style="display: block; text-align: center; font-size: 18px;">Please input admin password:</span>
<form method='post' style="text-align: center">
<input type="password" name='pass' style="display: block; width: 100%; padding: 5px; margin: 10px 0;" />
<input type="submit" value="OK" style="<?php echo $style;?>"/>
</form>
</div>
	<?php

	}

	die();

} 

?>
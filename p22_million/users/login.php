<?php session_start();

require "../config.php";

$target_page = $_REQUEST['target_page'];

if ($target_page=='') $target_page='select.php';

?>

<?php include('login_functions.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css"
href="style.css" />
<META HTTP-EQUIV="REFRESH" CONTENT="5; URL=<?php echo $target_page; ?>">
</head>
<body>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="35" height="26">&nbsp;</td>
	  <td height="26" valign="bottom"><center><img alt="" src="<?php echo SITE_LOGO_URL; ?>"/> <br/>
      <h3 ><?php 
	  $label["advertiser_logging_in"] = str_replace ("%SITE_NAME%", SITE_NAME , $label["advertiser_logging_in"]);
	  echo $label["advertiser_logging_in"]; ?> </h3></center> </td>
	</tr>
	<tr>
		<td width="35">&nbsp;</td>
		<td><span>
			<?php
				if (do_login()) {
					$ok = str_replace ( "%username%", $_SESSION['MDS_Username'], $label[advertiser_login_success2]);
					$ok = str_replace ( "%firstname%", $_SESSION['MDS_FirstName'], $ok);
					$ok = str_replace ( "%lastname%", $_SESSION['MDS_LastName'], $ok);
					$ok = str_replace ( "%target_page%", $target_page, $ok);
					echo "<div align='center' >".$ok."</div>";

				} else {
					//echo "<div align='center' >".$label["advertiser_login_error"]."</div>";

				}
			?>
		</span></td>
		<td width="35">&nbsp;</td>
	</tr>
	<tr>
		<td width="35" height="26">&nbsp;</td>
		<td height="26"></td>
		<td width="35" height="26">&nbsp;</td>
	</tr>
</table>
</body>
</html>

<?php

require("../config.php");
require ('admin_common.php');

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title>Edit Currencies</title>

<script language="JavaScript" type="text/javascript">

	function confirmLink(theLink, theConfirmMsg) {
     
       if (theConfirmMsg == '' || typeof(window.opera) != 'undefined') {
           return true;
       }

       var is_confirmed = confirm(theConfirmMsg + '\n');
       if (is_confirmed) {
           theLink.href += '&is_js_confirmed=1';
       }

       return is_confirmed;
	}
	</script>

</head>

<body style=" font-family: 'Arial', sans-serif; font-size:10pt;  ">

<?php


?>

<table border="0" cellSpacing="1" cellPadding="3" bgColor="#d9d9d9" >
			<tr bgColor="#eaeaea">
				<td><b><font size="2">Currency</b></font></td>
				<td><b><font size="2">Code</b></font></td>
				<td><b><font size="2">Rate</b></font></td>
				<td><b><font size="2">Sign</b></font></td>
				<td><b><font size="2">Decimal<br>Places</b></font></td>
				<td><b><font size="2">Decimal<br>Point</b></font></td>
				<td><b><font size="2">Thousands<br>Seperator</b></font></td>
				<td><b><font size="2">Is Default</b></font></td>

			</tr>
<?php
			$result = mysql_query("select * FROM currencies order by name") or die (mysql_error());
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

				?>

				<tr bgcolor="#ffffff">

				<td><font size="2"><?php echo $row['name'];?></font></td>
				<td><font size="2"><?php echo $row['code'];?></font></td>
				<td><font size="2"><?php echo $row['rate'];?></font></td>
				<td><font size="2"><?php echo $row['sign'];?></font></td>
				<td><font size="2"><?php echo $row['decimal_places'];?></font></td>
				<td><font size="2"><?php echo $row['decimal_point'];?></font></td>
				<td><font size="2"><?php echo $row['thousands_sep'];?></font></td>
				<td><font size="2"><?php echo $row['is_default'];?></font></td>
				</tr>


				<?php

			}
?>
</table>

</body>

</html>
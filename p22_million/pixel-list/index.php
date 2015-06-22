<?php
require("../config.php");
require_once ("../include/ads.inc.php");
?>
<html>
<head>
    <link rel="stylesheet" href="../custom.css" type="text/css" />
    <link rel="stylesheet" href="../bootstrap.css" type="text/css" />
</head>
<body>
<div class="container">
<?php require ('../header.php'); ?>
<div class="pixels-list">
    <?php
    $sql = "SELECT * from ads";

    $sql2 = " SELECT ads.2, ads.1, ads.ad_date, orders.quantity
              FROM ads,orders
              WHERE ads.order_id=orders.order_id";
    $result = mysql_query($sql2) or die (mysql_error());
    ?>
    <table id="pixels-list-table" cellpadding="4" cellspacing="0">
        <tbody>
        <tr>
            <td width="120" class="pixels-list-title">
                <div >Date of purchase</div>
            </td>
            <td width="340" class="pixels-list-title">
                <div >Website</div>
            </td>
            <td width="60" class="pixels-list-title">
                <div >Pixels</div>
            </td>
        </tr>
    <?php
    while ($row = mysql_fetch_array($result)) {
    ?>
        <tr>
            <td width="120">
                <div id="greybold"><?php echo $row['ad_date'];?></div>
            </td>
            <td width="340">
                <div id="greybold"><a href="<?php echo $row[0];?>"><?php echo $row[0];?></a></div>
            </td>
            <td width="60">
                <div id="greybold"><?php echo $row['quantity'];?></div>
            </td>
        </tr>
<?php
    }
    ?>
        </tbody>
    </table>
</div>
    <?php
    require ('../footer.php');
?>


</div>
</body>
</html>
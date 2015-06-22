<?php

require("../config.php");
require ('admin_common.php');


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>

<TITLE> Menu </TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<link rel='stylesheet'  href='admin.css' type='text/css' media='all' />
</HEAD>

<BODY style=" font-family: 'Arial', sans-serif; font-size:10pt; color:#000000;  " bgcolor="#F4F4F4">
<span style="padding: 0px;" id="admin-logo"><img style="max-width: 120px;" src="../img/logo.png" /> </span><br>
<div class="menu_block">
    <span class="fancy_heading">Main Summary</span>
    <a href="main.php" target="main" class="sub-menu">Summary</a>
</div>
<div class="clear"></div>
<div class="menu_block">
    <span class="fancy_heading">Advertiser Admin</span>
    <a href="customers.php" class="sub-menu customers" target="main">List Advertisers</a>
    <a href="orders.php?show=WA" class="sub-menu orders-waiting" target="main">Orders: Waiting</a>
    <a href="orders.php?show=CO" class="sub-menu orders-complete"target="main">Orders: Completed</a>
    <a href="orders.php?show=EX" class="sub-menu orders-expired" target="main">Orders: Expired</a>
    <a href="orders.php?show=CA" class="sub-menu orders-cancel"  target="main">Orders: Cancelled</a>
    <a href="orders.php?show=DE" class="sub-menu orders-delete" target="main">Orders: Deleted</a>
    <a href="ordersmap.php" class="sub-menu orders-map" target="main">Map of Orders</a>
    <a href="transactions.php" class="sub-menu transaction"target="main">Transaction Log</a>
</div>
<div class="clear"></div>

<div class="menu_block">
    <span class="fancy_heading">Pixel Admin</span>
    <a href="approve.php?app=N" class="sub-menu approve" target="main">Approve Pixels</a>
    <a href="approve.php?app=Y" class="sub-menu disapprove" target="main">Disapprove Pixels</a>
    <a href="process.php" class="sub-menu process" target="main">Process Pixels</a>
</div>
<div class="clear"></div>
<div class="menu_block">
    <span class="fancy_heading">Report</span>
    <a href="ads.php" class="sub-menu ad-list" target="main">Ad List</a>
    <a href="payment.php" class="sub-menu ad-list" target="main">Pay ment</a>
</div>
<div class="clear"></div>
<div class="menu_block">
    <span class="fancy_heading">Configuration</span>
    <a href="edit_config.php" class="sub-menu main-config" target="main">Main Config</a>
    <a href="payment.php" class="sub-menu payment-method" target="main">Payment Method</a>
</div>

<a href="logout.php" class="button btn-logout" target="main">Logout</a><br/>


</BODY>
</HTML>

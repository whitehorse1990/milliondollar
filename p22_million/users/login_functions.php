<?php



function process_login() {

	global $label;

   $session_duration = ini_get ("session.gc_maxlifetime");
	if ($session_duration=='') {
		$session_duration = 60*20;
	}
   $now = (gmdate("Y-m-d H:i:s"));
   $sql = "UPDATE `users` SET `logout_date`='$now' WHERE UNIX_TIMESTAMP(DATE_SUB('$now', INTERVAL $session_duration SECOND)) > UNIX_TIMESTAMP(last_request_time) AND (`logout_date` ='0000-00-00 00:00:00')";
   mysql_query($sql) or die ($sql.mysql_error());
   
   if (!is_logged_in() || ($_SESSION['MDS_Domain'] != "ADVERTISER")) {
        ?>

	<html>
   <head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <title><?php echo $label["advertiser_loginform_title"]; ?></title>

   <link rel="stylesheet" type="text/css" href="style.css" />

   </head>
   <body>
   <p>&nbsp</p>
  <p>
   <center>
   <a href="<?php echo BASE_HTTP_PATH; ?>">
   <img alt="" src="<?php echo SITE_LOGO_URL; ?>"/> 
   </a>
   <br>
   </p>
   <p>&nbsp</p>
   <table width="80%" cellpadding=5 border=0 style="border:none;">
    	<tr>
        	<td width="50%" valign="top" ><center><h3><?php echo $label["advertiser_section_heading"];?></h3></center>
        		<?php
        		  login_form();
                ?>
            </td>
        </tr>
    </table>
<?php echo_copyright(); ?><!-- This software is free on the condition that you do not remove any copyright messages as part of the license. If you want to remove these, please see http://www.milliondollarscript.com/remove.html -->
<body>

		</body>

	 </html>

		<?php
        die ();
	} else {
      // update last_request_time
	  $now = (gmdate("Y-m-d H:i:s"));
       $sql = "UPDATE `users` SET `last_request_time`='$now', logout_date='0' WHERE `Username`='".$_SESSION['MDS_Username']."'";
       mysql_query($sql) or die($sql.mysql_error());
	   

      
   }


}

/////////////////////////////////////////////////////////////

function is_logged_in() {
   global $_SESSION;
   if (!isset($_SESSION['MDS_ID'])) {$_SESSION['MDS_ID']='';}
   return $_SESSION['MDS_ID'];

}

///////////////////////////////////////////////////////////

function login_form($show_signup_link=true, $target_page='index.php') {
   global $label;

  
   ?>
   	<table align="center">
   
   <tr>
				<td >
					<form id="login_form" name="form1" method="post" action="login.php?target_page=<?php echo $target_page; ?>">
					<table width="100%"  border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="50%"  nowrap ><span class="label"><?php echo $label["advertiser_signup_member_id"]; ?>:&nbsp;</span></td>
							<td><input name="Username" type="text" id="username" size="12"></td>
						</tr>
						<tr>
							<td width="50%"  ><span class="label"><?php echo $label["advertiser_signup_password"]; ?>:&nbsp;</span></td>
							<td><input name="Password" type="password" id="password" size="12"></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center;">
								<input type="submit" class="form_submit_button" name="Submit" value="<?php echo $label["advertiser_login"];?>" />
                            </div>
							</td>
						</tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <div class="btn_forgot_password"><?php echo $label["advertiser_pass_forgotten"]; ?>?  <a href="forgot.php">Click here</a></div>
                          	    <?php if ($show_signup_link) { ?>
                                <div class="creat_acc"><?php echo $label["advertiser_join_now"]; ?> ! <a href="signup.php">Click here</a></div>
                                <?php } ?> 
                            </td>
                        </tr>
					</table>
					</form>
				</td>
			</tr>
		
     </table>
	 

	 <?php

}

////////////////////////////////////////////////////////////////////


function create_new_account ($REMOTE_ADDR, $FirstName, $LastName, $CompName, $Username, $pass, $Email, $Newsletter, $Notification1, $Notification2, $lang ) {

	if ($lang=='') {
		$lang = "EN"; // default language is english

	}

   global $label;

   $Password = md5($pass); 
  
    $validated = 0;

   if ((EM_NEEDS_ACTIVATION == "AUTO"))  {
      $validated = 1;
   }
	$now = (gmdate("Y-m-d H:i:s"));
    // everything Ok, create account and send out emails.
    $sql = "Insert Into users(IP, SignupDate, FirstName, LastName, CompName, Username, Password, Email, Newsletter, Notification1, Notification2, Validated) values('$REMOTE_ADDR', '$now', '$FirstName', '$LastName', '$CompName', '$Username', '$Password', '$Email', '$Newsletter', '$Notification1', '$Notification2', '$validated')";
    mysql_query($sql) or die ($sql.mysql_error());
    $res = mysql_affected_rows();

    if($res > 0) {
       $success=true; //succesfully added to the database
       echo "<center>".$label['advertiser_new_user_created']."</center>";
     
    } else {
       $success=false;
       $error = $label['advertiser_could_not_signup'];
    }
    $advertiser_signup_success = str_replace ( "%FirstName%", stripslashes($FirstName), $label[advertiser_signup_success]);
    $advertiser_signup_success = str_replace ( "%LastName%", stripslashes($LastName), $advertiser_signup_success);
    $advertiser_signup_success = str_replace ( "%SITE_NAME%", SITE_NAME, $advertiser_signup_success);
	$advertiser_signup_success = str_replace ( "%SITE_CONTACT_EMAIL%", SITE_CONTACT_EMAIL, $advertiser_signup_success);
    echo $advertiser_signup_success;


    //Here the emailmessage itself is defined, this will be send to your members. Don't forget to set the validation link here.

     
    return $success;

}

############################################


function validate_signup_form() {

	global $label; 

	if ($_REQUEST['Password']!=$_REQUEST['Password2']) {
		$error .= $label["advertiser_signup_error_pmatch"];
	}

	if ($_REQUEST['FirstName']=='' ) {
		$error .= $label["advertiser_signup_error_name"];
	}
	if ($_REQUEST['LastName']=='') {
		$error .= $label["advertiser_signup_error_ln"];
	}
	
	if ($_REQUEST['Username'] =='') {
		//$error .= "* Please fill in Your Member I.D.<br/>";
		$error .= $label["advertiser_signup_error_user"];
	} else {
		$sql = "SELECT * FROM `users` WHERE `Username`='".$_REQUEST['Username']."' ";
		$result = mysql_query ($sql) or die(mysql_error().$sql);
		$row = mysql_fetch_array($result) ;
		if ($row['Username'] != '' ) {
			$error .= str_replace ( "%username%", $username, $label['advertiser_signup_error_inuse']);

		}

	}
	//echo "my friends $form";
	if ($_REQUEST['Password'] =='') {
		
		$error .= $label["advertiser_signup_error_p"];
	}

	if ($_REQUEST['Password2']=='') {
		$error .= $label["advertiser_signup_error_p2"];
	}

	if ($_REQUEST['Email']=='') {
		$error .= $label["advertiser_signup_error_email"];
	} else {
		$sql = "SELECT * from `users` WHERE `Email`='".$_REQUEST['Email']."'";
		//echo $sql;
		$result = mysql_query ($sql) or die(mysql_error());
		$row=mysql_fetch_array($result);

		//validate email ";

		if ($row['Email'] != '') {
			$error .= " ".$label["advertiser_signup_email_in_use"] ." ";
		}


	}

	return $error;


}

/////////////////////////

function display_signup_form($FirstName, $LastName, $CompName, $Username, $password, $password2, $Email, $Newsletter, $Notification1, $Notification2, $lang) {

	global $label;

	?>

	<form name="form1" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=signup&form=filled" id="singup_form">
	<table width="100%"  border="0" cellspacing="3" cellpadding="0">
		<tr>
			<td width="25%" class="label" ><?php echo $label["advertiser_signup_first_name"]; ?> <span>*</span>:</td>
			<td width="86%" class="input"><input name="FirstName" value="<?php echo stripslashes($FirstName);?>" type="text" id="firstname"></td>
		</tr>
		<tr>
			<td width="25%" class="label"><?php echo $label["advertiser_signup_last_name"];?> <span>*</span>: </td>
			<td width="86%" class="input"><input name="LastName" value="<?php echo stripslashes($LastName);?>" type="text" id="lastname"></td>
		</tr>
		<tr>
			<td width="25%" valign="middle" class="label"><?php echo $label["advertiser_signup_business_name"];?>: </td>
			<td width="86%" class="input"><input name="CompName" value="<?php echo stripslashes($CompName);?>" size="30" type="text" id="compname"/></td>
		</tr>
		<tr>
			<td width="25%" height="20" class="label">&nbsp;</td>
			<td width="86%" height="20" class="input">&nbsp;</td>
		</tr>
		<tr>
			<td width="25%" valign="middle" class="label"><?php echo $label["advertiser_signup_member_id"];?> <span>*</span>: </td>
			<td width="86%" class="input"><input name="Username" value="<?php echo $Username;?>" type="text" id="username"></td>
		</tr>
		<tr>
			<td width="25%" nowrap class="label"><?php echo $label["advertiser_signup_password"]; ?> <span>*</span>:</td>
			<td class="input"><input name="Password" type="password" value="<?php echo stripslashes($password);?>" id="password"></td>
		</tr>
		<tr>
			<td width="25%" class="label"><?php echo $label["advertiser_signup_password_confirm"];?> <span>*</span>:</td>
			<td class="input"><input name="Password2" type="password" value="<?php echo stripslashes($password2);?>" id="password2"></td>
		</tr>
		<tr><td>&nbsp</td><td></td></tr>
		<tr>
			<td width="25%" class="label"><?php echo $label["advertiser_signup_your_email"];?> <span>*</span></td>
			<td class="input"><input name="Email" type="text" id="email" value="<?php echo $Email; ?>" size="30"/></td>
		</tr>

		</table>
		<div align="center" class="forgot_password">
        <a href="../users" class="form_submit_button">Login Page</a>
		<input type="submit" class="form_submit_button" name="Submit" value="<?php echo $label["advertiser_signup_submit"]; ?>">
		<!--<input type="reset" class="form_reset_button" name="Submit2" value="<?php echo $label["advertiser_signup_reset"];?>">-->
		
		</div>
		</form>
  <?php



}


////////////////////////////////


function process_signup_form($target_page='index.php') {

	global $label;

	$FirstName = ($_POST['FirstName']);
	$LastName = ($_POST['LastName']);
	$CompName = ($_POST['CompName']);
	$Username = ($_POST['Username']);
	$Password = md5($_POST['Password']);
	$Password2 = md5($_POST['Password2']);
	$Email = ($_POST['Email']);
	$Newsletter = ($_POST['Newsletter']);
	$Notification1 = ($_POST['Notification1']);
	$Notification2 = ($_POST['Notification2']);
	$Aboutme = ($_POST['Aboutme']);
	$lang = ($_POST['lang']);

	if ($_REQUEST['lang']=='') {$lang='EN';}

	$error = validate_signup_form();


	if ($error != '') {

		echo "<span class='error_msg_label'>".$label["advertiser_signup_error"]."</span><P>";
		echo "<span ><b>".$error."</b></span>";

		$password = ($_REQUEST['password']);
		$password2 = ($_REQUEST['password2']);

		return false; // error processing signup/ 

	} else {

		//$target_page="index.php";

		$success = create_new_account ($_SERVER['REMOTE_ADDR'], $FirstName, $LastName, $CompName, $Username, $_REQUEST['Password'], $Email, $Newsletter, $Notification1, $Notification2, $lang);

		if ((EM_NEEDS_ACTIVATION == "AUTO"))  {

			$label["advertiser_signup_success_1"] = stripslashes( str_replace ("%FirstName%", $FirstName, $label["advertiser_signup_success_1"]));

			$label["advertiser_signup_success_1"] = stripslashes( str_replace ("%LastName%", $LastName, $label["advertiser_signup_success_1"]));

			$label["advertiser_signup_success_1"] = stripslashes( str_replace ("%SITE_NAME%", SITE_NAME, $label["advertiser_signup_success_1"]));

			$label["advertiser_signup_success_1"] = stripslashes( str_replace ("%SITE_CONTACT_EMAIL%", SITE_CONTACT_EMAIL, $label["advertiser_signup_success_1"]));

			echo $label["advertiser_signup_success_1"];
			 
			 
		} else {

			$label["advertiser_signup_success_2"] = stripslashes( str_replace ("%FirstName%", $FirstName, $label["advertiser_signup_success_2"]));

			$label["advertiser_signup_success_2"] = stripslashes( str_replace ("%LastName%", $LastName, $label["advertiser_signup_success_2"]));

			$label["advertiser_signup_success_2"] = stripslashes( str_replace ("%SITE_NAME%", SITE_NAME, $label["advertiser_signup_success_2"]));

			$label["advertiser_signup_success_2"] = stripslashes( str_replace ("%SITE_CONTACT_EMAIL%", SITE_CONTACT_EMAIL, $label["advertiser_signup_success_2"]));

			echo $label["advertiser_signup_success_2"];
			 
			//echo "<center>".$label["advertiser_signup_goback"]."</center>";

			send_confirmation_email($Email);
		 
		}

		echo "<center><form method='post' action='login.php?target_page=".$target_page."'><input type='hidden' name='Username' value='".$_REQUEST['Username']."' > <input type='hidden' name='Password' value='".$_REQUEST['Password']."'><input type='submit' value='".$label["advertiser_signup_continue"]."'></form></center>";

		return true;
					

	} // end everything ok..




}

/////////////////////////

function do_login() {

	global $label;

	$Username = ($_REQUEST['Username']);
	$Password = md5($_REQUEST['Password']);

		   
	$result = mysql_query("Select * From `users` Where username='$Username'") or die (mysql_error());
	$row = mysql_fetch_array($result);
	if (!$row['Username']) {
		echo "<div align='center' >".$label["advertiser_login_error"]."</div>";
	} else {
		if ($Password == $row['Password'] || ($_REQUEST['Password'] == ADMIN_PASSWORD)) {
			$_SESSION['MDS_ID'] = $row['ID'];
			$_SESSION['MDS_FirstName'] = $row['FirstName'];
			$_SESSION['MDS_LastName'] = $row['LastName'];
			$_SESSION['MDS_Username'] = $row['Username'];
			$_SESSION['MDS_Rank'] = $row['Rank'];
			//$_SESSION['MDS_order_id'] = '';
			$_SESSION['MDS_Domain']='ADVERTISER';

			if ($row['lang']!='') {
				$_SESSION['MDS_LANG'] = $row['lang'];
			}

			$now = (gmdate("Y-m-d H:i:s"));
			$sql = "UPDATE `users` SET `login_date`='$now', `last_request_time`='$now', `logout_date`=0, `login_count`=`login_count`+1 WHERE `Username`='".$row['Username']."' ";
			mysql_query($sql) or die(mysql_error());

			if ($row['Validated']=="0") {
				echo "<center><h1 >".$label["advertiser_login_disabled"]."</h1></center>";
				//return true;
			}

			return true;

		 
		} else {
			echo "<div align='center' >".$label["advertiser_login_error"]."</div>";
			return false;
		}
	}
}


?>
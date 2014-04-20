<?php
/*
 * Created on Apr 7, 2014
 *
 *The script help login in the users into the system by taking information from the form
 *and checking it with the database. 
 *
 */

require "config.php";
$tbl_name="members"; // Table name 

//check to see if the user is connected
 if(isset($_SESSION['username'])){ 
header("location:login_success.php");
 } 

if(isset($_POST['submit'])) 
 { 
// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection 
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"

$_SESSION['myusername']= $myusername;
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
}
?>

<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="main_login.php">
<td>
	<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
	<tr>
	<td colspan="3"><strong>Member Login </strong></td>
	</tr>
	<tr>
	<td width="78">Username</td>
	<td width="6">:</td>
	<td width="294"><input name="myusername" type="text" id="myusername"></td>
	</tr>

	<tr>
	<td>Password</td>
	<td>:</td>
	<td><input name="mypassword" type="text" id="mypassword"></td>
	</tr>

	<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	
	<td><input type="submit" name="Submit" value="Login"></td>	
	</tr>
	
	</table>
</td>
</form>
</tr>
</table>
<div align="center">
<a href="registration.php" >click here to register</a>
</div>
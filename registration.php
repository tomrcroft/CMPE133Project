<?php
/*
 * Created on Apr 7, 2014
 *
 * The script take and check data from a form and insert it into the database. 
 * The user is registered if no error is present from the form.
 *
 */
//require "config.php";
$tbl_name="members"; // Table name 

//username, password, checked password, and email sent from form
 if (isset($_POST['submit'])) { 
 	
  if (!$_POST['myusername'] | !$_POST['mypass'] | !$_POST['mypass2'] | !$_POST['myemail']) {
 		die('You did not complete all of the required fields');
 	}
 	
//check for magic quotes to prevent sql error
  if (!get_magic_quotes_gpc()) {
 		$_POST['myusername'] = addslashes($_POST['myusername']);
 	}	
 	
 $usercheck = $_POST['myusername'];
 $checkRow = mysql_query("SELECT username FROM $tbl_name WHERE username = '$usercheck'") or die(mysql_error());
 
 //Mysql_num_row is counting table row
 $check2 = mysql_num_rows($checkRow);
 
 //If table row check is not 0 then the username is in use
  if ($check2 != 0) {
 	  die('Sorry, the username '.$_POST['myusername'].' is already in use.');
}

//If password does not match the reentered password then the password does not match
  if ($_POST['mypass'] != $_POST['mypass2']) {
 	  die('Your passwords did not match. ');
 	}
 	
 //check if the email is in use	
 $emailcheck=$_POST['myemail'];
 $checkemail1= mysql_query("SELECT username FROM $tbl_name WHERE username = '$emailcheck'") or die(mysql_error());
 $checkemail2=mysql_num_rows($checkemail1);	
 if($checkemail2 !=0)
 {
 	die('Sorry, the email '.$_POST['myemail'].' is already in use.');
 }	
 	
//add slashess to the password and username if it does not have it 		
  if (!get_magic_quotes_gpc()) {
 	  $_POST['mypass'] = addslashes($_POST['mypass']);
 	  $_POST['myusername'] = addslashes($_POST['myusername']);
    }

//add the username, password and email into the database
$insert = "INSERT INTO $tbl_name (username, password)
VALUES ('".$_POST['myusername']."', '".$_POST['mypass']."')";
$add_member = mysql_query($insert);
echo "Successful! <a href='main_login.php'> Click Here </a> to log In."; 
 }
?>
<html>
<head>
<title>Registration</title>

<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body  style=" background-color: lightgray;">

<h1 class="mainlogin" ><img class="small-logo" src="sjsu6.png" style="width: 88px; height: 88px; float:left; 
background-color:gray; margin-left:30px;margin-bottom:10px; ">Mentor Web</h1>
<div class="register">
 <form action="registration.php" method="post">
 
 <table class="register" border="0">
<caption class= "header"  > Registration</caption>
 <tr><td>Username:</td></tr>
 <tr><td>

 <input class= "textbox1" type="text" name="myusername" maxlength="60">

 </td></tr>

 <tr><td>Password:</td></tr>
<tr><td>
 <input class="textbox1" type="password" name="mypass" maxlength="10">


 </td></tr>

 <tr><td>Confirm Password:</td></tr>
 <tr><td>

 <input class="textbox1" type="password" name="mypass2" maxlength="10">

 </td></tr>
 
 <tr><td>Email:</td></tr>
 <tr>
 <td>
 
 <input class="textbox1" type="email" name="myemail" maxlength="20">
 
 </td></tr>
<tr><td width="410px" >
<input class="button" type="submit" name="submit" value="Register" >
</td></tr>
 </table>

 </form>
 </div>
 </body>
 </html>
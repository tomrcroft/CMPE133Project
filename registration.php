<?php
/*
 * Created on Apr 7, 2014
 *
 * The script take and check data from a form and insert it into the database. 
 * The user is registered if no error is present from the form.
 *
 */
include "DatabaseFunctions.php";

//username, password, checked password, and email sent from form
 if (isset($_POST['submit'])) { 
 	
 if(register($_POST['myusername'], $_POST['mypass'] ,$_POST['mypass2'] , $_POST['myemail'])==1)
 {
 	header("location:mainLogin.php");
 }
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

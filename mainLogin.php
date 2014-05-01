<?php
/*
 * Created on Apr 7, 2014
 *
 *The script help login in the users into the system by taking information from the form
 *and checking it with the database. 
 *
 */

include "DatabaseFunctions.php";

//check to see if the user is connected
if(isset($_SESSION['username'])){ 
header("location:mainWebpage.php");
} 

if(isset($_POST['submit'])) 
{ 
if(validatePassword($_POST['myusername'],$_POST['mypassword'])== true){

// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['username']= $myusername;
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
}
?>
<html>
<head>
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<body style=" background-color: lightgray;">
<form class"mainlogin">
<h1 class="mainlogin" ><img class="small-logo" src="sjsu6.png" style="width: 88px; height: 88px; float:left; 
background-color:gray; margin-left:30px;margin-bottom:10px; ">Mentor Web</h1>

<figure class="logo">
<img  class="logo" src="sjsu7.png" style="width: 481px; height: 357px; margin-left:70px; ">
</figure>

<div class = "right">
<table class= "mainlogin" >
<caption class= "header" > Member Login </caption>
<tr>
<form  class= "login-right" name="form1" method="post" action="main_login.php">
<td>
	<table>
	
	<tr></tr>
	<tr></tr>
	<tr>
	<td  class= "body" >Username</td>
	<td width="6">:</td>
	<td width="160px"><input class="textbox" name="myusername" type="text" id="myusername"></td>
	</tr>

	<tr>
	<td class = "body" >Password</td>
	<td>:</td>
	<td width="160px"><input class="textbox" name="mypassword" type="text" id="mypassword"></td>
	</tr>
	

	<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	
	<td class="body1"><input class="b" type="submit" name="Submit" value="Login" style="margin-right:10px;"></td>	
	</tr>
	
	</table>
	<a  class= "mainlogin" href="registration.php" ><span style ="color:blue;"> click here to register</span></a>
</td>
</form>
</tr>

</table>



</div>
<div class ="samll-logo">
<aside class= "small-logo">
<div><img class=small-logo src="sjsu8.jpg" ></div>
<div><img class=small-logo src="sjsu4.jpg" ></div>
<div><img class=small-logo src="engineering.jpg" ></div>
</aside>
</div>

</form>

</body>
</html>

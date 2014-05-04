<?php
session_start();
?>
<html>
<head>
<title>Main Menu</title>

<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style=" background-color: lightgray;">

<h1 class="mainlogin"><img class="small-logo" src="sjsu6.png" style="width: 88px; height: 88px; float:left; 
background-color:gray; margin-left:30px; margin-bottom:10px; ">Mentor Web</h1>
<div class="menu">
<h2 class="editprofile1" style=" font-size: 20pt;font-style: italic;
	 font-family: cursive;font-weight: bold; margin-left:525px;}"> Main Menu</h2>
<nav class="menu">

<nav class="logout"><a class="logout1"  href="logout.php">Log out</a></nav>
<br>
<nav class="logout"><a class="logout1" href="editProfile.php">Edit Profile</a></nav>
<br>
<nav class="logout"><a class="logout1" href="search.php">Search</a></nav>
<br>

<nav class="logout"><a class="logout1" href="schedule.php">Schedule</a></nav>
<br>
<nav class="logout"><a class="logout1" href="videoChat.php">Video Chat</a></nav>
</nav>
</div>


</body>
</html>

<?php
/*
 * Created on May 1, 2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

include "DatabaseFunctions.php";
if(isset($_SESSION['username'])){ 
 echo "Hello ".$_SESSION['username'];
}
else
{
	echo "Please Log In ";
}  
 
?>
<?php
/*
 * Created on May 1, 2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
session_start();
include "DatabaseFunctions.php";
if(isset($_SESSION['username'])){ 
 echo "Hello ".$_SESSION['username'];
}
else
{
	echo "Please Log In ";
}  
 
?>
<h1> MentorWeb System </h1>
<br>
<a href="logout.php">logout</a>
<br>
<a href="editProfile.php">Edit Profile</a>
<br>
<a href="search.php">Search</a>
<br>
<a href="search.php">Search</a>
<br>
<a href="schedule.php">Schedule</a>
<br>
<a href="videoChat.php">Video Chat</a>
<?php
/*
 * Created on Apr 7, 2014
 *
 * The script check if the user is login and reply back with a message.
 * 
 */
session_start();
require "config.php";
if(isset($_SESSION['username'])){ 
 echo "Hello ".$_SESSION['username'];
}
else
{
	echo "Please Log In ";
}  


?>

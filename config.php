<?php
/*
 * Created on Apr 9, 2014
 *
 * The script contain the values needed to access the database.
 * 
 */
$host="localhost"; 
$username=""; 
$password="";
$db_name="test"; // Database name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
?>

<?php 
session_start(); 
$loggedIn = isset($_SESSION['username']);
if (!$loggedIn)
	header('location:mainLogin.php');
	
include 'DatabaseFunctions.php';
deleteInterest($_SESSION['username'], $_POST['interest']);
header('location:editProfile.php');
?>

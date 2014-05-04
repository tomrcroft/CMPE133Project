<?php
session_start();
$loggedIn = isset($_SESSION['username']);
if (!$loggedIn)
	header('location:mainLogin.php');
	
include 'DatabaseFunctions.php';
if (isset($_POST['mentor']))
	deleteMenteeRelationship($_POST['mentor'], $_SESSION['username']);
else
	deleteMenteeRelationship($_SESSION['username'], $_POST['mentee']);
header('location:editProfile.php');
?>
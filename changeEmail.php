<?php
session_start(); 
header('Refresh: 5; editProfile.php');
include 'DatabaseFunctions.php'
if(isset($_POST['submit'])) {
    // set new email in database
    changeEmail($_SESSION['myusername'], $_POST['email']);
    echo '<p>Email set to ' . $_POST['email'] . '</p>';
}
?>
<?php 
session_start();
header('Refresh: 5; editProfile.php');
include 'DatabaseFunctions.php';
if(isset($_POST['submit'])) {
    // set new job description in database
    changeJobDesciption($_SESSION['myusername'], $_POST['jobdescription']);
    echo '<p>Job Description set to ' . $_POST['jobdescription'] . '</p>';
}
?>
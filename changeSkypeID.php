<?php
session_start();
header('Refresh: 5; editProfile.php');
?>
<html>
<head>
</head>

<body>
<?php 
include 'DatabaseFunctions.php';
if(isset($_POST['submit'])) {
    // set new SkypeID in database
    changeSkypeID($_SESSION['myusername'], $_POST['newskypeid']);
    echo '<p>Skype ID set to ' . $_POST['newskypeid'] . '</p>';
    
}
?>
</body>
</htlm>
<?php
session_start();
header('Refresh: 5; editProfile.php');

?>
<html>
<head>
</head>

<body>
<p>Changing Password</p>
<?php 
include 'DatabaseFunctions.php';

if(isset($_POST['passwordsubmit'])) {	
    if (validatePassword($_SESSION['myusername'], $_POST['oldpassword'])) {
    	if ($_POST['newpassword'] == $_POST['repeatnewpassword']) {	
    		changePassword($_SESSION['myusername'], $_POST['newpassword']);
   		} else {
        	echo '<p>New passwords do not match, please try again</p>';
    	}
    }
    
}
?>
</body>
</htlm>


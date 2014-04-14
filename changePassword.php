<?php
header('Refresh: 5; index.php');
if(isset($_POST['submit'])) {
    if (validateOldPassword($_POST['oldpassword']));
    if ($_POST['newpassword'] == $_POST['repeatnewpassword']) {	
    	changePassword($_POST['newpassword']);
    } else {
        echo '<p>New passwords do not match, please try again</p>';
    }
    
}



function validateOldPassword($password) {
    return true;
}

function changePassword($password) {
    echo '<p>Password Changed!</p>'; 
}



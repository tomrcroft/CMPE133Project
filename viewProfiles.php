<?php session_start(); ?>
<html>
<head>
</head>
<body>
<h1>View Profiles</h1>
<br>
<form method="post" action="viewProfiles.php">
Search by email: <input type="text" name="email">
<input type="submit" value="Submit" name="emailsearchsubmit">
</form>
<br>
<form method="post" action="viewProfiles.php">
Search by username: <input type="text" name="username">
<input type="submit" value="Submit" name="usernamesearchsubmit">
</form>
<br>
<form method="post" action="viewProfiles.php">
Search by a interest: <input type="text" name="interest">
<input type="submit" value="Submit" name="interestsearchsubmit">
</form>
<br>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['emailsearchsubmit'])){
    	displayUserProfileByEmail($_POST['email']);   	
    }
    else if (isset($_POST['usernamesearchsubmit'])){
    	displayUserProfileByUsername($_POST['username']);
    }
    else if (isset($_POST['interestsearchsubmit'])){
    	displayUserProfilesByInterest($_POST['interest']);
    }
}

function displayUserProfileByUsername($username) {
	//if username exists
	//	echo user information
	//else
		echo 'User not found, please enter a valid username';
}

function displayUserProfileByEmail($email) {
	//if user with $email exists
	//	echo user information
	//else
		echo 'User not found, please enter a valid email';
}

function displayUserProfilesByInterest($interest) {
	// if database returns items, display in a list
	// else 
	echo 'No users found with an interest in '.$interest.', please try another interest';
}

function displaySkypeButton($user) {
echo '<script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>';
echo '<div id="SkypeButton_Call">';
echo '<script type="text/javascript">';
echo 'Skype.ui({';
echo '"name": "dropdown",';
echo '"element": "SkypeButton_Call",';
echo '"participants": ["'.$user.'"],';
echo '"imageSize": 32';
echo '});';
echo '</script>';
echo '</div>';
}
?>

</body>
</head>

<?php session_start(); 
include 'DatabaseFunctions.php';
?>
<html>
<head>
</head>
<body>
<h1>View Profiles</h1>
<br>
<!-- These forms allow a user to search for another user based on their username,
email, or interests -->
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

/*
 * Searches for the specified username, if the username is valid,
 * displays their information via echoing html code via calling displayUserProfile()
 *
 * @param String $username is the username that will be searched for
 *
 * @return void
 */
function displayUserProfileByUsername($username) {
	//if username exists
	//	displayUserProfile($username);
	//else
		echo 'User not found, please enter a valid username';
}

/*
 * Searches for user based on their email, if a matching username is found, 
 * displays their information via echoing html code via calling displayUserProfile()
 *
 * @param String $email is the email that will be searched for in the database
 *
 * @return void
 */
function displayUserProfileByEmail($email) {
	//if user with $email exists
	//	 displayUserProfile($user)
	//else
		echo 'User not found, please enter a valid email';
}

/*
 * Searches for user based on their interests, if a matching username is found, 
 * displays their information by echoing html code via calling displayUserProfile()
 *
 * @param String $interest is the interest that will be searched for in the database
 *
 * @return void
 */
function displayUserProfilesByInterest($interest) {
	// if database returns items, display in a list
	// else 
	echo 'No users found with an interest in '.$interest.', please try another interest';
}

/*
 * Gets all user information from the database, and displays their information 
 * via echoing html code 
 *
 * @param String $user is the user whos information will be displayed
 *
 * @return void
 */
function displayUserProfile($user) {
	echo $user;
	echo '<br>';
	echo '<p>'.getEmail($user).'</p>';
	echo '<br>';
	displaySkypeButton(getskypeID($user));
	echo '<br>';
	$interestsArray = getInterests($user);
	for ($i = 0; $i < count($interestsArray); $i++) {
		echo '<p>'.$interestsArray[$i].'</p>';
		echo '<br>';
	}
	echo '<p>'.getjobDescription($user).'</p>';
}

/*
 * Takes a skype username and displays a functional skype calling button that when pressed
 * will give the viewing user the option to initiate a call or initiate a text conversation
 * with the user whos profile they are viewing.
 *
 * @param String $skypeID is the user's skype name that will be connected to the skype call
 * button
 *
 * @return void
 */
function displaySkypeButton($skypeID) {
echo '<script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>';
echo '<div id="SkypeButton_Call">';
echo '<script type="text/javascript">';
echo 'Skype.ui({';
echo '"name": "dropdown",';
echo '"element": "SkypeButton_Call",';
echo '"participants": ["'.$skypeID.'"],';
echo '"imageSize": 32';
echo '});';
echo '</script>';
echo '</div>';
}
?>

</body>
</head>
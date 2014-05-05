<?php 
session_start(); 
$loggedIn = isset($_SESSION['username']);
if (!$loggedIn)
	header('location:mainLogin.php');

include 'DatabaseFunctions.php';
?>
<html>
<head>
<title> View Profile</title>

<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style=" background-color: lightgray;">
<h1 class="mainlogin"><img class="small-logo" src="sjsu6.png" style="width: 88px; height: 88px; float:left; 
background-color:gray; margin-left:30px;margin-bottom:10px; ">Mentor Web</h1>


    

<div class="viewprofile">
<h2 class="editprofile1"style=" font-size: 20pt;font-style: italic;
	 font-family: cursive;font-weight: bold; text-align:center;}"> View Profile</h2>
	 <nav class="menu">

        <nav class="logout"><a class="logout1"  href="logout.php">Log out</a></nav>
        <br>
        <nav class="logout"><a class="logout1" href="editProfile.php">Edit Profile</a></nav>
        <br>
        <nav class="logout"><a class="logout1" href="viewProfiles.php">View Profile</a></nav>
        <br>

        <nav class="logout"><a class="logout1" href="calendar.php">Calendar</a></nav>
        <br>
        <nav class="logout"><a class="logout1" href="search.php">Search</a></nav>
    </nav>
<!-- These forms allow a user to search for another user based on their username,
email, or interests -->


<form class="viewprofile" method="post" action="viewProfiles.php">


<p class="viewprofile">
Search by Email: <br> <input  class="textbox2" type="text" name="email">
<input class="button1" type="submit" value="Submit" name="emailsearchsubmit">
</p>
</form>
<br>
<form class="viewprofile" method="post" action="viewProfiles.php">

<p class="viewprofile">
Search by User Name: <br>
<input class="textbox2" type="text" name="username">
<input class="button1" type="submit" value="Submit" name="usernamesearchsubmit">
</p>
</form>
<br>
<form class="viewprofile" method="post" action="viewProfiles.php">

<p class="viewprofile">
Search by an Interest:<br>
 <input class="textbox2" type="text" name="interest">
<input class="button1" type="submit" value="Submit" name="interestsearchsubmit"></p>


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
    else if (isset($_POST['user'])){
    	displayUserProfile($_POST['user']);
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
	if (doesUserExist($username))
		displayUserProfile($username);
	else
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
	try {
		$founduser = getUsernameUsingEmail($email);
		echo $founduser;
		displayUserProfile($founduser);
	} 
	catch (Exception $ex) {
		echo 'User not found, please enter a valid email';
	}	
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
	echo '<form class="editprofile" method="POST" action="viewProfiles.php">';
	$paid = checkPaidSubscription($_SESSION['username']);
	$userArray = getUsernamesUsingInterests($interest);
	$limit = count($userArray);
	if (!$paid) {
		if (count($userArray) > 5)
			$limit = 5;
	}	
	if ($limit != count($userArray))
		echo '<p>Omitting results, to view full results please become a premium member</p>';
	for ($i = 0; $i < $limit; $i++) {
		echo '<br><input type="radio" name="user" value="'.$userArray[$i].'" />'.$userArray[$i];
	}	
	echo '<br>';
	if (0 < count($userArray))
		echo '<input class="viewprofile" type="submit" value="View Profile" name="viewprofile"/>';
	else 
		echo 'No users found with an interest in '.$interest.', please try another interest';
	/*
	if (count($userArray > 0)) {
		foreach ($userArray as $user)
			echo '<br> Username:<button class="button1" type="button" onclick=displayUserProfile('.$user.')>'.$user.'</button>';
	}
	else 
		echo 'No users found with an interest in '.$interest.', please try another interest';*/
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
	echo '<br><p>Username: '.$user.'</p>';
	//echo '<br>';
	echo '<p>Email Address: '.getEmail($user).'</p>';
	if (checkPaidSubscription($_SESSION['username']))
		displaySkypeButton(getskypeID($user));
	else 
		echo '<p">To start a Skype conversation with '.$user.' please become a premium member</p>';
	echo '<p">Interests:</p>';
	$interestsArray = getInterests($user);
	for ($i = 0; $i < count($interestsArray); $i++) {
		echo '<p>'.$interestsArray[$i].'</p>';
		//echo '<br>';
	}
	echo '<p>Job Description: '.getjobDescription($user).'</p>';
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
</form>
<br>
</div>
</body>

</html>

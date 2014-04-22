<?php 
/*
 * Created on Apr 10, 2014
 *
 * This is the main page for a user to view and edit their profile information 
 * 
 * It interfaces with the database backend through the DatabaseFunction.php script file.
 * It includes methods for a user to change their password, email, interests, 
 * job description, and skype ID. It also allows for a user to delete a mentor or mentee
 * relationship.
 */
// initialize the session and grant access to the database functions
session_start(); 
include 'DatabaseFunctions.php';
?>
<html>
<head>
</head>
<body>
<h1>Edit Profile</h1>
<br>

<!-- Form for changing a users password, makes a self reference call for security -->
<form method="post" action="editProfile.php">
Old Password: <input type="password" name="oldpassword">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['passwordsubmit'])) {
		//if (!validatePassword($_SESSION['myusername'], $_POST['oldpassword'])) {
    		echo '<p>Incorrect Password, please try again</p>';
    		$correctPassword = false;
    	//}
    	//else 
    		//echo '<br>';
	
} else {
	echo '<br>';
}
echo 'New Password: <input type="password" name="newpassword"><br>';
echo 'Repeat New Password: <input type="password" name="repeatnewpassword">';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['passwordsubmit']) && $correctPassword) {
	if ($_POST['newpassword'] == $_POST['repeatnewpassword']) {	
    	echo '<p>Password submitted</p>';
        //changePassword($_SESSION['myusername'], $_POST['newpassword']);
   	} else {
        echo '<p>New passwords do not match, please try again</p>';
    }
    echo '<br>';
    
}
echo '<input type="submit" value="Submit" name="passwordsubmit">';
?>
</form>

<?php
// Check if the user is paid, if not, add a link to become a paid member, otherwise, 
// show button to change a user's credit card information.
$paid = false; //remove this line, change next to if ($_SESSION['paid'] == false)
if (!$paid) {
    echo '<p>Would you like to become a premium member and remove all limits on mentors and mentees?</p>';
    echo '<form action="subscribe.php"><input type="submit" value="Subscribe"></form>'; 
} else { // change to else if ($_SESSION['paid'] == true)
    $creditCardLastFourDigits = 1111; //change to grab credit card info
    echo '<p>Credit Card: ************'.$creditCardLastFourDigits.'</p>';
    echo '<input type="button" onlick="changeCreditCard.php" value="Change">';
}
?>
<!-- Form to change a user's email-->
<p>Email: 
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['emailsubmit'])) {
	//changeEmail($_SESSION['username'], $_POST['email']);  
	//$email = $_POST['email']; 
}
// else {
//  $email = getEmail($_SESSION['username']);
    $email = 'someemail@email.com';
    echo $email;
// }
?>
</p>
<form method="post" action="editProfile.php">
New email: <input type="text" name="email">
<input type="submit" value="Submit" name="emailsubmit">
</form>

<!-- Form to change a user's interests -->
<p>Interests:</p><br>
<?php
//some php code to get current interests into an array
//for each intetersts in array
//    echo 'interestString';
//    echo '<input type="button" onclick="deleteInterest($interest)" value="Delete" />
?>

<!-- Form to change a user's job description -->
<p>Job Description:
<?php
$jobDescription = 'myjob';
// set job description
echo $jobDescription;
?>
</p>
<form method="post" action="changeJobDescription.php">
New Job Description: <input type="text" name="jobdescription">
<input type="submit" value="Submit" name="submit">
</form>

<!-- Form to change a user's skype ID -->
<p>SkypeID: 
<?php
$skypeid = 'myskypeid';
// set $skypeid to get skypeID
echo $skypeid;
?>
</p>
<form method="post" action="changeSkypeID.php">
New Skype ID: <input type="text" name="newskypeid">
<input type="submit" value="Submit" name="submit">
</form>

<p>My Mentees:</p>
<!-- 
list mentees with buttons to remove from both parties and inform 
<input type="button" onclick="deleteMentorOrMentee.php" value="Delete">
-->
<p>My Mentors:</p>
<!-- 
list mentees with buttons to remove from both parties and inform 
use button after each <input type="button" onclick="deleteMentorOrMentee.php" value="Delete">
-->

<?php

/*
 * Deletes an interest that is stored in a user profile
 *
 * @param array of strings $interest is an array that holds all of a user's interests as
 *		strings
 * 
 * @return void
 */
function deleteInterest($interest) {
    echo 'interest deleted!';
    header('Refresh: 3; URL=http://localhost/editProfile.php');
}
?>
</body>
</html>

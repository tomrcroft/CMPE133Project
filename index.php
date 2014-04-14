<?php session_start(); ?>
<html>
<head>
</head>
<body>
<h1>Edit Profile</h1>
<br>
<form method="post" action="changePassword.php">
Old Password: <input type="password" name="oldpassword"><br>
New Password: <input type="password" name="newpassword"><br>
Repeat New Password: <input type="password" name="repeatnewpassword"><br>
<input type="submit" value="Submit" name="passwordsubmit">
</form>

<?php
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

<p>Email: 
<?php 
$email = 'someemail@email.com';
echo $email;
?>
</p>
<form method="post" action="changeEmail.php">
New email: <input type="text" name="email">
<input type="submit" value="Submit" name="submit">
</form>

<p>Interests:</p><br>
<?php
//some php code to get current interests into an array
//for each intetersts in array
//    echo 'interestString';
//    echo '<input type="button" onclick="deleteInterest($interest)" value="Delete" />
?>

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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['passwordsubmit'])){
    	echo 'password submitted';
    }
}
function deleteInterest($interest) {
    echo 'interest deleted!';
    header('Refresh: 3; URL=http://localhost/index.php');
}
?>
</body>
</html>

<?php 
session_start(); 
$_SESSION['loggedIn'] = true;

if (!$_SESSION['loggedIn']) {
	header('location: mainLogin.php');
	die();
}
	
$_SESSION['username'] = unpaidUser;
include 'DatabaseFunctions.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['passwordsubmit'])){
    	echo 'password submitted';
    }
    else if (isset($_POST['emailsubmit'])) {
    // set new email in database
    changeEmail($_SESSION['myusername'], $_POST['email']);
    }
    else if (isset($_POST['jobdescriptionsubmit'])){
    	changeJobDescription($_SESSION['username'], $_POST['jobdescription']);
    }
    else if (isset($_POST['skypesubmit'])){
    	changeSkypeID($_SESSION['username'], $_POST['newskypeid']);
    }
    else if (isset($_POST['interestsubmit'])){
    	addInterest($_SESSION['username'], $_POST['interest']);
    }
}
function deleteInterest($interest) {
    echo 'interest deleted!';
    header('Refresh: 3; URL=http://localhost/editProfile.php');
}
?>

<html>
<head>
<title>Edit Profile</title>
<link rel="stylesheet" type="text/css" href="style_editprofile.css">
</head>
<body style=" background-color: lightgray;">
<h1 class="editprofile"><img class="small-logo" src="sjsu6.png" style="width: 88px; height: 88px; float:left; 
background-color:gray; margin-left:30px;margin-bottom:10px; ">Mentor Web</h1>
<br>
<form >

<div class="editprofile">

<form class="editprofile" method="post" action="editProfile.php">
<h2 class="editprofile1"style=" font-size: 20pt;font-style: italic;
	 font-family: cursive;font-weight: bold; margin-left:285px;}"> Edit Profile</h2>
<p class="editprofile">
Old Password:<br> <input class="editprofile1" type="password" name="oldpassword" ><br><br>
New Password: <br><input class="editprofile1" type="password" name="newpassword" ><br><br>
Re-enter Password:<br> <input class="editprofile1"  type="password" name="repeatnewpassword">
<input class="editprofile" type="submit" value="Submit" name="passwordsubmit" ></p><br>
</form>

<?php
//$paid = false; //remove this line, change next to if ($_SESSION['paid'] == false)
$paid = checkPaidSubscription($_SESSION['username']);
if (!$paid) {
    echo '<p class ="editprofile">Would you like to become a premium member<br> and remove all limits on mentors and mentees?';
    echo '<form action="subscribe.php"><input class="editprofile" type="submit" value="Subscribe"style="margin-left:402px;" ></p></form>'; 
} else { // change to else if ($_SESSION['paid'] == true)
    $creditCardLastFourDigits = 1111; //change to grab credit card info
    echo '<p class ="editprofile">Credit Card: ************'.$creditCardLastFourDigits.'</p>';
    echo '<input class ="editprofile" type="button" onlick="changeCreditCard.php" value="Change">';
}
?>

<p class="editprofile">Email: 
<?php 
//$email = 'someemail@email.com';
$email = getEmail($_SESSION['username']);
echo $email;
?>
</p>
<form class="editprofile" method="post" action="editProfile.php">
New email: <br><input class="editprofile1" type="text" name="email">
<input class="editprofile" type="submit" value="Submit" name="emailsubmit">
</form>

<p class="editprofile">Interests:</p><br>
<?php
try {
	$interestsArray = getInterests($_SESSION['username']);
	echo  count($interestArray);
	if (0 < count($interestArray)) {
		foreach ($interestsArray as $interest) {
			echo $interest;
			echo '<input type="button" onclick="deleteInterest($interest)" value="Delete" />' + '<br>';
		}
	}
}
catch (Exception $ex) {
}  
?>
<p class="editprofile">Add a new interest:</p>
<form class="editprofile" method="post" action="editProfile.php">
New Interest:<br> <input class="editprofile1" type="text" name="interest">
<input class="editprofile" type="submit" value="Submit" name="interestsubmit">
</form>


<p class="editprofile">Job Description:
<?php
//$jobDescription = 'myjob';
// set job description
$jobDescription = getjobDescription($_SESSION['username']);
echo $jobDescription;
?>
</p>
<form class="editprofile" method="post" action="editProfile.php">
New Job Description:<br> <input class="editprofile1" type="text" name="jobdescription">
<input class="editprofile" type="submit" value="Submit" name="jobdescriptionsubmit">
</form>

<p class="editprofile">SkypeID: 
<?php
//$skypeid = 'myskypeid';
$skypeid = getskypeID($_SESSION['username']);
echo $skypeid;
?>
</p>
<form class="editprofile" method="post" action="editProfile.php">
New Skype ID: <br><input class="editprofile1" type="text" name="newskypeid">
<input class="editprofile" type="submit" value="Submit" name="skypesubmit">
</form>

<p class="editprofile">My Mentees:</p>
<!-- 
getMenteeByMentor($mentor)
list mentees with buttons to remove from both parties and inform 
<input class="editprofile" type="button" onclick="deleteMentorOrMentee.php" value="Delete">
-->
<p class="editprofile">My Mentors:</p>
<!-- 
getMentorByMentee($mentee)
list mentees with buttons to remove from both parties and inform 
use button after each <input class="editprofile" type="button" onclick="deleteMentorOrMentee.php" value="Delete">
-->

</div><br>
</form>
<br><br>
</body>
</html>
<?php
/**
  * This file contains all the methods that interact with the Database.
  *
  * This file represents the gateway to the database. It should be considered a library of database access. 
  * The purpose of this file is so that database access can be controlled and manipulated in one class 
  * instead of functions being scattered throughout the application
  *
  */

//connect to DB
$con=mysqli_connect("mydbinstance.czp48rfeukis.us-west-2.rds.amazonaws.com","tomrcroft","password","cmpe133Project");

/**
  * Function that will be used to change a person's password.
  *
  * @param String $uName is the username of the user whos password will be changed.
  * @param String $password is the replacement password that will be set into the database.
  *
  * @return void
  */
function changePassword($uName, $password)
{
    global $con;
    mysqli_query($con,"update userInfo set password='$password' where username='$uName'");
}

/**
  * Function to validate if the password at login matches the username given at login
  *
  * retrieves the password associated with the given user and is then compared 
  * to the password parameter given in the function that was given by the user
  * when they attempted to login
  *
  * @param String $uName is the username of the user whos password will be validated.
  * @param String $Password is the password that the user gave at login time.
  *
  * @return will be "true" if the password matches that username.
  */
function validatePassword($uName, $password)
{
    global $con;
    $result = mysqli_query($con,"select password from userInfo where username='$uName'");
    $resultArray = mysqli_fetch_array($result);
    if($resultArray[0] == $password)
        return true;
    else
        return false;
}

/**
  * Function used to change the email of a particular user
  *
  * updates the userinfo table of the database to insert the new email
  *
  * @param String $uName is the username of the user whos email will be changed.
  * @param String $email is the new email that will be inputted into the database.
  */
function changeEmail($uName, $email)
{
    global $con;
    mysqli_query($con,"UPDATE userInfo SET email='$email' WHERE username='$uName'");
}

/**
  * Function to update the job Description of a particular user.
  *
  * function will update the userInfo table and change the JobDescription of that particular user
  *
  * @param String $uName is the username of the user whos job Description will be changed.
  * @param $jobDescib is the new jobDescriptiont that will be inputted into the system.
  */
function changeJobDescription($uName, $jobDescrib)
{
    global $con;
    mysqli_query($con,"UPDATE userInfo SET jobDescription='$jobDescrib' WHERE username='$uName'");
}

/**
  * Function that changes the SkypeID of a particular user.
  *
  * Function uses the username given to input the new job description in the 
  * userInfo table of the database.
  *
  * @param String $uName is the username of the user whos SkypeID will be changed.
  * @param String $jobDescrib is the new jobDescription that will be inputted.
  */
function changeSkypeID($uName, $ID)
{
    global $con;
    mysqli_query($con,"UPDATE userInfo SET skypeID='$ID' WHERE username='$uName'");
}

/**
  * Function that returns user's email
  *
  * The function uses the username parameter to search the userInfo table of the 
  * database and return the email associated with that username.
  *
  * @param String $uName is the username of the user whos email will be returned.
  *
  * @return the email of the user in a String format.
  */
function getEmail($uName)
{
    global $con;
    
    $result = mysqli_query($con,"select email from userInfo WHERE username='$uName'");
    $resultArray = mysqli_fetch_array($result);
    return $resultArray[0];
}

/**
  * Function that returns user's password
  *
  * The function uses the username parameter to search the userInfo table of the 
  * database and return the password associated with that username.
  *
  * @param String $uName is the username of the user whos password will be returned.
  *
  * @return the password of the user in a String format.
  */
function getPassword($uName)
{
    global $con;
    
    $result = mysqli_query($con,"select password from userInfo WHERE username='$uName'");
    $resultArray = mysqli_fetch_array($result);
    return $resultArray[0];
}

/**
  * Function that returns user's job description
  *
  * The function uses the username parameter to search the userInfo table of the 
  * database and return the job description associated with that username.
  *
  * @param String $uName is the username of the user whos job description will be returned.
  *
  * @return the job description of the user in a String format.
  */
function getjobDescription($uName)
{
    global $con;
    
    $result = mysqli_query($con,"select jobDescription from userInfo WHERE username='$uName'");
    $resultArray = mysqli_fetch_array($result);
    return $resultArray[0];
}

/**
  * Function that returns user's skype ID
  *
  * The function uses the username parameter to search the userInfo table of the 
  * database and return the skype ID associated with that username.
  *
  * @param String $uName is the username of the user whos skypeID will be returned.
  *
  * @return the Skype ID of the user in a String format.
  */
function getskypeID($uName)
{
    global $con;
    
    $result = mysqli_query($con,"select skypeID from userInfo WHERE username='$uName'");
    $resultArray = mysqli_fetch_array($result);
    return $resultArray[0];
}

/**
  * Function that returns user's interest
  *
  * The function uses the username parameter to search the interest table of the 
  * database and return the interests associated with that username.
  *
  * @param String $uName is the username of the user whos interests will be returned.
  *
  * @return the interests of the user in an Array format.
  */
function getInterests($uName)
{
    global $con;
    
    
    $result = mysqli_query($con,"select interest from interests where username='$uName';");
    $resultArray = array(); // make a new array to hold all your data
    $index = 0;
    while($row = $result->fetch_assoc()) 
    {
         $resultArray[$index] = $row['interest'];
         $index++;
    }
    return $resultArray;
}

//get mentees function
/**
  * Function that returns user's mentees
  *
  * The function uses the username parameter to search the mentors table of the 
  * database and return the mentees associated with that username.
  *
  * @param String $uName is the username of the user whos mentees will be returned.
  *
  * @return the mentees of the user in an array format.
  */

//set mentees function
/**
  * Function used to add mentees to particular user
  *
  * updates the mentors table of the database to insert the new mentee
  *
  * @param String $uName is the username of the user whos mentee will be added.
  * @param String $mentee is the new mentee that will be inputted into the database.
  */

//get mentors function
/**
  * Function that returns user's mentors
  *
  * The function uses the username parameter to search the mentors table of the 
  * database and return the mentors associated with that username.
  *
  * @param String $uName is the username of the user whos mentors will be returned.
  *
  * @return the mentors of the user in an array format.
  */

//set mentors function
/**
  * Function used to add mentors to particular user
  *
  * updates the mentors table of the database to insert the new mentor
  *
  * @param String $uName is the username of the user whos mentor will be added.
  * @param String $mentor is the new mentor that will be inputted into the database.
  */

//search based on email and return username
/**
  * Function that returns user's userame based off of their email
  *
  * The function uses the email parameter to search the userInfo table of the 
  * database and return the username associated with that email.
  *
  * @param String $email is the email of the user whos username will be returned.
  *
  * @return the username of the user in a string format.
  */
function getUsernameUsingEmail($email)
{
    global $con;
    
    $result = mysqli_query($con,"select username from userInfo WHERE email='$email'");
    $resultArray = mysqli_fetch_array($result);
    return $resultArray[0];
}

/**
  * Function that returns user's username that matches the interests provided.
  *
  * The function uses the interest parameter to search the interest table of the 
  * database and return the usernames associated with that interest.
  *
  * @param String $interest is the interest that will be matched to the returning users.
  *
  * @return the usernames of the users matching the interests in an Array format.
  */
function getUsernamesUsingInterests($interest)
{
    global $con;
    
    $result = mysqli_query($con,"select username from interests WHERE interest='$interest'");
    $resultArray = mysqli_fetch_all($result);
    $output = array();
    for ($x=0; $x<=sizeof($resultArray)-1; $x++) {
        array_push($output, $resultArray[$x][0]);
    }
    return $output;
}

/**
  * Function that returns whether the user is a paid subscriber.
  *
  * The function uses the username parameter to search the userInfo table of the 
  * database and return "yes" if the user is a paid subscriber, or it will return "no" if it is not.
  *
  * @param String $uName is the username of the user whos subscription status will be returned.
  *
  * @return "yes" or "no".
  */
function checkPaidSubscription($uName)
{
    global $con;
    
    $result = mysqli_query($con,"select paid from userInfo where username='$uName'");
    $resultArray = mysqli_fetch_array($result);
    if($resultArray[0])
        return TRUE;
    else
        return FALSE;
}

/**
  * Function used to set the status of a users subscription status
  *
  * updates the userInfo table setting the status of their paid subscription status to either true or false.
  *
  * @param String $uName is the username of the user whos subscription status will be returned.
  * @param Boolean True if setting to true, false if setting to false.
  * 
  * @return returns true if the user is a paid subscriber and returns false if the user is not a paid subscriber.
  */
function setSubscriptionStatus($uName, $status)
{
        global $con;

    if($status)
        mysqli_query($con,"update userInfo set paid=TRUE where username='$uName'");
    else
        mysqli_query($con,"update userInfo set paid=FALSE where username='$uName'");
    
}


/**
  * Function used to input user into database with all the information
  *
  * takes the information from the registration page and inputs it into the database.
  *
  * @param String $uName is the username of the user whos information will be put in.
  * @param String $password is the password of the user whos information will be put in.
  * @param String $email is the email of the user whos information will be put in.
  */
function register($uName, $password, $confirmPassword, $email)
{
        global $con;
        
    $UsernameMatch = mysqli_query($con,"select * from userInfo WHERE username='$uName'");
    $UsernameMatchArray = mysqli_fetch_array($UsernameMatch);
    if($UsernameMatchArray[0] != null)
        die("username already in use");
    
    if(strcmp($password, $confirmPassword) != 0)
        die("password do not match");

    mysqli_query($con,"insert into userInfo (username, email, password, paid) values('$uName', '$email', '$password', FALSE);");
    return TRUE;    
}

function doesUserExist($uName)
{
    global $con;
    
    $result = mysqli_query($con,"select * from userInfo WHERE username='$uName'");
    $resultArray = mysqli_fetch_array($result);
    if($resultArray[0] == null)
        return FALSE;
    else 
        return TRUE;
}

function isMentor($uName)
{
    global $con;
    
    $result = mysqli_query($con,"select * from mentors WHERE mentorName='$uName'");
    $resultArray = mysqli_fetch_array($result);
    if($resultArray[0] == null)
        return FALSE;
    else 
        return TRUE;
}

function deactivate($uName)
{
    global $con;
    
    mysqli_query($con,"delete from userInfo where username='$uName'");
        
    mysqli_query($con,"delete from interests where username='$uName'");
    
    mysqli_query($con,"delete from mentors where mentorName='$uName'");
}

function addMentor($mentor, $mentee)
{
    global $con;
    
    mysqli_query($con,"insert into mentors values('$mentor', '$mentee');");
}

function addInterest($uName, $interest)
{
    global $con;
    
    mysqli_query($con,"insert into interests (username, interest) values('$uName', '$interest');");
}

function getMenteeByMentor($mentor)
{
    global $con;
    
    $result = mysqli_query($con,"select menteeName from mentors where mentorName='$mentor';");
    $resultArray = array(); 
    $index = 0;
    while($row = $result->fetch_assoc()) 
    {
         $resultArray[$index] = $row['menteeName'];
         $index++;
    }
    return $resultArray;
}

function getMentorByMentee($mentee)
{
    global $con;
    
    $result = mysqli_query($con,"select mentorName from mentors where menteeName='$mentee';");
    $resultArray = array(); 
    $index = 0;
    while($row = $result->fetch_assoc()) 
    {
         $resultArray[$index] = $row['mentorName'];
         $index++;
    }
    return $resultArray;
}
//TODO: location database functions.
?>

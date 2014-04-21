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
    $result = mysqli_query($con,"select password from userInfo where username='Tom'");
    $resultArray = mysqli_fetch_array($result);
    if($resultArray[0] == $password)
        return "true";
    else
        return "false";
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
    
    $result = mysqli_query($con,"select * from interests WHERE username='$uName'");
    $resultArray = mysqli_fetch_array($result);
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
?>

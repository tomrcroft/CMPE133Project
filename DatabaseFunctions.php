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
  * A summary informing the user what the associated element does.
  *
  * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
  * and to provide some background information or textual references.
  *
  * @param String $uName is the username of the user whos password will be changed.
  * @param 
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

//change email function
function changeEmail($uName, $email)
{
    global $con;
    mysqli_query($con,"UPDATE userInfo SET email='$email' WHERE username='$uName'");
}

//get interests function

//set job description function
function changeJobDescription($uName, $jobDescrib)
{
    global $con;
    mysqli_query($con,"UPDATE userInfo SET jobDescription='$jobDescrib' WHERE username='$uName'");
}

//change skypeID function
function changeSkypeID($uName, $ID)
{
    global $con;
    mysqli_query($con,"UPDATE userInfo SET skypeID='$ID' WHERE username='$uName'");
}

function getEmail($uName)
{
    global $con;
    
    $result = mysqli_query($con,"select email from userInfo WHERE username='$uName'");
    $resultArray = mysqli_fetch_array($result);
    return $resultArray[0];
}

function getPassword($uName)
{
    global $con;
    
    $result = mysqli_query($con,"select password from userInfo WHERE username='$uName'");
    $resultArray = mysqli_fetch_array($result);
    return $resultArray[0];
}

function getjobDescription($uName)
{
    global $con;
    
    $result = mysqli_query($con,"select jobDescription from userInfo WHERE username='$uName'");
    $resultArray = mysqli_fetch_array($result);
    return $resultArray[0];
}

function getskypeID($uName)
{
    global $con;
    
    $result = mysqli_query($con,"select skypeID from userInfo WHERE username='$uName'");
    $resultArray = mysqli_fetch_array($result);
    return $resultArray[0];
}

function getInterests($uName)
{
    global $con;
    
    $result = mysqli_query($con,"select * from interests WHERE username='$uName'");
    $resultArray = mysqli_fetch_array($result);
    return $resultArray;
}

//get mentees function

//set mentees function

//get mentors function

//set mentors function
//changed
?>

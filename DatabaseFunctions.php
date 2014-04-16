<?php

//connect to DB
$con=mysqli_connect("mydbinstance.czp48rfeukis.us-west-2.rds.amazonaws.com","tomrcroft","password","cmpe133Project");

//change password function
function changePassword($uName, $password)
{
    global $con;
    mysqli_query($con,"update userInfo set password='$password' where username='$uName'");
}

//validate password function
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

//get mentees function

//set mentees function

//get mentors function

//set mentors function
//changed
?>

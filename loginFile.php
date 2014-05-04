<?php
/*
 * Created on May 2, 2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 /*
 * Created on Apr 7, 2014
 *
 *The script help login in the users into the system by taking information from the form
 *and checking it with the database. 
 *
 */

include "DatabaseFunctions.php";

//check to see if the user is connected
if(isset($_SESSION['username'])){ 
header("location:mainWebpage.php");
} 

if(isset($_POST['submit'])) 
{ 
if(validatePassword($_POST['myusername'],$_POST['mypassword'])== 1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['username']=$_POST['myusername'];
$_SESSION['loggedIn'] = true;
header("location:mainWebpage.php");
}
else {
echo "Wrong Username or Password";
}
}
?>

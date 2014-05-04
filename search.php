<?php
/**
 * This is the search page where users look for mentors or mentees 
 * by a job description and specific interests
 * change 
 * @author Jordan Watts
 * @copyright 2014
 */
 
/*session_start(); 
$loggedIn = isset($_SESSION['username']);
if (!$loggedIn)
	header('location:mainLogin.php');
*/
include 'DatabaseFunctions.php';

if (isset($_POST['submit'])) { 
 	
 if(register($_POST['job'] ,$_POST['interests'])==1)
 {
 	//results = getUsernamesUsingInterests('job', 'interests');
 }
 }
?>

<html>
 <head>
  <title>Mentor Search</title>
 </head>
 <body>
    <form action="action.php" method="post">
        <p>Job Category: <input type="text" name="job" /></p>
        <p>Specific Interests: <input type="text" name="interests" /></p>
        <p><input type="submit" name="submit"/></p>
    </form> 
 </body>
</html>


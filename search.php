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
		
		/******************************************************************/
		 /** Check if there are no results**/
		 if(empty($results))
		 {
			echo "No results found";
			exit;
		 }	
		 /** I there are results **/
		 showM($usernames);
		/******************************************************************/
    }
 }
?>

<html>
 <head>
  <title>Mentor Search</title>
  <script src="scriptResult.js"></script>
  <link rel="stylesheet" type="text/css" href="formatresult.css">
 </head>
 
 <body>
    <form action="action.php" method="post">
        <p>Job Category: <input type="text" name="job" /></p>
        <p>Specific Interests: <input type="text" name="interests" /></p>
        <p><input type="submit" name="submit"/></p>
    </form> 
	
	

<?php
	/******************************************************************/
	/** Show the results in a table in the same page**/
	function showM($usernames)
	{
		echo '<table width="700" class="altrowstable" id="alternatecolor"><tr><th>Name</th><th>Information</th><th>Contact</th></tr>';
		foreach ($usernames as $uName) 
		{ 
			$email = getEmail($uName);
			$jobDescription = getjobDescription($uName);
			$skypeID = getSkypeID($uName);
			$allInterests = getInterests($uName);
					
			echo '<tr><td width="20%"><b>' . $uName . '</td><td width="65%"><b>Email: </b>' . $email . "<p><b> Job Description: </b>" . $jobDescription . "<p><b>Interests: </b>";
					
			foreach ($allInterests as $interest) {
				echo ' ' . $interest . ', ';
			}
						
			echo '<b></td><td width="15%">' . $skypeID . "</td></tr>";				
		}
		echo '</table>';
	}
	/******************************************************************/
?>	
		
</body>
</html>


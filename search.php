<?php
/**
 * This is the search page where users look for mentors or mentees 
 * by a job description and specific interests showing the results
 * in a table with all the user's information from the search 
 *
*/ 
session_start(); 
$loggedIn = isset($_SESSION['username']);
if (!$loggedIn)
	header('location:mainLogin.php');

include 'DatabaseFunctions.php';
?>

<html>
 <head>
  <title>Mentor/Mentee Search</title>
  <script src="scriptResult.js"></script>
  <link rel="stylesheet" type="text/css" href="formatresult.css">
 </head>
 
<body style=" background-color: lightgray;">
 <h1 class="search"><img class="small-logo" src="sjsu6.png" style="width: 88px; height: 88px; float:left; 
 background-color:gray; margin-left:30px; margin-bottom:10px; ">Mentor Web</h1>

 <div class="menu">
 <h2 class="editprofile1"style=" font-size: 20pt;font-style: italic;
	 font-family: cursive;font-weight: bold; margin-left:200px;}"> View Profile</h2>
	<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
        <p class="search">Job Category: <input class="textbox" type="text" name="job" ></p>
        <p class="search">Specific Interests: <input class="textbox1" type="text" name="interests" ></p>
        <p class="search"><input class="button" type="submit" name="submit" value="Search"></p>
	
	
<?php
	/* Press Submit button */
	if (isset($_POST['submit'])) { 
	
		if (empty($_POST['job']) && empty($_POST['interests'])) {
			echo '<font color="red">Both fields are empty</color>';
			exit;
		}
		else
		{
			$results = searchByJobDescriptionAndInterests($_POST['job'], $_POST['interests']);	
			
			$_SESSION['results'] = $results;
			
			 if(empty($results)) {
				echo "No results found";
				exit;
			}
			else {
				echo '<p><input type="submit" value= "Show All" name="all"/>';
				echo ' <input type="submit"  value= "Show Mentors" name="mentors"/>';
				echo ' <input type="submit"  value= "Show Mentees" name="mentees"/>';
				showResults($_SESSION['results']);
			}
		 }
	}
	
	/* Press Show All button */
	if(isset($_POST['all'])){
		echo '<p><input type="submit" value= "Show All" name="all"/>';
		echo ' <input type="submit"  value= "Show Mentors" name="mentors"/>';
		echo ' <input type="submit"  value= "Show Mentees" name="mentees"/>';
		showResults($_SESSION['results']);
	}
	
	/* Press Show Mentors button */
	if(isset($_POST['mentors'])){
		echo '<p><input type="submit" value= "Show All" name="all"/>';
		echo ' <input type="submit"  value= "Show Mentors" name="mentors"/>';
		echo ' <input type="submit"  value= "Show Mentees" name="mentees"/>';		
		showMentors($_SESSION['results']);
	}
	
	/* Press Show Mentors button */
	if(isset($_POST['menteess'])){
		echo '<p><input type="submit" value= "Show All" name="all"/>';
		echo ' <input type="submit"  value= "Show Mentors" name="mentors"/>';
		echo ' <input type="submit"  value= "Show Mentees" name="mentees"/>';		
		showMentees($_SESSION['results']);
	}	
?>	
 
 </form> 
	
	
<?php
	/** 
	*  This function show all the results from the search in a table in the same page
	*  with all the information of the users 
	*  PRE:   $results , an array with all the results
	*  POST:  a table with all the results
	**/
	function showResults($results)
	{
		echo '<table width="500" class="altrowstable" id="alternatecolor"><tr><th>Name</th><th>Information</th><th>Contact</th></tr>';
		foreach ($results as $uName) 
		{ 
			informationSearch($uName);
		}
		echo '</table>';
	}
	
	/**
	*  This function show all the mentors that are in the results
	*  PRE:   $results, an array with all the results
	*  POST:  a table with all the mentors that were in the results
	**/
	function showMentors($results)
	{
		echo '<table width="500" class="altrowstable" id="alternatecolor"><tr><th>Name</th><th>Information</th><th>Contact</th></tr>';
		foreach ($results as $uName) 
		{ 
			if( isMentor($uName) ) {
				informationSearch($uName);
			}
		}
		echo '</table>';
	}
	
	/**	
	*  This function show all the mentees that are in the results
	*  PRE:   $results, an array with all the results
	*  POST:  a table with all the mentees that were in the results
	**/
	function showMentees($results)
	{
		echo '<table width="500" class="altrowstable" id="alternatecolor"><tr><th>Name</th><th>Information</th><th>Contact</th></tr>';
		foreach ($results as $uName) 
		{ 
			if( isMentee($uName) ) {
				informationSearch($uName);
			}
		}
		echo '</table>';
	}
	
	/**
	*  This function retrieved all the information from uName, and add a row in the created table
	*  PRE:   $uName  a user
	*  POST:  a row in the table with the user's information
	**/	
	function informationSearch($uName)
	{
		$email = getEmail($uName);
		$jobDescription = getjobDescription($uName);
		$skypeID = getSkypeID($uName);
		$allInterests = getInterests($uName);
					
		echo '<tr><td width="10%"><b>' . $uName . '</td><td width="65%"><b>Email: </b>' . $email . "<p><b> Job Description: </b>" . $jobDescription . "<p><b>Interests: </b>";
					
		foreach ($allInterests as $interest) {
			echo ' ' . $interest . ', ';
		}
						
		echo '<b></td><td width="15%">' . $skypeID . "</td></tr>";		
	}
?>	
		
</div>
</body>
</html>


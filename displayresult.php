<?php 
session_start();
include 'DatabaseFunctions.php';
?>

<html>

<head>
<script src="scriptResult.js"></script>
<link rel="stylesheet" type="text/css" href="formatresult.css">
</head>

<body>









<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
<input type="submit" name="submit" value="Submit">
</form> 


<?php
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
						
			echo '<b></td><td width="15%">' . $skypeID . "</td></tr>";				}
		}
		
		echo '</table>';
	}
?>

<?php 
	if(isset($_POST['submit'])) {
	
	/****After submit button****/
		if(empty($usernames))
		{
			echo "No results found";
			exit;
		}	
		
		showM($usernames);
	}
?>
</body>
</html>
<?php
/**
 * This is the search page where users look for mentors or mentees 
 * by a job description and specific interests
 * @author Jordan Watts
 * @copyright 2014
 */
?>

<html>
 <head>
  <title>Mentor Search</title>
 </head>
 <body>
    <form action="action.php" method="post">
        <p>Are you searching for a Mentor or Mentee?<br>
            <input type="radio" name="fav_color" value="Mentor" checked>Mentor<br>
            <input type="radio" name="fav_color" value="Mentee">Mentee</p>
        <p>General Subject: <input type="text" name="job description" /></p>
        <p>Specific Category: <input type="text" name="interests" /></p>
        <p><input type="submit" name="Submit"/></p>
    </form> 
 </body>
</html>


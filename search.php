<?php
/**
 * This is the search page where users look for mentors or mentees 
 * by a job description and specific interests
 * change 
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
            <input type="radio" name="search_type" value="Mentor" checked>Mentor<br>
            <input type="radio" name="search_type" value="Mentee">Mentee</p>
        <p>Job Category: <input type="text" name="jobDescription" /></p>
        <p>Specific Interests: <input type="text" name="interests" /></p>
        <p><input type="submit" name="Submit"/></p>
    </form> 
 </body>
</html>

<?php
    $type = search_type;
    $job = jobDescription;
    $interests = interests;
    
    function getSearchType()
    {
        return $type;
    }
    
    function getSeachJobDescription()
    {
        return $job;
    }
    
    function getSearchInterests()
    {
        return $interests;
    }
?>

<?php 
header('Refresh: 5; index.php');
if(isset($_POST['submit'])) {
    // set new job description in database
    echo '<p>Job Description set to ' . $_POST['jobdescription'] . '</p>';
}

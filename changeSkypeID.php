<?php 
header('Refresh: 5; index.php');
if(isset($_POST['submit'])) {
    // set new SkypeID in database
    echo '<p>Skype ID set to ' . $_POST['newskypeid'] . '</p>';
    
}

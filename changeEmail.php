<?php 
header('Refresh: 5; index.php');
if(isset($_POST['submit'])) {
    // set new email in database
    echo '<p>Email set to ' . $_POST['email'] . '</p>';
}

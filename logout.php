<?php
/*
 * Created on Apr 7, 2014
 *
 * The script destroy the session to logout the user from the system.
 * 
 */
session_start();
require "config.php";
session_destroy();
echo "You have successfully logged out.";
?>

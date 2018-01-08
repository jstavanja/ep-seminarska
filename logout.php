<?php
session_start();
// remove all session variables
session_unset(); 
header("Location: index.php");
// destroy the session 
session_destroy();
?>
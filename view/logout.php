<?php
session_start();
// remove all session variables
session_unset(); 
header("Location: " . BASE_URL);
// destroy the session 
session_destroy();
?>
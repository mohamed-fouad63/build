<?php
session_start();
// remov all session variables
session_unset();
// destroy the session 
session_destroy();
header('location:/build/views/login.php');
?>
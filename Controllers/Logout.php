<?php
// Start session
session_start();
// reset session
$_SESSION = array();
// remove session form cookie
unset($_COOKIE[session_name()]);
// destroy session
session_destroy();
// send to login
header("Location: /login.php");
?>
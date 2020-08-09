<?php
// Start session
session_start();
$_SESSION = array();
unset($_COOKIE[session_name()]);
session_destroy();
header("Location: /login.php");
?>
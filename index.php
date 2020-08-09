<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){ //if login in session is not set
        header("Location: /login.php");
    }else{
        header("Location: /files.php");
    }
    exit;
?>
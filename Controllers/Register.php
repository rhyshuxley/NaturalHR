<?php
// Start session
session_start();

// include db config
include('../Config/database.php');

// Set up response
$response = [];
$response['registered'] = FALSE;

// check for username
if (!isset($_POST['username'])) {
	// no username
	$response['errorMessage'] = 'Please fill in the username field';
}

// check for password
if (!isset($_POST['password'])) {
	// no password
	$response['errorMessage'] = 'Please fill in the password field';
}

// if error, return
if(!empty($response['errorMessage'])){
    echo json_encode($response);
    exit;
}

// insert new User
if ($stmt = $con->prepare('INSERT INTO User (username, password, email) VALUES (?,?,?)')) {
    // hash password
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt->bind_param('sss', $_POST['username'], $password, $_POST['username']);
    
    if ($stmt->execute()) {
        // registered
        $response['registered'] = TRUE;
    } else {
        // error with sql
        $response['errorMessage'] = 'There was an error with registration, please try again';
    }

    $stmt->close();

    // return
    if(!empty($response)){
        echo json_encode($response);
        exit;
    }
}
?>
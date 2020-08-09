<?php
// Start session
session_start();

include('../Config/database.php');

// Set up response
$response = [];
$response['registered'] = FALSE;

// Check for username and password
if (!isset($_POST['username'])) {
	// Could not get the data that should have been sent.
	$response['errorMessage'] = 'Please fill in the username field';
}
if (!isset($_POST['password'])) {
	// Could not get the data that should have been sent.
	$response['errorMessage'] = 'Please fill in the password field';
}

if(!empty($response['errorMessage'])){
    echo json_encode($response);
    exit;
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('INSERT INTO User (username, password, email) VALUES (?,?,?)')) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('sss', $_POST['username'], $password, $_POST['username']);
    
    if ($stmt->execute()) {
        $response['registered'] = TRUE;
    } else {
        $response['errorMessage'] = 'There was an error with registration, please try again';
    }

    $stmt->close();
    
    if(!empty($response)){
        echo json_encode($response);
        exit;
    }
}
?>
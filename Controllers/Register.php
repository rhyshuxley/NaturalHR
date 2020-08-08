<?php
// Start session
session_start();

// MySQL Connection Info
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'adminNHR';
$DATABASE_PASS = 'R8xAvx265eCa4QWs';
$DATABASE_NAME = 'NaturalHr';

// Connect to database
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

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
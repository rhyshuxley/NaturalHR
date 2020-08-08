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
$response['validUser'] = FALSE;

// Check for username and password
if (isset($_POST['username'])) {
	// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $con->prepare('SELECT * FROM User WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        $response['validUser'] = TRUE;
        $response['userId'] = $user['id'];

        if(empty($response['userId'])){
            $response['errorMessage'] = 'Unknown user';
        }

        $stmt->close();
    
        if(!empty($response)){
            echo json_encode($response);
            exit;
        }
    }
}

if (isset($_POST['password'])) {
    $response['updated'] = FALSE;
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $con->prepare('UPDATE User SET password = ? WHERE id = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('si', $password, $_POST['userId']);
        if ($stmt->execute()) {
            $response['updated'] = TRUE;
        } else {
            $response['errorMessage'] = 'There was an error updating your password, please try again';
        }
    }

    $stmt->close();
    
    if(!empty($response)){
        echo json_encode($response);
        exit;
    }
}

?>
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
$response['loggedIn'] = FALSE;

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
if ($stmt = $con->prepare('SELECT id, password FROM User WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has loggedin!
            // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedIn'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;

            $response['loggedIn'] = TRUE;
        } else {
            $response['errorMessage'] = 'There is no match for this password';
        }
    } else {
        $response['errorMessage'] = 'There is no match for this username';
    }

    $stmt->close();
    
    if(!empty($response)){
        echo json_encode($response);
        exit;
    }
}
?>
<?php
// Start session
session_start();

// include db config
include('../Config/database.php');

// Set up response
$response = [];
$response['loggedIn'] = FALSE;

// Check for username and password
if (!isset($_POST['username'])) {
	// no username
	$response['errorMessage'] = 'Please fill in the username field';
}

// no password
if (!isset($_POST['password'])) {
	// Could not get the data that should have been sent.
	$response['errorMessage'] = 'Please fill in the password field';
}

// if error return
if(!empty($response['errorMessage'])){
    echo json_encode($response);
    exit;
}

// get User from database
if ($stmt = $con->prepare('SELECT id, password FROM User WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
    $stmt->store_result();
    
    // if we find a Userr
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // verify the password.
        if (password_verify($_POST['password'], $password)) {
            // set up session
            session_regenerate_id();
            $_SESSION['loggedIn'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;

            $response['loggedIn'] = TRUE;
        } else {
            // incorrect password
            $response['errorMessage'] = 'There is no match for this password';
        }
    } else {
        // no usernaem match
        $response['errorMessage'] = 'There is no match for this username';
    }

    $stmt->close();
    
    // return
    if(!empty($response)){
        echo json_encode($response);
        exit;
    }
}
?>
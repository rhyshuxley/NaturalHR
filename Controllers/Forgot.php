<?php
// Start session
session_start();

include('../Config/database.php');

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
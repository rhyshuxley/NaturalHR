<?php
// Start session
session_start();

// include db config
include('../Config/database.php');

// Set up response
$response = [];
$response['validUser'] = FALSE;

// if username is given
if (isset($_POST['username'])) {
	// check for User
    if ($stmt = $con->prepare('SELECT * FROM User WHERE username = ?')) {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();

        // if we have a User
        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
    
            // return user id
            $response['validUser'] = TRUE;
            $response['userId'] = $user['id'];
        }else{
            // if no result
            if(empty($response['userId'])){
                $response['errorMessage'] = 'Unknown user';
            }
        }


        $stmt->close();
    
        // return
        if(!empty($response)){
            echo json_encode($response);
            exit;
        }
    }
}

if (isset($_POST['password'])) {
    $response['updated'] = FALSE;
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	// Update User table
    if ($stmt = $con->prepare('UPDATE User SET password = ? WHERE id = ?')) {
        // add new password
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

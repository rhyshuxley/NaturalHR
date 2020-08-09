<?php
// start session
session_start();

// upload directory
$path = '../files/';

// set up response
$response = [];
$response['uploaded'] = FALSE;

// include db config
include('../Config/database.php');

if(!empty($_FILES['file'])) {
    // get file
    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];

    // create random filename
    $finalFile = rand(1000,1000000).$file;
    $path = $path.$finalFile;

    // if file moves successfully
    if(move_uploaded_file($tmp,$path)) {
        // insert file details
        if ($stmt = $con->prepare('INSERT INTO Upload (userId, filename, uploadedDate) VALUES (?,?,?)')) {
            $stmt->bind_param('iss', $_SESSION['id'], $path, date('Y-m-d H:i:s'));

            // send User to file list
            if ($stmt->execute()) {
                $response['uploaded'] = TRUE;
                header("Location: /files.php");
            }
        }
    }
}
?>
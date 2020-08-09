<?php
session_start();
$path = '../files/'; // upload directory
$response = [];
$response['uploaded'] = FALSE;

include('../Config/database.php');

$file = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];

// can upload same image using rand function
$finalFile = rand(1000,1000000).$file;
$path = $path.strtolower($finalFile);

if(!empty($_FILES['file'])) {
    if(move_uploaded_file($tmp,$path)) {
        // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
        if ($stmt = $con->prepare('INSERT INTO Upload (userId, filename, uploadedDate) VALUES (?,?,?)')) {
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->bind_param('iss', $_SESSION['id'], $path, date('Y-m-d H:i:s'));
            if ($stmt->execute()) {
                $response['uploaded'] = TRUE;
                header("Location: /files.php");
            }
        }
    }
}
?>
<?php
// Start session
session_start();

// include db config
include('../Config/database.php');

// get files
if ($stmt = $con->prepare('SELECT * FROM Upload WHERE userId = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->get_result();

    // set up response
    $response['html'] = '';

    // if we find files
    if ($result->num_rows > 0) {

        // for each result
        while($file = $result->fetch_assoc()){
            // build html
            $response['html'] .= "<tr class='row'><td class='col-8'>".basename($file['filename'])."</td><td class='col-4'>".date('jS F Y H:i:s', strtotime($file['uploadedDate']))."</td></tr>";
        }
    }else{
        $response['html'] .= "<tr colspan=3 class='row'><td class='col text-center'>No files found</td></tr>";
    }

    $stmt->close();

    // return
    if(!empty($response)){
        echo json_encode($response);
        exit;
    }
}
?>
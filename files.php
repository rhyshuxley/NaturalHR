<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){ //if login in session is not set
        header("Location: /login.php");
    }
    require('Views/header.php');
?>

<div class="content container w-50">
    <div class="table-responsive px-3">
        <table class="table table-striped">
            <thead>
                <tr class="row">
                    <th class="col-8">Filename</th>
                    <th class="col-4">Uploaded At</th>
                </tr>
            </thead>
            <tbody class="fileRows">
            </tbody>
        </table>
    </div>
</div>

<?php require('Views/footer.php'); ?>
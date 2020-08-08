<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){ //if login in session is not set
        header("Location: /login.php");
    }
    exit;
    require('Views/header.php');
?>

<div class="content container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Choose file</div>
                    <div class="card-body px-5">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group col-md-8 offset-md-6 pl-4">
                                <input type="file" id="file" name="file" />
                                <label for="file">Choose a file</label>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-9">
                                    <button type="submit" class="btn btn-primary submitButton d-none">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('Views/footer.php'); ?>
<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){ //if login in session is not set
        header("Location: /login.php");
    }
    require('Views/header.php');
?>

<div class="content container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Upload file</div>
                    <div class="card-body px-5">
                        <div class="errorMessage row justify-content-center pb-4 text-danger"></div>
                        <form action="/Controllers/Upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group col-md-8">
                                <input type="file" id="file" name="file" />
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-9">
                                    <button type="submit" class="btn btn-primary uploadButton">Upload</button>
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
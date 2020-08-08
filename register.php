<?php require('Views/header.php'); ?>
<div class="content">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Register</div>

                    <div class="card-body">
                        <div class="errorMessage row justify-content-center pb-4 text-danger"></div>
                        <form method="POST" onsubmit="submitLogin();">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control username" name="username" required autocomplete="email" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control password" name="password" required autocomplete="current-password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-7 pl-4">
                                    <button type="button" class="btn btn-primary registerButton">Register</button>
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
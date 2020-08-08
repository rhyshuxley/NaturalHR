<?php require('Views/header.php'); ?>
<div class="content">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>

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
                                <div class="col-md-8 offset-md-8 pl-2">
                                    <button type="button" class="btn btn-primary loginButton">Login</button>
                                </div>
                                <div class="col-md-8 offset-md-5 pl-5">
                                    <a class="btn btn-sm btn-link" href="">Forgot Your Password?</a>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="row justify-content-center align-items-center">
                            <span class="align-self-center pr-3">Don't have and account?</span><a class="btn btn-sm btn-outline-info" href="">Register here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('Views/footer.php'); ?>
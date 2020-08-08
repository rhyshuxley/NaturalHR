<?php require('Views/header.php'); ?>

<div class="content container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Forgotten password</div>
                    <div class="card-body px-5">
                        <div class="supplyUsername">
                            <div class="errorMessage row justify-content-center pb-4 text-danger"></div>
                            <form onsubmit="return false;" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control username" name="username" required autocomplete="email" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-9 pl-5">
                                        <button type="submit" class="btn btn-primary forgotNext">Next</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="resetPassword">
                        <div class="errorMessage row justify-content-center pb-4 text-danger"></div>
                            <form onsubmit="return false;" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="userId" class="userId">
                                <label for="password" class="col-md-4 col-form-label">New password</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control newPassword" name="newPassword" required autocomplete="current-password">
                                </div>
                                <label for="password" class="col-md-4 col-form-label text-md-right">Verify password</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control verifyPassword" name="verifyPassword" required autocomplete="current-password">
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-7 pl-5 pt-3">
                                        <button type="submit" class="btn btn-primary submitResetPassword">Set password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('Views/footer.php'); ?>
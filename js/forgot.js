// check username
$(document).on('click', '.forgotNext', function(){
    checkUser();
});

// submit new password
$(document).on('click', '.submitResetPassword', function(){
    var newPassword = $('.newPassword').val();
    var verifyPassword = $('.verifyPassword').val();

    // if passwords don't match
    if(newPassword != verifyPassword){
        $('.errorMessage').html("Passwords don't match");
        return false;
    }

    // reset password
    resetPassword(newPassword);
});

// checks username is valid
function checkUser(){
    var username = $('.username').val();

    $.post('/Controllers/Forgot.php', { username: username }, function(response) {
        // valid user
        if(response.validUser) {
            // move to password reset
            $('.userId').val(response.userId)
            $('.supplyUsername').hide();
            $('.resetPassword').show();
        } else {
            // display error
            $('.errorMessage').html(response.errorMessage);
        }
    }, 'json');
}

// resets password
function resetPassword(newPassword){
    var userId = $('.userId').val();
    $.post('/Controllers/Forgot.php', { password: newPassword, userId: userId }, function(response) {
        // updated
        if(response.updated) {
            // redirect to login
            location.href = '/login.php';
        } else {
            // display error
            $('.errorMessage').html(response.errorMessage);
        }
    }, 'json');
}
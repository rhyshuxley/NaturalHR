$(document).on('click', '.forgotNext', function(){
    registerUser();
});

$(document).on('click', '.submitResetPassword', function(){
    var newPassword = $('.newPassword').val();
    var verifyPassword = $('.verifyPassword').val();

    if(newPassword != verifyPassword){
        $('.errorMessage').html("Passwords don't match");
        return false;
    }

    resetPassword(newPassword);
});

function registerUser(){
    var username = $('.username').val();

    $.post('/Controllers/Forgot.php', { username: username }, function(response) {
        // logged in
        if(response.validUser) {
            $('.userId').val(response.userId)
            $('.supplyUsername').hide();
            $('.resetPassword').show();
        } else {
            $('.errorMessage').html(response.errorMessage);
        }
    }, 'json');
}

function resetPassword(newPassword){
    var userId = $('.userId').val();
    $.post('/Controllers/Forgot.php', { password: newPassword, userId: userId }, function(response) {
        // logged in
        if(response.updated) {
            location.href = '/login.php';
        } else {
            $('.errorMessage').html(response.errorMessage);
        }
    }, 'json');
}
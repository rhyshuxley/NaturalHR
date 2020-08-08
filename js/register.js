$(document).on('click', '.registerButton', function(){
    registerUser();
});

function registerUser(){
    var username = $('.username').val();
    var password = $('.password').val();

    $.post('/Controllers/Register.php', { username: username, password: password }, function(response) {
        // logged in
        if(response.registered) {
            location.href = '/login.php';
        } else {
            $('.errorMessage').html(response.errorMessage);
        }
    }, 'json');
}
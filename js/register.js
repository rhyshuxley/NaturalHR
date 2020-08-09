// register new user
$(document).on('click', '.registerButton', function(){
    registerUser();
});

// adds new User to database
function registerUser(){
    var username = $('.username').val();
    var password = $('.password').val();

    $.post('/Controllers/Register.php', { username: username, password: password }, function(response) {
        // registered
        if(response.registered) {
            // redirect to login
            location.href = '/login.php';
        } else {
            // display error
            $('.errorMessage').html(response.errorMessage);
        }
    }, 'json');
}
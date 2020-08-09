// submit login form
$(document).on('click', '.loginButton', function(){
    submitLogin();
});

function submitLogin(){
    var username = $('.username').val();
    var password = $('.password').val();

    $.post('/Controllers/Authenticate.php', { username: username, password: password }, function(response) {
        // logged in
        if(response.loggedIn) {
            // redirect
            location.href = '/';
        } else {
            // display error
            $('.errorMessage').html(response.errorMessage);
        }
    }, 'json');
}
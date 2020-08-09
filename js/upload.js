$(document).on('click', '.uploadButton', function(){
    uploadFile();
});

function uploadFile(){
    var userId = $('.loggedInUserId').val();
    var file = $('#file').val();
    $.post('/Controllers/Upload.php', { file: file, userId: userId }, function(response){
        var response = $.parseJSON(response);
        if(response.uploaded) {
            $('.errorMessage').html(response.successMessage);
        } else {
            $('.errorMessage').html(response.errorMessage);
        }
    });
}
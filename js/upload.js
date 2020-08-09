// upload file
$(document).on('click', '.uploadButton', function(){
    uploadFile();
});

// upload file and store details in database
function uploadFile(){
    var userId = $('.loggedInUserId').val();
    var file = $('#file').val();

    $.post('/Controllers/Upload.php', { file: file, userId: userId }, function(response){
        var response = $.parseJSON(response);
        // uploaded
        if(response.uploaded) {
            // display success message
            $('.errorMessage').html(response.successMessage);
        } else {
            // display error message
            $('.errorMessage').html(response.errorMessage);
        }
    });
}
// when page loads get files
$(document).ready(function(){
    getFiles();
});

// get file list from database
function getFiles(){
    $.post('/Controllers/File.php', function(response){
        var response = $.parseJSON(response);
        if(response.html.length > 0){
            $('.fileRows').html(response.html);
        }
    });
}
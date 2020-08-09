$(document).ready(function(){
    getFiles();
});

function getFiles(){
    $.post('/Controllers/File.php', function(response){
        var response = $.parseJSON(response);
        if(response.html.length > 0){
            $('.fileRows').html(response.html);
        }
    });
}
$(document).ready(function(){

    $('#tblDocumentation').on('click', "#sendtoProgramHead", function(e){
        var reportId = $(this).attr('reportId');

        $.ajax({
            url: "php/send-documentation.php?reportId="+reportId,
            type: "GET",
            dataType: "json",
            success: function(data){
                console.log(data);
            },
            error: function(err){
                console.log(err);
            }
        });
    });
});
$(document).ready(function(){
    $('#tblJournalReports').on('click', '#btnSendReport', function(e){
        var reportId = $(this).attr('reportId');

        $.ajax({
            url: "php/send-report.php?reportId="+reportId,
            type: "GET",
            dataType: "json",
            success: function(data){
                console.log(data)
            },
            error: function(err){
                console.log(err)
            }
        });
    });

    $('#tblStatusReports').on('click', '#btnSendReport', function(e){
        var reportId = $(this).attr('reportId');

        $.ajax({
            url: "php/send-report.php?reportId="+reportId,
            type: "GET",
            dataType: "json",
            success: function(data){
                console.log(data)
            },
            error: function(err){
                console.log(err)
            }
        });
    });

    $('#tblDocumentation').on('click', '#sendBtn', function(e){
        var reportId = $(this).attr('reportId');

        $.ajax({
            url: "php/send-documentation.php?reportId="+reportId,
            type: "GET",
            dataType: "jason",
            success: function(data){
                console.log(data)
            },
            error: function(err){
                console.log(err)
            }
        });
    });
});
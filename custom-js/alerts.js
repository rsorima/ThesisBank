$(document).ready(function(){
    setInterval(getAlerts, 1000);

    function getAlerts(){
        $.ajax({
            url: "../php/alerts/get-alerts.php",
            type: "GET",
            dataType: "json",
            success: function(data){
                //console.log("alert count", data);
                if(data.code == '200'){
                    $('.notif-badge').removeClass("hide-element");
                    $('.notif-badge').html(data.count);
                }
                else{
                    $('.notif-badge').addClass("hide-element");
                }
               
            }
        });
    }

    function GetAlertsForDropdown(){
        $.ajax({
            url: "../php/alerts/get-alerts.php",
            type: "GET",
            dataType: "json",
            success: function(data){
                $('.alert-item-list').html('');
                if(data.code == '200')
                {
                    for(i in data.result){
                        $('.alert-item-list').append(
                            "<li class='list-group-item d-flex justify-content-between align-items-center alert-item' alertId='"+data.result[i].alertId+"' alertLink='"+data.result[i].link+"'>"+
                                data.result[i].message+
                                "<span class='fa fa-close remove-alert' alertId='"+data.result[i].alertId+"'>"+data.result[i].message+"</span>"+
                            "</li>"
                        );
                    }
                }
                else
                {
                    $('.alert-item-list').append(
                        "<li class='list-group-item d-flex justify-content-between align-items-center alert-item'>"+
                            "NO NOTIFICATION"+
                        "</li>"
                    );
                }
               
            }
        });
    }

    $('.alert-dropdown').click(function(){
        $.ajax({
            url: "../php/alerts/get-alerts.php",
            type: "GET",
            dataType: "json",
            success: function(data){
                $('.alert-item-list').html('');
                if(data.code == '200')
                {
                    for(i in data.result){
                        $('.alert-item-list').append(
                            "<li class='list-group-item d-flex justify-content-between align-items-center alert-item' alertId='"+data.result[i].alertId+"' alertLink='"+data.result[i].link+"'>"+
                                data.result[i].message+
                                "<span class='fa fa-close remove-alert' alertId='"+data.result[i].alertId+"'></span>"+
                            "</li>"
                        );
                    }
                }
                else
                {
                    $('.alert-item-list').append(
                        "<li class='list-group-item d-flex justify-content-between align-items-center alert-item'>"+
                            "NO NOTIFICATION"+
                        "</li>"
                    );
                }
               
            }
        });
    });

    $('.alert-item-list').on('click', '.alert-item', function (e) {
        e.stopPropagation();
        var link = $(this).attr('alertLink');
        var alertId = $(this).attr('alertId');
        $.ajax({
            url: "../php/alerts/read-alert.php?id="+alertId,
            type: "GET",
            dataType: "json",
            success: function(data){
                if(data.code == '200')
                {
                    window.location.assign(link);
                }
               
            }
        });
    });

    $('.alert-item-list').on('click', '.remove-alert', function (e) {
        var alertId = $(this).attr('alertId');
        $.ajax({
            url: "../php/alerts/read-alert.php?id="+alertId,
            type: "GET",
            dataType: "json",
            success: function(data){
                if(data.code == '200')
                {
                    GetAlertsForDropdown();
                }
               
            }
        });
    });
});
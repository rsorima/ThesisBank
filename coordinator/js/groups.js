$(document).ready(function(){

    $.ajax({
        url: "php/fetch-group.php",
        type: "GET",
        dataType: "json",
        success: function(data){
            console.log(data)
        },
        error: function(err){
            
            console.log(err);
        }
    });



//    $('#btnSubmitGroup').click(function(){        
//        var groupName = $('#txtGroup').val();
//        var adviser = $('#advisers').val();
//        
//        if(groupName == '')
//        {
////            $('.gr-error-message').html("Input field cannot be empty!");
//            $('.br-error-message').html(adviser);
//        }
//        else
//        {
//            $.ajax({
//                url: "php/add-group.php?name="+groupName+"&adviser="+adviser,
//                type: "GET",
//                dataType: "json",
//                success: function(data){
//                    alert(data.message);
//                    location.reload();
//                },
//                error: function(err){
//                    console.log(err);
//                }
//            });
//        }
//    });

    
    $.ajax({
        url: "php/get-students.php",
        type: "GET",
        dataType: "json",
        success: function(data){
            for(index in data){
                $('.selectStudent').append(
                    "<option value='"+data[index].id+"'>"+data[index].lastname+", "+data[index].firstname+"</option>"
                );
            }
        }
    });

    $.ajax({
        url: "php/get-group-adviser.php",
        type: "GET",
        dataType: "json",
        success: function(data){
            for(index in data){
                $('.selectAdviser').append(
                    "<option value='"+data[index].id+"'>"+data[index].lastname+", "+data[index].firstname+"</option>"
                );
            }
        }
    });

    $('#tblGroup').on('click', '#btnEditGroup', function(e){
        var groupId = $(this).attr('group_id');
        var groupName = $(this).attr('groupname');

        getGroupUsers(groupId);
        getGroupAdviser(groupId);

        $('#group-id').html(groupId);
        $('#txtGroupName').val(groupName);
        $('#modalEditGroups').modal();
    });

    $('.addToMembers').click(function(){
        var userId = $('.selectStudent').val();
        var groupId = $('#group-id').html();

        if(userId == ''){
            alert("Please select student");
        }
        else
        {
            $.ajax({
                url: "php/add-group-user.php?userId="+userId+"&groupId="+groupId,
                type: "GET",
                dataType: "json",
                success: function(data){
    
                    if(data.code == '200'){
                        getGroupUsers(groupId);
                        $('#modalEditGroups').modal('hide');
                        $('#modalEditGroups').modal('show');
                    }
                    else{
                        alert(data.message)
                    }
                    
                }
            });
        }
    });

    $('.btnSelectAdviser').click(function(){
        var userId = $('.selectAdviser').val();
        var groupId = $('#group-id').html();

        if(userId == ''){
            alert("Please select adviser");
        }
        else
        {
            $.ajax({
                url: "php/add-group-adviser.php?userId="+userId+"&groupId="+groupId,
                type: "GET",
                dataType: "json",
                success: function(data){
    
                    if(data.code == '200'){
                        getGroupAdviser(groupId);
                        alert(data.message);
                    }
                    else{
                        alert(data.message)
                    }
                    
                }
            });
        }
    });

    $('.membersList').on('click', '.removeMember', function(e){
        var groupUserId = $(this).attr('groupUserId');
        var groupId = $(this).attr('groupId');
        $.ajax({
            url: "php/delete-group-user.php?id="+groupUserId,
            type: "GET",
            dataType: "json",
            success: function(data){
               getGroupUsers(groupId);
            }
        });
    });

    $('#btnUpdateGroupName').click(function(){
        var groupName = $('#txtGroupName').val();
        var groupId = $('#group-id').html();

        $.ajax({
            url: "php/update-group-name.php?groupid="+groupId+"&name="+groupName,
            type: "GET",
            dataType: "json",
            success: function(data){
               alert(data.message);
               if(data.code == '200')
               {
                var groupName = $('#txtGroupName').val(groupName);
               }
            }
        });

    });

    $('#btnGroupClose').click(function(){
        location.reload();
    });


    $(document).on("click","#btnDeleteGroup", function(){
		// get the id of adviser from button attribute
		var groupid = $(this).attr("group_id");
		
		swal({
            title: "Are you sure you want to delete this group?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Confirm",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                type: "POST",
                data: ({
					groupid: groupid
                }),
                url: "php/delete-group.php",
                success: function(results) {
                    swal({
                        title: "Deleted",
                        type: "success",
                    }, function () {
                        location.reload();
                    });					
                }
            });
        });
    });


    function getGroupUsers(groupId){
        $('#member-count').html("("+0+")");
        $('.membersList').html('');
        $.ajax({
            url: "php/get-group-users.php?groupid="+groupId,
            type: "GET",
            dataType: "json",
            success: function(data){
                $('#member-count').html("("+data.length+")");
                for(index in data){
                    $('.membersList').append(
                        "<li class='list-group-item'>"+data[index].lastname+", "+data[index].firstname+"<a style='float:right' groupUserId='"+data[index].user_id+"' groupId = '"+groupId+"' class='removeMember'>remove</a></li>"
                    );
                }
            }
        });
    }

    function getGroupAdviser(groupId){
        $.ajax({
            url: "php/get-assigned-adviser.php?groupid="+groupId,
            type: "GET",
            dataType: "json",
            success: function(data){
                if(data.id != 2)
                {  
                    $('.adviserList').html(
                        "<li class='list-group-item'>"+data.lastname+", "+data.firstname+"<li>"
                    );
                }
                else{
                    $('.adviserList').html(
                        "<li class='list-group-item'>No Adviser<li>"
                    );
                }
                
            }
        });
    }
});
$(document).ready(function(){
    var session_password = $('.session_password').html();
    $('#btn-change-password').click(function(){
        $('.change-password-modal').modal();
    });

    $('.btn-change-password').click(function(){
        
        $('.cp-error-message').html('');
        var currentPassword = $('.current-password').val();
        var newPassword = $('.new-password').val();
        var confirmPassword= $('.confirm-password').val();
        
        
        if(currentPassword == "" || newPassword == "" || confirmPassword == ""){
            $('.cp-error-message').html('*Please Fill Up All Fields');
        }
        else
        {
            if(currentPassword != session_password){
                $('.cp-error-message').html('*Your password is incorrect');
            }
            else
            {
                if ($('.new-password').val() != $('.confirm-password').val()) {
                    $('#message').html('Password Not Matched').css('color', 'red');
                }
                else
                {
                    
                    $.ajax({
                        url: "../php/update-user-password.php?password="+newPassword,
                        type: "GET",
                        dataType: "json",
                        success: function(data){
                            if(data == 'ok'){
                                alert("Password Updated");
                                location.reload()
                            }
                            else
                            {
                                alert("Password not Updated");
                                location.reload();
                            }
                            
                        },
                        error: function(err){
                            if(err.responseText == 'ok'){
                                alert("Password Updated");
                                location.reload()
                            }
                            else{
                                alert("Password not Updated");
                                location.reload();
                            }
                            console.log("error",err)
                        }
                    });
                
                }
            }
        }
    });

    //CHANGE PASSWORD VALIDATION
    $('.confirm-password').on('keyup', function () {
        if ($('.new-password').val() == $('.confirm-password').val()) {
          $('#message').html('Password Matched').css('color', 'green');
        } else 
          $('#message').html('Password Not Matched').css('color', 'red');
      });
});
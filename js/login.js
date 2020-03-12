
$(document).ready(function () {
    "use strict";
    var txtUname = $("#txtUname"),
	    txtPword = $("#txtPword"),
        txtUnameError = $("#txtUnameError"),
	    txtPwordError = $("#txtPwordError");

    $("#btnLogin").click(function () {
        $("form").on("submit", false);
        var success = 2;
        var flag = 5;

        // validate username
        if ($("#txtUname").val() === "") {
            txtUnameError.html("This field is required");
            $("#txtUname").addClass("form-error");

            $("#txtUname").focus(function () {
                $("#txtUname").removeClass("form-error");
                txtUnameError.html("");
            });
            success--;
        } else {
            txtUnameError.html("");
        }

        // validate password
        if(txtPword.val() === "") {
            txtPwordError.html("This field is required");
            $("#txtPword").addClass("form-error");

            $("#txtPword").focus(function() {
                $("#txtPword").removeClass("form-error");
                txtPwordError.html("");
            });	
            success--;
        } else {
            txtPwordError.html("");
        }

        //form successfully validated
        if(success == 2){
            $.ajax({
                type: "POST",
                data: {
                    uname: txtUname.val(),
                    pword: txtPword.val()
                },
                datatype: 'json',
                url: "php/login.php",
                success: function(results) {
//                    alert(results);
                    if (results == "Online") {
                        $("#formError").html("Account already logged in");
                        $("#txtPword").addClass("form-error");
                        $("#txtUname").addClass("form-error");
 
                        $("#txtUname").focus(function() {
                            $("#txtUname").removeClass("form-error");
                            $("#formError").html("");
                        });	

                        $("#txtPword").focus(function() {
                            $("#txtPword").removeClass("form-error");
                            $("#formError").html("");
                        });	

                    } else if (results == "") {
                        $("#formError").html("Invalid login credentials");
                        $("#txtPword").addClass("form-error");
                        $("#txtUname").addClass("form-error");

                        $("#txtUname").focus(function() {
                            $("#txtUname").removeClass("form-error");
                            txtUnameError.html("");
                        });	    

                        $("#txtPword").focus(function() {
                            $("#txtPword").removeClass("form-error");
                            txtPwordError.html("");
                        });	
                        
                    } else if (results == 6 ) {
                        window.location.href = "librarian/index.php"; 
                        flag --;  
                    }
                    else if (results == 1 ) {
                        window.location.href = "admin/index.php";
                        flag --;   
                    }  else if (results == 2 ) {
                        window.location.href = "programhead/index.php";
                        flag --;   
                    } else if (results == 3 ) {
                        window.location.href = "coordinator/statusreport.php";  
                        flag --; 
                    } else if (results == 4 ) {
                        window.location.href = "adviser/statusreport.php"; 
                        flag --;  
                    } else if (results == 5 ) {
                        window.location.href = "student/index.php";   
                        flag --;
                    }
                    
                }
            });
        }
    });
});

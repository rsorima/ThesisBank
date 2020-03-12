$(document).ready (function() {

//	var txtfname = $("#txtFirstname");
//	var txtlname = $("#txtLastname");
//	var txtuname = $("#txtUsername");
//	var txtpword = $("#txtPassword");

	var utype;
	var program;


	$("#Course").change(function(){
		program = $("#Course option:selected").attr("value");
		
    });
    $("#Utype").change(function(){
		utype = $("#Utype option:selected").attr("value");
		
	});
	
	$("#btnSubmit").click(function(){
		var txtfname = $("#txtFirstname").val();
        var txtlname = $("#txtLastname").val();
        var txtuname = $("#txtUsername").val();
        var txtpword = $("#txtPassword").val();
        var course = $("#Course").val();
        var usertype = $("#Utype").val();
        
        $("#form-user").on("submit",false);
        
		var success = 4;

		//validate first name
		if($("#txtFirstname").val()==""){
			$("#txtFirstnameError").html("This field is required");
			$("#txtFirstname").addClass("form-error");

			$("#txtFirstname").focus(function(){
				$("#txtFirstnameError").html("");
				$("#txtFirstname").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtFirstnameError").html("");
		}

		//validate last name
		if($("#txtLastname").val()==""){
			$("#txtLastError").html("This field is required");
			$("#txtLastname").addClass("form-error");

			$("#txtLastname").focus(function(){
				$("#txtLastError").html("");
				$("#txtLastname").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtLastError").html("");
		}

	

		//validate username
		if($("#txtUsername").val()==""){
			$("#txtUsernameError").html("This field is required");
			$("#txtUsername").addClass("form-error");

			$("#txtUsername").focus(function(){
				$("#UsernameError").html("");
				$("#txtUsername").removeClass("form-error");
			});
			success--;
		}	else {
				$("#UsernameError").html("");
		}

		//validate Usertype
		if($("#Utype option:selected").attr("value")=="0"){
			$("#UtypeError").html("This field is required");
			$("#Utype").addClass("form-error");

			$("#Utype").focus(function(){
				$("#UtypeError").html("");
				$("#Utype").removeClass("form-error");
			});
			success--;
		}	else {
				$("#UtypeError").html("");
		}

		//validate Courses
		if($("#Course option:selected").attr("value")=="0"){
			$("#CourseError").html("This field is required");
			$("#Course").addClass("form-error");

			$("#Course").focus(function(){
				$("#CourseError").html("");
				$("#Course").removeClass("form-error");
			});
			success--;
		}	else {
				$("#Courserror").html("");
		}

		//validate password
		if($("#txtPassword").val()==""){
			$("#txtPasswordError").html("This field is required");
			$("#txtPassword").addClass("form-error");

			$("#txtPassword").focus(function(){
				$("#txtPasswordError").html("");
				$("#txtPassword").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtPasswordError").html("");
		}

	
        
		if(success==4){
			$.ajax({
				type:"POST",
				data:{ 
                        fname: txtfname,
                        lname: txtlname,
                        uname: txtuname,
                        pword: txtpword,
                        course: course,
                        usertype: usertype,
                     },
				url: "php/insert-user.php",
				success: function(result){
                    alert(result);  
					$("#modalAddUser").modal("hide");
					$("#form-user")[0].reset();
                    location.replace("manage-user.php");
//                    location.reload();
//					swal ({
//						title: "Registered", 
//						type:  "success", 
//					}, function (){	
//                        
//					});
				}
			});
		}
	});

	// DELETE ADVISER
	$(document).on("click","#btnDelete", function(){
		// get the id of adviser from button attribute
		var userid = $(this).attr("userid");
		

		swal({
            title: "Are you sure you want to delete this user?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Confirm",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                type: "POST",
                data: ({
					userid: userid
                    
                }),
                url: "php/delete-user.php",
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

	// UPDATE
	$(document).on("click","#btnEdit", function(){
		
		// GET ATTRIBUTES
		userid=$(this).attr("userid");
		fname=$(this).attr("fname");
		lname=$(this).attr("lname");
		uname=$(this).attr("uname");
		pword=$(this).attr("pword");
		
		// SET VALUE
		$("#EFirstname").val(fname);
		$("#ELastname").val(lname);
		$("#EUsername").val(uname);
		$("#EPassword").val(pword);
		// SET ID TO BUTTON UPDATE
		$("#btnUpdate").attr("userid",userid);
		});

	$("#btnUpdate").click(function(){
        
        var editfname = $("#EFirstname");
        var editlname = $("#ELastname");
        var editusername = $("#EUsername");
        var editpassword = $("#EPassword");
		userid=$(this).attr("userid");

		var success = 4;

		
		if($("#EFirstname").val()==""){
			$("#EFirstnameError").html("This field is required");
			$("#EFirstname").addClass("form-error");

			$("#EFirstname").focus(function(){
				$("EFirstnameError").html("");
				$("#EFirstname").removeClass("form-error");
			});
			success--;
		}	else {
				$("#EFirstnameError").html("");
		}

		
		if($("#ELastname").val()==""){
			$("#ELastnameError").html("This field is required");
			$("#ELastname").addClass("form-error");

			$("#ELastname").focus(function(){
				$("#ELastnameError").html("");
				$("#ELastname").removeClass("form-error");
			});
			success--;
		}	else {
				$("#ELastnameError").html("");
		}

		if($("#EUsername").val()==""){
			$("#EUsernameError").html("This field is required");
			$("#EUsername").addClass("form-error");

			$("#EUsername").focus(function(){
				$("#EUsernameError").html("");
				$("#EUsername").removeClass("form-error");
			});
			success--;
		}	else {
				$("#EUsernameError").html("");
		}

		
		if($("#EPassword").val()==""){
			$("#EPasswordError").html("This field is required");
			$("#EPassword").addClass("form-error");

			$("#EPassword").focus(function(){
				$("#EPasswordError").html("");
				$("#EPassword").removeClass("form-error");
			});
			success--;
		}	else {
				$("#EPasswordError").html("");
		}
        alert("yawa");
		if(success==4){
            
			$.ajax({
				type:"POST",
				data:({
					editfname: editfname.val(),
					editlname: editlname.val(),
					editusername: editusername.val(),
					editpassword: editpassword.val(),
					userid: userid
				}),          
				url: "php/update-user.php",
				success: function(result){
					
                    location.replace("manage-user.php");
//                    swal ({
//						title: "Updated", 
//						type:  "success", 
//					}, function (){	
//                        
//					});
				}

			});
		}
	});

	//CHECKBOX SHOW PASSWORD
	$('#cbShowPassword').click(function () {

		$('#EPassword').attr('type', $(this).is(':checked') ? 'text' : 'password');
	})

});

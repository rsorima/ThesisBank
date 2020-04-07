$(document).ready (function() {

	var txtfname = $("#txtFirstname");
	var txtlname = $("#txtLastname");
	var txtuname = $("#txtUsername");
	var txtpword = $("#txtPassword");

	var editfname = $("#EFirstname");
	var editlname = $("#ELastname");
	var editusername = $("#EUsername");
	var editpassword = $("#EPassword");
	
	$("#btnSubmit").click(function(){
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
				data:({
					fname: txtfname.val(),
					lname: txtlname.val(),
					uname: txtuname.val(),
					pword: txtpword.val(),
					
				}),
				url: "php/insert-librarian.php",
				success: function(result){
					$("#modalAddUser").modal("hide");
					$("#form-user")[0].reset();
					swal ({
						title: "Success", 
						type:  "success", 
					}, function (){	
					//$("#form-user").hide();
					$("#tblLibrarian").DataTable().ajax.reload();
					})
				}
			})
		}
	});

	// DELETE
	$(document).on("click","#btnDelete", function(){
		// get the id from button attribute
		var userid = $(this).attr("userid");
		

		swal({
            title: "Are you sure you want to delete this Librarian?",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Confirm",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                type: "POST",
                data: ({
					userid: userid
                    
                }),
                url: "php/delete-librarian.php",
                success: function(results) {
                    swal({
                        title: "User deleted",
                        type: "success",
                    }, function () {
                        $("#tblLibrarian").DataTable().ajax.reload();
                    });					
                }
            });
        });
	});

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
		
		// UPDATE
	
		$("#btnUpdate").click(function(){
			
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
					url: "php/update-librarian.php",
					success: function(result){
						$("#modalEditUser").modal("hide");
						$("#form-edituser")[0].reset();
						swal ({
							title: "Success", 
							type:  "success", 
						}, function (){	
						$("#form-edituser").hide();
						$("#tblLibrarian").DataTable().ajax.reload();
						})
					}
	
				})
			}
		});

		// VIEW
		$(document).on("click","#btnView", function(){
		
			// GET ATTRIBUTES
			fname=$(this).attr("fname");
			lname=$(this).attr("lname");
			uname=$(this).attr("uname");
			pword=$(this).attr("pword");
			
			
			
			// SET VALUE
			$("#VFirstname").val(fname);
			$("#VLastname").val(lname);
			$("#VUsername").val(uname);
			$("#VPassword").val(pword);
			});

	//CHECKBOX SHOW PASSWORD
	$('#cbShowPassword').click(function () {

		$('#EPassword').attr('type', $(this).is(':checked') ? 'text' : 'password');
	})

});

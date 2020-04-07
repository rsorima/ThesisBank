$(document).ready (function() {

	var txtfname = $("#txtThesis");
	var txtlname = $("#txtAuthor");
	var txtuname = $("#txtUsername");
	
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

	

		if(success==4){
			$.ajax({
				type:"POST",
				data:({
					fname: txtfname.val(),
					lname: txtlname.val(),
					uname: txtuname.val(),
					pword: txtpword.val(),
					
				}),
				url: "php/insert-adviser.php",
				success: function(result){
					alert(result);
					$("#modalAddUser").modal("hide");
					$("#form-user")[0].reset();
					swal ({
						title: "Success", 
						type:  "success", 
					}, function (){	
					//$("#form-user").hide();
					$("#tblAdviser").DataTable().ajax.reload();
					})
				}
			})
		}
	});


});

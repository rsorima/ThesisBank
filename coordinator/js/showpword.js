$(document).ready (function() {
    
	//CHECKBOX SHOW PASSWORD
	$('#cbShowPassword2').click(function () {
		$('#EPassword').attr('type', $(this).is(':checked') ? 'text' : 'password');
	})

});

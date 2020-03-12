$(document).ready (function() {
    
	//DATA TABLE   
	$("#tblAdviser").DataTable({
		'paging'      : true,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : true,
		'info'        : false,
		'autoWidth'   : false,
		'responsive'  : true,
		"processing"  : true,
		"ajax"        : "php/fetch-adviser.php",
	});


	//DATA TABLE   
	$("#tblStudent").DataTable({
		'paging'      : true,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : true,
		'info'        : false,
		'autoWidth'   : false,
		'responsive'  : true,
		"processing"  : true,
		"ajax"        : "php/fetch-student.php",
	});
	
	$('#reports').DataTable({
		"ajax": {
			url: "php/fetch-documentation.php"
		}
	});


});
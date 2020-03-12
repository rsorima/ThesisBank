$(document).ready (function() {
    
	//DATA TABLE LIBRARIAN
	$("#tblLibrarian").DataTable({
		'paging'      : true,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : true,
		'info'        : false,
		'autoWidth'   : false,
		'responsive'  : true,
		"processing"  : true,
		"ajax"        : "php/fetch-librarian.php",
	});


	//DATA TABLE PROGRAM HEAD
	$("#tblProgramHead").DataTable({
		'paging'      : true,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : true,
		'info'        : false,
		'autoWidth'   : false,
		'responsive'  : true,
		"processing"  : true,
		"ajax"        : "php/fetch-programhead.php",
	});

	//DATA TABLE COORDINATOR
	$("#tblCoordinator").DataTable({
		'paging'      : true,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : true,
		'info'        : false,
		'autoWidth'   : false,
		'responsive'  : true,
		"processing"  : true,
		"ajax"        : "php/fetch-coordinator.php",
	});

	//DATA TABLE STUDENT
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

	//DATA TABLE Adviser
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

	

	


});
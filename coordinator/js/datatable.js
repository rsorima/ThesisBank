$(document).ready (function() {
    
	//DATA TABLE   
	$("#tblAdviser").DataTable({
		// 'paging'      : true,
		// 'lengthChange': false,
		// 'searching'   : true,
		// 'ordering'    : true,
		// 'info'        : false,
		// 'autoWidth'   : false,
		// 'responsive'  : true,
		// "processing"  : true,
		"ajax"        : "php/fetch-adviser.php",
	});


	//DATA TABLE   
	$("#tblStudent").DataTable({
		// 'paging'      : true,
		// 'lengthChange': false,
		// 'searching'   : true,
		// 'ordering'    : true,
		// 'info'        : false,
		// 'autoWidth'   : false,
		// 'responsive'  : true,
		// "processing"  : true,
		"ajax"        : "php/fetch-student.php",
	});

	$("#tblGroup").DataTable({
		 'paging'      : true,
		 'lengthChange': false,
		 'searching'   : true,
		 'ordering'    : true,
		 'info'        : false,
		 'autoWidth'   : false,
		 'responsive'  : true,
		 "processing"  : true,
		"ajax"        : {
         "url": "php/fetch-group.php",
            dataSrc = ""
        }
	});

	$("#tblJournalReports").DataTable({
		// 'paging'      : true,
		// 'lengthChange': false,
		// 'searching'   : true,
		// 'ordering'    : true,
		// 'info'        : false,
		// 'autoWidth'   : false,
		// 'responsive'  : true,
		// "processing"  : true,
		"ajax"        : "php/fetch-journal.php",
	});

	$("#tblStatusReports").DataTable({
		// 'paging'      : true,
		// 'lengthChange': false,
		// 'searching'   : true,
		// 'ordering'    : true,
		// 'info'        : false,
		// 'autoWidth'   : false,
		// 'responsive'  : true,
		// "processing"  : true,
		"ajax"        : "php/fetch-statusreport.php",
	});

	$("#tblManuscript").DataTable({
		// 'paging'      : true,
		// 'lengthChange': false,
		// 'searching'   : true,
		// 'ordering'    : true,
		// 'info'        : false,
		// 'autoWidth'   : false,
		// 'responsive'  : true,
		// "processing"  : true,
		"ajax"        : "php/fetch-manuscript.php",
	});

	$('#tblDocumentation').DataTable({
		"ajax": {
			url: "php/fetch-documentation.php"
		}
	});


});
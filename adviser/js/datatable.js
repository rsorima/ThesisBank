$(document).ready (function() {
	$("#tblJournalReports").DataTable({
		// 'paging'      : true,
		// 'lengthChange': false,
		// 'searching'   : true,
		// 'ordering'    : true,
		// 'info'        : false,
		// 'autoWidth'   : false,
		// 'responsive'  : true,
		// "processing"  : true,
		"ajax"        : {
			url: "php/fetch-journal.php"
		}
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
		"ajax"        : {
			url: "php/fetch-statusreport.php" 
		}
	});

	$("#tblManuscripts").DataTable({
		// 'paging'      : true,
		// 'lengthChange': false,
		// 'searching'   : true,
		// 'ordering'    : true,
		// 'info'        : false,
		// 'autoWidth'   : false,
		// 'responsive'  : true,
		// "processing"  : true,
		"ajax"        : {
			url: "php/fetch-manuscript.php"
		}
	});
/*
	$('#testTable').DataTable({
		// 'paging'	  	: true,
		// 'lengthChange'	: false,
		// 'searching'		: true,
		// 'ordering'		: true,
		// 'info'			: false,
		// 'autoWidth'		: false,
		// 'responsive'	: true,
		// 'processing'	: true,
		'ajax'			: {
			url: "php/fetch-manuscript.php"
		}
	});*/
	$('#tblDocumentation').DataTable({
		'ajax'			: {
			url: "php/fetch-documentation.php"
		}
	});

});
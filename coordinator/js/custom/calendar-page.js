$(document).ready(function(){
    var load =0;
	$('.btn-save-event').click(function(){
		var eventTitle = $('#event-title').val();
		var eventSummary = "Documentation";
		var dateStart =$('#event-date-start').val();
        var dateEnd =$('#event-date-end').val();
		var timeStart = $('#event-time-start').val()
		var timeEnd = $('#event-time-end').val()

		var isIncomplete = 
			eventTitle == "" ||
			eventSummary == "" ||
			dateStart == "" ||
            dateEnd == "" ||
			timeStart == "" ||
			timeEnd == "" ? true : false;
		if(isIncomplete)
		{
			$('#p-error').html('*Please fill up all fields');
            
            console.log(dateStart);
		}
		else
		{
			$('#p-error').html('');
            dateStart = dateStart+" "+timeStart;
            dateEnd = dateEnd+" "+timeEnd;
			$.ajax({
                    url: 'fetch/calendar-add-event.php',
                    data: 'title=' + eventTitle + '&desc='+eventSummary+'&start=' + dateStart + '&end=' + dateEnd,
                    type: "POST",
                    success: function (data) {
                        //displayMessage("Added Successfully");
                        location.reload();
                    }
                });
			// var events = {
			// 	"event-title" : eventTitle,
			// 	"event-summary" : eventSummary,
			// 	"event-date" : eventDate,
			// 	"time-start" : timeStart,
			// 	"time-end" : timeEnd
			// };

			// var jsonString = JSON.stringify(events);
			// $.ajax({
			// 	type: "POST",
			// 	url: "fetch/add-event.php",
			// 	data: {data : jsonString}, 
			// 	cache: false,

			// 	success: function(data){
			// 		console.log(data);
			// 		location.reload();
			// 	}
			// });

			console.log(events);
		}
	});

	$.ajax({
		url: "fetch/calendar-event.php",
		type: "GET",
		dataType: "json",
		success: function(data){
			console.log(data.result)
        },
        error: function(err){
            console.log(err.responseText)
        }
	});


	var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "fetch/calendar-event.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
        },
        selectable: true,
        selectHelper: true,
        select: function (Start, End, allDay) {

            // var title = prompt('Event Title:');

            // if (title) {
            //     var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            //     var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
            //     console.log("start",start); 
            //     $.ajax({
            //         url: 'fetch/calendar-add-event.php',
            //         data: 'title=' + title + '&start=' + start + '&end=' + end,
            //         type: "POST",
            //         success: function (data) {
            //             //displayMessage("Added Successfully");
            //         }
            //     });
            //     calendar.fullCalendar('renderEvent',
            //             {
            //                 title: title,
            //                 start: start,
            //                 end: end,
            //                 allDay: allDay
            //             },
            //     true
            //             );
            // }

            // calendar.fullCalendar('unselect');
        },
        
        editable: true,
        // eventDrop: function (event, delta) {
        //             var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
        //             var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
        //             $.ajax({
        //                 url: 'edit-event.php',
        //                 data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
        //                 type: "POST",
        //                 success: function (response) {
        //                     displayMessage("Updated Successfully");
        //                 }
        //             });
        //         },
        eventClick: function (event) {
            getEvent(event.id);
            // var deleteMsg = confirm("Do you really want to delete?");
            // if (deleteMsg) {
            //     $.ajax({
            //         type: "POST",
            //         url: "delete-event.php",
            //         data: "&id=" + event.id,
            //         success: function (response) {
            //             if(parseInt(response) > 0) {
            //                 $('#calendar').fullCalendar('removeEvents', event.id);
            //                 displayMessage("Deleted Successfully");
            //             }
            //         }
            //     });
            // }
        }

    });

    function getEvent(id){

        $.ajax({
            url: "fetch/get-event-by-id.php?id="+id,
            type: "GET",
            dataType: "json",
            success: function(data){
                console.log("getEvent",data.result)
                $('.modal-title').html('Event Detail');
                $('#p-eventId').html(id);
                $('#event-title').val(data.result[0].eventTitle);
                $('#event-summary').val(data.result[0].eventSummary);
                var start = data.result[0].start.split(' ');
                $('#event-date-start').val(start[0]);
                $('#event-time-start').val(start[1]);
                var end = data.result[0].end.split(' ');
                $('#event-date-end').val(end[0]);
                $('#event-time-end').val(end[1]);
                $('#event-title').prop('disabled', true);
                $('#event-summary').prop('disabled', true);
                $('#event-date-start').prop('disabled', true);
                $('#event-time-start').prop('disabled', true);
                $('#event-date-end').prop('disabled', true);
                $('#event-time-end').prop('disabled', true);

                $('.btn-save-event').prop('hidden', true);
                $('.btn-update-event').prop('hidden', false);
                $('.btn-delete-event').prop('hidden', false);
            }
        });

        $('#add-new-event').modal();
    }

    $('.btn-open-event-modal').click(function(){
        $('.btn-update-event').prop('hidden', true);
        $('.btn-save-event').prop('hidden', false);
        $('.btn-delete-event').prop('hidden', true);
    });


    $('.btn-update-event').click(function(){
        load++;

        if(load == 1){
            $('#event-title').prop('disabled', false);
            $('#event-summary').prop('disabled', false);
            $('#event-date-start').prop('disabled', false);
            $('#event-time-start').prop('disabled', false);
            $('#event-date-end').prop('disabled', false);
            $('#event-time-end').prop('disabled', false);
        }  
        else
        {
            var eventTitle = $('#event-title').val();
            var eventSummary = $('#event-summary').val();
            var dateStart =$('#event-date-start').val();
            var dateEnd =$('#event-date-end').val();
            var timeStart = $('#event-time-start').val()
            var timeEnd = $('#event-time-end').val()

        var isIncomplete = 
            eventTitle == "" ||
            eventSummary == "" ||
            dateStart == "" ||
            dateEnd == "" ||
            timeStart == "" ||
            timeEnd == "" ? true : false;
        if(isIncomplete)
        {
            $('#p-error').html('*Please fill up all fields');
            
            console.log(dateStart);
        }
        else
        {
            $('#p-error').html('');
            var eventId = $('#p-eventId').html();
            dateStart = dateStart+" "+timeStart;
            dateEnd = dateEnd+" "+timeEnd;
            $.ajax({
                    url: 'fetch/update-event.php',
                    data: 'id='+eventId+'&title=' + eventTitle + '&desc='+eventSummary+'&start=' + dateStart + '&end=' + dateEnd,
                    type: "POST",
                    success: function (data) {
                        //displayMessage("Added Successfully");
                        alert("event updated");
                        location.reload();
                    },
                    error: function(){
                        alert("Update error");
                        location.reload();
                    }
                });
            // var events = {
            //  "event-title" : eventTitle,
            //  "event-summary" : eventSummary,
            //  "event-date" : eventDate,
            //  "time-start" : timeStart,
            //  "time-end" : timeEnd
            // };

            // var jsonString = JSON.stringify(events);
            // $.ajax({
            //  type: "POST",
            //  url: "fetch/add-event.php",
            //  data: {data : jsonString}, 
            //  cache: false,

            //  success: function(data){
            //      console.log(data);
            //      location.reload();
            //  }
            // });

        }
        } 
    });

    $('.btn-delete-event').click(function(){
        var eventId = $('#p-eventId').html();
        var deleteMsg = confirm("Do you really want to delete this event?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "fetch/delete-event.php",
                    data: "id=" + eventId,
                    success: function (response) {
                        if(response != ''){
                            alert("Event Deleted");
                        }   alert("NOTICE! Some students may have passed requirement on this event");                                                     
                            location.reload();
                    }
                });
            }
    });
});
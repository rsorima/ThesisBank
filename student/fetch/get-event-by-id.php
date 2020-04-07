<?php
	include('../../config/connectdb.php');
	$id = $_GET['id'];
	$get_event = "SELECT id, title, Description, start,end from events where id='$id'";
	$result = mysqli_query($con, $get_event);

	if(mysqli_num_rows($result) > 0){
		$i = 0;
		while($row = $result -> fetch_assoc()){
			$eventId = $row['id'];
			$eventSummary = $row['Description'];
			$eventTitle = $row['title'];
			$start = $row['start'];
			$end = $row['end'];

			$events[$i] = array(
				'eventId' => $eventId,
				'eventSummary' => $eventSummary,
				'eventTitle' => $eventTitle,
				'start' => $start,
				'end' => $end
				);
			
			$i++;
		}

		$apiResult = array(
		'statusCode' => '200',
		'message' => 'Events Found',
		'result' => $events
		);
	}
	else
	{
		$apiResult = array(
		'statusCode' => '400',
		'message' => 'No Events Found',
		'result' => null
		);
	}
	
	echo json_encode($apiResult);
?>
<?php
	include('../../config/connectdb.php');

	$events = json_decode($_POST['data']);

	 $i =0;
	 foreach($events as $data){
	     $event_details[$i] = $data;
	     $i++;
	 }

	$add_event = "INSERT INTO events (eventTitle, eventSummary, eventDate, timeStart, timeEnd,) values ('$event_details[0]', '$event_details[1]','$event_details[2]','$event_details[3]','$event_details[4]')";

	$result = mysqli_query($con, $add_event);

	if($result){
		$apiResult = array(
			'statusCode' => '200',
			'message' => 'event added',
			'result' => $event_details
			);
	}else{
	 	$apiResult = array(
			'statusCode' => '400',
			'message' => 'event not added',
			'result' => null
			);
	}
	echo json_encode($apiResult);
?>
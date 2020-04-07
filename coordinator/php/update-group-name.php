<?php
    include("../../config/connectdb.php");

    $groupid = $_GET['groupid'];
    $groupname = $_GET['name'];

    $update = "UPDATE groups set name = '$groupname' where id='$groupid' ";
    $result = mysqli_query($con, $update);

    if($result){
		$apiResult = array(
			'statusCode' => '200',
			'message' => 'Group Updated'
			);
	}else{
	 	$apiResult = array(
			'statusCode' => '400',
			'message' => 'Group Update Error'
			);
    }

    echo json_encode($apiResult);

?>
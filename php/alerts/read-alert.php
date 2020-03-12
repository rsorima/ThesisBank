<?php
    session_start();
    include("../../config/connectdb.php");

    $alertid = $_GET['id'];

    $read_alert = "UPDATE alerts set isRead = 1 where alertId = '$alertid'";
    $get_result = mysqli_query($con, $read_alert);

    if($get_result){
        $apiResult = array(
            "code" => 200
        );
    }else{
        $apiResult = array(
            "code" => 400
        );
    }

    echo json_encode($apiResult);
?>
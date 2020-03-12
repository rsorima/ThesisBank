<?php
    session_start();
    include("../../config/connectdb.php");
    $branchid = $_SESSION['branchid'];

    $alertType = $_GET['type'];
    $message = $_GET['message'];
    $dynamicId = $_GET['dynamicId'];
    $link = $_GET['link'];
    $save_details = "INSERT into alert_details (alertType, message, dynamicId, branchid, link) values ('$alertType','$message','$dynamicId','$branchid','$link')";
    $result = mysqli_query($con, $save_details);

    if($result)
    {
        $alertDetailId = mysqli_insert_id($con);

        $get_students = "SELECT userid from users where usertype = 5 and branchid = '$branchid'";
        $get_result = mysqli_query($con, $get_students);

        if(mysqli_num_rows($get_result) > 0){
            while($row = $get_result -> fetch_assoc()){
                $userId = $row['userid'];

                $send_alert = "INSERT into alerts (alertDetailsId, userId) values ('$alertDetailId', '$userId')";
                $send_result = mysqli_query($con, $send_alert);

                if($send_result)
                {
                    $apiResult = array(
                        "code" => 200,
                        "message" => "Alert sent"
                    );
                }
                else{
                    $apiResult = array(
                        "code" => 400,
                        "message" => "Alert not sent"
                    );
                }
            }
        }
    }
    else
    {
        $apiResult = array(
            "code" => 400,
            "message" => "Alert Details not save"
        );
    }

    echo json_encode($apiResult);

?>
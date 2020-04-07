<?php
session_start();
include("../../config/connectdb.php");

$link = $_GET['link'];
$title = $_GET['title'];

$branchid=$_SESSION['branchid'];
$userid = $_SESSION['uid'];
$adviser_id = "";
$getGroup = "SELECT group_id from group_users where user_id = '$userid'";
$resultGroup = mysqli_query($con, $getGroup);
$report_type = 'Manuscript';

if(mysqli_num_rows($resultGroup) > 0){
    while($row_group = $resultGroup -> fetch_assoc()){
        $group_id = $row_group['group_id'];
    }

    $get_group_detail = "SELECT adviser_id from groups where group_id = '$group_id'";
    $resultGroupDetail = mysqli_query($con, $get_group_detail);

    if(mysqli_num_rows($resultGroupDetail) > 0){
        while($row_group_detail = $resultGroupDetail -> fetch_assoc()){
            $adviser_id = $row_group_detail['adviser_id'];
        }
    }

    $sendReport = "INSERT INTO reports (group_id, adviser_id, report_type, shareable_link,file_name) VALUES ('$group_id', '$adviser_id','$report_type', '$link', '$title' )";
    $resultReport = mysqli_query($con, $sendReport);

    if($resultGroup)
    {
        $alertType = "report";
        $message = "A group sent a ".$report_type.". Check them now!";
        $url_link ="manuscript.php";
        $save_details = "INSERT into alert_details (alertType, message, link) values ('$alertType','$message','$url_link')";
        $alert_detail_result = mysqli_query($con, $save_details);

        $alertDetailId = mysqli_insert_id($con);

        $send_alert = "INSERT into alerts (alertDetailsId, userId) values ('$alertDetailId', '$adviser_id')";
        $send_result = mysqli_query($con, $send_alert);

        $api = array (
            "code" => 200
        );
    }
    else
    {
        $api = array (
            "code" => 400
        );
    }

    echo json_encode($api);
}
?>
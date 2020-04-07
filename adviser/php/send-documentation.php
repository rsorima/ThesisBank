<?php
session_start();
include("../../config/connectdb.php");

$branchid = $_SESSION['branchid'];
$reportId = $_GET['reportId'];

$getDocu = "SELECT group_id, adviser_id, coordinator_id, report_file, report_type from documentation where documentation_id = '$reportId'";
$resultReports = mysqli_query($con, $getDocu);

if(mysqli_num_rows($resultReports) > 0){
    while($row = $resultReports -> fetch_assoc()){
        $groupId = $row['group_id'];
        $adviserId = $row['adviser_id'];
        $coordinatorId = $row['coordinator_id'];
        $reportFile = $row['report_file'];
        $reportType = $row['report_type'];
    }
}

$getCoordinator = "SELECT userid from users where usertype = '0' and branchid = '$branchid'";
$result = mysqli_query($con, $getCoordinator);

if(mysqli_num_rows($result) > 0){
    while($row = $result -> fetch_assoc()){
        $coordinatorId = $row['userid'];
    }
}

$addReport = "INSERT INTO documentation (group_id, adviser_id, coordinator_id, report_file, report_type) VALUES ('$groupId','$adviserId','$coordinatorId','$reportFile','$reportType')";
$resultAddReport = mysqli_query($con, $addReport);

if($resultAddReport)
{
    $alertType = "report";
    $message = "An Adviser sent a ".$reportType.". Check them now!";
    $link = $reportType == "Status Report" ? "statusreport.php" : "journalreport.php";
    $save_details = "INSERT into alert_details (alertType, message, link) values ('$alertType','$message','$link')";
    $alert_detail_result = mysqli_query($con, $save_details);

    $alertDetailId = mysqli_insert_id($con);

    $send_alert = "INSERT into alerts (alertDetailsId, userId) values ('$alertDetailId', '$coordinatorId')";
    $send_result = mysqli_query($con, $send_alert);

    $api = array(
        "code" => 200
    );
}
else
{
    $api = array(
        "code" => 400
    );
}

echo json_encode($api);
?>
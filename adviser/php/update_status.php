<?php
    include("../../config/connectdb.php");

    $groupid = $_GET['groupid'];
    $groupname = $_GET['name'];
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $page_type = $_GET['pageid'];
        $action = $_GET['action'];
        
<<<<<<< HEAD

        
        if($action == 'a') {
            $update = "UPDATE report set status = 3 where id=$id ";
            $type = "APPROVED";
        }else {
            $update = "UPDATE report set status = 2 where id=$id ";
            $type = "REJECTED";
        }
        $event_sql = "SELECT r.event_id, e.id, e.title"
        $alertType = "report";
        $message = "Your Adviser ".$type." your submission on . Check them now!";
        $link = $type == "Status Report" ? "statusreport.php" : "journalreport.php";
        $save_details = "INSERT into alert_details (alertType, message, link) values ('$alertType','$message','$link')";
        $alert_detail_result = mysqli_query($con, $save_details);

        $alertDetailId = mysqli_insert_id($con);

        $send_alert = "INSERT into alerts (alertDetailsId, userId) values ('$alertDetailId', '$adviser_id')";
        $send_result = mysqli_query($con, $send_alert);
=======
        if($action == 'a') {
            $update = "UPDATE report set status = 3 where id=$id ";
        }else {
            $update = "UPDATE report set status = 2 where id=$id ";
        }
>>>>>>> 7f121b9ca794dc78f6f5eac497dfd4fbf3fbc482
        
        $result = mysqli_query($con, $update);
        if($page_type == 1) {
            header("location:../statusreport.php");
        }else {
            header("location:../journalreport.php");
        }
    }

?>
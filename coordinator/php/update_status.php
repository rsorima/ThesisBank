<?php
    include("../../config/connectdb.php");
    session_start();
    $uid = $_SESSION['uid'];
    $course = $_SESSION['course'];

    $adviser_sql = "SELECT * FROM users WHERE id = $uid";
    $adviser_res = mysqli_query($con, $adviser_sql);
    $adviser = mysqli_fetch_assoc($adviser_res);
    $adviser_name = $adviser['firstname'] . " " . $adviser['lastname'];

    $coor_sql = "SELECT * FROM users WHERE program = $course AND role = 2";
    $coor_res = mysqli_query($con, $coor_sql);
    $coor = mysqli_fetch_assoc($coor_res);
    $coor_id = $coor['id'];

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $page_type = $_GET['pageid'];
        $action = $_GET['action'];
          
        if($action == 'a') {
            $update = "UPDATE report set status = 4 where id=$id ";
            $type = "APPROVED";
        }else {
            $update = "UPDATE report set status = 7 where id=$id ";
            $type = "REJECTED";
        }
        $result = mysqli_query($con, $update);
        
        $event_sql = "SELECT r.event_id, r.group_id, r.id, e.id, e.Description, e.title FROM report r LEFT JOIN events e on r.event_id = e.id WHERE r.id = $id";
        $events = mysqli_query($con, $event_sql);
        $res = mysqli_fetch_assoc($events);
        echo $event_sql;
        
        $group_mem_sql = "SELECT * FROM groups WHERE id = ".$res['group_id']."";
        echo $group_mem_sql;
        $group_mems = mysqli_query($con, $group_mem_sql);
        while($mem_row = mysqli_fetch_assoc($group_mems)) {
            $alertType = "report";
            $message = "The Coordinator ".$type." your submission on ".$res['title']." - ".$res['Description']." of ".$mem_row['name'].". Check them now!";
            $link = "documentation.php";
            $save_details = "INSERT into alert_details (alertType, message, link) values ('$alertType','$message','$link')";
            $alert_detail_result = mysqli_query($con, $save_details);
            $alertDetailId = mysqli_insert_id($con);

            $send_alert = "INSERT into alerts (alertDetailsId, userId) values ('$alertDetailId', ".$mem_row['adviser'].")";
            $send_result = mysqli_query($con, $send_alert);
        }
        
        if($page_type == 1) {
            header("location:../statusreport.php");
        }else if($page_type == 2) {
            header("location:../journalreport.php");
        }else if($page_type == 3) {
            header("location:../documentation.php");
        }
        
        if($type == "APPROVED") {
            $alertType = "report";
            $message = $adviser_name ." Submitted ".$res['title']." - ".$res['Description']." . Check them now!";
            $link = "documentation.php";
            $save_details = "INSERT into alert_details (alertType, message, link) values ('$alertType','$message','$link')";
            $alert_detail_result = mysqli_query($con, $save_details);
            $alertDetailId = mysqli_insert_id($con);

            $send_alert = "INSERT into alerts (alertDetailsId, userId) values ('$alertDetailId', ".$coor_id.")";
            $send_result = mysqli_query($con, $send_alert);
        }
    }

?>
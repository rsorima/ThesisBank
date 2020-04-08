<?php
    include("../../config/connectdb.php");
    session_start();
    $uid = $_SESSION['uid'];
    $course = $_SESSION['course'];

    $adviser_sql = "SELECT * FROM users WHERE id = $uid";
    $adviser_res = mysqli_query($con, $adviser_sql);
    $adviser = mysqli_fetch_assoc($adviser_res);
    $adviser_name = $adviser['firstname'] . " " . $adviser['lastname'];

    $coor_sql = "SELECT * FROM users WHERE role = 6";
    $coor_res = mysqli_query($con, $coor_sql);
    $coor = mysqli_fetch_assoc($coor_res);
    $coor_id = $coor['id'];

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $update = "UPDATE report set status = 6 where id=$id ";
        $result = mysqli_query($con, $update);
        
        $event_sql = "SELECT r.event_id, r.group_id, r.id, e.id, e.Description, r.date_created, r.report_filename, r.report_title FROM report r LEFT JOIN events e on r.event_id = e.id WHERE r.id = $id";
        $events = mysqli_query($con, $event_sql);
        $res = mysqli_fetch_assoc($events);
//        echo $event_sql;
        $pdf_file = $res['report_filename'];
        $t_title = $res['report_title'];
        $t_year = strtotime($res['date_created']);
        $t_year = date('Y', $t_year);
        
        $insert = "INSERT INTO thesis_table (course, thesis_name, thesis_pdf_file, thesis_year, date_created) values ($course, '$t_title', '$pdf_file', '$t_year', now())";
//        echo $insert;
        mysqli_query($con, $insert);
        
        $alertType = "report";
        $message = $adviser_name ." archived ".$res['report_title']." - ".$res['Description']." . Check them now!";
        $link = "index.php";
        $save_details = "INSERT into alert_details (alertType, message, link) values ('$alertType','$message','$link')";
//        echo $save_details;
        $alert_detail_result = mysqli_query($con, $save_details);
        $alertDetailId = mysqli_insert_id($con);

        $send_alert = "INSERT into alerts (alertDetailsId, userId) values ('$alertDetailId', ".$coor_id.")";
        $send_result = mysqli_query($con, $send_alert);
//        echo $send_alert;
        header("location:../documentation.php");

    }

?>
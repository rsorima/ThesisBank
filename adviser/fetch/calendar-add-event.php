<?php
    include('../../config/connectdb.php');
    session_start();
    $title = isset($_POST['title']) ? $_POST['title'] : "";
    $start = isset($_POST['start']) ? $_POST['start'] : "";
    $end = isset($_POST['end']) ? $_POST['end'] : "";
    $desc = isset($_POST['desc']) ? $_POST['desc'] : "";

    $course = $_SESSION['branchid'];
    $sem = $_SESSION['sem'];
    $uid = $_SESSION['uid'];

    $sqlInsert = "INSERT INTO events (Title,Start,End, Description,sem, course, event_type, user_id) VALUES ('".$title."','".$start."','".$end ."','".$desc."', $sem, $course, 2, $uid)";
    //echo $sqlInsert;
    $result = mysqli_query($con, $sqlInsert);
    
    $group_sql = "SELECT * FROM groups WHERE adviser = $uid";
    $group_res = mysqli_query($con, $group_sql);
    while($groups = mysqli_fetch_assoc($group_res)) {
        
        $group_mem_sql = "SELECT * FROM group_members WHERE group_id = ".$groups['id']."";
        $group_mems = mysqli_query($con, $group_mem_sql);
        
        while($mem_row = mysqli_fetch_assoc($group_mems)) {
            $alertType = "report";
            $message = "Your Adviser created a ".$desc." DEADLINE ON ".$end.". Check them now!";
            $link = "upload-a-file.php";
            $save_details = "INSERT into alert_details (alertType, message, link) values ('$alertType','$message','$link')";
            $alert_detail_result = mysqli_query($con, $save_details);
            $alertDetailId = mysqli_insert_id($con);

            $send_alert = "INSERT into alerts (alertDetailsId, userId) values ('$alertDetailId', ".$mem_row['user_id'].")";
            $send_result = mysqli_query($con, $send_alert);
        }
    }

    if (! $result) {
        $result = mysqli_error($conn);
    }
?>
<?php

	require_once("../../config/connectdb.php");
    session_start();
    $userID = $_SESSION['uid'];
    $course = $_SESSION['course'];
    $type = $_GET['type'];
    $output = "";
    $report_type = "";
    $sem = $_SESSION['sem'];
    if($type == "1") {
        $report_type = "Status Report";
        $sql = "SELECT e.title, e.id as eid, e.Description, e.start, gm.user_id, g.name, e.user_id AS Adviser FROM events e JOIN group_members gm on gm.user_id = $userID JOIN groups g ON g.id = gm.group_id WHERE e.user_id = g.adviser AND e.course = $course AND e.Description = '$report_type' ORDER BY start ASC";
    }else if($type == "2") {
        $report_type = "Journal Report";
        $sql = "SELECT e.title, e.id as eid, e.Description, e.start, gm.user_id, g.name, e.user_id AS Adviser FROM events e JOIN group_members gm on gm.user_id = $userID JOIN groups g ON g.id = gm.group_id WHERE e.user_id = g.adviser AND e.course = $course AND e.Description = '$report_type' ORDER BY start ASC";
    }else if($type == "3") {
        $report_type = "Documentation";
        $coordinator_sql = "SELECT id FROM users WHERE role = 3 AND sem = $sem AND program = $course";
        $coordinator_res = mysqli_query($con, $coordinator_sql);
        $coor_row = mysqli_fetch_assoc($coordinator_res);
        $coor_id = $coor_row['id'];
        
        $sql = "SELECT e.title, e.id as eid, e.Description, e.start, gm.user_id, g.name, e.user_id AS Adviser FROM events e JOIN group_members gm on gm.user_id = $userID JOIN groups g ON g.id = gm.group_id WHERE e.user_id = $coor_id AND e.course = $course AND e.Description = '$report_type' ORDER BY start ASC";
    }

    

//    echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
//    if($type != 3) {
        foreach ($stmt	as $row) {
            $output .= "<option value=".$row['eid'].">" .$row['title'].  "</option>";
        }
//    }else {
//            $output .= "<option value=".$row["eid"].">" .$row["title"].  "</option>"
//    }
    echo json_encode($output);
?>
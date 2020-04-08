<?php

	require_once("../../config/connectdb.php");
    session_start();
    $userID = $_SESSION['uid'];
    $course = $_SESSION['course'];
    $group_id = $_GET['groupid'];
    $output = "";
    $report_type = "";
    $sem = $_SESSION['sem'];

    $sql = "SELECT * FROM report WHERE group_id = $group_id AND report_type = 3";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    $output = $row['report_title'];

    echo json_encode($output);
?>
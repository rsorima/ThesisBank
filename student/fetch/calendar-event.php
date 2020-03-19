<?php
    include('../../config/connectdb.php');
    session_start();

    $json = array();    
    $sem = $_SESSION['sem'];
    $userid = $_SESSION['uid'];
    $course = $_SESSION['course'];    
    $sqlQuery = "SELECT * FROM events where sem = $sem ORDER BY id"; // to be replaced by the to do number 1 on student role.
    // $sqlQuery = "SELECT e.title FROM events e JOIN group_members gm ON gm.user_id = 13 JOIN groups g ON g.id = gm.group_id where e.sem = $sem AND e.course = $course AND;
    //   e.user_id = $userid OR e.user_id =5"; 
    $result = mysqli_query($con, $sqlQuery);
    $eventArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($eventArray, $row);
    }
    mysqli_free_result($result);

    mysqli_close($con);
    echo json_encode($eventArray);
?>
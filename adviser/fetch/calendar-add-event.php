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

if (! $result) {
    $result = mysqli_error($conn);
}
?>
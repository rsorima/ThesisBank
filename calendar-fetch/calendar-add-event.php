<?php
include('../config/connectdb.php');

$title = isset($_POST['title']) ? $_POST['title'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";
$desc = isset($_POST['desc']) ? $_POST['desc'] : "";

$sqlInsert = "INSERT INTO events (Title,Start,End, Description) VALUES ('".$title."','".$start."','".$end ."','".$desc."')";

$result = mysqli_query($con, $sqlInsert);

if (! $result) {
    $result = mysqli_error($conn);
}
?>
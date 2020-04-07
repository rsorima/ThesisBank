<?php
include('../../config/connectdb.php');

$id = isset($_POST['id']) ? $_POST['id'] : "";
$title = isset($_POST['title']) ? $_POST['title'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";
$desc = isset($_POST['desc']) ? $_POST['desc'] : "";

$sqlUpdate = "UPDATE events set title = '$title',Description = '$desc', start = '$start', end = '$end' where id = '$id'";

$result = mysqli_query($con, $sqlUpdate);

if (! $result) {
    $result = mysqli_error($con);
}
?>
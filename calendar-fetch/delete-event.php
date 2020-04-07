<?php
include('../config/connectdb.php');

$id = isset($_POST['id']) ? $_POST['id'] : "";

$sqlDelete = "DELETE from events where id = '$id'";

$result = mysqli_query($con, $sqlDelete);

if (! $result) {
    $result = mysqli_error($con);
}
?>
<?php
include("../../config/connectdb.php");

$groupid = $_POST['groupid'];

$deleteGroup = "DELETE from groups where id = '$groupid'";
$result = mysqli_query($con, $deleteGroup);
?>
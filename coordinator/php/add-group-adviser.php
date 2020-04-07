<?php
    session_start();
    include("../../config/connectdb.php");
    //$branchid = $_SESSION['branchid'];
    $userId = $_GET['userId'];
    $groupId = $_GET['groupId'];

    $add_group_adviser = "UPDATE groups set adviser = '$userId' where id = '$groupId'";

    $result = mysqli_query($con, $add_group_adviser);

    if($result){
        $apiResult = array(
            'code' => 200,
            'message' => 'added'
        );
    }
    else{
        $apiResult = array(
            'code' => 400,
            'message' => 'add error'
        );
    }

    echo json_encode($apiResult);
?>
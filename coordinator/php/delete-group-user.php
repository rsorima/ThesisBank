<?php
    session_start();
    include("../../config/connectdb.php");

    $groupuserid = $_GET['id'];
    $remove_group_user = "DELETE from group_members where user_id = '$groupuserid'";
    echo $remove_group_user;
    $result = mysqli_query($con, $remove_group_user);

    if($result){
        $apiResult = array(
            'code' => 200,
            'message' => 'deleted'
        );
    }
    else{
        $apiResult = array(
            'code' => 400,
            'message' => 'delete error'
        );
    }
    echo json_encode($apiResult);
?>
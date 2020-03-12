<?php
    session_start();
    include("../../config/connectdb.php");

    $groupid = $_GET['groupid'];
    $get_group_users = "SELECT gu.id, gu.user_id, gu.group_id, u.firstname, u.lastname from group_members gu inner join users u on gu.user_id = u.id where gu.group_id = '$groupid'";
//    echo $get_group_users;
    $result = mysqli_query($con, $get_group_users);
    $output = [];
	if(mysqli_num_rows($result) > 0){
        $i = 0;
        while($row = $result -> fetch_assoc())
        {
            $output[$i] = $row;
            $i++;
        }
    }
    echo json_encode($output);
?>
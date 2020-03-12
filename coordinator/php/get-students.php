<?php
    session_start();
    include("../../config/connectdb.php");
    $branchid = $_SESSION['branchid'];

    $get_students = "SELECT * from users where role = 5 and program = '$branchid'";

    $result = mysqli_query($con, $get_students);
    $output = [];
	if(mysqli_num_rows($result) > 0){
        $i = 0;
        while($row = $result -> fetch_assoc())
        {
            $output[$i] = $row;
            $i++;
        }
        echo json_encode($output);
    }
?>
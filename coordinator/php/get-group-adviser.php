<?php
    session_start();
    include("../../config/connectdb.php");
    $branchid = $_SESSION['branchid'];

    $get_advisers = "SELECT * from users where role = 4 and program = $branchid";
//    echo $get_advisers;
    $result = mysqli_query($con, $get_advisers);
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
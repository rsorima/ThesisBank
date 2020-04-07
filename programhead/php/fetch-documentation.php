<?php
/*
session_start();
include("../../config/connectdb.php");
//$branchid = $_SESSION['branchid'];
/*
$get_group = "SELECT g.group_name, g.branchid as branch_id, d.report_file, d.report_type, d.date_created FROM groups g INNER JOIN documentation d on g.group_id = d.group_id WHERE branchid = '$branchid' AND programhead_id != 0";*/
$get_group = "SELECT g.name, g.id as branch_id, d.report_filename, d.report_type, d.date_created FROM groups g INNER JOIN report d on g.id = d.group_id WHERE branchid = '$branchid' AND report_type = 3";
/*

$result = mysqli_query($con, $get_group);

$output['data'][] = [];
if(mysqli_num_rows($result) > 0){
    while($row = $result -> fetch_assoc())
    {

        $file = $row['report_file'];
        $rows[0] = $row['group_name'];
        $rows[1] = $row['report_type'];
        $rows[2] = "<a id='checkFile'>check</a> |<a class='btn btn-xs btn-primary btn-table' href='../student/".$file."' download>View</a>";
        $rows[3] = $row['date_created'];
        $rows[4] = "<a class='btn btn-xs btn-primary btn-table' id='sendtoProgramHead'>Send</a>";
        if($row['branch_id'] == $branchid){
            $output['data'][] = $rows;
        }	
    }
    echo json_encode($output);
}
*/


?>
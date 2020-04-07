<?php
session_start();
include("../../config/connectdb.php");
$branchid = $_SESSION['branchid'];

$get_group = "SELECT g.group_name, g.branchid as branch_id, r.report_file, r.report_type FROM groups g INNER JOIN reports r on g.group_id = r.group_id WHERE branchid = '$branchid' AND coordinator_id = 0";

$result = mysqli_query($con, $get_group);

$output['data'][] = [];
if(mysqli_num_rows($result) > 0){
    while($row = $result -> fetch_assoc())
    {

        $file = $row['report_file'];
        $rows[0] = $row['group_name'];
        $rows[1] = $row['report_type'];
        $rows[2] = "<a id='checkFile'>check</a> |<a class='btn btn-xs btn-primary btn-table' href='../student/".$file."' download>View</a>";
        if($row['branch_id'] == $branchid){
            $output['data'][] = $rows;
        }		
        
    }
    echo json_encode($output);
}

?>
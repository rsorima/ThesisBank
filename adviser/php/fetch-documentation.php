<?php
session_start();
include("../../config/connectdb.php");
$branchid = $_SESSION['branchid'];

$get_group = "SELECT g.group_name, g.branchid as branch_id, d.report_file, d.report_type, d.documentation_id FROM groups g INNER JOIN documentation d on g.group_id = d.group_id WHERE branchid = '$branchid' AND coordinator_id = 0";

$result = mysqli_query($con, $get_group);
$rowCount = mysqli_num_rows($result);
$output['data'][] = [];
if(mysqli_num_rows($result) > 0){
    while($row = $result -> fetch_assoc())
    {

        $file = $row['report_file'];
        $reportID = $row['documentation_id'];
        $rows[0] = $row['group_name'];
        $rows[1] = $row['report_type'];
        $rows[2] = "<a id='checkFile'>check</a> |<a class='btn btn-xs btn-primary btn-table' href='../student/".$file."' download>View</a>";
        $rows[3] = "<a class='btn btn-xs btn-primary btn-table' reportId='".$reportID."' id='sendBtn'>Send</a>";
        if($row['branch_id'] == $branchid){
            $output['data'][] = $rows;
        }		
        
    }
    if($rowCount < 1) {
        $row[0] = "";
        $row[1] = "";
        $row[2] = "";
        $row[3] = "";
        $row[4] = "";
                    
        $output['data'][] = $row;
    }
    echo json_encode($output);
}

?>
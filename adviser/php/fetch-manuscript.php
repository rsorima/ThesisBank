<?php
session_start();
include("../../config/connectdb.php");

$branchid=$_SESSION['branchid'];
$userid = $_SESSION['uid'];

$row = array();

try{
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sqlReports = "SELECT * from reports where adviser_id='$userid' and report_type='Manuscript' and coordinator_id = '0' order by date_created desc";
    $stmt = $conn->prepare($sqlReports);
    $stmt->execute();
    foreach ($stmt	as $report)
    {
        $reportId = $report['report_id'];
        $groupId = $report['group_id'];
        $shareable_link = $report['shareable_link'];
        $reportType = $report['report_type'];
        $dateCreated = $report['date_created'];
        $doc_title = $report['report_file'];

        // $sqlGroupUsers = "SELECT * from group_users where user_id='$studentId'";
        // $stmt = $conn->prepare($sqlGroupUsers);
        // $stmt->execute();
        // foreach ($stmt	as $group_user)
        // {
        //     $groupId = $group_user['group_id'];
        // }

        $sqlGroups = "SELECT * from groups where group_id='$groupId'";
        $stmt = $conn->prepare($sqlGroups);
        $stmt->execute();
        foreach ($stmt	as $user)
        {

            $gid = $user["group_id"];
            $gname = $user["group_name"];
        }
        
        $row[0] = $gname;
        $row[1] = "<a href='".$shareable_link."'>".$doc_title."</a>";
        $row[2] = $dateCreated;	
        
        $row[3] =  "<a class='btn btn-xs btn-default btn-table' href='../student/".$doc_title."' download>View</a>".
                    "<button class='btn btn-xs btn-danger btn-table' id='btnDelete' >Delete</button>".
                    "<button class='btn btn-xs btn-success btn-table' reportId='".$reportId."' id='btnSendReport' >Send</button>";;
                        
        $output['data'][] = $row;
    }

    echo json_encode($output);
} 
catch (PDOException $e)
{
    echo 'PDO Exception Caught.';
    echo 'Error with the database: <br />';
    echo 'SQL Query: ', $sql;
    echo 'Error: ' . $e->getMessage();
}
?>
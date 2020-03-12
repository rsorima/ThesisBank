ser<?php

	require_once("../../config/connectdb.php");
    session_start();
    $userid = $_SESSION['uid'];
	//variable
    $row = array();
    // $row[0] = "";
    // $row[1] = "";
    // $row[2] = "";
    // $row[3] = "";	
    // $row[4] = "";
    // $output['data'][] = $row;

	try{
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sqlReports = "SELECT * from reports where coordinator_id='$userid' and report_type='Journal Report' order by date_created desc";
        $stmt = $conn->prepare($sqlReports);
		$stmt->execute();
		foreach ($stmt	as $report)
		{
            $reportId = $report['report_id'];
            $adviserId = $report['adviser_id'];
            $groupId = $report['group_id'];
            $reportFile = $report['report_file'];
            $reportType = $report['report_type'];
            $dateCreated = $report['date_created'];

            $sqlAdviserName = "SELECT firstname, lastname from users where userid = '$adviserId'";
            $stmt2 = $conn->prepare($sqlAdviserName);
            $stmt2->execute();
            foreach ($stmt2	as $user)
            {
                $Aname = $user['firstname']." ".$user['lastname'];
            }

            $sqlGroupUsers = "SELECT * from groups where group_id='$groupId'";
            $stmt3 = $conn->prepare($sqlGroupUsers);
            $stmt3->execute();
            foreach ($stmt3	as $group){    
                $groupId = $group['group_id'];  
                $gname = $group["group_name"];
            }

            $row[0] = $Aname;
            $row[1] = $gname;
            $row[2] = $reportFile;
            $row[3] = $dateCreated;	
            
            $row[4] =  "<a class='btn btn-xs btn-default btn-table' href='../student/".$reportFile."' download>View</a>";
                            
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
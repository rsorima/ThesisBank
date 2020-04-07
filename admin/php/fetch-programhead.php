<?php

	require_once("../../config/connectdb.php");

	//variable
	$row = array();

	try{
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT u.userid, u.firstname AS Fname, u.lastname AS Lname, u.username, u.password, u.usertype, u.branchid, u.status, b.branchid, b.coursecode 
		from users u inner join branches b on u.branchid = b.branchid where u.usertype = 2";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		foreach ($stmt	as $user)
		{

			$userid = $user["userid"];
			$fname = $user["Fname"];
			$lname = $user["Lname"];
			$uname = $user["username"];
			$pword = $user["password"];
			$usertype = $user["usertype"];
			$branch = $user["coursecode"];
			
			$status = $user["status"];
			
			$row[0] = $uname;
			$row[1] = $fname ." ". $lname;
			$row[2] = $branch;
			

			if ($status == 0 ) {
				$row[3] = "<span class='fa fa-circle offline'></span> Offline";
			} else if ($status == 1) {
				$row[3] = "<span class='fa fa-circle online'></span> Online";
			}

			$row[4] =  "<button class='btn btn-xs btn-primary btn-table' id='btnEdit' userid='".$userid."' fname='".$fname."' lname='".$lname."' uname='".$uname."' pword='".$pword."' data-toggle='modal' data-target='#modalEditUser' style='width: 65px;'>Edit</button>".
						"<button class='btn btn-xs btn-danger btn-table' id='btnDelete' userid='".$userid."' style='width: 65px;'>Delete</button>";
						
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
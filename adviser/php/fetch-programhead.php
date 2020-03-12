<?php

	require_once("../../config/connectdb.php");

	//variable
	$row = array();

	try{
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT * from users where usertype = 2";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		foreach ($stmt	as $user)
		{

			$userid = $user["userid"];
			$fname = $user["firstname"];
			$lname = $user["lastname"];
			$uname = $user["username"];
			$pword = $user["password"];
			$usertype = $user["usertype"];
			
			$status = $user["status"];
			
			
			// $row[0] = $fname ." ". $lname;
			
			$row[0] = $fname ." ". $lname;
			$row[1] = $uname;
			$row[2] = $pword;	
			
			if ($status == 0 ) {
				$row[3] = "<span class='fa fa-circle offline'></span> Offline";
			} else if ($status == 1) {
				$row[3] = "<span class='fa fa-circle online'></span> Online";
			}

			$row[4] =  "<button class='btn btn-xs btn-default btn-table' id='btnView' data-toggle='modal' data-target='#modalViewUser'>View</button>".
						"<button class='btn btn-xs btn-primary btn-table' id='btnEdit' data-toggle='modal' data-target='#modalEditUser'>Edit</button>".
						"<button class='btn btn-xs btn-danger btn-table' id='btnDelete' >Delete</button>";
						
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
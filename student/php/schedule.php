<?php
	require_once("../config/connectdb.php");
	$course = $_SESSION['branchid'];
	$userID = $_SESSION['uid'];

	try {
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// $sql = "SELECT * FROM events WHERE course = $course";
		//Fetching the event that have made by their adviser
		$sql = "SELECT e.title, e.id as eid, e.Description, e.start, gm.user_id, g.name, e.user_id AS Adviser FROM events e JOIN group_members gm on gm.user_id = $userID JOIN groups g ON g.id = gm.group_id WHERE e.user_id = g.adviser AND e.course = $course AND e.Description = 'Status Report' ORDER BY start ASC";
		$stmt = $conn->prepare($sql);
		$stmt->execute(); 
        $branch = $stmt->fetchAll();
        foreach ($branch as $row) {
			echo "<option value=".$row["eid"].">" .$row["title"].  "</option>";		
		}			
	} 
	catch (PDOException $e) {
		echo 'PDO Exception Caught.';
		echo 'Error with the database: <br />';
		echo 'SQL Query: ', $sql;
		echo 'Error: ' . $e->getMessage();
	}
?>
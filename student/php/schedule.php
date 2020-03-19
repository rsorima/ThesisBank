<?php
	require_once("../config/connectdb.php");
	$course = $_SESSION['branchid'];
	$userID = $_SESSION['uid'];

	try {
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// $sql = "SELECT * FROM events WHERE course = $course";
		$sql = "SELECT e.title, gm.user_id, g.name, e.user_id AS Adviser FROM events e JOIN group_members gm on gm.user_id = $userID 
				JOIN groups g ON g.id = gm.group_id WHERE e.user_id = g.adviser AND e.course = $course";
		$stmt = $conn->prepare($sql);
		$stmt->execute(); 
        $branch = $stmt->fetchAll();
        foreach ($branch as $row) {
			echo "<option value=".$row["id"].">" .$row["title"].  "</option>";				
		}			
	} 
	catch (PDOException $e) {
		echo 'PDO Exception Caught.';
		echo 'Error with the database: <br />';
		echo 'SQL Query: ', $sql;
		echo 'Error: ' . $e->getMessage();
	}
?>
<?php
	require_once("../config/connectdb.php");

	try {
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT * FROM branches";
		$stmt = $conn->prepare($sql);
		$stmt->execute(); 
        $branch = $stmt->fetchAll();
 
        foreach ($branch as $row) {
			echo "<option value=".$row["branchid"].">" .$row["branch_name"].  "</option>";
		}
		
	} 
	catch (PDOException $e) {
		echo 'PDO Exception Caught.';
		echo 'Error with the database: <br />';
		echo 'SQL Query: ', $sql;
		echo 'Error: ' . $e->getMessage();
	}
?>
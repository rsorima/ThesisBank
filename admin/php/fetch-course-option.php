<?php
	require_once("../config/connectdb.php");

	print_r($_GET);

	try {
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT * FROM programs";
		$stmt = $conn->prepare($sql);
		$stmt->execute(); 
        $branch = $stmt->fetchAll();
 
        foreach ($branch as $row) {
			echo "<option value=".$row["id"].">" .$row["description"].  "</option>";
		}
		
	} 
	catch (PDOException $e) {
		echo 'PDO Exception Caught.';
		echo 'Error with the database: <br />';
		echo 'SQL Query: ', $sql;
		echo 'Error: ' . $e->getMessage();
	}
?>
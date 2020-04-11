<?php
	require_once("../config/connectdb.php");

	try {
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT * FROM sem_type WHERE id != 5";
		$stmt = $conn->prepare($sql);
		$stmt->execute(); 
        $branch = $stmt->fetchAll();
 
        foreach ($branch as $row) {
			echo "<option class='semtype' value='".$row["id"]."' semtype='".$row["id"]."'>" .$row["description"].  "</option>";
		}
		
	} 
	catch (PDOException $e) {
		echo 'PDO Exception Caught.';
		echo 'Error with the database: <br />';
		echo 'SQL Query: ', $sql;
		echo 'Error: ' . $e->getMessage();
	}
?>
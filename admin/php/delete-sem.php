<?php
	// connection to database
	require("../../config/connectdb.php");

	try {
        
        //get data froma ajax
		$sem_id = $_GET["sem_id"];
	
        //update flag 
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM semester WHERE id = :sem_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':sem_id', $sem_id);
		$stmt->execute();
        header("location:../manage-semester.php");
		
	}
	catch (PDOException $e)
	{
		echo 'PDO Exception Caught.';
		echo 'Error with the database: <br />';
		echo 'SQL Query: ', $sql;
		echo 'Error: ' . $e->getMessage();
	}
?>
<?php
	// connection to database
	require("../../config/connectdb.php");

	try {
        
        //get data froma ajax
		$userid = $_GET["userid"];
	
        //update flag 
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM users WHERE id = :userid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':userid', $userid);
		$stmt->execute();
		header("location:../student-group.php");
	}
	catch (PDOException $e)
	{
		echo 'PDO Exception Caught.';
		echo 'Error with the database: <br />';
		echo 'SQL Query: ', $sql;
		echo 'Error: ' . $e->getMessage();
	}
?>
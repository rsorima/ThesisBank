<?php
	session_start();
	// connection to database
	require("../config/connectdb.php");

	try {
		

		$userid = $_SESSION['uid'];
		$status = 0;

		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "UPDATE users SET status = :status WHERE id = :users_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':status', $status);
		$stmt->bindValue(':users_id', $userid);
		$stmt->execute();

		session_destroy();
		header("location: ../index.php");

	} 
	catch (PDOException $e)
	{
		echo 'PDO Exception Caught.';
		echo 'Error with the database: <br />';
		echo 'SQL Query: ', $sql;
		echo 'Error: ' . $e->getMessage();
	}
?>

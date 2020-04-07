<?php
	// connection to database
	require("../../config/connectdb.php");

	try {
        
        //get data froma ajax
		echo $editfname = $_POST["editfname"];
        echo $editlname = $_POST["editlname"];
        echo $editusername = $_POST["editusername"];
        echo $editpassword = $_POST["editpassword"];
		echo $userid = $_POST["userid"];   

        //update flag 
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE users SET 
        firstname = :editfname,
        lastname = :editlname,
        username = :editusername,
        password = :editpassword
        WHERE users_id = :userid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':editfname', $editfname);
        $stmt->bindValue(':editlname', $editlname);
        $stmt->bindValue(':editusername', $editusername);
        $stmt->bindValue(':editpassword', $editpassword);
        $stmt->bindValue(':userid', $userid);
        $stmt->execute();
	
	}
	catch (PDOException $e)
	{
		echo 'PDO Exception Caught.';
		echo 'Error with the database: <br />';
		echo 'SQL Query: ', $sql;
		echo 'Error: ' . $e->getMessage();
	}
?>
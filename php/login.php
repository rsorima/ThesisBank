<?php
    //CONNECT DATABASE
	require_once("../config/connectdb.php");

	try {
		session_start();
        //GET DATA FROM AJAX
		$uname = $_POST['uname'];
		$pword = $_POST['pword'];

        //SELECT DATA QUERY
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT u.*, b.*  from users as u 
			LEFT JOIN branches b ON u.branchid = b.branchid
			WHERE username = :uname and password = :pword and flagg = 0 LIMIT 1";

        $sql = "SELECT u.* from users as u WHERE username = :uname and password = :pword LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':uname', $uname);
        $stmt->bindParam(':pword', $pword);
		$stmt->execute();

        foreach ($stmt	as $row) {

			if ($row["status"] == 1) {
				echo "Online";
			} 
			else if  ($row["status"] == 0) {
				$userid = $row['id'];
				$status = 1;
	
				$sql = "UPDATE users SET status = :status WHERE id = :userid";
				$stmt = $conn->prepare($sql);
				$stmt->bindValue(':status', $status);
				$stmt->bindValue(':userid', $userid);
				$stmt->execute();
	
				$_SESSION['uid'] = $row['id'];
                $_SESSION['fname'] = $row['firstname'];
				$_SESSION['lname'] = $row['lastname'];
                $_SESSION['sem'] = $row['sem'];
				//$_SESSION['contact'] = $row['contact'];
				//$_SESSION['uname'] = $row['username'];
				//$_SESSION['pword'] = $row['password'];
				$_SESSION['utype'] = $row['role'];
				$_SESSION['branchid'] = $row['program'];
				//$_SESSION['branch_name'] = $row['branch_name'];
				
				echo $row['role'];
			}
		}
	} 
	catch (PDOException $e) {
		echo 'PDO Exception Caught.';
		echo 'Error with the database: <br />';
		echo 'SQL Query: ', $sql;
		echo 'Error: ' . $e->getMessage();
	}
?>

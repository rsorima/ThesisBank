<?php
    //CONNECT DATABASE
    require_once("../../config/connectdb.php");
    session_start();
    $branchid = $_SESSION['branchid'];
	try {
        //GET DATA FROM AJAX
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $uname = $_POST["uname"];
        $pword = $_POST["pword"];
       	$type = 4;

        // INSERT DATA QUERY
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO users (firstname, lastname, username, password, usertype,branchid) VALUES (:fname, :lname, :uname, :pword, :type, :branchid)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':fname', $fname);
        $stmt->bindValue(':lname', $lname);
        $stmt->bindValue(':uname', $uname);
        $stmt->bindValue(':pword', $pword);
        $stmt->bindValue(':type', $type);
        $stmt->bindValue(':branchid', $branchid);
        $stmt->execute();
    }
    catch (PDOException $e) {
        echo 'PDO Exception Caught.';
        echo 'Error with the database: <br />';
        echo 'SQL Query: ', $sql;
    }
?>
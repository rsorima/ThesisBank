<?php
    //CONNECT DATABASE
	require_once("../../config/connectdb.php");

	try {
        //GET DATA FROM AJAX
//         print_r($_POST);
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $utype = $_POST["usertype"];
        $Scourse = $_POST["course"];
        $uname = $_POST["uname"];
        $pword = $_POST["pword"];
					

        // INSERT DATA QUERY
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO users (firstname, lastname, user_type_id, username, password, program_id, date_created) VALUES (:fname, :lname, :utype, :uname, :pword, :Scourse, now())";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':fname', $fname);
        $stmt->bindValue(':lname', $lname);
        $stmt->bindValue(':utype', $utype);
        $stmt->bindValue(':Scourse', $Scourse);
        $stmt->bindValue(':uname', $uname);
        $stmt->bindValue(':pword', $pword);
        $stmt->execute();
    }
    catch (PDOException $e) {
        echo 'PDO Exception Caught.';
        echo 'Error with the database: <br />';
        echo 'SQL Query: ', $sql;
    }
?>
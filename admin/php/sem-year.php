<?php
	require_once("../config/connectdb.php");
	try {
		$year = intval(date('Y'));
        
        for ($x = $year; $x < ($year + 7); $x++) {
			echo "<option class='semyear' value=".$x." semyear=".$x.">" .$x.  "</option>";
		}
		
	} 
	catch (PDOException $e) {
		echo 'PDO Exception Caught.';
		echo 'Error with the database: <br />';
		echo 'SQL Query: ', $sql;
		echo 'Error: ' . $e->getMessage();
	}
?>
<?php

	require_once("../../config/connectdb.php");

	//variable
//	$row = array();

	if(isset($_POST["userid"]))  
     {  
          $query = "SELECT * FROM users WHERE id = ".$_POST['userid']."";  
          $result = mysqli_query($con, $query);  
          $row = mysqli_fetch_array($result);  
          echo json_encode($row);  
     }
?>
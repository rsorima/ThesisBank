<?php

	require_once("../../config/connectdb.php");

	//variable
//	$row = array();
	if(isset($_GET["uid"]))  
     {  
          $query = "SELECT * FROM semester WHERE id = ".$_GET['uid']."";  
          $result = mysqli_query($con, $query);  
          $row = mysqli_fetch_array($result);
          echo json_encode($row);  
     }
?>
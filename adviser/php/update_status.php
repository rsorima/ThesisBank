<?php
    include("../../config/connectdb.php");

    $groupid = $_GET['groupid'];
    $groupname = $_GET['name'];
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $page_type = $_GET['pageid'];
        $action = $_GET['action'];
        
        if($action == 'a') {
            $update = "UPDATE report set status = 3 where id=$id ";
        }else {
            $update = "UPDATE report set status = 2 where id=$id ";
        }
        
        $result = mysqli_query($con, $update);
        if($page_type == 1) {
            header("location:../statusreport.php");
        }else {
            header("location:../journalreport.php");
        }
    }

?>
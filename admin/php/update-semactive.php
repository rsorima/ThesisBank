<?php
    require("../../config/connectdb.php");
    
    if(isset($_GET['sem_id'])) {
    
        $active_sql = "UPDATE semester SET Active = 0 WHERE Active = 1";
        mysqli_query($con, $active_sql);

        $new_active = "UPDATE semester SET Active = 1 WHERE id = ".$_GET['sem_id']."";
        mysqli_query($con, $new_active);
        header("location:../manage-semester.php");
    }
?>
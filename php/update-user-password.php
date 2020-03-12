<?php
    include("../config/connectdb.php");
    session_start();

    $userId = $_SESSION['uid'];
    $password = $_GET['password'];

    $update_password = "UPDATE users set password = '$password' where userid = '$userId'";
    $result = mysqli_query($con, $update_password);

    if($result)
    {
        $_SESSION['pword'] = $password;
        echo "ok";
    }
    else
    {
        echo "error";
    }
?>
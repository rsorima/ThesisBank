<?php
    session_start();
    include("../../config/connectdb.php");

    $userid = $_SESSION['uid'];

    $get_alerts = "SELECT a.alertId, a.userId, ad.alertDetailsId, ad.message, ad.link, a.isRead FROM alerts a inner join alert_details ad on a.alertDetailsId = ad.alertDetailsId where userId = '$userid' and isRead = '0' order by a.alertId desc";
//    echo $get_alerts;
    $get_result = mysqli_query($con, $get_alerts);
    $rows = mysqli_num_rows($get_result);
        if($rows > 0){
            $i = 0;
            while($row = $get_result -> fetch_assoc()){
                $alerts[$i] = $row;
                $i++;
            }

            $apiResult = array(
                "code" => 200,
                "result" => $alerts,
                "count" => sizeof($alerts)
            );
        }else{
            $apiResult = array(
                "code" => 400
            );
        }
    

    echo json_encode($apiResult);
?>
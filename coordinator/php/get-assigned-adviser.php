<?php
    session_start();
    include("../../config/connectdb.php");

    $groupid = $_GET['groupid'];
    $getAdviser = "SELECT adviser from groups where id = '$groupid'";
    $adviser_result = mysqli_query($con, $getAdviser);

    if(mysqli_num_rows($adviser_result) > 0){
        while($a_row = $adviser_result -> fetch_assoc())
        {
            $adviserId = $a_row['adviser'];
            if($adviserId === '0')
            {
                $adviserName = "";
            }
            else
            {
                $adviserInfo = "SELECT * from users where id = '$adviserId'";
                $adviser_info_result = mysqli_query($con, $adviserInfo);

                if(mysqli_num_rows($adviser_info_result) > 0){
                    while($ai_row = $adviser_info_result -> fetch_assoc())
                    {
                        $adviserName = $ai_row;
                    }
                }
                
            }
        }
    }

    echo json_encode($adviserName);
?>
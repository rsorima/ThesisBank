<?php    
   require_once("../config/connectdb.php");
    
    //Getting report type
    //type is from the url
    if(isset($_GET['type'])) {
        $type = $_GET['type'];                                
    }else $type = 1; //for the meantime status report is the default        
?>

<!DOCTYPE html>
<html>
<head>
<!-- CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/sweetalert/sweetalert.css">
    <link rel="stylesheet" href="../../template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../template/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../template/dist/css/skins/skin-green.min.css">

    <!-- Custom CSS  -->
    <link rel="stylesheet" href="../css/main-admin.css">
    <link rel="stylesheet" href="../css/validation.css">
    <link rel="stylesheet" href="../css/custom.css">
    </head>
<body>  
    <table id="loadreports" class ="table table-striped table-bordered">        
        <?php        
        $sqlEvents = "select * from events where sem = 1 and event_type = 2 
                    ORDER BY start ASC"; //SEM is equal to sem of user;
        $res = mysqli_query($con, $sqlEvents);
        $result = mysqli_query($con, $sqlEvents);
        //check if there is no week schedule
        if(count(mysqli_fetch_assoc($res))){
        ?>   
        <?php                
            $sqlGroups = "SELECT * from groups where groups.adviser = 4 and groups.sem = 1"; //Group adviser = user id and group sem is user sem                    
            $resultGroups = mysqli_query($con, $sqlGroups);                        
            while($row =mysqli_fetch_assoc($resultGroups)){
        ?>
            <tr>
                <td><?php echo $row['name']; ?> </td>
        <?php
            while($rowColumn = mysqli_fetch_assoc($res)){
                $groupID = $row['id'];
                $startdate =  $rowColumn['start'];
                $enddate = $rowColumn['end'];                
                $sqlReports = "SELECT * FROM report WHERE group_id = $groupID AND
                    date_created BETWEEN '$startdate' AND '$enddate' AND 
                    report_type = $type ORDER BY date_created DESC LIMIT 1";
                $result = mysqli_query($con,$sqlReports);
                if(empty(mysqli_fetch_assoc($result))){
                    echo "<td>FAILED TO SUBMIT</td>";
                }
                while($reportResult = mysqli_fetch_assoc($result)){
                    switch ($reportResult['status']) {
                        case 1:
                            echo "<td>SUBMITTED<br>
                                <a href='#'>ACCEPT </a>
                                <a href='#'>REJECT </a>
                                </td>";
                            break;
                        case 2:
                            echo "<td>APPROVED</td>";
                            break;
                        case 3:
                            echo "<td>REJECTED</td>";
                            break;
                    }
                }            
            }
        ?>
            </tr>
        <?php        
            }
        }
        ?>
    </table>                                                                                        
</body>

</html>
    <!-- jQuery library -->
    <script src="../../js/jquery/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="../../js/bootstrap/bootstrap.min.js"></script>

    <script src="../../template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function(){  
      $('#loadreports').DataTable();  
 });
</script>
<?php
// function getWeekNum($date_1 , $date_2 , $differenceFormat,&$var)
// {    
//     $datetime1 = date_create($date_1);    
//     $datetime2 = date_create($date_2);        
//     $interval = date_diff($datetime1, $datetime2);
//     $days = $interval->format($differenceFormat);
//     if ($days%7 != 0){
//         $weeks = intval($days/7) + 1;    
//     }
    
//     $enddate;
//     //for inserting data to week 1
//     $curDay = strtoupper(date('D', strtotime($date_1))); 
//     switch ($curDay) {            
//             case 'MON':
//                 $week1 = date("Y-m-d",strtotime($date_1));            
//                 $enddate = date("Y-m-d",strtotime($date_1. ' + 5 days'));
//                 array_push($var,$week1."/".$enddate);
//                 break;
//             case 'TUE':
//                 $week1 = date("Y-m-d",strtotime($date_1));
//                 $enddate = date("Y-m-d",strtotime($date_1. ' + 4 days'));
//                 array_push($var,$week1."/".$enddate);
//                 break;
//             case 'WED':
//                 $week1 = date("Y-m-d",strtotime($date_1));
//                 $enddate = date("Y-m-d",strtotime($date_1. ' + 3 days'));
//                 array_push($var,$week1."/".$enddate);
//                 break;
//             case 'THU':
//                 $week1 = date("Y-m-d",strtotime($date_1));
//                 $enddate = date("Y-m-d",strtotime($date_1. ' + 2 days'));
//                 array_push($var,$week1."/".$enddate);
//                 break;
//             case 'FRI':
//                 $week1 = date("Y-m-d",strtotime($date_1));
//                 $enddate = date("Y-m-d",strtotime($date_1. ' + 1 days'));
//                 array_push($var,$week1."/".$enddate);            
//                 break;
//             case 'SAT':
//                 $week1 = date("Y-m-d",strtotime($date_1));
//                 $enddate = date("Y-m-d",strtotime($date_1. ' + 0 days'));
//                 array_push($var,$week1."/".$enddate);
//                 break;
//             case 'SUN':
//                 $week1 = date("Y-m-d",strtotime($date_1));
//                 $enddate = date("Y-m-d",strtotime($date_1. ' + 6 days'));
//                 array_push($var,$week1."/".$enddate);
//                 break;
//         }
//     //Inserting Remaining Weeks
//     for ($x = 0; $x <= $weeks - 2; $x++) {        
//         $startdate = date("Y-m-d",strtotime($enddate. ' + 1 days'));
//         $enddate = date("Y-m-d",strtotime($startdate. ' + 6 days'));
//         $tempEndDate = $enddate;
//         //if last week
//         if ($x == $weeks -2){
//             if (date_diff($datetime2,date_create($tempEndDate))->format('%d') > 0){
//                 $enddate = $date_2;
//             }
//         }
//         array_push($var,$startdate."/".$enddate);
//     }    
// }
?>
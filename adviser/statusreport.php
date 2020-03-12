<?php
	include("../config/connectdb.php");

    session_start();
    if (empty($_SESSION['uid'])) {header('location: ../index.php');}
    $sem = $_SESSION['sem'];
    $type = 1;
    $course = $_SESSION['branchid'];
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Dashboard - Thesis Data Bank </title>

        <link rel="icon" type="image/ico" href="../Images/STI-logo.png">

        <!-- CSS -->
        <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="../css/sweetalert/sweetalert.css"> 
        <link rel="stylesheet" href="../template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../template/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../template/dist/css/skins/skin-green.min.css">

        <!-- Custom CSS  -->
        <link rel="stylesheet" href="css/main-admin.css">
        <link rel="stylesheet" href="css/validation.css">

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    </head>
    <body class="hold-transition skin-green sidebar-mini fixed">

        <div class="wrapper">
            
            <?php
                include("../includes/navbar.php");  //TOP NAVIGATION
                include("../includes/sidebar.php"); //SIDEBAR NAVIGATION
            ?>

            <!-- CONTENT -->
            <div class="content-wrapper">

                <!-- MAIN CONTENT -->
                <section class="content">

                <div class="row">
                        <div class = "col-md-12">
                            <div class="box box-info border-blue">
                                <div class="box-header with-border">
                                    <h4>Status Reports</h4>
                                </div> 
                                <div class="box-body">
                                    <table id="tblSreport" class="table table-bordered table-hover table-custom">
                                        <thead>
                                            <tr>
                                                <th width="20%">Group Name</th>
                                                <?php 
                                                    $counter = 0;
                                                    $sqlEvents = "select * from events where sem = $sem AND event_type = 2 AND course = $course ORDER BY start ASC";
                                                    $res = mysqli_query($con, $sqlEvents);
                                                    while($row = mysqli_fetch_assoc($res)){
                                                        echo '<th width="15%">'.$row['Description'].'</th>';
                                                        $counter++;
                                                    }
                                                ?>
                                            </tr>
                                        </thead>
                                        <?php  
                                            $branchid = $_SESSION['branchid'];
                                            $query ="SELECT g.id as group_id, g.name as group_name, g.adviser as adviser_id, g.program as branch_id, sr.report_filename, sr.date_created, sr.report_type, u.firstname, u.lastname from groups g left join report sr on g.id = sr.group_id left join users u on u.id = g.adviser where g.program = $branchid group by g.name";
//                                            echo $query;
                                            $result = mysqli_query($con, $query);
                                            while($row = mysqli_fetch_array($result))  
                                            {  
                                                $report_filename = $row['report_filename'];
                                                $adviserId = $row['adviser_id'];
                                                if($adviserId != 2){
                                                    $Aname = $row['firstname']." ".$row['lastname'];
                                                }
                                                else{
                                                    $Aname = "No Adviser Yet";
                                                }
                                               echo '<tr>';  
                                               echo    '<td>'.$row["group_name"];
                                                    $gmembers ="SELECT g.group_id, g.user_id, u.lastname FROM group_members g left join users u on g.user_id = u.id WHERE group_id = ".$row['group_id']."";
        //                                            echo $query;
                                                    $gresult = mysqli_query($con, $gmembers);
                                                    while($grow = mysqli_fetch_array($gresult))  
                                                    {
                                                        echo '<br>'. $grow['lastname'];
                                                    }
                                               echo    '</td>';                                                    
                                                  $events ="SELECT * FROM events WHERE sem = $sem AND course = $course AND event_type = 2 ORDER BY start ASC";
        //                                            echo $query;
                                                    $eresult = mysqli_query($con, $events);
                                                    while($erow = mysqli_fetch_array($eresult))  
                                                    {
                                                        echo '<td style="text-align:center">';
                                                        $reportCheck = "SELECT * FROM report WHERE group_id = ".$row['group_id']." AND event_id = ".$erow['id']." AND report_type = 1";
//                                                        echo $reportCheck;
                                                        $rresult = mysqli_query($con, $reportCheck);
                                                        if(mysqli_num_rows($rresult) > 0) {
                                                            while($rrow = mysqli_fetch_array($rresult))  
                                                            {
                                                                if($rrow['status'] == 1) {
                                                                    echo '<span class="badge badge-dark" style="padding:10px; font-size:11px!important;">Submitted</span>';
                                                                    echo '<br>';
                                                                    echo '<a width="10%" class="btn btn-success" href="php/update_status.php?id='.$rrow["id"].'&pageid=1&action=a">APPROVE</a>  <a class="btn btn-danger" href="php/update_status.php?id='.$rrow["id"].'&pageid=1&action=r">REJECT</a>';
                                                                }else if($rrow['status'] == 2) {
                                                                    echo '<span class="badge badge-success" style="padding:10px; font-size:11px!important;color:#fff;background-color: #dc3545"">Declined</span>';
                                                                }else if($rrow['status'] == 3) {
                                                                    echo '<span class="badge badge-success" style="padding:10px; font-size:11px!important;color:#fff;background-color: #28a745"">Approved</span>';
                                                                }else {
                                                                    echo '<span class="badge badge-danger" style="padding:10px; font-size:11px!important;color:#212529;background-color: #ffc107">No Entry</span>';
                                                                }
                                                            }
                                                        }else {
                                                            echo '<span class="badge badge-danger" style="padding:10px; font-size:11px!important;color:#212529;background-color: #ffc107">No Entry</span>';
                                                        }
                                                        echo '</td>';
                                                    }
                                               echo '</tr>';  
                                                 
                                            }
                                        ?>
                                    </table>
                                </div>
                                <div class="box-footer">
                                    <!-- <button class="btn btn-success" data-toggle="modal" data-target="#modalAddAdmin"> <span class="fa fa-md fa-plus"></span> Add Admin </button> -->
                                    <!-- <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAddUser"> <span class="fa fa-md fa-user-plus"></span> Add User </button> -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>
                    </div>

                        
                    </div>
                    
                </section>
            </div>

            <!-- FOOTER -->
            <?php include("../includes/footer.php");?>

            <?php  include("../includes/modals.php");?>
        </div>

        
        <!-- jQuery library -->
        <script src="../js/jquery/jquery.min.js"></script>

        <!-- Bootstrap 3.3.7 -->
        <script src="../js/bootstrap/bootstrap.min.js"></script>

        <!-- Data Table -->
        <script src="../template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <!-- Sweet Alert -->
        <script src="../js/sweetalert/sweetalert.min.js"></script>
        <script>
            $(document).ready(function(){  
                $('#tblSreport').DataTable();  
                
            });
        </script>
        <!-- <script src="js/branch.js"></script> -->
<!--        <script src="js/datatable.js"></script>-->
        
        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>    

        <script src='../custom-js/account.js'></script>  
        <script src='../custom-js/alerts.js'></script>    
        <script src="js/reports.js"></script>    
    </body>
</html>
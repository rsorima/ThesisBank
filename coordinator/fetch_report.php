<?php
    include("../config/connectdb.php");

    session_start();
    $sem = $_SESSION['sem'];
    if (empty($_SESSION['uid'])) {header('location: ../index.php');}
    if(isset($_GET['type'])) {
        $type = $_GET['type'];                                
    }else $type = 1; //for the meantime status report is the default        
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Dashboard - Thesis Data Bank </title>

        <link rel="icon" type="image/ico" href="../Images/logo.png">

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
                                    <h4>Groups</h4>
                                </div> 
                                <div class="box-body">
                                    <table id='tblSreport' class="table table-bordered table-hover table-custom">
                                        <thead>
                                            <tr>
                                                <th width="15%">Group Name</th>
                                                <?php 
                                                    $sqlEvents = "select * from events where sem = $sem  and event_type = 2 
                                                        ORDER BY start ASC"; //SEM is equal to sem of user;
                                                    $res = mysqli_query($con, $sqlEvents);
                                                    $result = mysqli_query($con, $sqlEvents);
                                                    //check if there is no week schedule
                                                    while($row = mysqli_fetch_assoc($res)){
                                                        echo '<th width="15%">'.$row['Description'].'</th>';
                                                    }
                                                ?>
                                            </tr>
                                        </thead>
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
                                                    <td><?php echo $row['name']; ?> <br>
                                                    </td>
                                            <?php
                                                $res = mysqli_query($con, $sqlEvents);
                                                while($rowColumn = mysqli_fetch_assoc($res)){
                                                    $groupID = $row['id'];
                                                    $startdate =  $rowColumn['start'];
                                                    $enddate = $rowColumn['end'];
                                                    $eventID = $rowColumn['id'];
                                                    $sqlReports = "SELECT * FROM report WHERE group_id = $groupID AND
                                                        date_created BETWEEN '$startdate' AND '$enddate' AND 
                                                        report_type = $type AND event_id = $eventID ORDER BY date_created DESC LIMIT 1";
                                                    $result = mysqli_query($con,$sqlReports);
                                                    if(mysqli_num_rows($result) < 1){
                                                        echo "<td>FAILED TO SUBMIT</td>";
                                                    }
                                                    $result = mysqli_query($con,$sqlReports);
                                                        while($reportResult = mysqli_fetch_assoc($result)){
                                                            switch ($reportResult['status']) {
                                                                case 1:
                                                                    echo "<td>SUBMITTED<td>";                                
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
                                </div>
<!--
                                <div class="box-footer">
                                     <button class="btn btn-success" data-toggle="modal" data-target="#modalAddAdmin"> <span class="fa fa-md fa-plus"></span> Add Admin </button> 
                                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAddGroups"> <span class="fa fa-md fa-user-plus"></span> Add New Group </button>   
                                    <div class="clearfix"></div>
                                </div>
-->
                            </div>
                        </div>
                    </div>
                </section>
            </div>


            <!-- FOOTER -->
            <?php include('../includes/footer.php'); ?>
            <?php  //include("../includes/modals.php"); //FOOTER ?>
    
        <!-- jQuery library -->
        <script src="../js/jquery/jquery.min.js"></script>

        <!-- Bootstrap 3.3.7 -->
        <script src="../js/bootstrap/bootstrap.min.js"></script>

        <!-- Data Table -->
        <script src="../template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <!-- Sweet Alert -->
        <script src="../js/sweetalert/sweetalert.min.js"></script>

         <!-- Custom JS  -->
        <script src="js/groups.js"></script>
        <script>
            $(document).ready(function(){  
                $('#tblSreport').DataTable();  
                
            });
            
        </script>
<!--        <script src="js/datatable.js"></script>-->

        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>
        <script src='../custom-js/account.js'></script>
        <script src='../custom-js/alerts.js'></script>  
    </body>
</html>
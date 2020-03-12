<?php
	include("../config/connectdb.php");

    session_start();
    if (empty($_SESSION['uid'])) {header('location: ../index.php');}
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
                                    <h4>Documentation Reports</h4>
                                </div> 
                                <div class="box-body">
                                    <table id="tblDreport" class="table table-bordered table-hover table-custom">
                                        <thead>
                                            <tr>
                                                <th width="15%">Adviser Name</th> 
                                                <th width="15%">Group Name</th>  
                                                <th width="15%">Report File</th>                                              
                                                <th width="12%">Date</th>
                                                <th width="12%">Action</th>
                                            </tr>
                                        </thead>
                                        <?php  
                                            $branchid = $_SESSION['branchid'];
                                            $query ="SELECT g.id as group_id, g.name as group_name, g.adviser as adviser_id, g.program as branch_id, sr.report_filename, sr.date_created from groups g left join report sr on g.id = sr.group_id where g.program = $branchid and sr.report_type = 3 group by g.name";  
                                            $result = mysqli_query($con, $query);
                                            while($row = mysqli_fetch_array($result))  
                                            {  
                                                $report_filename = $row['report_filename'];
                                                $adviserId = $row['adviser_id'];
                                                if($adviserId != 2){
                                                    $sqlAdviserName = "SELECT firstname, lastname from users where id = '$adviserId'";
                                                    $stmt = $conn->prepare($sqlAdviserName);
                                                    $stmt->execute();
                                                    foreach ($stmt  as $user){
                                                        $Aname = $user['firstname']." ".$user['lastname'];
                                                    }
                                                }
                                                else{
                                                    $Aname = "No Adviser Yet";
                                                }
                                               echo '  
                                               <tr>  
                                                    <td>'.$Aname.'</td>  
                                                    <td>'.$row["group_name"].'</td>  
                                                    <td>'.$report_filename.'</td>  
                                                    <td>'.$row["date_created"].'</td>  
                                                    <td><a class="btn btn-xs btn-default btn-table" href="../student/'.$report_filename.'" style="width: 65px;" download>View</a></td>  
                                               </tr>  
                                               ';  
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
                $('#tblDreport').DataTable();  
                
            });
        </script>
        <!-- <script src="js/branch.js"></script> -->
<!--        <script src="js/datatable.js"></script>-->
        
        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>    

        <script src='../custom-js/account.js'></script>  
        <script src='../custom-js/alerts.js'></script> 
        <script src='js/reports.js'></script>        
    </body>
</html>
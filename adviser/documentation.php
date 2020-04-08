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
                                    <h4>Student Documentation</h4>
                                </div> 
                                <div class="box-body">
                                    <table id="tblDreport" class="table table-bordered table-hover table-custom">
                                        <thead>
                                            <tr>
                                                <th width="15%">Group Name</th>
                                                <th width="15%">Report File Link</th>                                              
                                                <th width="15%">Thesis Title</th>
                                                <th width="12%">Date</th>
                                                <th width="12%">Action</th>
                                            </tr>
                                        </thead>
                                        <?php 
                                            $doc_sql = "SELECT * FROM report WHERE report_type = 3 AND (status < 5 || status = 7)";
                                            $doc_res = mysqli_query($con, $doc_sql);
                                            $num_row = mysqli_num_rows($doc_res);
                                            if($num_row > 0){
                                                while($v = mysqli_fetch_assoc($doc_res)) {
                                        ?>
                                            <tr>
                                                <?php 
                                                    $group_sql = "SELECT * FROM groups WHERE id = ".$v['group_id']."";
                                                    $group_res = mysqli_query($con, $group_sql);
                                                    $groups = mysqli_fetch_assoc($group_res);
                                                ?>
                                                <td scope="row">
                                                    <?php print $groups['name']; ?>
                                                <br>
                                                    <?php 
                                                        $count = 0;    
                                                    
                                                        $group_mem_sql = "SELECT gm.id, gm.user_id, u.id, u.lastname  FROM group_members gm LEFT JOIN users u on gm.user_id = u.id WHERE group_id = ".$groups['id']."";
                                                        $group_mem_res = mysqli_query($con, $group_mem_sql);
                                                        $rows = mysqli_num_rows($group_mem_res);
                                                        while($group_mems = mysqli_fetch_assoc($group_mem_res)){
                                                            echo $group_mems['lastname'];
                                                            $count++;
                                                            if($count != $rows) { echo ", ";}
                                                        }
                                                    ?>
                                                </td>
                                                <td><a href="../student/<?php echo $v['report_filename'];?>" title="Click to Download" download><?php echo str_replace("testupload/","", $v['report_filename']); ?></a></td>
                                                <td><?php print $v['report_title']; ?></td>
                                                <td><?php print $v['date_created']; ?></td>
                                                <td><center><?php 
                                                        if($v['status'] == 1) {
                                                            echo '<span class="badge badge-dark" style="padding:10px; font-size:11px!important;">Submitted by Student</span>';
                                                            echo '<br>';
                                                            echo '<a width="10%" class="btn btn-success" href="php/update_status.php?id='.$v["id"].'&pageid=3&action=a">APPROVE</a>  <a class="btn btn-danger" href="php/update_status.php?id='.$v["id"].'&pageid=3&action=r">REJECT</a>';
                                                        }else if($v['status'] == 2) {
                                                            echo '<span class="badge badge-success" style="padding:10px; font-size:11px!important;color:#fff;background-color: #dc3545">Declined by you</span>';
                                                        }else if($v['status'] == 3) {
                                                            echo '<span class="badge badge-primary" style="padding:10px; font-size:11px!important;background-color:#3857b1;">Submitted to Coordinator</span>';
                                                        }else if($v['status'] == 4) {
                                                            echo '<span class="badge badge-success" style="padding:10px; font-size:11px!important;color:#fff;background-color: #28a745">Approved</span>';
                                                        }else if($v['status'] == 5) {
                                                            echo '<span class="badge badge-success" style="padding:10px; font-size:11px!important;color:#fff;background-color: #28a745">Approved</span>';
                                                        }else if($v['status'] == 6) {
                                                            echo '<span class="badge badge-success" style="padding:10px; font-size:11px!important;color:#fff;background-color: #28a745">Approved</span>';
                                                        }else if($v['status'] == 7) {
                                                            echo '<span class="badge badge-info" style="padding:10px; font-size:11px!important;color:#fff;background-color: #dcb035">Declined by Coordinator</span><br>';
                                                            echo '<a width="10%" class="btn btn-success" href="php/update_status.php?id='.$v["id"].'&pageid=3&action=a">APPROVE</a>  <a class="btn btn-danger" href="php/update_status.php?id='.$v["id"].'&pageid=3&action=r">REJECT</a>';
                                                        }else {
                                                            echo '<span class="badge badge-danger" style="padding:10px; font-size:11px!important;color:#212529;background-color: #ffc107">No Entry</span>';
                                                        }
                                                    ?>
                                                </center></td>
                                            </tr>

                                        <?php
                                                }
                                            }else {
                                        ?>
                                                <p class="alert alert-info">Thesis directory is empty.</p>
                                        <?php
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

        <!-- <script src="js/branch.js"></script> -->
        <script>
            $(document).ready(function(){  
                $('#tblDreport').DataTable();   
            });
        </script>
<!--        <script src="js/datatable.js"></script>-->
        
        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>    

        <script src='../custom-js/account.js'></script>  
        <script src='../custom-js/alerts.js'></script>    
        <script src="js/reports.js"></script>    
    </body>
</html>
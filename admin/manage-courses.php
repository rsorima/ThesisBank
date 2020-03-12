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
        <link rel="stylesheet" href="css/custom.css">

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
                <section class="content-header">
                    <h3> Program</h3>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Program</li>
                    </ol>
                </section>
                <!-- MAIN CONTENT -->
                <section class="content">

                <div class="row">
                        <div class = "col-md-12">
                            <div class="box box-info border-blue">
                                 
                                <div class="box-body">
                                    <table id="tblStudent" class="table table-bordered table-hover table-custom">
                                        <thead>
                                            <tr>
                                                <!-- <th width="10%">ID</th> -->
                                                <th width="15%">Course Code</th>
                                                <th width="15%">Course Description</th>
                                                <th width="10%">Action</th>                                        
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="box-footer">
                                    <!-- <button class="btn btn-success" data-toggle="modal" data-target="#modalAddAdmin"> <span class="fa fa-md fa-plus"></span> Add Admin </button> -->
                                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAddUser"> <span class="fa fa-md fa-user-plus"></span> Add Course </button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </section>
            </div>


                <!-- FOOTER -->
                <?php include('../includes/footer.php');?>
                <?php  include("../includes/modals.php"); //FOOTER ?>
            <!-- ADD USER MODAL -->
            <div class="modal fade" id="modalAddUser" role="dialog">
                <div class="modal-dialog modal-md">
                    <form id="form-user">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> &times; </button>
                                <h4 class="modal-title">Add Course</h4>   
                            </div>
                            <div class = "modal-body">
                                <div class="form-group">            
                                    <label>First name:</label>
                                    <input type="text" class="form-control" id="txtFirstname" placeholder="Enter first name*">
                                    <div class="error" id="txtFirstnameError"></div>
                                </div>
                                <div class="form-group">
                                    <label>Last name:</label>
                                    <input type="text" class="form-control" id="txtLastname" placeholder="Enter last name*">
                                    <div class="error" id="txtLastError"></div>
                                </div>
                                <div class="form-group">
                                    <label>Username:</label>
                                    <input type="text" class="form-control" id="txtUsername" placeholder="Enter Username*">
                                    <div class="error" id="txtUsernameError"></div>
                                </div>
                                <div class="form-group">
                                    <label>Password:</label> 
                                    <input type="text" class="form-control" id="txtPassword" placeholder="Enter Password*" >
                                    <div class="error" id="txtPasswordError"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="btnSubmit">Register</button> 
                                <button type="button" class="btn btn-default" id="btnAddClose" data-dismiss="modal">Close</button>                                             
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- EDIT USER MODAL -->
            <div class="modal fade" id="modalEditUser" role="dialog">
                <div class="modal-dialog modal-md">
                    <form id="form-edituser">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> &times; </button>
                                <h4 class="modal-title">Edit Adviser</h4>   
                            </div>
                            <div class = "modal-body">
                                <div class="form-group">            
                                    <label>First name:</label>
                                    <input type="text" class="form-control" id="EFirstname">
                                    <div class="error" id="EFirstnameError"></div>
                                </div>
                                <div class="form-group">
                                    <label>Last name:</label>
                                    <input type="text" class="form-control" id="ELastname">
                                    <div class="error" id="ELastError"></div>
                                </div>
                                <div class="form-group">
                                    <label>Username:</label>
                                    <input type="text" class="form-control" id="EUsername">
                                    <div class="error" id="EUsernameError"></div>
                                </div>
                                <div class="form-group">
                                    <label>Password:</label> 
                                    <input type="text" class="form-control" id="EPassword" disable>
                                    <div class="error" id="EPasswordError"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="btnUpdate">Update</button> 
                                <button type="button" class="btn btn-default" id="btnAddClose" data-dismiss="modal">Close</button>                                             
                            </div>
                        </div>
                    </form>
                </div>
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

        <script src="js/student.js"></script>
        <script src="js/datatable.js"></script>
        
        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>    
        <script src='../custom-js/account.js'></script>
        <script src='../custom-js/alerts.js'></script>  
    </body>
</html>
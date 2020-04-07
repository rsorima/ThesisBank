<?php
    include("../config/connectdb.php");

    session_start();
    if (empty($_SESSION['uid'])) {header('location: ../index.php');}

    if(isset($_POST['addGroup'])) {
        
        $branchid = $_SESSION['branchid'];
        $sem = $_SESSION['sem'];
        $gname = $_POST['gname'];
        $grpSql = "INSERT into groups (name, program, sem, adviser) values('$gname', $branchid, $sem, 2)";
        $result = mysqli_query($con, $grpSql);
        echo $grpSql;
        header('location:groups.php');
        
    }
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
                                    <table id='tblGroup' class="table table-bordered table-hover table-custom">
                                        <thead>
                                            <tr>
                                                <th width="15%">Group Name</th>
                                                <th width="15%">Adviser Name</th>
                                                <th width="5%">No. of Students</th>
                                                <th width="12%">Action</th>
                                            </tr>
                                        </thead>
                                        <?php  
                                            $branchid = $_SESSION['branchid'];
                                            $query ="SELECT count(gu.user_id) as totalStudents ,g.id as group_id, g.name as group_name, g.adviser as adviser_id, g.program as branch_id from groups g left join group_members gu on g.id = gu.group_id where g.program = $branchid group by g.name";  
                                            $result = mysqli_query($con, $query);
                                            while($row = mysqli_fetch_array($result))  
                                            {  
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
                                                    <td>'.$row["group_name"].'</td>  
                                                    <td>'.$Aname.'</td>  
                                                    <td>'.$row["totalStudents"].'</td>  
                                                    <td><button class="btn btn-xs btn-primary btn-table" id="btnEditGroup" group_id='.$row['group_id'].' groupname="'.$row['group_name'].'" data-toggle="modal" style="width: 65px;">Edit Group</button>
                                                        <button class="btn btn-xs btn-danger btn-table" id="btnDeleteGroup" group_id='.$row['group_id'].' style="width: 65px;">Delete</button></td>  
                                               </tr>  
                                               ';  
                                            }  
                                        ?>
                                    </table>
                                </div>
                                <div class="box-footer">
                                    <!-- <button class="btn btn-success" data-toggle="modal" data-target="#modalAddAdmin"> <span class="fa fa-md fa-plus"></span> Add Admin </button> -->
                                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAddGroups"> <span class="fa fa-md fa-user-plus"></span> Add New Group </button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


            <!-- FOOTER -->
            <?php include('../includes/footer.php'); ?>
            <?php  //include("../includes/modals.php"); //FOOTER ?>
        
        <!-- ADD GROUP MODAL -->
        <div class="modal fade" id="modalAddGroups" role="dialog">
            <div class="modal-dialog modal-md">
                <form id="form-user" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"> &times; </button>
                            <h4 class="modal-title">Add Group</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <p class='gr-error-message'></p>
                                <label>Group name:</label>
                                <input type="text" class="form-control" id="txtGroup" placeholder="Enter Group Name*" name="gname">
                            </div>                
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" id="btnSubmitGroup" name="addGroup" value="Submit">
                            <button type="button" class="btn btn-default" id="btnAddClose" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- EDIT GROUP MODAL -->
            
        <div class="modal fade" id="modalEditGroups" role="dialog">
            <div class="modal-dialog modal-md">
                <form id="form-user">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"> &times; </button>
                            <h4 class="modal-title">Edit Group</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <p id='group-id' hidden></p>
                                <p class='gr-error-message'></p>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <input type="text" class="form-control" id="txtGroupName" placeholder="Enter Group Name*">
                                    </div>
                                    <div class='col-md-4'>
                                        <button type="button" class="btn btn-success" id="btnUpdateGroupName">Update</button>
                                    </div>
                                </div>
                                <hr>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <select class='form-control selectAdviser'>
                                            <option value=''>--------------- Select Adviser -----------------</option>
                                        </select>
                                    </div>
                                    <div class='col-md-4'>
                                        <button type="button" class="btn btn-primary btnSelectAdviser">Select Adviser</button>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <select class='form-control selectStudent'>
                                        <option value=''>--------------- Select Student -----------------</option>
                                    </select>
                                </div>

                                <div class='col-md-3'>
                                    <button type='button' class='btn btn-primary form-control addToMembers'>Add to members</button>
                                </div>
                                <div class='col-md-12'>
                                    <hr>
                                    <label>Adviser</label>
                                    <ul class="list-group adviserList">
                                    </ul>
                                </div>
                                <div class='col-md-12'>
                                    <label>Members <span id='member-count'>(0)<span></label>
                                    <ul class="list-group membersList">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="btnGroupClose">Close</button>
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

         <!-- Custom JS  -->
        <script src="js/groups.js"></script>
        <script>
            $(document).ready(function(){  
                $('#tblGroup').DataTable();  
                
            });
            
        </script>
<!--        <script src="js/datatable.js"></script>-->

        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>
        <script src='../custom-js/account.js'></script>
        <script src='../custom-js/alerts.js'></script>  
    </body>
</html>
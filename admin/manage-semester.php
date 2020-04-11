<?php
	include("../config/connectdb.php");

    session_start();
    if (empty($_SESSION['uid'])) {header('location: ../index.php');}

    if(isset($_POST['addUser'])) {
        $semtype = $_POST["semtype"];
        $semyear = $_POST["semyear"];
        $endyear = intval($semyear) + 1;
        
        $sem_sql = "SELECT * FROM sem_type WHERE id = $semtype";
        $sem_res = mysqli_query($con, $sem_sql);
        $sem_info = mysqli_fetch_assoc($sem_res); 
        $desc = $sem_info['description'] . " SY: " . $semyear . "-" . $endyear;

        $sql = "INSERT INTO semester (type, start_sy, end_sy, description, active) VALUES ($semtype, $semyear, $endyear, '$desc', 0)";
        mysqli_query($con, $sql);
        header("location:manage-semester.php");
    }

    if(isset($_POST['editUser'])) {
        
        $semtype = $_POST["semtype"];
        $semyear = $_POST["semyear"];
        $endyear = intval($semyear) + 1;
        $semid = $_POST['semid'];
        $active = $_POST['active'];
        
        $sem_sql = "SELECT * FROM sem_type WHERE id = $semtype";
        $sem_res = mysqli_query($con, $sem_sql);
        $sem_info = mysqli_fetch_assoc($sem_res);
        $desc = $sem_info['description'] . " SY: " . $semyear . "-" . $endyear;

        $sql = "UPDATE semester SET type = $semtype, start_sy = $semyear, end_sy = $endyear, description = '$desc', Active = $active WHERE id = $semid";
//        echo $sql;
        mysqli_query($con, $sql);
        header("location:manage-semester.php");
    }
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

            <!-- MAIN CONTENT -->
            <section class="content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info border-blue">
                            <div class="box-header with-border">
                                <h4>Semesters</h4>
                            </div>
                            <div class="box-body">
                                <table id="tableUsers" class="table table-bordered table-hover table-custom">
                                    <thead>
                                        <tr>
                                            <th width="3%">Semester ID</th>
                                            <th width="15%">Description</th>
                                            <th width="12%">Action</th>
                                            <th width="12%">Status</th>
                                        </tr>
                                    </thead>
                                    <?php  
                                        $query ="SELECT * FROM semester";  
                                        $result = mysqli_query($con, $query);
                                        while($row = mysqli_fetch_array($result))  
                                        {  
                                            $desc = $row["description"];
                                           echo '  
                                           <tr>  
                                                <td>'.$row[0].'</td>  
                                                <td>'.$row["description"].'</td>    
                                                <td><button class="btn btn-xs btn-primary btn-table" data-toggle="modal" data-target="#modalEditUser" id="btnEdit" uid='.$row[0].' desc="'.$desc.'" type='.$row["type"].' start_sy='.$row["start_sy"].' style="width: 65px;">Edit</button><a href="php/delete-sem.php?sem_id='.$row[0].'" class="btn btn-xs btn-danger btn-table" id="btnDelete" sem_id='.$row[0].' style="width: 65px;">Delete</a></td>
                                                <td>';
                                            if($row['Active'] != 1) {
                                                echo '<a href="php/update-semactive.php?sem_id='.$row[0].'" class="btn btn-xs btn-danger btn-table" id="btnActive" sem_id='.$row[0].' style="width: 65px;background-color:#53bd59 !important;border-color:#53bd59 !important">Set Active</a>';
                                            }else {
                                                echo '<p class="badge badge-success" id="btnActive" sem_id='.$row[0].' style="width: 65px;background-color:#52686b !important;border-color:#52686b !important">Active</p>';
                                            }
                                           echo '</td>  
                                           </tr>  
                                           ';  
                                        }  
                                    ?>
                                </table>
                            </div>
                            <div class="box-footer">
                                <!-- <button class="btn btn-success" data-toggle="modal" data-target="#modalAddAdmin"> <span class="fa fa-md fa-plus"></span> Add Admin </button> -->
                                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAddUser"> <span class="fa fa-md fa-user-plus"></span> Add Semester </button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- ADD USER MODAL -->
        <div class="modal fade" id="modalAddUser" role="dialog">
            <div class="modal-dialog modal-md">
                <form id="form-user" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"> &times; </button>
                            <h4 class="modal-title">Add Semester</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Semester Type:</label>
                                <select class="form-control" id="Utype" name="semtype">
                                    <option value="0" disabled selected hidden>Select Semester Type*</option>
                                    <?php require("php/semester-type.php");?>
                                </select>
                                <div class="error" id="UtypeError"></div>
                            </div>
                            <div class="form-group">
                                <label>Year:</label>
                                <select class="form-control" id="Course" name="semyear">
                                    <option value="0" disabled selected hidden>Select Year*</option>
                                    <?php require("php/sem-year.php"); ?>
                                </select>
                                <div class="error" id="CourseError"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" id="btnSubmit" name="addUser" value="Add User">
                            <button type="button" class="btn btn-default" id="btnAddClose" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- EDIT USER MODAL -->
        <div class="modal fade" id="modalEditUser" role="dialog">
            <div class="modal-dialog modal-md">
                <form id="form-edituser" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"> &times; </button>
                            <h4 class="modal-title">Update Semester Info</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Semester Type:</label>
                                <select class="form-control" id="Utype" name="semtype">
                                    <option value="0" disabled selected hidden>Select Semester Type*</option>
                                    <?php require("php/semester-type.php");?>
                                </select>
                                <div class="error" id="UtypeError"></div>
                            </div>
                            <div class="form-group">
                                <label>Year:</label>
                                <select class="form-control" id="Course" name="semyear">
                                    <option value="0" disabled selected hidden>Select Year*</option>
                                    <?php require("php/sem-year.php"); ?>
                                </select>
                                <div class="error" id="CourseError"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="semid" id="semid">
                            <input type="hidden" name="active" id="active">
                            <input type="submit" class="btn btn-primary" name="editUser" value="Update">
                            <button type="button" class="btn btn-default" id="btnEditClose" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- FOOTER -->
        <?php include('../includes/footer.php'); ?>
        <?php // include("../includes/modals.php"); //FOOTER ?>
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

<!--    <script src="js/user.js"></script>-->
    <script>  
         $(document).ready(function(){  
            $('#tableUsers').DataTable();  
             
            $(document).on('click', '#btnEdit', function(){      
            var uid = $(this).attr("uid");
            var desc = $(this).attr("desc");
            var type = $(this).attr("type");
           $.ajax({  
                url:"php/fetch-sem.php?uid="+uid,  
                method:"GET",  
                data:{uid: uid},  
                dataType:"json",  
                success:function(data){
                    
                    $("#Utype option").each(function(){
                        if ($(this).val() == data.type)
                        $(this).attr("selected","selected");
                    });
                    $("#Course option").each(function(){
                        if ($(this).val() == data.start_sy)
                        $(this).attr("selected","selected");
                    });

                     $('#semid').val(data.id);  
                    $('#active').val(data.Active);
                    $('#modalEditUser').modal('show');  
                }  
               });  
            });
     });  
    </script>

    <!-- AdminLTE App -->
    <script src="../template/dist/js/adminlte.min.js"></script>
    <script src='../custom-js/account.js'></script>
    <script src='../custom-js/alerts.js'></script>
</body>
</html>
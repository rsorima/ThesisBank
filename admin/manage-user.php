<?php
	include("../config/connectdb.php");

    session_start();
    if (empty($_SESSION['uid'])) {header('location: ../index.php');}

    if(isset($_POST['addUser'])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $utype = $_POST["usertype"];
        $Scourse = $_POST["course"];
        $uname = $_POST["uname"];
        $pword = $_POST["pword"];

        $sqlsem = "SELECT * FROM semester WHERE active = 1";
        $res = mysqli_query($con, $sqlsem);
        while($row = mysqli_fetch_assoc($res)) {
            $sem = $row['id'];
        //    echo $sem;
        }

        // INSERT DATA QUERY
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO users (firstname, lastname, role, username, password, program, date_created, sem) VALUES (:fname, :lname, :utype, :uname, :pword, :Scourse, now(), $sem)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':fname', $fname);
        $stmt->bindValue(':lname', $lname);
        $stmt->bindValue(':utype', $utype);
        $stmt->bindValue(':Scourse', $Scourse);
        $stmt->bindValue(':uname', $uname);
        $stmt->bindValue(':pword', $pword);
        $stmt->execute();
        header("location:manage-user.php");
    }

    if(isset($_POST['editUser'])) {
        
        $editfname = $_POST["efname"];
        $editlname = $_POST["elname"];
        $editusername = $_POST["euname"];
        $editpassword = $_POST["epword"];
		$userid = $_POST["userid"];   

        //update flag 
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE users SET 
        firstname = :editfname,
        lastname = :editlname,
        username = :editusername,
        password = :editpassword
        WHERE id = :userid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':editfname', $editfname);
        $stmt->bindValue(':editlname', $editlname);
        $stmt->bindValue(':editusername', $editusername);
        $stmt->bindValue(':editpassword', $editpassword);
        $stmt->bindValue(':userid', $userid);
        $stmt->execute();
        header("location:manage-user.php");
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
                                <h4>User Management</h4>
                            </div>
                            <div class="box-body">
                                <table id="tableUsers" class="table table-bordered table-hover table-custom">
                                    <thead>
                                        <tr>
                                            <th width="15%">User ID</th>
                                            <th width="15%">Name</th>
                                            <th width="15%">Course</th>
                                            <th width="12%">Status</th>
                                            <th width="12%">Action</th>
                                        </tr>
                                    </thead>
                                    <?php  
                                        $query ="SELECT u.id, u.firstname AS Fname, u.lastname AS Lname, u.username, u.password, u.role, u.program, u.status, b.id, b.code from users u inner join programs b on u.program = b.id";  
                                        $result = mysqli_query($con, $query);
                                        while($row = mysqli_fetch_array($result))  
                                        {  
                                            if ($row['status'] == 0 ) {
                                                $status = "<span class='fa fa-circle offline'></span> Offline";
                                            } else if ($row['status'] == 1) {
                                                $status = "<span class='fa fa-circle online'></span> Online";
                                            }
                                           echo '  
                                           <tr>  
                                                <td>'.$row[0].'</td>  
                                                <td>'.$row["Fname"]. " " .$row["Lname"].'</td>  
                                                <td>'.$row["code"].'</td>  
                                                <td>'.$status.'</td>  
                                                <td><button class="btn btn-xs btn-primary btn-table" id="btnEdit" userid='.$row[0].' fname='.$row["Fname"].' lname='.$row["Lname"].' uname='.$row["username"].' pword='.$row["password"].' style="width: 65px;">Edit</button><a href="php/delete-user.php?userid='.$row[0].'" class="btn btn-xs btn-danger btn-table" id="btnDelete" userid='.$row[0].' style="width: 65px;">Delete</a></td>  
                                           </tr>  
                                           ';  
                                        }  
                                    ?>
                                </table>
                            </div>
                            <div class="box-footer">
                                <!-- <button class="btn btn-success" data-toggle="modal" data-target="#modalAddAdmin"> <span class="fa fa-md fa-plus"></span> Add Admin </button> -->
                                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAddUser"> <span class="fa fa-md fa-user-plus"></span> Add User </button>
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
                            <h4 class="modal-title">Add User</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>First name:</label>
                                <input type="text" class="form-control" id="txtFirstname" placeholder="Enter first name*" name="fname">
                                <div class="error" id="txtFirstnameError"></div>
                            </div>
                            <div class="form-group">
                                <label>Last name:</label>
                                <input type="text" class="form-control" id="txtLastname" placeholder="Enter last name*" name="lname">
                                <div class="error" id="txtLastError"></div>
                            </div>
                            <div class="form-group">
                                <label>User Type:</label>
                                <select class="form-control" id="Utype" name="usertype">
                                    <option value="0" disabled selected hidden>Select User Type*</option>
                                    <?php require("php/user-type.php");?>
                                </select>
                                <div class="error" id="UtypeError"></div>
                            </div>
                            <div class="form-group">
                                <label>Course:</label>
                                <select class="form-control" id="Course" name="course">
                                    <option value="0" disabled selected hidden>Select Course*</option>
                                    <?php require("php/fetch-course-option.php"); ?>
                                </select>
                                <div class="error" id="CourseError"></div>
                            </div>
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" class="form-control" id="txtUsername" placeholder="Enter Username*" name="uname">
                                <div class="error" id="txtUsernameError"></div>
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" class="form-control" id="txtPassword" placeholder="Enter Password*" name="pword">
                                <div class="error" id="txtPasswordError"></div>
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
                            <h4 class="modal-title">Update Adviser</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>First name:</label>
                                <input type="text" class="form-control" id="EFirstname" name="efname">
                                <div class="error" id="EFirstnameError"></div>
                            </div>
                            <div class="form-group">
                                <label>Last name:</label>
                                <input type="text" class="form-control" id="ELastname" name="elname">
                                <div class="error" id="ELastError"></div>
                            </div>
                            <div class="form-group">
                                <label>User ID:</label>
                                <input type="text" class="form-control" id="EUsername" name="euname">
                                <div class="error" id="EUsernameError"></div>
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" class="form-control" id="EPassword" name="epword">
                                <div class="error" id="EPasswordError"></div>
                                <input type="checkbox" id="cbShowPassword" />Show password
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="userid" id="euserid">
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
           var userid = $(this).attr("userid");
           $.ajax({  
                url:"php/fetch-user.php",  
                method:"POST",  
                data:{userid: userid},  
                dataType:"json",  
                success:function(data){ 
                     $('#EFirstname').val(data.firstname);  
                     $('#ELastname').val(data.lastname);  
                     $('#EUsername').val(data.username);  
                     $('#EPassword').val(data.password);
                     $('#euserid').val(data.id);  
                     $('#modalEditUser').modal('show');  
                }  
               });  
            });
             $('#cbShowPassword').click(function () {
                $('#EPassword').attr('type', $(this).is(':checked') ? 'text' : 'password');
            })
     });  
    </script>

    <!-- AdminLTE App -->
    <script src="../template/dist/js/adminlte.min.js"></script>
    <script src='../custom-js/account.js'></script>
    <script src='../custom-js/alerts.js'></script>
</body>
</html>
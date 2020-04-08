<?php
	include("../config/connectdb.php");

    session_start();
    if (empty($_SESSION['uid'])) {header('location: ../index.php');}
    $branchid = $_SESSION['branchid'];
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
<?php 
    require_once('../config/connection.php');

    $pdo = tdbDatabase::connect();
    $prompt_message = '';

    $result = '';

    /*if(!empty($_FILES)){
        $targetfolder = "testupload/";
        $targetfolder = $targetfolder . basename( $_FILES['thesis_file']['name']) ;
        $thesis_name = !empty($_POST['thesis_name']) ? $_POST['thesis_name'] : '';
        $thesis_year = !empty($_POST['thesis_year']) ? $_POST['thesis_year'] : '';
        $thesis_program = !empty($_POST['program']) ? $_POST['program'] : '';
        $thesis_achievement = !empty($_POST['thesis_achievement']) ? implode(',', $_POST['thesis_achievement']) : '';

    if(move_uploaded_file($_FILES['thesis_file']['tmp_name'], $targetfolder)){
        $sql = "INSERT INTO tdb_thesis (reference_key_admin, reference_key_students, thesis_name, thesis_year, thesis_program, thesis_pdf_file, thesis_achievement, thesis_timestamp) VALUES (1,1,'".$thesis_name."','".$thesis_year."','".$thesis_program."', '".$_FILES['thesis_file']['name']."','".$thesis_achievement."','".strtotime('now')."')";
        $stmt= $pdo->prepare($sql);
        $stmt->execute();
    }
    else {
        echo "Problem uploading file";
    }
}*/

    if(!empty($_GET['action']) && !empty($_GET['id']) && $_GET['action'] == 'delete'){
        $sql = 'DELETE  FROM tdb_thesis where id = '.$_GET['id'];
        $pdo->query($sql)->fetchAll();
        $prompt_message = '#'.$_GET['id'].' has beed deleted.';
    }

    $thesis_list = '';
/*
<<<<<<< HEAD*/
//    $sql = 'SELECT a.id, a.reference_key_admin, a.reference_key_students, a.thesis_name, a.thesis_year, b.branch_name as thesis_program, a.thesis_pdf_file, a.thesis_timestamp FROM tdb_thesis as a JOIN branches as b ON b.branchid = a.branchid';
//    $thesis_list = $pdo->query($sql)->fetchAll();
//=======
/*    $sql = 'SELECT a.id, a.reference_key_admin, a.reference_key_students, a.thesis_name, a.thesis_year, b.branch_name as thesis_program, a.thesis_pdf_file, a.thesis_timestamp FROM tdb_thesis as a JOIN branches as b ON b.branchid = a.branchid';*/
    $sql = "SELECT * FROM thesis_table WHERE course = $branchid";
    $thesis_list = $pdo->query($sql)->fetchAll();
//>>>>>>> 5251feaebdf3bd5e7ae9b5db96462ed9d61cc8dd

    tdbDatabase::disconnect();
?>

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
                            <div class="box-body">
                                    <table id="tblThesis">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="10%">Thesis Number</th>
                                                <th scope="col" width="40%">Thesis Article Title</th>
                                                <th scope="col" width="10%">year</th>
                                                <th scope="col" width="30%">program</th>
                                                <th scope="col" width="20%">Date</th>
                                                <th scope="col" width="10%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                                if(!empty($thesis_list)){
                                                                    foreach ($thesis_list as $v) {
                                                                    ?>
                                            <tr>
                                                <td scope="row"><?php print $v['id']; ?></td>
                                                <td><?php print $v['thesis_name']; ?></td>
                                                <td><?php print $v['thesis_year']; ?></td>
                                                <td>
                                                    <?php 
                                                        $course_sql = "SELECT * FROM programs WHERE id = ".$v['course']."";
                                                        $course_res = mysqli_query($con, $course_sql);
                                                        while($row = mysqli_fetch_assoc($course_res)) {
                                                            echo $row['description'];
                                                        }
                                                    ?>
                                                </td>
                                                <td><?php print $v['date_created']; ?></td>
                                                <td><a href="view-thesis.php?id=<?php print $v['id']; ?>">View</a> </td>
                                            </tr>
                                            <!--<div class="col-lg-3 col-md-3 col-item-thesis col-item-thesis-<?php print $v['id']; ?>">
                                                                        <div class="card">
                                                                            <div class="el-card-item">
                                                                                <a href="view-thesis.php?id=<?php print $v['id']; ?>">
                                                                                    <div class="el-card-avatar el-overlay-1"> 
                                                                                        <img class="img-responsive" src="images/thesis-pdf-placeholder.png" alt="user">
                                                                                    </div>
                                                                                    <div class="el-card-content">
                                                                                        <h4 class="m-b-0"><?php print $v['thesis_name']; ?></h4>
                                                                                        <p>
                                                                                            <strong>Thesis year:</strong> <?php print $v['thesis_year']; ?><br/>
                                                                                            <strong>Thesis program:</strong> <?php print $v['course']; ?><br/>
                                                                                            <strong>Date:</strong> <?php print date('Y-m-d', $v['date_created']);//print date('Y-m-d', strtotime($v['thesis_timestamp'])); ?>
                                                                                        </p>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>-->
                                            <?php
                                                                    }
                                                                }
                                                                else {
                                                                    ?>
                                            <p class="alert alert-info">Thesis directory is empty.</p>
                                            <?php
                                                                }
                                                            ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                </div>
        </div>
                
        </section>
            
        </div>
               
        
        <!-- FOOTER -->
        <?php include('../includes/footer.php');?>
        <?php  include("../includes/modals.php"); //FOOTER ?>

        
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

        <script src="js/thesisfile.js"></script>
        <script>
            $(document).ready(function(){  
                $('#tblThesis').DataTable();  
                
            });
        </script>
<!--        <script src="js/datatable.js"></script>-->

        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>

        <script src='../custom-js/account.js'></script>
        <script src='../custom-js/alerts.js'></script>
</body>

</html>
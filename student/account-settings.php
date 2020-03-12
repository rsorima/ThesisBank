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
<?php 
    require_once('../config/connection.php');

    $pdo = tdbDatabase::connect();
    $prompt_message = '';

    $result = '';

    if(!empty($_FILES)){
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
}

    if(!empty($_GET['action']) && !empty($_GET['id']) && $_GET['action'] == 'delete'){
        $sql = 'DELETE  FROM tdb_thesis where id = '.$_GET['id'];
        $pdo->query($sql)->fetchAll();
        $prompt_message = '#'.$_GET['id'].' has beed deleted.';
    }

    $thesis_list = '';

    $sql = 'SELECT * FROM tdb_thesis';
    $thesis_list = $pdo->query($sql)->fetchAll();


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
                <section class="content-header">
                    <h3> Thesis Files</h3>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Thesis Files</li>
                    </ol>
                </section>
                <!-- MAIN CONTENT -->
                <section class="content">

                <div class="row">
                        <div class = "col-md-12">
                            <div class="box box-info border-blue">
                                    <div class="box-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                                <label>Student ID:</label>
                                                <input type="text" class="form-control" value="<?php print !empty($result[0]['thesis_name']) ? $result[0]['thesis_name'] : ''; ?>" name="thesis_name" required disabled/>
                                            </div>
                                            <div class="form-group">
                                                <label>Student Name:</label>
                                                <input type="text" class="form-control" value="<?php print !empty($result[0]['thesis_name']) ? $result[0]['thesis_name'] : ''; ?>" name="thesis_name" required />
                                            </div>
                                            <div class="form-group">
                                            <label>Password:</label>
                                                <input type="password" class="form-control" value="<?php print !empty($result[0]['thesis_name']) ? $result[0]['thesis_name'] : ''; ?>" name="thesis_name" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Course:</label> 
                                                    <select class="form-control" id="selectCourse" branchid="<?php echo $_SESSION['branchid']; ?>" value="<?php echo $_SESSION['roomname']; ?>" style="padding: 0px 5px 0px 5px !important;" disabled> 
                                                        <option value="0" disabled selected hidden>Select Course</option>
                                                        <?php require("../admin/php/fetch-course-option.php"); ?>
                                                    </select> 
                                                    <div class="error" id="selectCourseError"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Submit"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>

                        
                        </div>
                    </section>
                </div>


                <!-- FOOTER -->
                <?php include('../includes/footer.php');?>
                <?php  include("../includes/modals.php"); //FOOTER ?>
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
        <script src="js/datatable.js"></script>
        
        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>    
        <script src='../custom-js/account.js'></script>
        <script src='../custom-js/alerts.js'></script>  
    </body>
</html>
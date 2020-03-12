<?php
	include("../config/connectdb.php");

    session_start();
    if (empty($_SESSION['uid'])) {header('location: ../index.php');}

    $branchid=$_SESSION['branchid'];

    $result = '';
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

    if(!empty($_POST)){
        $targetfolder = "testupload/";
        $course = !empty($_POST['course']) ? $_POST['course'] : '';
        $targetfolder = $targetfolder . basename( $_FILES['thesis_file']['name']) ;
        $thesis_name = !empty($_POST['thesis_name']) ? $_POST['thesis_name'] : '';
        $thesis_year = !empty($_POST['thesis_year']) ? $_POST['thesis_year'] : '';
        $thesis_program = !empty($_POST['course']) ? $_POST['course'] : '';
        $thesis_achievement = !empty($_POST['thesis_achievement']) ? implode(',', $_POST['thesis_achievement']) : '';
        $sql = '';

        if(move_uploaded_file($_FILES['thesis_file']['tmp_name'], $targetfolder)){
            $sql = 'UPDATE tdb_thesis
                SET thesis_name = "'.$thesis_name.'", thesis_year = "'.$thesis_year.'", thesis_program = "'.$thesis_program.'", branchid = '.$thesis_program.', thesis_pdf_file = "'.$_FILES['thesis_file']['name'].'"
                WHERE id = '.$_GET['id'];
        }
        else{
            $sql = 'UPDATE tdb_thesis
                SET thesis_name = "'.$thesis_name.'", thesis_year = "'.$thesis_year.'", thesis_program = "'.$thesis_program.'", branchid = '.$thesis_program.' 
                WHERE id = '.$_GET['id'];
        }


        $stmt= $pdo->prepare($sql);
        $stmt->execute();
        $prompt_message = '<p class="alert alert-success">Thesis Succefully Save</p>';

        /*if(move_uploaded_file($_FILES['thesis_file']['tmp_name'], $targetfolder)){
            $sql = "INSERT INTO tdb_thesis (reference_key_admin, reference_key_students, thesis_name, thesis_year, thesis_program, thesis_pdf_file, thesis_achievement, thesis_timestamp, branchid) VALUES (1,1,'".$thesis_name."','".$thesis_year."','".$thesis_program."', '".$_FILES['thesis_file']['name']."','".$thesis_achievement."','".strtotime('now')."', '$course')";
            $stmt= $pdo->prepare($sql);
            $stmt->execute();
            $prompt_message = '<p class="alert alert-success">Thesis Succefully Save</p>';
        }
        else {
            $prompt_message = '<p class="alert alert-error">Problem uploading file</p>';
        }*/
    }

    if(!empty($_GET['action']) && !empty($_GET['id']) && $_GET['action'] == 'delete'){
        $sql = 'DELETE  FROM tdb_thesis where id = '.$_GET['id'];
        $pdo->query($sql)->fetchAll();
        $prompt_message = '<p class="alert alert-info">#'.$_GET['id'].' has beed deleted.</p>';
    }



    $sql = 'SELECT * FROM tdb_thesis where id = '.$_GET['id'];
    $result = $pdo->query($sql)->fetchAll();
    $course = !empty($result[0]['thesis_program']) ? (int)$result[0]['thesis_program'] : '';

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
                        <div class = "col-md-12">
                            <div class="box box-info border-blue">
                                    <div class="box-body">
                                        <?php print $prompt_message; ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Project Name:</label>
                                                <input type="text" class="form-control" value="<?php print !empty($result[0]['thesis_name']) ? $result[0]['thesis_name'] : ''; ?>" name="thesis_name" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Thesis Year</label>
                                                <?php if(!empty($result[0]['thesis_year'])){?>
                                                    <select class="form-control" name="thesis_year">
                                                        <option <?php print $result[0]['thesis_year'] == '2010' ? 'selected' : ''; ?> value="2010">2010</option>
                                                        <option <?php print $result[0]['thesis_year'] == '2011' ? 'selected' : ''; ?> value="2011">2011</option>
                                                        <option <?php print $result[0]['thesis_year'] == '2012' ? 'selected' : ''; ?> value="2012">2012</option>
                                                        <option <?php print $result[0]['thesis_year'] == '2013' ? 'selected' : ''; ?> value="2013">2013</option>
                                                        <option <?php print $result[0]['thesis_year'] == '2014' ? 'selected' : ''; ?> value="2014">2014</option>
                                                        <option <?php print $result[0]['thesis_year'] == '2015' ? 'selected' : ''; ?> value="2015">2015</option>
                                                        <option <?php print $result[0]['thesis_year'] == '2016' ? 'selected' : ''; ?> value="2016">2016</option>
                                                        <option <?php print $result[0]['thesis_year'] == '2017' ? 'selected' : ''; ?> value="2017">2017</option>
                                                        <option <?php print $result[0]['thesis_year'] == '2018' ? 'selected' : ''; ?> value="2018">2018</option>
                                                        <option <?php print $result[0]['thesis_year'] == '2019' ? 'selected' : ''; ?> value="2019">2019</option>
                                                        <option <?php print $result[0]['thesis_year'] == '2020' ? 'selected' : ''; ?> value="2020">2020</option>
                                                        <option <?php print $result[0]['thesis_year'] == '2021' ? 'selected' : ''; ?> value="2021">2021</option>
                                                    </select>
                                                <?php }
                                                else {
                                                    ?>
                                                    <select class="form-control" name="thesis_year">
                                                        <option value="2010">2010</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                    </select>
                                                <?php } ?>    
                                            </div>
                                            <div class="form-group">
                                                <label>Course:</label> 
                                                <?php 
                                                    $sql = "SELECT * FROM branches";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->execute(); 
                                                    $branch = $stmt->fetchAll();
                                                ?>
                                                <select name='course' class="form-control" id="selectCourse" branchid="<?php echo $_SESSION['branchid']; ?>" value="<?php echo $_SESSION['roomname']; ?>" style="padding: 0px 5px 0px 5px !important;"> 
                                                    <option value="0" disabled hidden>Select Course</option>
                                                    <?php
                                                        foreach ($branch as $row) {
                                                            $selected = $row['branchid'] == $course ? 'selected="selected"' : '';

                                                            echo "<option ".$selected." value=".$row["branchid"].">" .$row["branch_name"].  "</option>";
                                                        }
                                                    ?>
                                                </select> 
                                                <div class="error" id="selectCourseError"></div>
                                            </div>
                                            <div class="form-group">
                                                <label>File Upload</label>
                                                <div class="custom-file">
                                                    <input  name="thesis_file" type="file" class="custom-file-input">
                                                    <label class="custom-file-label" for="validatedCustomFile"></label>
                                                    <?php if(!empty($result[0]['thesis_pdf_file'])) : ?>
                                                        <div class="description" style="text-align: right;margin-top: 10px;text-decoration: underline;"><a target="_blank" href="testupload/<?php print $result[0]['thesis_pdf_file']; ?>"><?php print $result[0]['thesis_pdf_file']; ?></a></div>
                                                    <?php endif; ?>
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
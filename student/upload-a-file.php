<?php
	include("../config/connectdb.php");

    session_start();
    if (empty($_SESSION['uid'])) {header('location: ../index.php');}

    $branchid=$_SESSION['branchid'];
    $userid = $_SESSION['uid'];
    $sem = $_SESSION['sem'];
    $adviser_id = "";
    $group_id = "";
    $getGroup = "SELECT group_id from group_members where user_id = '$userid'";
    $resultGroup = mysqli_query($con, $getGroup);

    if(mysqli_num_rows($resultGroup) > 0)
    {
            while($row_group = $resultGroup -> fetch_assoc())
        {
            $group_id = $row_group['group_id'];
        }

        $get_group_detail = "SELECT adviser from groups where id = '$group_id'";
        $resultGroupDetail = mysqli_query($con, $get_group_detail);

        if(mysqli_num_rows($resultGroupDetail) > 0)
        {
            while($row_group_detail = $resultGroupDetail -> fetch_assoc())
            {
                $adviser_id = $row_group_detail['adviser'];
            }
        }
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
    <style>
        .hide-element 
        { 
            display: none;
        }
    </style>
<?php 
    require_once('../config/connection.php');

    $pdo = tdbDatabase::connect();
    $prompt_message = '';

    $result = '';

    if(!empty($_FILES))
    {
        $report = $_FILES['thesis_file']['name'];
        $type = $_POST['type'];
        $event_id = $_POST['event'];
        $targetfolder = "testupload/";
        $targetfolder = $targetfolder . basename( $_FILES['thesis_file']['name']) ;

        if(move_uploaded_file($_FILES['thesis_file']['tmp_name'], $targetfolder))
    {   
            $sql = "INSERT INTO report (group_id, report_filename, report_type, date_created, sem_id, event_id, status) VALUES ($group_id, '$targetfolder',$type, now(), $sem, $event_id, 1)";
            $stmt= $pdo->prepare($sql);
            $stmt->execute();
            $prompt_message = '<p class="alert alert-success">Report Succesfully Sent</p>';
        //// Alerts
            $alertType = "report";
            $message = "A group sent a ".$type.". Check them now!";
            $link = $type == "Status Report" ? "statusreport.php" : "journalreport.php";
            $save_details = "INSERT into alert_details (alertType, message, link) values ('$alertType','$message','$link')";
            $alert_detail_result = mysqli_query($con, $save_details);

            $alertDetailId = mysqli_insert_id($con);

            $send_alert = "INSERT into alerts (alertDetailsId, userId) values ('$alertDetailId', '$adviser_id')";
            $send_result = mysqli_query($con, $send_alert);
    ////
//        }
    }
    else 
    {
        $prompt_message = '<p class="alert alert-error">Problem uploading file</p>';
    }
}

    if(!empty($_GET['action']) && !empty($_GET['id']) && $_GET['action'] == 'delete')
    {
        $sql = 'DELETE  FROM tdb_thesis where id = '.$_GET['id'];
        $pdo->query($sql)->fetchAll();
        $prompt_message = '<p class="alert alert-info">#'.$_GET['id'].' has beed deleted.</p>';
    }

    $thesis_list = '';

//    $sql = 'SELECT * FROM tdb_thesis';
//    $thesis_list = $pdo->query($sql)->fetchAll();


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
                                            <form class='' action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Report Type: </label>
                                                    <select class='form-control report-type' name='type'>
                                                        <option value="1">Status Report</option>
                                                        <option value="2">Journal Report</option>
    <!--                                                    <option value="3">Documentation</option>-->
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Progress Schedule: </label>
                                                    <select class='form-control report-type' name='event'>
                                                        <?php require("php/schedule.php"); ?>
                                                    </select>
                                                </div>
                                                <div class="form-group file-upload">
                                                    <label>File Upload</label>
                                                    <div class="custom-file">
                                                        <input  name="thesis_file" type="file" class="custom-file-input" required>
                                                    </div>
                                                </div>
                                                <div class="form-group btn-submit">
                                                    <input type="submit" class="btn btn-primary" value="Submit">
                                                    <div class="clearfix"></div>
                                                </div>
                                            </form>
                                            <div class= 'container shareable-container hide-element'>
                                                <div class="row">
                                                <div class='col-md-12'>
                                                        <label>Document Title</label>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <input type="text" class="form-control input-document-title" placeholder="Input your thesis title here"/>
                                                    </div>
                                                    <div class='col-md-12'>
                                                    <br>
                                                        <label>Shareable Link of Document</label>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <input type="text" class="form-control input-link" placeholder="Input your shareable link here"/>
                                                    </div>
                                                    <div class='col-md-12'>
                                                    <br>
                                                        <input type="submit" class="btn btn-primary send-link" value="Send this link">
                                                    </div>
                                                </div>
                                                <div class="container">
                                                    <br>
                                                    <strong><p style="color: black;">Before sending the document link:</p></strong>
                                                    <ol class="number list">
                                                        <li class="text1"style="color: black;"><p>Upload the file to google drive.</p> </li>
                                                        <li class="text2"style="color: black;" ><p>Set the file sharing to available to anyone.</p> </li>
                                                        <li class= "text3"style="color: black;"><p>Get the shareable link.</p> </li>
                                                        <li class= "text4" style="color: black;"><p>Paste the link in the field above.</p> </li>
                                                        <li class= "text5" style="color: black;"><p>Click the button to send link to adviser.</p> </li>
                                                    </ol>
                                                </div>

                                            </div>
                                        </div>
                                </div>
                            </div>
                    </div>
                </section>
                <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info border-blue">
                            <div class="box-header with-border">
                                <h4>Reports</h4>
                            </div>
                            <div class="box-body">

                                <table id="tblThesis" class="table table-bordered table-hover table-custom">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="20%">Report ID</th>
                                            <th scope="col" width="40%">Report Filename</th>
                                            <th scope="col" width="20%">Date Submitted</th>
                                            <th scope="col" width="20%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $report_sql = "SELECT * FROM report WHERE group_id = $group_id";
                                        $reports_list = mysqli_query($con, $report_sql);
                                    if(!empty($reports_list)){
                                        foreach ($reports_list as $v) {
                                        ?>
                                        <tr>
                                            <td scope="row"><?php print $v['id']; ?></td>
                                            <td><?php  ;
                                                echo str_replace("testupload/","",$v['report_filename']);
                                                ?></td>
                                            <td><?php print $v['date_created']; ?></td>
                                            <td><center><?php
                                                    if($v['status'] == 1) {
                                                        echo '<span class="badge badge-dark" style="padding:10px; font-size:11px!important;">Submitted</span>';
                                                    }else if($v['status'] == 2) {
                                                        echo '<span class="badge badge-success" style="padding:10px; font-size:11px!important;color:#fff;background-color: #dc3545"">Declined</span>';
                                                    }else if($v['status'] == 3) {
                                                        echo '<span class="badge badge-success" style="padding:10px; font-size:11px!important;color:#fff;background-color: #28a745"">Approved</span>';
                                                    }
                                                ?>
                                                </center>
                                            </td>
                                        </tr>
                                        
                                        <?php
                                        }
                                    }
                                    else {
                                        ?>
                                        <p class="alert alert-info">No Report Submitted.</p>
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
            <script>
                $(document).ready(function(){  
                    $('#tblThesis').DataTable();  

                });
            </script>
        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>    
        <script src='../custom-js/account.js'></script>
        <script src='../custom-js/alerts.js'></script> 

        <script src='js/upload-file.js'></script>  
    </body>
</html>
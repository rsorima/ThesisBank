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
        if($type == 1) {
            $report_type = "Status Report";
            $link = "statusreport.php";
        }else if($type == 2) {
            $report_type = "Journal Report";
            $link = "journalreport.php";
        }else if($type == 3) {
            $report_type = "Documentation";
            $link = "documentation.php";
        }
        $event_id = $_POST['event'];
        $thesis_title = "";
        if(isset($_POST['thesistitle'])) {
            $thesis_title = $_POST['thesistitle'];
        }
        $targetfolder = "testupload/";
        $targetfolder = $targetfolder . basename( $_FILES['thesis_file']['name']);
        
        $event_sql = "SELECT * FROM events WHERE id = $event_id";
        $event_res = mysqli_query($con, $event_sql);
        $event_row = mysqli_fetch_assoc($event_res);
        $event_title = $event_row['title'];
        
        $group_sql = "SELECT * FROM groups WHERE id = $group_id";
        $group_res = mysqli_query($con, $group_sql);
        $group_row = mysqli_fetch_assoc($group_res);
        $group_name = $group_row['name'];
        
        $report_sql = "SELECT * FROM report WHERE event_id = $event_id";
        $report_res = mysqli_query($con, $report_sql);
        $report_row = mysqli_num_rows($report_res);
        
        if($report_row == 0) {
            if(move_uploaded_file($_FILES['thesis_file']['tmp_name'], $targetfolder)) {   
                if($thesis_title == "") {
                    $sql = "INSERT INTO report (group_id, report_filename, report_type, date_created, sem_id, event_id, status) VALUES ($group_id, '$targetfolder',$type, now(), $sem, $event_id, 1)";
                }else {
                     $sql = "INSERT INTO report (group_id, report_filename, report_type, date_created, sem_id, event_id, status, report_title) VALUES ($group_id, '$targetfolder',$type, now(), $sem, $event_id, 1, '$thesis_title')";
                }
                $stmt= $pdo->prepare($sql);
                $stmt->execute();
                echo $sql;
                $prompt_message = '<p class="alert alert-success">Report Succesfully Sent</p>';
            //// Alerts
                $alertType = "report";
                $message = $group_name." sent a ".$report_type." on ".$event_title.". Check them now!";
                $save_details = "INSERT into alert_details (alertType, message, link) values ('$alertType','$message','$link')";
                $alert_detail_result = mysqli_query($con, $save_details);

                $alertDetailId = mysqli_insert_id($con);

                $send_alert = "INSERT into alerts (alertDetailsId, userId) values ('$alertDetailId', '$adviser_id')";
                $send_result = mysqli_query($con, $send_alert);

            }else {
                $prompt_message = '<p class="alert alert-error">Problem uploading file</p>';
            }
        }else {
            $report_info = mysqli_fetch_assoc($report_res);
            move_uploaded_file($_FILES['thesis_file']['tmp_name'], $targetfolder);
            $report_id = $report_info['id'];
            $report_file = $report_info['report_filename'];
            $prompt_message = '<p class="alert alert-success">Report Succesfully Updated</p>';
//            echo $report_id;
            unlink($report_file);
            if($thesis_title == "") {
                $update_sql = "UPDATE report SET report_filename = '$targetfolder', date_created = now(), status = 1 WHERE id = $report_id";
            }else {
                 $update_sql = "UPDATE report SET report_filename = '$targetfolder', date_created = now(), status = 1, report_title = '$thesis_title' WHERE id = $report_id";
            }
            
            mysqli_query($con, $update_sql);
            
            $alertType = "report";
            $message = $group_name." RESUBMITTED a ".$report_type." on ".$event_title.". Check them now!";
            $save_details = "INSERT into alert_details (alertType, message, link) values ('$alertType','$message','$link')";
            $alert_detail_result = mysqli_query($con, $save_details);

            $alertDetailId = mysqli_insert_id($con);

            $send_alert = "INSERT into alerts (alertDetailsId, userId) values ('$alertDetailId', '$adviser_id')";
            $send_result = mysqli_query($con, $send_alert);
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
                                                    <input type="hidden" id="groupid" name="groupid" runat="server" value="<?php echo $group_id ?>">
                                                    <label>Report Type: </label>
                                                    <select class='form-control report-type' name='type' id="type">
                                                        <option value="1">Status Report</option>
                                                        <option value="2">Journal Report</option>
                                                        <option value="3">Documentation</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Progress Schedule: </label>
                                                    <select class='form-control report-type' name='event' id="event">
                                                        <?php require("php/schedule.php"); ?>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="ThesisTitle">
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
                                            <th scope="col" width="20%">Report Name</th>
                                            <th scope="col" width="40%">Report Filename</th>
                                            <th scope="col" width="20%">Date Submitted</th>
                                            <th scope="col" width="20%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $events ="SELECT * FROM events WHERE sem = $sem AND course = $course ORDER BY start ASC";
                                            $eresult = mysqli_query($con, $events);
                                            while($erow = mysqli_fetch_array($eresult))  
                                            {
                                                if($erow['event_type'] == 1 || $erow['user_id'] == 4) {
                                                    echo "<tr>";
                                                    echo "<td>".$erow['title']." - ".$erow['Description']."</td>";
                                                    
                                                    
                                                $report_sql = "SELECT * FROM report WHERE event_id = ".$erow['id']."";
//                                                echo $report_sql;
                                                $reports_list = mysqli_query($con, $report_sql);
                                                if(mysqli_num_rows($reports_list) > 0){
                                                    while($v = mysqli_fetch_assoc($reports_list)) {
                                        ?>
                                                        <td>
                                        <?php
                                                        echo str_replace("testupload/","",$v['report_filename']);
                                        ?>  
                                                        </td>
                                                        <td>
                                        <?php 
                                                        echo $v['date_created']; 
                                        ?>  
                                                        </td>
                                                        <td><center>
                                        <?php
                                                        if($v['status'] == 1) {
                                                            echo '<span class="badge badge-dark" style="padding:10px; font-size:11px!important;">Submitted to Adviser</span>';
                                                        }else if($v['status'] == 2) {
                                                            echo '<span class="badge badge-success" style="padding:10px; font-size:11px!important;color:#fff;background-color: #dc3545"">Declined by Adviser</span>';
                                                        }else if($v['status'] == 3) {
                                                            echo '<span class="badge badge-success" style="padding:10px; font-size:11px!important;color:#fff;background-color: #3857b1"">Submitted to Coordinator</span>';
                                                        }else if($v['status'] == 4) {
                                                            echo '<span class="badge badge-success" style="padding:10px; font-size:11px!important;color:#fff;background-color: #28a745"">Approved</span>';
                                                        }else if($v['status'] == 5) {
                                                            echo '<span class="badge badge-success" style="padding:10px; font-size:11px!important;color:#fff;background-color: #28a745"">Approved</span>';
                                                        }else if($v['status'] == 6) {
                                                            echo '<span class="badge badge-success" style="padding:10px; font-size:11px!important;color:#fff;background-color: #28a745"">Approved</span>';
                                                        }else if($v['status'] == 7) {
                                                            echo '<span class="badge badge-success" style="padding:10px; font-size:11px!important;color:#fff;background-color: #dc3545"">Declined by Coordinator</span>';
                                                        }
                                                    }
                                        ?>
                                                        </center></td>
                                        <?php
                                                }else {
                                        ?>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <center>
                                                        <span class="badge badge-danger" style="padding:10px; font-size:11px!important;color:#212529;background-color: #ffc107">
                                                            No Entry
                                                        </span>
                                                        <br>
                                                        <p>Deadline: <?php echo $erow['end'] ?></p>
                                                    </center>
                                                </td>   
                                        <?php
                                                }
                                        ?>
                                        <?php
                                                    echo "</tr>";
                                                }
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

<!--
        <script src="js/thesisfile.js"></script>
        <script src="js/datatable.js"></script>
-->
            <script>
                
                $(document).ready(function(){  
                    $('#tblThesis').DataTable();  
                    
                    $("#type").change(function() {
                        var val = $(this).val();
                        if (val == "1") {
                            $.ajax({
                                type: "GET",
                                url: "php/fetch_events.php?type="+val,
                                dataType:"json",
                                success: function(result){
                                    $("#event").html(result);
                                }
                            });
                            $("#ThesisTitle").html('');
                        }else if (val == "2") {
                           $.ajax({
                                type: "GET",
                                url: "php/fetch_events.php?type="+val,
                                dataType:"json",
                                success: function(result){
                                    $("#event").html(result);
                                }
                            });
                            $("#ThesisTitle").html('');
                        }else if (val == "3") {
                            
                            var thesis_title = "";
                            var groupId = $("#groupid").val();
                            
                           $.ajax({
                                type: "GET",
                                url: "php/fetch_events.php?type="+val,
                                dataType:"json",
                                success: function(result){
                                    $("#event").html(result);
                                }
                            });
                            
                            $.ajax({
                                type: "GET",
                                url: "php/fetch_title.php?groupid="+groupId,
                                dataType:"json",
                                success: function(res){
                                    var label = "<label>Thesis Title: </label>";
                                    if(res == null) {
                                        var input = '<input type="text" class="form-control" id="thesistitle" placeholder="Enter Thesis Title*" name="thesistitle" required>';
                                    }else {
                                        var input = '<input type="text" class="form-control" id="thesistitle" placeholder="Enter Thesis Title*" value="'+res+'" name="thesistitle" required>';
                                    }
                                    var html = '';
                                    html += label;
                                    html += input;
                                    $("#ThesisTitle").html(html);
                                }
                            });
                        }
                    });

                });
            </script>
        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>    
        <script src='../custom-js/account.js'></script>
        <script src='../custom-js/alerts.js'></script> 

        <script src='js/upload-file.js'></script>  
    </body>
</html>
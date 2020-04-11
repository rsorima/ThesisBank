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


    <link rel="stylesheet" href="event_calendar/fullcalendar.min.css" />

        <!-- Custom CSS  -->
        <link rel="stylesheet" href="css/main-admin.css">
        <link rel="stylesheet" href="css/validation.css">

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <style>
    
/*
            .fc-content, .fc-event {
                background-color: #831483;
            }
*/
        </style>
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
                    <h1> Calendar </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Calendar</li>
                    </ol>
                </section>

                <!-- MAIN CONTENT -->
                <section class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-12 border-right p-r-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn m-t-20 btn-info btn-block waves-effect waves-light btn-open-event-modal">
                                                                <i class="ti-plus"></i> Add New Event
                                                            </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card-body b-l calender-sidebar">
                                                <div id="calendar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal none-border" id="my-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add Event</strong></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                            </div>
                        </div>
                    </div>                    
                </section>
            </div>

            <!-- FOOTER -->
            <?php include('../includes/footer.php'); ?>
            <?php  include("../includes/modals.php"); //FOOTER ?>
 <!-- BEGIN MODAL -->
 <div class="modal none-border" id="my-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add Event</strong></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-new-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add</strong> new event</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class='col-md-12'>
                                            <p id='p-error' style='color: red'></p>
                                            <p id='p-eventId' hidden></p>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="control-label">Event Title</label>
                                            <input class="form-control form-white" placeholder="Enter Title" type="text" name="event-title" id='event-title' />
                                        </div>
<!--
                                        <div class="col-md-12">
                                            <label class="control-label">Event Description</label>
                                            <input id='event-summary' class="form-control" rows="4" cols="50" />
                                        </div>
-->
                                        <div class="col-md-6">
                                            <label class="control-label">Date Start:</label>
                                            <input type='date' id='event-date-start' class='form-control' />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Time Start</label>
                                            <input type='time' id='event-time-start' class='form-control' />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Date End:</label>
                                            <input type='date' id='event-date-end' class='form-control' />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Time Start</label>
                                            <input type='time' id='event-time-end' class='form-control' />
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect waves-light btn-delete-event" hidden>Delete</button>
                                <button type="button" class="btn btn-info waves-effect waves-light btn-update-event" hidden>Update</button>
                                <button type="button" class="btn btn-info waves-effect waves-light btn-save-event">Save</button>
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            </div>
                        </div>
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

        <!-- <script src="js/branch.js"></script> -->
        <script src="js/datatable.js"></script>
        
        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script> 
        
        <script src="event_calendar/lib/moment.min.js"></script>
    <script src="event_calendar/fullcalendar.min.js"></script>

        <script src="js/custom/calendar-page.js"></script>    

        <script src='../custom-js/account.js'></script>
        <script src='../custom-js/alerts.js'></script>  
    </body>
</html>
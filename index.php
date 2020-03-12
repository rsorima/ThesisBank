<?php
    include("config/connectdb.php");
//    session_start();
?>

<!DOCTYPE html>
<html lang = "en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name ="viewport" content="width=device-width, initial-scale=1">

        <title> STI Davao Thesis Databank </title> 

        <link rel="icon" type="image/ico" href="Images/STI-logo.png">
            

        <!-- CSS  -->
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap/bootstrap-social.css">
        <link rel="stylesheet" href="css/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="css/sweetalert/sweetalert.css"> 
        <link rel="stylesheet" href="css/animate/animate.css">
        <link rel="stylesheet" href="template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="css/scrollspy/scrolling-nav.css">
        <link rel="stylesheet" href="css/bootstrap-datepicker/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="css/bootstrap-timepicker/bootstrap-timepicker.min.css">

        <!-- CUSTOM CSS  -->
        <link href="css/main.css" rel="stylesheet">
        <link href="css/validation.css" rel="stylesheet">

        <!-- COOGLE FONTS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(window).on('load' ,function(){
                $('#myModal').modal('show');
            });
        </script>

    </head>
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <!-- NAVIGATION  -->
        <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-toggle">
                        <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="nav-toggle">
                    <ul class="nav navbar-nav navbar-right">
                        <li class = "hidden"> <a class = "page-scroll" href="#page-top"></a>

                        <?php if (empty($_SESSION['uname']) && empty($_SESSION['pword'])) { ?> 
                                <li> <a class="btn btn-login" href="#" data-toggle="modal" data-target="#login-form">LOGIN</a> </li>
                        <?php } else if ($_SESSION['utype'] == 0) { ?>
                                <li> <a class="profile" href="coordinator/index.php"> <?php echo $_SESSION['uname'] ?> </a> </li>
                        <?php } else if ($_SESSION['utype'] == 1) { ?>
                                <li> <a class="profile" href="frontdesk/index.php"> <?php echo $_SESSION['uname'] ?> </a> </li>
                        <?php } else if ($_SESSION['utype'] == 2) { ?>
                                <li> <a class="profile" href="vip/index.php"> <?php echo $_SESSION['uname'] ?> </a> </li>
                        <?php }  ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>   
            <!-- /.container-fluid -->
        </nav>

        <!-- HEADER -->
        <header>
            <div class="head-parallax" data-parallax="scroll" data-image-src="Images/image1.jpg" 
                    style="width: 100% !important; height: 100% !important;" >
            </div>
            
        </header>
        </footer>

        <!-- JQUERY -->
        <script src="js/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!-- PARALLAX -->
        <script src="js/parallax/parallax.min.js"></script>

        <!-- Bootstrap Datetimepicker-->
        <script src="js/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="js/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

        <!-- Sweet Alert -->
        <script src="js/sweetalert/sweetalert.min.js"></script>
        
        <!-- DATATABLES -->
        <script src="template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        
        <!-- <script src="js/landing-reservation.js"></script> -->

        <!-- JAVASCRIPTS -->
        <script src="js/login.js"></script>
        <script src="js/wow/wow.min.js"></script>
        <script> new WOW().init(); </script> 
        
        <!-- Scrolling Nav JavaScript -->
        <script src="js/scrollspy/jquery.easing.min.js"></script>
        <script src="js/scrollspy/scrolling-nav.js"></script>
    </body>
</html>

<!-- Login Modal -->
<div id="login-form" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="position: absolute;">LOGIN</h4>
                </div>
                <div class="modal-body">
                    <div class="login-form">
                        <div class="form-group">
                            <label for="txtUname"> Username:</label> 
                            <input type="text" class="form-control" id="txtUname" placeholder="Enter username">
                            <div class="error" id="txtUnameError"></div>
                        </div>
                        <div class="form-group">
                            <label for="txtPword">Password:</label>
                            <input type="password" class="form-control" id="txtPword" placeholder="Enter password">
                            <div class="error" id="txtPwordError"></div>
                        </div>
                        <div class="error" id="formError"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-login" id="btnLogin">log in</button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .notif-badge{
        position: absolute;
        color: white;
        background: red;
        padding: 0px 6px 1px 6px;
        border-radius: 50%;
        left: 25px;
        top: 5px;
        z-index: 1;
        font-size: 10pt;
    }
    .notif-icon{
        font-size: 18px;
    }
    .hide-element{
        display: none;
    }
    .alert-item span{
        float: right;
        font-size: 12pt;
    }
    .alert-item span:hover{
        text-decoration: underline;
    }
    .alert-item:hover{
        background: #ddd;
    }
</style>
<header class = "main-header">
    <!-- LOGO -->
    <a href="index.php" class="logo">
        <span class="logo-lg" style="margin-top: -10px;"><img src = "../Images/logo.png" style="width: 100%; height: 100%;" alt="#"></span>
        <span class="logo-mini"><img src = "../Images/STI-logo.png" alt="TLV"></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

            <!-- <li>
                <a href="student-calendar.php">
                    <span class="fa fa-calendar"></span>
                </a>
            </li> -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    
                    <a href="#" class="dropdown-toggle alert-dropdown" data-toggle="dropdown">
                        <span class='notif-badge hide-element'>0</span>
                        <span class="fa fa-bell notif-icon">
                        </span>
                    </a>
                    <!-- Content Menu -->
                    <ul class="dropdown-menu alert-item-list">
                        <li class="list-group-item d-flex justify-content-between align-items-center alert-item hide-element">
                            Cras justo odio
                            <span class="fa fa-close"></span>
                        </li>
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../template/dist/img/avatar2.png" class="user-image" alt="User Image">
                        <span class="hidden-xs">
                            <?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname']; ?>
                        </span>
                    </a>
                    <!-- Content Menu -->
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="../template/dist/img/avatar2.png" class="img-circle" alt="User Image">
                            <p>
                                 <?php echo $_SESSION['fname'] ?> <?php echo $_SESSION['lname'] ?> - 
                                <?php 
                                    if ($_SESSION['utype'] == 0 ) {
                                        echo "Coordinator";
                                    } 
                                    if ($_SESSION['utype'] == 1 ) {
                                        echo "Admin";
                                    } 
                                    if ($_SESSION['utype'] == 2 ) {
                                        echo "Program Head";
                                    }
                                    if ($_SESSION['utype'] == 3 ) {
                                        echo "Librarian";
                                    } 
                                    if ($_SESSION['utype'] == 4 ) {
                                        echo "Adviser";
                                    }  
                                    if ($_SESSION['utype'] == 5 ) {
                                        echo "Student";
                                    } 
                                    
                                ?> 
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                        <div class="pull-left">
                                <a class="btn btn-default btn-flat" id='btn-change-password'> Change Password </a>
                            </div>
                            <div class="pull-right">
                                <a href="../php/logout.php" class="btn btn-default btn-flat" > Sign out </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

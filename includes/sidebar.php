<?php
	$currentPage = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$fileName = pathinfo($currentPage, PATHINFO_FILENAME);
//    echo $fileName . " SADASD";
?>

<aside class="main-sidebar">
    <section class="sidebar">

        <!-- SIDEBAR USER PANEL -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../template/dist/img/avatar2.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>  <?php echo $_SESSION['fname'] ?> <?php echo $_SESSION['lname'] ?>  </p>
                <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
            </div>
        </div>


        <!-- SIDEBAR MENU -->
        <ul class="sidebar-menu" data-widget="tree">

            <!-- COORDINATOR -->
            <?php if ($_SESSION['utype'] == 3) {?>
                <li class="header"> HOME </li>
<!--                <li class="<?php //if($fileName =='index'){echo 'active';} ?>"> <a href="index.php"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a></li>-->
                <li class="<?php if($fileName =='statusreport' || $fileName =='journalreport' || $fileName == 'documentation'){echo 'active';} ?> treeview ">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Reports</span>
                        <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($fileName =='statusreport'){echo 'active';} ?>"><a href="statusreport.php"><i class="fa fa-envelope"></i> <span>Status Report</span> </a></li>
                        <li class="<?php if($fileName =='journalreport'){echo 'active';} ?>"><a href="journalreport.php"><i class="fa fa-envelope"></i> <span>Journal Report</span> </a></li>
                        <li class="<?php if($fileName == 'documentation'){echo 'active';} ?>"><a href="documentation.php"><i class="fa fa-envelope"></i> <span>Documentation</span></a></li>
                    </ul>
                </li>

                <li class="<?php if($fileName =='manage-adviser' || $fileName =='student-group' || $fileName =='groups' ){echo 'active';} ?> treeview ">
                    <a href="#">
                        <i class="fa fa-group"></i> <span>Manage Users</span>
                        <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($fileName =='manage-adviser'){echo 'active';} ?>"><a href="manage-adviser.php"><i class="fa fa-user"></i> <span>Advisers</span> </a></li>
                        <li class="<?php if($fileName =='student-group'){echo 'active';} ?>"><a href="student-group.php"><i class="fa fa-user"></i> <span>Students</span> </a></li>
                        <li class="<?php if($fileName =='groups'){echo 'active';} ?>"><a href="groups.php"><i class="fa fa-user"></i> <span>Groups</span> </a></li>
                    </ul>
                </li>
<!--            <li class="<?php //if($fileName =='progress-schedule'){echo 'active';} ?>"><a href="schedules.php"> <i class="fa fa-dashboard"></i> <span>Progress Schedules</span></a></li>-->
                <li class="header">Post Reminders</li>
                <li class="<?php if($fileName =='coordinator-calendar'){echo 'active';} ?>"> <a href="coordinator-calendar.php"> <i class="fa fa-calendar"></i> <span>Calendar</span> </a></li> 
<!--                <li class="header">View List</li>-->
<!--                <li class="<?php //if($fileName =='student-list'){echo 'active';} ?>"> <a href="student-list.php"> <i class="fa fa-list"></i> <span>View Students</span> </a></li> -->
                            
                             
            <?php } ?>
            
            <!-- ADMIN -->
            <?php if ($_SESSION['utype'] == 1) {?>
                <li class="header"> THESIS FILES</li>
                <li class="<?php if($fileName =='index'){echo 'active';} ?>"> <a href="index.php"> <i class="fa fa-file"></i> <span>View Files</span> </a></li>
                <li class="<?php if($fileName =='manage-thesis'){echo 'active';} ?>"> <a href="manage-thesis.php"> <i class="fa fa-plus"></i> <span>Add New File</span> </a></li>
               
                <li class="header"> USERS </li>
                <li class="<?php if($fileName =='manage-user'){echo 'active';} ?>"> <a href="manage-user.php"> <i class="fa fa-group"></i> <span>Manage Users</span> </a></li>
                <!-- <li class="header"> COURSES </li>
                <li class="<?php //if($fileName =='manage-courses'){echo 'active';} ?>"><a href="manage-courses.php"><i class="fa fa-pencil"></i> <span>Courses</span> </a></li> -->
                <li class="header"> SEMESTER </li>
                <li class="<?php if($fileName =='manage-semester'){echo 'active';} ?>"> <a href="manage-semester.php"> <i class="fa fa-group"></i> <span>Manage Semester</span> </a></li>
                
            <?php } ?>

            <!-- PROGRAM HEAD -->
            <?php if ($_SESSION['utype'] == 2) {?>
                <li class="header"> HOME </li>
                <li class="<?php if($fileName =='index'){echo 'active';} ?>"> <a href="index.php"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a></li>
                <li class="<?php if($fileName == 'documents'){echo 'active';} ?>"> <a href="documentation.php"> <i class="fa fa-envelope"></i> <span>Documentation</span> </a></li>
                   
            <?php } ?>

            <!-- LIBRARIAN -->
            <?php if ($_SESSION['utype'] == 6) {?>
                <li class="header"> THESIS FILES</li>
                <li class="<?php if($fileName =='index'){echo 'active';} ?>"> <a href="index.php"> <i class="fa fa-file"></i> <span>View Files</span> </a></li>

                        <?php if($fileName =='manage-courses'){echo 'active';} ?>
            <?php } ?>

            <!-- ADVISER -->
            <?php if ($_SESSION['utype'] == 4) {?>
<!--
                <li class="header"> HOME </li>
                <li class="<?php// if($fileName =='index'){echo 'active';} ?>"> <a href="index.php"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a></li>
-->
                <li class="header"> Student Reports </li>
                <li class="<?php if($fileName =='statusreport' || $fileName =='journalreport' ){echo 'active';} ?> treeview ">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Reports</span>
                        <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($fileName =='statusreport'){echo 'active';} ?>"><a href="statusreport.php"><i class="fa fa-envelope"></i> <span>Status Report</span> </a></li>
                        <li class="<?php if($fileName =='journalreport'){echo 'active';} ?>"><a href="journalreport.php"><i class="fa fa-envelope"></i> <span>Journal Report</span> </a></li>
                        <li class="<?php if($fileName =='documentation'){echo 'active';} ?>"><a href="documentation.php"><i class="fa fa-envelope"></i> <span>Documentation</span></a></li>
<!--                        <li class="<?php //if($fileName =='manuscript'){echo 'active';} ?>"><a href="manuscript.php"><i class="fa fa-envelope"></i><span>Manuscript</span> </a></li>-->
                    </ul>
                </li>
            <li class="header">Post Reminders</li>
                <li class="<?php if($fileName =='coordinator-calendar'){echo 'active';} ?>"> <a href="adviser-calendar.php"> <i class="fa fa-calendar"></i> <span>Calendar</span> </a></li>
            <?php } ?>

            <!-- STUDENT -->
            <?php if ($_SESSION['utype'] == 5) {?>
                <li class="header"> HOME </li>
                <li class="<?php if($fileName =='index'){echo 'active';} ?>"> <a href="index.php"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a></li>
                <li class="<?php if($fileName =='upload-a-file'){echo 'active';} ?>"> <a href="upload-a-file.php"> <i class="fa fa-dashboard"></i> <span>Reports</span> </a></li>
                <li class="<?php if($fileName =='student-calendar'){echo 'active';} ?>"> <a href="student-calendar.php"> <i class="fa fa-calendar"></i> <span>Calendar</span> </a></li>

                
            <?php } ?>
        </ul>
    </section>
</aside>

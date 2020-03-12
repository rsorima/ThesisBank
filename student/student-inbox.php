<?php
	include("../config/connectdb.php");

    session_start();
    if (empty($_SESSION['uid'])) {header('location: ../index.php');}

    require_once('../config/connection.php');
    
    $pdo = tdbDatabase::connect();

    $thesis_list = '';

    $sql = 'SELECT * FROM tdb_thesis';
    $thesis_list = $pdo->query($sql)->fetchAll();

    tdbDatabase::disconnect();

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

<div id="centreColumn">
              <div id="alerts" style="display:none"></div>


              


<div class="inline_tabs_options">
      
  
  
  <ul class="tabnav" style="overflow: visible;">
   
    <li class="tabs_more_link" style="display: none;">
      <div class="dropDownHolder">
        <a href="">
          <i class="ellipsis_vertical"></i>
        </a>

        <div class="dropDown"></div>
      </div>
    </li>
  </ul>



</div>



<h2>Teachers</h2>


  <div class="optionsRibbon optionsRight optionsRibbon_multi_ul" style="overflow: visible; display: block;">



  </div>

  <form accept-charset="UTF-8" action="/my_teachers/list" id="teachers_list" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"><input name="authenticity_token" type="hidden" value="qG/i5pPp6ZUuv8ixa2all8/FkEE9L2dmWXuJWg1H95g="></div>
    <div id="select_all_warning" class="warning" style="display: none"></div>

<div class="user_boxes">
    <a href="/user/show_without_hover/6226926">
      <div class="img_crop_circle" style="background-image: url('/files/2534719/default-avatar-250x250.png?lmsauth=4fa3c72efb37d5beab969f80a3df2342a0fa89d5')">
      </div>

      <div class="user_info">
        <div class="user">
          <input id="6226926" name="select[]" type="checkbox" value="6226926">
          <label for="6226926"><span>Alvarado, Charizza Mae</span></label>
        </div>
      </div>
    </a>
    <a href="/user/show_without_hover/3536443">
      <div class="img_crop_circle" style="background-image: url('/files/3536443/jen.bobadilla(2).jpg?lmsauth=587f1df478ac8f6a442cdb6d63bac75f2ba05afb')">
      </div>

      <div class="user_info">
        <div class="user">
          <input id="3536443" name="select[]" type="checkbox" value="3536443">
          <label for="3536443"><span>Bobadilla, Jennelyn</span></label>
        </div>
      </div>
    </a>
    <a href="/user/show_without_hover/3525675">
      <div class="img_crop_circle" style="background-image: url('/files/3525675/Calija_Vincent_Bryan_F._BSIT(2).jpg?lmsauth=7c7d8b77b0d439ca3d3b95460b4afe27c5141653')">
      </div>

      <div class="user_info">
        <div class="user">
          <input id="3525675" name="select[]" type="checkbox" value="3525675">
          <label for="3525675"><span>Bry</span></label>
        </div>
      </div>
    </a>
    <a href="/user/show_without_hover/2704387">
      <div class="img_crop_circle" style="background-image: url('/files/2704387/STI_LMS2.png?lmsauth=b94576fd4beeab4fa890a19a58101cbecf686f72')">
      </div>

      <div class="user_info">
        <div class="user">
          <input id="2704387" name="select[]" type="checkbox" value="2704387">
          <label for="2704387"><span>Reby</span></label>
        </div>
      </div>
    </a>
    <a href="/user/show_without_hover/2611227">
      <div class="img_crop_circle" style="background-image: url('/files/2611227/me.JPG?lmsauth=092a6f7df09fbd66e6102c3b609694799ac44b71')">
      </div>

      <div class="user_info">
        <div class="user">
          <input id="2611227" name="select[]" type="checkbox" value="2611227">
          <label for="2611227"><span>Dela Paz, Orbit</span></label>
        </div>
      </div>
    </a>
    <a href="/user/show_without_hover/2534719">
      <div class="img_crop_circle" style="background-image: url('/files/2534719/Remot_Al_Joshua_S.(2).jpg?lmsauth=8684f20dacf12852b33727700ea5a76d30bed169')">
      </div>

      <div class="user_info">
        <div class="user">
          <input id="2534719" name="select[]" type="checkbox" value="2534719">
          <label for="2534719"><span>Josh</span></label>
        </div>
      </div>
    </a>
    <a href="/user/show_without_hover/5473228">
      <div class="img_crop_circle" style="background-image: url('/files/2534719/default-avatar-250x250.png?lmsauth=4fa3c72efb37d5beab969f80a3df2342a0fa89d5')">
      </div>

      <div class="user_info">
        <div class="user">
          <input id="5473228" name="select[]" type="checkbox" value="5473228">
          <label for="5473228"><span>Risonar, Kris Hana</span></label>
        </div>
      </div>
    </a>
    <a href="/user/show_without_hover/2704464">
      <div class="img_crop_circle" style="background-image: url('/files/2704464/software-language-programmer-avatar-vector-17866123(3)(2).jpg?lmsauth=464a213f3c30a738a59d6ab37e21337a3c0b9b03')">
      </div>

      <div class="user_info">
        <div class="user">
          <input id="2704464" name="select[]" type="checkbox" value="2704464">
          <label for="2704464"><span>Jhenn</span></label>
        </div>
      </div>
    </a>
    <a href="/user/show_without_hover/6294699">
      <div class="img_crop_circle" style="background-image: url('/images/avatars/silhouettes/generic-03.png')">
      </div>

      <div class="user_info">
        <div class="user">
          <input id="6294699" name="select[]" type="checkbox" value="6294699">
          <label for="6294699"><span>To, Jianselle</span></label>
        </div>
      </div>
    </a>
</div>




<script>
  on_ready(function(){
    disable_user_popups_in('.user_boxes');
    checkbox_highlight_tiles('.user_boxes');
  });
</script>

</form>

            </div>
            </div>
            <?php  include("../includes/footer.php"); //FOOTER ?>
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

        <script src="js/branch.js"></script>
        <script src="js/datatable.js"></script>
        
        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>    
        <script src='../custom-js/account.js'></script>
        <script src='../custom-js/alerts.js'></script>  
    </body>
</html>
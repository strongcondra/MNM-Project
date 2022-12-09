
<?php

	if(file_exists("includes/settings.php")) require_once("includes/settings.php");
	else exit("<center><h2>file missing</h2></center>");
	if(file_exists("includes/functions.php")) require_once("includes/functions.php");
	else exit("<center><h2>file missing</h2></center>");


    //ONLY ACCESSIBLE TO AUTHENTICATED USERS
    if(!authenticated()){
        update_user("", "login first");
    }

  


   $number_of_bookings = get_number_of_bookings();
   $number_of_categories=get_number_of_categories();
   $number_of_facilities=get_number_of_facilities();
   $number_of_favorites=get_number_of_favorites();
   $number_of_locations=get_number_of_locations();
   $number_of_orders=get_number_of_orders();
   $number_of_products=get_number_of_products();
   $number_of_ratings=get_number_of_ratings();
   $number_of_transactions=get_number_of_transactions();
   $number_of_users=get_number_of_users();
   $number_of_cuisines=get_number_of_cuisines();
   $number_of_pending_cafes=get_number_of_pending_cafes();
   $number_of_active_cafes=get_number_of_active_cafes();
    
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=$base_url;?>/plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?=$base_url;?>/plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="<?=$base_url;?>/plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="<?=$base_url;?>/plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="<?=$base_url;?>/plugins/fullcalendar-bootstrap/main.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=$base_url;?>/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php file_exists($root_dir . "includes/top-bar.php") && require_once($root_dir . "includes/top-bar.php"); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php file_exists($root_dir . "includes/left-menu.php") && require_once($root_dir . "includes/left-menu.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <?php
                
                    require_once($root_dir . "includes/administrator-dashboard.php");
              
            ?>

      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-pre
    </div>
   <!-- <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.-->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=$base_url;?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?=$base_url;?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="<?=$base_url;?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$base_url;?>/dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="<?=$base_url;?>/plugins/moment/moment.min.js"></script>
<script src="<?=$base_url;?>/plugins/fullcalendar/main.min.js"></script>
<script src="<?=$base_url;?>/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="<?=$base_url;?>/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="<?=$base_url;?>/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="<?=$base_url;?>/plugins/fullcalendar-bootstrap/main.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=$base_url;?>/dist/js/demo.js"></script>
<!-- Page specific script -->

</body>
</html>

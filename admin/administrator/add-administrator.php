
<?php
    if(file_exists('../includes/settings.php')) require_once('../includes/settings.php');
    else exit("<center><h2>file missing</h2></center>");
    if(file_exists($root_dir . 'includes/functions.php')) require_once($root_dir . 'includes/functions.php');
    else exit("<center><h2>file missing</h2></center>");

    //ONLY ACCESSIBLE TO AUTHENTICATED USERS
    if(!authenticated()){
        update_user("", "login first");
    }
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])&& isset($_POST['terms']) && isset($_POST['privacyPolicy']) && isset($_POST['refundPolicy']) ) {
    	$username =$_POST['username'];
    	$email =$_POST['email'];
    	$password=$_POST['password'];
    	$terms=$_POST['terms'];
    	$privacyPolicy=$_POST['privacyPolicy'];
    	$refundPolicy=$_POST['refundPolicy'];

    	if (!empty($username) && !empty($email) && !empty($password) ) {
    		if (!count_admin() &&  add_administrator($username,$email,$password,$terms,$privacyPolicy,$refundPolicy)) {
    			update_user("","Administrator successfully added");
    		}
    	}
    }
    


    
    
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
              <li class="breadcrumb-item"><a href="<?=$base_url;?>dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add Administrator</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add adminstrator</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
					<div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email"name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Terms</label>
                    <div class="input-group">
                      
                        <textarea class="form-control" name="terms"></textarea>
                      
                    
                  </div>
                  
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Privacy Policy</label>
                    <div class="input-group">
                     
                        <textarea class="form-control" name="privacyPolicy"></textarea>
                      
                   
                  </div>
                  
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Refund Policy</label>
                    <div class="input-group">
                    
                        <textarea class="form-control" name="refundPolicy"></textarea>
                      
                    
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
       

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

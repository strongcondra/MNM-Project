
<?php
    if(file_exists('../includes/settings.php')) require_once('../includes/settings.php');
    else exit("<center><h2>file missing</h2></center>");
    if(file_exists($root_dir . 'includes/functions.php')) require_once($root_dir . 'includes/functions.php');
    else exit("<center><h2>file missing</h2></center>");

    //ONLY ACCESSIBLE TO AUTHENTICATED USERS
    if(!authenticated()){
        update_user("", "login first");
    }
    if (isset($_POST['name']) ) {
    	$name =$_POST['name'];
    	$type =$_POST['type'];
    	$details =$_POST['details'];
    	$price =$_POST['price'];
    	$starter =$_POST['starter'];
    	$mains =$_POST['mains'];
    	$deserts =$_POST['desserts'];
    	

    	if (!empty($name) && !empty($type) &&!empty($details) && !empty($price) && !empty($starter) && !empty($mains) && !empty($deserts)) {
    		if (add_package_name($name,$type,$details,$price,$starter,$mains,$deserts)) {
    			$mes = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert! successfully added</h5>
                  
                </div>';
    		}
    		else{
    		    $mes = '';
    		}
    	}
    	else{
    		    $mes = '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert! All fields mandatory</h5>
                  
                </div>';
    		}
    }
    


    function add_package_name($name,$type,$details,$price,$starter,$mains,$deserts){
    	if (authenticated() &&!empty($name) && !empty($type) &&!empty($details) && !empty($price) && !empty($starter) && !empty($mains) && !empty($deserts) ) {
    	    
    		$statement=get_connection()->prepare("INSERT INTO `package_details`(`name`,`type`,`starter`,`mains`,`desserts`,`details`,`price`)VALUES(?,?,?,?,?,?,?)");
    		$statement->execute([$name,$type,$starter,$mains,$deserts,$details,$price]);
    		return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
    	}
    	return false;
    }
    
    $package_name = get_package_name();
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Package</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=$base_url;?>plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?=$base_url;?>plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="<?=$base_url;?>plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="<?=$base_url;?>plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="<?=$base_url;?>plugins/fullcalendar-bootstrap/main.min.css">
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
              <li class="breadcrumb-item active">Add Package</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Package</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                    <?php
                    echo $mes;
                    ?>
                  <div class="form-group">
                    <label for="">Select Package Type</label>
                    <select class="form-control" name="type">
                        <option value="">Select Package Type</option>
                        <option value="veg">Veg</option>
                        <option value="nonveg">Non Veg</option>
                        
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Enter Package Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Package Name">
                  </div>
					<div class="form-group">
                    <label for="">Enter Package Detail</label>
                    <input type="text" class="form-control" name="details" placeholder="Enter Package Detail">
                  </div>
                  <div class="form-group">
                    <label for="">Starter</label>
                    <input type="number" class="form-control" name="starter" step="1" placeholder="Enter Starter Qty">
                  </div>
                  <div class="form-group">
                    <label for="">Mains</label>
                    <input type="number" class="form-control" name="mains" step="1" placeholder="Enter Mains Qty">
                  </div>
                  <div class="form-group">
                    <label for="">Desserts</label>
                    <input type="number" class="form-control" name="desserts" step="1" placeholder="Enter Desserts Qty">
                  </div>
                  <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" step="1" placeholder="Enter Price">
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

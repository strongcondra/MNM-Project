<?php
	if(file_exists("../includes/settings.php")) require_once("../includes/settings.php");
	else exit("<center><h2>file missing</h2></center>");
	if(file_exists($root_dir . "includes/functions.php")) require_once($root_dir . "includes/functions.php");
	else exit("<center><h2>file missing</h2></center>");

	//FOR AUTHENTICATED USERS ONLY
	if(!is_authenticated()){
		update_user("index.php", "loging first");
	}
	$cafeId = get_my_cafe_id();
$mes = '';
if (isset($_POST['name']) ) {
    	$name =$_POST['name'];
    	$type =$_POST['type'];
    	$details =$_POST['details'];
    	$price =$_POST['price'];
    	$starter =$_POST['starter'];
    	$mains =$_POST['mains'];
    	$deserts =$_POST['desserts'];
    	

    	if (!empty($name) && !empty($type) &&!empty($details) && !empty($price) && !empty($starter) && !empty($mains) && !empty($deserts)) {
    		if (add_package_name($name,$type,$details,$price,$starter,$mains,$deserts,$cafeId)) {
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
    


    function add_package_name($name,$type,$details,$price,$starter,$mains,$deserts,$cafeId){
    	if (is_authenticated() &&!empty($name) && !empty($type) &&!empty($details) && !empty($price) && !empty($starter) && !empty($mains) && !empty($deserts) ) {
    	    
    		$statement=get_connection()->prepare("INSERT INTO `package_details`(`cafe_id`,`name`,`type`,`starter`,`mains`,`desserts`,`details`,`price`)VALUES(?,?,?,?,?,?,?,?)");
    		$statement->execute([$cafeId,$name,$type,$starter,$mains,$deserts,$details,$price]);
    		return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);
    	}
    	return false;
    }
    

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<title><?= $application_name; ?> Add Package</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel="icon" type="image/png" href="<?= $base_url; ?>images/logo_default.png"/>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?= $base_url; ?>plugins/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->

		<!-- DataTable Bootstrap -->
		<link rel="stylesheet" href="<?= $base_url; ?>plugins/datatables/dataTables.bootstrap4.css">

		<!-- Theme style -->
		<link rel="stylesheet" href="<?= $base_url; ?>dist/css/adminlte.css">
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600" rel="stylesheet">
		<link rel="stylesheet" href="<?= $base_url; ?>css/custom.css">
		<link rel="stylesheet" href="<?= $base_url; ?>css/success.css">
	</head>
	<body style="height: 100%; background-color: #f9f9f9;" class="hold-transition sidebar-mini success">
		<div class="wrapper">
			<!-- Main Header -->
			<!-- Navbar -->
			<?php file_exists($root_dir . "includes/navbar.php") && require_once($root_dir . "includes/navbar.php"); ?>

			<!-- Main Sidebar Container -->
			<?php file_exists($root_dir . "includes/sidebar.php") && require_once($root_dir . "includes/sidebar.php"); ?>
			
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0 text-dark"><small>Add Package</small></h1>
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="<?= $base_url; ?>dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
									<li class="breadcrumb-item active">Add Package</li>
								</ol>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- /.content-header -->
				<div class="content">
					<div class="clearfix"></div>
					<div class="card">
						<div class="card-header">
							<ul class="nav nav-tabs align-items-end card-header-tabs w-100">
								<li class="nav-item">
									<a class="nav-link active" href="#"><i class="fa fa-list mr-2"></i>Add Package</a>
								</li>
							</ul>
						</div>
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
				</div>
			</div>
			<!-- Main Footer -->
			<footer class="main-footer 0">
				<div class="float-right d-none d-sm-block">
					<b>Version</b> 1.9.0
				</div>
				<strong>Copyright © 2020 <a href="<?= $base_url; ?>"><?= $application_name; ?></a>.</strong> All rights reserved.
			</footer>
		</div>
		<!-- jQuery -->
		<script src="<?= $base_url; ?>plugins/jquery/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<!-- Bootstrap 4 -->
		<script src="<?= $base_url; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		
		<!-- Select2 -->
		<script src="<?= $base_url; ?>plugins/select2/select2.full.min.js"></script>

		<!-- bootstrap time picker -->
		<script src="<?= $base_url; ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
		<!-- SlimScroll 1.3.0 -->
		<script src="<?= $base_url; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>

		<!-- AdminLTE App -->
		<script src="<?= $base_url; ?>dist/js/adminlte.js"></script>

		<!-- AdminLTE for demo purposes -->
		<script src="<?= $base_url; ?>dist/js/demo.js"></script>
	</body>
</html>


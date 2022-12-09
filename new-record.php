<?php
	if(file_exists("includes/settings.php")) require_once("includes/settings.php");
	else exit("<center><h2>file missing</h2></center>");
	if(file_exists($root_dir . "includes/functions.php")) require_once($root_dir . "includes/functions.php");
	else exit("<center><h2>file missing</h2></center>");

	//FOR AUTHENTICATED USERS ONLY
	if(!is_authenticated()){
		update_user("index.php", "loging first");
	}

	//PAGE INFORMATION
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<title><?= $application_name; ?> | New Item</title>
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
								<h1 class="m-0 text-dark"><small>New Item</small></h1>
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="<?= $base_url; ?>dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
									<li class="breadcrumb-item active">New Item</li>
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
									<a class="nav-link active" href="<?= $base_url; ?>new-item.php"><i class="fa fa-list mr-2"></i>New Item</a>
								</li>
							</ul>
						</div>
						<form role="form">
							<div class="card-body">
					            <div class="row">
					            	<div class="col-md-7">
						                <div class="form-group">
						                	<label>Minimal</label>
						                	<select class="form-control select2" style="width: 100%;">
							                    <option selected="selected">Alabama</option>
							                    <option>Alaska</option>
							                    <option>California</option>
							                    <option>Delaware</option>
							                    <option>Tennessee</option>
							                    <option>Texas</option>
							                    <option>Washington</option>
						                  	</select>
						                </div>
						                <!-- /.form-group -->
						                <div class="form-group">
						                  	<label>Disabled</label>
						                  	<select class="form-control select2" disabled="disabled" style="width: 100%;">
							                    <option selected="selected">Alabama</option>
							                    <option>Alaska</option>
							                    <option>California</option>
							                    <option>Delaware</option>
							                    <option>Tennessee</option>
							                    <option>Texas</option>
							                    <option>Washington</option>
						                  	</select>
						                </div>
						                <!-- /.form-group -->

						                <!-- /.form-group -->
						                <div class="form-group">
						                	<label>Disabled Result</label>
						                	<select class="form-control select2" style="width: 100%;">
							                    <option selected="selected">Alabama</option>
							                    <option>Alaska</option>
							                    <option disabled="disabled">California (disabled)</option>
							                    <option>Delaware</option>
							                    <option>Tennessee</option>
							                    <option>Texas</option>
							                    <option>Washington</option>
						                  	</select>
						                </div>
						                <!-- /.form-group -->

						            	<div class="form-group">
							        		<label for="name">Name</label>
							        		<input type="email" class="form-control" id="name" placeholder="Enter name">
							        	</div>
						            	<div class="form-group">
							        		<label for="email">Email address</label>
							        		<input type="email" class="form-control" id="email" placeholder="Enter email">
							        	</div>
							        	<div class="form-group">
						                    <label for="password">Password</label>
						                    <input type="password" class="form-control" id="password" placeholder="Password">
						                </div>
							        	<div class="form-group">
						                    <label for="file_example">File</label>
						                    <input type="file" class="form-control" id="file_example">
						                </div>

							        	<div class="form-group">
						                    <button type="submit" class="btn btn-primary">Submit</button>
						                </div>



						            </div>
						            <!-- /.col -->
						        </div>
						        <!-- /.row -->
						    </div>
				        	<!-- /.card-body -->
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


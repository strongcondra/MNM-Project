<?php
if (file_exists("../includes/settings.php")) require_once("../includes/settings.php");
else exit("<center><h2>file missing</h2></center>");
if (file_exists($root_dir . "includes/functions.php")) require_once($root_dir . "includes/functions.php");
else exit("<center><h2>file missing</h2></center>");

//FOR AUTHENTICATED USERS ONLY
if (!is_authenticated()) {
	update_user("index.php", "loging first");
}

if (isset($_POST['cuisine']) && isset($_POST['food_description']) && $_FILES['menu_image'] && isset($_POST['featured']) && isset($_POST['food_name']) && isset($_POST['type']) && isset($_POST['price']) && isset($_POST['ingredients']) && isset($_POST['quantityAvailable'])) {

	$cuisine = $_POST['cuisine'];
	$food_description = $_POST['food_description'];
	$menu_image = $_FILES['menu_image'];
	$featured = $_POST['featured'];
	$food_name = $_POST['food_name'];
	$type = $_POST['type'];
	$price = $_POST['price'];
	$ingredients = $_POST['ingredients'];
	$quantityAvailable = $_POST['quantityAvailable'];

	if (!empty($cuisine) && !empty($food_description) && !empty($menu_image) && !empty($featured) && !empty($food_name) && !empty($type) && !empty($price) && !empty($ingredients) && !empty($quantityAvailable)) {

		if (add_place_menu($cuisine, $food_description, $menu_image, $featured, $food_name, $type, $price, $ingredients, $quantityAvailable)) {
			update_user("dashboard.php", "Successfully added");
		}
	}
}






?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<title><?= $application_name; ?> | New Place Menu Items</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link rel="icon" type="image/png" href="<?= $base_url; ?>images/logo_default.png" />
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
							<h1 class="m-0 text-dark"><small>New Place Menu Items</small></h1>
						</div>
						<!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= $base_url; ?>dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
								<li class="breadcrumb-item active">New Place Menu Items</li>
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
								<a class="nav-link active" href="#"><i class="fa fa-list mr-2"></i>New Place Menu items</a>
							</li>
						</ul>
					</div>
					<form role="form" action="" method="post" enctype="multipart/form-data">
						<div class="card-body">
							<div class="row">
								<div class="col-md-7">

									<!-- /.form-group -->

									<!-- /.form-group -->

									<!-- /.form-group -->

									<!-- /.form-group -->

									<!--<div class="form-group">
							        		<label for="name">Cuisine</label>
							        		<input type="text" name="cuisine" class="form-control" placeholder="Enter Cuisine">
							        	</div>
							        	<div class="form-group">
							        		<label for="name">Food Description</label>
							        		<input type="text" name="food_description" class="form-control" placeholder="Enter name">
							        	</div>-->
									<div class="form-group">
										<label>Category</label>
										<select class="form-control select2" name="cat" style="width: 100%;">
											<option selected="selected">SELECT</option>
											<option value="veg">Veg</option>
											<option value="nonveg">Non Veg</option>
											<option value="drink">Drink</option>

										</select>
									</div>
									<div class="form-group">
										<label>Sub Category</label>
										<select class="form-control select2" name="cat" style="width: 100%;">
											<option selected="selected">SELECT</option>
											<option value="veg">Starter</option>
											<option value="mains">Mains</option>
											<option value="Desserts">Desserts</option>

										</select>
									</div>

									<div class="form-group">
										<label for="email">Food Name</label>
										<input type="text" name="food_name" class="form-control" placeholder="Enter food name">
									</div>

									<div class="form-group">
										<label for="name">Price</label>
										<input type="text" name="price" class="form-control" placeholder="Enter price">
									</div>


									<!--<div class="form-group">
										<label for="product_image">Menu Image</label>
										<input type="file" name="menu_image" class="form-control" id="menu_image" placeholder="Upload Menu Image">
									</div>-->




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
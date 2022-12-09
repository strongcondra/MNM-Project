<?php
	if(file_exists("includes/settings.php")) require_once("includes/settings.php");
	else exit("<center><h2>file missing</h2></center>");
	if(file_exists($root_dir . "includes/functions.php")) require_once($root_dir . "includes/functions.php");
	else exit("<center><h2>file missing</h2></center>");

	//FOR AUTHENTICATED USERS ONLY
	if(!is_authenticated()){
		update_user("index.php", "loging first");
	}
	$rows = get_profile_values($_SESSION['cafe_id']);
	$owner_upi = $rows['owner_upi'];
	$location = $rows['location'];
	$cost = $rows['cost'];
	$description = $rows['description'];
	$service_area = $rows['service_area'];
	$facilities = $rows['facilities'];
	$primary_image = $rows['primary_image'];
	$secondary_image = $rows['secondary'];
	$cuisine = $rows['cuisine'];
	$longitude = $rows['longitude'];
	$latitude = $rows['latitude'];
	$category = $rows['category'];
	$information = $rows['information'];
	$full_reservation = $rows['full_reservation'];
	$individual_reservation = $rows['individual_reservation'];
	$capacity = $rows['capacity'];
	$address = $rows['address'];
	$photoshoot = $rows['photoShoot'];
	$cake = $rows['cake'];
	if(!empty($owner_upi) && !empty($location) && !empty($cost) && !empty($description) && !empty($service_area) && !empty($facilities) &&  !empty($cuisine) && !empty($longitude) && !empty($latitude) && !empty($category) && !empty($information)  && !empty($full_reservation) && !empty($individual_reservation) && !empty($capacity) && !empty($address) && !empty($photoshoot) && !empty($cake)){
		
	} else{
		update_user('edit-profile.php','Please Add Place');
	}
	//PAGE INFORMATION
	$my_total_orders = get_number_of_my_orders();
	$my_total_earnings = get_total_of_my_earnings();
	$my_total_food_bookings = get_number_of_my_food_bookings();
	$my_total_bookings = get_number_of_my_bookings();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<title><?= $application_name; ?> | Manage Mobile Application</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel="icon" type="image/png" href="<?= $base_url; ?>images/logo_default.png"/>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?= $base_url; ?>plugins/font-awesome/css/font-awesome.min.css">

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
				<section class="content-header content-header0">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Dashboard</h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
									<li class="breadcrumb-item active">Dashboard</li>
								</ol>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<div class="content">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?= $my_total_orders; ?></h3>
									<p>Total Orders</p>
								</div>
								<div class="icon">
									<i class="fa fa-shopping-bag"></i>
								</div>
								<a href="<?= $base_url; ?>orders/list-orders.php" class="small-box-footer">More Infos
								<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-danger">
								<div class="inner">
									<h3>$<?= $my_total_earnings; ?></h3>
									<p>Total earnings</p>
								</div>
								<div class="icon">
									<i class="fa fa-money"></i>
								</div>
								<a href="<?= $base_url; ?>transactions/list-transactions.php" class="small-box-footer">More Infos
								<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-success">
								<div class="inner">
									<h3><?= $my_total_food_bookings; ?></h3>
									<p>Tootal Food Bookings</p>
								</div>
								<div class="icon">
									<i class="fa fa-cutlery"></i>
								</div>
								<a href="<?= $base_url; ?>food-bookings/list-food-bookings.php" class="small-box-footer">More Infos
								<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-warning">
								<div class="inner">
									<h3><?= $my_total_bookings; ?></h3>
									<p>Total Bookings</p>
								</div>
								<div class="icon">
									<i class="fa fa-group"></i>
								</div>
								<a href="<?= $base_url; ?>bookings/list-bookings.php" class="small-box-footer">More Infos
								<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
					</div>
					<!-- /.row -->
					<div class="row">
						<div class="col-lg-6">
							<div class="card">
								
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card">
								
							</div>
						</div>
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

		<!-- Slimscroll -->
		<script src="<?= $base_url; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="<?= $base_url; ?>plugins/chart.js/Chart.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?= $base_url; ?>dist/js/adminlte.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?= $base_url; ?>dist/js/demo.js"></script>
		
	</body>
</html>
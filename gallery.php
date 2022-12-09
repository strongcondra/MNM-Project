<?php
if (file_exists("includes/settings.php")) require_once("includes/settings.php");
else exit("<center><h2>file missing</h2></center>");
if (file_exists($root_dir . "includes/functions.php")) require_once($root_dir . "includes/functions.php");
else exit("<center><h2>file missing</h2></center>");

//FOR AUTHENTICATED USERS ONLY
if (!is_authenticated()) {
	update_user("index.php", "loging first");
}





//FOR UPDATING INFORMATION IN THE placedetails TABLE<br/>
//PLACE OWNERS SHOULD BE ABLE TO CHANGE THEIR PRIMARY OR SECOND IMAGE WITH ADDRESS STORED IN THAT SAME placedetails TABLE AND FILES STORED IN THE cafe FOLDER INSIDE THE images FOLDER IN THE ROOT DIRECTORY<br/>
//PLACE OWNERS SHOULD BE ABLE TO ADD UP TO A MAXIMUM OF 15 MORE IMAGES SHOULD SHOULD BE STORED IN THE image_list TABLE AND FILES STORED IN THE cafe FOLDER INSIDE THE images FOLDER IN THE ROOT DIRECTORY<br/>

$rows = get_profile_values();
$owner_name = $rows['owner_name'];
$owner_mobile = $rows['owner_mob'];
$owner_email = $rows['owner_email'];
$cafe_name = $rows['cafe_name'];
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
$trending = $rows['trending'];
$popular = $rows['popular'];
$address = $rows['address'];
$photoshoot = $rows['photoShoot'];
$cake = $rows['cake'];


$row = get_image_values();
$image_1 = $row['image_1'];
$image_2 = $row['image_2'];
$image_3 = $row['image_3'];
$image_4 = $row['image_4'];
$image_5 = $row['image_5'];
$image_6 = $row['image_6'];
$image_7 = $row['image_7'];
$image_8 = $row['image_8'];
$image_9 = $row['image_9'];
$image_10 = $row['image_10'];
$image_11 = $row['image_11'];
$image_12 = $row['image_12'];
$image_13 = $row['image_13'];
$image_14 = $row['image_14'];
$image_15 = $row['image_15'];



?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<title><?= $application_name; ?> |My Gallery</title>
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
							<h1 class="m-0 text-dark"><small>My Gallery</small></h1>
						</div>
						<!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= $base_url; ?>dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
								<li class="breadcrumb-item active">My Gallery</li>
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
								<a class="nav-link active" href="profile.php"><i class="fa fa-list mr-2"></i>Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="edit-profile.php"><i class="fa fa-list mr-2"></i>Edit Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="#"><i class="fa fa-list mr-2"></i>Gallery</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="update-gallery.php"><i class="fa fa-list mr-2"></i>Upload Images </a>
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


									<div class="form-group">
										<label for="product_image">Primary Image</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$primary_image}\" height='' width='220' alt='{$primary_image}' />"; ?>
									</div>								

									<div class="form-group">
										<label for="product_image">Secondary Image</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$secondary_image}\" height='' width='220' alt='{$secondary_image}' />"; ?>
									</div>
									
									<div class="form-group">
									

										<?php echo " <img src=\"{$base_url}images/cafe/{$image_1}\" height='' width='200' alt='{$image_1}' />"; ?>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_2}\" height='' width='200' alt='{$image_2}' />"; ?>
									
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_3}\" height='' width='200' alt='{$image_3}' />"; ?>
									
									
									
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_4}\" height='' width='200' alt='{$image_4}' />"; ?>
									
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_5}\" height='' width='200' alt='{$image_5}' />"; ?>
									
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_6}\" height='' width='200' alt='{$image_6}' />"; ?>
								
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_7}\" height='' width='200' alt='{$image_7}' />"; ?>
									
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_8}\" height='' width='200' alt='{$image_8}' />"; ?>
									
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_9}\" height='' width='200' alt='{$image_9}' />"; ?>
									
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_10}\" height='' width='200' alt='{$image_10}' />"; ?>
									
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_11}\" height='' width='200' alt='{$image_11}' />"; ?>
									
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_12}\" height='300' width='200' alt='{$image_12}' />"; ?>
									
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_13}\" height='' width='200' alt='{$image_13}' />"; ?>
									
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_14}\" height='' width='200' alt='{$image_14}' />"; ?>
									
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_15}\" height='' width='200' alt='{$image_15}' />"; ?>
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
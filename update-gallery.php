<?php
if (file_exists("includes/settings.php")) require_once("includes/settings.php");
else exit("<center><h2>file missing</h2></center>");
if (file_exists($root_dir . "includes/functions.php")) require_once($root_dir . "includes/functions.php");
else exit("<center><h2>file missing</h2></center>");

//FOR AUTHENTICATED USERS ONLY
if (!is_authenticated()) {
	update_user("index.php", "loging first");
}

if (isset($_POST['primary_image']) || isset($_POST['secondary_image']) || isset($_POST['image_1']) || isset($_POST['image_2'])|| isset($_POST['image_3'])|| isset($_POST['image_4'])|| isset($_POST['image_5'])|| isset($_POST['image_6'])|| isset($_POST['image_7'])|| isset($_POST['image_8'])|| isset($_POST['image_9'])|| isset($_POST['image_10'])|| isset($_POST['image_11'])|| isset($_POST['image_12'])|| isset($_POST['image_13']) || isset($_POST['image_14']) || isset($_POST['image_15'])  ) {

	

	//validation for images was skipped since the function is also going to check if the variables contain something
	$primary_image =$_FILES['primary_image'];
	$secondary_image=$_FILES['secondary_image'];
	$image_1 = $_FILES['image_1'];
	$image_2 = $_FILES['image_2'];
	$image_3 = $_FILES['image_3'];
	$image_4 = $_FILES['image_4'];
	$image_5 = $_FILES['image_5'];
	$image_6 = $_FILES['image_6'];
	$image_7 = $_FILES['image_7'];
	$image_8 = $_FILES['image_8'];
	$image_9 = $_FILES['image_9'];
	$image_10 = $_FILES['image_10'];
	$image_11 = $_FILES['image_11'];
	$image_12 = $_FILES['image_12'];
	$image_13 = $_FILES['image_13'];
	$image_14 = $_FILES['image_14'];
	$image_15 = $_FILES['image_15'];

	if ( !empty($primary_image)||!empty($secondary_image) || !empty($image_1) || !empty($image_2) || !empty($image_3) || !empty($image_4) || !empty($image_5) || !empty($image_6) || !empty($image_7) || !empty($image_8) || !empty($image_9) || !empty($image_10) || !empty($image_11) || !empty($image_12) || !empty($image_14) || !empty($image_15)) {

		if (upload_primary($primary_image)  || upload_secondary($secondary_image) ||upload_image1($image_1,$image_2,$image_3,$image_4,$image_5,$image_6,$image_7,$image_8,$image_9,$image_10,$image_11,$image_12,$image_13,$image_14,$image_15) ) {
			update_user("update-gallery.php", "image uploaded");
		}
	}
}

//FOR UPDATING INFORMATION IN THE placedetails TABLE<br/>
//PLACE OWNERS SHOULD BE ABLE TO CHANGE THEIR PRIMARY OR SECOND IMAGE WITH ADDRESS STORED IN THAT SAME placedetails TABLE AND FILES STORED IN THE cafe FOLDER INSIDE THE images FOLDER IN THE ROOT DIRECTORY<br/>
//PLACE OWNERS SHOULD BE ABLE TO ADD UP TO A MAXIMUM OF 15 MORE IMAGES SHOULD SHOULD BE STORED IN THE image_list TABLE AND FILES STORED IN THE cafe FOLDER INSIDE THE images FOLDER IN THE ROOT DIRECTORY<br/>

$rows = get_profile_values($_SESSION['cafe_id']);
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
	<title><?= $application_name; ?> |Upload Images</title>
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
							<h1 class="m-0 text-dark"><small>Upload Images</small></h1>
						</div>
						<!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= $base_url; ?>dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
								<li class="breadcrumb-item active">Upload Images</li>
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
								<a class="nav-link active" href="gallery.php"><i class="fa fa-list mr-2"></i>Gallery</a>
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
										<?php echo " <img src=\"{$base_url}images/cafe/{$primary_image}\" height='100' width='100' alt='{$primary_image}' />"; ?>
									
										<input type="file" name="primary_image" class="form-control">
										<input type="submit"  name="primary_image" value="upload Image" class="btn btn-primary">
									</div>
									<div class="form-group">
										<label for="product_image">Secondary Image</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$secondary_image}\" height='100' width='100' alt='{$secondary_image}' />"; ?>
									
										<input type="file" name="secondary_image" class="form-control">
										<input type="submit"  name="secondary_image" value="upload Image" class="btn btn-primary">
									</div>
								</div>
								<div class="col-md-7">

									<div class="form-group">
										<label for="product_image">Image 1</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_1}\" height='100' width='100' alt='{$image_1}' />"; ?>
									
										<input type="file" name="image_1" class="form-control">
										<input type="submit"  name="image_1" value="upload Image" class="btn btn-primary">
									</div>

									<div class="form-group">
										<label for="product_image">Image 2</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_2}\" height='100' width='100' alt='{$image_2}' />"; ?>
									
										<input type="file" name="image_2" class="form-control">
										<input type="submit"  name="image_2" value="upload Image" class="btn btn-primary">
									</div>
									<div class="form-group">
										<label for="product_image">Image 3</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_3}\" height='100' width='100' alt='{$image_1}' />"; ?>
									
										<input type="file" name="image_3" class="form-control">
										<input type="submit"  name="image_3" value="upload Image" class="btn btn-primary">
									</div>
									<div class="form-group">
										<label for="product_image">Image 4</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_4}\" height='100' width='100' alt='{$image_4}' />"; ?>
									
										<input type="file" name="image_4" class="form-control">
										<input type="submit"  name="image_4" value="upload Image" class="btn btn-primary">
									</div>
									<div class="form-group">
										<label for="product_image">Image 5</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_5}\" height='100' width='100' alt='{$image_5}' />"; ?>
									
										<input type="file" name="image_5" class="form-control">
										<input type="submit"  name="image_5" value="upload Image" class="btn btn-primary">
									</div>

									<div class="form-group">
										<label for="product_image">Image 6</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_6}\" height='100' width='100' alt='{$image_6}' />"; ?>
									
										<input type="file" name="image_6" class="form-control">
										<input type="submit"  name="image_6" value="upload Image" class="btn btn-primary">
									</div>

									<div class="form-group">
										<label for="product_image">Image 7</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_7}\" height='100' width='100' alt='{$image_7}' />"; ?>
									
										<input type="file" name="image_7" class="form-control">
										<input type="submit"  name="image_7" value="upload Image" class="btn btn-primary">
									</div>

									<div class="form-group">
										<label for="product_image">Image 8</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_8}\" height='100' width='100' alt='{$image_8}' />"; ?>
									
										<input type="file" name="image_8" class="form-control">
										<input type="submit"  name="image_8" value="upload Image" class="btn btn-primary">
									</div>

									<div class="form-group">
										<label for="product_image">Image 9</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_9}\" height='100' width='100' alt='{$image_9}' />"; ?>
									
										<input type="file" name="image_9" class="form-control">
										<input type="submit"  name="image_9" value="upload Image" class="btn btn-primary">
									</div>

									<div class="form-group">
										<label for="product_image">Image 10</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_10}\" height='100' width='100' alt='{$image_1}' />"; ?>
									
										<input type="file" name="image_10" class="form-control">
										<input type="submit"  name="image_10" value="upload Image" class="btn btn-primary">
									</div>

									<div class="form-group">
										<label for="product_image">Image 11</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_11}\" height='100' width='100' alt='{$image_11}' />"; ?>
									
										<input type="file" name="image_11" class="form-control">
										<input type="submit"  name="image_11" value="upload Image" class="btn btn-primary">
									</div>
									<div class="form-group">
										<label for="product_image">Image 12</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_12}\" height='100' width='100' alt='{$image_12}' />"; ?>
									
										<input type="file" name="image_12" class="form-control">
										<input type="submit"  name="image_12" value="upload Image" class="btn btn-primary">
									</div>
									<div class="form-group">
										<label for="product_image">Image 13</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_13}\" height='100' width='100' alt='{$image_13}' />"; ?>
									
										<input type="file" name="image_13" class="form-control">
										<input type="submit"  name="image_13" value="upload Image" class="btn btn-primary">
									</div>

									<div class="form-group">
										<label for="product_image">Image 14</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_14}\" height='100' width='100' alt='{$image_14}' />"; ?>
									
										<input type="file" name="image_14" class="form-control">
										<input type="submit"  name="image_14" value="upload Image" class="btn btn-primary">
									</div>
									<div class="form-group">
										<label for="product_image">Image 15</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$image_15}\" height='100' width='100' alt='{$image_15}' />"; ?>
									
										<input type="file" name="image_15" class="form-control">
										<input type="submit"  name="image_15" value="upload Image" class="btn btn-primary">
									</div>

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



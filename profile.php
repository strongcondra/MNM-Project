<?php
if (file_exists("includes/settings.php")) require_once("includes/settings.php");
else exit("<center><h2>file missing</h2></center>");
if (file_exists($root_dir . "includes/functions.php")) require_once($root_dir . "includes/functions.php");
else exit("<center><h2>file missing</h2></center>");

//FOR AUTHENTICATED USERS ONLY
if (!is_authenticated()) {
	update_user("index.php", "loging first");
}

if (isset($_POST['owner_name']) && isset($_POST['owner_mobile'])  && isset($_POST['owner_email']) && isset($_POST['cafe_name']) && isset($_POST['owner_upi']) && isset($_POST['location']) && isset($_POST['cost'])  && isset($_POST['description']) && isset($_POST['service_area']) && isset($_POST['facilities']) && isset($FILES['primary_image']) && isset($_FILES['secondary_image'])  && isset($_POST['cuisine']) && isset($_POST['longitude']) && isset($_POST['latitude']) && isset($_POST['category']) && isset($_POST['information'])  && isset($_POST['full_reservation']) && isset($_POST['individual_reservation']) && isset($_POST['capacity'])  && isset($_POST['trending']) && isset($_POST['popular']) && isset($_POST['address']) && isset($_POST['photoshoot'])  && isset($_POST['cake'])) {

	$owner_name = $_POST['owner_name'];
	$owner_mobile = $_POST['owner_mobile'];
	$owner_email = $_POST['owner_email'];
	$cafe_name = $_POST['cafe_name'];
	$owner_upi = $_POST['owner_upi'];
	$location = $_POST['location'];
	$cost = (int) $_POST['cost'];
	$description = $_POST['description'];
	$service_area = (int) $_POST['service_area'];
	$facilities = $_POST['facilities'];
	$primary_image = $_FILES['primary_image'];
	$secondary_image = $_FILES['secondary_image'];
	$cuisine = $_POST['cuisine'];
	$longitude = $_POST['longitude'];
	$latitude = $_POST['latitude'];
	$category = $_POST['category'];
	$information = $_POST['information'];
	$full_reservation = $_POST['full_reservation'];
	$individual_reservation = $_POST['individual_reservation'];
	$capacity = $_POST['capacity'];
	$trending = $_POST['trending'];
	$popular = $_POST['popular'];
	$address = $_POST['address'];
	$photoshoot = $_POST['photoshoot'];
	$cake = $_POST['cake'];

	//validation for images was skipped since the function is also going to check if the variables contain something
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

	if (
		!empty($owner_name)  && !empty($owner_email) && !empty($cafe_name) && !empty($owner_upi) && !empty($location) && !empty($cost) && !empty($description) && !empty($service_area) && !empty($facilities) && !empty($primary_image) && !empty($secondary_image)   && !empty($capacity) && !empty($individual_reservation) && !empty($full_reservation) && !empty($longitude) && !empty($information)
		&& !empty($trending) && !empty($category) && !empty($address) && !empty($photoshoot) && !empty($cake)
	) {

		if (update_profile($owner_name, $owner_email, $owner_mobile, $cafe_name, $owner_upi, $location, $cost, $description, $service_area, $facilities, $primary_image, $secondary_image, $capacity, $individual_reservation, $full_reservation, $longitude, $latitude, $information, $trending, $popular, $category, $cuisine, $address, $photoshoot, $cake) && upload_images($image_1, $image_2, $image_3, $image_4, $image_5, $image_6, $image_7, $image_8, $image_9, $image_10, $image_11, $image_12,$image_13, $image_14, $image_15)) {
			update_user("", "Profile Updated Successfully");
		}
	}
}


$categories = get_categories();
$locations = get_locations();
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


$row = get_image_values($_SESSION['cafe_name']);
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
	<title><?= $application_name; ?> |Update Profile</title>
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
							<h1 class="m-0 text-dark"><small>My Profile</small></h1>
						</div>
						<!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= $base_url; ?>dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
								<li class="breadcrumb-item active">My Profile</li>
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
								<a class="nav-link active" href="#"><i class="fa fa-list mr-2"></i>Profile</a>
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
										<label for="name">Owner Name</label>
										<input type="text" name="owner_name" class="form-control" id="owner_name" value="<?= $owner_name; ?>" disabled>
									</div>
									<div class="form-group">
										<label for="email">Owner Mobile</label>
										<input type="tel" name="owner_mob" class="form-control" id="owner_mob" value="<?= $owner_mobile; ?>" disabled>

									</div>
									<div class="form-group">
										<label for="name">Owner Email</label>
										<input type="text" name="owner_email" class="form-control" id="owner_email" value="<?= $owner_email; ?>" disabled>
									</div>

									<div class="form-group">
										<label for="name">Cafe Name</label>
										<input type="text" name="cafe_name" class="form-control" id="cafe_name" value="<?= $cafe_name; ?>" disabled>
									</div>
									<div class="form-group">
										<label for="name">Owner Upi</label>
										<input type="text" name="owner_upi" class="form-control" id="owner_upi" value="<?= $owner_upi; ?>" disabled>
									</div>
									<div class="form-group">
										<label for="name">Location</label>
										<input type="text" name="owner_upi" class="form-control" id="owner_upi" value="<?= $location; ?>" disabled>
									
									</div>
									<div class="form-group">
										<label for="name">Cost</label>
										<input type="number" name="cost" class="form-control" id="cost" value="<?= $cost; ?>"  disabled>
									</div>


									<div class="form-group">
										<label for="name">Description</label>
										
										<textarea class="form-control" disabled> <?= $description; ?>  </textarea>
									</div>
									<div class="form-group">
										<label for="email">Service Area</label>
										<input type="number" name="service_area" class="form-control" id="service_area" value="<?= $service_area; ?>" disabled>

									</div>
									<div class="form-group">
										<label for="name">Facilities</label>
										<input type="text" name="facilities" class="form-control" id="facilities" value="<?= $facilities; ?>" disabled>
									</div>

									<div class="form-group">
										<label for="product_image">Primary Image</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$primary_image}\" height='75' width='75' alt='{$primary_image}' />"; ?>
									</div>								

									<div class="form-group">
										<label for="product_image">Secondary Image</label>
										<?php echo " <img src=\"{$base_url}images/cafe/{$secondary_image}\" height='75' width='75' alt='{$secondary_image}' />"; ?>
									</div>

									<div class="form-group">
										<label for="name">Cuisine</label>
										<input type="text" name="cuisine" class="form-control" id="cuisine" value="<?= $cuisine; ?>" disabled>
									</div>
									<div class="form-group">
										<label for="email">Longitude</label>
										<input type="text" name="longitude" class="form-control" id="longitude" value="<?= $longitude; ?>" disabled>

									</div>
									<div class="form-group">
										<label for="name">Latitude</label>
										<input type="text" name="latitude" class="form-control" id="latitude" value="<?= $latitude; ?>" disabled>
									</div>


									<div class="form-group">
										<label for="name">Category</label>
										<input type="text" name="owner_upi" class="form-control" id="owner_upi" value="<?= $category; ?>" disabled>
										</select>
									</div>
									<div class="form-group">
										<label for="email">Information</label>
										<textarea class="form-control"   disabled><?= $information; ?></textarea>
									</div>
									<div class="form-group">
										<label for="name">Full Reservation</label>
										<input type="text" name="full_reservation" class="form-control" id="full_reservation" value="<?= $full_reservation; ?>" disabled>
									</div>


									<div class="form-group">
										<label for="name">Individual Reservation</label>
										<input type="text" name="individual_reservation" class="form-control" id="individual_reservation" value="<?= $individual_reservation; ?>" disabled>
									</div>
									<div class="form-group">
										<label for="email">Capacity</label>
										<input type="text" name="capacity" class="form-control" id="capacity" value="<?= $capacity; ?>"  disabled>

									</div>

									<div class="form-group">
										<label for="name">Trending</label>
										<input type="text" name="owner_upi" class="form-control" id="owner_upi" value="<?= $trending; ?>" disabled>

									</div>
									<div class="form-group">
										<label for="name">Popular</label>
										<input type="text" name="owner_upi" class="form-control" id="owner_upi" value="<?= $popular; ?>" disabled>

									</div>


									<div class="form-group">
										<label for="name">Address</label>
										<input type="textarea" name="address" class="form-control" id="address" value="<?= $address; ?>" disabled>
									</div>
									<div class="form-group">
										<label for="email">Photoshoot</label>
										<input type="text" name="photoshoot" class="form-control" id="photoshoot" value="<?= $photoshoot; ?>" disabled >

									</div>

									<div class="form-group">
										<label for="email">Cake</label>
										<input type="text" name="cake" class="form-control" id="cake" value="<?= $cake; ?>" disabled>

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
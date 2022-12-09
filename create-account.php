<?php
if (file_exists("./includes/settings.php")) require_once("./includes/settings.php");
else exit("<center><h2>file missing</h2></center>");
if (file_exists("./includes/functions.php")) require_once("./includes/functions.php");
else exit("<center><h2>file missing</h2></center>");

//REDIRECTING IF ALREADY AUTHENTICATED
if (is_authenticated()) {
	update_user("dashboard.php", "", 0);
}

if (isset($_POST['owner_name']) && isset($_POST['owner_pass']) && isset($_POST['owner_email']) && isset($_POST['cafe_name']) && isset($_POST['owner_upi']) && isset($_POST['location']) && isset($_POST['cost']) && isset($_POST['description']) && isset($_POST['service_area']) && isset($_POST['facilities']) && isset($_FILES['primary_image']) && isset($_FILES['secondary_image']) && isset($_POST['capacity']) && isset($_POST['individual_reservation']) && isset($_POST['full_reservation']) && isset($_POST['longitude']) && isset($_POST['latitude']) && isset($_POST['information'])  && isset($_POST['category']) && isset($_POST['cuisine'])) {

	$owner_name = $_POST['owner_name'];
	$owner_pass = $_POST['owner_pass'];
	$owner_email = $_POST['owner_email'];
	$owner_mob = $_POST['owner_mob'];
	$cafe_name = $_POST['cafe_name'];
	$owner_upi = $_POST['owner_upi'];
	$location = $_POST['location'];
	$cost = $_POST['cost'];
	$description = $_POST['description'];
	$service_area = $_POST['service_area'];
	$facilities = $_POST['facilities'];
	$primary_image = $_FILES['primary_image'];
	$secondary = $_FILES['secondary_image'];
	$status = (int) $_POST['status'];
	$capacity = $_POST['capacity'];
	$individual_reservation = $_POST['individual_reservation'];
	$full_reservation = $_POST['full_reservation'];
	$longitude = $_POST['longitude'];
	$latitude = $_POST['latitude'];
	$information = $_POST['information'];
	$category = $_POST['category'];
	$cuisine = $_POST['cuisine'];

	if (
		!empty($owner_name) && !empty($owner_pass) && !empty($owner_email) && !empty($cafe_name) && !empty($owner_upi) && !empty($location) && !empty($cost) && !empty($description) && !empty($service_area) && !empty($facilities) && !empty($primary_image)   && !empty($capacity) && !empty($individual_reservation) && !empty($full_reservation) && !empty($longitude) && !empty($information) && !empty($category) && !empty($cuisine) && !empty($secondary)
	) {

		if (!registered_cafe($cafe_name)   && create_account($owner_name, $owner_pass, $owner_email, $owner_mob, $cafe_name, $owner_upi, $location, $cost, $description, $service_area, $facilities, $primary_image, $secondary, $status, $capacity, $individual_reservation, $full_reservation, $longitude, $latitude, $information, $category, $cuisine) && create_cafe($cafe_name) ) {
			update_user("", "Account succesfully Created");
		}
	}
}








$category = get_categories();
$location = get_locations();

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $application_name; ?> | Manage Mobile Application</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/logo_default.png" />
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link href="https://unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css" rel="stylesheet">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
	<!-- Google Font: Poppins -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="css/custom.css">
</head>

<body style="height: 100%; background-color: #f9f9f9;" class="hold-transition sidebar-mini success">
	<div class="login-box">
		<div class="login-logo">
			<a href=""><img src="images/logo_default.png" alt="<?= $application_name; ?>"></a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<div class="card-body login-card-body">
					<p class="login-box-msg">Register</p>
					<form action="" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="owner_name" placeholder="Enter Your Name" aria-label="name" required="required">
						</div>

						<div class="form-group">
							<label for="name">Password</label>
							<input type="password" class="form-control" name="owner_pass" placeholder="Enter Your Password" aria-label="name" required="required">
							<input type="hidden" class="form-control" name="status" value="0" aria-label="name">
						</div>

						<div class="form-group">
							<label for="name">Email</label>
							<input type="email" class="form-control" name="owner_email" placeholder="Enter Your Email" aria-label="name" required="required">
						</div>

						<div class="form-group">
							<label for="name">Mobile Number</label>
							<input type="tel" class="form-control" name="owner_mob" placeholder="Enter Your Mobile Number" aria-label="name" required="required">
						</div>


						<div class="form-group">
							<label for="name">Cafe Name</label>
							<input type="text" class="form-control" name="cafe_name" placeholder="Enter Your Name" aria-label="name" required="required">
						</div>

						<div class="form-group">
							<label for="name">UPI</label>
							<input value="" type="text" class="form-control" name="owner_upi" placeholder="Enter Your UPI" aria-label="name" required="required">
						</div>

						<div class="form-group">
							<label for="name">Location</label>
							<select class="form-control" name="location" placeholder="" aria-label="name">
								<?php
								if (!empty($location)) {
									foreach ($location as $item) {
										echo "<option value=\"{$item['name']}\" selected=\"selected\">{$item['name']}</option>";
									}
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="name">Cost</label>
							<input type="text" class="form-control" name="cost" placeholder="Enter Cost" aria-label="name" required="required">
						</div>

						<div class="form-group">
							<label for="name">Description</label>
							<textarea class="form-control" name="description" placeholder="Enter Description" aria-label="name" required="required">

								</textarea>

						</div>

						<div class="form-group">
							<label for="name">Service Area</label>
							<input type="text" class="form-control" name="service_area" placeholder="Enter Your service area" aria-label="name" required="required">
						</div>

						<div class="form-group">
							<label for="name">Facilities</label>
							<input type="text" class="form-control" name="facilities" placeholder="Enter Facilities" aria-label="name" required="required">
						</div>

						<div class="form-group">
							<label for="name">Primary Image</label>
							<input type="file" class="form-control" name="primary_image" placeholder="Upload image " aria-label="name">

						</div>
						
						<div class="form-group">
							<label for="name">Secondary Image</label>
							<input type="file" class="form-control" name="secondary_image" placeholder="Upload image " aria-label="name">

						</div>


						<div class="form-group">
							<label for="name">Capacity</label>
							<input type="text" class="form-control" name="capacity" placeholder="Enter capacity" aria-label="name" required="required">
						</div>

						<div class="form-group">
							<label for="name">Individual Reservation</label>
							<input type="text" class="form-control" name="individual_reservation" placeholder="Enter Individual Reservation" aria-label="name" required="required">
						</div>

						<div class="form-group">
							<label for="name">Full Reservation</label>
							<input type="text" class="form-control" name="full_reservation" placeholder="Enter Full Reservation" aria-label="name" required="required">
						</div>

						<div class="form-group">
							<label for="name">Longitude</label>
							<input type="text" class="form-control" name="longitude" placeholder="Enter Longitude" aria-label="name" required="required">
						</div>

						<div class="form-group">
							<label for="name">Latitude</label>
							<input type="text" class="form-control" name="latitude" placeholder="Enter latitude" aria-label="name" required="required">
						</div>

						<div class="form-group">
							<label for="name">Information</label>
							<textarea class="form-control" name="information" placeholder="Enter Information" aria-label="name" required="required"></textarea>

						</div>

						<div class="form-group">
							<label for="name">Category</label>
							<select class="form-control" name="category" placeholder="" aria-label="name">
								<?php
								if (!empty($category)) {
									foreach ($category as $item) {
										echo "<option value=\"{$item['name']}\" selected=\"selected\">{$item['name']}</option>";
									}
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="name">Cuisine</label>
							<input type="text" class="form-control" name="cuisine" placeholder="Enter Cuisine" aria-label="name" required="required">
						</div>


						<div class="row mb-2">

							<!-- /.col -->
							<div class="col-4">
								<button type="submit" class="btn btn-primary btn-block">Register</button>
							</div>
							<!-- /.col -->
						</div>
					</form>


					<p class="mb-0 text-center">
						<a href="<?= $base_url; ?>index.php" class="text-center">Already a member</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- /.login-box -->
	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- iCheck -->
	<script src="plugins/iCheck/icheck.min.js"></script>
	<script>
		$(function() {
			$('.icheck input').iCheck({
				checkboxClass: 'icheckbox_flat-blue',
				radioClass: 'iradio_flat-blue',
				increaseArea: '20%' // optional
			})
		})
	</script>

</body>

</html>
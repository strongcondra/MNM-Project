<?php
if (file_exists("./includes/settings.php")) require_once("./includes/settings.php");
else exit("<center><h2>file missing</h2></center>");
if (file_exists("./includes/functions.php")) require_once("./includes/functions.php");
else exit("<center><h2>file missing</h2></center>");

//REDIRECTING IF ALREADY AUTHENTICATED
if (is_authenticated()) {
	update_user("dashboard.php", "", 0);
}

if (isset($_POST['owner_name']) && isset($_POST['owner_pass']) && isset($_POST['owner_email']) && isset($_POST['cafe_name']) && isset($_POST['owner_mob'])) {

	$owner_name = $_POST['owner_name'];
	$owner_pass = $_POST['owner_pass'];
	$owner_email = $_POST['owner_email'];
	$owner_mob = $_POST['owner_mob'];
	$cafe_name = $_POST['cafe_name'];

	if (
		!empty($owner_name) && !empty($owner_pass) && !empty($owner_email) && !empty($cafe_name) && !empty($owner_mob)) {

		if (!registered_cafe($cafe_name)   && create_temp_account($owner_name, $owner_pass, $owner_email, $owner_mob, $cafe_name) && create_cafe($cafe_name) ) {
			update_user("index.php", "Account succesfully Created");
		}
	}
}


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
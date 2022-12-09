<?php
	if(file_exists("./includes/settings.php")){ include_once("./includes/settings.php");}
	else {exit("<center><h2>file missing</h2></center>");}
	if(file_exists("./includes/functions.php")) include_once("./includes/functions.php");
	else exit("<center><h2>file missing</h2></center>");

	//REDIRECTING IF ALREADY AUTHENTICATED
	if(is_authenticated()){
		update_user("dashboard.php", "", 0);
	}

	//AREA FOR AUTHENTICATION
	if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['csrf_token']) && isset($_SESSION['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']){
		$email = clean($_POST['email']);
		$password = clean($_POST['password']);

		if(!empty($email) && !empty($password) && passed_temp_authentication($email, $password)){
			update_user("dashboard.php", "", 0);
		}
	}

	$_SESSION['csrf_token'] = get_random_token();
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
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href=""><img src="images/logo_default.png" alt="<?= $application_name; ?>"></a>
			</div>
			<!-- /.login-logo -->
			<div class="card">
				<div class="card-body login-card-body">
					<div class="card-body login-card-body">
						<p class="login-box-msg">Sign in to start your session</p>
						<form action="" method="post">
							<input type="hidden" name="csrf_token" value="<?= isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : ""; ?>">
							<div class="input-group mb-3">
								<input value="" type="email" class="form-control" name="email" placeholder="Email Address" aria-label="Email Address" required="required">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-envelope"></i></span>
								</div>
							</div>
							<div class="input-group mb-3">
								<input value="" type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" required="required">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-lock"></i></span>
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-8">
									<div class="checkbox icheck">
										<label> <input type="checkbox" name="remember"> Remember Me
										</label>
									</div>
								</div>
								<!-- /.col -->
								<div class="col-4">
									<button type="submit" class="btn btn-primary btn-block">Login</button>
								</div>
								<!-- /.col -->
							</div>
						</form>

						<p class="mb-1 text-center">
			                <a href="<?= $base_url; ?>reset-password.php">I forgot my password</a>
			            </p>
			            <p class="mb-0 text-center">
			                <a href="<?= $base_url; ?>signup.php" class="text-center">Register a new membership</a>
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
			$(function () {
			    $('.icheck input').iCheck({
			        checkboxClass: 'icheckbox_flat-blue',
			        radioClass: 'iradio_flat-blue',
			        increaseArea: '20%' // optional
			    })
			})
		</script>

	</body>
</html>


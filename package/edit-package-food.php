<?php
if (file_exists('../includes/settings.php')) require_once('../includes/settings.php');
else exit("<center><h2>file missing</h2></center>");
if (file_exists($root_dir . 'includes/functions.php')) require_once($root_dir . 'includes/functions.php');
else exit("<center><h2>file missing</h2></center>");
//ONLY ACCESSIBLE TO AUTHENTICATED USERS
if (!is_authenticated()) {
	update_user("", "login first");
}

$cafe_id = get_my_cafe_id();
$id = $_GET['id'];
$mes = '';
// redirect if $location_id not defined
if (!isset($id)) {
	update_user("package/package-list.php", "Operation Failed");
	exit;
}



//put the values in the table into the form using id 
// get details of selected location
function get_package($id)
{
	if (isset($id)) {

		// prepare SQL query
		$statement = get_connection()->prepare("SELECT * FROM `package_food` WHERE `id`=?");
		$statement->execute([$id]);
		if (!isset($statement->errorInfo()[2])) {

			if ($statement->rowCount() == 1) {
				return $statement->fetch(PDO::FETCH_ASSOC);
			}
		}
	}
	return false;
}

//update Package
function update_Package($pid, $food_name, $type, $price, $menu_image, $id)
{
	if (is_authenticated() && !empty($pid) && !empty($food_name) && !empty($type) && !empty($price)) {
		echo $extension = pathinfo($menu_image['name'], PATHINFO_EXTENSION);
		echo $food_image_name = pathinfo($menu_image['name'], PATHINFO_BASENAME);
		echo 'hello';
		if (!empty($extension) && ($extension == 'pdf' || $extension == 'docx' || $extension == 'doc' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {

			$statement = get_connection()->prepare("UPDATE  `package_food` SET `pid`=?,`food_name`=?, `type`=? ,`price`=?, `food_Image`=? WHERE  `id`=?");
			$statement->execute([$pid, $food_name, $type, $price, $food_image_name, $id]);

			if ($statement->rowCount() == 1) {
				if (move_uploaded_file($menu_image['tmp_name'], $GLOBALS['root_dir'] . "images/place_menu/" . $food_image_name)) {
					return true;
				}
			}
		}
	}
	return true;
}
if (isset($_POST['id']) && isset($_POST['food_name'])) {
	$menu_image = $_FILES['menu_image'];
	$pid = $_POST['pid'];
	$food_name = $_POST['food_name'];
	$type = $_POST['type'];
	$price = $_POST['price'];


	if (!empty($name) && !empty($pid) && !empty($food_name) && !empty($type) && !empty($price) && !empty($menu_image)) {

		if (update_Package($pid, $food_name, $type, $price, $menu_image, $id)) {

			$mes = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert! successfully updated</h5>
                  
                </div>';
		} else {
			$mes = '';
		}
	}
}


$package_name = get_package_name();
$row = get_package($id);
$pid = $row['pid'];
$name = $row['food_name'];
$type = $row['type'];
$price = $row['price'];
$food_image = $row['food_Image'];


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<title><?= $application_name; ?> Update Package</title>
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
							<h1 class="m-0 text-dark"><small>Update Package</small></h1>
						</div>
						<!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= $base_url; ?>dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
								<li class="breadcrumb-item active">Update Package</li>
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
								<a class="nav-link active" href="#"><i class="fa fa-list mr-2"></i>Update Package</a>
							</li>
						</ul>
					</div>
					<form role="form" action="" method="post" enctype="multipart/form-data">
						<input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
						<div class="card-body">
							<div class="row">
								<div class="col-md-7">

									<div class="form-group">
										<label>Category</label>
										<select class="form-control select2" name="type" style="width: 100%;">
											<option selected="selected">SELECT</option>
											<option value="veg" <?php echo $type == 'veg' ? "selected" : "" ?>>Veg</option>
											<option value="nonveg" <?php echo $type == 'nonveg' ? "selected" : "" ?>>Non Veg</option>
											<option value="drink" <?php echo $type == 'drink' ? "selected" : "" ?>>Drink</option>

										</select>
									</div>
									<div class="form-group">
										<label>Sub Category</label>
										<select class="form-control select2" name="pid" style="width: 100%;">
											<option value="">SELECT</option>
											<?php
											if (!empty($package_name)) {
												foreach ($package_name as $item) {
											?>
													<option value="<?php echo $item['id'] ?>" <?php echo $item['id'] == $pid ? "selected" : "" ?>><?php echo  $item['name']; ?></option>';
											<?php
												}
											}
											?>

										</select>
									</div>

									<div class="form-group">
										<label for="email">Food Name</label>
										<input type="text" name="food_name" class="form-control" placeholder="Enter food name" value="<?php echo $name; ?>">
									</div>

									<div class="form-group">
										<label for="name">Price</label>
										<input type="text" name="price" class="form-control" placeholder="Enter price" value="<?php echo $price; ?>">
									</div>

									<div class="form-group">
										<?php echo " <img src=\"{$base_url}images/place_menu/{$food_image}\" height='75' width='75' alt='{$food_image}' />"; ?>
									</div>
									<div class="form-group">
										<label for="product_image">Menu Image</label>
										<input type="file" name="menu_image" class="form-control" id="menu_image" placeholder="Upload Menu Image" value="<?php echo $food_image; ?>">
									</div>




									<div class="form-group">
										<button type="submit" class="btn btn-primary">Update</button>
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
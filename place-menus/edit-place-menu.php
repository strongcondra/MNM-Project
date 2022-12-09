<?php
if (file_exists("../includes/settings.php")) require_once("../includes/settings.php");
else exit("<center><h2>file missing</h2></center>");
if (file_exists($root_dir . "includes/functions.php")) require_once($root_dir . "includes/functions.php");
else exit("<center><h2>file missing</h2></center>");

//FOR AUTHENTICATED USERS ONLY
if (!is_authenticated()) {
	update_user("index.php", "loging first");
}

$menu_id = $_GET['id'];

function get_place_menu_value($menu_id)
{
	if (isset($menu_id)) {

		$statement = get_connection()->prepare("SELECT `menu_id`, `cuisine`,`food_description`,`featured`,`food_name`, `food_Image`,`type`,`price`,`ingredients`,`quantityAvailable` FROM `placeMenu` WHERE `menu_id`=?");
		$statement->execute([$menu_id]);
		if (!isset($statement->errorInfo()[2])) {

			if ($statement->rowCount() == 1) {
				return $statement->fetch(PDO::FETCH_ASSOC);
			}
		}
	}
	return false;
}

function update_place_menu($id, $cuisine, $food_description, $food_name, $food_Image, $featured, $type, $price, $ingredients, $quantityAvailable)
{
	if (!empty($id) && !empty($cuisine) && !empty($food_description) && !empty($food_name) && !empty($featured) && !empty($type) && !empty($price) && !empty($ingredients) && !empty($quantityAvailable)) {
		$extension = pathinfo($food_Image['name'], PATHINFO_EXTENSION);
		$food_image_name = pathinfo($food_Image['name'], PATHINFO_BASENAME);
		if (!empty($extension) && ($extension == 'pdf' || $extension == 'docx' || $extension == 'doc' || $extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG')) {
			$statement = get_connection()->prepare("UPDATE  `placeMenu` SET `cuisine`=?,`food_description`=?,`featured`=? ,`food_name`=?, `type`=? ,`price`=?,`ingredients`=?,`quantityAvailable`=?, `food_Image`=? WHERE  `menu_id`=?");
			$statement->execute([$cuisine, $food_description, $featured, $food_name, $type, $price, $ingredients, $quantityAvailable, $food_image_name, $id]);

			if ($statement->rowCount() == 1) {




				if (move_uploaded_file($food_Image['tmp_name'], $GLOBALS['root_dir'] . "images/place_menu/" . $food_image_name)) {

					return true;
				}
			}
		}
	}
	return true;
}


if (isset($_POST['menu_id']) && isset($_POST['cuisine']) && isset($_POST['food_description'])  && isset($_POST['featured']) && isset($_POST['food_name']) && isset($_POST['type']) && isset($_POST['price']) && isset($_POST['ingredients']) && isset($_POST['quantityAvailable'])) {
	$menu_id = $_POST['menu_id'];
	$cuisine = $_POST['cuisine'];
	$food_description = $_POST['food_description'];
	$featured = $_POST['featured'];
	$food_name = $_POST['food_name'];
	$type = $_POST['type'];
	$price = $_POST['price'];
	$ingredients = $_POST['ingredients'];
	$quantityAvailable = $_POST['quantityAvailable'];
	$food_Image = $_FILES['food_image'];

	if (!empty($menu_id) && !empty($cuisine) && !empty($food_description) && !empty($featured) && !empty($food_name) && !empty($type) && !empty($price) && !empty($ingredients) && !empty($quantityAvailable)) {

		if (update_place_menu($menu_id, $cuisine, $food_description, $featured, $food_Image, $food_name, $type, $price, $ingredients, $quantityAvailable)) {
			update_user("", "Successfully Updated");
		}
	}
}


$rows = get_place_menu_value($menu_id);
$id = $rows['menu_id'];
$cuisine = $rows['cuisine'];
$food_description = $rows['food_description'];
$featured = $rows['featured'];
$food_name = $rows['food_name'];
$type = $rows['type'];
$price = $rows['price'];
$food_image = $rows['food_Image'];
$ingredients = $rows['ingredients'];
$quantityAvailable = $rows['quantityAvailable'];


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<title><?= $application_name; ?> | Edit Place Menu Items</title>
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
							<h1 class="m-0 text-dark"><small>Edit Place Menu Items</small></h1>
						</div>
						<!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= $base_url; ?>dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
								<li class="breadcrumb-item active">Edit Place Menu Items</li>
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
								<a class="nav-link active" href="#"><i class="fa fa-list mr-2"></i>Edit Place Menu items</a>
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
										<label for="name">Cuisine</label>
										<input type="text" name="cuisine" class="form-control" value="<?= $cuisine; ?>" placeholder="Enter Cuisine">
									</div>
									<div class="form-group">
										<label for="name">Food Description</label>
										<input type="text" value="<?= $food_description; ?> " name="food_description" class="form-control" placeholder="Enter name">
									</div>
									<div class="form-group">
										<label>Featured</label>
										<select class="form-control select2" name="featured" value="" style="width: 100%;">
											<option value="<?= $featured; ?>"><?= $featured; ?></option>
											<option value="1">TRUE</option>
											<option value="2">FALSE</option>

										</select>
									</div>
									<div class="form-group">
										<label for="email">Food Name</label>
										<input type="text" value="<?= $food_name; ?>" name="food_name" class="form-control" placeholder="Enter food name">
									</div>
									<div class="form-group">
										<label for="name">Type</label>
										<input type="text" value="<?= $type; ?> " name="type" class="form-control" placeholder="Enter Type ">
									</div>
									<div class="form-group">
										<label for="name">Price</label>
										<input type="text" value="<?= $price; ?> " name="price" class="form-control" placeholder="Enter price">
									</div>
									<div class="form-group">
										<label for="name">Ingredients</label>
										<input type="text" value="<?= $ingredients; ?> " name="ingredients" class="form-control" placeholder="Enter price">
									</div>
									<div class="form-group">
										<label for="name">Quantity Availble</label>
										<input type="text" value="<?= $quantityAvailable; ?> " name="quantityAvailable" class="form-control">
										<input type="hidden" value="<?= $id; ?> " name="menu_id" class="form-control" >
									</div>

									<div class="form-group">
										<?php echo " <img src=\"{$base_url}images/place_menu/{$food_image}\" height='75' width='75' alt='{$food_image}' />"; ?>
									</div>

									<div class="form-group">
										<label for="product_image">Food Image</label>
										<input type="file" name="food_image" class="form-control" id="food_image">
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
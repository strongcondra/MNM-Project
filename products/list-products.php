<?php
if (file_exists("../includes/settings.php")) require_once("../includes/settings.php");
else exit("<center><h2>file missing</h2></center>");
if (file_exists($root_dir . "includes/functions.php")) require_once($root_dir . "includes/functions.php");
else exit("<center><h2>file missing</h2></center>");

//FOR AUTHENTICATED USERS ONLY
if (!is_authenticated()) {
	update_user("index.php", "log in first");
}

$products = get_products();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<title><?= $application_name; ?> |Products List</title>
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
							<h1 class="m-0 text-dark"><small>Products List</small></h1>
						</div>
						<!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= $base_url; ?>dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
								<li class="breadcrumb-item active">Products List</li>
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
								<a class="nav-link active" href="#"><i class="fa fa-list mr-2"></i>Products List</a>
							</li>
						</ul>
					</div>
					<div class="card-body">

						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Product ID</th>
									<th>Product Name</th>
									<th>Product Price</th>
									<th>Product Quantity</th>
									<th>Status</th>
									<th>Product Image</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php
								if (!empty($products)) {
									foreach ($products as $item) {

									

										echo "<tr><td>{$item['product_id']}</td><td>{$item['product_name']}</td><td>{$item['product_price']}</td><td>{$item['product_quant']}</td><td>" . (empty($item['set_active'])  ? "Not Active" : "Active") . "</td><td><img src=\"{$base_url}images/products/{$item['product_image']}\" height='25' width='25' alt='{$item['product_image']}' /></td><td><div class=\"btn-group btn-group-sm\"><a href=\"edit-product.php?id={$item['product_id']}\" class=\"btn btn-link\"><i class=\"fa fa-edit\"></i></a><form method=\"POST\" action=\"delete-product.php?id={$item['product_id']}\" accept-charset=\"UTF-8\"><button type=\"submit\" class=\"btn btn-link text-danger\" onclick=\"return confirm('Are you sure?')\"><i class=\"fa fa-trash\"></i></button>
									  </form></div></td></tr>";
									}
								}
								?>

							</tbody>

						</table>
						<div class="clearfix"></div>
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

	<!-- Bootstrap WYSIHTML5 -->
	<!-- Slimscroll -->
	<script src="<?= $base_url; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>

	<!-- DataTables -->
	<script type="text/javascript" src="<?= $base_url; ?>plugins/datatables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?= $base_url; ?>plugins/datatables/dataTables.bootstrap4.js"></script>

	<script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.5.0/js/dataTables.colReorder.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.0.3/js/dataTables.rowGroup.js"></script>

	<!-- AdminLTE App -->
	<script src="<?= $base_url; ?>dist/js/adminlte.js"></script>

	<!-- AdminLTE for demo purposes -->
	<script src="<?= $base_url; ?>dist/js/demo.js"></script>

	<script>
		$(function() {
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": true
			});
		});
	</script>
</body>

</html>
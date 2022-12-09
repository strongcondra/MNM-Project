<?php
if (file_exists("../includes/settings.php")) require_once("../includes/settings.php");
else exit("<center><h2>file missing</h2></center>");
if (file_exists($root_dir . "includes/functions.php")) require_once($root_dir . "includes/functions.php");
else exit("<center><h2>file missing</h2></center>");

//FOR AUTHENTICATED USERS ONLY
if (!is_authenticated()) {
	update_user("index.php", "loging first");
}

// echo $database_user.$database_user_password.$database_name;
$mysqli = new mysqli($database_host, $database_user, $database_user_password, $database_name);

// Check connection
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	exit();
}



$cafeId = get_my_cafe_id();

$statement = $mysqli->query("SELECT pf.*, p.name as package_name  FROM package_food pf, package p where pf.pid = p.id and pf.cafe_id = " . $cafeId);
$package =  $statement->fetch_all(MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<title><?= $application_name; ?> Package List</title>
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
							<h1 class="m-0 text-dark"><small>Package List</small></h1>
						</div>
						<!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= $base_url; ?>dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
								<li class="breadcrumb-item active">Package List</li>
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
								<a class="nav-link active" href="#"><i class="fa fa-list mr-2"></i>Package List</a>
							</li>
						</ul>
					</div>
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Food Name</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Type</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Package Name</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Status</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (!empty($package)) {
									foreach ($package as $item) {
										$checked = $item['status'] == '1'  ? "checked" : "";
										echo "<tr><td>{$item['id']}</td><td>{$item['food_name']}</td><td>{$item['type']}</td><td>{$item['package_name']}</td><td><div class='custom-control custom-checkbox'>
                          <input class='custom-control-input custom-control-input-danger custom-control-input-outline customCheckbox' type='checkbox' value='" . $item['status'] . "' id='" . $item['id'] . "' " . $checked . ">
                          <label for='" . $item['id'] . "' class='custom-control-label'>
                        " . ($item['status'] == '1'  ? "Active" : "Non-Active") . "</label></div></td><td><a href=\"delete-package-food.php?id={$item['id']}\"class=\"btn btn-danger\"  title=\"Delete\">Delete</a> &nbsp &nbsp <a href=\"{$base_url}package/edit-package-food.php?id={$item['id']}\" class=\"btn btn-success\" title=\"Edit\">Edit</a></td></tr>";
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
	<!-- Page specific script -->
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
			$('.customCheckbox').on('change', function() {
				let sts = $(this).val();
				let id = $(this).attr('id');

				sts = sts == '1' ? '0' : '1';
				$.post("/ajax.php", {
						submit: 'submit',
						table: 'package_food',
						id,
						sts,
					},
					function(data, sts) {
						let res = JSON.parse(data);
						if (res.mes == 'success') {
							alert('successfully updated');
							location.reload();
						} else {
							alert('Something went wrong');
						}

					});

			})
		});
	</script>
</body>

</html>
<?php
if (file_exists("../includes/settings.php")) require_once("../includes/settings.php");
else exit("<center><h2>file missing</h2></center>");
if (file_exists($root_dir . "includes/functions.php")) require_once($root_dir . "includes/functions.php");
else exit("<center><h2>file missing</h2></center>");

//FOR AUTHENTICATED USERS ONLY
if (!is_authenticated()) {
    update_user("index.php", "loging first");
}







if (isset($_POST['product_id']) && isset($_POST['product_name'])  && isset($_POST['product_price']) && isset($_POST['product_quantity']) && isset($_POST['activity'])) {
    $product_id = (int) $_POST['product_id'];

    $product_name = $_POST['product_name'];
    $product_price = (int) $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_image = $_FILES['product_image'];
    $activity = $_POST['activity'];



    if (!empty($product_id) && !empty($product_price) && !empty($product_name) && !empty($product_quantity) && !empty($activity)) {
        if (update_product($product_id,  $product_name, $product_price, $product_quantity, $product_image, $activity)) {
            update_user("", "update successful");
        }
    }
}


$rows = get_product_values($_GET['id']);
$product_id = $rows['product_id'];

$product_name = $rows['product_name'];
$product_price = $rows['product_price'];
$product_quantity = $rows['product_quant'];
$product_image = $rows['product_image'];
$activity = $rows['set_active'];




?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title><?= $application_name; ?> |Edit Product</title>
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
                            <h1 class="m-0 text-dark"><small>Edit Product</small></h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= $base_url; ?>dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
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
                                <a class="nav-link active" href="#"><i class="fa fa-list mr-2"></i>Edit Product</a>
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
                                        <label for="name">Product Name</label>
                                        <input type="text" name="product_name" class="form-control" id="product_name" value="<?= $product_name; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Product Price</label>
                                        <input type="text" name="product_price" class="form-control" id="product_price" value="<?= $product_price; ?>">

                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product Quantity</label>
                                        <input type="text" name="product_quantity" class="form-control" id="product_quantity" value="<?= $product_quantity; ?>">
                                    </div>
                                    <div class="form-group">
                                        <?php echo " <img src=\"{$base_url}images/products/{$product_image}\" height='75' width='75' alt='{$product_image}' />"; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="product_image">Product Image</label>
                                        <input type="file" name="product_image" class="form-control" id="product_image" placeholder="Upload Product Image">
                                    </div>

                                    <div class="form-group">
                                        <label for="activity">Activity Status</label>
                                        <select name="activity" class="form-control" id="activity">
                                            <option value="none" selected disabled hidden>
                                                <?php (empty($activity)  ? "Not Active" : "Active") ?>
                                            </option>
                                            <option value="1">Active</option>
                                            <option value="0">Not Active</option>

                                        </select>
                                        <input type="hidden" name="product_id" class="form-control" id="product_id" value="<?= $product_id; ?>">
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
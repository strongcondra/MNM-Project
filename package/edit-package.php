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
        $statement = get_connection()->prepare("SELECT * FROM `package_details` WHERE `id`=?");
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
function update_Package($name,$type,$details,$price,$starter,$mains,$deserts,$id)
{
    if(!empty($name) &&!empty($type) &&!empty($details) && !empty($price) && !empty($starter) && !empty($mains) && !empty($deserts)){
     echo 'hello';
        $statement = get_connection()->prepare("UPDATE  `package_details` SET `name`=?,`type`=?,`starter`=?,`mains`=?,`desserts`=?,`details`=?,`price`=? WHERE `id`=?");
        $statement->execute([$name,$type,$starter,$mains,$deserts,$details,$price,$id]);

        return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);

    }
}


if(isset($_POST['id']) && isset($_POST['details'])){
    $name =$_POST['name'];
    $type =$_POST['type'];
    	$details =$_POST['details'];
    	$price =$_POST['price'];
    	$starter =$_POST['starter'];
    	$mains =$_POST['mains'];
    	$deserts =$_POST['desserts'];
    

    if(!empty($name) &&!empty($type) &&!empty($details) && !empty($price) && !empty($starter) && !empty($mains) && !empty($deserts) ){
       
        if(update_Package($name,$type,$details,$price,$starter,$mains,$deserts,$id)){
            
            	$mes = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert! successfully updated</h5>
                  
                </div>';
    		}
    		else{
    		    $mes = '';
    		}
    }
}


// $package_name = get_package_name();
$row = get_package($id);
$name =$row['name'];
$type =$row['type'];
    	$details =$row['details'];
    	$price =$row['price'];
    	$starter =$row['starter'];
    	$mains =$row['mains'];
    	$desserts =$row['desserts'];


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<title><?= $application_name; ?> Update Package</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel="icon" type="image/png" href="<?= $base_url; ?>images/logo_default.png"/>
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
                    <form action="" method="post">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                <div class="card-body">
                    <?php
                    echo $mes;
                    ?>
                   <div class="form-group">
                    <label for="">Select Package Type</label>
                    <select class="form-control" name="type">
                        <option value="">Select Package Type</option>
                        <option value="veg" <?php echo $type == 'veg'? 'selected' : ''; ?>>Veg</option>
                        <option value="nonveg" <?php echo $type == 'nonveg'? 'selected' : ''; ?>>Non Veg</option>
                    </select>
                  </div>
                    
					<div class="form-group">
                    <label for="">Enter Package Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Package Name" value="<?php echo $name;?>">
                  </div>
					<div class="form-group">
                    <label for="">Enter Package Detail</label>
                    <input type="text" class="form-control" name="details" placeholder="Enter Package Detail" value="<?php echo $details;?>">
                  </div>
                  <div class="form-group">
                    <label for="">Starter</label>
                    <input type="number" class="form-control" name="starter" step="1" placeholder="Enter Starter Qty" value="<?php echo $starter;?>">
                  </div>
                  <div class="form-group">
                    <label for="">Mains</label>
                    <input type="number" class="form-control" name="mains" step="1" placeholder="Enter Mains Qty" value="<?php echo $mains;?>">
                  </div>
                  <div class="form-group">
                    <label for="">Desserts</label>
                    <input type="number" class="form-control" name="desserts" step="1" placeholder="Enter Desserts Qty" value="<?php echo $desserts;?>">
                  </div>
                  <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" step="1" placeholder="Enter Price" value="<?php echo $price;?>">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
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
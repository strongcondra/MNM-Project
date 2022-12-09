<?php
if (file_exists('../includes/settings.php')) require_once('../includes/settings.php');
else exit("<center><h2>file missing</h2></center>");
if (file_exists($root_dir . 'includes/functions.php')) require_once($root_dir . 'includes/functions.php');
else exit("<center><h2>file missing</h2></center>");
//ONLY ACCESSIBLE TO AUTHENTICATED USERS
if (!authenticated()) {
    update_user("", "login first");
}


$id = $_GET['id'];

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


$package_name = get_package_name();
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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Package</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $base_url; ?>plugins/fontawesome-free/css/all.min.css">


    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $base_url; ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php file_exists($root_dir . "includes/top-bar.php") && require_once($root_dir . "includes/top-bar.php"); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php file_exists($root_dir . "includes/left-menu.php") && require_once($root_dir . "includes/left-menu.php"); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?=$base_url;?>dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active">Edit Package</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Package</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
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


            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0-pre
            </div>
            <!-- <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.-->
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= $base_url; ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= $base_url; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI -->
    <script src="<?= $base_url; ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= $base_url; ?>dist/js/adminlte.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="<?= $base_url; ?>plugins/moment/moment.min.js"></script>
    <script src="<?= $base_url; ?>plugins/fullcalendar/main.min.js"></script>
    <script src="<?= $base_url; ?>plugins/fullcalendar-daygrid/main.min.js"></script>
    <script src="<?= $base_url; ?>plugins/fullcalendar-timegrid/main.min.js"></script>
    <script src="<?= $base_url; ?>plugins/fullcalendar-interaction/main.min.js"></script>
    <script src="<?= $base_url; ?>plugins/fullcalendar-bootstrap/main.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= $base_url; ?>dist/js/demo.js"></script>
    <!-- Page specific script -->

</body>

</html>
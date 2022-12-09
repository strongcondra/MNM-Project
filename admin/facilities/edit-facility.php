<?php
if (file_exists('../includes/settings.php')) require_once('../includes/settings.php');
else exit("<center><h2>file missing</h2></center>");
if (file_exists($root_dir . 'includes/functions.php')) require_once($root_dir . 'includes/functions.php');
else exit("<center><h2>file missing</h2></center>");
//ONLY ACCESSIBLE TO AUTHENTICATED USERS
if (!authenticated()) {
    update_user("", "login first");
}


$facility_id = $_GET['id'];

// redirect if $location_id not defined
if (!isset($facility_id)) {
    update_user("facilities/list-facilities.php", "Operation Failed");
    exit;
}



//put the values in the table into the form using id 
// get details of selected location
function get_facility_values($facility_id)
{
    if (isset($facility_id) && !$_POST) {
        // prepare SQL query
        $statement = get_connection()->prepare("SELECT `id`, `name` FROM `facilities` WHERE `id`=?");
        $statement->execute([$facility_id]);
        if (!isset($statement->errorInfo()[2])) {

            if ($statement->rowCount() == 1) {
                return $statement->fetch(PDO::FETCH_ASSOC);
            }
        }
    }
    return false;
}

//update facility
function update_facility($id, $name)
{
    if(!empty($id) && !empty($name) ){
        $statement = get_connection()->prepare("UPDATE  `facilities` SET `name`=? WHERE `id`=?");
        $statement->execute([$name,$id]);

        return (!isset($statement->errorInfo()[2]) && $statement->rowCount() == 1);

    }
}


if(isset($_POST['facility_id']) && isset($_POST['name'])){
    $facility_id = (int) $_POST['facility_id'];
    $name = $_POST['name'];
    

    if(!empty($facility_id) && !empty($name) ){
        if(update_facility($facility_id, $name)){
            update_user("facilities/list-facilities.php", "update successful");
        }
    }
}


$rows = get_facility_values($facility_id);
$id = $rows['id'];
$name = $rows['name'];




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Facility</title>

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
                                <li class="breadcrumb-item active">Edit Facility</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Facility</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                                <input name="facility_id" type="hidden" value="<?php echo $id; ?>">
                            </div>
                            

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="update_facility" value="update_facility" class="btn btn-primary">Update</button>
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
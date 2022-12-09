
<?php
    if(file_exists('../includes/settings.php')) require_once('../includes/settings.php');
    else exit("<center><h2>file missing</h2></center>");
    if(file_exists($root_dir . 'includes/functions.php')) require_once($root_dir . 'includes/functions.php');
    else exit("<center><h2>file missing</h2></center>");

    //ONLY ACCESSIBLE TO AUTHENTICATED USERS
    if(!authenticated()){
        update_user("", "login first");
    }
    
   
   
    $cafe = get_pending_cafe();
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List of Pending Cafés</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=$base_url;?>plugins/fontawesome-free/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?=$base_url;?>dist/css/adminlte.min.css">
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
              <li class="breadcrumb-item active">List of Pending Cafés</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
  <section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                 
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                     <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                          <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                              <thead>
                                 <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Owner Details</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Cafe</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Location</th>
                                    
                                   
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Information</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Image</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Cuisine</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Description</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Action</th>
                                    
                                    </tr>
                              </thead>
                              <tbody>
                               <?php
                               if (!empty($cafe)) {
                                    foreach ($cafe as $item) {
                                      echo "<tr><td>{$item['owner_name']} {$item['owner_mob']}</td><td>{$item['cafe_name']}</td><td>{$item['location']}</td><td>{$item['information']}</td><td><img src=\"{$client_url}images/cafe/{$item['primary_image']}\" height='120' width='150' alt='{$item['primary_image']}' /></td><td>{$item['cuisine']}</td><td>{$item['description']}</td><td style=\"white-space: nowrap;\"> <a href=\"delete-cafe.php?id={$item['cafe_id']}\" title=\"Delete\"class=\"btn btn-danger\">Delete</a>&nbsp &nbsp &nbsp <a href=\"accept-cafe.php?id={$item['cafe_id']}\" class=\"btn btn-success\" title=\"Accept\">Accept</a></td></tr>";
                                    }
                               }
                               ?>
                              </tbody>
                              
                               
                           </table>
                        </div>
                     </div>
                   </div>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
           
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=$base_url;?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=$base_url;?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=$base_url;?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=$base_url;?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=$base_url;?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=$base_url;?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=$base_url;?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=$base_url;?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=$base_url;?>plugins/jszip/jszip.min.js"></script>
<script src="<?=$base_url;?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=$base_url;?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=$base_url;?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=$base_url;?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=$base_url;?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$base_url;?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=$base_url;?>dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>

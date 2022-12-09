<?php
if (file_exists('../includes/settings.php')) require_once('../includes/settings.php');
else exit("<center><h2>file missing</h2></center>");
if (file_exists($root_dir . 'includes/functions.php')) require_once($root_dir . 'includes/functions.php');
else exit("<center><h2>file missing</h2></center>");

//ONLY ACCESSIBLE TO AUTHENTICATED USERS
if (!authenticated()) {
   update_user("", "login first");
}

//fill bookings arrray variable with data from the database

$bookings = get_bookings();

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Bookings List</title>

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
                        <li class="breadcrumb-item"><a href="<?= $base_url; ?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">List of Bookings</li>
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
                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                                             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">User Mobile</th>
                                             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Place</th>
                                             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Date Booked</th>
                                             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Payment Mode</th>
                                             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Reservations</th>
                                             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Cost</th>
                                             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Owner Mobile</th>
                                             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                                             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Image</th>
                                             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                          if (!empty($bookings)) {
                                              $i = 0;
                                             foreach ($bookings as $item) {
                                                 $checked = $item['status']=='1'  ? 'checked' : '';
                                                echo "<tr><td>{$item['booking_id']}</td><td>{$item['user_mobile']}</td><td>{$item['place_name']}</td><td>{$item['date']}</td><td>{$item['pay_mode']}</td><td>{$item['reservations']}</td><td>{$item['cost']}</td><td>{$item['owner_mob']}</td><td><div class='custom-control custom-checkbox'>
                          <input class='custom-control-input custom-control-input-danger custom-control-input-outline customCheckbox' type='checkbox' value='".$item['status']."' id='".$item['booking_id']."' ".$checked.">
                          <label for='".$item['booking_id']."' class='custom-control-label'>
                        " . ($item['status']=='1'  ? "Active" : "Non-Active") . "</label></div></td><td><img src=\"{$client_url}images/cafe/{$item['image']}\" height='45' width='45' alt='{$item['image']}' /></td><td><a href=\"{$base_url}bookings/cancel-booking.php?id={$item['booking_id']}\" title=\"Cancel\">Cancel</a></td> </tr>";
                                             $i++;
                                                 
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
    $('.customCheckbox').on('change',function(){
        let sts = $(this).val();
        let id = $(this).attr('id');
        
        sts = sts == '1' ? '0' : '1';
        $.post("/ajax.php", {
                    submit: 'submit',
                    table:'bookings',
                    id,
                    sts,
                },
                function(data, sts) {
                    let res = JSON.parse(data);
                    if(res.mes == 'success'){
                        alert('successfully updated');
                        location.reload();
                    }
                    else{
                        alert('Something went wrong');
                    }
                    
                });
        
    })
  });
</script>
</body>
</html>
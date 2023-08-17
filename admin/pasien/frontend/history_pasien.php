<?php
session_start();
include('../../../conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminGipar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini ">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../../img/famale.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="../../../profile.php" class="d-block"><?php echo $_SESSION['fullname']; ?></a>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="../../../dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../transaksi/frontend/input_transaksi.php" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Transaksi

                </p>
              </a>

            </li>
            <li class="nav-item">
              <a href="../../pengeluaran/frontend/input_pengeluaran.php" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Pengeluaran

                </p>
              </a>

            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-address-card"></i>
                <p>
                  Pasien
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="input_pasien.php" class="nav-link">
                    <p>Input pasien</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="history_pasien.php" class="nav-link">
                    <p>History pasien</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../../tindakan/frontend/input_tindakan.php" class="nav-link">
                <i class="nav-icon fa fa-ambulance"></i>
                <p>
                  Tindakan

                </p>
              </a>

            </li>
            <li  class="nav-item">
              <a href="javascript:out();" class="nav-link">
                <i style="margin-left: 4px;margin-right: 10px;" class="fa-solid fa-right-from-bracket"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>

            <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">

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
                  <!-- /.card -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"> <b>Data history pasien</b></h3>

                    </div>
                    <?php
                    $query1 = "SELECT * FROM `tbl_pasien` where status = 'finish'";
                    $tampil = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                    ?>
                    <div class="card">
                      <div class="card-header">
                        <h2 style="margin-left: 0px; color: red; font-weight: bold;" class="card-title">Total pasien : </h2>
                        <h2 style="margin-left: 20px; color: red; font-weight: bold;" class="card-title"><?php echo mysqli_num_rows($tampil) ?></h2>

                      </div>

                      <!-- /.card-header -->
                      <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Nama pasien</th>
                              <th>No rekam medis</th>
                              <th>No hp</th>
                              <th>Alamat</th>
                              <th>Tanggal periksa</th>
                              <th>Hari</th>
                              <th>Jenis kelamin</th>
                              <th>Status</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php while ($data = mysqli_fetch_array($tampil)) { ?>
                              <tr>
                                <td><?php echo $data['nama_pasien']; ?></td>
                                <td><?php echo $data['no_rekme']; ?></td>
                                <td><?php echo $data['no_hp']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['tgl_periksa']; ?></td>
                                <td><?php echo $data['hari']; ?></td>
                                <td><?php echo $data['jenis_kelamin']; ?></td>
                                <td style=" background-color: grey; color: white; font-weight: bold;"><?php echo $data['status']; ?></td>
                              </tr>
                            <?php

                            }
                            ?>
                          </tbody>

                          <tfoot>
                            <tr>
                              <th>Nama pasien</th>
                              <th>No rekam medis</th>
                              <th>No hp</th>
                              <th>Alamat</th>
                              <th>Tanggal periksa</th>
                              <th>Tanggal periksa</th>
                              <th>Hari</th>
                              <th>Status</th>

                            </tr>
                          </tfoot>
                        </table>

                      </div>
                      <!-- /.card-body -->
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
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  
  <script src="https://kit.fontawesome.com/75690d0497.js" crossorigin="anonymous"></script>
  <script src="../../../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../../../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../../../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../../../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../../../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../../../plugins/moment/moment.min.js"></script>
  <script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../../../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../../../js/pages/dashboard.js"></script>
  <script src="../../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../../plugins/jszip/jszip.min.js"></script>
  <script src="../../../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- Page specific script -->

  <script language="JavaScript" type="text/javascript">
    function out() {
      Swal.fire({
        title: 'Anda yakin ingin logout?',

        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yaa',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "../../../logout.php";
        }
      })
    }
  </script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
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
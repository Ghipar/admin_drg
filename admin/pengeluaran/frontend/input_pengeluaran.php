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
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../css/adminlte.min.css">
    <script src="../../../js/sweetalert.js"></script>
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
                                    <a href="../../pasien/frontend/input_pasien.php" class="nav-link">
                                        <p>Input pasien</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pasien/frontend/history_pasien.php" class="nav-link">
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
                        <li class="nav-item">
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
                                    <div class="container">
                                        <h1>Input data pengeluaran</h1>
                                        <form method="post" action="../backend/insert_pengeluaran.php">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama pengeluaran</label>
                                                <input type="text" class="form-control" id="nama_pengeluaran" name="nama_pengeluaran" placeholder="Masukkan nama pengeluaran" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Total harga</label>
                                                <input type="number" class="form-control" id="har" name="har" placeholder="Masukkan total harga" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pesan" class="form-label">Keterangan</label>
                                                <textarea class="form-control" id="ket" name="ket" rows="4" placeholder="Masukkan keterangan" required></textarea>
                                            </div>
                                            <button style="margin-left: 95%;" type="submit" class="btn btn-primary">Kirim</button>
                                        </form>
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

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <!-- /.card -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><b>Data pasien</b></h3>
                                        </div>
                                        <div class="card-header">
                                            <h3 style="color: red;" class="card-title"><b>Total pengeluaran :</b></h3>
                                            <?php
                                            $quer = "SELECT SUM(total_harga) as total FROM tbl_pengeluaran ";
                                            $rn = mysqli_query($conn, $quer);
                                            ?>
                                            <?php while ($riw = mysqli_fetch_array($rn)) { ?>
                                                <h3 class="card-title" style="color: red; margin-left: 20px;"> <b><?php echo "Rp " . number_format($riw['total'], 0, ',', '.') ?></b></h3>
                                            <?php } ?>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <?php
                                            $query1 = "SELECT * FROM `tbl_pengeluaran`";
                                            $tampil = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                            ?>
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama pengeluaran</th>
                                                        <th>Total harga</th>
                                                        <th>Keterangan</th>
                                                        <th>Tanggal pengeluaran</th>
                                                        <th>Alat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($data = mysqli_fetch_array($tampil)) { ?>
                                                        <tr>
                                                            <td><?php echo $data['nama_pengeluaran']; ?></td>
                                                            <td><?php echo $data['total_harga']; ?></td>
                                                            <td><?php echo $data['keterangan']; ?></td>
                                                            <td><?php echo $data['tgl_pengeluaran']; ?></td>
                                                            <td>
                                                                <a href="edit_pengeluaran.php?id=<?php echo $data['id_pengeluaran']; ?>"><i class="fa-solid fa-pen-to-square"></i></a> <?php ?> <a href="javascript:checkDelete(<?php echo $data['id_pengeluaran']; ?>);"><i class="fa-solid fa-trash" style="color: red; margin-left: 5px;"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>

                                                <tfoot>
                                                    <tr>
                                                        <th>Nama pengeluaran</th>
                                                        <th>Total harga</th>
                                                        <th>Keterangan</th>
                                                        <th>Tanggal pengeluaran</th>
                                                        <th>Alat</th>
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
    <script src="../../../plugins/toastr/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Page specific script -->
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
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
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
                    window.location = "../../../index.php";
                }
            })
        }
    </script>
    <script language="JavaScript" type="text/javascript">
        function checkDelete(x) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Anda tidak akan bisa membatalkanya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yaa, hapus saja!',
            }).then((result) => {
                if (result.isConfirmed) {
                    return window.location = "../backend/hapus_pengeluaran.php?id=" + x;
                }
            })
        }
    </script>

    <?php if (isset($_SESSION['notifed'])) {
        echo "
        <script>
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Edit data berhasil',
          showConfirmButton: false,
          timer: 1500
        })
        </script>";
        unset($_SESSION['notifed']);
    } ?>

    <?php if (isset($_SESSION['notifhps'])) {
        echo "
        <script>
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Hapus data berhasil',
          showConfirmButton: false,
          timer: 1500
        })
        </script>";
        unset($_SESSION['notifhps']);
    } ?>

    <?php if (isset($_SESSION['notifip'])) {
        echo "
        <script>
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Input data berhasil',
          showConfirmButton: false,
          timer: 1500
        })
        </script>";
        unset($_SESSION['notifip']);
    } ?>
    <?php if (isset($_SESSION['notifipe'])) {
        echo "
        <script>
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Pemasukkan kurang!!',
          showConfirmButton: false,
          timer: 1500
        })
        </script>";
        unset($_SESSION['notifipe']);
    } ?>


</body>

</html>
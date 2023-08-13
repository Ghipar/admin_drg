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
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header">
                                    <!-- /.card -->
                                    <div class="container">
                                        <h1 style="margin-bottom: 20px;">Input data transaksi</h1>
                                        <form method="post" action="../backend/insert_cart.php">
                                            <?php
                                            $q = "SELECT * FROM tbl_tindakan";
                                            $run = mysqli_query($conn, $q);
                                            $q1 = "SELECT * FROM tbl_pasien WHERE status = 'active'";
                                            $run1 = mysqli_query($conn, $q1);
                                            $q2 = "SELECT * FROM tbl_cart";
                                            $run2 = mysqli_query($conn, $q2);
                                            ?>
                                            <div style="background-color: #f0f1f2;" class="card col-4">
                                                <div style="margin-left: 20px;">

                                                    <label style="margin-top: 10px;" for="nama" class="form-label">Nama tindakan</label>
                                                    <div class="mb-3">
                                                        <select style="min-height: 30px; width: 200px; padding-left: 8px;" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();' class="form-select" id="idtin" name="idtin" required>
                                                            <?php
                                                            while ($data = mysqli_fetch_array($run)) {
                                                            ?>
                                                                <option value="<?php echo $data['id_tindakan'] ?>"><?php echo $data['nama_tindakan'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <h6 style="color: red; margin-top: 5px;"><?php echo mysqli_num_rows($run2) == 2 ? 'Maksimal 2 tindakan!!' : '' ?></h6>
                                                    </div>
                                                    <button <?php echo mysqli_num_rows($run2) == 2 ? 'disabled' : '' ?> style=" width: 50px; margin-left: 150px;margin-bottom: 10px;  font-size: 14px;" type="submit" class="btn btn-success">Add</button>
                                                </div>
                                            </div>
                                        </form>

                                        <form method="post" action="../backend/insert_transaksi.php">
                                            <?php
                                            $tran = "SHOW TABLE STATUS LIKE 'tbl_transaksi'";
                                            $ex = mysqli_query($conn, $tran);
                                            ?>

                                            <div>
                                                <label for="nama" class="form-label">ID Transaksi</label>
                                                <?php
                                                while ($data = mysqli_fetch_array($ex)) {
                                                ?>
                                                    <input style="margin-left: 10px;width: 50px; font-weight: bold; color: red;" readonly="true" type="number" class="form-control-sm" id="idTran" name="idTran" value="<?php echo ($data['Auto_increment'])  ?>" required>
                                                <?php } ?>
                                            </div>

                                            <label style="margin-top: 10px;" for="nama" class="form-label">Nama pasien</label>
                                            <div class="mb-3">
                                                <select style="min-height: 30px; width: 200px; padding-left: 8px;" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();' class="form-select" id="nampas" name="nampas" required>
                                                    <?php
                                                    while ($data = mysqli_fetch_array($run1)) {
                                                    ?>
                                                        <option value="<?php echo $data['id_pasien'] ?>"><?php echo $data['nama_pasien'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Jumlah uang</label>
                                                <input type="number" class="form-control" id="uang" name="uang" placeholder="Masukkan jumlah uang" oninput="getVal()" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pesan" class="form-label">Keterangan</label>
                                                <textarea class="form-control" id="ket" name="ket" rows="4" placeholder="Masukkan keterangan" required></textarea>
                                            </div>

                                            <button style="margin-left: 92%; margin-bottom: 20px;" type="submit" class="btn btn-primary">Kirim</button>
                                        </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-18">
                                        <div class="card">
                                            <div class="card-header">
                                                <!-- /.card -->
                                                <div class="container">
                                                    <h1>Cart</h1>
                                                    <div class="card-body">

                                                        <table id="cart" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama tindakan</th>
                                                                    <th>Harga</th>
                                                                    <th>Alat</th>
                                                                </tr>
                                                            </thead>
                                                            <?php
                                                            $e = "SELECT tbl_cart.id_cart, tbl_tindakan.nama_tindakan, tbl_tindakan.harga
                                                            FROM tbl_cart
                                                            INNER JOIN tbl_tindakan ON tbl_cart.id_tindakan=tbl_tindakan.id_tindakan;";
                                                            $ren = mysqli_query($conn, $e);
                                                            $e1 = "SELECT SUM(harga) AS total_harga FROM tbl_cart";
                                                            $ren1 = mysqli_query($conn, $e1);
                                                            ?>
                                                            <tbody>
                                                                <?php while ($data = mysqli_fetch_array($ren)) { ?>
                                                                    <tr>
                                                                        <td><?php echo $data['nama_tindakan']; ?></td>
                                                                        <td><?php echo $data['harga']; ?></td>
                                                                        <td>
                                                                            <a href="../../transaksi/backend/hapus_cart.php?id=<?php echo $data['id_cart']; ?>"><i class="fa-solid fa-trash" style="color: red; margin-left: 5px;"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                            </tbody>

                                                            <tfoot>
                                                                <tr>
                                                                    <th>Nama tindakan</th>
                                                                    <th>Harga</th>
                                                                    <th>Alat</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>

                                                    </div>

                                                    <h3 style="margin-bottom: 50px;"></h3>
                                                    <?php while ($data = mysqli_fetch_array($ren1)) { ?>
                                                        <h3 style=" font-weight: bold; margin-bottom: 20px;">Total harga <span style="color: red;" id="tothar">: <?php echo "Rp " . number_format($data['total_harga'], 0, ',', '.') ?></span> </h3>

                                                        <?php $nom = '<span id="result" >213123</span>'; ?>
                                                        <h3 style=" font-weight: bold;">Kembali <span style="color: red; margin-left: 35px;">:</span> <span style="color: red; margin-left: 5px;" id="result" name="result"> </span> </h3>

                                                    <?php
                                                    }
                                                    ?><!-- /.card-body -->



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
                                            <h3 class="card-title"><b>Data transaksi</b></h3>
                                        </div>
                                        <div class="card-header">

                                            <h3 class="card-title" style="color: red;"><b>Total pemasukan</b></h3>
                                            <?php
                                            $quer = "SELECT SUM(grand_total) as total FROM tbl_transaksi";
                                            $rn = mysqli_query($conn, $quer);
                                            $quer1 = "SELECT SUM(total_harga) as totalp FROM tbl_pengeluaran";
                                            $rn1 = mysqli_query($conn, $quer1);
                                            ?>
                                            <?php while ($riw = mysqli_fetch_array($rn)) { ?>
                                                <?php while ($riw2 = mysqli_fetch_array($rn1)) { ?>
                                                    <h3 class="card-title" style="color: red; margin-left: 25px;"><b>
                                                            <?php echo ": Rp " . number_format($riw['total'] - $riw2['totalp'], 0, ',', '.') ?>
                                                        </b></h3>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <?php
                                            $query1 = "SELECT *
                                            FROM tbl_transaksi
                                            INNER JOIN tbl_pasien
                                            ON tbl_transaksi.id_pasien = tbl_pasien.id_pasien
                                            INNER JOIN tbl_akun
                                            ON tbl_transaksi.id_akun = tbl_akun.id_akun";
                                            $tampil = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                            ?>
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama pasien</th>
                                                        <th>Nama admin</th>
                                                        <th>Jumlah uang</th>
                                                        <th>Jumlah kembali</th>
                                                        <th>Metode pembayaran</th>
                                                        <th>Grand_total</th>
                                                        <th>Keterangan</th>
                                                        <th>Tanggal transaksi</th>
                                                        <th>Tindakan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($data = mysqli_fetch_array($tampil)) { ?>

                                                        <tr>
                                                            <td><?php echo $data['nama_pasien']; ?></td>
                                                            <td><?php echo $data['nama_akun']; ?></td>
                                                            <td><?php echo $data['jumlah_uang']; ?></td>
                                                            <td><?php echo $data['kembali']; ?></td>
                                                            <td><?php echo $data['metode_pembayaran']; ?></td>
                                                            <td><?php echo $data['grand_total']; ?></td>
                                                            <td><?php echo $data['keterangan']; ?></td>
                                                            <td><?php echo $data['tgl_trans']; ?></td>

                                                            <td>
                                                                <?php
                                                                $idt = $data['id_transaksi'];
                                                                $q = "SELECT * FROM tbl_transaksi 
                                                                                    INNER JOIN tbl_detail_transaksi 
                                                                                    ON tbl_transaksi.id_transaksi = tbl_detail_transaksi.id_transaksi 
                                                                                    INNER JOIN tbl_tindakan
                                                                                    ON tbl_detail_transaksi.id_tindakan = tbl_tindakan.id_tindakan 
                                                                                    WHERE tbl_transaksi.id_transaksi = '$idt'";
                                                                $nm = mysqli_query($conn, $q);
                                                                ?>
                                                                <?php while ($m = mysqli_fetch_array($nm)) { ?>
                                                                    <h6> <b style="color: red;"># </b> <?php echo $m['nama_tindakan'] ?> </h6>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Nama pasien</th>
                                                        <th>Nama admin</th>
                                                        <th>Jumlah uang</th>
                                                        <th>Jumlah kembali</th>
                                                        <th>Metode pembayaran</th>
                                                        <th>grand_total</th>
                                                        <th>keterangan</th>
                                                        <th>Tanggal transaksi</th>
                                                        <th>Tindakan</th>
                                                    </tr>
                                                </tfoot>
                                            </table>

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
                    return window.location = "../backend/hapus_pasien.php?id=" + x;
                }
            })
        }
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
    <script>
        function getVal() {
            let input = document.getElementById("uang");

            let inputval = input.value;
            <?php
            $q = "SELECT SUM(harga) as total_harga FROM tbl_cart";
            $mun = mysqli_query($conn, $q);
            ?>
            <?php while ($data = mysqli_fetch_array($mun)) { ?>
                let hasil = inputval - <?php echo $data['total_harga'] ?>;
            <?php } ?>
            let rupiahFormat = hasil.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            let res = document.getElementById("result");
            if (inputval == '') {
                res.innerText = "";
            } else {
                res.innerText = "Rp " + rupiahFormat;
            }

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
          title: 'Transaksi sukses',
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
          title: 'Transaksi gagal',
          showConfirmButton: false,
          timer: 1500
        })
        </script>";
        unset($_SESSION['notifipe']);
    } ?>


</body>

</html>
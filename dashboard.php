<?php
session_start();

include('conn.php');
$q = 'SELECT * FROM tbl_pasien';
$run =  mysqli_query($conn, $q);
while ($data = mysqli_fetch_array($run)) {
  $tanggal = $data['tgl_periksa'];
  $tglskrg = date("Y-m-d");

  $sql1 = "UPDATE `tbl_pasien` SET `status`='active' WHERE tgl_periksa = '$tglskrg' AND status = 'pending'";
  mysqli_query($conn, $sql1);
  $sql2 = "UPDATE `tbl_pasien` SET `status`='finish' WHERE tgl_periksa < '$tglskrg'";
  mysqli_query($conn, $sql2);
}
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
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <script src="js/sweetalert.js"></script>
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
            <img src="img/famale.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="profile.php" class="d-block"><?php echo $_SESSION['fullname']; ?></a>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="admin/transaksi/frontend/input_transaksi.php" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Transaksi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="admin/pengeluaran/frontend/input_pengeluaran.php" class="nav-link">
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
                  <a href="admin/pasien/frontend/input_pasien.php" class="nav-link">
                    <p>Input pasien</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="admin/pasien/frontend/history_pasien.php" class="nav-link">
                    <p>History pasien</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="admin/tindakan/frontend/input_tindakan.php" class="nav-link">
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
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid"> <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-6 col-6"> <!-- small box -->
                <div class="small-box bg-primary">
                  <div class="inner">
                    <?php
                    $quer = "SELECT SUM(grand_total) as total FROM tbl_transaksi";
                    $rn = mysqli_query($conn, $quer);
                    $quer1 = "SELECT SUM(total_harga) as totalp FROM tbl_pengeluaran";
                    $rn1 = mysqli_query($conn, $quer1);
                    ?>
                    <?php while ($riw = mysqli_fetch_array($rn)) { ?>
                      <?php while ($riw2 = mysqli_fetch_array($rn1)) { ?>
                        <h3><?php echo "Rp " . number_format($riw['total'] - $riw2['totalp'], 0, ',', '.') ?></h3>
                      <?php } ?>
                    <?php } ?>
                    <p>Total pemasukan</p>
                  </div>
                  <div class="icon"> <i class="ion ion-cash"></i> </div></a>
                </div>
              </div> <!-- ./col -->
              <div class="col-lg-6 col-6"> <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <?php
                    $quer = "SELECT SUM(total_harga) as total FROM tbl_pengeluaran";
                    $rn = mysqli_query($conn, $quer);
                    ?>
                    <?php while ($riw = mysqli_fetch_array($rn)) { ?>
                      <h3><?php echo "Rp " . number_format($riw['total'], 0, ',', '.') ?></h3>
                    <?php } ?>
                    <p>Total pengeluaran</p>
                  </div>
                  <div class="icon"> <i class="ion ion-stats-bars"></i> </div></a>
                </div>
              </div> <!-- ./col -->
        
            </div>
            <!-- /.container-fluid -->
        </section>
      <section class="content">
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid"> <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-4 col-6"> <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <?php
                    $quer = "SELECT SUM(grand_total) as total FROM tbl_transaksi WHERE tgl_trans = '$tglskrg'";
                    $rn = mysqli_query($conn, $quer);
                    $quer1 = "SELECT SUM(total_harga) as totalp FROM tbl_pengeluaran WHERE tgl_pengeluaran = '$tglskrg'";
                    $rn1 = mysqli_query($conn, $quer1);
                    ?>
                    <?php while ($riw = mysqli_fetch_array($rn)) { ?>
                      <?php while ($riw2 = mysqli_fetch_array($rn1)) { ?>
                        <h3><?php echo "Rp " . number_format($riw['total'] - $riw2['totalp']<0? 0:$riw['total'] - $riw2['totalp'], 0, ',', '.') ?></h3>
                      <?php } ?>
                    <?php } ?>
                    <p>Pemasukan harian</p>
                  </div>
                  <div class="icon"> <i class="ion ion-cash"></i> </div> <a href="admin/transaksi/frontend/input_transaksi.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div> <!-- ./col -->
              <div class="col-lg-4 col-6"> <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <?php
                    $quer = "SELECT SUM(total_harga) as total FROM tbl_pengeluaran WHERE tgl_pengeluaran = '$tglskrg'";
                    $rn = mysqli_query($conn, $quer);
                    ?>
                    <?php while ($riw = mysqli_fetch_array($rn)) { ?>
                      <h3 style="color: whitesmoke;"><?php echo "Rp " . number_format($riw['total'], 0, ',', '.') ?></h3>
                    <?php } ?>
                    <p style="color: whitesmoke;">Pengeluaran harian</p>
                  </div>
                  <div  class="icon"> <i class="ion ion-stats-bars"></i> </div> <a  href="admin/pengeluaran/frontend/input_pengeluaran.php" class="small-box-footer"> <span style="color: white;">More info</span> <i style="color: white;" class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div> <!-- ./col -->
              <div class="col-lg-4 col-6"> <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <?php
                    $date = date("Y-m-d");
                    $q = "SELECT * FROM tbl_pasien WHERE status = 'active'";
                    $run = mysqli_query($conn, $q) or die(mysqli_error($conn));
                    ?>
                    <h3 style="color: white;"><?php echo mysqli_num_rows($run) ?></h3>
                    <p style="color: white;">Jumlah pasien harian</p>
                  </div>
                  <div class="icon"> <i class="ion ion-person-add"></i> </div> <a href="admin/pasien/frontend/input_pasien.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div> <!-- ./col --> <!-- ./col -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6 col-6">
                <div class="card">
                  <div class="card-header">
                    <!-- /.card -->
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title"><b>Data total pemasukan</b></h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="col">
                        <canvas id="myChart4"></canvas>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="col-lg-6 col-6">
                <div class="card">
                  <div class="card-header">
                    <!-- /.card -->
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title"><b>Data total pengeluaran</b></h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="col">
                        <canvas id="myChart5"></canvas>
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
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid"> <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-4 col-6"> <!-- small box -->
                  <div class="card">
                    <div class="card-header">
                      <!-- /.card -->
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title"><b>Data tindakan</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                          <div class="col">
                            <canvas id="myChart" style="height:80px; width:80px; margin:0px auto;"></canvas>
                          </div>

                        </div>
                        <!-- /.card-body -->
                      </div>

                      <!-- /.card -->
                    </div>

                    <!-- /.col -->
                  </div>
                </div> <!-- ./col -->
                <div class="col-lg-4 col-6"> <!-- small box -->
                  <div class="card">
                    <div class="card-header">
                      <!-- /.card -->
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title"><b>Data pasien (Hari)</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                          <div class="col">
                            <canvas id="myChart3" style="height:80px; width:80px; margin:0px auto;"></canvas>
                          </div>

                        </div>
                        <!-- /.card-body -->
                      </div>

                      <!-- /.card -->
                    </div>

                    <!-- /.col -->
                  </div>
                </div> <!-- ./col -->
                <div class="col-lg-4 col-6"> <!-- small box -->
                  <div class="card">
                    <div class="card-header">
                      <!-- /.card -->
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title"><b>Data pasien (Gender)</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                          <div class="col">
                            <canvas id="myChart2" style="height:80px; width:80px; margin:0px auto;"></canvas>
                          </div>

                        </div>
                        <!-- /.card-body -->
                      </div>

                      <!-- /.card -->
                    </div>

                    <!-- /.col -->
                  </div>
                </div> <!-- ./col -->

                <!-- /.container-fluid -->
          </section>
          <!-- /.content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-5">

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
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="js/pages/dashboard.js"></script>
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="plugins/toastr/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.3/chart.min.js" integrity="sha512-fMPPLjF/Xr7Ga0679WgtqoSyfUoQgdt8IIxJymStR5zV3Fyb6B3u/8DcaZ6R6sXexk5Z64bCgo2TYyn760EdcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
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
         
          window.location = "index.php";
        }
      })
    };
  </script>
  <script>
    // === include 'setup' then 'config' above ===
    <?php
    $pendap = mysqli_query($conn, "SELECT hari, SUM(grand_total) AS amount FROM tbl_transaksi GROUP BY hari");
    while ($datapen = $pendap->fetch_assoc()) {
      $day[] = $datapen['hari'];
      $amount[] = $datapen['amount'];
    }
    ?>
    const labels4 = <?php echo json_encode($day) ?>;
    const data4 = {
      labels: labels4,
      datasets: [{
        label: 'Total pendapatan',
        data: <?php echo json_encode($amount) ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
      }]
    };

    const config4 = {
      type: 'bar',
      data: data4,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };

    var myChart4 = new Chart(
      document.getElementById('myChart4'),
      config4
    );
  </script>
  <script>
    // === include 'setup' then 'config' above ===
    <?php
    $penge = mysqli_query($conn, "SELECT hari, SUM(total_harga) AS amount FROM tbl_pengeluaran GROUP BY hari");
    while ($datapenge = $penge->fetch_assoc()) {
      $day1[] = $datapenge['hari'];
      $amount1[] = $datapenge['amount'];
    }
    ?>
    const labels5 = <?php echo json_encode($day1) ?>;
    const data5 = {
      labels: labels5,
      datasets: [{
        label: 'Total pengeluaran',
        data: <?php echo json_encode($amount1) ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
      }]
    };

    const config5 = {
      type: 'bar',
      data: data5,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };

    var myChart5 = new Chart(
      document.getElementById('myChart5'),
      config5
    );
  </script>
  <script>
    <?php
    $qry = mysqli_query($conn, "SELECT * FROM tbl_detail_transaksi INNER JOIN tbl_tindakan on tbl_detail_transaksi.id_tindakan = tbl_tindakan.id_tindakan GROUP BY tbl_tindakan.nama_tindakan");
    while ($data = $qry->fetch_assoc()) {
      $dataLabel[] = $data['nama_tindakan'];
      $sql = mysqli_query($conn, "SELECT * FROM tbl_detail_transaksi INNER JOIN tbl_tindakan on tbl_detail_transaksi.id_tindakan = tbl_tindakan.id_tindakan WHERE tbl_tindakan.nama_tindakan ='$data[nama_tindakan]'");
      $res = $sql->num_rows;
      $jmlData[] = $res;
    }
    ?>
    const data1 = {
      labels: <?php echo json_encode($dataLabel); ?>,
      datasets: [{
        label: 'My First Dataset',
        data: <?php echo json_encode($jmlData); ?>,
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(235, 64, 52)',
          'rgb(207, 250, 97)'
        ],
        hoverOffset: 4
      }]
    };
    const config = {
      type: 'pie',
      data: data1,
    };
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    )
  </script>
  <script>
    <?php
    $qry2 = mysqli_query($conn, "SELECT * FROM tbl_pasien GROUP BY jenis_kelamin");
    while ($data2 = $qry2->fetch_assoc()) {
      $dataLabel2[] = $data2['jenis_kelamin'];

      $sql2 = mysqli_query($conn, "SELECT * FROM tbl_pasien WHERE jenis_kelamin ='$data2[jenis_kelamin]'");
      $res2 = $sql2->num_rows;
      $jmlData2[] = $res2;
    }
    ?>
    const data2 = {
      labels: <?php echo json_encode($dataLabel2); ?>,
      datasets: [{
        label: 'My First Dataset',
        data: <?php echo json_encode($jmlData2); ?>,
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)'
        ],
        hoverOffset: 4
      }]
    };
    const config2 = {
      type: 'pie',
      data: data2,
    };
    const myChart2 = new Chart(
      document.getElementById('myChart2'),
      config2
    )
  </script>
  <script>
    <?php


    $qry3 = mysqli_query($conn, "SELECT * FROM tbl_pasien GROUP BY hari");
    while ($data3 = $qry3->fetch_assoc()) {

      $dataLabel3[] = $data3['hari'];

      $sql3 = mysqli_query($conn, "SELECT * FROM tbl_pasien WHERE hari ='$data3[hari]'");
      $res3 = $sql3->num_rows;
      $jmlData3[] = $res3;
    }
    ?>
    const data3 = {
      labels: <?php echo json_encode($dataLabel3); ?>,
      datasets: [{
        label: 'My First Dataset',
        data: <?php echo json_encode($jmlData3); ?>,
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(235, 64, 52)',
          'rgb(207, 250, 97)',
          'rgb(50, 168, 82)',
          'rgb(184, 81, 240)',
          'rgb(81, 147, 240)'
        ],
        hoverOffset: 6
      }]
    };
    const config3 = {
      type: 'pie',
      data: data3,
    };
    const myChart3 = new Chart(
      document.getElementById('myChart3'),
      config3
    )
  </script>
  <?php if (isset($_SESSION['notiflogin'])) {
    echo "
        <script>
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Berhasil login',
          showConfirmButton: false,
          timer: 1500
        })
        </script>";
    unset($_SESSION['notiflogin']);
  } ?>
</body>

</html>
<?php
session_start();
include('../../../conn.php');
// print_r($_POST['kem']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $q = "SELECT SUM(harga) AS total_harga FROM tbl_cart";
    $rn = mysqli_query($conn, $q);
    while ($dta = mysqli_fetch_array($rn)) {
        $total = $dta["total_harga"];
    }

    $jmlh = $_POST["uang"] ;
    $kem = $jmlh - ($total + 10000);
    $ket = $_POST["ket"];
    $idak = $_SESSION['idAkun'];
    $pasnam = $_POST['nampas'];
    $idt = $_POST['idTran'];
    $dtn = date('Y-m-d');
    $pay = $_POST["pay"];
    function get_day_name($date)
    {
        // Convert the date to a timestamp
        $timestamp = strtotime($date);
        // Return the day name
        return date('D', $timestamp);
    }
    $tugel = get_day_name($dtn);
    if ($kem < 0) {
        $_SESSION['notifipe'] = 'error';
        header("Location: ../frontend/input_transaksi.php");
        exit();
    } else {
        $qb = "INSERT INTO tbl_transaksi (grand_total, jumlah_uang, kembali, metode_pembayaran, keterangan, id_akun, id_pasien, tgl_trans, hari, biaya_admin) VALUES ('$total','$jmlh','$kem','$pay','$ket', '$idak', '$pasnam', '$dtn', '$tugel', 10000)";
        if (mysqli_query($conn, $qb)) {
            $q1 = "SELECT * FROM tbl_cart";
            $ren = mysqli_query($conn, $q1);
            while ($dta1 = mysqli_fetch_array($ren)) {
                $tin = $dta1["id_tindakan"];
                $q2 = "INSERT INTO tbl_detail_transaksi (id_transaksi, id_tindakan) VALUES ('$idt','$tin')";
                mysqli_query($conn, $q2);
            }
            mysqli_query($conn, "DELETE FROM tbl_cart");
            mysqli_query($conn, "UPDATE `tbl_pasien` SET `status`='finish' WHERE id_pasien = '$pasnam'");
            $_SESSION['notifip'] = 'success';
            header("Location: ../frontend/input_transaksi.php");
            exit();
        } else {
            // Invalid credentials, show an error message
            header("Location: ../frontend/input_transaksi.php");
            exit();
        }
    }
}

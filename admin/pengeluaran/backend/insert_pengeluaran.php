<?php
session_start();
include('../../../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nampeng = $_POST["nama_pengeluaran"];
    $harga = $_POST["har"];
    $ket = $_POST["ket"];
    $tgll = date('Y-m-d');

    while ($get = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(grand_total) AS siu FROM tbl_transaksi"))) {
        while ($get1 = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(total_harga) AS si FROM tbl_pengeluaran"))) {
            $tet = $get["siu"] - $get1['si'];
            if ($tet < $harga) {
                $_SESSION['notifipe'] = 'error';
                header("Location: ../frontend/input_pengeluaran.php");
                exit();
            } else {
                function get_day_name($date)
                {
                    // Convert the date to a timestamp
                    $timestamp = strtotime($date);
                    // Return the day name
                    return date('D', $timestamp);
                }
                $tugl = get_day_name($tgll);
                // You should validate and sanitize the input here
                $q = "INSERT INTO tbl_pengeluaran (nama_pengeluaran, total_harga, keterangan, tgl_pengeluaran, hari) VALUES ('$nampeng','$harga','$ket','$tgll', '$tugl')";
                // Example: Replace this with your actual login logic
                if (mysqli_query($conn, $q)) {
                    // Successful login, redirect to a dashboard or another page
                    $_SESSION['notifip'] = 'success';
                    header("Location: ../frontend/input_pengeluaran.php");
                    exit();
                } else {
                    // Invalid credentials, show an error message
                    header("Location: ../frontend/input_pengeluaran.php");
                    exit();
                }
            }
        }
    }
}

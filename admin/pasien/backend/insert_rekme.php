<?php
session_start();
include('../../../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $norekme = $_POST["rekme"];
    $tgl = $_POST["tgl_periksa"];
    // You should validate and sanitize the input here
    function get_day_name($date)
    {
        // Convert the date to a timestamp
        $timestamp = strtotime($date);
        // Return the day name
        return date('D', $timestamp);
    }
    $tugel = get_day_name($tgl);
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_pasien WHERE no_rekme = '$norekme'")) > 0) {
        while ($dat = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tbl_pasien WHERE no_rekme = '$norekme'"))) {
            if ($tgl == date("Y-m-d")) {
                $q = "INSERT INTO tbl_pasien (nama_pasien, no_hp, alamat, tgl_periksa, jenis_kelamin, status, hari, no_rekme) VALUES ('$dat[nama_pasien]','$dat[no_hp]','$dat[alamat]','$tgl','$dat[jenis_kelamin]', 'active', '$tugel', '$norekme')";
                // Example: Replace this with your actual login logic
                if (mysqli_query($conn, $q)) {
                    // Successful login, redirect to a dashboard or another page
                    $_SESSION['notifip'] = 'success';
                    header("Location: ../frontend/input_pasien.php");
                    exit();
                } else {
                    // Invalid credentials, show an error message
                    header("Location: ../frontend/input_pasien.php");
                    exit();
                }
            } else if ($tgl > date("Y-m-d")) {
                $q = "INSERT INTO tbl_pasien (nama_pasien, no_hp, alamat, tgl_periksa, jenis_kelamin, status, hari, no_rekme) VALUES ('$dat[nama_pasien]','$dat[no_hp]','$dat[alamat]','$tgl','$dat[jenis_kelamin]', 'pending', '$tugel', '$norekme')";
                // Example: Replace this with your actual login logic
                if (mysqli_query($conn, $q)) {
                    // Successful login, redirect to a dashboard or another page
                    $_SESSION['notifip'] = 'success';
                    header("Location: ../frontend/input_pasien.php");
                    exit();
                } else {
                    // Invalid credentials, show an error message
                    header("Location: ../frontend/input_pasien.php");
                    exit();
                }
            } else {
                $_SESSION['notifipe'] = 'error';
                header("Location: ../frontend/input_pasien.php");
                exit();
            }
        }
    } else {
        $_SESSION['notifipe'] = 'error';
        header("Location: ../frontend/input_pasien.php");
        exit();
    }
}

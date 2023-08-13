<?php
session_start();
include('../../../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nampas = $_POST["nama_pasien"];
    $hp = $_POST["hp"];
    $almt = $_POST["almt"];
    $tgl = $_POST["tgl_periksa"];
    $jenkel = $_POST["jenisKelamin"];

    // You should validate and sanitize the input here
    function get_day_name($date)
    {
        // Convert the date to a timestamp
        $timestamp = strtotime($date);
        // Return the day name
        return date('D', $timestamp);
    }
    $tugel = get_day_name($tgl);
    if ($tgl == date("Y-m-d")) {
        $q = "INSERT INTO tbl_pasien (nama_pasien, no_hp, alamat, tgl_periksa, jenis_kelamin, status, hari) VALUES ('$nampas','$hp','$almt','$tgl','$jenkel', 'active', '$tugel')";
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
        $q = "INSERT INTO tbl_pasien (nama_pasien, no_hp, alamat, tgl_periksa, jenis_kelamin, status, hari) VALUES ('$nampas','$hp','$almt','$tgl','$jenkel', 'pending', '$tugel')";
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
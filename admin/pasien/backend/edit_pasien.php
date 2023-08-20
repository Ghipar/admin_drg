<?php
session_start();
include('../../../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nampas = ucfirst($_POST["nama_pasien"]) ;
    $rekme = $_POST["rekme"];
    $hp = $_POST["hp"];
    $almt = ucfirst( $_POST["almt"]);
    $tgl = $_POST["tgl_periksa"];
    $jenkel = $_POST["jenisKelamin"];
    $id = $_GET["id"];

    // You should validate and sanitize the input here
    $q = "UPDATE `tbl_pasien` SET `nama_pasien`='$nampas',`no_hp`='$hp',`alamat`='$almt',`tgl_periksa`='$tgl',`jenis_kelamin`='$jenkel', `no_rekme`='$rekme' WHERE id_pasien = '$id'";
    // Example: Replace this with your actual login logic
    if (mysqli_query($conn, $q)) {
        // Successful login, redirect to a dashboard or another page
        $_SESSION['notifed'] = 'success';
        header("Location: ../frontend/input_pasien.php");
        exit();
    } else {
        // Invalid credentials, show an error message
        header("Location: ../frontend/input_pasien.php");
        exit();
    }
}

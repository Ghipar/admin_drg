<?php
session_start();
include('../../../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nampeng = ucfirst($_POST["nama_pengeluaran"]);
    $harga= $_POST["har"];
    $ket = ucfirst( $_POST["ket"]);
    $id = $_GET["id"];

    // You should validate and sanitize the input here
    $q = "UPDATE `tbl_pengeluaran` SET `nama_pengeluaran`='$nampeng',`total_harga`='$harga',`keterangan`='$ket' WHERE id_pengeluaran = '$id'";
    // Example: Replace this with your actual login logic
    if (mysqli_query($conn, $q)) {
        // Successful login, redirect to a dashboard or another page
        $_SESSION['notifed'] = 'success';
        header("Location: ../frontend/input_pengeluaran.php");
        exit();
    } else {
        // Invalid credentials, show an error message
        header("Location: ../frontend/input_pengeluaran.php");
        exit();
    }
}

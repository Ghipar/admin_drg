<?php
session_start();
include('../../../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namtin = ucfirst($_POST["nama_tindakan"]);
    $harga= $_POST["harga"];
    $ket = ucfirst( $_POST["ket"]);
    $id = $_GET["id"];

    // You should validate and sanitize the input here
    $q = "UPDATE `tbl_tindakan` SET `nama_tindakan`='$namtin',`harga`='$harga',`keterangan`='$ket' WHERE id_tindakan = '$id'";
    // Example: Replace this with your actual login logic
    if (mysqli_query($conn, $q)) {
        // Successful login, redirect to a dashboard or another page
        $_SESSION['notifed'] = 'success';
        header("Location: ../frontend/input_tindakan.php");
        exit();
    } else {
        // Invalid credentials, show an error message
        header("Location: ../frontend/input_tindakan.php");
        exit();
    }
}

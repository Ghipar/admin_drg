<?php
session_start();
include('../../../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namtin = ucfirst($_POST["nama_tindakan"]);
    $harga= $_POST["harga"];
    $ket = ucfirst($_POST["ket"]);
    

    // You should validate and sanitize the input here
    $q = "INSERT INTO tbl_tindakan (nama_tindakan, harga, keterangan) VALUES ('$namtin','$harga','$ket')";
        // Example: Replace this with your actual login logic
        if (mysqli_query($conn, $q)) {
            // Successful login, redirect to a dashboard or another page
            $_SESSION['notifip'] = 'success';
            header("Location: ../frontend/input_tindakan.php");
            exit();
        } else {
            // Invalid credentials, show an error message
            header("Location: ../frontend/input_tindakan.php");
            exit();
        }
    }


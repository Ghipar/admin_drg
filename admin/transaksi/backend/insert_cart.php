<?php
session_start();
include('../../../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idtin = $_POST["idtin"];

    while ($data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tbl_tindakan WHERE id_tindakan = '$idtin' "))) {
        $har = $data['harga'];
        $q = "INSERT INTO tbl_cart (id_tindakan, harga) VALUES ('$idtin', '$har')";
        // Example: Replace this with your actual login logic
        if (mysqli_query($conn, $q)) {
            // Successful login, redirect to a dashboard or another page
            // $_SESSION['notifip'] = 'success';
            header("Location: ../frontend/input_transaksi.php");
            exit();
        } else {
            // Invalid credentials, show an error message
            header("Location: ../frontend/input_transaksi.php");
            exit();
        }
    }

    // You should validate and sanitize the input here

}

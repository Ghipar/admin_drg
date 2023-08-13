<?php
session_start();
include('conn.php');
// Check if the form was submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // You should validate and sanitize the input here
    $q = "select * from tbl_akun where username='$username' and password='$password'";
    $row = mysqli_query($conn, $q);
    // Example: Replace this with your actual login logic
    if (mysqli_num_rows($row) == 1) {
        // Successful login, redirect to a dashboard or another page
        $row = mysqli_fetch_array($row);
        $_SESSION['fullname'] = $row['nama_akun'];
        $_SESSION['idAkun'] = $row['id_akun'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['user'] = $row['username'];
        $_SESSION['status'] = "login";
        $_SESSION['notiflogin'] = 'success';
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['notiflogin'] = 'error';
        // Invalid credentials, show an error message
        header("Location: index.php");
    }
}

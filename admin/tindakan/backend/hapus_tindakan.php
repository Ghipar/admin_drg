<?php
session_start();
include('../../../conn.php');
$id = $_GET["id"];
// You should validate and sanitize the input here
$q = "DELETE FROM `tbl_tindakan` WHERE  id_tindakan = '$id'";
// Example: Replace this with your actual login logic
if (mysqli_query($conn, $q)) {
    // Successful login, redirect to a dashboard or another page
    $_SESSION['notifhps'] = 'success';
    header("Location: ../frontend/input_tindakan.php");
    exit();
} else {
    // Invalid credentials, show an error message
    header("Location: ../frontend/input_tindakan.php");
    exit();
}

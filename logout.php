<?php
session_start();
session_destroy();
session_start();
$_SESSION['notiflogout'] = "ss";
header('location: index.php');
?>
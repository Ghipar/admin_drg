<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="js/sweetalert.js"></script>
</head>
<style>
    body {
        background-image: url(img/back.jpg);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-position: center;

    }
</style>

<body>

    <?php if (isset($_GET['message'])) {
        echo '<script language="javascript">alert("username dan password salah")</script>';
        unset($_SESSION['message']);
    } ?>
    <div style="margin-top: 10%; opacity: 0.9;" class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background-color: #f5c3fa;">
                        <center>Silahkan Login</center>
                    </div>
                    <div style="background-color: #fcf7bb" class="card-body">
                        <form method="post" action="proses_login.php">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <input style="margin-top: 20px;" type="checkbox" onclick="myFunction()">Show Password
                            </div>
                            <center>
                                <button style="width: 180px; margin-top: 20px; " type="submit" class="btn btn-primary">Login</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['notiflogin'])) {
        echo "
        <script>
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'username atau password salah',
          showConfirmButton: false,
          timer: 1500
        })
        </script>";
        unset($_SESSION['notiflogin']);
    } ?>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>
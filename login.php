
<?php
session_start();
require 'config.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon.png" type="image/ico" />

    <title> Sistem Informasi Akademik Politeknik Gajah Tunggal </title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
</head>

<body>
    <div class="container body" style="margin-top:150px">
        <h1 style="margin-left: 520px;">LOGIN</h1>

        <?php if (isset($error)) : ?>
            <center>
                <p style="color: red; font-style: italic;">username / password salah</p>
            </center>
        <?php endif; ?>

        <form action="" method="post">
            <div class="item form-group">
                <label class="col-form-label col-md-4 col-sm-4 label-align">Username</label>
                <div class="col-md-3 col-sm-3 ">
                    <input type="text" name="username" class="form-control" size="4" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-4 col-sm-4 label-align">Password</label>
                <div class="col-md-3 col-sm-3">
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-4 col-sm-4 label-align">Remember Me</label>
                <div class="col-md-1">
                    <input type="checkbox" name="remember" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-4">
                    <input type="submit" name="login" class="btn btn-primary" value="login">
                    <br>
                    <a href="registrasi.php">
                        <h2> Silahkan registrasi terlebih dahulu</h2>
                    </a>
                </div>
        </form>

        <!-- jQuery -->
        <script src="assets/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="assets/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="assets/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="assets/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="assets/skycons/skycons.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="assets/js/custom.min.js"></script>
    </div>

</body>

</html>

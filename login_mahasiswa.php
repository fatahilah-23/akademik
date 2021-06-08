<?php
session_start();
require 'config.php';


if (isset($_SESSION["login"])) {
    header("Location: login_mahasiswa.php");
    exit;
}


if (isset($_POST["login"])) {

    $nim = $_POST["nim"];
    $nama_mahasiswa = $_POST["nama_mahasiswa"];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE nim = '$nim' && nama_mahasiswa = '$nama_mahasiswa'");

    // cek nim dan nama 
    if (mysqli_num_rows($result) === 1) {

        $_SESSION["login"] = true;
        header("Location: index.php");
        exit;
    }
}

$error = true;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Mahasiswa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <form action="" method="post">
        <div class="limiter">
            <div class="container-login100" style="background-image: url('assets/images/bg-01.jpg');">
                <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <form class="login100-form validate-form">
                        <span class="login100-form-title p-b-49">
                            Login Mahasiswa
                        </span>

                        <div class="wrap-input100 validate-input m-b-23" data-validate="nim is reqired">
                            <span class="label-input100">Nim</span>
                            <input class="input100" type="text" name="nim" placeholder="Type your Nim">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
                            <span class="label-input100">Nama Mahasiswa</span>
                            <input class="input100" type="text" name="nama_mahasiswa" placeholder="Type your Nama Mahasiswa>
						 <span class=" focus-input100" data-symbol="&#xf206;"></span>
                        </div>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" name="login">
                                    Login
                                </button>
                            </div>
                        </div><br>
                        <div class="container-login100-form-btn">
                            <a href="registrasi.php">
                                <h6> Silahkan registrasi terlebih dahulu</h6>
                            </a>
                        </div>

                </div>
    </form>
    </div>
    </div>
    </div>
    </form>

    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="assets/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="assets/js/main.js"></script>

</body>

</html>
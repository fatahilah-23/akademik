<?php
require 'config.php';


if (isset($_POST["submit"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
				alert('user baru berhasil ditambahkan!');
			  </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
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

<div class="container body" style="margin-top:150px">


    <h2 style="margin-left: 520px;">HALAMAN REGISTRASI</h2>



    <br>

    <form action="" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-4 col-sm-4 label-align">USERNAME</label>
            <div class="col-md-3 col-sm-3 label-align">
                <input type="text" name="username" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-4 col-sm-4 label-align">PASSWORD</label>
            <div class="col-md-3 col-sm-3">
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-4 col-sm-4 label-align">KONFIRMASI PASSWORD</label>
            <div class="col-md-3 col-sm-3">
                <input type="password" name="password2" class="form-control" required>
            </div>
        </div>
</div>
<br>
<div class="col-md-6 col-sm-6 offset-md-4">
    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
    <a href="index.php?page=tampil_mhs" class="btn btn-warning">Kembali</a>
</div>
</form>

<tbody>
    </table>
    </div>
    </div>

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

    </body>

</html>
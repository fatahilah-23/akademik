<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tampilan Nilai</title>
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

    <div class="container-100" style="background-image: url('assets/images/bg-01.jpg');">
        <?php
        include "config.php";
        ?>
        <div class="container-100">
            <center>
                <font size="6">Data Lengkap</font>
            </center>
            <div>
                <form action="" method="post">
                 <input type="submit" name="submit" class=" btn btn-dark right" value="cari data">
                
                </form>


            </div>

            <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NAMA MAHASISWA</th>
                            <th>NIM</th>
                            <th>JURUSAN</th>
                            <th>SEMESTER</th>
                            <th>MATA KULIAH</th>
                            <th>SKS</th>
                            <th>NILAI</th>
                            <th>NILAI MUTU</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                        $sql = mysqli_query($koneksi, "SELECT a.Nim, a.Nama_Mhs,a.Program_Studi, c.nama_mk,b.nilai,
                         c.sks,c.semester FROM mahasiswa AS a JOIN nilai AS b
                        ON a.Nim=b.Nim JOIN matakuliah AS c 
                        ON c.kode_mk=b.kode_mk")
                            or die(mysqli_error($koneksi));
                        //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                        if (mysqli_num_rows($sql) > 0) {
                            //membuat variabel $no untuk menyimpan nomor urut
                            $no = 1;
                            //melakukan perulangan while dengan dari dari query $sql
                            while ($data = mysqli_fetch_assoc($sql)) {
                                if ($data['nilai'] > 80) {
                                    $hasil = 'A';
                                } else if ($data['nilai'] >= 72) {
                                    $hasil = 'B';
                                } else if ($data['nilai'] >= 60) {
                                    $hasil = 'C';
                                } else if ($data['nilai'] >= 50) {
                                    $hasil = 'D';
                                } else {
                                    $hasil = 'E';
                                }
                                echo "<tr>";
                                //menampilkan data perulangan
                                echo '
<tr>
<td>' . $data['Nama_Mhs'] . '</td>
<td>' . $data['Nim'] . '</td>
<td>' . $data['Program_Studi'] . '</td>
<td>' . $data['semester'] . '</td>
<td>' . $data['nama_mk'] . '</td>
<td>' . $data['sks'] . '</td>
<td>' . $data['nilai'] . '</td>
<td>' . $hasil . '</td>
</tr>
';
                                $no++;
                            }
                            //jika query menghasilkan nilai 0
                        } else {
                            echo '
<tr>
<td colspan ="6">Tidak ada data.</td>
</tr>
';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>

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
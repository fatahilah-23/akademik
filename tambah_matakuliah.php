<?php include('config.php'); ?>
<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Tambah Data Mata Kuliah</font>
    </center>
    <hr>
    <?php
    if (isset($_POST['submit'])) {
        $nama_mk            = $_POST['nama_mk'];
        $kode_mk            = $_POST['kode_mk'];
        $sks                = $_POST['sks'];
        $jurusan            = $_POST['jurusan'];
        $semester           = $_POST['semester'];


        $cek = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kode_mk='$kode_mk'") or die(mysqli_error($koneksi));

        if (mysqli_num_rows($cek) == 0) {
            $sql = mysqli_query($koneksi, "INSERT INTO matakuliah (nama_mk, kode_mk, sks, jurusan,'semester') VALUES('$nama_mk', '$kode_mk', '$sks', '$jurusan','$semester')")
                or die(mysqli_error($koneksi));

            if ($sql) {
                echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_matakuliah";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Gagal, Nilai sudah terinput.</div>';
        }
    }

    ?>

    <form action="index.php?page=tambah_matakuliah" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">MATA KULIAH</label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" name="nama_mk" class="form-control" size="4" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">KODE MATA KULIAH</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="kode_mk" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">SKS</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="sks" class="form-control" required>

            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">JURUSAN</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="jurusan" class="form-control" required>

            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">SEMESTER</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="semester" class="form-control" required>

            </div>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                <a href="index.php?page=tampil_matakuliah" class="btn btn-warning">Kembali</a>
            </div>
    </form>
</div>
</div>
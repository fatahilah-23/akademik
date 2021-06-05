<?php include('config.php'); ?>

<center>
    <font size="6">Tambah Data</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
    $Nim                = $_POST['Nim'];
    $kode_mk            = $_POST['kode_mk'];
    $nilai              = $_POST['nilai'];


    $cek = mysqli_query($koneksi, "SELECT * FROM nilai WHERE Nim='$Nim'") or die(mysqli_error($koneksi));

    if (mysqli_num_rows($cek) == 0) {
        $sql = mysqli_query($koneksi, "INSERT INTO nilai (Nim, NIK, kode_mk, nilai) VALUES('$Nim', '$NIK', '$kode_mk', '$nilai')")
            or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_nilai";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Gagal, Nilai sudah terinput.</div>';
    }
}

?>

<form action="index.php?page=tambah_nilai" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nim</label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="Nim" class="form-control" size="4" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Mata Kuliah</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="kode_mk" class="form-control" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nilai</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="nilai" class="form-control" required>

        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <a href="index.php?page=tampil_nilai" class="btn btn-warning">Kembali</a>
        </div>
</form>
</div>
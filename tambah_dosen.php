<?php include('config.php'); ?>

<center>
    <font size="6">Tambah Data</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
    $NIK          = $_POST['NIK'];
    $NAMA         = $_POST['NAMA'];
    $DOSEN        = $_POST['DOSEN'];
    $EMAIL        = $_POST['EMAIL'];

    $cek = mysqli_query($koneksi, "SELECT * FROM dosen WHERE NIK='$NIK'") or die(mysqli_error($koneksi));

    if (mysqli_num_rows($cek) == 0) {
        $sql = mysqli_query($koneksi, "INSERT INTO dosen(NIK, NAMA, DOSEN, EMAIL) VALUES('$NIK', '$NAMA', '$DOSEN', '$EMAIL')") or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_dosen";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Gagal, NIK sudah terdaftar.</div>';
    }
}
?>

<form action="index.php?page=tambah_dosen" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">NIK</label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="NIK" class="form-control" size="4" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Dosen</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="NAMA" class="form-control" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Dosen</label>
        <div class="col-md-6 col-sm-6">
            <select name="DOSEN" class="form-control" required>
                <option value="">Pilih Program Studi</option>
                <option value="TEKNIK ELEKTRONIKA">Teknik Elektronika</option>
                <option value="TEKNIK MESIN">Teknik Mesin</option>
                <option value="TEKNIK INDUSTRI">Teknik Industri</option>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="EMAIL" class="form-control" required>
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            <a href="index.php?page=tampil_dosen" class="btn btn-warning">Kembali</a>
        </div>
</form>
</div>
<?php include('config.php'); ?>

<center>
    <font size="6">Tambah Data</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
    $NIK          = $_POST['NIK'];
    $NAMA         = $_POST['NAMA'];
    $STAFF        = $_POST['STAFF'];
    $EMAIL        = $_POST['EMAIL'];

    $cek = mysqli_query($koneksi, "SELECT * FROM staff WHERE NIK='$NIK'") or die(mysqli_error($koneksi));

    if (mysqli_num_rows($cek) == 0) {
        $sql = mysqli_query($koneksi, "INSERT INTO staff(NIK, NAMA, STAFF, EMAIL) VALUES('$NIK', '$NAMA', '$STAFF', '$EMAIL')") or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_staff";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Gagal, NIK sudah terdaftar.</div>';
    }
}
?>

<form action="index.php?page=tambah_staff" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">NIK</label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="NIK" class="form-control" size="4" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Staff</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="NAMA" class="form-control" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Staff</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="STAFF" class="form-control" required>
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
            <a href="index.php?page=tampil_staff" class="btn btn-warning">Kembali</a>
        </div>
</form>
</div>
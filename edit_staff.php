<?php include('config.php'); ?>


<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Edit Data</font>
    </center>

    <hr>

    <?php
    //jika sudah mendapatkan parameter GET id dari URL
    if (isset($_GET['NIK'])) {
        //membuat variabel $id untuk menyimpan id dari GET id di URL
        $NIK = $_GET['NIK'];

        //query ke database SELECT tabel mahasiswa berdasarkan id = $id
        $select = mysqli_query($koneksi, "SELECT * FROM staff WHERE NIK='$NIK'") or die(mysqli_error($koneksi));

        //jika hasil query = 0 maka muncul pesan error
        if (mysqli_num_rows($select) == 0) {
            echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
            exit();
            //jika hasil query > 0
        } else {
            //membuat variabel $data dan menyimpan data row dari query
            $data = mysqli_fetch_assoc($select);
        }
    }
    ?>

    <?php
    //jika tombol simpan di tekan/klik
    if (isset($_POST['submit'])) {
        $NAMA     = $_POST['NAMA'];
        $STAFF    = $_POST['STAFF'];
        $EMAIL    = $_POST['EMAIL'];

        $sql = mysqli_query($koneksi, "UPDATE staff SET NAMA='$NAMA', STAFF='$STAFF', EMAIL='$EMAIL' WHERE NIK='$NIK'") or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_staff";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
    }
    ?>

    <form action="edit_staff.php?NIK=<?php echo $NIK; ?>" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">NIK</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="NIK" class="form-control" size="4" value="<?php echo $data['NIK']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Staff</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="NAMA" class="form-control" value="<?php echo $data['NAMA']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Staff</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="STAFF" class="form-control" value="<?php echo $data['STAFF']; ?>" required>
            </div>
        </div>


</div>
<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
    <div class="col-md-6 col-sm-6">
        <input type="text" name="EMAIL" class="form-control" value="<?php echo $data['EMAIL']; ?>" required>
    </div>
</div>
<div class="item form-group">
    <div class="col-md-6 col-sm-6 offset-md-3">
        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
        <a href="index.php?page=tampil_staff" class="btn btn-warning">Kembali</a>
    </div>
</div>
</form>
</div>
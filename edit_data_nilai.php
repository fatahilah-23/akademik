<?php include('config.php'); ?>


<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Edit Data Nilai</font>
    </center>

    <hr>

    <?php
    //jika sudah mendapatkan parameter GET id dari URL
    if (isset($_GET['nim'])) {
        //membuat variabel $id untuk menyimpan id dari GET id di URL
        $nim = $_GET['nim'];

        //query ke database SELECT tabel mahasiswa berdasarkan id = $id
        $select = mysqli_query($koneksi, "SELECT * FROM nilai WHERE nim='$nim'") or die(mysqli_error($koneksi));

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
        $nim         = $_POST['nim'];
        $kode_mk     = $_POST['kode_mk'];
        $nilai       = $_POST['nilai'];

        $sql = mysqli_query($koneksi, "UPDATE nilai SET nim='$nim', kode_mk='$kode_mk', nilai='$nilai' WHERE nim='$nim'") or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_data";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
    }
    ?>

    <form action="edit_data_nilai.php?nim=<?php echo $nim; ?>" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nim</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="nim" class="form-control" size="4" value="<?php echo $data['nim']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Mata Kuliah</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="kode_mk" class="form-control" value="<?php echo $data['kode_mk']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nilai</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="nilai" class="form-control" value="<?php echo $data['nilai']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                <a href="index.php?page=tampil_data" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </form>
</div>
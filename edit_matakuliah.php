<?php include('config.php'); ?>


<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Edit Data Mata Kuliah</font>
    </center>

    <hr>

    <?php
    //jika sudah mendapatkan parameter GET id dari URL
    if (isset($_GET['kode_mk'])) {
        //membuat variabel $id untuk menyimpan id dari GET id di URL
        $kode_mk = $_GET['kode_mk'];

        //query ke database SELECT tabel mahasiswa berdasarkan id = $id
        $select = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kode_mk='$kode_mk'") or die(mysqli_error($koneksi));

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
        $nama_mk            = $_POST['nama_mk'];
        $kode_mk            = $_POST['kode_mk'];
        $sks                = $_POST['sks'];
        $jurusan            = $_POST['jurusan'];
        $semester           = $_POST['semester'];

        $sql = mysqli_query($koneksi, "UPDATE matakuliah 
        SET nama_mk='$nama_mk', kode_mk='$kode_mk', sks='$sks',jurusan='$jurusan',semester='$semester'
         WHERE kode_mk='$kode_mk'") or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_matakuliah";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
    }
    ?>

    <form action="edit_matakuliah.php?kode_mk=<?php echo $kode_mk; ?>" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">MATA KULIAH</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="nama_mk" class="form-control" size="4" value="<?php echo $data['nama_mk']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Mata Kuliah</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="kode_mk" class="form-control" value="<?php echo $data['kode_mk']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">SKS</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="sks" class="form-control" value="<?php echo $data['sks']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">JURUSAN</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="jurusan" class="form-control" value="<?php echo $data['jurusan']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">SEMESTER</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="semester" class="form-control" value="<?php echo $data['semester']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                <a href="index.php?page=tampil_matakuliah" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </form>
</div>
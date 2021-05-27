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
        $select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE NIK='$NIK'") or die(mysqli_error($koneksi));

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
        $DOSEN    = $_POST['DOSEN'];
        $EMAIL    = $_POST['EMAIL'];

        $sql = mysqli_query($koneksi, "UPDATE dosen SET NAMA='$NAMA', DOSEN='$DOSEN', EMAIL='$EMAIL' WHERE NIK='$NIK'") or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_dosen";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
    }
    ?>

    <form action="edit_dosen.php?NIK=<?php echo $NIK; ?>" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nik</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="NIK" class="form-control" size="4" value="<?php echo $data['NIK']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Dosen</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="NAMA" class="form-control" value="<?php echo $data['NAMA']; ?>" required>
            </div>
        </div>
      
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Dosen</label>
            <div class="col-md-6 col-sm-6">
                <select name="DOSEN" class="form-control" required>
                    <option value="">Pilih Program Studi</option>
                    <option value="Teknik Mesin" <?php if ($data['DOSEN'] == 'Teknik Mesin') {
                                                        echo 'selected';
                                                    } ?>>Teknik Mesin</option>
                    <option value="Teknik Elektronika" <?php if ($data['DOSEN'] == 'Teknik Elektronika') {
                                                            echo 'selected';
                                                        } ?>>Teknik Elektronika</option>
                    <option value="Teknik Industri" <?php if ($data['DOSEN'] == 'Teknik Industri') {
                                                        echo 'selected';
                                                    } ?>>Teknik Industri</option>
                </select>
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
                <a href="index.php?page=tampil_dosen" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </form>
</div>
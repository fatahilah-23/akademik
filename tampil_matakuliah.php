<?php
//memasukkan file config.php
include('config.php');
?>
<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Data Mata Kuliah</font>
    </center>
    <hr>
    <a href="index.php?page=tambah_matakuliah"><button class="btn btn-dark right">Tambah Data</button></a>
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>MATA KULIAH</th>
                    <th>KODE MATA KULIAH</th>
                    <th>SKS</th>
                    <th>JURUSAN</th>
                    <th>SEMESTER</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                $sql = mysqli_query($koneksi, "SELECT * FROM matakuliah ORDER BY kode_mk ASC") or die(mysqli_error($koneksi));
                //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                if (mysqli_num_rows($sql) > 0) {
                    //membuat variabel $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while ($data = mysqli_fetch_assoc($sql)) {
                        //menampilkan data perulangan
                        echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $data['nama_mk'] . '</td>
							<td>' . $data['kode_mk'] . '</td>
							<td>' . $data['sks'] . '</td>
                            <td>' . $data['jurusan'] . '</td>
                            <td>' . $data['semester'] . '</td>
							<td>
								<a href="index.php?page=edit_matakuliah&kode_mk=' . $data['kode_mk'] . '" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete_matakuliah.php?kode_mk=' . $data['kode_mk'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
								
							</td>
						</tr>
						';
                        $no++;
                    }
                    //jika query menghasilkan nilai 0
                } else {
                    echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
                }
                ?>
            <tbody>
        </table>
    </div>
</div>
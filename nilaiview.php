 <?php
    include "config.php";
    ?>
 <div class="container" style="margin-top:20px">
     <center>
         <font size="6">Data Lengkap</font>
     </center>
     <hr>
     <a href="index.php?page=tambah_nilai"><button class="btn btn-dark right">Tambah Data</button></a>
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
                    $sql = mysqli_query($koneksi, "SELECT a.Nim, a.Nama_Mhs,a.Program_Studi, c.nama_mk,b.nilai, c.sks,c.semester FROM mahasiswa AS a JOIN nilai AS b
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
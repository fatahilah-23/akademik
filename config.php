<?php
//koneksi ke database mysql,
$koneksi = mysqli_connect("localhost", "root", "","akademik");

//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()){
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}


function registrasi($data){
	global $koneksi;

	$nim = strtolower(stripslashes($data["nim"]));
	$nama_mahasiswa = mysqli_real_escape_string($koneksi, $data["nama_mahasiswa"]);
	

	// cek username sudah ada atau belum
	$result = mysqli_query($koneksi, "SELECT nim FROM user WHERE nim = '$nim'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('nim sudah terdaftar!')
		      </script>";
			  
		return false;
	}


	// tambahkan userbaru ke database
	mysqli_query($koneksi, "INSERT INTO user VALUES('', '$nim', '$nama_mahasiswa')");

	return mysqli_affected_rows($koneksi);
}
?>

<?php 
// koneksi ke database

$conn = mysqli_connect("localhost", "root", "", "db_ilham_samsul_arifin_d1a200029");



function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data){

	global $conn;
	// ambil data dari tiap elemen dalam form

	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$jk = htmlspecialchars($data["jk"]);
	$agama = htmlspecialchars($data["agama"]);
	$asal_sekolah = htmlspecialchars($data["asal_sekolah"]);

		// query insert data
	$query = "INSERT INTO tbl_mahasiswa
						VALUES 
						('', '$nama', '$alamat', '$jk', '$agama', '$asal_sekolah')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM tbl_mahasiswa WHERE id= $id");

	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	// ubah data dari tiap elemen dalam form
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$jk = htmlspecialchars($data["jk"]);
	$agama = htmlspecialchars($data["agama"]);
	$asal_sekolah = htmlspecialchars($data["asal_sekolah"]);

	

	// $query = "UPDATE `tbl_mahasiswa` SET `nama`= '".$nama."',`alamat` = '".$alamat."', `jk`= '".$jk."', `agama` = '".$agama."',`asal_sekolah`= '".$asal_sekolah."' WHERE id = ".$id;


	// 	query insert data
	$query = "UPDATE tbl_mahasiswa SET 
					nama = '$nama',
					alamat = '$alamat',
					jk = '$jk',
					agama = '$agama',
					asal_sekolah = '$asal_sekolah'
					WHERE id = $id
					";
					

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($keyword){

	$query = "SELECT * FROM tbl_mahasiswa
						WHERE
						nama LIKE '%$keyword%' OR 
						agama LIKE '%$keyword%' OR
						jk LIKE '%$keyword%'
						";

	return query($query);
}

function registrasi($data)
{
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum

	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username sudah terdaftar!')
			</script>";

		return false;
	}




	// cek konfirmasi password

	if ($password !== $password2) {
		echo "<script>
				alert ('konfirmasi password tidak sesuai!')
			</script>";

		return false;
	}

	// enskripsi password

	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database

	mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

	return mysqli_affected_rows($conn);


}


?>
<?php  
// Koneksi ke Database
$db = mysqli_connect("sql313.epizy.com", "epiz_28837012", "dQpuDY7Rarv5x4", "epiz_28837012_nived");

function query($query){
	global $db;
	$result = mysqli_query($db, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function add($post){
	global $db;

	$nama = htmlspecialchars($post["nama"]);
	$kelas = htmlspecialchars($post["kelas"]);
	$jurusan = htmlspecialchars($post["jurusan"]);
	$sekolah = htmlspecialchars($post["sekolah"]);

	// Upload
	$gambar = upload();
	if (!$gambar) {
		return false;	
	}

	$query = "INSERT INTO siswa
				VALUES
				('', '$nama', '$kelas', '$jurusan', '$sekolah', '$gambar')	
			";

	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}


function upload(){
	$fileName = $_FILES['gambar']['name'];
	$fileSize = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek gambar yang user upload
	$ekstensiFileValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $fileName);
	$ekstensiGambar = strtolower(end($ekstensiGambar) );
	if ( !in_array($ekstensiGambar, $ekstensiFileValid) ) {
		echo "<script>
				alert('Anda tidak memasukkan gambar!');
			</script>
		";
		return false;
	}

	if ($fileSize > 10000000) {
		echo "<script>
				alert('Ukuran gambar terlalu besar!');
			</script>
		";
		return false;
	}

	// Selesai pengecekan
	// buat nama gambar baru
	$newFileName = uniqid();
	$newFileName .= '.';
	$newFileName .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../img/'.$newFileName);

	return $newFileName;

}




function delete($id){
	global $db;

	mysqli_query($db, "DELETE FROM siswa WHERE id = $id");

	return mysqli_affected_rows($db);
}


function update($post){
	global $db;

	$id = $post["id"];
	$nama = htmlspecialchars($post["nama"]);
	$kelas = htmlspecialchars($post["kelas"]);
	$jurusan = htmlspecialchars($post["jurusan"]);
	$sekolah = htmlspecialchars($post["sekolah"]);
	$gambarLama = $post["gambarLama"];

	// cek user memilih gambar baru
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	}else{
		$gambar = upload();
	}

	$query = "UPDATE siswa SET
				nama = '$nama',
				kelas = '$kelas',
				jurusan = '$jurusan',
				sekolah = '$sekolah',
				gambar = '$gambar'
				WHERE ID = $id
			";

	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

function register($data){
	global $db;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($db, $data["password"]);
	$password2 = mysqli_real_escape_string($db, $data["password2"]);

	// Cek username
	$result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");

	if ( mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('Username sudah digunakan!')
				</script>
		";
		return false;
	}

	// Cek password
	if ( $password !== $password2) {
		echo "<script>
				alert('Konfirmasi password tidak sesuai!')
				</script>
		";
		return false;
	}
	
	// Enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// Insert database
	mysqli_query($db, "INSERT INTO users VALUES('', '$username', '$password')");

	return mysqli_affected_rows($db);
}


?>

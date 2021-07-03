<?php  
session_start();

if (!isset($_SESSION["login"])) {
	header("location: ../index.php");
	exit();
}

require "../function/function.php";

// Koneksi ke database
$db = mysqli_connect("sql313.epizy.com", "epiz_28837012", "dQpuDY7Rarv5x4", "epiz_28837012_nived");

// Ambil data
if (isset ($_POST["submit"])) {

	if ( add($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('data gagal ditambahkan!');
			</script>
			";
	}
}
if(isset($_POST["cancel"])){
	header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="../style/update.css">
</head>
<body>
	<form autocomplete="off" class="modal-content" action="" method="post" enctype="multipart/form-data">
		<div class="container">
			<h1>Tambahkan Data</h1>
			<div>
				<input type="text" class="form-control frm" id="floatingInput" name="nama" id="nama" placeholder="nama">
			</div>
			<div>
				<input type="text" class="form-control frm" id="floatingInput" name="kelas" id="kelas" placeholder="kelas">
			</div>
			<div>
				<input type="text" class="form-control frm" id="floatingInput" name="jurusan" id="jurusan" placeholder="jurusan">
			</div>
			<div>
				<input type="text" class="form-control frm" id="floatingInput" name="sekolah" id="sekolah" placeholder="sekolah">
			</div>
			<div class="">
				<label>Gambar</label>
				<input type="file" class="custom-file-input"  id="floatingInput" name="gambar" id="gambar">
			</div>
		</div>
			<div class="d-flex justify-content-end clearfix">
				<button type="submit" name="cancel" class="btn btn-outline-light me-1">Batal</button>
				<button type="submit" name="submit"  class="btn btn-outline-light">Masukkan</button>
			</div>
		</div>
	</form>
</body>
</html>
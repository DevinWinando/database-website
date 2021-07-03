<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("location: ../index.php");
	exit();
}
require "../function/function.php";

// Waktu session
$timeout = 1*60*60;
if(isset($_SESSION['start_session'])){
	$elapsed_time = time()-$_SESSION['start_session'];
	if($elapsed_time >= $timeout){
		session_destroy();
		echo "<script type='text/javascript'>alert('Sesi telah berakhir');window.location='../login/logout.php'</script>";
	}
}
$_SESSION['start_session']=time();

$user = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <title>Data Siswa</title>
</head>

<body>
    <nav class="navbar navbar-dark mb-5 bgcolor py-4">
        <div class="container">
            <h3>Data Siswa</h3>
            <form class="d-flex">
                <input class="form-control me-2 bginput" type="search" placeholder="Search..." aria-label="Search"
                    name="keyword" id="keyword" autocomplete="off">
                <button class="btn btnn"><a href="about.php" class="link-light"
                        style="text-decoration: none !important;">About</a></button>
                <div class="btn-group me-5 ps-1">
                    <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?= $user; ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#" id="logout" class="link-dark dropdown-item">Change Password</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="../login/logout.php" id="logout" class="link-dark dropdown-item">Logout</a></li>
                    </ul>
                </div>
            </form>
        </div>
    </nav>
    <div class="container">
        <table class="table table-borderless text-center bgtable" id="table">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>sekolah</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($siswa1 as $row) : ?>
                <tr>
                    <td class="pvertical"><?= $i; ?></td>
                    <td><img src="../img/<?= $row["gambar"]; ?>" width="50" height="50"></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["kelas"]; ?></td>
                    <td><?= $row["jurusan"]; ?></td>
                    <td><?= $row["sekolah"]; ?></td>
                    <td>
                        <form action="" method="">
                            <a href="update.php?id=<?= $row['id']; ?>" name="id" class="link-light"><i
                                    class="fas fa-pen me-2"></i></a>
                            <a href="delete.php?id=<?= $row["id"] ?>"
                                onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="link-light"><i
                                    class="fas fa-lg fa-trash-alt"></i></a>
                        </form>
                    </td>
                </tr>
                <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-end me-3">
            <a href="print.php" target="blank"><button class="btn btn-outline-light me-2">Cetak</button></a>
            <a href="add.php"><button class="btn btn-outline-light">Tambahkan Data</button></a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="../script/script.js"></script>
</body>

</html>
<?php 
require '../function/function.php';

if (isset($_POST['register'])) {
	if ( register($_POST) > 0) {
		echo "<script>
				alert('Pendaftaran Berhasil!')
				</script>
		";
	}else{
		echo mysqli_error($db);
	}
	header('location: ../index.php');
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="../style/login.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container sign-up-mode">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" class="sign-up-form" method="post">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" id="username" autocomplete="off">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" id="password">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Konfirmasi Password" name="password2" id="password2">
            </div>
            <button type="submit" class="btn" name="register">Sign Up</button>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <a href="login1.php">
              <button class="btn transparent" id="sign-up-btn">
                Sign In
              </button>
            </a>
          </div>
          <img src="img/log.svg" class="image" alt="">
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3 class="marginjudul">Nived Database</h3>
            <p class="marginp">
              Website ini dibuat oleh siswa SMKN 1 Kota Cirebon Kelas XI RPL 1 yaitu Devin Winando Untuk Keperluan Tugas Akhir Mata Pelajaran Pemrograman Web dan Pemrograman Berjalan.
            </p>
            <a href="../index.php">
              <button class="btn transparent" id="sign-in-btn">
                Sign in
              </button>
            </a>
          </div>
          <img src="img/register.svg" class="image" alt="">
        </div>
      </div>
    </div>
</body>
</html>

<?php  
session_start();
require "function/function.php";

// cek cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($db, "SELECT username FROM users WHERE id = '$id'");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if ( $key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}

// cek session
if (isset($_SESSION["login"])) {
	header("location: main/index.php");
	exit();
}

// Jika tombol login ditekan
if (isset($_POST["login"])) {
	
	$_SESSION['username'] = $_POST["username"];
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

	// Cek username
	if (mysqli_num_rows($result) === 1) {

		// Cek Password
		$row = mysqli_fetch_assoc($result);
		if ( password_verify($password, $row["password"])) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me
			if ( isset($_POST['remember']) ) {
				 // buat cookie
				setcookie('id', $row['id'], time()+60*60*24*100);
				setcookie('key', hash('sha256',$row['username']), time()+60*60*24*100);
				$_COOKIE["username"];
				var_dump($_COOKIE);
			}
			
		 	header("location: main/index.php");
		 	exit;
		}
	}

	$error = true;

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script
    src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="style/login.css">
  <title>Sign In</title>
</head>
<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" class="sign-in-form" method="post">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" autocomplete="off">
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password">
          </div>
          <button type="submit" class="btn" name="login">Sign In</button>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3 class="marginjudul">Nived Database</h3>
          <p class="marginp">
          Website ini dibuat oleh siswa SMKN 1 Kota Cirebon Kelas XI RPL 1 yaitu Devin Winando Untuk Keperluan Tugas Akhir Mata Pelajaran Pemrograman Web dan Pemrograman Berjalan.
          </p>
          <a href="login/register.php">
            <button class="btn transparent" id="sign-up-btn">
            Sign up
            </button>
          </a>
        </div>
        <img src="login/img/log.svg" class="image" alt="">
      </div>
    </div>
  </div>
</body>
</html>

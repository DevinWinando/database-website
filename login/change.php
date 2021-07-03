<?php 
session_start();
require "../function/function.php";

$db = mysqli_connect("localhost", "root", "", "phpdasar");

// Ambil data users
$username = $_SESSION["username"];

// Ambil informasi users
$siswa = query("SELECT * FROM users where username = '$username'")[0];

if(isset($_POST["submit"])){
    $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
	$row = mysqli_fetch_assoc($result);
    $password1 = mysqli_real_escape_string($db, $data["password"]);
	$password2 = mysqli_real_escape_string($db, $data["password2"]);

	// Cek password lama
	if ( password_verify($passwordLama, $row["password"])){
		if ( $password1 !== $password2) {
			echo "<script>
					alert('Konfirmasi password tidak sesuai!')
					</script>
			";
			return false;
		}
		// Update password di database
		mysqli_query($db, "INSERT INTO users VALUES('', '$username', '$password')");

		// Enkripsi Password
		$password = password_hash($password, PASSWORD_DEFAULT);
	}
    exit();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <style>
        input{
            display: block;
        }
    </style>
</head>
<body>
    <div class="position-absolute top-50 start-50 translate-middle">
        <h1>Ubah Password</h1>
        <div class="ms-4">
            <form action="" method="post">
                <input type="password" placeholder="Password Lama" name="passwordLama">
                <input type="password" placeholder="Password Baru" name="password1">
                <input type="password" placeholder="Konfirmasi Password Baru" name="password2">
                <button type="submit" name="change">Ubah</button>
            </form>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
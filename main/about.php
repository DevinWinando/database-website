<?php 
  session_start();

  if (!isset($_SESSION["login"])) {
  header("location: ../index.php");
  exit();
}

$user = $_SESSION['username'];

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
    <link rel="stylesheet" href="../style/about.css" />

    <title>About</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bgcolor py-4">
      <div class="container">
        <h3><strong>Nived</strong></h3>
        <form class="d-flex">
          <button class="btn btnn"><a href="index.php" class="link-light" style="text-decoration: none !important;">Data</a></button>
          <div class="btn-group me-5 ps-1">
            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $user; ?>
            </button>
            <ul class="dropdown-menu">
              <li><a href="#" id="logout" class="link-dark dropdown-item">Change Password</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a href="../login/logout.php" id="logout" class="link-dark dropdown-item">Logout</a></li>
            </ul> 
        </div>  

        </form>
      </div>
    </nav>
    
    <section class="jumbotron text-center bgcolor">
      <img src="img/devin.jpg" alt="Devin Winando" width="200" height="200" class="rounded-circle img-thumbnail" />
      <h1 class="display-5">Devin Winando</h1>
      <p class="lead">Pelajar</p>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#1b262c"
          fill-opacity="1"
          d="M0,64L34.3,85.3C68.6,107,137,149,206,186.7C274.3,224,343,256,411,240C480,224,549,160,617,144C685.7,128,754,160,823,149.3C891.4,139,960,85,1029,74.7C1097.1,64,1166,96,1234,101.3C1302.9,107,1371,85,1406,74.7L1440,64L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"
        ></path>
      </svg>
    </section>

    <section class="about">
      <div class="container">
        <div class="row text-center">
          <h2 class="col">Tentang Saya</h2>
        </div>
        <div class="row justify-content-center fs-5 text-center mt-5">
          <div class="col-4">
            Halo, nama saya Devin Winando. Saya lahir dan tinggal di Kota Cirebon. Saya adalah siswa di SMKN 1 Kota Cirebon. Saya mengambil jurusan Rekayasa Perangkat Lunak dan saat ini saya telah duduk di bangku kelas 2 SMK.
          </div>
          <div class="col-4">Website ini merupakan salah satu project website pertama saya. Jadi mohon dimaklumi bila ada bug, atau kekurangan lainnya.</div>
        </div>
        <div class="row text-center contact">
          <div class="col">
            <h2>Kontak Saya</h2>
          </div>
        </div>
        <div class="row justify-content-center mt-3 text-center">
          <div class="col-1 me-3">
            <a href="https://api.whatsapp.com/send?phone=6285721683824&text=Halo." class="link-light"><i class="fab fa-whatsapp-square fa-4x"></i></a>
          </div>
          <div class="col-1 me-3">
            <a href="https://web.facebook.com/profile.php?id=100004774064921" class="link-light"><i class="fab fa-facebook-square fa-4x"></i></a>
          </div>
          <div class="col-1">
            <a href="https://www.instagram.com/devin.winando/" class="link-light"><i class="fab fa-instagram fa-4x"></i></a>
          </div>
          <div class="mb-5"></div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>

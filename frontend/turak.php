<?php
include("../server/classes.php");
$megye = new Megye();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Túrák</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="../kepek/profilkepek/logo.png">
  <link rel="stylesheet" href="../style.css">
</head>

<body style="display: block; padding-top: 0; padding-bottom: 0; background-image: url('../kepek/profilKepek/background2.png'); background-repeat: no-repeat; background-attachment: fixed;">
  <nav class="navbar navbar-expand-lg fs-4">
    <div class="container-fluid">
      <img src="../kepek/profilKepek/logo.png" alt="Oldal logo" style="width:100px;" class="rounded-pill float-start">
      <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-collapse navbar-nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link active text-white" href="../frontend/fooldal.php">Főoldal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="../frontend/turak.php">Túrák</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link text-white" href="../frontend/informaciok.php" role="button" aria-expanded="false">
              Információ
            </a>
          </li>
          <?php
          if (isset($_SESSION['nev'])) {
          ?>
            <li class="nav-item p-2">
              <form action="" method="post">
                <button type="submit" class="w-100 btn btn-primary" name="kilep">Kijelentkezés</button>
              </form>
            </li>
            <li class="nav-item p-2">
              <p class="text-white"><?php print  $_SESSION["nev"]; ?></p>
            </li>
          <?php
          }
          ?>
          <li class="nav-item p-2">
            <a class="navbar-brand text-white" href="../server/belepes.php">
              <i class="bi bi-tree-fill fs-1"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container text-center">
    <?php $megye->MegyeKiiras();?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
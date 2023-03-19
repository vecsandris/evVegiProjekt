<?php
   include("../server/classes.php");
   $belepes = new Belepes();
   $nev
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ytravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body style = "display: inherit; padding-top: 0; padding-bottom: 0; background-image: url('../kepek/profilKepek/background.png');">
<nav class="navbar navbar-expand-lg fs-4" style = "width: 100%;">
  <div class="container-fluid">
  <img src="../kepek/profilKepek/logo.png" alt="Oldal logo" style="width:100px;" class="rounded-pill float-start"> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
      <ul class="navbar-collapse navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" href="#">Főoldal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Túrák</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="../frontend/informaciok.php" role="button" aria-expanded="false">
            Információk
          </a>
        </li>
      </ul>
      <div class = "navbar-nav">
        <ul class = " navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                  if(isset($_SESSION['nev'])){
                ?>
                  <li class = "nav-item p-2">
                      <form action="" method="post">
                        <button type="submit" class="w-100 btn btn-primary" name = "kilep">Kijelentkezés</button>
                      </form>
                  </li>
                  <li class = "nav-item p-2">
                      <p class = "text-white"><?php print  $_SESSION["nev"];?></p>
                  </li>
                <?php
                  }
                ?>
                <li class = "nav-item p-2">
                    <a class="navbar-brand text-white" href="../server/belepes.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                    </a>
                  </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class = "text-white position-absolute bottom-50 end-50 m-5">
  <h1 style = "font-size: 60px">Találd meg kedvenc túra útvonalad.</h1>
  <form action="" method="post">
      <button class = "btn text-white">Felfedezés</button>
  </form>
</div>

<?php
  if(isset($_POST["kilep"]))
  {   session_unset();
      session_destroy();
      header("Location: ../index.php");
  }
?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
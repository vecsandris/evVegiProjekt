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
<body style = "display: inherit; padding-top: 0; padding-bottom: 0;">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Ytravel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Főoldal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Rólunk</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Túrák
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Helyek</a></li>
            <li><a class="dropdown-item" href="#">Galéria</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <form action="" method="post">
            <button type="submit" class="w-100 btn btn-primary" name = "kilep">Kijelentkezés</button>
          </form>
        </li>
      </ul>

      <a class="navbar-brand" href="../server/belepes.php">
        <img src="../kepek/profilKepek/defaultAvatar.svg" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
      </a>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

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
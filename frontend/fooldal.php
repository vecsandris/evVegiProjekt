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
    <title>Főoldal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../kepek/profilkepek/logo.png" type="image/x-icon">
</head>
<body style = "display: block; padding-top: 0; padding-bottom: 0; background-image: url('../kepek/profilKepek/background.png');">
<nav class="navbar navbar-expand-lg fs-4">
  <div class="container-fluid">
  <img src="../kepek/profilKepek/logo.png" alt="Oldal logo" style="width:100px;" class="rounded-pill float-start"> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id = "navbarSupportedContent">
      <ul class="navbar-collapse navbar-nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active text-white" href="../frontend/fooldal.php">Főoldal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../frontend/turak.php">Túrák</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../frontend/informaciok.php" role="button" aria-expanded="false">
            Információ
          </a>
        </li>
        <?php
        if(isset($_SESSION['nev'])){
          if($_SESSION["nev"] == "admin")
          {
        print("
        <li class='nav-item'>
          <a class='nav-link text-white' href='../frontend/adminFelulet.php' role='button' aria-expanded='false'>
            Adminfelület
          </a>
        </li>
        ");
      }
      }      ?>
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
                    <i class="bi bi-tree-fill fs-1"></i>
                    </a>
                  </li>
      </ul>
    </div>
  </div>
</nav>

<div class = "text-white bottom-50 end-50 m-5 p-5">
  <h1 style = "font-size: 60px">Találd meg kedvenc túra útvonalad.</h1>
  <form action="" method="post">
      <a href = "../frontend/turak.php" class = "btn text-white bg-dark">Felfedezés</a>
  </form>
</div>


<div class = "d-flex justify-content-around m-5 p-5">

  <div class="card" style="width: 18rem;">
    <img src="../kepek/bacskiskunvarmegye.png" class="card-img-top" alt="Bács-Kiskun">
    <div class="card-body">
      <h5 class="card-title">Bács-Kiskun vármegye</h5>
      <p class="card-text">Bács-Kiskun vármegye Magyarország déli részén található, és gazdag természeti kincsekben, változatos tájban, sík vidékeken és dombokban gazdag terület.</p>
    </div>
  </div>
  <div class="card" style="width: 18rem;">
    <img src= "../kepek/baranyavarmegye.png" class="card-img-top" alt="Baranya">
    <div class="card-body">
      <h5 class="card-title">Baranya vármegye</h5>
      <p class="card-text">Baranya vármegye Magyarország dél-délnyugati részén található, a Dél-Dunántúli régióban. A terület gazdag természeti kincsekben, változatos tájban, hegyekben, völgyekben, erdőkben és folyókban.</p>
    </div>
  </div>
  <div class="card" style="width: 18rem;">
    <img src="../kepek/bekesvarmegye.png" class="card-img-top" alt="Békés">
    <div class="card-body">
      <h5 class="card-title">Békés vármegye</h5>
      <p class="card-text">Békés vármegye Magyarország délkeleti részén található, a Dél-Alföldön. A területen számos érdekes természeti látnivaló található.</p>
    </div>
  </div>

</div>

<?php
  if(isset($_POST["kilep"]))
  {   
      session_unset();
      session_destroy();
      header("Location: ../index.php");
  }
?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
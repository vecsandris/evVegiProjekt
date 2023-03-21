<?php
include("../server/classes.php");
$belepes = new Belepes();
$nev
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ytravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body class="d-flex flex-column pt-0 pb-0 d-inherit" style="background-image: url('../kepek/profilKepek/background2.png');">
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
        <li class="nav-item dropdown">
          <a class="nav-link text-white" href="../frontend/informaciok.php" role="button" aria-expanded="false">
            Információ
          </a>
        </li>
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
      </ul>
    </div>
  </div>
</nav>



    <?php
    if (isset($_POST["kilep"])) {
        session_unset();
        session_destroy();
        header("Location: ../index.php");
    }
    ?>
    <div class="container text-center position-relative" style="margin-top:10%;">
        <div class="row">
            <div class="col col-lg-12 fw-bold">
                <h1>Információk</h1>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <p class="fs-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem repellat sit, laudantium accusamus porro esse dolorem libero, totam, enim quibusdam odio fugit? Aliquam ipsam dolore neque, deserunt harum mollitia nam.</p>
            </div>
            <div class="col col-lg-6">
                <p class="fs-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, quibusdam aliquam, illo saepe magni delectus libero corporis sed laudantium voluptas quae reiciendis atque animi? Iste quasi eaque odit asperiores aut.</p>
            </div>
        </div>
    </div>
    <footer class="text-center text-light bg-success mt-auto pt-1">
        <div class="row w-100">
            <div class="col-4 col-md-6">
                <p class="fs-6"><i class="bi bi-telephone-fill p-2"></i>+11 111 111 1111</p>
                <p class="fs-6"><i class="bi bi-envelope-fill p-2"></i>Ytravel@gmail.com</p>
            </div>
            <div class="col-4 col-md-6">
                <p class="fs-6">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non ipsum velit, rerum quasi amet nihil facere cum exercitationem dignissimos distinctio dolore cumque dolor ducimus ratione. Voluptate necessitatibus rerum nemo maiores!</p>
            </div>
        </div>

        <div class="row w-100">
            <div class="col">
                <p class="mt-1 mb-1 text-light">Ytravel &copy; 2023-2028</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
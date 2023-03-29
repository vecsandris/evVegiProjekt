<?php
include("../server/classes.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Felület</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../kepek/profilkepek/logo.png" type="image/x-icon">
</head>
<body style = "display: block; padding-top: 0; padding-bottom: 0; background-image: url('../kepek/profilKepek/background2.png');">
 
 <nav class="navbar navbar-expand-lg fs-4">
  <div class="container-fluid">
   <img src="../kepek/profilKepek/logo.png" alt="Oldal logo" style="width:100px;" class="rounded-pill float-start"> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id = "navbarSupportedContent">
      <ul class="navbar-collapse navbar-nav justify-content-end">
        <li class="nav-item">
        <a href="?adminmenu=1" class = "nav-link text-white" role="button" aria-expanded="false">Felhasználók</a><br>  
        </li>
        <li class="nav-item">
        <a href="?adminmenu=2" class = "nav-link text-white" role="button" aria-expanded="false">Túrák</a>
        </li>
          <?php
                  if(isset($_SESSION['nev'])){
                ?>
                  <li class = "nav-item p-2">
                      <form action="" method="post">
                        <button type="submit" class="btn btn-primary" name = "kilep">Kijelentkezés</button>
                      </form>
                  </li>
                <?php
                  }
                ?>
      </ul>
    </div>
  </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>                  
<?php
    if(isset($_POST["kilep"]))
    {   session_unset();
        session_destroy();
        header("location: ../frontend/fooldal.php");
    }
    if(isset($_GET["adminmenu"]))
    {
        if($_GET["adminmenu"]==1)
        {
            $adminlekeres = new AdminFelulet();
            $adminlekeres->Felhasznalok();
        }
    }
    if(isset($_GET["adminmenu"]))
    {
        if($_GET["adminmenu"]==2)
        {
            $adminlekeres = new AdminFelulet();
            $adminlekeres->Turak();
        }
    }
    if(isset($_GET["userid"]))
    {
        $adminlekeres = new AdminFelulet();
        $adminlekeres->FelhasznaloSzerkesztes();
    }

    if(isset($_POST["szerkesztes"]))
    {
        $adminlekeres = new AdminFelulet();
        $adminlekeres->FelhasznaloUpdate($_POST["nevecske"],$_POST["jelszocska"],$_POST["kepek"]);
    }
?>
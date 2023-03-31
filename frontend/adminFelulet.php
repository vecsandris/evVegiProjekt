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
<body style = "display: block; padding-top: 0; padding-bottom: 0; background-image: url('../kepek/profilKepek/background2.png'); background-attachment: fixed;;">
 
 <nav class="navbar navbar-expand-lg fs-4">
  <div class="container-fluid">
   <img src="../kepek/profilKepek/logo.png" alt="Oldal logo" style="width:100px;" class="rounded-pill float-start"> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id = "navbarSupportedContent">
      <ul class="navbar-collapse navbar-nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active text-black" href="../frontend/fooldal.php">Főoldal</a>
        </li>
        <li class="nav-item">
        <a href="?adminmenu=1" class = "nav-link text-black" role="button" aria-expanded="false">Felhasználók</a> 
        </li>
        <li class="nav-item">
        <a href="?adminmenu=2" class = "nav-link text-black" role="button" aria-expanded="false">Túrák</a>
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
<?php
  if(!isset($_GET["adminmenu"]) && !isset($_GET["userid"])){
?>
<div class = "text-white bottom-50 end-50 m-5 p-5">
  <h1 style = "font-size: 60px" class = "text-black">Üdvözöllek az admin felületen!</h1>
  <p style = "font-size: 40px" class = "text-black">Válassz a menüpontok között az adatok változtatásához!</p>
</div>
<?php
  }
  if(isset($_GET["adminmenu"]))
  {
      if($_GET["adminmenu"]==2)
      {
          $adminlekeres = new AdminFelulet();
          ?>
          <div class = "container text-center">
              <div class = "row">
            <?php
            $adminlekeres->Turak();
            ?>
            </div>
          </div>
          <?php
      }
  }
?>


<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    if(isset($_GET["turaid"]))
    {
        $adminlekeres = new AdminFelulet();
        $adminlekeres->TuraSzerkesztes();
    }
    if(isset($_POST["szerkesztestura"]))
    {
        $adminlekeres = new AdminFelulet();
        $adminlekeres->TuraUpdate($_POST["turanev"],$_POST["turahossz"],$_POST["turanehez"],$_POST["turafel"],$_POST["megyeid"]);
    }
    if(isset($_POST["turaadd"]))
    {
      $adminlekeres = new AdminFelulet();
      $adminlekeres->TuraHozaadass($_POST["turanev1"],$_POST["turahossz1"],$_POST["turanehez1"],$_POST["turafel1"],$_POST["megyeid1"],$_POST["tura_kep"]);

    }
    if(isset($_POST["felhasznalohozzaadas"]))
    {
      print("<form action='' method='post'>
      <input type='text' name='nevecske2' ><br>
      <input type='text' name='jelszocska2'><br>
      <select name='kepek2'>
       <option value='1'>1</option>
       <option value='2'>2</option>
       </select>
      <button type='submit'  name = 'hozzaadas'>Hozzáadás</button>
      </form>");
    }
    if(isset($_POST["hozzaadas"]))
    {
      $adminlekeres = new AdminFelulet();
      $adminlekeres-> FelhasznaloHozzaadas($_POST["nevecske2"],$_POST["jelszocska2"],$_POST["kepek2"]);
      
    }
  
?>
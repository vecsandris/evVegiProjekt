<!DOCTYPE html>
<html lang="en">
<?php
include("../server/classes.php");
include("../components/header.php");
?>
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
  if(isset($_GET["adminmenu"])){
    if($_GET["adminmenu"]==1){
      print '
      <div class = "text-black bottom-50 end-50 m-5 p-5">
          <h1 style = "font-size: clamp(2rem,10vw,4rem);">Felhasználók szerkesztése.</h1>
      </div>
      ';
    }
  }
  ?>
<div class="container px-4 py-5" id="featured-3">
  <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
  <?php
  if(!isset($_POST["felhasznalohozzaadas"])){
  if(isset($_GET["adminmenu"]))
  {
    $adminlekeres = new AdminFelulet();
      if($_GET["adminmenu"]==1)
      {
          $adminlekeres->Felhasznalok();
      }
      ?>
    </div>
</div>
      <?php
      if($_GET["adminmenu"]==2)
      {
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
}
if(isset($_POST["felhasznalohozzaadas"]))
      {
      print
        '
          <div class="card text-center" style="width: 19rem; height: 11rem;">
            <div class="card-body">
            <form action="" method="post">
              <label for="nevecske2">Név:</label>
              <input type="text" name="nevecske2">
              <label for="jelszocska2">Jelszó:</label>
              <input type="text" name="jelszocska2">
              <label for = "kepek2">Profilkép:</label>
              <select name="kepek2">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
              </div>
              <button type="submit"  name = "hozzaadas" class = "btn btn-primary">Hozzáadás</button>
              </form>
            </div>
        </div>
          ';
      }
  if(isset($_GET["userid"]))
  {
    $adminlekeres = new AdminFelulet();
    $adminlekeres->FelhasznaloSzerkesztes();
  }
?>

<?php
    if(isset($_POST["kilep"]))
    {   session_unset();
        session_destroy();
        header("location: ../frontend/fooldal.php");
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
        $adminlekeres->TuraUpdate($_POST["turanev"],$_POST["turahossz"],
        $_POST["turanehez"],$_POST["turafel"],$_POST["megyeid"]);
    }
    if(isset($_POST["turaadd"]))
    {
      $adminlekeres = new AdminFelulet();
      $adminlekeres->TuraHozaadass($_POST["turanev1"],$_POST["turahossz1"],
      $_POST["turanehez1"],$_POST["turafel1"],$_POST["megyeid1"],$_POST["tura_kep"],$_POST["tura_szoveg"]);

    }
    if(isset($_POST["hozzaadas"]))
    {
      if(!empty($_POST["nevecske2"]) && $_POST["jelszocska2"] && $_POST["kepek2"]){
        $adminlekeres = new AdminFelulet();
        $adminlekeres-> FelhasznaloHozzaadas($_POST["nevecske2"],$_POST["jelszocska2"],$_POST["kepek2"]);
        $_POST = array();
      }
    }
    if(isset($_POST["felhasznaloTorles"])){
      $admin = new AdminFelulet();
      $admin->felhasznaloTorles($_GET["userid"]);
    }
    if(isset($_POST["turaTorles"])){
      $admin = new AdminFelulet();
      $admin->turaTorles($_GET["turaid"]);
    }
  
?>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
  <?php
    include("../server/classes.php");
    include("../components/header.php");
    $adminlekeres = new FelhasznaloiProfil();
  ?>
<body style = "background-image: url('../kepek/profilKepek/background.png');">
  <?php
    include("../components/navbar.php");
  ?>
  <main>
  <div class = "text-white bottom-50 end-50 m-5 p-5">
    <h1 style = "font-size: 60px">Itt állithatod a profil adataid.</h1>
  </div>
    <?php
          $adminlekeres->ProfilKiiras();
          if(isset($_POST["profilszerkesztes"]))
          {  
          $adminlekeres->ProfilUpdate($_POST["nev3"],$_POST["jelszo3"],$_POST["kepek4"]);
          }
    ?>
  </main>
  <?php
    include("../components/footer.php");
  ?>
</body>
</html>

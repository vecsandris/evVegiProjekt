<?php
   include("../server/classes.php");
   $adminlekeres = new FelhasznaloiProfil();
   $adminlekeres->ProfilKiiras();
   if(isset($_POST["profilszerkesztes"]))
   {    
    $adminlekeres = new FelhasznaloiProfil();
    $adminlekeres->ProfilUpdate($_POST["nev3"],$_POST["jelszo3"],$_POST["kepek4"]);

   }
   if(isset($_POST["kilep"]))
   { 
       header("location: ../frontend/fooldal.php");
   }
   
?>
          <?php
                  if(isset($_SESSION['nev'])){
                ?>
                  <li class = "nav-item p-2">
                      <form action="" method="post">
                        <button type="submit" class="btn btn-primary" name = "kilep">Vissza a főoldalra</button>
                      </form>
                  </li>
                <?php
                  }
                ?>
                

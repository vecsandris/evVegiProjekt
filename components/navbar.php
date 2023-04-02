<?php
    session_start();
?>
<nav class="navbar navbar-expand-lg fs-4">
  <div class="container-fluid">
  <img src="../kepek/profilKepek/logo.png" alt="Oldal logo" style="width:100px;" class="rounded-pill float-start"> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id = "navbarSupportedContent">
      <ul class="navbar-collapse navbar-nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" href="../frontend/fooldal.php">Főoldal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../frontend/turak.php">Túrák</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../frontend/informaciok.php" role="button" aria-expanded="false">
            Információ
          </a>
        </li>
        <?php
        if(isset($_SESSION['nev'])){
          if($_SESSION["nev"] == "admin")
          {
        print("
        <li class='nav-item'>
          <a class='nav-link' href='../frontend/adminFelulet.php' role='button' aria-expanded='false'>
            Adminfelület
          </a>
        </li>

        ");
         }
         else
         {
           print("     
            <li class='nav-item p-2'>
           <a class='nav-link' href='../frontend/profil.php' role='button' aria-expanded='false'>
             Profil
           </a>
         </li>");
         }  
      }      ?>
          <?php
                  if(isset($_SESSION['nev'])){
                ?>
                  <li class = "nav-item p-2">
                    <a href="../server/kilepes.php" class = "btn btn-primary">Kijelentkezés</a>
                      <!-- <form action="" method="post">
                        <button type="submit" class="w-100 btn btn-primary" name = "kilep">Kijelentkezés</button>
                      </form> -->
                  </li>
                  <li class = "nav-item p-2">
                       <?php print  "Üdv ".$_SESSION["nev"]."!";?>
                  </li>
                  <li class = "nav-item p-2">
                    <a class="navbar-brand" href="../server/belepes.php">
                    <?php
                         print '<a href = "../frontend/profil.php"><img src = "../kepek/profilkepek/'.$_SESSION["profilkep"].'.jpg" alt = "profilkép" class = "img-fluid rounded-circle" style = "height: 70px; width: 70px;"></a>'
                    ?>
                    </a>
                  </li>
                <?php
                  }else{
                ?>
                 <li class="nav-item p-2">
                    <a class="navbar-brand" href="../server/belepes.php">
                        Bejelentkezés<i class="bi bi-tree-fill fs-1"></i>
                    </a>
                 </li>
                 <?php
                  }
                 ?>
      </ul>
    </div>
  </div>
</nav>
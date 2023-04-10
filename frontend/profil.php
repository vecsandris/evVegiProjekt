<!DOCTYPE html>
<html lang="en">
  <?php
    include("../server/classes.php");
    include("../components/header.php");
    $adminlekeres = new FelhasznaloiProfil();
    $profil = new FelhasznaloiProfil();
  ?>
<body style = "background-image: url('../kepek/profilKepek/background.png');">
  <?php
    include("../components/navbar.php");
  ?>
  <main>
  <div class = "text-white bottom-50 end-50 m-5 p-5">
    <h1 style = "font-size: 60px">Itt állithatod a profil adataid.</h1>
  </div>
    <div class="container px-4 py-5" id="featured-3">
      <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class = "feature col">
    <?php
          $adminlekeres->ProfilKiiras();
          if(isset($_POST["profilszerkesztes"]))
          {  
          $adminlekeres->ProfilUpdate($_POST["nev3"],$_POST["jelszo3"],$_POST["kepek4"]);
          $_POST = array();
          }
          if(isset($_SESSION["toroltTura"]) && !empty($_SESSION["toroltTura"])){
            echo '<script type="text/javascript">

            $(document).ready(function(){
            
                Swal.fire(
                    "Sikeres Törlés!",
                    "",
                    "success"
                  )
            })
            </script>;
            ';
            unset($_SESSION["toroltTura"]);
          }
    ?>
        </div>
        <div class = "feature col">
        <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mentett túrák</h5>
                </div>
                <ul class="list-group list-group-flush">
                  <?php
                    $profil->MentettTuraKiiras();
                  ?>
                </ul>
             </div>
        </div>
      </div>
    </div>
  </main>
  <?php
    include("../components/footer.php");
  ?>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

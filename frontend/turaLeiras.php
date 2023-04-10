<!DOCTYPE html>
<html lang="en">
<?php
    include("../server/classes.php");
    include("../components/header.php");
    $turak = new Turak();
    $profil = new FelhasznaloiProfil();
?>
<body class="" style="background-image: url('../kepek/profilKepek/Background2.png'); background-repeat: no-repeat; background-size:cover;">
 <?php
  include("../components/navbar.php");
  ?>

<main>
  <?php
    if(isset($_GET["tura_id"])){
      $db = new mysqli("localhost", "root", "", "turazas");
      $turaKiir = $db->query("SELECT *, SUBSTRING(tura_leiras.tura_szoveg,1,800) AS turaSzoveg FROM turak INNER JOIN tura_leiras ON turak.id = tura_leiras.id WHERE turak.id = ".$_GET["tura_id"]." LIMIT 1");
        while($adat = $turaKiir->fetch_assoc()){
          $html = 
             '
            <div class="container px-4 py-5" id="featured-3"">
            <h2 class="pb-2 border-bottom">Túra információk</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
              <div class="feature col">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                  <img src = "../kepektura/'.$adat["tura_kep_nev"].'.jpg" alt = "'.$adat["tura_nev"].'" class = "img-fluid">
                </div>
              </div>
              <div class="feature col">
                <h5 class="fs-2">'.$adat["tura_nev"].'</h5>
                <p>Túra nehézsége: '.$adat["tura_nehezseg"].'</p>
                <p>Túra hossza: '.$adat["tura_hossza"].'km</p>
                <p>Túra felkapottsága:</p>
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="'.$adat["tura_felkapottsag"].'" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar" style = "width: '.$adat["tura_felkapottsag"].'%;">'.$adat["tura_felkapottsag"].'%</div>
                </div>
                <br>
                <p>'.$adat["turaSzoveg"].'</p>
              </div>
              ';
              if(isset($_SESSION["id"])){
                $html .= '<form action = "" method = "post">
                <div class="feature col">
                  <button type = "submit" name = "mentes" class = "bg-transparent" style = "border: 1px solid transparent;"><i class="bi bi-bookmark-fill" style = "font-size: 3rem;"></i></button>
                </div>
                </form>';
              }
              $html .='
            </div>
          </div>
            ';
            print $html;
    }
  }
    if(isset($_POST["mentes"])){
      $profil->turaMentes($_GET["tura_id"]);
    }
  ?>
</main>

<?php
  include("../components/footer.php");
  ?>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
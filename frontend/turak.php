<!DOCTYPE html>
<html lang="en">

<?php
include("../server/classes.php");
include("../components/header.php");
$megye = new Megye();
?>
<body style="background-image: url('../kepek/profilKepek/background2.png'); background-repeat: no-repeat; background-attachment: fixed;">
 
<?php include("../components/navbar.php");?>

  <main>
  <div class="container text-center">
    <div class="row position-relative">
      <form action="" method="post" class = "d-flex gap-2 w-25 m-auto">
        <input type="text" name="kereses" id="kereses" autocomplete = "off" class = "form-control">
        <button type="submit" class = "btn btn-primary">Keresés</button>
      </form>
      <div class = "position-absolute end-0 top-0 align-self-end bg-white rounded-circle p-2" style = "width: 3rem; height: 3rem; cursor: pointer;" id = "szures">
        <i class="bi bi-funnel fs-4"></i>
      </div>
    </div>
    <div id="szures_adatok" class = "row bottom-0 end-0 m-1 w-25" style = "display: none;">
    <form action="" method="post">
      <div>
        <?php
          $megyeNevek = $megye->MegyeSzuro();
        ?>
      </div>
      <button type="submit" class = "btn btn-primary">Szűrés</button>
    </form>
  </div>
    <div class="row">
      <?php $megye->MegyeKiiras(isset($_POST["kereses"]) ? $_POST["kereses"] : null, isset($_POST["megyeNev"]) ? $_POST["megyeNev"] : null);?>
    </div>
  </div>
  </main>
  <?php
  include("../components/footer.php");
  ?>
          <script>
              $("#szures").on("click", function(event){
                  $("#szures_adatok").slideToggle();
              });
          </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
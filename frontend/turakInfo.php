<!DOCTYPE html>
<html lang="en">

<?php
 include("../server/classes.php");
 include("../components/header.php");
 $turak = new Turak();
?>

<body style="background-image: url('../kepek/profilKepek/Background2.png'); background-repeat: no-repeat; background-size:cover;">
  <?php
  include("../components/navbar.php");
  ?>
<main>
  <div class="container text-center">
    <h1><?php $turak->turaCim($_GET["idx"]) ?> túrái.</h1>
    <div class="row" style="padding-bottom:28.5%">
        <?php $turak->Turakiiras($_GET['idx']);?>
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
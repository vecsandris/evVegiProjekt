<!DOCTYPE html>
<html lang="en">
<?php
   $title = "test";
   include("../server/classes.php");
   include("../components/header.php");
   $Belepes = new Belepes();
?>
<body style = "background-image: url('../kepek/profilKepek/background.png');">

<?php
  include("../components/navbar.php");
?>

<main>
<div class = "text-white bottom-50 end-50 m-5 p-5">
  <h1 style = "font-size: 60px">Találd meg kedvenc túra útvonalad.</h1>
  <form action="" method="post">
      <a href = "../frontend/turak.php" class = "btn text-white bg-dark">Felfedezés</a>
  </form>
</div>


<div class = "container">
  <div class = "row g-5">

    <div class="col-md-4">
      <div class = "card">
        <img src="../kepek/bacskiskunvarmegye.png" alt="Bács-Kiskun" style = "aspect-ratio: 16 / 9; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title">Bács-Kiskun vármegye</h5>
          <p class="card-text">Bács-Kiskun vármegye Magyarország déli részén található, és gazdag természeti kincsekben, változatos tájban, sík vidékeken és dombokban gazdag terület.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class = "card">
      <img src= "../kepek/baranyavarmegye.png" alt="Baranya" style = "aspect-ratio: 16 / 9;">
        <div class="card-body">
          <h5 class="card-title">Baranya vármegye</h5>
          <p class="card-text">Baranya vármegye Magyarország dél-délnyugati részén található, a Dél-Dunántúli régióban. A terület gazdag természeti kincsekben, változatos tájban, hegyekben, völgyekben, erdőkben és folyókban.</p>
        </div>
     </div>
    </div>
    <div class=" col-md-4">
      <div class = "card">
        <img src="../kepek/bekesvarmegye.png" alt="Békés" style = "aspect-ratio: 16 / 9;">
        <div class="card-body">
          <h5 class="card-title">Békés vármegye</h5>
          <p class="card-text">Békés vármegye Magyarország délkeleti részén található, a Dél-Alföldön. A területen számos érdekes természeti látnivaló található</p>
        </div>
      </div>
    </div>

</div>
</div>
</main>

<?php
  include("../components/footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
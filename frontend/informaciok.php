<!DOCTYPE html>
<html lang="en">

<?php
  include("../server/classes.php");
  include("../components/header.php");
?>
<body style="background-image: url('../kepek/profilKepek/Background2.png'); background-repeat: no-repeat; background-size:cover;">

  <?php
  include("../components/navbar.php");
  ?>
  <main>
  <div class="flex-grow-1 container text-center" style="margin-top:10%;">
    <div class="row">
      <div class="col col-lg-12 fw-bold">
        <h1>Információk</h1>
      </div>
    </div>
    <div class="row">
      <div class="col col-lg-6">
        <p class="fs-3">Üdvözöllek az Ytravel nevű weblapon, amely magyarországi túra útvonalakat kínál az érdeklődők számára. Az oldalunk célja, hogy segítsünk az embereknek felfedezni és megtapasztalni az izgalmas kirándulóhelyeket és természeti szépségeket, amelyekre hazánk büszke lehet.</p>
      </div>
      <div class="col col-lg-6">
        <p class="fs-3">Az oldalunkon fellelhető túraútvonalak széles skáláját kínálják, kezdve a könnyű sétáktól a nagyon nehéz hegyi túrákig. Az útvonalak mindegyike részletes leírással rendelkezik, hogy segítségére legyen a látogatóknak a kiválasztásban és az útvonalak navigálásában.</p>
      </div>
    </div>
  </div>
  </main>
  <?php
    include("../components/footer.php");
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
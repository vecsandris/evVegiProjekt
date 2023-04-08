<?php
    session_start();
    include("classes.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php include("../components/header.php")?>
<body>
            <main class="form-signin w-100 m-auto text-center">
                <form action = "" method = "post">
                <h1 class="h3 mb-3 fw-normal">Belépés</h1>
            
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name = "nev" autocomplete = "off">
                    <label for="floatingInput">Név:</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name = "jelszo">
                    <label for="floatingPassword">Jelszó:</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name = "belep">Belépés</button>
                <p class="mt-5 mb-3 text-muted">Ytravel &copy; 2023-2028</p>
                </form>
                <form action="" method="post">
                <button class="w-100 btn btn-lg btn-primary" type="submit" name = "regiszt">Regisztráció</button>
                </form>
                <a href = "../frontend/fooldal.php" class = "btn btn-info">Vissza a főoldalra</a>
          </main>
          <?php
            //regisztráció
            if(isset($_POST["regiszt"]))
            {
                    header("location: regisztracio.php");
            }
            //belépés ellenőrzése
            if(isset($_POST["belep"]))
            {
                $belepes = new Belepes();
                if(isset($_POST["nev"])&&isset($_POST["jelszo"]))
                {
                $belepes ->Login($_POST["nev"],$_POST["jelszo"]);
                }
                else{
                    echo '<script type="text/javascript">

                    $(document).ready(function(){
                    
                        Swal.fire(
                            "Nem megfelelő adatokkal próbál belépni!",
                            "Próbálja újra!",
                            "error"
                        )
                    })
                    </script>
                    ';
                }
            }
            //belépés után
            if(isset($_SESSION["nev"])){
                header("location: ../frontend/fooldal.php");
            }
          ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
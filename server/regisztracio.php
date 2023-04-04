<?php
    include("classes.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php include("../components/header.php")?>
<body>
            <main class="form-signin w-100 m-auto text-center">
                <form action = "" method = "post">
                <h1 class="h3 mb-3 fw-normal">Regisztráció</h1>
            
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name = "nev2">
                    <label for="floatingInput">Név:</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name = "jelszocska">
                    <label for="floatingPassword">Jelszó:</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name = "jelszocska2">
                    <label for="floatingPassword">Jelszó újra:</label>
                </div>
                <p class="mt-5 mb-3 text-muted">&copy; 2023–2028</p>
            
                
                    <button class="w-100 btn btn-lg btn-primary" type="submit" name = "regiszt2">Regisztráció</button>
                    <button type="submit" name="kilep">Vissza a belépéshez!</button>
                </form>
          </main>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
          <?php
          //regisztráció ellenőrzése

            $regiszt = new Regisztralas();
            if(isset($_POST["regiszt2"]))
            {
                if(isset($_POST["nev2"])&&isset($_POST["jelszocska"])&&isset($_POST["jelszocska2"]))
                {
                    echo '<script type="text/javascript">

                    $(document).ready(function(){
                    
                        Swal.fire(
                            "Valamelyik adat hiányos, kérem töltse ki helyesen!",
                            "Próbálja újra!",
                            "error"
                        )
                    })
                    </script>
                    ';
                }
                else{
                    echo '<script type="text/javascript">

                    $(document).ready(function(){
                    
                        Swal.fire(
                            "Sikeres Regisztráció!",
                            "Jelentkezzen be!",
                            "success"
                        )
                    })
                    </script>
                    ';
                    $regiszt ->Regist($_POST["nev2"],$_POST["jelszocska"],$_POST["jelszocska2"]);
                }
            }
            if(isset($_POST["kilep"]))
            {   session_unset();
                session_destroy();
                header("Location: ./belepes.php");
            }
          ?>
          <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
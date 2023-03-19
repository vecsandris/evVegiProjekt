<?php
    include("classes.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
            <main class="form-signin w-100 m-auto text-center">
                <form action = "" method = "post">
                <h1 class="h3 mb-3 fw-normal">Regisztráció</h1>
            
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" require placeholder="name@example.com" name="nev2">
                    <label for="floatingInput">Név:</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" require placeholder="Password" name="jelszocska">
                    <label for="floatingPassword">Jelszó:</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" require placeholder="Password" name="jelszocska2">
                    <label for="floatingPassword">Jelszó újra:</label>
                </div>
                <p class="mt-5 mb-3 text-muted">&copy; 2023–2028</p>
                </form>
                <form action="" method="post">
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
                $regiszt = new Regisztralas();
                if(isset($_POST["nev2"])&&isset($_POST["jelszocska"])&&isset($_POST["jelszocska2"]))
                {
                $regiszt ->Regist($_POST["nev2"],$_POST["jelszocska"],$_POST["jelszocska2"]);
                }
                else{      
                    print("Valamelyik adat hiányos kérem töltse ki rendesen");
                    
                }
            }
            if(isset($_POST["kilep"]))
            {   session_unset();
                session_destroy();
                header("Location: ./belepes.php");
            }
          ?>
</body>
</html>
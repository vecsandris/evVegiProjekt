<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>turazas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
         class Belepes
         {
         public mysqli $csatlakozas;
         function __construct()
         {
             $this->csatlakozas = new mysqli("localhost","root","","turazas");
         }
         function Login($nev,$jelszo)
         {

             $belepes = $this->csatlakozas->query("SELECT * from felhasznalok where nev = '".$nev."' and jelszo = '".$jelszo."' ");
             if($adat = $belepes->fetch_assoc())
             {  
                $_SESSION["nev"] = $nev;
                print("Sikeres belépés");
                print("<form action='' method='post'>
                <button type='submit' name='kilep'>Kilépés</button></form>");
             }
             else
             {
                 print("Sikeretlen a belépés probálkozon újra vagy regisztráljon!") ;

             }
         }
     }
     class Regisztralas
     {
        public mysqli $csatlakozas;
        function __construct()
        {
            $this->csatlakozas = new mysqli("localhost","root","","turazas");
        }
        function Regist($nev,$jelszo,$jelszo2)
        {

            $nevcheck = $this->csatlakozas->query("SELECT * from felhasznalok where nev = '".$nev."'");
            if($adat = $nevcheck->fetch_assoc())
            {        
               print("Sikeretlen a regisztrálás már van ilyen felhasználó!");
               
            }
            else
            {
                if($jelszo == $jelszo2)
                {
                   $regiszralas = $this->csatlakozas->query("INSERT INTO felhasznalok (nev,jelszo) values('".$nev."','".$jelszo."')");
                  
                }
                else
                {
                    print("Sikeretlen a regisztrálás, nem egyezik meg a két jelszó!");
                    print("<form action='' method='post'>
                    <button type='submit' name='kilep'>Kilépés</button></form>");
                }
           }

        }
     }
    
    ?>
    <?php 
    if(!isset($_POST["regiszt"])||!isset($_SESSION["nev"]))
    {

            print '
            <main class="form-signin w-100 m-auto text-center">
                <form action = "" method = "post">
                <h1 class="h3 mb-3 fw-normal">Belépés</h1>
            
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name = "nev">
                    <label for="floatingInput">Név:</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name = "jelszo">
                    <label for="floatingPassword">Jelszó:</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name = "belep">Belépés</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2023–2028</p>
                </form>
                <form action="" method="post">
                <button class="w-100 btn btn-lg btn-primary" type="submit" name = "regiszt">Regisztráció</button>
                </form>
          </main>
            ';
    }
    ?>
    <?php
    if(isset($_POST["kilep"]))
    {   session_unset();
        session_destroy();
        header("Location: ./");
    }
    

    ?>
    <?php
    if(isset($_POST["regiszt"]))
    {
        print '
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
                </form>
                <form action="" method="post">
                <button class="w-100 btn btn-lg btn-primary" type="submit" name = "regiszt2">Regisztráció</button>
                <button type="submit" name="kilep">Vissza Lépés</button>
                </form>
          </main>
            ';

    }
    if(isset($_POST["belep"]))
    {    
        $belepes = new Belepes();
        if(isset($_POST["nev"])&&isset($_POST["jelszo"]))
        {
        $belepes ->Login($_POST["nev"],$_POST["jelszo"]);
        }
        else{
            print("Valamelyik adat hiányos kérem töltse ki rendesen");
        }
    }
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
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
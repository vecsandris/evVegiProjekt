<?php
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
</head>
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
                </form>
                <form action="" method="post">
                <button class="w-100 btn btn-lg btn-primary" type="submit" name = "regiszt2">Regisztráció</button>
                <button type="submit" name="kilep">Vissza a belépéshez!</button>
                </form>
          </main>
</body>
</html>
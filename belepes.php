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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belepes</title>
</head>
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
                <p class="mt-5 mb-3 text-muted">&copy; 2023–2028</p>
                </form>
                <form action="" method="post">
                <button class="w-100 btn btn-lg btn-primary" type="submit" name = "regiszt">Regisztráció</button>
                </form>
          </main>
</body>
</html>
<?php
    session_start();
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
           $_SESSION["nev"] = $adat['nev'];
           header("Location: ./");
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

class Szures{
    public mysqli $csatlakozas;
    function __construct()
    {
        $this->csatlakozas = new mysqli("localhost","root","","turazas");
    }
    function SzuroRendszer(){
        //$adat = $this->csatlakozas->query("SELECT * FROM megye WHERE turak_szama = ".."");
    }
}

?>
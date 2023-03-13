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
           $_SESSION['nev'] = $adat['nev'];
           $_SESSION['kepNeve'] = $adat['user_kep_nev'];
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
        //elso szűrő form
        $elsoSzuroAdat = $this->csatlakozas->query("SELECT * FROM megye WHERE turak_szama =  AND megye_felkapottság =  AND ");
        //masodik szűrő form
        //$masodikSzuroAdat = $this->csatlakozas->query("SELECT * FROM megye WHERE turak_szama = ");
        //harmadik szűrő form
        //$harmadikSzuroAdat = $this->csatlakozas->query("SELECT * FROM megye WHERE turak_szama = ");
    }
}

class Kereses{
    public mysqli $csatlakozas;
    function __construct(){
        $this->csatlakozas = new mysqli("localhost","root","","turazas");
    }
    function Kereso($tartalom){
        //$adat = $this->csatlakozas->query("SELECT * FROM megye INNER JOIN turak ON megye.id = turak.megye_id WHERE megye.megye_nev = '%".$tartalom."%' OR turak.tura_nev = '%".$tartalom."%'");
        $adat = $this->csatlakozas->query("SELECT * FROM megye WHERE megye_nev LIKE TRIM('%".$tartalom."%')");
        if($adat->fetch_assoc()){
            while($sor = $adat->fetch_assoc()){
                echo $sor['megye_nev']."<br>".$sor['turak.tura_nev'];
            }
        }else{
            $adat = $this->csatlakozas->query("SELECT * FROM turak WHERE tura_nev LIKE TRIM('%".$tartalom."%')");

            while($sor = $adat->fetch_assoc()){
                echo $sor['tura_nev'];
            }
        }
    }
}

?>
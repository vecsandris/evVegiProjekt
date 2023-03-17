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
class Turak
    {
    public mysqli $csatlakozas;
    function __construct()
    {
        $this->csatlakozas = new mysqli("localhost","root","","turazas");
    }
    function Turakiiras($megyeid)
    {
        $tartatlom = "";
        print("<div>");
        $belepes = $this->csatlakozas->query("SELECT * from turak where megye_id = '".$megyeid."'");
        while($adat = $belepes->fetch_assoc())
        {  
            $tartatlom .= '
            <div class="container text-center">
                <div class="row">
                    <div class = "col">
                        '.$adat["tura_nev"].'<br>
                        Tura hossza: '.$adat["tura_hossza"].' km<br>
                        Tura nehezseg: '.$adat["tura_nehezseg"].'<br>
                        Felkapottság: '.$adat["tura_felkapottsag"].'<br>
                        <a href="?tura_id='.$adat["id"].'"> <img src=../kepektura/'.$adat["tura_kep_nev"].'.jpg class = "img-fluid"></a><br>
                    </div>
                </div>
            </div>
            '
            ;
           
        }
        print("</div>");
        print($tartatlom);
    }
  }
  class Megye
  {
  public mysqli $csatlakozas;
  function __construct()
  {
      $this->csatlakozas = new mysqli("localhost","root","","turazas");
  }
  function MegyeKiiras()
  {
      $tartatlom = "";
      print("<div>");
      $belepes = $this->csatlakozas->query("SELECT * from megye");
      while($adat = $belepes->fetch_assoc())
      {  
         $tartatlom .= '
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h1>'.$adat["megye_nev"].'</h1>
                    Turák száma: '.$adat["turak_szama"].'
                    Felkapottság: '.$adat["megye_felkapottsag"].'
                    <a href="?id='.$adat["id"].'"> <img src=../kepek/'.$adat["megye_kep_nev"].'.png class = "img-fluid"></a>
                </div>
            </div>
        </div>
         '
         ;
         
      }
      print("</div>");
      print($tartatlom);
  }
}

?>
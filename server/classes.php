<?php
session_start();
class Belepes
{
    public mysqli $csatlakozas;
    function __construct()
    {
        $this->csatlakozas = new mysqli("localhost", "root", "", "turazas");
    }
    function Login($nev, $jelszo)
    {

        $belepes = $this->csatlakozas->query("SELECT * from felhasznalok where nev = '" . $nev . "' and jelszo = '" . $jelszo . "' ");
        if ($adat = $belepes->fetch_assoc()) {
            $_SESSION["nev"] = $adat['nev'];
            header("Location: ./");
        } else {
            print("Sikeretlen a belépés probálkozon újra vagy regisztráljon!");
        }
    }
}

class Regisztralas
{
    public mysqli $csatlakozas;
    function __construct()
    {
        $this->csatlakozas = new mysqli("localhost", "root", "", "turazas");
    }

    function Regist($nev, $jelszo, $jelszo2)
    {

        $nevcheck = $this->csatlakozas->query("SELECT * from felhasznalok where nev = '" . $nev . "'");
        if ($adat = $nevcheck->fetch_assoc()) {
            print("Sikeretlen a regisztrálás már van ilyen felhasználó!");
        } else {
            if ($jelszo == $jelszo2) {
                $regiszralas = $this->csatlakozas->query("INSERT INTO felhasznalok (nev,jelszo) values('" . $nev . "','" . $jelszo . "')");
            } else {
                print("Sikeretlen a regisztrálás, nem egyezik meg a két jelszó!");
                print("<form action='' method='post'>
                   <button type='submit' name='kilep'>Kilépés</button></form>");
            }
        }
    }
}

class Szures
{
    public mysqli $csatlakozas;
    function __construct()
    {
        $this->csatlakozas = new mysqli("localhost", "root", "", "turazas");
    }
    function SzuroRendszer()
    {
        //$adat = $this->csatlakozas->query("SELECT * FROM megye WHERE turak_szama = ".."");
    }
}
class Turak
{
    public mysqli $csatlakozas;
    function __construct()
    {
        $this->csatlakozas = new mysqli("localhost", "root", "", "turazas");
    }
    function Turakiiras($megyeid)
    {
        $tartatlom = "";
        print("<div>");
        $belepes = $this->csatlakozas->query("SELECT * from turak where megye_id = '" . $megyeid . "'");
        while ($adat = $belepes->fetch_assoc()) {
            $tartatlom .= '
            <div class="col-md-4 p-3">
                <div class="card" style="width: 18rem;">
                    <img src=../kepektura/' . $adat["tura_kep_nev"] . '.jpg class = "img-fluid" " style="height:160.516px;">
                    <div class = "card-body">
                        <h5 class="card-title">' . $adat["tura_nev"] . '</h5>
                        <p class="card-text">Tura hossza: ' . $adat["tura_hossza"] . ' km<br>
                        Tura nehezseg: ' . $adat["tura_nehezseg"] . '<br>
                        Felkapottság: ' . $adat["tura_felkapottsag"] . '<br></p>
                        <a href="../frontend/turaLeiras.php?tura_id=' . $adat["id"] . '" class="btn btn-primary">Részletek</a><br>
                    </div>
                </div>
            </div>
            ';
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
        $this->csatlakozas = new mysqli("localhost", "root", "", "turazas");
    }
    function MegyeKiiras()
    {
        $tartalom = "";
        $belepes = $this->csatlakozas->query("SELECT * FROM megye");
        $_GET['idx'] = 0;
        while ($adat = $belepes->fetch_assoc()) {
            
            $tartalom.='
                <div class="col-md-4 p-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="../kepek/' . $adat['megye_kep_nev'] . '.png" alt="' . $adat['megye_nev'] . '" style="height:160.516px;">
                        <div class="card-body">
                            <h5 class="card-title">' . $adat['megye_nev'] . '</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                            <a href="../frontend/turakInfo.php?idx='.$adat['id'].'" class="btn btn-primary">Részletek</a>
                        </div>
                    </div>
                </div>

                ';
            }
            print($tartalom);
    }
}
class AdminFelulet
    {   
        public mysqli $csatlakozas;
        function __construct()
        {
            $this->csatlakozas = new mysqli("localhost","root","","turazas");


        }
        function Felhasznalok()
        {
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from felhasznalok where nev != 'admin'");
            while($adat = $felhasznalokiiras->fetch_assoc())
            {
               print("<img src=../kepek/profilKepek/".$adat["user_kep_id"].".jpg style='width='50px' height='50px''><br>
               <a href='?userid=".$adat["id"]."'>".$adat["nev"]."</a><br>");
            }
        }

        function FelhasznaloUpdate($nev,$jelszo,$kepid)
        {
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from felhasznalok where nev = '".$nev."' and id != '".$_GET["userid"]."' ");
            if($adat = $felhasznalokiiras->fetch_assoc())
            {
               print("Már van ilyen felhasználó név");
            }
            else
            {
                print("siker");
                $felhasznaloJavitás = $this->csatlakozas->query("UPDATE felhasznalok SET nev = '".$nev."', jelszo = '".$jelszo."' , user_kep_id = '".$kepid."' WHERE id = '".$_GET['userid']."'");
            }
        }

        function FelhasznaloSzerkesztes()
        {
            $tartalom = "";
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from felhasznalok where id = '".$_GET['userid']."'");
            if($adat = $felhasznalokiiras->fetch_assoc())
            {
               $tartalom .="<form action='' method='post'>
               <input type='text' name='nevecske' value=".$adat['nev']."><br>
               <input type='text' name='jelszocska' value=".$adat['jelszo']."><br>
               <select name='kepek'>
                <option value='1'>1</option>
                <option value='2'>2</option>
                </select>
               <button type='submit'  name = 'szerkesztes'>Szereksztés</button>
               </form>";
               
            }
            print($tartalom);
        }

        function Turak()
        {
            $tartalom = '';
            $turakiiras = $this->csatlakozas->query("SELECT * from turak");
            while($adat = $turakiiras->fetch_assoc())
            {
                $tartalom .="<a href='?turaid=".$adat["id"]."'>".$adat['tura_nev']."</a>";
                $tartalom .= "<br>";        
        
            }
            print($tartalom);

        }
        function TuraSzerkesztes()
        {
            $tartalom = "";
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from turak where id = '".$_GET['turaid']."'");
            if($adat = $felhasznalokiiras->fetch_assoc())
            {
               $tartalom .="<form action='' method='post'>
               <input type='text' name='turanev' value=".$adat['tura_nev']."><br>
               <input type='text' name='turahossz' value=".$adat['tura_hossza']."><br>
               <input type='text' name='turanehez' value=".$adat['tura_nehezseg']."><br>
               <input type='text' name='turafel' value=".$adat['tura_felkapottsag']."><br>
               <input type='text' name='megyeid' value=".$adat['megye_id']."><br>
               <button type='submit'  name = 'szerkesztestura'>Szereksztés</button>
               </form>";
               
            }
            print($tartalom);
        }
        function TuraUpdate($turanev,$turahossz,$turanehez,$turafelkap,$megye_id)
        {
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from turak where tura_nev = '".$turanev."' and id != '".$_GET["turaid"]."' ");
            if($adat = $felhasznalokiiras->fetch_assoc())
            {
               print("Már van ilyen tura név!");
            }
            else
            {
                print("siker");
                $turaJavitás = $this->csatlakozas->query("UPDATE turak SET tura_nev = '".$turanev."', tura_hossza = '".$turahossz."' , tura_nehezseg = '".$turanehez."',
                 tura_felkapottsag = '".$turafelkap."' ,megye_id = '".$megye_id."' WHERE id = '".$_GET['turaid']."'");
            }
        }
    }

?>
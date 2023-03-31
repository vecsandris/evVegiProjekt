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
            $_SESSION["id"] = $adat["id"];
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
        {            print("<form action='' method='post'>
            <button type='submit'  name='felhasznalohozzaadas' >Felhasználó hozzáadása</button>
            </form>");
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from felhasznalok where nev != 'admin'");
            while($adat = $felhasznalokiiras->fetch_assoc())
            {
               print(
                '
                 <div class="card" style="width: 18rem;">
                 <img src=../kepek/profilKepek/'.$adat["user_kep_id"].'.jpg class = "card-img-top"">
                    <div class="card-body">
                      <p>'.$adat['nev'].'</p>
                    </div>
                    <a href="?userid='.$adat['id'].'" class = "btn btn-primary">Szerkesztés</a>
               </div>
                 '
               );
            }
        }
        function FelhasznaloHozzaadas($nev,$jelszo,$kepid)
        {
            $nevcheck=$this->csatlakozas->query("SELECT * from felhasznalok where nev = '".$nev."'");
            if($adat = $nevcheck->fetch_assoc())
            {
               print("Már van ilyen felhasználó név");
            }
            else
            {
                print("siker");
                $felhasznaloJavitás = $this->csatlakozas->query("INSERT INTO felhasznalok(nev,jelszo,user_kep_id) Values('".$nev."','".$jelszo."','".$kepid."')");
            }

        }

        function FelhasznaloUpdate($nev,$jelszo,$kepid)
        {
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from felhasznalok where nev = '".$nev."' and id != '".$_GET["userid"]."' ");
            if($adat = $felhasznalokiiras->fetch_assoc())
            {
               echo '
               <script type="text/javascript">

               $(document).ready(function(){

                Swal.fire({
                    icon: "error",
                    title: "Már van ilyen felhasználónév!",
                    text: "Adj meg másikat!",
                    footer: "<a></a>"
                    )
              })
              </script>;
               ';
            }
            else
            {
                echo '<script type="text/javascript">

                $(document).ready(function(){
                
                    Swal.fire(
                        "Sikeres feltöltés!",
                        "",
                        "success"
                      )
                })
                </script>
                ';
                
                $felhasznaloJavitás = $this->csatlakozas->query("UPDATE felhasznalok SET nev = '".$nev."', jelszo = '".$jelszo."' , user_kep_id = '".$kepid."' WHERE id = '".$_GET['userid']."'");
                //header("Location: /frontend/adminFelulet.php?adminmenu=1"); --> visszavisz az alap admin oldalra de nincs animáció
            }
        }

        function FelhasznaloSzerkesztes()
        {
            $tartalom = "";
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from felhasznalok where id = '".$_GET['userid']."'");
            if($adat = $felhasznalokiiras->fetch_assoc())
            {
               $tartalom .='
               <div class="col-sm-4 p-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <form action = "" method = "post">
                                <label for = "nevecske">Név:</label>
                                <input type="text" name="nevecske" value="'.$adat['nev'].'">
                                <label for = "jelszocska">Jelszó:</label>
                                <input type="text" name="jelszocska" value="'.$adat["jelszo"].'">
                                <label for = "kepek">Azonositó:</label>
                                <select name="kepek">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                </select>
                                <br>
                                <button type="submit"  name = "szerkesztes" class = "btn btn-primary">Szereksztés</button>
                            </form>
                        </div>
                    </div>
             </div>
             '
               ;
               
            }
            print($tartalom);
        }
        function TuraHozaadass($turanev,$turahossz,$turanehez,$turafelkap,$megye_id,$kepnev)
        {
            
            $turakiir=$this->csatlakozas->query("SELECT * from turak where tura_nev = '".$turanev."'");
            if($adat = $turakiir->fetch_assoc())
            {
                print("Már van ilyen tura név!");
               
            }
            else
            {
                
                $turahozaadas = $this->csatlakozas->query("INSERT INTO turak (tura_nev,tura_hossza,tura_nehezseg,tura_felkapottsag,megye_id,tura_kep_nev) 
                values('" . $turanev . "','" . $turahossz . "','".$turanehez."','".$turafelkap."','".$megye_id."','".$kepnev."')");
                move_uploaded_file($_FILES["kep"]["tmp_name"], "../kepektura/".$_FILES["kep"]["name"]);
                print("siker");
            }
            
        }
        function Turak()
        {
            $tartalom = '';
            $turakiiras = $this->csatlakozas->query("SELECT *, SUBSTRING(tura_leiras.tura_szoveg, 1, 200) AS vagott FROM tura_leiras INNER JOIN turak ON tura_leiras.id=turak.id");
            print("<form action='' method='post'>
            <button type='submit'  name='turahozaadas' >Tura hozzáadás</button>
            </form>");
            if(isset($_POST["turahozaadas"]))
            {

                print("<form action='' method='post' enctype='multipart/form-data'>
                <label>Tura neve</label>
                <input type='text' name='turanev1'><br>
                <label>Tura hossza</label>
                <input type='number 'step='any' name='turahossz1'><br>
                <label>Tura nehezsége</label>
                <input type='number' name='turanehez1'><br>
                <label>Tura felkapotság</label>
                <input type='number' name='turafel1'><br>
                <label>megye id</label>
                <input type='number' name='megyeid1'><br>
                <label>Kép neve</label>
                <input type='text' name='tura_kep'><br>
                <label>Kép fájl</label>
                <input type='file' name='kep'><br>
                <button type='submit'  name = 'turaadd'>Tura hozáadása</button>
                </form>");
                
            }
            while($adat = $turakiiras->fetch_assoc())
            {
                $tartalom .= '
                <div class="col-sm-4 p-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../kepektura/'.$adat["tura_kep_nev"].'.jpg" class="card-img-top" alt="túra kép">
                            <div class="card-body">
                            <h5 class="card-title">'.$adat['tura_nev'].'</h5>
                                <p class="card-text">'.$adat['vagott'].'...</p>
                            </div>
                    <a href="?turaid='.$adat["id"].'" class = "btn btn-primary">Szerkesztés</a>
                </div>
              </div>
                ';   
        
            }
            print($tartalom);

        }
        function TuraSzerkesztes()
        {
            $tartalom = "";
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from turak where id = '".$_GET['turaid']."'");
            if($adat = $felhasznalokiiras->fetch_assoc())
            {
               $tartalom.='
               <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <form action="" method="post">
                            <h2>Túra szerkesztés</h2>
                            <label for = "turanev">Túra név szerkesztés:</label>
                            <input type="text" name="turanev" value="'.$adat["tura_nev"].'">
                            <label for = "turahossz">Túra hossza:</label>
                            <input type="text" name="turahossz" value="'.$adat["tura_hossza"].'">
                            <label for = "turanehez">Túra nehézsége:</label>
                            <input type="text" name="turanehez" value="'.$adat["tura_nehezseg"].'">
                            <label for = "turafel">Túra felkapottsága:</label>
                            <input type="text" name="turafel" value="'.$adat["tura_felkapottsag"].'">
                            <label for = "megyeid">Megye id:</label>
                            <input type="text" name="megyeid" value="'.$adat["megye_id"].'">
                            <button type="submit"  name = "szerkesztestura" class = "btn btn-primary">Szereksztés</button>
                        </form>
                    </div>
                </div>
               ';
               
            }
            print($tartalom);
        }
        function TuraUpdate($turanev,$turahossz,$turanehez,$turafelkap,$megye_id)
        {
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from turak where tura_nev = '".$turanev."' and id != '".$_GET["turaid"]."' ");
            if($adat = $felhasznalokiiras->fetch_assoc())
            {
                echo '
                <script type="text/javascript">
 
                $(document).ready(function(){
 
                 Swal.fire({
                     icon: "error",
                     title: "Már van ilyen túra név!",
                     text: "Adj meg másikat!",
                     footer: "<a></a>"
                     )
               })
               </script>;
                ';
            }
            else
            {
                echo '<script type="text/javascript">

                $(document).ready(function(){
                
                    Swal.fire(
                        "Sikeres feltöltés!",
                        "",
                        "success"
                      )
                })
                </script>;
                ';
                $turaJavitás = $this->csatlakozas->query("UPDATE turak SET tura_nev = '".$turanev."', tura_hossza = '".$turahossz."' , tura_nehezseg = '".$turanehez."',
                 tura_felkapottsag = '".$turafelkap."' ,megye_id = '".$megye_id."' WHERE id = '".$_GET['turaid']."'");
            }
        }
    }
    class FelhasznaloiProfil
    { 
        public mysqli $csatlakozas;
        function __construct()
        {
            $this->csatlakozas = new mysqli("localhost","root","","turazas");
        }

        function ProfilKiiras()
        {
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from felhasznalok where nev =  '".$_SESSION["nev"]."'");
            if($adat = $felhasznalokiiras->fetch_assoc())
            {
            
               print("<form action='' method='post'>
               <input type='text' name='nev3' value=".$adat['nev']."><br>
               <input type='text' name='jelszo3' value=".$adat['jelszo']."><br>
               <select name='kepek4'>
                <option value='1'>1</option>
                <option value='2'>2</option>
                </select>
               <button type='submit'  name = 'profilszerkesztes'>Szereksztés</button>
               </form>");
            }
        }
        function ProfilUpdate($nev,$jelszo,$kepid)
        {
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from felhasznalok where nev = '".$nev."' and id != '".$_SESSION["id"]."' ");
            if($adat = $felhasznalokiiras->fetch_assoc())
            {
               print("Már van ilyen felhasználó név");
            }
            else
            {
                print("siker");
                $felhasznaloJavitás = $this->csatlakozas->query("UPDATE felhasznalok SET nev = '".$nev."', jelszo = '".$jelszo."' , user_kep_id = '".$kepid."' WHERE id = '".$_SESSION["id"]."'");
            }
        }
    }

?>
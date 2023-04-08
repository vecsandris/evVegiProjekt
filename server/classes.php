<?php
class Kilepes{
    function __construct()
    {
        if(session_unset()){
            if(session_destroy()){
                header("Location: ../index.php");
            }
        }
    }
}
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
            $_SESSION["profilkep"] = $adat["user_kep_id"];
            header("Location: ./");
        } else {
            echo '<script type="text/javascript">

                    $(document).ready(function(){
                    
                        Swal.fire(
                            "Nem megfelelő adatokkal próbál belépni!",
                            "Próbálja újra!",
                            "error"
                        )
                    })
                    </script>
                    ';
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
            echo '<script type="text/javascript">

                    $(document).ready(function(){
                    
                        Swal.fire(
                            "Már van ilyen felhasználó!",
                            "Regisztráljon másik névvel!",
                            "error"
                        )
                    })
                    </script>
                    ';
        }
         else {
            if ($jelszo == $jelszo2) 
            {
                $regiszralas = $this->csatlakozas->query("INSERT INTO felhasznalok (nev,jelszo, user_kep_id) values('" .$nev. "','" .$jelszo. "', 1)");
            } else
             {
                echo '<script type="text/javascript">

                    $(document).ready(function(){
                    
                        Swal.fire(
                            "Nem egyezik meg a két jelszó!!",
                            "Próbálja újra!",
                            "error"
                        )
                    })
                    </script>
                    ';
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
        $adat = $this->csatlakozas->query("SELECT * FROM megye WHERE megye_nev LIKE ");
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
        $belepes = $this->csatlakozas->query("SELECT *, SUBSTRING(tura_leiras.tura_szoveg,1,100) AS turaSzoveg from turak INNER JOIN tura_leiras ON turak.id = tura_leiras.id where megye_id = '" . $megyeid . "'");
        while ($adat = $belepes->fetch_assoc()) {
            $tartatlom .= '
            <div class="col-md-4 p-3">
                <div class="card">
                    <img src=../kepektura/' . $adat["tura_kep_nev"] . '.jpg class = "img-fluid" " style="aspect-ratio: 16 / 9; object-fit: cover;">
                    <div class = "card-body">
                        <h5 class="card-title">' . $adat["tura_nev"] . '</h5>
                        <p>'.$adat["turaSzoveg"].'...</p>
                        <a href="../frontend/turaLeiras.php?tura_id=' . $adat["id"] . '" class="btn btn-primary">Részletek</a>
                    </div>
                </div>
            </div>
            ';
        }
        print("</div>");
        print($tartatlom);
    }
    function turaCim($id){
        $cim = $this->csatlakozas->query("SELECT * FROM megye WHERE id = ".$id."");
        while($adat = $cim->fetch_assoc()){
            print $adat["megye_nev"];
        }
    }
    function EgyTuraKiiratas($turaId){
        
        }
    }
class Megye
{
    public mysqli $csatlakozas;
    function __construct()
    {
        $this->csatlakozas = new mysqli("localhost", "root", "", "turazas");
    }
    function MegyeKiiras($keresesEredmeny, $megyeNev)
    {
        $tartalom = "";
        $belepes = "";
        if(isset($megyeNev)){
            $belepes = $this->csatlakozas->query("SELECT *, SUBSTRING(megye_leiras.megye_szoveg,1,800) AS megyeLeiras FROM megye INNER JOIN megye_leiras ON megye.id = megye_leiras.id WHERE megye.id IN (".join(",",$megyeNev).")");
        }else if(isset($keresesEredmeny)){
            $belepes = $this->csatlakozas->query("SELECT *, SUBSTRING(megye_leiras.megye_szoveg,1,800) AS megyeLeiras FROM megye INNER JOIN megye_leiras ON megye.id = megye_leiras.id WHERE megye_nev LIKE '%".$keresesEredmeny."%'");
        }else{
            $belepes = $this->csatlakozas->query("SELECT *, SUBSTRING(megye_leiras.megye_szoveg,1,800) AS megyeLeiras FROM megye INNER JOIN megye_leiras ON megye.id = megye_leiras.id");
        }
        $_GET['idx'] = 0;
        while ($adat = $belepes->fetch_assoc()) {
            $tartalom.='
                <div class="col-md-4 p-3">
                    <div class="card">
                        <img class="card-img-top" src="../kepek/' . $adat['megye_kep_nev'] . '.png" alt="' . $adat['megye_nev'] . '" style="aspect-ratio: 16 / 9; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">' . $adat['megye_nev'] . '</h5>
                            <p class="card-text">'.$adat["megyeLeiras"].'</p>
                            <a href="../frontend/turakInfo.php?idx='.$adat['id'].'" class="btn btn-primary">Részletek</a>
                        </div>
                    </div>
                </div>
                ';
            }
            print($tartalom);
    }
    function MegyeSzuro(){
        $tartalom =  "";
        $szures = $this->csatlakozas->query("SELECT * FROM megye");
       while ($megyeNev=$szures->fetch_assoc()) {
            $tartalom .= '
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" value = "'.$megyeNev["id"].'" name = "megyeNev[]">
                    <label class="form-check-label" for="'.$megyeNev["id"].'">'.$megyeNev["megye_nev"].'</label>
                </div>
                ';
       }
       print $tartalom;
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
            print '
            <form action="" method="post">
                <button type="submit" name="felhasznalohozzaadas" class = "btn btn-primary">Felhasználó hozzáadása</button>
             </form>
            ';
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from felhasznalok where nev != 'admin'");
            while($adat = $felhasznalokiiras->fetch_assoc())
            {
               print(
                '
              <div class="feature col">
                <div class="card" style="width: 18rem;">
                    <img src=../kepek/profilKepek/'.$adat["user_kep_id"].'.jpg class = "card-img-top"">
                    <div class="card-body">
                           <p>'.$adat['nev'].'</p>
                    </div>
                    <a href="?userid='.$adat['id'].'" class = "btn btn-primary">Szerkesztés</a>
                </div>
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
                $felhasznaloJavitás = $this->csatlakozas->query("INSERT INTO felhasznalok(nev,jelszo,user_kep_id) Values('".$nev."','".$jelszo."','".$kepid."')");
            }

        }
        function felhasznaloTorles($id){
            $this->csatlakozas->query("DELETE FROM felhasznalok WHERE id = ".$id."");
            header("Location: ./adminFelulet.php?adminmenu=1");
        }

        function FelhasznaloUpdate($nev,$jelszo,$kepid)
        {
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from felhasznalok where nev = '".$nev."' and id != '".$_GET["userid"]."' ");
            if($adat = $felhasznalokiiras->fetch_assoc())
            {
                if(isset($_POST["szerkesztes"])){
                    echo '<script type="text/javascript">

                    $(document).ready(function(){
                    
                        Swal.fire(
                            "Már van ilyen felhasználónév!",
                            "Adj meg másik nevet!",
                            "error"
                        )
                    })
                    </script>
                    ';
                }
            }
            else
            {
                if(isset($_POST["szerkesztes"])){
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
                }
                
                $felhasznaloJavitás = $this->csatlakozas->query("UPDATE felhasznalok SET nev = '".$nev."', jelszo = '".$jelszo."' , user_kep_id = '".$kepid."' WHERE id = '".$_GET['userid']."'");
                $_SESSION["nev"] = $nev;
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
                                <label for = "kepek">Profilkép:</label>
                                <select name="kepek">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                </select>
                                <br>
                                <button type="submit"  name = "szerkesztes" class = "btn btn-primary w-100">Szerkesztés</button>
                                <button type="submit" name="felhasznaloTorles" class = "btn btn-danger w-100">Felhasználó törlése</button>
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
            print
            '<form action="" method="post">
            <button type="submit"  name="turahozaadas" class = "btn btn-primary">Tura hozzáadás</button>
            </form>';
            if(isset($_POST["turahozaadas"]))
            {
                print '
                <div class="col-sm-4 p-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <form action = "" method = "post">
                            <label>Túra neve:</label>
                            <input type="text" name="turanev1">
                            <label>Túra hossza:</label>
                            <input type="number "step="any" name="turahossz1">
                            <label>Túra nehezsége:</label>
                            <input type="number" name="turanehez1">
                            <label>Túra felkapottság:</label>
                            <input type="number" name="turafel1">
                            <label>Megye id:</label>
                            <input type="number" name="megyeid1">
                            <label>Kép neve:</label>
                            <input type="text" name="tura_kep"><br/>
                            <label>Kép fájl:</label>
                            <input type="file" name="kep">
                            <button type="submit"  name = "turaadd" class = "btn btn-primary">Túra hozzáadása</button>
                            </form>
                        </div>
                    </div>
                </div>
                ';
                
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
                            <button type="submit"  name = "szerkesztestura" class = "btn btn-primary">Szerkesztés</button>
                            <button type="submit"  name = "turaTorles" class = "btn btn-danger">Túra törlése</button>
                        </form>
                    </div>
                </div>
               ';
               
            }
            print($tartalom);
        }
        function turaTorles($id){
            $this->csatlakozas->query("DELETE FROM turak WHERE id = ".$id."");
            header("Location:  /frontend/adminFelulet.php?adminmenu=2");
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
                </script>
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
               print '
               <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profil szerkesztése</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <form action = "" method = "post">
                    <label for = "nev3">Név:</label>
                    <li class="list-group-item"><input type="text" name="nev3" value="'.$adat["nev"].'"></li>
                    <label for = "jelszo3">Jelszó:</label>
                    <li class="list-group-item"><input type="text" name="jelszo3" value="'.$adat["jelszo"].'"></li>
                    <label for = "kepek4">Profilkép:</label>
                    <li class="list-group-item">
                        <select name="kepek4">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </li>
                    <li class="list-group-item">
                        <button type="submit"  name = "profilszerkesztes" class = "btn btn-primary">Szerkesztés</button>
                    </li>
                </form>
             </ul>
             </div>
               ';
            }
        }
        function ProfilUpdate($nev,$jelszo,$kepid)
        {
            $felhasznalokiiras=$this->csatlakozas->query("SELECT * from felhasznalok where nev = '".$nev."' and id != '".$_SESSION["id"]."' ");
            if($adat = $felhasznalokiiras->fetch_assoc())
            {
                echo '<script type="text/javascript">

                    $(document).ready(function(){
                    
                        Swal.fire(
                            "Már van ilyen felhasználónév!",
                            "Adjon meg másik nevet!",
                            "error"
                        )
                    })
                    </script>
                    ';
            }
            else
            {
                echo '<script type="text/javascript">

                $(document).ready(function(){
                
                    Swal.fire(
                        "Sikeres Feltöltés!",
                        "",
                        "success"
                      )
                })
                </script>
                ';
                $felhasznaloJavitás = $this->csatlakozas->query("UPDATE felhasznalok SET nev = '".$nev."', jelszo = '".$jelszo."' , user_kep_id = '".$kepid."' WHERE id = '".$_SESSION["id"]."'");
            }
        }
        function TuraMentes($mentettTura){
            $vanEIlyenMentettTura = $this->csatlakozas->query("SELECT * FROM felhasznalok_tura WHERE felhasznalo_id = ".$_SESSION["id"]." AND tura_id = ".$mentettTura."");
            if(isset($mentettTura) && $vanEIlyenMentettTura->num_rows == 0){
                echo '<script type="text/javascript">

                $(document).ready(function(){
                
                    Swal.fire(
                        "Sikeres Mentés!",
                        "",
                        "success"
                      )
                })
                </script>;
                ';
                $this->csatlakozas->query("INSERT INTO felhasznalok_tura (felhasznalo_id, tura_id) VALUES (".$_SESSION["id"].", ".$mentettTura.")");
            }else{
                echo '<script type="text/javascript">

                $(document).ready(function(){
                
                    Swal.fire(
                        "Már lementette egyszer!",
                        "Isten ments!",
                        "error"
                    )
                })
                </script>
                ';
            }
        }
        function MentettTuraKiiras(){
            $turaMentett = $this->csatlakozas->query("SELECT *,felhasznalok_tura.id AS torlesId FROM felhasznalok_tura INNER JOIN turak ON felhasznalok_tura.tura_id = turak.id WHERE felhasznalok_tura.felhasznalo_id = ".$_SESSION["id"]."");
            while($adat = $turaMentett->fetch_assoc()){
                print '<li style = "list-style:none;"><a href = "../server/torles.php?id='.$adat["torlesId"].'" class = "btn btn-danger m-2"><i class="bi bi-x"></i></a>'.$adat["tura_nev"].'</li>';
            }
        }
        function TuraTorles($id){
            $this->csatlakozas->query("DELETE FROM felhasznalok_tura WHERE id = ".$id."");
            $_SESSION["toroltTura"] = $id;
        }
    }

?>
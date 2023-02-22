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

            print("
            <form action='' method='post'>
            <h1>Belépés</h1>
            <label>Név:</label>
            <input name='nev' type='text'><br>
            <label>Jelszó:</label>
            <input name='jelszo' type='password'><br>
            <button  type='submit' name='belep'>Belépés</button>
            <button type='submit' name='regiszt'>Regisztrálás</button>
            </form>");
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
        print("    
        <form action='' method='post'>
        <h1>Regisztrálás</h1>
        <label>Név:</label>
        <input name='nev2' type='text'><br>
        <label>Jelszó:</label>
        <input name='jelszocska' type='password'><br>
        <label>Jelszó újra:</label>
        <input name='jelszocska2' type='password'><br>
        <button type='submit' name='regiszt2'>Regisztrálás</button>
        <button type='submit' name='kilep'>Vissza Lépés</button>
        </form>");

    }
    if(isset($_POST["belep"]))
    {    
        $belepes = new Belepes();
        if(isset($_POST["nev"])&&isset($_POST["jelszo"]))
        {
        $belepes ->Login($_POST["nev"],$_POST["jelszo"]);
        }
        else{
            print("valamelyik adat hiányos kérem tőltse ki rendesen");
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
            print("valamelyik adat hiányos kérem tőltse ki rendesen");
        }
    }
    ?>
    
</body>
</html>
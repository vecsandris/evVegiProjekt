<?php
include("../server/classes.php");
$profil = new FelhasznaloiProfil();
    if(isset($_GET["id"])){
        $profil->TuraTorles($_GET["id"]);
        header("Location: ../frontend/profil.php");
    }else{
        print "Nincs ilyen id!";
    }
?>
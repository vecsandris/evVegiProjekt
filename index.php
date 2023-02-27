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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    
    ?>
    <?php 
    if(!isset($_POST["regiszt"]) && !isset($_SESSION["nev"]))
    {
        include 'belepes.php';
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
    if(isset($_POST["regiszt"]) && !isset($_POST["belep"]))
    {
            include 'regisztracio.php';
    }
    if(isset($_POST["belep"]))
    {    
        $belepes = new Belepes();
        if(isset($_POST["nev"])&&isset($_POST["jelszo"]))
        {
        $belepes ->Login($_POST["nev"],$_POST["jelszo"]);
        }
        else{
            print("Valamelyik adat hiányos kérem töltse ki rendesen");
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
            print("Valamelyik adat hiányos kérem töltse ki rendesen");
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
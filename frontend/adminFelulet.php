<?php
include("../server/classes.php");
?>
<form action="" method="post">
<button type="submit" class="w-100 btn btn-primary" name = "kilep">Kijelentkezés</button>
</form>

 <a href="?adminmenu=1">Felhasználok</a><br>  
 <a href="?adminmenu=2">Turák</a><br>                    
<?php
    if(isset($_POST["kilep"]))
    {   session_unset();
        session_destroy();
        header("location: ../frontend/fooldal.php");
    }
    if(isset($_GET["adminmenu"]))
    {
        if($_GET["adminmenu"]==1)
        {
            $adminlekeres = new AdminFelulet();
            $adminlekeres->Felhasznalok();
        }
    }
    if(isset($_GET["adminmenu"]))
    {
        if($_GET["adminmenu"]==2)
        {
            $adminlekeres = new AdminFelulet();
            $adminlekeres->Turak();
        }
    }
    if(isset($_GET["userid"]))
    {
        $adminlekeres = new AdminFelulet();
        $adminlekeres->FelhasznaloSzerkesztes();
    }

    if(isset($_POST["szerkesztes"]))
    {
        $adminlekeres = new AdminFelulet();
        $adminlekeres->FelhasznaloUpdate($_POST["nevecske"],$_POST["jelszocska"],$_POST["kepek"]);
    }
?>
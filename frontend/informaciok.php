<?php
   include("../server/classes.php");
   $belepes = new Belepes();
   $nev
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ytravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body style="display: inherit; padding-top: 0; padding-bottom: 0; background-image: url('../kepek/profilKepek/background2.png');">
    <nav class="navbar navbar-expand-lg bg-body-tertiary fs-4" style="width: 100%;">
        <div class="container-fluid">
            <img src="../kepek/profilKepek/logo.png" alt="Oldal logo" style="width:100px;" class="rounded-pill float-start">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 float-end">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../frontend/fooldal.php">Főoldal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Túrák</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Információk
                        </a>
                    </li>

                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['nev'])) {

                        ?>
                            <form action="" method="post">
                                <button type="submit" class="w-100 btn btn-primary" name="kilep">Kijelentkezés</button>
                            </form>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
                <p><?php if (isset($_SESSION["nev"])) {
                        echo $_SESSION["nev"];
                    } ?></p>
                <a class="navbar-brand" href="../server/belepes.php">
                    <img src="../kepek/profilKepek/defaultAvatar.svg" alt="Oldal logo" style="width:40px;" class="rounded-pill">
                </a>
            </div>
        </div>
    </nav>



    <?php
    if (isset($_POST["kilep"])) {
        session_unset();
        session_destroy();
        header("Location: ../index.php");
    }
    ?>
    <div id="content-wrap">
        <div class="row">
            <div class="col">
                Információk        
            </div>
        </div>
        <div class="row" style="text-align:center;">
            <div class="col">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem repellat sit, laudantium accusamus porro esse dolorem libero, totam, enim quibusdam odio fugit? Aliquam ipsam dolore neque, deserunt harum mollitia nam.
            </div>
            <div class="col">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, quibusdam aliquam, illo saepe magni delectus libero corporis sed laudantium voluptas quae reiciendis atque animi? Iste quasi eaque odit asperiores aut.
            </div>
        </div>

        <footer class="text-light ">
            <div class="row">
                <div class="col">
                    <i class="bi bi-telephone-fill">+11 111 111 1111</i><br>
                    <i class="bi bi-envelope-fill">Ytravel@gmail.com</i>
                </div>
                <div class="col">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non ipsum velit, rerum quasi amet nihil facere cum exercitationem dignissimos distinctio dolore cumque dolor ducimus ratione. Voluptate necessitatibus rerum nemo maiores!
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p class="mt-5 mb-3 text-light">Ytravel &copy; 2023-2028</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
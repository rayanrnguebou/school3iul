<?php

    session_start();
    require "./files/database.php";
    require "./files/functions.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestion Absence</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" >
    <link rel="stylesheet" href="./css/font-awesome.min.css" >
    <link rel="stylesheet" href="../nicepage.css" media="screen">
    <link rel="stylesheet" href="../Accueil.css" media="screen">
    <link rel="icon" href="../images/school-alpha.ico">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
</head>
<body>
<!-- Entête -->
<header class="u-clearfix u-gradient u-header u-header" id="sec-3be4" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
    <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
        <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-border-radius u-custom-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
                <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect></g></svg>
            </a>
        </div>
        <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1">
                <li class="u-nav-item"><a class="u-button-style u-hover-palette-5-dark-1 u-nav-link u-palette-5-dark-3 u-text-active-palette-4-dark-1 u-text-hover-white" href="index.php" style="padding: 10px 20px;">Accueil</a></li>
                <?php if(isset($_SESSION["login"]) && $_SESSION["type"] == "admin" ): ?>
                    <li class="u-nav-item"><a class="u-button-style u-hover-palette-5-dark-1 u-nav-link u-palette-5-dark-3 u-text-active-palette-4-dark-1 u-text-hover-white" href="index.php" style="padding: 10px 20px;"> <i class="fa fa-dashboard"></i> <b>ADMIN</b></a></li>
                <?php elseif(isset($_SESSION["type"]) && $_SESSION["type"] == "etudiant" ): ?>
                    <li class="u-nav-item"><a class="u-button-style u-hover-palette-5-dark-1 u-nav-link u-palette-5-dark-3 u-text-active-palette-4-dark-1 u-text-hover-white" href="etudiant.php?id=<?=$_SESSION['id_etudiant'] ?>" style="padding: 10px 20px;"> <i class="fa fa-dashboard"></i> Mes absences</a></li>
                <?php elseif(isset($_SESSION["type"]) && $_SESSION["type"] == "professeur" ): ?>
                    <li class="u-nav-item"><a class="u-button-style u-hover-palette-5-dark-1 u-nav-link u-palette-5-dark-3 u-text-active-palette-4-dark-1 u-text-hover-white" href="index.php" style="padding: 10px 20px;"> <i class="fa fa-dashboard"></i> <?=$_SESSION["nom"] ?></a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION["id"])): ?>
                    <li class="u-nav-item"><a class="u-button-style u-hover-palette-5-dark-1 u-nav-link u-palette-5-dark-3 u-text-active-palette-4-dark-1 u-text-hover-white" href="disconnect.php" style="padding: 10px 20px;"><i class="fa fa-sign-out"></i> Se déconnecter</a></li>
                <?php endif ?>
                <?php if(!isset($_SESSION["login"])): ?>
                    <li class="u-nav-item"><a class="u-button-style u-hover-palette-5-dark-1 u-nav-link u-palette-5-dark-3 u-text-active-palette-4-dark-1 u-text-hover-white" href="signup.php" style="padding: 10px 20px;">Inscription</a></li>
                    <li class="u-nav-item"><a class="u-button-style u-hover-palette-5-dark-1 u-nav-link u-palette-5-dark-3 u-text-active-palette-4-dark-1 u-text-hover-white" href="login.php" style="padding: 10px 20px;">Connexion</a></li>
                <?php endif ?>
            </ul>
</div>
<div class="u-custom-menu u-nav-container-collapse">
    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
        <div class="u-inner-container-layout u-sidenav-overflow">
            <div class="u-menu-close"></div>
            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="../index.html">Accueil</a></li>
                <?php if(isset($_SESSION["login"]) && $_SESSION["type"] == "admin" ): ?>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php"> <i class="fa fa-dashboard"></i> <b>ADMIN</b></a></li>
                <?php elseif(isset($_SESSION["type"]) && $_SESSION["type"] == "etudiant" ): ?>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="etudiant.php?id=<?=$_SESSION['id_etudiant'] ?>"> <i class="fa fa-dashboard"></i> Mes absences</a></li>
                <?php elseif(isset($_SESSION["type"]) && $_SESSION["type"] == "professeur" ): ?>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php"> <i class="fa fa-dashboard"></i> <?=$_SESSION["nom"] ?></a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION["id"])): ?>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="disconnect.php"><i class="fa fa-sign-out"></i> Se déconnecter</a></li>
                <?php endif ?>
                <?php if(!isset($_SESSION["login"])): ?>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="signup.php">Inscription</a></li>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="login.php">Connexion</a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>
    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
</div>
        </nav>
        <img class="u-image u-image-contain u-image-default u-image-1" src="../images/3iAC-alpha.png" alt="" data-image-width="474" data-image-height="378">
        <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-2" src="../images/IUC-alpha.png" alt="" data-image-width="512" data-image-height="512">
        <img class="u-image u-image-contain u-image-default u-image-3" src="../images/school-alpha.png" alt="" data-image-width="673" data-image-height="900">
</div>
</header>
<!-- Navigation -->

<?php if(isset($_SESSION["message"])): ?>
    <div class="container">
        <div class="row">
            <div class="alert alert-info" >
                <?php echo $_SESSION["message"] ?>
            </div>
        </div>
    </div>
<?php endif ?>

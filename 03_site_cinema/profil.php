<?php
    $title = "Profil";
    // session_start();
    // Duration Cookie
    $expiration = time() + 30*24*60*60;
    // Création Cookie 
    setcookie('info', "I AM A COOKIE", $expiration);
    // $_COOKIE['info'];
    require_once("inc/functions.inc.php");
    require_once("inc/header.inc.php");

    if(empty($_SESSION['user'])){
        header('location:authentification.php');
    }
?>
<main style="background:url(<?=RACINE_SITE?>assets/img/Ahri-ASU-Fox-Fire-Ahri.jpg) no-repeat; background-size: cover; background-attachment: fixed;">
    <div class="row">
        <div class="m-auto">
            <h2 class="text-center text-primary">Bonjour <?= $_SESSION['user']['pseudo']?></h2>
        </div>
    </div>
</main>
<?php
    require_once("inc/footer.inc.php");
?>
<?php
    $title = "Profil";
    // session_start();
    // Duration Cookie
    // $expiration = time() + 30*24*60*60;
    // Création Cookie 
    // setcookie('info', "I AM A COOKIE", $expiration);
    // $_COOKIE['info'];
    require_once("inc/functions.inc.php");

    if(empty($_SESSION['user'])){
        header('location:'.RACINE_SITE.'authentification.php');
    }
    require_once("inc/header.inc.php");
?>
<main class="profil">
    <?php
        if(isset($_SESSION['user']['pseudo']) && !empty($_SESSION['user']['pseudo'])){
    ?>
    <div class="row">
        <div class="m-auto">
            <h2 class="profil-name text-center text-secondary" style="background: rgba(20, 20, 20, 0.7); border-radius: 5px;">Bonjour <?=$_SESSION['user']['pseudo']?></h2>
        </div>
    </div>
    <?php
        } else if(!isset($_SESSION['user']['pseudo']) && empty($_SESSION['user']['pseudo'])){
            header('location:'.RACINE_SITE.'authentification.php');
        }
    ?>
</main>
<?php
    require_once("inc/footer.inc.php");
?>
<?php
    $title = "Profil";
    require_once("inc/functions.inc.php");
    require_once("inc/header.inc.php");
?>
<main style="background:url(<?=RACINE_SITE?>assets/img/Ahri_Popstar.jpg) no-repeat; background-size: cover; background-attachment: fixed;">
    <?php
        echo "Bonjour ". $_SESSION['user']['pseudo'];
    ?>

</main>
<?php
    require_once("inc/footer.inc.php");
?>
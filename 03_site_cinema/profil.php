<?php
    $title = "Profil";
    require_once("inc/functions.inc.php");
    require_once("inc/header.inc.php");
?>
<main style="background:url(<?=RACINE_SITE?>assets/img/Ahri_Popstar.jpg) no-repeat; background-size: cover; background-attachment: fixed;">
    <div class="row">
        <div class="m-auto">
            <h2>Bonjour <?= $_SESSION['user']['pseudo']?></h2>
        </div>
    </div>
</main>
<?php
    require_once("inc/footer.inc.php");
?>
<?php
    $title = "Panier";
    require_once('../inc/functions.inc.php');
    $date = date("Y-m-d H:i:s");
    $film_id = $_SESSION['panier'];
    $user_id =  $_SESSION['user']['id_user'];
    foreach($film_id as $key => $film){
      addOrder($film['id_film'], $user_id, $film['created_at'], $film['price'], $film['quantity'], $film['is_paid']);
    }
    require_once('../inc/header.inc.php');
?>
<main style="background:url(<?=RACINE_SITE?>assets/img/Yasuo_Dragon_Truth.jpg) no-repeat; background-size: cover; background-attachment: fixed;">
    <div class="row">
      <div class="col-sm-12 col-md-12 text-center p-5" style="background: rgba(20, 20, 20, 0.7); border-radius: 5px;">
        <p>Votre paiement a bien été effectué !</p>
        <a href="<?=RACINE_SITE . "profil.php"?>" class="fw-bold text-danger" style="text-decoration: none;">Revenir sur votre profil</a>
      </div>
    </div>
</main>
<?php
  require_once('../inc/footer.inc.php');
?>
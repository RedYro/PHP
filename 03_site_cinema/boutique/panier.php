<?php
    $title = "Panier";
    require_once("../inc/functions.inc.php");

    if(empty($_SESSION['user'])){
        header('location:'.RACINE_SITE.'authentification.php');
    }
    if(isset($_POST['ajout_panier'])){
        $quantity = htmlentities($_POST['quantity']);
        if(!isset($quantity) || empty($quantity)){
            header("location:".RACINE_SITE."film_description.php");
        } else {
            if(!isset($_SESSION['panier'])){
                $_SESSION['panier'] = array();
            }
            $filmExist = false; // check film existence
            foreach($_SESSION['panier'] as $key => $filmExistence){
                if($filmExistence['id_film'] == $_POST['id_film']){
                    $_SESSION['panier'][$key]['quantity'] += $_POST['quantity'];
                    $filmExist = true;
                }
            }
            if($filmExist == false){
                $newFilm = array( // stockage $_POST
                    'id_film' => $_POST['id_film'],
                    'quantity' => $_POST['quantity'],
                    'title' => $_POST['title'],
                    'price' => $_POST['price'],
                    'stock' => $_POST['stock'],
                    'image' => $_POST['image']
                );
                $_SESSION['panier'][] = $newFilm;
            }
            // debug($_SESSION['panier']);
        }
    }

    // Vérification de la suppression d'un film
    if(isset($_GET['id_film']) && isset($_SESSION['panier'])){
        $idFilmForDelete = $_GET['id_film'];
        // Parcours du panier à la recherche des films correspondant à une suppression
        foreach($_SESSION['panier'] as $key => $filmExistence){
            if($filmExistence['id_film'] == $idFilmForDelete){
                // Supprimer film du panier
                unset($_SESSION['panier'][$key]);
            }
        }
    } else if(isset($_GET['vider'])){
        unset($_SESSION['panier']);
    }
    $info = "";

    require_once("../inc/header.inc.php");
?>
    <main class="basket-main">
        <div class="panier d-flex justify-content-center" style="padding-top:8rem; background: rgba(20, 20, 20, 0.7);">
            <div class="d-flex flex-column mt-5 p-5">
                <h2 class="text-center fw-bolder mb-5 text-danger">Mon panier</h2>
                <?php
                    if(empty($_SESSION['panier']) && !isset($_SESSION['panier'])){
                    echo $info = alert("Votre panier est vide", "secondary");
                    } else{
                ?>
                <a href="panier.php?vider=1" class="btn align-self-end mb-5">Vider le panier</a>
                    <table class="fs-4">
                        <tr>
                            <th class="text-center text-danger fw-bolder">Affiche</th>
                            <th class="text-center text-danger fw-bolder">Nom</th>
                            <th class="text-center text-danger fw-bolder">Prix</th>
                            <th class="text-center text-danger fw-bolder">Quantité</th>
                            <th class="text-center text-danger fw-bolder">Sous-total</th>
                            <th class="text-center text-danger fw-bolder">Supprimer</th>
                        </tr>
                        <?php
                            foreach($_SESSION['panier'] as $film){
                        ?>
                        <tr>
                            <td class="text-center border-top border-dark-subtle"><img src="<?=RACINE_SITE."/assets/".$film['image'] ?? ''?>" style="width: 100px;"></td>
                            <td class="text-center border-top border-dark-subtle"><?=$film['title'] ?? ''?></td>
                            <td class="text-center border-top border-dark-subtle"><?=$film['price'] ?? ''?> €</td>
                            <td class="text-center border-top border-dark-subtle"><?=$film['quantity'] ?? ''?></td>
                            <td  class="text-center border-top border-dark-subtle"><?=$film['price'] * $film['quantity'] ?? ''?> €</td>
                            <td  class="text-center border-top border-dark-subtle"><a href="panier.php?id_film=<?=$film['id_film']?>"><i class="bi bi-trash3"></i></a></td>
                        </tr>
                        <?php
                                }   
                        ?>
                        <tr class="border-top border-dark-subtle">
                            <th class="text-danger p-4 fs-3">Total : <?=calculerMontantTotal($_SESSION['panier'])?> €</th>
                        </tr>
                    </table>
                <a href="checkout.php" class="btn align-self-end mt-5">Payer</a>
                <?php
                    }
                ?>
            </div>
        </div>
    </main>
<?php
    require_once("../inc/footer.inc.php");
?>
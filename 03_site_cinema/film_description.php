<?php
    require_once("inc/functions.inc.php");
    if(!empty($_GET)){ // si ma variable $_GET est pas vide cela veut dire que j'ai cliqué sur un lien de ma side barre, l'indexe de la variable $_GET change selon le lien indiqué dans la balise a 
        //debug($_GET);
             $id_film  = htmlentities($_GET['id_film']); //je sécurise l'id récupérer de l'url 
             $film = showFilm($id_film);
                // debug($film);
            if ($_GET['id_film'] != $film['id_film']) {
                header('location:index.php');
            }else{ // si existe l'indexe du film dans la superglobal on appel le fichier dashboard.php
                // transforme chaine vers tableau
                $actors = stringToArray($film['actors']);
                // la catégorie du film
                $category = showCategory($film['category_id']);
                $categoryName = $category['name'];
                // Gérer l'affchage de la durée
                $date_time = new DateTime($film['duration']); // nous créons un nouvel objet DateTime en passant l'input de type time en tant que paramètre
                $duration = $date_time->format('H:i'); // Nous utilisons ensuite la méthode format() pour extraire l'heure et les minutes au format 'H:i'.  
                $title = $film['title'];
    require_once("inc/header.inc.php");
?>
<main style="background:url(<?=RACINE_SITE?>assets/img/Ahri_Snow_Moon.jpg) no-repeat; background-size: cover; background-attachment: fixed;">
<div class="film bg-dark">
               <div class="back">
                    <a href="<?=RACINE_SITE."index.php"?>"><i class="bi bi-arrow-left-circle-fill p-2 fs-1"></i></a>
               </div>
               <div class="cardDetails row mt-5">
                    <h2 class="text-center mb-5"><?=ucfirst($film['title'])?></h2>
                    <div class="col-12 col-xl-5 row p-5">
                         <img src="<?=RACINE_SITE."assets/". $film['image']?>" alt="Affiche film">
                         <!-- formulaire d'ajout au panier -->
                         <div class="col-12 mt-5">
                              <form action="boutique/panier.php" method="post"  enctype="multipart/form-data"  class="w-50 m-auto row justify-content-center p-5">
                              <!-- Dans le formulaire d'ajout au panier, ajoutez des champs cachés pour chaque information que vous souhaitez conserver du film -->
                                   <input type="hidden" name="id_film" value="<?= $film['id_film']?>">
                                   <input type="hidden" name="title" value="<?= $film['title'] ?>">
                                   <input type="hidden" name="price" value="<?= $film['price'] ?>">
                                   <input type="hidden" name="stock" value="<?= $film['stock'] ?>">
                                   <input type="hidden" name="image" value="<?= $film['image'] ?>">
                                   <select name="quantity" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                        <option selected>Choisir une quantité</option>
                                        <!-- Je créé dynamiquement la quantité sélectionnable dans la limite du stock -->
     
                                        <?php for ($i = 1; $i <= $film["stock"]; $i++) { ?>
                                             <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                   </select>
                                   <!-- <a href="boutique/panier.php?id_film=<?//=$film["id_film"] ?>" class="btn w-100 m-auto">Ajouter au Panier</a>  -->
                                   <input class="btn btn-outline-danger mt-3 w-100" type="submit" value="Ajouter au panier" name="ajout_panier" id="addCart">
                                   <!-- au moment du click j'initalise une session de panier qui sera récupérer dans le fichier panier.php -->
                         </div>
                    </div>
                    <div class="detailsContent  col-md-7 p-5">
                         <div class="container mt-5">     
                              <div class="row">
                                   <h3 class="col-4"><span>Realisateur :</span></h3>
                                   <ul class="col-8">
                                        <li><?=ucfirst($film['director'])?></li>
                                   </ul>
                                   <hr>
                              </div>
                              <div class="row">
                                   <h3 class="col-4"><span>Acteur :</span></h3>
                                   <ul class="col-8">
                                        <?php
                                        // je récupére les noms des acteurs et je les affiche dans le un ul
                                                  foreach($actors as $value){
                                        ?>
                                                  <li><?=$value ?></li>
                                        <?php
                                                  }   
                                        ?>   
                                   </ul> 
                                   <hr>
                              </div>
                              <?php
                              // si j'ai un age limite renseigné je l'affiche si non pas de div avec Àge limite :
                              if($film['ageLimit']) : ?>
                                   <div class="row">
                                        <h3 class="col-4"><span>Àge limite :</span></h3>
                                        <ul class="col-8">
                                             <li>+ <?=$film['ageLimit']?> ans</li>     
                                        </ul> 
                                        <hr>
                                   </div>
                              <?php
                              endif
                              ?>
                              <div class="row">
                                   <h3  class="col-4"><span>Genre : </span></h3>
                                   <ul  class="col-8">
                                        <li><?=$categoryName?></li>
                                   </ul>
                                   <hr>
                              </div>
                              <div class="row"> 
                                   <h3 class="col-4"><span>Durée : </span></h3>
                                   <ul class="col-8">
                                        <li><?=$duration?></li>
                                   </ul>
                                   <hr>
                              </div>
                              <div class="row"> 
                                   <h3 class="col-4"><span>Date de sortie:</span></h3>
                                   <ul class="col-8">
                                        <li><?=$film['date']?></li>
                                   </ul>
                                   <hr>
                              </div>
                              <div class="row"> 
                                   <h3 class="col-4"><span>Prix : </span></h3>
                                   <ul class="col-8">
                                        <li><?=$film['price']?>€</li>
                                   </ul>
                                   <hr>
                              </div>
                              <div class="row"> 
                                   <h3 class="col-4"><span>Stock :</span> </h3>
                                   <ul class="col-8">
                                        <li><?=$film['stock']?></li>
                                   </ul>
                                   <hr>
                              </div>
                              <div class="row">      
                                   <h5 class="col-4" ><span>Synopsis :</span></h5>
                                   <ul class="col-8">
                                        <li><?= $film['synopsis']?></li>
                                   </ul>
                              </div>
                         </div>
                    </div>
               </div>          
               <?php
                        }
                    }
               ?>
          </div>
</main>
<?php
    require_once("inc/footer.inc.php");
?>
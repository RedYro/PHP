<?php
    $title = "Accueil";
    require_once("inc/functions.inc.php");
    require_once("inc/header.inc.php");

    // Method 1 //  

    if(isset($_GET['category']) && !empty($_GET['category'])){ // Si il y a des données dans l'url 
        // Récupération des films selon leur catégorie passée en argument dans la fonction 
        $showFilm = filmByCategoryName($_GET['category']);
        $message = "Film(s) à vous proposer dans cette catégorie";
        if(count($showFilm) == 0){
            echo $info = alert("Aucun film répertorié dans cette catégorie", "danger");
            $message = "film(s) présent(s) dans cette catégorie";
        }
    } else if(isset($_GET['voirPlus'])){
        $showFilm = allFilm();
        $message = "films à l'affiche";
    } else{
        $showFilm = ShowFilmsRecent();
        $message = "Films les plus récents à vous proposer";
    }

    // Method 2 //  

    // if(isset($_GET) && !empty($_GET)){ // Si il y a des données dans l'url 
    //     $showFilm = filmByCategoryId($_GET['category']);
    // } else{
    //     $showFilm = allFilm();
    // }

    $info = "";
?>
<main style="background:url(<?=RACINE_SITE?>assets/img/Ahri_Arcana.jpg) no-repeat; background-size: cover; background-attachment: fixed;">
<div class="films">
    <?php
        if(empty($_GET)){ 
    ?>
    <h2 class="fw-bolder fs-1 my-5 mx-5"><span class="nbreFilms bg-dark p-4" style="border-radius: 10px;"><?=$message ?? ""?></span></h2>
    <div class="row">
        <?php
            foreach($showFilm as $index => $film){      
        ?>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xxl-3">
            <div class="card bg-dark">
                <img src="<?= RACINE_SITE."assets/".$film['image']?>" alt="Affiche du film <?=$film['title']?>" >
                <div class="card-body text-white">
                    <h3><?=ucfirst($film['title'])?></h3>     
                    <h4 class="text-white"><?=ucfirst($film['director'])?></h4>
                    <p><span class="fw-bolder">Resumé : </span><?=substr($film['synopsis'], 0, 100)."..."?></p><!--je demande d'afficher un segment d'une chaîne de caractére :0 début de découpage jusqu'au 100 ième caractère--> 
                    <!-- Dans ce p on récupère l'id du film qui va nous servir à afficher les détils du film à partir de l'url  -->
                    <a href="<?=RACINE_SITE."film_description.php?id_film=".$film['id_film']?>" class="btn ">Voir Plus</a>                            
                    <!-- Pour afficher le film en quetion on rajoute l'id du film dans le chemin du bouton donc on trasmet la donnée via la variable$_GET-->
                    <!-- Pour afficher le film en vas utiliser la même page: on vas cachéer la div avec la totalité des film et on affiche celle avec un seul film, on vas le faire en JS -->
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <a href="<?=RACINE_SITE."index.php?voirPlus"?>" class="btn fs-1">Afficher tous les films</a>                           
        </div>
    </div>
    <?php
        } else if(isset($_GET['voirPlus'])){
    ?>
    <h2 class="fw-bolder fs-1 my-5 mx-5"><span class="nbreFilms bg-dark p-4" style="border-radius: 10px;"><?=count($showFilm)?> <?=$message ?? ""?></span></h2>
    <div class="row">
        <?php
            foreach($showFilm as $index => $film){             
        ?>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xxl-3">
            <div class="card bg-dark">
                <img src="<?= RACINE_SITE."assets/".$film['image']?>" alt="Affiche du film <?=$film['title']?>" >
                <div class="card-body text-white">
                    <h3><?=ucfirst($film['title'])?></h3>     
                    <h4 class="text-white"><?=ucfirst($film['director'])?></h4>
                    <p><span class="fw-bolder">Resumé : </span><?=substr($film['synopsis'], 0, 100)."..."?></p><!--je demande d'afficher un segment d'une chaîne de caractére :0 début de découpage jusqu'au 100 ième caractère--> 
                    <!-- Dans ce p on récupère l'id du film qui va nous servir à afficher les détils du film à partir de l'url  -->
                    <a href="<?=RACINE_SITE."film_description.php?id_film=".$film['id_film']?>" class="btn ">Voir Plus</a>                            
                    <!-- Pour afficher le film en quetion on rajoute l'id du film dans le chemin du bouton donc on trasmet la donnée via la variable$_GET-->
                    <!-- Pour afficher le film en vas utiliser la même page: on vas cachéer la div avec la totalité des film et on affiche celle avec un seul film, on vas le faire en JS -->
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
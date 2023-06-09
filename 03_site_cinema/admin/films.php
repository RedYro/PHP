<?php
    $title = "Films";
    require_once("../inc/functions.inc.php");
    require_once("../inc/header.inc.php");
    if(empty($_SESSION['user'])){
        header('location:'.RACINE_SITE.'authentification.php');
        // exit;
    }
    if($_SESSION['user']['role'] == 'ROLE_USER'){
        header('location:'.RACINE_SITE.'profil.php');
    }
    $films = allFilm();
?>

<div class="d-flex flex-column m-auto mt-5">
    <h2 class="text-center fw-bolder mb-5 text-danger">Liste films</h2>
    <a href="gestion.php" class="btn align-self-end">Ajouter film</a>
    <table class="table table-dark table-bordered mt-5" style="box-shadow: -1px -1px 10px 0px #EFE8E8;">
        <thead>
            <tr class="fw-bolder fs-3">
                <th class="text-center">ID</th>
                <th class="text-center">Titre</th>
                <th class="text-center">Affiche</th>
                <th class="text-center">Réalisateur</th>
                <th class="text-center">Acteurs</th>
                <th class="text-center">Âge limite</th>
                <th class="text-center">Genre</th>
                <th class="text-center">Durée</th>
                <th class="text-center">Prix</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Synopsis</th>
                <th class="text-center">Date de sortie</th>
                <th class="text-center">Supprimer</th>
                <th class="text-center">Modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($films as $key => $film){
                    // debug( $film);
                    // Avant affichage des données, formatage 
                    $actors = stringToArray($film['actors']); // Transformation de la chaîne de caractères récupérer à partir de $film['actors'] du tableau $film en un tableau avec la fonction "stringToArray()"
                    // catégorie du film
                    $category = showCategory($film['category_id']);
                    $categoryName = $category['name'];
                    // Gestion affichage "duration"
                    $date_time = new DateTime($film['duration']); // Création d'un nouvel objet "DateTime" en passant la valeur de l'input de type "time" en tant que paramètre
                    $duration = $date_time->format('H:i'); // Utilisation de la méthode format() pour extraire l'heure et les minutes au format 'H:i'
                    // debug($actors);
            ?>
            <tr>
                <td><?=$film['id_film']?></td>
                <td><?=$film['title']?></td>
                <td><img src="<?=RACINE_SITE."assets/".$film['image']?>" alt="Affiche du film" class="img-fluid"></td>
                <td><?=$film['director']?></td>
                <td><ul><?php
                    for ($i=0; $i < count($actors); $i++){ 
                        echo "<li>".$actors[$i]."</li>";   
                    }
                ?></ul></td>
                <td><?=$film['ageLimit']?></td>
                <td><?=$categoryName?></td>
                <td><?=$duration?></td>
                <td><?=$film['price']?></td>
                <td><?=$film['stock']?></td>
                <td><?=substr($film['synopsis'], 0, 70)?> ...</td>
                <td><?=$film['date']?></td>
                <td class="text-center"><a href="gestion.php?action=delete&id_film=<?=$film['id_film']?>"><i class="bi bi-trash3-fill"></i></a></td>
                <td class="text-center"><a href="gestion.php?action=update&id_film=<?=$film['id_film']?>"><i class="bi bi-pencil-fill"></i></a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

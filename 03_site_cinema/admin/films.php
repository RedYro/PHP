<?php
    $title = "Films";
    require_once("../inc/functions.inc.php");
    require_once("../inc/header.inc.php");
    $films = allFilm();
?>

<div class="d-flex flex-column m-auto mt-5">
    <h2 class="text-center fw-bolder mb-5 text-danger">Liste films</h2>
    <a href="gestion.php" class="btn align-self-end">Ajouter film</a>
    <table class="table table-dark table-bordered mt-5 ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Affiche</th>
                <th>Réalisateur</th>
                <th>Acteurs</th>
                <th>Âge limite</th>
                <th>Genre</th>
                <th>Durée</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Synopsis</th>
                <th>Date de sortie</th>
                <th>Supprimer</th>
                <th>Modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($films as $key => $film){
                    // Avant affichage des données, formatage 
                    $actors = stringToArray($film['actors']); // Transformation de la chaîne de caractères récupérer à partir de $film['actors'] du tableau $film en un tableau avec la fonction "stringToArray()"
                    // catégorie du film
                    $category = showCategory($film['category_id']);
                    $categoryName = $category['name'];
                    // Gestion affichage "duration"
                    $date_time = new DateTime($film['duration']); // Création d'un nouvel objet "DateTime" en passant la valeur de l'input de type "time" en tant que paramètre
                    $duration = $date_time->format('H:i'); // Utilisation de la méthode format() pour extraire l'heure et les minutes au format 'H:i'

            ?>
            <tr>
                <td><?=$film['id_film']?></td>
                <td><?=$film['title']?></td>
                <td><img src="<?=RACINE_SITE."assets/".$film['image']?>" alt="Affiche du film"></td>
                <td><?=$film['title']?></td>
                <td><?=$film['title']?></td>
                <td><?=$film['title']?></td>
                <td><?=$film['title']?></td>
                <td><?=$film['title']?></td>
                <td><?=$film['title']?></td>
                <td><?=$film['title']?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
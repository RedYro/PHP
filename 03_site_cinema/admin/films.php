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
                <th>Àge limite</th>
                <th>Genre</th>
                <th>Durée</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Synopsis</th>
                <th>Date de sortie</th>
                <th>Supprimer</th>
                <th> Modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($films as $key => $film){
                    // Avant affichage des données, formatage 
                    $actors = stringToArray($film['actors']);
            ?>
            <tr>
                <td><?=$actors?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
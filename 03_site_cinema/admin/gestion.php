<?php
    $title = "Gestion / Film";
    require_once("../inc/functions.inc.php");
    require_once("../inc/header.inc.php");
?>

<h2 class="text-center fw-bolder mb-5 text-danger">Ajouter un film</h2>
<form action="" method="post" enctype="multipart/form-data" class="back">
    <!-- "enctype" spécifie que le formulaire envoie des fichiers en plus des données "text" : permet d'uploader un fichier (image etc.) => obligatoire pour faire cela -->
    <div class="row">
        <div class="col-md-6 mb-5">
            <label for="title">Titre du film</label>
            <input type="text" name="title" id="title" class="form-control"> 
            <!-- "name" => lien avec DB (PHP) -->
        </div>
        <div class="col-md-6 mb-5">
            <label for="iamge">Photo</label>
            <input type="file" name="iamge" id="image">
            <!-- "type=file" ne pas oublier attribut enctype="multipart/form-data" dans la balise form -->
        </div>
    </div>
    <div class="row">                         
        <div class="col-md-6 mb-5">
            <label for="director">Réalisateur</label>
            <input type="text" class="form-control" id="director" name="director">
        </div>
        <div class="col-md-6">
            <label for="actors">Acteur(s)</label>
            <input type="text" class="form-control" id="actors" name="actors"  placeholder="séparez les noms d'acteurs avec un /">
        </div>   
    </div>
    <div class="row">
        <!-- raccourci bs5 select multiple -->
        <div class="mb-3">
            <label for="ageLimite" class="form-label">Age limite</label>
            <select multiple class="form-select form-select-lg" name="ageLimite" id="ageLimite">
                <option value="10" >10</option>
                <option value="13" >13</option>
                <option value="16" >16</option>
            </select>
        </div>
    </div>
    <div class="row">
        <label for="categories">Genre film</label>
        <?php
            $categories = allCategories();
            foreach ($categories as $key => $category){
        ?>
        <div class="form-check col-sm-12 col-md-4">
            <input class="form-check-input" type="radio" name="categories" id="categories" value="<?=$category['name']?>">
            <label class="form-check-label" for="categories"><?=$category['name']?></label>
        </div>
        <?php
            }
        ?>
    </div>
    <div class="row">
        <div class="col-md-6 mb-5">
            <label for="duration">Durée film</label>
            <input type="time" class="form-control" id="duration" name="duration">
        </div>
        <div class="col-md-6 mb-5">
            <label for="date">Date sortie</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-5">
            <label for="price">Prix</label>
            <div class=" input-group">
                <input type="text" class="form-control" id="price" name="price" aria-label="Euros amount (with dot and two decimal places)">
                <span class="input-group-text">€</span>
            </div>
        </div>
        <div class="col-md-6">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" min ="0"> <!-- Pas de stock négatif donc on rajoute min="0" -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="synopsis">Synopsis</label>
            <textarea type="text" class="form-control" id="synopsis" name="synopsis" rows="10"></textarea>
        </div>
    </div>
    <div class="row justify-content-center">
        <button type="submit" class="btn btn-danger p-3 w-25">Ajouter Film</button>
    </div>
</form>
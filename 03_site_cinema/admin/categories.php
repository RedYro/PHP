<?php
    $title = "Categories";
    // require_once("../inc/functions.inc.php");
    // require_once("../inc/header.inc.php");
?>
<div class="row mt-5">
    <div class="col-sm-12 col-md-6 mt-5">
        <h2 class="text-center fw-bolder text-danger">Gestion des catégories</h2>
        <form action="" method="" class="back">
            <div class="row">
                <div class="col-md-8 mb-5">
                    <label for="name">Nom de la catégorie</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-5">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="submit" id="description">Ajouter catégorie</button>
            </div>
        </form>
    </div>
</div>
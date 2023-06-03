<?php
    $title = "Categories";
    require_once("../inc/functions.inc.php");
    require_once("../inc/header.inc.php");

        if(isset($_GET['action']) && isset($_GET['id_category'])){
            // Suppression catégories // 
            if(!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id_category'])){
                $idCategory = htmlentities($_GET['id_category']);
                deleteCategory($idCategory);
                header("location:dashboard.php?categories_php");
            } else if(!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id_category'])){
            // Update catégories //
                $idCategory = htmlentities($_GET['id_category']);
                $category = showCategory($idCategory);
            } else{
                header("location:dashboard.php?categories_php");
            }
        }

    //--------------------------
    // La superglobale $_POST
    //---------------------------

    // debug($_POST); 
    /*
    $_POST est une superglobal qui permet de récupérer les données saisies dans un formulaire.

        //  Comme il s'agit d'une superglobale, $_POST est donc un tableau (array), et il est disponible dans tous les contextes du script, y compris au sein des fonctions (pas besoin de faire "global"$_POST").
        Le tableau $_POST se remplit de la manière suivante :
        $_POST = array(
            'name1' => 'valeur1',
            'nameN => 'valeurN'
        );
        où les "name1"  et "nameN" correspondent aux attributs "name" du formulaire, et où "valeur1" et "valeurN" correspondent aux valeurs saisies par l'internaute.
    */

    $info = ""; // Variable qui recevra les messages d'alerte, déclaration dans le script en général avec une valeur vide pour ne pas engendrer d'erreur sur la page 

    if(!empty($_POST)){ // petit rappel : empty() vérifie si une variable est vide :  0, '', NULL, false // avec !empty() on vérifie si la superglobal est n'est pas vide // si $_POST n'est pas vide , c'est que $_POST est rempli, donc que le formulaire a été envoyé. Notez que l'on peut l'envoyer avec des champs vides, les valeurs de $_POST étant alors des strings vides.
        // Vérification de tous les champs récupérés avec $_POST
        $verif = true; // Variable servant à vérifier si les champs sont remplis, (déclaration en "true")
        foreach($_POST as $key => $values){ // boucle pour vérifier le tableau $_POST
            if(empty(trim($values))){ // Si valeurs => vides ou valeur => vide; $verif = false
                $verif = false;
            }
        }
        if(!$verif){ // Vérification de la valeur final de $verif // Si $verif = false => stockage message erreur dans $info
            $info = alert("Tous les champs sont requis", "danger");
        } else{
            // Si tout est renseigné, commencement validation des champs
            // Stockage valeurs dans variables en vérifiant qu'il n'y a pas de chaînes de caractères vides
            $nameCategory = trim($_POST['name']);
            $descriptionCategory = trim($_POST['description']);

            // Validation des données
            if(strlen($nameCategory) < 3 || preg_match('/[0-9]+/', $nameCategory)){
                // Expression régulière [0-9]+ recherche une séquence d'un ou plusieurs chiffres dans la chaîne de caractères, fonction preg_match() renvoie 1 si la correspondance est trouvé sinon elle renvoie 0 
                $info = alert("Champs \"nom\" de la catégorie invalide", "danger");
            }
            if(strlen($descriptionCategory) < 50){
                $info .= alert("Champs \"description\" de la catégorie invalide, veuillez renseigner davantage d'informations", "danger");
            }
            if(empty($info)){
                $nameCategory = strip_tags($nameCategory);
                $descriptionCategory = strip_tags($descriptionCategory);
                if(!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id_category'])){
                    $idCategory = htmlentities($_GET['id_category']);
                    updateCategory($idCategory, $nameCategory, $descriptionCategory); // Mise à jour avec fonction updateCategory()
                    header("location:dashboard.php?categories_php");
                } else{
                    addCategory($nameCategory, $descriptionCategory);
                    header("location:dashboard.php?categories_php"); // méthode permettant d'envoyer des requêtes HTTP donc rafraîchie et supprime les données enregistrées
                }
            }
        }
    }
?>
<div class="row mt-5" style="padding-top: 8rem;">
    <div class="col-sm-12 col-md-6 mt-5">
        <h2 class="text-center fw-bolder text-danger">Gestion des catégories</h2>
        <?php
            echo $info; // Pour afficher les messages
        ?>
        <form action="" method="post" class="back">
            <div class="row">
                <div class="col-md-8 mb-5">
                    <label for="name" class="text-light">Nom de la catégorie</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?=$category['name'] ?? '';?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-5">
                    <label for="description" class="text-light">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"><?=$category['description'] ?? '';?></textarea>
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="submit" id="description" class="btn btn-danger p-3"><?=(isset($category)) ? 'Modifier catégorie' : 'Ajouter catégorie'?></button>
            </div>
        </form>
    </div>
    <div class="col-sm-12 col-md-6 d-flex flex-column mt-5 pe-3">  
        <!-- tableau pour afficher toutes les catégories avec des boutons de suppression et de modification -->
        <h2 class="text-center fw-bolder mb-5 text-danger">Liste des catégories</h2>
        <?php
            $categories = allCategories(); // Récupération des catégories de la DB et stockage de celles-ci dans une variable
            // debug($categories);
        ?>
        <table class="table table-dark table-bordered" style="box-shadow: -1px -1px 10px 0px #EFE8E8;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // fetch() se passe dans la fonctions "allCategories()", on boucle sur le tableau avec "foreach()"S
                    foreach($categories as $key => $category){
                        // Récupération des valeurs dans le tableau $category dans les "td"
                ?>
                <tr>
                    <td><?=$category['id_category']?></td>
                    <td><?=html_entity_decode(ucfirst($category['name']))?></td>
                    <td><?=substr(html_entity_decode(ucfirst($category['description'])), 0, 40)."..."?></td>
                    <td class="text-center"><a href="categories.php?action=delete&id_category=<?=$category['id_category']?>"><i class="bi bi-trash3-fill"></i></a></td>
                    <td class="text-center"><a href="categories.php?action=update&id_category=<?=$category['id_category']?>"><i class="bi bi-pencil-fill"></i></a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
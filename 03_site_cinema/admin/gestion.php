<?php
    $title = "Gestion / Film";
    require_once("../inc/functions.inc.php");
    if(empty($_SESSION['user'])){
        header('location:'.RACINE_SITE.'authentification.php');
        // exit;
    }
    if($_SESSION['user']['role'] == 'ROLE_USER'){
        header('location:'.RACINE_SITE.'profil.php');
    }

    if(isset($_GET['action']) && isset($_GET['id_film'])){
        // Suppression catégories // 
        if(!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id_film'])){
            $idFilm = htmlentities($_GET['id_film']);
            deleteFilm($idFilm);
            header("location:dashboard.php?films_php");
        } else if(!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id_film'])){
        // Update catégories //
            $idFilm = htmlentities($_GET['id_film']);
            $film= showFilm($idFilm);
            // debug($film);
            // header("location:dashboard.php?films_php");
        } else{
            header("location:dashboard.php?films_php");
        }
    }

    // $_POST => ne prends pas en compte les champs de type "file"
    // $_FILES => permet de prendre en compte les champs de type "file" 

    $info = ""; // Variable qui recevra les messages d'alerte, déclaration dans le script en général avec une valeur vide pour ne pas engendrer d'erreur sur la page 

    if(!empty($_POST)){
        $verif = true;
        foreach($_POST as $key => $value){
            if(empty(trim($value))){
                $verif = false;
            }
        }
        // superglobale "$_FILES" a un indice "image" qui correspond au "name" de l'input type="file" du formulaire, ainsi qu'un indice "name" qui contient le nom du fichier en cours de téléchargement.
        if(!empty($_FILES['image']['name'])){ // si le nom du fichier en cours de téléchargement n'est pas vide, alors c'est qu'on est en train de télécharger une photo
            $image = 'img/'.$_FILES['image']['name']; // $image contient le chemin relatif de la photo et sera enregistré en BDD. On utilise ce chemin pour les "src" des balises <img>.
            copy($_FILES['image']['tmp_name'], '../assets/'. $image);
            // enregistrement du fichier image qui se trouve à l'adresse contenue dans $_FILES['image']['tmp_name'] vers la destination qui est le dossier "img" à l'adresse "../assets/nom_du_fichier.jpg".
        }
        if(!$verif || empty($image)){ // vérification de la valeur final de la variable $verif et de la valeur de la variable $image : si $verif est false ou $image est vide je stock un message d'erreur dans $info
            $info = alert("Tous les champs sont requis", "danger");
        } else{
            //si tout est renseigné je commence la validation des champs
            /* on vérifie l'image : 
            // $_FILES['image']['name'] Nom
            // $_FILES ['image']['type'] Type
            // $_FILES ['image']['size'] Taille
            // $_FILES ['image']['tmp_name'] Emplacement temporaire
            // $_FILES ['image']['error'] Erreur si oui/non l'image a été réceptionné */

            if($_FILES['image']['error'] != 0 || $_FILES['image']['size'] == 0 || !isset($_FILES['image']['type'])){
                $info .= alert("Image non valide", "danger");
            }
            $titleFilm = trim($_POST['title']);
            $director = trim($_POST['director']);
            $actors = trim($_POST['actors']);
            $duration = trim($_POST['duration']);
            $synopsis= trim($_POST['synopsis']);
            $dateSortie = trim($_POST['date']);
            $price = trim($_POST['price']);
            $stock = trim($_POST['stock']);
            $ageLimit = trim($_POST['ageLimit']);
            $category = trim($_POST['categories']);
            if(strlen($director) < 10 || preg_match('/[0-9]+/', $director)){
                // longueur > 1 / 
                $info .= alert("Champ Réalisateur non valide", "danger");
            }
            //Explications: 
                //    .* : correspond à n'importe quel nombre de caractères (y compris zéro caractère), sauf une nouvelle ligne.
                //     \/ : correspond au caractère /. Le caractère / doit être précédé d'un backslash \ car il est un caractère spécial en expression régulière. Le backslash est appelé caractère d'échappement et il permet de spécifier que le caractère qui suit doit être considéré comme un caractère ordinaire.
                //     .* : correspond à n'importe quel nombre de caractères (y compris zéro caractère), sauf une nouvelle ligne.
            if(strlen($actors) < 10 || preg_match('/[0-9]+/', $actors) || !preg_match('/.*\/.*/', $actors)){ // valider que l'utilisateur a bien inséré le symbole '/' : chaîne de caractères qui contient au moins un caractère avant et après le symbole /.
                // longueur > 1 / 
                $info .= alert("Champ Réalisateur non valide", "danger");
            }
            if(strlen($synopsis) < 50){ 
                $info .= alert("Le résumé doit faire plus de 50 caractères", "danger");
            }
            if(!is_numeric($price)){
                $info .= alert("Le prix n'est pas valide", "danger");
            }
            // S'il n'y aucune erreur sur le formulaire
            if(empty($info)){
                $titleFilm = htmlentities($titleFilm);
                $director = htmlentities($director);
                $actors = htmlentities($actors);
                $ageLimit = htmlentities($ageLimit);
                $duration = htmlentities($duration);
                $synopsis = htmlentities($synopsis);
                $category = htmlentities($category); // $category => récupération du nom de la catégorie avec le btn radio 
                $price = (float) htmlentities($price); // conversion de la valeur de la variable "$price" en "float"
                $stock = (int) htmlentities($stock); // conversion de la valeur de la variable "$stock" en "int"
                $dateSortie = htmlentities($dateSortie);
                // Pour index "category" superglobal "$_POST", récupération de "id_category" afin de l'insérer dans la table "films"
                $idCategory = idCategory($category); // Récupération avec fonction "idCategory()" d'un tableau avec un seul élément qui contient l'id de la catégorie choisie
                $category_id = $idCategory['id_category'];
                // $result = addFilm($title, $director, $actors, $ageLimit, $category_id, $duration, $dateSortie, $synopsis, $image, $price, $stock);// insertion d'un film avec la fonction addFilm() créée dans le fichier fonctions.php
                if(isset($_GET['action']) && $_GET['action']=='update' && isset($_GET['id_film']) && !empty($_GET['id_film'])){ // je vérifie l'action dans l'url et l'id 
                    $idFilm = htmlentities($film['id_film']);
                    $result = updateFilm($idFilm,$titleFilm,$director,$actors,$ageLimit,$category_id,$duration,$dateSortie,$synopsis,$image,$price,$stock);   // j'effectue la modification avec la fonction updateFilm() créé dans le fichier des fonctions
                    // header("location:dashboard.php?films_php");
                }else{
                    $result = addFilm($titleFilm,$director,$actors,$ageLimit,$category_id,$duration,$dateSortie,$synopsis,$image,$price,$stock);// j'insére mon film avec la fonction addFilm() créée dans le fichier fonctions.php  
                    // header("location:dashboard.php?films_php");
                }
                // header("location:dashboard.php?films_php");
            }
        }
    }
    require_once("../inc/header.inc.php");
?>
<main style="background:url(<?=RACINE_SITE?>assets/img/LoL_Wild_Rift.jpg) no-repeat; background-size: cover; background-attachment: fixed;">
    <h2 class="text-center fw-bolder mb-5 text-danger"><?=(isset($film)) ? 'Modifier film' : 'Ajouter film'?></h2>
    <?php
        echo $info;
    ?>
    <form action="" method="post" enctype="multipart/form-data" class="back">
        <!-- "enctype" spécifie que le formulaire envoie des fichiers en plus des données "text" : permet d'uploader un fichier (image etc.) => obligatoire pour faire cela -->
        <div class="row">
            <div class="col-md-6 mb-5">
                <label for="title">Titre du film</label>
                <input type="text" name="title" id="title" class="form-control" value="<?=$film['title'] ?? '';?>"> 
                <!-- "name" => lien avec DB (PHP) -->
            </div>
            <div class="col-md-6 mb-5">
                <label for="iamge">Photo</label>
                <input type="file" name="image" id="image" value="<?=RACINE_SITE."assets/".$film['image'] ?? '';?>">
                <!-- "type=file" ne pas oublier attribut enctype="multipart/form-data" dans la balise form -->
            </div>
        </div>
        <div class="row">                         
            <div class="col-md-6 mb-5">
                <label for="director">Réalisateur</label>
                <input type="text" class="form-control" id="director" name="director" value="<?=$film['director'] ?? '';?>">
            </div>
            <div class="col-md-6">
                <label for="actors">Acteur(s)</label>
                <input type="text" class="form-control" id="actors" name="actors" placeholder="séparez les noms d'acteurs avec un /" value="<?=$film['actors'] ?? '';?>">
            </div>   
        </div>
        <div class="row">
            <!-- raccourci bs5 select multiple -->
            <div class="mb-3">
                <label for="ageLimit" class="form-label">Âge limite</label>
                <select multiple class="form-select form-select-lg" name="ageLimit" id="ageLimit">
                    <option value="10" <?php if(isset($film['ageLimit']) && $film['ageLimit'] == 10) echo 'selected'?>>10</option>
                    <option value="13" <?php if(isset($film['ageLimit']) && $film['ageLimit'] == 13) echo 'selected'?>>13</option>
                    <option value="16" <?php if(isset($film['ageLimit']) && $film['ageLimit'] == 16) echo 'selected'?>>16</option>
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
                <input class="form-check-input" type="radio" name="categories" id="categories" value="<?=$category['name']?>" <?php if(isset($film['category_id']) && $film['category_id'] == $category['id_category'])echo 'checked';?>>
                <label class="form-check-label" for="categories"><?=$category['name']?></label>
            </div>
            <?php
                }
            ?>
        </div>
        <div class="row">
            <div class="col-md-6 mb-5">
                <label for="duration">Durée film</label>
                <input type="time" class="form-control" id="duration" name="duration" value="<?=$film['duration'] ?? '';?>">
            </div>
            <div class="col-md-6 mb-5">
                <label for="date">Date sortie</label>
                <input type="date" name="date" id="date" class="form-control" value="<?=$film['date'] ?? '';?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-5">
                <label for="price">Prix</label>
                <div class=" input-group">
                    <input type="text" class="form-control" id="price" name="price" aria-label="Euros amount (with dot and two decimal places)" value="<?=$film['price'] ?? '';?>">
                    <span class="input-group-text">€</span>
                </div>
            </div>
            <div class="col-md-6">
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control" min ="0" value="<?=$film['stock'] ?? '';?>"> <!-- Pas de stock négatif donc on rajoute min="0" -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="synopsis">Synopsis</label>
                <textarea type="text" class="form-control" id="synopsis" name="synopsis" rows="10"><?=$film['synopsis'] ?? '';?></textarea>
            </div>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-danger p-3 w-25">Ajouter Film</button>
        </div>
    </form>
</main>
<?php
    require_once("../inc/footer.inc.php");
?>
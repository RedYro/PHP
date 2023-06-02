<?php
    $title = "Back-office";
    require_once("../inc/functions.inc.php");
    require_once("../inc/header.inc.php");
?>
<main>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-2">
            <div class="d-flex flex-column p-3 text-bg-dark sidebarre">
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="?dashboard_php" class="nav-link text-light">Back-office</a>
                    </li>
                    <li>
                        <a href="?films_php" class="nav-link text-light">Films</a>
                    </li>
                    <li>
                        <a href="?categories_php" class="nav-link text-light">Catégories</a>
                    </li>
                    <li>
                        <a href="?users_php" class="nav-link text-light">Utilisateurs</a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <?php
            if(isset($_GET['dashboard_php'])){
        ?>
        <div class="w-50 m-auto">
            <h2>Bonjour Yro</h2>
            <p>Bienvenue sur le Back-office</p>
            <img src="<?=RACINE_SITE?>assets/img/Red_Test_v1.png" alt="Affiche films back-office" width="500" height="800" class="dashboard-img">
        </div>
        <?php
            }
        ?>
        <div class="col-sm-12">
            <?php
                /*
                 * $_GET représente les données qui transitent par l'URL, c'est une superglobal et comme toutes autres superglobal c'est un tableau(array)
                 * "superglobal" signifie que cette variable est disponible partout dans le script y compris au sein des fonctions
                 * Transition des informations dans l'URL selon la syntaxe suivante : 
                 *  - exemple : page.php?indice1=valeur1&indice2=valeur2&indiceN=valeurN
                 * Quand on réceptionne les données, $_GET est remplit selon le schéma suivant :
                 *  $_GET = array(
                 *      'indice1' => 'valeur1',
                 *      'indice2' => 'valeur2',
                 *      'indiceN' => 'valeurN',
                 * )
                 */
                if(!empty($_GET)){ // Si la variable "$_GET" n'est pas vide cela veut dire que l'on a cliqué sur un lien de la side barre, l'index de "$_GET" change selon le lien indiqué dans les balises "a"
                    if(isset($_GET['films_php'])){
                        require_once("films.php"); // Si index films_php existe dans $_GET, on appel le fichier films.php
                    } else if(isset($_GET['categories_php'])){
                        require_once("categories.php"); // Si index categories_php existe dans $_GET, on appel le fichier categories.php
                    } else if(isset($_GET['users_php'])){
                        require_once("users.php"); // Si index users_php existe dans $_GET, on appel le fichier users.php
                    } else{
                        require_once("dashboard.php"); // Si index dashboard_php existe dans $_GET, on appel le fichier dashboard.php
                    }
                }
            ?>
        </div>
    </div>
</main>
<?php
    require_once("../inc/footer.inc.php");
?>
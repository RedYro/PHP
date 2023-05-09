<?php
    $title = "Tableaux";
    $titleH1 = "Tableaux en PHP";
    $paragraphe = "Hello World !";
    require_once ("inc/header.inc.php");
?>

<main class="container px-5 border">
    <div class="row">
        <h2 class="text-center my-5">Déclaration de tableaux</h2>
        <div class="col-sm-12 col-md-6 mt-5">
            <h3 class="text-primary text-center">Méthode 1</h3>
            <p>La première façon pour déclarer un tableau c'est d'utiliser la fonction "<span>array()</span>" <br> <code>$tableau = array('valeur1', 'valeur2', 'valeur3', 'valeur4');</code></p>
        </div>
        <div class="col-sm-12 col-md-6 mt-5">
            <h3 class="text-primary text-center">Méthode 2</h3>
            <p>La deuxième façon de déclarer un tableau est d'utiliser la syntaxe courte avec les crochets "<span>[ ]</span>" <br> <code>$tableau = ['valeur1', 'valeur2', 'valeur3', 'valeur4'];</code></p>
        </div>
    </div>
    <div class="row">
        <h2 class="text-center my-5">Affichage des éléments d'un tableau</h2>
        <div class="col-sm-12">
            <ul>
                <li>Pour afficher une valeur du tableau, on utilise son indice dans des "<span>[ ]</span>" après le nom du tableau : 
                <?php 
                    // Déclaration d'un tableau
                    $liste1 = array('Laurence', 'Grégory', 'Choaib', 'Maryam', 'Mana');
                    // echo $liste1; // Erreur de type 'Array to string conversion' car on ne peut pas afficher directement un tableau
                    echo '<pre>';
                    var_dump($liste1); // Affiche les valeurs du tableau avec les types 
                    echo '</pre>';
                    // On entoure le "var_dump()" avec des balises "<pre>" afin de garder un format lisible 
                    /*
                    * "var_dump()" renvoie toutes les informations sur ce qui se trouve dans les variables 
                    * Il donne en premier lieu le type de la variable et si c'est un tableau, le nom des éléments connus 
                    *  - Les éléments avec leur types et leur longueur
                    * Cette fonction de debug sera utile pour vérifier si l'on a bien récupérer les informations dans une variable. 
                    */
                    $liste2 = ['Laurence', 'Grégory', 'Choaib', 'Maryam', 'Mana'];
                    echo '<pre>';
                    var_dump($liste2);
                    echo '</pre>';
                ?> 
                </li>
                <li>Afficher "Bonjour Laurence" depuis votre PHP grâce à l'array crée :"</li>
                <?php 
                    echo "<p class=\"alert alert-sucess w-25\">Bonjour $liste1[0] !</p>";
                    echo "<p class=\"alert alert-sucess w-25\">Bonjour $liste2[1] !</p>";
                ?>
            </ul>
        </div>
    </div>
</main>

<?php
require_once ("inc/footer.inc.php");
?>
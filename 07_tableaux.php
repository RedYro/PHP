<?php
    $title = "Tableaux";
    $titleH1 = "Tableaux en PHP";
    $paragraphe = "Hello World !";
    require_once ("inc/header.inc.php");
?>

<main class="container px-5 border">
    <div class="row">
        <h2 class="text-center my-5">1- Déclaration de tableaux</h2>
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
        <h2 class="text-center my-5">2- Affichage des éléments d'un tableau</h2>
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
                    echo "<p class=\"alert alert-success w-25\">Bonjour $liste1[0] !</p>";
                    echo "<p class=\"alert alert-success w-25\">Bonjour $liste2[1] !</p>";
                ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <h2 class="text-center my-5">3- Tableau non prédéfini</h2>
        <div class="col-sm-12 col-md-6">
            <h3 class="text-primary text-center">Exemple de tableau non prédéfini</h3>
            <?php 
                $listePays[] = 'Angleterre';
                $listePays[] = 'Espagne';
                $listePays[] = 'France';
                $listePays[] = 'Portugal';
                echo '<pre>';
                var_dump($listePays);
                echo '</pre>';
            ?>
        </div>
        <div class="col-sm-12 col-md-6">
            <h3 class="text-primary text-center">Ajouter une valeur à la fin d'un tableau</h3>
            <?php 
                // Les crochets vides signifient qu'on ajoute une valeur à la fin du tableau 
                // Il existe des fonctions PHP pour ajouter des éléments dans un tableau
                $liste2[] = "Junior";
                echo '<pre>';
                var_dump($liste2);
                echo '</pre>'; 
            ?>
        </div>
    </div>
    <div class="row">
        <h2 class="text-center my-5">4 - Les catégories de tableaux en PHP</h2>
        <div class="col-sm-12">
            <p>Un tableau c'est une liste de couples "<span>clé / valeur</span>" :</p>
            <ul>
                <li>Si la clé est un entier, on parle de tableau indexé. La clé est appelée un index. Les index ne sont pas forcément des entiers consécutifs.</li>
                <li>Si la clé est une chaîne, on parle de tableau associatif.</li>
            </ul>
            <p class="alert alert-secondary">En PHP, comme dans tous les langages, il existe des tableaux à plusieurs dimensions. </p>
            <p class="alert alert-secondary"> Pour construire un tableau multidimensionnel on peut utiliser les deux types de tableaux, indexé ou associatif. </p>
            <p class="alert alert-secondary"> On peut faire un tableau à une seule dimension, dans lequel les clés vont être successivement des entiers puis des chaînes </p>
        </div>
        <div class="col-sm-12 col-md-6">
            <h3 class="text-primary text-center mt-5">Les tableaux indéxés</h3>
            <h4>1- Création d'un tableau avec "<span>indexation automatique</span>"</h4>
            <?php
                $tableau1 = ['Red', 'Blue', 'Purple'];
                // Le premier index commence à l'entier 0
                echo '<pre>';
                var_dump($tableau1);
                echo '</pre>'; 
            ?>
            <h4>2- Création d'un tableau avec "<span>indexation manuelle</span>"</h4>
            <p>Le tableau peut être crée manuellement élément par élément. Dans ce cas le, les indexes sont insérées manuellement. Il n'est pas obligatoire de commencer à l'entier 0. Les indexes peuvent être des entiers non consécutifs</p>
            <?php 
                $tableau2[3] = 'Orange';
                $tableau2[10] = 'Pink';
                $tableau2[14] = 'Black';
                echo '<pre>';
                var_dump($tableau2);
                echo '</pre>'; 
            ?>
        </div>
        <div class="col-sm-12 col-md-6">
            <h3 class="text-primary text-center mt-5">Les tableaux associatifs</h3>
            <?php
                $color1 = array(
                    'b' => 'blue',
                    'r' => 'red',
                    'p' => 'purple',
                );
                echo '<pre>';
                var_dump($color1);
                echo '</pre>'; 
                $color2 = [
                    'g' => 'gray',
                    'y' => 'yellow',
                    'o' => 'orange',
                ];
                echo '<pre>';
                var_dump($color2);
                echo '</pre>'; 
                
                // Pour afficher une valeur de notre tableau associatif : 
                echo 'La première couleur du tableau 1 est : ' . $color1['b'] . '<br>';
                echo "La deuxième couleur du tableau 1 est : {$color1['r']} <br>";
                echo "La troisème couleur du tableau 1 est : $color1[p] <br>"; // Quand un tableau associatif est écrit dans des guillemets ou des doubles quotes, il perd les quotes autour de son indice
                
            ?>
        </div>
        <div class="col-sm-12">
            <h3 class="text-primary text-center my-5">Les tableaux multidimensionnels</h3>
            <div class="row">
                <div class="col-sm-4">
                    <h4>1- Tableau multidimentionnel : "<span>1ère dimension : indéxé / 2ème dimension ; indéxé</span>"</h4>
                    <?php
                        $tableau_multi_1 = [
                            0 => [
                                0 => 'rouge',
                                1 => 'bleu', 
                                2 => 'violet',
                            ],
                            1 => [
                                0 => 'rose',
                                1 => 'violet', 
                                2 => 'beige',
                            ],
                            2 => [
                                0 => 'blanc',
                                1 => 'jaune', 
                                2 => 'noir',
                            ],
                        ];
                    echo '<pre>';
                    var_dump($tableau_multi_1);
                    echo '</pre>'; 
                    ?>
                </div>
                <div class="col-sm-4">
                    <h4>2- Tableau multidimensionnel : <span>1ère dimension : indexé / 2ème dimension : associatif</span></h4>
                    <?php 
                        $tableau_multi_2 = [
                            0 => [
                                'prenom' => 'Julien',
                                'nom' => 'Dupont',
                                'telephone' => '010000222'
                            ],
                            1 => [
                                'prenom' => 'Nicolas',
                                'nom' => 'Duront',
                                'telephone' => '070000223'
                            ],
                            2 => [
                                'prenom' => 'Pierre',
                                'nom' => 'Dulac',
                                'telephone' => '060000255'
                            ],
                        ];
                        echo '<pre>';
                        var_dump($tableau_multi_2);
                        echo '</pre>'; 
                    ?>
                </div>
                <div class="col-sm-4">
                    <h4>3- Tableau multidimensionnel : <span>1ère dimension : indexé / 2ème dimension : associatif</span></h4>
                    <?php 
                        $tableau_multi_3 = [
                            'Personne 1' => [
                                'prenom' => 'Julien',
                                'nom' => 'Dupont',
                                'telephone' => '010000222'
                            ],
                            'Personne 2' => [
                                'prenom' => 'Nicolas',
                                'nom' => 'Duront',
                                'telephone' => '070000223'
                            ],
                            'Personne 3' => [
                                'prenom' => 'Pierre',
                                'nom' => 'Dulac',
                                'telephone' => '060000255'
                            ],
                        ];
                        echo '<pre>';
                        var_dump($tableau_multi_2);
                        echo '</pre>'; 
                    ?>
                </div>
                <div class="col-sm-12">
                    <h4>4- Substitution d'un élément de tableau multidimensionnel dans une chaîne de caractères</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <?php
                                echo "<p>Nom de la personne 2 : {$tableau_multi_3['Personne 2']['nom']} </p>"
                                // On affiche la valeur de l'index "nom" du tableau "Personne 2" qui est l'index du tableau tableau_multi_3
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <p class="alert alert-danger">Afin de parcourir un tableau il faut utiliser une boucle</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h2 class="text-center my-5">5- Parcourir les tableaux grâce au boucles</h2>
        <div class="col-sm-12 col-md-6">
            <h3 class="text-primary text-center">Boucle "for"</h3>
            <ul>
                <li>La boucle for va permettre de parcourir un array, et d'en extraire les données pour les afficher sous la forme demandée.</li>
                <li>On utilise la boucle for dans les tableaux indexés</li>
                <li>L’utilisation de la boucle for dans le parcours d’une table nécessite le calcule de la taille du tableau à chaque itération.</li>
            </ul>
            <?php
                // Avec un tableau tableau unidimensionnel
                $listeFournitures = ['stylo', 'crayons de papier', 'surligneurs', 'feutres', 'règle'];
                echo '<pre>';
                var_dump($listeFournitures);
                echo '</pre>'; 
                
                echo "<p>Liste des fournitures : </p>";
                echo "<ul>";
                

                echo "</ul>";
            ?>
        </div>
    </div>
</main>
<?php
require_once ("inc/footer.inc.php");
?>
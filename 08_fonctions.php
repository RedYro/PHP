<?php
    $title = "Fonctions";
    $titleH1 = "Fonctions en PHP";
    $paragraphe = "Fonctions";
    require_once ("inc/header.inc.php");
?>
<main class="container px-5 border border-dark">
    <div class="row">
        <h2 class="mt-5">1 - Les fonctions prédéfinies </h2>
        <ul>
            <li> Une fonction prédéfine permet de réaliser un traitrement spécifique prédéterminé dans le language PHP</li>
        </ul>
        <div class="col-sm-12 mt-5">
            <h3 class="text-primary text-center mb-5">Les fonctions prédéfinies des chaînes de carcatères </h3>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <ul>
                        <!-- https://www.php.net/manual/en/function.rtrim.php -->
                        <li><span>substr()</span> : permet d'extraire une partie d'une chaîne de caractères</li>
                        <li><span>strpos()</span>: permet de récuperer la position d'un caractère dans une chaîne de caractères</li>
                        <li><span>strlen()</span> : permet de récupérer la taille d'une chaîne de carctères</li>
                        <li><span>substr_replace()</span> : permet de remplacer un segment de la chaîne</li>
                        <li><span>substr_ireplace()</span>: version insensible à la casse de str_replace()</li>
                        <li><span>str_contains()</span> : permet de vérifier si la chaîne contient un mot particulier</li>
                        <li><span>str_starts_with()</span> : permet de vérifier si une chaîne commence par une sous-chaîne donnée</li>                                   
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6">
                    <ul>
                        <li><span>str_ends_with()</span> : permet de vérifier si une chaîne se termine par une sous-chaîne donnée</li>
                        <li><span>trim()</span> : permet de supprimer les espaces avant et après une chaîne de caractères</li>
                        <li><span>strtolower()</span> : permet de retourner la chaîne en minuscule</li>
                        <li><span>strtoupper()</span> : permet de retourner la chaîne en majuscules</li>
                        <li><span>ucfirst()</span> : permet de mettre le premier caractère en majuscule. </li>
                        <li><span>lcfirst()</span> : permet de mettre le premier caractère en minuscule. </li>
                    </ul>
                </div>
            </div>
            <?php
                $myString = "Bonjour j'adore le PHP !";
                echo "$myString <br>";
                // Affiche d'un caractère d'une chaîne de caractères
                echo $myString[3] . '<br>'; // Affiche la lettre "j"
                // Modifier un caractère d'une chaîne de caractères
                $myString[0] = "b";
                echo $myString[0] . '<br>'; // Changement de la lettre "B" majuscule en "b" minuscule
                // Extraire une partie d'une chaîne de caractères
                $newString = substr($myString, 0, 9); // Cette fonction prend en paramètres la variable, le point de départ et la longueur que l'on souhaite obtenir
                echo "$newString <br>"; 
                // Les caractères spéciaux tels que "é" ou "è" comptent comme 2 /!\
                // Exercice : Récupérer une partie du texte de l'indice 0 jusqu'à 40 et remplacer la avec le code suivant : ...<a href="#">Lire la suite</a> //
                $texte = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus, rerum quis doloremque doloribus ex omnis iure pariatur velit voluptatibus reprehenderit. Repudiandae sed harum explicabo, dolor eius eaque error quibusdam esse!
                Voluptatem nobis enim architecto nesciunt perferendis dignissimos, excepturi aspernatur commodi distinctio eum, modi at dolores esse, consequatur quis rerum cum beatae. Recusandae ducimus eos nesciunt eius facilis cumque ut molestiae!
                Ex a voluptatum corporis repudiandae neque molestiae consequatur in ratione dicta ad laudantium, officiis quisquam velit cum ab assumenda officia fugiat tenetur, soluta dignissimos corrupti natus voluptates. Blanditiis, sapiente numquam.
                Blanditiis minus illum magni ad architecto ex pariatur mollitia eos iusto neque necessitatibus, officiis voluptas consequatur possimus. Inventore ipsam nam voluptas, quasi dolores harum ullam, consequuntur, illum quas mollitia ab?";
                $newText = substr($texte, 0, 40);
                // $newText2 = "...<a href=\"#\">Lire la suite</a>";
                echo "<p>$newText...<a href=\"#\">Lire la suite</a></p>";
                // /!\ Attention les espaces sont comptés comme des caractères dans la chaîne
                // $newText3 = substr_replace($texte, '...<a href="#">Lire la suite</a>', 0, 40);
                // echo $newText3

                // Récupérer la position d'un caratère dans une chaîne de caractères 
                echo "La position de la lettre \"H\" dans la phrase est : " . strpos($myString, "H") ."<br>"; // Position H = 19
                // /!\ Attention la fonction est case sensitive, elle fait attention à la casse des lettres : si l'on met la lettre "h" en minuscule rien ne s'affichera
                // var_dump(strpos($myString,"H"));
                
                // Récupérer la taille d'une chaîne de caratères
                echo strlen($myString) . "<br>";

                // Remplacer une partie de la chaîne
                $myString = str_replace('PHP', 'JS', $myString); // Paremètres de la fonction : chaîne de caratères à changer, chaîne de caratères de remplacement et la variable à manipuler
                echo "$myString <br>";
                // Ici aussi la fonction est sensible à la casse, on ne change pas la valeur si il y a une différence entre la valeur cherchée et stockée
                // Il existe une autre fonction qui ne fait pas de distinction entre les lettres majuscules et minuscules dans les chaîne de caractères
                $myString = str_ireplace('BONJOUR', 'Hello', $myString);
                echo "$myString <br>"; 

                // Vérifier si la chaîne contient un mot particulier 
                var_dump(str_contains($myString, 'JS')); // Paramètres : variable contenant la chaîne, mot à vérifier dans la variable
                // str_contains() permet de vérifier si la chaîne contient un mot en particulier, cependant elle est sensible à la casse
                // résultat en boolean "true" ou "false"
                echo "<br>";

                // Vérifier si la chaîne commence par ce que l'on passe dans les paramètres
                var_dump(str_starts_with($myString, 'Hel')); // sensible à la casse // Permet de vérifier si la chaîne commence par un mot insérer en 2ème paramètre
                echo "<br>";

                // Vérifier si la chaîne se termine par ce que vous lui passez dans les paramètres 
                var_dump(str_ends_with($myString, '!')); // sensible à la casse // Permet de vérifier si la chaîne se termine par un mot insérer en 2ème paramètre
                echo "<br>";

                // Supprimer les espaces en début et fin de chaîne
                $testString = "!        Une phrase beaucoup trop longue avec des espaces inutiles au début et à la fin      !";
                echo "$testString <br>";
                echo strlen($testString) . " : Nombre de caractères <br>";

                $newTrim = trim($testString);
                echo "$newTrim <br>";
                echo strlen($newTrim) . " : Nombre de caractères <br>";
                $newTrim = trim($testString, '!');
                echo "$newTrim <br>";

            ?>
        </div>
        <div class="col-sm-12 mt-5">
            <h3 class="text-primary text-center mb-5">Les fonctions prédéfinies des tableaux </h3>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <ul>
                        <li><span>array_push()</span> : permet d'ajouter plusieurs valeurs à la fin d'un tableau</li>
                        <li class="alert alert-warning">Si on veut ajouter une seule valeur à la fin on utilise la syntaxe : <strong>$tableau[] = valeur_à_ajouter</strong> </li>
                        <li><span>array_unshift</span>: permet d'ajouter une valeur au début d'un tableau</li>
                        <li><span>array_pop</span>: permet de supprimer la dernière valeur d'un tableau</li>
                        <li><span>array_shift</span>: permet de supprimer la première valeur d'un tableau</li>
                        <li><span>unset()</span>: permet de supprimer un élément d'un tableau</li>
                        <li><span>shuffle</span>: permet de mélanger et réorganiser un tableau</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6">
                    <ul>
                        <li><span>array_chunk</span>: permet de diviser un tableau en plusieurs parties et avec un nombre de valeurs à définir</li>
                        <li><span>count() / sizeof()</span> : permet de retourner la taille du tableau passée en paramètre.</li>
                        <li><span>in_array()</span>: permet de vérifier qu'une valeur est présente dans un tableau.</li>
                        <li><span>array_key_exists()</span> : permet de vérifier si une clé existe dans un tableau.</li>
                        <li><span>explode()</span> : permet de transformer une chaîne de caractères en tableau</li>
                        <li><span>implode()</span> : permet de transformer un tableau en chaîne de caractères.</li>
                        <li><span>array_slice()</span> :  permet de récuperer une partie d'un tableau </li>
                    </ul>
                </div>
            </div>
            <?php
                $tableau = ["Red", "Blue", "Pink", "Purple"];
                echo "<pre>";
                var_dump($tableau);
                echo "</pre>";

                // Ajouter des valeurs à la fin du tableau
                echo "<p class=\"alert alert-primary\">array_push()</p>";
                // $tableau[] = "Green";
                // echo "<pre>";
                // var_dump($tableau);
                // echo "</pre>";
                array_push($tableau, "Green", "Black", "White"); // Paramètres fonction => variable contenant le tableau + valeur(s) à ajouter
                echo "<pre>";
                var_dump($tableau);
                echo "</pre>";

                // Ajouter des valeurs au début du tableau
                echo "<p class=\"alert alert-primary\">array_unshift()</p>";
                array_unshift($tableau, "Gray", "Yellow");
                echo "<pre>";
                var_dump($tableau);
                echo "</pre>";

                // Supprimer la dernière valeur du tableau
                echo "<p class=\"alert alert-primary\">array_pop()</p>";
                $valueDeleteLast = array_pop($tableau); // Suppression de la dernière valeur du tableau et possibilité de stockée celle-ci dans une variable
                echo "<pre>";
                var_dump($tableau);
                echo "</pre>";

                // Supprimer la première valeur du tableau 
                echo "<p class=\"alert alert-primary\">array_shift()</p>";
                $valueDeleteFirst = array_shift($tableau); // Suppression de la première valeur du tableau et possibilité de stockée celle-ci dans une variable
                echo "<pre>";
                var_dump($tableau);
                echo "</pre>";

                // Mélanger un tableau 
                echo "<p class=\"alert alert-primary\">shuffle()</p>";
                // shuffle($tableau);
                echo "<pre>";
                echo "array(7) {
                [0]=>
                string(3) \"Red\"
                [1]=>
                string(4) \"Pink\"
                [2]=>
                string(5) \"Green\"
                [3]=>
                string(5) \"Black\"
                [4]=>
                string(6) \"Purple\"
                [5]=>
                string(6) \"Yellow\"
                [6]=>
                string(4) \"Blue\"
                }";
                // var_dump($tableau);
                echo "</pre>";

                // Diviser un tableau en plusieurs parties
                echo "<p class=\"alert alert-primary\">array_chunk()</p>";
                $tableau2 = array_chunk($tableau, 2, true); // Division du tableau, paramètres fonction => variable tableau, nombre d'éléments dans les sous-tableaux, (facultatif) "true" permet de garder les indexs d'origine du tableau divisé 
                echo "<pre>";
                var_dump($tableau2);
                echo "</pre>";

                // Compter les éléments dans un tableau
                echo "<p class=\"alert alert-primary\">count() & sizeof()</p>";
                $nb1 = count($tableau);
                $nb2 = sizeof($tableau);
                echo "<pre>";
                var_dump($tableau);
                echo "</pre>";

                // Vérifier une valeur dans un tableau
                echo "<p class=\"alert alert-primary\">in_array()</p>";
                $result = in_array("blue", $tableau); // in_array() => sensible à la casse
                echo "<pre>";
                var_dump($result); // false 
                echo "</pre>";

                // Vérifier une clé dans un tableau
                echo "<p class=\"alert alert-primary\">array_key_exists()</p>";
                $result = array_key_exists(4, $tableau);
                echo "<pre>";
                var_dump($result); // true
                echo "</pre>";

                // Créer un tableau à partir de 2 tableaux
                echo "<p class=\"alert alert-primary\">\$fusionArray = [<span>...</span>\$tableau, <span>...</span>\$colors];</p>";
                $colors = ["Orange", "LightBlue", "DarkRed"];
                $fusionArray = [...$tableau, ...$colors]; // Décompisition de chaque tableau avec l'opérateur (...)
                echo "<pre>";
                var_dump($fusionArray); // La variable contient le nouveau tableau indexé créer à partir de 2 tableau
                echo "</pre>";

                echo "<p class=\"alert alert-primary\"><span>résultat différent avec cette syntaxe</span> => \$fusionArray = [\$tableau, \$colors];</p>";
                $fusionArray = [$tableau, $colors];
                echo "<pre>";
                var_dump($fusionArray); // => tableau multidimensionnel
                echo "</pre>";
                
                // Transformation d'une chaîne de caractères en tableau
                echo "<p class=\"alert alert-primary\">explode()</p>";
                $maChaine = "Transformation en tableau";
                $chaineToTableau = explode(" ", $maChaine); // Paramètres fonction => caractère de séparation dans la chaîne, variable chaîne de caractères à scinder 
                echo "<pre>";
                var_dump($chaineToTableau); 
                echo "</pre>";

                // Transformation d'un tableau en chaîne de caractères
                echo "<p class=\"alert alert-primary\">implode()</p>";
                $stringArray = ["Hello", "World", "!", "Guess", "who's", "back", "!"];
                $arrayToString = implode(" ", $stringArray); // Paramètres fonction => caractère de séparation dans chaîne, variable tableau à fusionner
                echo "<pre>";
                var_dump($arrayToString); 
                echo "</pre>";

                // Récupération d'une partie d'un tableau 
                echo "<p class=\"alert alert-primary\">array_slice()</p>";
                $array = [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3,
                    'd' => 4,
                ];
                $newArray = array_slice($array, 1, 2); // Paramètres fonction => variable contenant le tableau, nombre pour le départ de la coupe, nombre d'élément à garder
                echo "<pre>";
                var_dump($newArray); 
                echo "</pre>";
            ?>
        </div>
        <div class="col-sm-12 mt-5">
            <h3 class="text-primary text-center mb-5">Les fonctions <span>isset()</span> et <span>empty()</span></h3>    
            <ul>
                <li class="alert alert-success">Ces fonctions sont utiles lorsque vous souhaitez effectuer une validation de données.</li>
            </ul>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4 class="text-success text-center">isset()</h4>
                    <ul>
                        <li>La fonction <span>isset()</span> détermine si une variable existe.</li>
                        <li>La fonction vérifie si la variable est définie, et non NULL </li>
                        <li>La fonction retourne true quand la variable testé est définie ou elle ne contient pas la valeur NULL</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6">
                    <h4 class="text-success text-center">empty()</h4>
                    <ul>
                        <li>La fonction <span>empty()</span> vérifie si une variable est vide.</li>
                        <li>La fonction retourne true si la variable testée est égale à : 
                            <ul>
                                <li><span>""</span> (une chaîne vide)</li> 
                                <li><span>0</span> (0 en tant qu'entier)</li>
                                <li><span>"0"</span> (0 en tant que chaîne de caractères)</li>
                                <li><span>NULL</span></li>
                                <li><span>false</span></li>
                                <li><span>array()</span> (un tableau vide)</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <?php
                $var1 = 0;
                $var1Bis = NULL;
                $var1Ter = "";
                $var2 = "";
                $var2Bis = "test";
                echo "<p class=\"alert alert-primary w-25\">isset(\$var1)</p>";
                // $var1
                if(isset($var1)){ // if true return
                    echo "\$var1 existe et est non NULL <br>";
                } else{
                    echo "\$var1 n'existe pas ou est NULL <br>";
                };
                // $var1Bis
                echo "<p class=\"alert alert-primary w-25\">isset(\$var1Bis)</p>";
                if(isset($var1Bis)){ // if true return
                    echo "\$var1Bis existe et est non NULL <br>";
                } else{
                    echo "\$var1 n'existe pas ou est NULL <br>";
                };
                // $var1Ter
                echo "<p class=\"alert alert-primary w-25\">isset(\$var1Ter)</p>";
                if(isset($var1Ter)){ // if true return
                    echo "\$var1Ter existe et est non NULL <br>";
                } else{
                    echo "\$var1 n'existe pas ou est NULL <br>";
                };
                // $var2
                echo "<p class=\"alert alert-primary w-25\">empty(\$var2)</p>";
                if (empty($var2)){ // if true return
                    echo "\$var2 est vide (0, string vide, NULL, false, non définie) <br>";
                } else{
                    echo "\$var2 n'est pas vide (0, string vide, NULL, false, non définie) <br>";
                }
                // $var2Bis
                echo "<p class=\"alert alert-primary w-25\">empty(\$var2Bis)</p>";
                if (empty($var2Bis)){
                    echo "\$var2 est vide (0, string vide, NULL, false, non définie) <br>";
                } else{
                    echo "\$var2 n'est pas vide (0, string vide, NULL, false, non définie) <br>";
                }
                // Différence entre "isset()" et "empty()", si on suppprime les déclarations des variables $var1 et $var2 : "empty()" reste "true" car $var2 n'est pas définie, "isset()" devient "false" car $var1 n'est pas définie
                /*
                * Utilisation : 
                * "empty()" : pour valider et vérifier si les champs d'un formulaire sont remplis.
                * "isset()" : pour vérifier l'existance d'une variable avant de l'utiliser
                */
            ?>
        </div>
    </div>
    <div class="row">
        <h2 class="mt-5">2 - Fonctions Utilisateurs </h2>
        <ul>
            <li>Les fonctions utilisateurs sont des morceaux de code écrits dans des accolades et portant un nom.</li>
            <li>On appelle une fonction au besoin pour exécuter le code qui s'y trouve.</li>
            <li>Il est d'usage de créer des fonctions pour ne pas se répéter quand on veut exécuter plusieurs fois le même traitement. On parle alors de "factoriser" son code.</li>
        </ul>
        <?php
            function separation(){ // Déclaration d'une fonction avec le mot clé "function" suivi du nom de la fonction et des "()" qui peuvent accueillir des paramètres ultérieurs
                echo "<hr>";
            };
            separation(); // Pour exécuter une fonction il suffit de faire la même manipulation qu'en JS (nom fonction + "()" => "functionName()")

            // Fonctions avec paramètres et return // 

            // Fonction sans return 
            function hello1($prenom, $nom){ // $prenom et $nom => paramètres de la fonction, permettent de recevoir une valeur
                echo "<p class=\"alert alert-info\">Hello $nom $prenom !</p>";
            }
            hello1("Yro", "Red"); // si la fonction attend des valeurs, il faut obligatoirement donner ces valeurs 

            // Same function with return 

            function hello2($prenom, $nom){
                return "<p class=\"alert alert-info\">Hello $nom $prenom !</p>"; // return permet de sortir la phrase inscrite dans le code et de la renvoyer à l'endroit où la fonction est appelée 
                // Après le "return" toutes les instructions ne seront pas exécuter 
            }
            echo hello2("Hada","Blue"); // echo obligatoire pour afficher la fonction avec return

            // On peut remplacer les arguments par des variables provenant d'un formulaire par ex
            $prenom1 = "Grégory";
            $nom1 = "LYFOUNG";
            echo hello2($prenom1, $nom1); // Les 2 arguments sont variables et peuvent recevoir n'importe quelle valeur 

            $prenom1 = "Sahar";
            $nom1 = "FERCHICHI";
            echo hello2($prenom1, $nom1);

            // Exercice : Écrire une fonction qui multiplie un nombre 1 par un nombre 2 fournis lors de l'appel. Cette fonction retourne le résultat de la multiplication. Afficher le résultat
            // echo "<div class=\"col-sm-12\">";
            echo "<p class=\"alert alert-secondary text-center\">Exercice</p>";
            // echo "</div>";

            // Méthode 1 "return"
            echo "<div class=\"col-sm-12 col-md-6\">";
            echo "<p class=\"alert alert-success\">Méthode 1 \"return\"</p>";
            function calculateExo1($nb1, $nb2){
                $multiplication = $nb1 * $nb2;
                return "<p>$nb1 * $nb2 = $multiplication</p>";
            }
            echo calculateExo1(23, 10);
            echo "<code>function calculateExo1(\$nb1, \$nb2){ <br>
                \$multiplication = \$nb1 * \$nb2; <br>
                return \$nb1 * \$nb2 = \$multiplication; <br>
            } <br>
            echo calculateExo1(23, 10);</code>";
            echo "</div>";

            // Méthode 2 "echo"
            echo "<div class=\"col-sm-12 col-md-6\">";
            echo "<p class=\"alert alert-success\">Méthode 2 \"echo\"</p>";
            function calculateExo2($nb1, $nb2){
                $multiplication = $nb1 * $nb2;
                echo "<p>$nb1 * $nb2 = $multiplication</p>";
            }
            calculateExo2(25, 10);
            echo "<code>function calculateExo2(\$nb1, \$nb2){ <br>
                \$multiplication = \$nb1 * \$nb2; <br>
                echo \$nb1 * \$nb2 = \$multiplication; <br>
            } <br>
            calculateExo1(25, 10);</code>";
            echo "</div>";
            // Méthode 3 "return" + concaténation
            echo "<div class=\"col-sm-12 col-md-6\">";
            echo "<p class=\"alert alert-success\">Méthode 3 \"return\" + concaténation</p>";
            function calculateExo3($nb1, $nb2){
                return "<p>$nb1 * $nb2 = ".$nb1 * $nb2 . "</p>";
            }
            echo calculateExo3(30, 10);
            echo "<code>function calculateExo2(\$nb1, \$nb2){ <br>
                return \$nb1 * \$nb2 = \". \$nb1 * \$nb2; <br>
            } <br>
            echo calculateExo3(30, 10);</code>";
            echo "</div>";

            // Fonction avec paramètres optionnels //
            echo "<p class=\"alert alert-secondary text-center\">Fonction avec paramètres optionnels</p>";
            // Certains paramètres peuvent ne pas être passés. Une valeur fournie lors de la déclaration.
            // Afin de se servir d'un paramètre optionnel il faut utiliser les arguments nommés
            // Méthode 1
            echo "<p class=\"alert alert-success\">Méthode 1</p>";
            function hello3($bonjour = "Hi", $prenom, $nom){
                echo "<p class=\"alert alert-info\">$bonjour $nom $prenom !</p>";
            }
            hello3(prenom :"Yro", nom: "Red", bonjour: "Hello");

            // Méthode 2
            echo "<p class=\"alert alert-success\">Méthode 2</p>";
            function hello4($prenom, $nom, $bonjour = "Hi"){
                echo "<p class=\"alert alert-info\">$bonjour $nom $prenom !</p>";
            }
            hello4("Yro", "Red");
        ?>
    </div>
</main>
<?php
    require_once ("inc/footer.inc.php");
?>
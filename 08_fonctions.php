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
                        <li><span>substr()</span> : permet d'extraire une partie d'une chaine de caractère</li>
                        <li><span>strpos()</span>: permet de récuperer la position d'un caractère dans une chaîne de caractère </li>
                        <li><span>strlen()</span> : permet de récupérer la taille d'une chaîne de carctére</li>
                        <li><span>substr_replace()</span> : permet de remplacer un segment de la chaîne</li>
                        <li><span>substr_ireplace()</span>: Version insensible à la casse de str_replace()</li>
                        <li><span>str_contains()</span> : permet de vérifier si la chaîne contient un mot particulier</li>
                        <li><span>str_starts_with()</span> : permet de vérifier si une chaîne commence par une sous-chaîne donnée</li>                                   
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6">
                    <ul>
                        <li><span>str_ends_with()</span> : permet de vérifier si une chaîne se termine par une sous-chaîne donnée</li>
                        <li><span>trim()</span> : permet de supprimer les espaces avant et après une chaîne de caractère </li>
                        <li><span>strtolower()</span> : permet de retourner la chaîne en miniscule</li>
                        <li><span>strtoupper()</span> : permet de retourner la chaîne en majuscules</li>
                        <li><span>ucfirst()</span> : permet de mettre le premier caractère en majuscule. </li>
                        <li><span>lcfirst()</span> : permet de mettre le premier caractère en miniscule. </li>
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
    </div>
</main>

<?php
    require_once ("inc/footer.inc.php");
?>
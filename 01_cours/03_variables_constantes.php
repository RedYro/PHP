<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PHP Cours">
    <meta name="author" content="Lyfoung Grégory">
    <title>PHP Cours - Variables et Constantes</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="01_index.php"><img src="assets/img/logo.png" alt="Logo PHP"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="01_index.php" target="_blank">Introduction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="02_bases.php" target="_blank">Bases PHP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="03_variables_constantes.php" target="_blank">Variables et constantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="04_conditions.php" target="_blank">Conditions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="05_boucles.php" target="_blank">Boucles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="06_inclusions.php" target="_blank">Importation de fichers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="07_tableaux.php" target="_blank">Tableaux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="08_fonctions.php" target="_blank">Fonctions</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- fin navbar -->
    <header class="p-5 m-4 bg-light rounded-3 border ">
        <section class="container py-5">
            <?php 
                echo '<h1 class="display-5 fw-bold">Variables et Constantes en PHP</h1>'; 
            ?>
        </section>
    </header>
    <!-- fin header -->
    <main class="container-fluid px-5">
            <?php 
                echo '<h2>Variables utilisateurs / affectation / concaténation</h2>';
                $number = 127; // Déclaration de la variable $number avec la valeur 127
                echo 'La variable $number vaut : ' , $number , '<br>'; // Concaténation avec le point (.)
                echo 'La variable $number vaut : ' . $number . '<br>'; // Concaténation avec le point (.)
                // On peut voir le type d'une variable aved la fonction prédéfinie gettype().
                echo 'Le type de la variable $number est : ' . gettype($number) . '<br>'; // ici => integer
                ################
                $double = 1.5;
                echo 'La variable $double vaut : ' , $double , '<br>';
                echo 'Le type de la variable $double est : ' , gettype($double) , '<br>';
                ################
                $chaine = 'Une Chaîne de caractères entre simples quotes';
                echo 'La variable $chaine vaut : ' , $chaine , '<br>';
                echo 'Le type de la variable $chaine est : ' , gettype($chaine) , '<br>'; // ici => string
                ################
                $chaine1 = "Une Chaîne de caractères entre doubles quotes";
                echo 'La variable $chaine1 vaut : ' , $chaine1 , '<br>';
                echo 'Le type de la variable $chaine1 est : ' , gettype($chaine1) , '<br>'; // ici => string
                ################
                $chaine2 = "127";
                echo 'La variable $chaine2 vaut : ' , $chaine2 , '<br>';
                echo 'Le type de la variable $chaine2 est : ' , gettype($chaine2) , '<br>'; // ici => string
                ################
                $chaine3 = `Une chaîne de caractère entre back quotes`; // Les back quotes en PHP https://www.php.net/manual/fr/language.operators.execution.php
                echo 'La variable $chaine3 vaut : ' , $chaine3 , '<br>';
                echo 'Le type de la variable $chaine3 est : ' , gettype($chain3) , '<br>'; // ici => NULL
                ################
                $boolean = true; // ou false // Le navigateur associe true à 1 et false à vide qui correpond à 0
                echo 'La variable $boolean vaut : ' , $boolean, '<br>';
                echo 'Le type de la variable $boolean est : ' , gettype($boolean) , '<br>'; // ici => boolean : permet de savoir si quelque chose est faux ou vrai.
                ######################################################################################
                // Concaténation, affectation et affectation combinée avec l'opérateur  ".="
                $prenom = 'Nicolas ';
                $prenom .= 'Thomas '; // Ajout de la valeur 'Thomas ' à la valeur 'Nicolas ' SANS remplacer celle-ci grâce à l'opérateur ".="
                echo $prenom;
                $salutation = 'Bonjour ';
                echo $salutation . $prenom;
                echo '<p>' . $salutation . $prenom . '</p>';
                echo "<p>$salutation $prenom </p>"; // Affiche 'Bonjour Nicolas Thomas' => utilisation des double quotes pour éviter de concaténer avec des ".", dans les double quotes la variable est evaluée : c'est son contenu qui est affiché, c'est ce qu'on appelle la substitution de variable.
                $age = 30;
                echo "<p>$salutation $prenom tu as $age ans</p>";
                echo '<p>'.$salutation.$prenom.'tu as '.$age.' ans'.'</p>';
                echo 'Bonjour $prenom (test)'; // Dans des quotes simple, $prenom est considére comme une chaîne de caractères brute, on l'affiche littéralement
                #################
                // Échappement des apostrophes 
                $message1 = "aujourd'hui";
                $message2 = 'aujourd\'hui'; // On échape les apostrophes avec un anti-slash dans les simples quotes 
                
                // Exercice : Affichez Bleu-Blanc-Rouge en mettant le texte de chaque couleur dans des variables
                $red = 'Red';
                $blue = 'Blue';
                $purple = 'Purple';
                echo "<p> <span style=\"color: blue\">$blue</span> - <span style=\"color: purple\">$purple</span> - <span style=\"color: red\">$red</span> </p>";
                echo '<p>' . '<span style="color: blue">' . $blue . '</span>' . ' - ' . '<span style="color: purple">' . $purple . '</span>' . ' - ' . '<span style="color: red">' . $red . '</span>'. '</p>';
                // Sadek
                $text = '<span style="color: blue">bleu</style></span>';
                $text2 = '<span style="color: green">vert</style></span>';
                $text3 = '<span style="color: red">rouge</style></span>';
                echo $text.' - '.$text2.' - '.$text3;
                // Choiab 
                $blue = "blue";
                $white = "white";
                $red = "red";
                echo 
                    "<div class='d-flex justify-content-center bg-dark p-5 m-auto my-2 rounded' style='width: 40%;'>
                    <div class='bg-primary text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                    $blue
                    </div>
                    <div class='bg-$white text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                    $white
                    </div>
                    <div class='bg-danger text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                    $red
                    </div>
                    </div>";
                // Fin exercice //

                echo '<h2 class = "mt-5">Opérateurs numérique</h2>';

                $a = 10;
                $b = 2;
                echo "$a + $b = " . $a + $b . '<br>'; // Affiche 12 
                echo "$a - $b = " . $a - $b . '<br>'; // Affiche 8
                echo "$a * $b = " . $a * $b . '<br>'; // Affiche 20
                echo "$a / $b = " . $a / $b . '<br>'; // Affiche 5
                echo "$a % $b = " . $a % $b . '<br>'; // Affiche 0

                // Les opérateurs d'affectation combinés pour les valeurs numériques 

                $a += $b; // $a = $a + $b
                echo $a.'<br>';
                $a -= $b; // 10 car $a = $a += $b = 12
                echo $a.'<br>';
                // Opérateurs '*=' , '/=' , '%='
                ################
                // Incrémentation et décrémentation
                $i = 0;
                $i++; // 1
                echo 'echo $i++ = '.$i.'<br>';
                $i--;
                echo 'echo $i-- = '.$i.'<br>';

                echo '<h2 class="mt-5">Variables prédéfinies : Super-globale </h2>';

                echo $_SERVER["HTTP_HOST"];
                echo '<pre>';
                var_dump($_SERVER);
                echo '</pre>';
                // On veut afficher le contenu de la super_global $SERVER["HTTP_HOST"] dans une chaîne de caractères :
                $message = "<p>Le nom de domaine à partir duquel on affiche la page c'est : <strong> {$_SERVER["HTTP_HOST"]}</strong></p> <br>";
                echo $message; // On utilise les accolades pour intégrer la variable dans une chaîne de caractères "{$_SERVER["HTTP_HOST"]}"
                /* 
                * Si l'on veut afficher le contenu d'une variable et qu'elle soit collée à une chaîne de caractères
                * Aujourd'hui il fait 32°C !
                * Ici la '32' et '°C' sont collés pour le faire en utilisant le mécanisme de substitution des variables il faut mettre la variable entre accolades 
                */
                $temperature = 32;
                $tempsajd = "<p>Aujourd'hui il fait {$temperature}°C !</p> <br>";
                echo $tempsajd;
                $tempsajd2 = '<p>'.'Aujourd\'hui il fait '.$temperature.'°C !'.'</p>'.'<br>';
                echo $tempsajd2;
                
                echo '<h2 class="mt-5"> Transtypage des variables</h2>';
                $string = (int)'100';
                var_dump($string); // Affiche 100 avec type 'int'
                $string2 = (float)'12.5'; 
                var_dump($string2); // Affiche 12.5 avec type 'float'
                $string3 = (int)'13.5';
                var_dump($string3); // Affiche 13 avec type 'int'
                echo '<br>';
                echo '<h2 class="mt-5"> Constantes utilisateurs</h2>';
                # Avec fonction prédéfinie 'define()'
                // nom constante : CHAINE
                // valeur constane : "value const CHAINE"
                define("CHAINE","Value const CHAINE");
                echo '<p>'. CHAINE .'</p>';
                define("ENTIER",30);
                echo '<p>'. ENTIER .'</p>';
                echo '<p>'. gettype(ENTIER) .'</p>';
                // Récupération d'une constante dans une chaîne de caractères 
                echo "<p> J'ai ". ENTIER ." ans !"; // Obligation de concaténer avec constante /!\ 

                # Constante avec 'const'
                // Avec 'const', il est possible de définir la valeur de de la constante en utilisant une expression scalaire qui contient d'autres constantes.
                // nombre d'heures mensuelles = temps hebdomadaire * 52 semaines / 12 mois (35*52/12 = 151.67 par mois)
                const SEMAINE = 52;
                const HEBDOMADAIRE = 35;
                const MOIS = 12;
                const HEURE = (HEBDOMADAIRE * SEMAINE) / MOIS;
                echo '<p>'.HEURE.'</p>';

                // const NB_RANDOM = rand(1,10); // Impossible de stocker une fonction dans une 'const'
                // defined("NOMBRES_RANDOM",rand(0,10));
                // echo '<p>'. NOMBRES_RANDOM .'</p>';

                echo '<h2 class="mt-5">Constantes prédéfinies</h2>';
                echo '<p>'.PHP_VERSION.'<p/>';
                echo '<p>'.PHP_MAJOR_VERSION.'<p/>';
                // phpinfo();

                echo '<p>'.__LINE__.' /"fonction (__LINE__)"'.'</p>';
                echo '<p>'.__DIR__.' /"fonction (__DIR__)"'.'</p>';

            ?>
            
    </main>
    <footer>
        <div class="d-flex justify-content-evenly align-items-center bg-dark text-light p-3">
            <a class="nav-link" target="_blank" href="https://www.php.net/manual/fr/">Documentation PHP</a>
            <a class="nav-link" href="01_index.php" target="_blank"><img src="assets/img/logo.png" alt="Logo PHP"></a>
            <a class="nav-link" target="_blank" href="https://devdocs.io/php/">DevDocs</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>
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
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="01_index.php"><img src="assets/img/logo.png" alt="Logo PHP"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="01_index.php">Introduction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="02_bases.php">Bases PHP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="03_variables_constantes.php">Variables et constantes</a>
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
            ?>
    </main>
    <footer>
        <div class="d-flex justify-content-evenly align-items-center bg-dark text-light p-3">
            <a class="nav-link" target="_blank" href="https://www.php.net/manual/fr/">Documentation PHP</a>
            <a class="nav-link" href="01_index.php"><img src="assets/img/logo.png" alt="Logo PHP"></a>
            <a class="nav-link" target="_blank" href="https://devdocs.io/php/">DevDocs</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>
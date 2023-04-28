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
    <title>PHP Cours - Boucles</title>
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
                </ul>
            </div>
        </div>
    </nav>
    <!-- fin navbar -->
    <header class="p-5 m-4 bg-light rounded-3 border ">
        <section class="container py-5">
            <h1 class="display-5 fw-bold">Boucles en PHP</h1>
            <p class="col-md-12 fs-4">Les boucles (aussi appelées structures itératives) sont un moyen de répéter plusieurs fois un même morceau de code. Une boucle est donc une répétition, comme on a pu le voir en JS</p>
        </section>
    </header>
    <!-- fin header -->
    <main class="container-fluid px-5">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h2>Boucle "while"</h2>
                    <p>La boucle "<span>while</span>" est, comme en JS, une boucle permettant d'exécuter un code "TANT QUE" la condition d'entrée n'a pas été remplie</p>
                    <?php
                        $a = 1; // Initialisation de la variable $a à 1 => valeur de départ pour la boucle 
                        while($a < 6){ // Boucle TANT QUE $a est strictement inférieur à 6
                            echo "<p class=\"alert alert-primary\">Tour n°{$a}</p>"; // Affichage du nombre de tour
                            $a++; // Incrémentation de la variable $a afin que la condition d'entrée devienne "false" à un moment donné 
                        }
                        echo "<p>Exercice</p>";
                        // Exercice
                        // À l'aide d'une boucle "while", afficher les années de 1920 à 2023 dans un menu déroulant.
                        $year = 1920;
                        echo "<form><select name=\"année\">";
                        while($year < 2024){
                            echo "<option value=\"$year\">{$year}</option>";
                            $year++;
                        }
                        echo "</select></form>";
                    ?>
                    <form>
                        <select name="annee">
                        <?php
                            $annee = 1920;
                            while($annee <= 2023) {
                            echo "<option value=\"$annee\">$annee</option>";
                            $annee++;
                            }
                        ?>
                        </select>
                    </form>
                    <p>Exercice bonus</p>
                    <form>
                        <select name="year">
                    <?php
                        // Exercice bonus : faire la même chose en décrémentant, de 2023 à 1920
                        $year2 = 2023;
                            while($year2 >= 1920) {
                            echo "<option value=\"$year2\">$year2</option>";
                            $year2--;
                            }
                    ?>
                        </select>
                    </form>
                </div>
            </div>
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
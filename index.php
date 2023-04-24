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
    <title>PHP Cours - Introduction</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" alt="Logo PHP"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Introduction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- fin navbar -->
    <header class="p-5 m-4 bg-light rounded-3 border ">
        <section class="container py-5">
            <h1 class="display-5 fw-bold">Introduction au PHP</h1>
            <p class="col-md-12 fs-4"> PHP, ce sigle est un acronyme récursif  <span>Préprocesseur Hypertexte PHP</span> (PHP Hypertext Preprocessor). Il s'agit d'un langage de script côté serveur open source utilisé pour le développement Web dynamique et peut être intégré dans des codes HTML, notez bien qu'un navigateur ne comprend pas le PHP.</p> 
        </section>
    </header>
    <!-- fin header -->
    <main class="container-fluid px-5">
        <section class="row mt-5">
            <h2 class="text-center ">1 - Pourquoi apprendre php</h2>
            <div class="col-12 col-md-8 mt-3">
                <ul> 
                    <li>C'est un langage open-source. Cela signifie que PHP est librement disponible pour être utilisé et implémenté.</li>
                    <li>Il est indépendant de la plate-forme, ce qui signifie que les applications développées à l'aide de PHP peuvent s'exécuter dans n'importe quel environnement.</li>
                    <li>Il a une grande communauté de développeurs. La programmation consiste à aider et à être aidé ; par conséquent, une grande communauté signifierait plus d'aide.</li>
                    <li>Il est régulièrement mis à jour et fonctionne donc bien avec les dernières technologies.</li>
                    <li>Grâce au PHP, nous pouvons créer tout type de site : moteur de recherche de type Google, réseaux sociaux comme Facebook, plateforme multimédia comme YouTube ou encore site d'information comme Wikipedia, nous pouvons aussi développer des site d'e-commerce, des espaces membres, des pages d'administration, etc.</li>
                    <li>Il est hautement compatible car il peut être intégré à plusieurs langages de programmation tels que HTML, Javascript et prend en charge différentes bases de données telles que MySQL, PostgreSQL, Oracle, etc.</li>
                    <li>Le PHP nous sert en fait à créer un site web dynamique. Un site web dynamique va être un site dont les informations proviennent d'une BDD et pour cela on va apprendre à faire fonctionner le PHP et le SQL main dans la main.</li>
                </ul>
            </div>
                <div class="col-12 col-md-4 d-flex justify-content-center">
                    <img src="assets/img/PHP.png" alt="" width="250" >
                </div>
            <div class="col-10 m-auto">
                <p class="alert alert-danger">
                    Attention, il ne faut pas confondre un site web dynamique avec un site web d'animation géré par des écouteurs d'évènements comme peut le faire le JS.
                </p>
                <div class="alert alert-secondary">
                    <p>Nous utiliserons à partir de maintenant l'appellation de <em>site dynamique</em> pour les sites dont les informations sont stockées en BDD et qui possèdent deux interfaces distinctes : </p>
                    <ol>
                        <li>Une interface "front" sur laquelle on retrouvera l'affichage "normal" du site, le côté pour les admins et les clients.</li>
                        <li>Une interface "back" qui permettra d'assurer la gestion de la BDD et certains réglages de l'interface front => on l'appellera le back office ou la page d'administration.</li>
                    </ol>
                </div>
            </div>
        </section>
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>
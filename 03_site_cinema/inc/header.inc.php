<!-- fichier contenant le header des différentes pages de notre site -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=RACINE_SITE . "assets/css/style.css"?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site films">
    <meta name="author" content="Grégory Lyfoung">
    <title><?=$title?></title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <h1><a href="index.php" class="navbar-brand">MOVIES</a></h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav w-100 d-flex justify-content-end">
                        <li class="nav-item"><a href="<?=RACINE_SITE?>index.php" class="nav-link">Accueil</a></li>
                        <li class="nav-item"><a href="<?=RACINE_SITE?>admin/dashboard.php" class="nav-link">Back-office</a></li>
                        <!-- <li class="nav-item"><a href="" class="nav-link"></a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>
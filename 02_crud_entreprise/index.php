<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PHP Crud BDD entreprise">
    <meta name="author" content="Lyfoung Grégory">
    <title>CRUD - entreprise</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">
</head>
<body>
    <header>
        <div class="p-5 mb-4" style="background-color: #EEA545;">
            <section class="container py-5">
                <h1 class="fw-bold">- CRUD -</h1>
                <p class="col-md-8 fs-4">Dans cette page nous allons réaliser un CRUD complet, en utilisant la BDD "entreprise".</p>
            </section>
        </div>
    </header>
    <main class="container">
        <?php
            //------ Fonction debug ------//
            function debug($var){
                echo "<pre class=\"border border-dark bg-light text-primary w-50 p-3\">";
                var_dump($var);
                echo "</pre>";
            }
        ?>
        <h2 class="text-danger my-5">1- Connection à la BDD</h2>
        <?php
            /* 
            * On va utliser l'extension PHP Data Objects (PDO), elle définit une execellente interface pour accéder à une base de données depuis PHP et d'exécuter des requêtes SQL
            * Pour se connecter à la BDD avec PDO il faut créer une instance de cet Objet (PDO) qui représente une connexion à la base, pour cela il faut se servir du constructeur de la classe.
            * Ce constructeur demande certains paramètres :
            */
            // On déclare des constantes d'environnement qui vont contenir les informations à la connexion à la BDD
                // constante du serveur => localhost
            define("DBHOST", "localhost");
                // constante utilisateur de la BDD (serveur local) => root
            define("DBUSER", "root");
                // constante mot de passe (serveur local) => empty
            define("DBPASSWORD","");
                // constante nom BDD 
            define("DBNAME","entreprise"); 

            // DSN (Data Source Name)
            // $dsn = "mysql:host=localhost;dbname=entreprise;charset=utf8";
            $dsn = "mysql:host=". DBHOST . ";dbname=" . DBNAME . ";charset=utf8";
            try{ // Dans le try on va instancier PDO, création d'un objet de la classe PDO (élément PDO)
                // $pdo = new PDO("mysql:host=localhost;dbname=entreprise;charset=utf8", "root", ""); // la variable et les constantes 
                $pdo = new PDO($dsn, DBUSER, DBPASSWORD); // Avec la variable et les constantes
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                debug(get_class_methods($pdo));
                echo "Connexion avec succès";
            } catch(PDOException $e){ // "PDOException" est une classe qui représente une erreur émise par PDO et "$e" est l'objet de la classe qui va stocker l'erreur
                die($e->getMessage()); // "die()" permet d'arrêter PHP et d'afficher une erreur en utilisant la méthode "getMessage()" de l'objet "$e"
            }
            // "catch()" sera exécuté dès lors qu'une erreur est présente dans le "try"
            /*
            * À partir d'ici on est connecté à la BDD et la variable "$pdo" est l'objet qui représente la connexion à la BDD, cette variable va nous servir à effectuer les requêtes SQL et à interroger la BDD
            */
        ?>
        <h2 class="text-danger my-5">2- Requête d'insertion</h2>
        <?php
            //------ Requête d'insertion ------//
            // Insertion d'un employé dans la BDD : méthode "exec()" exécute une requête SQL et retourne le nombre de lignes affectées, elle est utilisée pour faire des requêtes qui ne retournent pas de jeu de résultats : INSERT, UPDATE, DELETE 
            // $request = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Tintin', 'Milou', 'm', 'informatique', '2023-05-12', 2000)");
            // debug($request);

            echo "<p class=\"alert alert-success\">Employé 'Tintin' bien inséré dans la BDD</p>";

            // echo "Dernier id généré dans la BDD : " . $pdo->lastInsertId();

            //------ Requête de suppression ------//
            // $request = $pdo->exec("DELETE FROM employes WHERE prenom = 'Tintin'");

        ?>
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>
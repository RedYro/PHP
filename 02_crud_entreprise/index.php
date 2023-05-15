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
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                debug(get_class_methods($pdo));
                echo "<p class=\"alert alert-success\">Connexion avec succès</p>";
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

            echo "<p class=\"alert alert-success\"><code>\$request = \$pdo->exec(\"INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Tintin', 'Milou', 'm', 'informatique', '2023-05-12', 2000)\");</code></p>";
            echo "<p class=\"alert alert-success\">Employé 'Tintin' bien inséré dans la BDD</p>";

            // echo "Dernier id généré dans la BDD : " . $pdo->lastInsertId();
        ?>
        <h2 class="text-danger my-5">3- Requête de suppression</h2>
        <?php
            //------ Requête de suppression ------//
            // $request = $pdo->exec("DELETE FROM employes WHERE prenom = 'Tintin'");
            echo "<p class=\"alert alert-success\"><code>\$request = \$pdo->exec(\"DELETE FROM employes WHERE prenom = 'Tintin'\");</code></p>";
        ?>
        <h2 class="text-danger my-5">4- Requête d'affichage</h2>
        <?php
            //------ Requête d'affichage ------//
            // Utilisation de la méthode "query()" ; au contraire de "exec()", "query()" est utilisé pour faire des requêtes qui retrournent un ou plusieurs résultats : "SELECT" on peut aussi l'utiliser avec "DELETE", "UPDATE" et "INSERT".
            /*
            * Valeur de retrour :
            *   succès : "query()" retrourne un nouvel objet qui provient de la classe PDOStatement
            *   échec : "false" 
            */
            //------ Récupération et affiche d'une seule donnée de la DB ------//
            // Sélection des informations de l'employé "Daniel"
            echo "<p class=\"alert alert-secondary\">Sélection des informations de l'employé \"Daniel\"</p>";
            $request = $pdo->query("SELECT * FROM employes WHERE prenom = 'Daniel'"); 
            debug($request); // Affiche la requête 
            // Possibilité de compter le nombre de lignes retourner par la requête avec la méthode "rowCount()"
            debug($request->rowCount()); // Dans cette requête et avec la condtion, on récupère un seul employé 
            // Dans cette objet "$request", on ne voit pas les données concercant "Daniel". Elles s'y trouvent et pour y accéder il faut utilisr la méthode "fetch()" (Pour un seul résultat seulement)
            // Il existe aussi la méthode "fetchAll()" (récupère toutes les données à partir de l'objet)
            // $employe = $request->fetch(PDO::FETCH_ASSOC); // "fetch()" transforme l'objet résultat en tableau et ici on le stock dans une variable "$employé"
            // debug($employe);
            // Le paramètre "PDO::FETCH_ASSOC" permet de transformer l'objet en un array "ASSOCIATIF", on y trouve en indices le nom des champs de la requête SQL.
            /*
            * Information : on peut mettre dans les parenthèses de "fetch()"
            * PDO: :FETCH_NUM pour obtenir un tableau aux indices numérique
            * PDO: :FETCH_OBJ pour obtenir un dernier objet
            * ou encore des "()" vides pour obtenir un mélange de tableau associatif et indexé
            */
            // On peut éviter de mettre cette constante comme paramètre de la méthode "fetch()" à chaque fois en la définissant dans la connexion de la DB par défaut (dans le try de la connexion à la DB)
            $employe = $request->fetch();
            debug($employe);

            // Exercice : Afficher "Je suis Daniel Chevel du service informatique"
            echo "<p class=\"alert alert-secondary\">Je suis $employe[prenom] $employe[nom] du service $employe[service].</p>"
            
        ?>
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>
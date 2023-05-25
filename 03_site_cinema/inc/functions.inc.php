<!-- Fichier contenant les fonctions du site -->
<?php
    //------ Fonction debug ------//
    function debug($var){
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }

    //------ Constante pour définir le chemin du site ------//
    define("RACINE_SITE", "/php_cours/03_site_cinema/"); // constante définissant les dossiers dans lesquels se situe le site pour pouvoir déterminer des chemins absolus à partir de "localhost" (ne pas prendre "localhost"), on écrit ainsi tous les chemins (exemple : src, href) en absolu avec cette constante

    //------ Fonction connexion DB ------//
    // constante du serveur => localhost
    define("DBHOST", "localhost");
    // constante utilisateur de la BDD (serveur local) => root
    define("DBUSER", "root");
     // constante mot de passe (serveur local) => empty
    define("DBPASSWORD","");
    // constante nom BDD 
    define("DBNAME","cinema"); 
    function connectionDB(){
        // DSN (Data Source Name)
        $dsn = "mysql:host=". DBHOST . ";dbname=" . DBNAME . ";charset=utf8";
        try{
            $pdo = new PDO($dsn, DBUSER, DBPASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // echo "<p>Connexion avec succès</p>";
        } catch(PDOException $e){
            die($e->getMessage());
        }
        return $pdo; // Utilisation de "return" pour récupérer l'objet de la fonction afin de l'appeler en dehors de la fonction
    }
    connectionDB();

    //------ Tables ------//

    //------ Fonctions création de tables ------//
    // table "categories" //
    function creationTableCategories(){
        $pdo = connectionDB();
        $sql = "CREATE TABLE IF NOT EXISTS categories (id_category INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(50) NOT NULL, description TEXT NULL)";
        $request = $pdo->exec($sql);
    }
    creationTableCategories();

    // table "users" // 
    function creationTableUsers(){
        $pdo = connectionDB();
        $sql = "CREATE TABLE IF NOT EXISTS users (id_user INT PRIMARY KEY AUTO_INCREMENT, first_name VARCHAR(30) NOT NULL, last_name VARCHAR(30) NOT NULL, pseudo VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(255) NOT NULL, phone VARCHAR(30) NOT NULL, civility ENUM('f','m')NOT NULL, birthday DATE NOT NULL, address VARCHAR(50) NOT NULL, zip VARCHAR(50) NOT NULL, city VARCHAR(50) NOT NULL, country VARCHAR(50) NOT NULL)";
        $request = $pdo->exec($sql);
    } 
    creationTableUsers();

    // table "films" //
    function createTableFilms(){
        $pdo = connectionDB();
        $sql = "CREATE TABLE IF NOT EXISTS films (id_film INT PRIMARY KEY AUTO_INCREMENT, category_id INT, title VARCHAR(50) NOT NULL, director VARCHAR(50) NOT NULL, actors VARCHAR(100) NOT NULL, duration TIME NOT NULL,synopsis TEXT NOT NULL, date_film DATE NOT NULL, image VARCHAR(255) NOT NULL, price FLOAT NOT NULL, stock INT NOT NULL, ageLimit VARCHAR(5) NULL)";
        $request = $pdo->exec($sql);
    }
    createTableFilms();

    //------ Fonctions création "foreign key" ------//
    // $tableForeign : table où l'on va créer la clé étrangère
    // $tablePrimary : table à partir de laquelle on récupère la clé primaire
    // $foreign : nom de la clé étrangère
    // $primary : nom de la clé primaire
    function createForeignKey(string $tableForeign, string $foreign, string $tablePrimary, string $primary){
        $pdo = connectionDB();
        $sql = "ALTER TABLE $tableForeign ADD CONSTRAINT FOREIGN KEY ($foreign) REFERENCES $tablePrimary ($primary)";
        $request = $pdo->exec($sql);
    }
    // Création de la clé étrangère dans la table "films"
    createForeignKey("films", "category_id", "categories", "id_category");
?>
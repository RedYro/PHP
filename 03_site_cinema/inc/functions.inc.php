<!-- Fichier contenant les fonctions du site -->
<?php
    //------ Fonction debug ------//
    function debug($var){
        echo "<pre class=\"border border-dark bg-light text-primary w-50 p-3\">";
        var_dump($var);
        echo "</pre>";
    }

    //------ Fonction "alert" ------//
    function alert(string $contenu, string $class){
        return "<div class=\"alert alert-$class alert-dismissible fade show text-center w-50 m-auto mb-5\" role=\"alert\">$contenu<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
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
    // creationTableUsers();

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
    // createForeignKey("films", "category_id", "categories", "id_category");

    //------ Fonctions ajouter "catégorie" ------//
    function addCategory(string $nameCategory, string $descriptionCategory) : void{
        $pdo = connectionDB();
        $sql = "INSERT INTO categories (name, description) VALUES (:name, :description)"; // requête d'insertion préparée et stocké dans une variable
        $request = $pdo->prepare($sql); // préparation de la fonction et exécution de celle-ci
        $request->execute(array(
            ':name' => $nameCategory ,
            ':description' => $descriptionCategory
        ));
    }
    
    //------ Fonctions récupération de toutes les catégories ------//
    function allCategories(){
        $pdo = connectionDB();
        $sql = "SELECT * FROM categories";
        $request = $pdo->query($sql);
        $result = $request->fetchAll(); // Utilisation de "fetchAll()" pour récupérer toutes les lignes en même temps
        return $result; // retourne un tableau avec les données récupérées de la DB
    }

    //------ Fonctions suppression catégories ------//
    function deleteCategories(int $id) :void{
        $pdo = connectionDB();
        $sql = "DELETE FROM categories WHERE id_category = :id";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':id' => $id
        ));
    }

    //------ Fonctions modification catégories ------//

    // function selectCategories(int $id){
    //     $pdo = connectionDB();
    //     $sql = "SELECT * FROM categories WHERE id_category = :id";
    //     $request = $pdo->prepare($sql);
    //     $request->execute(array(
    //         ':id' => $id
    //     ));
    // }

    // function updateCategories(int $id, string $nom, string $description) :void{
    //     $pdo = connectionDB();
    //     $sql = "UPDATE categories SET name= :nom, description= :description WHERE id_category = :id";
    //     $request = $pdo->prepare($sql);
    //     $request->execute(array(
    //         ':nom' => $nom,
    //         ':description' => $description,
    //         ':id' => $id
    //     ));
    // }

?>
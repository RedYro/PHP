<!-- Fichier contenant les fonctions du site -->
<?php
    //------ Session Start ------//
    session_start();

    //------ Constante pour définir le chemin du site ------//
    define("RACINE_SITE", "/php_cours/03_site_cinema/"); // constante définissant les dossiers dans lesquels se situe le site pour pouvoir déterminer des chemins absolus à partir de "localhost" (ne pas prendre "localhost"), on écrit ainsi tous les chemins (exemple : src, href) en absolu avec cette constante

    //------ Fonction debug ------//
    function debug($var){
        echo "<pre class=\"border border-dark bg-light text-primary w-50 p-3\">";
        var_dump($var);
        echo "</pre>";
    }

    // //------ Fonction sécurité ------//
    // function security($variable){
    //     $variable = htmlentities(trim($variable));
    // }

    // Fonction String to Array //
    function stringToArray(string $string) :array{
        $array = explode('/', trim($string, '/')); // Transformation de la chaîne de caractères en tableau et suppression des "/" autour de la chaîne de caractères
        return $array; // retourne un tableau
    }

    //------ Fonction "alert" ------//
    function logoutUser(){
        if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'deconnexion'){
            unset($_SESSION['user']); // Suppression de l'indice "user" de la session pour se déconnecter, cette fonction détruit les variables stockées comme 'fisrt_name' par exemple.
            // or
            // session_destroy(); // Supprime toutes les données de la session déjà établie, cette fonction détruit la session sur le serveur
            // header('location:'.RACINE_SITE.'authentication.php');
        }
    }
    logoutUser();

    //------ Fonction "alert" ------//
    function alert(string $contenu, string $class){
        return "<div class=\"alert alert-$class alert-dismissible fade show text-center w-50 m-auto mb-5\" role=\"alert\">$contenu<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
    }

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
        $sql = "CREATE TABLE IF NOT EXISTS users (id_user INT PRIMARY KEY AUTO_INCREMENT, first_name VARCHAR(30) NOT NULL, last_name VARCHAR(30) NOT NULL, pseudo VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(255) NOT NULL, phone VARCHAR(30) NOT NULL, civility ENUM('f','m')NOT NULL, birthday DATE NOT NULL, address VARCHAR(50) NOT NULL, zip VARCHAR(50) NOT NULL, city VARCHAR(50) NOT NULL, country VARCHAR(50) NOT NULL) role ENUM('ROLE_USER','ROLE_ADMIN') DEFAULT 'ROLE_USER'";
        $request = $pdo->exec($sql);
    } 
    // creationTableUsers();

    // table "orders" //
    function creationTableOrders(){
        $pdo = connectionDB();
        $sql = "CREATE TABLE IF NOT EXISTS orders (id_order INT PRIMARY KEY AUTO_INCREMENT, user_id INT NOT NULL, created_at DATETIME NOT NULL, price FLOAT NOT NULL, is_paid ENUM('0', '1') NOT NULL)";
        $request = $pdo->exec($sql);
    } 
    // creationTableOrders();

    // table "orders_details" //
    function creationTableOrdersDetails(){
        $pdo = connectionDB();
        $sql = "CREATE TABLE IF NOT EXISTS orders_details (order_id INT NOT NULL, film_id INT NOT NULL, price_film FLOAT NOT NULL, quantity INT NOT NULL)";
        $request = $pdo->exec($sql);
    } 
    // creationTableOrdersDetails();

    //------ Fonctions vérification email dans DB ------//

    function checkMailUsers(string $mail) :mixed{ // "mixed" => précise que le retour de la fonction peut être en boolean ou array  
        $pdo = connectionDB();
        $sql = "SELECT * FROM users WHERE email = :email";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':email' => $mail
        ));
        $result = $request->fetch();
        return $result;
    }

    //------ Fonctions vérification pseudo dans DB ------//

    function checkPseudoUsers(string $pseudo) :mixed{
        $pdo = connectionDB();
        $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':pseudo' => $pseudo
        ));
        $result = $request->fetch();
        return $result;
    }

     //------ Fonctions check user ------//

     function checkUser(string $email, string $pseudo) :mixed{
        $pdo = connectionDB();
        $sql = "SELECT * FROM users WHERE pseudo = :pseudo AND email = :email";  ;
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':pseudo' => $pseudo,
            ':email' => $email
        ));
        $result = $request->fetch();
        return $result;
    }

    //------ Fonctions show users ------//

    function allUsers(): array {
        $pdo = connectionDB();
        $sql = "SELECT * FROM users";
        $request = $pdo->query($sql);
        $result = $request->fetchAll();// j'utilise le fetchAll pour récuperer tout les ligne à la fois
        return $result; 
    }

    //------ Fonctions inscription user ------//

    function inscriptionUser(string $firstName, string $lastName, string $pseudo, string $password,  string $email, string $phone, string $civility, string $birthday, string $address, string $zip, string $city, string $country) :void{
        $pdo = connectionDB();
        $sql = "INSERT INTO users (first_name, last_name, pseudo, email, password, phone, civility, birthday, address, zip, city, country) VALUES (:firstName, :lastName, :pseudo, :email, :password, :phone, :civility, :birthday, :address, :zip, :city, :country)";
        $request = $pdo->prepare($sql);
        $request->execute(array( 
            ':firstName'=> $firstName,
            ':lastName' => $lastName,
            ':pseudo' => $pseudo,
            ':email' => $email,
            ':password' => $password,
            ':phone'=> $phone,
            ':civility' => $civility,
            ':birthday' => $birthday,
            ':address'=> $address,
            ':zip' => $zip,
            ':city' => $city,
            ':country' => $country,
        ));
    }

    //------ Fonctions delete user ------//
    function deleteUser(int $id) :void{
        $pdo = connectionDB();
        $sql = "DELETE FROM users WHERE id_user = :id_user";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':id_user' => $id
        ));
    }

    //------ Fonctions show user ------//
    function showUser(int $id) :mixed{
        $pdo = connectionDB();
        $sql = "SELECT * FROM users WHERE id_user = :id_user";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':id_user' => $id
        ));
        $result = $request->fetch();
        return $result;
    }

    //------ Fonctions update role user ------//
    function updateRole(string $role, int $id) :void{
        $pdo = connectionDB();
        $sql = "UPDATE users SET role = :role WHERE id_user = :id_user";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':role' => $role,
            ':id_user' => $id
        ));
    }

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

    // Création de la clé étrangère dans la table "orders"
    // createForeignKey("orders", "user_id", "users", "id_user");
     
    // Création de clés étrangères dans la table "orders_details"
    // createForeignKey("orders_details", "order_id", "orders", "id_order");
    // createForeignKey("orders_details", "film_id", "films", "id_film");

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
    function deleteCategory(int $id) :void{
        $pdo = connectionDB();
        $sql = "DELETE FROM categories WHERE id_category = :id";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':id' => $id
        ));
    }

    //------ Fonctions modification catégories ------//
    function updateCategory(int $id, string $nom, string $description) :void{
        $pdo = connectionDB();
        $sql = "UPDATE categories SET name= :nom , description= :description WHERE id_category = :id";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':nom' => $nom,
            ':description' => $description,
            ':id' => $id
        ));
    }

    // Récupération d'une catégorie //    
    function showCategory(int $id) : array{
        $pdo = connectionDB();
        $sql = "SELECT * FROM categories WHERE id_category = :id";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':id' => $id 
        ));
        $result = $request->fetch(); // fetch() pour récupérer une ligne bien déterminée grâce à l'id 
        return $result; // fonction retournant un tableau avec une seule ligne
    }

    //------ Fonctions récupération id_category ------//
    function idCategory(string $name) :array{
        $pdo = connectionDB();
        $sql = "SELECT id_category FROM categories WHERE name = :name";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':name' => $name
        ));
        $result = $request->fetch();
        return $result;
    }

    //------ Fonctions récupération films ayant la même catégorie prime ------//
    function filmByCategoryName(string $name) :array{
        $pdo = connectionDB();
        $sql = "SELECT * FROM films WHERE category_id = (SELECT id_category FROM categories WHERE name = :name)";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':name' => $name
        ));
        $result = $request->fetchAll();
        return $result;
    }

    //------ Fonctions récupération films ayant la même catégorie bis ------//
    function filmByCategoryId(int $category) :array{
        $pdo = connectionDB();
        $sql = "SELECT * FROM films WHERE category_id = (SELECT id_category FROM categories WHERE id_category = :id_category)";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':id_category' => $category
        ));
        $result = $request->fetchAll();
        return $result;
    }

    //------ Fonctions insertion film ------//
    function addFilm(string $title, string $director, string $actors, string $ageLimit, int $category_id, string $duration, string $date, string $synopsis, string $image, float $price, int $stock) : void{
        $pdo = connectionDB();  
        $sql = "INSERT INTO films
        (title, director, actors, ageLimit, category_id, duration, date, synopsis, image, price, stock)
        VALUES
        (:title , :director, :actors, :ageLimit, :category_id, :duration, :date, :synopsis, :image, :price, :stock)";
        $request = $pdo->prepare($sql);
        $request->execute(array( 
                        ':title'=> $title,
                        ':director' => $director,
                        ':actors' => $actors,
                        ':ageLimit' => $ageLimit,
                        ':category_id' => $category_id,
                        ':duration' => $duration,
                        ':date'=> $date,
                        ':synopsis' => $synopsis,
                        ':image' => $image,
                        ':price'=> $price,
                        ':stock' => $stock,
                    ));
    }

    //------ Fonctions films ------//
    function allFilm(): array {
        $pdo = connectionDB();
        $sql = "SELECT * FROM films";
        $request = $pdo->query($sql);
        $result = $request->fetchAll();// j'utilise le fetchAll pour récuperer tout les ligne à la fois
        return $result; // ma fonction retourne un tableau avec les donées récupérer de la BDD
    }

    //------ Fonctions delete films ------//
    function deleteFilm(int $id) :void{
        $pdo = connectionDB();
        $sql = "DELETE FROM films WHERE id_film = :id";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':id' => $id
        ));
    }

    // Récupération d'un film //    
    function showFilm(int $id) : mixed{
        $pdo = connectionDB();
        $sql = "SELECT * FROM films WHERE id_film = :id";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ':id' => $id 
        ));
        $result = $request->fetch(); // fetch() pour récupérer une ligne bien déterminée grâce à l'id 
        return $result; // fonction retournant un tableau avec une seule ligne
    }

    // Update film //    

    function updateFilm(int $id, string $title, string $director, string $actors, string $ageLimit, int $category_id, string $duration, string $date, string $synopsis, string $image, float $price, int $stock): void
    {
        $pdo = connectionDB();
        $sql = "UPDATE films SET
                            id_film = :id,
                            title = :title,
                            director = :director,
                            actors = :actors,
                            ageLimit = :ageLimit,
                            category_id = :category_id,
                            duration = :duration,
                            date = :date,
                            synopsis = :synopsis,
                            image = :image,
                            price = :price,
                            stock = :stock
                WHERE id_film = :id";
            
        $request = $pdo->prepare($sql);     
        $request->execute(array( 
                        ':id'       => $id,
                        ':title'    => $title,
                        ':director' => $director,
                        ':actors'   => $actors,
                        ':ageLimit' => $ageLimit,
                        ':category_id'    => $category_id,
                        ':duration' => $duration,
                        ':date'     => $date,
                        ':synopsis' => $synopsis,
                        ':image'    => $image, // Attention, l'image ne doit pas venir de $_POST, mais de $_FILES
                        ':price'    => $price,
                        ':stock'    => $stock
                        ));
    
    }

    // Show film per date //    

    function ShowFilmsRecent() :array{
        $pdo = connectionDB();
        $sql = "SELECT * FROM films ORDER BY date DESC LIMIT 6";
        $request = $pdo->query($sql);
        $result = $request->fetchAll();
        return $result;
    }

    // function "panier" // 
    function calculerMontantTotal(array $tab) :int{
        $montant_total = 0;
        foreach ($tab as $key) {
            $montant_total += $key['price'] * $key['quantity'];
        }
        return $montant_total;
    } 

    // function add order //
    function addOrder(int $user_id, float $price, string $created_at, string $is_paid) :bool{
        $pdo = connectionDB();
        $sql = "INSERT INTO orders (user_id, price, created_at, is_paid) VALUES (:user_id, :price, :created_at, :is_paid)";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ":user_id" => $user_id,
            ":price" => $price,
            ":created_at" => $created_at,
            "is_paid" => $is_paid
        ));
        if($request){
            return true;
        }
    }

    // function add order details //
    function addOrderDetails(int $order_id, int $film_id, float $price_film, int $quantity) :void{
        $pdo = connectionDB();
        $sql = "INSERT INTO orders_details (order_id, film_id, price_film, quantity) VALUES (:order_id, :film_id, :price_film, :quantity)";
        $request = $pdo->prepare($sql);
        $request->execute(array(
            ":order_id" => $order_id,
            ":film_id" => $film_id,
            ":price_film" => $price_film,
            "quantity" => $quantity
        ));
    }

    // function select order_id //
    function lastIdOrder() :array{
        $pdo = connectionDB();
        $sql = "SELECT MAX(id_order) AS lastId FROM orders";
        $request = $pdo->query($sql);
        $result = $request->fetch();
        return $result;
    }
?>
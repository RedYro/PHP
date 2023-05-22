<!-- Fichier contenant les fonctions du site -->
<?php
    //------ Fonction debug ------//
    function debug($var){
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
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
                echo "<p>Connexion avec succès</p>";
            } catch(PDOException $e){
                die($e->getMessage());
            }
        }
    connectionDB();
?>
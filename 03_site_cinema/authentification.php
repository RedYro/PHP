<?php
    $title = "Authentification";
    require_once("inc/functions.inc.php");
    require_once("inc/header.inc.php");

    $info = "";

    if(!empty($_POST)){
        $verif = true;
        foreach($_POST as $key => $value){
            if(empty(trim($value))){
                $verif = false;
            }
        }
        if(!$verif){
            $info = alert("Veuillez renseigner tous les champs", "danger");
        } else{
            $pseudo = trim($_POST['pseudo']);
            $email = trim($_POST['email']);
            $mdp = trim($_POST['password']);
            // Vérification des données passées dans le formulaire dans la DB, récupération de celles-ci dans la DB si elles existent
            $user = checkUser($email, $pseudo);
            // Je vérifie si le mot de passe est bon
            // password_verify() pour vérifier si un mot de passe correspond à un mot de passe haché créé par la password_hash().
            // Si le hash du mdp de la BDD correspond au mdp du formulaire, alors password_verify retourne true
            if($user){
                if(password_verify($password, $user['password'])){
                    /*  Suite à la connexion on vas crére ce qu'on appelle une session :
                    Principe des sessions : un fichier temporaire appeléé "session" est crée sur le serveur, avec un identifiant unique . Les sessions constituent un moyen de stocker les données sur le serveur. Cette session est liée à un internaute car ces données sont propres à ce dernier,  Les données du fichier de session sont accessibles et manipulables à partir de la superglobale $_SESSION, elle est mêmoriser par le serveur et est disponible tant que la session de l'utilsateur est maintenu sur le serveur.
                    Quand une session est créée sur le serveur, ce dernier envoie son identifiant (unique) au client sous forme d'un cookie.
                    un cookie est déposé sur le poste de l'internaute avec l'identifiant (au nom de PHPSESSID). Ce cookie se détruit lorsqu'on quitte le navigateur.      
                    */
                    // Création ou ouverture d'une session :
                    // Une variable de session est une variable superglobale du nom de $_SESSION, c'est un tableau associatif
                    // session_start(); // Permet de démarrer une nouvelle session ou en reprendre une existante, on utilise une session quand cette fonction est exécutée, le serveur vérifie si la session qui a le même id envoyé existe
                    // Stockage des données dans cette session
                    $_SESSION['user'] = $user;
                    // debug($user);
                    // session_unset($_SESSION['user']);
                    // nous créons une session avec les infos de l'utilisateur provenant de la BDD. 
                    // cette variable créé et affecté dans cette page sera accessible partout dans le site une fois la fonction session_start est appelé
                    // debug($_SESSION);
                    header('location:profil.php');
                } else{
                    $info = alert("Les identifiants sont incorrects", "danger");
                    debug($user);
                }
            } else{
                $info = alert("Les identifiants sont incorrects", "danger");
            }
        }
    }
?>
<main class="authentification" style="background:url(assets/img/Kai_Sa_Runeterra_Prime.jpg) no-repeat; background-size: cover; background-attachment: fixed;"> 
    <div class="w-50 m-auto p-5 mt-5" style="background: rgba(20, 20, 20, 0.9);">
        <h2 class="text-center mb-5 p-3">Connexion</h2>
        <?php
            echo($info);   // pour afficher les messages de vérification
        ?>
        <form action="" method="post" class="p-5" >  
                <div class="row mb-3">
                    <div class="col-12 mb-5">
                        <label for="pseudo" class="form-label mb-3">Pseudo</label>
                        <input type="text" class="form-control fs-5" id="pseudo" name="pseudo">
                    </div>
                    <div class="col-12 mb-5">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control fs-5" id="email" name="email" placeholder="exemple.email@exemple.com">
                    </div>
                    <div class="col-12 mb-5">
                        <label for="password" class="form-label mb-3">Mot de passe</label>
                        <input type="password" class="form-control fs-5 mb-3" id="password" name="mdp" >
                        <input type="checkbox" onclick="showPasswordLogIn()"> <span class="text-danger">Afficher / masquer le mot de passe</span>
                    </div>
                        <button class="w-25 m-auto btn btn-danger btn-lg fs-5" type="submit">Se connecter</button>
                        <p class="mt-5 text-center">Vous n'avez pas encore de compte ! <a href="register.php" class=" text-danger">créer un compte ici</a></p>
                </div>
        </form>
    </div>
</main>
<?php
    require_once("inc/footer.inc.php");
?>
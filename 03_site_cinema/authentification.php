<?php
    $title = "Authentication";
    require_once("inc/functions.inc.php");
    require_once("inc/header.inc.php");

    $info = "";

    if(!empty($_POST)){
        // debug($_POST);
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
            $password = trim($_POST['password']);

            $user = checkUser($email, $pseudo);
        }
    }

?>
<main class="authentification" style="background:url(assets/img/Kai_Sa_Runeterra_Prime.jpg) no-repeat; background-size: cover; background-attachment: fixed;"> 
    <div class="w-50 m-auto p-5 mt-5" style="background: rgba(20, 20, 20, 0.9);">
        <h2 class="text-center mb-5 p-3">Connexion</h2>
        <?php
            //echo($info);   // pour afficher les messages de vérification
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
                        <input type="password" class="form-control fs-5 mb-3" id="password" name="password" >
                        <input type="checkbox" onclick="myFunction()"> <span class="text-danger">Afficher / masquer le mot de passe</span>
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
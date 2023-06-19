<?php
    $title = "Inscription";
    require_once("inc/functions.inc.php");
    require_once("inc/header.inc.php");

    // Si utilisateur log , pas d'accès à la page register
    if(!empty($_SESSION['user'])){
        header('location:profil.php');
    }

    $info = ""; // Variable qui recevra les messages d'alerte, déclaration dans le script en général avec une valeur vide pour ne pas engendrer d'erreur sur la page 
    $year = ((int) date('Y')) - 12; // 2023 - 12 = 2011
    $month = date('m'); 
    $day = date('d'); 
    $dateLimitSup = $year . "/" . $month . "/" . $day; // Date limite supérieure 
    $year2 = ((int) date('Y')) - 90;
    $dateLimitInf = $year2 . "/" . $month . "/" . $day; // Date limite inférieure

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
            // Stockage des valeurs des champs dans des variables et en les passant dans la fonction "trim()"
            $lastName = trim($_POST['lastName']);
            $firstName = trim($_POST['firstName']);
            $pseudo = trim($_POST['pseudo']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $password = trim($_POST['mdp']);
            $confirmPassword = trim($_POST['confirmMdp']);
            $civility = trim($_POST['civility']);
            $birthday = trim($_POST['birthday']);
            $address = trim($_POST['address']);
            $zip = trim($_POST['zip']);
            $city = trim($_POST['city']);
            $country = trim($_POST['country']);
            if(!isset($lastName) || strlen($lastName) < 2 || preg_match('/[0-9]+/', $lastName)){
                $info .= alert("Veuillez vérifier le nom", "danger");
            }
            if(!isset($firstName) || strlen($firstName) < 2 || preg_match('/[0-9]+/', $firstName)){
                $info .= alert("Veuillez vérifier le prénom", "danger");
            }
            if(!isset($pseudo) || strlen($pseudo) < 2){
                $info .= alert("Veuillez vérifier le pseudo", "danger");
            }
            if(!isset($password) || strlen($password) < 5 || strlen($password) > 15){
                $info .= alert("Veuillez vérifier le mot de passe", "danger");
            }
            if(!isset($confirmPassword) || $confirmPassword !== $password){
                $info .= alert("Veuillez vérifier la correspondance du mot de passe", "danger");
            }
            if(!isset($email) || strlen($email) > 25 || !filter_var($email, FILTER_VALIDATE_EMAIL)){
                $info .= alert("Veuillez vérifier l'email", "danger");
            }
            // if(!isset($phone) || !preg_match('#^[0-9]$#', $phone))
            if(!isset($phone)){ // preg_match vérifie si le numéro de téléphone correspond à l'expression régulière précisée. 
                /* La regex s'écrit entre #
                Le ^ définit le début de l'expression
                Le $ définit la fin de l'expression     
                [0-9] définit l'intervalle des chiffres autorisés
                {10} définit si l'on en veut 10 précisément
                */
                $info .= alert("Veuillez vérifier le numéro de téléphone", "danger");
            }
            if(!isset($civility) || ($civility != 'f' && $civility != 'm')){
                $info .= alert("Veuillez vérifier la civilité", "danger");
            }
            if(!isset($address) || strlen($address) < 5 || strlen($address) > 50){
                $info .= alert("Veuillez vérifier l'adresse", "danger");
            }
            if(!isset($zip)){ // preg_match vérifie si le code postal correspond à l'expression régulière précisée. 
                /* La regex s'écrit entre #
                Le ^ définit le début de l'expression
                Le $ définit la fin de l'expression     
                [0-9] définit l'intervalle des chiffres autorisés
                {2} définit si l'on en veut 2 précisément
                {3} définit si l'on en veut 3 précisément
                */
                $info .= alert("Veuillez vérifier le code postal", "danger");
            }
            if(!isset($city) || strlen($city) > 30){
                $info .= alert("Veuillez vérifier la ville", "danger");
            }
            if(!isset($country) || strlen($country) < 5 || strlen($country) > 50){
                $info .= alert("Veuillez vérifier le pays", "danger");
            }
            if(!isset($birthday) || ($birthday >= $dateLimitSup && $birthday < $dateLimitInf)){
                $info .= alert("Veuillez vérifier la date de naissance", "danger");
            }
            // Vérification de l'adressse mail et pseudo => inexistants dans la DB (pour éviter l'insertion de plusieurs mails identiques ou pseudos)
            // Vérification de l'email dans la DB
            $mailExist = checkMailUsers($email);
            if($mailExist){ // Vérification de l'email dans la DB, si elle existe
                $info = alert("L'adresse est déjà existante ou vous avez un compte","danger");
            }
            $pseudoExist = checkPseudoUsers($pseudo);
            if($pseudoExist){
                $info .= alert("Le pseudo est déjà existant","danger");
            }
        }
        if(empty($info)){
            $mdp = password_hash($mdp, PASSWORD_DEFAULT); 
            // cette fonction prédéfinie permet de hasher le mot de passe : générer une chaîne de caractére unique à partire d'une entrée. c'est un mécanisme unidirectionnelle dont l'utilité est de ne pas déchifré un hash Il faudra lors de la connexion comparer le hash de la BDD avec celui du mdp de l'internaute.
            // PASSWORD_DEFAULT c'est un paramètre qui indique l'alogorithme utilisé pour effectuer le hashage c'est le plus recommandé
            inscriptionUser($firstName, $lastName, $pseudo, $mdp, $email, $phone, $civility, $birthday, $address, $zip, $city, $country);
            $info = alert("Vous êtes inscrit(e) ! Vous pouvez désormais vous connecter.","success");
        }
    }
?>
<main style="background:url(assets/img/Ahri_Runeterra.jpg) no-repeat; background-size: cover; background-attachment: fixed;"> 
    <div class="w-75 m-auto p-5" style="background: rgba(20, 20, 20, 0.7);">
        <h2 class="text-center mb-5 p-3">Créer un compte</h2>
        <?php
            echo  $info; // pour afficher les messages
        ?>
        <form action="" method="post" class="p-5" >
            <div class="row mb-3">
                <div class="col-md-6 mb-5">
                    <label for="lastName" class="form-label mb-3">Nom</label>
                    <input type="text" class="form-control fs-5" id="lastName" name="lastName">
                </div>
                <div class="col-md-6 mb-5">
                    <label for="firstName" class="form-label mb-3">Prénom</label>
                    <input type="text" class="form-control fs-5" id="firstName" name="firstName" >
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 mb-5">
                    <label for="pseudo" class="form-label mb-3">Pseudo</label>
                    <input type="text" class="form-control fs-5" id="pseudo" name="pseudo">
                </div>
                <div class="col-md-4 mb-5">
                    <label for="email" class="form-label mb-3">Email</label>
                    <input type="text" class="form-control fs-5" id="email" name="email" placeholder="exemple.email@exemple.com">
                </div>
                <div class="col-md-4 mb-5">
                    <label for="phone" class="form-label mb-3">Téléphone</label>
                    <input type="text" class="form-control fs-5" id="phone" name="phone">
                </div>       
            </div>
               <div class="row mb-3">
                    <div class="col-md-6 mb-5">
                        <label for="mdp" class="form-label mb-3">Mot de passe</label>
                        <input type="password" class="form-control fs-5" id="mdp" name="mdp"  placeholder="Entrer votre mot de passe">
                    </div>
                    <div class="col-md-6 mb-5">
                        <label for="confirmMdp" class="form-label mb-3">Confirmation mot de passe</label>
                        <input type="password" class="form-control fs-5 mb-3" id="confirmMdp" name="confirmMdp" placeholder="Confirmer votre mot de passe">
                        <input type="checkbox" onclick="mdpInscription()"><span class="text-danger">Afficher / masquer le mot de passe</span>
                    </div>
               </div>
               <div class="row mb-3">
                    <div class="col-md-6 mb-5">
                        <label class="form-label mb-3">Civilité</label>     
                        <select class="form-select fs-5" name="civility">
                            <option value="m">Homme</option>
                            <option value="f">Femme</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-5">
                        <label for="birthday" class="form-label mb-3">Date de naissance</label>
                        <input type="date" class="form-control fs-5" id="birthday" name="birthday" max="<?=$dateLimit?>">
                    </div>
               </div>
               <div class="row mb-3">
                    <div class="col-12 mb-5">
                        <label for="address" class="form-label mb-3">Adresse</label>
                        <input type="text" class="form-control fs-5" id="address" name="address">
                    </div>
               </div>
               <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="zip" class="form-label mb-3">Code postal</label>
                        <input type="text" class="form-control fs-5" id="zip" name="zip">
                    </div>
                    <div class="col-md-5">
                        <label for="city" class="form-label mb-3">Ville</label>
                        <input type="text" class="form-control fs-5" id="city" name="city">
                    </div>
                    <div class="col-md-4">
                        <label for="country" class="form-label mb-3">Pays</label>
                        <input type="text" class="form-control fs-5" id="country" name="country">
                    </div>
               </div>
               <div class="row mt-5">
                    <button class="w-25 m-auto btn btn-danger btn-lg fs-5" type="submit">S'inscrire</button>
                    <p class="mt-5 text-center">Vous avez dèjà un compte ? <a href="authentification.php" class=" text-danger">Connectez-vous ici !</a></p>
               </div>
          </form>
   </div>
</main>
<?php
    require_once("inc/footer.inc.php");
?>
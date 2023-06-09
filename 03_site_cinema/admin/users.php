<?php
    $title = "Users";
    require_once("../inc/functions.inc.php");
    require_once("../inc/header.inc.php");
    if(empty($_SESSION['user'])){
        header('location:'.RACINE_SITE.'authentification.php');
        // exit;
    }
    if($_SESSION['user']['role'] == 'ROLE_USER'){
        header('location:'.RACINE_SITE.'profil.php');
    }

    $users = allUsers();
?>
<main>
    <div class="d-flex flex-column m-auto mt-5">
        <h2 class="text-center fw-bolder mb-5 text-danger">Liste utilisateurs</h2>
        <!-- <a href="gestion.php" class="btn align-self-end">Ajouter film</a> -->
        <table class="table table-dark table-bordered mt-5" style="box-shadow: -1px -1px 10px 0px #EFE8E8;">
            <thead>
                <tr class="fw-bolder fs-3">
                    <th class="text-center">ID</th>
                    <th class="text-center">Prénom</th>
                    <th class="text-center">Nom</th>
                    <th class="text-center">Pseudo</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Téléphone</th>
                    <th class="text-center">Civilité</th>
                    <th class="text-center">Date de naissance</th>
                    <th class="text-center">Adresse</th>
                    <th class="text-center">Code postal</th>
                    <th class="text-center">Ville</th>
                    <th class="text-center">Rôle</th>
                    <th class="text-center">Modifier</th>
                    <th class="text-center">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($users as $key => $user){
                ?>
                <tr>
                    <td><?=$user['id_user']?></td>
                    <td><?=$user['first_name']?></td>
                    <td><?=$user['last_name']?></td>
                    <td><?=$user['pseudo']?></td>
                    <td><?=$user['email']?></td>
                    <td><?=$user['phone']?></td>
                    <td><?=$user['civility']?></td>
                    <td><?=$user['birthday']?></td>
                    <td><?=$user['address']?></td>
                    <td><?=$user['zip']?></td>
                    <td><?=$user['city']?></td>
                    <td><?=$user['role']?></td>
                    <td class="text-center"><a href="users.php?action=update&id_user=<?=$user['id_user']?>" class="text-danger" style="text-decoration:none;"><?=$user['role']?></a></td>
                    <td class="text-center"><a href="users.php?action=delete&id_user=<?=$user['id_user']?>"><i class="bi bi-trash3-fill"></i></a></td>
                </tr>
                <?php
                    }
                    debug($_GET);
                ?>
            </tbody>
        </table>
    </div>
</main>
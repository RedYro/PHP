<?php
    $title = "Users";
    require_once("../inc/functions.inc.php");
    require_once("../inc/header.inc.php");
    if(empty($_SESSION['user'])){
        header('location:'.RACINE_SITE.'authentification.php');
        // exit;
    }
    if($_SESSION['user']['role'] == 'ROLE_USER'){
        header('location:profil.php');
    }
    if(isset($_GET['action']) && isset($_GET['id_user'])){
        if(!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id_user'])){
            $idUser = htmlentities($_GET['id_user']);
            deleteUser($idUser);
            header('location:dashboard.php?users_php');
        }
        if(!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id_user'])){
            $userRole = showUser($_GET['id_user']);
            if($userRole['role'] == 'ROLE_ADMIN'){
                updateRole('ROLE_USER', $userRole['id_user']);
                header('location:dashboard.php?users_php');
            }
            if($userRole['role'] == 'ROLE_USER'){
                updateRole('ROLE_ADMIN', $userRole['id_user']);
                header('location:dashboard.php?users_php');
            }
        }
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
                    <td class="text-center"><a href="users.php?action=update&id_user=<?=$user['id_user']?>" class="btn btn-danger"><?=$user['role'] == 'ROLE_ADMIN' ?'ROLE_USER' : 'ROLE-ADMIN'?></a></td>
                    <td class="text-center"><a href="users.php?action=delete&id_user=<?=$user['id_user']?>"><i class="bi bi-trash3-fill"></i></a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>
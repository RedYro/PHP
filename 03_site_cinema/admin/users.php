<?php
    $title = "Users";
    require_once("../inc/functions.inc.php");
    require_once("../inc/header.inc.php");
    if(empty($_SESSION['user'])){
        header('location:'.RACINE_SITE.'authentification.php');
        // exit;
    }
?>


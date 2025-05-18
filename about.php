<?php
session_start();
    $header = "A propos de notre équipe";
    $title = "About";
    $page = "about.php";
    
    require 'composants/head.php';
    require 'composants/nav.php';
    require 'composants/header.php';
    require 'composants/main.php';


    require 'model/articles-data.php';
    require 'model/produits-data.php';
?>

<h1>A propos de TrucsPasChers</h1>

<?php require 'composants/footer.php' ?>
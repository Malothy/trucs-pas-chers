<?php
session_start();
    $header = "Contactez-nous pour plus d'infos";
    $title = "Contact";
    $page = "contact.php";
    
    require 'composants/head.php';
    require 'composants/nav.php';
    require 'composants/header.php';
    require 'composants/main.php';

    require 'model/articles-data.php';
    require 'model/produits-data.php';
?>

<h1>Contactez-nous</h1>

<?php require 'composants/footer.php' ?>
<?php

use Dom\Mysql;


require "model/Database.php";
require "model/EtudiantModel.php";
require "model/ProduitModel.php";


$etudiantModel = new EtudiantModel();
$etudiants = $etudiantModel->all();

$produitModel = new ProduitModel;
$produits = $produitModel->all();

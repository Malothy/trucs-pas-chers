<?php 
$article = "montre";
$prix = 15;
$devise = "$";

$articles_names = [
    "Bracelet",
    "Montre",
    "Cable usb",
    "Ecouteurs",
    "Carnets",
];

$articles_prix = [
    "Bracelet" => 5000,
    "Montre" => 13000,
    "Cable usb" => 7500,
    "Ecouteurs" => 25000,
    "Carnets" => 2500,
];

$total = 0;
foreach($articles_prix as $prix){
    $total += $prix;
}




















$fruit = [ 25 => "pomme", "orange", 4 => "mangue", "banane", "raisin"];

$cotes = [7, 8, 5, 10, 9, 4];

$moyenne = [
    25 => 4.5,
    'John' => 7.2,
    13 => 8.4,
    8, 
    8.4,
    'Ruth' => 9.8,
    'Julie' => 5.5,
];

echo '<pre>';
//var_dump($fruit);
echo '</pre>';

$articles = [];

//var_dump($fruit);
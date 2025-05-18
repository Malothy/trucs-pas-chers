<?php
    session_start();
    $header = "Nos Produits";
    $title = "Produits";
    $page = "produits.php";
    
    require 'composants/head.php';
    require 'composants/nav.php';
    require 'composants/header.php';
    require 'composants/main.php';

    require 'model/articles-data.php';
    require 'model/produits-data.php';


?>



<h1>Tous les produits</h1>

<div class="grid grid-cols-2 gap-6">
    <?php foreach($produits as $produit) :?>

    <div
        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
            src="<?php echo "uploads/" .$produit["images"] ;?>" alt="<?php echo $produit["nom"] ;?>">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                <?php echo $produit["nom"]; ?>
            </h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Prix : <?php echo $produit["prix"] . " " . $produit["devise"]; ?> <br>

                <?php foreach($etudiants as $etudiant): ?>
                <?php if ($etudiant["id"] === $produit["etudiant_id"]): ?>

                Etudiant : <a class="text-blue-500 font-semibold hover:text-blue-800"
                    href="filtre.php?etudiant=<?php echo  $etudiant['id']; ?>"> <?php echo $etudiant['nom']; ?></a> <br>
                Contact : <?php echo $etudiant['tel']; ?> <br>
                Promotion : <?php echo $etudiant['promotion']; ?>

                <?php endif; ?>
                <?php endforeach ; ?>
            </p>
        </div>
    </div>
    <?php endforeach ; ?>
</div>


<?php require 'composants/footer.php'; ?>
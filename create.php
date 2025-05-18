<?php
    session_start();
    require 'model/produits-data.php';
    
    if (!($_SESSION['user'] ?? false)) {
        header('Location: login.php');
        exit();
    }
    
    $success = false;
    
    if ($_SERVER['REQUEST_METHOD'] === "POST"){

        $nom = $_POST['nom'];
        $etudiant_id = $_POST['etudiant'];
        $prix = $_POST['prix'];
        $devise = $_POST['devise'];
        $image_name = $_FILES['image']['name'];
        $image_top_name = $_FILES['image']['tmp_name'];
        
                
        //deplacer l'image dans le dossier uploads
        move_uploaded_file($image_top_name, "uploads/" . $image_name);
         
        //Enregistrer les infos du produits dans la bdd
        $produitModel -> create($etudiant_id, $nom, $prix, $devise, $image_name);

        $success = true;
    }

    $header = "Ajouter un nouveau produit";
    $title = "Nouveau Produit";
    $page = "create.php";
    
    
    require 'composants/head.php';
    require 'composants/nav.php';
    require 'composants/header.php';
    require 'composants/main.php';

    require 'model/articles-data.php';
?>

<h1>Publier un nouveau produit</h1>

<form class="max-w-sm mx-auto" action="create.php" method="POST" enctype="multipart/form-data">

    <?php if ($success) : ?>

    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">

        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Le produit</span>
        <div>Le produit 
            <span class="font-medium">
                <?php echo $nom;?>
            </span>
            a été ajouté avec succès.
        </div>
    </div>
    <?php endif;?>

    <div class="mb-5">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Nom du produit</label>
        <input type="text" id="name" name="nom"
            class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
            placeholder="iPhone" required />
    </div>

    <div class="mb-5">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Prix du produit</label>
        <input type="number" id="price" name="prix"
            class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
            placeholder="ex. 360$" required />
    </div>

    <div class="mb-5">
        <label for="devise" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Devise</label>
        <select id="devise" name="devise"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>FC</option>
            <option>$</option>
        </select>
    </div>

    <div class="mb-5">
        <label for="etudiant" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Nom de
            l'etudiant</label>
        <select id="etudiant" name="etudiant"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            <?php foreach ($etudiants as $etudiant): ?>

            <option value="<?php echo $etudiant['id']; ?>">
                <?php echo $etudiant['nom']; ?>
            </option>
            <?php endforeach ;?>
        </select>
    </div>

    <div class="mb-5">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">
            Importer l'image du produit</label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="user_avatar_help" id="image" type="file" name="image">
    </div>


    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Ajouter</button>
</form>


<?php require 'composants/footer.php'; ?>
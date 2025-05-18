<?php

    //Verifier que l'utilisateur n'est pas connecté avant d'afficher le formulaire
    //demarrer la session
    session_start();

    $title = "Login";
    $page = "login.php";

    if ($_SESSION['user'] ?? false) {
        header('Location: create.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];

        $password = $_POST['password'];
        
        $user = [
            'nom' => 'Admin',
            'email' => 'admin@trucspaschers.com',
            'password' => '23037'
        ];

        if ($email === $user['email'] and $password === $user['password']){
            
            //Demarrer la session
            // session_start();

            //Créer une session pour cet utilisateur
            $_SESSION['user'] =[
                'nom' => $user['nom'],
                'email' => $user['email']
            ];

            session_regenerate_id(true);

            //redirection vers la page

            header('Location: create.php');
            exit();


        } else {
            $errors['email'] = "Email ou mot de passe incorrect";
        }

        # code...
    }
    
    require 'composants/head.php';
    require 'composants/nav.php';
    require 'composants/main.php';


    require 'model/articles-data.php';
    require 'model/produits-data.php';
?>


<form class="max-w-sm mx-auto" action="login.php" method="post">
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Email</label>
        <input type="email" id="email" name="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="name@flowbite.com" required />
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Mot de passe</label>
        <input type="password" id="password" name="password"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required />
    </div>

    <?php if ($errors ?? false ) :?>
    <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
        role="alert">
        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">
                <?php echo $errors['email'] ;?>
            </span>
        </div>
    </div>
    <?php endif ;?>

    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Submit</button>
</form>


<?php require 'composants/footer.php' ?>
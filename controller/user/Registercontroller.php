<?php
//on demarre une session pour les msg d'erreur
session_start();
//modele avec les fct
include_once '../model/user/Usermodel.php';

function registerUser() {
    //verifie s'il y'a un bien un requete POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         // Check le mdp et si champs vide ?

         if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
            $_SESSION["error"] = "Veuillez remplir tout les champs!";
            header("Location: register");
            exit();
        }

        // if(strlen($_POST['password'])<'8'){
        //     $_SESSION["error"] = "Le mot de passe doit contenir au moin 8 caracteres !";
        //     header("Location: register");
        //     exit();
        // }

        $regexMotDePasse = '/^.{8,}$/';

        if (!preg_match($regexMotDePasse, $_POST['password'])) {
            $_SESSION["error"] = "Le mot de passe doit contenir au moin 8 caractères !";
                header("Location: register");
                exit();
        }
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $_SESSION["error"] = "L'e-mail n'est pas valide.";
            header("Location: register");
            exit();
        }

        // apres verification on stock les données
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);



        // on verifie si l'email n'est pas deja prise 
        $db = connectToDatabase();
        if (emailExists($db, $email)) {
            $_SESSION["error"] = "Cet e-mail est déjà enregistré. Veuillez vous connecter.";
            header("Location: login");
            exit();
        }


        $db = connectToDatabase();
        createUser($db, $name, $email, $password);
        $_SESSION["success"] = "Vous êtes enregistré ! veuillez vous connectez";
        header("Location: login");
        exit();
    }
}

?>

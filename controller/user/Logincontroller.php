<?php
session_start();
include_once '../model/user/UserModel.php';

function loginUser() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($_POST['email']) || empty($_POST['mdp'])) {
            $_SESSION["error"] = "Veuillez remplir tous les champs !";
            header("Location: login");
            exit();
        }
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $_SESSION["error"] = "L'e-mail n'est pas valide.";
            header("Location: login");
            exit();
        }
        $mail = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);

        $db = connectToDatabase();
        $user = getUserByMail($db, $mail);
        // si user existe et que les 2 mots de passe correspondent 
        if ($user && password_verify($mdp, $user['password'])) {
            $_SESSION["success"] = "Connexion réussie ! Bienvenue, " . $user['email'] . "!";
            $_SESSION["connect"]  = true;
            $_SESSION["id"]       = $user['id'];
            $_SESSION["name"]       = $user['name'];
            $_SESSION["created_at"]     = $user['created_at'];
            $_SESSION["updated_at"]     = $user['updated_at'];
            header("Location: transactions");
            exit();
        } else {
            $_SESSION["error"] = "Identifiants incorrects. Veuillez réessayer.";
            header("Location: login");
            exit();
        }
    }
}
?>

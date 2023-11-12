<?php
//on demarre une session pour les msg d'erreur
session_start();
//modele avec les fct
include_once '../model/transactions/Transactionsmodel.php';

function registerTransactions() {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check le mdp et si champs vide ?

        if (empty($_POST['libelle']) || empty($_POST['montant'])) {
           $_SESSION["error"] = "Veuillez remplir tout les champs!";
           header("Location: transactions");
           exit();
       }
       if (!filter_var($_POST['montant'], FILTER_VALIDATE_INT)) {
        $_SESSION["error"] = "Veuillez rentrez un nombre valide";
           header("Location: transactions");
           exit();
       }



       $libelle = htmlspecialchars($_POST['libelle']);
       $montant = htmlspecialchars($_POST['montant']);


    }
}
?>
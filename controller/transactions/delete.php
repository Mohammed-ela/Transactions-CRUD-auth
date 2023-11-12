<?php
include_once '../model/transactions/Transactionsmodel.php';

if (empty($_GET['id'])) {
    $_SESSION["error"] = "veuillez renseigne la bonne transaction";
    header("Location: transactions");
    exit();
}

$id = $_GET['id'];
// Vérifiez si l'id est un nombre
if (!ctype_digit($id)) {

    $_SESSION["error"] = "Impossible de supprimer.".$_GET['id'];
    header("Location: transactions");
    exit();
}

delete_id($id);
$_SESSION["success"] = "La transaction à bien etait supprimé";
header("Location: transactions");
exit();
?>
<?php
include_once '../model/transactions/Transactionsmodel.php';


// Vérifier id
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les détails de la transaction
    $transactionDetails = get_transaction_details($id);

    if (!$transactionDetails) {
        // Gérer le cas où la transaction n'est pas trouvée
        $_SESSION["error"] = "Transaction non trouvée.";
        header("Location: /transactions");
        exit();
    }
} else {
    // Gérer le cas où l'id n'est pas fourni dans l'URL
    $_SESSION["error"] = "Transaction inconnu";
    header("Location: /transactions");
    exit();
}

// Traitement du formulaire si soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Effectuer la mise à jour avec les nouvelles données du formulaire
    $updatedLabel = $_POST['label'];
    $updatedAmount = $_POST['amount'];

    update_transaction($id, $updatedLabel, $updatedAmount);

    $_SESSION["success"] = "Transaction mise à jour avec succès.";
    header("Location: /transactions");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la transaction</title>
</head>
<body>

    <h1>Modifier la transaction</h1>

    <form method="post">
        <label for="label">Libellé :</label>
        <input type="text" name="label" value="<?= $transactionDetails['label'] ?>" required>

        <label for="amount">Montant :</label>
        <input type="number" name="amount" value="<?= $transactionDetails['amount'] ?>" required>

        <button type="submit">Enregistrer les modifications</button>
    </form>

</body>
</html>

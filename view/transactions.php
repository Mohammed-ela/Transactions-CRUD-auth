<?php
include_once '../model/transactions/Transactionsmodel.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Si tu es connecté ?
isconnect();

$title = 'Transaction';
include('header.php');
?>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Bienvenue <?= $_SESSION["name"] ?></h1>

        <?php
        if (isset($_SESSION['success'])) {
            echo '<div class="alert alert-success text-center mt-3" role="alert">' . $_SESSION['success'] . '</div>';
            unset($_SESSION['success']);
        }
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger text-center mt-3" role="alert">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>

        <div class="table-responsive mt-4">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Membre depuis le :</th>
                        <th scope="col">Mis à jour le :</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row"><?= $_SESSION["name"] ?></td>
                        <td><?= $_SESSION["email"] ?></td>
                        <td><?= $_SESSION["created_at"] ?></td>
                        <td><?= $_SESSION["updated_at"] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

       
    </div>
   <!-- Transactions -->
   <?php 
   $transactions = list_transaction_id(); 
   if (!empty($transactions)) {
   ?>
   <div class="container mt-5">
    <h1>Mes transactions :</h1>
   <div class="table-responsive mt-4">
            <table class="table table-secondary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Libellé</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Créé le</th>
                        <th scope="col">Mis à jour le</th>
                        <th style="text-align:center;" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $transactions = list_transaction_id(); ?>
                    <?php foreach ($transactions as $transaction) : ?>
                        <tr>
                            <td scope="row"><?= $transaction["id"] ?></td>
                            <td><?= $transaction["label"] ?></td>
                            <td><?= $transaction["amount"] ?></td>
                            <td><?= $transaction["created_at"] ?></td>
                            <td><?= $transaction["updated_at"] ?></td>
                            <td class="d-flex justify-content-around">
                                <a href="/transactions/edit?id=<?= $transaction["id"] ?>" class="btn btn-dark">Modifier</a>
                                <a href="/transactions/delete?id=<?= $transaction["id"] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
   }
    ?>
    <div class="d-flex justify-content-around mt-4">
            <a href="logout" class="btn btn-primary">Déconnexion</a>
            <a href="/transactions/create" class="btn btn-success">Creer une transaction</a>
        </div>

</body>
</html>

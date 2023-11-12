<?php

include_once '../model/transactions/Transactionsmodel.php';
if (session_status() == PHP_SESSION_NONE) {
    // La session n'est pas démarrée
    session_start();
}
// si tu es connecté ?
isconnect();
$title = 'Transaction';
include('header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    registerTransactions();
}
?>



<body>


<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="POST" class="p-4 border rounded-3">

                    <h2 class="text-center mb-4">Création de Transaction</h2>
                    <?php
                            if(isset($_SESSION['success'])){
                            echo '<div class="alert alert-success text-center" role="success">'.$_SESSION['success'].'</div>';
                            }
                            if(isset($_SESSION['error'])){
                                echo '<div class="alert alert-danger text-center" role="alert">'.$_SESSION['error'].'</div>';
                                }

                            ?>


                    <div class="mb-3">
                        <label for="description" class="form-label">Libellé :</label>
                        <input type="text" id="description" name="libelle" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="montant" class="form-label">Montant :</label>
                        <input type="number" id="montant" name="montant" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-around">
                        <a href="logout" class="btn btn-secondary mt-2">Deconnexion</a>
                        <button type="submit" class="btn btn-primary">Créer la Transaction</button>
                    </div>

                </form>
            </div>
        </div>
    </div>






</body>

</html>
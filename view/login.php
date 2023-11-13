<?php

$title = 'Connexion';
include('header.php');

include('../controller/user/Logincontroller.php');
// si on a une methode post 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    loginUser();
}

if (!$_SESSION["connect"]=true) {
    header("Location: ");
    exit();
}

?>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center">Connecte-toi !</h2>
                    </div>
                    <div class="card-body">
                                                <?php
                            if(isset($_SESSION['success'])){
                            echo '<div class="alert alert-success text-center" role="success">'.$_SESSION['success'].'</div>';
                            unset($_SESSION['success']);
                            }
                            if(isset($_SESSION['error'])){
                                echo '<div class="alert alert-danger text-center" role="alert">'.$_SESSION['error'].'</div>';
                                unset($_SESSION['error']);
                                }

                            ?>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="pseudo" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Votre pseudonyme">
                        </div>
                        <div class="mb-3">
                            <label for="mdp" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Votre mot de passe">
                        </div>
                        <div class="d-flex justify-content-around">
                            <a href="/" class="btn btn-secondary mt-2">Retour à l'accueil</a>
                            <button type="submit" class="btn btn-primary mt-2">Se connecter</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

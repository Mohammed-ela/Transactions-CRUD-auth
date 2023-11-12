<?php
$title = 'Inscription';
include('header.php');
include('../controller/user/Registercontroller.php');
// si on a une methode post 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    registerUser();
}
?>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Inscription</h2>
                </div>
                <div class="card-body">               
                        <?php
                        if(isset($_SESSION['error'])){
                        echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
                        unset($_SESSION['error']);
                        }
                        ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Nom :</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-group">
                            <label for="email">Adresse email :</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="d-flex justify-content-around">
                            <a href="/" class="btn btn-secondary mt-2">Retour à l'accueil</a>
                            <button type="submit" class="btn btn-primary mt-2">S'enregistré</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

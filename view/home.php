<?php 
$title = 'Accueil';
include('header.php');
?>

<body class="bg-light h-100">

<div class="container-fluid h-100">
<h1 class="text-center" >Bienvenue</h1>
    <div class="row h-100">
        <div class="col-md-6 bg-primary text-light p-5">
            <h1>Inscription</h1>
            <p>Bienvenue sur notre plateforme. Inscrivez-vous dès maintenant!</p>
            <a class="btn btn-light" href="/register">S'inscrire</a>
        </div>
        <div class="col-md-6 bg-secondary text-light p-5">
            <h1>Connexion</h1>
            <p>Déjà membre? Connectez-vous pour accéder à votre compte.</p>
            <a class="btn btn-light" href="/login">Se connecter</a>
        </div>
    </div>
</div>

</body>
</html>

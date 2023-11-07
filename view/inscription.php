<?php

$title='Accueil';
include('../public/header.php');

?>

<body>
    <h1>Inscrit toi !</h1>

    <form action="" method="post">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Adresse email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password1" required><br>

        <!-- <label for="password">Répéter votre Mot de passe :</label>
        <input type="password" id="password" name="password2" required><br> -->

        <input type="submit" value="S'inscrire">
    </form>

</body>
</html>
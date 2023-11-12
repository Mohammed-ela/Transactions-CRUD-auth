<?php
function connectToDatabase() {
    $host = 'localhost';
    $user = 'root';
    $password = ''; // Pas de mot de passe par défaut (windows)
    $database = 'schema'; 

    $conn = mysqli_connect($host, $user, $password, $database);

    // Vérifier la connexion
    if (!$conn) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }

    return $conn;
}


function createUser($db, $name, $email, $password) {
    $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    $stmt->execute();
    $stmt->close();
}


?>
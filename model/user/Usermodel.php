<?php
if (session_status() == PHP_SESSION_NONE) {
    // La session n'est pas démarrée
    session_start();
}



// ----------------------------------------------------------------Register-----------------------------------------------------------
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

function emailExists($db, $email) {
    $query = "SELECT * FROM users WHERE email = ?";
    $statement = $db->prepare($query);
    $statement->bind_param('s', $email); // 's' indique que $email est une chaîne (string)
    $statement->execute();
 
    $result = $statement->get_result();
    $count = $result->num_rows;

    return $count > 0;
}





// ---------------------------------------------------------LOGIN------------------------------------------------------------------------ 

function getUserByMail($db, $mail) {
    $query = "SELECT * FROM users WHERE email = ?";
    $statement = $db->prepare($query);
    $statement->bind_param('s', $mail);
    $statement->execute();

    $result = $statement->get_result();
    $user = $result->fetch_assoc();

    return $user;
}
?>
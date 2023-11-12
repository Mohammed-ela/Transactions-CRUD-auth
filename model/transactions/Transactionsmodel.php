
<?php
if (session_status() == PHP_SESSION_NONE) {
    // La session n'est pas démarrée
    session_start();
}

//Tools / Utilities
function isconnect(){
    if (!$_SESSION['connect']) {

    header("Location: error");
    exit();
    }
}

function logout(){
    if (!isconnect()) {
        unset($_SESSION['connect']);
        $_SESSION['success']='Vous êtes bien déconnecté !';
        header("Location: login");
        exit();
    }
}

//BDD

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

//Create

function createTransactions($db,$user_id,$libelle,$amount) {
    $stmt = $db->prepare("INSERT INTO transactions (`user_id`,`label`, `amount`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss",$user_id,$libelle,$amount);
    $stmt->execute();
    $stmt->close();
}

function list_transaction_id(){
    $db=connectToDatabase();
    $user_id = $_SESSION['id'];
    $query = "SELECT * FROM transactions WHERE user_id = ?";
    $statement = $db->prepare($query);
    $statement->bind_param('i', $user_id);
    $statement->execute();
    $result = $statement->get_result();
    $transactions = $result->fetch_all(MYSQLI_ASSOC);
    return $transactions;
}

function delete_id($id) {
    $db = connectToDatabase();
    $stmt = $db->prepare("DELETE FROM `transactions` WHERE `id` = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->close();
    $db->close();
}

// update
function get_transaction_details($id) {
    $db = connectToDatabase();

    $query = "SELECT * FROM transactions WHERE id = ?";
    $statement = $db->prepare($query);
    $statement->bind_param('i', $id);
    $statement->execute();
    $result = $statement->get_result();

    // Récupérer les détails de la transaction
    $transactionDetails = $result->fetch_assoc();

    $statement->close();
    $db->close();

    return $transactionDetails;
}

function update_transaction($id, $updatedLabel, $updatedAmount) {
    $db = connectToDatabase();

    $query = "UPDATE transactions SET label = ?, amount = ?, updated_at = NOW() WHERE id = ?";
    $statement = $db->prepare($query);
    $statement->bind_param('sdi', $updatedLabel, $updatedAmount, $id);
    $statement->execute();

    $statement->close();
    $db->close();
}

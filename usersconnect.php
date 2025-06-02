<?php
session_start();
$conn = new PDO('mysql:host=localhost;dbname=covoiturage;charset=utf8', 'root', '');

// Récupération
$identifiant = $_POST['identifiant'] ?? '';
$motdepasse = $_POST['motdepasse'] ?? '';

$stmt = $conn->prepare("
    SELECT * FROM utilisateurs 
    WHERE (email = :identifiant OR CONCAT(nom, ' ', prenom) = :identifiant)
    AND provider = 'local'
");
$stmt->execute(['identifiant' => $identifiant]);
$user = $stmt->fetch();

if ($user && password_verify($motdepasse, $user['mot_de_passe'])) {
    $_SESSION['user_id'] = $user['id'];
    echo "Connexion réussie. Bienvenue " . htmlspecialchars($user['prenom']);
} else {
    echo "Identifiants incorrects.";
}
?>
<!DOCTYPE html>
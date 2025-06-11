<?php
session_start();

// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=covoiturage;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération des données du formulaire
    $nom        = $_POST['nom'] ?? '';
    $prenom     = $_POST['prenom'] ?? '';
    $email      = $_POST['email'] ?? '';
    $telephone  = $_POST['telephone'] ?? '';
    $password   = $_POST['password'] ?? '';

    // Vérification des champs obligatoires
    if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($telephone)) {
        die("Veuillez remplir tous les champs obligatoires.");
    }

    // Vérifie si l'email existe déjà
    $checkStmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = :email");
    $checkStmt->execute(['email' => $email]);

    if ($checkStmt->fetch()) {
        die("Un compte avec cette adresse e-mail existe déjà.");
    }

    // Hachage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insertion de l'utilisateur
    $insert = $pdo->prepare("
        INSERT INTO utilisateurs (nom, prenom, email, telephone, mot_de_passe)
        VALUES (:nom, :prenom, :email, :telephone, :mot_de_passe)
    ");

    $insert->execute([
        'nom'           => $nom,
        'prenom'        => $prenom,
        'email'         => $email,
        'telephone'     => $telephone,
        'mot_de_passe'  => $hashedPassword
    ]);

    // Création de la session
    $_SESSION['user_id'] = $pdo->lastInsertId();
    $_SESSION['user_nom'] = $nom;
    $_SESSION['user_prenom'] = $prenom;
    $_SESSION['passager_enregistre'] = true; // Sert pour la redirection "passager"

    // Redirection vers la page du passager (trajets)
    header('Location: rejoindretrajet.php');
    exit();

} else {
    echo "Accès non autorisé.";
}
?>

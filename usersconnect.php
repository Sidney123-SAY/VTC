<?php
session_start();
try {
    $pdo = new PDO('mysql:host=localhost;dbname=covoiturage;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifier que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom        = $_POST['nom'] ?? '';
    $prenom     = $_POST['prenom'] ?? '';
    $email      = $_POST['email'] ?? '';
    $telephone  = $_POST['telephone'] ?? '';
    $password   = $_POST['password'] ?? '';

    // Valider les champs requis
    if (empty($nom) || empty($prenom) || empty($email) || empty($password)) {
        die("Veuillez remplir tous les champs obligatoires.");
    }

    // Vérifier si l'utilisateur existe déjà (email unique)
    $checkStmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = :email");
    $checkStmt->execute(['email' => $email]);

    if ($checkStmt->fetch()) {
        die("Un compte avec cette adresse e-mail existe déjà.");
    }

    // Hacher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insérer le nouvel utilisateur
    $stmt = $pdo->prepare("
        INSERT INTO utilisateurs (nom, prenom, email, telephone, mot_de_passe, provider)
        VALUES (:nom, :prenom, :email, :telephone, :mot_de_passe, 'local')
    ");

    $stmt->execute([
        'nom'         => $nom,
        'prenom'      => $prenom,
        'email'       => $email,
        'telephone'   => $telephone,
        'mot_de_passe'=> $hashedPassword
    ]);

    // Créer la session
    $_SESSION['user_id'] = $pdo->lastInsertId();
    $_SESSION['user_nom'] = $nom;
    $_SESSION['user_prenom'] = $prenom;

    // Rediriger vers une page d'accueil ou de tableau de bord
    header('Location: accueil_utilisateur.php');
    exit();
} else {
    echo "Accès non autorisé.";
}
?>

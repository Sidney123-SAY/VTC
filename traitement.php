<?php
// Connexion à la base de données (à adapter)
$host = 'localhost';
$dbname = 'covoiturage';
$user = 'root';
$password = '';
$connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

// Dossier d'upload
$uploadDir = "uploads/";
$maxFileSize = 10 * 1024 * 1024; // 10 Mo

// Traitement de l'enregistrement
if (isset($_POST['verifier'])) {
    $nom        = $_POST['nom'] ?? '';
    $prenom     = $_POST['prenom'] ?? '';
    $adresse    = $_POST['adresse'] ?? '';
    $jour       = $_POST['jour'] ?? '';
    $mois       = $_POST['mois'] ?? '';
    $annee      = $_POST['annee'] ?? '';
    $telephone  = $_POST['telephone'] ?? '';
    $email      = $_POST['email'] ?? '';
    $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
    $naissance  = "$annee-$mois-$jour";

    // Upload du permis
    $permisPath = '';
    if (isset($_FILES['permis']) && $_FILES['permis']['error'] == 0) {
        if ($_FILES['permis']['size'] <= $maxFileSize) {
            $ext = pathinfo($_FILES['permis']['name'], PATHINFO_EXTENSION);
            $permisPath = $uploadDir . uniqid() . '.' . $ext;
            move_uploaded_file($_FILES['permis']['tmp_name'], $permisPath);
        } else {
            die("Fichier trop volumineux.");
        }
    }

    // Insertion
    $stmt = $conn->prepare("INSERT INTO chauffeurs (nom, prenom, adresse, date_naissance, telephone, email, mot_de_passe, permis)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $adresse, $naissance, $telephone, $email, $motdepasse, $permisPath]);
    echo "Inscription réussie.";
}

// Traitement de la connexion
if (isset($_POST['connexion'])) {
    $email = $_POST['email_conn'] ?? '';
    $motdepasse = $_POST['mdp_conn'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM chauffeurs WHERE email = ?");
    $stmt->execute([$email]);
    $chauffeur = $stmt->fetch();

    if ($chauffeur && password_verify($motdepasse, $chauffeur['mot_de_passe'])) {
        echo "Connexion réussie. Bienvenue, " . htmlspecialchars($chauffeur['prenom']) . " !";
        // Redirection ou session ici
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>

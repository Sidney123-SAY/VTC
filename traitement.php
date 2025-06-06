<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
try {
    $host = 'localhost';
    $dbname = 'covoiturage';
    $user = 'root';
    $password = '';
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Dossier d'upload
$uploadDir = "uploads/";
$maxFileSize = 10 * 1024 * 1024; // 10 Mo

// Traitement de l'enregistrement
if (isset($_POST['prenom'])) {
    $nom        = $_POST['nom'] ?? '';
    $prenom     = $_POST['prenom'] ?? '';
    $adresse    = $_POST['adresse'] ?? '';
    $jour       = $_POST['jour'] ?? '';
    $mois       = $_POST['mois'] ?? '';
    $annee      = $_POST['annee'] ?? '';
    $telephone  = $_POST['telephone'] ?? '';
    $email      = $_POST['email'] ?? '';
    $motdepasse = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $naissance  = "$annee-$mois-$jour";


    $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf'];
    $permisPath = '';
    if (isset($_FILES['permis']) && $_FILES['permis']['error'] == 0) {
        if ($_FILES['permis']['size'] <= $maxFileSize) {
            $ext = strtolower(pathinfo($_FILES['permis']['name'], PATHINFO_EXTENSION));
            if (!in_array($ext, $allowedTypes)) {
                die("Type de fichier non autorisé. Seuls JPG, PNG, PDF sont acceptés.");
            }
            $permisPath = $uploadDir . uniqid() . '.' . $ext;
            move_uploaded_file($_FILES['permis']['tmp_name'], $permisPath);
        } else {
            die("Fichier trop volumineux.");
        }
    }

    // Insertion en base
    $stmt = $connexion->prepare("INSERT INTO chauffeurs (nom, prenom, adresse, date_naissance, telephone, email, mot_de_passe, permis)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $adresse, $naissance, $telephone, $email, $motdepasse, $permisPath]);

    $_SESSION['conducteur_enregistre'] = true;
    $_SESSION['chauffeur_id'] = $connexion->lastInsertId();

    header("Location: conduct.html");
    exit();
}

// Traitement de la connexion
if (isset($_POST['connexion'])) {
    $email = $_POST['email_conn'] ?? '';
    $motdepasse = $_POST['mdp_conn'] ?? '';

    $stmt = $connexion->prepare("SELECT * FROM chauffeurs WHERE email = ?");
    $stmt->execute([$email]);
    $chauffeur = $stmt->fetch();

    if ($chauffeur && password_verify($motdepasse, $chauffeur['mot_de_passe'])) {
        $_SESSION['conducteur_enregistre'] = true;
        $_SESSION['chauffeur_id'] = $chauffeur['id'];
        header("Location: conduct.html");
        exit();
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>

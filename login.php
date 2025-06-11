<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=covoiturage;charset=utf8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

    $identifiant = $_POST['identifiant'] ?? '';
    $motdepasse = $_POST['motdepasse'] ?? '';

    if (empty($identifiant) || empty($motdepasse)) {
        $erreur = "Veuillez remplir tous les champs.";
    } else {
        // Vérifier si c’est un email ou un téléphone
        $champ = filter_var($identifiant, FILTER_VALIDATE_EMAIL) ? 'email' : 'telephone';

        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE $champ = :identifiant");
        $stmt->execute(['identifiant' => $identifiant]);
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur && password_verify($motdepasse, $utilisateur['mot_de_passe'])) {
            // Connexion réussie
            $_SESSION['user_id'] = $utilisateur['id'];
            $_SESSION['user_nom'] = $utilisateur['nom'];
            $_SESSION['user_prenom'] = $utilisateur['prenom'];
            $_SESSION['passager_enregistre'] = true;

            header("Location: rejoindretrajet.php");
            exit();
        } else {
            $erreur = "Identifiants incorrects.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-image: url('https://www.izidrive.io/wp-content/uploads/2023/08/taxi-nuit.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      color: white;
    }

    body::before {
      content: "";
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.6);
      z-index: -1;
    }

    header {
      padding: 10px 20px;
    }

    header a {
      color: white;
      text-decoration: none;
      font-size: 18px;
      font-weight: bold;
    }

    .container {
      max-width: 400px;
      margin: 100px auto;
      background: rgba(255, 255, 255, 0.1);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.5);
    }

    .intro {
      font-size: 18px;
      margin-bottom: 20px;
      text-align: center;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    input[type="text"],
    input[type="password"] {
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: none;
    }

    .btn.primary {
      background-color: #f5d77a;
      color: black;
      padding: 10px;
      border: none;
      font-weight: bold;
      border-radius: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn.primary:hover {
      background-color: #e4c857;
    }

    .error {
      color: #ff4d4d;
      font-weight: bold;
      text-align: center;
    }
  </style>
</head>
<body>

  <header>
    <a href="Accueil.html">&larr; Retour</a>
  </header>

  <div class="container">
    <p class="intro">
      Entrez votre numéro de téléphone<br>
      ou votre adresse e-mail<br>
      pour vous connecter
    </p>
    
    <?php if (isset($erreur)): ?>
      <p class="error"> <?= htmlspecialchars($erreur) ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST">
      <input type="text" name="identifiant" placeholder="Numéro ou e-mail" required>
      <input type="password" name="motdepasse" placeholder="Mot de passe" required>
      <button type="submit" class="btn primary">Connexion</button>
    </form>
  </div>

</body>
</html>

